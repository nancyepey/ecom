<?php 

include "./includes/header.php";
include "./admin/admin_header_nav.php";
include "./db.php";
include "./functions.php";

?>

<!--style.css-->
<link rel="stylesheet" href="./prodDetails.css">


<?php 

//get detailed product info
// $prod_id = $_GET['p_id'];
// echo $prod_id;

if(isset($_GET['p_id'])) {
    
    $the_prod_id = escape($_GET['p_id']);
    
}

//getting a particular product id
$query = "SELECT * FROM products WHERE id = $the_prod_id ";
//
$select_prod_by_id= mysqli_query($conn, $query);

//we need to values using a while loop
while($row = mysqli_fetch_assoc($select_prod_by_id)) {
       //cat_categories table
       $prod_id            = $row['id'];
       $prod_name          = $row['name'];
       
       $prod_desc          = $row['description'];
       $prod_price         = $row['price'];
       $prod_image        = $row['image'];

       ?>


<div class="single-slide-item slide1">
	<div class="container">
		<div class="welcome-hero-content">
			<div class="row">
                <div class="col-sm-5">
					<div class="single-welcome-hero">
						<div class="welcome-hero-img">
							<img src="./admin/uploads/images/<?php echo $prod_image; ?>"  style="max-width: 100%;" width="250" height="200" alt="slider image">
						</div><!--/.welcome-hero-txt-->
					</div><!--/.single-welcome-hero-->
				</div><!--/.col-->
				<div class="col-sm-7">
					<div class="single-welcome-hero">
						<div class="welcome-hero-txt">
													
							<h2><?php echo $prod_name; ?></h2>
							<p>
                                <?php echo $prod_desc; ?> 
							</p>
							<div class="h2">
                                $<?php echo $prod_price; ?>
                            </div>
                            <?php } ?>
							<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
								BUY NOW
							</button>
						</div><!--/.welcome-hero-txt-->
					</div><!--/.single-welcome-hero-->
				</div><!--/.col-->
										
			</div><!--/.row-->
		</div><!--/.welcome-hero-content-->
	</div><!-- /.container-->
</div><!-- /.single-slide-item-->





<?php include "./includes/footer.php"; ?>