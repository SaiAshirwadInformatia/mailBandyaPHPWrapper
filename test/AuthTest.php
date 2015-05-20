<?php
use sai\mailBandya\Auth;

class AuthTest extends PHPUnit_Framework_TestCase
{
    
    var $auth;
    
    public function __construct(){
        $this->auth = new Auth();
    }

    public function testLogin()
    {
        $return = $this->auth->login('demo', '123');
        $this->assertEquals('Successful', $return['msg']);
    }
    
    public function testAddAPIKey(){
        $return = $this->auth->addAPIKey('Le1TnSAgmA80cx0foBMi9S');
        $this->assertEquals('Successful', $return['msg']);
    }
    
    public function testLogout(){
        $this->auth->logout();
    }
}
