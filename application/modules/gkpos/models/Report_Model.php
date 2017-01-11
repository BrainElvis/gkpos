<?php

class Report_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_todays_orders() {
        return $this->get_list('gkpos_order', array('created >=' => date('Y-m-d', strtotime('today')), 'paid_status' => 1), '*', 10, 0, 'created', 'DESC');
    }

    public function get_order_payments($order_id) {
        return $this->get_list('gkpos_order_payment', array('order_id' => $order_id));
    }

    public function search($filters = array(), $rows = 0, $limit = 0) {
        $this->db->select('gpo.*,gpod.amount as discount,gpov.amount as vat,gpos.amount as service_charge');
        $this->db->from('gkpos_order gpo');
        $this->db->join('gkpos_order_payment AS gpop', 'gpo.id = gpop.order_id', 'left');
        $this->db->join('gkpos_order_discount AS gpod', 'gpo.id = gpod.order_id', 'left');
        $this->db->join('gkpos_order_vat AS gpov', 'gpo.id = gpov.order_id', 'left');
        $this->db->join('gkpos_order_servicecharge AS gpos', 'gpo.id = gpos.order_id', 'left');

        if (isset($filters['start_date']) && isset($filters['end_date'])) {
            if ($filters['is_by_closing'] == 'yes') {
                $this->db->where('closing_date BETWEEN ' . $this->db->escape($filters['start_date']) . ' AND ' . $this->db->escape($filters['end_date']));
            } else {
                $this->db->where('created BETWEEN ' . $this->db->escape($filters['start_date']) . ' AND ' . $this->db->escape($filters['end_date']));
            }
        }
        if (isset($filters['order_type']) && $filters['order_type'] != null) {
            $this->db->where('order_type', $filters['order_type']);
        }

        if (isset($filters['order_type']) && ($filters['order_type'] != null || $filters['order_type'] != 'online') && (isset($filters['method']) && $filters['method'] != null)) {
            $this->db->where('gpop.method', $filters['method']);
        }
        $this->db->where('paid_status', 1);
        $this->db->group_by('gpo.id');
        $this->db->order_by('gpo.created', 'DESC');
        if ($rows > 0) {
            $this->db->limit($rows, $limit);
        }
        return $this->db->get();
    }

    public function get_total_report_rows($table, $filters) {
        $this->db->where('created BETWEEN ' . $this->db->escape($filters['start_date']) . ' AND ' . $this->db->escape($filters['end_date']));
        $this->db->where('paid_status', 1);
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    public function set_nextbtn_counter($value) {
        $this->session->set_userdata('nextbtn', $value);
    }

    public function set_prevbtn_counter($value) {
        $this->session->set_userdata('prevbtn', $value);
    }

    public function get_nextbtn_counter() {
        if ($this->session->userdata('nextbtn')) {
            return $this->session->userdata('nextbtn');
        } else {
            return 0;
        }
    }

    public function get_prevbtn_counter() {
        if ($this->session->userdata('prevbtn')) {
            return $this->session->userdata('prevbtn');
        } else {
            return 0;
        }
    }

    public function clear_nextbtn_counter() {
        if ($this->session->userdata('nextbtn')) {
            $this->session->unset_userdata('nextbtn');
        }
    }

    public function clear_prevbtn_counter() {
        if ($this->session->userdata('prevbtn')) {
            $this->session->unset_userdata('prevbtn');
        }
    }

    public function empty_btn_counter() {
        $this->clear_nextbtn_counter();
        $this->clear_prevbtn_counter();
    }

}
