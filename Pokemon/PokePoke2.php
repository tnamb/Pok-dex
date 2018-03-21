<?php
  include 'connection.php';
  $id=$_POST['id'];
  $query1="select * from pokemons where poke_id=$id";
  $result1= mysqli_query($dbc,$query1) or die("Error querying<br>".mysqli_error($dbc));


  $row1=mysqli_fetch_array($result1);

  $evo= explode(",",trim($row1['evolution_form']));
 ?>
  <div class="conatainer" style="width:100%">
    <div class="row py-2">
      <div class="col-sm-4">
        <p class="font-weight-bold" style="font-family: Calibri;">Type:
                <span class="alert alert-info"><?php echo $row1['type']; ?></span>
        </p>
      </div>
      <div class="col-sm-4">
        <p class="font-weight-bold" style="font-family: Calibri;">Weight:
          <span class="alert alert-info"><?php echo $row1['weight_in_kg']; ?></span>
        </p>
      </div>
      <div class="col-sm-4">
        <p class="font-weight-bold" style="font-family: Calibri;">Height:
          <span class="alert alert-info"><?php echo $row1['height_in_m']; ?></span>
        </p>
      </div>
    </div>
    <div class="row py-2">
      <div class="col-sm-6">
        <p class="font-weight-bold text-center" style="font-family: Calibri;">Evolution Form:</p><br>
        <?php for($i=0;$i<sizeof($evo)) ?>

        <img  class="rounded" style="width:20%" src="<?php echo '../assets/img/'.$row1['image']; ?>" alt="<?php $row1['name'] ?>">
      </div>
      <div class="col-sm-6">
        <p class="font-weight-bold text-center" style="font-family: Calibri;">Pre-Evolution Form:</p>
      </div>
    </div>
    <div class="row py-2">
      <div class="col-sm-6">
        <p class="font-weight-bold" style="font-family: Calibri;">Moves:</p>
    </div>
  </div>
