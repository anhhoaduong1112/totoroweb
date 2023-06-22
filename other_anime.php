<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Read about top animes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<div style="height:5rem"></div>
<form method='POST'>
    <div class="row">
    <label class='col-2' for='search'>Anime keywords:</label>
    <input class='col-4' type='text' id='search' name='search'/>
    </div>
    <br>
    <div class="row">
    <label class='col-2' for='genres'>Genres:</label>
    <input class='col-4' type='text' id='genres' name='genres'/><br/>
    </div>
    <br>
    <div class="row">
    <div class='col-2'></div>
    <div class='col-4'><input class='col-4' type='submit' value='Search' class='btn btn-success'/></div>
    </div>
</form>
<div class="break"></div>
<h2>Top 5 animes you are searching for</h2>
<div class="break"></div>
<?php
    require('db.php');
    include('header.php');
    $search = $_POST['search'];
    $genres = $_POST['genres'];
$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_URL => "https://anime-db.p.rapidapi.com/anime?page=1&size=5&search=$search&genres=$genres&sortBy=ranking&sortOrder=asc",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: anime-db.p.rapidapi.com",
		"X-RapidAPI-Key: 41a680978emsh192c796ea7f52cep1fd298jsn703e607eae4b"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
echo "
<div class='anime-grid'>
    <div> Title </div>
    <div> Ranking </div>
    <div> Image </div>
    <div> Sypnosis </div>
</div>";
if ($err) {
	echo "cURL Error #:" . $err;
} else {
    foreach(json_decode($response,true) as $item){
        for ($x = 0; $x < 5; $x++){
        $item0 = $item[$x];
        echo "<div class='anime-grid'>
        <div>$item0[title]</div>
        <div>$item0[ranking]</div>
        <div><img src='$item0[image]' class='movie-img'></div>
        <div>$item0[synopsis]</div>
        </div>";};
    echo "<div style='height: 5rem'></div>";}
}
?>
</body>
</html>