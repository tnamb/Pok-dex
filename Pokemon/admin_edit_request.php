<?php
session_start();
if(($_SESSION['logged_in']!=1)or ($_SESSION['role']!='admin'))
{
  header('location:login.php?err=2');
}
include 'connection.php';

$query="select * from edit order by time_stamp desc;";
$result = mysqli_query($dbc,$query) or die("Error<br>".mysqli_error($dbc));
$n=mysqli_num_rows($result);
 ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Edit requests</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">

    function editAction(idf,action) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var a =
          this.responseText;
          if(a==1){
            alert("Edited successful!");
            window.location.reload();
          }
          else if(a==0){
            alert("Request Declined!");
            window.location.reload();
          }
          else {
            alert(a);
          }
        }
      };
      xhttp.open("POST", "admin_edit_action.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("id="+idf+"&action="+action);
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
  					<span class="navbar-text text-light"></span>
            <li class="nav-item active">
              <a class="nav-link" href="#">∙ AdminHome</a>
            </li>

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
            <li class="nav-item">
  						<a class="nav-link" href="addpokemon.php">∙ Add Pokemon
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

  					<li class="nav-item">
  						<a class="nav-link" href="logout.php">∙ Log Out
  						</a>
  					</li>

  				</ul>

  			</div>
  		</div>
  	</nav>

    <div class="container">
      <div class="row">
        <div class="col">
          <h3 class="text-center mt-3">Welcome Admin</h3>
        </div>
      </div>

      <div class="row">
        <div class="">
          <p class="lead">Here are the list of edit requests:</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive-sm text-center">
            <table class="table table-hover">
              <thead class="thead-dark text-center">
                <tr>
                  <th>Edit-ID</th>
                  <th>Poke-ID</th>
                  <th>From</th>
                  <th>Edit Field</th>
                  <th>Pre-edit</th>
                  <th>Edit</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php
                  for($i=0;$i<$n;$i++)
                  {
                    $row=mysqli_fetch_array($result);
                    $time_date=date_create($row['time_stamp']);
                 ?>
                <tr>
                  <td><?php echo $row['edit_id'] ?></td>
                  <td><?php echo $row['poke_id'] ?></td>
                  <td><?php echo $row['request_from'] ?></td>
                  <td><?php echo $row['edit_type'] ?></td>
                  <td><?php echo $row['pre_edit'] ?></td>
                  <td><?php echo $row['edit'] ?></td>
                  <td><?php echo date_format($time_date,"d M,Y") ?></td>
                  <td><?php echo date_format($time_date,"h:i:s A") ?></td>
                  <td><button type="button" onclick="editAction(<?php echo $row['edit_id'] ?>,1)" class="btn btn-success" name="button">Accept</button> or
                    <button type="button" onclick="editAction(<?php echo $row['edit_id'] ?>,0)" class="btn btn-danger" name="button">Decline</button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>

            </table>

          </div>
        </div>

    </div>
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
