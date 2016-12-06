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
        $this->load->model('Menumanager_Model');
    }

    public function index() {
        $data = [];
        $data['categories'] = $this->Menumanager_Model->get_menu_category();
        $this->page_title = 'Gkpos | Menu Manager';
        $this->current_section = "Menu Manager";
        $this->body_class[] = "pos-menumanager";
        $this->render_page('gkpos/menumanager/index', $data);
    }

    public function category() {
        $success = false;
        $message = '';
        if ($this->input->post('submit_form')) {
            if ($this->form_validation->run('gkpos_category') == FALSE) {
                $message = validation_errors();
                $success = false;
            } else {
                $data = $this->prepareData();
                $exists = $this->Menumanager_Model->exists('gkpos_category', 'LOWER(title)', strtolower($data['title']));
                if ($exists) {
                    $message = $this->lang->line('gkpos_duplicate_entry') . ' ' . $this->lang->line('gkpos_category') . ' ' . $data['title'] . ' ' . $this->lang->line('gkpos_already_exists') . ' ' . $this->lang->line('gkpos_try_another');
                    $success = false;
                } else {
                    $data['status'] = '1';
                    $last_id = $this->Menumanager_Model->get_last_row_id('gkpos_category');
                    $data['order'] = $last_id > 0 ? $last_id + 1 : 1;
                    $data['created_by'] = $this->session->userdata('gkpos_userid');
                    $result = $this->Menumanager_Model->save_menu_category($data);
                    $success = $result ? true : false;
                }
            }

            if ($success) {
                $message = $this->lang->line('gkpos_category') . ' ' . $data['title'] . ' ' . $this->lang->line('gkpos_saved_' . ($success ? '' : 'un') . 'successfully');
                echo json_encode(array('success' => $success, 'message' => $message));
            } else {
                echo json_encode(array('success' => $success, 'message' => $message));
            }
        }
    }

    public function categorysort() {
        $data = $this->input->post('data');
        $output = array();
        parse_str($data, $output);
        $position = 1;
        foreach ($output as $key => $value) {
            $result = $this->Menumanager_Model->sort_menu_category($key, $position);
            $position++;
        }
    }

    function editcategorycell() {
        $name = $this->input->post('name');
        $id = $this->input->post('pk');
        $value = $this->input->post('value');
        $result = $this->db->update('gkpos_category', array($name => $value), array('id' => $id));
        echo json_encode(array('status' => $result));
    }
    
    public function menu() {
        $success = false;
        $message = '';
        if ($this->input->post('submit_form')) {
            if ($this->form_validation->run('gkpos_menu') == FALSE) {
                $message = validation_errors();
                $success = false;
            } else {
                $data = $this->prepareData();
                if (!isset($data['is_dine'])) {
                    unset($data['in_price']);
                    unset($data['out_price']);
                } else {
                    unset($data['is_dine']);
                    unset($data['base_price']);
                }
                $exists = $this->Menumanager_Model->exists('gkpos_menu', 'LOWER(title)', strtolower($data['title']));
                if ($exists) {
                    $message = $this->lang->line('gkpos_duplicate_entry') . ' ' . $this->lang->line('gkpos_category') . ' ' . $data['title'] . ' ' . $this->lang->line('gkpos_already_exists') . ' ' . $this->lang->line('gkpos_try_another');
                    $success = false;
                } else {
                    $data['status'] = '1';
                    $last_id = $this->Menumanager_Model->get_last_row_id('gkpos_menu');
                    $data['order'] = $last_id > 0 ? $last_id + 1 : 1;
                    $data['created_by'] = $this->session->userdata('gkpos_userid');
                    $result = $this->Menumanager_Model->save_menu($data);
                    $success = $result ? true : false;
                }
            }
            if ($success) {
                $message = $this->lang->line('gkpos_menu') . ' ' . $data['title'] . ' ' . $this->lang->line('gkpos_saved_' . ($success ? '' : 'un') . 'successfully');
                echo json_encode(array('success' => $success, 'message' => $message));
            } else {
                echo json_encode(array('success' => $success, 'message' => $message));
            }
        }
    }

    function editmenucell() {
        $name = $this->input->post('name');
        $id = $this->input->post('pk');
        $value = $this->input->post('value');
        $result = $this->db->update('gkpos_menu', array($name => $value), array('id' => $id));
        echo json_encode(array('status' => $result));
    }

    public function selection() {
        $success = false;
        $message = '';
        if ($this->input->post('submit_form')) {
            if ($this->form_validation->run('gkpos_selection') == FALSE) {
                $message = validation_errors();
                $success = false;
            } else {
                $data = $this->prepareData();
                if (!isset($data['is_dine'])) {
                    unset($data['in_price']);
                    unset($data['out_price']);
                } else {
                    unset($data['is_dine']);
                    unset($data['base_price']);
                }
                $data['status'] = '1';
                $last_id = $this->Menumanager_Model->get_last_row_id('gkpos_selection');
                $data['order'] = $last_id > 0 ? $last_id + 1 : 1;
                $data['created_by'] = $this->session->userdata('gkpos_userid');
                $result = $this->Menumanager_Model->save_menuselection($data);
                $success = $result ? true : false;
            }
            if ($success) {
                $message = $this->lang->line('gkpos_menu') . ' ' . $this->lang->line('gkpos_selection') . ' ' . $data['title'] . ' ' . $this->lang->line('gkpos_saved_' . ($success ? '' : 'un') . 'successfully');
                echo json_encode(array('success' => $success, 'message' => $message));
            } else {
                echo json_encode(array('success' => $success, 'message' => $message));
            }
        }
    }

    function editmenuselcell() {
        $name = $this->input->post('name');
        $id = $this->input->post('pk');
        $value = $this->input->post('value');
        $result = $this->db->update('gkpos_selection', array($name => $value), array('id' => $id));
        echo json_encode(array('status' => $result));
    }

}
