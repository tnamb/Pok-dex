<?php
include 'connection.php';

$query = "select $_POST['field'] from pokemons where poke_id='$_POST['poke_id']'";
$result=mysqli_query($dbc,$query) or die("ERROR in 1".mysqli_error($dbc));
$row=mysqli_fetch_array($result);
$pre_edit=$row[0];

$query1="insert into edit(edit_type,edit,pre_edit) values('$_POST['field']','$_POST['desc']','$pre_edit')";
$result1=mysqli_query($dbc,$query1) or die("ERROR in 2".mysqli_error($dbc));


 ?>

<div class="container w-100">
  <form class="" action="edit.php" method="post">
    <div class="form-group">
      <label for="field">Choose field:</label>
      <select class="form-control" name="field">
        <option value="-1">Select..</option>
        <option value="name">Name</option>
        <option value="type">Type</option>
        <option value="weight_in_kg">Weight</option>
        <option value="weight_in_m">Height</option>
      </select>
    </div>
    <div class="form-group">
      <label for="desc">Edit:</label>
      <textarea class="form-control" name="desc" id="desc" rows="2"></textarea>
    </div>
    <input type="hidden" name="poke_id" value="<?php echo $row['poke_id']; ?>">
  </form>
</div>
