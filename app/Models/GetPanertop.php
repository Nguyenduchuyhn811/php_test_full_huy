<?php namespace App\Models;	

use CodeIgniter\Model;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Config\ConnectionDatabase;
use CodeIgniter\Validation\ValidationInterface; 	 	


class GetPanertop extends Model
{
	protected $table = 'panertop';

	 

	public function getPanertop($panertop = null)
	{
		if (!$panertop) {
			return $this->findAll();
		}

		return $this->asArray()
					->where(['panertop' => $panertop])
					->first(); 
	}
};

?>