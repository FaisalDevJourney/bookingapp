<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "wallet_id",
        "status",
        "description",
        "amount",
    ];
    
    public function wallet(){
        return $this->belongsTo(wallet::class, "wallet_id");
    }
}
