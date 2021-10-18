<?php

class FileAccess {
	private $filename;
	function set_filename($filename){
		$this->filename=$filename;
	}
	function get_file(){
		return file_get_contents($this->filename);
	}
}


if (!isset($_COOKIE["message"])) {
	$defaultFileAccess = new FileAccess();
	$defaultFileAccess->set_filename("/usr/local/default.txt");
	setcookie("message", base64_encode(serialize($defaultFileAccess)), [ "path" => $_SERVER["REQUEST_URI"] ]);
}


?><!doctype html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
		<title>Tajne informacije</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e0efe7">
			<div class="container-fluid">
		    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		      			<span class="navbar-toggler-icon"></span>
		    		</button>
		    		<a class="navbar-brand" href="#">Jako sigurna stranica</a>
		    		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		      			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
			  				<a class="nav-link active" aria-current="page" href="index.php">Početna</a>
						</li>
						<li class="nav-item">
						  	<a class="nav-link" href="evenmoresecure.php">Flag</a>
						</li>
		      			</ul>
		      
		    		</div>
		  	</div>
		</nav>
