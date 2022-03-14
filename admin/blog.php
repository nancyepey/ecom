<?php 

include "../includes/header.php";
include "./admin_header_nav.php";
include "../db.php";
include "../functions.php";

?>


<?php 

//get latest products
//
$query = "SELECT * FROM blog ORDER BY post_id DESC LIMIT 2 ";
//
$select_post= mysqli_query($conn, $query);



?>

<!-- <?php ?> -->

<div class="container" style="margin-top:10rem;">
    <div class="row">
        <div class="col-12"></div>
        
</div>

<!--style.css-->
<link rel="stylesheet" href="../blog.css">


		<!--blog start -->
		<section id="blog" class="blog">
			<div class="container">
				<div class="section-header">
				
				</div><!--/.section-header-->
				<div class="blog-content">
				
					<div class="row">
						<div class="col-10">

						<?php

						//we need to values using a while loop
						while($row = mysqli_fetch_assoc($select_post)) {
							//cat_categories table
							$post_id            = $row['post_id'];
							$post_author          = $row['post_author'];
							$post_title          = $row['post_title'];
							$post_content          = $row['post_content'];
							
							$post_image          = $row['post_image'];
							$post_status         = $row['post_status'];
							$post_created_on        = $row['post_created_on'];

							// echo $prod_name;
							$post_content = substr($row['post_content'], 0,100);



						?>
					
						<div class="col-sm-4">
							<div class="single-blog">
								<div class="single-blog-img">
									<img src="assets/images/blog/b1.jpg" alt="blog image">
									<div class="single-blog-img-overlay"></div>
								</div>
								<div class="single-blog-txt">
									<h2><a href="#" id="single-blog-txt-link"><?php echo $post_title; ?></a></h2>
									<h3>By <a href='../post_detail.php?p_id={$post_id}' target='_blank'><?php echo $post_author; ?></a> / 18th March 2021</h3>
									<p>
									<?php echo $post_content; ?>...
									</p>
								</div>
							</div>
							
						</div>
						<?php } ?> 
						<div class="col-sm-4"></div>

						</div>
												
						
						<div class="col-2">
							<div class="search-container">
								<form action="/action_page.php">
									<input type="text" placeholder="Search.." name="search">
									<button type="submit">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->
			
		</section><!--/.blog-->
		<!--blog end -->






<?php include "../includes/footer.php"; ?>

