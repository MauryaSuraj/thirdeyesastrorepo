<!-- header-starts -->
<div class="sticky-header header-section ">
  <div class="header-left">
    <button id="showLeftPush"><i class="fa fa-bars"></i></button>
    <div class="clearfix"> </div>
  </div>
  <div class="header-right">
    <!--search-box-->
    <div class="search-box">
      <form class="input">
        <input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
        <label class="input__label" for="input-31">
          <svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
            <path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
          </svg>
        </label>
      </form>
    </div><!--//end-search-box-->

    <div class="profile_details">
      <ul>
        <li class="dropdown profile_details_drop">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <div class="profile_img">
              <span class="prfil-img m-auto p-auto"><img src="images/man.png" alt=""> </span>
              <div class="user-name">
                <p><?php user_details($_SESSION['user_id']); ?></p>
                <span>Administrator</span>
              </div>
              <i class="fa fa-angle-down lnr"></i>
              <i class="fa fa-angle-up lnr"></i>
              <div class="clearfix"></div>
            </div>
          </a>
          <ul class="dropdown-menu drp-mnu">
            <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
            <li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>
            <li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li>
            <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="clearfix"> </div>
</div>
<!-- //header-ends -->