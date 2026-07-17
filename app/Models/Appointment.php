<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'status',
        'evaluated',
        'supervisor_id',
        'patient_id',
        'student_id',

    ];

    public function student()
    {

        return $this->belongsTo(Student::class, 'student_id', 'user_id');
    }

    public function supervisor()
    {

        return $this->belongsTo(Supervisor::class);
    }

    public function patient()
    {

        return $this->belongsTo(Patient::class);
    }

    public function evaluation()
    {

        return $this->hasOne(Evaluation::class);
    }

    public function scopePending($query)
    {

        return $query->where('status', 'pending');
    }

    public function scopeConflict($query, $date, $start, $end, $supervisor_id)
    {

        return $query->where('date', $date)
            ->where('supervisor_id', $supervisor_id)
            ->where(function ($q) use ($start, $end) {
                $q->where('start_time', '<', $end)
                    ->where('end_time', '>', $start);
            });
    }

    public function isPending()
    {

        return $this->status == 'pending';
    }

    public function isCompleted()
    {

        return $this->status == 'completed';
    }

    public function scopeNotEvaluated(Builder $query): Builder
    {
        return $query->where('evaluated', false);
    }

    public function scopeEvaluated(Builder $query): Builder
    {
        return $query->where('evaluated', true);
    }

    public function scopeForSupervisor(Builder $query, $supervisorId): Builder
    {
        return $query->where('supervisor_id', $supervisorId);
    }

    public function scopeForStudent(Builder $query, $studentId): Builder
    {
        return $query->where('student_id', $studentId);
    }
}
