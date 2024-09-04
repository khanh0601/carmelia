<?php
/**
 * Created by PhpStorm.
 * User: splus
 * Date: 12/25/18
 * Time: 11:10
 */

add_action( 'admin_menu', 'nstrm_remove_admin_submenus', 999 );
function nstrm_remove_admin_submenus() {
    remove_submenu_page( 'es-view-subscribers', 'es-general-information' );
    remove_submenu_page( 'es-view-subscribers', 'es-pricing' );
    remove_submenu_page( 'es-view-subscribers', 'es-sentmail' );
    remove_submenu_page( 'es-view-subscribers', 'es-tools' );
    remove_submenu_page( 'es-view-subscribers', 'es-settings' );
    remove_submenu_page( 'es-view-subscribers', 'es-sendemail' );
    remove_submenu_page( 'es-view-subscribers', 'es-notification' );
    remove_submenu_page( 'es-view-subscribers', 'edit.php?post_type=es_template' );
}
?>