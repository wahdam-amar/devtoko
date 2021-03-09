<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Customer extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'customer';

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
