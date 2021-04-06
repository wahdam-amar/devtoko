<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class InvoiceDetail extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'invoice_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoice_no',
        'stock_id',
        'quantity'
    ];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_no', 'no');
    }
}
