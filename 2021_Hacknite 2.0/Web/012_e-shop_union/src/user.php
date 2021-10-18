<?php include 'header.php'; ?>

<main class="container d-flex justify-content-center" style="margin-top: 5%;">
<?php
if($_SESSION["role"] == "admin"){
	?>
		<div class="alert alert-success" role="alert" style="margin-top:5px;"> 		
			<h4 class="alert-heading">Dobrodošao admine!</h4>
  			<p>Flag je: <?php print($_ENV["flag"]); ?> </p>
  		</div>
	<?php
	sadrzaj();
}else if(isset($_SESSION["user"])){	
	?>
	<div class="container h-40 v-30">	
		<div class="alert alert-info" role="alert" style="margin-top:5px;"> 		
			<h4 class="alert-heading">Dobrodošli <?php print($_SESSION["user"]);?>!</h4>
			<p>U sljedećoj tablici možete vidjeti što ste do sad kupili u našoj trgovini.</p>
			
  		</div>
  	</div>	
	<?php
	sadrzaj();
}

function sadrzaj(){
	$pdo = new PDO("sqlite:/var/www/db/users.db");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT rowid,naziv FROM proizvodi";
	$res = $pdo->query($sql);
	
	$sql = "SELECT * FROM povijest WHERE korisnik='".$_SESSION["user"]."'";
	$res = $pdo->query($sql);
	?>
	</main>
	<main class="container d-flex justify-content-center" style="margin-top: 5%;" >
	<table class="table table-hover">
		<thead>
		    <tr>
			<td>Naziv proizvoda</td>
			<td>Cijena</td>
		    </tr>
		</thead>
		<?php
		while($row = $res->fetch(PDO::FETCH_ASSOC)){
			$sql2 = "SELECT naziv FROM proizvodi WHERE rowid='".$row["proizvodId"]."'";
			$res2 = $pdo->query($sql2);
			$row2 = $res2->fetch(PDO::FETCH_ASSOC);
			
			echo "<tr><td>".htmlentities($row2["naziv"])."</td><td>".htmlentities($row["cijena"])."</td></tr>";
		}
	?>
	</table>
<?php }

?>


<?php include 'footer.php'; ?>
