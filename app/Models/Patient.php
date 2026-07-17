<?php

namespace App\Models;

use App\Policies\PatientPolicy;
use App\UploadImage;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

#[UsePolicy(PatientPolicy::class)]
class Patient extends Model
{
    use Notifiable ,UploadImage,HasFactory;

    //
    protected $fillable = [
        'name',
        'email',
        'birth',
        'diabetes',
        'gender',
        'Blood_type',
        'procedure_id',
        'receptionist_id',

    ];

    public function procedure()
    {

        return $this->belongsTo(Procedure::class);

    }

    public function receptionist()
    {

        return $this->belongsTo(Receptionist::class);

    }

    public function appointment()
    {

        return $this->hasOne(Appointment::class);

    }

    public function image()
    {

        return $this->morphOne(Image::class, 'imageable');

    }

    public function getFeeAttribute()
    {

        return $this->procedure?->price;

    }

    public function scopeWithoutAppointment($query)
    {
        return $query->whereDoesntHave('appointment');
    }

    public function age(): CastsAttribute
    {

        return CastsAttribute::make(
            get: fn () => $this->birth ? Carbon::parse($this->birth)->age : null
        );
    }

    public function imagePath(): CastsAttribute
    {

        return CastsAttribute::make(get: fn () => $this->image ? Storage::url($this->image?->path) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAEftwGTVyvKJI28IwAMjOLKIhJXrD_fHpHuCjRfLOSUDDB7GCpw8hsrIjLRkWHRUFcF-kJNsmaSvxUS8J089h194NFTWHOOEqmxWHsxGh1OM8_PsTXozILIwXopFcefbPgfA5yYstrqZ5bxwxNFTv_z2rNULc7ETiLMf59cxtTW2SJMlgGfVK5UmZI0XFy45YIdKBdD5OUWZ4Clo69s-OhDBKyt0vIkNejiFR9DV_ZAsapQsej3X_z');

    }
}
