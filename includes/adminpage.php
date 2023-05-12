<?php   
/**
 * Register a custom menu page.
 */

add_action( 'admin_menu', 'rba_admin_menu' );
// (3) Add page
function rba_admin_menu() {
	//adding plugin in menu
    add_menu_page('RBA Wallet', //page title
        'RBA Wallet List', //menu title
        'manage_options', //capabilities
        'rba_wallet', //menu slug
        'rba_wallet_list' //function
    );
    //adding submenu to a menu
    add_submenu_page('rba_wallet',//parent page slug
        'Add RBA Currency',//page title
        'Add RBA Currency',//menu titel
        'manage_options',//manage optios
        'add_rba_currency',//slug
        'add_rba_currency'//function
    );
    add_submenu_page( null,//parent page slug
        'Update RBA Currency',//$page_title
        'Update RBA Currency',// $menu_title
        'manage_options',// $capability
        'update_rba_wallet',// $menu_slug,
        'update_rba_wallet'// $function
    );
    add_submenu_page( null,//parent page slug
        'Delete RBA Currency',//$page_title
        'Delete RBA Currency',// $menu_title
        'manage_options',// $capability
        'delete_rba_wallet',// $menu_slug,
        'delete_rba_wallet'// $function
    );
}
