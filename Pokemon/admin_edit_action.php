<?php
include 'connection.php';

// echo "<script>alert('Editing successful')</script>";

$edit_id=$_POST['id'];
$query1="select * from edit where edit_id=$edit_id";
$result1=mysqli_query($dbc,$query1) or die("Error selecting<br>".mysqli_error($dbc));
$edit_result=mysqli_fetch_array($result1);

if($_POST['action']==1){

  $query2="update pokemons set $edit_result[edit_type]='$edit_result[edit]',edit_id=$edit_result[edit_id]
            where poke_id=$edit_result[poke_id]";
  $result2=mysqli_query($dbc,$query2) or die("Error updating<br>".mysqli_error($dbc));

  $query3 ="insert into accepted_request(edit_id,poke_id,request_from,edit_type,pre_edit,edit,time_stamp)
            values($edit_result[edit_id],$edit_result[poke_id],
              '$edit_result[request_from]','$edit_result[edit_type]','$edit_result[pre_edit]','$edit_result[edit]','$edit_result[time_stamp]')";
  $result3=mysqli_query($dbc,$query3) or die("Error Inserting(accept)<br>".mysqli_error($dbc));

  $query4="delete from edit where edit_id=$edit_result[edit_id]";
  $result4=mysqli_query($dbc,$query4) or die("Error Deleting(accept)<br>".mysqli_error($dbc));
  echo "1";
}
elseif ($_POST['action']==0) {

    $query3 ="insert into declined_request(edit_id,poke_id,request_from,edit_type,pre_edit,edit,time_stamp)
              values($edit_result[edit_id],$edit_result[poke_id],
                '$edit_result[request_from]','$edit_result[edit_type]','$edit_result[pre_edit]','$edit_result[edit]','$edit_result[time_stamp]')";
    $result3=mysqli_query($dbc,$query3) or die("Error Inserting(accept)<br>".mysqli_error($dbc));

    $query4="delete from edit where edit_id=$edit_result[edit_id]";
    $result4=mysqli_query($dbc,$query4) or die("Error Deleting(accept)<br>".mysqli_error($dbc));
    echo "0";
}

 ?>
