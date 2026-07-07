<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\HasNotificationActions;
use App\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    
    use HasFactory, Notifiable,HasApiTokens,HasNotificationActions,UploadImage;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    const ROLE_SUPERVISOR='supervisor';
    const ROLE_ADMIN='admin';
    const ROLE_RECEPTIONIST='receptionist';
    const ROLE_STUDENT='student';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function receptionist(){

        return $this->hasOne(Receptionist::class);

    }
     public function supervisor(){

        return $this->hasOne(Supervisor::class);

    }
     public function student(){

        return $this->hasOne(Student::class);
        
    }
    public function image():Relation{

        return $this->morphOne(Image::class,'imageable');

    }
    public function isSupervisor(){

        return $this->role==self::ROLE_SUPERVISOR;

    }
      public function isStudent(){

        return $this->role==self::ROLE_STUDENT;

    }
      public function isReceptionist(){

        return $this->role==self::ROLE_RECEPTIONIST;

    }
      public function isAdmin(){

        return $this->role==self::ROLE_ADMIN;
        
    }
    public function getAvatarAttribute()
    {
        return $this->image?->path 
        ? Storage::url($this->image->path) 
        : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBeD_KqYYOFATqI1NAzdL4mTNkx9QuXXHElMUQrdgeLghf6pdOrd9UNvztF1qcEX58cLO1sdzR6bE0mjEkJp-MM6qhV0CB4tZLd9WyRVcqmB7w1vf2-E4ZsMK2uyzG7hjaO-NrD3lipKOqKkNONEFGdVR2Es-l4RdmnDqi5Ho9SlNbnQ2oU690afB9yzsloabQofcU9b6meC_CxGYCejdch8OzXJF2DlrvvfzE0E-rdRpBGtb_VGfK6';
    }
  
}
