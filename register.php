<?php include 'include/functions.php';  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>astrology</title>
<?php include 'include/style_link.php'; ?>
  <style media="screen">
    header{
      margin-bottom: 8rem;
    }
  </style>
</head>
<body>
  <header><?php include 'include/navigation.php'; ?></header>
  <?php
  $message="";
  if (isset($_POST['Register'])) {
  $fullname = $_POST['fullname'];
  $email =  $_POST['email'];
  $phonenumber =  $_POST['phonenumber'];
  $password =  $_POST['password'];
  $userexist = register_user($fullname, $email, $phonenumber, $password);
  if (!$userexist) {
   $message = "<div class='alert alert-success' role='alert'> User $fullname Registered. </div>";
}else {
  if ($userexist>0) {
    $message = "<div class='alert alert-danger' role='alert'> User $fullname Already Registered Please Login. </div>";
  }
}
  }
   ?>
<main>
  <div class="container">
    <div class="row">
      <div class="col-md-6 m-auto p-auto z-depth-2">
        <div class="p-5 ">
          <form method="post" action="" enctype="multipart/form-data">
            <fieldset class="form-group">
              <label for="fullname">Full Name</label>
              <input type="text" class="form-control" id="username" name="fullname" placeholder="Enter Full Name">
            </fieldset>
            <fieldset class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter email">
            </fieldset>
            <fieldset class="form-group">
              <label for="fullname">Phone Number</label>
              <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter Phone Number">
            </fieldset>
            <fieldset class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="userpassword" placeholder="Password" name="password">
            </fieldset>
            <button type="submit" class="btn btn-primary" name="Register">Register</button>
            <?php echo $message;  ?>
          </form>
          <a href="login.php"><strong>Login Here, If you are already Registered!</strong></a>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include 'include/footer.php'; ?>
