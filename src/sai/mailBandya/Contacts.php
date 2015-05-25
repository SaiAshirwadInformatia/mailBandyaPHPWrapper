<?php
namespace sai\mailBandya;

use sai\Bandya;

class Contacts
{

    var $bandya;

    public function __construct($api_key = null)
    {
        $this->bandya = Bandya::getInstance($api_key);
    }

    public function create($data)
    {
        if ($data != null) {
            return $this->bandya->call('contacts', 'POST', $data);
        }
        throw new Exception("Data required for contact creation");
    }

    public function get($data)
    {
        if (! is_null($data)) {
            return $this->bandya->call('contacts/' . $data, 'GET');
        }
        throw new Exception("Contact ID not found");
    }

    public function update($data)
    {
        if ($data != NULL) {
            return $this->bandya->call('contacts', 'PUT', $data);
        }
        throw new Exception("Data not found to update Contacts");
    }

    public function delete($id)
    {
        if ($id > 0) {
            return $this->bandya->call('contacts', 'DELETE', $data);
        }
        throw new Exception("Contact ID not found for deleteing contact");
    }

    public function search($data = NULL)
    {
        if ($data != NULL) {
            return $this->bandya->call('contacts/search', 'POST', $data);
        }
        throw new Exception("Data required for searching contacts");
    }

    public function meta()
    {
        return $this->bandya->call('contacts/meta', 'GET');
    }

    public function my()
    {
        return $this->bandya - call('contacts/my', 'GET');
    }
}