<?php
    session_start();
    function validate_user($users)
    {
        $errors = [];


        // user_name
        if (is_blank($users['username']))
        {
            $errors[] = "username cannot be blank.";
        }

        if (!has_valid_email_format($users['email']))
        {
            $errors[] = "Email in not valid";
        }
        if(!has_unique_email($users['email'])){
            $errors[] = "email must be unique";
        }
        if(!has_unique_user($users['username'])){
            $errors[] = "user name must be unique";
        }

        return $errors;
    }


    function insert_user($users)
    {
        global $db;

        $errors = validate_user($users);
        if(!empty($errors))
        {
            return $errors;
        }

        $password = hash_pass($users['password']);

        $sql = "INSERT INTO user_tbl ";
        $sql .= "(username,password,first_name,";
        $sql .= "last_name,email,mobile_number) ";
        $sql .= "VALUES (";
        $sql .="'" . db_escape($db, $users['username']) . "',";
        $sql .="'" . db_escape($db, $password) . "',";
        $sql .="'" . db_escape($db, $users['firstname']) . "',";
        $sql .="'" . db_escape($db, $users['lastname']) . "',";
        $sql .="'" . db_escape($db, $users['email']) . "',";
        $sql .="'" . db_escape($db, $users['number']) . "'";
        $sql .=")";
        $result = mysqli_query($db,$sql);

        if($result)
        {
            return true;
        }
        else{
            mysqli_errno($db);
            db_disconnect($db);
            exit();
        }

    }

    function select_user($users)
    {
        global $db;

        $sql = "SELECT * FROM user_tbl ";
        $sql .= "WHERE username = '" .db_escape($db,$users['username']). "'";
        $row = mysqli_query($db,$sql);
        $result = mysqli_fetch_assoc($row);
        if (password_verify($users['password'], $result['password']))
        {
            $_SESSION['username'] = $result['username'];
            header("location:profile.php");
        }
        else{
            header("location:profile.php?login=error");
        }

    }

    function select_email($email)
    {
        global $db;

        $sql = "SELECT * FROM user_tbl ";
        $sql .= "WHERE email='". db_escape($db,$email) ."'";
        $row = mysqli_query($db,$sql);
        $result = mysqli_fetch_assoc($row);
        return $result;
    }
?>