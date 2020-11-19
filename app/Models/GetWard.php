<?php namespace App\Models;	

use CodeIgniter\Model;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Config\ConnectionDatabase;
use CodeIgniter\Validation\ValidationInterface;
 	 	


class GetWard extends Model
{
	protected $table = 'devvn_xaphuongthitran';
	public $db;
    public $id;
    public $data;
	protected $primaryKey = 'xaid';
	protected $allowedFields = ['xaid','name','type','maqh']; 
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

	//viết theo kiểu này thì khi lấy dữ liệu thì viết theo kiểu $value['giá trị']
	public function getWard()
	{
		return $this->asArray()
					->findAll();			
	}

	//viết theo kiểu này thì khi lấy dữ liệu thì viết theo kiểu $value->giá trị
	public function getWard_ID($id)
	{
		return $this->asArray()
					->where(['maqh'=>$id])
					->findAll();	
	}

	// public function getProductByListType($type)
	// {
	// 	return $this->asArray()
	// 				->where(['type'=>$type])
	// 				->findAll(); 
	// }

	// public function getProductBySearchId($id)
	// {
	// 	$sql = 'select * from products where id=' . $id;
	// 	$query = $this->db->query($sql);
	// 	return $query->getResult(); 
	// }
};

?>