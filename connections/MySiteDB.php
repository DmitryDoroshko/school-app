<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$localhost = "localhost";
$db = "MySiteDB";
$user = "admin@localhost";
$password = "admin";

$link = mysqli_connect($localhost, $user, $password) or trigger_error(mysql_error(),E_USER_ERROR);
//trigger_error виводить на сторінку повідомлення про помилку. Перший параметр- повідомлення про помилку
// у рядковому вигляді, в даному випадку повертається функція mysql_error (), другий-числовий код / / помилки (майже завжди використовується значення константи E_USER_ERROR, Рівне 256)

// Наступні рядки необхідні для того, щоб MySQL сприймав кирилицю.
// Параметри функції mysqli_query (): ідентифікатор з'єднання з сервером і запит SQL

mysqli_query($link, "SET NAMES cp1251;") or die(mysql_error()); mysqli_query($link, "SET CHARACTER SET cp1251;") or die(mysql_error());




