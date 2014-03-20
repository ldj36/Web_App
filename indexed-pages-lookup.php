<?php
	$title = "Indexed Pages Lookup - Optimization";
	
	require "structures/header.php";
	require "php/simple.dom.php";
	
	function isValidURL($url) {
		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}
	
	function GetHTML($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	
	$done = false;
	$error = "";
	
	if($_POST['url']) {
		$url = trim($_POST['url']);
		
		if(!isValidURL($url)) {
			$error = "<strong>Well, great job.</strong> You managed to mess up the URL too. Please enter a valid website URL.";
		}
		else {
			$wwwLink = parse_url($url);
			$wwwLink = str_replace("www.", "", $wwwLink['host']);
			
			$googleResult1 = file_get_html("https://www.google.com/search?q=site:" . urlencode('"'.$wwwLink.'"'));
			
			$googleResults = $googleResult1->find('div[id=resultStats]', 0)->innertext;
			$googleResults = str_replace("About ", "", $googleResults);
			$googleResults = str_replace(" results", "", $googleResults);
			$googleResults = str_replace(",", "", $googleResults);
			
			$indexed = $googleResults;
		}
		
		$done = true;
	}
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-optimization.php">Optimization</a> <span class="divider">/</span></li>
		<li class="active">Indexed Pages Lookup</li>
	</ul>
	
	<div class="page-header">
		<h2>Indexed Pages Lookup</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span12">
			<div class="well">
				<form action="indexed-pages-lookup.php" method="POST" style="margin: 0px;">
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
					<h2>Indexed Web Pages</h2>
					<p>The website <b><?=$wwwLink;?></b> has a total of <?=number_format($indexed);?> indexed pages found and identified on Google.</p>
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