<?php 

include "./includes/header.php";
include "./admin/admin_header_nav.php";
include "./db.php";
include "./functions.php";

?>


<?php 

//get latest products
//
// $query = "SELECT * FROM products ORDER BY id DESC LIMIT 4 ";
$query = "SELECT * FROM products ";
//
$select_4_prod= mysqli_query($conn, $query);



?>

<!-- <?php ?> -->

<div class="container" style="margin-top:10rem;">
    <div class="row">
        <div class="col-12"></div>
        
</div>



<!--new-arrivals start -->
<section id="new-arrivals" class="new-arrivals">
			<div class="container">
				<div class="section-header">
					<h2>new arrivals</h2>
				</div><!--/.section-header-->
				<div class="new-arrivals-content">
					<div class="row">
					<?php

					//we need to values using a while loop
					while($row = mysqli_fetch_assoc($select_4_prod)) {
						//cat_categories table
						$prod_id            = $row['id'];
						$prod_name          = $row['name'];
						
						$prod_desc          = $row['description'];
						$prod_price         = $row['price'];
						$prod_image        = $row['image'];

						// echo $prod_name;

					

					 ?>
						<div class="col-md-3 col-sm-4">
							<div class="single-new-arrival">
								<div class="single-new-arrival-bg">
									<img src="admin/uploads/images/<?php echo $prod_image; ?>" alt="new-arrivals images">
									<div class="single-new-arrival-bg-overlay"></div>
									<div class="sale bg-1">
										<p>sale</p>
									</div>
									<div class="new-arrival-cart">
										<p>
											<span class="lnr lnr-cart"></span>
											<a href="#">add <span>to </span> cart</a>
										</p>
										<p class="arrival-review pull-right">
											<span class="lnr lnr-heart"></span>
											<span class="lnr lnr-frame-expand"></span>
										</p>
									</div>
								</div>
								<h4><a target="_blank" href='./prod_detail.php?p_id=<?php echo $prod_id; ?>'><?php echo $prod_name; ?></a></h4>
								<p class="arrival-product-price">$<?php echo $prod_price; ?></p>
							</div>
						</div>
						<?php } ?> 
						
					</div>
				</div>
			</div><!--/.container-->
		
		</section><!--/.new-arrivals-->
		<!--new-arrivals end -->




<?php 



?>

<?php include "./includes/footer.php"; ?>