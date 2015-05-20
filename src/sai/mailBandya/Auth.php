<?php
namespace sai\mailBandya;

use sai\Bandya;

class Auth
{

    var $bandya;

    public function __construct($api_key = null)
    {
        $this->bandya = Bandya::getInstance($api_key);
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

    public function logout()
    {
        $this->bandya->call('auth', 'DELETE');
    }

    public function validateAPIKey($api_key)
    {}
}