<?php
session_start();

include 'connection.php';

// $query="select * from edit order by time_stamp desc;";
// $result = mysqli_query($dbc,$query) or die("Error<br>".mysqli_error($dbc));
// $n=mysqli_num_rows($result);
 ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Search</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">

      function showResult(str) {

        if (str.length==0) {
          document.getElementById("livesearch").innerHTML="";
          document.getElementById("livesearch").style.border="0px";
          return;
        }
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          var xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
          var xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("livesearch").style.display="block";
            document.getElementById("livesearch").innerHTML=this.responseText;
            document.getElementById("livesearch").style.border="1px solid #A5ACB2";
          }
        }
        xmlhttp.open("POST","livesearch.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("q="+str);
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
            <li class="nav-item">
              <a class="nav-link" href="#">∙ AdminHome</a>
            </li>

  					<li class="nav-item">
  						<a class="nav-link" href="demo.php">∙ Home</a>
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
        <div class="col-lg-6">

        </div>
        <div class="input-group mb-3 py-5">
          <input type="text" class="form-control" onkeyup="showResult(this.value)" placeholder="search..." aria-label="search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary"  type="button">GO!</button>
          </div>
          <div id="livesearch" class=" form-control mt-5" style="position:absolute;width:inherit;display:none;opacity:0.9;color:black;"></div>
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
