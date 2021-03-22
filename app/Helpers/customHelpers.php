<?php

 
if (!function_exists('formatMoney')) {
	function formatMoney($stringToFormat)
	{
		return number_format($stringToFormat, 0, ',', '.');
	}
}
