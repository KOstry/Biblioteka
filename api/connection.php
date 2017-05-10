<?php

$server = 'localhost';
$username = 'root';
$password = 'coderslab';
$dbname = 'library';

spl_autoload_register(function ($class){

    require_once 'src/'.$class.'.php';
}
);

$conn = new mysqli($server, $username, $password, $dbname);

if( $conn->connect_error){
    die('Coś się popsuło...'.$conn->connect_error);
    //tutaj nie dojdzie i nic dalej sie nie wykona
}
else{
    echo 'Udało się połączyć<br>';
}
