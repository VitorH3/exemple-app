<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'phone'
    ];

    // create a relationship between the customer and the products
    /**
     * Get the products for the customer.
     * 
     * This function defines a one-to-many relationship between the customer and the products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
