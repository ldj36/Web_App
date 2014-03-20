<?php
	$title = "Tools - Miscellaneous";
	require "structures/header.php";
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li class="active">Miscellaneous</li>
	</ul>
	
	<div class="page-header">
		<h2>Miscellaneous</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span3">
			<center>
				<img src="img/paypal.png" style="margin-bottom: 10px;">
				<h4>PayPal Generator</h4>
				<p>Generate PayPal forms on the go, no account needed.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="paypal-generator.php">Open this tool &raquo;</a></p>
			</center>
		</div>
		<div class="span3">
			<center>
				<img class="img-circle" src="img/mapimg.png" style="margin-bottom: 10px;">
				<h4>Map Image Generator</h4>
				<p>Turn an address into a beautiful map image.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="map-image-generator.php">Open this tool &raquo;</a></p>
			</center>
		</div>
	</div>
</div>

<?php
	require "structures/footer.php";
?>
