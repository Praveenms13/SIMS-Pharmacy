<div class="site-navbar py-2">

  <div class="search-wrap">
    <div class="container">
      <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
      <form action="#" method="post">
        <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
      </form>
    </div>
  </div>

  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <div class="logo">
        <div class="site-logo">
          <a href="index.html" class="js-logo-clone">SIMS</a>
        </div>
      </div>
      <div class="main-nav d-none d-lg-block">
        <nav class="site-navigation text-right text-md-center" role="navigation">
          <ul class="site-menu js-clone-nav d-none d-lg-block">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="shop.html">Store</a></li>
            <li class="has-children">
              <a href="#">Dropdown</a>
              <ul class="dropdown">
                <li><a href="#">Supplements</a></li>
                <li class="has-children">
                  <a href="#">Vitamins</a>
                  <ul class="dropdown">
                    <li><a href="#">Supplements</a></li>
                    <li><a href="#">Vitamins</a></li>
                    <li><a href="#">Diet &amp; Nutrition</a></li>
                    <li><a href="#">Tea &amp; Coffee</a></li>
                  </ul>
                </li>
                <li><a href="#">Diet &amp; Nutrition</a></li>
                <li><a href="#">Tea &amp; Coffee</a></li>
              </ul>
            </li>
            <li><a href="about.html">About</a></li>
            <?php if (Session::isAuthenticated()) { ?>
              <li><a href="dashboard.php">Dashboard</a></li>
            <?php } ?>
          </ul>
        </nav>
      </div>
      <div class="icons">
        <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
        <?php
        if (Session::isAuthenticated()) { ?>
          <a href="cart" class="icons-btn d-inline-block bag">
            <span class="icon-shopping-bag"></span>
            <span class="number">5</span>
          </a>
          <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          <a href="account" class="icons-btn d-inline-block person" type="button" data-toggle="tooltip" data-placement="top" title="<?php echo Session::getUser()->getUsername(); ?>">
            <span class="icon-person"></span>
          </a>
          &nbsp;&nbsp;
          <a href="/?logout" class="btn btn-primary my-2">Logout</a>
        <?php
        } else { ?>
          <a href="login.php" class="btn btn-primary my-2">Login</a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>