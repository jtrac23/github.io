<?php
//DELETE BLOG POST FILE
include('inc/admin_settings.php');
if(isset($_POST['post_Id'])){
	$i = $_POST['post_Id'];
	$i = mysqli_real_escape_string($link, $i); 
	$stmt = "DELETE FROM `post_structure` WHERE `post_ID`='$i'";
	$result = mysqli_query($link, $stmt);
	$eermsg = mysqli_error($link);
	if($result != 0){
		header('Location:blog.php');
	} else {
		echo '<div class="alert alert-warning"><strong>Ouch!</strong> Something went wrong...you shouldnt see this'.$errormsg.'</div>';
		echo '<p>ID that was passed '. $i .' IF that isnt right something is broken</p>';
		echo '<button type="button" class="btn btn-warning"><a href="blog.php">Back to Blog</a></button>';
	}
}


?>