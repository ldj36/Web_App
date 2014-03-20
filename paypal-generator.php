<?php
	$title = "PayPal Generator - Miscellaneous";
	require "structures/header.php";
	
	$done = false;
	
	if($_POST['form'] == md5($_SERVER['SCRIPT_NAME'])) {
		$_POST['business'] = $_POST['receiver_email']; // one step ahead
		
		$fields = array(
			'no_shipping', 'cbt', 'cmd', 'no_note', 'receiver_email', 'business', 'quantity', 'item_name', 'amount',
			'return', 'cancel_return', 'custom', 'notify_url', 'currency_code', 'charset', 'lc'
		);
		
		$code = '<form id="ppBtnForm" action="https://www.paypal.com/cgi-bin/webscr" method="POST">' . PHP_EOL;
		foreach($fields as $item) {
			$code .= '	<input type="hidden" name="' . $item . '" value="' . ($_POST[$item]) . '">' . PHP_EOL;
		}
		
		$code2 = $code . "</form>";
		
		$code .= '	<input type="image" src="' . $_POST['button'] .'" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' . PHP_EOL;
		
		$code .= '</form>';
		$code = str_replace("<", "&lt;", $code);
		$code = str_replace(">", "&gt;", $code);
		
		$done = true; // woot!
	}
?>


<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-miscellaneous.php">Miscellaneous</a> <span class="divider">/</span></li>
		<li class="active">PayPal Generator</li>
	</ul>
	
	<div class="page-header">
		<h2>PayPal Generator</h2>
	</div>
	
	<?php if($done === false) { ?>
	
	<form action="paypal-generator.php" method="POST">
		<input type="hidden" name="no_shipping" value="1">
		<input type="hidden" name="no_note" value="1">
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="charset" value="utf-8">
		
		<input type="hidden" name="form" value="<?=md5($_SERVER['SCRIPT_NAME']);?>">
		
		<div class="row" style="margin-left: 0px;">
			<div class="span6">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Receiver Email</h4>
					<p style="margin-bottom: 20px;">The email address of the PayPal account that will be receiving the funds.</p>
					<input class="input-block-level" type="text" name="receiver_email" placeholder="example@domain.com">
				</div>
			</div>
			<div class="span6">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Item Name</h4>
					<p style="margin-bottom: 20px;">What should we call the item at checkout?</p>
					<input class="input-block-level" type="text" name="item_name" placeholder="Potatoes & Cheese">
				</div>
			</div>
		</div>
		
		<div class="row" style="margin-left: 0px;">
			<div class="span6">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Item Price</h4>
					<p style="margin-bottom: 20px;">Enter the price of the item that the user shall pay.</p>
					<input class="input-block-level" type="text" name="amount" placeholder="299.99">
				</div>
			</div>
			<div class="span6">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Item Currency</h4>
					<p style="margin-bottom: 20px;">What currency should the user pay in?</p>
					<input class="input-block-level" type="text" name="currency_code" value="USD" placeholder="USD">
				</div>
			</div>
		</div>
		
		<div class="row" style="margin-left: 0px;">
			<div class="span6">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Item Language</h4>
					<p style="margin-bottom: 20px;">What language should the checkout page be in?</p>
					<input class="input-block-level" type="text" name="lc" maxlength="2" value="EN" placeholder="EN">
				</div>
			</div>
			<div class="span6">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Item Quantity</h4>
					<p style="margin-bottom: 20px;">How many of the item is the user paying for?</p>
					<input class="input-block-level" type="text" name="quantity" value="1" placeholder="1">
				</div>
			</div>
		</div>
		
		<div class="row" style="margin-left: 0px;">
			<div class="span6">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Success Return</h4>
					<p style="margin-bottom: 20px;">Enter the URL users should visit after payment.</p>
					<input class="input-block-level" type="text" name="return" placeholder="http://www.example.com/invoice/3501/complete">
				</div>
			</div>
			<div class="span6">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Cancel Return</h4>
					<p style="margin-bottom: 20px;">Enter the URL users should visit if they cancel.</p>
					<input class="input-block-level" type="text" name="cancel_return" placeholder="http://www.example.com/invoice/3501/failed">
				</div>
			</div>
		</div>
		
		<div class="row" style="margin-left: 0px;">
			<div class="span12">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Return Button Text</h4>
					<p style="margin-bottom: 20px;">When the user successfully submits payment, what should the button to come back to your site say?</p>
					<input class="input-block-level" type="text" name="cbt" placeholder="Return to Example.com">
				</div>
			</div>
		</div>
		
		<div class="row" style="margin-left: 0px;">
			<div class="span6">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Notification URL</h4>
					<p style="margin-bottom: 20px;">If you have an IPN set up, enter its URL. Leave blank otherwise.</p>
					<input class="input-block-level" type="text" name="notify_url" placeholder="http://www.example.com/ipn.php">
				</div>
			</div>
			<div class="span6">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Custom Field</h4>
					<p style="margin-bottom: 20px;">If you want to add more info, enter it here. Leave blank otherwise.</p>
					<input class="input-block-level" type="text" name="custom" placeholder="User ID: 1664901">
				</div>
			</div>
		</div>
		
		<div class="row" style="margin-left: 0px;">
			<div class="span12">
				<div class="well">
					<h4 style="margin: 0px 0px 10px;">Select Button</h4>
					<p style="margin-bottom: 20px;">Please click on the button you wish to use for the checkout form below.</p>
					
					<div style="display: block;">
						<div style="float: left; padding-right: 15px;">
							<center><input id="cb1" type="radio" name="button" checked value="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif">
							<label for="cb1"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" style="margin-top: 10px;"></label></center>
						</div>
						<div style="float: left; padding-right: 15px;">
							<center><input id="cb2" type="radio" name="button" value="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
							<label for="cb2"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" style="margin-top: 10px;"></label></center>
						</div>
						<div style="float: left; padding-right: 15px;">
							<center><input id="cb3" type="radio" name="button" value="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_SM.gif">
							<label for="cb3"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_SM.gif" style="margin-top: 10px;"></label></center>
						</div>
						<div style="float: left; padding-right: 15px;">
							<center><input id="cb4" type="radio" name="button" value="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif">
							<label for="cb4"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" style="margin-top: 10px;"></label></center>
						</div>
						<div style="float: left; padding-right: 15px;">
							<center><input id="cb5" type="radio" name="button" value="https://www.paypalobjects.com/en_US/i/btn/btn_cart_SM.gif">
							<label for="cb5"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_SM.gif" style="margin-top: 10px;"></label></center>
						</div>
						<div style="float: left; padding-right: 15px;">
							<center><input id="cb6" type="radio" name="button" value="https://www.paypalobjects.com/en_US/i/btn/btn_giftCC_LG.gif">
							<label for="cb6"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_giftCC_LG.gif" style="margin-top: 10px;"></label></center>
						</div>
						<div style="float: left; padding-right: 15px;">
							<center><input id="cb7" type="radio" name="button" value="https://www.paypalobjects.com/en_US/i/btn/btn_gift_LG.gif">
							<label for="cb7"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_gift_LG.gif" style="margin-top: 10px;"></label></center>
						</div>
						<div style="float: left; padding-right: 15px;">
							<center><input id="cb8" type="radio" name="button" value="https://www.paypalobjects.com/en_US/i/btn/btn_gift_SM.gif">
							<label for="cb8"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_gift_SM.gif" style="margin-top: 10px;"></label></center>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		
		<button class="btn btn-large btn-block btn-success" type="submit">Generate PayPal Button Code</button>
	</form>
	
	<?php } else { ?>
	
	<div class="row" style="margin-left: 0px;">
		<div class="span8">
			<div class="well">
				<h4 style="margin: 0px 0px 10px;">Generated Code</h4>
				<pre><?=$code;?></pre>
			</div>
		</div>
		<div class="span1">
			&nbsp;
		</div>
		<div class="span3">
			<div class="well">
				<button class="btn btn-large btn-block btn-success" type="button" onClick="location.reload();">Create New Button</button>
				<button class="btn btn-large btn-block btn-success" type="button" onClick="testButton();">Test This Button</button>
			</div>
			<div class="well">
				<center>
					<?=str_replace("<form", "<disabledForm", str_replace("</form>", "</disabledForm>", str_replace("&lt;", "<", str_replace("&gt;", ">", str_replace("ppBtnForm", "ppDisabledBtnForm", $code)))));?>
				</center>
			</div>
		</div>
	</div>
	
	<?=str_replace(' method="POST"', ' method="POST" target="_blank"', $code2);?>
	
	<script type="text/javascript">
		function testButton() {
			document.getElementById('ppBtnForm').submit();
		}
	</script>
	
	<?php } ?>
	
</div>
	
<?php
	require "structures/footer.php";
?>