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
	 * Create new user.
	 * @param \stdClass $userObject
	 * @return bool
	 */
	public function newUser(\stdClass $userObject) : bool
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
	 * @return bool
	 */
	public function updateLastLogin() : bool
	{
		$this->lastLogin = date("Y-m-d H:i:s");
		return $this->save() ? TRUE : FALSE;
	}

	/**
	 * Change user password.
	 * @param string $newPassword
	 * @return bool
	 */
	public function changeUserPassword(string $newPassword) : bool
	{
		$this->password 	= Encrypt::passwordEncrypt($newPassword);
		$this->lastUpdated 	= date("Y-m-d H:i:s"); 
		return $this->save() ? TRUE : FALSE;
	}

	/**
	 * Validate user password.
	 * @param string $password
	 * @return bool
	 */
	public function validateUser(string $password) : bool
	{
		return (!Encrypt::passwordCheck($password, $this->password)) ? FALSE : TRUE;
	}

	/**
	 * Users get method to demonstrate with paginate.
	 * @param int $page
	 * @param int $limit
	 * @param string $order
	 * @return bool
	 */
	public static function getUsers(int $page=1, int $limit=5, string $order="DESC")
	{
		$order 		= static::validateOrder($order);
		$sqlQuery 	= "SELECT * FROM ".static::getTableName();
		paginate()->setPagination($page, $limit, 1, count(static::findBySql($sqlQuery)));
		$sqlQuery 	.= " ORDER BY id {$order} ".paginate()->getSQLLimitQuery();
		return static::findBySql($sqlQuery);
	}
}
