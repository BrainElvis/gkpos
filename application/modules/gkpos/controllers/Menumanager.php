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

        $this->page_title = 'Gkpos | Login';
        $this->current_section = "Menu Manager";
        $this->body_class[] = "pos-menumanager";
        //debugPrint($data);
        $this->render_page('gkpos/menumanager/index', $data);
    }

    public function category() {
        $data = $this->Menumanager_Model->get_menu_category_by_id($id);
        $this->page_title = 'Gkpos | Category';
        $this->current_section = "Menu Category";
        $this->body_class[] = "pos-menumanager pos-category";
        $this->render_page('gkpos/menumanager/category', $data);
    }

    public function categoryadd($id = '') {
        $data = [];
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $data = objectToArray($this->Menumanager_Model->get_menu_category_by_id($id));
        }

        $this->page_title = 'Gkpos |' . (isset($id) && $id > 0) ? 'Update Category' : 'Add New Category';
        $this->current_section = (isset($id) && $id > 0) ? 'Update Category' : 'Add New Category';
        $this->body_class[] = "pos-menumanager pos-add-category";
        //debugPrint($data);
        $this->render_page('gkpos/menumanager/categoryadd', $data);
    }

    public function categorysave($id = '') {
        $prev_data = [];
        $success = false;
        $message = '';
        if ($this->input->post('submit_form')) {
            if (is_numeric($id) && $id > 0) {
                $id = $id;
                $prev_data = objectToArray($this->Menumanager_Model->get_menu_category_by_id($id));
            }
            if ($this->form_validation->run('gkpos_menu_category') == FALSE) {
                $message = validation_errors();
                $success = false;
            } else {
                $result = false;
                $data = $this->prepareData();
                if ($id) {
                    if (strtolower(str_replace(' ', '', $prev_data['title'])) == strtolower(str_replace(' ', '', $data['title']))) {
                        $data['modified'] = date('Y-m-d H:i:s');
                        $data['modified_by'] = $this->session->userdata('gkpos_userid');
                        $result = $this->Menumanager_Model->update_menu_category($data, $id);
                        $success = $result ? true : false;
                    } else {
                        $exists = $this->Menumanager_Model->exists('gkpos_menu_category', 'LOWER(title)', strtolower($data['title']));
                        if ($exists) {
                            $message = $this->lang->line('gkpos_duplicate_entry') . ' ' . $this->lang->line('gkpos_category') . ' ' . $data['title'] . ' ' . $this->lang->line('gkpos_already_exists') . ' ' . $this->lang->line('gkpos_try_another');
                            $success = false;
                        } else {
                            $data['modified'] = date('Y-m-d H:i:s');
                            $data['modified_by'] = $this->session->userdata('gkpos_userid');
                            $result = $this->Menumanager_Model->update_menu_category($data, $id);
                            $success = $result ? true : false;
                        }
                    }
                } else {
                    $exists = $this->Menumanager_Model->exists('gkpos_menu_category', 'LOWER(title)', strtolower($data['title']));
                    if ($exists) {
                        $message = $this->lang->line('gkpos_duplicate_entry') . ' ' . $this->lang->line('gkpos_category') . ' ' . $data['title'] . ' ' . $this->lang->line('gkpos_already_exists') . ' ' . $this->lang->line('gkpos_try_another');
                        $success = false;
                    } else {
                        $title = strtolower($data['title']);
                        $data['slug'] = str_replace(' ', '-', $title);
                        $data['status'] = '1';
                        $data['published'] = '1';
                        $data['deleted'] = '0';
                        $last_id = $this->Menumanager_Model->get_last_row_id('gkpos_menu_category');
                        $data['order'] = $last_id > 0 ? $last_id + 1 : 1;
                        $data['created_by'] = $this->session->userdata('gkpos_userid');
                        $result = $this->Menumanager_Model->save_menu_category($data);
                        $success = $result ? true : false;
                    }
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

}
