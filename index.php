<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="./script.js" defer></script>
    <title>School Application</title>
</head>
<body>
<?php
require_once "process.php";
$mysqli = new mysqli("localhost", "dmitry@localhost", "my-strong-password-here", "mysitedb")
or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM school") or die($mysqli->error);
$result_lang = $mysqli->query("SELECT * FROM foreign_language") or die($mysqli->error);

?>

<?php if (isset($_SESSION["message"])) : ?>
    <div class="alert alert-<?php echo $_SESSION["msg_type"]; ?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php
endif;
?>

<div class="container">
    <div class="justify-content-center">
        <div class="tab">
            <button class="tablinks" onclick="openAction(event, 'login')">Log In</button>
            <button class="tablinks" onclick="openAction(event, 'new-entry')">New Entry</button>
            <button class="tablinks" onclick="openAction(event, 'students-info')">Students Info</button>
            <button class="tablinks" onclick="openAction(event, 'languages-info')">Languages Info</button>
            <button class="tablinks" onclick="openAction(event, 'log-out')">Log Out</button>
        </div>

        <!-- Tab content -->
        <div id="login" class="tabcontent">
            <h3>Log In</h3>
        </div>

        <div id="new-entry" class="tabcontent new-entry__flex">
            <div class="new-entry__student">
                <h3>New Student</h3>
                <form action="process.php" method="post">
                    <input type="hidden" name="student-id" value="<?php if (!empty($student_id)) { echo $student_id;} ?>">
                    <div class="new-entry-wrap">
                        <label for="fclass">Class</label>
                        <input type="text" id="fclass" name="fclass" value="<?php
                            if (!empty($student_arr['class'])) {
                                echo $student_arr['class'];
                            }
                        ?>">
                    </div>
                    <div class="new-entry-wrap">
                        <label for="fgroup">Group</label>
                        <input type="text" id="fgroup" name="fgroup" value="<?php
                        if (!empty($student_arr['group_'])) {
                            echo $student_arr['group_'];
                        }
                        ?>">
                    </div>
                    <div class="new-entry-wrap">
                        <label for="ffirst-name">First Name</label>
                        <input type="text" id="ffirst-name" name="ffirst-name" value="<?php
                        if (!empty($student_arr['first_name'])) {
                            echo $student_arr['first_name'];
                        }
                        ?>">
                    </div>
                    <div class="new-entry-wrap">
                        <label for="flast-name">Last Name</label>
                        <input type="text" id="flast-name" name="flast-name" value="<?php
                        if (!empty($student_arr['last_name'])) {
                            echo $student_arr['last_name'];
                        }
                        ?>">
                    </div>
                    <div class="new-entry-wrap">
                        <label for="fpatronymic">Patronymic</label>
                        <input type="text" id="fpatronymic" name="fpatronymic" value="<?php
                        if (!empty($student_arr['patronymic'])) {
                            echo $student_arr['patronymic'];
                        }
                        ?>">
                    </div>
                    <div class="new-entry-wrap">
                        <label for="fentry-date">Entry Date</label>
                        <input type="text" id="fentry-date" name="fentry-date" value="<?php
                        if (!empty($student_arr['entry_date'])) {
                            echo $student_arr['entry_date'];
                        }
                        ?>">
                    </div>
                    <div class="new-entry-wrap">
                        <label for="fforeign-language-code">Foreign Language Code</label>
                        <input type="text" id="fforeign-language-code" name="fforeign-language-code" value="<?php
                        if (!empty($student_arr['foreign_language_code'])) {
                            echo $student_arr['foreign_language_code'];
                        }
                        ?>">
                    </div>
                    <div class="new-entry-wrap">
                        <label for="fhome-address">Home Address</label>
                        <input type="text" id="fhome-address" name="fhome-address" value="<?php
                        if (!empty($student_arr['home_address'])) {
                            echo $student_arr['home_address'];
                        }
                        ?>">
                    </div>
                    <div class="new-entry-wrap">
                        <label for="fphone-number">Phone Number</label>
                        <input type="text" id="fphone-number" name="fphone-number" value="<?php
                        if (!empty($student_arr['phone_number'])) {
                            echo $student_arr['phone_number'];
                        }
                        ?>">
                    </div>
                    <div class="new-entry-wrap">
                        <label for="fmean-grade">Mean Grade</label>
                        <input type="text" id="fmean-grade" name="fmean-grade" value="<?php
                        if (!empty($student_arr['mean_grade'])) {
                            echo $student_arr['mean_grade'];
                        }
                        ?>">
                    </div>
                    <?php if ($update_student == false) : ?>
                        <button type="submit" name="save-student" class="submit-btn submit-btn-student">
                            Save student
                        </button>
                    <?php else: ?>
                        <button type="submit" name="update-student" class="submit-btn submit-btn-student">
                            Update student
                        </button>
                    <?php endif; ?>
                </form>
            </div>
            <div class="new-entry__language">
                <h3>New Language</h3>
                <form action="process.php" method="post">
                    <input type="hidden" name="language-id" value="<?php if (!empty($language_id)) {echo $language_id; }?>">
                    <div class="new-entry-wrap">
                        <label for="flanguage-code">Language Code</label>
                        <input type="text" id="flanguage-code" name="flanguage-code" value="<?php if (!empty($language_arr['language_code'])) {
                               echo $language_arr['language_code']; }?>">
                    </div>
                    <div class="new-entry-wrap">
                        <label for="flanguage-name">Language Name</label>
                        <input type="text" id="flanguage-name" name="flanguage-name"
                                value="<?php if (!empty($language_arr['language_name'])) {
                                    echo $language_arr['language_name'];
                                }?>">
                    </div>
                    <?php if($update_language == false):?>
                    <button type="submit" name="save-language" class="submit-btn submit-btn-foreign-language">
                        Save language
                    </button>
                    <?php else: ?>
                    <button type="submit" name="update-language" class="submit-btn submit-btn-foreign-language">Update language</button>
                    <?php endif; ?>
                </form>
            </div>

        </div>

        <div id="students-info" class="tabcontent">
            <h3>Students Info</h3>
            <div class="row justify-content-center">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Class</th>
                        <th>Name</th>
                        <th>Foreign language code</th>
                        <th>Entry date</th>
                        <th>Home address</th>
                        <th>Phone number</th>
                        <th>Mean grade</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['class'] . '-' . $row['group_']; ?></td>
                            <td><?php echo $row['first_name'] . " " . $row['last_name'] . " " . $row['patronymic']; ?></td>
                            <td><?php echo $row['foreign_language_code']; ?></td>
                            <td><?php echo $row['entry_date']; ?></td>
                            <td><?php echo $row["home_address"]; ?></td>
                            <td><?php echo $row["phone_number"]; ?></td>
                            <td><?php echo $row["mean_grade"]; ?></td>
                            <td>
                                <a href="index.php?edit-student=<?php echo $row['student_id']; ?>" class="btn btn-info">Edit</a>
                                <a href="process.php?delete-student=<?php echo $row['student_id']; ?>"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>

        <div id="languages-info" class="tabcontent">
            <h3>Languages Info</h3>
            <div class="row justify-content-center">
                <table class="table">
                    <tr>
                        <th>Language code</th>
                        <th>Language name</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php while ($row_lang = $result_lang->fetch_assoc()): ?>
                        <tr>
                            <td> <?php echo $row_lang['language_code']; ?></td>
                            <td> <?php echo $row_lang['language_name']; ?></td>
                            <td>
                                <a href="index.php?edit-language=<?php echo $row_lang['language_code']; ?>"
                                   class="btn btn-info">Edit</a>
                                <a href="process.php?delete-language=<?php echo $row_lang['language_code']; ?>"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                </table>
            </div>
        </div>
    </div>
    <div id="log-out" class="tabcontent">
        <h3>Log Out</h3>
    </div>

</body>
</html>

<?php
/* очищаем результаты выборки */
$result->free();

/* закрываем подключение */
$mysqli->close();
?>