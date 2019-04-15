<h2 class="title1"> ADD NEW BLOG </h2>
<div class="blank-page widget-shadow scroll" id="style-2 div1">
  <?php
  $message='';
  if (isset($_POST['add_asrto'])) {
    if (add_blog($_POST['blog_title'], $_POST['blog_keyword'], $_POST['blog_meta_desc'], $_POST['blog_meta_title'], $_POST['blog_body'], $_POST['blog_thumb'], $_POST['blog_cat_id'], $_POST['blog_tag'])) {
      $message = "<div class='alert alert-success'>  BLOG " .$_POST['blog_title'] . "  added </div>";
    }else {
      $message = "<div class='alert alert-danger'>  BLOG Is Not Added </div>";
    }
  }
   ?>
  <form method="post" action="" enctype="application/x-www-form-urlencoded">
  <?php echo $message; ?>
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-6">
              <fieldset class="form-group">
                <label for="">Blog Title</label>
                <input type="text" class="form-control" id="" placeholder="Enter Blog Title" name="blog_title">
              </fieldset>
              <fieldset class="form-group">
                <label for="exampleTextarea">  Blog Meta Keyword </label>
                <textarea class="form-control" id="yantadetail" rows="3" placeholder="Enter Meta Keywords" name="blog_keyword"></textarea>
              </fieldset>
              <fieldset class="form-group">
                <label for="">Blog Category</label>
                <select class="form-control" name="blog_cat_id">
                <?php category_list_option(); ?>
                </select>
              </fieldset>
            </div>
            <div class="col-md-6">
              <fieldset class="form-group">
                <label for="">Blog Meta Description</label>
                <input type="text" class="form-control" id="yantraprice" placeholder="Enter Meta Description" name="blog_meta_desc">
              </fieldset>
              <fieldset class="form-group">
                <label for="yantra">Meta Title Tag</label>
                <textarea class="form-control" id="yantadetail" rows="3" placeholder="Enter Meta Title tag" name="blog_meta_title"></textarea>
              </fieldset>
                        <fieldset class="form-group">
                          <label for="">Blog Tag</label>
                          <select class="form-control" name="blog_tag">
                            <?php tag_list_option(); ?>
                          </select>
                        </fieldset>
            </div>
          </div>

          <fieldset class="form-group">
            <label for="exampleTextarea">Blog Body</label>
            <textarea name="blog_body" id="editor1" rows="10" cols="80">
                   Enter Body Content here
               </textarea>
          </fieldset>
          <fieldset class="form-group">
            <label for="exampleInputFile"> Blog Thumbnail</label>
            <input type="file" class="form-control-file" id="img3" name="blog_thumb">
          </fieldset>
          <button type="submit" class="btn btn-primary" name="add_asrto">Add Blog </button>
        </div>
      </div>
    </div>
  </form>
</div>
