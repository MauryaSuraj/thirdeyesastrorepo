<?php ob_start(); ?>
<?php session_start(); ?>
<?php include_once 'inc/functions.php'; ?>
<?php include_once 'inc/header.php'; ?>
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
<?php include_once 'inc/navigation.php'; ?>
	</div>
<?php include_once 'inc/topbar.php'; ?>
<?php
 if (!$_SESSION['user_id']) {
 	header('Location: ../index.php');
 }
 ?>
		<div id="page-wrapper">
			<div class="main-page">
				<!-- MAin Page will be here  -->
				<?php
				if (isset($_GET['source'])) {
					$source = $_GET['source'];
				}else { $source ='';}

				switch ($source) {
					case 'add_new_blog':
							include "inc/add_new_blog.php";
								 break;
					case 'user':
							include "inc/users.php";
								 break;
					case 'yantra':
									include "inc/yantra.php";
									break;
					case 'astrology':
							include "inc/astrology.php";
								 break;
					case 'puja':
							include "inc/puja.php";
							break;
					case 'katha':
							include "inc/katha.php";
									break;
					case 'kundali':
									include "inc/kundali.php";
									break;
				  case 'purchase_detail':
									include "inc/purchase.php";
									break;
					case 'booking_detail':
									include "inc/booking.php";
									break;
					case 'add_yantra':
								include "inc/add_yantra.php";
								break;
								case 'view':
											include "inc/view.php";
											break;
					case 'add_astology':
								include "inc/add_astrology.php";
								break;
					case 'add_puja':
								include "inc/add_puja.php";
								break;
					case 'add_katha':
								include "inc/add_katha.php";
								break;
					case 'add_kundali':
							include "inc/add_kundali.php";
						  break;
							case 'blog':
									include "inc/blog.php";
								  break;
					case 'add_blog_category':
								include "inc/add_blog_cat.php";
								break;
					case 'add_blog_tag':
								include "inc/add_blog_tag.php";
								break;
					default:
							include 'inc/main.php';
				}
				 ?>
			</div>
		</div>

	<?php include_once 'inc/footer.php'; ?>
