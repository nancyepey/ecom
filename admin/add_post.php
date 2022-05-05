
<?php 

include "../includes/header.php";
include "./admin_header_nav.php";
include "../db.php";
include "../functions.php";

?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>

<?php

if(isset($_POST['add_post'])) {

    //output msgs
    $statusMsg = '';

    //getting the post title
    $post_title = escape($_POST['post_title']);

	//getting the post author
    $post_author = escape($_POST['post_author']);

    //getting the post content
    $post_content = escape($_POST['body']);



	//getting the post status
    $post_status = escape($_POST['post_status']);

    //assigning the date() fxn to the post date variable and passing the format or assigning the format d-m-y
    $post_created_on = date('d-m-y');
    $post_updated_on = date('d-m-y');


    //for datetime
    date_default_timezone_set("Africa/Douala"); //to specify time with respect to my zone
    $CurrentTime =time(); //current time in seconds
    //strftime is string format time
    //$DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime); //mostly use when we have to apply sql format
    $DateTime = strftime("%B-%d-%Y %H:%M:%S",$CurrentTime); 
	$post_created_on = $DateTime;
	$post_updated_on = $DateTime;


    //getting up some validations
    if(empty($post_title)) {
        $statusMsg = "Title Can not be empty";
    }elseif (empty($post_author)) {

        $statusMsg = "Author Can not be empty";

    }elseif (empty($post_status)) {

        $statusMsg = "Status Can not be empty";

    }elseif (empty($post_content)) {

        $statusMsg = "Content Can not be empty";

    }else {


        //getting media

        //setting defaults
        $file_image = '';


        //getting the image
        // File upload path
        $targetDir_img = "./uploads/images/";
        // $file_image = basename($_FILES["file"]["name"]);
        // $file_image = basename($_FILES["image"]["name"]);
        $file_image = basename(escape($_FILES['upload_image']['name']));
        $targetFilePath_img = $targetDir_img . $file_image;
        $fileType_img = pathinfo($targetFilePath_img,PATHINFO_EXTENSION);

        if(!empty($_FILES["upload_image"]["name"])) {
            // Allow certain file formats IMAGES
            $allowTypes_img = array('jpg','png','jpeg','gif','pdf');
             //
            if(in_array($fileType_img, $allowTypes_img)){
                // Upload file to server
                if(move_uploaded_file($_FILES["upload_image"]["tmp_name"], $targetFilePath_img)){

                    //query to add post
                    $query = "INSERT INTO blog(post_author, post_title, post_content, post_image, post_status, post_updated_on)";
                    
                    //for date we are not sending a value but we are sending a function
                    $query .= "VALUES('{$post_author}' ,'{$post_title}', '{$post_content}','{$file_image}', '{$post_status}', '{$post_updated_on}')";
                    
                    //sending the query to the database
                    $create_post_query = mysqli_query($conn, $query);

                    confirmQuery($create_post_query);

                    //getting the id
                    $post_id = mysqli_insert_id($conn);


                    if($create_post_query){
                        // $statusMsg = "The file ".$file_image. " has been uploaded successfully.";
                        $statusMsg = "<p class='bg-primary' style='text-align:center;'> <span style='text-transform:capitalize; color:orange;'>{$post_title}</span> Post was Created Sucessfully. <a href='../post_detail.php?p_id={$post_id}' target='_blank' style='text-transform:capitalize; color:orange;'>View Post</a> or <a href='#' target='_blank' style='text-transform:capitalize; color:orange;'> Edit Post</a></p>";
                        
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    } 
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            }
        }

    }
    

    // Display status message
    echo $statusMsg;
  
 
}

?>



<!-- ADD POST  -->

<div class="container">
	<div class="row">
		<div class="col-12">
			<div>
				<h2>Add Post</h2>
			</div>

			<form method="POST" action="add_post.php" enctype="multipart/form-data">
	            <div class="form-group">
	              <label for="title">Post Title</label>
	              <input type="text"  name="post_title" class="form-control" required>
	            </div>
	            <div class="form-group">
	              <label for="author">Author</label>
	              <input type="text" name="post_author" id="author" class="form-control" required>
	            </div>
	            <div class="form-group">
                  <label for="post_status">Post Status</label>
                  <select class="form-control" name="post_status">
                    <option value="draft">Draft</option>
                    <option value="published">Publish</option>
                  </select>
                </div>
	            <div class="form-group">
	              <label for="image">Upload Image</label>
	              <div class="custom-file">
	                <input type="file" name="upload_image" class="custom-file-input" id="image">
	                <label for="image" class="custom-file-label">Choose File</label>
	              </div>
	              <small class="form-text text-muted">Max Size 3mb</small>
	            </div>
	            <div class="form-group">
	              <label for="body">Post Content</label>
	              <textarea name="body" id="body" class="form-control" required></textarea>
	            </div>

          		<button class="btn btn-primary" type="submit" name="add_post" >Published Post</button>
	           
	          </form>


		</div>
	</div>
</div>

<script>
 var editor = CKEDITOR.replace( 'body', {
  height: 300,
//   filebrowserUploadUrl: "upload.php"
 });
 CKFinder.setupCKEditor(editor);
</script>

<?php include "../includes/footer.php"; ?>
