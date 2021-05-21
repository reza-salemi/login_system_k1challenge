<?php

// is_blank('abcd')
// * validate data presence
// * uses trim() so empty spaces don't count
// * uses === to avoid false positives
// * better than empty() which considers "0" to be empty

function is_blank($value)
{
    return !isset($value) || trim($value) === '';
}


function has_valid_email_format($value)
{
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
}

function has_valid_mobile_format($value)
{
    $mobile_regex = "/^(\+98|0098|98|0)?9\d{9}$/i";
    return preg_match($mobile_regex, $value) === 1;
}

function has_unique_email($email)
{
    global $db;

    $sql = "SELECT * FROM user_tbl ";
    $sql .= "WHERE email='" . db_escape($db,$email) . "'";

    $email_set = mysqli_query($db, $sql);
    $email_count = mysqli_num_rows($email_set);

    return $email_count === 0;
}

function has_unique_user($users)
{
    global $db;

    $sql = "SELECT * FROM user_tbl ";
    $sql .= "WHERE username='" . db_escape($db,$users) . "'";

    $user_set = mysqli_query($db, $sql);
    $user_count = mysqli_num_rows($user_set);

    return $user_count === 0;
}



