<?php
include 'connection.php';

$query = "select $_POST['field'] from pokemons where poke_id='$_POST['poke_id']'";
$result=mysqli_query($dbc,$query) or die("ERROR in 1".mysqli_error($dbc));
$row=mysqli_fetch_array($result);
$pre_edit=$row[0];

$query1="insert into edit(edit_type,edit,pre_edit) values('$_POST['field']','$_POST['desc']','$pre_edit')";
$result1=mysqli_query($dbc,$query1) or die("ERROR in 2".mysqli_error($dbc));


 ?>
