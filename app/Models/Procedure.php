<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'duration_minutes',
        'price',
    ];

    public function patients()
    {

        return $this->hasMany(Patient::class);

    }

    public function image()
    {

        return $this->morphOne(Image::class, 'imageable');

    }
}
