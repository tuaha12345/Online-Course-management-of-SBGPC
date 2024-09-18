<?php
   include '../Database/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Registration Form</title>
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
        <h1>Student Registration Form</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                 <form  method="post" enctype="multipart/form-data">
                    <!-----Name---->
                    <input class="text" type="text" name="name" placeholder="Username" required="">

                    <!-----Name---->
                    <input class="text w3lpass" type="text" name="student_id" placeholder="Student ID" required="">

                    <!-----Email---->
                    <input class="text email" type="email" name="email" placeholder="Email" required="">


                    <!-----Contact Number---->
                    <input class="text w3lpass" type="text" name="contact_number" placeholder="Contact Number" required="">

                    <!-----Department---->
                    <input class="text w3lpass" type="text" name="department" placeholder="Department" required="">

                    <!-----Section---->
                    <input class="text w3lpass" type="text" name="section" placeholder="Section" required="">

                    <p>Upload your image here</p><br>
                    <div style="border:1px solid white; padding:0px 10px">
                    <input class="text w3lpass" type="file" name="student_img"required="">
                    </div>

                    <!-----password---->
                    <input class="text w3lpass" type="password" name="password" placeholder="Password" required="">

                    <!-----confirm password----> 
                    <input class="text w3lpass" type="password" name="confirm_password" placeholder="Confirm Password" required="">

                    <!-----Secreat key---->
                    <input class="w3lpass" type="text" name="secret_key" placeholder="Secret Key" required="" style="background:#e03838;border:1px solid white;">                    



                    <input type="submit" value="REGISTER">
                </form>
                <!-- <p>Don't have an Account? <a href="#"> Login Now!</a></p> -->
                <p>Already have an Account? <a href="#"> Login Now!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2018 Student Registration Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">SBPGC</a></p>
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
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $department = $_POST['department'];
    //$section = $_POST['section'];
    $section = strtoupper($_POST['section']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $secret_key = $_POST['secret_key'];

    $select_key="SELECT * FROM secrete_key ";
    $run_this_query=mysqli_query($con, $select_key);
    $find_key=mysqli_fetch_assoc($run_this_query);
    $student_key=$find_key['student_key'];

    $private_file='No files here..';
    $private_note='';

    if($secret_key==$student_key)
     {

    
        $current_time = date("Y-m-d-H-i-s");


        // Check if a file is uploaded
        if (isset($_FILES['student_img'])) {
            $file_name = $_FILES['student_img']['name'];
            $student_img="image-".$current_time.$file_name;
            $file_tmp = $_FILES['student_img']['tmp_name'];
            $file_type = $_FILES['student_img']['type'];
            $file_size = $_FILES['student_img']['size'];

            // Move the uploaded file to the desired location
            $file_name="image-".$current_time.$file_name;
            move_uploaded_file($file_tmp, "student_images/" . $file_name);

            // Now you can use the $file_name in your database query
        }



        // Check if passwords match
        if ($password !== $confirm_password) {
            echo "<script>alert('Password do not match')</script>";
            exit();
        }

        // Hash the password before saving to the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Upload teacher image (you may need to handle file upload separately)

        // Insert data into the teacher_info table
        $insert_query = "INSERT INTO student (name,student_id, email, contact_num,department,student_img, password,section,private_file,private_note)
                         VALUES ('$name', '$student_id', '$email','$contact_number', '$department', '$student_img', '$hashed_password','$section','$private_file','$private_note')";

        // Execute the query
       if (mysqli_query($con, $insert_query)) {
                header("Location: student_login.php");
                echo "<script>alert('Registration successful!');</script>";
                exit();
            }

        else {
            echo "Error: " . mysqli_error($con);
        }

      }

      else
      {
        echo "<script>alert('Please enter valid key!');</script>";
      }



    // Close the database connection
    mysqli_close($con);
}
?>
