<?php
    class Users extends Controller{
        public function __construct(){

        }

        public function register(){
            //check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form

                //Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init data
                $data=[
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }

                //Validate name
                if(empty($data['name'])){
                    $data['name_err'] = 'Please enter name';
                }

                //Validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                //Validate confirm_password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please confirm password';
                } else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                //make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    //Validated
                    die('SUCCESS');
                } else {
                    // Load view with errors
                    $this->view('users/register', $data);
                }
            }else{
                //Init data
                $data=[
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //Load view
                $this->view('users/register', $data);
            }
        }

        public function login(){
            //check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form
            }else{
                //Init data
                $data=[
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                //Load view
                $this->view('users/login', $data);
            }
        }
    }