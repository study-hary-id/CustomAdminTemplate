<h1>Alecadd Plugin</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php
    settings_fields( 'alecadd_options_group' );
    do_settings_sections( 'alecadd_plugin' );
    submit_button();
    ?>
</form>
