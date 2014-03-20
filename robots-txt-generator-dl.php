<?php
	ob_start();
	
	if($_POST['go']) {
		$code = '';
		
		$engines = array(
			'Googlebot',
			'Googlebot-Image',
			'Googlebot-Mobile',
			'MSNBot',
			'PSBot',
			'Slurp',
			'Yahoo-MMCrawler',
			'yahoo-blogs/v3_9',
			'teoma',
			'Scrubby',
			'ia_archiver'
		);
		
		foreach($engines as $i) {
			$code .= 'User-agent: ' . $i . PHP_EOL;
			
			$code .= 'Disallow: ';
			if(!$_POST[$i]) $code .= "/";
			$code .= PHP_EOL . PHP_EOL;
		}
		
		header('Content-type: text/plain');
		header('Content-Disposition: attachment; filename="robots.txt"');
		$code = str_replace(PHP_EOL, "\r\n" . PHP_EOL, $code);
		echo $code;
	}
?>
