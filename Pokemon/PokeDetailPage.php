<?php
session_start();
  include 'connection.php';

  $query="select name,description,image,poke_id from pokemons";
  $result= mysqli_query($dbc,$query) or die("Error querying<br>".mysqli_error($dbc));
  $n=mysqli_num_rows($result);


if(!empty($_POST['field']))
  {
    $field=$_POST['field'];
    $desc=$_POST['desc'];
    $r_poke_id=$_POST['poke_id'];
    $query = "select $field from pokemons where poke_id='$r_poke_id'";
    $result=mysqli_query($dbc,$query) or die("ERROR in 1".mysqli_error($dbc));
    $row=mysqli_fetch_array($result);

    $pre_edit=$row[0];

    $query1="insert into edit(poke_id,edit_type,edit,pre_edit) values('$r_poke_id','$field','$desc','$pre_edit')";
    $result1=mysqli_query($dbc,$query1) or die("ERROR in 2".mysqli_error($dbc));
    echo "<script>alert('Your request for edit have been sent to Admin\\t\\nThank You');</script>";
    echo "<script>window.location.assign('PokeDetailPage.php');</script>";
  }


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Poke List</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      function showDetails(idf) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("moredetails"+idf  ).innerHTML =
            this.responseText;
          }
        };
        xhttp.open("POST", "PokePoke2.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+idf);
      }

      function editRequest(idf) {
        var e_request = new XMLHttpRequest();
        e_request.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("edit"+idf).innerHTML =
            this.responseText;
          }
        };
        e_request.open("POST", "edit.php", true);
        e_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        e_request.send("id="+idf);
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
  					<span class="navbar-text text-light"></span>

            <?php
            if(isset($_SESSION['role'])&&$_SESSION['role']=='admin')
            {
            ?>
            <li class="nav-item">
  						<a class="nav-link" href="admin_edit_request.php">∙ AdminHome</a>
  					</li>

            <?php } ?>

            <li class="nav-item">
              <a class="nav-link" href="demo.php">∙ Home</a>
            </li>

  					<li class="nav-item active">
  						<a class="nav-link" href="PokeDetailPage.html">∙ Poke List
  						</a>
  					</li>

  					<!-- <li class="nav-item">
  						<a class="nav-link" href="#">∙ Legendary Pokemons
  						</a>
  					</li>

  					<li class="nav-item">
  						<a class="nav-link" href="#">∙ Rare Pokemons
  						</a>
  					</li>

  					<li class="nav-item">
  						<a class="nav-link" href="#">∙ Pokemon Regions
  						</a>
  					</li>

  					<li class="nav-item">
  						<a class="nav-link" href="#">∙ Pokemon Characters
  						</a>
  					</li> -->

            <?php
              if($_SESSION['logged_in']==0)
              {
             ?>

            <li class="nav-item">
              <a class="nav-link" href="login.php">∙ Log In
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">∙ Register
              </a>
            </li>

            <?php } else { ?>
            <li class="nav-item">
  						<a class="nav-link" href="logout.php">∙ Log out
  						</a>
  					</li>
            <?php } ?>
  				</ul>

  			</div>
  		</div>
  	</nav>

    <div class="container" id="parent">
      <div class="row">
        <h4 class="py-3">LIST OF POKEMONS</h4>
      </div>


      <!-- Loop should start here -->
      <!-- for i=0 till i < no of columns -->
      <?php for ($i=0; $i<$n; $i++) {
        $row=mysqli_fetch_array($result);
      ?>
      <!-- pokemon name and description -->
      <div class="row mt-2" onclick="showDetails(<?php echo $row['poke_id']; ?>);"
        data-toggle="collapse" data-target="<?php echo '#moredetails'.$row['poke_id']; ?>" data-toggle="tooltip" title="Click me to see more!">

        <div class="col-sm-3">
          <p>
            <img style="width:50%" class=" img-responsive rounded"
                src="../assets/img/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>"/>
          </p>

          <p  class="text-capitalize font-weight-bold lead btn btn-danger">
            <?php echo $row['name'] ?>
          </p>
        </div>

        <div class="col-sm-9">
          <p class="lead">Description:</p>
          <p>
            <?php echo $row['description'] ?>
          </p>
        </div>
      </div>
      <!-- pokemon more details -->
      <div class="container">
        <div class="row" id="<?php echo 'moredetails'.$row['poke_id']; ?>" data-parent="#parent">
          <!-- AJAX HERE -->

        </div>


      </div>


      <div class="container" id="parent2" >
        <div class="row" id="<?php echo 'edit'.$row['poke_id']; ?>" >

        </div>
<hr>
      </div>

      <?php }  ?>
      <!-- Loop should end here -->

    </div>

    <footer style="background-color:black" class="py-5">
  		<div class="container">
  			<p class="m-0 text-center text-white small">Pokedex 2018. All Rights Reserved &copy; </p>
  		</div>
  	</footer>

    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

  </body>
</html>
