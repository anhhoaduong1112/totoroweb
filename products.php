<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Select your items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<?php
    require('db.php');
    include('header.php');
    include('product_list.php');
?>
<div style="height:5rem"></div>
<h2>Please select products for images of your choice</h2>
<div>
<?php
echo "<form class='img-select' method='post'>";
foreach ($_SESSION['selected_images'] as $img_id){
    $selected_img = $connection->query("SELECT * FROM c2224779_Ghibliweb.movie_img WHERE id=$img_id")-> fetch_assoc();
    echo "
    <div class='product-select' id='selected_img_$selected_img[id]'>
        <div></div>
        <div class='movie-intro'>
            <img src='$selected_img[img_src]' class='movie-img'/>  
        </div> ";
    echo "
        <div id='selectedImgSlide$selected_img[id]' class='slideshow-container-product'>
        <a class='prev' onclick=\"slideMoveProduct(-1, 'selectedImgSlide$selected_img[id]')\">&#10094;</a>";
        $sql_products = $connection->query("SELECT * FROM c2224779_Ghibliweb.products");
        while ($product = $sql_products-> fetch_assoc()){
            echo "
            <div class='slide-item'>
                    <img class='movie-img' src='$product[img_src]'/>
                    <span>Select</span>
                    <input type='checkbox' name='selected_items[]' value='$selected_img[id]_$product[id]' >
            </div>
            ";};

    echo "
        <a class='next' onclick=\"slideMoveProduct(1, 'selectedImgSlide$selected_img[id]')\">&#10095;</a>
        </div>
    </div>";
};
echo "<input type='submit' value='Select products' class='btn btn-success'/>
<span>and</span>
<a href='account.php' class='btn btn-info'>Continue</a>";
echo "</form>";
$selected_items = $_POST['selected_items'];
foreach ($selected_items as $selected_item){
    $img_product_item = explode('_', $selected_item);
    $img_id_to_cart = (int)$img_product_item[0];
    $product_id_to_cart = (int)$img_product_item[1];
    $user_id = $_SESSION['userid'];
    $update_cart_query = "INSERT INTO c2224779_Ghibliweb.cart(movie_img_id, product_id, user_id) VALUES($img_id_to_cart,$product_id_to_cart,$user_id)"; 
    if ($connection->query($update_cart_query) == true) {
      } else {
        echo "Error: " .$connection->error;}
};
$_SESSION['img_items'] = $img_items;
?>
<script src='scripts.js'></script>
</div>
</body>

</html>



