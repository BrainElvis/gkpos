<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
        array_push($this->assets_js, 'tinymce/tinymce.min.js', 'tinymce/execute.js');
        $this->load->model('Slider_Model');
    }

    public function index() {
        $this->page_title = $this->lang->line('common_view') . ' ' . $this->lang->line('common_slider');
        $this->current_section = $this->lang->line('common_view') . ' ' . $this->lang->line('common_slider');
        $this->page_meta_keywords = '';
        $this->page_meta_description = '';
        $this->body_class[] = 'admin-dashboard-award';
        $data = [];
        $condition = '';
        if ($_POST) {
            $this->session->unset_userdata('slider_title');
            if ($this->input->post('slider_title')) {
                $condition .= " title LIKE '" . mysql_real_escape_string($this->input->post('slider_title')) . "%'";
                $this->session->set_userdata('slider_title', $this->input->post('slider_title'));
            }
        }
        $data['slider_title'] = ($this->input->post('slider_title')) ? $this->input->post('slider_title') : $this->session->userdata('slider_title');
        $offset = intval($this->uri->segment(4));
        $offset = $offset ? $offset : 0;
        $result = $this->Slider_Model->get_paged_list('slider', $condition, $url = 'admin/slider/index', $segment = 4, $offset, 'title', 'ASC');
        $data['slider'] = $result['rows'];
        $data['pagination'] = $result['pagination'];
        $data['count'] = $offset;
        $this->render_page('admin/slider/index', $data);
    }

    public function add($id = '') {
        $data = [];
        $this->page_title = $this->lang->line('common_add_new') . " " . $this->lang->line('common_slider');
        $this->current_section = $this->lang->line('common_add_new') . " " . $this->lang->line('common_slider');
        $this->body_class[] = 'admin-dashboard slider';
        $data = [];
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $data = $this->Slider_Model->get($id);
        }
        if ($this->input->post('submit_form')) {
            if ($this->form_validation->run('slider') == FALSE) {
                $data = $this->prepareData();
                $this->session->set_flashdata('app_error', validation_errors());
            } else {
                $data = $this->prepareData();
                $uploader_config = array('upload_path' => 'uploads/slider/',
                    'allowed_types' => 'gif|jpg|png',
                    'max_size' => '2048',
                    'max_width' => '1900',
                    'max_height' => '750',
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
                    $result = $this->Slider_Model->save($data, $id);
                } else {
                    $title = strtolower($data['title']);
                    $data['slug'] = str_replace(' ', '-', $title);
                    $data['created_by'] = $this->user_id;
                    $result = $this->Slider_Model->save($data);
                }
                $success = $upload_success && $result ? true : false;
                $message = $this->lang->line('common_item_saved_' . ($success ? '' : 'un') . 'successfully');
                $message = $upload_success ? $message : $this->upload->display_errors();
                if ($success) {
                    $data = [];
                    $this->session->set_flashdata('app_success', $message);
                    redirect('admin/slider/add');
                } else {
                    $this->session->set_flashdata('app_error', $message);
                    redirect('admin/slider/add');
                }
            }
        }

        $this->render_page('admin/slider/add', $data);
    }

    public function view($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $slider = $this->Slider_Model->get($id);
            $this->page_title = $slider->title;
            $this->current_section = $slider->title;
            $this->body_class[] = 'admin-dashboard slider';
            $this->render_page('admin/slider/view', $slider);
        } else {
            redirect('admin/slider/view');
        }
    }

    public function delete($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $slider = $this->Slider_Model->get($id);
            if (!empty($slider) && isset($slider->image) && $slider->image != '') {
                $path = "uploads/slider/";
                $file = $slider->image;
                if (checkfile($path, $file)) {
                    unlink(realpath($path . $file));
                }
                $result = $this->Slider_Model->delete($id);
                if ($result) {
                    $this->session->set_flashdata('app_success', $this->lang->line('common_delete_success'));
                    redirect('admin/slider');
                } else {
                    redirect('admin/slider');
                    $this->session->set_flashdata('app_error', $this->lang->line('common_delete_failed'));
                }
            } else {
                $this->session->set_flashdata('app_error', $this->lang->line('common_delete_failed'));
                redirect('admin/slider');
            }
        }
    }

    public function publish($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $result = $this->Slider_Model->save(array('is_published' => 1), $id);
            if ($result) {
                $this->session->set_flashdata('app_success', $this->lang->line('common_publish_success'));
                redirect('admin/slider');
            } else {
                redirect('admin/slider');
                $this->session->set_flashdata('app_error', $this->lang->line('common_publish_failed'));
            }
        } else {
            $this->session->set_flashdata('app_error', $this->lang->line('common_publish_failed'));
            redirect('admin/slider');
        }
    }

    public function unpublish($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $result = $this->Slider_Model->save(array('is_published' => 0), $id);
            if ($result) {
                $this->session->set_flashdata('app_success', $this->lang->line('common_unpublish_success'));
                redirect('admin/slider');
            } else {
                redirect('admin/slider');
                $this->session->set_flashdata('app_error', $this->lang->line('common_unpublish_failed'));
            }
        } else {
            $this->session->set_flashdata('app_error', $this->lang->line('common_unpublish_failed'));
            redirect('admin/slider');
        }
    }

    public function feature($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $result = $this->Slider_Model->save(array('is_featured' => 1), $id);
            if ($result) {
                $this->session->set_flashdata('app_success', $this->lang->line('common_feature_success'));
                redirect('admin/slider');
            } else {
                redirect('admin/slider');
                $this->session->set_flashdata('app_error', $this->lang->line('common_feature_failed'));
            }
        } else {
            $this->session->set_flashdata('app_error', $this->lang->line('common_feature_failed'));
            redirect('admin/slider');
        }
    }

    public function unfeature($id) {
        if (is_numeric($id) && $id > 0) {
            $id = $id;
            $result = $this->Slider_Model->save(array('is_featured' => 0), $id);
            if ($result) {
                $this->session->set_flashdata('app_success', $this->lang->line('common_unfeature_success'));
                redirect('admin/slider');
            } else {
                redirect('admin/slider');
                $this->session->set_flashdata('app_error', $this->lang->line('common_unfeature_failed'));
            }
        } else {
            $this->session->set_flashdata('app_error', $this->lang->line('common_unfeature_failed'));
            redirect('admin/slider');
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
