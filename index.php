<?php session_start(); ?>
<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <title>Ghibli Store</title>
        <meta charset='utf-8'/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&family=Work+Sans"/>
        <link rel="stylesheet" href="styles.css"/>
    </head>
    <body>
        <?php 
        include('header.php');
        ?>
        <section id="banner">
            <img src="./assets/Studio_Ghibli_Logo.jpg" alt="Ghibli_pic"/>
        <?php
        if(!$_SESSION['username']){
            echo "<p style='font-size:25px'>You did not login, please <a href='login.php'>login</a> or <a href='registration.php'>register</a></p>.";
        }else{
            $user_name = $_SESSION['username'];
            echo "<p style='font-size:25px'> Welcome $user_name</p>";
        }
        ?>
            <h1>Design your own accessories with Ghibli style</h1>
        </section>
        <section id="about-us">
            <h2 class="center">About us</h2>
            <div id="about-us-info">
                <p style="margin:20px">We provide Ghibli fans with treasures printed on our amazing products </p>
            </div>
        </section>
        <section id="design-options">
            <h2>How to design your items?</h2>
            <div class="break"></div>
            <div class="row">
                <div class="col-3">
                    <a href='./movies.php'>
                    <h3>Choose images</h3>
                    <i class="fa-solid fa-film"></i>
                    </a>
                </div>
                <div class="col-2" style="align-items: center">Then</div>
                <div class="col-3">
                    <a href='./products.php'>
                    <h3>Choose products</h3>
                    <i class="fa-solid fa-shirt"></i>
                    </a>
                </div>
            </div>
        </section>
        <div class="break"></div>
        <section id="community">
            <h2>Search for other animes</h2>
        </section>
    </body>
</html>
