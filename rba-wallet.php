<?php
/**
 * Plugin Name: RBA Wallet
 * Plugin URI: https://wordpress.org/plugins/rba-wallet
 * Description: RBA Wallet is a Woocommerce payment gateway for RBA Wallet
 * Author: Selim Ahmad
 * Version: 1.0.0
 * text-domain: rba-wallet
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( ! in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) return;
/**
 * rba_wallet
 *
 *
 * @class       WC_Gateway_rba_wallet
 * @extends     WC_Payment_Gateway
 * @version     2.1.0
 * @package     WooCommerce\Classes\Payment
 */

global $rba_db_version;
$rba_db_version = '1.0';

function rba_wallet_install() {
    global $wpdb;
    global $rba_db_version;

    $table_name = $wpdb->prefix . 'rba_currencies';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name tinytext NOT NULL,
		address text NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'rba_db_version', $rba_db_version );
}
register_activation_hook( __FILE__, 'rba_wallet_install' );

add_action('plugin_loaded', 'rba_cripto_wallet_init', 11);

function rba_cripto_wallet_init(){

	require_once plugin_dir_path(__FILE__) . '/includes/adminpage.php';
	if( class_exists('WC_Payment_Gateway') ){
		require_once plugin_dir_path(__FILE__) . '/includes/Class_Rba_Wallet.php';
	}
}

add_filter('woocommerce_payment_gateways', 'add_rba_wallet');

function add_rba_wallet( $gateways ){
    $gateways[] = 'Class_Rba_Wallet';
    return $gateways;
}

/**
 * List
 * */
// returns the root directory path of particular plugin
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'includes/rba_list.php');
require_once (ROOTDIR.'includes/rba_insert.php');
require_once (ROOTDIR.'includes/rba_update.php');
require_once (ROOTDIR.'includes/rba_delete.php');