<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Shopper\Framework\Models\Shop\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Products;
use App\Models\Oxford;

class Category extends Product\Category
{
    use HasFactory;

    public function oxfords()
    {
        return $this->hasManyThrough(Oxford::class, Category::class, 'category_id');
    }
}
