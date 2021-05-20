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
function has_unique_email($email) {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE email='" . db_scape($db,$email) . "'";

    $email_set = mysqli_query($db, $sql);
    $email_count = mysqli_num_rows($email_set);

    return $email_count === 0;
}



