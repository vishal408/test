<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Testimonials extends Widget_Base{

  public function get_name(){
    return 'testimonials';
  }

  public function get_title(){
    return 'Testimonials';
  }

  public function get_icon(){
    return 'fas fa-user-friends';
  }

  public function get_categories(){
    return ['general'];
  }

  protected function _register_controls(){

    global $post;

    $post_types = get_post_types( '', 'names' );

    $post_options=array();

    foreach ( $post_types as $post_type ) {
      $post_options[$post_type] = $post_type;
    }

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',
      ]
    );


    //Post Type
    $this->add_control(
      'post_type',
      [
        'label' => 'Select Post Type',
        'type' => \Elementor\Controls_Manager::SELECT,
        'options'=>$post_options
      ]
    );

    $this->add_control(
      'count',
      [
        'label' => 'Number of Testimonials to be shown',
        'type' => \Elementor\Controls_Manager::NUMBER,
      ]
    );

    $this->add_control(
      'order_by',
      [
        'label' => 'Order Testimonials By',
        'type' => \Elementor\Controls_Manager::SELECT,
        'options'=>[
          'ID'=>'ID',
          'title'=>'Title',
          'date'=>'Date',
        ]
      ]
    );

    $this->add_control(
      'order',
      [
        'label' => 'Order of Testimonials',
        'type' => \Elementor\Controls_Manager::SELECT,
        'options'=>[
          'asc'=>'Ascending',
          'desc'=>'Descending'
        ]
      ]
    );

    $this->end_controls_section();
  }


  protected function render(){
    $settings = $this->get_settings_for_display();
    $imgdir =  get_stylesheet_directory_uri();
    $this->add_inline_editing_attributes('label_heading', 'basic');
    $this->add_render_attribute(
      'label_heading',
      [
        'class' => ['testimonial-back__label-heading'],
      ]
    );

    $post_lists = get_posts( array(
          'post_type'   => $settings['post_type'],
         'posts_per_page' => $settings['count'],
          'orderby'    => $settings['order_by'],
         'sort_order' => $settings['order']
    ) );
    if($post_lists){
   	?>
	<div class="test-div">
		<div class="owl-carousel owl-theme" id="owl-test" >

			<?php   
		$myarray = array();
		foreach ( $post_lists as $post ) :
        setup_postdata( $post );  ?>
				<div class="item">
					<div class="arrow-div">
						<?php 
						$myarray[$post->ID]['title'] = get_the_title($post->ID);
						$myarray[$post->ID]['content'] = get_the_content($post->ID);
						?>
						<div>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quote.png" class="quote-img">
							<div class="circle-div"></div>
							<div class="group-text">“<?php echo get_the_title($post->ID); ?>”</div>
							<div class="person-text">-<?php echo get_the_content($post->ID); ?></div>
						</div>
					</div>
				</div>
			<?php endforeach; wp_reset_postdata(); ?>
		</div>
	</div>
<?php
  }
}
/*	
protected function _content_template(){
	?>
	<div class="test-div">Save & Reload to Check</div>
	<?php
} */
	
}
