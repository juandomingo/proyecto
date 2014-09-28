<?php



/**
 * Description of Resource
 *
 * @author fede
 */
class Resource {
    
    private $name;
    private $url;
    
    public function __construct($name, $url) {
        $this->name = $name;
        $this->url = $url;
    }

    public function getName() {
        echo $this->name;
    }

    public function getUrl() {
        echo $this->url;
    }
}
