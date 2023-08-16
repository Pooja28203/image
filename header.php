<!DOCTYPE html>
<html lang="en">
<head>
<title>Un - Image Generator</title>
<meta name="title" content="Un - Image Generator">
<meta name="description" content="Image Generator for Product Details">

<meta property="og:url" content="https://www.unforus.com/">
<meta property="og:type" content="website">
<meta property="og:title" content="Un - Image Generator">
<meta property="og:description" content="Image Generator for Product Details">
<meta property="og:image" content="assets/images/un-logo.svg">

<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="unforus.com">
<meta property="twitter:url" content="https://www.unforus.com/">
<meta name="twitter:title" content="Un - Image Generator">
<meta name="twitter:description" content="Image Generator for Product Details">
<meta name="twitter:image" content="assets/images/un-logo.svg">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta charset="ISO-8859-1">
<meta http-equiv="Cache-control" content="public">

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.typekit.net/cer7esj.css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />

<?php include "includes/config.php"; ?>

<?php

$link = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
// echo $link;

?>

</head>
<body>
<!-- Earth Aroma [Start] -->

<!-- Header [Start] -->
<header class="header container-fluid">
	<div class="row no-gutters align-items-center wrap">
		<div class="col-9 col-sm-5 title">
			<h2>un. <span>the sustainable fashion allegiance.</span></h2>
		</div>
		<div class="col-3 col-sm-2 logo">
			<a href="index.php"><img src="assets/images/un-logo.svg" alt="Un. The sustainable fashion allegiance." /></a>
		</div>
		<div class="col-12 col-sm-5 menu">
			
			<?php 
			session_start ();
			if(!isset($_SESSION["login"])) {
				if (stripos($_SERVER['REQUEST_URI'], 'login.php')){
				    echo "<a href='login.php' style='display: none;'>Log In</a>";
				}
				else{
				    echo "<a href='login.php'>Log In</a>";
				}
			} else {
				echo "<p>Welcome! <a href='logout.php'>Log Out</a></p>";
			}
			?>
		</div>
	</div>
</header>
<!-- Header [End] -->