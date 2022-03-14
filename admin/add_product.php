<?php 

include "../includes/header.php";
include "./admin_header_nav.php";
include "../db.php";
include "../functions.php";

?>


<?php

if(isset($_POST['add_prod'])) {

    //output msgs
    $statusMsg = '';

    //getting the product name
    $prod_name = escape($_POST['prod_name']);

    //getting the product description
    $prod_desc = escape($_POST['prod_desc']);

    //getting the product description
    $prod_price = escape($_POST['prod_price']);

    //assigning the date() fxn to the post date variable and passing the format or assigning the format d-m-y
    $created_on = date('d-m-y');
    $updated_on = date('d-m-y');


    //for datetime
    date_default_timezone_set("Africa/Douala"); //to specify time with respect to my zone
    $CurrentTime =time(); //current time in seconds
    //strftime is string format time
    //$DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime); //mostly use when we have to apply sql format
    $DateTime = strftime("%B-%d-%Y %H:%M:%S",$CurrentTime); 


    //getting up some validations
    if(empty($prod_name)) {
        $statusMsg = "Name Can not be empty";
    }elseif (empty($prod_price)) {

        $statusMsg = "Price Can not be empty";

    }elseif (empty($prod_desc)) {

        $statusMsg = "Description Can not be empty";

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
                    $query = "INSERT INTO products(name, description, price, image, created_on, updated_on)";
                    
                    //for date we are not sending a value but we are sending a function
                    $query .= "VALUES('{$prod_name}' ,'{$prod_desc}', '{$prod_price}','{$file_image}', '{$created_on}', '{$updated_on}')";
                    
                    //sending the query to the database
                    $create_prod_query = mysqli_query($conn, $query);

                    confirmQuery($create_prod_query);

                    //getting the id
                    $pd_id = mysqli_insert_id($conn);


                    if($create_prod_query){
                        // $statusMsg = "The file ".$file_image. " has been uploaded successfully.";
                        $statusMsg = "<p class='bg-primary' style='text-align:center;'> <span style='text-transform:capitalize; color:orange;'>{$prod_name}</span> Product was Created Sucessfully. <a href='../prod_detail.php?p_id={$pd_id}' target='_blank' style='text-transform:capitalize; color:orange;'>View Product</a> or <a href='#' target='_blank' style='text-transform:capitalize; color:orange;'> Edit Product</a></p>";
                        
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
        <div class="col-3"></div>
        <div class="col-6">
            <div>
                <h2>Add Product</h2>
            </div>

            <form method="POST" action="add_product.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text"  name="prod_name" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="body">Description</label>
                  <textarea name="prod_desc" id="body" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                  <label for="name">Price</label>
                  <input type="number"  name="prod_price" class="form-control" required>
                </div>
                
                <div class="form-group">
                  <label for="image">Upload Image</label>
                  <div class="custom-file">
                    <input type="file" name="upload_image" class="custom-file-input" id="image">
                    <label for="image" class="custom-file-label">Choose File</label>
                  </div>
                  <small class="form-text text-muted">Max Size 3mb</small>
                </div>

                <button class="btn btn-primary" type="submit" name="add_prod" >Add Product</button>
               
              </form>


        </div>
        <div class="col-3"></div>
    </div>
</div>





<?php include "../includes/footer.php"; ?>
