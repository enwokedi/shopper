<?php

namespace App\Models;


use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

class Oxford extends Model implements Buyable
{
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }
    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }
    public function getBuyableWeight($options = null)
    {
        return $this->weight;
    }

    // protected $fillable = [
    //     'sku',
    //     'description',
    //     'ean',
    //     'price',
    //     'vat_price',
    //     'stock',
    //     'estimated_delivery',
    //     'image_name',
    //     'vatable',
    //     'obsolete',
    //     'dead',
    //     'replacement_product',
    //     'brand',
    //     'extended_description',
    //     'variation',
    //     'date_added',
    //     'prod_id',
    //     'super_product_name',
    //     'colour',
    //     'image_url',
    //     'category',
    //     'model',
    //     'category_id'
    // ];
}
