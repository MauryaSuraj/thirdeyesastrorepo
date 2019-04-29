<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Puja yantra tantra matra avialable</title>
  <?php include 'include/style_link.php'; ?>
  <title>Puja yantra tantra matra avialable</title>
  <meta name="Title" content=""/>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
<!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136820932-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-136820932-1');
  </script>
</head>
<body>
  <header>
    <?php include 'include/navigation.php'; ?>
  </header>
<main>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="h1 my-2"> Purchase Details </h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md p-1">
            <div class="row">
              <div class="col-md m-2">
                <div class="row p-1">
                  <?php
                  if (isset($_SESSION['user_id'])) {
                    login_user_details($_SESSION['user_id']);
                  }else {
                    header('Location: login.php');
                  }
                  ?>
                </div>
              </div>
              <div class="col-md text-dark">
                <div class="row p-1">
                  <?php
                  $message ='';
                      if (isset($_SESSION['user_id'])) {
                        $email = $_SESSION['user_id'];
                      }
                  if (isset($_GET['product_type'])) {
                    $product_type = $_GET['product_type'];
                  }
                  if ($product_type == 'yantra' && isset($_GET['product_id'])) {
                    yantra_view_data($_GET['product_id']);
                  }elseif ($product_type == 'astrology' && isset($_GET['product_id'])) {
                      astology_view_data($_GET['product_id']);
                  }

                  if (isset($_POST['complete_purchase'])) {
                    $upload_2 = $_FILES['address_proof']['name'];
                    $upload_temp_2 = $_FILES['address_proof']['tmp_name'];
                    move_uploaded_file($upload_temp_2, "img/$upload_2");
                    if (buyer_with_product($email, $_POST['father_name'], $_POST['caste_name'], $_POST['kuldevta_name'], $_POST['address'], $upload_2, $_GET['product_type'], $_GET['product_id'])) {
                          $message = "<div class='alert alert-success'> You have entered Details </div>";
                    }else {
                          $message = "<div class='alert alert-warning'> Data Not Entered </div>";
                    }
                  }
                    ?>
                </div>
              </div>
            </div>
      </div>
      <div class="col-md">
        <div class="row">
          <div class="col-md-8 m-auto p-auto">
            <?php echo $message;  ?>
            <form class="z-depth-3 p-2 mt-2 border border-success border-rounded" method="post" enctype="multipart/form-data">
              <fieldset class="form-group">
                <label for="exampleInputEmail1"> <strong>Enter Father Name</strong> </label>
                <input type="text" class="form-control" name="father_name" placeholder="Enter Father Name">
              </fieldset>
              <fieldset class="form-group">
                <label for="exampleInputPassword1"> <strong>Caste Name </strong> </label>
                <input type="text" class="form-control" name="caste_name" placeholder="Enter Caste Name">
              </fieldset>
              <fieldset class="form-group">
                <label for="exampleInputPassword1"> <strong>Kuldevta Name</strong> </label>
                <input type="text" class="form-control" name="kuldevta_name" placeholder="Enter Kuldevta ">
              </fieldset>
              <fieldset class="form-group">
                <label for="exampleTextarea"> <strong>Address</strong> </label>
                <textarea class="form-control" id="exampleTextarea" name="address" rows="3"></textarea>
              </fieldset>
              <fieldset class="form-group">
                <label for="exampleTextarea"> <strong>Address Proof</strong> </label>
                <input type="file"  class="form-control" name="address_proof">
              </fieldset>
              <button type="submit" class="btn btn-primary" name="complete_purchase"> Complete Purchase </button>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</main>
<?php include 'include/footer.php'; ?>
