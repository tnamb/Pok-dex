<?php
session_start();
if(($_SESSION['logged_in']!=1))
{
  header('location:login.php?err=3');
}

include "connection.php";

if(isset($_POST['topic_name']))
{
  $topic_name=$_POST['topic_name'];
  $start_with=$_POST['start_with'];
  $user=$_SESSION['email'];

  $query="insert into forum_topics(topic_name,starting_text,created_by) values('$topic_name','$start_with','$user')";
  $result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
  echo "<script>alert('Topic started');window.location.assign('forum_home.php')</script>";
}
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add topic</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body style="height:80px">

    <button type="button" class="btn btn-light rounded-circle ml-3 mt-3 border-dark" onclick="history.go(-1)" style=""><i class="fa fa-arrow-left"></i></button>

    <div class="jumbotron w-50" style="margin-left:25%;margin-top:5%">
      <h3 class="text-center font-weight-bold">Start a new topic</h3>
      <div class="container">

        <form class="" action="forum_add_topic.php" method="post">
          <div class="form-group">
            <label for="topic_name">Topic Name:</label>
            <input type="text" name="topic_name" id="topic_name" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="start_with">Start with:</label>
            <textarea name="start_with" id="start_with" class="form-control" rows="4" cols="8" required=""></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Let's Start</button>
        </form>

      </div>
    </div>

  </body>
</html>
