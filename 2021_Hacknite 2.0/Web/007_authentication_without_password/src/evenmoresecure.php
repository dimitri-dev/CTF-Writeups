<?php

/*ovdje dio stranice*/
include "header.php";
if ($_COOKIE["message"]) {
?>
<main class="container d-flex justify-content-center" style="margin-top: 5%; width: 700px;">
	<div class="alert alert-info" role="alert" style="margin-top:5px; width:100%;">
  					<h4 class="alert-heading">Informacija</h4>
  					<p><?php print(unserialize(base64_decode($_COOKIE["message"]))->get_file());?></p>
  	</div>
<?php
}

?>

<?php include "footer.php";?>
