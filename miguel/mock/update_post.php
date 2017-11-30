<?php 

if(isset($_POST['id'])){
	include('inc/admin_settings.php');
	$id = $_POST['id'];
	$title = $_POST['title'];
	$message = $_POST['message'];
	$sql = "UPDATE `post_structure` SET `post_Title`='$title', `post_Cont`='$message' WHERE `post_ID`='$id'";
	$result = mysqli_query($link, $sql);
	if($result){
		echo '<em>Your content successfully updated!</em><br>';
	} else {
		$error_msg = mysqli_error($link);
		echo '<em>There was an error: $error_msg';
	}
}
?>