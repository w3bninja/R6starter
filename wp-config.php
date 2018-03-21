<?php
# Database Configuration
define( 'DB_NAME', 'wp_r6starter' );
define( 'DB_USER', 'r6starter' );
define( 'DB_PASSWORD', 'NafoIeL221nYNWVty8QP' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '<EhPp|g1. J8V&5{XCaH9 !0c;VK;voy3-oRW,1qAWN=kw|,!r:G@hZ*~T4Umw-e');
define('SECURE_AUTH_KEY',  '6$;6oW3fd swi^X|S(8hwi8bwq)}d@!,e6NIx24j^V{G26|Ve*7xf-b8dCd+dHpQ');
define('LOGGED_IN_KEY',    '@P4B*8>w]T(j._j+[3kQ@G!ITo8=~!pBP5W}e2!8b`@*Jg{,sNGL3ZO#/S|58|d6');
define('NONCE_KEY',        '4A<{B|8rvr-x?3p(TkN-?31SxlSQQS;0M+ooUJ]I=Wka$.1{D(}()3rV!y|)dE[0');
define('AUTH_SALT',        'y#QmQ*6+6X_Y%kR8Gex+p+qZJ|bA#KK@N?=ViPWRPeZ>i_XpG%Enf;5YB:[MRl:S');
define('SECURE_AUTH_SALT', '+wn2fo3Thw:a})u5O6}c+5((cf#2wc!yCp8Buw,r/5%gO>}-[*1dCQlzZZ::LJVG');
define('LOGGED_IN_SALT',   '~j5002b^ZP|Q?7$w?{T+|4A0TtX$G|V.+-wBQWW(G$@3wjPo{7j 7t|/ *)RsQ]G');
define('NONCE_SALT',       'K*-E+ZE:b#<5^zW8r,8qe%|H5u?*o0JN-E<eSbX%L{HC|Q,Y*V$aP-k/syFcdZ v');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'r6starter' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'e68ddbf4f85b426d97ec6e37b9c1c03e1bd29ba1' );

define( 'WPE_CLUSTER_ID', '100759' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'r6starter.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-100759', );

$wpe_special_ips=array ( 0 => '104.196.165.71', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
