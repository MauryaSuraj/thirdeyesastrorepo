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
  <?php
  if (isset($_GET['source'])) {
    $pnam =  $_GET['source'];
  }
  if (isset($_GET['view_page'])) {
    $view_page = $_GET['view_page'];
  }
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="h1 my-2"> <?php echo ucfirst($view_page); ?> </h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <div class=" text-center my-3">
            <?php
            if (isset($_GET['product_id'])) {
              astrology_view($_GET['product_id']);
            }
            elseif ($view_page == 'yantra' && isset($_GET['view_yantra_id'])) {
              yantra_view($_GET['view_yantra_id']);
            }
            elseif ($view_page == 'puja' && isset($_GET['view_yantra_id'])) {
              puja_view($_GET['view_yantra_id']);
            }
            elseif ($view_page == 'katha' && isset($_GET['view_yantra_id'])) {
              katha_view($_GET['view_yantra_id']);
            }
            elseif ($view_page == 'kundali' && isset($_GET['view_yantra_id'])) {
              kundali_view($_GET['view_yantra_id']);
            }

              ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include 'include/footer.php'; ?>
