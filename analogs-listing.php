<?php
/*
 * Plugin Name: Analogs Listings
 * Plugin URI: http://github.com/XackiGiFF/analogs-listings
 * Description: Плагин разработан специально для проекта INAVTO47.RU для отображения аналогичных товаров в карточке товара.
 * Version: 0.0.1
 * Author: XackiGiFF
 * Author URI: http://github.com/XackiGiFF
 * Text Domain: analogs-listing
 */

if ( ! defined( 'ABSPATH' ) ) {
    echo 'Hacking attempt!';
	exit;
}

define( 'ANALOGS_LISTING_DIR', plugin_dir_path( __FILE__ ) );
define( 'ANALOGS_LISTING_URL', plugin_dir_url( __FILE__ ) );
define( 'ANALOGS_LISTING_NAME', dirname( plugin_basename( __FILE__ ) ) );


register_activation_hook( __FILE__ , 'onEnable' );
register_deactivation_hook( __FILE__ , 'onDisable' );
register_uninstall_hook( __FILE__ , 'onUninstall' );

function onEnable() {
    require_once ANALOGS_LISTING_DIR . 'includes/class-al-activate.php';
    AL_Activate::onEnable();
}

function onDisable() {
    require_once ANALOGS_LISTING_DIR . 'includes/class-al-activate.php';
    AL_Activate::onDisable();
}

function onUninstall() {
    require_once ANALOGS_LISTING_DIR . 'includes/class-al-activate.php';
    AL_Activate::onUninstall();
}

require_once ANALOGS_LISTING_DIR . 'includes/class-al-main.php';
function run_analogs() {
    $plugin = new AL_Main();
    define( 'ANALOGS_TABLE', $plugin->get_table_handle() );
}

run_analogs();
?>