<?php ob_start(); ?>
<?php session_start(); ?>
<?php
date_default_timezone_set('Asia/Kolkata');
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
    echo "<a href='buy.php?source=yantra&view_yantra_id=$row->yantra_id' class='btn btn-outline-success'>BUY NOW </a>";
    echo "<a href='view.php?source=yantra&view_yantra_id=$row->yantra_id' class='btn btn-outline-success'>VIEW </a>";
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
    echo "<a href='buy.php?source=astrology&product_id=$row->ast_id' class='btn btn-outline-success'>BOOK NOW </a>";
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
    echo "<a href='buy.php?source=buy&view_page=puja&view_yantra_id=$row->puja_id' class='btn btn-outline-success'>BOOK NOW </a>";
    echo "<a href='view.php?source=view&view_page=puja&view_yantra_id=$row->puja_id' class='btn btn-outline-success'>VIEW </a>";
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
    echo "<a href='buy.php?source=view&view_page=katha&view_yantra_id=$row->katha_id' class='btn btn-outline-success'>BOOK NOW </a>";
    echo "<a href='view.php?source=view&view_page=katha&view_yantra_id=$row->katha_id' class='btn btn-outline-success'>VIEW </a>";
    echo "</div>";
  }
}
function kundali_list(){
  global $pdo;
  $stmt = $pdo->query('SELECT * FROM tbl_kundali');
  while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo "<div class='col-md z-depth-2 mx-4 p-2'>";
    echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img1' >";
    echo "<h3>$row->kundali_name</h3>";
    echo "<p>" . substr($row->kundali_details, 0 , strpos($row->kundali_details, ' ', 50)) ."</p> <br>";
    echo "<strong> Rs. $row->kundali_price</strong><br>";
    echo "<a href='buy.php?source=view&view_page=kundali&view_yantra_id=$row->kundali_id' class='btn btn-outline-success'>BOOK NOW </a>";
    echo "<a href='view.php?source=view&view_page=kundali&view_yantra_id=$row->kundali_id' class='btn btn-outline-success'>VIEW </a>";
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
    echo "<a href='booking.php?product_type=astrology&product_id=$row->ast_id' class='btn btn-outline-success'>BOOK NOW </a>";
    if(!user_login_info())
    {
      echo "<a href='login.php'> Please Login To Buy </a>";
    }
    echo "</div></div></div>";
  }
  function kundali_view($id){
    global $pdo;
    $sql = "SELECT * FROM tbl_kundali WHERE kundali_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch();
      echo "<div class='row z-depth-2 mx-4 p-2'>";
      echo "<div class='col-md-6 '>";
      echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img1' >";
      echo "</div><div class='col-md'>";
      echo "<h3 class='h2'>$row->kundali_name</h3>";
      echo "<p>" . substr($row->kundali_details, 0 , strpos($row->kundali_details, ' ', 50)) ."</p> <br>";
      echo "<strong> Rs. $row->kundali_price</strong><br>";
      echo "<a href='booking.php?product_type=kundali&product_id=$row->kundali_id' class='btn btn-outline-success'>BOOK NOW </a>";
      if(!user_login_info())
      {
        echo "<a href='login.php'> Please Login To Buy </a>";
      }
      echo "</div></div></div>";
    }
  function user_login_info(){
    $user_id='';
    if (isset($_SESSION['user_id'])) {
          $user_id = $_SESSION['user_id'];
    }
    $user_login_true = FALSE;
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
  function yantra_view($id){
    global $pdo;
    $sql = "SELECT * FROM tbl_yantra WHERE yantra_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch();
      echo "<div class='row z-depth-2 mx-4 p-2'>";
      echo "<div class='col-md-6 '>";
      echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img1' >";
      echo "</div><div class='col-md'>";
      echo "<h3 class='h2'>$row->yantra_name</h3>";
      echo "<p> $row->yantra_text </p> <br>";
      echo "<strong> Rs. $row->yatra_price</strong><br>";
      echo "<a href='data.php?product_type=yantra&product_id=$row->yantra_id' class='btn btn-outline-success'>BUY NOW </a>";
      if(!user_login_info())
      {
        echo "<a href='login.php'> Please Login To Buy </a>";
      }
      echo "</div></div></div>";
    }
    function puja_view($id){
      global $pdo;
      $sql = "SELECT * FROM tbl_puja WHERE puja_id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$id]);
      $row = $stmt->fetch();
        echo "<div class='row z-depth-2 mx-4 p-2'>";
        echo "<div class='col-md-6 '>";
        echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img1' >";
        echo "</div><div class='col-md'>";
        echo "<h3 class='h2'>$row->puja_name</h3>";
        echo "<p> $row->puja_details </p> <br>";
        echo "<strong> Rs. $row->puja_price</strong><br>";
        echo "<a href='booking.php?product_type=puja&product_id=$row->puja_id' class='btn btn-outline-success'>BOOK NOW </a>";
        if(!user_login_info())
        {
          echo "<a href='login.php'> Please Login To Buy </a>";
        }
        echo "</div></div></div>";
      }
      function katha_view($id){
        global $pdo;
        $sql = "SELECT * FROM tbl_katha WHERE katha_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $row = $stmt->fetch();
          echo "<div class='row z-depth-2 mx-4 p-2'>";
          echo "<div class='col-md-6 '>";
          echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img1' >";
          echo "</div><div class='col-md'>";
          echo "<h3 class='h2'>$row->katha_name</h3>";
          echo "<p> $row->katha_details </p> <br>";
          echo "<strong> Rs. $row->katha_price</strong><br>";
          echo "<a href='booking.php?product_type=katha&product_id=$row->katha_id' class='btn btn-outline-success'>BOOK NOW </a>";
          if(!user_login_info())
          {
            echo "<a href='login.php'> Please Login To Buy </a>";
          }
          echo "</div></div></div>";
        }
    function yantra_view_data($id){
      global $pdo;
      $sql = "SELECT * FROM tbl_yantra WHERE yantra_id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$id]);
      $row = $stmt->fetch();
        echo "<div class='row z-depth-2 mx-4 p-2'>";
        echo "<div class='col-md-6 '>";
        echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img1' >";
        echo "</div><div class='col-md'>";
        echo "<h3 class='h2'>$row->yantra_name</h3>";
        echo "<strong> Rs. $row->yatra_price</strong><br>";
        echo "</div></div></div>";
      }
    function login_user_details($id){
      global $pdo;
      $sql = "SELECT * FROM tbl_user_register WHERE user_email = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$id]);
      $row = $stmt->fetch();
      echo "<div class='col-md-12'><p>User Name : $row->user_fullname</p></div>";
      echo "<div class='col-md-12'><p>User Phone : $row->user_phone</p></div>";
      echo "<div class='col-md-12'><p>User Email : $row->user_email</p></div>";
    }
    function buyer_with_product($email, $father_name, $caste_name, $kuldevta_name, $address, $address_proof, $product_type, $product_id){
      global $pdo;
      $data_entred = FALSE;
      $yantra = $product_type.$product_id;
      $sql = "SELECT * FROM tbl_user_register WHERE user_email = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$email]);
      $row = $stmt->fetch();
      try {
        $sql = 'INSERT INTO tbl_buyer_with_product(buyer_name, buyer_father_name, buyer_caste, buyer_kuldevta_name, buyer_yantra_name, product_id, product_name, buyer_address, buyer_proof, buyer_phone_no) VALUES  (:name, :father_name, :caste, :kuldevta, :yantra, :product_id, :product_name, :address,:proof, :phone_no)';
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute(['name'=>$row->user_fullname, 'father_name'=>$father_name, 'caste'=>$caste_name, 'kuldevta'=>$kuldevta_name, 'yantra'=>$yantra, 'product_id'=>$product_id, 'product_name'=>$product_type, 'address'=>$address, 'proof'=>$address_proof, 'phone_no'=>$row->user_phone])) {
          $data_entred = TRUE;
        }
      } catch (PDOException $e) {
        echo "Database Error : The user could not be added .<br>".$e.getMessage();
      } catch (Exception $e){
        echo " General Error : The user could not be added .<br>".$e.getMessage();
      }
      tracker_function($pdo->lastInsertId(), 'buy');
      return $data_entred;
    }
    function tracker_function($buyer_with_product, $type){
      global $pdo;
      $tacker_on = FALSE;
      $product_delivery_status = 'READY TO DISPATCH';
      $product_payment_status = 'PENDING';
      $product_dispatchdate = date('d-m-Y H:i:s');
      try {
        $sql = 'INSERT INTO tbl_tracker(buyer_with_product_id, product_delivery_status, product_payment_status, product_dispatchdate, type) VALUES (:id, :del_status, :pay_status, :dis_date, :type)';
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute(['id'=>$buyer_with_product, 'del_status'=>$product_delivery_status, 'pay_status'=>$product_payment_status, 'dis_date'=>$product_dispatchdate, 'type'=>$type])) {
          header('Location: tracking.php?tracking_id='.$pdo->lastInsertId());
        }else {
          echo "Some error".$product_delivery_status ." " .$product_payment_status." ".$product_dispatchdate." ".$buyer_with_product;
        }
      } catch (PDOException $e) {
        echo "Database Error : The user could not be added .<br>".$e.getMessage();
      }catch( Exception $e ){
        echo " General Error : The Data can't be added ".$e.getMessage();
      }
    }
    function tracking_details($id){
      global $pdo;
      $sql = 'SELECT * FROM tbl_tracker WHERE tracker_id = :id';
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$id]);
      $row = $stmt->fetch();

      echo "<div class='row'>";
      echo "<div class='col-md-12'> <p>Delivery status :   $row->product_delivery_status </p> </div>";
      echo "<div class='col-md-12'> <p>Payment Satus :  $row->product_payment_status </p> </div>";
      echo "<div class='col-md-12'> <p>Product Dispatch Date :  $row->product_dispatchdate </p> </div>";
      echo "</div>";
      if ($row->type == 'buy') {
          product_details($row->buyer_with_product_id);
      }else {
        booking_details($row->buyer_with_product_id);
      }

    }
    function booking_details($id){
      global $pdo;
      $sql = 'SELECT * FROM tbl_booking WHERE booking_id = :id';
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$id]);
      $row = $stmt->fetch();
      echo "<div class='bg-success'>";
      echo "<div class='col-md'><p>Customer Name :   $row->client_name </p></div>";
      echo "<div class='col-md'><p>Booking Time :  $row->client_booking_date $row->client_booking_time </p></div>";
      echo "<div class='col-md'><p>Booking Price :  $row->booking_price </p></div>";
      echo "<div class='col-md'><p>Booked Item :  $row->product_category </p></div>";
      echo "<div class='col-md'><p>Product Id :  $row->product_id </p></div>";
      echo "<div class='col-md'><p>Address :  $row->client_address</p> </div>";
      echo "<div class='col-md'><p>Phone No. : $row->client_number </p></div>";
      echo "</div>";
    }
    function product_details($id){
      global $pdo;
      $sql = 'SELECT * FROM tbl_buyer_with_product WHERE buyer_product_id = :id';
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$id]);
      $row = $stmt->fetch();
      echo "<div class='bg-success'>";
      echo "<div class='col-md'><p>Customer Name :   $row->buyer_name </p></div>";
      echo "<div class='col-md'><p>Father Name :  $row->buyer_father_name </p></div>";
      echo "<div class='col-md'><p>Customer Caste :  $row->buyer_caste</p> </div>";
      echo "<div class='col-md'><p>customer Kuldevta :  $row->buyer_kuldevta_name </p></div>";
      echo "<div class='col-md'><p>Product Name :  $row->product_name </p></div>";
      echo "<div class='col-md'><p>Product Id :  $row->product_id </p></div>";
      echo "<div class='col-md'><p>Address :  $row->buyer_address</p> </div>";
      echo "<div class='col-md'><p>Phone No. : $row->buyer_phone_no </p></div>";
      echo "</div>";
    }
    function astology_view_data($id){
      global $pdo;
      $sql = "SELECT * FROM tbl_astro_service WHERE ast_id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$id]);
      $row = $stmt->fetch();
        echo "<div class='row'>";
        echo "<div class='col-md-6'>";
        echo "<img src='img/hanuman.jpg' alt='hindu god hanuman' class='img-fluid' >";
        echo "</div><div class='col-md'>";
        echo "<h3 class='h2'>$row->ast_name</h3>";
        echo "<strong> Rs. $row->ast_price</strong><br>";
        echo "</div></div>";
      }
      function booking_with_product($email, $samagri_id, $booking_date, $booking_time, $address, $address_proof, $img_proof ,$product_type, $product_id){
        global $pdo;
        $data_entred = FALSE;
        $yantra = $product_type.$product_id;
        $sql = "SELECT * FROM tbl_user_register WHERE user_email = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id'=>$email]);
        $row = $stmt->fetch();
        try {
          $sql = 'INSERT INTO tbl_booking( client_name, client_number, client_email, client_address, client_booking_date, client_booking_time, booking_price, samagri_added, samagri_id, product_id, product_category) VALUES  ( :cname, :cnumber, :cemail, :caddress, :cdate, :ctime, :cprice,:samagri_added, :samagri_id, :product_id, :product_type)';
          $stmt = $pdo->prepare($sql);
          if ($stmt->execute(['cname'=>$row->user_fullname, 'cnumber'=>$row->user_phone, 'cemail'=>$row->user_email, 'caddress'=>$address, 'cdate'=>$booking_date, 'ctime'=>$booking_time, 'cprice'=>500, 'samagri_added'=>$samagri_id, 'samagri_id'=>$samagri_id, 'product_id'=>$product_id, 'product_type'=>$product_type])) {
            $data_entred = TRUE;
          }
        } catch (PDOException $e) {
          echo "Database Error : The user could not be added .<br>".$e.getMessage();
        } catch (Exception $e){
          echo " General Error : The user could not be added .<br>".$e.getMessage();
        }
        tracker_function($pdo->lastInsertId(), 'booking');
        return $data_entred;
      }
      function booking_p_detail(){

      }


 ?>
