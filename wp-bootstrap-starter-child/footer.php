<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<?php /* <footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div class="container pt-3 pb-3">
            <div class="site-info">
                &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://afterimagedesigns.com/wp-bootstrap-starter/" target="_blank" title="WordPress Technical Support" alt="Bootstrap WordPress Theme"><?php echo esc_html__('Bootstrap WordPress Theme','wp-bootstrap-starter'); ?></a>

            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon --> */ ?>
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript">
(function($) {
var contact_link = '<?php echo home_url(); ?>/contact/';
var ul=$('.nav-menu').first();
var search_form=$('.search-form-collapsed').first().html();
$('.search-form-collapsed').first().hide();
ul.append('<li class="search-form-menu">'+search_form+'</li><li class="contact-link"><a href="'+contact_link+'">Contact</a></li>');

$('.menu-mobile-icon').click(function(){
  if($( window ).width()<=768){
    if($(this).hasClass('opened')){
      $(this).removeClass('opened');
    //  $('.search-form-collapsed').show();
      ul.toggleClass('visible');
    }
    else{
      $(this).addClass('opened');
      //$('.search-form-collapsed').hide();
      ul.toggleClass('visible');

    }
    // $('.contact-us-wrap').first().toggleClass('phone');
  }
});
  $('.search-form-collapsed button.search-submit').click(function(e){
      e.preventDefault();
      $('.search-form-collapsed label').toggleClass('visible-search-form');
  });
  $('ul.sub-menu .menu-item-has-children a.clicked-once').on('click',function(){

  });
  $('ul.sub-menu .menu-item-has-children a').on('click',function(e){
    var current_ul='';
    $(this).parent().children('ul.sub-menu').each(function(){
      current_ul=this;
    });
    if($( window ).width()<=768){
          e.preventDefault();
      $('ul.sub-menu').find('ul.sub-menu').each(function(){
        if(current_ul!=this){
            $(this).hide();
            var link=$(this).parent().children('a').first();
            $(link).removeClass('opened_link');
        }
      });
        if($(current_ul).is(':visible')){
            $(current_ul).hide();
            var link=$(current_ul).parent().children('a').first();
            $(link).removeClass('opened_link');
        }
        else {
          $(current_ul).show();
          var link=$(current_ul).parent().children('a').first();
          $(link).addClass('opened_link');
        }
    }
  });
	$(document).ready(function() {
			$('#owl-test').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			singleItem: true,
			responsive:{
					0:{
							items:1
					},
					600:{
							items:1
					},
					1000:{
							items:1
					}
			}
		})
	});
	
	$( window ).on( 'elementor/frontend/init', function() {
			elementorFrontend.hooks.addAction( 'frontend/element_ready/testimonials.default', function($scope, $){
			
				$('#owl-test').owlCarousel({
					loop:true,
					margin:10,
					nav:true,
					singleItem: true,
					responsive:{
							0:{
									items:1
							},
							600:{
									items:1
							},
							1000:{
									items:1
							}
					}
				})
			});
	 } );

})(jQuery);
</script>
</body>
</html>
