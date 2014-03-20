<?php
	$title = "Tools - Security";
	require "structures/header.php";
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li class="active">Security</li>
	</ul>
	
	<div class="page-header">
		<h2>Security</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span3">
			<center>
				<img class="img-circle" src="img/key.png" style="margin-bottom: 10px;">
				<h4>Password Generator</h4>
				<p>Create advanced passwords to protect your data from others.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="password-generator.php">Open this tool &raquo;</a></p>
			</center>
		</div>
		<div class="span3">
			<center>
				<img class="img-circle" src="img/hash.png" style="margin-bottom: 10px;">
				<h4>Hash Generator</h4>
				<p>Encrypt text using advanced and secure methods to protect it.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="hash-generator.php">Open this tool &raquo;</a></p>
			</center>
		</div>
	</div>
</div>

<?php
	require "structures/footer.php";
?>