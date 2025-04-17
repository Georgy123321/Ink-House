<?php
class Elementor_Team_Widget extends \Elementor\Widget_Base
{

	public function get_name(): string
	{
		return 'team_widget_';
	}

	public function get_title(): string
	{
		return esc_html__('Team', 'elementor-Ink-House');
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
		return ['team'];
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'avatar',
			[
				'label' => esc_html__('Button Text', 'elementor-Ink-House'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'team',
			[
				'label' => __('Repeater List', 'elementor-link-House'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ avatar }}}'
			]
		);

		$this->end_controls_section();

		// Content Tab End

		$this->end_controls_section();
	}

	protected function render(): void
	{
		$settings = $this->get_settings_for_display();
?>

		<section class="house_about" id="about-us">
			<div class="container">
				<div class="about">
					<img src="<?php echo esc_url($settings['image']['url']) ?>" alt="<?php echo esc_attr($settings['image']['alt']) ?>" class="about_img">

					<div class="house_about-title">
						<h2><?php echo esc_html($settings['title']) ?></h2>
						<p><?php echo esc_html($settings['desc']) ?></p>

						<div class="house_about-img">
							<?php if (!empty($settings['team'])):
								foreach ($settings['team'] as $item) : ?>
									<img src="<?php echo esc_url($item['avatar']['url'])?>" alt="<?php echo esc_attr($item['avatar']['alt'])?>">
							<?php endforeach;
							endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php
	}
}
