<?php
	$title = "Character Length - Optimization";
	require "structures/header.php";
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-optimization.php">Optimization</a> <span class="divider">/</span></li>
		<li class="active">Character Length</li>
	</ul>
	
	<div class="page-header">
		<h2>Character Length</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span6">
			<table class="table table-striped">
				<tbody>
					<tr>
						<td style="font-weight: bold;" width="110">Letters</td>
						<td id="letters">0</td>
						
						<td style="font-weight: bold;" width="110">Numbers</td>
						<td id="numbers">0</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Spaces</td>
						<td id="spaces">0</td>
						
						<td style="font-weight: bold;">Symbols</td>
						<td id="symbols">0</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Words</td>
						<td id="words">0</td>
						
						<td style="font-weight: bold;"><b>Lines</b></td>
						<td id="lines">1</td>
					</tr>
					<tr style="background: #777; color: #fff;">
						<td style="font-weight: bold;"><b>Length</b></td>
						<td id="length">0</td>
						
						<td><b></b></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row" style="margin-left: 0px; margin-top: 10px;">
		<div class="span10">
			<form>
				<textarea class="input-block-level" rows="10" name="txt" onkeyup="recalculate();"></textarea>
			</form>
		</div>
	</div>
</div>

<script>
	function recalculate() {
		var letters = 0;
		var numbers = 0;
		var spaces = 0;
		var symbols = 0;
		var words = 0;
		var lines = 0;
		
		var str = document.forms[0]['txt'].value;
		
		letters = str.replace(/[^A-Za-z]/g, "").length;
		numbers = str.replace(/[^0-9]/g, "").length;
		spaces = str.split(" ").length - 1;
		
		words = spaces;
		
		symbols = str.replace(/[^A-Za-z0-9]+/g, "").length;
		lines = str.split("\n").length;
		
		document.getElementById("letters").innerHTML = letters.toString();
		document.getElementById("numbers").innerHTML = numbers.toString();
		document.getElementById("spaces").innerHTML = spaces.toString();
		document.getElementById("words").innerHTML = words.toString();
		document.getElementById("symbols").innerHTML = symbols.toString();
		document.getElementById("lines").innerHTML = lines.toString();
		document.getElementById("length").innerHTML = str.length.toString();
	}
</script>
	
<?php
	require "structures/footer.php";
?>