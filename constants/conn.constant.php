<?php
$conn = new mysqli("localhost", "root", "", "licensemgmt");
if($conn->connect_error){
    echo "Something went Wrong while connecting to Server";
    die();
}

?>