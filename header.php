<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<title><?php if ( is_front_page() ) { bloginfo('description');?>&nbsp;<? bloginfo('name'); } else { bloginfo('name');?>:&nbsp;<? wp_title(''); } ?></title>

		<!-- Meta tags -->
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- Don't forget to update the bookmark icons (favicon.ico and apple-touch-icons) in the root: http://mathiasbynens.be/notes/touch-icons -->

		<!-- CSS -->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" />
		<!--[if lte IE 8]>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/ie.css" />
		<![endif]-->
	<?php if (is_front_page()) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/slider_accordion.css" />
	<?php } ?>
		<!--Wordpress Neccessities -->
		<?php wp_enqueue_script('jquery'); ?> 
		<?php wp_head(); ?>
		<!-- JavaScript -->
		<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40512757-1', 'auto');
  ga('send', 'pageview');

</script>
	</head>
	
	<body>
		<div id="container-head">
			
			<div id="header">
				
				<div id="header-left">
				<div id="logo"><a href="http://krieger.jhu.edu" title="Johns Hopkins University Zanvyl Krieger School of Arts & Sciences"><img src="<?php bloginfo('template_url'); ?>/assets/img/logo.png" alt="Johns Hopkins University Zanvyl Krieger School of Arts & Sciences" /></a></div>
				</div> <!-- End header-left -->
			
				<div id="header-right">
					
					<div id="blogtitle">
					<a href="<?php echo get_home_url(); ?>"><h1 class="little"><?php bloginfo('description'); ?></h1>
					<h1><?php bloginfo('name'); ?></h1></a>
					</div>
					
					<div id="searchbar">
					<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div><input type="text" size="put_a_size_here" name="s" id="s" value="Search this site" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
<input type="submit" id="searchsubmit" value="Search" class="btn" />
</div>
</form>
					</div>
					
					
					
				</div><!-- End header-right -->

			
			</div> <!-- End header -->
									<div id="nav">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
					<div class="clearboth"></div> <!--to have background work properly -->
					</div> <!--End nav -->
		</div> <!-- End container-head-->

		<div id="nav-break"></div>
	
									
