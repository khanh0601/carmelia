<?php
/**
 * Created by PhpStorm.
 * User: splus
 * Date: 12/25/18
 * Time: 10:37
 */
global $global_settings;
?>

<?php $my_home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) );?>
<footer>
    <div class="container">
        <div class="footer-logo">
            <a href="<?php echo $my_home_url?>"> <img src="<?php echo get_template_directory_uri()?>/imgs/logo-footer.png" alt="<?php _e('Camerlina Resort',TEXT_DOMAIN); ?>"></a>
        </div>
        <?php
            $args = array(
                'theme_location' =>'footer-menu',
                'class' =>"",
                'depth' => 1,
                'container_class' => "footer-menu"
            );
            wp_nav_menu($args);
        ?>
        <div class="footer-social">
            <a class="footer-social-icon" href="<?php echo $global_settings['theme_setting_instagram_url']; ?>"><img src="<?php echo get_template_directory_uri()?>/imgs/instagram.png" alt="<?php _e('Camerlina Resort Instagram',TEXT_DOMAIN); ?>"></a>
            <a class="footer-social-icon" href="<?php echo $global_settings['theme_setting_facebook_url']; ?>"><img src="<?php echo get_template_directory_uri()?>/imgs/facebook.png" alt="<?php _e('Camerlina Resort Facebook',TEXT_DOMAIN); ?>"></a>
            <a class="footer-social-icon" href="<?php echo $global_settings['theme_setting_tripadvisor_url']; ?>"><img src="<?php echo get_template_directory_uri()?>/imgs/tripadvisor-logotype.png" alt="<?php _e('Camerlina Resort Tripadvisor',TEXT_DOMAIN); ?>"></a>
        </div>

        <div class="footer-sign-up">
            <h3><?php _e('Newsletters Sign Up',TEXT_DOMAIN); ?></h3>
            <form method="post" id="footer-subcriber-form" action="<?php echo admin_url('admin-ajax.php');?>?action=carmelina_email_subcribe"  autocomplete="off"
                  data-invalid-email="<?php _e('Please fill your valid email!');?>"
                  data-invalid-lenght="<?php _e('Email too long!');?>"
                  data-empty-email="<?php _e('Please fill your email!');?>"
                  data-email-exist="<?php _e('Your email already exists in the system.');?>"
                  data-thanks="<?php _e('Thanks for your subcribing!');?>"
            >
                <input type="hidden" name="_email_subcirbe_token" id="email_subcirbe_token" value="<?php echo wp_create_nonce( 'email_subscribe_lasfafdsaf' ); ?>"/>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="email-signup" id="email-signup" maxlength="255"/>
                        <span id="email-signup-helper-text" class="helper-text hidden"></span>
                        <label for="email-signup"><?php _e('Your Email',TEXT_DOMAIN); ?></label>
                        <input type="submit" name="submit"/>
                    </div>
                </div>
            </form>
        </div>

        <div class="footer-info">
            <div>
                <h5><?php _e('Carmelina Beach Resort',TEXT_DOMAIN); ?></h5>
                <p><?php
                    if(ICL_LANGUAGE_CODE == 'vi')
                    {
                        echo $global_settings['theme_setting_footer_left_address_vi'];
                    }
                    else
                    {
                        echo $global_settings['theme_setting_footer_left_address_en'];
                    }
                    ?>
                    <br/>
                    Tel: <?php echo $global_settings['theme_setting_footer_left_phone']; ?><br/>
                    Fax: <?php echo $global_settings['theme_setting_footer_left_fax']; ?><br/>
                    Email: <?php echo $global_settings['theme_setting_footer_left_email']; ?><br/>
                </p>
            </div>
            <div>
                <img src="<?php echo get_template_directory_uri()?>/imgs/leaf-footer.png" alt="<?php _e('Carmelina Beach Resort',TEXT_DOMAIN); ?>">
            </div>
            <div>
                <h5><?php _e('Sales & Marketing Office',TEXT_DOMAIN); ?></h5>
                <p><?php
                    if(ICL_LANGUAGE_CODE == 'vi')
                    {
                        echo $global_settings['theme_setting_sale_hcm_address_vi'];
                    }
                    else
                    {
                        echo $global_settings['theme_setting_sale_hcm_address_en'];
                    }
                    ?>
                    <br/>
                    Tel: <?php echo $global_settings['theme_setting_sale_hcm_phone']; ?><br/>
                    Fax: <?php echo $global_settings['theme_setting_sale_hcm_fax']; ?><br/>
                    Email: <?php echo $global_settings['theme_setting_sale_hcm_email']; ?>
                </p>
            </div>
        </div>
        <div class="footer-copyright"><?php _e('Copyright © 2018 Carmelina Beach Resort. All Rights Reserved.',TEXT_DOMAIN); ?></div>
    </div>
</footer>

<div class="main-menu" id="main-menu">
    <div  class="main-menu-close"><a href="javascript:void(0)"><?php _e('Close',TEXT_DOMAIN); ?></a></div>
    <div class="main-menu-container">

        <div id="main-menu-left">
            <?php
            $args = array(
                'theme_location' =>'primary-menu-left',
                'menu_class' =>"main-menu-left-root",
                'depth' => 2,
                'container' => ""
            );
            wp_nav_menu($args);
            ?>
        </div>
        <div id="main-menu-right">
            <div id="main-menu-right-leaf"></div>
            <div id="main-menu-right-container">
                <h3><?php _e('Accommodation',TEXT_DOMAIN); ?></h3>
                <?php
                    $args2 = array(
                        'theme_location' =>'primary-menu-right',
                        'menu_class' =>"",
                        'depth' => 1,
                        'container' => ""
                    );
                    wp_nav_menu($args2);
                ?>
            </div>
        </div>
    </div>
</div>

<?php
$popup = get_field('popup_pages');


if($popup)
{
    ?>
    <!-- Modal -->
    <div class="modal fade" id="pageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <a class="close" data-dismiss="modal">&times;</a>
                    <div class="modal-body-image-desktop">
						<a data-scroll="#checkin-form" class="scroll  modal-btn-scroll" href="<?php echo get_field('url', $popup->ID); ?>">
                        <?php
                        echo wp_get_attachment_image(get_field('popup_desktop_image',$popup->ID), 'full');
                        ?>
						
						</a>
                    </div>

                    <div class="modal-body-image-mobile">
						<a data-scroll="#checkin-form" class="scroll modal-btn-scroll" href="<?php echo get_field('url', $popup->ID); ?>">
                        <?php
                        echo wp_get_attachment_image(get_field('popup_mobile_image',$popup->ID), 'full');
                        ?>
						</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<a id="scrollTop" class="back-to-top"></a>
<?php wp_footer(); ?>
</body>
</html>