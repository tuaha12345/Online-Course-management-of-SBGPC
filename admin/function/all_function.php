<?php

function insert_data()
{ 
    global $con;
    
   if (isset($_POST['add'])) {
    // Retrieve form data
    $courseCode = $_POST['course_code'];
    $courseCredit = $_POST['course_credit'];
    $enroll_key = $_POST['enroll_key'];
    $courseTitle = $_POST['course_title'];

    //Check if the course code already exists
    $checkQuery = "SELECT * FROM admin_course WHERE course_code = '$courseCode'";
    $checkResult = mysqli_query($con, $checkQuery);
    $numOfRows = mysqli_num_rows($checkResult);

    if ($numOfRows < 1) {
        
        $insertQuery = "INSERT INTO admin_course (course_code, credit, course_title,enroll_key) VALUES ('$courseCode', '$courseCredit', '$courseTitle','$enroll_key')";
        $insertResult = mysqli_query($con, $insertQuery);

        if ($insertResult) {
            echo "<script>alert('Data inserted successfully!');</script>";
        } else {
            echo "<script>alert('Error inserting data.');</script>";
        }
    } else {
        echo "<script>alert('Course code already exists.');</script>";
    }
}

}// end of insert_data()






?>