<?php
//Connect to the database
$database = new mysqli("localhost", "root", "", "registration");
if($database->error) {
    echo "Could not connect to the database: ".$database->error;
} 


?>