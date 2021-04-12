<?php

namespace App\Exceptions;

use Exception;

class StockMinusException extends Exception
{
    public function report()
    {
        // 
    }

    public function render()
    {
        return back()->withErrors('Stock Tidak Boleh Minus');
    }
}
