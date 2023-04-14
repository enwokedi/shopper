<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Oxford extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'description',
        'ean',
        'price',
        'vat_price',
        'stock',
        'estimated_delivery',
        'image_name',
        'vatable',
        'obsolete',
        'dead',
        'replacement_product',
        'brand',
        'extended_description',
        'variation',
        'date_added',
        'prod_id',
        'super_product_name',
        'colour',
        'image_url',
        'category',
        'model',
        'category_id'
    ];
}
