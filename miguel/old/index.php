<?php
session_start(); //start the session
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Miguels Board Game Co.(Working Title)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap-material-design.css">
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="static/css/ripples.css">

        
        <script src="static/js/jquery-3.2.0.min.js"></script>
        <script src="static/js/bootstrap.min.js"></script>
        <script src="static/js/material.min.js"></script>
        <script src="static/js/ripples.min.js"></script>
        <script src="static/js/scripts.js"></script>

  
        
        
        
    </head>
    <body>
        <!--<section class="color ss-style-bigtriangle">-->
    	    <?php include('inc/header.inc');?>
        <!--</section>
    	<svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
    	    <path d="M0 0 L50 100 L100 0 Z" />
	</svg>-->
        <?php include('inc/nav.inc'); ?>
        <div id="content" class="container-fluid">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <section id="homepageText">
                    
                    <?php include('inc/settings.php');
                        //Homepage Content
                        $stmt = "SELECT * FROM home_page ORDER BY id";
                        $result= mysqli_query($link, $stmt);
                        if($result == false){
                            $error_msg = mysqli_error($link);
                            echo "<p>There was an error: $error_msg</p>";
                        }
                        if(mysqli_num_rows($result)==0){
                            echo "No content is available at this time.";
                        }
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<h2>'.$row['title'].'<h2>';
                            echo '<p id="homecontent">'.$row['content'].'<p>';    
                        }
                        //Can add edit button to the main page for the admin

                        mysqli_free_result($result);
                        mysqli_close($link);
                    ?>
                </section>
                <section>
                    <div class="container-fluid">
                        <div class="row">
                           <center><h2>Our Team</h2></center>
                            <div class="panel-group">
                                <div class="col-sm-4">
                                    <div class="panel panel-default" id="teamPanel">
                                        <div class="panel-body">
                                            <center><img class="img-circle" src="images/mig.jpg" width="100" height="100">
                                            <h4>Miguel</h4>
                                            <h5>Title</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam efficitur lorem convallis turpis tristique tempor. Suspendisse vel neque non enim venenatis cursus eget ut lectus.</p></center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="panel panel-default" id="teamPanel">
                                        <div class="panel-body">
                                            <center><img class="img-circle" src="images/blank-profile.png" width="100" height="100">
                                            <h4>Name Holder</h4>
                                            <h5>Title</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam efficitur lorem convallis turpis tristique tempor. Suspendisse vel neque non enim venenatis cursus eget ut lectus.</p></center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="panel panel-default" id="teamPanel">
                                        <div class="panel-body">
                                            <center><img class="img-circle" src="images/blank-profile.png" width="100" height="100">
                                            <h4>Name Holder</h4>
                                            <h5>Title</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam efficitur lorem convallis turpis tristique tempor. Suspendisse vel neque non enim venenatis cursus eget ut lectus.</p></center>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                            </div> 
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-sm-2"></div>
        </div>

        <div id="footer" class="container-fluid">
            <?php include('inc/footer.inc');?>
        </div> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
        
    </body>
    
</html>
<!--section class="color ss-style-bigtriangle">
    
</section>

<svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
    <path d="M0 0 L50 100 L100 0 Z" />
</svg>-->

