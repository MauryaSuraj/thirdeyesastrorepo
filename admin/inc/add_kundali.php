<h2 class="title1"> ADD KUNDALI </h2>
<div class="blank-page widget-shadow scroll" id="style-2 div1">
  <?php
  $message='';
  if (isset($_POST['add_asrto'])) {
    if (add_kundali($_POST['yantra_name'], $_POST['yantra_details'], $_POST['yantra_price'], $_POST['yantra_meta_keywords'], $_POST['yantra_meta_description'], $_POST['yantra_img_1'], $_POST['yantra_img_2'], $_POST['yantra_img_3'])) {
      $message = "<div class='alert alert-success'>  KUNDALI " .$_POST['yantra_name'] . "  added </div>";
    }else {
      $message = "<div class='alert alert-danger'>  KUNDALI Is Not Added </div>";
    }
  }
   ?>
  <form method="post" action="" enctype="application/x-www-form-urlencoded">
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <fieldset class="form-group">
        <label for="">Kundali Name</label>
        <input type="text" class="form-control" id="" placeholder="Enter Kundali Name" name="yantra_name">
      </fieldset>
      <fieldset class="form-group">
        <label for="exampleTextarea"> Kundali Details</label>
        <textarea class="form-control" id="yantadetail" rows="3" placeholder="Enter Kundali Details" name="yantra_details"></textarea>
      </fieldset>
      <fieldset class="form-group">
        <label for="">Kundali Price</label>
        <input type="text" class="form-control" id="yantraprice" placeholder="Enter Kundali Here" name="yantra_price">
      </fieldset>
      <fieldset class="form-group">
        <label for="yantra">Kundali Meta Keyword</label>
        <input type="text" class="form-control" id="yantraley" placeholder=" Kundali  Keywords" name="yantra_meta_keywords">
      </fieldset>
      <fieldset class="form-group">
        <label for="exampleTextarea"> Kundali Meta Description</label>
        <textarea class="form-control" id="metades" rows="2" placeholder="Kundali Meta Description" name="yantra_meta_description"></textarea>
      </fieldset>
      <fieldset class="form-group">
        <label for="exampleInputFile">Upload Image 1</label>
        <input type="file" class="form-control-file" id="img1" name="yantra_img_1">
      </fieldset>
      <fieldset class="form-group">
        <label for="exampleInputFile">Upload Image 2</label>
        <input type="file" class="form-control-file" id="img2" name="yantra_img_2">
      </fieldset>
      <fieldset class="form-group">
        <label for="exampleInputFile">Upload Image 3</label>
        <input type="file" class="form-control-file" id="img3" name="yantra_img_3">
      </fieldset>
      <button type="submit" class="btn btn-primary" name="add_asrto">Add Kundali </button>
      <?php echo $message; ?>
    </div>
  </div>
</div>
  </form>
</div>
