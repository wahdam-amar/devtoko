<?php

use App\Models\Category;
 
if (!function_exists('formatMoney')) {
	function formatMoney($stringToFormat)
	{
		return number_format($stringToFormat, 0, ',', '.');
	}
}

if (!function_exists('getCategory')) {
	function getCategory()
	{
		return Category::whereStatus('AC')->latest('id')->get();;
	}
}