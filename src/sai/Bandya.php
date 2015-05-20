<?php
namespace sai;

use sai\Utilities\Rest;
use sai\mailBandya\Exception;

final class Bandya
{

    var $apikey;

    var $baseurl;

    var $restmanager;

    private static $_instance;

    private function __construct($apikey = null)
    {
        if (! is_null($apikey)) {
            $this->addAPIKey($apikey);
        }
        $this->baseurl = 'http://app.mailbandya.com/api/';
        $this->restmanager = new Rest();
    }

    public function call($url, $method = 'GET', $data = array(), $header = array())
    {
        if (! empty($this->apikey)) {
            $header['user-access-token'] = $this->apikey;
        }
        $response = $this->restmanager->execute($this->baseurl . $url, $method, 
            $data, $header);
        if ($response['status_code'] > 205) {
            throw new Exception($response['response']['error_code'], 
                $response['response']['error_msg']);
        }
        if (isset($response['response'])) {
            return $response['response'];
        }
    }

    public function setAPIKey($api_key)
    {
        $this->apikey = $api_key;
    }

    public function addAPIKey($api_key)
    {
        if ($api_key != null) {
            $ret = $this->call('auth/validateToken', 'POST', 
                array(
                    "access_token" => $api_key
                ));
            if (isset($ret['id']) > 0) {
                $this->setAPIKey($api_key);
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

    public static function getInstance($apikey = null)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self($apikey);
        }
        return self::$_instance;
    }
}