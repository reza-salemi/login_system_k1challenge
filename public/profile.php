<?php
require_once ('../private/initialize.php');
if(!isset($_SESSION['username']))
{
    echo 'first you should login';
}
echo "Welcome " . $_SESSION['username'];
?>