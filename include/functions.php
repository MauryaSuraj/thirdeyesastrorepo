<?php ob_start(); ?>
<?php session_start(); ?>
<?php
include('db.php');

function is_mail_id_registered($email){
  $userexist = FALSE;
  global $pdo;
  $sql = "SELECT * FROM tbl_user_register WHERE user_email = :useremail";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['useremail'=>$email]);
  // $useremailid = $stmt->fetch();
  $usercount = $stmt->rowCount();
  if ($usercount>0) {
    $userexist = TRUE;
  }
  return $userexist;
}

function register_user($fullname, $email, $phonenumber, $password){
  $userexist = TRUE;
  global $pdo;
if (!is_mail_id_registered($email)) {
  try {
    $sql = 'INSERT INTO tbl_user_register (user_fullname, user_email, user_phone, user_password) VALUES (:fullname, :email, :phonenumber, :password) ';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
      [':fullname'=>$fullname,
      ':email' => $email,
      ':phonenumber'=>$phonenumber,
      ':password'=>$password]
    );
  } catch (PDOException $e) {
    echo "Database Error : The user could not be added.<br>".$e.getMessage();
  }catch (Exception $e) {
    echo " General Error : The user could not be added. <br>".$e->getMesssage();
  }
  $userexist = FALSE;
}
return $userexist;
}

function user_login($usermail, $userpassword){
  global $pdo;
  $userexist = FALSE;
  if (!(is_mail_id_registered($usermail)>0)) {
    $userexist = FALSE;
  }else {
    // Login Query here
      $sql = "SELECT * FROM tbl_user_register WHERE user_email = :user_mail && user_password = :user_password";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['user_mail'=>$usermail, 'user_password'=>$userpassword]);
      $usercount = $stmt->rowCount();
          if ($usercount>0) {
                $userexist = TRUE;
                  $_SESSION['user_id'] = $usermail;
          }
  }
  return $userexist;
}

 ?>
