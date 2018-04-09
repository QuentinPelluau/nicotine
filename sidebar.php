<aside>
    <h2>h2 sidebar.php</h2>

    <?php al_render_post_type('projets'); ?>

    <?php if(($options = get_option( 'al_plg_mag_info' )) && $options['mag_info'] == 'show_sponsor' ) :  ?>
        <p>sponsor Linux Magazine</p>
    <?php endif; ?>

<!-- filter example -->
    <?php echo al_example_filter(5,5); ?>
</aside>