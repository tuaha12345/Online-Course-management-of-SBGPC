<?php 
include './includes/connect.php';
include './function/all_function.php';
session_start();
if (!isset($_SESSION['name'])) {
  // Redirect to index.php
  header("Location: ../index.php");
  exit; // Make sure to exit after the redirection
}
global $con;
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
            <h3 class="text-monospace">All Courses <i class="fas fa-book text-info"></i></h3>
            

<!------------------- alert message------------------>
<?php

if(isset($_GET['delete_msg']))
{ 
    $code=$_GET['c_code'];
        echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
              <strong>".$code.$_GET['delete_msg']."!!!</strong> 
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
}

?>



<!-----------1st row ()--------------------------->

            <!--------------- row 1------>

           <div class="row m-5 px-5 pb-5 rounded justify-content-center" >
               <!-- <h1 class="text-center pt-3"><i class="fas fa-clipboard text-secondary"></i></h1> -->

                <!-- Button trigger modal -->
                <div class="text-end">
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
                </div><br><br>


               <table class="table" >
                <?php 

                $select_query="SELECT * FROM admin_course";
                $runquery = mysqli_query($con, $select_query);
                //$rows_count=mysqli_num_rows($runquery);
                //$row=mysqli_fetch_array($runquery);

                 echo "<thead >
                    <tr>
                      <th scope='col' class='bg-info'>course_code</th>
                      <th scope='col' class='bg-info'>course_title</th>
                      <th scope='col' class='bg-info text-center'>credit</th>
                      <th scope='col' class='bg-info'>Enroll Key</th>
                      <th scope='col' class='bg-info'>Action</th>
                      <th scope='col' class='bg-info'>View</th>
                    </tr>
                  </thead>";
                while($row=mysqli_fetch_array($runquery))
                { 

                  $course_code=$row['course_code'];  
                  $course_title=$row['course_title'];  
                  $credit=$row['credit'];
                  $enroll_key=$row['enroll_key'];
                  $id=$row['id'];  



                 echo "
                  <tbody>
                    <tr>
                      <td>$course_code</td>
                      <td>$course_title</td>

                      <td class='text-center'>$credit</td>
                      <td>$enroll_key</td>
                      <td>
                        <a href='#edit$id' class='btn btn-success' data-bs-toggle='modal' data-bs-target='' name='edit'>
                        <i class='fas fa-edit'></i>
                        </a>

                        <a href='delete_course.php?delete_id=$id&course_code=$course_code' class='btn btn-danger'>
                        <i class='fas fa-trash-alt'></i>
                        </a>

                      </td>

                      <td>
                        <a href='view_course.php?view_id=$id' class='btn btn-secondary'>
                        <i class='far fa-eye'></i>
                        </a>
                      </td>

                    </tr>
                    
                  </tbody>"; 





                  ?>


<!---------------------------editing data----------------------->
<!-- Modal -->


<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    <form method="post" action="edit_course.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <div class="modal-body row">
        <div class="mb-3 col-md-6">
                <label class="form-label">Course Code</label>
                <input type="text" class="form-control" name="course_code" value="<?php echo $course_code; ?>">
        </div>
        <div class="mb-3 col-md-6">
                <label class="form-label">Course Credit</label>
                <input type="text" class="form-control" name="course_credit" value="<?php echo $credit; ?>">
        </div>
        <div class="mb-3 col-md-8">
                <label class="form-label">Enroll Key</label>
                <input type="text" class="form-control" name="enroll_key" value="<?php echo $enroll_key; ?>">
        </div>        

        <div class="mb-3 col-md-10">
                <label class="form-label">Course Title</label>
                <input type="text" class="form-control" name="course_title" value="<?php echo $course_title; ?>">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn text-white" style="background-color:#32a852;" name="save" value="Save">

      </div>

    </form>
      

    </div>
  </div>
</div>
 
<!----------------------- end of edit data--------------->



                <?php


                }



                  ?>
                </table>


    		</div> <!------ end of row1----->






<!---------------------------inserting data----------------------->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    <form method="post">
      <div class="modal-body row">
        <div class="mb-3 col-md-6">
                <label class="form-label">Course Code</label>
                <input type="text" class="form-control" name="course_code">
        </div>
        <div class="mb-3 col-md-6">
                <label class="form-label">Course Credit</label>
                <input type="text" class="form-control" name="course_credit">
        </div>
        <div class="mb-3 col-md-8">
                <label class="form-label">Enroll Key</label>
                <input type="text" class="form-control" name="enroll_key">
        </div>
        <div class="mb-3 col-md-10">
                <label class="form-label">Course Title</label>
                <input type="text" class="form-control" name="course_title">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn text-white" style="background-color:#32a852;" name="add" value="ADD">
       

      </div>

      </form> 

    </div>
  </div>
</div>
<!----------------------- end of inserting data----------->








    	</div> 


    	
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

     insert_data();
?>
