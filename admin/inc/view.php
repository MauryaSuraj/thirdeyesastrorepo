<h2 class="title1"> VIEW DETAILS HERE </h2>
<div class="blank-page widget-shadow scroll" id="style-2 div1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
        if (isset($_GET['view_page'])) {
           $view_page = $_GET['view_page'];
        }
        if ($view_page == 'yantra') {
          if (isset($_GET['view_yantra_id'])) {
             yantra_view($_GET['view_yantra_id']);
          }
        }
        elseif($view_page == 'astro') {
          ast_view($_GET['view_yantra_id']);
        }
        elseif($view_page == 'puja') {
          puja_view($_GET['view_yantra_id']);
        }
        elseif($view_page == 'katha') {
          katha_view($_GET['view_yantra_id']);
        }
        elseif ($view_page == 'kundali') {
          kundali_view($_GET['view_yantra_id']);
        }
        elseif ($view_page == 'booking') {
          booking_view($_GET['view_yantra_id']);
        }
        else {
          echo "ELSE";
        }
        ?>
      </div>
    </div>
  </div>
</div>
