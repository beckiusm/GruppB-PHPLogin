<div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="cover-container">
      <div class="masthead clearfix">
        <div class="inner">
          <h3 class="masthead-brand">Welcome to PHP site</h3>
          <nav class="nav nav-masthead">
            <a class="btn btn-danger" href="includes/logout.php">Logout</a>
            <a class="nav-link" href="#">Features</a>
            <a class="nav-link" href="#">Contact</a>
          </nav>
        </div>
      </div>
      <div class="inner cover">
        <h1 class="cover-heading">Logged in!.</h1>
        <p class="lead">Username : <?php echo $_SESSION['username']?></p>
        <p class="lead">Email : <?php echo $_SESSION['email']?></p>
      </div>
      <div class="mastfoot">
        <div class="inner">
          <p>Cover template for <a href="https://getbootstrap.com">Bootstrap</a>, 
            by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        </div>
      </div>
    </div>
  </div>
</div>
