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
    }

    public function index() {
        $this->page_title = 'Gkpos | Mainboard';
        $this->current_section = "Mainboard";
        $this->body_class [] = "pos-mainboard";
        $this->render_page('gkpos/gkpos/mainboard');
    }

    public function collection() {
        $this->page_title = 'Gkpos | Collection';
        $this->current_section = "Collection";
        $this->body_class [] = "pos-collection";
        $this->render_page('gkpos/gkpos/collection');
    }

    public function customerinformation() {
        $this->page_title = 'Gkpos | customer Information';
        $this->current_section = "customer Information";
        $this->body_class[] = "pos-customer-information";
        $this->render_page('gkpos/gkpos/customerinformation');
    }

    public function customertable() {
        $this->page_title = 'Gkpos | customer table';
        $this->current_section = "customer table";
        $this->body_class[] = "pos-customer-table";
        $this->render_page('gkpos/gkpos/customertable');
    }

    public function menuselection() {
        $this->page_title = 'Gkpos | menu selection';
        $this->current_section = "menu selection";
        $this->body_class[] = "pos-menu selection";
        $this->render_page('gkpos/gkpos/menuselection');
    }

    public function newtable() {
        $this->page_title = 'Gkpos | new table';
        $this->current_section = "menu new table";
        $this->body_class[] = "pos-new-table";
        $this->render_page('gkpos/gkpos/newtable');
    }

    public function newtableguest() {
        $this->page_title = 'Gkpos | new table guest';
        $this->current_section = "new table guest";
        $this->body_class[] = "pos-new-table-guest";
        $this->render_page('gkpos/gkpos/newtableguest');
    }

    public function takeaway() {
        $this->page_title = 'Gkpos | takeaway';
        $this->current_section = "takeaway";
        $this->body_class[] = "pos-takeaway";
        $this->render_page('gkpos/gkpos/takeaway');
    }

    public function waiting() {
        $this->page_title = 'Gkpos | waiting';
        $this->current_section = "waiting";
        $this->body_class[] = "pos-waiting";
        $this->render_page('gkpos/gkpos/waiting');
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

}
