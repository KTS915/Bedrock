<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
		</div><!-- #content -->

		<?php get_sidebar( 'sidebar2' ); ?>

	</div><!-- #outer-content -->

	<footer id="colophon" class="colophon outer-width">
		<div class="colophon-inner">

			<div id="footer-links-container" class="footer-links-container" role="navigation" aria-labelledby="links-label">
				<span id="links-label" class="screen-reader-text">Footer Menu</span>

				<?php
				wp_nav_menu( array(
					'menu_id'			=> 'footer-links',
					'theme_location'	=> 'footer-links',
					'container'		=> ''
				) );
				?>

			</div><!-- #footer-links-container -->

			<div id="notices" class="notices">

				<div class="copyright">Copyright &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); esc_html_e( '. All Rights Reserved.', 'bedrock' ) ?></div>

				<a href="<?php echo esc_url( __( 'https://www.classicpress.net/', 'bedrock' ) ); ?>"><?php esc_html_e( 'Proudly powered by ClassicPress', 'bedrock' ); ?></a>
			
				<span> | </span>

				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s', 'bedrock' ), '<a href="https://github.com/timkaye/bedrock">Bedrock</a>', '<a href="https://timkaye.org">Tim&nbsp;Kaye</a>' );
				?>
			</div>

		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
