<div class="sm">
	<?php
		$contentID = 37;
		$source = 'smlinks';
	?>
	<?php foreach( get_cfc_meta( $source, $contentID ) as $key => $value ){ ?>
		<?php $smType = get_cfc_field( $source,'sm-type', $contentID, $key ); ?>
		<?php $smLink = get_cfc_field( $source,'sm-link', $contentID, $key ); ?>
		<?php $smTypeLower = strtolower($smType); ?>
		<a href="<?php echo $smLink ?>" title="<?php echo $smType ?>">
			<i class="fa <?php echo 'fa-' . $smTypeLower . '-square' ?>"></i>
		</a>
	<?php }  ?>
</div>