<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Site_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
        $this->load->model('Apimodel');
        $this->load->library('data');
    }

    public function index() {
        $data = [];
        $this->page_title = 'Home';
        $this->current_section = "Restaurant Home";
        $this->body_class[] = 'home';
        $home = $this->Site->get_page('home');
        if (!empty($home)) {
            $this->page_meta_keywords=$home->meta_keys;
            $this->page_meta_description=$home->meta_desc;
        }else{
            $this->page_meta_keywords =$this->config->item('company').','.'Online order, Indian Takeaway, South Indian Cuisine,Bridgend';
            $this->page_meta_description = 'Online Order at Exotic Shaad, 72 Nolton Street, Bridgend, CF31 3BP, 10% Discount on Online Order '.$this->config->item('company');
        }

        if ($this->config->item('home_slider') == 'on') {
            $this->template->set_partial('home_slider', 'home/subviews/slider');
        }
        if ($this->config->item('home_weserve') == 'on') {
            $this->template->set_partial('home_weserve', 'home/subviews/weserve');
        }
        if ($this->config->item('home_menucarousel') == 'on') {
            $this->template->set_partial('home_menucarousel', 'home/subviews/menucarousel');
        }
        if ($this->config->item('home_ourfeatures') == 'on') {
            $this->load->helper('security');
            $data['foodDrinks'] = objectToArray($this->Site->get_page(xss_clean('special-foods-and-drinks')));
            $data['professionalChefs'] = objectToArray($this->Site->get_page(xss_clean('professional-chefs')));
            $data['perfectRecipes'] = objectToArray($this->Site->get_page(xss_clean('perfect-recipes')));
            $this->template->set_partial('home_ourfeatures', 'home/subviews/ourfeatures');
        }
        if ($this->config->item('home_testimonials') == 'on') {
            $this->template->set_partial('home_testimonials', 'home/subviews/testimonials');
        }
        //$this->data->clear_home_session();
        $restaurant_status = $this->data->get_rest_status();
        $rest_schedule = $this->data->get_rest_schedule();
        if (!$restaurant_status && !$rest_schedule) {
            $this->data->clear_home_session();
            if ($this->config->item('home_promotime') == 'on') {
                if ($this->data->get_rest_status() == '' || $this->data->get_rest_schedule() == '') {
                    $promotime = $this->Apimodel->get_promotime();
                    if (isset($promotime->status) && isset($promotime->message)) {
                        $this->data->set_api_status($promotime->status);
                        $this->data->set_api_message($promotime->message);
                    }
                    if (!empty($promotime->data)) {
                        $this->data->set_rest_status($promotime->data->restaurant_status);
                        $this->data->set_rest_schedule($promotime->data->rest_schedule);
                        $this->data->set_rest_promotion($promotime->data->rest_promotion);
                        $this->data->set_rest_vouchers($promotime->data->rest_vouchers);
                        $this->data->set_cities($promotime->data->cities);
                        $this->data->set_areas($promotime->data->areas);
                    }
                }
            }
        }
        //debugPrint($data);
        $data['restaurant_status'] = $this->data->get_rest_status();
        $data['rest_schedule'] = $this->data->get_rest_schedule();
        $data['rest_promotion'] = $this->data->get_rest_promotion();
        $data['rest_vouchers'] = $this->data->get_rest_vouchers();
        $this->render_page('home/index', $data);
    }

public function checkrest() {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $this->config->item('api_host') . 'api/is_restaurant_opened/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => array('RestId' => $this->config->item('api_id')),
            CURLOPT_FOLLOWLOCATION => true
        ));
        $output = curl_exec($ch);
        curl_close($ch);
        $this->session->unset_userdata('restaurant_status');
        $this->session->set_userdata('restaurant_status', $output);
        echo $output;
    }

}
