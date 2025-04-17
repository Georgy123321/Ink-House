<?php
class Elementor_Reproductions_Widget extends \Elementor\Widget_Base
{

	public function get_name(): string
	{
		return 'reproductions_widget_';
	}

	public function get_title(): string
	{
		return esc_html__('Reproductions', 'elementor-Ink-House');
	}

	public function get_icon(): string
	{
		return 'eicon-theme-style';
	}

	public function get_categories(): array
	{
		return ['Ink-House'];
	}

	public function get_keywords(): array
	{
		return ['reproductions'];
	}

	protected function register_controls(): void
	{

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Title', 'elementor-Ink-House'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'elementor-Ink-House'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'post_count',
			[
				'label' => esc_html__('Post Count', 'elementor-Ink-House'),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'button_filter',
			[
				'label' => esc_html__('Button Filter', 'elementor-Ink-House'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label' => esc_html__('Button Text', 'elementor-Ink-House'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'reproductions',
			[
				'label' => __('Repeater List', 'elementor-link-House'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ button_text }}}'
			]
		);

		$this->end_controls_section();

		// Content Tab End

		$this->end_controls_section();
	}

	protected function render(): void
	{
		$settings = $this->get_settings_for_display();
		$post_count = isset($settings['post_count']) ? $settings['post_count'] : 6;


?>

		<section class="house_products" id="reproductions">
			<div class="container">
				<div class="house_products-menu">
					<div class="house_products-title">
						<h3><?php echo esc_html($settings['title']); ?></h3>
					</div>

					<div class="house_products-buttons">
						<?php if (!empty($settings['reproductions'])):
							foreach ($settings['reproductions'] as $index => $item) : ?>
								<button class="country <?php echo $index === 0 ? 'active' : ''; ?>"
									data-filter="<?php echo esc_attr($item['button_filter']); ?>">
									<?php echo esc_html($item['button_text']); ?>
								</button>
						<?php endforeach;
						endif; ?>
					</div>
				</div>

				<div class="container swiper" data-country="france">
					<div class="card_wrapper">
						<ul class="card_list swiper-wrapper">
							<?php
							$post_count = isset($settings['post_count']) ? $settings['post_count'] : 6;
							$get_query = new WP_Query([
								'post_type'      => 'reproductions',
								'posts_per_page' => $post_count,
								'tax_query'      => [
									[
										'taxonomy' => 'reproductions_category',
										'field'    => 'slug',
										'terms'    => 'france', // Фильтруем карточки по Франции
									],
								],
							]);

							foreach ($get_query->posts as $reproduction): ?>
								<li class="card_item swiper-slide">
									<div class="card">
										<?php echo get_the_post_thumbnail($reproduction->ID, 'full') ?>
										<p class="top-title"><?php echo esc_html($reproduction->post_excerpt) ?></p>
										<h4><?php echo esc_html($reproduction->post_title) ?></h4>
										<p><?php echo get_field('reproductions_size', $reproduction->ID) ?></p>
										<h5><?php echo get_field('reproductions_price', $reproduction->ID) ?></h5>
										<button class="card-cart"><?php echo esc_html__('В корзину', 'elementor-Ink-House') ?></button>
									</div>
								</li>
							<?php endforeach;
							wp_reset_postdata();
							?>
						</ul>
						<div class="swiper-pagination"></div>
						<div class="swiper-slide-button swiper-button-prev"></div>
						<div class="swiper-slide-button swiper-button-next"></div>
					</div>
				</div>

				<div class="container swiper" data-country="germany">
					<div class="card_wrapper">
						<ul class="card_list swiper-wrapper">
							<?php
							$post_count = isset($settings['post_count']) ? $settings['post_count'] : 6;
							$get_query = new WP_Query([
								'post_type'      => 'reproductions',
								'posts_per_page' => $post_count,
								'tax_query'      => [
									[
										'taxonomy' => 'reproductions_category',
										'field'    => 'slug',
										'terms'    => 'germany', // Фильтруем карточки по Германии
									],
								],
							]);

							foreach ($get_query->posts as $reproduction): ?>
								<li class="card_item swiper-slide">
									<div class="card">
										<?php echo get_the_post_thumbnail($reproduction->ID, 'full') ?>
										<p class="top-title"><?php echo esc_html($reproduction->post_excerpt) ?></p>
										<h4><?php echo esc_html($reproduction->post_title) ?></h4>
										<p><?php echo get_field('reproductions_size', $reproduction->ID) ?></p>
										<h5><?php echo get_field('reproductions_price', $reproduction->ID) ?></h5>
										<button class="card-cart"><?php echo esc_html__('В корзину', 'elementor-Ink-House') ?></button>
									</div>
								</li>
							<?php endforeach;
							wp_reset_postdata();
							?>
						</ul>
						<div class="swiper-pagination"></div>
						<div class="swiper-slide-button swiper-button-prev"></div>
						<div class="swiper-slide-button swiper-button-next"></div>
					</div>
				</div>

				<div class="container swiper" data-country="england">
					<div class="card_wrapper">
						<ul class="card_list swiper-wrapper">
							<?php
							$post_count = isset($settings['post_count']) ? $settings['post_count'] : 6;
							$get_query = new WP_Query([
								'post_type'      => 'reproductions',
								'posts_per_page' => $post_count,
								'tax_query'      => [
									[
										'taxonomy' => 'reproductions_category',
										'field'    => 'slug',
										'terms'    => 'england', // Фильтруем карточки по Англии
									],
								],
							]);

							foreach ($get_query->posts as $reproduction): ?>
								<li class="card_item swiper-slide">
									<div class="card">
										<?php echo get_the_post_thumbnail($reproduction->ID, 'full') ?>
										<p class="top-title"><?php echo esc_html($reproduction->post_excerpt) ?></p>
										<h4><?php echo esc_html($reproduction->post_title) ?></h4>
										<p><?php echo get_field('reproductions_size', $reproduction->ID) ?></p>
										<h5><?php echo get_field('reproductions_price', $reproduction->ID) ?></h5>
										<button class="card-cart"><?php echo esc_html__('В корзину', 'elementor-Ink-House') ?></button>
									</div>
								</li>
							<?php endforeach;
							wp_reset_postdata();
							?>
						</ul>
						<div class="swiper-pagination"></div>
						<div class="swiper-slide-button swiper-button-prev"></div>
						<div class="swiper-slide-button swiper-button-next"></div>
					</div>
				</div>
			</div>
		</section>

		<script>
			setTimeout(() => {
				new Swiper('.card_wrapper', {
					loop: true,
					spaceBetween: 30,

					// If we need pagination
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
						dynamicBullets: true
					},

					// Navigation arrows
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},

					// And if we need scrollbar
					scrollbar: {
						el: '.swiper-scrollbar',
					},

					breakpoints: {
						0: {
							slidesPerView: 1
						},
						740: {
							slidesPerView: 2
						},
						1100: {
							slidesPerView: 3
						}
					}
				});

			}, 500)
		</script>
<?php
	}
}
