<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'description',
        'price',
        'stock',
    ];
}
