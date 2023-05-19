<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
