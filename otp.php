<?php
	function otp($len)
	{
		$string = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ0123456789';
		$otp = "";
		for($i = 0; $i < $len; $i++)
		{
			$char = $string[rand() % $len];
			$otp = $otp."".$char;
		}
		return $otp;
	}
?>