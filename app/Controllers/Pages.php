<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Config\Services;
use App\Models\GetProduct;
use App\Models\GetProductType;
use App\Models\GetNews;
use App\Models\GetPanertop;

class Pages extends Controller
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

    // public function getsession()
    // {    
    //     echo 'session working here';
    //     $mySession = session();
    //     $myArray = [
    //         'name' => 'huy',
    //         'email' => 'test@gmail.com',
    //         'city' => 'hanoi'
    //     ];

    //     $mySession -> set('name','huy');
    //     // var_dump($myArray);
    // }

    public function __construct()
    {
        // parent::__construct();
        helper(['url', 'form']);
        // $this->session->model("v2bnc002420");
        // $this->session = \Config\Service::session();
        // $this->validate =\Config\Service::validation();
        $this->getProduct_Point = new GetProduct();
        $this->getProductType_Point= new GetProductType();
        $this->getNews_Point= new GetNews();
        $this->getPaner_Point= new GetPanertop();
    }

    public function total()
    {       
        $total = 0;
        if (session('cart')!="") {
            $cart = array_values(session('cart'));
            foreach ($cart as $value) {
                $total += $value['price'] * $value['quantity'];
            }
            return $total;
        }else{
            return 0;
        }
        // var_dump($items);die();  
    }

    public function quantity()
    {       
        $quantity = 0;
        $cart = array_values(session('cart'));
        // var_dump($items);die();  
        foreach ($cart as $value) {
            $quantity += $value['quantity'];
        }
        return $quantity;
    }

    public function index()
    {
        // $model = new GetProduct();
        // var_dump($this->getProductType_Point);die();
        $data['products'] = $this->getProduct_Point->getProductAll_status1();
        // var_dump($data);

        // $model = new GetProductType();
        $data['product_type'] = $this->getProductType_Point->getProductTypeAll();

        // $model = new GetNews();
        $data['news'] = $this->getNews_Point->getNews();

        // $model = new GetPanertop();
        $data['panertop'] = $this->getPaner_Point->getPanertop();
        // $data['product_type'] = $model->getProduct_type();
        
        if (session('cart')!="") {
           $data['cart'] = array_values(session('cart'));
           $data['quantity'] = $this->quantity();
        }else{
            $data['quantity'] = 0;
        }
        $data['total'] = $this->total();

        echo view('Views/templates/header', $data);
        echo view('pages/index');
        // var_dump($data['products']);
        echo view('Views/templates/footer');
    }

    public function sanpham()
    {
        $pager = \Config\Services::pager();
        $data['pagination'] = [
            'products' => $this->getProduct_Point->where(['status' => 1])->paginate(4),
            'pager' => $this->getProduct_Point->pager
        ];
        $data['product_type'] = $this->getProductType_Point->getProductTypeAll(); 
        // $data['product_type'] = $model->getProduct_type();
        

        echo view('Views/templates/header_notindex', $data);
        echo view('pages/sanpham');
        echo view('Views/templates/footer');
    }

    public function chitietsp()
    {
        // $query = $this->db->get('products');
        // print_r($query);die();
        $idchitiet = $this->request->uri->getSegment(2);
        $model = new GetProduct();
        $data['products'] = $this->getProduct_Point->getProductBySearchId($idchitiet);
        // var_dump($data['products']);
        
        // die();


        $model = new GetProductType();
        $data['product_type'] = $this->getProductType_Point->getProductTypeAll(); 
        // $data['product_type'] = $model->getProduct_type();
        

        echo view('Views/templates/header_notindex', $data);
        echo view('pages/product_item');
        echo view('Views/templates/footer');
    }    
}