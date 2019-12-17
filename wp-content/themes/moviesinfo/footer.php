<footer>
    <div class="container-fluid">
		<?php dynamic_sidebar( 'footer-sidebar' ); ?>

		<?php if ( get_theme_mod( 'footer_copy' ) ) { ?>
			<?php echo get_theme_mod( 'footer_copy' ); ?>
		<?php } ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

