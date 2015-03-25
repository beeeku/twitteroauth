<html>
<head>
	<title>Browntape twitter search</title>
</head>
<body>
<form action="#" method="POST">
<label>Search : <input type="text" name="keyword" placeholder="Enter your keyword for search"></label>
<input type="submit">
    
</form>
<?php
require "autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;
error_reporting(0); 
ini_set("display_errors", 0); 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['keyword'])) {

$consumer_key='MY9CtdNSRsn27RgmJy7DVZHaU';
$consumer_key_secret='mVV8v1n0Nehf7nR89PMLSE2HcnujIr70sFMnWTAoCsnTPPH6QN';
$access_token = '110997110-8snVGQlpESfK6S36MZfMNivM7czQbA1atEkRQ6er';
$access_token_secret = 'pCuouR9INoSbzVIZBiSBBqyXQp5GRzMtX4tf6GGbe6ZJ3';
$connection = new TwitterOAuth($consumer_key, $consumer_key_secret, $access_token, $access_token_secret);
$statuses = $connection->get("search/tweets", array("q" => $_POST['keyword'],"count" =>"10"));

foreach ($statuses as $tweets) {
	foreach ($tweets as $t) {
		echo '<img src="'.$t->user->profile_image_url.'"/>'.$t->text.'<br>';
	}
	
}
}
?>
</body>
</html>
