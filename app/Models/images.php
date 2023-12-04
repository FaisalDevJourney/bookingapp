<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;

    protected $fillable = [
        "course_id",
        "name",
    ];

    public function courses(){
        return $this->belongsTo(course::class, 'course_id');
    }
}
