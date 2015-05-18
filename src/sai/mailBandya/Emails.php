<?php
namespace sai\mailBandya;

use sai\Bandya;

class Emails
{

    var $bandya;

    public function __construct()
    {
        $this->bandya = Bandya::getInstance();
    }

    public function create($data)
    {
        if ($data != null) {
            return $this->bandya->call('emails', 'POST', $data);
        }
        throw new Exception("Data required for sending email");
    }
}