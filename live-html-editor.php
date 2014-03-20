<?php
	$title = "Live HTML Editor - Developers";
	require "structures/header.php";
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-developers.php">Developers</a> <span class="divider">/</span></li>
		<li class="active">Live HTML Editor</li>
	</ul>
	
	<div class="page-header">
		<h2>Live HTML Editor</h2>
	</div>
	
	<div class="row innerbox" style="margin: 0px 0px 20px;">
		<form>
			<textarea id="html" name="html" class="input-block-level" rows="12" style="font-size: 12px; line-height: 16px;"></textarea>
		</form>
	</div>
	
	<div class="row" style="margin: 0px 0px 0px;">
		<iframe style="width: 100%; height: 300px;" id="preview" style="border: none;">
			<!DOCTYPE HTML>
			<html lang="en">
				<head>
					<meta charset="utf-8">
				</head>
				<body>
				</body>
			</html>
		</iframe>
	</div>
	
	<script type="text/javascript">
		$(function() {
		
			function GetHTML() {
				var HTML = $('#html').val();
				return HTML;
			}
			
			$('.innerbox').on("keyup", function() {
				var targetp = $('#preview')[0].contentWindow.document;
				targetp.open();
				targetp.close();
				
				$('body', targetp).append(GetHTML());
			});
		});
	</script>
</div>
	
<?php
	require "structures/footer.php";
?>