<?php 

include "./includes/header.php";
include "./admin/admin_header_nav.php";
include "./db.php";
include "./functions.php";

?>


<style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700");
@import url("https://fonts.googleapis.com/css?family=Lato:400,400i,700");

body {
  font-family: Lato, sans-serif;
}

.container {
  display: grid;
  grid-template-columns: 4rem 3fr 1fr 2rem;
  margin-top: 2rem;
  grid-column-gap: 2rem;
}

.header {
  grid-column: 2 / 5;
}

.heading {
  font-family: Montserrat, sans-serif;
}

.header .subheading {
  text-transform: uppercase;
  letter-spacing: 0.1rem;
  font-size: smaller;
  color: #455A64;
}

.content {
  grid-column: 2 / 3;
  text-align: justify;
  font-size: 1.1rem;
  line-height: 1.4;
}

.content .poster-image {
  width: 100%;
  object-fit: cover;
}

.aside .heading {
  margin: 0;
  font-weight: 600;
}

.footer {
  grid-column: 1 / 5;
  background-color: #37474F;
  padding: 0.7rem 1rem;
  margin-top: 3rem;
  text-align: right;
}

.footer .name-link {
  color: #FFFFFF;
  text-decoration: none;
}

@media only screen and (max-width: 600px) {
  .container {
    grid-template-columns: 2rem 3fr 1fr 2rem;
  }
  .content {
    grid-column: 2 / 4;
  }
  .aside {
    grid-column: 2 / 4;
  }
}

.card {
  height: 5rem;
  display: flex;
  align-items: center;
  text-transform: capitalize;
  margin: 1rem 0;
  cursor: pointer;
}

.card img {
  height: 100%;
  width: 40%;
  margin-right: 0.5rem;
}

.card p {
  margin: 0;
}

.card .title {
  font-size: 0.8rem;
}

.card .author {
  font-size: small;
}


</style>


<?php 

//get detailed product info
// $prod_id = $_GET['p_id'];
// echo $prod_id;

if(isset($_GET['p_id'])) {
    
    $the_prod_id = escape($_GET['p_id']);
    
}

//getting a particular product id
$query = "SELECT * FROM blog WHERE post_id = $the_prod_id ";
//
$select_post_by_id= mysqli_query($conn, $query);

//we need to values using a while loop
while($row = mysqli_fetch_assoc($select_post_by_id)) {
       //cat_categories table
       $post_id            = $row['post_id'];
       $post_author          = $row['post_author'];
       $post_title          = $row['post_title'];
       $post_content          = $row['post_content'];
       
       $post_image          = $row['post_image'];
       $post_status         = $row['post_status'];
       $post_created_on        = $row['post_created_on'];

       ?>



<div class="container" style="margin-top:10rem;">
    <div class="row">
        <div class="col-12"></div>
        
</div>

<main class="container">
  <header class="header">
    <h1 class="heading"><?php echo $post_title; ?></h1>
    <p><?php echo $post_author; ?> <span><?php echo $post_created_on; ?></span></p>
    <br>
  </header>
  <section class="content">
    <img src='./admin/uploads/images/<?php echo $post_image; ?>' alt='large-image' class="poster-image">
    <br>
    <p style="padding:10px;">
    <?php echo $post_content; ?>
    <br>
    </p>
    <?php } ?>
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

