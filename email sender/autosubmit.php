 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="300"> 
    <title>Auto-Submit Form</title>
</head>
<body>

    <h1>Auto-Submit Form Example</h1>

    <form id="myForm" action="show.php" method="post">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Submit">
    </form>



<?php
    // Get the current time in Bangladesh timezone
    date_default_timezone_set('Asia/Dhaka');
    $currentTime = date('H:i:s');

    // Set the desired time for form submission (12:30 AM)
    $submitTime = '01:27:00';

    // Compare the current time with the desired time
    if ($currentTime >= $submitTime) {
         $time=3000;
    }
    else{
    	$time=30000000000;
    }

 ?>




    <script>

        setTimeout(function() {
        	let t=parseInt(<?php echo $time;  ?>);
            document.getElementById("myForm").submit();
        }, 3000); 
    </script>



</body>
</html>

