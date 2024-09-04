<?php
/**
 * Created by PhpStorm.
 * User: splus
 * Date: 12/25/18
 * Time: 10:36
 */
/** The text domain. */
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define( 'THEME_URL', get_stylesheet_directory() );
define( 'THEME_CSS', THEME_URL . '/css' );
define( 'THEME_JS', THEME_URL . '/js' );
define( 'CORE', THEME_URL . '/core' );
require_once( CORE . '/init.php' );
require_once( CORE . '/setting_fields.php' );
require_once( CORE . '/disable_menu.php' );
require_once( CORE . '/recaptcha.php' );
$language_folder = THEME_URL . '/languages';
load_theme_textdomain( 'wpml_theme', $language_folder );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

register_nav_menu ( 'primary-menu-left', __('Primary Menu Left', TEXT_DOMAIN) );
register_nav_menu ( 'primary-menu-right', __('Primary Menu Right', TEXT_DOMAIN) );
register_nav_menu ( 'footer-menu', __('Footer Menu', TEXT_DOMAIN) );

$global_settings = get_option( 'header_footer_social_option_name' );

/*enqueue script and style*/
function carmelina_styles() {
    wp_enqueue_style( 'app', get_template_directory_uri() . '/css/style.min.css', array(), '1.2', 'all');
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/js/slick/slick.css', array(), '', 'all');
    wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/js/slick/slick-theme.css', array(), '', 'all');
    wp_enqueue_style( 'materialize', get_template_directory_uri() . '/css/materialize.css', array(), '', 'all');
    wp_enqueue_style( 'daterangepicker', get_template_directory_uri() . '/css/daterangepicker.css', array(), '', 'all');
    wp_enqueue_style( 'lighgallery', get_template_directory_uri() . '/js/ligh-gallery/css/lightgallery.min.css', array(), '', 'all');
	wp_enqueue_style( 'cspopup', get_template_directory_uri() . '/css/cspopup.css', array(), '1.2', 'all');
	
    wp_dequeue_style('es-widget-css');
    wp_deregister_style( 'wp-core-blocks-theme' );
	
    wp_dequeue_script('es-widget-page');
    wp_enqueue_script( 'jquerylib', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js', 1, '', true);
    wp_enqueue_script( 'moment1', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js', 3, '', true);
    wp_enqueue_script( 'daterangepicker', get_template_directory_uri() . '/js/daterangepicker.js', 4, '', true);


    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick/slick.min.js', 5, '', true);
    wp_enqueue_script( 'materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js', 6, '', true);
    wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js', 7, '', true);
    wp_enqueue_script( 'mousewheel1', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js', 8, '', true);
    wp_enqueue_script( 'lightgallery', get_template_directory_uri() . '/js/ligh-gallery/js/lightgallery-all.min.js', 9, '', true);
	
    wp_enqueue_script( 'bootstraptab', get_template_directory_uri() . '/js/bootstrap.min.js', 10, '', true);
    wp_enqueue_script( 'appjs', get_template_directory_uri() . '/js/app.js', 11, "", true);

}
  add_action( 'wp_enqueue_scripts', 'carmelina_styles' );
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );

function wpdocs_dequeue_script() {
    wp_dequeue_script( 'jquery' );
}
add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );

/*subscribe*/
add_action( 'wp_ajax_carmelina_update_weather', 'carmelina_update_weather_handle' );
add_action( 'wp_ajax_nopriv_carmelina_update_weather', 'carmelina_update_weather_handle' );
function carmelina_update_weather_handle() {
    $global_settings = get_option( 'header_footer_social_option_name' );
    /*english version*/
    $url = 'http://api.openweathermap.org/data/2.5/weather?id=1562414&lang=vi&units=metric&appid=487aa62776bd187a0d828b27a9e5339a';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($data,true);

    $global_settings['theme_setting_weather_temp_celcius'] = $data['main']['temp'];
    $global_settings['theme_setting_weather_temp_description_vi'] = $data['weather'][0]['description'];

    /*vietnamese version*/
    $url = 'http://api.openweathermap.org/data/2.5/weather?id=1562414&lang=en&units=metric&appid=487aa62776bd187a0d828b27a9e5339a';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($data,true);

    $global_settings['theme_setting_weather_temp_description_en'] = $data['weather'][0]['description'];

    $result = update_option('header_footer_social_option_name',$global_settings);

    wp_send_json_success($result) ;
}
/*subscribe*/
add_action( 'wp_ajax_carmelina_email_subcribe', 'carmelina_email_subcribe_handle' );
add_action( 'wp_ajax_nopriv_carmelina_email_subcribe', 'carmelina_email_subcribe_handle' );
function carmelina_email_subcribe_handle() {
    global $wpdb;
    $email = $_POST['email-signup'];
    $nonce = $_POST['_email_subcirbe_token'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        wp_send_json_error('invalid-email');
        wp_die();
    }
    else if(strlen($email)>255)
    {
        wp_send_json_error('invalid-length');
        wp_die();
    }
    else if(! wp_verify_nonce( $nonce, 'email_subscribe_lasfafdsaf' ))
    {
        wp_send_json_error('invalid-nonce');
        wp_die();
    }
    else
    {
        $count = $wpdb->get_var( 'SELECT COUNT(*) FROM `'.$wpdb->prefix.'es_emaillist` WHERE `es_email_mail`="'.$email.'"' );

        if($count ==1)
        {
            wp_send_json_error('email-exist');
            wp_die();
        }
        /*insert*/
        $query = $wpdb->prepare( "INSERT INTO {$wpdb->prefix}es_emaillist
									(es_email_name, es_email_mail, es_email_status, es_email_created, es_email_viewcount, es_email_group, es_email_guid) 
									 VALUES (%s, %s, %s, %s, %s, %s, %s)", array( 'visitor',$email,'Unconfirmed',date('Y-m-d G:i:s'),0,'Subcriber',es_cls_common::es_generate_guid(60)) );
        $wpdb->query( $query );
        /*sucess*/
        wp_send_json_success(wp_create_nonce( 'email_subscribe_lasfafdsaf' ));
        wp_die();
    }
}


/*subscribe*/
add_action( 'wp_ajax_carmelina_info_form', 'carmelina_info_form_handle' );
add_action( 'wp_ajax_nopriv_carmelina_info_form', 'carmelina_info_form_handle' );
function carmelina_info_form_handle() {
    $error = array();
    /*gender*/
    $gender = $_POST["checkin-gender"];
    $full_name = $_POST['checkin-full-name'];
	$nationality = $_POST['checkin-nationality'];
    $email = $_POST['checkin-email'];
    $phone = $_POST['checkin-phone'];
    $guest_number = $_POST['checkin-guest'];
	$child_number = $_POST['checkin-child'];
    $room_number = $_POST['checkin-room'];
    $date = explode('-',$_POST['checkin-date']);
    $room_type = $_POST['checkin-room-type'];
    $enquiry = $_POST['checkin-enquiry'];
	$transportation = $_POST['checkin-transportation'];

    $args = array(
        'numberposts' => -1,
        'post_type'   => 'room-post',
        'suppress_filters'=>0,
        'order'=> 'ASC',
    );
    $list_post_room= get_posts( $args );


    $array_room_id = array();
    $room_name = array();
    foreach ($list_post_room as $room)
    {
        $array_room_id[]= $room->ID;
        $room_name[$room->ID]= $room->post_title;
    }
    /*validate form*/
    if(!in_array($gender,array('Ms',"Mr","Mrs","Miss")))
    {
        $error['infoform-error-gender'] = 'gender-invalid';
    }
    if(empty($full_name))
    {
        $error['infoform-error-fullname'] = 'name-empty';
    }
    elseif (strlen($full_name)>255)
    {
        $error['infoform-error-fullname'] = 'name-maxlength';
    }
	
	if(empty($nationality))
    {
        $error['infoform-error-nationality'] = 'name-empty';
    }
    elseif (strlen($nationality)>255)
    {
        $error['infoform-error-nationality'] = 'name-maxlength';
    }

    if(empty($email))
    {
        $error['infoform-error-email'] = 'email-empty';
    }
    elseif (strlen($email)>255)
    {
        $error['infoform-error-email'] = 'email-maxlength';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error['infoform-error-email'] = 'email-invalid';
    }

    if(empty($phone))
    {
        $error['infoform-error-phone'] = 'phone-empty';
    }
    elseif (strlen($phone)>20)
    {
        $error['infoform-error-phone'] = 'phone-maxlength';
    }
    elseif (preg_replace("/[0-9]+/", '', $phone))
    {
        $error['infoform-error-phone'] = 'phone-invalid';
    }

    if(!in_array($guest_number,array(1,2,3,4,5,6,7,8,9,10,'10+')))
    {
        $error['infoform-error-guest'] = 'guest-invalid';
    }

    if(!in_array($room_number,array(1,2,3,4,5,6,7,8,9,10,'10+')))
    {
        $error['infoform-error-room'] = 'room-invalid';
    }
	if(!in_array($child_number,array(1,2,3,4,5,6,7,8,9,10,'10+')))
    {
        $error['infoform-error-child'] = 'child-invalid';
    }

    if(!in_array($room_type,$array_room_id))
    {
        $error['infoform-error-roomtype'] = 'room-type-invalid';
    }

    $current_date = date("y/m/d");
    $current_date = DateTime::createFromFormat("y/m/d", $current_date);
    /*validate date*/
    if(count($date)<2)
    {
        $error['infoform-error-date'] = 'date-invalid';
    }
    $datein = trim($date[0]);
    $dateout = trim($date[1]);
    $dtin = DateTime::createFromFormat("d/m/y", $datein);
    $dtout = DateTime::createFromFormat("d/m/y", $dateout);

    if($dtin == false || $dtout == false)
    {
        $error['infoform-error-date'] = 'date-invalid';
    }
    elseif ($dtin>$dtout || $dtin <$current_date || $dtout <$current_date)
    {
        $error['infoform-error-date'] = 'date-invalid';
    }

    if (strlen($enquiry)>255)
    {
        $error['infoform-error-enquiry'] = 'enquiry-maxlength';
    }
	if (strlen($transportation)>255)
    {
        $error['infoform-error-transportation'] = 'transportation-maxlength';
    }

    $secret = "6Lfak4AUAAAAABCFOUtyBKCQwbEYY5qMZTdkMGJr";
    $resp = null;
    $reCaptcha = new ReCaptcha($secret);
    if (!empty($_POST["g-recaptcha-response"])) {
        $resp = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
        if ($resp == null) {
            $error['infoform-error-recaptcha'] = 'invalid-recaptcha';
        }
    }
    else
    {
        $error['infoform-error-recaptcha'] = 'invalid-recaptcha';
    }


    /*send email to admin*/
    if(!empty($error))
    {
        wp_send_json_error($error);
        wp_die();
    }
    else
    {
        $message = "<strong>Full Name</strong> ".$gender.":".$full_name."<br/>";
		$message.= "<strong>Nationality</strong> ".$nationality."<br/>";
        $message.= "<strong>Email</strong> ".$email."<br/>";
        $message.= "<strong>Phone</strong> ".$phone."<br/>";
        $message.= "<strong>Guest Number</strong> ".$guest_number."<br/>";
		$message.= "<strong>Child Number</strong> ".$child_number."<br/>";
        $message.= "<strong>Room Number</strong> ".$room_number."<br/>";
        $message.= "<strong>Room Type</strong> ".$room_name[$room_type]."<br/>";
        $message.= "<strong>Checkin - Checkout</strong> ".$_POST['checkin-date']."<br/>";
		$message.= "<strong>Enquiry</strong> ".$enquiry."<br/>";
        $message.= "<strong>Transportation</strong> ".$transportation."<br/>";
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $result = wp_mail('booking@carmelinaresort.com','User Booking',$message,$headers);
		
		
		// send to user
		ob_start();
		include(get_stylesheet_directory() . '/template-parts/emails/booking-success.php');
		$email_content = ob_get_contents();
		ob_end_clean();
		
		$result2 = wp_mail($email, "Thank you for your interest in Carmelina Beach Resort!", $email_content, $headers);
		

        if($result)
        {
            wp_send_json_success('thanks');
        }
        else
        {
            wp_send_json_error("Can not send email, please contact admin.");
        }

        wp_die();
    }
    /*co send cho user ko*/

}

function cmpGalleryGrid($a, $b)
{
    return $a['ID']>$b['ID'];
}


/*subscribe*/
add_action( 'wp_ajax_carmelina_load_grid_gallery', 'carmelina_load_grid_gallery' );
add_action( 'wp_ajax_nopriv_carmelina_load_grid_gallery', 'carmelina_load_grid_gallery' );
function carmelina_load_grid_gallery() {
    $args = array(
        'post_type'   => 'gallery-grid-post',
        'suppress_filters'=>0,
        'order'=> 'ASC',
        'numberposts' => -1,
    );

    $gallery_post = get_posts( $args );

    $all_image = array();
    $list_image= array();
    $list_id= array();
    $total_page = array();
    foreach ($gallery_post as $key => $post)
    {
        $list_image[$post->ID] = get_field('gallery_image',$post->ID);
        $list_id[] = $post->ID;
        $total_page[$post->ID] = ceil(count($list_image[$post->ID])/13);
        $all_image = array_merge($list_image[$post->ID],$all_image);
    }
    $total_page['all'] = ceil(count($all_image)/13);
    $list_image['all'] = $all_image;

    $page = $_REQUEST['page'] ;
    $galleryID = $_REQUEST['gallery'] ;

    /*validate gallery id*/
    if(!in_array($galleryID,array_merge(array('all'),$list_id)))
    {
        wp_send_json_error('fail');
    }

    if(!is_numeric($page) || $page<1 || $page>$total_page[$galleryID])
    {
        wp_send_json_error('fail');
    }

    /*all valid*/
    $result_list = array_slice($list_image[$galleryID],($page-1)*13,13);

    wp_send_json_success($result_list);
}

