<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
    $_SESSION['logged_in']=0;
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pokedex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <style>

		img
		{
  			display: block;
  			max-width: 100%;
  			height: auto;
		}

    .carousel-inner img
		{
        	width: 100%;
        	height: 100%;
    	}

	.main_content
		{
			width:100%;
		}

	.tab
		{
			margin: 0 auto;
		}

    </style>

  </head>
  	<body>
    <!-- Caurosel -->
    <div id="demo" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    <div class="carousel-item active">
          <img src="../assets/img/1.jpg" alt="Pokemon spectrum" width="1100" height="500">
          <div class="carousel-caption">
            <h3>Pokemon Spectrum</h3>
            <p>Get To Know About Pokemons And Their Evolutions!</p>
          </div>
    </div>
        <div class="carousel-item">
          <img src="../assets/img/2.jpg" alt="Gotta Catch 'em All" width="1100" height="500">
          <div class="carousel-caption">
            <h3>Gotta Catch 'em All</h3>
            <p>Do You Think You Know About All of Ash's Pokemons?</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../assets/img/3.png" alt="The Fab Four" width="1100" height="500">
          <div class="carousel-caption">
            <h3>The Fab Four</h3>
            <p>The Pokemons We Grew Up With</p>
          </div>
        </div>
    </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
    <!-- End of Caurosel -->


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
              if(isset($_SESSION['role']) && $_SESSION['role']=='admin')
              {
             ?>
             <li class="nav-item text-light ">
               <a class="nav-link" href="admin_edit_request.php">∙ AdminHome</a>
             </li>

           <?php } ?>
            <li class="nav-item active">
              <a class="nav-link" href="demo.php">∙ Home</a>
            </li>

            <li class="nav-item">
  						<a class="nav-link" href="PokeDetailPage.php">∙ Poke List
  						</a>
  					</li>

            <li class="nav-item">
              <a class="nav-link" href="forum_home.php">∙ ForumHome
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


    <!-- END OF NAVIGATION -->


  <!-- PROLOGUE BODY --->
  <section>
      <div class="container">
      <div class="row align-items-center">
       <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img style="border-radius:100px;" class="img-fluid circle" src="../assets/img/ab.png" alt="">
            </div>
       </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Miss The Old Pokemon Games?</h2>
              <p>We'll be providing information related to only the games. You can look up for all the old pokemons and old characters that we grew fond of. </p>
            </div>
          </div>
        </div>
      </div>
  </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="p-5">
              <img style="border-radius:100px;" class="img-fluid circle" src="../assets/img/poke.png" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <h2 class="display-4">Miss The Old Anime?</h2>
              <p>You will not need to worry about our site dwelling too much on the newer pokemons. We'll put you through a ride that only will stirr nostalgia. Enjoy your Pokemon Journey!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img style="border-radius:100px;" class="img-fluid circle" src="../assets/img/cd.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Ka-Me-Ha-Me-Ha!</h2>
              <p>From normal attacks to special attacks, we'll give you insight about any Pokemon's favourite and rarest moves, and from defence to offense, we've got you covered just like the old games! </p>
            </div>
          </div>
        </div>
      </div>
    </section>

 <!-- END OF PROLOGUE BODY --->


 <!--- MAIN BODY --->

 <hr>

 <div class="main_content">
 <table style="width:95%; margin-left:1%; text-align:center" border="0">
      <h2 style="text-align:center">A Few Pokemons</h2>
		<br>

     <tr>

      	<td width="25%">
      	<h2 class="tab">Bulbasaur</h2>
      		<p>
      	<img style="width:35%; margin: 0 auto" class=" img-responsive img-thumbnail" src="../assets/img/Bulbasaur.png"/>
      		</p>
      	</td>

      	<td width="68%">
      		<p>
      			Bulbasaur, known as Fushigidane in Japan, is the first Pokémon species in Nintendo and Game Freak's Pokémon franchise. Designed by Ken Sugimori, their name is a combination of the words "bulb" and "dinosaur." Bulbasaur are small, squat reptilian and plant Pokémon that move on all four legs, and have light blue-green bodies with darker blue-green spots. As a Bulbasaur undergoes evolution into Ivysaur and then later into Venusaur, the bulb on its back blossoms into a large flower. The seed on a Bulbasaur's back is planted at birth and then sprouts and grows larger as the Bulbasaur grows
      		</p>
      	</td>
      </tr>

      <tr>

      	<td class="tab" style="wdith:25%">
      	<h2>Squirtle</h2>
      		<p>
      	<img style="width:35%" class="img-fluid img-responsive img-thumbnail tab" src="../assets/img/squirtle.png"/>
      		</p>
      	</td>

      	<td>
      		<p>
      			Squirtle is a small Pokémon that resembles a light blue turtle. While it typically walks on its two short legs, it has been shown to run on all fours in Super Smash Bros. Brawl. It has large eyes and a slightly hooked upper lip. Each of its hands and feet have three pointed digits. The end of its long tail curls inward
      		</p>
      	</td>
      </tr>

      <tr>

      	<td style="width:25%">
      	<h2>Charmander</h2>
      		<p>
      	<img style="width:35%" class="img-fluid img-responsive img-thumbnail tab" src="../assets/img/charmander.png"/>
      		</p>
      	</td>

      	<td>
      		<p>
      			Charmander is a bipedal, reptilian Pokémon with a primarily orange body. Its underside from the chest down and soles are cream-colored. It has two small fangs visible in its upper jaw and two smaller fangs in its lower jaw. Charmander has blue eyes. Its arms and legs are short with four fingers and three clawed toes.
      		</p>
      	</td>
      </tr>

  </table>
    </div>

  <div style="margin-left:40%; margin-bottom:2%">
 <a href="PokeDetailPage.php"><button role="button" class="btn btn-success btn-lg align-items-center">Click To See More Pokemons</button></a>
  </div>

 <!--- END OF MAIN BODY --->

 <!--- FOOTER --->

 <footer style="background-color:black" class="py-5 bg-black">
      <div class="container">
        <p class="m-0 text-center text-white small">Pokedex 2018. All Rights Reserved &copy; </p>
      </div>
 </footer>

 <!--- END OF FOOTER --->

  </body>
</html>
