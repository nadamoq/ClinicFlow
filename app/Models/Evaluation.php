<?php

namespace App\Models;

use App\Policies\EvaluationPolicy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;

#[UsePolicy(EvaluationPolicy::class)]
class Evaluation extends Model
{
    //

    protected $fillable = [
        'mark',
        'appointment_id',
        'description',
    ];

    public function appointment()
    {

        return $this->belongsTo(Appointment::class);

    }

    public function checkOlderPreviousMonth()
    {
        return $this->getCreatedAtColumn() <= Carbon::now()->subMonth();
    }
}
