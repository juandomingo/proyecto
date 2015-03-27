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

    private static $instance;
// Fill the keys and secrets you retrieved after registering your app
    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getData($clave_linkedin,$clave_secreta, $credencial_oauth,$clave_secreta_oauth ){
        /*
        // Fill the keys and secrets you retrieved after registering your app
        $oauth=new OAuth($clave_linkedin,$clave_secreta);
        $oauth->setToken($credencial_oauth,$clave_secreta_oauth);
        $params=array();
        $headers=array();
        $method=OAUTH_HTTP_METHOD_GET;
        $url="http://api.linkedin.com/v1/people/~:(first-name,last-name,headline,picture-url)?format=json";
        // $url = "http://api.linkedin.com/v1/people/~?format=json";
        $oauth->fetch($url,$params,$method,$headers);
        */
        return 'holis';
    }
}
