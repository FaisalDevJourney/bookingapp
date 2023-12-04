<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "booking_id",
        "name",
        "field",
        "startdate",
        "enddate",
        "location",
        "desc",
        "price",
    ];

    public function course()
    {
        return $this->belongsTo(user::class, "user_id");
    }

    public function ratings()
    {
        return $this->hasMany(rating::class, "course_id");
    }

    public function booking()
    {
        return $this->hasOne(booking::class, "course_id");
    }

    public function materials()
    {
        return $this->hasMany(material::class, "course_id");
    }

    public function images(){
        return $this->hasMany(images::class, 'course_id');
    }
}
