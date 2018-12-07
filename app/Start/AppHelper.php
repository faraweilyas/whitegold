<?php

namespace App\Start;

use Blaze\Auth\Auth;
use Blaze\Http\Session;
use Blaze\Encryption\Encrypt;
use Blaze\Http\Mail as Mailer;
use Blaze\Logger\Log as FileLog;
use Blaze\Validation\FormValidator as FV;
use Blaze\Validation\Validator as Validate;

/**
* AppHelper Class
*/
class AppHelper
{
	// Valid Users
	private static $users = [
		"FI" => "Farawe iLyas",
		"JD" => "John Doe",
	];

	/**
	* Validates array key
	* @param string $array
	* @param string $arrayKey
	* @return bool
	*/
	public static function validateArrayKey (string $array=NULL, string $arrayKey=NULL) : bool
	{
		if (!isset(static::$$array)) return FALSE;
		return array_key_exists(strtoupper($arrayKey), static::$$array);
	}

	/**
	* Validates and returns array
	* @param string $array
	* @param string $textStyle
	* @return array
	*/
	public static function getArray (string $array=NULL, string $textStyle="strtoupper") : array
	{
		if (!isset(static::$$array)) return [];
		foreach (static::$$array as &$arrayValue):
			$arrayValue = !empty($textStyle) ? $textStyle($arrayValue) : $arrayValue;
		endforeach;
		return static::$$array;
	}

	/**
	* Validates and returns array value
	* @param string $array
	* @param string $arrayKey
	* @param string $textStyle
	* @return string
	*/
	public static function getArrayValue (string $array=NULL, string $arrayKey=NULL, string $textStyle="strtoupper") : string
	{
		if (!isset(static::$$array)) return '';
		if (empty($arrayKey)) return '';
		if (static::validateArrayKey($array, $arrayKey))
			return !empty($textStyle) ? $textStyle(static::$$array[strtoupper($arrayKey)]) : static::$$array[strtoupper($arrayKey)];
		else
			return "";
	}

	/**
	* Generates HTML SELECT button
	* @param string $array
	* @param string $select
	* @return string
	*/
	public static function generateSelect (string $array=NULL, string $select=NULL) : string
	{
		$HTMLOutput = '';
		if (!isset(static::$$array)) return '';
		array_walk(static::$$array, function ($value, $key) use (&$HTMLOutput, $select)
		{
			$selected 	 = (strtoupper($select) == $key) ? " selected" : "";
			$HTMLOutput .= "<option value='{$key}'$selected>".ucwords($value)."</option>";
		});
		return $HTMLOutput;
	}

	/**
	* Generates HTML SELECT button for user defined array
	* @param array $array
	* @param array $selecteds
	* @return string
	*/
	public static function generateUDASelect (array $array=[], array $selecteds=[]) : string
	{
		$HTMLOutput = '';
		if (empty($array)) return '';
		array_walk($array, function ($value, $key) use (&$HTMLOutput, $selecteds)
		{
			$selected 	 = (in_array($key, $selecteds)) ? " selected" : "";
			$HTMLOutput .= "<option value='{$key}'$selected>".ucwords($value)."</option>";
		});
		return $HTMLOutput;
	}

	/**
	* Generates HTML SELECT button for custom arrays with objects
	* @param array $array
	* @param array $objects
	* @param string $select
	* @return string
	*/
	public static function generateObjSelect (array $array=[], array $objects=[], string $select=NULL) : string
	{
		$HTMLOutput = '';
		if (empty($array)) return '';
		array_walk($array, function ($value, $key) use (&$HTMLOutput, $objects, $select)
		{
			$selectKey 		= $objects[0];
			$selectKey 		= (property_exists($value, $selectKey)) ? $value->$selectKey : "";
			$selectValue 	= "";
			unset($objects[0]);
			foreach ($objects as $object):
				if (empty($selectValue))
					$selectValue = (property_exists($value, $object) && !empty($value->$object)) ? $value->$object : "";
			endforeach;
			$selectValue 	= (empty($selectValue)) ? "#NIL" : $selectValue;
			$selected 	 	= (strtoupper($select) == $selectKey) ? " selected" : "";
			$HTMLOutput 	.= "<option value='{$selectKey}'$selected>".ucwords($selectValue)."</option>";
		});
		return $HTMLOutput;
	}

	/**
	* Generates HTML RADIO button
	* @param string $array
	* @param string $select
	* @return string
	*/
	public static function generateRadio (string $array=NULL, string $select=NULL, bool $isRequired=TRUE) : string
	{
		$HTMLOutput = '';
		$id 		= 1;
		if (!isset(static::$$array)) return '';
		foreach (static::$$array as $key => $value):
			if (strpos($select, '-') !== FALSE) $select = explode("-", $select)[0];
			$dataValue 	 = "data-value='".strtoupper($value)."'";
			$checked 	 = (strtoupper($select) == $key) ? " checked='checked'" : "";
			$HTMLOutput .= "<label>";
			$HTMLOutput .= "<input name='$array' class='$array'$checked id='$array$id' $dataValue value='$key' type='radio' ";
            if ($isRequired == TRUE) $HTMLOutput .= "required ";
			$HTMLOutput .= "/>&nbsp;".strtoupper($value)."</label>"; $id++;
		endforeach;
		return $HTMLOutput;
	}
}
