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
    <?php include('partials/css_link.php'); ?>

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

    <?php include('partials/navbar.php'); ?> <!-- Navbar -->

    <div class="row " style="background-color: #edf0ed;" >

        <?php include('partials/sidebar.php'); ?> <!-- Sidebar -->

        <div class="col-md-10  m-5 main">
            <h3 class="text-monospace">All Exam Questions Here...</h3>




            <!-- Table -->
            <div class="row m-5 px-5 pb-5 rounded justify-content-center " >

            <div class='text-end '>
            <a href="exam_question.php"class='text-center btn btn-info text-white '>Add New Question</a>
            </div><br><br>

            <table class="table">
            <thead>
                <tr >
                    <th class='bg-warning'>Course Code</th>
                    <th class='bg-warning'>Department</th>
                    <th class='bg-warning'>Semester</th>
                    <th class='bg-warning'>Mid Question</th>
                    <th class='bg-warning'>Final Question</th>
                    <th class='bg-warning'>Mid PDF</th>
                    <th class='bg-warning'>Final PDF</th>
                    <th class='bg-warning'>Edit</th>
                    <th class='bg-warning'>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connect to the database (assuming $con is your database connection)
                    global $con;

                    // Fetch data from the exam_question table
                    $sql = "SELECT * FROM exam_question";
                    $result = $con->query($sql);

                    // Check if there are any rows in the result set
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            $id=$row['id'];
                            echo "<tr>";
                            echo "<td>" . $row["course_code"] . "</td>";
                            echo "<td>" . $row["department"] . "</td>";
                            echo "<td>" . $row["semester"] . "</td>";
                            echo "<td>" . $row["mid_question"] . "</td>";
                            echo "<td>" . $row["final_question"] . "</td>";
                            echo "<td><a href='uploads/exam_question/" . $row["mid_pdf"] . "' download>" . $row["mid_pdf"] . "</a></td>";
                            echo "<td><a href='uploads/exam_question/" . $row["final_pdf"] . "' download>" . $row["final_pdf"] . "</a></td>";                            
                            echo "<td>
                            <a href='edit_exam.php?id=$id' class='btn btn-success'  name='edit'>
                            <i class='fas fa-edit'></i>
                            </a>  </td>";
                            echo "<td>             
                            <a href='delete_exam.php?id=$id' class='btn btn-danger'>
                            <i class='fas fa-trash-alt'></i>
                            </a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        //echo "<tr><td colspan='7'>No data found</td></tr>";
                    }

                    // Close database connection
                    $con->close();
                ?>


            </tbody>
        </table>

            </div> <!-- End of Table -->
        </div> <!-- End of Main Section -->
    </div> <!-- End of Row -->

    <!-- Footer -->
    <?php include "./partials/footer.php"; ?>

</div> <!-- End of Container -->

<!-- Bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
