<?php

class Addon_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'slider';
	}

	public function get_title() {
		return __('Slider', 'starter-theme');
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return ['starter-theme'];
	}

	protected function _register_controls() {



		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Slides', 'starter-theme'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => __('Title', 'starter-theme'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Slide Title', 'starter-theme'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content',
			[
				'label' => __('Content', 'starter-theme'),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __('Slide Content', 'starter-theme'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'slide_btn_text',
			[
				'label' => __('Button text', 'starter-theme'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Read More', 'starter-theme'),
			]
		);

		$repeater->add_control(
			'slide_link',
			[
				'label' => __('Button link', 'starter-theme'),
				'type' => \Elementor\Controls_Manager::URL,
			]
		);

		$repeater->add_control(
			'slide_bg',
			[
				'label' => __('Slide Background', 'starter-theme'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => __('Slides', 'starter-theme'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls()
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if (!empty($settings['slides'])) {
			$html = '';
			$random = rand(8977, 897987);
			if (count($settings['slides']) > 1) {
				$html .= '<script>
                    jQuery(document).ready(function($) {
                        $("#slide-' . $random . '").slick({
							arrows: true,
							prevArrow: "<i class=\'fa fa-angle-left\'></i>",
							nextArrow: "<i class=\'fa fa-angle-right\'></i>"
                        });
                    });
                </script>';
			}
			$html .= '<div id="slide-' . $random . '" class="slides">';
			foreach ($settings['slides'] as $slide) {
				$target = $slide['slide_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $slide['slide_link']['nofollow'] ? ' rel="nofollow"' : '';

				$html .= '<div style="background-image:url(' . wp_get_attachment_image_url($slide['slide_bg']['id'], 'large') . ')" class="single-slide-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 my-auto">
                                    <div class="slide-text">
										<h2>' . $slide['title'] . '</h2>
										' . wpautop(do_shortcode($slide['content'])) . '
                                        <a ' . $target . $nofollow . ' href="' . $slide['slide_link']['url'] . '" class="boxed-btn">' . $slide['slide_btn_text'] . '</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
			}
			$html .= '</div>';
		} else {
			$html = '<div class="alert alert-warning">Please add slides.</div>';
		}



		echo $html;
	}
}
