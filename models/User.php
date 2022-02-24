<?php
    class UserModel extends Model{
        /**
         * @return bool
         */
        public function login(){
            if(isset($_POST['login'])){
                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $this->query('SELECT * FROM users WHERE user_name = :username');
                $this->bind(':username', $post['username']);
                $row = $this->single();
                if (password_verify($post["password"], $row["password"]))
                {
                    $_SESSION['loggedin'] = true;
                    $_SESSION["name"] = $row["user_name"];
                    $_SESSION["role"] = $row["role"];
                    return true;
                }else{
                    App::setMsg('Invalid Username Or Password!', 'error');
                }
            }else{
                return false;
            }
        }

        public function addUser()
        {
            if(isset($_POST['userForm'])){
                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if($post['password'] != $post['verify_password']){
                    return 'Password and Password Confirmation did not match!';
                }
                $this->query('SELECT * FROM users WHERE user_name = :user_name');
                $this->bind(':user_name', $post['user_name']);
                $row = $this->single();
                if($row){
                    return 'UserNmae Alread Exist In The DataBase, Try Another!';
                }
                $password = password_hash($post['password'], PASSWORD_DEFAULT);
                $this->query('INSERT INTO users (user_name, password, role) 
                                              VALUES (:user_name, :password, :role )');
                $this->bind(':user_name', $post['user_name']);
                $this->bind(':password', $password);
                $this->bind(':role', $post['role']);
                if($this->execute()){
                    return true;
                }else{
                    return $this->errorMsg();

                }
                return "Form not submitted";
            }
        }
    }