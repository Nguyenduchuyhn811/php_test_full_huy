<?php namespace App\Models;	

use CodeIgniter\Model;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Config\ConnectionDatabase;
use CodeIgniter\Validation\ValidationInterface;
 	 	


class GetProductType extends Model
{
	protected $table = 'product_type';
	public $db;
    public $id;
    public $data;
	protected $primaryKey = 'id';
	protected $allowedFields = ['id','name','shortened_name','discription','status','parent_id']; 
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

	public function getProductTypeAll()
	{
		$sql = 'select * from product_type';
		$query = $this->db->query($sql);
		return $query->getResult();			
	}

	public function getProductTypeBySearchId($id)
	{
		$sql = 'select * from product_type where id=' . $id;
		$query = $this->db->query($sql);
		return $query->getResult(); 
	}
};

?>