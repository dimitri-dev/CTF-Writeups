<?php include "header.php" ?>

<main class="container" style="margin-top: 30px;">
<div class="container py-5 h-40 v-30">

	<form method="POST">
		<div class="form-group">
	    		<label class="form-label" for="form1Example13" >Korisničko ime</label>
	    		<input type="text" id="form1Example13" class="form-control" name="username"/>
	  	</div>
	  	<div class="form-group">
	    		<label class="form-label" for="form1Example13">Lozinka</label>
	    		<input type="password" id="form1Example13" name="password" class="form-control" />
	  	</div>
	  	<button type="submit" class="btn  btn-block mb-4" style="background-color: #478B6F; text-weight: 550; color: white; margin-top:5px;">Ulogiraj se</button>
	</form>
</div>
<?php
	  if(isset($_POST["username"]) && isset($_POST["password"])){
		$loggedIn=0;
		$username = $_POST["username"];
		$password = $_POST["password"];
		$pdo = new PDO("sqlite:/var/www/db/users.db");
		$sql = "SELECT * FROM users WHERE username = ?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$username]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result){
			if(hash_equals(hash("sha256",$password),$result["password"])){
				$_SESSION["user"] = $result["username"];
				if($result["role"] === "admin"){
					$_SESSION["role"] = "admin";
				}
				else{
					$_SESSION["role"] = "user";
				}
			        $loggedIn = 1;
			}
			else{
			?>
			<div class="alert alert-danger" role="alert" >
  				<h4 class="alert-heading">Greška!</h4>
  				<p>Krivo korisničko ime ili lozinka </p>
  	  		</div>
			
			<?php
			die();
				
			}
		}
		else{
			?>
			<div class="alert alert-danger" role="alert" >
  				<h4 class="alert-heading">Greška!</h4>
  				<p>Krivo korisničko ime ili lozinka </p>
  	  		</div>
			
			<?php
			die();	
		}
	  }
?>
	
<?php
if($loggedIn){
?>
		<div class="alert alert-success" role="alert" >
  			<h4 class="alert-heading">Uspjeh!</h4>
  			<p>Uspješno ste se prijavili. </p>
  			<a href='user.php'>Kliknite za nastavak</a>
  		</div>
			<?php
	
}
?>
<?php include "footer.php"; ?>

