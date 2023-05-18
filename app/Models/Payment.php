<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    /**
     * Get the rental agreement this payment belongs to
     */
    public function rental(): BelongsTo
    {
        return $this->belongsTo(Rental::class, 'id', 'rental_id');
    }
}
