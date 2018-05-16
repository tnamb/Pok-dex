<?php
session_start();
if(($_SESSION['logged_in']!=1))
{
  header('location:login.php?err=3');
}
include 'connection.php';
$topic_id=$_GET['id'];
$query="select starting_text,topic_name from forum_topics where topic_id=$topic_id";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
$start_with=mysqli_fetch_array($result);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Topic - <?php echo ucfirst($start_with['topic_name']); ?></title>
  </head>
  <body>
    

  </body>
</html>
