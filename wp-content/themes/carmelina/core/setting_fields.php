<?php
/**
 * Created by PhpStorm.
 * User: splus
 * Date: 12/25/18
 * Time: 11:10
 */


class HeaderFooterSocial {
    private $header_footer_social_options;

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'header_footer_social_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'header_footer_social_page_init' ) );
    }

    public function header_footer_social_add_plugin_page() {
        add_menu_page(
            'Header, Footer, Social', // page_title
            'Theme Setting Header Footer', // menu_title
            'manage_options', // capability
            'header-footer-social', // menu_slug
            array( $this, 'header_footer_social_create_admin_page' ), // function
            'dashicons-admin-generic', // icon_url
            3 // position
        );
    }

    public function header_footer_social_create_admin_page() {
        $this->header_footer_social_options = get_option( 'header_footer_social_option_name' ); ?>

        <div class="wrap">
            <h2>Header, Footer, Social</h2>
            <p></p>
            <?php settings_errors(); ?>

            <form method="post" action="options.php">
                <?php
                settings_fields( 'header_footer_social_option_group' );
                do_settings_sections( 'header-footer-social-admin' );
                submit_button();
                ?>
            </form>
        </div>
    <?php }

    public function header_footer_social_page_init() {
        register_setting(
            'header_footer_social_option_group', // option_group
            'header_footer_social_option_name', // option_name
            array( $this, 'header_footer_social_sanitize' ) // sanitize_callback
        );

        add_settings_section(
            'header_footer_social_setting_section', // id
            'Settings', // title
            array( $this, 'header_footer_social_section_info' ), // callback
            'header-footer-social-admin' // page
        );

        add_settings_field(
            'theme_setting_header_phone', // id
            'Header Phone', // title
            array( $this, 'theme_setting_header_phone_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_footer_left_phone', // id
            'Footer Left Phone', // title
            array( $this, 'theme_setting_footer_left_phone_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_footer_left_fax', // id
            'Footer Left Fax', // title
            array( $this, 'theme_setting_footer_left_fax_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_footer_left_email', // id
            'Footer Left Email', // title
            array( $this, 'theme_setting_footer_left_email_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_footer_left_address_en', // id
            'Footer Left Address EN', // title
            array( $this, 'theme_setting_footer_left_address_en_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_footer_left_address_vi', // id
            'Footer Left Address VI', // title
            array( $this, 'theme_setting_footer_left_address_vi_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_sale_hcm_address_en', // id
            'Sale HCM Address EN', // title
            array( $this, 'theme_setting_sale_hcm_address_en_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_sale_hcm_address_vi', // id
            'Sale HCM Address VI', // title
            array( $this, 'theme_setting_sale_hcm_address_vi_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_sale_hcm_phone', // id
            'Sale HCM Phone', // title
            array( $this, 'theme_setting_sale_hcm_phone_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_sale_hcm_fax', // id
            'Sale HCM Fax', // title
            array( $this, 'theme_setting_sale_hcm_fax_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_sale_hcm_email', // id
            'Sale HCM Email', // title
            array( $this, 'theme_setting_sale_hcm_email_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_instagram_url', // id
            'Instagram URL', // title
            array( $this, 'theme_setting_instagram_url_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_facebook_url', // id
            'Facebook URL', // title
            array( $this, 'theme_setting_facebook_url_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_tripadvisor_url', // id
            'TripAdvisor URL', // title
            array( $this, 'theme_setting_tripadvisor_url_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_weather_api_token', // id
            'Weather api token', // title
            array( $this, 'theme_setting_weather_api_token_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_weather_temp_celcius', // id
            'Weather Temp Celcius', // title
            array( $this, 'theme_setting_weather_temp_celcius_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_weather_temp_description_en', // id
            'Weather Temp Description En', // title
            array( $this, 'theme_setting_weather_temp_description_en_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_weather_temp_description_vi', // id
            'Weather Temp Description Vi', // title
            array( $this, 'theme_setting_weather_temp_description_vi_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );

        add_settings_field(
            'theme_setting_location', // id
            'Location PDF file', // title
            array( $this, 'theme_setting_location_callback' ), // callback
            'header-footer-social-admin', // page
            'header_footer_social_setting_section' // section
        );
    }

    public function header_footer_social_sanitize($input) {
        $sanitary_values = array();
        if ( isset( $input['theme_setting_header_phone'] ) ) {
            $sanitary_values['theme_setting_header_phone'] = sanitize_text_field( $input['theme_setting_header_phone'] );
        }

        if ( isset( $input['theme_setting_footer_left_phone'] ) ) {
            $sanitary_values['theme_setting_footer_left_phone'] = sanitize_text_field( $input['theme_setting_footer_left_phone'] );
        }

        if ( isset( $input['theme_setting_footer_left_fax'] ) ) {
            $sanitary_values['theme_setting_footer_left_fax'] = sanitize_text_field( $input['theme_setting_footer_left_fax'] );
        }

        if ( isset( $input['theme_setting_footer_left_email'] ) ) {
            $sanitary_values['theme_setting_footer_left_email'] = sanitize_text_field( $input['theme_setting_footer_left_email'] );
        }

        if ( isset( $input['theme_setting_footer_left_address_en'] ) ) {
            $sanitary_values['theme_setting_footer_left_address_en'] = sanitize_text_field( $input['theme_setting_footer_left_address_en'] );
        }

        if ( isset( $input['theme_setting_footer_left_address_vi'] ) ) {
            $sanitary_values['theme_setting_footer_left_address_vi'] = sanitize_text_field( $input['theme_setting_footer_left_address_vi'] );
        }

        if ( isset( $input['theme_setting_sale_hcm_address_en'] ) ) {
            $sanitary_values['theme_setting_sale_hcm_address_en'] = sanitize_text_field( $input['theme_setting_sale_hcm_address_en'] );
        }

        if ( isset( $input['theme_setting_sale_hcm_address_vi'] ) ) {
            $sanitary_values['theme_setting_sale_hcm_address_vi'] = sanitize_text_field( $input['theme_setting_sale_hcm_address_vi'] );
        }

        if ( isset( $input['theme_setting_sale_hcm_phone'] ) ) {
            $sanitary_values['theme_setting_sale_hcm_phone'] = sanitize_text_field( $input['theme_setting_sale_hcm_phone'] );
        }

        if ( isset( $input['theme_setting_sale_hcm_fax'] ) ) {
            $sanitary_values['theme_setting_sale_hcm_fax'] = sanitize_text_field( $input['theme_setting_sale_hcm_fax'] );
        }

        if ( isset( $input['theme_setting_sale_hcm_email'] ) ) {
            $sanitary_values['theme_setting_sale_hcm_email'] = sanitize_text_field( $input['theme_setting_sale_hcm_email'] );
        }

        if ( isset( $input['theme_setting_instagram_url'] ) ) {
            $sanitary_values['theme_setting_instagram_url'] = sanitize_text_field( $input['theme_setting_instagram_url'] );
        }

        if ( isset( $input['theme_setting_facebook_url'] ) ) {
            $sanitary_values['theme_setting_facebook_url'] = sanitize_text_field( $input['theme_setting_facebook_url'] );
        }

        if ( isset( $input['theme_setting_tripadvisor_url'] ) ) {
            $sanitary_values['theme_setting_tripadvisor_url'] = sanitize_text_field( $input['theme_setting_tripadvisor_url'] );
        }

        if ( isset( $input['theme_setting_weather_api_token'] ) ) {
            $sanitary_values['theme_setting_weather_api_token'] = sanitize_text_field( $input['theme_setting_weather_api_token'] );
        }

        if ( isset( $input['theme_setting_weather_temp_celcius'] ) ) {
            $sanitary_values['theme_setting_weather_temp_celcius'] = sanitize_text_field( $input['theme_setting_weather_temp_celcius'] );
        }

        if ( isset( $input['theme_setting_weather_temp_description_en'] ) ) {
            $sanitary_values['theme_setting_weather_temp_description_en'] = sanitize_text_field( $input['theme_setting_weather_temp_description_en'] );
        }
        if ( isset( $input['theme_setting_weather_temp_description_vi'] ) ) {
            $sanitary_values['theme_setting_weather_temp_description_vi'] = sanitize_text_field( $input['theme_setting_weather_temp_description_vi'] );
        }

        if ( isset( $input['theme_setting_location'] ) ) {
            $sanitary_values['theme_setting_location'] = sanitize_text_field( $input['theme_setting_location'] );
        }

        return $sanitary_values;
    }

    public function header_footer_social_section_info() {

    }

    public function theme_setting_header_phone_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_header_phone]" id="theme_setting_header_phone" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_header_phone'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_header_phone']) : ''
        );
    }

    public function theme_setting_footer_left_phone_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_footer_left_phone]" id="theme_setting_footer_left_phone" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_footer_left_phone'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_footer_left_phone']) : ''
        );
    }

    public function theme_setting_footer_left_fax_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_footer_left_fax]" id="theme_setting_footer_left_fax" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_footer_left_fax'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_footer_left_fax']) : ''
        );
    }

    public function theme_setting_footer_left_email_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_footer_left_email]" id="theme_setting_footer_left_email" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_footer_left_email'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_footer_left_email']) : ''
        );
    }

    public function theme_setting_footer_left_address_en_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_footer_left_address_en]" id="theme_setting_footer_left_address_en" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_footer_left_address_en'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_footer_left_address_en']) : ''
        );
    }

    public function theme_setting_footer_left_address_vi_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_footer_left_address_vi]" id="theme_setting_footer_left_address_vi" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_footer_left_address_vi'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_footer_left_address_vi']) : ''
        );
    }

    public function theme_setting_sale_hcm_address_en_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_sale_hcm_address_en]" id="theme_setting_sale_hcm_address_en" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_sale_hcm_address_en'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_sale_hcm_address_en']) : ''
        );
    }

    public function theme_setting_sale_hcm_address_vi_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_sale_hcm_address_vi]" id="theme_setting_sale_hcm_address_vi" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_sale_hcm_address_vi'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_sale_hcm_address_vi']) : ''
        );
    }

    public function theme_setting_sale_hcm_phone_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_sale_hcm_phone]" id="theme_setting_sale_hcm_phone" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_sale_hcm_phone'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_sale_hcm_phone']) : ''
        );
    }

    public function theme_setting_sale_hcm_fax_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_sale_hcm_fax]" id="theme_setting_sale_hcm_fax" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_sale_hcm_fax'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_sale_hcm_fax']) : ''
        );
    }

    public function theme_setting_sale_hcm_email_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_sale_hcm_email]" id="theme_setting_sale_hcm_email" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_sale_hcm_email'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_sale_hcm_email']) : ''
        );
    }

    public function theme_setting_instagram_url_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_instagram_url]" id="theme_setting_instagram_url" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_instagram_url'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_instagram_url']) : ''
        );
    }

    public function theme_setting_facebook_url_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_facebook_url]" id="theme_setting_facebook_url" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_facebook_url'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_facebook_url']) : ''
        );
    }

    public function theme_setting_tripadvisor_url_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_tripadvisor_url]" id="theme_setting_tripadvisor_url" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_tripadvisor_url'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_tripadvisor_url']) : ''
        );
    }

    public function theme_setting_weather_api_token_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_weather_api_token]" id="theme_setting_weather_api_token" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_weather_api_token'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_weather_api_token']) : ''
        );
    }

    public function theme_setting_weather_temp_celcius_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_weather_temp_celcius]" id="theme_setting_weather_temp_celcius" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_weather_temp_celcius'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_weather_temp_celcius']) : ''
        );
    }

    public function theme_setting_weather_temp_description_en_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_weather_temp_description_en]" id="theme_setting_weather_temp_description_en" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_weather_temp_description_en'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_weather_temp_description_en']) : ''
        );
    }

    public function theme_setting_weather_temp_description_vi_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_weather_temp_description_vi]" id="theme_setting_weather_temp_description_vi" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_weather_temp_description_vi'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_weather_temp_description_vi']) : ''
        );
    }

    public function theme_setting_location_callback() {
        printf(
            '<input class="regular-text" type="text" name="header_footer_social_option_name[theme_setting_location]" id="theme_setting_location" value="%s">',
            isset( $this->header_footer_social_options['theme_setting_location'] ) ? esc_attr( $this->header_footer_social_options['theme_setting_location']) : ''
        );
    }

}
if ( is_admin() )
    $header_footer_social = new HeaderFooterSocial();

/* 
 * Retrieve this value with:
 * $header_footer_social_options = get_option( 'header_footer_social_option_name' ); // Array of All Options
 * $theme_setting_header_phone = $header_footer_social_options['theme_setting_header_phone']; // Header Phone
 * $theme_setting_footer_left_phone = $header_footer_social_options['theme_setting_footer_left_phone']; // Footer Left Phone
 * $theme_setting_footer_left_fax = $header_footer_social_options['theme_setting_footer_left_fax']; // Footer Left Fax
 * $theme_setting_footer_left_email = $header_footer_social_options['theme_setting_footer_left_email']; // Footer Left Email
 * $theme_setting_footer_left_address_en = $header_footer_social_options['theme_setting_footer_left_address_en']; // Footer Left Address EN
 * $theme_setting_footer_left_address_vi = $header_footer_social_options['theme_setting_footer_left_address_vi']; // Footer Left Address VI
 * $theme_setting_sale_hcm_address_en = $header_footer_social_options['theme_setting_sale_hcm_address_en']; // Sale HCM Address EN
 * $theme_setting_sale_hcm_address_vi = $header_footer_social_options['theme_setting_sale_hcm_address_vi']; // Sale HCM Address VI
 * $theme_setting_sale_hcm_phone = $header_footer_social_options['theme_setting_sale_hcm_phone']; // Sale HCM Phone
 * $theme_setting_sale_hcm_fax = $header_footer_social_options['theme_setting_sale_hcm_fax']; // Sale HCM Fax
 * $theme_setting_sale_hcm_email = $header_footer_social_options['theme_setting_sale_hcm_email']; // Sale HCM Email
 * $theme_setting_instagram_url = $header_footer_social_options['theme_setting_instagram_url']; // Instagram URL
 * $theme_setting_facebook_url = $header_footer_social_options['theme_setting_facebook_url']; // Facebook URL
 * $theme_setting_tripadvisor_url = $header_footer_social_options['theme_setting_tripadvisor_url']; // TripAdvisor URL
 * $theme_setting_weather_api_token = $header_footer_social_options['theme_setting_weather_api_token']; // Weather api token
 * $theme_setting_weather_temp_celcius = $header_footer_social_options['theme_setting_weather_temp_celcius']; // Weather Temp Celcius
 * $theme_setting_weather_temp_description_en = $header_footer_social_options['theme_setting_weather_temp_description_en']; // Weather Temp Description
 * $theme_setting_location = $header_footer_social_options['theme_setting_location']; // Download Location pdf
 */


/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Subscriber',
        'id'            => 'subscriber',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
?>