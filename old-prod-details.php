


<section id="detail-prod" class="detail-prod">
    <div class="container">
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6 " id="pd-detail">
                <div class="prod-detail-img">
                        <div class="img">
                            <!--  -->
                            <img src="./admin/uploads/images/<?php echo $prod_image; ?>" style="max-width: 100%;" width="900" height="600" alt="populer-products images">
                        </div>
                        
                </div>
                <!-- Product Description -->
                <div class="product-description">
                    
                    <h1><?php echo $prod_name; ?></h1>
                    <p>
                        <?php echo $prod_desc; ?>
                    </p>
                    <br>

                    <div class="h2">
                    <?php echo $prod_price; ?>
                    </div>

                     
                    <?php } ?>


                    <button class="" onclick="window.location.href='#'">
                        BUY NOW
				    </button>
                </div>

				
                                                
            </div>
        </div>
    </div>
</section>
