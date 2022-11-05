<?php

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
    echo 'Hacking attempt!';
	exit;
}

class AL_Main {
    public function __construct() {
        $this->load_dependencies();
        $this->init_hooks();
        $this->define_admin_hooks();
        $this->define_public_hooks();
        //file_put_contents( ANALOGS_LISTING_DIR . 'log.txt', "Work!\n", FILE_APPEND );
    }

    private function init_hooks() {
        
    }

    private function load_dependencies() {
        require_once ANALOGS_LISTING_DIR . 'admin/class-al-admin.php';
        require_once ANALOGS_LISTING_DIR . 'public/class-al-public.php';
    }

    private function define_admin_hooks() {
        $plugin_admin = new AL_Admin();

    }

    private function define_public_hooks() {
        $plugin_public = new AL_Public();

    }

    public static function get_table_handle() {
        global $wpdb;
        return $wpdb->prefix . "al_preferences"; // создаём имя таблицы настроек плагина
    }

}