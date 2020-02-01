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

           if (is_array($attsArray)) { 
            $this->$atts[] = array(
              'fieldName'=>$attsArray[0],
              'fieldValue'=>$attsArray[1], 
              'fieldType'=>$attsArray[2]
            );
           }
      
         }
         public function addAtt($fieldName,$fieldValue, $fieldType)
          {
            $this->$atts[] = array(
              'fieldName'=>$fieldName,
              'fieldValue'=>$fieldValue, 
              'fieldType'=>$fieldType
            );
          }

         public function getAttsArray(){
          return $this->$atts;      
        }
    }

    class UwWebComponents_Shortcode_Atts {
 
      public $fieldName = null;
      public $fieldValue = null;
      public $fieldType = null;
      public $defaultValue = null;

          function __construct($fieldName,$fieldValue, f$ieldType, $defaultValue  ){
            $this->fieldName = $fieldName;
            $this->fieldValue = $fieldValue;
            $this->fieldType = $fieldType;
            $this->defaultValue = $defaultValue;
          }
 
        // public function getAttsArray(){
        // return $this->$atts;
        // }
     }
 }


