<?php



/**
 * Description of LinkedInProfile
 *
 * @author Tino
 */
class LinkedInProfile {
    
    private $firstname;
    private $headline;
    private $lastName;
    private $profileRequest;
    
    public function __construct($firstname, $headline, $lastName, $profileRequest) {
        $this->codigo = $firstname;
        $this->descripcion = $headline;
        $this->codigo = $lastName;
        $this->descripcion = $profileRequest;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getHeadline() {
        return $this->headline;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getProfileRequest() {
        return $this->profileRequest;
    }
}
}

{
  "firstName": "Kamyar",
  "headline": "Senior Partner Engineer at LinkedIn",
  "lastName": "Mohager",
  "siteStandardProfileRequest":  {
    "url": "https://www.linkedin.com/profile?viewProfile=&key=8219502&authToken=SqI1&authType=name&trk=api*a108281*s116823*"
  }
}