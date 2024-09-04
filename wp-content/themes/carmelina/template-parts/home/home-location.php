<?php
/**
 * Created by PhpStorm.
 * User: splus
 * Date: 12/26/18
 * Time: 00:07
 */
global $global_settings;
?>

<section class="section-location">
    <div class="section-location-overflow">
        <div class="container">
            <div class="location-map-grid">
                <div class="location">
                    <h5><?php _e('Carmelina',TEXT_DOMAIN); ?></h5>
                    <h6><?php _e('Location',TEXT_DOMAIN); ?></h6>
                    <p><?php _e('Ideally located on a secluded stretch of Ho Tram beach, just a short trip away from the bustling Ho Chi Minh and Vung Tau City.',TEXT_DOMAIN); ?></p>
                    <a href="<?php
                        if($global_settings['theme_setting_location']) echo $global_settings['theme_setting_location'];
                    ?>" class="btn-wave" target="_blank"><?php _e('FIND US',TEXT_DOMAIN); ?></a>
                </div>

                <div class="location-map">
                    <div class="location-map-cuver"></div>
                    <div class="location-map-background"></div>
                </div>
            </div>
        </div>
    </div>

</section>