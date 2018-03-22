<?php
  include 'connection.php';
  $id=$_POST['id'];
  $query1="select * from pokemons where poke_id=$id";
  $result1= mysqli_query($dbc,$query1) or die("Error querying<br>".mysqli_error($dbc));


  $row1=mysqli_fetch_array($result1);

  $evo= explode(",",trim($row1['evolution_form']));
  $pre_evo= explode(",",trim($row1['pre_evolution_form']));
  $moves=explode(",",trim($row1['moves']));
 ?>
  <div class="conatainer" style="width:100%">
    <h3 class="font-weight-bold " style="font-family: Calibri;">More Information:</h3>
    <hr>
    <div class="row py-2">

      <div class="col-sm-3">
        <p class="font-weight-bold" style="font-family: Calibri;">Poke-ID:
          <span class="alert alert-info"><?php echo $row1['poke_id']; ?></span>
        </p>
      </div>

      <div class="col-sm-3">
        <p class="font-weight-bold" style="font-family: Calibri;">Type:
                <span class="alert alert-info"><?php echo $row1['type']; ?></span>
        </p>
      </div>
      <div class="col-sm-3">
        <p class="font-weight-bold" style="font-family: Calibri;">Weight:
          <span class="alert alert-info"><?php echo $row1['weight_in_kg']." Kgs"; ?></span>
        </p>
      </div>
      <div class="col-sm-3">
        <p class="font-weight-bold" style="font-family: Calibri;">Height:
          <span class="alert alert-info"><?php echo $row1['height_in_m']." M"; ?></span>
        </p>
      </div>
    </div>

    <div class="row py-2">
      <div class="col-sm-6">
        <p class="font-weight-bold" style="font-family: Calibri;">Evolution Form:</p><br>

        <?php
        if($evo[0]=='none'){
        ?>

          <img  class="ml-5 w-25 rounded "  src="../assets/img/none.png" alt="No evolution">
        <?php
        }else{
          for($i=0;$i<sizeof($evo);$i++){
            $evo_query = mysqli_query($dbc,"select image from pokemons where name='$evo[$i]'")
              or die("Couldnt fetch evolution<br>".mysqli_error($dbc));
            $evo_row=mysqli_fetch_array($evo_query);

        ?>
            <img  class="rounded w-25"  src="<?php echo '../assets/img/'.$evo_row['image']; ?>" alt="<?php $evo_row['name'] ?>">
            <?php if($i!=sizeof($evo)-1) { ?>
              <i class="fa fa-arrow-circle-right" style="font-size:3rem;color:red"></i>
              <?php }}} ?>
      </div>

      <div class="col-sm-6">
        <p class="font-weight-bold" style="font-family: Calibri;">Pre-Evolution Form:</p>
        <?php
        if($pre_evo[0]=='none'){
        ?>

          <img  class="ml-5 w-25 rounded "  src="../assets/img/none.png" alt="No evolution">
        <?php
        }else{
          for($i=0;$i<sizeof($pre_evo);$i++){
            $pre_evo_query = mysqli_query($dbc,"select image from pokemons where name='$pre_evo[$i]'")
              or die("Couldnt fetch evolution<br>".mysqli_error($dbc));
            $pre_evo_row=mysqli_fetch_array($pre_evo_query);

        ?>
            <img  class="rounded w-25"  src="<?php echo '../assets/img/'.$pre_evo_row['image']; ?>" alt="<?php $pre_evo_row['name'] ?>">
            <?php if($i!=sizeof($pre_evo)-1) { ?>
              <i class="fa fa-arrow-circle-right" style="font-size:3rem;color:red"></i>
              <?php }}} ?>
      </div>
    </div>

    <div class="row py-2">
      <div class="col-sm-6">
        <p class="font-weight-bold" style="font-family: Calibri;">Moves:</p>
        <ol class="list-group ml-5 text-center">
        <?php
          for($i=0;$i<sizeof($moves);$i++)
          {
        ?>
            <li class="list-group-item text-capitalize w-50 "><?php echo $moves[$i]; ?></li>
        <?php } ?>
      </ol>
    </div>
  </div>
</div>
<hr>
