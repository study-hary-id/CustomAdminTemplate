<div class="wrap">
    <h1>Custom Settings</h1>
    <?php settings_errors(); ?>
    <form action="options.php" method="post">
        <?php
        settings_fields( 'custom_admin_settings' );
        do_settings_sections( 'custom_admin_settings_general' );
        submit_button();
        ?>
    </form>
</div>
