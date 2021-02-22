<?php

$connection = mysqli_connect("localhost", "root", "");
if ($connection) {
    echo "Connection to server has been created..."."<br>";
} else {
    echo "No connection..."."<br>";
}

$query = "GRANT ALL PRIVILEGES ON *.* TO 'admin@localhost' "
          ." IDENTIFIED BY 'admin' WITH GRANT OPTION";

$create_user = mysqli_query($connection, $query);

if ($create_user) {
    echo "User has been successfully created <br>";
} else {
    echo "User hasn't been created...<br>";
}