<?php
	$title = "Keyword Cleaner - Optimization";
	require "structures/header.php";
	
	$done = false;
	
	if($_POST['list']) {
		$list = $_POST['list'];
		
		// First, let's format the list into a code-readable solution.
		
		$list = str_replace("\r\n", "\n", $list);
		$list = str_replace(",", "\n", $list);
		
		// Alright. Now we'll turn the list into an array, and format the words as we do it.
		
		$orig_arr = explode("\n", $list);
		$new_arr = array();
		
		foreach($orig_arr as $key) {
			$str = strtolower(trim($key));
			$str = ucwords($str);
			
			$new_arr[] = $str;
		}
		
		// Yes! We're done, now we need to just make the array into a string. 
		
		$result1 = implode(', ', $new_arr); // All in one line
		$result2 = implode(PHP_EOL, $new_arr); // All on separate lines
		
		$done = true;
	}
?>

<?php if(!$done) { ?>

	<div class="span9">
		<form action="keyword-cleaner.php" method="POST">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a> <span class="divider">/</span></li>
				<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
				<li><a href="tools-optimization.php">Optimization</a> <span class="divider">/</span></li>
				<li class="active">Keyword Cleaner</li>
			</ul>
			
			<div class="page-header">
				<h2>Keyword Cleaner</h2>
			</div>
			
			<div class="row" style="margin-left: 0px;">
				<div class="span7">
					<p>Enter all of your keywords below. You can put them each on their own line, separate them by commas, or do both.</p>
					
					<textarea name="list" class="input-block-level" rows="20" style="margin-top: 23px;"></textarea>
				</div>
				<div class="span5">
					<div class="well">
						<input type="submit" class="btn btn-large btn-block btn-success" value="Clean / Format List" onclick="document.getElementById('pb').style.display = 'block';">
					</div>
					<div class="well" id="pb" style="display: none;">
						<div class="progress progress-striped active" style="margin-top: 0px; margin-bottom: 0px;">
							<div class="bar" style="width: 100%;"></div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	
<?php } else { ?>
	
	<div class="span9">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a> <span class="divider">/</span></li>
			<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
			<li><a href="tools-optimization.php">Optimization</a> <span class="divider">/</span></li>
			<li class="active">Keyword Cleaner</li>
		</ul>
		
		<div class="page-header">
			<h2>Keyword Cleaner</h2>
		</div>
		
		<div class="alert alert-success">
			<strong>Alright!</strong> I just finished tuning up that keyword list of yours. Hope you like it.
		</div>
		
		<div class="row" style="margin-left: 0px;">
			<div class="span6">
				<textarea class="input-block-level" rows="20" style="margin-top: 23px;"><?=$result1;?></textarea>
			</div>
			<div class="span6">
				<textarea class="input-block-level" rows="20" style="margin-top: 23px;"><?=$result2;?></textarea>
			</div>
		</div>
	</div>
	
<?php } ?>
	
<?php
	require "structures/footer.php";
?>