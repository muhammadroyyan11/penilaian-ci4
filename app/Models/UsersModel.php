<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
	protected $table      = 'users';

	protected $primaryKey = 'id';

	protected $returnType = 'array';

	protected $allowedFields = ['name', 'phone', 'email', 'address', 'username'];
}		