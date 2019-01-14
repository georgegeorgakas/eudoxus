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

    public function book(string $id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'stock' => $_POST['stock'],
                'stock_error' => ''
            ];

            if($data['stock'] == 0){
                $data['stock_error'] = 'We are sorry. No more books left.';
                $data['book'] = $this->pageModel->getSingleBookById($id);
                $this->view('pages/book', $data);
            }else{
                $stock = $data['stock'] +0;
                if($this->pageModel->updateUserBooks($_SESSION['id'], $id) && $this->pageModel->updateStockInBooks($stock-1, $id)){
                    redirect('users/profile/account');
                }else{
                    redirect('pages/index');
                }
            }
        }else{
            if(isset($_SESSION['id'])){
                $data['book'] = $this->pageModel->getSingleBookById($id);

                $this->view('pages/book', $data);
            }else {
                redirect('pages/index');
            }
        }
    }
}