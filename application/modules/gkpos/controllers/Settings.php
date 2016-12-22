<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Gkpos_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['current_section'] = $this->lang->line('gkpos_system_management');
        $data['current_page'] = "settings";
        $this->load->view('gkpos/settings/index', $data);
    }

    public function general() {
        $data['current_section'] = $this->lang->line('gkpos_system_management');
        $data['current_page'] = "general";
        $this->load->view('gkpos/settings/general/general', $data, false);
    }

    public function vatsetup() {
        $data['current_section'] = $this->lang->line('gkpos_system_management') . ' VAT SETUP';
        $data['current_page'] = "vatsetup";
        $this->load->view('gkpos/settings/general/vatsetup', $data, false);
    }

    public function discountsetup() {
        $data['current_section'] = $this->lang->line('gkpos_system_management') . ' DISCOUNT SETUP';
        $data['current_page'] = "discountsetup";
        $this->load->view('gkpos/settings/general/discountsetup', $data, false);
    }

    public function promotion() {
        $data['current_section'] = $this->lang->line('gkpos_system_management') . 'promotion';
        $data['current_page'] = "promotion";
        $this->load->view('gkpos/settings/general/promotion', $data, false);
    }

    public function depliveryplan() {
        $data['current_section'] = $this->lang->line('gkpos_system_management') . 'Delivery Plan';
        $data['current_page'] = "depliveryplan";
        $this->load->view('gkpos/settings/general/deliveryplan', $data, false);
    }

    public function pagination() {
        $data['current_section'] = $this->lang->line('gkpos_system_management') . 'Pagination';
        $data['current_page'] = "depliveryplan";
        $this->load->view('gkpos/settings/general/deliveryplan', $data, false);
    }

}
