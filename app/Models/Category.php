<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Category extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'stock_category';

    protected $fillable = [
        'name',
        'desc',
    ];
}
