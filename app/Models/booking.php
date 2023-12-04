<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "course_id",
        "name",
        "startdate",
        "enddate",
        "status",
    ];

    public function user(){
        return $this->belongsTo(user::class, "user_id");
    }

    public function course(){
        return $this->belongsTo(course::class, "course_id");
    }
}
