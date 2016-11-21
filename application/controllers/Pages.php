<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Site_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
        $this->load->helper('security');
    }

    public function index($slug = '') {
        if ($slug && $slug != '') {
            $post = $this->Site->get_page(xss_clean($slug));
            $this->page_title = isset($post->title) ? $post->title : '';
            $this->current_section = isset($post->title) ? $post->title : '';
            $this->page_meta_keywords = isset($post->meta_keys) ? $post->meta_keys : '';
            $this->page_meta_description = isset($post->meta_desc) ? $post->meta_desc : '';
            $this->render_page('pages/single', $post);
        } else {
            $this->page_title = $this->lang->line('common_page');
            $this->current_section = $this->lang->line('common_page');
            $condition = '';
            $offset = intval($this->uri->segment(3));
            $offset = $offset ? $offset : 0;
            $result = $this->Site->get_paged_list('page', array('is_published' => 1), $url = 'home/index', $segment = 3, $offset, 'id', 'DESC');
            $data['posts'] = $result['rows'];
            $data['pagination'] = $result['pagination'];
            $data['count'] = $offset;
            $this->render_page('pages/list', $data);
        }
    }

    public function category($slug = '') {
        if ($slug && $slug != '') {
            $this->render_page('blog/single_cat_wise_list', $data);
        } else {
            $this->render_page('blog/cat_wise_list', $data);
        }
    }

}
