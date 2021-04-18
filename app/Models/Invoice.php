<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'invoice';

    protected $primaryKey = 'no ';

    protected $keyType = 'string';

    protected $fillable = [
        'no',
        'date',
        'due',
        'amount'
    ];

    protected $casts = [
        'date' => 'date',
        'due' => 'date'
    ];

    function getPrefixAttribute()
    {
        return IdGenerator::generate(['table' => 'invoice', 'field' => 'no', 'length' => 10, 'prefix' => 'INV-' . date('ym')]);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->no = IdGenerator::generate(['table' => 'invoice', 'field' => 'no', 'length' => 10, 'prefix' => 'INV-' . date('ym')]);
        });
    }

    /**
     * Get the customer that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
