<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Gkpos_Controller {

    function __construct() {
        parent::__construct();
        $this->site_title = $this->config->item('company');
        $this->load->model('Entry_Model');
        if (!$this->Entry_Model->is_logged_in()) {
            redirect('gkpos/entry');
        }
        $this->load->helper('gkpos');
        $this->load->model('Orders_Model');
    }

    public function index() {
        $this->load->model('Orders_Model');
        $this->page_title = 'Gkpos | order';
        $this->current_section = "menu order";
        $this->body_class[] = "pos-menu selection order";
        $offset = 0;
        $data['categories'] = $this->Orders_Model->get_list('gkpos_category', array('status' => 1), array('id', 'title', 'type', 'print_option', 'order', 'content'), null, $offset, 'order', 'ASC');
        $data['showcategory'] = $this->Orders_Model->showcategory();
        $this->render_page('gkpos/orders/index', $data);
    }

    public function getcategory($offset = 0) {
        $firstCatOrder = $this->input->post('firstCatOrder');
        $lastCatOrder = $this->input->post('lastCatOrder');
        $pageBtn = $this->input->post('pageBtn');
        $limit = $this->config->item('category_line_page');
        $maxmin = $this->Orders_Model->get_min_max('gkpos_category', 'order', array('status' => 1));
        $result = array();
        if ($pageBtn == "nextBtn" && $lastCatOrder <= $maxmin['max']) {
            $result = $this->Orders_Model->get_list('gkpos_category', array('status' => 1), array('id', 'title', 'type', 'print_option', 'order', 'content'), $limit, $lastCatOrder, 'order', 'ASC');
        } else if ($pageBtn == "prevBtn" && $firstCatOrder >= $maxmin['min'] && $firstCatOrder > $limit + 1) {
            $result = $this->Orders_Model->get_list('gkpos_category', array('status' => 1), array('id', 'title', 'type', 'print_option', 'order', 'content'), $limit, $firstCatOrder - ($limit + 1), 'order', 'ASC');
        } else {
            $result = $this->Orders_Model->get_list('gkpos_category', array('status' => 1), array('id', 'title', 'type', 'print_option', 'order', 'content'), $limit, 0, 'order', 'ASC');
        }
        if (!empty($result)) {
            echo json_encode(array('status' => true, 'categories' => $result));
        } else {
            echo json_encode(array('status' => false, 'categories' => $result));
        }
    }

    public function getmenuorder() {
        $category = $this->input->post('category');
        $menuFirstOrder = $this->input->post('menuFirstOrder');
        $menuLastOrder = $this->input->post('menuLastOrder');
        $pageBtn = $this->input->post('pageBtn');
        $menuNextBtnCounter = $this->input->post('menuNextBtnCounter');
        $menuPrevBtnCounter = $this->input->post('menuPrevBtnCounter');

        $maxmin = $this->Orders_Model->get_min_max('gkpos_menu', 'order', array('status' => 1));
        $limit = $this->config->item('menu_line_page');
        $offset = 0;
        if ($pageBtn == "menuNextBtn" && $menuLastOrder <= $maxmin['max']) {
            $offset = $limit * (int) $menuNextBtnCounter;
            $menus_order = $this->Orders_Model->get_menulist_order_by_cat($category, $offset, $limit);
        } else if ($pageBtn == "menuPrevBtn" && $menuFirstOrder >= $maxmin['min'] && $menuFirstOrder > $limit + 1) {
            if ($menuPrevBtnCounter > 0) {
                $offset = ($limit * $menuPrevBtnCounter) - $limit;
            } else {
                $limit - $limit;
            }
            $menus_order = $this->Orders_Model->get_menulist_order_by_cat($category, $offset, $limit);
        } else {
            $menus_order = $this->Orders_Model->get_menulist_order_by_cat($category, $offset, $limit);
        }


        if (!empty($menus_order)) {
            echo json_encode(array('status' => true, 'menus' => $menus_order, 'postdata' => $_POST));
        } else {
            echo json_encode(array('status' => false, 'menus' => $menus_order, 'postdata' => $offset));
        }
    }

    public function get_menus_by_category() {
        $category = $this->input->post('category');
        $menuFirstOrder = $this->input->post('menuFirstOrder');
        $menuLastOrder = $this->input->post('menuLastOrder');
        $pageBtn = $this->input->post('pageBtn');
        $menuNextBtnCounter = $this->input->post('menuNextBtnCounter');
        $menuPrevBtnCounter = $this->input->post('menuPrevBtnCounter');
        $maxmin = $this->Orders_Model->get_min_max('gkpos_menu', 'order', array('status' => 1));
        $limit = $this->config->item('menu_line_page');
        $offset = 0;
        if ($pageBtn == "menuNextBtn" && $menuLastOrder <= $maxmin['max']) {
            $offset = $limit * (int) $menuNextBtnCounter;
            $menus_order = $this->Orders_Model->get_menulist_by_cat($category, $offset, $limit);
        } else if ($pageBtn == "menuPrevBtn" && $menuFirstOrder >= $maxmin['min'] && $menuLastOrder > $limit + 1) {
            if ($menuPrevBtnCounter > 0) {
                $offset = ($limit * $menuPrevBtnCounter) - $limit;
            } else {
                $limit - $limit;
            }

            $menus_order = $this->Orders_Model->get_menulist_by_cat($category, $offset, $limit);
        } else {
            $menus_order = $this->Orders_Model->get_menulist_by_cat($category, $offset, $limit);
        }
        if (!empty($menus_order)) {
            echo json_encode(array('status' => true, 'menus' => $menus_order));
        } else {
            echo json_encode(array('status' => false, 'menus' => $menus_order));
        }
    }

    public function getmenuselection() {
        $category = $this->input->post('category');
        $menu = $this->input->post('menu');
        $selections = $this->Orders_Model->getmenuselection($category, $menu);
        $selCounter = count($selections);
        if (!empty($selections)) {
            echo json_encode(array('status' => true, 'selCounter' => $selCounter, 'selections' => $selections));
        } else {
            echo json_encode(array('status' => false, 'selCounter' => 0, 'selections' => array()));
        }
    }

    public function addtocart() {
        
    }

}
