<?php
class Elementor_New_Widget extends \Elementor\Widget_Base
{

	public function get_name(): string
	{
		return 'new_widget_';
	}

	public function get_title(): string
	{
		return esc_html__('New', 'elementor-Ink-House');
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
		return ['new'];
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
			'background_image',
			[
				'label' => esc_html__('Background Image', 'elementor-Ink-House'),
				'type' => \Elementor\Controls_Manager::MEDIA,
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
			'desc_first',
			[
				'label' => esc_html__('Description First', 'elementor-Ink-House'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'desc_second',
			[
				'label' => esc_html__('Description Second', 'elementor-Ink-House'),
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

		<section class="new" id="new" style="background-image: url('<?php echo esc_url($settings['background_image']['url'])?>'););">
			<div class="container">
				<div class="house_new-title">
					<div class="new_header-title">
						<img src="<?php echo esc_url($settings['image']['url'])?>" alt="<?php echo esc_attr($settings['image']['alt'])?>">
						<h2><?php echo esc_html($settings['title'])?></h2>
					</div>
					<p class="new_desc-one"><?php echo esc_html($settings['desc_first'])?></p>
					<p class="new_desc-two"><?php echo esc_html($settings['desc_second'])?></p>
					<a href="<?php echo esc_attr($settings['button_url'])?>" class="new_link"><?php echo esc_html($settings['button_text'])?></a>
				</div>
			</div>
		</section>

<?php
	}
}
