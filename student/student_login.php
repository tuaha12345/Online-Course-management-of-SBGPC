<?php
   include '../Database/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>SBPGC OLC-login</title>
    <link rel="icon" type="image/x-icon" href="images/logo2.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="style/login_form.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body id="login_body">
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Student Login Form</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                 <form  method="post">
                    <!-----Name---->
                    <input class="text" type="text" name="name" placeholder="Username" required="">

                    <!-----password---->
                    <input class="text w3lpass" type="password" name="password" placeholder="Password" required="">

                    <input type="submit" value="LOGIN">

                </form>
                <!-- <p>Don't have an Account? <a href="#"> Login Now!</a></p> -->
                <p>Don't have any Account? <a href="student_registration.php"> Register Now!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2024 Student Registration Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">SBPGC</a></p>
        </div>
        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li><i class="fa-university"></i></li>
            <li><img src="images/logo1.png"></li>
            <li><img src="images/knowledge.png"></li>
            <li><img src="images/education.png"></li>
            <li><img src="images/book.png"></li>
            <li><img src="images/school.png"></li>
            <li><img src="images/student.png"></li>
            <li><img src="images/logo4.png"></li>
            <li><img src="images/logo2.png"></li>
            <li><img src="images/logo3.png"></li>
        </ul>
    </div>
    <!-- //main -->
</body>
</html>



<?php

// Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     // Retrieve form data
//     $name = $_POST['name'];
//     $password = $_POST['password'];
   
//     // Use prepared statements to avoid SQL injection
//     $query = "SELECT * FROM student WHERE name=?";
    
//     // Prepare the statement
//     $stmt = mysqli_prepare($con, $query);

//     // Bind the parameter
//     mysqli_stmt_bind_param($stmt, "s", $name);

//     // Execute the statement
//     mysqli_stmt_execute($stmt);

//     // Get the result
//     $result = mysqli_stmt_get_result($stmt);

//     // Fetch the row
//     $row = mysqli_fetch_assoc($result);
//     $id=$row['student_id'];
//     $section=$row['section'];
//     $department=$row['department'];


//     // Close the statement
//     mysqli_stmt_close($stmt);

//     // Check if the user exists and the password is correct
//     if ($row && password_verify($password, $row['password'])) {

//         // Start the session
//         session_start();
//         $student_id = $id;
//         $student_username = $name;
//         $student_section = $section;

//         // Set session variables
//         $_SESSION['student_id'] = $student_id;
//         $_SESSION['student_username'] = $student_username;
//         $_SESSION['student_section'] = $student_section;
//         $_SESSION['student_department'] = $department;

//         echo "<script>alert('Login successful!');</script>";
//          header("Location: index.php");
//     } else {
//         echo "<script>alert('Login failed! Please try again.');</script>";
//     }
// }


?>

<?PHP
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $name = $_POST['name'];
    $password = $_POST['password'];
   
    // Use prepared statements to avoid SQL injection
    $query = "SELECT * FROM student WHERE name=?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($con, $query);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $name);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the row
    $row = mysqli_fetch_assoc($result);

    // Check if a row is fetched
    if ($row) {
        $id = $row['student_id'];
        $section = $row['section'];
        $department = $row['department'];

        // Check if the password is correct
        if (password_verify($password, $row['password'])) {

            // Start the session
            session_start();
            $student_id = $id;
            $student_username = $name;
            $student_section = $section;

            // Set session variables
            $_SESSION['student_id'] = $student_id;
            $_SESSION['student_username'] = $student_username;
            $_SESSION['student_section'] = $student_section;
            $_SESSION['student_department'] = $department;

            echo "<script>alert('Login successful!');</script>";
            header("Location: index.php");
        } else {
            echo "<script>alert('Login failed! Incorrect password.');</script>";
        }
    } else {
        echo "<script>alert('Login failed! Username not found.');</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}


?>