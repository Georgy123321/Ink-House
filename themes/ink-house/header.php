<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php global $global_options; ?>
	<div id="page" class="site">

		<header class="header ">
			<div class="container">
				<div class="house_header">
					<div class="logo">
						<a href="<?php echo get_home_url() ?>">
							<img src="<?php echo $global_options['header-logo']['url'] ?>" alt="">
						</a>

					</div>
					<span class="header_border"></span>


					<div class="house_nav-container">
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'Menu-Header-PC',
								'menu_id'         => 'Menu-Header-Desctop',
								'container'       => 'nav',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'menu_class'      => 'house_header-nav',
								'walker'          => new Header_Nav_Walker(),
							)
						);
						?>

						<button class="cart">
							<img src="<?php echo $global_options['header-basket']['url'] ?>" alt="basket">
							<span class="cart-count"></span>
						</button>

						<div class="cart-menu">

							<div class="cart-header">
								<button class="cart-close">✖</button>
							</div>
							<ul class="cart-items">

							</ul>
							<button class="buy-button">
								к оформлению
								<span class="cart-total">0</span>
							</button>

							<h4 class="empty-cart-text">Ваша корзина пуста</h4>
						</div>
					</div>
				</div>

				<div class="header_mobile">
					<div class="hamburger-menu">
						<div class="off-screen-menu">
							<div class="credits_nav-border-new"></div>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'Mobile-Header-menu',
									'menu_id'        => 'Mobile Header',
									'container'      => 'ul',
									'container_class' => 'mobile_nav',
								)
							);
							?>

							<!-- <ul class="mobile_nav">
								<li><a href="#reproductions" class="link">Репродукции</a></li>
								<li><a href="#new" class="link">Новинки</a></li>
								<li><a href="#about-us" class="link">О нас</a></li>
							</ul> -->

							<div class="credits_nav-border-new"></div>
						</div>

						<nav class="ham_menu-nav">
							<div class="ham-menu">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</nav>
					</div>

					<div class="mobile_cart">
						<button class="cart">
							<img src="<?php echo $global_options['header-basket']['url'] ?>" alt="basket">
							<span class="cart-count"></span>
						</button>

						<div class="cart-menu">

							<div class="cart-header">
								<button class="cart-close">✖</button>
							</div>
							<ul class="cart-items">

							</ul>
							<button class="buy-button">
								к оформлению
								<span class="cart-total">0</span>
							</button>

							<h4 class="empty-cart-text">Ваша корзина пуста</h4>
						</div>

					</div>

				</div>
			</div>
		</header>