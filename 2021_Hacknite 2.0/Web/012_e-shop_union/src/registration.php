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
	  	<button type="submit" class="btn  btn-block mb-4" style="background-color: #478B6F; text-weight: 550; color: white; margin-top: 5px">Registriraj se</button>
	</form>

</div>

	<?php
		if(isset($_POST["username"]) && isset($_POST["password"])){
			
			$username = $_POST["username"];
			$password = $_POST["password"];
			if(strlen($username)<10){
			?>
			<div class="alert alert-warning" role="alert" >
  				<h4 class="alert-heading">Greška!</h4>
  				<p>Korisničko ime mora imati barem 10 znakova </p>
  	  		</div>
			
			<?php
				die();
			}
			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);
			$specialChars = preg_match('@[^\w]@', $password);

			if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 10) {
				?>
				<div class="alert alert-warning" role="alert">
	  				<h4 class="alert-heading">Greška!</h4>
	  				<p>Lozinka mora sadržavati barem 10 znakova, jedan broj, jedno veliko slovo, jedno malo slovo i jedan specijalni znak </p>
	  	  		</div>
				
				<?php
				die();
			}
			$pdo = new PDO("sqlite:/var/www/db/users.db");
			$sql = "SELECT username FROM users WHERE username= ?";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$username]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!$result){
				$sql = "INSERT INTO users (username,password,role) VALUES (?,?,?)";
				$stmt = $pdo->prepare($sql);
				$stmt->execute([$username,hash("sha256",$password),"user"]);
				?>
				<div class="alert alert-success" role="alert" >
	  				<h4 class="alert-heading">Uspjeh!</h4>
	  				<p>Korisnik je uspješno registriran</p>
	  	  		</div>
				
				<?php
			}
			else{
				?>
				<div class="alert alert-warning" role="alert" >
	  				<h4 class="alert-heading">Greška!</h4>
	  				<p>Korisnik sa upisanim korisničkim imenom već postoji </p>
	  	  		</div>
				
				<?php
				
				die();

			}
		}
	?>
<?php include "footer.php" ?>
