<?php

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
    echo 'Hacking attempt!';
	exit;
}

class AL_Public {
    public function __construct() {
        //file_put_contents( ANALOGS_LISTING_DIR . 'log.txt', "Public!\n", FILE_APPEND );
    }
}