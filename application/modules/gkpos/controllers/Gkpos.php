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
        $this->load->model('Gkpos_Model');
    }

    public function index() {
        $this->page_title = 'Gkpos | Mainboard';
        $this->current_section = "Mainboard";
        $this->body_class [] = "pos-mainboard";
        $this->render_page('gkpos/gkpos/index');
    }

    public function takeaway() {
        $info = $this->input->post('info');
        $data['info'] = $info;
        $data['current_section'] = "Takeaway";
        $data['current_page'] = "takeaway";
        $this->load->view('gkpos/gkpos/takeaway', $data, false);
    }

    public function delivery() {
        $info = $this->input->post('info');
        if (is_array($info) && count($info > 1)) {
            $data['callerName'] = $info[0];
            $data['callerPhone'] = $info[1];
            $data['callerOrderType'] = $info[2];
            $data['isPhoneCall'] = $info[3];
            $data['info'] = $info[2];
        } else {
            $data['info'] = $info;
        }
        $data['current_section'] = $this->lang->line('gkpos_delivery');
        $data['current_page'] = "delivery";
        $this->load->view('gkpos/gkpos/delivery', $data, false);
    }

    public function collection() {
        $info = $this->input->post('info');
        if (is_array($info) && count($info > 1)) {
            $data['callerName'] = $info[0];
            $data['callerPhone'] = $info[1];
            $data['callerOrderType'] = $info[2];
            $data['isPhoneCall'] = $info[3];
        } else {
            $data['info'] = $info;
        }
        $data['current_section'] = $this->lang->line('gkpos_collection');
        $data['current_page'] = "collection";
        $this->load->view('gkpos/gkpos/collection', $data, false);
    }

    public function waiting() {
        $info = $this->input->post('info');
        if (is_array($info) && count($info > 1)) {
            $data['callerName'] = $info[0];
            $data['callerPhone'] = $info[1];
            $data['callerOrderType'] = $info[2];
            $data['isPhoneCall'] = $info[3];
            $data['info'] = $info[2];
        } else {
            $data['info'] = $info;
        }
        $data['current_section'] = $this->lang->line('gkpos_waiting');
        $data['current_page'] = "waiting";
        $this->load->view('gkpos/gkpos/waiting', $data, false);
    }

    public function table() {
        $info = $this->input->post('info');
        if (is_array($info) && count($info > 1)) {
            $data['callerName'] = $info[0];
            $data['callerPhone'] = $info[1];
            $data['callerOrderType'] = $info[2];
            $data['isPhoneCall'] = $info[3];
            $data['info'] = $info[2];
        } else {
            $data['info'] = $info;
        }
        $data['current_section'] = $this->lang->line('gkpos_table');
        $data['current_page'] = "table";
        $this->load->view('gkpos/gkpos/table', $data, false);
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

    public function keyboard_setting() {
        $is_touch = $this->input->post('is_touch');
        echo $this->Appconfig->batch_save(array('is_touch' => $is_touch));
    }

    public function search_customer() {
        $key = $this->input->post('key');
        $value = $this->input->post('value');
        $value = str_replace(' ', '', $value);
        $customer = $this->Gkpos_Model->get_single('gkpos_customer', array($key => $value));
        if (!empty($customer)) {
            echo json_encode(array('status' => true, 'customer' => $customer));
        } else {
            echo json_encode(array('status' => false));
        }
    }

    public function get_customer() {
        //$customer = $this->Orders_Model->get_list('gkpos_customer', array('status' => 1), array('name'));
        $term = $this->input->get('term');
        $this->db->select('name');
        $this->db->from('gkpos_customer');
        $this->db->where("name LIKE '%" . $term . "%'");
        $this->db->order_by("name", "asc");
        $result = $this->db->get()->result();
        $customer = array_map('current', $result);
        echo json_encode($customer);
    }

    function set_customer_info() {
        $this->session->unset_userdata('posCurrentCustomer');
        $postedData = $this->input->post();
        $success = false;
        if ($this->form_validation->run('gkpos_' . $postedData['order_type']) == FALSE) {
            $message = validation_errors();
            $success = false;
        } else {
            $success = true;
            $message = "ok";
        }
        if ($success) {
            $data = $postedData;
            if ($postedData['order_type'] != 'table') {
                if (isset($postedData['delivery_time'])) {
                    $deliveryDateFormatter = date_create_from_format($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), $postedData['delivery_time']);
                    $postedData['delivery_time'] = $deliveryDateFormatter->format('Y-m-d H:i:s');
                }

                if (isset($postedData['postcode'])) {
                    $postedData['postcode'] = postcodeFormat($postedData['postcode']);
                }

                $exists = $this->Gkpos_Model->exists('gkpos_customer', 'phone', $postedData['phone']);

                if (!$exists) {
                    if (isset($data['order_type'])) {
                        unset($data['order_type']);
                    }
                    if (isset($data['delivery_time'])) {
                        unset($data['delivery_time']);
                    }
                    $data = $this->prepareGkposData($data);
                    $data['status'] = '1';
                    $data['created_by'] = $this->session->userdata('gkpos_userid');
                    $this->Gkpos_Model->save_customer_info($data);
                    $postedData = $this->prepareGkposData($postedData);
                    $postedData['status'] = '1';
                    $postedData['created_by'] = $this->session->userdata('gkpos_userid');
                    if ($this->Gkpos_Model->save_order_info($postedData)) {
                        $this->session->set_userdata('posCurrentCustomer', $postedData);
                    }
                } else {
                    $data = $this->prepareGkposData($data);
                    $data['status'] = '1';
                    $data['created_by'] = $this->session->userdata('gkpos_userid');
                    if ($this->Gkpos_Model->save_order_info($data)) {
                        unset($postedData['submit_form']);
                        $this->session->set_userdata('posCurrentCustomer', $postedData);
                    }
                }
            } else {
                $table_info = $this->Gkpos_Model->get_single('gkpos_table', array('table_number' => $postedData['table_number']));
                if (!empty($table_info)) {
                    if ($table_info->is_vacant == '2') {
                        echo json_encode(array('success' => false, 'message' => $this->lang->line('gkpos_table') . ' ' . $postedData['table_number'] . ' ' . $this->lang->line('gkpos_table_not_vacant')));
                    } else {
                        if ($this->db->update('gkpos_table', array('guest_quantity' => $postedData['guest_quantity'], 'is_vacant' => '2', 'modified' => date('Y-m-d H:i:s'), 'modified_by' => $this->session->userdata('gkpos_userid')))) {
                            $data = $this->prepareGkposData($data);
                            if (isset($data['table_number'])) {
                                unset($data['table_number']);
                            }
                            if (isset($data['guest_quantity'])) {
                                unset($data['guest_quantity']);
                            }
                            $data['table_id'] = $table_info->id;
                            $data['status'] = '1';
                            $data['created_by'] = $this->session->userdata('gkpos_userid');
                            $inner_status = $this->Gkpos_Model->save_order_info($data);
                            $this->session->set_userdata('posCurrentCustomer', $postedData);
                        }
                    }
                } else {
                    if ($data['order_type']) {
                        unset($data['order_type']);
                    }
                    $data['status'] = '1';
                    $data['created_by'] = $this->session->userdata('gkpos_userid');
                    $data['is_vacant'] = '2';
                    $data = $this->prepareGkposData($data);
                    $id = $this->Gkpos_Model->save_table_info($data);
                    if ($id) {
                        $postedData = $this->prepareGkposData($postedData);
                        if (isset($postedData['table_number'])) {
                            unset($postedData['table_number']);
                        }
                        if (isset($postedData['guest_quantity'])) {
                            unset($postedData['guest_quantity']);
                        }
                        $postedData['table_id'] = $id;
                        $postedData['status'] = '1';
                        $postedData['created_by'] = $this->session->userdata('gkpos_userid');
                        $this->Gkpos_Model->save_order_info($postedData);
                        unset($postedData['submit_form']);
                        $this->session->set_userdata('posCurrentCustomer', $postedData);
                    }
                }
            }
        }
        echo json_encode(array('success' => $success, 'message' => $message));
    }

}
