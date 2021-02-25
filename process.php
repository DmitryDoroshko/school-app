<?php
$mysqli = new mysqli("localhost", "dmitry@localhost", "my-strong-password-here", "mysitedb")
or die(mysqli_error($mysqli));
mysqli_query($mysqli, "SET NAMES cp1251;") or die($mysqli->error);
mysqli_query($mysqli, "SET CHARACTER SET cp1251;") or die($mysqli->error);
session_start();

define("COUNT_OF_STUDENT_FIELDS", 11);
define("COUNT_OF_LANGUAGE_FIELDS", 2);
$update_student = false;
$update_language = false;
$student_arr = ["student_id" => 0, "class" => "", "group_" => "", "first_name" => "",
                "last_name"=>"", "patronymic"=>"", "entry_date"=>"",
                "foreign_language_code"=>"", "home_address"=>"",
                "phone_number" =>"", "mean_grade"=>""];
$language_arr = ["language_code"=>0, "language_name" =>""];
$language_id = 0;
$student_id = 0;

if (isset($_POST['save-student'])) {
    $class = $_POST['fclass'];
    $group = $_POST['fgroup'];
    $first_name = $_POST['ffirst-name'];
    $last_name = $_POST['flast-name'];
    $patronymic = $_POST['fpatronymic'];
    $entry_date = $_POST['fentry-date'];
    $foreign_language_code = $_POST['fforeign-language-code'];
    $home_address = $_POST['fhome-address'];
    $phone_number = $_POST['fphone-number'];
    $mean_grade = $_POST['fmean-grade'];

    if ($class && $group && $first_name && $last_name && $patronymic && $entry_date && $foreign_language_code && $home_address && $phone_number && $mean_grade) {
        $mysqli->query("INSERT INTO school (class, group_, first_name, last_name, patronymic, entry_date, foreign_language_code,
                    home_address, phone_number, mean_grade) VALUES ('$class', '$group', '$first_name', '$last_name',
                    '$patronymic', '$entry_date', '$foreign_language_code', '$home_address', '$phone_number', '$mean_grade')")
        or die($mysqli->error);
        $_SESSION['message'] = 'Student has been saved!';
        $_SESSION['msg_type'] = 'success';
    }
    header('location: index.php');
}

if (isset($_POST['save-language'])) {
    $language_code = $_POST['flanguage-code'];
    $language_name = $_POST['flanguage-name'];

    if ($language_code && $language_name) {
        $mysqli->query("INSERT INTO foreign_language (language_code, language_name) 
                        VALUES ('$language_code', '$language_name')") or die($mysqli->error);
        $_SESSION['message'] = "Language has been saved...";
        $_SESSION['msg_type'] = "success";
    }

    header('location: index.php');
}

if (isset($_GET['delete-student'])) {
    $delete_student = $_GET['delete-student'];
    $mysqli->query("DELETE FROM school WHERE student_id='$delete_student'") or die($mysqli->error);

    $_SESSION['message'] = 'Student has been deleted!';
    $_SESSION['msg_type'] = 'danger';

    header("location: index.php");
}

if (isset($_GET['delete-language'])) {
    $delete_language = $_GET['delete-language'];
    $mysqli->query("DELETE FROM foreign_language WHERE language_code='$delete_language'") or die($mysqli->error);
    $_SESSION['message'] = 'Language has been deleted!';
    $_SESSION['msg_type'] = 'danger';

    header("location: index.php");
}

if (isset($_GET['edit-student'])) {
    $student_arr['student_id'] = $_GET['edit-student'];
    $student_id = $_GET['edit-student'];
    $update_student = true;
    $result = $mysqli->query(sprintf("SELECT * FROM school WHERE student_id=%s", $student_arr['student_id'])) or die($mysqli->error);
    $arr = $result->fetch_assoc();
    if (count($arr) == COUNT_OF_STUDENT_FIELDS) {
        $student_arr = array_replace([], $arr);
        var_dump($student_arr);
    }
}

if (isset($_GET['edit-language'])) {
    $language_arr['language_code'] = $_GET['edit-language'];
    $language_id = $_GET['edit-language'];

    $update_language = true;
    $result = $mysqli->query(sprintf("SELECT * FROM foreign_language WHERE language_code=%s", $language_arr['language_code'])) or die($mysqli->error);
    $arr = $result->fetch_assoc();
    if (count($arr) == COUNT_OF_STUDENT_FIELDS) {
        $language_arr = array_replace([], $arr);
        var_dump($language_arr);
    }
}

if (isset($_POST['update-student'])) {
    $student_id = $_POST['student-id'];
    $class = $_POST['fclass'];
    $group = $_POST['fgroup'];
    $first_name = $_POST['ffirst-name'];
    $last_name = $_POST['flast-name'];
    $patronymic = $_POST['fpatronymic'];
    $entry_date = $_POST['fentry-date'];
    $foreign_language_code = $_POST['fforeign-language-code'];
    $home_address = $_POST['fhome-address'];
    $phone_number = $_POST['fphone-number'];
    $mean_grade = $_POST['fmean-grade'];

    if ($student_id) {
        $student_arr['student_id'] = $student_id;
        $mysqli->query("UPDATE school 
                            SET class='$class', group_='$group', first_name='$first_name', last_name='$last_name', 
                                patronymic='$patronymic', entry_date='$entry_date', foreign_language_code='$foreign_language_code',
                                home_address='$home_address', phone_number='$phone_number', mean_grade='$mean_grade'
                            WHERE student_id=$student_id")
        or die($mysqli->error);

        $_SESSION['message'] = 'Student has been updated...';
        $_SESSION['msg_type'] = 'warning';
    }
    header("location: index.php");
}

if (isset($_POST['update-language'])) {
    $foreign_language_code = $_POST['flanguage-code'];
    $foreign_language_name = $_POST['flanguage-name'];
    $language_id = $_POST['language-id'];

    if (!empty($foreign_language_code)) {
        $language_arr['language_code'] = $foreign_language_code;
        $mysqli->query("UPDATE foreign_language SET language_name='$foreign_language_name', language_code=$foreign_language_code 
                        WHERE language_code=$language_id") or die($mysqli->error);
        $_SESSION['message'] = 'Language has been updated...';
        $_SESSION['msg_type'] = 'warning';
    }
    header("location: index.php");

}