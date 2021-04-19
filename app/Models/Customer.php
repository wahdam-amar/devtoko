<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function invoices()
    {
        return $this->hasMany(Customer::class, 'id', 'customer_id');
    }
}
