<?php
require_once('../private/initialize.php');

if(is_post_request()) {

    $selector = $_POST['selector'] ?? '';
    $validator = $_POST['validator'] ?? '';
    $password = $_POST['pass'] ?? '';
    $passwordRepeat = $_POST['pass-repeat'] ?? '';
    $currentDate = date("U");

    $res = select_pwd($selector,$currentDate);
    if(!$res){
        echo "You need to re-submit1";
        exit();
    }
    else{
        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin,$res['pwdResetToken']);

        if($tokenCheck === false)
        {
            echo "You need to re-submit2";
            exit();
        }
        elseif ($tokenCheck === true)
        {
            $tokenEmail = $res['pwdResetEmail'];
            select_email($tokenEmail);
            if(!$res){
                echo "You need to re-submit your reset request";
                exit();
            }
            else{
                update_pass($password,$tokenEmail);
                echo "password changed";
            }
        }
    }


}
?>