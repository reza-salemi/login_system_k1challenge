<?php
require_once ('../private/initialize.php');
$username = $_SESSION['username'] ?? '';
if(!isset($_SESSION['username']))
{
    echo 'first you should login';
    echo "<p><a href=\"index.php\">Login</a></p>";
}
else{
    echo "Welcome " .$username ;
}

?>



