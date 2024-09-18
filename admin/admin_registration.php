<?php
   include '../Database/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Registration Form</title>
<link rel="icon" type="image/x-icon" href="images/logo2.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="style/registration_form.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Admin Registration Form</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                 <form  method="post" enctype="multipart/form-data">
                    <!-----Name---->
                    <input class="text" type="text" name="name" placeholder="Username" required="">

                    <!-----Email---->
                    <input class="text email" type="email" name="email" placeholder="Email" required="">

                    <!-----password---->
                    <input class="text w3lpass" type="password" name="password" placeholder="Password" required="">

                    <!-----confirm password---->
                     <input class="text w3lpass" type="password" name="confirm_password" placeholder="Confirm Password" required="">

                    <!-----Secreat key---->
                    <input class="w3lpass" type="text" name="secret_key" placeholder="Secret Key" required="" style="background:#e03838;border:1px solid white;">                    



                    <input type="submit" value="REGISTER">
                </form>
                <!-- <p>Don't have an Account? <a href="#"> Login Now!</a></p> -->
                <p>Already have an Account? <a href="admin_login.php"> Login Now!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2018 Admin Registration Form. All rights reserved | Design by <a href="../index.php" target="_blank">SBPGC</a></p>
        </div>
        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li><img src="images/education.png"></li>
            <li><img src="images/book.png"></li>
            <li><img src="images/book.png"></li>
            <li><img src="images/logo4.png"></li>
            <li><img src="images/book.png"></li>
            <li><img src="images/education.png"></li>
            <li><img src="images/book.png"></li>
            <li><img src="images/book.png"></li>
            <li><img src="images/book.png"></li>
            <li><img src="images/logo1.png"></li>
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
    $email = $_POST['email'];

    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $secret_key = $_POST['secret_key'];



    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Password do not match')</script>";
        exit();
    }

    // Hash the password before saving to the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Upload admin image (you may need to handle file upload separately)

    // check the same username 
    $check="SELECT * FROM admin WHERE name='$name' ";
    $run=mysqli_query($con,$check);
    $num=mysqli_num_rows($run);
    if($num<1)
    {
            // Insert data into the admin_info table
            $insert_query = "INSERT INTO admin (name, email, password)
                            VALUES ('$name', '$email','$hashed_password')";

            // Execute the query
        if (mysqli_query($con, $insert_query)) {
                    header("Location: admin_login.php");
                    echo "<script>alert('Registration successful!');</script>";
                    exit();
                }

        else {
                echo "Error: " . mysqli_error($con);
            }

    }

    else{
        echo "<script>alert('Username must be unique')</script>";
        exit();
    }



    // Close the database connection
    mysqli_close($con);
}
?>
