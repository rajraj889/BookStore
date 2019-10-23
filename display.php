
<?php
	session_start();
  if(!isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");
	include "dbconnect.php";
         $customer=$_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>


</body>
</html>
