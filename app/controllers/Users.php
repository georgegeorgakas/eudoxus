<?php

class Users extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index(){
        $data = [];

        $this->view('users/index', $data);
    }

    // Registration method for user
    public function register(string $user_type){

        $universities = $this->userModel->getAllUniversities();

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
                'address' => isset($_POST['address']) ? trim($_POST['address']) : '',
                'university' => $_POST['university'],
                'type' => $user_type,
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
                'register_error' => '',
                'university_error' => '',
                'phone_error' => '',
                'address_error' => '',
            ];

            $cell = $data['university'];
            $data['university'] = $universities[$cell]->idUniversity;
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
                if($this->userModel->register($data, $user_type)){
                    flash('register_success', 'You are now registered and you can log in');
                    redirect('users/login');
                } else{
                    $data['register_error'] = 'Something went wrong. Please try again.';
                    $data['university'] = $universities;
                    $this->view('users/register', $data);
                }
            } else {
                // Load view with errors
                $data['university'] = $universities;
                $this->view('users/register', $data);
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
                'university' => isset($universities) ? $universities : '',
                'phone' => '',
                'address' => '',
                'type' => $user_type,
                'fname_error' => '',
                'lname_error' => '',
                'username_error' => '',
                'email_error' => '',
                'pass_error' => '',
                'confirm_pass_error' => '',
                'register_error' => '',
                'university_error' => '',
                'phone_error' => '',
                'address_error' => '',
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }

    // Login method
    public function login(string  $user_type = 'student') {
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
                'type' => $user_type
            ];

            // Validate email/username
            if(empty($data['login_credential'])){
                $data['login_credential_error'] = 'Please enter email or username';
            }

            // Validate password
            if(empty($data['password'])){
                $data['pass_error'] = 'Please enter password';
            }

            // Wrong  email or username
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
                    $this->view('users/login', $data);
                }else{
                    $this->createUserSession($isLoggedIn, $user_type);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }

        } else {
            // Init data
            $data = [
                'login_credential' => '',
                'password' => '',
                'login_credential_error' => '',
                'pass_error' => '',
                'type' => $user_type
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    // Create session for users
    public function createUserSession($user, $type){
        $_SESSION['username'] = $user->username;
        $_SESSION['id'] = $user->idUsers;
        $_SESSION['first_name'] = $user->name;
        $_SESSION['last_name'] = $user->surname;
        $_SESSION['email'] = $user->email;
        $_SESSION['type'] = $type;
        $_SESSION['address'] = isset($user->address) ? $user->address : '';
        $_SESSION['phone'] = isset($user->telephoneNumber) ? $user->telephoneNumber : '';
        redirect('users/profile/account');
    }

    // Logout method for users
    public function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['type']);
        unset($_SESSION['email']);
        unset($_SESSION['phone']);
        unset($_SESSION['address']);
        session_destroy();
        redirect('pages/index');
    }

    // Method to check if user is logged in.
    public function isLoggedIn(){
        if(isset($_SESSION['id'])){
            return true;
        }
        return false;
    }

    // Method for user's profile
    public function profile(string $tab = 'account') {
        if(!$this->isLoggedIn()){
            redirect('pages/index');
        }
        if($tab === 'account' || $tab === 'books'){
            $data = [
                'tab' => $tab
            ];
            $book_id = $this->userModel->getBookIdFromUser($_SESSION['id']);
            $data['book'] = $this->userModel->getBookByBookId($book_id->books_id);
            $this->view('users/profile', $data);
        }else {
            redirect('users/profile/account');
        }
    }

    public function updateDetails(){

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'last_name' => trim($_POST['last_name']),
                'phone' => trim($_POST['phone']),
                'address' => trim($_POST['address']),
                'name_error' => '',
                'last_name_error' => '',
                'phone_error' => '',
                'address_error' => '',
                'update_error' => '',
                'tab' => 'account'
            ];

            // Check name field
            if(empty($data['name'])){
                $data['name_error'] = 'Name field cannot be empty.';
            }

            // Check last name field
            if(empty($data['last_name'])){
                $data['last_name_error'] = 'Last name cannot be empty';
            }

            // Check phone number
            if(empty($data['phone'])){
                $data['phone_error'] = 'Please enter your phone number';
            } elseif (strlen($data['phone']) !== 10){
                $data['phone_error'] = 'Phone should have 10 numbers';
            } elseif (!preg_match('/^[0-9]{10}$/', $data['phone'])) {
                $data['phone_error'] = 'Phone should have only numbers';
            }

            if( empty($data['name_error']) &&
                empty($data['last_name_error']) &&
                empty($data['phone_error'])){

                // Make phone int
                $data['phone'] = $data['phone'] +0;
                if($this->userModel->updateDetails($data, $_SESSION['id'])){
                    $_SESSION['name'] = $data['name'];
                    $_SESSION['last_name'] = $data['last_name'];
                    $_SESSION['phone'] = $data['phone'];
                    $_SESSION['address'] = $data['address'];
                    flash('update_details_success', 'Your details have been updated!');
                    redirect('users/profile/account');
                }else{
                    $data['update_error'] = 'Something went wrong. Please try again';
                    $this->view('users/profile',$data);
                }
            }else{
                $this->view('users/profile', $data);
            }

        } else {
            redirect('users/profile/account');
        }
    }

    public function updatePassword(){

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'password' => trim($_POST['password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'password_error' => '',
                'new_password_error' => '',
                'confirm_password_error' => '',
                'update_error' => '',
                'tab' => 'account'
            ];

            // Check current password field
            if(empty($data['password'])){
                $data['password_error'] = 'Please provide your current password';
            }elseif (!$this->userModel->checkPasswordByUserId($data['password'], $_SESSION['id'])){
                $data['password_error'] = 'Your password is wrong. Please try again.';
            }

            // Check new password field
            if(empty($data['new_password'])){
                $data['new_password_error'] = 'Please provide your new password';
            }elseif($data['new_password'] === $data['password']){
                $data['new_password_error'] = 'Password is the same as before';
            }elseif ($this->userModel->checkPasswordByUserId($data['new_password'], $_SESSION['id'])){
                $data['new_password_error'] = 'Your new password is the same with the current.';
            }

            // Check confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_error'] = 'Please confirm your new password';
            }elseif($data['confirm_password'] !== $data['new_password']){
                $data['confirm_password_error'] = 'Passwords do not match';
            }


            if(empty($data['password_error']) && empty($data['new_password_error']) && empty($data['confirm_password_error'])){
                // Hash Password
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

                if($this->userModel->updatePassword($data['new_password'], $_SESSION['id'])){
                    flash('update_password_success', 'Your password has been updated!');
                    redirect('users/profile/account');
                }else{
                    $data['update_error'] = 'Password is the same as before. Please try again';
                    $this->view('users/profile',$data);
                }
            }else{
                $this->view('users/profile', $data);
            }

        } else {
            redirect('users/profile/account');
        }
    }

    public function updateEmail(){

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'new_email' => trim($_POST['new_email']),
                'email_error' => '',
                'new_email_error' => '',
                'update_error' => '',
                'tab' => 'account'
            ];

            // Check current email field
            if(empty($data['email'])){
                $data['email_error'] = 'Please provide your current email';
            }elseif ($data['email'] !== $_SESSION['email']){
                $data['email_error'] = 'Please enter correct your current email';
            }

            // Check new email field
            if(empty($data['new_email'])){
                $data['new_email_error'] = 'Please provide your new email';
            }elseif($data['new_email'] === $data['email']){
                $data['new_email_error'] = 'Email is the same as before';
            }elseif($this->userModel->finduserByEmail($data['new_email'])){
                $data['new_email_error'] = 'Email already exists.';
            }

            if(empty($data['email_error']) && empty($data['new_email_error'])){
                if($this->userModel->updateEmail($data['new_email'], $_SESSION['id'])){
                    $_SESSION['email'] = $data['new_email'];
                    flash('update_mail_success', 'Your e-mail has been updated!');
                    redirect('users/profile/account');
                }else{
                    $data['update_error'] = 'Your email is wrong. Please try again.';
                    $this->view('users/profile',$data);
                }
            }else{
                $this->view('users/profile', $data);
            }

        } else {
            redirect('users/profile/account');
        }
    }

    public function updateUsername(){

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'username' => trim($_POST['username']),
                'new_username' => trim($_POST['new_username']),
                'username_error' => '',
                'new_username_error' => '',
                'update_error' => '',
                'tab' => 'account'
            ];

            // Check current username field
            if(empty($data['username'])){
                $data['username_error'] = 'Please provide your current username';
            }elseif ($data['username'] !== $_SESSION['username']){
                $data['username_error'] = 'Please enter correct your current username';
            }

            // Check new username field
            if(empty($data['new_username'])){
                $data['new_username_error'] = 'Please provide your new username';
            }elseif($data['new_username'] === $data['username']){
                $data['new_username_error'] = 'Username is the same as before';
            }elseif($this->userModel->finduserByUsername($data['new_username'])){
                $data['new_username_error'] = 'Username already exists.';
            }

            if(empty($data['username_error']) && empty($data['new_username_error'])){
                if($this->userModel->updateUsername($data['new_username'], $_SESSION['id'])){
                    flash('update_username_success', 'Your username has been updated!');
                    $_SESSION['username'] = $data['new_username'];
                    redirect('users/profile/account');
                }else{
                    $data['update_error'] = 'Something went wrong. Please try again';
                    $this->view('users/profile',$data);
                }
            }else{
                $this->view('users/profile', $data);
            }

        } else {
            redirect('users/profile/account');
        }
    }

    public function updateGym(){

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'username' => trim($_POST['username']),
                'new_username' => trim($_POST['new_username']),
                'username_error' => '',
                'new_username_error' => '',
                'update_error' => '',
                'tab' => 'account'
            ];

            // Check current username field
            if(empty($data['username'])){
                $data['username_error'] = 'Please provide your current username';
            }elseif ($data['username'] !== $_SESSION['username']){
                $data['username_error'] = 'Please enter correct your current username';
            }

            // Check new username field
            if(empty($data['new_username'])){
                $data['new_username_error'] = 'Please provide your new username';
            }elseif($data['new_username'] === $data['username']){
                $data['new_username_error'] = 'Username is the same as before';
            }elseif($this->userModel->finduserByUsername($data['new_username'])){
                $data['new_username_error'] = 'Username already exists.';
            }

            if(empty($data['username_error']) && empty($data['new_username_error'])){
                if($this->userModel->updateUsername($data['new_username'], $_SESSION['id'])){
                    flash('update_username_success', 'Your username has been updated!');
                    $_SESSION['username'] = $data['new_username'];
                    redirect('users/profile/account');
                }else{
                    $data['update_error'] = 'Something went wrong. Please try again';
                    $this->view('users/profile',$data);
                }
            }else{
                $this->view('users/profile', $data);
            }

        } else {
            redirect('users/profile/account');
        }
    }
}