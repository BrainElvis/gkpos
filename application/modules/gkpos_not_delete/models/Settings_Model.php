<?php

class Settings_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function save_promotion($data, $id = null) {
        $this->_table_name = 'gkpos_voucher';
        $this->_primary_key = 'id';
        return $this->save($data, $id);
    }

    public function save_deliveryplan($data, $id = null) {
        $this->_table_name = 'gkpos_deliveryplan';
        $this->_primary_key = 'id';
        return $this->save($data, $id);
    }

}
