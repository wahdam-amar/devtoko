<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Invoice extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'invoice';

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

    // protected $config = [
    //     'table' => 'invoice',
    //     'length' => 10,
    //     'prefix' => 'INV-' . date('ym')
    // ];

    function getPrefixAttribute()
    {
        return IdGenerator::generate(['table' => 'invoice', 'field' => 'no', 'length' => 10, 'prefix' => 'INV-' . date('ym')]);
    }

    // now use it
    // $id = IdGenerator::generate($config);

    // // use within single line code
    // $id = IdGenerator::generate(['table' => 'todos', 'length' => 6, 'prefix' => date('y')]);

    // output: 160001

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->no = IdGenerator::generate(['table' => 'invoice', 'field' => 'no', 'length' => 10, 'prefix' => 'INV-' . date('ym')]);
        });
    }
}
