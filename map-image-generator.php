<?php
	$title = "Map Image Generator - Miscellaneous";
	require "structures/header.php";
	
	$done = false;
	$images = array();
	
	function MakeSize($size, $address, $scale = 1) {
		$url = "http://maps.google.com/maps/api/staticmap?sensor=true";
		$url .= "&size=" . $size . "x" . $size;
		$url .= "&center=" . urlencode($address);
		$url .= "&zoom=15";
		$url .= "&markers=color:red|" . urlencode($address);
		$url .= "&maptype=roadmap";
		$url .= "&scale=$scale";
		$url .= "&key=AIzaSyCgpXzXA6P3Gc8yrls90-VSq5v4O0jaE0I";
		
		return $url;
	}
	
	if($_POST['address']) {
		$address = $_POST['address'];
		
		$images['256x256'] = MakeSize(256, $address);
		$images['256x256x2'] = MakeSize(256, $address, 2);
		
		$images['512x512'] = MakeSize(512, $address);
		$images['512x512x2'] = MakeSize(512, $address, 2);
		
		$done = true;
	}
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-miscellaneous.php">Miscellaneous</a> <span class="divider">/</span></li>
		<li class="active">Map Image Generator</li>
	</ul>
	
	<div class="page-header">
		<h2>Map Image Generator</h2>
	</div>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span12">
			<div class="well">
				<form action="map-image-generator.php" method="POST" style="margin: 0px;">
					<input type="text" class="span9" name="address" value="<?=$headers->PostField('address');?>" placeholder="19540 Jamboree Road, Irvine, CA 92612" style="padding: 21px; font-size: 15px; margin: 0px;">
					<input type="submit" class="btn btn-large btn-success span3" value="Generate">
				</form>
			</div>
		</div>
	</div>
	
	<?php if($done == true) { ?>
		
		<p>Great. Below is all of the generated map images. Find the size you want, right click it, and choose "Save as..". Keep in mind that 2x scales are useful for mobile browsers as it will make the map show sharper.</p>
		
		<div class="row" style="margin-left: 0px; margin-top: 20px;">
			<div class="span3">
				<div class="well">
					<b>256x256</b> with <b>Scale X1</b>
					
					<img src="<?=$images['256x256'];?>" alt="Error" style="margin-top: 15px;" width='256'>
				</div>
			</div>
			<div class="span3">
				<div class="well">
					<b>256x256</b> with <b>Scale X2</b>
					
					<img src="<?=$images['256x256x2'];?>" alt="Error" style="margin-top: 15px;" width='256'>
				</div>
			</div>
			<div class="span3">
				<div class="well">
					<b>512x512</b> with <b>Scale X1</b>
					
					<img src="<?=$images['512x512'];?>" alt="Error" style="margin-top: 15px;" width='256'>
				</div>
			</div>
			<div class="span3">
				<div class="well">
					<b>512x512</b> with <b>Scale X2</b>
					
					<img src="<?=$images['512x512x2'];?>" alt="Error" style="margin-top: 15px;" width='256'>
				</div>
			</div>
		</div>
		
	<?php } ?>
</div>
	
<?php
	require "structures/footer.php";
?>