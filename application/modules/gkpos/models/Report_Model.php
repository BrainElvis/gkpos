<?php

class Report_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_todays_orders() {
        return $this->get_list('gkpos_order', array('created >=' => date('Y-m-d H:i:s', strtotime('today')), 'paid_status' => 1), '*', 10, 0, 'created', 'DESC');
    }

    public function get_order_payments($order_id) {
        return $this->get_list('gkpos_order_payment', array('order_id' => $order_id));
    }

}
