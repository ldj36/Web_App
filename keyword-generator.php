<?php
	$title = "Keyword Generator - Optimization";
	require "structures/header.php";
	
	$done = false;
	$results = "";
	
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
	
	function getKeywordSuggestionsFromGoogle($keyword) {
		$keywords = array();
		$data = GetHTML('http://suggestqueries.google.com/complete/search?output=firefox&client=firefox&hl=en-US&q='.urlencode($keyword));
		if (($data = json_decode($data, true)) !== null) {
			$keywords = $data[1];
		}

		return $keywords;
	}
	
	if($_POST['list']) {
		$list = $_POST['list'];
		$list = str_replace("\r\n", "\n", $list);
		$list = str_replace(",", "\n", $list);
		$list = strtolower($list);
		
		$listarr = explode("\n", $list);
		$wordarr = array();
		
		foreach($listarr as $i) {
			$wordarr[] = trim($i);
		}
		
		$results = array();
		
		foreach($wordarr as $w) {
			$words = getKeywordSuggestionsFromGoogle($w);
			
			foreach($words as $word) {
				$results[] = ucwords($word);
			}
		}
	}
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-optimization.php">Optimization</a> <span class="divider">/</span></li>
		<li class="active">Keyword Generator</li>
	</ul>
	
	<div class="page-header">
		<h2>Keyword Generator</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span4">
			<div class="well">
				<h4 style="margin: 0px 0px 10px;">Your Phrases</h4>
				<p style="margin-bottom: 20px;">Enter some key words or phrases and we will recommend more based on them.</p>
				
				<form action="keyword-generator.php" method="POST">
					<textarea name="list" class="input-block-level" rows="15"><?=$headers->PostField('list');?></textarea>
				</form>
			</div>
		</div>
		<div class="span4">
			<div class="well">
				<h4 style="margin: 0px 0px 10px;">Results</h4>
				<p style="margin-bottom: 20px;">Heres all of the keywords we found for you, thanks to Google Suggestions.</p>
				
				<textarea name="result" class="input-block-level" rows="15"><?php if($results) echo implode(PHP_EOL, $results); ?></textarea>
			</div>
		</div>
		<div class="span4">
			<div class="well">
				<a href="javascript: void(0);" class="btn btn-large btn-success btn-block" onclick="document.forms[0].submit(); document.getElementById('pb').style.display = 'block';">Generate Results</a>
			</div>
			<div class="well" id="pb" style="display: none;">
				<div class="progress progress-striped active" style="margin-top: 0px; margin-bottom: 0px;">
					<div class="bar" style="width: 100%;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php
	require "structures/footer.php";
?>