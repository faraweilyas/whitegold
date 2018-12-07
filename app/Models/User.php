<?php

namespace App\Models;

use Blaze\Database\Database;
use Blaze\Encryption\Encrypt;
use Blaze\Database\DatabaseObject;

/**
* User Model Class
*/
class User extends DatabaseObject
{
	/**
	* Database Table Name
	* @var string $tableName
	*/
	protected static $tableName			= 'users';
	
	/**
	* Database Columns
	* @var array $databaseFields
	*/
	protected static $databaseFields 	= ['id', 'fullName', 'sex', 'email', 'password', 'lastUpdated', 'lastLogin', 'created'];

	/**
	* Create New User.
	* @param \stdClass $userObject
	* @return bool
	*/
	public function newUser (\stdClass $userObject) : bool
	{
		$this->fullName 		= $userObject->fullName;
		$this->sex 				= $userObject->sex;
		$this->email 			= $userObject->email;
		$this->password 		= Encrypt::passwordEncrypt($userObject->password);
		$this->lastUpdated 		= date("Y-m-d H:i:s"); 
		$this->lastLogin 		= date("Y-m-d H:i:s"); 
		$this->created 			= date("Y-m-d H:i:s");
		return $this->save() ? TRUE : FALSE;
	}

	/**
	* Update user last login date.
	* @param int $id
	* @return bool
	*/
	public function updateLastLogin (int $id) : bool
	{
		$this->id 			= $id;
		$this->lastLogin 	= date("Y-m-d H:i:s");
		return $this->save() ? TRUE : FALSE;
	}

	/**
	* Change User Password.
	* @param int $id
	* @param string $newPassword
	* @return bool
	*/
	public function changeUserPassword (int $id, string $newPassword) : bool
	{
		$this->id 			= $id;
		$this->password 	= Encrypt::passwordEncrypt($newPassword);
		$this->lastUpdated 	= date("Y-m-d H:i:s"); 
		return $this->save() ? TRUE : FALSE;
	}

	/**
	* Check if user exist
	* @param string $column
	* @param string $value
	* @return bool
	*/
	public function checkUser (string $column, string $value) : bool
	{
		static::$foundObject = static::findByColumn($column, $value);
		return (static::$foundObject) ? TRUE : FALSE;
	}

	/**
	* User login authentication.
	* @param string $password
	* @param \User $foundObject
	* @return bool
	*/
	public static function validateUser (string $password, \User $foundObject) : bool
	{
		// Check password
		return (!Encrypt::passwordCheck($password, $foundObject->password)) ? FALSE : TRUE;
	}
}
