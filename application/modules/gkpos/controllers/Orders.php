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

    public function index($orderId = '') {
        $this->load->model('Orders_Model');
        $this->page_title = 'Gkpos | order';
        $this->current_section = "menu order";
        $this->body_class[] = "pos-menu selection order";
        $offset = 0;
        $data['categories'] = $this->Orders_Model->get_list('gkpos_category', array('status' => 1), array('id', 'title', 'type', 'print_option', 'order', 'content'), null, $offset, 'order', 'ASC');
        $data['showcategory'] = $this->Orders_Model->showcategory();
        $data['current_page'] = "orders";
        $this->render_page('gkpos/orders/index', $data);
    }

    public function indexajax($orderId = '') {
        $this->load->model('Orders_Model');
        $this->page_title = 'Gkpos | order';
        $this->current_section = "menu order";
        $this->body_class[] = "pos-menu selection order";
        $offset = 0;
        $data['categories'] = $this->Orders_Model->get_list('gkpos_category', array('status' => 1), array('id', 'title', 'type', 'print_option', 'order', 'content'), null, $offset, 'order', 'ASC');
        $data['showcategory'] = $this->Orders_Model->showcategory();
        $data['current_page'] = "orders";
        $this->load->view('gkpos/orders/ajaxindex', $data, false);
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
        //Posted info 
        $order_id = (int) $this->input->post('orderId');
        $category = (int) $this->input->post('category');
        $menu = (int) $this->input->post('menu');
        $sel = $this->input->post('sel');
        $quantity = (int) $this->input->post('quantity');
        //get item info 
        $item_info = array();
        if ($sel == 'no') {
            $item_info = $this->Orders_Model->get_cart_item($category, $menu);
        } else {
            $sel = (int) $sel;
            $item_info = $this->Orders_Model->get_cart_item($category, $menu, $sel);
        }

        //get exsting cart of this order 
        $items = $this->Orders_Model->get_cart($order_id);
        //Add item to cart 
        $maxkey = 0;
        $itemalreadyinsale = FALSE;
        $insertkey = 0;
        $updatekey = 0;
        $plus='no';
        // if item already in the cart 
        if (!empty($items)) {
            foreach ($items as $item) {
                if ($maxkey <= $item['line']) {
                    $maxkey = $item['line'];
                }
                //check for selection first then menu
                if (isset($item_info->selection) && (int) $item_info->selection > 0) {
                    if (isset($item['selection']) && $item_info->selection == $item['selection']) {
                        $itemalreadyinsale = TRUE;
                        $updatekey = $item['line'];
                        $quantity = $items[$updatekey]['quantity'] + 1;
                        $plus='yes';
                    }
                } else {
                    if ($item_info->menu == $item['menu']) {
                        $itemalreadyinsale = TRUE;
                        $updatekey = $item['line'];
                        $quantity = $items[$updatekey]['quantity'] + 1;
                        $plus='yes';
                    }
                }
            }
        }

        if (false == $itemalreadyinsale) {
            $insertkey = $maxkey + 1;
            $order_type_obj = $this->Orders_Model->get_single('gkpos_order', array('id' => $order_id), array('order_type'));
            $order_type = $order_type_obj->order_type;
            $price = 0;
            if ($order_type == 'table') {
                $price = $item_info->base_price > 0 ? $item_info->base_price : $item_info->in_price;
            }
            if ($order_type == 'collection' || $order_type == 'waiting') {
                $price = $item_info->in_price > 0 ? $item_info->in_price : $item_info->base_price;
            }
            if ($order_type == 'delivery') {
                $price = $item_info->out_price > 0 ? $item_info->out_price : $item_info->base_price;
            }
            $item = array(
                'line' => $insertkey,
                'order_id' => $order_id,
                'category' => $item_info->category,
                'category_title' => $item_info->category_title,
                'category_print_option' => $item_info->category_print_option,
                'category_type' => $item_info->category_type,
                'menu' => $item_info->menu,
                'menu_title' => $item_info->menu_title,
                'selection' => isset($item_info->selection) ? $item_info->selection : NULL,
                'selection_title' => isset($item_info->selection_title) ? $item_info->selection_title : NULL,
                'quantity' => $quantity,
                'price' => $price,
                'plus' => $plus
            );
            $items[$insertkey] = $item;
            $maxkey++;
        } else {
            $insertkey = $maxkey;
            $line = &$items[$updatekey];
            $line['quantity'] = $quantity;
        }
        $this->Orders_Model->set_cart($order_id, $items);
        echo $this->ajaxcart($order_id);
    }

    public function ajaxcart($order_id = null) {
        $data = [];
        if ($order_id != null || $order_id = '') {
            $cart_items = $this->Orders_Model->get_cart($order_id);
            $max_line = 0;
            $food_cart_items = array();
            $beverage_cart_items = array();
            if (!empty($cart_items)) {
                $max_line = array_reduce($cart_items, function ($a, $b) {
                    return @$a['line'] > $b['line'] ? $a['line'] : $b['line'];
                });
                foreach ($cart_items as $key => $itemObj) {
                    if ($itemObj ['category_type'] == '1') {
                        $food_cart_items[] = $itemObj;
                    } else {
                        $beverage_cart_items [] = $itemObj;
                    }
                }
            }
            $data['maxLine'] = $max_line;
            $data['foodCart'] = $food_cart_items;
            $data['nonFoodCart'] = $beverage_cart_items;
        }
        return $this->load->view('gkpos/orders/cartajax', $data, false);
    }

    public function manageThisOrder() {
        $order_info_str = $this->input->post('id');
        $order_info_arr = explode('_', $order_info_str);
        $order_type = $order_info_arr[0];
        $order_id = $order_info_arr[1];
        $data = [];
        $data['order'] = $order = $this->Orders_Model->get_single('gkpos_order', array('id' => $order_id, 'order_type' => $order_type));
        $data['detail_counter'] = $detail_counter = $this->Orders_Model->count_rows('gkpos_order_detail', array('order_id' => $order_id));
        $this->load->view('gkpos/orders/mangeThisOrder', $data, false);
    }

    public function manageAction() {
        $order_info_str = $this->input->post('id');
        $order_info_arr = explode('_', $order_info_str);
        $order_type = $order_info_arr[0];
        $order_id = $order_info_arr[1];
        $action = $this->input->post('action');
        $this->$action($order_id, $order_type, $order_info_str);
    }

    public function add_to_cart($order_id, $order_type, $dialog, $data = array()) {
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Create Order', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/orders/indexajax/' . $order_id))));
    }

    public function edit_cart($order_id, $order_type, $dialog, $data = array()) {
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Edit Order', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/orders/indexajax/' . $order_id))));
    }

    public function delete_order($order_id, $order_type, $dialog, $data = array()) {
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Mainboard', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/indexajax'))));
    }

    public function vacant_table($order_id, $order_type, $dialog, $data = array()) {
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Mainboard', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/indexajax'))));
    }

    public function send_kitchen($order_id, $order_type, $dialog, $data = array()) {
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Mainboard', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/indexajax'))));
    }

    public function print_guest_bill($order_id, $order_type, $dialog, $data = array()) {
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Mainboard', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/indexajax'))));
    }

}
