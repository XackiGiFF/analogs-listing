<?php

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
    echo 'Hacking attempt!';
	exit;
}

class AL_Activate {
    public static $al_prefs_table;

    public static function onEnable() {
        global $wpdb;
        add_option( 'al_modify_title', 0 ); // будет ли плагин по умолчанию обрабатывать заголовки записей. 0 - нет
        add_option( 'al_modify_content', 1 ); // --||-- тело записей. 1 - да
        
        $charset_collate = ''; // кодировка БД
        //if ( version_compare($wpdb->mysqli_get_server_info(), '4.1.0', '>=') )
        $charset_collate = "DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci"; // устанавливаем уникод
        
        if($wpdb->get_var( "SHOW TABLES LIKE '" . ANALOGS_TABLE . "'" ) != ANALOGS_TABLE) { // если таблица настроек плагина еще не создана - создаём
            $sql = "CREATE TABLE `" . ANALOGS_TABLE . "` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(255) NOT NULL default '',
            `body` VARCHAR(255) NOT NULL default '',
            UNIQUE KEY id (id)
            )$charset_collate";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); // обращение к функциям wordpress для
            dbDelta($sql); // работы с БД. создаём новую таблицу
        }
    }

    public static function onDisable(){
    }

    public static function onUninstall(){
        global $wpdb;
        delete_option( 'al_modify_title' );
        delete_option( 'al_modify_content' );
        delete_option( 'al_plugin_settings' );
        $sql = "DROP TABLE IF EXISTS " . ANALOGS_TABLE;
        $wpdb->query($sql);
    }
}