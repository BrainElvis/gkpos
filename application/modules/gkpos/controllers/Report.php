<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Gkpos_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
        $this->load->model('Entry_Model');
        if (!$this->Entry_Model->is_logged_in()) {
            redirect('gkpos/entry');
        }
        $this->load->helper('gkpos');
        $this->load->model('Report_Model');
    }

    public function index() {
        $this->Report_Model->empty_btn_counter();
        $data['current_page'] = "report";
        $today_start = date($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), mktime(0, 0, 0));
        $today_end = date($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), mktime(23, 59, 59));
        $start_date_formatter = DateTime::createFromFormat($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), $today_start);
        $end_date_formatter = DateTime::createFromFormat($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), $today_end);

        $data['orderList'] = $this->Report_Model->search(array('start_date' => $start_date_formatter->format('Y-m-d H:i:s'), 'end_date' => $end_date_formatter->format('Y-m-d H:i:s'), 'is_by_closing' => 'no'), $this->config->item('gk_report_line_page'))->result();

        $data['start_date'] = $start_date_formatter->format($this->config->item('dateformat'));
        $data['end_date'] = $end_date_formatter->format($this->config->item('dateformat'));
        $data['payment_options'] = $this->Report_Model->get_payment_options();
        $data['ordertype_options'] = $this->Report_Model->get_ordertype_options();
        $total_restuls = $this->Report_Model->get_total_report_rows('gkpos_order', array('start_date' => $start_date_formatter->format('Y-m-d H:i:s'), 'end_date' => $end_date_formatter->format('Y-m-d H:i:s')));
        $maxCounterVal = $total_restuls > 0 ? $total_restuls / $this->config->item('gk_report_line_page') : 0;
        $maxCounter = 0;
        if (is_integer($maxCounterVal) && $maxCounterVal > 0) {
            $maxCounter = $maxCounterVal;
        } else if ((is_double($maxCounterVal) || is_float($maxCounterVal)) && $maxCounterVal > 0) {
            $maxCounter = floor($maxCounterVal) + 1;
        } else {
            $maxCounter = 0;
        }
        $data['maxCounter'] = $maxCounter;
        $data['active_page'] = 1;
        $this->load->view('gkpos/report/index', $data, false);
    }

    public function filter() {
        $is_by_closing = isset($_POST['is_by_closing']) ? 'yes' : 'no';
        $start_date_value = '';
        $end_date_value = '';
        $maxCounter = 0;
        $limit = $this->config->item('gk_report_line_page');
        $offset = 0;
        $data['active_page'] = 1;
        if ($is_by_closing == 'yes') {
            $start_date = DateTime::createFromFormat($this->config->item('dateformat'), $this->input->post('start_date') != null ? $this->input->post('start_date') : date($this->config->item('dateformat'), strtotime('today')));
            $end_date = DateTime::createFromFormat($this->config->item('dateformat'), $this->input->post('end_date') != null ? $this->input->post('end_date') : date($this->config->item('dateformat'), strtotime('today')));
            $start_date_value = $start_date->format('Y-m-d');
            $end_date_value = $end_date->format('Y-m-d');
        } else {
            $today_start = date($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), mktime(0, 0, 0));
            $today_end = date($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), mktime(23, 59, 59));
            $start_date = $this->input->post('start_date') != null ? $this->input->post('start_date') . ' ' . date($this->config->item('timeformat'), mktime(0, 0, 0)) : $today_start;
            $start_date_formatter = DateTime::createFromFormat($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), $start_date);
            $end_date = $this->input->post('end_date') != null ? $this->input->post('end_date') . ' ' . date($this->config->item('timeformat'), mktime(23, 59, 59)) : $today_end;
            $end_date_formatter = DateTime::createFromFormat($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), $end_date);
            $start_date_value = $start_date_formatter->format('Y-m-d H:i:s');
            $end_date_value = $end_date_formatter->format('Y-m-d H:i:s');
        }
        $order_type = $this->input->post('order_type');
        $pos_method = $this->input->post('pos_method');
        $online_method = $this->input->post('online_method');
        $filters = array(
            'order_type' => $order_type,
            'start_date' => $start_date_value,
            'end_date' => $end_date_value,
            'method' => $order_type != 'online' ? $pos_method : $online_method,
            'is_by_closing' => $is_by_closing
        );
        if ($is_by_closing == 'no') {
            $total_restuls = $this->Report_Model->get_total_report_rows('gkpos_order', $filters);
            $maxCounterVal = $total_restuls > 0 ? $total_restuls / $limit : 0;
            if (is_integer($maxCounterVal) && $maxCounterVal > 0) {
                $maxCounter = $maxCounterVal;
            } else if ((is_double($maxCounterVal) || is_float($maxCounterVal)) && $maxCounterVal > 0) {
                $maxCounter = floor($maxCounterVal) + 1;
            } else {
                $maxCounter = 0;
            }
            $data['maxCounter'] = $maxCounter;
            if (isset($_POST['pageBtn'])) {
                $pageBtn = $this->input->post('pageBtn');
                $firstOrderId = $this->input->post('firstOrderId');
                $lastOrderId = $this->input->post('lastOrderId');
                $nextBtnCounter = $this->Report_Model->get_nextbtn_counter();
                $prevBtnCounter = $this->Report_Model->get_prevbtn_counter();
                if ($pageBtn && $pageBtn == 'nextBtn') {
                    $nextBtnCounter+=1;
                    $maxCounter > $nextBtnCounter ? $this->Report_Model->set_nextbtn_counter($nextBtnCounter) : $this->Report_Model->set_nextbtn_counter(0);
                    $prevBtnCounter > 0 ? $this->Report_Model->set_prevbtn_counter($prevBtnCounter - 1) : $this->Report_Model->set_prevbtn_counter($prevBtnCounter + 1);
                }
                if ($pageBtn && $pageBtn == 'prevBtn') {
                    $prevBtnCounter+=1;
                    $maxCounter > $prevBtnCounter ? $this->Report_Model->set_prevbtn_counter($prevBtnCounter) : $this->Report_Model->set_prevbtn_counter(0);
                    $nextBtnCounter > 0 ? $this->Report_Model->set_nextbtn_counter($nextBtnCounter - 1) : $this->Report_Model->set_nextbtn_counter($nextBtnCounter + 1);
                }
                $maxmin = $this->Report_Model->get_min_max('gkpos_order', 'id', array('paid_status' => 1));
                if ($pageBtn == 'nextBtn' && $lastOrderId > $maxmin['min']) {
                    $nextBtnCounter = $this->Report_Model->get_nextbtn_counter();
                    $offset = $limit * $nextBtnCounter;
                    $data['active_page'] = $nextBtnCounter + 1;
                } else if ($pageBtn == 'prevBtn' && $firstOrderId < $maxmin['max']) {
                    $offset = abs(($nextBtnCounter - 1) * $limit);
                    $data['active_page'] = abs($nextBtnCounter);
                } else if ($pageBtn == 'del') {
                    $order_id = $this->input->post('order_id');
                    $active_page = $this->input->post('active_page');
                    $status = $this->Report_Model->delete_order($order_id);
                    if ($status) {
                        $total_restuls = $this->Report_Model->get_total_report_rows('gkpos_order', $filters);
                        $maxCounterVal = $total_restuls > 0 ? $total_restuls / $limit : 0;
                        $maxCounterNew = 0;
                        if (is_integer($maxCounterVal) && $maxCounterVal > 0) {
                            $maxCounterNew = $maxCounterVal;
                        } else if ((is_double($maxCounterVal) || is_float($maxCounterVal)) && $maxCounterVal > 0) {
                            $maxCounterNew = floor($maxCounterVal) + 1;
                        } else {
                            $maxCounterNew = 0;
                        }
                        if ($maxCounter > $maxCounterNew) {
                            $active_page-=1;
                        } else {
                            $active_page = $active_page;
                        }
                        if ($active_page == 1) {
                            $offset = 0;
                        } else {
                            $offset = ($active_page - 1) * $limit;
                        }
                        $data['active_page'] = $active_page;
                        $data['maxCounter'] = $maxCounterNew;
                        $this->Report_Model->set_nextbtn_counter($active_page);
                        $this->Report_Model->set_prevbtn_counter($active_page - 1);
                    }
                } else {
                    $page = (int) $pageBtn;
                    if ($page == 1) {
                        $offset = 0;
                    } else {
                        $offset = ($page - 1) * $limit;
                    }
                    $data['active_page'] = $page;
                    $this->Report_Model->set_nextbtn_counter($page);
                    $this->Report_Model->set_prevbtn_counter($page - 1);
                }
                $data['orderList'] = $this->Report_Model->search($filters, $limit, $offset)->result();
                if (empty($data['orderList'])) {
                    $this->Report_Model->empty_btn_counter();
                }
            } else {
                $data['active_page'] = 1;
                $this->Report_Model->set_nextbtn_counter(1);
                $this->Report_Model->set_prevbtn_counter(0);
                $data['orderList'] = $this->Report_Model->search($filters, $limit, 0)->result();
            }
        } else {
            $data['orderList'] = $this->Report_Model->search($filters, 0, 0)->result();
        }
        $this->load->view('gkpos/report/filtered', $data, false);
    }

    public function closeday() {

        $this->db->select_max('closing_date');
        $this->db->from('gkpos_order');
        $max_closing_date = $this->db->get()->row()->closing_date;
        $date = DateTime::createFromFormat($this->config->item('dateformat'), $this->input->post('closing_date'));
        $given_closing_date = $date->format('Y-m-d');
        $maxClosingDate = new DateTime($max_closing_date);
        $givenClosingDate = new DateTime($given_closing_date);
        $interval = $maxClosingDate->diff($givenClosingDate);
        $difference = str_split($interval->format('%R%a'));
        if ($difference[0] == '-') {
            echo json_encode(array('success' => false, 'differenc' => $difference, 'message' => 'Days are already closed or remote backlog'));
        } else {
            if ((int) $difference[1] == 0) {
                echo json_encode(array('success' => false, 'differenc' => $difference, 'message' => 'The days transactions already Closed'));
            } else {
                $this->db->select_max('created');
                $this->db->from('gkpos_order');
                $max_created = $this->db->get()->row()->created;
                $maxCreatedDateObj = DateTime::createFromFormat('Y-m-d H:i:s', $max_created);
                $maxCreatedDate = $maxCreatedDateObj->format('Y-m-d');
                $maxCreatedNewDateObj = new DateTime($maxCreatedDate);
                $interval = $maxCreatedNewDateObj->diff($givenClosingDate);
                $difference = str_split($interval->format('%R%a'));
                if ((int) $difference[1] == 0) {
                    $closing_date = array(
                        'closing_date' => $given_closing_date
                    );
                    if ($this->db->update('gkpos_order', $closing_date, array('closing_date' => NULL))) {
                        echo json_encode(array('success' => true, 'message' => 'Days Closed for ' . $this->input->post('closing_date')));
                    }
                } else {
                    echo json_encode(array('success' => false, 'differenc' => $difference, 'message' => 'No trascation to close', 'created' => $maxCreatedDate));
                }
            }
        }
    }

    public function showdate() {
        echo date('Y-m-d', strtotime('today'));
    }

    public function getmaxclosingday() {
        $this->db->select_max('closing_date');
        $this->db->from('gkpos_order');
        $max_closing_date = $this->db->get()->row()->closing_date;

        $todayDate = date('Y-m-d', strtotime('today'));
        $todayDateFormat = DateTime::createFromFormat('Y-m-d', $todayDate);
        $formatedTodayDate = $todayDateFormat->format($this->config->item('dateformat'));
        $clsingDate = new DateTime($max_closing_date);
        $today = new DateTime($todayDate);
        $interval = $today->diff($clsingDate);
        $difference = str_split($interval->format('%R%a'));
        if ($difference[0] == '+' && (int) $difference[1] == 1) {
            $available_date = $formatedTodayDate;
        } else if ($difference[0] == '+' && (int) $difference[1] == 2) {
            $today->sub(new DateInterval('P1D'));
            $available_date = $today->format($this->config->item('dateformat'));
        } else if ($difference[0] == '+' && (int) $difference[1] == 0) {
            $today->add(new DateInterval('P1D'));
            $available_date = $today->format($this->config->item('dateformat'));
        } else {
            $available_date = $formatedTodayDate;
        }
        echo json_encode(array('availableClosingDate' => $available_date));

        //echo $max_closing_date;
    }

}
