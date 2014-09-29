<?php



/**
 * Description of User
 *
 * @author Tino
 */
class User {

    private $id;
    private $name;
    private $password;
    
    public function __construct($id,$name, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
    }

    public function getId() {
        echo $this->id;
    }

    public function getName() {
        echo $this->name;
    }
    
    public function getPassword() {
        echo $this->password;
    }
}
