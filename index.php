<?php
session_start();
include "dbconnect.php";
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}
if (isset($_GET['response'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['response'] . '");
           </script>';
}
if(isset($_POST['submit']))
{
  if($_POST['submit']=="login")
  { 
        $email=$_POST['login_email'];
        $password=$_POST['login_password'];
        $query = "SELECT * from customer where email ='$email' AND pswd='$password'";
        $result = mysqli_query($con,$query)or die(mysqli_error($con));
        if(mysqli_num_rows($result) > 0)
        {
             $row = mysqli_fetch_assoc($result);
             $_SESSION['user']=$row['cid'];
             print'
                <script type="text/javascript">alert("successfully logged in!!!");</script>
                  ';
        }
        else
        {    print'
              <script type="text/javascript">alert("Incorrect Username Or Password!!");</script>
                  ';
        }
  }
  else if($_POST['submit']=="register")
  {
        $username=$_POST['register_username'];
        $email=$_POST['register_email'];
        $contact=$_POST['register_contact'];
        $password=$_POST['register_password'];
        $add1=$_POST['register_add1'];
        $add2=$_POST['register_add2'];
        $city=$_POST['register_city'];
        $pin=$_POST['register_pin'];
        $query="select * from customer where email = '$email'";
        $result=mysqli_query($con,$query) or die(mysqli_error($con));
        if(mysqli_num_rows($result)>0)
        {   
               print'
               <script type="text/javascript">alert("username is taken");</script>
                    ';
        }
        else
        {
          $query ="INSERT INTO customer(email, name, pswd, contact) VALUES ('$email', '$username', '$password', '$contact')";
          $result=mysqli_query($con,$query);
          $query ="INSERT INTO address(cid,ad1, ad2, city, pin) VALUES ((SELECT CID from customer where email = '$email'), '$add1', '$add2', '$city', '$pin')";
          $result=mysqli_query($con,$query);
          print'
                <script type="text/javascript">
                 alert("Successfully Registered!!!");
                </script>
               ';
        }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
    <title>Online Bookstore</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
      .modal-header {background:#D67B22;color:#fff;font-weight:800;}
      .modal-body{font-weight:800;}
      .modal-body ul{list-style:none;}
      .modal .btn {background:#D67B22;color:#fff;}
      .modal a{color:#D67B22;}
      .modal-backdrop {position:inherit !important;}
       #login_button,#register_button{background:none;color:#D67B22!important;}       
       #query_button {position:fixed;right:0px;bottom:0px;padding:10px 80px;
                      background-color:#D67B22;color:#fff;border-color:#f05f40;border-radius:2px;}
  	@media(max-width:767px){
        #query_button {padding: 5px 20px;}
  	}
      
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
          <a class="navbar-brand" href="#" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/logo.jpg"  style="width: 147px;margin: 0px;"></a>
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
                                          <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                              <div class="form-group">
                                                  <label class="sr-only" for="email">Email</label>
                                                  <input type="email" name="login_email" class="form-control" placeholder="Email" required>
                                              </div>
                                              <div class="form-group">
                                                  <label class="sr-only" for="password">Password</label>
                                                  <input type="password" name="login_password" class="form-control"  placeholder="Password" required>
                                              </div>
                                              <div class="form-group">
                                                  <button type="submit" name="submit" value="login" class="btn btn-block">
                                                      Sign in
                                                  </button>
                                              </div>
                                          </form>
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
                                        <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                            <div class="form-group">
                                                <label class="sr-only" for="username">Username</label>
                                                <input type="text" name="register_username" class="form-control" placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="email">Email</label>
                                                <input type="email" name="register_email" class="form-control" placeholder="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="contact">Contact</label>
                                                <input type="number" name="register_contact" class="form-control" placeholder="Contact" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input type="password" name="register_password" class="form-control"  placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Address Line 1</label>
                                                <input type="text" name="register_add1" class="form-control"  placeholder="Address Line 1" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="add2">Address Line 2</label>
                                                <input type="text" name="register_add2" class="form-control"  placeholder="Address Line 2">
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="city">City</label>
                                                <input type="text" name="register_city" class="form-control"  placeholder="City" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="pin">Pin</label>
                                                <input type="number" name="register_pin" class="form-control"  placeholder="PIN" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" value="register" class="btn btn-block">
                                                    Sign Up
                                                </button>
                                            </div>
                                        </form>
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
          { 
            $id = $_SESSION['user'];
            $query = "SELECT name from customer where cid= '$id'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            echo' <li> <a href="#" class="btn btn-lg"> Hello ' .$name. '.</a></li>
                    <li> <a href="cart.php" class="btn btn-lg"> Cart </a> </li>; 
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
               
          }
?>

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!--
  <div id="top" class="row">
        
            <div class="topnav" class="col-xs-9">
                <a class="active" href="#home">Home</a>
                <a href="#news">News</a>
                <a href="#contact">Contact</a>
                <a href="#about">About</a>
            </div>
      <div id="searchbox" class="container-fluid" class="col-xs-3" style="margin-left:-6%;margin-right:-6%;">
              <form role="search" method="POST" action="Result.php">
                  <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Search for a Book , Author Or Category">
              </form>
      </div>
-->
<div class="container-fluid" id="searchbox">

    <ul class="nav navbar-nav"  style="font-size:20px;padding-top:10px;">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="form.php">Sell</a></li>
      <li><a href="buy.php">History</a></li>
       
        <li>Category:
    <select name="mod" id="filter">
  <option value="fiction">Fiction</option>
  <option value="action">Action</option>
  <option value="literature">Literature</option>
    </select></li>
    </ul>
    
    
              <form role="search" method="POST" action="Result.php" style="padding-left:70%;">
                  <input type="text" class="form-control" name="keyword" style="width:60%;margin:20px 10% 20px 10%;" placeholder="Search for a Book , Author Or Category">
              </form>
  </div>



      <div class="container-fluid" id="header">
      <!--
          <div class="row">
              <div class="col-md-3 col-lg-3" id="category">
                  <div style="background:#D67B22;color:#fff;font-weight:800;border:none;padding:15px;"> The Book Shop </div>
                  <ul>
                      <li> <a href="Product.php?value=entrance%20exam"> Entrance Exam </a> </li>
                      <li> <a href="Product.php?value=Literature%20and%20Fiction"> Literature & Fiction </a> </li>
                      <li> <a href="Product.php?value=Academic%20and%20Professional"> Academic & Professional </a> </li>
                      <li> <a href="Product.php?value=Biographies%20and%20Auto%20Biographies"> Biographies & Auto Biographies </a> </li>
                      <li> <a href="Product.php?value=Children%20and%20Teens"> Children & Teens </a> </li>
                      <li> <a href="Product.php?value=Regional%20Books"> Regional Books </a> </li>
                      <li> <a href="Product.php?value=Business%20and%20Management"> Business & Management </a> </li>
                      <li> <a href="Product.php?value=Health%20and%20Cooking"> Health and Cooking </a> </li>
                  </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                     
                      <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1"></li>
                          <li data-target="#myCarousel" data-slide-to="2"></li>
                          <li data-target="#myCarousel" data-slide-to="3"></li>
                          <li data-target="#myCarousel" data-slide-to="4"></li>
                          <li data-target="#myCarousel" data-slide-to="5"></li>
                      </ol>
                      
                       
                      <div class="carousel-inner" role="listbox">
                          <div class="item active">
                            <img class="img-responsive" src="img/carousel/1.jpg">
                          </div>
                          <div class="item">
                            <img class="img-responsive "src="img/carousel/2.jpg">
                          </div>
                          <div class="item">
                            <img class="img-responsive" src="img/carousel/3.jpg">
                          </div>
                          <div class="item">
                            <img class="img-responsive"src="img/carousel/4.jpg">
                          </div>
                          <div class="item">
                            <img class="img-responsive" src="img/carousel/5.jpg">
                          </div>
                          <div class="item">
                            <img class="img-responsive" src="img/carousel/6.jpg">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-lg-3" id="offer">
                  <a href="Product.php?value=Regional%20Books">              <img class="img-responsive center-block" src="img/offers/1.png"></a>
                  <a href="Product.php?value=Health%20and%20Cooking">        <img class="img-responsive center-block" src="img/offers/2.png"></a>
                  <a href="Product.php?value=Academic%20and%20Professional"> <img class="img-responsive center-block" src="img/offers/3.png"></a>
              </div>
          </div>
          -->
      </div>

  <div class="container-fluid text-center" id="new">
      <div class="row" id="hid">
         <?php
            $query = "SELECT * from book WHERE avail='y' ORDER BY RAND()";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0)
            {
                $i=0;
                while($row= mysqli_fetch_array($result)){
                    if($i<4){
          ?>
          <div class="col-sm-6 col-md-3 col-lg-3" >
              <a href=<?php echo "description.php?ID=".$row['bid'] ?> >
                  <div class="book-block">
                      <img class="book block-center img-responsive" src=<?php echo "img/book/".$row['bid'].".jpg" ?>>
                      <hr>
                      <?php echo $row['title']; ?><br>
                      <?php echo $row['oprice']; ?>  &nbsp
                      <span style="text-decoration:line-through;color:#828282;"> <?php echo $row['aprice']; ?> </span>
                      <span class="label label-warning">
                          <?php 
                                $per= 100-(($row['oprice']*100)/$row['aprice']);
                                echo round($per)."%" ;
                          ?>
                      </span>
                  </div>
              </a>
          </div>
          <?php
                    $i++;
                    }
                }
            }
          ?>
         
         
         
          
      </div>
  </div>


  <footer style="margin-left:-6%;margin-right:-6%;">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-1 col-md-1 col-lg-1">
              </div>
              <div class="col-sm-7 col-md-5 col-lg-5">
                  <div class="row text-center">
                      <h2>Let's Get In Touch!</h2>
                      <hr class="primary">
                      <p>Still Confused? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                  </div>
                  <div class="row">
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-earphone"></span>
                          <p>123-456-6789</p>
                      </div>
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-envelope"></span>
                          <p>BookStore@gmail.com</p>
                      </div>
                  </div>
              </div>
              <div class="hidden-sm-down col-md-2 col-lg-2">
              </div>
              <div class="col-sm-4 col-md-3 col-lg-3 text-center">
                  <h2 style="color:#D67B22;">Follow Us At</h2>
                  <div>
                      <a href="https://twitter.com/strandbookstore">
                      <img title="Twitter" alt="Twitter" src="img/social/twitter.png" width="35" height="35" />
                      </a>
                      <a href="https://www.linkedin.com/company/strand-book-store">
                      <img title="LinkedIn" alt="LinkedIn" src="img/social/linkedin.png" width="35" height="35" />
                      </a>
                      <a href="https://www.facebook.com/strandbookstore/">
                      <img title="Facebook" alt="Facebook" src="img/social/facebook.png" width="35" height="35" />
                      </a>
                      <a href="https://plus.google.com/111917722383378485041">
                      <img title="google+" alt="google+" src="img/social/google.jpg" width="35" height="35" />
                      </a>
                      <a href="https://www.pinterest.com/strandbookstore/">
                      <img title="Pinterest" alt="Pinterest" src="img/social/pinterest.jpg" width="35" height="35" />
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </footer>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>	