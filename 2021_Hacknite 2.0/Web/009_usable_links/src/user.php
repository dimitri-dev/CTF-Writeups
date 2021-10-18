<?php include "header.php"; ?>
<main class="container d-flex justify-content-center" style="margin-top: 5%; width: 500px;">
<div class="col">
<?php
if($_SESSION["role"] === "admin"){
?>
	<div class="alert alert-success" role="alert" >
 		<h4 class="alert-heading">Uspjeh!</h4>
 		<p>Flag je <?php print($_ENV["flag"]);?> </p>
  	</div>

<?php
/*echo "Flag je ".$_ENV["flag"]."<br>";*/
?>
	<div class="row h-40 v-30">
	<h4> Dajte korisniku admin prava</h4>
	<hr>
		<form method="POST">
			<div class="form-group">
		    		<label class="form-label" for="form1Example13" >Korisničko ime</label>
		    		<input type="text" id="form1Example13" class="form-control" name="korisnik"/>
		  	</div>
		  	<button type="submit" class="btn  btn-block mb-4" style="background-color: #478B6F; text-weight: 550; color: white; margin-top:5px;">Daj prava</button>
		</form>
	</div>

<?php
        if(isset($_REQUEST["korisnik"])){
                $pdo = new PDO("sqlite:/var/www/db/users.db");
                $sql = "UPDATE users SET role = 'admin' WHERE username=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_REQUEST["korisnik"]]);
        }
}

?>


<?php
    if(isset($_SESSION["user"])){
?>
<!--<div class="col"> -->

<div class="row" style="width:100%;">
	<h4> Pošalji drugom korisniku neki link</h4>
	<hr>
		<form method="POST">
			<div class="form-group">
		    		<label class="form-label" for="form1Example13" style="margin-bottom:1px;">Korisnik kojem šaljete link</label>
		    		<input type="text" id="form1Example13" class="form-control" name="toUser" style="margin-bottom: 2px;"/>
		  	</div>
		  	<div class="form-group">
		    		<label class="form-label" for="form1Example13" style="margin-bottom: 1px;">URL</label>
		    		<input type="text" id="form1Example13" class="form-control" name="url"/>
		  	</div>
		  	<button type="submit" class="btn  btn-block mb-4" style="background-color: #478B6F; text-weight: 550; color: white; margin-top:5px;">Pošalji</button>
		</form>
</div>

<?php

	$pdo = new PDO("sqlite:/var/www/db/users.db");

	if(isset($_POST["url"]) && isset($_POST["toUser"]) && $_SESSION["role"]!=="admin"){

		$sql = "SELECT url FROM linkovi WHERE fromUser=? AND toUser=?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$_SESSION["user"],$_POST["toUser"]]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if($result){
		   $sql = "DELETE FROM linkovi WHERE fromUser = ? AND toUser=?";
		   $stmt = $pdo->prepare($sql);
		   $stmt->execute([$_SESSION["user"],$_POST["toUser"]]);
		}

		$sql = "INSERT INTO linkovi (url,fromUser,toUser,linkId) VALUES (?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$_POST["url"],$_SESSION["user"],$_POST["toUser"],bin2hex(random_bytes(16))]);
		?>
		
		<div class="alert alert-success" role="alert" >
	 		<h4 class="alert-heading">Uspjeh</h4>
	 		<p>Link poslan!</p>
  		</div>
		<?php
		unset($_POST["toUser"]);
	
	}?>
	<div class="row" style="margin-top:10px; margin-bottom: 20px;">
	<h4>Primljeni linkovi</h4>
	<hr>
	<form action="obrisi.php"> 
		<table class="table table-hover" style="padding-left:0;">
		<thead>
		    <tr>
			<td>Autor</td>
			<td>Link</td>
			<td>Obriši</td>
		    </tr>
		</thead>
	<?php
	
	$sql = "SELECT * FROM linkovi WHERE toUser=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$_SESSION["user"]]);
	
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

		echo "<tr><td>".htmlentities($row["fromUser"])."</td><td>"."<a class='userlink' href='".htmlentities($row["url"],ENT_QUOTES)."'>".$row["linkId"]."</a></td><td><input type='hidden' value='".$row["linkId"]."' name='linkId'><input type='submit' class='btn btn-block mb-4'value='obriši' style='background-color:#478B6F; color:white;'></td>";

	}
	
	echo "</table></form>";
?> </div></div><?php


}
?>


<?php include "footer.php"; ?>
