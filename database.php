<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'PHP_Crud';

    $connection = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_error()) {
        echo "Error: Unable to connect to mysql <br>";
        echo "Message: ".mysqli_connect_error()."<br>";
     } // else {
    //     echo "Successfully connected";
    // }

?>