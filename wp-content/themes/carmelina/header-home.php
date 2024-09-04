<?php
/**
 * Created by PhpStorm.
 * User: splus
 * Date: 12/25/18
 * Time: 10:37
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- CSS -->
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri()?>/images/logo-favicon.png" />
    <?php wp_head(); ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136582588-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-136582588-1');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MNMQGDD');</script>
    <!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?> data-language="<?php echo ICL_LANGUAGE_CODE; ?>">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNMQGDD"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<section class="section-header" id="section-header">
    <header>
        <?php
            $home_header_bg = '<img class="header-background" src="'+get_template_directory_uri()+'/images/homepage-header-desktop.jpg" srcset="'+get_template_directory_uri()+'/images/homepage-header-desktop-500.jpg 300w, '+get_template_directory_uri()+'/images/homepage-header-desktop-1000.jpg 768w,'+get_template_directory_uri()+'/images/homepage-header-desktop.jpg 992w"/>';
            echo apply_filters( 'header_style', $home_header_bg );
        ?>
        <div class="header-menu">
            <div class="container-fluid">
                <div class="grid">
                    <div>
                        <div class="menu header-main-menu">
                            <div>
                                <div class="menu-icon">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="menu-language-switch">
                                    <?php
                                    $languages = icl_get_languages('skip_missing=1');
                                    if(1 < count($languages)){
                                        foreach($languages as $l){
                                            if(!$l['active']) $langs[] = '<a href="'.$l['url'].'">'.$l['translated_name'].'</a>';
                                        }
                                        echo join(', ', $langs);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $my_home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) );?>
                    <div class="logo"><a href="<?php echo $my_home_url; ?>"> <img src="<?php echo get_template_directory_uri()?>/images/logo.png" alt="<?php echo get_bloginfo( 'name' ); ?>"/></a></div>
                    <div>
                        <div class="hotline">
                            <?php
                            global $global_settings;
                            $link_number = preg_replace('/[^0-9]/', '', $global_settings['theme_setting_header_phone']); ?>
                            <a data-scroll="#checkin-form" href="javascript:void(0)" class="btn-wave scroll"><?php _e('Reservation', TEXT_DOMAIN); ?></a>
                            <a href="tel:+<?php echo $link_number?>" class="hotline-number"><?php
                                echo $global_settings['theme_setting_header_phone'];
                                ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="intro">
                <h1><?php echo apply_filters( 'header_title', "" );?></h1>
                <h2 class="intro-home-h2"><?php echo apply_filters( 'header_subtitle', "" );?></h2>
                <h3 class="intro-location"><?php _e('Ho Tram – Ba Ria Vung Tau, Viet Nam', TEXT_DOMAIN); ?></h3>
                <br/>
                <a data-scroll="#<?php echo apply_filters( 'header_button_link', "page-content" );?>" href="javascript:void(0);" class="btn-default scroll"><?php echo apply_filters( 'header_button_text', __('Scroll Down',TEXT_DOMAIN) );?></a>
            </div>

        </div>
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
    </header>
</section>
