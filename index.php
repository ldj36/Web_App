<?php
	require "structures/header.php";
?> 
        <div class="span9">
          <div class="hero-unit">
            <h1><?=$settings['HeroTitle'];?></h1>
            <p><?=$settings['HeroText'];?></p>
            <p><a href="tools.php" class="btn btn-primary btn-large"><?=$settings['HeroButtonText'];?></a></p>
          </div>
          <div class="row-fluid">
            <div class="span4">
              <h2>Server & Robots</h2>
              <p>We provide unique tools to help serve your websites needs in optimization for robots and server configuration. Your website should be set up how you want it, and our variety of tools here will help you in the journey of configuration.</p>
              <p><a class="btn" href="tools-server-robots.php">See tools &raquo;</a></p>
            </div>
            <div class="span4">
              <h2>Optimization</h2>
              <p>We provide a set of search engine optimization tools to support the growth of your website through the top search engines. Use our set of tools to see the most out of your website - the true potential of the search engines and their impact on you.</p>
              <p><a class="btn" href="tools-optimization.php">See tools &raquo;</a></p>
            </div>
            <div class="span4">
              <h2>Security</h2>
              <p>Web security is probably the most important factor of the internet. Being insecure could potentially crush what you love so much. Our tools help keep your website, and yourself, safe and secure. See what we have to offer by clicking below.</p>
              <p><a class="btn" href="tools-security.php">See tools &raquo;</a></p>
            </div>
          </div>
          <div class="row-fluid">
            <div class="span4">
              <h2>Lookups</h2>
              <p>It can be hard to find information about websites these days. However, there are some utilities that provide information about the websites you need to know most. Give our lookup tools a first attempt and see how we can contribute.</p>
              <p><a class="btn" href="tools-lookups.php">See tools &raquo;</a></p>
            </div>
            <div class="span4">
              <h2>Developers</h2>
              <p>Web developement can be a heavy task, but with our selection of quick resources and references, you can make developement as light as a feather. It is easy to launch an application using our studio, just have a look!</p>
              <p><a class="btn" href="tools-developers.php">See tools &raquo;</a></p>
            </div>
            <div class="span4">
              <h2>Miscellaneous</h2>
              <p>We offer more tools to help in the task of web development. Use these tools for increased deployement speed and improve the performance or attractiveness of your web application. These are the top-used tools today.</p>
              <p><a class="btn" href="tools-miscellaneous.php">Get started &raquo;</a></p>
            </div>
          </div>
        </div>
<?php
	require "structures/footer.php";
?>
