<?php
	$title = "Robot Mode - Server & Robots";
	require "structures/header.php";
	require "php/simple.dom.php";
	
	$done = false;
	
	if($_POST['url']) {
		$url = $_POST['url'];
		
		if(parse_url($url) == false) header("Location: index.php");
	
		$html = file_get_html($url);
		if(!$html) {
			header("Location: index.php");
			exit;
		}
		
		$www = parse_url($url);
		$shortWebsite = $www['scheme'] . "://" . $www['host'] . "/";
		
		$done = true;
	}
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-miscellaneous.php">Server & Robots</a> <span class="divider">/</span></li>
		<li class="active">Robot Mode</li>
	</ul>
	
	<div class="page-header">
		<h2>Robot Mode</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span12">
			<div class="well">
				<form action="robot-mode.php" method="POST" style="margin: 0px;">
					<input type="text" class="span9" name="url" value="<?=$headers->PostField('url');?>" placeholder="http://www.google.com/" style="padding: 21px; font-size: 15px; margin: 0px;">
					<input type="submit" class="btn btn-large btn-success span3" value="Generate">
				</form>
			</div>
		</div>
	</div>
	
	<?php if($done == true) { ?>
		
		<table class="table table-bordered table-striped" width='100%' cellspacing='0px' cellpadding='0px'>
			<thead><tr>
				<td colspan='2' style="font-weight: bold;"><b>Webpage Configuration</b></td>
			</tr></thead>
			<tbody><tr>
				<td class="Col Name" width='125'>Page Address</td>
				<td class="Col Content">
					<?php
						echo $url;
					?>
				</td>
			</tr>
			<tr>
				<td class="Col Name">Page Title</td>
				<td class="Col Content">
					<?php
						$title = $html->find('title', 0);
						echo $title->innertext;
					?>
				</td>
			</tr>
			<tr>
				<td class="Col Name">Page Description</td>
				<td class="Col Content">
					<?php
						$title = $html->find('meta[name=description]', 0);
						echo $title->content;
					?>
				</td>
			</tr>
			<tr>
				<td class="Col Name">Page Keywords</td>
				<td class="Col Content">
					<?php
						$title = $html->find('meta[name=keywords]', 0);
						echo $title->content;
					?>
				</td>
			</tr></tbody>
			<thead><tr class="HeadRow">
				<td colspan='2' style="font-weight: bold;">Website Contents</td>
			</tr></thead>
			<tbody><tr>
				<td class="Col Name">Document Size</td>
				<td class="Col Content">
					<?php
						$text = $html->innertext;
						echo strlen($text);
					?>
				</td>
			</tr>
			<tr>
				<td class="Col Name">Document Text</td>
				<td class="Col Content">
					<?php
						$text = $html->innertext;
						$text = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $text);
						$words = preg_split("/[\s,]+/", strip_tags($text));
						
						echo implode(" ", $words);
					?>
				</td>
			</tr>
			<tr>
				<td class="Col Name">Number of Words</td>
				<td class="Col Content">
					<?php
						$text = $html->innertext;
						$text = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $text);
						$words = preg_split("/[\s,]+/", strip_tags($text));
						
						echo count($words);
					?>
				</td>
			</tr></tbody>
			<thead><tr class="HeadRow">
				<td colspan='2' style="font-weight: bold;">Search Engine Status</td>
			</tr></thead>
			<tbody><tr>
				<td class="Col Name">Indexed Pages</td>
				<td class="Col Content">
					<a href="http://google.com/search?q=site:<?=$shortWebsite;?>">Google</a>
					&nbsp;
					<a href="http://siteexplorer.search.yahoo.com/search?p=<?=$shortWebsite;?>">Yahoo</a>
					&nbsp;
					<a href="http://search.live.com/results.aspx?q=<?=$shortWebsite;?>">Bing</a>
					&nbsp;
					<a href="http://www.ask.com/web?q=inurl:<?=$shortWebsite;?>+site:<?=$shortWebsite;?>">Ask</a>
				</td>
			</tr>
			<tr>
				<td class="Col Name">Web Cache</td>
				<td class="Col Content">
					<a href="http://google.com/search?q=cache:<?=$shortWebsite;?>">Google</a>
				</td>
			</tr>
			<tr>
				<td class="Col Name">Web Mentions</td>
				<td class="Col Content">
					<a href="https://www.google.com/search?q=%22<?=$shortWebsite;?>%22">Google</a>
				</td>
			</tr></tbody>
			<thead><tr class="HeadRow">
				<td colspan='2' style="font-weight: bold;">Miscellaneous</td>
			</tr></thead>
			<tbody><tr>
				<td class="Col Name">Website Source</td>
				<td class="Col Content">
					<div style="width: 600px; background: #ddd; border: 1px solid #999; padding: 10px; overflow-y: auto; max-height: 150px;">
						<?=str_replace("<", "&lt;", str_replace(">", "&gt;", str_replace("\n", "<br />", str_replace("	", "&nbsp;&nbsp;&nbsp;", str_replace(" ", "&nbsp;", $html)))));?>
					</div>
				</td>
			</tr></tbody>
		</table>
		
	<?php } ?>
</div>
	
<?php
	require "structures/footer.php";
?>