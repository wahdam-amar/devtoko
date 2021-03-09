<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'city',
        'status',
    ];

    function getPrefixAttribute()
    {
        return sprintf('%s', 'SUP' . str_pad($this->id, 5, '0', STR_PAD_LEFT));
    }
}
