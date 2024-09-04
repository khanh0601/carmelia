<?php
/**
 * Created by PhpStorm.
 * User: splus
 * Date: 12/26/18
 * Time: 00:07
 */

global $global_settings;
$args = array(
    'numberposts' => -1,
    'post_type'   => 'room-post',
    'suppress_filters'=>0,
    'order'=> 'DESC',
);
$list_post_room= get_posts( $args );
?>
<section class="get-info-form">
    <div class="container">
        <div class="get-info-form-content">
            <div class="get-info-form-content-grid">
                <div class="get-away">
                    <div class="get-away-content">
                        <h5><?php _e('Get Away To',TEXT_DOMAIN);?></h5>
                        <h6><?php _e('Carmelina',TEXT_DOMAIN);?></h6>
                        <p class="description"><?php _e('Move Carmelina Beach Resort off your bucket list and onto your calendar today!',TEXT_DOMAIN);?></p>
                        <div class="weather">
                            <div class="weather-number">
                                <?php if(isset($global_settings['theme_setting_weather_temp_celcius'])) {
                                    if ($global_settings['theme_setting_weather_temp_celcius']) {
                                        echo $global_settings['theme_setting_weather_temp_celcius'];
                                    ?><sup>o</sup>C
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                            <p><?php
                                if(ICL_LANGUAGE_CODE == 'vi' && isset($global_settings['theme_setting_weather_temp_description_vi']))
                                {
                                    echo $global_settings['theme_setting_weather_temp_description_vi'];
                                }
                                else if ( isset($global_settings['theme_setting_weather_temp_description_en']))
                                {
                                    echo $global_settings['theme_setting_weather_temp_description_en'];
                                }
                                ?></p>
                            <div class="mostly"><img src="<?php echo get_template_directory_uri()?>/imgs/coconutleaf-sunny.png" alt="<?php echo get_bloginfo( 'name' ); ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="get-info-form-data">
                    <form class="active" action="<?php echo admin_url('admin-ajax.php');?>?action=carmelina_info_form" method="post" id="checkin-form" autocomplete="off">
                        <div class="row">
                            <div class="input-field input-field-select col s3">
                                <select name="checkin-gender">
                                    <option value="Mr"><?php _e('Mr',TEXT_DOMAIN);?></option>
                                    <option value="Mrs"><?php _e('Mrs',TEXT_DOMAIN);?></option>
                                    <option value="Ms"><?php _e('Ms',TEXT_DOMAIN);?></option>
                                    <option value="Miss"><?php _e('Miss',TEXT_DOMAIN);?></option>
                                </select>
                                <label><?php _e('Title',TEXT_DOMAIN);?></label>
                            </div>

                            <div class="input-field col s9">
                                <input id="full_name" type="text" name="checkin-full-name" maxlength="255">
                                <label for="full_name"><?php _e('Full name',TEXT_DOMAIN);?></label>
                                <span class="helper-text hidden" id="infoform-error-fullname" data-name-empty="<?php _e('Please fill your full name',TEXT_DOMAIN);?>"></span>
                            </div>
							
							<div class="input-field col s12">
                                <input id="nationality" type="text" name="checkin-nationality" maxlength="255">
                                <label for="nationality"><?php _e('Nationality','default');?></label>
                                <span class="helper-text hidden" id="infoform-error-nationality" data-name-empty="<?php _e('Please fill your nationality',TEXT_DOMAIN);?>"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="checkin-email" type="email" name="checkin-email" maxlength="255">
                                <label for="checkin-email"><?php _e('Email',TEXT_DOMAIN);?></label>
                                <span class="helper-text hidden" id="infoform-error-email" data-email-empty="<?php _e('Please fill your email',TEXT_DOMAIN);?>" data-email-invalid="<?php _e('Invalid email',TEXT_DOMAIN);?>"></span>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="phone_number" type="text" name="checkin-phone" maxlength="20">
                                <label for="phone_number"><?php _e('Phone number',TEXT_DOMAIN);?></label>
                                <span class="helper-text hidden" id="infoform-error-phone" data-phone-empty="<?php _e('Please fill your phone number',TEXT_DOMAIN);?>" data-phone-invalid="<?php _e('Invailid phone number',TEXT_DOMAIN);?>"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field input-field-select col s12 m4">
                                <select name="checkin-guest" id="footer-form-guest">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">10+</option>
                                </select>
                                <label><?php _e('No. of Guest(s)',TEXT_DOMAIN);?></label>
                            </div>
							<div class="input-field input-field-select col s12 m4">
                                <select name="checkin-child" id="footer-form-child">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">10+</option>
                                </select>
                                <label><?php _e('No. of Child(s)','default');?></label>
                            </div>
                            <div class="input-field input-field-select col s12 m4">
                                <select name="checkin-room" id="footer-form-room">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">10+</option>
                                </select>
                                <label><?php _e('No. of Room(s)',TEXT_DOMAIN);?></label>
                            </div>
                            <div class="input-field col s12  m6 footer-form-checkin">
                                <input id="checkin" name="checkin-date" type="text" readonly value="">
                                <label for="checkin" class="active"><?php _e('Check In - Check Out',TEXT_DOMAIN);?></label>
                                <span class="helper-text hidden" id="infoform-error-date"
                                      data-empty-date="<?php _e('Please choose your Check In - Check Out time',TEXT_DOMAIN);?>"></span>
                            </div>
							<div class="input-field input-field-select col s12   m6 ">
                                <select name="checkin-room-type" id="footer-form-room-type">
                                    <?php foreach ($list_post_room as $key=>$item) { ?>
                                        <option value="<?php echo $item->ID;?>"><?php echo $item->post_title;?></option>
                                    <?php } ?>
                                </select>
                                <label><?php _e('Room Type',TEXT_DOMAIN);?></label>
                            </div>
                        </div>


                        <div class="row">
                            <div class="input-field col s12">
                                <input id="transportation" type="text" name="checkin-transportation" maxlength="300">
                                <label for="transportation"><?php _e('Transportation','default');?></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="enquiry" type="text" name="checkin-enquiry" maxlength="300">
                                <label for="enquiry"><?php _e('Enquiry',TEXT_DOMAIN);?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 input-gcapt">
                                <div id="recaptcha-home-desktop" class="g-recaptcha" data-sitekey="6Lfak4AUAAAAALtQHafqfqn1c_uAdVrE246QKhZq" data-size="normal"></div>
                                <span class="helper-text hidden" id="infoform-error-recaptcha"
                                      data-invalid-recaptcha="<?php _e('Please make sure your are not robot',TEXT_DOMAIN);?>"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 input-submit">
                                <button class="btn-wave checkin-form-submit" type="submit"><?php _e('Send',TEXT_DOMAIN);?></button>
                            </div>
                            <span class="helper-text hidden top-space-1" id="infoform-success"><?php _e('Thank you! We will contact you soon.',TEXT_DOMAIN);?></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>