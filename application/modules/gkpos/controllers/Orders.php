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

    public function test() {
        var_dump($this->Gkpos_lib);
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

    public function indexajax($order_id = '') {
        $this->load->model('Orders_Model');
        $offset = 0;
        $data['categories'] = $this->Orders_Model->get_list('gkpos_category', array('status' => 1), array('id', 'title', 'type', 'print_option', 'order', 'content'), null, $offset, 'order', 'ASC');
        $data['showcategory'] = $this->Orders_Model->showcategory();
        $data['current_page'] = "orders";
        if ($order_id != '' || $order_id != null) {
            $data['payments_option'] = $this->Orders_Model->get_payment_options();
            $this->Orders_Model->set_current_orderid($order_id);
            if (!$this->Orders_Model->get_discount($order_id)) {
                $this->Orders_Model->initiate_discount($order_id);
            }
            if (!$this->Orders_Model->get_servicecharge($order_id)) {
                $this->Orders_Model->initiate_service_charge($order_id);
            }
            if (!$this->Orders_Model->get_vat($order_id)) {
                $this->Orders_Model->initiate_vat($order_id);
            }
            $data['currentOrderObj'] = $this->Orders_Model->get_single('gkpos_order', array('id' => $order_id));
            if ($data['currentOrderObj']->order_type = 'delivery' && !$this->Orders_Model->get_deliveryplan($order_id)) {
                $this->Orders_Model->initiate_deliveryplan($order_id);
            }
        }
        $this->load->view('gkpos/orders/ajaxindex', $data, false);
    }

    public function getcategory($offset = 0) {
        $firstCatOrder = $this->input->post('firstCatOrder');
        $lastCatOrder = $this->input->post('lastCatOrder');
        $pageBtn = $this->input->post('pageBtn');
        $limit = $this->config->item('gk_category_line_page');
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
        $limit = $this->config->item('gk_menu_line_page');
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
        $limit = $this->config->item('gk_menu_line_page');
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
        $order_id = (int) $this->input->post('order_id');
        $category = (int) $this->input->post('category');
        $menu = (int) $this->input->post('menu');
        $sel = $this->input->post('sel');
        $quantity = (int) $this->input->post('quantity');
        $extra = $this->input->post('extra');
        $result = $this->Orders_Model->addtocart($order_id, $category, $menu, $sel, $quantity, $extra);
        echo json_encode($result);
    }

    public function loadcart($order_id = null) {
        $data = [];
        $isCartEmty = true;
        $isFoodCartEmpty = true;
        $isNonFoodCartEmpty = true;
        $isDbcEmpty = true;
        $isDbcFoodCartEmpty = true;
        $isDbcNonFoodCartEmpty = true;

        if ($this->input->post('order_id')) {
            $order_id = $this->input->post('order_id');
        }
        if ($order_id != null || $order_id = '') {
            $this->Orders_Model->set_current_orderid($order_id);

            if (!$this->Orders_Model->get_discount($order_id)) {
                $this->Orders_Model->initiate_discount($order_id);
            }
            if (!$this->Orders_Model->get_servicecharge($order_id)) {
                $this->Orders_Model->initiate_service_charge($order_id);
            }
            if (!$this->Orders_Model->get_vat($order_id)) {
                $this->Orders_Model->initiate_vat($order_id);
            }
            $data['currentOrderObj'] = $this->Orders_Model->get_single('gkpos_order', array('id' => $order_id));
            if ($data['currentOrderObj']->order_type = 'delivery' && !$this->Orders_Model->get_deliveryplan($order_id)) {
                $this->Orders_Model->initiate_deliveryplan($order_id);
            }
            //check DBC cart data
            if (!$this->Orders_Model->get_cart_db($order_id)) {
                $cart_db = $this->Orders_Model->get_list_array('gkpos_order_detail', array('order_id' => $order_id));
                if (!empty($cart_db)) {
                    $items = array();
                    foreach ($cart_db as $key => $item) {
                        $items[$item['line']] = $item;
                    }
                    $this->Orders_Model->set_cart_db($order_id, $items);
                }
            }
            $cart_items = $this->Orders_Model->get_cart($order_id);
            $food_cart_items = array();
            $beverage_cart_items = array();
            if (!empty($cart_items)) {
                $isCartEmty = false;
                foreach ($cart_items as $key => $itemObj) {
                    if ($itemObj ['category_type'] == '1') {
                        $food_cart_items[] = $itemObj;
                    } else {
                        $beverage_cart_items [] = $itemObj;
                    }
                }
            }
            $data['isCartEmty'] = $isCartEmty;
            $data['order_id'] = $order_id;
            $data['maxLine'] = $this->get_maxline($order_id);
            $data['foodCart'] = $food_cart_items;
            $data['isFoodCartEmpty'] = $isFoodCartEmpty = empty($food_cart_items) ? true : false;
            $data['nonFoodCart'] = $beverage_cart_items;
            $data['isNonFoodCartEmpty'] = $isNonFoodCartEmpty = empty($beverage_cart_items) ? true : false;
            //Manage existing db cart items 
            $dbc_food_cart_items = array();
            $dbc_beverage_cart_items = array();
            $dbcart_items = $this->Orders_Model->get_cart_db($order_id);
            if (!empty($dbcart_items)) {
                $isDbcEmpty = false;
                foreach ($dbcart_items as $key => $itemObj) {
                    if ($itemObj ['category_type'] == '1') {
                        $dbc_food_cart_items[] = $itemObj;
                    } else {
                        $dbc_beverage_cart_items [] = $itemObj;
                    }
                }
                $data['dbcFoodCart'] = $dbc_food_cart_items;
                $isDbcFoodCartEmpty = empty($dbc_food_cart_items) ? true : false;
                $data['dbcNonFoodCart'] = $dbc_beverage_cart_items;
                $isDbcNonFoodCartEmpty = empty($dbc_beverage_cart_items) ? true : false;
            }
            $data['isDbcEmpty'] = $isDbcEmpty;
            $data['newString'] = $isDbcEmpty && $data['currentOrderObj']->grand_total < 1 ? '' : 'New';
            $data['hasDBCart'] = $isDbcEmpty && $data['currentOrderObj']->grand_total < 1 ? false : true;
            $data['isDbcFoodCartEmpty'] = $isDbcFoodCartEmpty;
            $data['isDbcNonFoodCartEmpty'] = $isDbcNonFoodCartEmpty;
            $data['has_new'] = 'no';
            if ($this->Orders_Model->get_cart_new($order_id)) {
                $data['has_new'] = $this->Orders_Model->get_cart_new($order_id);
            }
        }
        $this->load->view('gkpos/orders/cartajax', $data, false);
    }

    public function get_maxline($order_id) {
        $cart_items = $this->Orders_Model->get_cart($order_id);
        $cart_db = $this->Orders_Model->get_cart_db($order_id);
        $maxLine = 0;
        if (empty($cart_items)) {
            if (empty($cart_db)) {
                $maxLine = $maxLine;
            } else {
                $maxLine = array_reduce($cart_db, function ($a, $b) {
                    return @$a['line'] > $b['line'] ? $a['line'] : $b['line'];
                });
            }
        } else {
            $maxLine = array_reduce($cart_items, function ($a, $b) {
                return @$a['line'] > $b['line'] ? $a['line'] : $b['line'];
            });
        }
        return $maxLine;
    }

    public function updatecart() {
        $line = $this->input->post('line');
        $action = $this->input->post('action');
        $order_id = (int) $this->input->post('order_id');
        $quantity = (int) $this->input->post('quantity');
        if ($order_id && $line && $action) {
            $items = $this->Orders_Model->get_cart($order_id);
            if ($items != null && array_key_exists($line, $items)) {
                $action_method = 'cart_item_' . $action;
                $result = $this->Orders_Model->$action_method($order_id, $line, $quantity);
                echo json_encode($result);
            } else {
                $items_db = array();
                $items_db = $this->Orders_Model->get_cart_db($order_id);
                if ($items_db != null && array_key_exists($line, $items_db)) {
                    $action_method = 'dbcart_item_' . $action;
                    $result = $this->Orders_Model->$action_method($order_id, $line, $quantity);
                    echo json_encode($result);
                }
            }
        }
    }

    public function addservicecharge() {
        $order_id = $this->input->post('order_id');
        $data = $this->prepareData();
        $this->Orders_Model->set_servicecharge($order_id, $data);
        $this->Orders_Model->set_cart_new($order_id, 'yes');
        if ($this->Orders_Model->get_servicecharge($order_id)) {
            echo json_encode(array('success' => true, 'order_id' => $order_id));
        }
    }

    public function adddiscount() {
        $order_id = $this->input->post('order_id');
        $data = $this->prepareData();
        $this->Orders_Model->set_discount($order_id, $data);
        $this->Orders_Model->set_cart_new($order_id, 'yes');
        if ($this->Orders_Model->get_discount($order_id)) {
            echo json_encode(array('success' => true, 'order_id' => $order_id));
        }
    }

    public function save_order() {
        $success = false;
        //get Current order id
        $order_id = $this->input->post('order_id');
        $sent_option = $this->input->post('sent');
        //get current order object 
        $existingOrder = $this->Orders_Model->get_single_array('gkpos_order', array('id' => $order_id));
        // get Dbc cart items update from session and update existing items on the board 
        $cart_db = $this->Orders_Model->get_cart_db($order_id);
        if (!empty($cart_db)) {
            $db_cart = $this->Orders_Model->get_list_array('gkpos_order_detail', array('order_id' => $order_id), array('id', 'line', 'menu_title', 'selection_title', 'quantity'));
            //order the db cart according to line 
            $db_cart_arr = array();
            foreach ($db_cart as $key => $item) {
                $db_cart_arr[$item['line']] = $item;
            }
            $changed = 'no';
            foreach ($cart_db as $line => $item) {
                if ($db_cart_arr[$line]['id'] == $item['id'] && $db_cart_arr[$line]['quantity'] != $item['quantity']) {
                    $changed = 'yes';
                    //get the previous quantity 
                    $pre_qty = $db_cart_arr[$line]['quantity'];
                    //get the current quantity 
                    $current_qty = $item['quantity'];
                    //get the different quantity
                    $new_qty = $current_qty - $pre_qty;
                    $success = $this->db->update('gkpos_order_detail', array('quantity' => $current_qty, 'quantity_new' => $new_qty, 'changed' => $changed, 'last_taken' => date('Y-m-d H:i:s')), array('id' => $item['id'], 'order_id' => $order_id));
                }
                if ($db_cart_arr[$line]['id'] == $item['id'] && $db_cart_arr[$line]['selection_title'] != $item['selection_title']) {
                    $changed = 'yes';
                    $success = $this->db->update('gkpos_order_detail', array('selection_title' => $item['selection_title'], 'changed' => $changed, 'last_taken' => date('Y-m-d H:i:s')), array('id' => $item['id'], 'order_id' => $order_id));
                } else {
                    if ($db_cart_arr[$line]['id'] == $item['id'] && $db_cart_arr[$line]['menu_title'] != $item['menu_title']) {
                        $changed = 'yes';
                        $success = $this->db->update('gkpos_order_detail', array('menu_title' => $item['menu_title'], 'changed' => $changed, 'last_taken' => date('Y-m-d H:i:s')), array('id' => $item['id'], 'order_id' => $order_id));
                    }
                }
                if ($changed == 'no') {
                    $success = $this->db->update('gkpos_order_detail', array('quantity_new' => 'NULL', 'changed' => 'NULL',), array('id' => $item['id'], 'order_id' => $order_id));
                }
            }
        }
        // get current cart items from session and save it into order_detail_table
        $cart_data = $this->Orders_Model->get_cart($order_id);
        if (!empty($cart_data)) {

            foreach ($cart_data as $item) {
                //$order_total+=$item['price'] * $item['quantity'];
                $item = $this->prepareGkposData($item);
                $item['changed'] = 'yes';
                $item['first_taken'] = date('Y-m-d H:i:s');
                $id = $this->Orders_Model->save_cart($item);
                $changed = $id ? 'yes' : 'no';
                $success = $id ? true : false;
            }
        }
        // get discount from session and save it into order discount table 
        $discount_data = $this->Orders_Model->get_discount($order_id);
        if (!empty($discount_data)) {
            $discount_amount = $this->Orders_Model->get_discount_amount($order_id);
            $discount_data['amount'] = $discount_amount > 0 ? $discount_amount : '0';
            $discount_data_exists = $this->Orders_Model->exists('gkpos_order_discount', 'order_id', $order_id);
            if ($discount_data_exists) {
                $discount_data['amount'] = $this->Orders_Model->get_discount_amount($order_id);
                unset($discount_data['order_id']);
                $this->Orders_Model->save_discount($discount_data, $order_id);
            } else {
                $this->Orders_Model->save_discount($discount_data);
            }
        }
        // get vat from session and save it into order vat table 
        $vat_data = $this->Orders_Model->get_vat($order_id);
        if (!empty($vat_data)) {
            $vat_data['amount'] = $this->Orders_Model->get_vat_amount($order_id);
            $vat_data_exists = $this->Orders_Model->exists('gkpos_order_vat', 'order_id', $order_id);
            if ($vat_data_exists) {
                unset($vat_data['order_id']);
                $this->Orders_Model->save_vat($vat_data, $order_id);
            } else {
                $this->Orders_Model->save_vat($vat_data);
            }
        }

        // get service charge from session and save it into order service charge table 
        $servicecharge_data = $this->Orders_Model->get_servicecharge($order_id);
        if (!empty($servicecharge_data)) {
            $servicecharge_data['amount'] = $this->Orders_Model->get_servicecharge_amount($order_id);
            $servicecharge_data_exists = $this->Orders_Model->exists('gkpos_order_servicecharge', 'order_id', $order_id);
            if ($servicecharge_data_exists) {
                unset($servicecharge_data['order_id']);
                $this->Orders_Model->save_servicecharge($servicecharge_data, $order_id);
            } else {
                $this->Orders_Model->save_servicecharge($servicecharge_data);
            }
        }
        // get promo from session 
        $is_printed = 1;
        $has_print = 0;
        if ($changed == 'yes') {
            $is_printed = 0;
            $has_print = 1;
        }
        if ($this->db->update('gkpos_order', array('status' => 2, 'order_total' => $this->Orders_Model->get_subtotal($order_id), 'grand_total' => $this->Orders_Model->get_total($order_id), 'delivery_charge' => $this->Orders_Model->get_deliveryplan_amount($order_id), 'is_printed' => $is_printed, 'has_print' => $has_print, 'sent_option' => $sent_option), array('id' => $order_id))) {
            $this->Orders_Model->clear_all($order_id);
            echo json_encode(array('success' => $success, 'order_id' => $order_id));
        } else {
            echo json_encode(array('success' => $success, 'order_id' => $order_id));
        }
    }

    public function addpayment() {
        $order_id = $this->input->post('order_id');
        $method = $this->input->post('method');
        $amount = $this->input->post('amount');
        if ($method && $amount) {
            $payments = $this->Orders_Model->get_payments($order_id);
            if (isset($payments[$method])) {
                $payments[$method]['amount'] = bcadd($payments[$method]['amount'], $amount, PRECISION);
            } else {
                $payment = array(
                    'method' => $method,
                    'amount' => to_currency_no_money($amount)
                );
                $payments [$method] = $payment;
            }
            $this->Orders_Model->set_payments($order_id, $payments);
            echo json_encode(array('success' => true, 'payments' => $this->Orders_Model->get_payments($order_id), 'dueAmount' => $this->Orders_Model->get_amount_due($order_id)));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    public function deletepayment() {
        $order_id = $this->input->post('order_id');
        $method = $this->input->post('method');
        if ($this->Orders_Model->delete_payment($order_id, $method)) {
            echo json_encode(array('success' => true, 'payments' => $this->Orders_Model->get_payments($order_id), 'dueAmount' => $this->Orders_Model->get_amount_due($order_id)));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    public function get_due_amount() {
        $order_id = $this->input->post('order_id');
        echo json_encode(array('success' => true, 'dueAmount' => $this->Orders_Model->get_amount_due($order_id)));
    }

    public function payandclose() {
        $order_id = $this->input->post('order_id');
        $payments = $this->Orders_Model->get_payments($order_id);
        if (!empty($payments)) {
            foreach ($payments as $payment) {
                $sales_payments_data = array(
                    'order_id' => $order_id,
                    'method' => $payment['method'],
                    'amount' => $payment['amount']
                );
                $this->db->insert('gkpos_order_payment', $sales_payments_data);
            }
            $dueAmount = $this->Orders_Model->get_amount_due($order_id);
            if ($this->db->update('gkpos_order', array('status' => 4, 'paid_status' => 1, 'change_due' => $dueAmount), array('id' => $order_id))) {
                $currentOrderObj = $this->Orders_Model->get_single('gkpos_order', array('id' => $order_id));
                if ($currentOrderObj->order_type == 'table') {
                    $this->db->update('gkpos_table', array('guest_quantity' => '', 'is_vacant' => 1), array('id' => $currentOrderObj->table_id, 'table_number' => $currentOrderObj->table_number));
                }
                $this->Orders_Model->clear_all($order_id);
                echo json_encode(array('success' => true, 'message' => 'paid and close successfully'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'There is an internal problem in processing. Please Try again later'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'You have not yet made any payment'));
        }
    }

}
