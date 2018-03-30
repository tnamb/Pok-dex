<?php
include 'connection.php';
$str=$_POST['q'];

$query="select * from pokemons where name like '%$str%'";
$result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));


$n= mysqli_num_rows($result);


 ?>

<p>Suggestion:</p>
 <ul>
   <?php for($i=0;$i<$n;$i++) {
     $res = mysqli_fetch_array($result);
     ?>
     <li class="py-1"><?php echo ucfirst($res['name']); ?></li>
     <?php } ?>
 </ul>
