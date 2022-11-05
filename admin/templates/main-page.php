<div class="wrap">
    <h1><?php _e('Analogs Main Page', 'analogs') ?></h1>
    <?php
    $data = AL_Admin::get_content();
    $id = $data['id'] ?? 0;
    $title = $data['title'] ?? '';
    $body = $data['body'] ?? '';

    //var_dump($data);
    ?>
    <form method="POST" action="<?php echo admin_url( 'admin-post.php' ) ?>">
        <?php wp_editor( $body, 'wp_editor', array(
            'textarea_name' => 'analog_code',
            'textarea_rows' => 10
        ) ); ?>
        <?php wp_nonce_field( 'analogs_action', 'analogs_nonce' ) ?>
        <input type="hidden" name="analog_id" value="<?php echo $id ?>">
        <input type="hidden" name="action" value="save_analogs">

        <p class="submit">
            <button class="button button-primary" type="submit">
                <?php _e( 'Save', 'analogs' ) ?>
            </button>
        </p>
    </form>
</div>