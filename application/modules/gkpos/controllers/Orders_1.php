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
        //Posted info 
        $order_id = (int) $this->input->post('order_id');
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
        $plus = 'no';
        // if item already in the cart 
        if (!empty($items)) {
            foreach ($items as $key => $item) {
                if ($maxkey <= $item['line']) {
                    $maxkey = $item['line'];
                }
                if (isset($item['plus'])) {
                    unset($item['plus']);
                }
                $items[$key] = $item;
                //$items[$item['line']] = $item;
                //check for selection first then menu
                if (isset($item_info->selection) && (int) $item_info->selection > 0) {
                    if (isset($item['selection']) && $item_info->selection == $item['selection']) {
                        $itemalreadyinsale = TRUE;
                        $updatekey = $item['line'];
                        $quantity = $items[$updatekey]['quantity'] + 1;
                        $plus = 'yes';
                    }
                } else {
                    if ($item_info->menu == $item['menu']) {
                        $itemalreadyinsale = TRUE;
                        $updatekey = $item['line'];
                        $quantity = $items[$updatekey]['quantity'] + 1;
                        $plus = 'yes';
                    }
                }
            }
        }
        $this->Orders_Model->set_cart($order_id, $items);
        if (false == $itemalreadyinsale) {
            $plus = 'yes';
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
            //$insertkey = $line['line'];
            $line['quantity'] = $quantity;
            $line['plus'] = $plus;
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
            $data['order_id'] = $order_id;
            $data['maxLine'] = $max_line;
            $data['foodCart'] = $food_cart_items;
            $data['nonFoodCart'] = $beverage_cart_items;
        }
        return $this->load->view('gkpos/orders/cartajax', $data, false);
    }

    public function loadcart($order_id = null) {
        $data = [];
        if ($this->input->post('order_id')) {
            $order_id = $this->input->post('order_id');
        }
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
            $data['order_id'] = $order_id;
            $data['maxLine'] = $max_line;
            $data['foodCart'] = $food_cart_items;
            $data['nonFoodCart'] = $beverage_cart_items;
        }
        return $this->load->view('gkpos/orders/cartajax', $data, false);
    }

    public function change_quantity() {
        $data = array();
        $line = (int) $this->input->post('line');
        $action = $this->input->post('action');
        $order_id = (int) $this->input->post('order_id');
        if ($order_id != null || $order_id = '') {
            $items = $this->Orders_Model->get_cart($order_id);
            foreach ($items as $key => $item) {
                if ($item['line'] == $line) {
                    if ($action == 'minus') {
                        if ($item['quantity'] >= 2) {
                            $item['quantity'] = $item['quantity'] - 1;
                        } else {
                            unset($items[$key]);
                            continue;
                        }
                    } if ($action == 'plus') {
                        $item['quantity'] = $item['quantity'] + 1;
                    }
                }
                $items[$key] = $item;
            }
            $this->Orders_Model->set_cart($order_id, $items);
            $cart_items = $this->Orders_Model->get_cart($order_id);
            $food_cart_items = array();
            $beverage_cart_items = array();
            $data['maxLine'] = $max_line = array_reduce($cart_items, function ($a, $b) {
                return @$a['line'] > $b['line'] ? $a['line'] : $b['line'];
            });
            foreach ($cart_items as $key => $itemObj) {
                if ($itemObj ['category_type'] == '1') {
                    $food_cart_items[] = $itemObj;
                } else {
                    $beverage_cart_items [] = $itemObj;
                }
            }
            $data['changeLine'] = $line;
            $data['order_id'] = $order_id;
            $data['foodCart'] = $food_cart_items;
            $data['nonFoodCart'] = $beverage_cart_items;
        }
        $this->load->view('gkpos/orders/cartajax', $data, false);
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

    public function add_to_cart($order_id, $order_type, $dialog = false, $data = array()) {
        if ($order_type == 'delivery') {
            $deliveryplan = $this->Orders_Model->get_deliveryplan($order_id);
            if (empty($deliveryplan)) {
                $order = $this->Orders_Model->get_single('gkpos_order', array('id' => $order_id, 'order_type' => $order_type), array('postcode'));
                $postcode = explode(' ', $order->postcode);
                $initial_code = strtoupper($postcode[0]);
                $deliveryPlan = $this->Orders_Model->get_single_array('gkpos_deliveryplan', array('status' => 1, 'initial_code' => $initial_code), array('id', 'is_free', 'delivery_charge', 'min_order'));
                $this->Orders_Model->set_deliveryplan($order_id, $deliveryPlan);
            }
        }
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Create Order', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/orders/indexajax/' . $order_id))));
    }

    public function edit_cart($order_id, $order_type, $dialog = false, $data = array()) {
        $cart_data = $this->Orders_Model->get_list_array('gkpos_order_detail', array('order_id' => $order_id));
        $order = $this->Orders_Model->get_single('gkpos_order', array('id' => $order_id, 'order_type' => $order_type));
        $delivery_plan = array();
        if ($order_type == 'delivery') {
            $delivery_plan = $this->Orders_Model->get_deliveryplan($order_id);
            if (empty($delivery_plan)) {
                $postcode = explode(' ', $order->postcode);
                $initial_code = strtoupper($postcode[0]);
                $deliveryPlan = $this->Orders_Model->get_single_array('gkpos_deliveryplan', array('status' => 1, 'initial_code' => $initial_code), array('id', 'is_free', 'delivery_charge', 'min_order'));
                $this->Orders_Model->set_deliveryplan($order_id, $deliveryPlan);
            }
        }
        $this->Orders_Model->set_db_cart($order_id, $cart_data);
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Edit Order', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/orders/indexajax/' . $order_id))));
    }

    public function delete_order($order_id, $order_type, $dialog = false, $data = array()) {
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Mainboard', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/indexajax'))));
    }

    public function vacant_table($order_id, $order_type, $dialog = false, $data = array()) {
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Mainboard', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/indexajax'))));
    }

    public function send_kitchen($order_id, $order_type, $dialog = false, $data = array()) {
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Mainboard', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/indexajax'))));
    }

    public function print_guest_bill($order_id, $order_type, $dialog = false, $data = array()) {
        echo json_encode(array('success' => true, 'data' => array('id' => $order_id, 'order_type' => $order_type, 'info' => 'Mainboard', "dialog" => "dialog_" . $dialog, 'url' => site_url('gkpos/indexajax'))));
    }

    public function sendcart() {
        $order_id = $this->input->post('order_id');
        $cart_data = $this->Orders_Model->get_cart($order_id);
        $existingOrder = $this->Orders_Model->get_single_array('gkpos_order', array('id' => $order_id));
        $deliveryPlan = $this->Orders_Model->get_deliveryplan($order_id);
        $serviceCharge = $this->Orders_Model->get_servicecharge($order_id);
        $discountObj = $this->Orders_Model->get_discount($order_id);
        $order_total = 0;
        $grand_total = 0;
        $success = false;
        //Manage Item and Order Total 
        if (!empty($cart_data)) {
            foreach ($cart_data as $item) {
                $order_total+=$item['price'] * $item['quantity'];
                if (!isset($item['id'])) {
                    $item = $this->prepareGkposData($item);
                    $id = $this->Orders_Model->save_cart($item);
                    $success = $id ? true : false;
                } else {
                    $exiting = $this->Orders_Model->get_single('gkpos_order_detail', array('id' => $item['id']));
                    if ($exiting->quantity != $item['quantity']) {
                        $success = $this->db->update('gkpos_order_detail', array('quantity' => $item['quantity']), array('id' => $item['id']));
                    }
                }
            }

            //manage vat 
            $vat = 0;
            if (($this->config->item('gk_vat_reg') != '' || $this->config->item('gk_vat_reg') != null) && $order_total > 0) {
                if ($this->config->item('gk_vat_included') == 'no') {
                    $order_vat = ($order_total * $this->config->item('gk_vat_percent')) / 100;
                    $vat = ($existingOrder['vat'] != '' || $existingOrder['vat'] != null) && $existingOrder['vat'] > 0 ? $existingOrder['vat'] + $order_vat : $order_vat;
                    $grand_total += $vat;
                }
            }

            //manage discount 
            $discount = 0;
            if (!empty($discountObj)) {
                $order_discount = $discountObj['discount'];
                $discount = ($existingOrder['discount'] != '' || $existingOrder['discount'] != null) && $existingOrder['discount'] > 0 ? $existingOrder['discount'] + $order_discount : $order_discount;
                $grand_total -= $discount;
            } else {
                if ((int) $this->config->item('gk_discount_percent') > 0 && $this->config->item('gk_discount_applied') == 'yes') {
                    $order_discount = $this->config->item('gk_discount_percent');
                    $order_discount = ($order_discount * $order_total) / 100;
                    $discount = ($existingOrder['discount'] != '' || $existingOrder['discount'] != null) && $existingOrder['discount'] > 0 ? $existingOrder['discount'] + $order_discount : $order_discount;
                    $grand_total-= $discount;
                }
            }

            //manage service charge 
            $service_charge = 0;
            if (intval($existingOrder['service_charge']) > 0) {
                $service_charge = $existingOrder['service_charge'];
                if (!empty($serviceCharge)) {
                    $order_service_charge = $serviceCharge['service_charge'];
                    $service_charge += $order_service_charge;
                }
            } else {
                if (!empty($serviceCharge)) {
                    $order_service_charge = $serviceCharge['service_charge'];
                    $service_charge = $order_service_charge;
                }
            }
            $grand_total += $service_charge;


            //Manage delivery plan 
            $delivery_charge = 0;
            if (intval($existingOrder['delivery_charge']) > 0) {
                $delivery_charge = $existingOrder['delivery_charge'];
                $grand_total += $delivery_charge;
            } else {
                if (!empty($deliveryPlan)) {
                    $delivery_charge = is_object($deliveryPlan) ? $deliveryPlan->delivery_charge : $deliveryPlan['delivery_charge'];
                    $grand_total += $delivery_charge;
                }
            }

            //Accumulate  order item total 
            $order_total +=!empty($existingOrder) ? $existingOrder['order_total'] : 0;
            //Assign item order total to grand total 
            $grand_total+=$order_total;
            //update order and reset order carts 
            if ($this->db->update('gkpos_order', array('order_total' => $order_total, 'vat' => $vat, 'grand_total' => $grand_total, 'delivery_charge' => $delivery_charge, 'discount' => $discount, 'service_charge' => $service_charge), array('id' => $order_id))) {
                if ($this->Orders_Model->get_deliveryplan($order_id)) {
                    $this->Orders_Model->clear_deliveryplan($order_id);
                }
                if ($this->Orders_Model->get_cart($order_id)) {
                    $this->Orders_Model->clear_cart($order_id);
                }
                if ($this->Orders_Model->get_servicecharge($order_id)) {
                    $this->Orders_Model->clear_servicecharge($order_id);
                }
                if ($this->Orders_Model->get_discount($order_id)) {
                    $this->Orders_Model->clear_discount($order_id);
                }
                if ($this->Orders_Model->get_db_cart($order_id)) {
                    $this->Orders_Model->clear_db_cart($order_id);
                }
            }
            echo json_encode(array('success' => $success, 'message' => 'cart send successfully'));
        } else {
            echo json_encode(array('success' => $success, 'message' => 'Cart Already sent successfully'));
        }
    }

    public function addservicecharge() {
        $order_id = (int) $this->input->post('order_id');
        $amount = $this->input->post('service_charge');
        $function = $this->input->post('charge_func');
        $order_total = $this->input->post('order_total');
        $service_charge = 0;
        if ($function == 'percent') {
            $service_charge = ($order_total * $amount) / 100;
        } else {
            $service_charge = $amount;
        }
        $data = array(
            'service_charge' => $service_charge,
        );


        $this->Orders_Model->set_servicecharge($order_id, $data);
        $this->add_to_cart($order_id, $this->input->post('order_type'));
    }

    public function adddiscount() {
        $order_id = (int) $this->input->post('order_id');
        $amount = $this->input->post('discount');
        $function = $this->input->post('discount_func');
        $order_total = $this->input->post('order_total');
        $discount = 0;
        if ($function == 'percent') {
            $discount = ($order_total * $amount) / 100;
        } else {
            $discount = $amount;
        }
        $data = array(
            'discount' => $discount,
        );
        $this->Orders_Model->set_discount($order_id, $data);
        $this->add_to_cart($order_id, $this->input->post('order_type'));
    }

}
