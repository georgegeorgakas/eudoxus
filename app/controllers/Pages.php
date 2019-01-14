<?php

class Pages extends Controller {
    public function __construct(){
        $this->pageModel = $this->model('Page');
    }

    public function index(){
        $data = [];

        $this->view('pages/index', $data);
    }

    public function secretary(){
        $data = [
            'title' => 'About Us'
        ];

        $this->view('pages/secretary', $data);
    }

    public function announcements(){
        $data=[];

        $this->view('pages/announcements', $data);
    }

    public function login_type(){
        $data = [];

        $this->view('pages/login_type', $data);
    }

    public function register_type(){
        $data = [];

        $this->view('pages/register_type', $data);
    }

    public function search(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'value' => trim($_POST['search'])
            ];

            $data['result'] = $this->pageModel->getAllBooksBySearch($data['value']);

            if(empty($data['result'])){
                $data['empty'] = 1;
            }else {
                $data['empty'] = 0;
            }
            $this->view('pages/search',$data);
        }else{
            $data = [
                'empty' => 0
            ];

            $this->view('pages/search',$data);
        }
    }


}