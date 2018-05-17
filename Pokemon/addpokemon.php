<?php
session_start();
if(($_SESSION['logged_in']!=1)or ($_SESSION['role']!='admin'))
{
  header('location:login.php?err=2');
}

  include 'connection.php';

  if(isset($_POST['name']) && !empty($_POST['name']))
  {
    $user_image_name= $_FILES["fileToUpload"]["name"];
    $server_imageDir="/var/www/html/Pok-dex/assets/img/";
    $image_location=$server_imageDir.$user_image_name;
    $upload_image_ok=1;

    if(!empty($user_image_name))
    {
      $imageFileType = pathinfo($image_location,PATHINFO_EXTENSION);
      // Check if file already exists
      if (file_exists($image_location))
      {
        die("<script>
        alert('Sorry, file already exists with same name');</script>");
        $upload_image_ok = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
      {
        die("<script>
        alert('\t\t\t\tSorry!\\nOnly JPG, JPEG & PNG Image formats are allowed');</script>");
        $upload_image_ok = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 5000000)
      {
        die("<script>alert('Sorry!\\nYour Image is more than 5MB')</script>");
        $upload_image_ok = 0;
      }
    }

    $name=$_POST['name'];
    $desc = $_POST['desc'];
    $moves=$_POST['moves'];
    $weight=$_POST['weight'];
    $height=$_POST['height'];
    $evform=$_POST['evform'];
    $pre_evform=$_POST['pre_evform'];
    $type=$_POST['type'];

    $check_query="select name from pokemons where name='$name'";
    $check_result=mysqli_query($dbc,$check_query) or die("Selecting error<br>".mysqli_error($dbc));

    $updated_image_name = $name.".".$imageFileType;
    $updated_image_location = $server_imageDir.$updated_image_name ;

    if(mysqli_num_rows($check_result)==0){

      //Image Upload
      if($upload_image_ok!=0 && !empty($user_image_name))
      {
        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$updated_image_location))
        {
          $query1="insert into pokemons(name,description,moves,weight_in_kg,height_in_m,evolution_form,pre_evolution_form,type,
            image) values('$name','$desc','$moves',$weight,$height,'$evform','$pre_evform','$type','$updated_image_name')";
          $result1= mysqli_query($dbc,$query1)
                      or die("Error in querying<br>".mysqli_error($dbc));
        }
        else {
          die("<script>alert('Error uploading Image!')</script>");
        }
      }
      // $query = "insert into pokemons()
      //             values() ;";
      // $result= mysqli_query($dbc,$query)
      //             or die("Error in querying database<br>".mysqli_error($dbc));
    }
    else {
      die ("<script>alert('Pokemon with this name already exist!');</script>");
    }



    echo "<script>alert('Addition Successful!');</script>";




  }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Add Pokemon</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

     <style media="screen">
       label{
        width: 8rem;
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
         <a class="navbar-brand" href="demo.php">Pokedex</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">

           <ul class="navbar-nav ml-auto">
             <span class="navbar-text text-light">
             </span>
             <li class="nav-item">
               <a class="nav-link" href="demo.php">∙ Home</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="forum_home.php">∙ ForumHome
               </a>
             </li>
             <li class="nav-item">
   						<a class="nav-link" href="PokeDetailPage.php">∙ Poke List
   						</a>
   					</li>
            <li class="nav-item active">
             <a class="nav-link" href="addpokemon.php">∙ Add Pokemon
             </a>
           </li>
             <li class="nav-item">
               <a class="nav-link" href="logout.php">∙ Log Out
               </a>
             </li>

           </ul>

         </div>
       </div>
     </nav>

     <!-- Adding pokemon body -->
     <div class="container py-5">
        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="addpokemon.php" onsubmit="return(validate());">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Add Pokemon</h2>
                    <hr>
                </div>
            </div>

            <!-- Name -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="name">Name</label>
                            </div>
                            <input type="text" name="name" class="form-control text-capitalize" id="name"
                                 required autofocus>
                        </div>
                    </div>
                </div>
            </div>

            <!--Short Description -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="desc">Description</label>
                            </div>
                            <textarea name="desc" id="desc" class="form-control text-capitalize"  rows="2" cols="8" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Moves -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="moves">Moves</label>
                            </div>
                            <!-- <input type="text" name="lname" class="form-control text-capitalize" id="lname"
                                   placeholder="Type here..." required> -->
                            <textarea name="moves" id="moves" class="form-control text-capitalize"  rows="1" cols="8" placeholder="Seperate using comma(,)"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weight -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="weight">Weight</label>
                            </div>
                            <input type="number" step="any" min=0 name="weight" class="form-control" id="weight"
                                    required>
                                   <div class="input-group-append" >
                                     <span class="input-group-text">kg</span>
                                   </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Height -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="height">Height</label>
                            </div>
                            <input type="number" step="any" min=0 name="height" class="form-control" id="height"
                                    required>
                                   <div class="input-group-append" >
                                     <span class="input-group-text">m</span>
                                   </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Evolution Form -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="evform">Evolution</label>
                            </div>
                            <input type="text" name="evform" class="form-control" id="evform"
                                    required>
                        </div>
                    </div>
                </div>
              </div>

            <!-- Pre-Evolution Form -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="pre_evform">Pre-Evolution</label>
                            </div>
                            <input type="text" name="pre_evform" class="form-control" id="pre_evform"
                                    required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Type -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-prepend" >
                              <label class="input-group-text" for="type">Type</label>
                            </div>
                            <input type="text" name="type" class="form-control" id="type"
                                    required>
                        </div>
                    </div>
                </div>
              </div>

              <!-- Image -->
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                      <div class="input-group-prepend" >
                        <label class="input-group-text" for="img">Image:</label>
                      </div>
                      <input type="file" class="form-control" id="img" name="fileToUpload" required>
                    </div>
                  </div>
                </div>
              </div>


            <!-- Submit Button -->
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>

   </body>
 </html>
