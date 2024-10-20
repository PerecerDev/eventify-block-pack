<?php

class Component{

    public $componentName;
    private $componentPath;
    public $output;

    function __construct($componentName, $params = []){
        $this->componentName = $componentName;
        $this->componentPath = WP_PLUGIN_DIR . "/eventify-block-pack/components/" . $componentName . ".php"; 
        if (!file_exists($this->componentPath)) {
            $this->output = 'Component not found';
        } else {
            include_once($this->componentPath);

            if( function_exists($this->componentName)){
                $this->output = call_user_func($this->componentName, $params);
            } else {
                $this->output = 'Component not exist';
            }

        }
        
    }

    public function show(){
        echo $this->output;
    }  
    
} 

function ele($componentName, $params=null){
    $component = new Component($componentName, $params);
    $component->show();
}

?>