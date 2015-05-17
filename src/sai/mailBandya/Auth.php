<?php
namespace sai\mailBandya;

use sai\Bandya;

class Auth
{

    var $bandya;

    public function __construct()
    {
        $this->bandya = Bandya::getInstance();
    }

    public function login($username, $password)
    {
        $ret = $this->bandya->call('auth', 'POST', 
            array(
                'username' => $username,
                'password' => $password
            ));
        if (isset($ret['msg']) == 'Successful') {
            $this->bandya->setAPIKey($ret['access_token']);
        }
        return $ret;
    }
}