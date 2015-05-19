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

    public function logout()
    {
        $this->bandya->call('auth', 'DELETE');
    }

    public function addAPIKey($api_key)
    {
        if ($api_key != null) {
            $ret = $this->bandya->call('auth/validateToken', 'POST', 
                array(
                    "access_token" => $api_key
                ));
            if (isset($ret['id']) > 0) {
                $this->bandya->setAPIKey($api_key);
                return array(
                    "msg" => "Successful",
                    "email" => $ret['email'],
                    "user_id" => $ret['id'],
                    "username" => $ret['username'],
                    "access_token" => $api_key
                );
            }
            throw new \Exception("Invalid Access Token");
        }
    }
}