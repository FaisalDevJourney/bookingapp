<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    protected $fillable = [
        "course_id",
        "comment",
    ];

    public function course(){
        return $this->belongsTo(course::class, "course_id");
    }
}
