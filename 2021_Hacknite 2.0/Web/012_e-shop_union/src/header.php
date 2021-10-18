<?php session_start(); ?>
<!doctype html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
		<title>e-Trgovina</title>
	
	</head>
	<body>
		<nav class="navbar navbar-expand navbar-dark" style="background-color: #478B6F ">
			<a class="navbar-brand" href="index.php" style="color:white; font-size:35px; margin-left: 5px;">e-Trgovina</a>
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="/index.php" style="color:white;">Početna stranica</a></li>
				<?php 
				if(!isset($_SESSION["user"])){
					echo '<li class="nav-item"><a class="nav-link" href="/registration.php" style="color:white;">Registracija</a></li>';
				}
				
				if(!isset($_SESSION["user"])){
					echo '<li class="nav-item"><a class="nav-link" href="/login.php" style="color:white;">Login</a></li>';
				}
				else{

					echo '<li class="nav-item"><a class="nav-link" href="/logout.php" stye="color:white;">Logout</a></li>';
				}
?>
			</ul>
		</nav>
		

