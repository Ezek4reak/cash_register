<?php
/**
 * Created by PhpStorm.
 * User: Ezekiel
 * Date: 05-May-18
 * Time: 10:11 PM
 */
class UserController extends Controller{
    /**
     *
     */
    public function login(){
        $user = new UserModel();
        if($user->login()){
            if($_SESSION["role"] === "account"){
                header('Location:'.ROOT_URL."home/accountantHome");
            }else{
                header('Location: '.ROOT_URL);
            }
        }else{
            $this->setData(null);
            $this->setTitle('User Login!');
            $this->setView(VIEW_PATH.'user/login.php');
        }
    }

    public function logout(){
        unset($_SESSION['loggedin']);
        unset($_SESSION['id']);
        unset($_SESSION["name"]);
        unset($_SESSION["role"]);
        session_destroy();
        header('Location: '.ROOT_URL);
    }

    /*
    *Require user authentication to call this function
    */

    public function newUser(){
        $this->authenticate();//user must be logged in to execute this action
        if($_SESSION['role'] !== 'admin'){
            App::setMsg("Sorry! You are not allowed to use this module", 'error');
            $this->setTitle('Error 900!');
            return;
        }else{
            $this->setTitle('New User!');
            $this->setView(VIEW_PATH.'user/user_form.php');
        }

    }

    /*
    *Require user authentication to call this function
    */
    public function addUser(){
        $this->authenticate();//user must be logged in to execute this action
        if($_SESSION['role'] !== 'admin'){
            App::setMsg("Sorry! You are not allowed to use this module", 'error');
            $this->setTitle('Error 900!');
            return;
        }
            
        $user = new UserModel();
        $addUser = $user->addUser();
        if ($addUser === true) {
            App::setMsg('User Created Successfully!!!', 'success');
            $this->setTitle('Success!');
        } else {
            App::setMsg($addUser, 'error');
            $this->setTitle('Error 505!');
        }
    }
}