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

    <style>
.dot {
  height: 25px;
  width: 25px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}
</style>

</head>
<body>


<div class="container-fluid p-0 " >

<?php   include('partials/navbar.php'); ?> <!---------- navbar----------->

     
    <div class="row " style="background-color: #edf0ed;" >
       
       <?php   include('partials/sidebar.php'); ?> <!---sidebar --->


         
    	<div class="col-md-10  m-5 main">
            <h3 class="text-monospace">SBPGC-OLC: All Teachers </h3>

<!-----------1st row ()--------------------------->
<!------------------- alert message------------------>
<?php

if(isset($_GET['delete_msg']))
{ 
    $name=$_GET['teacher_name'];
        echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
              <strong>".$name.$_GET['delete_msg']."!!!</strong> 
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
}

?>

            <!--------------- row 1------>

           <div class="row m-5 px-5 pb-5 rounded justify-content-center " >


               <table class="table col-md-12" >
                <?php 

                $select_query="SELECT * FROM teacher";
                $runquery = mysqli_query($con, $select_query);
                //$rows_count=mysqli_num_rows($runquery);

                 echo "<thead >
                    <tr>
                      <th scope='col' class='bg-info'>Sl.no</th>
                      <th scope='col' class='bg-info'>Teacher Name</th>
                      <th scope='col' class='bg-info'>Contact No</th>
                      <th scope='col' class='bg-info'>Email</th>
                      <th scope='col' class='bg-info'>Department</th>
                      <th scope='col' class='bg-info'>Action</th>
                    </tr>
                  </thead>";
                  $sl_no=1;
                while($row=mysqli_fetch_array($runquery))
                { 

                  $name=$row['name'];  
                  $img=$row['teacher_img']; 
                  $contact=$row['contact_number'];  
                  $email=$row['email'];
                  $department=$row['department'];  
                  $id=$row['id'];  



                 echo "
                  <tbody>
                    <tr>
                      <td>$sl_no</td>
                      <td>
                       <img src='../teacher/teacher_images/$img' height='50px' width='50px' alt='$img'>
                       $name
                      </td>
                      <td>$contact</td>
                      <td>$email</td>
                      <td>$department</td>
                      <td>

                        <a href='delete_teacher.php?delete_id=$id&teacher_name=$name' class='btn btn-danger'>
                        <i class='fas fa-trash-alt'></i>
                        </a>
                      </td>

                    </tr>
                    
                  </tbody>"; 
                  
                   $sl_no+=1;

                }



                  ?>
                </table>


    		</div> <!------ end of row1----->


    	</div><!----- end of main---->


    	
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


