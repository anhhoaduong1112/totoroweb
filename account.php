<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Your account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<?php
    require('db.php');
    include('header.php');
?>

<div style="height:5rem"></div>
<?php
    if (!$_SESSION['userid']){
        include('login.php');
    }
    else{
    echo "
    <div style='height:5rem'></div>
    <h2>Your cart</h2>";
    $user_id = $_SESSION['userid'];
    $username = $_SESSION['username'];
    $cart_query = "SELECT t0.*,t1.img_src AS movie_img_src, t2.img_src AS product_img_src, t2.price
                    FROM c2224779_Ghibliweb.cart t0
                    LEFT JOIN movie_img t1 ON t0.movie_img_id = t1.id
                    LEFT JOIN products t2 ON t0.product_id = t2.id
                    LEFT JOIN users t3 ON t0.user_id = t3.id                    
                    WHERE t0.user_id = $user_id";
    $cart_query_res = $connection->query($cart_query);
    while ($cart_line = $cart_query_res-> fetch_assoc()){
        echo "
        <form class='cart-select' method='post'>
        <div class='cart-grid'>
            <div><img class='movie-img' src=$cart_line[movie_img_src]></div>
            <div><img class='movie-img' src=$cart_line[product_img_src]></div>
            <div>
                <span>Price: &pound;$cart_line[price]</span><br/>
                <input type='submit' name='remove$cart_line[id]' value='Remove' class='btn btn-danger'/>
            </div>
        </div>
        <div class='break'></div>
        </form>";
        if($_POST["remove$cart_line[id]"]) {
            $connection->query("DELETE FROM c2224779_Ghibliweb.cart WHERE id=$cart_line[id]");
            header("Refresh:0");}
    };
    echo "<form method='post'>
    <input type='submit' name='purchase' value='Confirm and Payment' class='btn btn-success'/>
    </form>";
    if($_POST['purchase']) {
        $last_order_no = $connection->query("SELECT IFNULL((SELECT MAX(order_no) FROM c2224779_Ghibliweb.orders),0)")->fetch_all()[0][0]+1;
        $order_value = $connection->query("SELECT SUM(products.price) FROM c2224779_Ghibliweb.cart LEFT JOIN products ON products.id = cart.product_id WHERE user_id = $user_id;")->fetch_all()[0][0];
        if($connection->query(
            "INSERT INTO c2224779_Ghibliweb.order_item(order_no, user_id,product_id, movie_img_id)
            SELECT $last_order_no, $user_id, product_id, movie_img_id FROM c2224779_Ghibliweb.cart WHERE user_id = $user_id;
            ") === true){
        echo "Your order is successfully recorded, total amount to pay is &pound; $order_value ";
      } else {
        echo "Error: " .$connection->error;};

        $connection->query("DELETE FROM c2224779_Ghibliweb.cart WHERE user_id = $user_id");
      };
    };

?>
</body>
</html>