<?php
	$title = "Speed Test - Server & Robots";
	require "structures/header.php";
	
	function isValidURL($url) {
		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}
	
	function SendPing($url) {
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$start = $time;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6'); 
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_REFERER, "http://www.bluefiremedia.net/?#seo-tools/ping");
		$html = curl_exec($ch);
		curl_close($ch);
		
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$finish = $time;
		$total_time = round(($finish - $start), 4);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://api.bluefiremedia.net/ping.php?url=" . $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6'); 
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_REFERER, "#MjUxMzkwMg==_B64");
		$html = curl_exec($ch);
		curl_close($ch);
		
		$result = json_decode($html, true);
		$remote = $result['Result']['Ping'];
		
		sleep(1); // Allow time before the next ping, so we can get a more accurate result from the remote server.
		return array($total_time, $remote);
	}
	
	$result = "To begin a speed test, enter the URL to the left of the screen.";
	$done = false;
	$error = "";
	
	if($_POST['go']) {
		$url = $_POST['url'];
		
		if(!isValidURL($url)) {
			$error = "<strong>Well, great job.</strong> You managed to mess up the URL too. Please enter a valid website URL.";
		}
		else {
			$ping_1 = SendPing($url);
			$ping_2 = SendPing($url);
			$ping_3 = SendPing($url);
			$ping_4 = SendPing($url);
			$ping_5 = SendPing($url);
			
			$result = "Attempting a full download of " . $url . " from local server..." . PHP_EOL . PHP_EOL;
			$result .= "[1] Downloaded webpage in " . $ping_1[0] ." seconds." . PHP_EOL;
			$result .= "[2] Downloaded webpage in " . $ping_2[0] ." seconds." . PHP_EOL;
			$result .= "[3] Downloaded webpage in " . $ping_3[0] ." seconds." . PHP_EOL;
			$result .= "[4] Downloaded webpage in " . $ping_4[0] ." seconds." . PHP_EOL;
			$result .= "[5] Downloaded webpage in " . $ping_5[0] ." seconds." . PHP_EOL . PHP_EOL;
			
			$result .= "Attempting a full download of " . $url . " from remote server..." . PHP_EOL . PHP_EOL;
			$result .= "[1] Downloaded webpage in " . $ping_1[1] ." seconds." . PHP_EOL;
			$result .= "[2] Downloaded webpage in " . $ping_2[1] ." seconds." . PHP_EOL;
			$result .= "[3] Downloaded webpage in " . $ping_3[1] ." seconds." . PHP_EOL;
			$result .= "[4] Downloaded webpage in " . $ping_4[1] ." seconds." . PHP_EOL;
			$result .= "[5] Downloaded webpage in " . $ping_5[1] ." seconds." . PHP_EOL . PHP_EOL;
			
			$result .= "Download completed.";
			
			$result = "<pre>" . $result . "</pre>";
			$done = true;
		}
	}
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-server-robots.php">Server & Robots</a> <span class="divider">/</span></li>
		<li class="active">Speed Test</li>
	</ul>
	
	<div class="page-header">
		<h2>Speed Test</h2>
	</div>
	
	<form action="speed-test.php" method="POST">
		<input type="hidden" name="go" value="true">
		
		<div class="row" style="margin: 0px;">
			<div class="span4">
				<div class="well">
					<input class="input-block-level" type="text" name="url" value="<?=$headers->PostField('url');?>" placeholder="http://www.google.com/">
				</div>
				<div class="well">
					<button class="btn btn-large btn-block btn-success" type="button" onclick="document.forms[0].submit(); document.getElementById('pb').style.display = 'block';">Run Speed Test</button>
					<div id="pb" class="progress progress-striped active" style="margin-top: 15px; margin-bottom: 0px; display: none;">
						<div class="bar" style="width: 100%;"></div>
					</div>
				</div>
			</div>
			
			<div class="span8">
				<?php if($done) { ?><div class="alert alert-success">
					<strong>Alright!</strong> We just finished a ping attempt to the website. See below for the deeds.
				</div><?php } if($error) { ?>
				<div class="alert alert-error">
					<?=$error;?>
				</div>
				<?php } ?>
				<div class="well">
					<h4>Speed Test Results</h4>
					
					<div id="results" style="margin: 20px 0px; color: #444; line-height: 19px;">
						<?=$result;?>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<style type='text/css'>
	.valign-middle { vertical-align: middle !important; }
	input, select { margin-bottom: 0px !important; }
</style>

<?php
	require "structures/footer.php";
?>
