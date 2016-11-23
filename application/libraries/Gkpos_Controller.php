<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gkpos_Controller extends MY_Controller {

    /**
     * Logged in user 
     * 
     * @var integer
     */
    protected $user_id;

    /**
     * Logged in user 
     * 
     * @var string
     */
    public $admin_info;

    /**
     * Site Title
     * 
     * @var string
     */
    public $site_title = '';

    /**
     * Page Title
     * 
     * @var string
     */
    public $page_title = '';

    /**
     * Page Meta Keywords
     * 
     * @var string
     */
    public $page_meta_keywords = '';

    /**
     * Page Meta Description
     * 
     * @var string
     */
    public $page_meta_description = '';

    /**
     * JS Calls on DOM Ready
     * 
     * @var array 
     */
    public $assets_css = array(
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'plugins/keyboard/css/jsKeyboard.css',
        'plugins/keyboard/css/main.css',
        'plugins/numpad/jquery.numpad.css',
        'plugins/colorbox/colorbox.css',
        'css/style.css',
    );
    public $assets_js = array(
        'js/jquery.js',
        'js/bootstrap.min.js',
        'plugins/keyboard/js/jsKeyboard.js',
        'plugins/keyboard/js/main.js',
        'plugins/numpad/jquery.numpad.js',
        'js/phpjsdate.js',
        'plugins/colorbox/jquery.colorbox-min.js',
        'js/app.js',
    );
    public $js_domready = array();

    /**
     * JS Calls on window load
     * 
     * @var array 
     */
    public $js_windowload = array();

    /**
     * Body classes
     * 
     * @var array 
     */
    public $body_class = array();

    /**
     * Current section
     * 
     * @var string
     */
    public $current_section = '';

    /**
     * Class Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->template->set_layout('gkpos');
    }

    /**
     * Prepare BASE Javascript
     */
    private function prepare_base_javascript() {
        $str = "<script type=\"text/javascript\">\n";

        if (count($this->js_domready) > 0) {
            $str.= "$(document).ready(function() {\n";
            $str.= implode("\n", $this->js_domready) . "\n";
            $str.= "});\n";
        }

        if (count($this->js_windowload) > 0) {
            $str.= "$(window).load(function() {\n";
            $str.= implode("\n", $this->js_windowload) . "\n";
            $str.= "});\n";
        }

        $str.= "</script>\n";
        $this->template->append_metadata($str);
    }

    /**
     * Set CSS Meta
     */
    private function set_styles() {
        if (count($this->assets_css) > 0) {
            foreach ($this->assets_css as $asset)
                $this->template->append_metadata('<link rel="stylesheet" type="text/css" href="' . ASSETS_GKPOS_PATH . $asset . '" media="screen" />');
        }
        $this->template->append_metadata('<!--[if IE 6]><link rel="stylesheet" type="text/css" href="' . $this->config->item('base_url') . 'assets/gkpos/css/cross_browser/ie6.css" media="screen" /><![endif]-->');
        $this->template->append_metadata('<!--[if IE 7]><link rel="stylesheet" type="text/css" href="' . $this->config->item('base_url') . 'assets/gkpos/css/cross_browser/ie7.css" media="screen" /><![endif]-->');
        $this->template->append_metadata('<!--[if IE 8]><link rel="stylesheet" type="text/css" href="' . $this->config->item('base_url') . 'assets/gkpos/css/cross_browser/ie8.css" media="screen" /><![endif]-->');
        $this->template->append_metadata('<!--[if IE 9]><link rel="stylesheet" type="text/css" href="' . $this->config->item('base_url') . 'assets/gkpos/css/cross_browser/ie9.css" media="screen" /><![endif]-->');
    }

    /**
     * Set Javascript Meta
     */
    private function set_javascript() {
        if (count($this->assets_js) > 0) {
            foreach ($this->assets_js as $asset)
                if (stristr($asset, 'http') === FALSE)
                    $this->template->append_metadata('<script type="text/javascript" src="' . ASSETS_GKPOS_PATH . $asset . '"></script>');
                else
                    $this->template->append_metadata('<script type="text/javascript" src="' . $asset . '"></script>');
        }
        $this->template->append_metadata('<!--[if lt IE 9]><script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->');
    }

    /**
     * Renders page
     */
    public function render_page($page, $data = array()) {
        // Renders the whole page
        $this->template
                ->set_metadata('keywords', $this->page_meta_keywords)
                ->set_metadata('description', $this->page_meta_description)
                ->set_metadata('canonical', site_url($this->uri->uri_string()), 'link')
                ->title($this->page_title, $this->site_title);
        $this->set_styles();
        $this->set_javascript();
        $this->prepare_base_javascript();
        // Set global template vars
        $this->template
                ->set('admin', ($this->session->userdata('gkpos_username')) ? $this->session->userdata('gkpos_username') : $this->lang->line('gkpos_undefined'))
                ->set('current_section', $this->current_section)
                ->set('body_class', implode(' ', $this->body_class));
        $this->template
                ->set_partial('flash_messages', 'gkpos/partials/flash_messages')
                ->set_partial('header', 'gkpos/partials/header')
                ->set_partial('left_sidebar', 'gkpos/partials/left_sidebar')
                ->set_partial('right_sidebar', 'gkpos/partials/right_sidebar')
                ->set_partial('right_sidebar_order', 'gkpos/partials/right_sidebar_order')
                ->set_partial('footer', 'gkpos/partials/footer');
        // Renders the main layout
        $this->template->build($page, $data);
    }

}
