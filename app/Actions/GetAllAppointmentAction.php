<?php

namespace App\Actions;

use App\Models\Appointment;

class GetAllAppointmentAction
{
    public function execute(?string $search = null)
    {
        $user = auth()->user();

        $appointments = Appointment::with('patient');

        if ($user->isStudent()) {
            $appointments->where('student_id', $user->id);
        } elseif ($user->isSupervisor()) {
            $appointments->where('supervisor_id', $user->supervisor->id);
        } elseif ($user->isReceptionist()) {
            $appointments->pending();
        }

        $appointments->when($search, function ($query, $searchTerm) {
            $query->whereHas('patient', function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%'.$searchTerm.'%');
            });
        });

        return $appointments->latest();
    }
}
