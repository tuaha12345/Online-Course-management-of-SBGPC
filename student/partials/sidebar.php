<!DOCTYPE html>
<html>
<head>
   <style>
        /* Custom styles for the sidebar and side list */
        body {
            display: flex;
        }

        .for_fixed{
position:fixed;
width: 100px;
height:50px;
        }

        .sidebar {
            width: 100px;
            padding-top: 20px;
            

        }

        .sidebar a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;

        }

        .sidebar a:hover {
            background-color: #d9fcdb;
        }

        /* Styles for the courses side list */
        .courses-list {
            display: none;
            position: absolute;
            top: 0;
            left: 100%;
            background-color: #343a40;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .sidebar .course:hover + .courses-list {
            display: block;
        }

        .courses-list a {
            color: white;
           
            text-decoration: none;
            margin-bottom: 5px;
        }

</style>

</head>
<body>
    


<div class="col-md-2 bg-light p-0 sidebar shadow  bg-white rounded">
    		<!---- Brands will be displayed--->
         <ul class="navbar-nav me-auto text-center for_fixed">
         	<li class="nav-item ">
         		<a href="#" class="nav-link text-secondary"></a>
         	</li>


            <li class="nav-item">
                <a href="index.php" class="nav-link text-secondary" data-toggle="home" data-placement="right" title="Home">
                    <i class="fas fa-home "></i>
                </a>
            </li>



<!--             <li class="nav-item ">
               <a href="#" class="nav-link text-secondary" data-toggle="home" data-placement="right" title="University">
               <i class="fas fa-university"></i>
               </a>
            </li> -->

            <li class="nav-item ">
               <a href="all_courses.php" class="nav-link text-secondary " data-toggle="tooltip" data-placement="right" title="All Courses">
               <i class="fas fa-book"></i>
               </a>
            </li>

<!--            <li class="nav-item ">
               <a href="#" class="nav-link text-secondary">
               <i class="fas fa-folder"></i>
               </a>
            </li> -->

            <li class="nav-item courses-icon">

               <a href="enrolled_course.php" class="nav-link text-secondary icon" data-toggle="tooltip" data-placement="right" title="Enrolled Courses">
               <i class="fas fa-graduation-cap course"></i>
               </a>
                                
            </li>


         </ul>


</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>



  <script>
    var timeoutId;

    function showDiv() {
      document.getElementById('course_list').style.display = 'block';
    }

    function hideDiv() {
      timeoutId = setTimeout(function() {
        document.getElementById('course_list').style.display = 'none';
      }, 2000); // Set the delay to 3000 milliseconds (3 seconds)
    }

    // Clear the timeout if the mouse returns to the icon
    document.querySelector('.icon').addEventListener('mouseover', function() {
      clearTimeout(timeoutId);
    });
  </script>
  </body>
</html>
