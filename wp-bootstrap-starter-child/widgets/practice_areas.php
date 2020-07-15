<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Practice_Areas extends Widget_Base{

  public function get_name(){
    return 'practice_areas';
  }

  public function get_title(){
    return 'Practice Areas';
  }

  public function get_icon(){
    return 'fas fa-chart-area';
  }

  public function get_categories(){
    return ['general'];
  }
  protected function _register_controls(){

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',
      ]
    );
	  // Select Page
	$this->add_control(
		'individual_post',
		[
			'label' => __( 'Select Page', 'elementor' ),
			'type' => Controls_Manager::SELECT,
			'default' => '1',
			'options' => getPagesForSelect()
		]
	);
    //Title
    /* $this->add_control(
      'title',
      [
        'label' => 'Title',
        'type' => \Elementor\Controls_Manager::TEXT,
      ]
    ); */
    //Icons
    $this->add_control(
      'icon',
      [
        'label' => 'Icon',
        'type' => \Elementor\Controls_Manager::MEDIA,
      ]
    );
    //Content
    /* $this->add_control(
      'content',
      [
        'label' => 'Content',
        'type' => \Elementor\Controls_Manager::WYSIWYG,
				'options' => $options,
      ]
    );
    //Link Text
    $this->add_control(
      'link_text',
      [
        'label' => 'Link Text',
        'type' => \Elementor\Controls_Manager::TEXT,
      ]
    );
    //URL
    $this->add_control(
      'link',
      [
        'label' => 'Link',
        'type' => \Elementor\Controls_Manager::TEXT,
      ]
    ); */

    $this->end_controls_section();
  }


  protected function render(){
    $settings = $this->get_settings_for_display();

    $this->add_inline_editing_attributes('label_heading', 'basic');
    $this->add_render_attribute(
      'label_heading',
      [
        'class' => ['practicearea__label-heading'],
      ]
    );
	  if($settings['individual_post']){
		  $pageid = $settings['individual_post'];
			?>
			<div class="tax-div" onclick="window.location.href='<?php echo get_permalink($pageid); ?>'">
				<?php if(is_array($settings['icon']) && isset($settings['icon']['url'])) { ?>
				   <div class="calculator-div">
					   <img src="<?php echo $settings['icon']['url']; ?>">
					</div>
				<?php } ?>
			   <div class="tax-head"><?php echo get_the_title($pageid); // echo $settings['title']; ?></div>
				  <div class="tax-text text-center mt-2">
            <?php if(get_field('excerpt',$pageid)){ ?>
              <?php echo get_field('excerpt',$pageid); ?>
            <?php } else { ?>
            <?php echo get_the_excerpt($pageid); // echo $settings['content']; ?>
            <?php } ?>
            </div>
				  <div class="meet-link text-center learn-div"><a href="<?php echo get_the_permalink($pageid); // echo $settings['link']; ?>">learn more ><?php // echo $settings['link_text']; ?></a></div>
				</div>
		<?php
	  }

  }
}
