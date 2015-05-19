<?php
use sai\mailBandya\Campaigns;
use sai\mailBandya\Auth;
use sai\mailBandya\Exception;

class CampaignsTest extends PHPUnit_Framework_TestCase
{
    var $auth;
    
    public function login(){
        $this->auth = new Auth();
        $this->auth->addAPIKey('$2y$10$ql7z.14kJXLKBtCuos4T6ep/Le1TnSAgmA80cx0foBMi9S/KzVbJe');
    }
    public function testCreate(){
        
    }

    public function testMy()
    {
        $this->login();
        $campaigns = new Campaigns();
        try {
            $result = $campaigns->my();
            if (count($result['results']) > 0) {
                $this->assertTrue(true);
            }
        } catch (Exception $e) {
            echo $e->getErrorMessage();
        }
    }
    
    public function testGet(){
        $this->login();
        
    }
}