<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Gkpos_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Settings_Model');
    }

    public function index() {
        $data['current_section'] = $this->lang->line('gkpos_system_management');
        $data['current_page'] = "settings";
        $this->load->view('gkpos/settings/index', $data);
    }

    public function indexcontent() {
        $data['current_section'] = $this->lang->line('gkpos_system_management');
        $data['current_page'] = "settings";
        $this->load->view('gkpos/settings/indexcontent', $data);
    }

    public function general() {
        $data['current_section'] = $this->lang->line('gkpos_system_management');
        $data['current_page'] = "general";
        $data['logo_exists'] = $this->Appconfig->get('gk_logo') != '';
        $this->load->view('gkpos/settings/general/general', $data, false);
    }

    function save_general() {
        $upload_success = $this->_handle_logo_upload();
        $upload_data = $this->upload->data();

        $batch_save_data = array(
            'gk_name' => $this->input->post('gk_name'),
            'gk_address' => $this->input->post('gk_address'),
            'gk_phone' => $this->input->post('gk_phone'),
            'gk_email' => $this->input->post('gk_email'),
            'gk_fax' => $this->input->post('gk_fax'),
            'gk_website' => $this->input->post('gk_website'),
            'gk_policy' => $this->input->post('gk_policy')
        );

        if (!empty($upload_data['orig_name'])) {
            $batch_save_data['gk_logo'] = $upload_data['raw_name'] . $upload_data['file_ext'];
        }

        $result = $this->Appconfig->batch_save($batch_save_data);
        $success = $upload_success && $result ? true : false;
        $message = $this->lang->line('config_saved_' . ($success ? '' : 'un') . 'successfully');
        $message = $upload_success ? $message : $this->upload->display_errors();
        echo json_encode(array('success' => $success, 'message' => $message));
    }

    private function _handle_logo_upload() {
        $this->load->helper('directory');
        // load upload library
        $config = array('upload_path' => './uploads/gkpos/logo/',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => '1024',
            'max_width' => '800',
            'max_height' => '680',
            'file_name' => 'gk_logo');
        $this->load->library('upload', $config);
        $this->upload->do_upload('gk_logo');
        return strlen($this->upload->display_errors()) == 0 || !strcmp($this->upload->display_errors(), '<p>' . $this->lang->line('upload_no_file_selected') . '</p>');
    }

    public function remove_logo() {
        $result = $this->Appconfig->batch_save(array('gk_logo' => ''));

        echo json_encode(array('success' => $result));
    }

    public function vatsetup() {
        $data['current_section'] = $this->lang->line('gkpos_system_management') . ' VAT SETUP';
        $data['current_page'] = "vatsetup";
        $this->load->view('gkpos/settings/general/vatsetup', $data, false);
    }

    public function save_vat() {
        $batch_save_data = array(
            'gk_vat_reg' => $this->input->post('gk_vat_reg'),
            'gk_vat_percent' => $this->input->post('gk_vat_percent'),
            'gk_vat_included' => $this->input->post('gk_vat_included'),
        );
        $result = $this->Appconfig->batch_save($batch_save_data);
        $success = $result ? true : false;
        $message = $this->lang->line('config_saved_' . ($success ? '' : 'un') . 'successfully');
        echo json_encode(array('success' => $success, 'message' => $message));
    }

    public function discountsetup() {
        $data['current_section'] = $this->lang->line('gkpos_system_management') . ' DISCOUNT SETUP';
        $data['current_page'] = "discountsetup";
        $this->load->view('gkpos/settings/general/discountsetup', $data, false);
    }

    public function save_discount() {
        $batch_save_data = array(
            'gk_discount_percent' => $this->input->post('gk_discount_percent'),
            'gk_discount_applied' => $this->input->post('gk_discount_applied'),
            'gk_discount_food' => $this->input->post('gk_discount_food'),
            'gk_discount_nonfood' => $this->input->post('gk_discount_nonfood'),
        );
        $result = $this->Appconfig->batch_save($batch_save_data);
        $success = $result ? true : false;
        $message = $this->lang->line('config_saved_' . ($success ? '' : 'un') . 'successfully');
        echo json_encode(array('success' => $success, 'message' => $message));
    }

    public function promotion() {
        $data['current_section'] = $this->lang->line('gkpos_system_management') . 'promotion';
        $data['current_page'] = "promotion";
        $data['voucher_list'] = $this->Settings_Model->get_list('gkpos_voucher');
        $this->load->view('gkpos/settings/general/promotion', $data, false);
    }

    public function save_promotion($id = null) {
        $data = array(
            'title' => $this->input->post('title'),
            'code' => $this->input->post('code'),
            'amount' => $this->input->post('amount'),
            'function' => $this->input->post('function'),
        );
        $exists = $this->Settings_Model->exists('gkpos_voucher', 'LOWER(code)', strtolower($data['code']));
        if ($exists && $id == null) {
            $message = $this->lang->line('gkpos_duplicate_entry') . ' ' . $this->lang->line('gkpos_voucher_code') . ' ' . $data['code'] . ' ' . $this->lang->line('gkpos_already_exists') . ' ' . $this->lang->line('gkpos_try_another');
            $success = false;
            echo json_encode(array('success' => $success, 'message' => $message));
            exit();
        }
        $data = $this->prepareData($data);
        if ($id == null) {
            $data['status'] = 1;
            $data['created_by'] = $this->session->userdata('gkpos_userid');
        }
        if ($id != null && $id > 0) {
            $data['modified'] = date('Y-m-d H:i:s');
            $data['modified_by'] = $this->session->userdata('gkpos_userid');
        }
        $result = $this->Settings_Model->save_promotion($data, $id);
        $success = $result ? true : false;
        $message = $this->lang->line('config_saved_' . ($success ? '' : 'un') . 'successfully');
        echo json_encode(array('success' => $success, 'message' => $message));
    }

    public function update_promotion() {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        if ($action == 'delete') {
            $success = $this->db->delete('gkpos_voucher', array('id' => $id));
            $message = $success ? 'Voucher deleted successfully' : 'Voucher Deletion failed';
        }
        if ($action == 'activate') {
            $success = $this->db->update('gkpos_voucher', array('status' => 1), array('id' => $id));
            $message = $success ? 'Voucher activated successfully' : 'Voucher Deletion failed';
        }
        if ($action == 'deactivate') {
            $success = $this->db->update('gkpos_voucher', array('status' => 2), array('id' => $id));
            $message = $success ? 'Voucher activated successfully' : 'Voucher Deletion failed';
        }
        echo json_encode(array('success' => $success, 'message' => $message));
    }

    public function depliveryplan() {
        $data['current_section'] = $this->lang->line('gkpos_system_management') . 'Delivery Plan';
        $data['current_page'] = "depliveryplan";
        $data['deliveryplan_list'] = $this->Settings_Model->get_list('gkpos_deliveryplan');
        $this->load->view('gkpos/settings/general/deliveryplan', $data, false);
    }

    public function get_postcodelist() {
        $id = $this->input->post('id');
        $postcodes = $this->Settings_Model->get_single('gkpos_deliveryplan', array('id' => $id), array('postcodes'));
        if (!empty($postcodes)) {
            echo json_encode(array('success' => true, 'postcodes' => $postcodes, 'message' => $id));
        } else {
            echo json_encode(array('success' => false, 'postcodes' => $postcodes, 'message' => $id));
        }
    }

    public function save_deliveryplan($id = null) {
        $data = array(
            'area' => $this->input->post('area'),
            'is_free' => $this->input->post('is_free'),
            'delivery_charge' => $this->input->post('delivery_charge'),
            'min_order' => $this->input->post('min_order'),
            'initial_code' => $this->input->post('initial_code'),
            'postcodes' => $this->input->post('postcodes'),
        );
        $data = $this->prepareData($data);
        if ($id == null) {
            $data['status'] = 1;
            $data['created_by'] = $this->session->userdata('gkpos_userid');
        }
        if ($id != null && $id > 0) {
            $data['modified'] = date('Y-m-d H:i:s');
            $data['modified_by'] = $this->session->userdata('gkpos_userid');
        }
        $result = $this->Settings_Model->save_deliveryplan($data, $id);
        $success = $result ? true : false;
        $message = $this->lang->line('config_saved_' . ($success ? '' : 'un') . 'successfully');
        echo json_encode(array('success' => $success, 'message' => $message));
    }

    public function update_deliveryplan() {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        if ($action == 'delete') {
            $success = $this->db->delete('gkpos_deliveryplan', array('id' => $id));
            $message = $success ? 'Plan deleted successfully' : 'Plan Deletion failed';
        }
        if ($action == 'activate') {
            $success = $this->db->update('gkpos_deliveryplan', array('status' => 1), array('id' => $id));
            $message = $success ? 'Plan activated successfully' : 'Plan Deletion failed';
        }
        if ($action == 'deactivate') {
            $success = $this->db->update('gkpos_deliveryplan', array('status' => 2), array('id' => $id));
            $message = $success ? 'Plan activated successfully' : 'Plan Deletion failed';
        }
        echo json_encode(array('success' => $success, 'message' => $message));
    }

    public function pagination() {
        $data['current_section'] = $this->lang->line('gkpos_system_management') . 'Pagination';
        $data['current_page'] = "pagination";
        $this->load->view('gkpos/settings/general/pagination', $data, false);
    }

    public function save_pagination() {
        $batch_save_data = array(
            'gk_category_line_page' => $this->input->post('gk_category_line_page'),
            'gk_menu_line_page' => $this->input->post('gk_menu_line_page'),
        );
        $result = $this->Appconfig->batch_save($batch_save_data);
        $success = $result ? true : false;
        $message = $this->lang->line('config_saved_' . ($success ? '' : 'un') . 'successfully');
        echo json_encode(array('success' => $success, 'message' => $message));
    }

}
