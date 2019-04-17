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
  <div class="contact-us ">
    <div class="container-fluid m-0">
      <div class="row">
        <div class="col-md-6 pl-0">
          <img src="img/logo.png" alt="" class="img-fluid">
        </div>
        <div class="col-md-6">
          <form class="my-5">
              <fieldset class="form-group">
              <label for="fullname">Full Name</label>
              <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name">
            </fieldset>
            <fieldset class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email">
            </fieldset>
             <fieldset class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" id="subject" placeholder="Enter Subject">
            </fieldset>
            </fieldset>
            <fieldset class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="3"></textarea>
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <p>
              <address><strong>Address:
                  283, third floor  <br>Satya Niketan Delhi 110021
            <br>eyeasthird@gmail.com </address> </strong>

          </p>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include 'include/footer.php'; ?>
