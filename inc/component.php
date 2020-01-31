<?php 
if( ! class_exists('UwWebComponents_Component') ) {

   class UwWebComponents_Component {

    public $name;
    public $script;

        function __construct($component){

          if (is_array($component)) {
            $this->name = isset($component['name']) ? $component['name'] : NULL;
            $this->script = isset($component['script']) ? $component['script'] : NULL;
          }
       }
   }
  }

  if( ! class_exists('UwWebComponents_Shortcode') ) {

    class UwWebComponents_Shortcode {
 
     public $name = null;
    // public $atts = array('url', 'theme', 'border');
     public $atts = array();
    
         function __construct($name, $attsArray){
           $this->name = $name;

           $this->$atts =  $attsArray;
        //   if (is_array($attsArray)) { $this->$attsArray = $attsArray; }
         }

         public function getAttsArray(){
          return $this->$atts;
      }
    }
 }


