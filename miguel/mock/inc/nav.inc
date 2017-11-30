<div class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">KC BGC</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
      <ul class="nav navbar-nav">
        <li class="nav-item"><a  class="waves-effect" href="index.php">Home<div class="ripple-container"></div></a></li>
        <li class="nav-item"><a href="blog.php">Blog<div class="ripple-container"></div></a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
         <?php if(!isset($user)){echo '<li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';} else {echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';}
            ?>
      </ul>
    </div>
  </div>
</div>