<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function histories()
    {
        return $this->hasMany(InvoiceDetail::class, 'stock_id', 'id');
    }
}
