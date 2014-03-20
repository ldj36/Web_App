<?php
	$title = "Htaccess Generator - Server & Robots";
	require "structures/header.php";
	
	$code = "Press Generate Code for the code to appear here.";
	
	if($_POST['go']) {
		$domain = $_POST['domain'];
		
		$lastDot = strpos($domain, '.');
		$domainTLD = substr($domain, $lastDot+1);
		$domainName = substr($domain, 0, $lastDot);
		
		$docIndex = $_POST['documentIndex'];
		$forceWWW = $_POST['forceWWW'];
		$forceSSL = $_POST['forceSSL'];
		$showIndexes = $_POST['showIndexes'];
		$blockedIPs = $_POST['blockedIPs'];
		
		$code = "RewriteEngine On" . PHP_EOL;
		$code .= "RewriteBase /" . PHP_EOL . PHP_EOL;
		
		if($forceWWW == 'On') {
			$code .= "### Force WWW ###" . PHP_EOL . PHP_EOL;
			$code .= "RewriteCond %{HTTP_HOST} ^$domainName\.$domainTLD" . PHP_EOL;
			$code .= "RewriteRule (.*) http://www.$domainName.$domainTLD/$1 [R=301,L]" . PHP_EOL . PHP_EOL;
		}
		
		if($forceSSL == 'On') {
			$code .= "### Force SSL ###" . PHP_EOL . PHP_EOL;
			$code .= "RewriteCond %{SERVER_PORT} 80 " . PHP_EOL;
			$wwwTag = ''; if($forceWWW == 'On') $wwwTag = 'www.';
			$code .= "RewriteRule ^(.*)$ https://$wwwTag". "" ."$domainName.$domainTLD/$1 [R,L]" . PHP_EOL . PHP_EOL;
		}
		
		if($showIndexes == 'On') 
			$code .= "Options +Indexes" . PHP_EOL . PHP_EOL;
		else 
			$code .= "Options -Indexes" . PHP_EOl . PHP_EOL;
		
		if($docIndex != '')
			$code .= "DirectoryIndex $docIndex" . PHP_EOL . PHP_EOL;
		
		if($blockedIPs != '') {
			$ips = preg_split("/\r\n|\n|\r/", $blockedIPs);
			
			$code .= "### Blocked IP Addresses ###" . PHP_EOL . PHP_EOL;
			$code .= "Order Deny,Allow" . PHP_EOL;
			
			foreach($ips as $ip) {
				$code .= "Deny from $ip" . PHP_EOL;
			}
			
			$code .= PHP_EOL;
		}
		
		$code .= "# Generated via $wsWebsiteName #";
	}
?>

<div class="span9">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href="tools.php">Tools</a> <span class="divider">/</span></li>
		<li><a href="tools-server-robots.php">Server & Robots</a> <span class="divider">/</span></li>
		<li class="active">Htaccess Generator</li>
	</ul>
	
	<div class="page-header">
		<h2>Htaccess Generator</h2>
	</div>
	
	<form action="htaccess-generator.php" method="POST">
	<input type="hidden" name="go" value="true">
	
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
						<td class="valign-middle">Website Domain</td>
						<td>
							<input type="text" name="domain" value="<?=$headers->PostField('domain');?>" placeholder="domain.com" />
						</td>
					</tr>
					<tr>
						<td class="valign-middle">Document Index</td>
						<td>
							<select name="documentIndex">
								<option value="">Default</option>
								<option value="index.html index.php">index.html, index.php</option>
								<option value="home.html home.php">home.html, home.php</option>
								<option value="main.html main.php">main.html, main.php</option>
								<option value="default.html default.php">default.html, default.php</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="valign-middle">Force WWW</td>
						<td>
							<select name="forceWWW">
								<option value="Off">Disabled</option>
								<option value="On">Enabled</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="valign-middle">Force SSL</td>
						<td>
							<select name="forceSSL">
								<option value="Off">Disabled</option>
								<option value="On">Enabled</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="valign-middle">Show Indexes</td>
						<td>
							<select name="showIndexes">
								<option value="On">Enabled</option>
								<option value="Off">Disabled</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="valign-middle">Blocked IPs</td>
						<td>
							<textarea name="blockedIPs" style="height: 70px;">256.251.0.139
199.127.0.259</textarea>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="span5">
			<div class="well">
				<button class="btn btn-large span6 btn-success" type="button" onclick="document.forms[0].submit();">Generate Code</button>
				<button class="btn btn-large span6 btn-info" type="button" onclick="document.forms[0].action = 'htaccess-generator-dl.php'; document.forms[0].submit();">Download File</button>
				<div class="clearfix"></div>
			</div>
			<div class="well">
				<p>Here is the generated code. Please paste this into a blank htaccess file, or click the download button above.</p>
				
				<pre><?=$code;?></pre>
			</div>
		</div>
	</div>
</div>

</form>

<style type='text/css'>
	.valign-middle { vertical-align: middle !important; }
	input, select { margin-bottom: 0px !important; }
</style>

<?php
	require "structures/footer.php";
?>