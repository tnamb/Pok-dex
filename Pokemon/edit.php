

<div class="container w-100 py-3">
  <h4 class="font-weight-bold">Edit Form:</h4>
  <form class="" action="PokeDetailPage.php" method="post">
    <input type="hidden" name="poke_id" value="<?php echo $_POST['id'] ?>">
    <div class="form-group">
      <label for="field">Choose field:</label>
      <select class="form-control" name="field">
        <option value="-1">Select..</option>
        <option value="name">Name</option>
        <option value="type">Type</option>
        <option value="weight_in_kg">Weight</option>
        <option value="height_in_m">Height</option>
      </select>
    </div>
    <div class="form-group">
      <label for="desc">Edit:</label>
      <textarea class="form-control" name="desc" id="desc" rows="2" required  autofocus></textarea>
    </div>
    <input type="submit" class="btn btn-success" name="button" value="Submit request">
  </form>
</div>
