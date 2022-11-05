<?php

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
    echo 'Hacking attempt!';
	exit;
}

class AL_Admin {

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
        add_action( 'admin_post_save_analogs', array( $this, 'save_analogs' ) );
    }

    public function admin_menu() {
        add_menu_page( __( 'Analogs Admin', 'analogs' ), __('Analogs', 'analogs'), 'manage_options', 'analogs-main', array( $this, 'render_main_page'), 'dashicons-pressthis' );
    }

    public function save_analogs() {
        if ( ! isset( $_POST['analogs_nonce'] ) || ! wp_verify_nonce( $_POST['analogs_nonce'], 'analogs_action' ) ) {
            wp_die( __('Error!', 'analogs') );
        }
        
        $code = isset( $_POST['analog_code'] ) ? trim( wp_unslash( $_POST['analog_code'] ) ) : '';
        $id = isset( $_POST['analog_id'] ) ? (int) $_POST['analog_id'] : 0;

        global $wpdb;

        $sql = "UPDATE " . ANALOGS_TABLE . " SET body = %s WHERE id = $id";

        $wpdb->query( $wpdb->prepare( $sql, $code ) );
        wp_redirect( $_POST['_wp_http_referer'] );
        die;
    }
    
    public function render_main_page() {
        require_once ANALOGS_LISTING_DIR . 'admin/templates/main-page.php';
    }

    public static function get_content() {
        global $wpdb;
        return $wpdb->get_row( "SELECT * FROM " . ANALOGS_TABLE . " LIMIT 1", ARRAY_A);
    }

}