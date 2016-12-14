<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gkpos extends Gkpos_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
        $this->load->model('Entry_Model');
        if (!$this->Entry_Model->is_logged_in()) {
            redirect('gkpos/entry');
        }
        $this->load->helper('gkpos');
        $this->load->model('Menumanager_Model');
        $this->load->model('Orders_Model');
    }

    public function index() {
        $this->page_title = 'Gkpos | Mainboard';
        $this->current_section = "Mainboard";
        $this->body_class [] = "pos-mainboard";
        $this->render_page('gkpos/gkpos/index');
    }

    public function takeaway() {
        $info = $this->input->post('info');
        $data['info'] = $info;
        $data['current_section'] = "Takeaway";
        $this->load->view('gkpos/gkpos/takeaway', $data, false);
    }

    public function delivery() {
        $info = $this->input->post('info');
        if (is_array($info) && count($info > 1)) {
            $data['callerName'] = $info[0];
            $data['callerPhone'] = $info[1];
            $data['callerOrderType'] = $info[2];
            $data['isPhoneCall'] = $info[3];
            $data['info'] = $info[2];
        } else {
            $data['info'] = $info;
        }
        $data['current_section'] = $this->lang->line('gkpos_delivery');
        $this->load->view('gkpos/gkpos/delivery', $data, false);
    }

    public function collection() {
        $info = $this->input->post('info');
        if (is_array($info) && count($info > 1)) {
            $data['callerName'] = $info[0];
            $data['callerPhone'] = $info[1];
            $data['callerOrderType'] = $info[2];
            $data['isPhoneCall'] = $info[3];
        } else {
            $data['info'] = $info;
        }
        $data['current_section'] = $this->lang->line('gkpos_collection');
        $this->load->view('gkpos/gkpos/collection', $data, false);
    }

    public function waiting() {
       $info = $this->input->post('info');
        if (is_array($info) && count($info > 1)) {
            $data['callerName'] = $info[0];
            $data['callerPhone'] = $info[1];
            $data['callerOrderType'] = $info[2];
            $data['isPhoneCall'] = $info[3];
            $data['info'] = $info[2];
        } else {
            $data['info'] = $info;
        }
        $data['current_section'] = $this->lang->line('gkpos_waiting');;
        $this->load->view('gkpos/gkpos/waiting', $data, false);
    }

    public function table() {
        $info = $this->input->get('info');
        $data['info'] = $info;
        $data['current_section'] = "Waiting";
        $this->load->view('gkpos/gkpos/table', $data, false);
    }

    public function systemmanagement() {
        $this->page_title = 'Gkpos | system management';
        $this->current_section = "system management";
        $this->body_class[] = "pos-system managementt";
        $this->render_page('gkpos/gkpos/systemmanagement');
    }

    public function logoff() {
        $this->Entry_Model->logout();
    }

    public function keyboard_setting() {
        $is_touch = $this->input->post('is_touch');
        echo $this->Appconfig->batch_save(array('is_touch' => $is_touch));
    }

    public function search_customer() {
        $key = $this->input->post('key');
        $value = $this->input->post('value');
        $value = str_replace(' ', '', $value);
        $customer = $this->Orders_Model->get_single('gkpos_customer', array($key => $value));
        if (!empty($customer)) {
            echo json_encode(array('status' => true, 'customer' => $customer));
        } else {
            echo json_encode(array('status' => false));
        }
    }

    public function get_customer() {
        //$customer = $this->Orders_Model->get_list('gkpos_customer', array('status' => 1), array('name'));
        $term = $this->input->get('term');
        $this->db->select('name');
        $this->db->from('gkpos_customer');
        $this->db->where("name LIKE '%" . $term . "%'");
        $this->db->order_by("name", "asc");
        $result = $this->db->get()->result();
        $customer = array_map('current', $result);
        echo json_encode($customer);
    }

}
