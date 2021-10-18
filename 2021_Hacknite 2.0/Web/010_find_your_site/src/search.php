<?php include "header.php"; ?>
<main class="container d-flex justify-content-center" style="margin-top: 5%; width: 500px;">
<div class="col">
<div class="row" style="margin-bottom:15px; padding-bottom:100px;">
<h4> Ovdje se mogu pronaći linkovi na zanimljive stranice koje sam našao</h4>
<hr>
<form>
Pretraži <input type="search" name="query"> <input type="submit" value="Traži">
</form>
</div>
<?php
if(isset($_GET["query"])){
	echo"<div class='row' style='margin-top:15px;'>"; 
    echo "<h4>Rezultati pretraživanja za ".$_GET["query"]."</h4><br>";
    $pdo = new PDO("sqlite:/var/www/db/users.db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM zanimljiveStranice WHERE naslov LIKE :query";
    $stmt = $pdo->prepare($sql);
    $str = "%".$_GET["query"]."%";
    $stmt->bindValue(':query',$str,PDO::PARAM_STR);
    $stmt->execute();
?>
<?php echo "<table class='table table-hover' style='padding-left:0; margin-bottom:7px;'>"; ?>
     <?php echo "<thead>"; ?>
	<?php echo "<tr>"; ?>
	    <?php echo" <td>Stranica</td>"; ?>
	<?php echo "</tr>"; ?>
    <?php echo" </thead>"; ?>


<?php
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr><tr><td><a href='".$row["url"]."'>".$row["naslov"]."</a></td></tr>";
     }
     echo "</div>";
}

?>
</div>
<?php include "footer.php"; ?>
