<div class="sm">
	<?php
		$contentID = 95;
		$source = 'smlinks';
	?>
	<?php foreach( get_cfc_meta( $source, $contentID ) as $key => $value ){ 
		$smType = get_cfc_field( $source,'sm-type', $contentID, $key );
		$smLink = get_cfc_field( $source,'sm-link', $contentID, $key );
		$smTypeLower = strtolower($smType);
		if($smType != 'Instagram'){
			$smTypeClass = 'fa-' . $smTypeLower . '-square';
		}else{
			$smTypeClass = 'fa-' . $smTypeLower . '';
		}
		
	?>
		<a href="<?php echo $smLink ?>" title="<?php echo $smType ?>">
			<i class="fa <?php echo $smTypeClass ?>"></i>
		</a>
	<?php }  ?>
</div>