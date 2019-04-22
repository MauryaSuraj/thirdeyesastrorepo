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
        <h1 class="h1 my-2"> Tracking Details </h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <div class=" text-center my-3">
            <?php  if (isset($_GET['tracking_id'])) {
              $id = $_GET['tracking_id'];
            }  ?>

        </div>
      </div>
      <div class="col-md-6">
        <h3> Product Details  </h3>
        <?php tracking_details($id); ?>
      </div>
      <div class="col-md-6">
        <h3> Tracking Details  </h3>
      </div>
    </div>
  </div>
</main>
<?php include 'include/footer.php'; ?>
