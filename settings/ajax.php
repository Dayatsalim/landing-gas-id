<?php require("functions.php");

if (isset($_POST['save_feed']) && ($_POST['save_feed']) == GLOBAL_FORM) {
    $namefeedback = secure_string($_POST['namefeedback']);
    $emailfeedback = secure_string($_POST['emailfeedback']);
    $subjectfeedback = secure_string($_POST['subjectfeedback']);
    $opinionfeedback = secure_string($_POST['opinionfeedback']);
    $date = strtotime('now');

    $args = "INSERT INTO feedback (date,name,email,label,desc_feedback) VALUES ('$date','$namefeedback','$emailfeedback','$subjectfeedback','$opinionfeedback')";
    $qry = mysqli_query($dbconnect, $args);

    if ($qry) {
        echo 'berhasil';
    } else {
        echo $args;
    }
}
