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
        $this->render_page('gkpos/gkpos/index');
    }

    public function takeaway() {
        $this->page_title = 'Gkpos | takeaway';
        $this->current_section = "takeaway";
        $this->body_class[] = "pos-takeaway";
        $this->render_page('gkpos/gkpos/takeaway');
    }

    public function delivery() {
        $this->page_title = 'Gkpos | customer Information';
        $this->current_section = "Delivery";
        $this->body_class[] = "pos-customer-information delivery";
        $this->render_page('gkpos/gkpos/delivery');
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
        $this->page_title = 'Gkpos | Table';
        $this->current_section = "Table Order";
        $this->body_class[] = "table Order";
        $this->render_page('gkpos/gkpos/table');
    }

    public function order() {
        $this->page_title = 'Gkpos | order';
        $this->current_section = "menu order";
        $this->body_class[] = "pos-menu selection order";
        $this->render_page('gkpos/gkpos/order');
    }

    public function customertable() {
        $this->page_title = 'Gkpos | customer table';
        $this->current_section = "customer table";
        $this->body_class[] = "pos-customer-table";
        $this->render_page('gkpos/gkpos/customertable');
    }

    public function newtable() {
        $this->page_title = 'Gkpos | new table';
        $this->current_section = "new table";
        $this->body_class[] = "pos-new-table";
        $this->render_page('gkpos/gkpos/newtable');
    }

    public function newtableguest() {
        $this->page_title = 'Gkpos | new table guest';
        $this->current_section = "new table guest";
        $this->body_class[] = "pos-new-table-guest";
        $this->render_page('gkpos/gkpos/newtableguest');
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
