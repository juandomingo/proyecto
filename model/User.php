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
    private $type;
    
    public function __construct($id,$name, $password, $type) {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->type = $type;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
    
    public function getPassword() {
        return $this->password;
    }

    public function getType() {
        return $this->type;
    }

    public function serializar()
    {
        $serialized = array(
                "id" => $this->id,
                "name" => $this->name,
                "password" => $this->password,
                "type" => $this->type,
            );
        return $serialized;
    }
}