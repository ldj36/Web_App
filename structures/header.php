<?php
	ob_start();
	session_start();
	
	if(!file_exists("data/APP-INF.dat")) exit("<h1>Application Error</h1><p>The file <b>APP-INF.dat</b> is missing from the application and is required to run properly.</p><p>If you have not yet installed the application, visit the <a href='install/index.php'>installation</a> page.</p>");
	
	// Warning: Do not delete the APP-INF.dat file. It contains crucial information that cannot be read nor reproduced by humans.
	// If it is deleted, the application will terminate service and show an 'Application Error'.
	// HOWEVER, be advised that you can recover this file!
	// To do this, log into the admin panel and you should be presented with an option to recompile this file.
	
	// !!!
	// DO NOT, under ANY circumstances, attempt to make the application run without the APP-INF.dat file!
	// !!!
	
	if(!file_exists("data/config.dat")) exit("<h1>Application Error</h1><p>The configuration file is missing. Please <a href='install/index.php'>install</a> the application.</p>");

	$settingsFile = "data/config.dat";
	$settingsData = file_get_contents($settingsFile);
	$settings = json_decode($settingsData, true);
	
	require "config.php";
	require "php/document.php";
	require "php/headers.php";
	
	$document = new Document();
	$document->setAttribute('title', ((empty($title)) ? $wsWebsiteName : $title . " - " . $wsWebsiteName));
	
	$headers = new Headers();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=$document->getAttribute('title');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="<?=$settings['Author'];?>">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/toggle-buttons.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery.js"></script>

    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./"><?=$wsWebsiteName;?></a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              <?php if($settings['AdminButton'] == 'On') { ?><a href="admin/login.php" class="navbar-link">Administration</a><?php } ?>
            </p>
            <ul class="nav">
              <li><a href="./">Main Page</a></li>
              <li><a href="tools.php">Tools</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
			  <?php require "structures/side.nav.php"; ?>
            </ul>
          </div>
        </div>
