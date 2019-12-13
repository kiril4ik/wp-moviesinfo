<footer>
    <?php dynamic_sidebar( 'footer-sidebar' ); ?>

    <?php if(get_theme_mod('footer_copy')) { ?>
        <?php echo get_theme_mod('footer_copy'); ?>
    <?php } ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>

