<?php
session_start();
if(($_SESSION['logged_in']!=1))
{
  header('location:login.php?err=3');
}
include 'connection.php';
$query="select topic_id,topic_name,created_by,time_stamp from forum_topics";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
$no=mysqli_num_rows($result);


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Forum Home</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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

    <?php
    if($no==0)
    {
    ?>
    <div class="container">
      <p class="alert alert-danger">No topics!Be the first one to start</p>
    </div>

    <?php } else ?>

    <div class="container ">

      <div class="row my-3">
        <table class="table table-striped table-hover table-bordered ">
          <thead class="text-center ">
            <th style="width:75%">Topic</th>

            <th>Last Post</th>
          </thead>
          <tbody>
            <?php for ($i=0; $i <$no ; $i++) {
              $row=mysqli_fetch_array($result);

              // to check the last update
              $query2="select commented_by,time_stamp from forum_replies where topic_id=$row[topic_id] order by time_stamp desc";
              $result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
              $row2=mysqli_fetch_array($result2);
              if(!empty($row2['time_stamp']))
                $time_date2=date_create($row2['time_stamp']);
              else
                $time_date2=NULL;
             ?>
            <tr>
              <td><?php echo "<a href='forum_topic.php?id=".$row['topic_id']."'>".ucfirst($row['topic_name'])."</a>" ?>
                <span class="text-muted ">by <?php echo $row['created_by']; ?></span>
              </td>

              <td>
                <p>
                <?php if(!$time_date2==NULL){
                echo date_format($time_date2,"d M,Y")." | "
                .date_format($time_date2,"h:i A") ?>
              </p>
                <p class="text-muted">by <?php echo $row2['commented_by']; ?></p>
                <?php }else{
                  echo "<p>No posts yet</p>" ?>
              </td>
            </tr>
            <?php }} ?>
          </tbody>
        </table>
      </div>

    </div>

<a href="forum_add_topic.php">
<button class="btn btn-danger fixed-bottom rounded-circle my-5 border" title="Add topic" style="margin-left:50%;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
  <i class="fa fa-plus" style="font-size:40px;color:white;"></i>
</button>
</a>


  </body>
</html>
