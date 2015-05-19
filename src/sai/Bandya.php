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
            $this->apikey = $apikey;
        }
        $this->baseurl = 'http://localhost/mailBandya/api/';
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

    public function setAPIKey($apikey)
    {
        $this->apikey = $apikey;
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}