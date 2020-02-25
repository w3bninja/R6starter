<?php
$contentID = 95;
$source = 'company-info';
$address1 = get_cfc_field( $source,'company-address-1', $contentID);
$address2 = get_cfc_field( $source,'company-address-2', $contentID);
$city = get_cfc_field( $source,'company-city', $contentID);
$state = get_cfc_field( $source,'company-state', $contentID);
$zip = get_cfc_field( $source,'company-zip-code', $contentID);
$phone = get_cfc_field( $source,'company-phone-number', $contentID);
?>