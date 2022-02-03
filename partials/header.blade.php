<header id="header">
 	<div class="container">
 		<div class="logo">
 			<a href="{{ home_url('/') }}">
 				{{ Helper::image(get_field('header_logo', 'option'), 'full', array('width' => '170', 'height' => '100', 'class' => 'display-logo', 'alt' => 'HERITAGE PREPARATORY SCHOOL')) }}
 				{{ Helper::image(get_field('header_sticky_logo', 'option'), 'full', array('width' => '53', 'height' => '53', 'class' => 'sticky-logo', 'alt' => 'HERITAGE PREPARATORY SCHOOL')) }}
 			</a>
 		</div>
 		<a href="#" class="nav-opener"><span><i class="for-sr">Menu</i></span></a>
 		<nav id="nav">
	 		<?php
	 		  wp_nav_menu (array(
	 		    'theme_location' => 'main_nav',
	 		    'container' => false,
	 		    'container_class' => '',
	 		    'menu_id' => '',
	 		    'menu_class' => '',
	 		    'link_before' => '<span>',
	 		    'link_after' => '</span>',
	 		    'walker'     => new WPSE_KEW_Sublevel_Walker
	 		  ));
	 		?>
 		</nav>
 	</div>
</header>