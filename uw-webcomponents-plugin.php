<?php
//include 'inc/plugin-dev-helper.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/component.php';

class UwWebComponents {

  public $debug = 'debug';
  public $component;

public function __construct( ) {
    // init language, constants, scripts, etc.
    add_action( 'init', array( $this, 'plugin_textdomain' ) );

    $this->component = new UwWebComponents_Component(array(
      'name'=>'myuw-badge',
      'script'=>'myuw-badge.js'
      ));

      $this->shortcode = new UwWebComponents_Shortcode(
        'myuw-badge', 
        array('url', 'theme', 'border')
      );
 
    // component scripts 
   // add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ));
    add_action( 'wp_enqueue_scripts', array( $this, 'add_web_component'));

    // shortcode [myuw-badge]
    // add_shortcode('myuw-badge', array( $this, 'myuw_badge_shortcode'));
       add_shortcode('myuw-badge', array( $this, 'add_web_component_shortcode'));



    // uninstall
}
// text domain for translation
public function plugin_textdomain() {
    $domain = 'uw-webcomponents';
    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );
    load_textdomain( $domain, WP_LANG_DIR.'/'.$domain.'/'.$domain.'-'.$locale.'.mo' );
    load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

}

public function add_web_component() {
  global $post;

  $name =  $this->component->name;
  $script =  $this->component->script;

  // register and enqueue scripts 
  wp_register_script('uw-webcomponents-myuw-badge',
  plugins_url( 'uw-webcomponents/js/'.$script ),
  array( 'jquery' ),  null, true); //footer true

   if( is_page() && has_shortcode( $post->post_content, $name) ) {
     wp_enqueue_script( 'uw-webcomponents-'.$name );
  }

  // add shortcode
}

 // Add myuw-badge shortcode with url attribute
 public function add_web_component_shortcode($atts) {
  $result = "";

  $name =  $this->shortcode->name;
  //$attsArray =  $this->shortcode->atts;
  $attsArray =  $this->shortcode->getAttsArray();

  $this->debug = $this->debug.' ' .count($atts) . '<br/>';

  // from loaded list 
   foreach ($attsArray as $loadedAtt) {
    $this->debug = $this->debug. ' - '.  $loadedAtt. ' => ';

    $this->debug = $this->debug. ''.  $atts[$loadedAtt]. '<br/>';

    // from the shortcode
    //foreach ($atts as $shortcodeAtt) {
      //$this->debug = $this->debug. ' -- '.  $shortcodeAtt. '<br/>';
    //}

  }
  
  $url = "https://my.wisc.edu";
  $theme = "";
  $border = "";

  if ($atts["url"] != "") {
     shortcode_atts( array(
       'url',
       'theme', 
       'border'
     ), $atts);
  $url = $atts['url'];
  $theme = $atts['theme'];
  $border = $atts['border'];
 }


  $result = '<myuw-badge url="'. $url .'" '.$theme.' '.$border.'></myuw-badge>';

  $result = $result. '<div class="rhs-debug">'. $this->debug. '</div>'; 

  return $result;
}




 // Add myuw-badge shortcode with url attribute
 public function myuw_badge_shortcode($atts) {

    $result = "";

    $url = "https://my.wisc.edu";
    $theme = "";
    $border = "";
 
    if ($atts["url"] != "") {
       shortcode_atts( array(
         'url',
         'theme', 
         'border'
       ), $atts);
    $url = $atts['url'];
    $theme = $atts['theme'];
    $border = $atts['border'];
   }


    $result = '<myuw-badge url="'. $url .'" '.$theme.' '.$border.'></myuw-badge>';

    $result = $result. '<div class="rhs-debug">'. $this->debug. '</div>'; 

    return $result;
 }

 

}


