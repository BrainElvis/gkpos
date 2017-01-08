<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Gkpos_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
        $this->load->model('Entry_Model');
        if (!$this->Entry_Model->is_logged_in()) {
            redirect('gkpos/entry');
        }
        $this->load->helper('gkpos');
        $this->load->model('Report_Model');
    }

    public function index() {
        $data['current_page'] = "report";
        $data['orderList'] = $this->Report_Model->get_todays_orders();
        //debugPrint($data);
        $today_start = date($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), mktime(0, 0, 0));
        $today_end = date($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), mktime(23, 59, 59));
        $data['start_date'] = $today_start;
        $data['end_date'] = $today_end;
        $data['payment_options'] = $this->Report_Model->get_payment_options();
        $data['ordertype_options'] = $this->Report_Model->get_ordertype_options();
        $this->load->view('gkpos/report/index', $data, false);
    }

    public function filter() {
        $data['current_page'] = "report";
        $data['orderList'] = $this->Report_Model->get_todays_orders();
        $this->load->view('gkpos/report/filtered', $data, false);
    }

}
