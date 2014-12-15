<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LinkedInRepository
 *
 * @author Tino
 */

class LinkedInRepository {
    const NOMBRE = "Banco de Alimentos La Plata";
    const CLAVE_API = "77hmwr84id5v3g";
    const CLAVE_SECRETA = "RGkP9LLdAzkKPFkA";
    const CRECENCIAL_OAUTH = "7a2e2926-615c-4737-a542-f518a4c86e74";
    const CLAVE_SECRETA_OAUTH = "5d919a19-a12c-44a5-badd-2cc4ec1cdbf7";
    private static $instance;
// Fill the keys and secrets you retrieved after registering your app
    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getData(){
        // Fill the keys and secrets you retrieved after registering your app
        $oauth=new OAuth(CLAVE_API,CLAVE_SECRETA);
        $oauth->setToken(CRECENCIAL_OAUTH,CLAVE_SECRETA_OAUTH);
        $params=array();
        $headers=array();
        $method=OAUTH_HTTP_METHOD_GET;
        $url="http://api.linkedin.com/v1/people/~:(first-name,last-name,headline,picture-url)";
        // $url = "http://api.linkedin.com/v1/people/~?format=json";
        $oauth->fetch($url,$params,$method,$headers);
        return $oauth->getLastResponse();
    }
}
