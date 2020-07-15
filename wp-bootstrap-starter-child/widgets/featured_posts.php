<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Featured_Posts extends Widget_Base{

  public function get_name(){
    return 'featured_posts';
  }

  public function get_title(){
    return 'Featured Posts';
  }

  public function get_icon(){
    return 'fas fa-newspaper';
  }

  public function get_categories(){
    return ['general'];
  }

  protected function _register_controls(){
		$options=array();
		$categories = get_categories();
    foreach ( $categories as $category ) {
        $options[$category->category_nicename]=$category->cat_name;
    }

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',
      ]
    );

    $this->add_control(
      'label_heading',
      [
        'label' => 'Label Heading',
        'type' => \Elementor\Controls_Manager::TEXT,
      ]
    );


    $this->add_control(
      'categories',
      [
        'label' => 'Categories',
        'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $options,
      ]
    );

    $this->end_controls_section();
  }


  protected function render(){
    $settings = $this->get_settings_for_display();

    $this->add_inline_editing_attributes('label_heading', 'basic');
    $this->add_render_attribute(
      'label_heading',
      [
        'class' => ['featured_posts__label-heading'],
      ]
    );
		global $post;
		$args = array( 'category_name' => $settings['categories'], 'posts_per_page' => 6);
    $posts = get_posts( $args );?>
    <h2 style="text-align:center;" class="law-head"><?php echo $settings['label_heading']?></h2>

    <div class="sg-featured-wrapper">
		<?php $cn = 0;
      foreach( $posts as $post ): setup_postdata($post);
       if($cn % 3==0 && $cn!=0){ ?>
      </div>
        <?php }
      if($cn % 3==0){ ?>
      <div class="elementor-row">
        <?php } ?>
      <div class="elementor-column elementor-col-33 text-center spot-col">
        <div class="blog-div" onclick="window.location.href='<?php echo get_permalink(); ?>'">
          <?php $path = get_post_meta($post->ID, 'BlogPic', true); ?>
          <?php echo $path; ?>
  		    <div class="small-div">
            <h6 class="text-center spot-head"><?php the_title(); ?></h6>
            <div class="tax-text text-center mt-2"><?php the_excerpt(); ?></div>
            <div class="meet-link text-center learn-div"><a href="<?php echo get_permalink(); ?>">READ MORE ></a></div>
          </div>
        </div>
      </div>
	  <?php $cn++; endforeach; wp_reset_postdata(); ?>
    <?php
      // Get the ID of a given category
      $category_id = get_category_by_slug( $settings['categories'] );

      // Get the URL of this category
      $category_link = get_category_link( $category_id->term_id );
    ?>
    </div>
    <div class="text-center py-5">
      <a class="btn theme-btn explore-btn" href="<?php echo $category_link; ?>">explore more</a>
    </div>
  </div>
    <?php
  }
}
