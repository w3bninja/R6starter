<?php 
	/*Full Address must be passed in to use this.*/
	$fullAddressMapFormat = strtolower(str_replace(' ', '+', $fullAddress));
	if ($mapType == NULL){
		$mapType = 1;
	}
	$mapAPI = 'AIzaSyDNE12LS3cPYeL_f6gjV5GYRFh5Dez_Isk'; /* API Key: https://developers.google.com/maps/documentation/javascript/get-api-key */
	$mapWidth = '300';
    $mapHeight = '200';
    $mapZoom = '15';
    
?>

<?php if ($mapType == 1){ /*Static Map*/ ?>
	<img src="<?php echo 'http://maps.googleapis.com/maps/api/staticmap?center=' . $fullAddressMapFormat . '&zoom=15&scale=false&size=300x200&maptype=roadmap&format=png&visual_refresh=true&markers=size:mid%7Ccolor:0xff0000%7Clabel:%7C' . $fullAddressMapFormat ?>" class="img-responsive">
<?php } ?>
<?php if ($mapType == 2){ /*Interactive Map*/ ?>
	<iframe src="<?php echo 'http://maps.google.com/maps?q=' . $fullAddressMapFormat . '&output=embed' ?>" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
<?php } ?>
<?php if ($mapType == 3){ /*Directions*/ ?>
	<?php include(locate_template('inc/maps/directions.php')); ?>
<?php } ?>
<?php if ($mapType == 4){ /* Custom Map */ ?>
	<?php include(locate_template('inc/maps/custom.php')); ?>
<?php } ?>

<div class="text-right">
	<a href="<?php echo 'https://www.google.com/maps/dir//' . $fullAddressMapFormat ?>/" target="_blank"><small>Get Directions</small></a>
</div>