<?php 

    $servername = "localhost";
    $username ="root";
    $password = "";
    $basename = "projekt";

    
    $dbc = mysqli_connect($servername, $username, $password, $basename) or die();

    if($dbc){
        //echo("Connected succesfully");
    } //else error_handler("Could not connect to database $servername/$basename");

?>