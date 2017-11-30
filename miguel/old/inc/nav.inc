<nav id="navi" class="navbar navbar-default navbar-fixed-top"> <!--FIXED TOP MAY BE CHANGED LATER-->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navi">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">BRAND NAME</a>
        </div>
        <div class="collapse navbar-collapse">
            `<ul class="nav navbar-nav">
                <li class="nav-item"><a  class="waves-effect" href="index.php">Home<div class="ripple-container"></div></a></li>
                <!--<li class="nav-item"><a href="#">Products<div class="ripple-container"></div></a></li> -->
                <li class="nav-item"><a href="blog.php">Blog<div class="ripple-container"></div></a></li>
                <!-- <li class="nav-item"><a href="#">About<div class="ripple-container"></div></a></li>
                <li class="nav-item"><a href="#">Contact<div class="ripple-container"></div></a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($user)){echo '<li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';} else {echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';}
                
                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- <li><a href=""></a></li> -->