<?php

namespace App\Enhancers;

/**
 * SerialNumber Class
 */
class SerialNumber
{
	/**
	 * Generate serial number with length 13
	 * @param callable $callable
	 * @param string $preText
	 * @param string $postText
	 * @return string
	 */
	public static function generate(callable $callable, string $preText=NULL, string $postText=NULL) : string
	{
		return strtoupper($preText.$callable(uniqid()).$postText);
	}

	/**
	 * Generate serial number
	 * @return string
	 */
	public static function generateSerialNumber() : string
	{
		return static::generate(function($serialNumber)
		{
			return substr($serialNumber, 7, 13);
		}, "ILY", "SN");
	}
}
