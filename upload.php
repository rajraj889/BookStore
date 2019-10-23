
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
    <h1>Thank You</h1>
    <p>Here is the information you have submitted:</p>
    <ol>    
    
        <li><em>Name:</em> <?php echo $_POST["title"]?></li>
        <li><em>Email:</em> <?php echo $_POST["author"]?></li>
        <li><em>Subject:</em> <?php echo $_POST["isbn"]?></li>
        <li><em>Message:</em> <?php echo $_POST["publication"]?></li>
        <li><em>Mesge:</em> <?php echo $_POST["edition"]?></li>
        <li><em>Mesage:</em> <?php echo $_POST["mod"]?></li>
        <li><em>Mege:</em> <?php echo $_POST["actual_price"]?></li>
        <li><em>Megagseg:</em> <?php echo $_POST["offered_price"]?></li>

    </ol>
</body>
</html>
<?php


$title=$_POST["title"];
$author= $_POST["author"];
$isbn=$_POST["isbn"];
$pub=$_POST["publication"];
$edi=$_POST["edition"];
$mod=$_POST["mod"];
$ap=(int)$_POST["actual_price"];
$op=(int)$_POST["offered_price"];

if($mod=='rent'){
    $mod='r';
}
else{
    $mod='p';
}

$customer=(int)$_SESSION['user'];
$query="INSERT INTO book(bid,oid,title,author,isbn,publication,edition,avail,mode,aprice,oprice)
 VALUES(17,'$customer', '$title', '$author', '$isbn','$pub','$edi','y','p','$ap','$op')"; 
$result=mysqli_query($con,$query);

?>