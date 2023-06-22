<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Ghibli movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"/>
    <!-- <script src='scripts.js'></script> -->
</head>
<body>
<?php
    require('db.php');
    include('header.php');
    $sql_movie = "SELECT id, movie_name FROM c2224779_Ghibliweb.movies";
    $result_movie = $connection->query($sql_movie);
?>

<div style="height:5rem"></div>
<div>
<?php
echo "<form class='img-select' method='post'>";
while($row_movie = $result_movie->fetch_assoc()){
    $sql_img = "SELECT id, img_src FROM c2224779_Ghibliweb.movie_img WHERE movie_id = $row_movie[id]";
    $result_img = $connection->query($sql_img);
    echo "
    <div class='movie-select' id='movie_$row_movie[id]'>
        <div></div>
        <div class='movie-intro'>
            <h2>$row_movie[movie_name]</h2>  
        </div> ";
    echo "
        <div id='movieSlide$row_movie[id]' class='slideshow-container-movie'>
        <a class='prev' onclick=\"slideMoveMovie(-1, 'movieSlide$row_movie[id]')\">&#10094;</a>";
    while ($row_img = $result_img-> fetch_assoc()){
        echo "
        <div class='slide-item'>
                <img class='movie-img' src='$row_img[img_src]'/>
                <span>Select</span>
                <input type='checkbox' name='selected_img[]' value='$row_img[id]' >
        </div>
        ";}

    echo "
        <a class='next' onclick=\"slideMoveMovie(1, 'movieSlide$row_movie[id]')\">&#10095;</a>
        </div>
    </div>";
};
echo "<input type='submit' value='Select images' class='btn btn-success'/>
<span>and</span>
<a href='products.php' class='btn btn-info'>Continue</a>";
echo "</form>";
$selected_images = $_POST['selected_img'];
$_SESSION['selected_images'] = $selected_images;    
?> 

</div>
<script src='scripts.js'></script>
</body>
</html>
