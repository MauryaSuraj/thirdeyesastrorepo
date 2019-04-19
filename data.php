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
        <h1 class="h1 my-2"> DEMO </h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md  text-white p-2">
            <div class="row">
              <div class="col-md bg-primary m-2">
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
              <div class="col-md text-dark m-2">
                <div class="row p-1">
                  <?php
                  if (isset($_GET['product_type'])) {
                    echo $_GET['product_type'];
                  }
                  if (isset($_GET['product_id'])) {
                    yantra_view_data($_GET['product_id']);
                  }
                    ?>
                </div>
              </div>
            </div>
      </div>
      <div class="col-md">
        <div class="row">
          <div class="col-md-8 m-auto p-auto">
            <form class="z-depth-3 p-2 mt-2 border border-success border-rounded">
              <fieldset class="form-group">
                <label for="exampleInputEmail1"> <strong>Enter Some details</strong> </label>
                <input type="text" class="form-control" id="" placeholder="Enter Details here">
              </fieldset>
              <fieldset class="form-group">
                <label for="exampleInputPassword1"> <strong>Enter Details here</strong> </label>
                <input type="text" class="form-control" id="" placeholder="Enter Some details here">
              </fieldset>
              <fieldset class="form-group">
                <label for="exampleTextarea"> <strong>Address</strong> </label>
                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
              </fieldset>
              <fieldset class="form-group">
                <label for="exampleTextarea"> <strong>Address Proof</strong> </label>
                <input type="file" name="" value="" class="form-control">
              </fieldset>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Are You agree With terms and conditions
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Cash On Delivery
                </label>
              </div>
              <button type="submit" class="btn btn-primary"> Complete Purchase </button>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</main>
<?php include 'include/footer.php'; ?>
