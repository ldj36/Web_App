<?php
	if(!file_exists("data/APP-INF.dat")) exit("<h1>Application Error</h1><p>The file <b>APP-INF.dat</b> is missing from the application and is required to run properly.</p><p>If you have not yet installed the application, visit the <a href='install/index.php'>installation</a> page.</p>");

	$items = array(
		'Server & Robots',
		array('Htaccess Generator', 'htaccess-generator.php', 'icon-cog'),
		array('Robots.txt Generator', 'robots-txt-generator.php', 'icon-globe'),
		array('Sitemap Generator', 'sitemap-generator.php', 'icon-briefcase'),
		array('Robot Mode', 'robot-mode.php', 'icon-hdd'),
		array('Speed Test', 'speed-test.php', 'icon-time'),
		
		'Optimization',
		array('Meta Tags Generator', 'meta-tags-generator.php', 'icon-wrench'),
		array('Keyword Cleaner', 'keyword-cleaner.php', 'icon-refresh'),
		array('Keyword Generator', 'keyword-generator.php', 'icon-cog'),
		array('PageRank Lookup', 'pagerank-lookup.php', 'icon-tasks'),
		array('Backlink Lookup', 'backlink-lookup.php', 'icon-resize-small'),
		array('Indexed Pages Lookup', 'indexed-pages-lookup.php', 'icon-list-alt'),
		array('Character Length', 'character-length.php', 'icon-list'),
		
		'Security',
		array('Password Generator', 'password-generator.php', 'icon-asterisk'),
		array('Hash Generator', 'hash-generator.php', 'icon-lock'),
		
		'Lookups',
		array('Whois Lookup', 'whois-lookup.php', 'icon-question-sign'),
		array('HTTP Header Lookup', 'http-header-lookup.php', 'icon-info-sign'),
		
		'Developers',
		array('Graphs and Charts', 'graphs-and-charts.php', 'icon-adjust'),
		array('Script Resources', 'script-resources.php', 'icon-folder-open'),
		array('Live HTML Editor', 'live-html-editor.php', 'icon-edit'),
		
		'Miscellaneous',
		array('PayPal Generator', 'paypal-generator.php', 'icon-tags'),
		array('Map Image Generator', 'map-image-generator.php', 'icon-map-marker')
	);
	
	foreach($items as $item) {
		$isActive = false;
		
		if(is_array($item)) {
			if(strpos($_SERVER['REQUEST_URI'], $item[1]) !== false) $isActive = true;
		}
		
		$enabled = true;
		$checkName = str_replace(array(".", " "), array("_", "_"), $item[0]);
		if($settings[$checkName] == 'Off') $enabled = false;
		
		if($enabled) { 
		if(is_array($item)) {
?>
              <li class="<?=($isActive ? 'active' : '');?>"><a href="<?=$item[1];?>"><?php if($settings['NavigationIcons'] == 'On') { ?><i class="<?=$item[2];?>"></i> <?php } ?><?=$item[0];?></a></li>
<?php
		} else {
?>
              <li class="nav-header"><?=$item;?></li>
<?php
		} }
	}
?>
