<?php
if (get_the_terms($post->ID, 'service-types')) {
	$taxonomy_ar = get_the_terms($post->ID, 'service-types');
	
	
	foreach ($taxonomy_ar as $taxonomy_term) {
		$taxValue = $taxonomy_term->name;
		$taxDashed = str_replace(' ', '-', $taxValue);
		echo '<a href="#'. $taxDashed . '">' . $taxValue .'</a>';
	}
}
?>