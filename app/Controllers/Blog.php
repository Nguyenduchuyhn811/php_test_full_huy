<?php namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\BlogType;

class Blog extends BaseController
{

    function post($products){
           echo view('Views/templates/header');
            echo view('blog/post');
            echo view('Views/templates/footer'); 
    }

    function create(){
        helper('form');
        $model = new BlogModel();  
        $type = new BlogType(); 
        $data['type'] = $type->getTypes();

        if (! $this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'price'  => 'required',
            'pic'  => 'required',
            'num'  => 'required',
            'url'  => 'required',
            'weight'  => 'required',
            'type'  => 'required'
        ])){
            echo view('Views/templates/header',$data);
            echo view('blog/create');
            echo view('Views/templates/footer'); 
        }else{
            $model -> save([
                'name' => $this->request->getVar('name'),
                'price'  => $this->request->getVar('price'),
                'pic'  => $this->request->getVar('pic'),
                'num'  => $this->request->getVar('num'),
                'url'  => url_title($this->request->getVar('url')),
                'weight'  => $this->request->getVar('weight'),
                'type'  => $this->request->getVar('type')
            ]);


            $session = \Config\Services::session();
            $session->setFlashdata('success', 'New post was created');  

            return redirect()->to('/');
        }
    }

    // public function view($page = 'home')
    // {
    // }
}