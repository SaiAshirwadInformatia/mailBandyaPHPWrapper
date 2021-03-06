<?php
namespace sai\mailBandya;

use sai\Bandya;

class Campaigns
{

    var $bandya;

    public function __construct($api_key)
    {
        $this->bandya = Bandya::getInstance($api_key);
    }

    public function create($data)
    {
        if ($data != null) {
            return $this->bandya->call('campaigns', 'POST', $data);
        }
        throw new Exception("Data required for campaign creation");
    }

    public function get($data)
    {
        if (! is_null($data)) {
            return $this->bandya->call('campaigns/' . $data, 'GET');
        }
        throw new Exception("Campaign ID not found");
    }

    public function update($data)
    {
        if ($data != NULL) {
            return $this->bandya->call('campaigns', 'PUT', $data);
        }
        throw new Exception("Data not found to update campaigns");
    }

    public function delete($data)
    {
        if ($data > 0) {
            return $this->bandya->call('campaigns', 'DELETE', $data);
        }
        throw new Exception("Campaign ID not found for deleting campaign");
    }

    public function search($data = NULL)
    {
        if ($data != NULL) {
            return $this->bandya->call('campaigns/search', 'POST', $data);
        }
        throw new Exception("Data required for searching campaigns");
    }

    public function meta()
    {
        return $this->bandya->call('campaigns/meta', 'GET');
    }

    public function my()
    {
        return $this->bandya->call('campaigns/my', 'GET');
    }
}