<?php
  include_once '../include/db.php';

  function user_details($user_mail){
    global $pdo;
    $sql = "SELECT * FROM tbl_user_register WHERE user_email = :usermail";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['usermail'=> $user_mail]);
    $users = $stmt->fetch();
    echo $users->user_fullname;
  }
  function all_user_details(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM tbl_user_register');
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
      echo "<tr><th scope='row'> $row->user_id </th>";
        echo "<td>$row->user_fullname</td>";
        echo "<td>$row->user_phone</td>";
        echo "<td>$row->user_email</td>";
        echo "<td>$row->created_at</td>";
        echo "<td>$row->user_type</td>";
        echo "<td><a href='#' class='btn'>Change role</a></td></tr>";
    }
  }
  function add_yantra_dettails($name, $details, $price, $meta_keyword, $meta_des, $img1, $img2, $img3){
    global $pdo;
    $yantra_added = FALSE;
    try {
      $sql = 'INSERT INTO tbl_yantra(yantra_name, yantra_text, yantra_meta_keyword, yantra_meta_desc, yatra_price, yantra_img_1, yantra_img_2, yantra_img_3) VALUES  (:name, :details,  :meta_keyword, :meta_des, :price, :img1, :img2, :img3)';
      $stmt = $pdo->prepare($sql);
      if ($stmt->execute(['name'=>$name, 'details'=>$details, 'price'=>$price, 'meta_keyword'=>$meta_keyword, 'meta_des'=>$meta_des, 'img1'=>$img1, 'img2'=>$img2, 'img3'=>$img3])) {
        $yantra_added = TRUE;
      }
      $stmt->errorCode();
    } catch (PDOException $e) {
      echo "Database Error : The user could not be added .<br>".$e.getMessage();
    } catch(Exception $e){
      echo "General Error : The user could not br added . <br>".$e.getMessage();
    }
    return $yantra_added;
  }
  function yantra_list(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM tbl_yantra');
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "<tr><th scope='row'> $row->yantra_id </th>";
        echo "<td>$row->yantra_name</td>";
        echo "<td>". substr($row->yantra_text, 0 , strpos($row->yantra_text, ' ', 50)) ."</td>";
        echo "<td>$row->yantra_meta_keyword</td>";
        echo "<td>".substr($row->yantra_meta_desc, 0 , strpos($row->yantra_meta_desc, ' ', 10))."</td>";
        echo "<td> Rs. $row->yatra_price</td>";
        echo "<td>$row->yantra_img_1</td>";
        echo "<td>$row->yantra_img_2</td>";
        echo "<td>$row->yantra_img_3</td>";
        echo "<td><a href='index.php?source=view&view_page=yantra&view_yantra_id=$row->yantra_id' class='btn btn-primary'>View</td>";
        echo "</tr>";
    }
  }
  function yantra_view($id){
    global $pdo;
    $sql = "SELECT * FROM tbl_yantra WHERE yantra_id = :id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $yantras = $stmt->fetch();
    echo "<h1>".$yantras->yantra_name."</h1>";
    echo "<hr>";
    echo "<h2> Yantra Details </h2>";
    echo "<p class='text-justify'>".$yantras->yantra_text."</p>";
    echo "<h2> Yantra Meta Keyword </h2>";
    echo "<p>".$yantras->yantra_meta_keyword."</p>";
    echo "<h2> Yantra Meta Description </h2>";
    echo "<p>".$yantras->yantra_meta_desc."</p>";
    echo "<h2> Yantra Price  </h2>";
    echo "<p> Rs. <strong>".$yantras->yatra_price."</strong></p>";
    echo "<h2> Yantra Picture </h2>";
    echo "<p>".$yantras->yantra_img_1."</p>";
    echo "<p>".$yantras->yantra_img_2."</p>";
    echo "<p>".$yantras->yantra_img_3."</p>";
  }
  function add_asto_service($name, $details, $price, $meta_keyword, $meta_des, $img1, $img2, $img3){
    global $pdo;
    $yantra_added = FALSE;
    try {
      $sql = 'INSERT INTO tbl_astro_service(ast_name, ast_text, ast_meta_keyword, ast_meta_desc, ast_price, ast_img_1, ast_img_2, ast_img_3) VALUES  (:name, :details,  :meta_keyword, :meta_des, :price, :img1, :img2, :img3)';
      $stmt = $pdo->prepare($sql);
      if ($stmt->execute(['name'=>$name, 'details'=>$details, 'price'=>$price, 'meta_keyword'=>$meta_keyword, 'meta_des'=>$meta_des, 'img1'=>$img1, 'img2'=>$img2, 'img3'=>$img3])) {
        $yantra_added = TRUE;
      }
      $stmt->errorCode();
    } catch (PDOException $e) {
      echo "Database Error : The user could not be added .<br>".$e.getMessage();
    } catch(Exception $e){
      echo "General Error : The user could not br added . <br>".$e.getMessage();
    }
    return $yantra_added;
  }
  function ast_list(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM tbl_astro_service');
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "<tr><th scope='row'> $row->ast_id </th>";
        echo "<td>$row->ast_name</td>";
        echo "<td>". substr($row->ast_text, 0 , strpos($row->ast_text, ' ', 50)) ."</td>";
        echo "<td>$row->ast_meta_keyword</td>";
        echo "<td>".substr($row->ast_meta_desc, 0 , strpos($row->ast_meta_desc, ' ', 10))."</td>";
        echo "<td> Rs. $row->ast_price</td>";
        echo "<td>$row->ast_img_1</td>";
        echo "<td>$row->ast_img_2</td>";
        echo "<td>$row->ast_img_3</td>";
        echo "<td><a href='index.php?source=view&view_page=astro&view_yantra_id=$row->ast_id' class='btn btn-primary'>View</td>";
        echo "</tr>";
    }
  }
  function ast_view($id){
    global $pdo;
    $sql = "SELECT * FROM tbl_astro_service WHERE ast_id = :id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $yantras = $stmt->fetch();
    echo "<h1>".$yantras->ast_name."</h1>";
    echo "<hr>";
    echo "<h2> Astrology Service Details </h2>";
    echo "<p class='text-justify'>".$yantras->ast_text."</p>";
    echo "<h2> Service Meta Keyword </h2>";
    echo "<p>".$yantras->ast_meta_keyword."</p>";
    echo "<h2> Service Meta Description </h2>";
    echo "<p>".$yantras->ast_meta_desc."</p>";
    echo "<h2> Service Price  </h2>";
    echo "<p> Rs. <strong>".$yantras->ast_price."</strong></p>";
    echo "<h2> Service Picture </h2>";
    echo "<p>".$yantras->ast_img_1."</p>";
    echo "<p>".$yantras->ast_img_2."</p>";
    echo "<p>".$yantras->ast_img_3."</p>";
  }
  function add_puja($name, $details, $price, $meta_keyword, $meta_des, $img1, $img2, $img3){
    global $pdo;
    $yantra_added = FALSE;
    try {
      $sql = 'INSERT INTO tbl_puja(puja_name, puja_details, puja_price, puja_meta_keyword, puja_meta_des, puja_img_1, puja_img_2, puja_img_3) VALUES  (:name, :details, :price, :meta_keyword, :meta_des, :img1, :img2, :img3)';
      $stmt = $pdo->prepare($sql);
      if ($stmt->execute(['name'=>$name, 'details'=>$details, 'price'=>$price, 'meta_keyword'=>$meta_keyword, 'meta_des'=>$meta_des, 'img1'=>$img1, 'img2'=>$img2, 'img3'=>$img3])) {
        $yantra_added = TRUE;
      }
      $stmt->errorCode();
    } catch (PDOException $e) {
      echo "Database Error : The user could not be added .<br>".$e.getMessage();
    } catch(Exception $e){
      echo "General Error : The user could not br added . <br>".$e.getMessage();
    }
    return $yantra_added;
  }
  function puja_list(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM tbl_puja');
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "<tr><th scope='row'> $row->puja_id </th>";
        echo "<td>$row->puja_name</td>";
        echo "<td>". substr($row->puja_details, 0 , strpos($row->puja_details, ' ', 50)) ."</td>";
        echo "<td>$row->puja_meta_keyword</td>";
        echo "<td>".substr($row->puja_meta_des, 0 , strpos($row->puja_meta_des, ' ', 10))."</td>";
        echo "<td> Rs. $row->puja_price</td>";
        echo "<td>$row->puja_img_1</td>";
        echo "<td>$row->puja_img_2</td>";
        echo "<td>$row->puja_img_3</td>";
        echo "<td><a href='index.php?source=view&view_page=puja&view_yantra_id=$row->puja_id' class='btn btn-primary'>View</td>";
        echo "</tr>";
    }
  }
  function add_katha($name, $details, $price, $meta_keyword, $meta_des, $img1, $img2, $img3){
    global $pdo;
    $yantra_added = FALSE;
    try {
      $sql = 'INSERT INTO tbl_katha(katha_name, katha_details, katha_price, katha_keyword, katha_desc, katha_img_1, katha_img_2, katha_img_3) VALUES  (:name, :details, :price, :meta_keyword, :meta_des, :img1, :img2, :img3)';
      $stmt = $pdo->prepare($sql);
      if ($stmt->execute(['name'=>$name, 'details'=>$details, 'price'=>$price, 'meta_keyword'=>$meta_keyword, 'meta_des'=>$meta_des, 'img1'=>$img1, 'img2'=>$img2, 'img3'=>$img3])) {
        $yantra_added = TRUE;
      }
      $stmt->errorCode();
    } catch (PDOException $e) {
      echo "Database Error : The user could not be added .<br>".$e.getMessage();
    } catch(Exception $e){
      echo "General Error : The user could not br added . <br>".$e.getMessage();
    }
    return $yantra_added;
  }
  function katha_list(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM tbl_katha');
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "<tr><th scope='row'> $row->katha_id </th>";
        echo "<td>$row->katha_name</td>";
        echo "<td>". substr($row->katha_details, 0 , strpos($row->katha_details, ' ', 50)) ."</td>";
        echo "<td>$row->katha_keyword</td>";
        echo "<td>".substr($row->katha_desc, 0 , strpos($row->katha_desc, ' ', 10))."</td>";
        echo "<td> Rs. $row->katha_price</td>";
        echo "<td>$row->katha_img_1</td>";
        echo "<td>$row->katha_img_2</td>";
        echo "<td>$row->katha_img_3</td>";
        echo "<td><a href='index.php?source=view&view_page=katha&view_yantra_id=$row->katha_id' class='btn btn-primary'>View</td>";
        echo "</tr>";
    }
  }
  function add_kundali($name, $details, $price, $meta_keyword, $meta_des, $img1, $img2, $img3){
    global $pdo;
    $yantra_added = FALSE;
    try {
      $sql = 'INSERT INTO tbl_kundali(kundali_name, kundali_details, kundali_price, kundali_meta_keyword, kundali_meta_desc, kundali_img_1, kundali_img_2, kundali_img_3) VALUES  (:name, :details, :price, :meta_keyword, :meta_des, :img1, :img2, :img3)';
      $stmt = $pdo->prepare($sql);
      if ($stmt->execute(['name'=>$name, 'details'=>$details, 'price'=>$price, 'meta_keyword'=>$meta_keyword, 'meta_des'=>$meta_des, 'img1'=>$img1, 'img2'=>$img2, 'img3'=>$img3])) {
        $yantra_added = TRUE;
      }
      $stmt->errorCode();
    } catch (PDOException $e) {
      echo "Database Error : The user could not be added .<br>".$e.getMessage();
    } catch(Exception $e){
      echo "General Error : The user could not br added . <br>".$e.getMessage();
    }
    return $yantra_added;
  }
  function kundali_list(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM tbl_kundali');
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "<tr><th scope='row'> $row->kundali_id </th>";
        echo "<td>$row->kundali_name</td>";
        echo "<td>". substr($row->kundali_details, 0 , strpos($row->kundali_details, ' ', 50)) ."</td>";
        echo "<td>$row->kundali_meta_keyword</td>";
        echo "<td>".substr($row->kundali_meta_desc, 0 , strpos($row->kundali_meta_desc, ' ', 10))."</td>";
        echo "<td> Rs. $row->kundali_price</td>";
        echo "<td>$row->kundali_img_1</td>";
        echo "<td>$row->kundali_img_2</td>";
        echo "<td>$row->kundali_img_3</td>";
        echo "<td><a href='index.php?source=view&view_page=kundali&view_yantra_id=$row->kundali_id' class='btn btn-primary'>View</td>";
        echo "</tr>";
    }
  }
  function add_blog_cat($name){
    global $pdo;
    $yantra_added = FALSE;
    try {
      $sql = 'INSERT INTO blog_category(blog_category_name) VALUES  (:name)';
      $stmt = $pdo->prepare($sql);
      if ($stmt->execute(['name'=>$name])) {
        $yantra_added = TRUE;
      }
      $stmt->errorCode();
    } catch (PDOException $e) {
      echo "Database Error : The user could not be added .<br>".$e.getMessage();
    } catch(Exception $e){
      echo "General Error : The user could not br added . <br>".$e.getMessage();
    }
    return $yantra_added;
  }
  function category_list(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM blog_category');
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "<tr><th scope='row'> $row->blog_category_id </th>";
        echo "<td>$row->blog_category_name</td>";
        echo "</tr>";
    }
  }
  function add_blog_tag($name){
    global $pdo;
    $yantra_added = FALSE;
    try {
      $sql = 'INSERT INTO blog_tags(blog_tag_name) VALUES  (:name)';
      $stmt = $pdo->prepare($sql);
      if ($stmt->execute(['name'=>$name])) {
        $yantra_added = TRUE;
      }
      $stmt->errorCode();
    } catch (PDOException $e) {
      echo "Database Error : The user could not be added .<br>".$e.getMessage();
    } catch(Exception $e){
      echo "General Error : The user could not br added . <br>".$e.getMessage();
    }
    return $yantra_added;
  }
  function tag_list(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM blog_tags');
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "<tr><th scope='row'> $row->blog_tag_id </th>";
        echo "<td>$row->blog_tag_name</td>";
        echo "</tr>";
    }
  }
  function category_list_option(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM blog_category');
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "<option value='$row->blog_category_id'>$row->blog_category_name</option>";
    }
  }
  function tag_list_option(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM blog_tags');
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "<option value='$row->blog_tag_id'>$row->blog_tag_name</option>";
    }
  }
  function add_blog($blog_name, $blog_keyword, $blog_meta_desc, $blog_meta_title, $blog_body, $blog_thumb, $blog_cat_id, $blog_tag_id){
    global $pdo;
    $yantra_added = FALSE;
    try {
      $sql = 'INSERT INTO tbl_blog(blog_title, blog_keyword, blog_meta_desc, blog_meta_title, blog_body, blog_thumb, blog_category, blog_tag) VALUES  (:blog_title,:blog_keyword,:blog_meta_desc,:blog_meta_title,:blog_body, :blog_thumb, :blog_category, :blog_tag)';
      $stmt = $pdo->prepare($sql);
      if ($stmt->execute(['blog_title'=>$blog_name,'blog_keyword'=>$blog_keyword,'blog_meta_desc'=>$blog_meta_desc,'blog_meta_title'=>$blog_meta_title,'blog_body'=>$blog_body,'blog_thumb'=>$blog_thumb,'blog_category'=>$blog_cat_id,'blog_tag'=>$blog_tag_id])) {
        $yantra_added = TRUE;
      }
      $stmt->errorCode();
    } catch (PDOException $e) {
      echo "Database Error : The user could not be added .<br>".$e.getMessage();
    } catch(Exception $e){
      echo "General Error : The user could not br added . <br>".$e.getMessage();
    }
    return $yantra_added;
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
        echo "<tr><th scope='row'> $row->blog_id </th>";
        echo "<td>$row->blog_title</td>";
        echo "<td> $row->blog_meta_desc</td>";
        echo "<td>$row->blog_keyword</td>";
        echo "<td>$category_name </td>";
        echo "<td>$row->blog_thumb</td>";
        echo "<td>$tag_name</td>";
        // echo "<td><a href='index.php?source=view&view_page=yantra&view_yantra_id=$row->yantra_id' class='btn btn-primary'>View</td>";
        echo "</tr>";
    }
  }
  function booking_details(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM tbl_booking');
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
      // echo $row->booking_id;// echo $row->booking_status;// echo $row->client_name;// echo $row->client_number;// echo $row->client_email;
      // echo $row->samagri_id;/ echo $row->product_id;// echo $row->product_category;// echo $row->samagri_added;// echo $row->booking_price;
      // echo $row->client_address;// echo $row->client_booking_time;// echo $row->client_booking_date;
      echo "<tr><th scope='row'> $row->booking_id </th>";
      echo "<td>$row->booking_status</td>";
      echo "<td>$row->client_name</td>";
      echo "<td>$row->client_number</td>";
      echo "<td>$row->client_booking_date</td>";
      echo "<td>$row->samagri_added</td>";
      echo "<td>$row->product_id</td>";
      echo "<td>$row->client_address</td>";
      echo "<td><a href='index.php?source=view&view_page=booking&view_yantra_id=$row->booking_id' class='btn btn-primary'>View</a></td></tr>";
    }
  }
  function puja_view($id){
    global $pdo;
    $sql = "SELECT * FROM tbl_puja WHERE puja_id = :id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $yantras = $stmt->fetch();
    echo "<h1>".$yantras->puja_name."</h1>";
    echo "<hr>";
    echo "<h2> Puja Anusthan Details </h2>";
    echo "<p class='text-justify'>".$yantras->puja_details."</p>";
    echo "<h2> Puja Anusthan Meta Keyword </h2>";
    echo "<p>".$yantras->puja_meta_keyword."</p>";
    echo "<h2> Puja Anusthan Meta Description </h2>";
    echo "<p>".$yantras->puja_meta_des."</p>";
    echo "<h2> Puja Anusthan Price  </h2>";
    echo "<p> Rs. <strong>".$yantras->puja_price."</strong></p>";
    echo "<h2> Yantra Picture </h2>";
    echo "<p>".$yantras->puja_img_1."</p>";
    echo "<p>".$yantras->puja_img_2."</p>";
    echo "<p>".$yantras->puja_img_3."</p>";
  }
  function katha_view($id){
    global $pdo;
    $sql = "SELECT * FROM tbl_katha WHERE katha_id = :id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $yantras = $stmt->fetch();
    echo "<h1>".$yantras->katha_name."</h1>";
    echo "<hr>";
    echo "<h2> Katha Details </h2>";
    echo "<p class='text-justify'>".$yantras->katha_details."</p>";
    echo "<h2> Katha Meta Keyword </h2>";
    echo "<p>".$yantras->katha_keyword."</p>";
    echo "<h2> Katha Meta Description </h2>";
    echo "<p>".$yantras->katha_desc."</p>";
    echo "<h2> Katha Price  </h2>";
    echo "<p> Rs. <strong>".$yantras->katha_price."</strong></p>";
    echo "<h2> Yantra Picture </h2>";
    echo "<p>".$yantras->katha_img_1."</p>";
    echo "<p>".$yantras->katha_img_2."</p>";
    echo "<p>".$yantras->katha_img_3."</p>";
  }
  function kundali_view($id){
    global $pdo;
    $sql = "SELECT * FROM tbl_kundali WHERE kundali_id = :id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $yantras = $stmt->fetch();
    echo "<h1>".$yantras->kundali_name."</h1>";
    echo "<hr>";
    echo "<h2> Kundali Details </h2>";
    echo "<p class='text-justify'>".$yantras->kundali_details."</p>";
    echo "<h2> Kundali Meta Keyword </h2>";
    echo "<p>".$yantras->kundali_meta_keyword."</p>";
    echo "<h2> Kundali Meta Description </h2>";
    echo "<p>".$yantras->kundali_meta_desc."</p>";
    echo "<h2> Kundali Price  </h2>";
    echo "<p> Rs. <strong>".$yantras->kundali_price."</strong></p>";
    echo "<h2> Yantra Picture </h2>";
    echo "<p>".$yantras->kundali_img_1."</p>";
    echo "<p>".$yantras->kundali_img_2."</p>";
    echo "<p>".$yantras->kundali_img_3."</p>";
  }
  function booking_view($id){
    global $pdo;
    $sql = "SELECT * FROM tbl_booking WHERE booking_id = :id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $yantras = $stmt->fetch();
    echo "<div class='container'><div class='row'><div class='col-md-6'>";
    echo "<p> Booking Id : $yantras->booking_id </p></div><div class='col-md-6'><p>";
    echo "Booking Status : $yantras->booking_status";
    echo "</p></div></div><div class='row'><div class='col-md-4'>";
    echo "<h3> Client Information  </h3>";
    echo "<br>";
    echo "<p> Client Name : $yantras->client_name </p>";
    echo "<p> contact Number : $yantras->client_number </p>";
    echo "<p> Email : $yantras->client_email </p>";
    echo "<p> Address : $yantras->client_address </p>";
    echo "</div><div class='col-md-4'>";
    echo "<h3> Booking Information </h3>";
    echo "<br>";
    echo "<p> Booked Product : $yantras->product_id </p>";
    echo "<p> Booking Date : $yantras->client_booking_date </p>";
    echo "<p> Booking Time : $yantras->client_booking_time </p>";
    echo "</div><div class='col-md-4'>";
    echo "<h3> Additional Information </h3>";
    echo "<br>";
    echo "<p> Samagri Added : $yantras->samagri_id </p>";
    echo "<p> Samagri Name : $yantras->product_id </p>";
    echo "</div></div></div>";
  }


 ?>
