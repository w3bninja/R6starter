<?php 
if (empty($pageCount)) {
    $pageCount = 10;
}
$args = array( 'post_type' => 'faq', 'posts_per_page' => $pageCount );
$loop = new WP_Query( $args );
?>
<div class="responsiveTabs accordion">
  <ul class="tab-nav">
	<?php $tabCountNav = 0; ?>
  	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <li class="tab-li">
    	<a href="#tab-<?php echo $tabCountNav; ?>" class="tab-label">
        	<?php the_title( '', '' ); ?>
    	</a>
    </li>
	  <?php $tabCountNav++;?>
   	<?php endwhile; ?>
  </ul>
	<?php $tabCount = 0; ?>
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
  <div class="tab-description" id="tab-<?php echo $tabCount; ?>">
    <?php the_content(); ?>
  </div>
	<?php $tabCount++;?>
<?php endwhile; ?>
</div>