<h2 class="title1"> Yantra </h2>
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
        }else {
          ast_view($_GET['view_yantra_id']);
        }
        ?>
      </div>
    </div>
  </div>
</div>
