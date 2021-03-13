<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Stock extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'stock';

    protected $fillable = [
        'name',
        'desc',
        'amount',
        'price_sell',
        'price_buy',
        'category_id',
        'status',
    ];
}
