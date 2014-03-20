<?php
	$title = "Hash Generator - Security";
	require "structures/header.php";
	
	$done = false;
	$result = "Please press the button to generate a hash.";
	
	if($_POST['go']) {
		$text = $_POST['text'];
		$method = $_POST['method']; // md5, sha1, or crypt
		
		if($method == 'md5') $result = md5($text);
		if($method == 'sha1') $result = sha1($text);
		if($method == 'crypt') $result = crypt($text);
	}
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-security.php">Security</a> <span class="divider">/</span></li>
		<li class="active">Hash Generator</li>
	</ul>
	
	<div class="page-header">
		<h2>Hash Generator</h2>
	</div>
	
	<?php if($done === false) { ?>
	
	<form action="hash-generator.php" method="POST">
		<input type="hidden" name="go" value="1">
	
		<div class="row" style="margin-left: 0px;">
			<div class="span7">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Setting</th>
							<th>Value</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="valign-middle">Text</td>
							<td>
								<input type="text" name="text" value="<?=$headers->PostField('text');?>" placeholder="I will soon be turned into some non-human-readable code." style="width: 400px;">
							</td>
						</tr>
						<tr>
							<td class="valign-middle">Method</td>
							<td>
								<select name="method">
									<option value="md5">MD5</option>
									<option value="sha1">SHA-1</option>
									<option value="crypt">CRYPT</option>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="span5">
				<div class="well">
					<button class="btn btn-large btn-block btn-success" type="button" onclick="document.forms[0].submit();">Generate Hash</button>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		
		<div class="row" style="margin-left: 0px;">
			<div class="span12">
				<div class="well">
					<h3 style="margin: 0px 0px 15px 0px;">Generated Hash</h3>
					
					<pre><?=$result;?></pre>
				</div>
			</div>
		</div>
	
	<?php } ?>
</div>
	
<?php
	require "structures/footer.php";
?>