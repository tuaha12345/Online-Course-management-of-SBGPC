<?php
   include '../Database/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Teacher Registration Form</title>
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
        <h1>Teacher Registration Form</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                 <form  method="post" enctype="multipart/form-data">
                    <!-----Name---->
                    <input class="text" type="text" name="name" placeholder="Username" required="">

                    <!-----Email---->
                    <input class="text email" type="email" name="email" placeholder="Email" required="">

                    <!-----Office Room---->
                    <input class="text " type="text" name="office_room" placeholder="Office Room" required="">

                    <!-----Office Hour---->
                    <input class="text w3lpass" type="text" name="office_hour" placeholder="Office Hour" required="">

                    <!-----Contact Number---->
                    <input class="text w3lpass" type="text" name="contact_number" placeholder="Contact Number" required="">

                    <!-----Web profile link---->
                    <input class="text w3lpass" type="text" name="web_profile" placeholder="Your Web Profile Link" required="">

                    <!-----Department---->
                    <input class="text w3lpass" type="text" name="department" placeholder="Department" required="">

                    <p>Upload your image here</p><br>
                    <div style="border:1px solid white; padding:0px 10px">
                    <input class="text w3lpass" type="file" name="teacher_img"required="">
                    </div>

                    <!-----password---->
                    <input class="text w3lpass" type="password" name="password" placeholder="Password" required="">

                    <!-----confirm password---->                    <input class="text w3lpass" type="password" name="confirm_password" placeholder="Confirm Password" required="">

                    <!-----Secreat key---->
                    <input class="w3lpass" type="text" name="secret_key" placeholder="Secret Key" required="" style="background:#e03838;border:1px solid white;">                    



                    <input type="submit" value="REGISTER">
                </form>
                <!-- <p>Don't have an Account? <a href="#"> Login Now!</a></p> -->
                <p>Already have an Account? <a href="teacher_login.php"> Login Now!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2018 Teacher Registration Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">SBPGC</a></p>
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
    $office_room = $_POST['office_room'];
    $office_hour = $_POST['office_hour'];
    $contact_number = $_POST['contact_number'];
    $web_profile = $_POST['web_profile'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $secret_key = $_POST['secret_key'];

    $select_key="SELECT * FROM secrete_key ";
    $run_this_query=mysqli_query($con, $select_key);
    $find_key=mysqli_fetch_assoc($run_this_query);
    $teacher_key=$find_key['teacher_key'];

    if($secret_key==$teacher_key)
     {    

        // $teacher_img=$_POST['teacher_img'];
        $current_time = date("Y-m-d-H-i-s");


        // Check if a file is uploaded
        if (isset($_FILES['teacher_img'])) {
            $file_name = $_FILES['teacher_img']['name'];
            $teacher_img="image-".$current_time.$file_name;
            $file_tmp = $_FILES['teacher_img']['tmp_name'];
            $file_type = $_FILES['teacher_img']['type'];
            $file_size = $_FILES['teacher_img']['size'];

            // Move the uploaded file to the desired location
            $file_name="image-".$current_time.$file_name;
            move_uploaded_file($file_tmp, "teacher_images/" . $file_name);

            // Now you can use the $file_name in your database query
        }



        // Check if passwords match
        if ($password !== $confirm_password) {
            echo "<script>alert('Password do not match')</script>";
            exit();
        }

        // Hash the password before saving to the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // check the same username 
    $check="SELECT * FROM teacher WHERE name='$name' ";
    $run=mysqli_query($con,$check);
    $num=mysqli_num_rows($run);
    if($num<1)
    {

                // Insert data into the teacher_info table
                $insert_query = "INSERT INTO teacher (name, email, office_room, office_hour, contact_number, web_profile, department, teacher_img, password, secret_key)
                                VALUES ('$name', '$email', '$office_room', '$office_hour', '$contact_number', '$web_profile', '$department', '$teacher_img', '$hashed_password', '$secret_key')";

                // Execute the query
            if (mysqli_query($con, $insert_query)) {

                    echo "<script> location.replace('teacher_login.php'); </script>";

                    }

            else {
                    echo "Error: " . mysqli_error($con);
                }

        }  // end of $num if  
        
        else{
            echo "<script>alert('Username must be unique')</script>";
            exit();
        }

      }

    else{
        echo "<script>alert('Please enter valid key!');</script>";
    }


    // Close the database connection
    mysqli_close($con);
}
?>
