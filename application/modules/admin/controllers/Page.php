<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
        array_push($this->assets_js, 'tinymce/tinymce.min.js', 'tinymce/execute.js');
        $this->load->model('Page_Model');
    }

    public function index() {
        $this->load->helper('security');
        $this->page_title = $this->lang->line('common_view') . ' ' . $this->lang->line('common_page');
        $this->current_section = $this->lang->line('common_view') . ' ' . $this->lang->line('commom_page');
        $this->page_meta_keywords = '';
        $this->page_meta_description = '';
        $this->body_class[] = 'admin-dashboard page';
        $data = [];
        $condition = '';
        if ($_POST) {
            $this->session->unset_userdata('page_title');
            if ($this->input->post('page_title')) {
                $condition .= " title LIKE '" . xss_clean($this->input->post('page_title')) . "%'";
                $this->session->set_userdata('page_title', $this->input->post('page_title'));
            }
        }
        $data['page_title'] = ($this->input->post('page_title')) ? $this->input->post('page_title') : $this->session->userdata('page_title');
        $offset = intval($this->uri->segment(4));
        $offset = $offset ? $offset : 0;
        $result = $this->Page_Model->get_paged_list('page', $condition, $url = 'admin/page/index', $segment = 4, $offset, 'title', 'ASC');
        $data['page'] = $result['rows'];
        $data['pagination'] = $result['pagination'];
        $data['count'] = $offset;
        $this->render_page('admin/page/index', $data);
    }

    public function add($id = '') {
        $data = [];
        $this->page_title = $this->lang->line('common_add_new') . " " . $this->lang->line('common_page');
        $this->current_section = $this->lang->line('common_add_new') . " " . $this->lang->line('common_page');
        $this->body_class[] = 'admin-dashboard page';
        $data = [];
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $data = objectToArray($this->Page_Model->get($id));
        }
        if ($this->input->post('submit_form')) {
            if ($this->form_validation->run('page') == FALSE) {
                $data = $this->prepareData();
                $this->session->set_flashdata('app_error', validation_errors());
            }
            else {
                $data = $this->prepareData();
                $uploader_config = array('upload_path' => 'uploads/page/',
                    'allowed_types' => 'gif|jpg|png',
                    'max_size' => '1024',
                    'max_width' => '800',
                    'max_height' => '680',
                    'file_name' => 'image'
                );
                $upload_success = $this->uploadimage($uploader_config);
                $upload_data = $this->upload->data();
                if (!empty($upload_data['orig_name'])) {
                    $data['image'] = $upload_data['raw_name'] . $upload_data['file_ext'];
                }
                if ($id) {
                    $data['modified_at'] = date('Y-m-d H:i:s');
                    $data['modified_by'] = $this->user_id;
                    $result = $this->Page_Model->save($data, $id);
                }
                else {
                    $title = strtolower($data['title']);
                    $data['slug'] = str_replace(' ', '-', $title);
                    $data['created_by'] = $this->user_id;
                    $result = $this->Page_Model->save($data);
                }
                $success = $upload_success && $result ? true : false;
                $message = $this->lang->line('common_item_saved_' . ($success ? '' : 'un') . 'successfully');
                $message = $upload_success ? $message : $this->upload->display_errors();
                if ($success) {
                    $data = [];
                    $this->session->set_flashdata('app_success', $message);
                    redirect('admin/page/add');
                }
                else {
                    $this->session->set_flashdata('app_error', $message);
                    redirect('admin/page/add');
                }
            }
        }

        $this->render_page('admin/page/add', $data);
    }

    public function view($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $sponsor = $this->Page_Model->get($id);
            $this->page_title = $sponsor->title;
            $this->current_section = $sponsor->title;
            $this->body_class[] = 'admin-dashboard page-details';
            $this->render_page('admin/page/view', $sponsor);
        }
        else {
            redirect('admin/page');
        }
    }

    public function delete($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $page = $this->Page_Model->get($id);
            if (!empty($page) && isset($page->image) && $page->image != '') {
                $path = "uploads/page/";
                $file = $page->image;
                if (checkfile($path, $file)) {
                    unlink(realpath($path . $file));
                }
                $result = $this->Page_Model->delete($id);
                if ($result) {
                    $this->session->set_flashdata('app_success', $this->lang->line('common_delete_success'));
                    redirect('admin/page');
                }
                else {
                    redirect('admin/page');
                    $this->session->set_flashdata('app_error', $this->lang->line('common_delete_failed'));
                }
            }
            else {
                $this->session->set_flashdata('app_error', $this->lang->line('common_delete_failed'));
                redirect('admin/page');
            }
        }
    }

    public function publish($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $result = $this->Page_Model->save(array('is_published' => 1), $id);
            if ($result) {
                $this->session->set_flashdata('app_success', $this->lang->line('common_publish_success'));
                redirect('admin/page');
            }
            else {
                redirect('admin/page');
                $this->session->set_flashdata('app_error', $this->lang->line('common_publish_failed'));
            }
        }
        else {
            $this->session->set_flashdata('app_error', $this->lang->line('common_publish_failed'));
            redirect('admin/page');
        }
    }

    public function unpublish($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $result = $this->Page_Model->save(array('is_published' => 0), $id);
            if ($result) {
                $this->session->set_flashdata('app_success', $this->lang->line('common_unpublish_success'));
                redirect('admin/page');
            }
            else {
                redirect('admin/page');
                $this->session->set_flashdata('app_error', $this->lang->line('common_unpublish_failed'));
            }
        }
        else {
            $this->session->set_flashdata('app_error', $this->lang->line('common_unpublish_failed'));
            redirect('admin/page');
        }
    }

    public function feature($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $result = $this->Page_Model->save(array('is_featured' => 1), $id);
            if ($result) {
                $this->session->set_flashdata('app_success', $this->lang->line('common_feature_success'));
                redirect('admin/page');
            }
            else {
                redirect('admin/page');
                $this->session->set_flashdata('app_error', $this->lang->line('common_feature_failed'));
            }
        }
        else {
            $this->session->set_flashdata('app_error', $this->lang->line('common_feature_failed'));
            redirect('admin/page');
        }
    }

    public function unfeature($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $result = $this->Page_Model->save(array('is_featured' => 0), $id);
            if ($result) {
                $this->session->set_flashdata('app_success', $this->lang->line('common_unfeature_success'));
                redirect('admin/page');
            }
            else {
                redirect('admin/page');
                $this->session->set_flashdata('app_error', $this->lang->line('common_unfeature_failed'));
            }
        }
        else {
            $this->session->set_flashdata('app_error', $this->lang->line('common_unfeature_failed'));
            redirect('admin/page');
        }
    }

    public function deleteimage() {
        $file = $this->input->post('image');
        $path = $this->input->post('path');
        if (checkfile($path, $file)) {
            unlink(realpath($path . $file));
        }
    }

}
