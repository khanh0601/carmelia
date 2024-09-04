<?php
/**
 * Created by PhpStorm.
 * User: splus
 * Date: 12/25/18
 * Time: 10:37
 */

if (has_post_thumbnail())
{
    function page_change_header_image( $output ) {
        global $post_id;
        $header_image = get_the_post_thumbnail($post_id,"full",array('class' => 'header-background'));

        $output = $header_image;
        return $output;
    }
    add_filter( 'header_style', 'page_change_header_image' );
}

function page_change_header_title( $output ) {
    global $post_id;
    $output = get_field( "page_header_title",$post_id );
    return $output;
}
add_filter( 'header_title', 'page_change_header_title' );

function page_change_header_subtitle( $output ) {
    global $post_id;
    $output = get_field( "page_header_subtitle",$post_id );
    return $output;
}
add_filter( 'header_subtitle', 'page_change_header_subtitle' );

function page_change_header_button_link( $output ) {
    global $post_id;
    $result = get_field( "page_header_anchor_link",$post_id );
    if($result)
    {
        return $result;
    }
    return $output;
}
add_filter( 'header_button_link', 'page_change_header_button_link' );

function page_change_header_button_text( $output ) {
    global $post_id;
    $result = get_field( "page_header_button_text",$post_id );
    if($result)
    {
        return $result;
    }
    return $output;
}
add_filter( 'header_button_text', 'page_change_header_button_text' );