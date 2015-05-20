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
        $return = $this->auth->login('username', 'password');
        $this->assertEquals('Successful', $return['msg']);
    }
    
    public function testAddAPIKey(){
        $return = $this->auth->addAPIKey('623849yoidgauifd78te');
        $this->assertEquals('Successful', $return['msg']);
    }
    
    public function testLogout(){
        $this->auth->logout();
    }
}