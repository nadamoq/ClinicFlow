<?php

namespace App\Actions;

use App\Models\Appointment;
use App\Models\Evaluation;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EvaluateAppointmentAction
{
    public function execute($data)
    {

        $appointment = Appointment::findOrFail($data['appointment_id']);

        if (! $appointment->isCompleted()) {

            return [
                'message' => "Appointment is $appointment->status ,can't be evaluated",
                'status' => Response::HTTP_METHOD_NOT_ALLOWED,
            ];
        }
        DB::transaction(function () use ($data, $appointment, &$created) {

            $created = Evaluation::create($data);
            $appointment->update(['evaluated' => true]);
        });

        return [
            'message' => $created ? ' Evaluated Successfully ' : 'error',
            'status' => $created ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
        ];
    }
}
