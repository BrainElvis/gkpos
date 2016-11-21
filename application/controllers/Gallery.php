<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Site_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
        $this->load->model('Gallery_Model');
    }

    public function index() {
        $this->page_title = 'Gallery';
        $this->current_section = $this->lang->line('photogallery_heading');
        $this->page_meta_keywords =$this->config->item('company').',' .'Online,order, Restaurant,Gallery';
        $this->page_meta_description = 'Online Order at Restaurant '.$this->config->item('company');
        $this->body_class[] = 'home';
       $orderonline= $this->Site->get_page('gallery');
        if (!empty($orderonline)) {
            $this->page_meta_keywords=$orderonline->meta_keys;
            $this->page_meta_description=$orderonline->meta_desc;
        }else{
            $this->page_meta_keywords =$this->config->item('company').','.'Online order, Indian Takeaway, South Indian Cuisine,Bridgend';
            $this->page_meta_description = 'Online Order at Exotic Shaad, 72 Nolton Street, Bridgend, CF31 3BP, 10% Discount on Online Order '.$this->config->item('company');
        }
        $data['gallery_images'] = $this->Gallery_Model->get_by(array('is_published' => 1));
        $this->render_page('gallery/index', $data);
    }

}
