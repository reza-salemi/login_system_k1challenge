<?php
require_once ('../private/initialize.php');
if(!isset($_SESSION['username']))
{
    header("location:index.php?login_first");
}
echo "Welcome " . $_SESSION['username'];
?>