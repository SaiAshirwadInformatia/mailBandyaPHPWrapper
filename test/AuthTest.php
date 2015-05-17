<?php
use sai\mailBandya\Auth;

class AuthTest extends PHPUnit_Framework_TestCase
{

    public function testLogin()
    {
        $auth = new Auth();
        $return = $auth->login('sai', 'Welcome@123');
        $this->assertEquals('Successful', $return['msg']);
    }
}