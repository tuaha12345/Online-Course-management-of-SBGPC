<?php
include '../Database/connect.php';
global $con;
    $id = $_SESSION['student_id'];
    $select_query = "SELECT * FROM student_course WHERE student_id='$id' ";
    $runquery = mysqli_query($con, $select_query);
    $num_rows=mysqli_num_rows($runquery);
?>

<style type="text/css">
	.nav_bg{
		background-color: #81C55D;
	}
</style>

<!---------------------------- navbar ---------------->

     	<nav class="navbar navbar-expand-lg nav_bg">
		  <div class="container-fluid">
		    <img src="images/logo3.png" class="logo_img" alt="images/logo1.png">
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse " id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center">
		        <li class="nav-item">
		          <a class="nav-link active " aria-current="page" href="index.php">Home</a>
		        </li>

		        <li class="nav-item">
		          <a class="nav-link " href="all_courses.php">All Courses</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="enrolled_course.php">Enrolled_Courses <i class="fas fa-graduation-cap"></i><sup><?php echo  $num_rows ?></sup></a>
		        </li>


		      </ul>
    <!--------------------- dropdown--------------->
            <div>
            	<a href="" class='nav-link px-2 mx-4'><?php echo $_SESSION['student_username']; ?></a>
            </div>
			<div >
			  <a class="nav-link me-4 " href="./logout.php">
			    Logout
			  </a>
			</div>		
      <!------------------ end------------->
		    <!--   <form class="d-flex"  method="get" action="index.php" role="search">
		        <input class="form-control " type="search" placeholder=" Search" aria-label="Search" name="search_data">		        
		        <button class="btn text-white" type="submit" name="search_data_product">
		        	<i style="font-size:20px" class="fa">&#xf002;</i>
		        </button>	        		          
		      </form> -->


		    </div>
		  </div>
		</nav>