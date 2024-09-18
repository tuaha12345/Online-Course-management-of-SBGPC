<?php
   include '../Database/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Teacher SignUp Form</title>
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
        <h1>Teacher Login Form</h1>
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
                <p>Don't have any Account? <a href="teacher_registration.php"> Register Now!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2024 Teacher Registration Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">SBPGC</a></p>
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $name = $_POST['name'];
    $password = $_POST['password'];
   
    // Use prepared statements to avoid SQL injection
    $query = "SELECT * FROM teacher WHERE name=?";
    
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
    $department=$row['department'];
    $teacher_name=$row['name'];


    // Close the statement
    mysqli_stmt_close($stmt);

    // Check if the user exists and the password is correct
    if ($row && password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['name'] = $teacher_name;
        $_SESSION['department'] = $department;
                
        echo "<script>alert('Login successful!');</script>";
        header("Location: index.php");
    } else {
        //echo "<script>alert('Login failed!');</script>";
        header("Location: login_fail.php");
    }
}

?>
