<?php namespace App\Models;	

use CodeIgniter\Model;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Config\ConnectionDatabase;
use CodeIgniter\Validation\ValidationInterface;
 	 	


class GetOpp extends Model
{
	protected $table = 'idopp';
	public $db;
    public $id;
    public $data;
	protected $primaryKey = 'id';
	protected $allowedFields = ['id','opp']; 
	protected $validationRules = [];
	protected $validationMessages = []; 
	protected $skipValidation = false;

	public function __construct()
	{
		parent::__construct();
		$this->db= \Config\Database::connect(); 
	} 

	public function create($data)
	{
		$query = $this->db->table($this->table)->insert($data);
		return $this->db->insertID();	
	}

	// public function update($id = null, $data = null)
	// {
	// 	return $this->db->table($this->table)->update($id, $data);
	// }

	// public function delete($id)
	// {
	// 	return $this->table($this->table)->delete(['id'=>$id]);
	// }

	public function getOppTypeAll()
	{
		return $this->asArray()
					->findAll();			
	}

	public function getOppTypeBySearchId($id)
	{
		return $this->asArray()
					->where(['id'=>$id])
					->findAll(); 
	}
};

?>