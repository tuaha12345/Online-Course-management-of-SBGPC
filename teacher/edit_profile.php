<?php 
include './includes/connect.php';
include './function/all_function.php';
session_start();
if (!isset($_SESSION['name'])) {
    // Redirect to index.php
    header("Location: ../index.php");
    exit; // Make sure to exit after the redirection
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php   include('partials/css_link.php'); ?>
    <!--------- custom css-------->
        <style>
        @keyframes moveUpDown {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .moving-icon {
            animation: moveUpDown 1s infinite; /* You can adjust the animation duration */
        }
    </style>


</head>
<body>


<div class="container-fluid p-0 " >

<?php   include('partials/navbar.php'); ?> <!---------- navbar----------->

     
    <div class="row " style="background-color: #edf0ed;" >
       
       <?php   include('partials/sidebar.php'); ?> <!---sidebar --->


         
    	<div class="col-md-10  m-5 main ">
            <h3 class="text-monospace">Course name(dynamic)</h3>





<!-----------1st row (teacher info and course info)--------------------------->

            <!------------ teacher info--- row 1------>

<?php

 $teacher_name=$_SESSION['name'];
 $select_query="SELECT * FROM teacher WHERE name='$teacher_name' ";
 $run_query=mysqli_query($con,$select_query);
 $row=mysqli_fetch_assoc($run_query);
 $office_room=$row['office_room'];
 $office_hour=$row['office_hour'];
 $contact_number=$row['contact_number'];
 $email=$row['email'];
 $web_profile=$row['web_profile'];
 $teacher_img=$row['teacher_img'];
 
 ?>
      <form method="post" action="" enctype="multipart/form-data"> 

            
    		<div class="row m-5 px-5 pb-5 rounded" style="background-color:#E4E4E4">


                   <div class="d-flex justify-content-center py-5">
                       <img src='teacher_images/<?php echo $teacher_img ; ?>' height="300px" width=70%>
                   </div>

                   <!---------Instructor info---->
                   <div class="form-group text-primary">
                     <label >Edit your image here</label>
                        <input type="file" class="form-control-file mb-3" name="teacher_img" value="<?php echo $teacher_img; ?>" >
                    </div>

                    <div class="form-group text-primary row">

                        <div  class='col-md-6'><!--div1-->
                        <label >Your Name</label>
                        <p class="form-control" ><?php echo $teacher_name; ?></p><br>                       

                        <label >Office Room</label>
                        <input type="text" class="form-control" value="<?php echo $office_room; ?>" name="office_room"><br>
                        </div>

                       <div  class='col-md-6'><!--div2-->
                        <label >Office Hour</label>
                        <input type="text" class="form-control" value="<?php echo $office_hour; ?>" name="office_hour"><br>

                        <label >Contact Number</label>
                        <input type="text" class="form-control" value="<?php echo $contact_number; ?>" name="contact_number"><br>
                       </div>

                       <div  class='col-md-6'>
                         <label >Email</label>
                         <input type="email" class="form-control" value="<?php echo $email; ?>" name="teacher_email"><br>
                       </div>

                       <div  class='col-md-6'>
                         <label >Web Profile</label>
                         <input type="text" class="form-control" value="<?php echo $web_profile; ?>" name="web_profile"><br>
                       </div>

                    </div>

                   
         
         <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    		</div> <!------ end of row1----->

   









    	</div> <!------ end of main--->


    	
    </div>





		<!----- last child-footer --->
        <?php
            include "./partials/footer.php";
        ?>


</div>





<!--- bootstrap JS link --->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php 


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $office_room = $_POST['office_room'];
    $office_hour = $_POST['office_hour'];
    $contact_number = $_POST['contact_number'];
    $teacher_email = $_POST['teacher_email'];
    $web_profile = $_POST['web_profile'];
    $teacher_img_name=$row['teacher_img'];


// Check if a new image is uploaded
if (isset($_FILES['teacher_img'])) {
    $file_name = $_FILES['teacher_img']['name'];
    $file_tmp = $_FILES['teacher_img']['tmp_name'];
    // Move the uploaded file to the desired location
    if (move_uploaded_file($file_tmp, "teacher_images/" . $file_name)) {
        $teacher_img = "teacher_images/" . $file_name;
        $teacher_img_name = $file_name; // Update the variable holding the new image name
    }
}

// Update the teacher information in the database
$update_query = "UPDATE teacher SET 
                office_room = '$office_room',
                office_hour = '$office_hour',
                contact_number = '$contact_number',
                email = '$teacher_email',
                teacher_img = '$teacher_img_name', 
                web_profile = '$web_profile' WHERE name='$teacher_name' ";

    // Check if a new image is uploaded
    // if (isset($teacher_img)) {
    //     $update_query .= ", teacher_img = '$teacher_img'";
    // }
    // $update_query .= " WHERE name = '$teacher_name'";

    // Execute the update query
    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Teacher information updated successfully!');</script>";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>
