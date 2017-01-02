<?php

class Gkpos_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function save_customer_info($data) {
        $this->_table_name = "gkpos_customer";
        $this->_primary_key = "phone";
        return $this->save($data);
    }

    public function save_table_info($data) {
        $this->_table_name = "gkpos_table";
        $this->_primary_key = "id";
        return $this->save($data);
    }

    public function save_order_info($data) {
        $this->_table_name = "gkpos_order";
        $this->_primary_key = "id";
        return $this->save($data);
    }

    public function get_table_orders() {
        $this->_table_name = "gkpos_order";
        $this->_primary_key = "id";
        $this->_order_by = "status";
        return $this->get_by(array('order_type' => 'table', 'created >=' => date('Y-m-d H:i:s', strtotime('today'))));
    }

    public function get_table_seated_not_ordered() {
        $this->_table_name = "gkpos_order";
        $this->_primary_key = "id";
        $this->_order_by = "status";
        return $this->get_by(array('order_type' => 'table', 'status' => 1, 'created >=' => date('Y-m-d H:i:s', strtotime('today'))));
    }

    public function get_table_seated_ordered() {
        $this->_table_name = "gkpos_order";
        $this->_primary_key = "id";
        $this->_order_by = "status";
        return $this->get_by(array('order_type' => 'table', 'status' => 2, 'created >=' => date('Y-m-d H:i:s', strtotime('today'))));
    }

    public function get_table_waiting_payment() {
        $this->_table_name = "gkpos_order";
        $this->_primary_key = "id";
        $this->_order_by = "status";
        return $this->get_by(array('order_type' => 'table', 'status' => 3, 'created >=' => date('Y-m-d H:i:s', strtotime('today'))));
    }

    public function get_takeaway_orders() {
        $this->_table_name = "gkpos_order";
        $this->_primary_key = "id";
        $this->_order_by = "order_type";
        return $this->get_by(array('order_type<>' => 'table', 'created >=' => date('Y-m-d H:i:s', strtotime('today'))));
    }

    public function get_waiting_orders() {
        $this->_table_name = "gkpos_order";
        $this->_primary_key = "id";
        return $this->get_by(array('order_type' => 'waiting', 'created >=' => date('Y-m-d H:i:s', strtotime('today'))));
    }

    public function orders() {
        $this->_table_name = "gkpos_order";
        $this->_primary_key = "id";
        return $this->get_by(array('order_type' => 'delivery', 'created >=' => date('Y-m-d H:i:s', strtotime('today'))));
    }

    public function get_collection_orders() {
        $this->_table_name = "gkpos_order";
        $this->_primary_key = "id";
        return $this->get_by(array('order_type' => 'collection', 'created >=' => date('Y-m-d H:i:s', strtotime('today'))));
    }
     

}
