<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>

<header id="masthead" class="site-header" role="banner">


<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>

<nav id="site-navigation" class="navigation main-navigation" role="navigation">


<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>

<a class="menu-mobile-icon">
  <span></span>
  <span></span>
  <span></span>
</a>
<div class="search-form-collapsed">
  <form role="search" method="get" class="search-form" action="https://staging.gordonlawltd.com/">
    <label>
      <span class="screen-reader-text">Search for:</span>
      <input type="search" class="search-field" placeholder="Search …" value="" name="s">
      <button type="submit" class="submit-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
    </label>
    <button type="button" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    <ul class="search-results overflow" id="sgt-search-li"></ul>
  </form>
</div>
<div class="contact-us-wrap phone">
  <a href="tel:847-584-1426" class="contact-us-btn">Contact</a>
</div>
</nav><!-- #site-navigation -->

<div class="clear"></div>

</header><!-- #masthead -->

<?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
    <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
        <div class="container">
            <h1>
                <?php
                if(get_theme_mod( 'header_banner_title_setting' )){
                    echo get_theme_mod( 'header_banner_title_setting' );
                }else{
                    echo 'WordPress + Bootstrap';
                }
                ?>
            </h1>
            <p>
                <?php
                if(get_theme_mod( 'header_banner_tagline_setting' )){
                    echo get_theme_mod( 'header_banner_tagline_setting' );
            }else{
                    echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
                }
                ?>
            </p>
            <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
        </div>
    </div>
<?php endif; ?>
<div id="content" class="site-content">
<?php if(get_page_template_slug() !='fullwidth.php'){ ?>
  <div class="container">
    <div class="row">
<?php } ?>
            <?php endif; ?>
