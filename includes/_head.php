<?php
	require_once '_DB-connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>The Daily Spoon</title>

	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
	<link rel="icon" href="/img/chef-min.png">


</head>
<body>
	<section id="header-js" class="header flex-container">
		<a href="/index.php">
			<div class="header__logo logo-zone flex-container">
				<img class="logo-zone__img" src="/img/chef-min.png">
				<h1 class="logo-zone__header">THE <b>DAILY</b> SPOON</h1>
			</div>
		</a>
		<nav>
			<ul class="nav-list flex-container">
				<li id="search-button-js" ><a class="nav-list__item">Search</a></li>
				<!--<li><a class="nav-list__item" href="">Browse</a></li>-->
				<!--<li><a class="nav-list__item nav-list__item--active" href="">Dashboard</a></li>-->
			</ul>
			
		</nav>
		<div class="header__hamburger hamburger">
			<!--<svg></svg>-->
			<img class="hamburger__img" src="http://via.placeholder.com/60x60">	
		</div>
	</section>
	<section class="search" id="search-js">
		<form class="search__form" action="/templates/search.php">
			<input id="search__input-js" class="search__input" type="text" name="search" placeholder="Search...">
			<button class="search__submit button">
				Submit
			</button>
		</form>
	</section>