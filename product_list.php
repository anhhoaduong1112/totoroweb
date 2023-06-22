<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Select your wears </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
    <div style="height:5rem"></div>
    <h2>Our products</h2>
    <?php
    require('db.php');
    $product_list = $connection-> query("SELECT item, price, img_src FROM c2224779_Ghibliweb.products");
    echo "<div id='product-list-grid'>";
        while ($product_info = $product_list-> fetch_assoc()){
            echo "
            <div>
                <img src=$product_info[img_src] class='product-img-small'/><br>
                <span style='color:gray'><p>$product_info[item]: &pound;$product_info[price]</p><span>
            </div>";
        }
    echo "</div>";
    ?>
</body>