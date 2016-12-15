<?php

class Gkpos_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function save_customer_info($data){
        $this->_table_name="gkpos_customer";
        $this->_primary_key="phone";
        return $this->save($data);
    }
    public function save_table_info($data){
        $this->_table_name="gkpos_table";
        $this->_primary_key="id";
        return $this->save($data);
    }
     public function save_order_info($data){
        $this->_table_name="gkpos_order";
        $this->_primary_key="id";
        return $this->save($data);
    }

}
