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
        $return = $this->auth->login('sai', 'Welcome@123');
        $this->assertEquals('Successful', $return['msg']);
    }
    
    public function testAddAPIKey(){
        $return = $this->auth->addAPIKey('$2y$10$ql7z.14kJXLKBtCuos4T6ep/Le1TnSAgmA80cx0foBMi9S/KzVbJe');
        $this->assertEquals('Successful', $return['msg']);
    }
    
    public function testLogout(){
        $this->auth->logout();
    }
}