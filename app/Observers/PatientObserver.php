<?php

namespace App\Observers;

use App\Models\Patient;
use App\Notifications\PatientNotfication;

class PatientObserver
{
    /**
     * Handle the Patient "created" event.
     */
    public function created(Patient $patient): void
    {
        //

        $patient->notify(new PatientNotfication($patient));

    }

    /**
     * Handle the Patient "updated" event.
     */
    public function updated(Patient $patient): void
    {
        //
        $patient->notify(new PatientNotfication($patient));

    }
}
