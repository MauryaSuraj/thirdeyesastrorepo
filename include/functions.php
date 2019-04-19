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
// page view function
function yantra_list(){
  global $pdo;
  $stmt = $pdo->query('SELECT * FROM tbl_yantra');
  while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo "<div class='col-md z-depth-2 mx-4 p-2'>";
    echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img1' >";
    echo "<h3>$row->yantra_name</h3>";
    echo "<p>" . substr($row->yantra_text, 0 , strpos($row->yantra_text, ' ', 50)) ."</p> <br>";
    echo "<strong> Rs. $row->yatra_price</strong><br>";
    echo "<a href='index.php?source=view&view_page=yantra&view_yantra_id=$row->yantra_id' class='btn btn-outline-success'>BUY NOW </a>";
    echo "<a href='index.php?source=view&view_page=yantra&view_yantra_id=$row->yantra_id' class='btn btn-outline-success'>VIEW </a>";
    echo "</div>";
  }
}
function category_name($id){
  global $pdo;
  $sql = "SELECT * FROM blog_category WHERE blog_category_id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $category = $stmt->fetch();
  return $category->blog_category_name;
}
function tag_name($id){
  global $pdo;
  $sql = "SELECT * FROM blog_tags WHERE blog_tag_id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $tag = $stmt->fetch();
  return $tag->blog_tag_name;
}
function blog_list(){
  global $pdo;
  $stmt = $pdo->query('SELECT * FROM tbl_blog');
  while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    $category_name = category_name($row->blog_category);
    $tag_name = tag_name($row->blog_tag);
    echo "<hr class='my-5'>";
    echo "<div class='row'>";
    echo "<div class='col-lg-5'>";
    echo "<div class='view overlay rounded z-depth-2 mb-lg-0 mb-4'>";
    echo "<img class='img-fluid' src='https://mdbootstrap.com/img/Photos/Others/img%20(27).jpg' alt='Sample image'>";
    echo "<a><div class='mask rgba-white-slight'></div></a></div></div>";
    echo "<div class='col-lg-7'>";
    echo "<a href='#!' class='green-text'>";
    echo "<h6 class='font-weight-bold mb-3'><i class='fab fa-pagelines pr-2'></i>$tag_name</h6>";
    echo "</a>";
    echo "<h3 class='font-weight-bold mb-3'><strong>$row->blog_title</strong></h3>";
    echo "<p>$row->blog_meta_desc</p>";
    echo "<p>Category Name : <a><strong>  $category_name </strong></a>, Created at : $row->created_at</p>";
    echo "<a class='btn btn-success btn-md' href='viewblog.php?blog_id=$row->blog_id'>Read more</a>";
    echo "</div>  </div>";
  }
}
function blog_view($id){
  global $pdo;
  $sql = "SELECT * FROM tbl_blog WHERE blog_id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $row = $stmt->fetch();
    $category_name = category_name($row->blog_category);
    $tag_name = tag_name($row->blog_tag);
    echo "<div class='row'>";
    echo "<div class='col-lg-12'>";
    echo "<div class='view overlay rounded z-depth-2 mb-lg-0 mb-4'>";
    echo "<img class='img-fluid' src='https://mdbootstrap.com/img/Photos/Others/img%20(27).jpg' alt='Sample image'>";
    echo "<a><div class='mask rgba-white-slight'></div></a></div></div>";
    echo "<div class='col-lg-12 mt-5'>";
    echo "<a href='#!' class='green-text'>";
    echo "<h6 class='font-weight-bold mb-3'><i class='fab fa-pagelines pr-2'></i>$tag_name</h6>";
    echo "</a>";
    echo "<h3 class='font-weight-bold mb-3'><strong>$row->blog_title</strong></h3>";
    echo "<p>$row->blog_meta_desc</p>";
    echo "<p>Category Name : <a><strong>  $category_name </strong></a>, Created at : $row->created_at</p>";
    echo "</div>  </div>";
}
function astrology_list(){
  global $pdo;
  $stmt = $pdo->query('SELECT * FROM tbl_astro_service');
  while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo "<div class='col-md z-depth-2 mx-4 p-2'>";
    echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img1' >";
    echo "<h3>$row->ast_name</h3>";
    echo "<p>" . substr($row->ast_text, 0 , strpos($row->ast_text, ' ', 50)) ."</p> <br>";
    echo "<strong> Rs. $row->ast_price</strong><br>";
    echo "<a href='buy.php?source=astrology&product_id=$row->ast_id' class='btn btn-outline-success'>BUY NOW </a>";
    echo "<a href='view.php?source=view&view_page=yantra&view_yantra_id=$row->ast_id' class='btn btn-outline-success'>VIEW </a>";
    echo "</div>";
  }
}
function puja_list(){
  global $pdo;
  $stmt = $pdo->query('SELECT * FROM tbl_puja');
  while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo "<div class='col-md z-depth-2 mx-4 p-2'>";
    echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img1' >";
    echo "<h3>$row->puja_name</h3>";
    echo "<p>" . substr($row->puja_details, 0 , strpos($row->puja_details, ' ', 50)) ."</p> <br>";
    echo "<strong> Rs. $row->puja_price</strong><br>";
    echo "<a href='buy.php?source=view&view_page=yantra&view_yantra_id=$row->puja_id' class='btn btn-outline-success'>BUY NOW </a>";
    echo "<a href='view.php?source=view&view_page=yantra&view_yantra_id=$row->puja_id' class='btn btn-outline-success'>VIEW </a>";
    echo "</div>";
  }
}
function katha_list(){
  global $pdo;
  $stmt = $pdo->query('SELECT * FROM tbl_katha');
  while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo "<div class='col-md z-depth-2 mx-4 p-2'>";
    echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img1' >";
    echo "<h3>$row->katha_name</h3>";
    echo "<p>" . substr($row->katha_details, 0 , strpos($row->katha_details, ' ', 50)) ."</p> <br>";
    echo "<strong> Rs. $row->katha_price</strong><br>";
    echo "<a href='buy.php?source=view&view_page=yantra&view_yantra_id=$row->katha_id' class='btn btn-outline-success'>BUY NOW </a>";
    echo "<a href='view.php?source=view&view_page=yantra&view_yantra_id=$row->katha_id' class='btn btn-outline-success'>VIEW </a>";
    echo "</div>";
  }
}
function astrology_view($id){
  global $pdo;
  $sql = "SELECT * FROM tbl_astro_service WHERE ast_id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $row = $stmt->fetch();
    echo "<div class='row z-depth-2 mx-4 p-2'>";
    echo "<div class='col-md-6 '>";
    echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img1' >";
    echo "</div><div class='col-md'>";
    echo "<h3 class='h2'>$row->ast_name</h3>";
    echo "<p>" . substr($row->ast_text, 0 , strpos($row->ast_text, ' ', 50)) ."</p> <br>";
    echo "<strong> Rs. $row->ast_price</strong><br>";
    echo "<a href='buy.php?source=astrology&product_id=$row->ast_id' class='btn btn-outline-success'>BUY NOW </a>";
    echo "</div></div></div>";
  }
  function user_login_info(){
    $user_id='';
    $user_login_true = FALSE;
    $user_id = $_SESSION['user_id'];
    global $pdo;
    if (!$user_id) {
    }else {
      echo $user_id;
      $user_login_true = TRUE;
      //Check user type here
    }
    return $user_login_true;
  }
  function check_user_type($user_mail){
    $buyer = FALSE;
    global $pdo;
    $sql = "SELECT * FROM tbl_user_register WHERE user_email = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$user_mail]);
    $row = $stmt->fetch();
    if ($row->user_type) {
      if ($row->user_type == 'buyer') {
        $buyer = TRUE;
      }
    }
    return $buyer;
  }


 ?>
