<?php

if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) || is_active_sidebar( 'disclaimer' ) ) {?>
        <div id="footer-widget" class="my_footer">
            <div class="container">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-1' )) : ?>
                        <div class="col-12 col-md-3 my_footer_sidebar my_footer_sidebar1"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-2' )) : ?>
                        <div class="col-12 col-md-3 my_footer_sidebar my_footer_sidebar2"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-3' )) : ?>
                        <div class="col-12 col-md-3 my_footer_sidebar my_footer_sidebar3"><?php dynamic_sidebar( 'footer-3' ); ?></div>
                    <?php endif; ?>
					          <?php if ( is_active_sidebar( 'footer-4' )) : ?>
                        <div class="col-12 col-md-3 my_footer_sidebar my_footer_sidebar4"><?php dynamic_sidebar( 'footer-4' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'disclaimer' )) : ?>
                      <div class="col-12 my_footer_disclaimer mt-3">
                        <?php dynamic_sidebar( 'disclaimer' ); ?>
                      </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php }
