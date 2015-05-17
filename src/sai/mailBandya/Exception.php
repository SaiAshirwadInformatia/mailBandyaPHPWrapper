<?php
namespace sai\mailBandya;

class Exception extends \Exception
{

    var $code;

    var $msg;

    public function __construct($code, $msg)
    {
        $this->code = $code;
        $this->msg = $msg;
    }

    public function getErrorMessage()
    {
        return $this->msg;
    }

    public function getErrorCode()
    {
        return $this->code;
    }
}