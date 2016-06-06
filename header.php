<?php

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php bloginfo('name'); ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php ?>

<?php ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); 
?>

</head>

<body 
	<?php body_class(); 
	?>
>

<main class="container">

	<!-- Publicidade -->
		<div class="qr-ad">
			<!-- Tag de Publicidade -->
		</div>
	<!-- Publicidade -->


	<!-- Menu principal de Navegação -->
	<nav class="navbar navbar-default qr-navbar-default">
	  <div class="qr-container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand qr-navbar-brand" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
	        <img alt="Brand" src="<?php echo get_template_directory_uri(); ?>/images/logo_4rodas.png" width="130">
	      </a>
	    </div>

	 

	    <!-- Collect the nav links, forms, and other content for toggling -->

	        <?php
	            wp_nav_menu( array(
	                'menu'              => 'primary',
	                'theme_location'    => 'primary',
	                'depth'             => 2,
	                'container'         => 'div',
	                'container_class'   => 'collapse navbar-collapse navbar-left',
	       			'container_id'      => 'bs-example-navbar-collapse-1',
	                'menu_class'        => 'nav navbar-nav',
	                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	                'walker'            => new wp_bootstrap_navwalker())
	            );
	        ?>
	    
	        <form class="navbar-form navbar-left qr-navbar-left" role="search">
	        <div class="form-group qr-search-bar">
	          <input type="text" class="form-control qr-input-search" placeholder="Search">
	           <span class="glyphicon glyphicon-search qr-icon-search" aria-hidden="true"></span>
	        </div>
	      </form>

	  </div><!-- /.container-fluid -->
	</nav>
	<!-- Menu principal de Navegação -->

	
				

	<!-- Popular -->
	<section class="qr-popular">
		 <button type="button" class="navbar-toggle collapsed navbar-toggle-popular" data-toggle="collapse" data-target="#nav-popular" aria-expanded="false">
	        <span>+ ACESSADOS</span>
	      </button>
		<nav class="qr-popular-nav collapse navbar-collapse" id="nav-popular">
		<ul>
		    <?php wp_list_categories( array(
		        'orderby' => 'name',
		        'title_li' => '',
		    ) ); ?> 
		</ul>
			
		</nav>
	</section>

