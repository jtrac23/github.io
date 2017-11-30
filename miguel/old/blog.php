<?php
//This is the blog page
session_start(); //start the session
$user = $_SESSION['user'];

//Add blog post POST code
if(isset($_POST['submit_post'])){
    include('inc/admin_settings.php');
    $title = $_POST['title'];
    $title = mysqli_real_escape_string($link, $title);
    $content = $_POST['content'];
    $content = mysqli_real_escape_string($link, $content);
    $stmt = "INSERT INTO `post_structure` (`post_Title`, `post_Cont`) VALUES ('$title', '$content')";
    $result = mysqli_query($link, $stmt);
    if($result != 0){
        $msg = '<div class="alert alert-success"><strong>Success!</strong> Content was successfully added!</div>';
        header('Location:blog.php'); //refresh the page?
    } else {
        $msg = '<div class=alert alert-danger"><strong>Ouch!</strong> Something went wrong...</div>';
    }
}
if(isset($_POST['submit_video'])){
    include('inc/admin_settings.php');
    $title = $_POST['title'];
    $title = mysqli_real_escape_string($link, $title);
    $embed = $_POST['embed'];
    $embed = mysqli_real_escape_string($link, $embed);
    $caption = $_POST['caption'];
    $caption = mysqli_real_escape_string($link, $caption);
    $stmt = "INSERT INTO `post_structure` (`post_Title`, `post_Cont`) VALUES ('$title', '<center>$embed</center><br />$caption')";
    $result = mysqli_query($link, $stmt);
    $error = mysqli_error($link);
    if($result != 0){
        $msg = '<div class="alert alert-success"><strong>Success!</strong> Content was successfully added!</div>';
        header('Location:blog.php'); //refresh the page?
    } else {
        $msg = '<div class=alert alert-danger" style="color:red;"><strong>Ouch!</strong> Something went wrong... '. $error .'</div>';
    }
}
if(isset($_POST['delItem'])){
	include('inc/admin_settings.php');
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

<!DOCTYPE html>
<html>
    <head>
        <title>Miguels Board Game Co.(Working Title)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
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
        <?php include('inc/header.inc');?>
        <?php include('inc/nav.inc'); ?>
        <div id="content" class="container-fluid">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php
                    if(isset($msg)){echo $msg;}
                ?>
                <section>
                    <?php include('inc/settings.php');
                    $stmt = "SELECT * FROM post_structure ORDER BY post_ID DESC";
                    $result = mysqli_query($link, $stmt);
                    if($result == false){
                        $error_msg = mysqli_error($link);
                        echo "<p>There was an error: $error_msg</p>";
                    }
                    if(mysqli_num_rows($result)==0){
                        echo "There doesn't appear to be anything here yet...";
                    }
                    while($row=mysqli_fetch_assoc($result)){
                    	$postID = $row['post_ID'];
                    	echo '<form id="blogPost" action="'.$_SERVER['PHP_SELF'].'" method="POST">';
                    	echo '<input type="hidden" name="post_Id" id="post_Id" class="form-control" value="'.$row['post_ID'].'">';
                        echo '<div id="blogPanel" class="panel panel-default">';
                        echo '<div id="blogBody" class ="panel-body">';
                        echo '<h2 style="text-align:left;">'.$row['post_Title'].'</h2><br />';
                        if($row['file_name'] != NULL){
                            echo '<center><img id="postImg" class="img-responsive" src="images/uploads/'.$row['file_name'].'"></center><br />';
                        }
                        echo '<p>'.$row['post_Cont'].'</p><br />';
                        echo '<hr class="blogLine">';
                        echo '<p style="text-align:left;width:250px;position:absolute;">'.date("F j Y", strtotime($row['post_Date'])).'</p>';
                        //add buttons
                        if(isset($user)){
                            echo '<a class="btn btn-default pull-right" href="blog_edit.php? id='.$row['post_ID'].'" style="margin-top:0px;">EDIT</a>';
                            echo '<input type="submit" name="delItem" id="delItem" value="DELETE" class="btn btn-default pull-right" style="margin-top:0px;">';
                        } else {echo '<br />';}
                        echo '</div>';
                        echo '</div>';
                        echo '</form>';
                        echo '<br />';
                        
                    }

                    ?>
                </section>
            </div>
            <div class="col-md-2">
                <?php
                   if(isset($user)){
                       echo '<div id="container-floating">';
                       echo '	 <div class="nd4 nds" data-toggle="modal" data-target="#addPictureModal" data-placement="left" data-original-title="Picture Post"><img class="glyph" src="images/icons/glyphicons-139-picture.png" /></div>';
                       echo '     <div class="nd3 nds" data-toggle="modal" data-target="#addVideoModal" data-placement="left" data-original-title="Video Post"><img class="glyph" src="images/icons/glyphicons-9-film.png" /></div>';
                       echo '    <div class="nd1 nds" data-toggle="modal" data-target="#addPostModal" data-placement="left" data-original-title="Text Post"><img class="glyph" src="images/icons/glyphicons-117-text-bigger.png">';
                       echo '    </div>';
                       echo '    <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create">';
                       echo '    <p class="plus">+</p>';
                       echo '    <img class="edit" src="http://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/1x/bt_compose2_1x.png">';
                       echo '    </div>';
                       echo '</div>';
                   }
                ?>
            </div>
        </div>
        <div id="footer" class="container-fluid">
            <?php include('inc/footer.inc');?>
        </div>
<!--ADD POST MODAL-->
        <div class="modal fade" id="addPostModal" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="container-fluid">
                            <div class="row">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title" id="addPostModalTitle">Add Post</h2>
                            </div>
                        </div>
                    </div> <!--Modal Header End-->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <form method="post" name="addPostForm" action="<?php $_SERVER['PHP_SELF']; ?>">
					<div class="form-group-lg is-empty">
						<label class="control-label" for="title">Title</label>
						<input type="text" class="form-control" name="title" required>
					</div>
					<div class="form-group-lg is-empty">
						<label class="control-label" for="content">Content</label>
						<textarea class="form-control" name="content" style="height:350;" required></textarea>
					</div>
                                        	<input class="btn btn-default pull-right" type="submit" name="submit_post" value="Submit">
                                    </form>
                                    <div class="col-sm-1"></div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<div class="modal fade" id="addVideoModal" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="container-fluid">
                            <div class="row">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title" id="addVideoTitle">Embed A Video</h2>
                            </div>
                        </div>
                    </div> <!--Modal Header End-->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <form method="post" name="addVideoForm" action="<?php $_SERVER['PHP_SELF']; ?>">
					<div class="form-group-lg is-empty">
						<label class="control-label" for="title">Title</label>
						<input type="text" class="form-control" name="title" required>
					</div>
					<div class="form-group-lg is-empty">
						<label class="control-label" for="embed">Embedding Link</label>
						<input class="form-control" name="embed" required>
					</div>
					<div class="form-group-lg is-empty">
						<label class="control-label" for="caption">Caption</label>
						<textarea class="form-control" name="caption"></textarea>
					</div>
                                        	<input class="btn btn-default pull-right" type="submit" name="submit_video" value="Submit">


                                    </form>
                                    <div class="col-sm-1"></div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addPictureModal" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="container-fluid">
                            <div class="row">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title" id="addPostModalTitle">Add Picture Post</h2>
                            </div>
                        </div>
                    </div> <!--Modal Header End-->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <form method="post" name="addPictureForm" action="upload.php" enctype="multipart/form-data">
					<div class="form-group-lg is-empty">
						<label class="control-label" for="title">Title</label>
						<input type="text" class="form-control" name="title" id="title" required>
					</div>
					<div class="form-group-lg is-empty is-fileinput">
						<label class="control-label" for="fileinput">Select File</label>
						<input type="file" id="fileinput" name="fileinput" multiple>
						
					</div>
					<div class="form-group-lg is-empty">
						<label class="control-label" for="caption">Caption</label>
						<textarea class="form-control" name="caption" id="caption" style="height:350;" required></textarea>
					</div>
                                        	<input class="btn btn-default pull-right" type="submit" name="btn_upload" value="Submit">
                                    </form>
                                    <div class="col-sm-1"></div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>