<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class wallet extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "amount",
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(user::class, "user_id");
    }

    public function transactions():HasMany
    {
        return $this->hasMany(transaction::class,"wallet_id");
    }
}
