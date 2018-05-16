<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
    $_SESSION['logged_in']=0;
}
if($_SESSION['logged_in']==1){
  header("location:demo.php");
}

$err = array(1 => "You need to Log-in to read the complete article.",
              2 => "You need to Log-in as an Admin.",
              3 => "You need to Log-in to access Forum."
              );
include 'connection.php';

if(!isset($_GET['err'])){
  $error=0;}
else {
  $error=$_GET['err'];
}

if(isset($_POST['email']) && !empty($_POST['email']))
{
  $email=$_POST['email'];
  $password = $_POST['password'];
  $query = "select * from login where email='$email'";
  $result = mysqli_query($dbc,$query)  or die("First query error");
  if(mysqli_num_rows($result)==0)
  {
    echo "<script>alert('Incorrect Email-Id or password\\n\\tTry again');</script>";
  }
  else {
    $val = mysqli_fetch_array($result);

    if($val['password'] != $password)
    {
      echo "<script>alert('Incorrect Email-Id or password\\n\\tTry again');</script>";
    }
    else {
      $_SESSION['logged_in']=1;
      $_SESSION['email']=$email;
      $_SESSION['role']=$val['role'];
      if($_SESSION['role']=='user')
      {
        header("location: demo.php");
      }
      else
      {
        header("location: admin_edit_request.php");
      }
    }
  }
}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Login</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   </head>

   <body>
     <!-- Navigation -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
       <div class="container">
         <a class="navbar-brand" href="">Pokedex</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">

           <ul class="navbar-nav ml-auto">
             <span class="navbar-text text-light">
             </span>
             <li class="nav-item">
               <a class="nav-link" href="demo.php">Home</a>
             </li>
             <li class="nav-item">
   						<a class="nav-link" href="PokeDetailPage.php">∙ Poke List
   						</a>
   					</li>
             <li class="nav-item active">
               <a class="nav-link" href="login.php">Login
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="register.php">Register
               </a>
             </li>
           </ul>

         </div>
       </div>
     </nav>

     <!-- Login body -->
     <div class="container py-5">
      <?php
        if($error>0)
         {
        ?>
           <p style='color:red;' class="text-center"><?php echo $err[$error]; ?></p>
      <?php } ?>
        <form class="form-horizontal" role="form" method="POST" action="login.php">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Login</h2>
                    <hr>
                </div>
            </div>

            <!-- Email-ID -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text"style="width: 5.6rem" for="email">Email-Id</label>
                            </div>
                            <input type="email" name="email" class="form-control" id="email"
                                   placeholder="you@example.com" required autofocus>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"></i> Example error message
                        </span>
                    </div>
                </div> -->
            </div>

            <!-- Password -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" style="width: 5.6rem">
                              <label class="input-group-text" for="password">Password</label>
                            </div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->
                        </span>
                    </div>
                </div>
            </div>

            <!-- 'Remember me' Checkbox -->
            <!-- <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top: .35rem">
                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="form-check-input" name="remember"
                                   type="checkbox" >
                            <span style="padding-bottom: .15rem">Remember me</span>
                        </label>
                    </div>
                </div>
            </div> -->

            <!-- Submit Button -->
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Login</button>
                    <!-- <a class="btn btn-link" href="/password/reset">Forgot Your Password?</a> -->
                </div>
            </div>
        </form>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6 py-2">
            <span class="">Not registered yet?
              <a href="#">Register here</a>
            </span>
          </div>
        </div>
    </div>

   </body>
 </html>
