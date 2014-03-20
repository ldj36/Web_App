<?php
	$title = "Tools - Developers";
	require "structures/header.php";
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li class="active">Developers</li>
	</ul>
	
	<div class="page-header">
		<h2>Developers</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span3">
			<center>
				<img class="img-circle" src="img/chart.png" style="margin-bottom: 10px;">
				<h4>Graphs and Charts</h4>
				<p>Make nice looking graphs and charts and get the HTML code.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="graphs-and-charts.php">Open this tool &raquo;</a></p>
			</center>
		</div>
		<div class="span3">
			<center>
				<img class="img-circle" src="img/resource.png" style="margin-bottom: 10px;">
				<h4>Script Resources</h4>
				<p>Tons of resources, like jQuery, for fast web deployment.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="script-resources.php">Open this tool &raquo;</a></p>
			</center>
		</div>
		<div class="span3">
			<center>
				<img class="img-circle" src="img/editor.png" style="margin-bottom: 10px;">
				<h4>Live HTML Editor</h4>
				<p>Develop HTML applications with a live editor.</p>
				<p style="margin-top: 20px;"><a class="btn btn-info" href="live-html-editor.php">Open this tool &raquo;</a></p>
			</center>
		</div>
	</div>
</div>

<?php
	require "structures/footer.php";
?>
