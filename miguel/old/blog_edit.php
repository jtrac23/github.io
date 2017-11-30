<?php
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){header("Location:admin_login.php");}
	/*IF the user is not an admin, redirect to the admin login page*/

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
        <script>
        	$(document).ready(function(){
        		$('#sendData').click(function(){
        			var theId = $('#id').val();
        			var newTitle = $('#title').val();
        			var newContent = $('#message').val();
        			$.post('update_post.php', {id:theId, title:newTitle, message:newContent},
        			function(response, textStatus, jqXHR){
        				if(response){
        					$('#updateResults').html('The response: '+response+ '<strong>' +textStatus+ '</strong>');
        					$('#updateResults').append('<br><a href="blog.php">Return to the Blog</a>');
        				} else {
        					$('#updateResults').html("Sorry! It didn't work!");
        				}
        			});
        		});
        	});
        </script>
        
    </head>
    <body>
        <?php include('inc/header.inc'); ?>
        <?php include('inc/nav.inc'); ?>
        <div id="contentForm" class="container-fluid" style="padding-bottom:100px padding-top:50px;">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <section>
            		<h2>Edit Blog Post</h2>
            		<?php
            			if(isset($_POST['Submit_Update'])) {
            				include('inc/admin_settings.php');
            				$id = $_POST['id'];
            				$title = $_POST['title'];
            				$message = $_POST['message'];
            				$sql = "UPDATE `post_structure` SET `post_Title`='$title', `post_Cont`='$message' WHERE `post_ID`='$id'";
            				$result=mysqli_query($link,$sql);
            				if($result!=0){
            					$msg = "<h2>Your content has been successfuly updated!</h2>";
            				}//endif
            			}//endif
            			if(isset($msg)){echo $msg;}
            		?>
            		<div id="updateResults">
            			<?php
            				$id = $_GET['id'];
            				
            				include('inc/admin_settings.php');
            				$sql = "SELECT * FROM `post_structure` WHERE `post_ID`='$id'";
            				$result = mysqli_query($link, $sql);
            				while($row=mysqli_fetch_assoc($result)){
            					echo '<div id="blogPanel" class="panel panel-default">';
                        			echo '<div id="blogBody" class ="panel-body">';
            					echo '<div class="form-group lg">';
            					echo '  <input type="hidden" name="id" id="id" class="form-control" value="'.$id.'">';
            					echo '  <label class="control-label" for="title">Title</label>';
            					echo '  <input type="text" name="title" id="title" class="form-control" value="'.$row['post_Title'].'">';
            					echo '  <label class="control-label" for="message">Content/Caption</label>';
            					echo '  <textarea name="message" id="message" class="form-control" rows="20" cols="75">'.$row['post_Cont'].'</textarea>';
            					echo '<hr class="blogLine">';
            					echo '  <input type="button" name="Submit_Update" id="sendData" value="Update" class="btn btn-default pull-right">';
            					echo '</div>';
            					echo '</div>';
            					echo '</div>';
            				}//end while
            			?>
            		</div>
            	</section>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div id="footer" class="container-fluid">
            <?php include('inc/footer.inc');?>
        </div>
    </body>
    
    
        
        
        
    
</html>