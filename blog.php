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
          <section class="my-1">
          <h2 class="h1-responsive font-weight-bold text-center my-1">Recent posts</h2>
          <p class="text-center w-responsive mx-auto mb-5">Duis aute irure dolor in reprehenderit in voluptate velit
            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
            qui officia deserunt mollit anim id est laborum.</p>

      <?php blog_list(); ?>
    </section>
    </div>
  </div>
</div>
</main>
<?php include 'include/footer.php'; ?>
