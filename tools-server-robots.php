<?php
	$title = "Tools - Server & Robots";
	require "structures/header.php";
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li class="active">Server & Robots</li>
	</ul>
	
	<div class="page-header">
		<h2>Server & Robots</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span3">
			<center>
				<img class="img-circle" src="img/settings.png" style="margin-bottom: 10px;">
				<h4>Htaccess Generator</h4>
				<p>Build and manage your own htaccess file for Apache servers.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="htaccess-generator.php">Open this tool &raquo;</a></p>
			</center>
		</div>
		<div class="span3">
			<center>
				<img class="img-circle" src="img/robots.png" style="margin-bottom: 10px;">
				<h4>Robots.txt Generator</h4>
				<p>Build and manage a robots.txt file to direct crawlers.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="robots-txt-generator.php">Open this tool &raquo;</a></p>
			</center>
		</div>
		<div class="span3">
			<center>
				<img class="img-circle" src="img/map.png" style="margin-bottom: 10px;">
				<h4>Sitemap Generator</h4>
				<p>Build and manage a sitemap.xml file to direct robots.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="sitemap-generator.php">Open this tool &raquo;</a></p>
			</center>
		</div>
		<div class="span3">
			<center>
				<img class="img-circle" src="img/robot.png" style="margin-bottom: 10px;">
				<h4>Robot Mode</h4>
				<p>See your website how a robot or crawler would see it.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="robot-mode.php">Open this tool &raquo;</a></p>
			</center>
		</div>
	</div>
	
	<div class="row" style="margin-left: 0px; margin-top: 40px;">
		<div class="span3">
			<center>
				<img class="img-circle" src="img/meter.png" style="margin-bottom: 10px;">
				<h4>Speed Test</h4>
				<p>How fast does your site load to the entire world?</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="speed-test.php">Open this tool &raquo;</a></p>
			</center>
		</div>
	</div>
	
</div>

<?php
	require "structures/footer.php";
?>