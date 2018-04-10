<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter
 */

?>

<?php wp_footer(); ?>
		</div>
	</div>
  </div>
</div>


<div class="footer">
  <div class="footer-top">
    <div class="container clearfix">
      	<div class="pull-left"> 
      		<div class="copyright">© 2018, <a href="/" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a> | <a href="http://redsixmedia.com" target="_blank" title="Red Six Media is an award-winning, full-service advertizing agency with services ranging from advertizing and graphic design to web development and brand strategy.">Website Design</a> by R6.</div>
		</div>
      
      <div class="nav-footer pull-right clearfix hidden-xs hidden-sm">
        <div class="navigation col-md-12 hidden-xs">
          <div class="navigation-inner main-nav clearfix">
            <div id="Menu">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id'        => 'MenuList',
						'menu_class'	=> 'nav nav-pills nav-justified',
					) );
				?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
  	<div class="container">
  	<div class="row">
		<div class="col-sm-4">
			<h5>Our Location</h5>
			<div class="contact-info">
				<address>
				12345 Address Blvd.<br>
				Baton Rouge, La. 70710
				</address>

				Call Us Today!<br>
				<h5>555-555-5555</h5>
				<hr>
				<?php include(locate_template('inc/social-icons.php')); ?>
			</div>
		</div>
		<div class="col-sm-4">
			<h5>From the Blog</h5>
			<div class="blog-list">
				<?php
					$args = array( 'numberposts' => '5', 'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => 'post-format-aside',
								'operator' => 'NOT IN'
							), 
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => 'post-format-image',
								'operator' => 'NOT IN'
							)
					) );
				?>
				<?php
					$recent_posts = wp_get_recent_posts( $args );
					foreach( $recent_posts as $recent ){
				?>
				<article>
					<div class="date"><?php $recent["post_date"] ?></div>
					<?php echo '<a href="' . get_permalink($recent["ID"]) . '">' .   ( __($recent["post_title"])).'</a><br>' .   ( __($recent["post_excerpt"])).''; ?>
				</article>
				<?php
					}
					wp_reset_query();
				?>
			</div>
			<a href="/blog" class="btn btn-primary">Read More</a>
		</div>
		<div class="col-sm-4">
			<h5>Contact Us</h5>
			<form class="contact-form">
				<div class="form-group">
					<input class="form-control" type="text" placeholder="Name">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" placeholder="Phone">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" placeholder="Email">
				</div>
				<input class="btn btn-primary" type="submit" value="Send">
			</form>
		</div>
	</div>
	</div>
  </div>
</div>

</div>
<a href="#" class="btn btn-default back-to-top"><i class="fa fa-chevron-up"></i></a>


<link href="<?php bloginfo( 'template_url' ); ?>/assets/css/styles.css" rel="stylesheet">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- ADD JPUSHMENU -->
<link href="<?php bloginfo( 'template_url' ); ?>/assets/css/jPushMenu.css" rel="stylesheet">
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/jPushMenu.js"></script>

<!-- ADD CYCLE -->
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/jquery.cycle2.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/jquery.cycle2.carousel.min.js"></script>

<!-- ADD FANCYBOX -->
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/js/fancy/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/fancy/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- ADD RESPONSIVE TABS -->
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/responsive-tabs.css">
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/jquery.responsiveTabs.min.js"></script>

<!-- PARALLAX -->
<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/parallax.min.js"></script>

<!-- Isotope -->
<script type='text/javascript' src='http://aaronlandry.net/js/jquery.isotope.min.js'></script>
<script type='text/javascript' src='http://isotope.metafizzy.co/isotope.pkgd.js'></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>


<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/javascript.js"></script>
</body>
</html>