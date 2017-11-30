<?php
//ADMIN LOGIN FORM
include('inc/settings.php'); //check the db
session_start(); //start the session
if(isset($_POST['submit_login'])){
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $pwd = mysqli_real_escape_string($link, $_POST['pwd']); //not 100% here PASSWORD ENCRYPTION
    $stmt = "SELECT * FROM blog_members WHERE email = '$email' AND password = '$pwd'";
    $result = mysqli_query($link, $stmt);
    if(mysqli_num_rows($result)==0){
        $msg = '<h2 style="color:red;"> INVALID LOGIN</h2>';
    } else {
        $_SESSION['user'] = $email;
        $msg = '<h2>LOGIN SUCCESSFUL</h2>';
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Miguels Board Game Co.(Working Title)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap-material-design.css">
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="static/css/ripples.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="static/js/jquery-3.2.0.min.js"></script>
        <script src="static/js/bootstrap.min.js"></script>
        <script src="static/js/material.min.js"></script>
        <script src="static/js/ripples.min.js"></script>
        <script src="static/js/scripts.js"></script>
        
        
    </head>
    <body>
        <?php include('inc/header.inc'); ?>
        <?php include('inc/nav.inc'); ?>
        <div id="contentForm" class="container-fluid" style="padding-bottom:100px padding-top:50px;">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div id="formPanel" class="panel panel-default">
                    <div class="panel-body">
                        <h2 style="text-align:left;">Admin Login</h2>
                        <section><!--THIS USES HTML5 VALIDATION-->
                            <?php if(isset($msg)){echo $msg."</ br>";} //displays error messages
                            ?>
                            <form method="post" name="adminLogin" action="<?php $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="email">Email Address</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="password">Password</label>
                                    <input type="password" class="form-control" name="pwd" required>
                                </div>
                                <!--SUBMIT BUTTON-->
                                <input id="subBtn" type="submit" name="submit_login" value="Login" class="btn btn-default wave-effect pull-right"><div class="ripple-container"></div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div id="footer" class="container-fluid">
            <?php include('inc/footer.inc');?>
        </div>
    </body>
</html>