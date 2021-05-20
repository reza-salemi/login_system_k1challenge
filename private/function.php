<?php

    function url_for($script_name)
    {
        if($script_name[0] != '/')
        {
            $script_name = "/" . $script_name;
        }
        return WWW_ROOT . $script_name;
    }

    function u($string="")
    {
        return urlencode($string);
    }

    function h($string="")
    {
        return htmlentities($string);
    }

    function redirect_to($location)
    {
        header("Location:" . $location);
        exit();
    }

    function is_post_request()
    {
        return ($_SERVER['REQUEST_METHOD'] == 'POST');
    }

function display_errors($errors=array()) {
    $output = '';
    if(!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

function hash_pass($password)
{
    $options = [
        'cost' => 12,
    ];
    $result = password_hash($password, PASSWORD_BCRYPT, $options);
    return $result;
}


