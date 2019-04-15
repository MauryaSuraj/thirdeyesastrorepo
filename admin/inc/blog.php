<h2 class="title1"> Blog </h2>
<div class="blank-page widget-shadow scroll" id="style-2 div1">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <a href="index.php?source=add_new_blog" class="btn btn-primary">Add New Blog</a>
      </div>
      <div class="col-md-4">
        <a href="index.php?source=add_blog_category" class="btn btn-primary">Blog Category </a>
      </div>
      <div class="col-md-4">
        <a href="index.php?source=add_blog_tag" class="btn btn-primary">Blog Tags </a>
      </div>
    </div>
  </div>
  <div class="tables">
    <div class="table-responsive bs-example widget-shadow">
      <h4>Kundali List:</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>BLOG NAME</th>
            <th>BLOG DESCRIPTION </th>
            <th>META KEYWORD</th>
            <th>CATEGORY </th>
            <th>Blog Thumbnail</th>
            <th> Blog Tag </th>
          </tr>
        </thead>
        <tbody>
    <?php blog_list(); ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
