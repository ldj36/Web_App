<?php
	// config.php //
	// Do NOT edit this file manually. //
	// To change configuration settings, log into the admin panel. //
	// Visit the /admin/ directory in your web browser. //
	
	if(!file_exists("data/config.dat")) exit("<h1>Application Error</h1><p>The configuration file is missing. This is likely due to the <b>data</b> folder missing, or the application has not yet been installed. Please <a href='install/index.php'>install</a> now if that is the case.</p>");
	
	$wsWebsiteName = $settings['Name'];
	$wsWebsiteAuthor = $settings['Author'];
	$wsWebsiteYear = $settings['Year'];
	$wsWebsiteURL = $settings['URL'];
	
	if(!file_exists("data/APP-INF.dat")) exit("<h1>Application Error</h1><p>The file <b>APP-INF.dat</b> is missing from the application and is required to run properly.</p><p>If you have not yet installed the application, visit the <a href='install/index.php'>installation</a> page.</p>");
?>
