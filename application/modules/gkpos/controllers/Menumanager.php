<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menumanager extends Gkpos_Controller {

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
        $data = [];
        $this->page_title = 'Gkpos | Login';
        $this->body_class[] = "pos-menumanager";
        $this->render_page('gkpos/menumanager/index', $data);
    }
    public function category() {
        $data = [];
        $this->page_title = 'Gkpos | Category';
        $this->body_class[] = "pos-menumanager pos-category";
        $this->render_page('gkpos/menumanager/category', $data);
    }
    public function categoryadd() {
        $data = [];
        $this->page_title = 'Gkpos | Add Category';
        $this->body_class[] = "pos-menumanager pos-add-category";
        $this->render_page('gkpos/menumanager/categoryadd', $data);
    }

}
