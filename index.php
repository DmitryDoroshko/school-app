<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styles.css">
    <script src="./script.js" defer></script>
    <title>School Application</title>
</head>
<body>

<div class="container">
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
            <form action="./new-student">
                <div class="new-entry-wrap">
                    <label for="fstudent-id">Student Id</label>
                    <input type="text" id="fstudent-id" name="fstudent-id">
                </div>
                <div class="new-entry-wrap">
                    <label for="fclass">Class</label>
                    <input type="text" id="fclass" name="fclass">
                </div>
                <div class="new-entry-wrap">
                    <label for="fgroup">Group</label>
                    <input type="text" id="fgroup" name="fgroup">
                </div>
                <div class="new-entry-wrap">
                    <label for="ffirst-name">First Name</label>
                    <input type="text" id="ffirst-name" name="ffirst-name">
                </div>
                <div class="new-entry-wrap">
                    <label for="flast-name">Last Name</label>
                    <input type="text" id="flast-name" name="flast-name">
                </div>
                <div class="new-entry-wrap">
                    <label for="fpatronymic">Patronymic</label>
                    <input type="text" id="fpatronymic" name="fpatronymic">
                </div>
                <div class="new-entry-wrap">
                    <label for="fentry-date">Entry Date</label>
                    <input type="text" id="fentry-date" name="fentry-date">
                </div>
                <div class="new-entry-wrap">
                    <label for="fforeign-language-code">Foreign Language Code</label>
                    <input type="text" id="fforeign-language-code" name="fforeign-language-code">
                </div>
                <div class="new-entry-wrap">
                    <label for="fhome-address">Home Address</label>
                    <input type="text" id="fhome-address" name="fhome-address">
                </div>
                <div class="new-entry-wrap">
                    <label for="fphone-number">Phone Number</label>
                    <input type="text" id="fphone-number" name="fphone-number">
                </div>
                <div class="new-entry-wrap">
                    <label for="fmean-grade">Mean Grade</label>
                    <input type="text" id="fmean-grade" name="fmean-grade">
                </div>
                <input type="submit" class="submit-btn submit-btn-student">
            </form>


        </div>
        <div class="new-entry__language">
            <h3>New Language</h3>
            <form action="new-language">
                <div class="new-entry-wrap">
                    <label for="flanguage-code">Language Code</label>
                    <input type="text" id="flanguage-code" name="flanguage-code">
                </div>
                <div class="new-entry-wrap">
                    <label for="flanguage-name">Language Name</label>
                    <input type="text" id="flanguage-name" name="flanguage-name">
                </div>
                <input type="submit" class="submit-btn submit-btn-foreign-language">
            </form>
        </div>

    </div>

    <div id="students-info" class="tabcontent">
        <h3>Students Info</h3>
    </div>

    <div id="languages-info" class="tabcontent">
        <h3>Languages Info</h3>
    </div>

    <div id="log-out" class="tabcontent">
        <h3>Log Out</h3>
    </div>

</body>
</html>