<?php
class Elementor_Main_Widget extends \Elementor\Widget_Base
{

	public function get_name(): string
	{
		return 'main_widget_';
	}

	public function get_title(): string
	{
		return esc_html__('Main', 'elementor-Ink-House');
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
		return ['main'];
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
			'image',
			[
				'label' => esc_html__('Image', 'elementor-Ink-House'),
				'type' => \Elementor\Controls_Manager::MEDIA,
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
			'desc',
			[
				'label' => esc_html__('Description', 'elementor-Ink-House'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => esc_html__('Button Text', 'elementor-Ink-House'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' => esc_html__('Button URL', 'elementor-Ink-House'),
				'type' => \Elementor\Controls_Manager::URL,
			]
		);

		$this->end_controls_section();

		// Content Tab End

		$this->end_controls_section();
	}

	protected function render(): void
	{
		$settings = $this->get_settings_for_display();

		if (empty($settings['title'])) {
			return;
		}
?>

		<main class="main" id="main">
			<div class="container">
				<div class="house_hero">
					<div class="house_hero-img">
						<img src="<?php echo esc_url($settings['image']['url'])?>" alt="">
					</div>

					<div class="house_hero-title">
					<h1><?php echo wp_kses( $settings['title'], [ 'span' => [ 'class' => [] ] ] ); ?></h1>
						<p><?php echo esc_html($settings['desc'])?></p>
						<a href="<?php echo esc_html($settings['button_url']['url'])?>" class="house_hero-link"><?php echo esc_html($settings['button_text'])?></a>
					</div>
				</div>
			</div>
		</main>

	<?php
	}
}
