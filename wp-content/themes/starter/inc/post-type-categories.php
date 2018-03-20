<?php
$taxonomy = 'service-types';
$terms = get_terms($taxonomy); // Get all terms of a taxonomy

if ( $terms && !is_wp_error( $terms ) ) :
?>
	<ul class="nav nav-pills iso-filters filter option-set button-group" data-filter-group="type">
		<li><a href="#filter-type-any" class="button is-checked" data-filter="">All</a></li>
		<?php foreach ( $terms as $term ) { 
			$taxValue = $term->name;;
			$taxDashed = strtolower(str_replace(' ', '-', $taxValue));
			$taxLink = get_term_link($term->slug, $taxonomy);
		?>
			<li><a href="#<?php echo $taxDashed ?>" class="button is-checked" data-filter=".<?php echo $taxDashed ?>"><?php echo $taxValue; ?></a></li>
		<?php } ?>
	</ul>
<?php endif;?>
