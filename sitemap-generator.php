<?php
	$title = "Sitemap Generator - Server & Robots";
	require "structures/header.php";
	
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-server-robots.php">Server & Robots</a> <span class="divider">/</span></li>
		<li class="active">Sitemap Generator</li>
	</ul>
	
	<div class="page-header">
		<h2>Sitemap Generator</h2>
	</div>
	
	<form action="sitemap-generator-dl.php" method="POST">
		<input type="hidden" name="go" value="1">
		
		<div class="alert alert-info">
			<strong>Caution!</strong> This script is designed to free memory as it uses it. However, be cautious that larger websites can take a long time to generate and can use a large sum of memory.
		</div>
		
		<div class="row" style="margin-left: 0px;">
			<div class="span9">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#basic" data-toggle="tab">Basic</a></li>
						<li><a href="#advanced" data-toggle="tab">Advanced</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="basic">
							<table class="table table-striped">
								<tbody>
									<tr>
										<td class="valign-middle">Website URL</td>
										<td>
											<input type="text" name="url" placeholder="http://www.example.com/" class="span11">
										</td>
									</tr>
									<tr>
										<td class="valign-middle">Update Frequency</td>
										<td>
											<select name="frequency" class="span11">
												<option value="daily">Daily</option>
												<option value="weekly">Weekly</option>
												<option value="monthly">Monthly</option>
												<option value="yearly">Yearly</option>
											</select>
										</td>
									</tr>
									<tr>
										<td class="valign-middle">Website Priority</td>
										<td>
											<select name="priority" class="span11">
												<option value="1">100%</option>
												<option value="0.75">75%</option>
												<option value="0.5">50%</option>
												<option value="0.25">25%</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="tab-pane" id="advanced">
							<table class="table table-striped">
								<tbody>
									<tr>
										<td class="valign-middle">Crawl Speed</td>
										<td>
											<select name="speed" class="span11">
												<option value="0">Fast</option>
												<option value="1">Medium</option>
												<option value="2">Slow</option>
											</select>
										</td>
									</tr>
									<tr>
										<td class="valign-middle">File Name</td>
										<td>
											<input type="text" name="fname" value="sitemap.xml" class="span11">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="form-actions">
					<div class="span4">
						<button type="submit" class="btn btn-primary" onclick="document.getElementById('pb').style.display='block';">Generate & Download</button>
					</div>
					<div class="span5">
						<div id="pb" style="display: none; margin-top: 4px;">
							<div class="progress progress-striped active" style="margin-top: 0px; margin-bottom: 0px;">
								<div class="bar" style="width: 100%;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</form>
</div>
	
<style>
	input, select { margin: 6px 0px !important; }
	.valign-middle { vertical-align: middle !important; padding-left: 15px !important; }
</style>

<?php
	require "structures/footer.php";
?>