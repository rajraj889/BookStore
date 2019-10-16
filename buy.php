<?php
	session_start();
  if(!isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");
	include "dbconnect.php";
         $customer=$_SESSION['user'];
?>
<?php

        if(isset($_GET['place']))
                 {  
                    $query="DELETE FROM wishlist where cid='$customer'";
                    $result=mysqli_query($con,$query);
                 ?>
                    <script type="text/javascript">
                         alert("Order SuccessFully Placed!! Kindly Keep the cash Ready. It will be collected on Delivery");
                    </script>
                 <?php                  
                  }
        if(isset($_GET['remove']))
                 {  $product=$_GET['remove'];
                    $query="DELETE FROM wishlist where cid='$customer' AND wid = '$product'";
                    $result=mysqli_query($con,$query);
                 ?>
                    <script type="text/javascript">
                         alert("Item Successfully Removed");
                    </script>
                 <?php                  
                  }     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cart">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta name="author" content="Shivangi Gupta">
    <title>order</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
        #cart {margin-top:30px;margin-bottom:30px;}
        .panel {border:1px solid #D67B22;padding-left:0px;padding-right:0px;}
        .panel-heading {background:#D67B22 !important;color:white !important;}        
        @media only screen and (width: 767px) { body{margin-top:150px;}}
    </style>

</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
         	 </button>
          	<a class="navbar-brand" href="index.php" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/logo.jpg"  style="width: 147px;margin: 0px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
	        <?php
	        if(!isset($_SESSION['user']))
	          {
	            echo'
	            <li>
	                <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#login">Login</button>
	                  <div id="login" class="modal fade" role="dialog">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                                <h4 class="modal-title text-center">Login Form</h4>
	                            </div>
	                            <div class="modal-body">
	                              <ul >
	                                <li>
	                                  <div class="row">
	                                      <div class="col-md-12 text-center">
	                                          <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
	                                              <div class="form-group">
	                                                  <label class="sr-only" for="username">Username</label>
	                                                  <input type="text" name="login_username" class="form-control" placeholder="Username" required>
	                                              </div>
	                                              <div class="form-group">
	                                                  <label class="sr-only" for="password">Password</label>
	                                                  <input type="password" name="login_password" class="form-control"  placeholder="Password" required>
	                                                  <div class="help-block text-right">
	                                                      <a href="#">Forget the password ?</a>
	                                                  </div>
	                                              </div>
	                                              <div class="form-group">
	                                                  <button type="submit" name="submit" value="login" class="btn btn-block">
	                                                      Sign in
	                                                  </button>
	                                              </div>
	                                          </form>
	                                      </div>
	                                  </div>
	                                </li>
	                              </ul>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                            </div>
	                        </div>
	                    </div>
	                  </div>
	            </li>
	            <li>
	              <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal" data-target="#register">Sign Up</button>
	                <div id="register" class="modal fade" role="dialog">
	                  <div class="modal-dialog">
	                      <div class="modal-content">
	                          <div class="modal-header">
	                              <button type="button" class="close" data-dismiss="modal">&times;</button>
	                              <h4 class="modal-title text-center">Member Registration Form</h4>
	                          </div>
	                          <div class="modal-body">
	                            <ul >
	                              <li>
	                                <div class="row">
	                                    <div class="col-md-12 text-center">
	                                        <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
	                                            <div class="form-group">
	                                                <label class="sr-only" for="username">Username</label>
	                                                <input type="text" name="register_username" class="form-control" placeholder="Username" required>
	                                            </div>
	                                            <div class="form-group">
	                                                <label class="sr-only" for="password">Password</label>
	                                                <input type="password" name="register_password" class="form-control"  placeholder="Password" required>
	                                            </div>
	                                            <div class="form-group">
	                                                <button type="submit" name="submit" value="register" class="btn btn-block">
	                                                    Sign Up
	                                                </button>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                              </li>
	                            </ul>
	                          </div>
	                          <div class="modal-footer">
	                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                          </div>
	                      </div>
	                  </div>
	                </div>
	            </li>';
	          } 
	        else
	            echo' <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
	        ?>

        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div id="top" >
      <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
          <div>
              <form role="search" method="POST" action="Result.php">
                  <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Search for a Book , Author Or Category">
              </form>
          </div>
      </div>
    </div>


	<?php

echo '<div class="container-fluid" id="cart">
      <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h2 style="color:#D67B22;text-transform:uppercase;">  YOUR CART </h2>
           </div>
        </div>';
	if(isset($_SESSION['user']))
	    {   
              	if(isset($_GET['ID']))
	            {   
                    $product=$_GET['ID'];
                    $query = "Select mode from book where bid=$product";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result);
                    $mode = $row['mode'];
                    if($mode == 'p'){
                        $date = date('Y-m-d');
                        $query = "INSERT into po values(NULL, '$product', '$customer', '$date')";
                        $result = mysqli_query($con, $query);
                    }
                    elseif($mode == 'r')
                    {
                        $date = date('Y-m-d');
                        $query = "INSERT into ro values(NULL, '$product', '$customer', '$date')";
                        $result = mysqli_query($con, $query);
                    }
                        
                    }
              	              
	    }
	else
	    { 
	          echo "login to continue";
	    }
        echo '</div>';
	?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
<html>		