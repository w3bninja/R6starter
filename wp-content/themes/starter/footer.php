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
include(locate_template('inc/settings.php'));
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
      		<div class="copyright">© <?php echo date('Y'); ?>, <a href="/" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a> | <a href="http://redsixmedia.com" target="_blank" title="Red Six Media is an award-winning, full-service advertizing agency with services ranging from advertizing and graphic design to web development and brand strategy.">Website Design</a> by R6.</div>
		</div>
      
      <div class="nav-footer pull-right clearfix hidden-xs hidden-sm">
        <div class="navigation col-md-12 hidden-xs">
          <div class="navigation-inner main-nav clearfix">
            <div id="Menu">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
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
				<?php echo $address1; ?><?php echo $address2; ?><br>
				<?php echo $city; ?>, <?php echo $state; ?>. <?php echo $zip; ?>
				</address>

				Call Us Today!<br>
				<h5><?php echo $phone; ?></h5>
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
				<?php }	wp_reset_query(); ?>
			</div>
			<a href="/blog" class="btn btn-primary">Read More</a>
		</div>
	</div>
	</div>
  </div>
</div>

</div>



<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/jquery.min.js"></script>

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/jquery.swipe.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/jquery.touch.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/edge-menu.js"></script>

<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/jquery.fitVids.js"></script>

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/slick.min.js"></script>

<?php if (is_page('projects')) { ?>
<!-- Isotope -->
<script type='text/javascript' src='<?php bloginfo( 'template_url' ); ?>/assets/js/isotope.pkgd.js'></script>
<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/packery-mode.pkgd.js"></script>
<?php }else{ ?>
<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/packery.pkgd.min.js"></script>
<?php } ?>
<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/imagesloaded.pkgd.min.js"></script>


<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/assets/js/javascript.js"></script>
</body>
</html>