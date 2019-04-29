<div class="fixed-top">
<div class="bg-custom">
  <div class="container">
    <div class="row pt-2 text-white text-center">
        <div class="col-md-3">
            <a class="navbar-brand" href="index.php"> <img src="img/logo.png" alt="" height="50px"><span class="text-white ml-2"> Third Eyes Astro </span></a>
        </div>
      <div class="col-md-3">
        <p>
        <img src="img/call.png" alt="" height="45px">  <strong>Ask To Astrologer :- +91 - 8510849225</strong>
        </p>
      </div>
      <div class="col-md-3">
        <p>
        <img src="img/mail.png" alt="" height="45px">  <strong>mail us  : - info@thirdeyesastro.com</strong>
        </p>
      </div>
      <div class="col-md-3 m-auto p-auto">
        <span><i class="far fa-user fa-2x "></i>
          <?php
          if(!user_login_info())
          {
            echo "<a href='login.php'> Login Here</a>";
          }else {
            echo "<a href='logout.php'> Logout </a>";
          }
          ?>
        </span>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark special-color-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
<div class="container-fluid">
  <div class="row m-auto p-auto">
    <div class="col-md-12 ">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="yantra.php">YANTRA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="astrology_service.php">ASTROLOGY SERVICE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="puja.php">PUJA AND ANUSHTHAN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="katha.php">KATHA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kundali.php">KUNDALI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">CONTACT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">BLOG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gemstone.php">GEMSTONES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="horoscope.php"> FREE HOROSCOPE</a>
        </li>
      </ul>
    </div>
  </div>
</div>
  </div>
</nav>

</div>
