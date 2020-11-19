<?php namespace App\Validation;

use App\Models\GetUser;

class UserRules
{
	public $user;
	
	function __construct()
	{
		$this->user = new GetUser();
	}

	public function validateUser(string $str, string $fields, array $data)
	{
		$user = $this->user->where('user', $data['user'])
						   ->first();

		if (!$user) {
			return false;
		}
		return password_verify($data['pass'], $user['pass']);
	}

}

?>	