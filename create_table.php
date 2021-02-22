<?php
$query1 = "
        CREATE TABLE foreign_language (
        language_code INT NOT NULL,
        PRIMARY KEY (language_code),
        language_name VARCHAR(50) NOT NULL);";
$query2 =" CREATE TABLE school
        (student_id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY (student_id), 
        class VARCHAR(30) NOT NULL,
        group_ VARCHAR(30) NOT NULL,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        patronymic VARCHAR(30) NOT NULL,
        entry_date DATE NOT NULL,
        foreign_language_code INT NOT NULL, 
        FOREIGN KEY fk_foreign_language_code(foreign_language_code)
        REFERENCES foreign_language(language_code)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
        home_address VARCHAR(50) NOT NULL,
        phone_number VARCHAR(50) NOT NULL,
        mean_grade INT NOT NULL);
        ";

$link = mysqli_connect('localhost', 'admin', 'admin');
$db = "MySiteDB";
$select = mysqli_select_db($link, $db);
if ($select) {
    echo "Db has been successfully selected.", "<br>";
} else {
    echo "Db hasn't been selected...";
}

$create_tbl = mysqli_query($link, $query1);
if ($create_tbl){
    echo " Table foreign_language has been successfully created...", "<br>";
} else {
    echo "Table foreign_language hasn't been created...";
}

$create_tbl = mysqli_query($link, $query2);
if ($create_tbl){
    echo " Table school has been successfully created...", "<br>";
} else {
    echo "Table school hasn't been created...";
}




