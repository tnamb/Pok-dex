<?php
session_start();
  include 'connection.php';
  $id=$_POST['id'];
  $query1="select * from pokemons where poke_id=$id";
  $result1= mysqli_query($dbc,$query1) or die("Error querying<br>".mysqli_error($dbc));


  $row1=mysqli_fetch_array($result1);

  if($row1['type']=="fire")
  {
    $alert_type="alert alert-danger";
  }
  elseif ($row1['type']=="water") {
    $alert_type="alert alert-primary";
  }
  elseif ($row1['type']=="grass") {
    $alert_type="alert alert-success";
  }
  elseif ($row1['type']=="electric") {
    $alert_type="alert alert-warning";
  }
  elseif ($row1['type']=="rock" || $row1['type']=="ground") {
    $alert_type="alert alert-dark";
  }
  elseif ($row1['type']=="normal") {
    $alert_type="alert alert-secondary";
  }
  else{
    $alert_type="alert alert-info";
  }


  $evo= explode(",",trim($row1['evolution_form']));
  $pre_evo= explode(",",trim($row1['pre_evolution_form']));
  $moves=explode(",",trim($row1['moves']));
 ?>
  <div class="conatainer <?php echo $alert_type ?>" style="width:100%">
    <h3 class="font-weight-bold alert-link" style="font-family: Calibri;">More Information:  </h3>
    <hr>
    <div class="row py-2">

      <div class="col-sm-3">
        <p class="font-weight-bold alert-link" style="font-family: Calibri;">Poke-ID:
          <span class="<?php echo $alert_type ?>"><?php echo $row1['poke_id']; ?></span>
        </p>
      </div>

      <div class="col-sm-3">
        <p class="font-weight-bold alert-link" style="font-family: Calibri;">Type:
                <span class="<?php echo $alert_type?>"><?php echo ucfirst($row1['type']); ?></span>
        </p>
      </div>
      <div class="col-sm-3">
        <p class="font-weight-bold alert-link" style="font-family: Calibri;">Weight:
          <span class="<?php echo $alert_type ?>"><?php echo $row1['weight_in_kg']." Kgs"; ?></span>
        </p>
      </div>
      <div class="col-sm-3">
        <p class="font-weight-bold alert-link" style="font-family: Calibri;">Height:
          <span class="<?php echo $alert_type ?>"><?php echo $row1['height_in_m']." M"; ?></span>
        </p>
      </div>
    </div>

    <div class="row py-2">
      <div class="col-sm-6">
        <p class="font-weight-bold alert-link" style="font-family: Calibri;">Evolution Form:</p><br>

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
        <p class="font-weight-bold alert-link" style="font-family: Calibri;">Pre-Evolution Form:</p>
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
      <div class="col col-sm-2 text-center">
        <p class="font-weight-bold alert-link mt-5" style="font-family: Calibri;">Moves:</p>
    </div>
    <div class="col col-sm-6">
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

<?php
if($_SESSION['logged_in']==1)
{
?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <button type="button" class="btn btn-info w-100" title="Click me to edit"  name="button" onclick="editRequest(<?php echo $row1['poke_id']; ?>);"
          data-toggle="collapse" data-target="<?php echo '#edit'.$row1['poke_id']; ?>">
        Want to change something? Go ahead <i class="fa fa-edit"></i>
      </button>
    </div>
  </div>
</div>
<?php } ?>
