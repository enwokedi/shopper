<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    use SoftDeletes;

    /**
     * Get the rental agreement this payment belongs to
     */
    public function rental(): BelongsTo
    {
        return $this->belongsTo(Rental::class, 'id', 'rental_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
