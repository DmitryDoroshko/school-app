<?php
$link = mysqli_connect("localhost", "root", "");
if($link) {
    echo "Connection with the server has been created", "<br>";
} else {
    echo "No connection to the server","<br>";
}
$db = "MySiteDB";
$query = "CREATE DATABASE $db";
$create_db = mysqli_query($link, $query);

if ($create_db) {
    echo "database $db has been successfully created.","<br>";
} else {
    echo "database hasn't been created...", "<br>";
}




