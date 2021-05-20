<?php

    require_once ('db_credential.php');

    function db_connect()
    {
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        return $connection;
    }

    function db_disconnect()
    {
        if(isset($connection))
        {
            mysqli_close($connection);
        }
    }

    function db_escape($connection,$sting)
    {
        return mysqli_real_escape_string($connection,$sting);
    }


