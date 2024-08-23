<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewedProduct extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
    ];

    protected $casts = [
        'id' => 'string',
        'user_id' => 'string',
        'product_id' => 'string',
    ];
}
