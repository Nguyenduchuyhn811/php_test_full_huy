<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Config\Services;
use App\Models\GetProduct;
use App\Models\GetProductType;
use App\Models\GetNews;
use App\Models\GetPanertop;
use App\Models\GetDistric;
use App\Models\GetCity;
use App\Models\GetWard;

class Administration extends Controller
{
    public $session;
    public $validate;
    public $getProduct_Point;
    public $getProductType_Point;
    public $getNews_Point;
    public $getPaner_Point;
    public $data;
    public $paper;
    public $baseUrl;


    public function __construct()
    {
        // parent::__construct();
        helper('url', 'form');
        // $this->session->model("v2bnc002420");
        // $this->session = \Config\Service::session();
        // $this->validate =\Config\Service::validation();
        $this->getProduct_Point = new GetProduct();
        $this->getProductType_Point= new GetProductType();
        $this->getNews_Point= new GetNews();
        $this->getPaner_Point= new GetPanertop();
    }
    public function pageSplit_controllers()
    {
    	if (empty($_GET['page']) || !isset($_GET['page'])) {
			$_GET['page'] = 1;
		}
		$huy = $_GET['page'];
		$per_page = 10;

		if ($huy == 1) {
			$start = 0;
		}else if($huy > 1 ){
			$start = ($huy-1)*$per_page;
		}
		// echo $start;
		// echo'<br>';


		if (!empty($_GET['search_name'])) {
			$a = $_GET['search_name'];
			if (!empty($_GET['type'])) {
				$data['products'] = $this->getProduct_Point->getProductAll();
        		$data['products_search'] = $this->getProduct_Point->getProductByListType();
				$b = $_GET['type'];
				$sql      = "SELECT * FROM products WHERE name LIKE '%$a%' AND type = $b ORDER BY id DESC LIMIT $start, $per_page";

				$sqlsearch= "SELECT * FROM products WHERE name LIKE '%$a%' AND type = $b ORDER BY id DESC";
				$products_search = mysql($sqlsearch);
			}else{
				$sql      = "SELECT * FROM products WHERE name LIKE '%$a%' ORDER BY id DESC LIMIT $start, $per_page";

				$sqlsearch= "SELECT * FROM products WHERE name LIKE '%$a%' ORDER BY id DESC";
				$products_search = mysql($sqlsearch);
				// echo count($products_search);
			}
		}else{
			if (!empty($_GET['type'])) {
				$b = $_GET['type'];
				$sql      = "SELECT * FROM products WHERE type = $b ORDER BY id DESC LIMIT $start, $per_page";

				$sqlsearch= "SELECT * FROM products WHERE type = $b ORDER BY id DESC";
				$products_search = mysql($sqlsearch);
				// echo "<pre>";
				// print_r($products_search);
			}else{
				$sql      = "SELECT * FROM products ORDER BY id DESC LIMIT $start, $per_page";
				// echo $sql;
			}
		}
		$products = mysql($sql);
		// echo count($products)."<br>";

		$result_all_product = "SELECT * FROM products ORDER BY id DESC";
		$all_products = mysql($result_all_product);
		// echo count($all_products);
		$num_page = (int)(count($all_products)/$per_page);
		// echo "<br>" . $num_page;
		// echo "<br>" . $num_page*$per_page;

		if (empty($_GET['type'])) {
			$idtype = '';
		}else{
			$idtype = $_GET['type'];
		}
    }
}