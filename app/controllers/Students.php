<?php

class Students extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('Student');
    }

    public function index(){
        $data = [];

        $this->view('students/index', $data);
    }

    // Registration method for user
    public function register(){

        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'phone' => isset($_POST['phone']) ? trim($_POST['phone']) : '',
                'university' => isset($_POST['university']),
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
                'register_error' => '',
                'university_error' => '',
                'phone_error' => '',
            ];

            // Validate email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter email';
            } else {
                // Check if email already exists
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_error'] = 'Email already exists';
                }
            }

            // Validate first name
            if(empty($data['first_name'])){
                $data['fname_error'] = 'Please enter first name';
            }

            // Validate last name
            if(empty($data['last_name'])){
                $data['lname_error'] = 'Please enter last name';
            }

            // Validate last name
            if(empty($data['username'])){
                $data['username_error'] = 'Please enter username';
            }

            // Validate password
            if(empty($data['password'])){
                $data['pass_error'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6){
                $data['pass_error'] = 'Password must be at least 6 characters';
            }

            // Validate confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_pass_error'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_pass_error'] = 'Passwords do not match';
                }
            }

            // Check if errors are empty
            if( empty($data['email_error']) &&
                empty($data['fname_error']) &&
                empty($data['lname_error']) &&
                empty($data['pass_error']) &&
                empty($data['confirm_pass_error']) &&
                empty($data['username_error']) ){
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if($this->userModel->register($data)){
                    flash('register_success', 'You are now registered and you can log in');
                    redirect('students/login');
                } else{
                    $data['register_error'] = 'Something went wrong. Please try again.';
                    $this->view('students/register', $data);
                }
            } else {
                // Load view with errors
                $this->view('students/register', $data);
            }
        }else {
            // Init data
            $data = [
                'first_name' => '',
                'last_name' => '',
                'username' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'university' => '',
                'phone' => '',
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
                'register_error' => '',
                'university_error' => '',
                'phone_error' => '',
            ];

            // Load view
            $this->view('students/register', $data);
        }
    }

    // Login method
    public function login() {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'login_credential' => trim($_POST['login_credential']),
                'password' => trim($_POST['password']),
                'login_credential_error' => '',
                'pass_error' => '',
            ];

            // Validate email/username
            if(empty($data['login_credential'])){
                $data['login_credential_error'] = 'Please enter email or username';
            }

            // Validate password
            if(empty($data['password'])){
                $data['pass_error'] = 'Please enter password';
            }

            //wrong  email
            if((!$this->userModel->findUserByUsername($data['login_credential'])) && (!$this->userModel->findUserByEmail($data['login_credential']))) {
                $data['login_credential_error'] = 'Username/Email does not exist';
            }

            // Check if errors are empty
            if (empty($data['login_credential_error']) &&
                empty($data['pass_error'])) {
                // Login User
                $isLoggedIn = $this->userModel->login($data['login_credential'], $data['password']);
                if (!$isLoggedIn){
                    $data['pass_error'] = 'Password is wrong. Please try again.';
                    $this->view('students/login', $data);
                }else{
                    $this->createUserSession($isLoggedIn);
                }
            } else {
                // Load view with errors
                $this->view('students/login', $data);
            }

        } else {
            // Init data
            $data = [
                'login_credential' => '',
                'password' => '',
                'login_credential_error' => '',
                'pass_error' => ''
            ];

            // Load view
            $this->view('students/login', $data);
        }
    }
}