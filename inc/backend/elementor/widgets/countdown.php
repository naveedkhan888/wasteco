<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Contact Info
 */
class Xhub_CountDown extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'icountdown';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'XP CountDown', 'xhub' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-countdown';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_xhub' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'CountDown', 'xhub' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'xhub' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'xhub' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'xhub' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'xhub' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				// 'prefix_class' => 'xhub%s-align-',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'date',
			[
				'label' => 'Date - Time',
				'type' => Controls_Manager::DATE_TIME,
				'default' => __( '2025-10-26 12:00', 'xhub' ),
			]
		);

		$this->add_control(
			'zone',
			[
				'label' => __( 'UTC Timezone Offset', 'xhub' ),
				'type' => Controls_Manager::NUMBER,
				'default' => __( '0', 'xhub' ),
			]
		);

		$this->start_controls_tabs( 'tabs_titles' );

		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => __( 'One', 'xhub' ),
			]
		);
		$this->add_control(
			'day',
			[
				'label' => __( 'Day', 'xhub' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Day', 'xhub' ),
			]
		);
		$this->add_control(
			'hour',
			[
				'label' => __( 'Hour', 'xhub' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Hour', 'xhub' ),
			]
		);
		$this->add_control(
			'min',
			[
				'label' => __( 'Minute', 'xhub' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Minute', 'xhub' ),
			]
		);
		$this->add_control(
			'second',
			[
				'label' => __( 'Second', 'xhub' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Second', 'xhub' ),
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_title_active',
			[
				'label' => __( 'Multi', 'xhub' ),
			]
		);
		$this->add_control(
			'days',
			[
				'label' => __( 'Days', 'xhub' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Days', 'xhub' ),
			]
		);
		$this->add_control(
			'hours',
			[
				'label' => __( 'Hours', 'xhub' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Hours', 'xhub' ),
			]
		);
		$this->add_control(
			'mins',
			[
				'label' => __( 'Minutes', 'xhub' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Minutes', 'xhub' ),
			]
		);
		$this->add_control(
			'seconds',
			[
				'label' => __( 'Seconds', 'xhub' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Seconds', 'xhub' ),
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Style', 'xhub' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Number
		$this->add_control(
			'heading_number',
			[
				'label' => __( 'Number', 'xhub' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'number_color',
			[
				'label' => __( 'Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-countdown li span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .xp-countdown li span, {{WRAPPER}} .xp-countdown li.seperator',
			]
		);
		$this->add_responsive_control(
			'number_space',
			[
				'label' => __( 'Spacing', 'xhub' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .xp-countdown li span' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Title
		$this->add_control(
			'heading_titles',
			[
				'label' => __( 'Texts', 'xhub' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-countdown p' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .xp-countdown p',
			]
		);

		//Seperator
		$this->add_control(
			'heading_sepe',
			[
				'label' => __( 'Seperator', 'xhub' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'sepe_color',
			[
				'label' => __( 'Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-countdown li.seperator' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$datex = str_replace('-','/',$settings['date']);
		$next_date = date('m/d/Y', strtotime(' +25 days')); // Use for demo only
		?>
			
		<ul class="xp-countdown unstyle" data-zone="<?php echo esc_attr( $settings['zone'] ); ?>" data-date="<?php echo esc_attr( $datex ); ?>" data-day="<?php echo esc_attr( $settings['day'] ); ?>" data-days="<?php echo esc_attr( $settings['days'] ); ?>" data-hour="<?php echo esc_attr( $settings['hour'] ); ?>" data-hours="<?php echo esc_attr( $settings['hours'] ); ?>" data-min="<?php echo esc_attr( $settings['min'] ); ?>" data-mins="<?php echo esc_attr( $settings['mins'] ); ?>" data-second="<?php echo esc_attr( $settings['second'] ); ?>" data-seconds="<?php echo esc_attr( $settings['seconds'] ); ?>">
			<li><span class="days">00</span><p class="days_text">Days</p></li>
			<li class="seperator">:</li>
			<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
			<li class="seperator">:</li>
			<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
			<li class="seperator">:</li>
			<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
		</ul>

	    <?php
	}

}
// After the Xhub_CountDown class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new Xhub_CountDown() );