<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends Gkpos_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
        $this->load->model('Entry_Model');
        if ($this->Entry_Model->is_logged_in()) {
            redirect('gkpos');
        }
    }

    public function index() {
        $this->page_title = 'Gkpos | Login';
        $this->current_section = "Entry";
        $this->body_class[] = "pos-login";
        $data['male_users'] = $this->Entry_Model->get_list('gkpos_user', array('status' => 1, 'deleted' => 0, 'gender' => 1), array('id', 'first_name', 'last_name', 'gender', 'username', 'email'));
        $data['female_users'] = $this->Entry_Model->get_list('gkpos_user', array('status' => 1, 'deleted' => 0, 'gender' => 2), array('id', 'first_name', 'last_name', 'gender', 'username', 'email'));
        $this->render_page('gkpos/entry/index', $data);
    }

    public function get_user() {
        $id = $this->input->post('id');
        $user = $this->Entry_Model->get_single('gkpos_user', array('id' => $id, 'status' => 1, 'deleted' => 0), array('username', 'email', 'first_name', 'last_name'));
        echo json_encode($user);
    }

    public function validate() {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->Entry_Model->get_single('gkpos_user', array('username' => $username, 'email' => $email, 'password' => md5($password)));
        if (!empty($user) && count($user) > 0) {
            $this->session->set_userdata('gkpos_userid', $user->id);
            $this->session->set_userdata('gkpos_username', $user->first_name . ' ' . $user->last_name);
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false));
        }
    }

}
