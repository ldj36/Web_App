<?php
	$title = "PageRank Lookup - Optimization";
	require "structures/header.php";
	require "php/check.pr.php";
	
	function isValidURL($url) {
		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}
	
	$done = false;
	$error = "";
	
	if($_POST['url']) {
		$url = trim($_POST['url']);
		
		if(!isValidURL($url)) {
			$error = "<strong>Well, great job.</strong> You managed to mess up the URL too. Please enter a valid website URL.";
		}
		else {
			$pageRank = GooglePageRankChecker::getRank(@$url);
			$pageRank = number_format($pageRank);
			if($pageRank > 9) $pageRank = 9; // bug identified; twitter.com produces pagerank of 10 for some odd reason; google stays at 9; FIXED
			
			$percent = ceil(($pageRank / 9) * 100);
		}
		
		$done = true;
	}
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-optimization.php">Optimization</a> <span class="divider">/</span></li>
		<li class="active">PageRank Lookup</li>
	</ul>
	
	<div class="page-header">
		<h2>PageRank Lookup</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span12">
			<div class="well">
				<form action="pagerank-lookup.php" method="POST" style="margin: 0px;">
					<input type="text" class="span9" name="url" value="<?=$headers->PostField('url');?>" placeholder="http://www.google.com/" style="padding: 21px; font-size: 15px; margin: 0px;">
					<input type="submit" class="btn btn-large btn-success span3" value="Continue">
				</form>
			</div>
		</div>
	</div>
	
	<?php if($done == true) { ?>
		<?php if($error != "") { ?><div class="alert alert-error"><?=$error;?></div><?php } else { ?>
	
		<div class="row" style="margin-left: 0px;">
			<div class="span6">
				<div class="well">
					<b><?=$_POST['url'];?></b> has a PageRank of <?=$pageRank;?>.
					
					<br /><br />
					<div class="progress progress-striped">
						<div class="bar" style="width: <?=$percent;?>%;"></div>
					</div>
				</div>
			</div>
			<div class="span6">
			</div>
		</div>
		
		<?php } ?>
	<?php } ?>
</div>
	
<?php
	require "structures/footer.php";
?>