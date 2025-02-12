

<?php
include './includes/connect.php'; // Ensure the path is correct based on your structure
global $con;

if (isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $id = intval($_GET['id']); // Ensure the ID is treated as an integer for security

    // Prepare SQL Statement
    $query = "DELETE FROM presentation WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<div class="alert alert-success" role="alert">presentation Deleted Successfully!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error Deleting presentation: ' . htmlspecialchars($con->error) . '</div>';
    }
    $stmt->close();
    // Redirect to all_presentation.php
    echo "<script>window.location.href = 'all_presentation.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Confirmation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <script>
        $(document).ready(function() {
            var confirmAction = confirm("Are you sure you want to delete this presentation?");
            if (confirmAction) {
                window.location.href = "?id=<?php echo intval($_GET['id']); ?>&confirm=yes";
            } else {
                window.location.href = 'all_presentation.php';
            }
        });
    </script>
</body>
</html>
