<?php 
// include './includes/connect.php';
// include './function/all_function.php';
//session_start();
?>
<style type="text/css">
	.nav_bg{
		background-color: red;
	}
</style>

<!---------------------------- navbar ---------------->

     	<nav class="navbar navbar-expand-lg nav_bg">
		  <div class="container-fluid">
		    <img src="images/logo3.png" class="logo_img" alt="images/logo3.png">
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse " id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link text-white" href="all_courses.php">All Courses</a>
		        </li>

		        <li class="nav-item">
		          <a class="nav-link text-white" href="secrete_key.php">Secrete_key<i class="fas fa-key"></i></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link text-white" href="all_exam_question.php">Exam_Question</a>
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



		    </div>
		  </div>
		</nav>