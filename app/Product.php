<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function taxes()
    {
        return $this->belongsToMany(Tax::class, 'products_taxes', 'product_id', 'tax_id');
    }
}
