<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>astrology</title>
  <?php include 'include/style_link.php'; ?>
</head>
<body>
  <header>
    <?php include 'include/navigation.php'; ?>
  </header>

<main>
<div class="container">
  <div class="row">

    <div class="col-md-12">
    <section class="my-3">
      <?php
      if (isset($_GET['blog_id'])) {
        blog_view($_GET['blog_id']);
      }
       ?>
    </section>
    </div>
  </div>
</div>
</main>
<?php include 'include/footer.php'; ?>
