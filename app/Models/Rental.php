<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    use HasFactory;

    /**
     * Get the user that owns this contract.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     * Get the motorcycles for this rental agreement.
     */
    public function motorcycle()
    {
        return $this->hasMany(Motorcycle::class);
    }

    /**
     * Get the motorcycles for this rental agreement.
     */
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}