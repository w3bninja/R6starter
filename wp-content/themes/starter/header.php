<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter
 */

			
include(locate_template('inc/settings.php'));	
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<title><?php bloginfo( 'name' ); ?></title>
	<meta name="Description" content="<?php bloginfo( 'name' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<meta property="og:title" content="<?php bloginfo( 'description' ); ?>"/>
	<meta property="og:description" content="<?php bloginfo( 'description' ); ?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>"/>
	<meta property="og:image" content="<?php bloginfo( 'template_url' ); ?>/assets/img/logo.png"/>
	
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<?php wp_head(); ?>
	<link href="<?php bloginfo( 'template_url' ); ?>/assets/css/styles.css" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<div class="loader"></div>
<div class="edge-menu">
	<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_id'        => '',
			'menu_class'	=> 'nav-accordion',
		) );
	?>
	  <?php
			wp_nav_menu( array(
				'theme_location' => 'mini',
				'menu_id'        => '',
				'menu_class'	=> 'nav-accordion',
			) );
		?> 
</div>
<div class="bg">
  <div class="header">
    <div class="header-top">
		<div class="container-fluid">
			<div class="row hidden-xs text-right">
			  <div class="col-sm-9 mini-nav">
				<div class="phone pull-left">
					<?php
							wp_nav_menu( array(
								'theme_location' => 'mini',
								'menu_class'	=> 'nav nav-pills',
							) );
						?>  
				</div>
			  </div>
			  <div class="col-sm-3 pull-right">
				<div class="search-container">
				  <div class="site-search">
					<form role="search" method="get" class="search-form" action="/">
					  <div class="input-group">
						<input type="search" class="form-control site-search" placeholder="Search" value="" name="s">
						<span class="input-group-addon">
						<input type="submit" class="search-submit" value="">
						<i class="fa fa-search"></i> </span> </div>
					</form>
				  </div>
				</div>
			  </div>
			</div>
		</div>
    </div>
    <div class="header-bottom sticky">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-3">
            <div class="row">
            	<div class="col-xs-2 hidden-sm hidden-md hidden-lg">
            		<div class="mobile-navigation pull-left"> <a class="edge-control"><i class="fa fa-bars"></i></a> </div>
            	</div>
            	<div class="col-xs-8 col-sm-12">
            	
            		<div class="logo">
					  <h1 title="Company Name"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?> | <?php echo $description; /* WPCS: xss ok. */ ?>"> <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/logo.png" class="img-responsive"> </a> </h1>
					</div>
            	</div>
            	<div class="col-xs-2 hidden-sm hidden-md hidden-lg">
            		<a href="tel:<?php echo $phone; ?>" class="btn btn-primary pull-right"><i class="fa fa-phone"></i></a>
            	</div>
            </div>
           
            
          </div>
          <div class="col-xs-7 col-sm-9 hidden-xs">
            <div class="navigation">
			  <div class="navigation-inner main-nav clearfix">
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
  </div>
	<?php if( is_front_page() ) { ?>
	
	
  <div class="page-header banner">
    <div class="banner-inner">
      <div class="slider">
		<?php
			$contentID = 37;
			$source = 'banner';
		?>
		<?php $bannerCount = 0; ?>
		<?php foreach( get_cfc_meta( $source, $contentID ) as $key => $value ){ ?>
		  <?php $bannerCount = $bannerCount + 1; ?>
			<?php $photo_obj = get_cfc_field( $source,'image', $contentID, $key );  ?>
			<div class="slide section" style="background:url(<?php echo $photo_obj['url']; ?>) no-repeat top center; background-size:cover;">
				<div class="slide-overlay"></div>
				<div class="slide-inner">
					<div class="container">
						<div class="row">
							<div class="col-md-7 col-centered">
								<h3><?php the_cfc_field( $source,'headline', $contentID, $key ); ?><span><?php the_cfc_field( $source,'subtext', $contentID, $key ); ?></span></h3>
								<div class="text">
									<a href="<?php the_cfc_field( $source,'link-text', $contentID, $key ); ?>" class="btn btn-primary btn-lg"> Read More </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }  ?>
    </div>
  </div>
  	<?php if ($bannerCount > 1){ ?>
		<div id="pager" class="pager controls"></div>
  		<div class="pager-arrows"> <a href="#" class="prev" id="prev"><i class="fa fa-angle-left"></i></a> <a href="#" class="next" id="next"><i class="fa fa-angle-right"></i></a> </div>
	<?php } ?>
  
	</div>
	<?php } else { ?>
		<div class="page-header"><h2 title="<?php single_post_title(); ?>"><?php single_post_title(); ?></h2></div>
	<?php } ?>
	
<div class="container">
	<div class="content section">
		<div class="content-inner">
			<div class="content-col">