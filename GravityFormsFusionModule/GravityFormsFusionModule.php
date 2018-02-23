<?php
   /*
   Plugin Name: Gravity Forms Fusion Module
   Plugin URI: http://www.alextryonpdx.com
   description: Add module to Fusion Builder to embed gravity forms in posts
   Version: 1.1
   Author: Alex Tryon
   Author URI: http://www.alextryonpdx.com
   License: GPL2
   */

function fusion_element_gravityform() {

   // get list of forms for select form field
   $forms = GFAPI::get_forms();
   $formList = array();
   foreach ($forms as $form ) {
      $formList[ $form['id'] ] = $form['title'];
   };


    fusion_builder_map( array(
        'name'            => esc_attr__( 'Gravity Form', 'fusion-builder' ),
        'shortcode'       => 'gravityform',
        'params'          => array(
        array(
         'type'        => 'select',
         'heading'     => esc_attr__( 'Select Form', 'fusion-builder' ),
         'description' => esc_attr__( 'Select the form to use', 'fusion-builder' ),
         'param_name'  => 'id',
         'value'       => $formList ),
        array(
            'type'        => 'radio_button_set',
            'heading'     => esc_attr__( 'Ajax', 'fusion-builder' ),
            'description' => esc_attr__( 'Enable Ajax for form submissions', 'fusion-builder' ),
            'param_name'  => 'ajax',
            'value'       => array(
                 'true'     => esc_attr__( 'Yes', 'fusion-builder' ),
                 'false'     => esc_attr__( 'No', 'fusion-builder' ),
            ),
            ),
        array(
            'type'        => 'radio_button_set',
            'heading'     => esc_attr__( 'Title', 'fusion-builder' ),
            'description' => esc_attr__( 'Show Form Title', 'fusion-builder' ),
            'param_name'  => 'title',
            'value'       => array(
                 'true'     => esc_attr__( 'Yes', 'fusion-builder' ),
                 'false'     => esc_attr__( 'No', 'fusion-builder' ),
            ),
            ),
        array(
            'type'        => 'radio_button_set',
            'heading'     => esc_attr__( 'Description', 'fusion-builder' ),
            'description' => esc_attr__( 'Show Form Description', 'fusion-builder' ),
            'param_name'  => 'description',
            'value'       => array(
                 'true'     => esc_attr__( 'Yes', 'fusion-builder' ),
                 'false'     => esc_attr__( 'No', 'fusion-builder' ),
            ),
            ),
        ),
    ) );
}
add_action( 'fusion_builder_before_init', 'fusion_element_gravityform' );












?>