<?php

namespace App\Services;

use App\Filters\PatientFilter;
use App\Models\Patient;
use App\UploadImage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PatientService
{
    use AuthorizesRequests, UploadImage;

    public function list($filters)
    {

        $this->authorize('viewAny', Patient::class);

        $user = auth()->user();
        $query = Patient::query();

        if ($user->isStudent()) {

            $query->withoutAppointment();
        } elseif ($user->isSupervisor()) {
            $query->whereHas('appointment', function ($q) use ($user) {
                $q->where('supervisor_id', $user->supervisor?->id);
            });
        }
        $filter = new PatientFilter;
        $query = $filter->apply($query, $filters);

        return $query;
    }

    public function store(array $data)
    {

        $this->authorize('create', Patient::class);

        $data['receptionist_id'] = auth()->user()->id;

        $patient = Patient::create($data);

        if (! empty($data['image'])) {

            $result = $patient->upload($data['image'], 'public');
            $patient->image()->create(['alt_txt' => $data['alt_txt'] ?? $result['alt_txt'], 'path' => $result['path']]);
        }

        return $patient;
    }

    public function update(Patient $patient, array $data)
    {
        $this->authorize('update', $patient);

        $updated = $patient->update($data);

        if (! empty($data['image'])) {

            $result = $patient->upload($data['image'], 'public');

            $patient->image()->updateOrCreate(['alt_txt' => $result['alt_txt'], 'path' => $result['path']]);
        }

        return $updated;
    }

    public function delete(Patient $patient)
    {

        $this->authorize('delete', $patient);
        $deleted = $patient->delete();
        if ($patient->image) {

            $patient->deleteImage('public', $patient->image->path);
        }

        return $deleted;
    }
}
