<?php

global $global_options;
?>

<footer class="footer">
	<div class="container footer-container">
		<div class="footer_about">
			<img src="<?php echo $global_options['footer-logo']['url'] ?>" alt="Ink. House Logo">

			<div class="footer_mobile-wrap">
				<h4><?php echo esc_html($global_options['footer-number']) ?></h4>
				<p><?php echo esc_html($global_options['footer-title']) ?></p>
			</div>
		</div>


		<div class="footer_nav">

			<nav>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'Footer-Colum-1',
						'menu_id'        => 'Colum-1',
						'container'      => 'ul',
						'menu_class'     => 'footer_nav_blocks',
						'walker'         => new Footer_Nav_Walker(array(
							'title_class'     => 'footer_nav-title',
							'main_link_class' => 'footer_nav-main',
							'link_class'      => 'footer_nav-link',
						)),
					)
				);
				?>

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'Footer-Colum-2',
						'menu_id'        => 'Colum-2',
						'container'      => 'ul',
						'menu_class'     => 'footer_nav_blocks',
						'walker'         => new Footer_Nav_Walker(array(
							'title_class'     => 'footer_nav-title',
							'main_link_class' => 'footer_nav-main',
							'link_class'      => 'footer_nav-link',
						)),
					)
				);
				?>

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'Footer-Colum-3',
						'menu_id'        => 'Colum-3',
						'container'      => 'ul',
						'menu_class'     => 'footer_nav_blocks',
						'walker'         => new Footer_Nav_Walker(array(
							'title_class'     => 'footer_nav-title',
							'main_link_class' => 'footer_nav-main',
							'link_class'      => 'footer_nav-link',
						)),
					)
				);
				?>
			</nav>
		</div>

		<div class="social">
			<div class="social_footer">
				<?php if ($global_options['footer-Facebook']): ?>
					<a href="<?php echo esc_url($global_options['footer-Facebook']) ?>">
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/facebok.svg" alt="Facebook">
					</a>
				<?php endif; ?>
				<?php if ($global_options['footer-Instagram']): ?>
					<a href="<?php echo esc_url($global_options['footer-Instagram']) ?>">
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/inst.svg" alt="Instagram">
					</a>
				<?php endif; ?>
				<?php if ($global_options['footer-YouTube']): ?>
					<a href="<?php echo esc_url($global_options['footer-YouTube']) ?>">
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/yt.svg" alt="YouTube">
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>