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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<?php   include('partials/css_link.php'); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<div class="container-fluid p-0 " >

<?php   include('partials/navbar.php'); ?> <!---------- navbar----------->

     
    <div class="row " style="background-color: #edf0ed;" >
       
       <?php   include('partials/sidebar.php'); ?> <!---sidebar --->


         
    	<div class="col-md-12  m-5 main ">
            <h3 class="text-monospace text-center text-bold">Your All Presentation</h3>


            <div class=" m-5 px-5 rounded row py-4" style='background:#ddeaeb;'>




<?php
global $con;

$teacher_name = $_SESSION['name']; // You might want to dynamically set this

// SQL query to fetch assignments for the teacher
$query = "SELECT * FROM presentation WHERE teacher_name = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $teacher_name);
$stmt->execute();
$result = $stmt->get_result();

echo '<style>
    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    @media screen and (max-width: 600px) {
        table {
            border: 0;
        }
        table caption {
            font-size: 1.3em;
        }
        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }
        table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
        }
        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;
        }
        table td::before {
            
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }
        table td:last-child {
            border-bottom: 0;
        }
    }
</style>';

if ($result->num_rows > 0) {
    echo "<table class='table'>
        <thead >
            <tr>
                <th scope='col' class='bg-primary'>ID</th>
                <th scope='col' class='bg-primary'>Course Code</th>
                <th scope='col' class='bg-primary'>Instruction</th>
                <th scope='col' class='bg-primary'>Submission Link</th>
                <th scope='col' class='bg-primary'>Section</th>
                <th scope='col' class='bg-primary'>Action</th>
            </tr>
        </thead>
        <tbody>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $instruction = $row["presentation_instruction"];
        $id= $row["id"];
        $num_words = 3;
        $words = explode(' ', $instruction);
        if (count($words) > $num_words) {
            $instruction = implode(' ', array_slice($words, 0, $num_words)) . '...';
        }

        echo "<tr>";
        echo "<td data-label='ID'>" . $row["id"] . "</td>";
        echo "<td data-label='Course Code'>" . $row["course_code"] . "</td>";
        echo "<td data-label='Instruction'>" . htmlspecialchars($instruction) . "</td>";
        echo "<td data-label='Submission Link'><a href='" . $row["presentation_submission_link"] . "' target='_blank'>Submission Link</a></td>";
        echo "<td data-label='Section'>" . $row["section"] . "</td>";
        echo "<td data-label='Section'>
              <a href='edit_presentation.php?id=$id' class='btn btn-success'>&#9998;</a>
              <a href='delete_presentation.php?id=$id' class='btn btn-danger'><i class='fas fa-trash'></i>
              </a>
            </td>";
        echo "</tr>";
        
    }
    echo "</tbody></table>";
} else {
    echo "No assignments found for " . htmlspecialchars($teacher_name);
}
$stmt->close();
$con->close();
?>







            </div>


    	</div> <!------ end of main--->


    	
    </div>





		<!----- last child-footer --->
        <?php
            include "./partials/footer.php";
        ?>


</div>            
</body>
</html>
