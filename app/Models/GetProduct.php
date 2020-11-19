<?php namespace App\Models;	

use CodeIgniter\Model;
use CodeIgniter\System\BaseBuilder;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Config\ConnectionDatabase;
use CodeIgniter\Validation\ValidationInterface;
 	 	


class GetProduct extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->db= \Config\Database::connect(); 
	}

	protected $table      = 'products';
    protected $primaryKey = 'id';
    public $data;
    // public $dbcheck;

    // protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','name','price','pic','num','url','weight','type']; 

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

	public function create($data)
	{
		$query = $this->db->table($this->table)->insert($data);
		return $this->db->insertID();	
	}

	public function updateproduct(int $id,$data=array())
	{
		
	    $this->db->table($this->table)
	    		 ->where(['id'=>$id])
				 ->update($data); 
	}

	public function delete($id=null,$purge=false)
	{
		return $this->db->table($this->table)->delete(['id'=>$id]);
	}

	//viết theo kiểu này thì khi lấy dữ liệu thì viết theo kiểu $value->giá trị
	public function countProduct()
	{
		return $this->countAllResults();		
	}

	public function getProductAll()
	{
		return $this->asArray()
					->findAll();		
	}

	public function getProductAll_status1()
	{
		return $this->asArray()
					->where(['status' => 1])
					->findAll();		
	}

	public function getProductBySearchId($id)
	{
		return $this->asArray()
					->where(['id'=>$id])
					->findAll(); 
	}

	public function getProductByListType($type)
	{
		return $this->asArray()
					->where(['type'=>$type])
					->findAll(); 
	}

	// public function getProductBySearchId($id)
	// {
	// 	$sql = 'select * from products where id=' . $id;
	// 	$query = $this->db->query($sql);
	// 	return $query->getResult(); 
	// }
};

?>