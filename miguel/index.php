<?php
session_start(); //start the session
$user = $_SESSION['user'];
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
        <!--<section class="color ss-style-bigtriangle">-->
    	    <?php include('inc/header.inc');?>
        <!--</section>
    	<svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
    	    <path d="M0 0 L50 100 L100 0 Z" />
	</svg>-->
        <?php include('inc/nav.inc'); ?>

	<div class="backdrop" id="homepageText">
	    <div class="container">
	        
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
	    </div>
	</div>
	<div id="teamSection" class="container-fluid">
	        <h2>Our Party</h2>
	        <div class="panel-group">
	            <div class="col-sm-4">
	                <div class="panel panel-default center-block" id="teamPanel">
	                    <div class="panel-body" id="cardInterior">
	                    	<img src="images/icons/Armoury-14.svg" class="weapon_top_left pull-left" />
	                    	<img src="images/icons/Armoury-14.svg" class="weapon_top_right pull-right" /><br />
	                        <center><img class="img-circle" src="images/blank-profile.png" width="100" height="100" style="margin-top:25px;">
	                        <h4>Miguel</h4>
	                        <h5>Class: God-Wizard</h5>
	                        <h5>HP: XXX | MP: XXX</h5>
	                        <h5>Ability: Boss Around</h5>
	                        <p id="teamBio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam efficitur lorem convallis turpis tristique tempor. Suspendisse vel neque non enim venenatis cursus eget ut lectus.</p></center>
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="panel panel-default center-block" id="teamPanel">
	                    <div class="panel-body" id="cardInterior">
	                    	<img src="images/icons/Armoury-14.svg" class="weapon_top_left pull-left" />
	                    	<img src="images/icons/Armoury-14.svg" class="weapon_top_right pull-right" /><br />
	                       	<center><img class="img-circle" src="images/blank-profile.png" width="100" height="100" style="margin-top:25px;">
	                        <h4>Player 2</h4>
	                        <h5>Class: Warrior</h5>
	                        <h5>HP: XXX | MP: XXX</h5>
	                        <h5>Ability: Fall In Line</h5>
	                        <p id="teamBio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam efficitur lorem convallis turpis tristique tempor. Suspendisse vel neque non enim venenatis cursus eget ut lectus.</p></center>
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="panel panel-default center-block" id="teamPanel">
	                    <div class="panel-body" id="cardInterior">
	                    	<img src="images/icons/Armoury-14.svg" class="weapon_top_left pull-left" />
	                    	<img src="images/icons/Armoury-14.svg" class="weapon_top_right pull-right" /><br />
	                       	<center><img class="img-circle" src="images/blank-profile.png" width="100" height="100" style="margin-top:25px;">
	                        <h4>Player 3</h4>
	                        <h5>Class: Healer</h5>
	                        <h5>HP: XXX | MP: XXX</h5>
	                        <h5>Ability: Fall In Line</h5>
	                        <p id="teamBio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam efficitur lorem convallis turpis tristique tempor. Suspendisse vel neque non enim venenatis cursus eget ut lectus.</p></center
	                    </div>
	                </div>
	            </div>
	    	</div>
	    </div>
	</div>
    

	<div class="backdrop" id="about" style="padding-top:0px">
	    <svg id="bigTriangleColor" class="shadow" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none" >
	        <path d="M0 0 L50 100 L100 0 Z" />
	    </svg>
	    <div class="container" id="afterTriangle">
	    	<div class="col-sm-6" id="findUs">
	    	    <h2>Find us.</h2>
	    	    <p>Sometimes we hang out places testing our games. This place is currently our favorite.</p>
	    	    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12387.138849540514!2d-94.5872157!3d39.0886013!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8fa3985d7ca12e5c!2sPawn+and+Pint!5e0!3m2!1sen!2sus!4v1495755966093" width="350" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
	    	</div>
	    	<div class="col-sm-6" id="contact">
	    	    <h2>Contact us.</h2>
	    	    <p>You have questions, we might have answers...TBD. You can reach us here: skcbgc@example.com</p>
	    	</div>
	    </div>
	</div>


 
        
    </body>
    
</html>


