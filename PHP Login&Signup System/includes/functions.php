<?php



    function get_user_username($conn, $user_id){
        $sql = $conn->prepare("SELECT username FROM users where id = ?");
        $sql->execute(array($user_id));
        $count = $sql->rowCount();
        if($count > 0){
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            return $row['username'];
        }else {
            return '';
        }

    }

    
    function get_user_email($conn, $user_id){
        $sql = $conn->prepare("SELECT email FROM users where id = ?");
        $sql->execute(array($user_id));
        $count = $sql->rowCount();
        if($count > 0){
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            return $row['email'];
        }else {
            return '';
        }

    }

    //checks for signupo and login

    function check_input_text($text){
        if(!empty($text)){
            $trim = trim($text);
            $san_str = filter_var($trim, FILTER_SANITIZE_STRING);
            return $san_str;
        }
        return '';
    }
    
    function check_input_pwd($text){
        $new_text = check_input_text($text);
        if(!empty($new_text)) {
            if(strlen($new_text) >= 8) {
                return $new_text;
            }
        }
        return '';
    }
    
    function check_input_username($text){
        if(!empty($text)){
            $text = strtolower($text);
            $trim = trim($text);
            $san_str = filter_var($trim, FILTER_SANITIZE_STRING);
            if(preg_match('/^[a-zA-Z0-9_]+$/', $san_str)){
                return $san_str;
            }
        }
        return '';
    }
    
    function check_input_email($email){
        if(!empty($email)){
            $trim = trim($email);
            $san_str = filter_var($trim, FILTER_SANITIZE_EMAIL);
            return $san_str;
        }
        return '';
    }
    
    function check_input_rpwd($pwd, $r_pwd){
        if(!empty($r_pwd)){
            if($pwd === $r_pwd){
                return $r_pwd;
            }
        }
        return '';
    }