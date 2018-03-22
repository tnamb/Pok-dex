<?php
session_start();
  if($_SESSION['logged_in']==1){
    header("location:demo.php");
}
  include 'connection.php';

  if(isset($_POST['fname']) && !empty($_POST['fname']))
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $check_query="select reg_id from register where email='$email'";
    $check_result=mysqli_query($dbc,$check_query) or die("Selecting error");
    if(mysqli_num_rows($check_result)==0){
      $query = "insert into register(fname,lname,email,password,role) values('$fname','$lname','$email','$password','user') ";
      $result= mysqli_query($dbc,$query)
                  or die("Error in querying database");
      $insert_login="insert into login values('$email','$password','user')";
      $insert_result= mysqli_query($dbc,$insert_login)
                  or die("Error in querying login table");
      echo "<script>alert('Registration Successful!');
              window.location.assign('login.php');</script>";
    }
    else {
      echo "<script>alert('Email Id already exist!\\n\\tTry login');</script>";
    }

  }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Register</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

     <style media="screen">
       label{
        width: 10rem;
        text-align: center;
       }
     </style>

     <script type="text/javascript">
       function validate() {
        var password=document.getElementById('password').value;
        var cpassword=document.getElementById('cpassword').value;
        if(password != cpassword){
          document.getElementById('perror').innerHTML="Password do not match";
          return false;
        }
       }

     </script>
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
             <li class="nav-item">
               <a class="nav-link" href="login.php">Login
               </a>
             </li>
             <li class="nav-item active">
               <a class="nav-link" href="register.php">Register
               </a>
             </li>
           </ul>

         </div>
       </div>
     </nav>

     <!-- Register body -->
     <div class="container py-5">
        <form class="form-horizontal" role="form" method="POST" action="register.php" onsubmit="return(validate());">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Please Register</h2>
                    <hr>
                </div>
            </div>

            <!-- FirstName -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="fname">First Name</label>
                            </div>
                            <input type="text" name="fname" class="form-control text-capitalize" id="fname"
                                   placeholder="Type here..." required autofocus>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Last name -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="lname">Last Name</label>
                            </div>
                            <input type="text" name="lname" class="form-control text-capitalize" id="lname"
                                   placeholder="Type here..." required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Email-ID -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="email">Email-Id</label>
                            </div>
                            <input type="email" name="email" class="form-control" id="email"
                                   placeholder="you@example.com" required>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                             Example error message
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
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="password">Password</label>
                            </div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password" required>
                        </div>
                    </div>
                </div>
              </div>

            <!-- Confirm Password -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="cpassword">Confirm Password</label>
                            </div>
                            <input type="password" name="cpassword" class="form-control" id="cpassword"
                                   placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle" id="perror"></span>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Register</button>
                </div>
            </div>
        </form>

        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6 py-2">
            <span class="">Already registered?
              <a href="login.php">Login here</a>
            </span>
          </div>
        </div>
    </div>

   </body>
 </html>
