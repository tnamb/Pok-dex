<?php
include 'connection.php';

// echo "<script>alert('Editing successful')</script>";


if($_POST['action']==1){
  $edit_id=$_POST['id'];

  $query1="select * from edit where edit_id=$edit_id";
  $result1=mysqli_query($dbc,$query1) or die("Error selecting<br>".mysqli_error($dbc));
  $edit_result=mysqli_fetch_array($result1);

  $query2="update pokemons set $edit_result[edit_type]='$edit_result[edit]',edit_id=$edit_result[edit_id]
            where poke_id=$edit_result[poke_id]";
  $result2=mysqli_query($dbc,$query2) or die("Error updating<br>".mysqli_error($dbc));

  $query3="delete from edit where edit_id=$edit_result[edit_id]";
  $result3=mysqli_query($dbc,$query3) or die("Error Deleting(accept)<br>".mysqli_error($dbc));
  echo "1";
}
elseif ($_POST['action']==0) {
  echo"Denied";
}

 ?>
