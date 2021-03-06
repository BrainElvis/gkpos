<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Site_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
    }

    public function index() {
        $this->page_title = 'Contact';
        $this->current_section = "Contact us";
        $this->body_class[] = 'contact';

         $orderonline= $this->Site->get_page('contact');
        if (!empty($orderonline)) {
            $this->page_meta_keywords=$orderonline->meta_keys;
            $this->page_meta_description=$orderonline->meta_desc;
        }else{
            $this->page_meta_keywords =$this->config->item('company').','.'Online order, Indian Takeaway, South Indian Cuisine,Bridgend';
            $this->page_meta_description = 'Online Order at Exotic Shaad, 72 Nolton Street, Bridgend, CF31 3BP, 10% Discount on Online Order '.$this->config->item('company');
        }
        $this->template->set_partial('flash_messages', 'partials/flash_messages');

        $this->render_page('contact/index');
    }

    public function sentmail() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('message', 'Message', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata(array('contact_data' => $this->input->post()));
                $this->session->set_flashdata('app_error', validation_errors());
                redirect('contact');
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'message' => $this->input->post('message'),
                    'sent_at' => date('Y-m-d H:i:s')
                );
                $is_saved = $this->db->insert('contact', $data);
                $body = $this->load->view('contact/email', $data);
                $this->load->library('email');
                $this->email->from($data['email'], $data['name']);
                $this->email->to($this->config->item('email'));
                $this->email->subject('Customer Email');
                $this->email->message($body);
                $is_sent = $this->email->send();
                if ($is_saved && $is_sent) {
                    $this->session->unset_userdata('contact_data');
                    $this->session->set_flashdata('app_success', $this->lang->line('contact_mail_sent_success'));
                    redirect('contact');
                } else {
                    $this->session->set_flashdata('app_error', $this->lang->line('contact_mail_sent_failed'));
                    redirect('contact');
                }
            }
        }
    }

}
