<?php

/**
 * Theme filters.
 *
 * @copyright https://roots.io/ Roots
 * @license   https://opensource.org/licenses/MIT MIT
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});
 
add_filter('admin_footer_text', function() {
    echo '<span>Custom theme development by <a href="https://rndr.tech" target="_blank">rndr.tech</a></span>';
});

//NOTE: update the '221' to the ID of your form
add_filter( 'gform_pre_render_4', __NAMESPACE__  . '\\populate_checkbox' );
add_filter( 'gform_pre_validation_4', __NAMESPACE__  . '\\populate_checkbox' );
add_filter( 'gform_pre_submission_filter_4', __NAMESPACE__  . '\\populate_checkbox' );
add_filter( 'gform_admin_pre_render_4', __NAMESPACE__  . '\\populate_checkbox' );
function populate_checkbox( $form ) {
 
    foreach( $form['fields'] as &$field )  {
 
        //NOTE: replace 3 with your checkbox field id
        $field_id = 7;
        if ( $field->id != $field_id ) {
            continue;
        }
 
        // you can add additional parameters here to alter the posts that are retreieved
        // more info: http://codex.wordpress.org/Template_Tags/get_posts
        $posts = get_posts( 'numberposts=-1&post_status=publish&post_type=course&order=ASC' );
 
        $input_id = 1;
        foreach( $posts as $post ) {
 
            //skipping index that are multiples of 10 (multiples of 10 create problems as the input IDs)
            if ( $input_id % 10 == 0 ) {
                $input_id++;
            }
 
            $choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
            $inputs[] = array( 'label' => $post->post_title, 'id' => "{$field_id}.{$input_id}" );
 
            $input_id++;
        }
 
        $field->choices = $choices;
        $field->inputs = $inputs;
 
    }
 
    return $form;
}

add_filter( 'gform_tabindex_1', __NAMESPACE__  . '\\change_tabindex' , 10, 2 );
function change_tabindex( $tabindex, $form ) {
    return 49;
}