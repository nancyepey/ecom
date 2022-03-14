


<?php 

include "./includes/header.php";
include "./admin/admin_header_nav.php";
include "./db.php";
include "./functions.php";

?>

<?php 

//get latest products
//
$query = "SELECT * FROM blog ";
//
$select_post= mysqli_query($conn, $query);



?>


<link rel="stylesheet" href="post_listing.css">

<div class="container" style="margin-top:10rem;">
    <div class="row">
        <div class="col-12"></div>
        
</div>


<main class="container">
  
  <section class="content">

  <section class="posts-listing">

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
    
    <article class="post-item">
      <a class="post-item__inner" href='./post_detail.php?p_id=<?php echo $post_id; ?>' target='_blank'>
    
        <div class="post-item__thumbnail-wrapper">
          <div class="post-item__thumbnail" style="background-image:url(image_url.jpg);"></div>
        </div>
    
        <div class="post-item__content-wrapper">
          <h2 class="post-item__title heading-size-4"><span><?php echo $post_title; ?></span></h2>
      
          
    <div class="post-item__metas">
      <time class="post-item__meta post-item__meta--date" datetime="2022-02-14T20:24:54+00:00">February 14, 2022</time>
            <p class="post-item__meta post-item__meta--category"><?php echo $post_author; ?></p>
          </div>
      
                  <div class="post-item__excerpt">
                    <?php echo $post_content; ?>
                    </div>
                    
                   
          <div class="post-item__read-more-wrapper">
            
            <p class="post-item__read-more">  Read more </p>
           
          </div>
          
      
        </div>
    
      </a>
    </article>

    <?php } ?> 
    
    
    <!-- <article class="post-item">
      <a class="post-item__inner" href="#">
    
        <div class="post-item__thumbnail-wrapper">
          <div class="post-item__thumbnail" style="background-image:url(image_url.jpg);"></div>
        </div>
    
        <div class="post-item__content-wrapper">
          <h2 class="post-item__title heading-size-4"><span>Post Example</span></h2>
      
          
    <div class="post-item__metas">
      <time class="post-item__meta post-item__meta--date" datetime="2022-01-16T21:39:21+00:00">January 16, 2022</time>
            <p class="post-item__meta post-item__meta--category">Category</p>
          </div>
      
                  <div class="post-item__excerpt">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacinia nibh id dui faucibus facilisis. Vestibulum eu bibendum ante, in mattis velit.        </div>
          
          <div class="post-item__read-more-wrapper">
            <p class="post-item__read-more">Read more</p>
          </div>
      
        </div>
    
      </a>
    </article>
    
    
    <article class="post-item">
      <a class="post-item__inner" href="#">
    
        <div class="post-item__thumbnail-wrapper">
          <div class="post-item__thumbnail" style="background-image:url(image_url.jpg);"></div>
        </div>
    
        <div class="post-item__content-wrapper">
          <h2 class="post-item__title heading-size-4"><span>Post Example</span></h2>
      
          
    <div class="post-item__metas">
      <time class="post-item__meta post-item__meta--date" datetime="2022-01-16T21:39:21+00:00">January 16, 2022</time>
            <p class="post-item__meta post-item__meta--category">Category</p>
          </div>
      
                  <div class="post-item__excerpt">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacinia nibh id dui faucibus facilisis. Vestibulum eu bibendum ante, in mattis velit.        </div>
          
          <div class="post-item__read-more-wrapper">
            <p class="post-item__read-more">Read more</p>
          </div>
      
        </div>
    
      </a>
    </article> -->

    </section>

  </section>
  <aside class="aside">
    <h4 class="heading">Other Articles you might Enjoy</h4>
    <div class="card">
      <img src='https://images.unsplash.com/photo-1457269315919-3cfc794943cd?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=2c42c1cac3092204f4c1afdca4d44e99' alt=''>
      <div>
        <p class="heading title">The big subtext</p>
        <p class="author">Mathews</p>
      </div>
    </div>
    <div class="card">
      <img src='https://images.unsplash.com/photo-1528640936814-4460bc015292?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=66812b5fda04c80ff762c8a920f562f3' alt=''>
      <div>
        <p class="heading title">The bug subtext</p>
        <p class="author">Harsha</p>
      </div>
    </div>
  </aside>
</main>




<?php include "./includes/footer.php"; ?>

