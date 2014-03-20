<?php
	$title = "HTTP Header Lookup - Lookups";
	require "structures/header.php";
	
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
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_NOBODY, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			$headers2 = curl_exec($ch);
			
			if(curl_errno($ch) == 28) {
				$error = "<strong>Look what you did!</strong> I waited 10 seconds for the website to load, and finally gave up. ";
			}
			else {
				$done = true;
			}
		}
		
	}
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-lookups.php">Lookups</a> <span class="divider">/</span></li>
		<li class="active">HTTP Header Lookup</li>
	</ul>
	
	<div class="page-header">
		<h2>HTTP Header Lookup</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span12">
			<div class="well">
				<form action="http-header-lookup.php" method="POST" style="margin: 0px;">
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
					<pre><?=$headers2;?></pre>
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