<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Shopper\Framework\Models\Shop\Product;

class Category extends Product\Category
{
    use HasFactory;
}
