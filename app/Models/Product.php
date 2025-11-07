<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'name',
        'description',
        'price',
        'priority',
        'status',
    ];
}
