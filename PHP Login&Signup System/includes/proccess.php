<?php

    if(isset($_POST['signup'])){

        $signup_error = '';
        $username = check_input_username($_POST['username']);
        $email = check_input_email($_POST['email_address']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        
        $sql_u = $conn->prepare("SELECT username FROM users WHERE username = ?");
        $sql_u->execute(array($username));
        $res_u = $sql_u->rowCount();
        $sql_e = $conn->prepare("SELECT email FROM users WHERE email=?");
        $sql_e->execute(array($email));
        $res_e = $sql_u->rowCount();
        $pwd = check_input_text($password);
        $r_pwd = check_input_pwd($confirm_password);
        $r_pwd = check_input_rpwd($password, $confirm_password);        

        
        if(empty($username)){
            $signup_error = '<div class="alert alert-danger d-flex justify-content-center align-items-center">Username Error</div>';
        }else if(strlen($username) < 5){
            $signup_error = '<div class="alert alert-danger d-flex justify-content-center align-items-center">Username must be more than 5 characters</div>';
        }else if($res_u > 0){
            $signup_error = '<div class="alert alert-danger d-flex justify-content-center align-items-center">Username already exist</div>';
        }else if(empty($email)){
            $signup_error = '<div class="alert alert-danger d-flex justify-content-center align-items-center">Email address Error</div>';
        }else if($res_e > 0){
            $signup_error = '<div class="alert alert-danger d-flex justify-content-center align-items-center">Email address already exist</div>';
        }else if(empty($pwd)){
            $signup_error = '<div class="alert alert-danger d-flex justify-content-center align-items-center">please enter a valid password !</div>';
        }else if(empty($r_pwd)){
            $signup_error = '<div class="alert alert-danger d-flex justify-content-center align-items-center">please enter a valid password !</div>';
            return;
        }else {
            $hashed_pass = md5($r_pwd);
            $reg_date    = date("Y-m-d H:i:s");
            $sql = "INSERT INTO users (username, email, password, reg_date) VALUES ('$username', '$email', '$hashed_pass', '$reg_date')";
            if($conn->exec($sql)){
                header("location: /login.php");
                exit();
            }else {
                $signup_error = `<div class="alert alert-danger">something went wrong !</div>`;
                return ;
            }
        }
    }

    if(isset($_POST['login'])){
        $login_error = '';
        $username = check_input_username($_POST['username']);
        $password = check_input_text($_POST['password']);
        if(empty($username)){
            $login_error = '<div class="alert alert-danger d-flex justify-content-center align-items-center">username or password is incorrect !</div>';
        }else if(empty($password)){
            $login_error = '<div class="alert alert-danger d-flex justify-content-center align-items-center">username or password is incorrect !</div>';
        }
        $sql = $conn->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $sql->execute(array($username, md5($password)));
        $res = $sql->rowCount();
        if($res == 1){
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $row['id'];
            header("location: /index.php");
            exit();
        }else {
            $login_error = '<div class="alert alert-danger d-flex justify-content-center align-items-center">username or password is incorrect !</div>';
            return ;
        }                
    }