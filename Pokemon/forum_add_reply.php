<?php
session_start();
if(($_SESSION['logged_in']!=1))
{
  header('location:login.php?err=3');
}

include "connection.php";

if(isset($_POST['comment']))
{
  $topic_id=$_POST['topic_id'];
  $comment=$_POST['comment'];
  $user=$_SESSION['email'];
  //
  $query="insert into forum_replies(topic_id,comment,commented_by) values('$topic_id','$comment','$user')";
  $result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
  echo "<script>alert('Comment added');
    window.location.assign('forum_topic.php?id=".$topic_id."')</script>";
}
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Comment</title>

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
      <h3 class="text-center font-weight-bold">Comment on <?php echo ucfirst($_POST['topic_name']); ?></h3>
      <div class="container">

        <form class="" action="forum_add_reply.php" method="post">
          <div class="form-group">

            <textarea name="comment" id="comment" class="form-control" rows="4" cols="8" required="" placeholder="write here..."></textarea>
          </div>
          <input type="hidden" name="topic_id" value="<?php echo $_POST['topic_id']; ?>" >
          <button type="submit" class="btn btn-primary">Comment</button>
        </form>

      </div>
    </div>

  </body>
</html>
