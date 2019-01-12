<?php

class Pages extends Controller {
    public function __construct(){
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
}