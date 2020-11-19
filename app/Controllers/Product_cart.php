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

class Product_cart extends Controller
{
    public $session;
    public $validate;

    public $getProduct_Point;
    public $getProductType_Point;
    public $getNews_Point;
    public $getPaner_Point;

    public $getCity_Point;
    public $getDistric_Point;
    public $getWard_Point;

    public $data;
    public $paper;
    public $baseUrl;
    // public $list_array = [];

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
        $this->getCity_Point= new GetCity();
        $this->getDistric_Point= new GetDistric();
        $this->getWard_Point= new GetWard();
    }

    // tong tien page (phần bộ máy xử lía)
    public function tamtongtien()
    {       
        $session = session();

        $id = $this->request->uri->getSegment(2);
        $op = $this->request->uri->getSegment(3);
        $val = $this->getProduct_Point->getProductBySearchId($id);

        $item = array(
            'id' => $val[0]['id'],
            'name' => $val[0]['name'],
            'pic' => $val[0]['pic'],
            'price' => $val[0]['price'],
            'quantity' => 1                                              //quantity nghĩa là số lượng
        );
        if ($session->has('cart')) {
            $cart = array_values(session('cart'));
            $check = $this->exists($id);              // kiểm tra xem trong giỏ hàng đã có sẵn sản phẩm chưa, nếu có thì +1 số lượng
            if ($check == -1) {
                array_push($cart, $item);
            }else{
                $cart[$check]['quantity']++;
            }
            $session->set('cart', $cart);   
        }else{
            $cart = array($item);
            $session->set('cart', $cart);
        }
        return $this->response->redirect(base_url('/tongtien'));
    }


    //hiện sản phẩm đã chọn 
    public function exists($id)
    {       
        $items = array_values(session('cart'));
        // var_dump($items);die();  
        for($i = 0; $i < count($items); $i++)
        {
            if ($items[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    // tổng số lượng toàn bộ sản phẩm đã mua
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

    // tổng tiền toàn bộ sản phẩm đã mua
    public function total()
    {       
        $total = 0;
        $cart = array_values(session('cart'));
        // var_dump($items);die();  
        foreach ($cart as $value) {
            $total += $value['price'] * $value['quantity'];
        }
        return $total;
    }


    // xóa sản phẩm mua hàng
    public function remove_sanpham($id)
    {     
        $session = session();  
        echo $id;
        $check = $this->exists($id);
        $cart = array_values(session('cart'));
        unset($cart[$check]);
        $session->set('cart', $cart);
        $data =  $this->sanpham_cart_update();
        return $data;
    }

    public function sanpham_cart_update()
    {
        $session = session();
        $data['total'] = $this->total();
        $data['cart'] = array_values(session('cart'));
        // echo $data['cart'];
        echo view('pages/tongtien_update', $data);
    }

    // khi xóa sp thì trên header cũng bị xóa theo, nên chỉ việc load lại phần header_cart 
    // giỏ hàng trên header
    public function remove_header_cart()
    {
        $session = session();
        $data['total'] = $this->total();
        $data['cart'] = array_values(session('cart'));
        $data['quantity'] = $this->quantity();
        echo view('pages/header_cart_update', $data);
    }


    // trang xuất sản phẩm mua
    public function tongtien()
    {       
        $session = session();
        if (session('cart')!="") {
            $data['cart'] = array_values(session('cart'));
            $data['total'] = $this->total();
            $data['quantity'] =$this->quantity();
        }else{
            $data['cart'] = 0;
            $data['total'] = 0;
            $data['quantity'] = 0;
        }
        echo view('Views/templates/header_notindex', $data);
        echo view('pages/tongtien');
        echo view('Views/templates/footer');
    }

    public function huygiohang()
    {    
        $session = session();
        echo view('Views/templates/header_notindex');
        echo view('pages/huygiohang');
        echo view('Views/templates/footer');
    }



    // thanh toán page
    public function thanhtoan()
    {       
        $session = session();
        $data['products'] = $this->getProduct_Point->getProductAll();
        $data['product_type'] = $this->getProductType_Point->getProductTypeAll();

        $data['distric'] = $this->getDistric_Point->getDistric();
        $data['city'] = $this->getCity_Point->getCity();
        $data['ward'] = $this->getWard_Point->getWard();

        $data['cart'] = array_values(session('cart'));
        $data['total'] = $this->total();

        // $data['product_type'] = $model->getProduct_type();
        echo view('Views/templates/header_last', $data);
        echo view('pages/thanhtoan');
        echo view('Views/templates/footer_last');
    }

    public function distric($data_city_for_distric)
    {    
        $session = session();

        $data['city'] = $data_city_for_distric;
        $data['distric'] = $this->getDistric_Point->getDistric_ID($data_city_for_distric);
        echo view('pages/quantri/distric',$data);
    }

    public function commune($data_distric_for_commune)
    {    
        $session = session();

        $data['distric'] = $data_distric_for_commune;
        $data['commune'] = $this->getWard_Point->getWard_ID($data_distric_for_commune);
        echo view('pages/quantri/commune',$data);
    }
}