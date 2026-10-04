<?php
include "db.php";

if (isset($_POST['submit'])) {

    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $reg_date = $_POST['reg_date'];
    $marital_status = $_POST['marital_status'];
    $experience = $_POST['experience'];
    $terms =  isset($_POST['terms']) ? 1 : 0;   // checkbox fix


    $form_data = "INSERT INTO `users`
    (fullname, gender, reg_date, marital_status, experience,terms)
    VALUES
    ('$fullname', '$gender', '$reg_date', '$marital_status', '$experience', $terms)";

    if (mysqli_query($conn, $form_data)) {
        echo "Information inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>