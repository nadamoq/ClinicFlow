<?php

namespace App\Services;

use App\Filters\PatientFilter;
use App\Models\Patient;

class PatientFilterService
{
    public function filterPatient($filters)
    {
        $user = auth()->user();
        $query = Patient::query();

        if ($user->isStudent() || $user->isSupervisor()) {

            $query->whereHas('appointment', function ($q) use ($user) {
                $q->where('student_id', $user->id)
                    ->orWhere('supervisor_id', $user->supervisor?->id);
            });
        }

        $filter = new PatientFilter;

        $query = $filter->apply($query, $filters);

        return $query;
    }
}
