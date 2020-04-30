<?php

namespace App\Enhancers;

/**
 * SerialNumber Class
 */
class SerialNumber
{
	/**
	 * Generates serial number with ID and length 13
	 * @param string $ID
	 * @return string
	 */
	public static function generate(string $ID=NULL) : string
	{
		return strtoupper($ID.uniqid());
	}

	/**
	 * Generate serial number
	 * @return string
	 */
	public static function generateSerialNumber () : string
	{
		return strtoupper("CHCO".substr(uniqid(), 7, 13)."SN");
	}
}
