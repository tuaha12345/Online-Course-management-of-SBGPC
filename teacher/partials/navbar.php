<style type="text/css">
	.nav_bg{
		background-color: #006303;
	}
</style>

<?php
    $teacher_name =$_SESSION['name'];  
    $select_query = "SELECT * FROM courses WHERE teacher_name='$teacher_name' ";
    $runquery = mysqli_query($con, $select_query);
    $row = mysqli_fetch_array($runquery);
	$num=mysqli_num_rows($runquery);
?>

<!---------------------------- navbar ---------------->

     	<nav class="navbar navbar-expand-lg nav_bg">
		  <div class="container-fluid">
		    <img src="images/logo2.png" class="logo_img" alt="images/logo1.png">
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse " id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link text-white" href="all_courses.php">Your_Courses_<i class="fas fa-book"></i><sup> <?php echo $num ; ?> </sup>
                  </a>
		        </li>

		        <li class="nav-item">
		          <a class="nav-link text-white" href="add_courses.php">Add_Courses</a>
		        </li>

		        <li class="nav-item">
		          <a class="nav-link text-white" href="edit_profile.php"><i class="fas fa-user-edit"></i>_Edit_Profile</a>
		        </li>

		      </ul>
    <!--------------------- user & logout--------------->
			<div class=" ">
			  <a class="nav-link me-4 text-white" >
			    <?php echo $_SESSION['name']; ?>
			  </a>
			</div>	
			<div class=" ">
			  <a class="nav-link me-4 text-white" href="logout.php" >
			    Logout
			  </a>
			</div>					
      <!------------------ end------------->
		     <!--  <form class="d-flex"  method="get" action="index.php" role="search">
		        <input class="form-control " type="search" placeholder=" Search" aria-label="Search" name="search_data">		        
		        <button class="btn text-white" type="submit" name="search_data_product">
		        	<i style="font-size:20px" class="fa">&#xf002;</i>
		        </button>	        		          
		      </form> -->


		    </div>
		  </div>
		</nav>