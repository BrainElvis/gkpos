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
        $data['table_orders'] = $this->Gkpos_Model->get_table_orders();
        $data['takeaway_orders'] = $this->Gkpos_Model->get_takeaway_orders();
        $data['current_page'] = "gkpos";
        debugPrint($this->session->userdata());
        $this->render_page('gkpos/gkpos/index/index', $data);
    }

    public function indexajax() {
        $data['table_orders'] = $this->Gkpos_Model->get_table_orders();
        $data['takeaway_orders'] = $this->Gkpos_Model->get_takeaway_orders();
        $data['current_page'] = "indexajax";
        $this->load->view('gkpos/gkpos/index/indexajax', $data, false);
    }

    public function indexajaxccontent() {
        $data['table_orders'] = $this->Gkpos_Model->get_table_orders();
        $data['takeaway_orders'] = $this->Gkpos_Model->get_takeaway_orders();
        $data['current_page'] = "indexajaxccontent";
        $this->load->view('gkpos/gkpos/index/indexajaxccontent', $data, false);
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
        $this->load->view('gkpos/gkpos/delivery/order_place', $data, false);
    }

    public function delivery_order() {
        $info = $this->input->post('info');
        $data['info'] = $info;
        $data['current_section'] = "Takeaway-Delivery Orders Only";
        $data['current_page'] = "delivery_order";
        $data['takeaway_orders'] = $this->Gkpos_Model->get_delivery_orders();
        $this->load->view('gkpos/gkpos/delivery/order_list', $data, false);
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
        $this->load->view('gkpos/gkpos/collection/order_place', $data, false);
    }

    public function collection_order() {
        $info = $this->input->post('info');
        $data['info'] = $info;
        $data['current_section'] = "Takeaway-Collection Orders Only";
        $data['current_page'] = "collection_order";
        $data['takeaway_orders'] = $this->Gkpos_Model->get_collection_orders();
        $this->load->view('gkpos/gkpos/collection/order_list', $data, false);
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
        $this->load->view('gkpos/gkpos/waiting/order_place', $data, false);
    }

    public function waiting_order() {
        $info = $this->input->post('info');
        $data['info'] = $info;
        $data['current_section'] = "Takeaway-Waiting Orders Only";
        $data['current_page'] = "waiting_order";
        $data['takeaway_orders'] = $this->Gkpos_Model->get_waiting_orders();
        $this->load->view('gkpos/gkpos/waiting/order_list', $data, false);
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
        $this->load->view('gkpos/gkpos/table/order_place', $data, false);
    }

    public function table_seated_not_ordered() {
        $info = $this->input->post('info');
        $data['info'] = $info;
        $data['current_section'] = "Table Seated But Not Ordered";
        $data['current_page'] = "table_seated_not_ordered";
        $data['table_orders'] = $this->Gkpos_Model->get_table_seated_not_ordered();
        $this->load->view('gkpos/gkpos/table/seated_not_ordered', $data, false);
    }

    public function table_seated_ordered() {
        $info = $this->input->post('info');
        $data['info'] = $info;
        $data['current_section'] = "Table Seated and ordered";
        $data['current_page'] = "table_seated_ordered";
        $data['table_orders'] = $this->Gkpos_Model->get_table_seated_ordered();
        $this->load->view('gkpos/gkpos/table/seated_ordered', $data, false);
    }

    public function table_waiting_payment() {
        $info = $this->input->post('info');
        $data['info'] = $info;
        $data['current_section'] = "Waiting for table order Paymnet";
        $data['current_page'] = "table_waiting_payment";
        $data['table_orders'] = $this->Gkpos_Model->get_table_waiting_payment();
        $this->load->view('gkpos/gkpos/table/wating_payment', $data, false);
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
        $term = $this->input->get('term');
        $this->db->select('name');
        $this->db->from('gkpos_customer');
        $this->db->where("name LIKE '%" . $term . "%'");
        $this->db->order_by("name", "asc");
        $result = $this->db->get()->result();
        $customer = array_map('current', $result);
        echo json_encode($customer);
    }

    public function get_customer_phone() {
        $term = $this->input->get('term');
        $this->db->select('phone');
        $this->db->from('gkpos_customer');
        $this->db->where("phone LIKE '%" . $term . "%'");
        $this->db->order_by("phone", "asc");
        $result = $this->db->get()->result();
        $customer = array_map('current', $result);
        echo json_encode($customer);
    }

    public function orderinitiate() {
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
            $inner_success = false;
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
                    $inner_success = $this->Gkpos_Model->save_customer_info($data);
                    $postedData = $this->prepareGkposData($postedData);
                    $postedData['status'] = '1';
                    $postedData['created_by'] = $this->session->userdata('gkpos_userid');
                    $inner_success = $this->Gkpos_Model->save_order_info($postedData);

                    $message = $inner_success ? $message : "There is internal problem";
                    echo json_encode(array('success' => $inner_success, 'message' => $message));
                    exit();
                } else {
                    $data = $this->prepareGkposData($postedData);
                    $data['status'] = '1';
                    $data['created_by'] = $this->session->userdata('gkpos_userid');
                    $inner_success = $this->Gkpos_Model->save_order_info($data);
                    $message = $inner_success ? $message : "There is internal problem in saving customer info and order";
                    echo json_encode(array('success' => $inner_success, 'message' => $message));
                    exit();
                }
            } else {
                $table_info = $this->Gkpos_Model->get_single('gkpos_table', array('table_number' => (int) $postedData['table_number']));
                if (!empty($table_info)) {
                    if ($table_info->is_vacant == '2') {
                        echo json_encode(array('success' => false, 'message' => $this->lang->line('gkpos_table') . ' ' . (int) $postedData['table_number'] . ' ' . $this->lang->line('gkpos_table_not_vacant')));
                        exit();
                    } else {
                        $inner_status1 = $this->db->update('gkpos_table', array('guest_quantity' => (int) $postedData['guest_quantity'], 'is_vacant' => '2', 'modified' => date('Y-m-d H:i:s'), 'modified_by' => $this->session->userdata('gkpos_userid')), array('id' => $table_info->id, 'table_number' => $table_info->table_number));
                        $data = $this->prepareGkposData($data);
                        $data['table_id'] = $table_info->id;
                        $data['status'] = '1';
                        $data['created_by'] = $this->session->userdata('gkpos_userid');
                        $data['table_number'] = (int) $data['table_number'];
                        $data['guest_quantity'] = (int) $data['guest_quantity'];
                        $inner_status2 = $this->Gkpos_Model->save_order_info($data);
                        $inner_status = ($inner_status1 && $inner_status2) ? true : false;
                        $message = $inner_status ? "ok" : "There is some problem in processing table orders";
                        echo json_encode(array('success' => $inner_status, 'message' => $message));
                        exit();
                    }
                } else {
                    if ($data['order_type']) {
                        unset($data['order_type']);
                    }
                    $data['status'] = '1';
                    $data['created_by'] = $this->session->userdata('gkpos_userid');
                    $data['is_vacant'] = '2';
                    $data['table_number'] = (int) $data['table_number'];
                    $data['guest_quantity'] = (int) $data['guest_quantity'];
                    $data = $this->prepareGkposData($data);
                    $id = $this->Gkpos_Model->save_table_info($data);
                    if ($id) {
                        $postedData = $this->prepareGkposData($postedData);
                        $postedData['table_id'] = $id;
                        $postedData['status'] = '1';
                        $postedData['table_number'] = (int) $postedData['table_number'];
                        $postedData['guest_quantity'] = (int) $postedData['guest_quantity'];
                        $postedData['created_by'] = $this->session->userdata('gkpos_userid');
                        $inner_status = $this->Gkpos_Model->save_order_info($postedData);
                        $message = $inner_status ? "ok" : "There is some problem in processing table orders";
                        echo json_encode(array('success' => $inner_status, 'message' => $message));
                        exit();
                    }
                }
            }
        }
        echo json_encode(array('success' => $success, 'message' => $message));
    }

}
