<?php
	$title = "Tools - Lookups";
	require "structures/header.php";
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li class="active">Lookups</li>
	</ul>
	
	<div class="page-header">
		<h2>Lookups</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span3">
			<center>
				<img class="img-circle" src="img/people.png" style="margin-bottom: 10px;">
				<h4>Whois Lookup</h4>
				<p>Find out who owns a domain name, and how to get in touch with them.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="whois-lookup.php">Open this tool &raquo;</a></p>
			</center>
		</div>
		<div class="span3">
			<center>
				<img class="img-circle" src="img/doc.png" style="margin-bottom: 10px;">
				<h4>HTTP Header Lookup</h4>
				<p>Determine the headers of a webpage and check them.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="http-header-lookup.php">Open this tool &raquo;</a></p>
			</center>
		</div>
	</div>
</div>

<?php
	require "structures/footer.php";
?>
