<?php
namespace sai\mailBandya;

use sai\Bandya;

class Emails
{

    var $bandya;

    public function __construct($api_key = null)
    {
        $this->bandya = Bandya::getInstance($api_key);
    }

    public function create($data)
    {
        if ($data != null) {
            return $this->bandya->call('emails', 'POST', $data);
        }
        throw new Exception("Data required for sending email");
    }
}