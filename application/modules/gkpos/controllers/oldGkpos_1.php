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
        $data['info'] = $info;
        $data['current_section'] = "Delivery";
        $this->load->view('gkpos/gkpos/delivery', $data, false);
    }

    public function collection() {
        $this->page_title = 'Gkpos | Collection';
        $this->current_section = "Collection";
        $this->body_class [] = "pos-collection";
        $this->render_page('gkpos/gkpos/collection');
    }

    public function waiting() {
        $this->page_title = 'Gkpos | waiting';
        $this->current_section = "waiting";
        $this->body_class[] = "pos-waiting";
        $this->render_page('gkpos/gkpos/waiting');
    }

    public function table() {
        $info = $this->input->get('info');
        $this->session->set_userdata('order_type', $info);
        $this->load->view('gkpos/gkpos/table');
        //$this->render_page('gkpos/gkpos/table');
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

}
