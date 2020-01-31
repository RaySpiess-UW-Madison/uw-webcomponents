<?php 

 // Add myuw-badge shortcode with url attribute
 public function rhs_debug_shortcode($atts) {

  $url = "https://my.wisc.edu";

  if ($atts["url"] != "") {
     shortcode_atts( array(
       'url',
     ), $atts);
  $url = $atts['url'];

 }
 return '<div class="rhs-debug">'. $url .'</div>';
}

//if( ! class_exists('UwWebComponents_Component') ) {

  //  class UwWebComponents_Component {

       // function __construct(){
         //   add_action( 'admin_menu', array( $this, 'options_add_admin_menu' ) );
         //   add_action( 'admin_menu', array( $this, 'options_settings_init' ) );
       // }
  //  }
//}

