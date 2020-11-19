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
use App\Models\GetUser;
use App\Models\GetOpp;

class Administration extends BaseController
{
    public $session;
    public $validate;
    public $getProduct_Point;
    public $getProductType_Point;
    public $getNews_Point;
    public $getPaner_Point;
    public $data;
    public $paper;
    public $load;
    public $baseUrl;


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
        $this->getUser = new GetUser();
        $this->getOpp = new GetOpp();
    }

    public function administrationLogin()
    {
        if (session('user') != '') {
            // var_dump(session('user'));die();
            return $this->response->redirect(base_url().'/welcome_page');
        }
        echo view('Views/templates/header_last');
        echo view('pages/quantri/login');
        echo view('Views/templates/footer_last');
    }

    public function administrationLogin_action()
    {
        $session=session();
        $data = $this->getUser->getAllUser();


        foreach ($data as $value) {
            if (($value['user'] == $_POST['user']) && ($value['pass'] == $_POST['pass'])) { 
                $session->setFlashdata('result_success',true);
                $session->set('isLoggedIn',true);

                $data_user = $this->getUser->where('user', $this->request->getVar('user'))  // tương đương với $_POST['user']
                                            ->first();

                $this->setUserSession($data_user);
                return $this->response->redirect(base_url().'/welcome_page');


            }else if (($value['user'] == $_POST['user']) && ($value['pass'] != $_POST['pass'])){
                $session->setFlashdata('result_fail_pass',true);
                // $session->set('isLoggedIn',false);
            }else if ($value['user'] != $_POST['user']){
                $session->setFlashdata('result_fail_user',true);
                // $session->set('isLoggedIn',false);
            }        
        }
        return $this->response->redirect(base_url().'/quantri');
    }

    public function setUserSession($data_user)
    {
        $session = session();
        // var_dump($data_user);die();
        $data_value = [
            'id' => $data_user['id'],
            'first_name' => $data_user['first_name'],
            'name' => $data_user['name'],
            'img' => $data_user['img'],
            'email' => $data_user['email'],
            'pos' => $data_user['pos'],
            'opp' => $data_user['opp'],
            'isLoggedIn' => true
        ];
        session()->set('user',$data_value);
        return true;
    }

    public function userProfile($id)
    {
        $session = session();

        $data['profile'] = $this->getUser->getUserBySearchId($id);
        foreach ($data['profile'] as $value) {
            $user = $value['user'];
            $email = $value['email'];
            $opp = $value['opp'];
            $pos = $value['pos'];
        }
        if ($this->request->getMethod() == 'post') {
            

            $rules = [
                'first_name' => 'required|min_length[2]|max_length[7]',
                'name' => 'required|min_length[3]|max_length[15]',
                'pass' => 'required|min_length[5]|max_length[20]',
                'pass_confirm' => 'matches[pass]'
            ];


            if (! $this->validate($rules)) {                               // validator là hàm quy định
                $data['validation'] = $this->validator;                 // đây là hàm trả về giá trị lỗi khi người dùng nhập ko đúng dữ liệu
            }else{
                $data_create = [
                    'id' => $id,
                    'first_name' => $this->request->getVar('first_name'),   // tương đương là $_POST['first_name']
                    'name' => $this->request->getVar('name'),
                    'user' => $user,
                    'email' => $email,
                    'opp' => $opp,
                    'pos' => $pos,
                    'pass' => $this->request->getVar('pass')
                ];
                return $this->updateUserProfile($data_create);
            }
        };

       

        echo view('Views/templates/header_last', $data);
        echo view('pages/quantri/user/userprofile');
        echo view('Views/templates/footer_last');
    }

    public function adminUpdateUser($id)
    {
        $session = session();

        $data['profile'] = $this->getUser->getUserBySearchId($id);
        $data['option_user'] = $this->getOpp->getOppTypeAll();
        foreach ($data['profile'] as $value) {
            $user = $value['user'];
            $email = $value['email'];
            $pos = $value['pos'];
        }
        if ($this->request->getMethod() == 'post') {
            

            $rules = [
                'first_name' => 'required|min_length[2]|max_length[7]',
                'name' => 'required|min_length[3]|max_length[15]',
                'pass' => 'required|min_length[5]|max_length[20]',
                'pass_confirm' => 'matches[pass]'
            ];


            if (! $this->validate($rules)) {                               // validator là hàm quy định
                $data['validation'] = $this->validator;                 // đây là hàm trả về giá trị lỗi khi người dùng nhập ko đúng dữ liệu
            }else{
                $oppresult = '';
                $opp = $this->request->getVar('opp');
                foreach ($opp as $value) {
                    if ($oppresult != '') {
                        $oppresult = $oppresult.'|'.$value;
                    }else{
                        $oppresult = $value;
                    }
                    
                }
                $data_create = [
                    'id' => $id,
                    'first_name' => $this->request->getVar('first_name'),   // tương đương là $_POST['first_name']
                    'name' => $this->request->getVar('name'),
                    'user' => $user,
                    'email' => $email,
                    'opp' => $oppresult,
                    'pos' => $pos,
                    'pass' => $this->request->getVar('pass')
                ];
                // var_dump($data_create);die();
                return $this->updateUserProfile($data_create);
            }
        };

       

        echo view('Views/templates/header_last', $data);
        echo view('pages/quantri/user/update_user');
        echo view('Views/templates/footer_last');
    }

    public function updateUserProfile($data_create)
    {   
        $session = session();
        // var_dump($data_create);die();
        $id = $data_create['id'];
        $img_user = $this->request->getFile('img_user');
       
        $data_create['img'] = $img_user->getRandomName();

        $sizeImg = $img_user->getSize();
        if ($sizeImg > 0) {
            $img_user->move('../public/img_user', $data_create['img']); 
            $this->getUser->updateuser($id,$data_create);
            $session->setFlashdata('result_success_update',true);
            return $this->response->redirect(base_url().'/welcome_page');
        }else{
            // echo "<script type='text/javascript'>alert('Kích thước ảnh không phù hợp');</script>";
            // echo "<a href='base_url()'>quay lại trang trước</a>";
            // return $this->response->redirect(site_url('/quantri/danhsach'));
        }
    }

    public function logoutUser()
    {
        session()->destroy();
        return $this->response->redirect(base_url().'/quantri');
    }









    //tạo user login
    public function administrationCreateUserPage()
    {
        $session = session();

        $data = [];
        $data['option_user'] = $this->getOpp->getOppTypeAll();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'first_name' => 'required|min_length[2]|max_length[7]',
                'name' => 'required|min_length[3]|max_length[15]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]', // email phải là duy nhất
                'user' => 'required|min_length[3]|max_length[50]|is_unique[user.user]',               // user cũng là duy nhất
                'pass' => 'required|min_length[5]|max_length[20]',
                'pass_confirm' => 'matches[pass]'
            ];


            if (! $this->validate($rules)) {                               // validator là hàm quy định
                $data['validation'] = $this->validator;                 // đây là hàm trả về giá trị lỗi khi người dùng nhập ko đúng dữ liệu
            }else{
                $oppresult = '';
                $opp = $this->request->getVar('opp');
                foreach ($opp as $value) {
                    if ($oppresult != '') {
                        $oppresult = $oppresult.'|'.$value;
                    }else{
                        $oppresult = $value;
                    }
                    
                }
                $data_create = [
                    'first_name' => $this->request->getVar('first_name'),   // tương đương là $_POST['first_name']
                    'name' => $this->request->getVar('name'),
                    'user' => $this->request->getVar('user'),
                    'email' => $this->request->getVar('email'),
                    'pass' => $this->request->getVar('pass'),
                    'pos' => 0,
                    'opp' => $oppresult
                ];
                return $this->administrationActionCreateUser($data_create);
            }
        };

        echo view('Views/templates/header_last',$data);
        echo view('pages/quantri/user/create_user');
        echo view('Views/templates/footer_last');
    }

    public function administrationActionCreateUser($data_create)
    {   
        $session = session();
        $img_user = $this->request->getFile('img_user');
       
        $data_create['img'] = $img_user->getRandomName();
        $sizeImg = $img_user->getSize();
        if ($sizeImg > 0) {
            $img_user->move('../public/img_user', $data_create['img']); 
            $this->getUser->create($data_create);
            $session->setFlashdata('result_success_create',true);
            return $this->response->redirect(site_url('/quantri'));
        }else{
            echo "<script type='text/javascript'>alert('Kích thước ảnh không phù hợp');</script>";
            echo "<a href='base_url()'>quay lại trang trước</a>";
            // return $this->response->redirect(site_url('/quantri/danhsach'));
        }
    }


    // welcome page sau khi người dùng đăng nhập
    public function administrationWelcomePage()   
    {      
        $data['count_product'] = 0;
        if (session('user') != '') {
            $data['user'] = session('user');
        }else{
            $data['user'] = 0;
        }

        $data['products'] = $this->getProduct_Point->getProductAll();
        
        $data['count_product'] = $this->getProduct_Point->countProduct();
        $data['alluser'] = $this->getUser->countUser();
        // $data['product_type'] = $model->getProduct_type();
        echo view('Views/templates/header_last', $data);
        echo view('pages/quantri/quantrimenu');
        echo view('pages/quantri/welcome_page');
        echo view('Views/templates/footer_last');
    }


    public function administrationListUser()   
    {      
        if (session('user') != '') {
            $data['user'] = session('user');
        }else{
            $data['user'] = 0;
        }
        $data['pagination'] = [
            'list_user' => $this->getUser->paginate(5),
            'pager' => $this->getUser->pager
        ];
        echo view('Views/templates/header_last', $data);
        echo view('pages/quantri/quantrimenu');
        echo view('pages/quantri/user/list_user');
        echo view('Views/templates/footer_last');
    }



    // quản trị sản phẩm và các mục khác trong quản trị
    public function administrationAddProduct_Controllers()   // page để người dùng nhập
    {      
        if (session('user') != '') {
            $data['user'] = session('user');
        }else{
            $data['user'] = 0;
        }

        $data['products'] = $this->getProduct_Point->getProductAll();
        $data['product_type'] = $this->getProductType_Point->getProductTypeAll();
        // $data['product_type'] = $model->getProduct_type();
        echo view('Views/templates/header_last', $data);
        echo view('pages/quantri/quantrimenu');
        echo view('pages/quantri/sanpham/quantri');
        echo view('Views/templates/footer_last');
    }

    public function administrationListProduct_Controllers()    //phần sử lí khi người dùng nhập xong
    {       
        $session = session(); 
        $pager = \Config\Services::pager();
        
        if (session('user') != '') {
            $data['user'] = session('user');
            $user = $this->getUser->getAllUser();
            foreach ($user as $value) {
                if ($data['user'] == $value['user']) {
                    $data['user']['opp'] == $value['opp'];
                }
            }
            // echo "<pre>";
            // var_dump($data['user']);die();
        }else{
            $data['user'] = 0;
        }
        

        
        // var_dump($data['user']);die();   
        $data['pagination'] = [
            'products' => $this->getProduct_Point->paginate(5),
            'pager' => $this->getProduct_Point->pager
        ];
        $data['product_type'] = $this->getProductType_Point->getProductTypeAll();
        
        echo view('Views/templates/header_last', $data);
        echo view('pages/quantri/quantrimenu');
        echo view('pages/quantri/sanpham/danhsach');
        echo view('Views/templates/footer_last');
    }

    public function administrationInsertProduct_Controllers()
    {       
        // $_POST['img']=$_FILES['img']['name'];                                          cách 1 để lấy tên ảnh add vào folder file ảnh 
        $fileimg = $this->request->getFile('img');                      //cách 2 để lấy tên ảnh add vào folder file ảnh 

        $_POST['pic'] = $fileimg->getRandomName();
        $sizeImg = $fileimg->getSize();
        if ($sizeImg > 0) {
            $_POST['status'] = 1;
            $fileimg->move('../public/img', $_POST['pic']); 
            $this->getProduct_Point->insert($_POST);
            return $this->response->redirect(site_url('/quantri/danhsach'));
        }else{
            echo "<script type='text/javascript'>alert('Kích thước ảnh không phù hợp');</script>";
            echo "<a href='base_url()'>quay lại trang trước</a>";
            // return $this->response->redirect(site_url('/quantri/danhsach'));
        }
    }

    public function administrationEditProduct_Controllers()
    {       
        if (session('user') != '') {
            $data['user'] = session('user');
        }else{
            $data['user'] = 0;
        }
        $idspedit = $this->request->uri->getSegment(3);
        $data['id_topProduct'] = $idspedit;
        $data['products'] = $this->getProduct_Point->getProductBySearchId($idspedit);
        $data['product_type'] = $this->getProductType_Point->getProductTypeAll();
        echo view('Views/templates/header_last', $data);
        echo view('pages/quantri/quantrimenu');
        echo view('pages/quantri/sanpham/quantrisuasanpham');
        echo view('Views/templates/footer_last');
    }

    public function administrationDeleteProduct_Controllers()
    {     
        if (session('user') != '') {
            $data['user'] = session('user');
        }else{
            $data['user'] = 0;
        }
        $idspxoa = $this->request->uri->getSegment(3);
        $this->getProduct_Point->delete($idspxoa);
        return $this->response->redirect(site_url('/quantri/danhsach'));
    }

    public function administrationUpdateProduct_Controllers()
    {      
        $get_img_name = $this->request->getFile('img');
        $sizeImg = $get_img_name->getSize();
        $id =  basename($_SERVER['HTTP_REFERER']);
        $t = $this->getProduct_Point->getProductBySearchId($id);
        foreach ($t as $key) {
            $_POST['id'] = (int)$key->id;
            $_POST['status'] = (int)$key->status;
            $img = $key->pic;
        }
        if ($get_img_name =='') {
            $_POST['pic'] = $img;
        }else{
            $_POST['pic'] = $get_img_name->getRandomName();
            if ($sizeImg > 0) {
                $get_img_name->move('../public/img', $_POST['pic']); 
            }
        };
        $data = array(
            'name' => $_POST['name'],
            'url' => $_POST['url'],
            'price' => (int)$_POST['price'],
            'weight' => (int)$_POST['weight'],
            'type' => (int)$_POST['type'],
            'num' => (int)$_POST['num'],
            'status' => (int)$_POST['status'],
            'pic' => $_POST['pic']
        );

        $this->getProduct_Point->updateproduct($id,$data);
        return $this->response->redirect(($_SERVER['HTTP_REFERER']));
         // fixx ajax chưa sửa xong
    }

    public function administrationUpdateStatusProduct_Controllers()
    {      
        $_POST['id'] = (int) $_POST['id']; 
        $id = $_POST['id'];
        $_POST['status'] = (int) $_POST['status'];
        $data = $_POST;
        // var_dump($_POST);die();  
        $this->getProduct_Point->updateproduct($id,$data);
    }

    
}