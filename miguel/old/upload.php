<?php

if(isset($_POST['btn_upload'])){    
    include('inc/admin_settings.php');
    $file = rand(1000,100000)."-".$_FILES['fileinput']['name'];
    $file_loc = $_FILES['fileinput']['tmp_name'];
    $file_size = $_FILES['fileinput']['size'];
    $file_type = $_FILES['fileinput']['type'];
    $folder="images/uploads/";
    $title = $_POST['title'];
    $title = mysqli_real_escape_string($link, $title);
    $caption = $_POST['caption'];
    $caption = mysqli_real_escape_string($link, $caption);
 
    // new file size in KB
    $new_size = $file_size/1024;  
    // new file size in KB
 
    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case
 
    $final_file=str_replace(' ','-',$new_file_name);

    if(move_uploaded_file($file_loc,$folder.$final_file)){
        $stmt = "INSERT INTO `post_structure` (`post_Title`, `post_Cont`, `file_name`, `f_type`, `f_size`) VALUES ('$title', '$caption', '$final_file', '$file_type', '$new_size')";
        $result = mysqli_query($link, $stmt);
        $error = mysqli_error($link);
	 ?>
	       <script>
	           alert('successfully uploaded');
	           window.location.href='blog.php';
	       </script>
	<?php
	echo '<p>For Debugging Purposes</p><p>'.$title.' | '.$caption.' | '.$final_file.' | '.$file_type.' | '.$new_size.' </p>'; 
	if($result != 0){
	    echo '<p>Result variable != 0, data inserted<p>';
	} else {
	    echo '<p>Data not inserted '.$error.'</p>';
	}
    
    }else{
    ?>
        <script>
            alert('error while uploading file');
            window.location.href='blog.php';
        </script>
    <?php
    }
}
?>
<a href="blog.php" class="btn btn-info">Back to Blog</a>