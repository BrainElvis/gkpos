<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
       
    }

    public function index() {
        $this->page_title = 'Dashboard';
        $this->current_section = "Dashboard";
        $this->body_class[] = 'admin-dashboard';
        $this->render_page('admin/admin/index');
    }

    public function inbox() {
        $this->load->model('Emails');
        $this->page_title = 'Dashboard';
        $this->current_section = "Inbox";
        $this->body_class[] = 'admin-inbox';
        $data = [];
        $condition = '';
        if ($_POST) {
            $this->session->unset_userdata('email');
            if ($this->input->post('email')) {
                $condition .= " email LIKE '" . mysql_real_escape_string($this->input->post('email')) . "%'";
                $this->session->set_userdata('email', $this->input->post('email'));
            }
        }
        $data['email'] = ($this->input->post('email')) ? $this->input->post('email') : $this->session->userdata('email');
        $offset = intval($this->uri->segment(4));
        $offset = $offset ? $offset : 0;
        $result = $this->Emails->get_paged_list('contact', $condition, $url = 'admin/inbox', $segment = 3, $offset, 'id', 'DESC');
        $data['inbox_mails'] = $result['rows'];
        $data['pagination'] = $result['pagination'];
        $data['count'] = $offset;
        $this->render_page('admin/admin/inbox', $data);
    }

    public function plain() {
        $this->page_title = 'Dashboard';
        $this->current_section = "Plain Page";
        $this->body_class[] = 'Plain Page';
        $this->render_page('admin/admin/plain');
    }

    function logout() {
        $this->Login_model->logout();
    }

}
