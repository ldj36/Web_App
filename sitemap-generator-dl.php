<?php
	ob_start();
	
	ini_set('memory_limit', '32M'); // safe limit
	
	// UPDATE (5/25/2013)
	// This script has been altered to free memory as it uses it.
	// Beware that memory issues can still arise.
	//
	// When generating for larger websites, an internal server error [500] may occur if the script is terminated while in progress.
	// This will not have any effect on the rest of the traffic on the server.
	
	if($_POST['go']) {
		$url = $_POST['url'];
		
		$freq = $_POST['frequency'];
		$priority = $_POST['priority'];

		function Path ($p)
		{
			$a = explode ("/", $p);
			$len = strlen ($a[count ($a) - 1]);
			return (substr ($p, 0, strlen ($p) - $len));
		}

		function GetUrl($url)
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
		}

		function Scan($url) {
			global $scanned, $pf, $extension, $skip, $freq, $priority;

			array_push ($scanned, $url);
			$html = GetUrl ($url);
			$a1 = explode ("<a", $html);

			foreach ($a1 as $key => $val) {
				$parts = explode (">", $val);
				$a = $parts[0];
				
				$aparts = explode ("href=", $a);

				$hrefparts = explode (" ", $aparts[1]);
				$hrefparts2 = explode ("#", $hrefparts[0]);

				$href = str_replace ("\"", "", $hrefparts2[0]);
			
				if ((substr ($href, 0, 7) != "http://") && (substr ($href, 0, 8) != "https://") && (substr ($href, 0, 6) != "ftp://")) {
					$scanned0 = $scanned[0];
					if(substr($scanned0, -1) == '/') $scanned0 = substr($scanned0, 0, -1);
				
					if ($href[0] == '/')
						$href = $scanned0 . "$href";
					else
						$href = Path ($url) . $href;
				}
			
				if (substr ($href, 0, strlen ($scanned[0])) == $scanned[0]) {
					$ignore = false;
					
					if (isset ($skip))
						foreach ($skip as $k => $v)
							if (substr ($href, 0, strlen ($v)) == $v)
								$ignore = true;
				
					if ((!$ignore) && (!in_array ($href, $scanned))) {
						sleep($_POST['speed']);
						
						echo "	<url>\n		<loc>$href</loc>\n" .
						"		<changefreq>$freq</changefreq>\n" .
						"		<priority>$priority</priority>\n	</url>\n\n";
				
						Scan ($href);
					}
				}
			}
			$html = null;
		}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
	xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
	xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9
	http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">

	<url>
		<loc>$url</loc>
		<changefreq>daily</changefreq>
	</url>\n\n";

			$scanned = array();
			Scan ($url);
			
			echo "</urlset>\n";
	}
	
	$fileName = $_POST['fname'];
	
	header('Content-type: text/xml');
	header('Content-Disposition: attachment; filename="' . $fileName . '"');
	
?>
