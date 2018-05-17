<?php
session_start();
if(($_SESSION['logged_in']!=1))
{
  header('location:login.php?err=3');
}
include 'connection.php';

// Topic owner's comment
$topic_id=$_GET['id'];
$query="select starting_text,topic_name,created_by,time_stamp from forum_topics where topic_id=$topic_id";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
$start_with=mysqli_fetch_array($result);
$time_date=date_create($start_with['time_stamp']);

// other user's reply
$query2="select * from forum_replies where topic_id=$topic_id";
$result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
$no=mysqli_num_rows($result2);

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta charset="utf-8">
    <title>Topic - <?php echo ucfirst($start_with['topic_name']); ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="content-language" content="en-us" />
    <link rel="start" title="Home" href="http://www.sixpence.com/" />
    <link rel="stylesheet" type="text/css" media="screen" href="screen.css" />


<style>
    td, th
    {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
</style>

  </head>
  <body>

    <div class="container text-center">
      <h3>Poke Forums</h3>
      <p>A forum for all the Pokemon Lovers! Yayyyy :D</p>

    </div>

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


            <li class="nav-item">
              <a class="nav-link" href="forum_home.php">∙ ForumHome</a>
            </li>

  					<li class="nav-item active">
              <?php
              if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
              ?>
             <li class="nav-item text-light ">
               <a class="nav-link" href="admin_edit_request.php">∙ AdminHome</a>
             </li>
             <?php } ?>


            <li class="nav-item">
  						<a class="nav-link" href="logout.php">∙ Log out
  						</a>
  					</li>
  				</ul>

  			</div>
  		</div>
  	</nav>
<!-- NAVIGATION END -->

<!-- POSTS-->

<!--TOPIC NAME-->
<h4 class="text-uppercase font-weight-bold mb-5" style="margin-left:5%; margin-top: 2%;">Topic - <?php echo ucfirst($start_with['topic_name']); ?></h4>

<div class="color:white">

  <div class="container">
    <h4 >Original Post:</h4>
  </div>

    <table style="width:95%; margin-left:3%; margin-top: 2%;margin-bottom:2%; background:#000000; color:white; border-radius:6px; border-collapse: collapse">
            <tr> <!--USER DETAILS-->
                <th >
                  <p>User: </p>
                  <p><?php echo $start_with['created_by']; ?></p>
                </th>

                <!-- USER's POST-->
                <th style="width:70%" >
                  <p><?php echo ucwords($start_with['starting_text'],"."); ?></p>
                </th>

                <!--PHP TIME FUNCTION-->
                <th style="width:10%">
                  <p><?php echo date_format($time_date,"d M,Y") ?></p>
                  <p><?php echo date_format($time_date,"h:i A") ?></p>
                </th>
            </tr>
        </table>

        <!-- Other User's reply -->
        <div class="container">
          <h4 >Replies:</h4>
        </div>

        <?php
        if($no==0)
        {
        ?>
        <div class="container">
          <p class="alert alert-danger">No Replies yet! Be the first one to start</p>
        </div>

        <?php } else {

        ?>
        <table style="width:95%; margin-left:3%; margin-top: 2%;margin-bottom:8%; background:#000000; color:white; border-radius:6px; border-collapse: collapse">
          <?php for($i=0;$i<$no;$i++){
           $reply=mysqli_fetch_array($result2);
           $time_date2=date_create($reply['time_stamp']);
            ?>
                <tr> <!--USER DETAILS-->
                    <th >
                      <p>User: </p>
                      <p><?php echo $reply['commented_by']; ?></p>
                    </th>

                    <!-- USER's POST-->
                    <th style="width:70%" >
                      <p><?php echo ucwords($reply['comment'],"."); ?></p>
                    </th>

                    <!--PHP TIME FUNCTION-->
                    <th style="width:10%">
                      <p><?php echo date_format($time_date2,"d M,Y") ?></p>
                      <p><?php echo date_format($time_date2,"h:i A") ?></p>
                    </th>
                </tr>
                <?php }} ?>
          </table>

</div>



<!--- ADD REPLY BUTTON-->
<!-- <form  action="forum_add_reply.php" method="post">
  <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>" >
  <input type="hidden" name="topic_name" value="<?php echo $start_with['topic_name']; ?>" >
    <button type="submit" class="btn btn-primary fixed-bottom rounded-square border" title="Add Reply" style="margin-left:50%;margin-bottom:10%;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
      <i class="fa fa-plus" style="font-size:30px;color:white;"></i>
    </button>
</form> -->



<footer style="background-color:black" class="py-5 bg-black" >
    <div class="container">
      <p class="m-0 text-center text-white small">Pokedex 2018. All Rights Reserved &copy; </p>
    </div>
</footer>
  </body>
</html>
