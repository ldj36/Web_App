<?php
	ob_start();
	
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
		
		header('Content-type: text/plain');
		header('Content-Disposition: attachment; filename=".htaccess"');
		$code = str_replace(PHP_EOL, "\r\n" . PHP_EOL, $code);
		echo $code;
	}
?>