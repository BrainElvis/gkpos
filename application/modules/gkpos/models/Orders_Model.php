<?php

class Orders_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function showcategory() {
        $data = array();
        $data['maxmin'] = $this->get_min_max('gkpos_category', 'order', array('status' => 1));
        return $this->load->view('gkpos/orders/category', $data, true);
    }

    public function get_menulist_by_cat($catid, $offset = 0, $limit = 5) {
        $this->db->select('gm.id,gm.title,gm.content,gm.base_price,gm.in_price,gm.out_price,gm.order, gc.id as categoryId,gc.title as categoryTitle,gc.content as categoryContent,gc.type,gc.print_option');
        $this->db->from('gkpos_menu gm');
        $this->db->join('gkpos_category gc', 'gc.id=gm.category', 'left');
        $this->db->where(array('gm.category' => $catid, 'gm.status' => 1));
        $this->db->order_by('gm.order', 'asc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_menulist_order_by_cat($catid, $offset = 0, $limit = 5) {
        $this->db->select('gm.id,gm.order');
        $this->db->from('gkpos_menu gm');
        $this->db->where(array('gm.category' => $catid, 'gm.status' => 1));
        $this->db->order_by('gm.order', 'asc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getmenuselection($category, $menu, $offset = 0, $limit = 0) {
        $this->db->select('SEL.id,SEL.title,SEL.content,SEL.base_price,SEL.in_price,SEL.out_price,SEL.order, MENU.id as selMenuId,MENU.title as selMenuTitle,MENU.content as selMenuContent,CATEGORY.id as selMenuCategoryId,CATEGORY.type as selMenuCategoryType,CATEGORY.print_option as selMenuCategoryPrintOption');
        $this->db->from('gkpos_selection SEL');
        $this->db->join('gkpos_menu MENU', 'MENU.id=SEL.menu', 'left');
        $this->db->join('gkpos_category CATEGORY', 'CATEGORY.id=SEL.category', 'left');
        $this->db->where(array('SEL.category' => $category, 'SEL.menu' => $menu, 'SEL.status' => 1));
        $this->db->order_by('SEL.order', 'asc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_cart_item($category, $menu, $sel = 0) {
        if ($sel > 0) {
            $this->db->select('GS.id as selection,GS.title as selection_title,GS.base_price,GS.in_price,GS.out_price,GS.menu,GM.title as menu_title,GS.category, GC.title as category_title,GC.print_option as category_print_option,GC.type as category_type');
            $this->db->from('gkpos_selection GS');
            $this->db->join('gkpos_menu as GM', 'GS.menu=GM.id', 'left');
            $this->db->join('gkpos_category as GC', 'GM.category=GC.id', 'left');
            $this->db->where(array('GS.id' => $sel));
        } else {
            $this->db->select('GM.id as menu,GM.title as menu_title,GM.category,GM.base_price,GM.in_price,GM.out_price, GC.title as category_title,GC.print_option as category_print_option,GC.type as category_type ');
            $this->db->from('gkpos_menu GM');
            $this->db->join('gkpos_category as GC', 'GM.category=GC.id', 'left');
            $this->db->where(array('GM.id' => $menu, 'GC.id' => $category));
        }
        return $this->db->get()->row();
    }

    function get_current_orderid() {
        if ($this->session->userdata('current_orderid')) {
            return $this->session->userdata('current_orderid');
        }
    }

    function set_current_orderid($order_id) {
        $this->session->set_userdata('current_orderid', $order_id);
    }

    function get_cart($order_id) {
        if ($this->session->userdata('cart_' . $order_id)) {
            return $this->session->userdata('cart_' . $order_id);
        }
    }

    function set_cart($order_id, $cart_data) {
        $this->session->set_userdata('cart_' . $order_id, $cart_data);
    }

    function cart_item_plus($order_id, $line, $quantity = false) {
        $items = $this->get_cart($order_id);
        $items[$line]['quantity']+=1;
        $this->set_cart($order_id, $items);
        $this->set_cart_new($order_id, 'yes');
        return array('success' => true, 'order_id' => $order_id, 'line' => $line);
    }

    function cart_item_minus($order_id, $line, $quantity = false) {
        $items = $this->get_cart($order_id);
        $items[$line]['quantity'] > 1 ? $this->set_cart_new($order_id, 'yes') : $this->get_cart_new($order_id);
        $items[$line]['quantity']-=$items[$line]['quantity'] > 1 ? 1 : 0;
        $this->set_cart($order_id, $items);
        return array('success' => true, 'order_id' => $order_id, 'line' => $line);
    }

    function cart_item_quantity($order_id, $line, $quantity = false) {
        $items = $this->get_cart($order_id);
        $items[$line]['quantity'] = $quantity;
        $this->set_cart($order_id, $items);
        $this->set_cart_new($order_id, 'yes');
        return array('success' => true, 'order_id' => $order_id, 'line' => $line);
    }

    function cart_item_del($order_id, $line, $quantity = false) {
        $items = $this->get_cart($order_id);
        unset($items[$line]);
        $this->set_cart($order_id, $items);
        return array('success' => true, 'order_id' => $order_id, 'line' => false);
    }

    function empty_cart($order_id) {
        $this->session->unset_userdata('cart_' . $order_id);
    }

    function get_cart_db($order_id) {
        if ($this->session->userdata('cart_db_' . $order_id)) {
            return $this->session->userdata('cart_db_' . $order_id);
        }
    }

    function set_cart_db($order_id, $cart_data) {
        $this->session->set_userdata('cart_db_' . $order_id, $cart_data);
    }

    function dbcart_item_plus($order_id, $line, $quantity = false) {
        $items = $this->get_cart_db($order_id);
        $items[$line]['quantity']+=1;
        $this->set_cart_db($order_id, $items);
        $this->set_cart_new($order_id, 'yes');
        return array('success' => true, 'order_id' => $order_id, 'line' => $line);
    }
    
    function cart_item_special($order_id, $line, $quantity = false) {
        $items = $this->get_cart($order_id);
        if ($items[$line]['selection_title'] != '' || $items[$line]['selection_title'] != '') {
            $title = explode('-[', $items[$line]['selection_title']);
            if (count($title) > 1) {
                $items[$line]['selection_title'] = $title[0] . "-[" . $quantity . "]";
            } else {
                $items[$line]['selection_title'].="-[" . $quantity . "]";
            }
        } else {
            $title = explode('-[', $items[$line]['menu_title']);
            if (count($title) > 1) {
                $items[$line]['menu_title'] = $title[0] . "-[" . $quantity . "]";
            } else {
                $items[$line]['menu_title'].="-[" . $quantity . "]";
            }
        }
        $this->set_cart($order_id, $items);
        $this->set_cart_new($order_id, 'yes');
        return array('success' => true, 'order_id' => $order_id, 'line' => $line);
    }

    function dbcart_item_special($order_id, $line, $quantity = false) {
        $items = $this->get_cart_db($order_id);
        if ($items[$line]['selection_title'] != '' || $items[$line]['selection_title'] != '') {
            $title = explode('-[', $items[$line]['selection_title']);
            if (count($title) > 1) {
                $items[$line]['selection_title'] = $title[0] . "-[" . $quantity . "]";
            } else {
                $items[$line]['selection_title'].="-[" . $quantity . "]";
            }
        } else {
            $title = explode('-[', $items[$line]['menu_title']);
            if (count($title) > 1) {
                $items[$line]['menu_title'] = $title[0] . "-[" . $quantity . "]";
            } else {
                $items[$line]['menu_title'].="-[" . $quantity . "]";
            }
        }
        $this->set_cart_db($order_id, $items);
        $this->set_cart_new($order_id, 'yes');
        return array('success' => true, 'order_id' => $order_id, 'line' => $line);
    }

    function dbcart_item_minus($order_id, $line, $quantity = false) {
        if ($this->session->userdata('gkpos_userid') == 0) {
            $items = $this->get_cart_db($order_id);
            $items[$line]['quantity'] > 1 ? $this->set_cart_new($order_id, 'yes') : $this->get_cart_new($order_id);
            $items[$line]['quantity']-=$items[$line]['quantity'] > 1 ? 1 : 0;
            $this->set_cart_db($order_id, $items);
            $this->set_cart_new($order_id, 'yes');
            return array('success' => true, 'order_id' => $order_id, 'line' => $line);
        } else {
            return array('success' => true, 'order_id' => $order_id, 'line' => $line, 'not_allowed' => 1);
        }
    }

    function dbcart_item_quantity($order_id, $line, $quantity = false) {
        $items = $this->get_cart_db($order_id);
        $items[$line]['quantity'] = $quantity;
        $this->set_cart_db($order_id, $items);
        $this->set_cart_new($order_id, 'yes');
        return array('success' => true, 'order_id' => $order_id, 'line' => $line);
    }

    function dbcart_item_del($order_id, $line, $quantity = false) {
        if ($this->session->userdata('gkpos_userid') == 0) {
            $items = $this->get_cart_db($order_id);
            unset($items[$line]);
            $this->set_cart_db($order_id, $items);
            $this->set_cart_new($order_id, 'yes');
            return array('success' => true, 'order_id' => $order_id, 'line' => 0);
        } else {
            return array('success' => true, 'order_id' => $order_id, 'line' => $line, 'not_allowed' => 1);
        }
    }

    function get_cart_new($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_has_new')) {
            return $this->session->userdata('cart_' . $order_id . '_has_new');
        }
        return $this->session->userdata('cart_' . $order_id . '_has_new');
    }

    function set_cart_new($order_id, $data) {
        $this->session->set_userdata('cart_' . $order_id . '_has_new', $data);
    }

    function clear_cart_new($order_id) {
        $this->session->unset_userdata('cart_' . $order_id . '_has_new');
    }

    function empty_cart_db($order_id) {
        $this->session->unset_userdata('cart_db_' . $order_id);
    }

    //discount management session 
    function initiate_discount($order_id) {
        //get exiting discount of this order from discount table 
        $discount = $this->get_single_array('gkpos_order_discount', array('order_id' => $order_id));
        if (!empty($discount)) {
            $this->set_discount($order_id, $discount);
        } else {
            if ($this->config->item('gk_discount_applied') == 'yes') {
                $discount['order_id'] = $order_id;
                $discount['number'] = $this->config->item('gk_discount_percent');
                $discount['func'] = 1;
                $discount['amount'] = 0;
                $discount['food'] = $this->config->item('gk_discount_food');
                $discount['nonfood'] = $this->config->item('gk_discount_nonfood');
                $this->set_discount($order_id, $discount);
            } else {
                $this->clear_discount($order_id);
            }
        }
    }

    function set_discount($order_id, $data) {
        $this->session->set_userdata('cart_' . $order_id . '_discount', $data);
    }

    function get_discount($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_discount')) {
            return $this->session->userdata('cart_' . $order_id . '_discount');
        }
    }

    function clear_discount($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_discount')) {
            $this->session->unset_userdata('cart_' . $order_id . '_discount');
        }
    }

    function set_discount_amount($order_id, $data) {
        $this->session->set_userdata('cart_' . $order_id . '_discount_amount', $data);
    }

    function get_discount_amount($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_discount_amount')) {
            return $this->session->userdata('cart_' . $order_id . '_discount_amount');
        }
    }

    function clear_discount_amount($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_discount_amount')) {
            $this->session->unset_userdata('cart_' . $order_id . '_discount_amount');
        }
    }

    //Service Charge Management Session 
    function initiate_service_charge($order_id) {
        $servicecharge = $this->get_single_array('gkpos_order_servicecharge', array('order_id' => $order_id));
        if (!empty($servicecharge)) {
            $this->set_servicecharge($order_id, $servicecharge);
        } else {
            $this->clear_servicecharge($order_id);
        }
    }

    function set_servicecharge($order_id, $data) {
        $this->session->set_userdata('cart_' . $order_id . '_servicecharge', $data);
    }

    function get_servicecharge($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_servicecharge')) {
            return $this->session->userdata('cart_' . $order_id . '_servicecharge');
        }
    }

    function clear_servicecharge($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_servicecharge')) {
            $this->session->unset_userdata('cart_' . $order_id . '_servicecharge');
        }
    }

    function set_servicecharge_amount($order_id, $data) {
        $this->session->set_userdata('cart_' . $order_id . '_servicecharge_amount', $data);
    }

    function get_servicecharge_amount($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_servicecharge_amount')) {
            return $this->session->userdata('cart_' . $order_id . '_servicecharge_amount');
        }
    }

    function clear_servicecharge_amount($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_servicecharge_amount')) {
            $this->session->unset_userdata('cart_' . $order_id . '_servicecharge_amount');
        }
    }

    //Service Charge Management Session End
    function initiate_vat($order_id) {
        $vat = $this->get_single_array('gkpos_order_vat', array('order_id' => $order_id));
        if (!empty($vat)) {
            $this->set_vat($order_id, $vat);
        } else {
            if ($this->config->item('gk_vat_reg') != '' || $this->config->item('gk_vat_reg')) {
                $vat['order_id'] = $order_id;
                $vat['number'] = $this->config->item('gk_discount_percent');
                $vat['func'] = 1;
                $vat['amount'] = 0;
                $vat['is_included'] = $this->config->item('gk_vat_included') == 'yes' ? 1 : 2;
                $this->set_vat($order_id, $vat);
            } else {
                $this->clear_vat($order_id);
            }
        }
    }

    function set_vat($order_id, $data) {
        $this->session->set_userdata('cart_' . $order_id . '_vat', $data);
    }

    function get_vat($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_vat')) {
            return $this->session->userdata('cart_' . $order_id . '_vat');
        }
    }

    function clear_vat($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_vat')) {
            $this->session->unset_userdata('cart_' . $order_id . '_vat');
        }
    }

    function set_vat_amount($order_id, $data) {
        $this->session->set_userdata('cart_' . $order_id . '_vat_amount', $data);
    }

    function get_vat_amount($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_vat_amount')) {
            return $this->session->userdata('cart_' . $order_id . '_vat_amount');
        }
    }

    function clear_vat_amount($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_vat_amount')) {
            $this->session->unset_userdata('cart_' . $order_id . '_vat_amount');
        }
    }

    function initiate_deliveryplan($order_id) {
        $order = $this->Orders_Model->get_single('gkpos_order', array('id' => $order_id), array('postcode'));
        $postcode = explode(' ', $order->postcode);
        $initial_code = strtoupper($postcode[0]);
        $deliveryPlan = $this->Orders_Model->get_single_array('gkpos_deliveryplan', array('status' => 1, 'initial_code' => $initial_code), array('id', 'is_free', 'delivery_charge', 'min_order'));
        if (!empty($deliveryPlan)) {
            $this->Orders_Model->set_deliveryplan($order_id, $deliveryPlan);
        } else {
            $this->Orders_Model->clear_deliveryplan($order_id);
        }
    }

    function get_deliveryplan($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_deliveryplan')) {
            return $this->session->userdata('cart_' . $order_id . '_deliveryplan');
        }
    }

    function set_deliveryplan($order_id, $data) {
        $this->session->set_userdata('cart_' . $order_id . '_deliveryplan', $data);
    }

    public function clear_deliveryplan($order_id) {
        if ($this->session->userdata('cart_' . $order_id, '_deliveryplan')) {
            $this->session->unset_userdata('cart_' . $order_id . '_deliveryplan');
        }
    }

    function set_deliveryplan_amount($order_id, $data) {
        $this->session->set_userdata('cart_' . $order_id . '_delivery_charge', $data);
    }

    function get_deliveryplan_amount($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_delivery_charge')) {
            return $this->session->userdata('cart_' . $order_id . '_delivery_charge');
        }
    }

    function clear_deliveryplan_amount($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_delivery_charge')) {
            $this->session->unset_userdata('cart_' . $order_id . '_delivery_charge');
        }
    }

    function set_subtotal($order_id, $total) {
        $this->session->set_userdata('cart_' . $order_id . '_subtotal', $total);
    }

    function get_subtotal($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_subtotal')) {
            return $this->session->userdata('cart_' . $order_id . '_subtotal');
        }
    }

    function clear_subtotal($order_id) {
        $this->session->unset_userdata('cart_' . $order_id . '_subtotal');
    }

    function set_total($order_id, $total) {
        $this->session->set_userdata('cart_' . $order_id . '_total', $total);
    }

    function get_total($order_id) {
        if ($this->session->userdata('cart_' . $order_id . '_total')) {
            return $this->session->userdata('cart_' . $order_id . '_total');
        }
    }

    function clear_total($order_id) {
        $this->session->unset_userdata('cart_' . $order_id . '_total');
    }

    public function addtocart($order_id, $category, $menu, $sel, $quantity, $extra = false) {
        $maxLine = 0;
        $updatekey = 0;
        $dbcart_items = $this->get_cart_db($order_id);
        $currentCartItems = $this->get_cart($order_id);
        //setting up max line 
        if (empty($currentCartItems)) {
            if (empty($dbcart_items)) {
                $maxLine = $maxLine;
            } else {
                foreach ($dbcart_items as $line => $item) {
                    if ($maxLine <= $item['line']) {
                        $maxLine = $item['line'];
                    }
                }
            }
        } else {
            foreach ($currentCartItems as $line => $item) {
                if ($maxLine <= $item['line']) {
                    $maxLine = $item['line'];
                }
            }
        }
        //Find if item exists in current item cart 
        $existInCuurentCart = false;
        if (!empty($currentCartItems)) {
            foreach ($currentCartItems as $line => $item) {
                if ($sel == 'no') {
                    if ($menu > 0 && $menu == $item['menu']) {
                        $existInCuurentCart = true;
                        $updatekey = $item['line'];
                    }
                } else {
                    if ((int) $sel > 0 && $sel == $item['selection']) {
                        $existInCuurentCart = true;
                        $updatekey = $item['line'];
                    }
                }
            }
        }
        $existInDbCart = false;
        if ($existInCuurentCart == false) {
            if (!empty($dbcart_items)) {
                foreach ($dbcart_items as $line => $item) {
                    if ($maxLine <= $item['line']) {
                        $maxLine = $item['line'];
                    }
                    if ($sel == 'no') {
                        if ($menu > 0 && $menu == $item['menu']) {
                            $existInDbCart = true;
                            $updatekey = $item['line'];
                        }
                    } else {
                        if ((int) $sel > 0 && $sel == $item['selection']) {
                            $existInDbCart = true;
                            $updatekey = $item['line'];
                        }
                    }
                }
            }
        }
        //if item not found inside both of the places then insert as new in the current cart 
        if (false == $existInDbCart && false == $existInCuurentCart) {
            $newItemLine = $maxLine + 1;
            $item = $this->add_item($newItemLine, $order_id, $category, $menu, $sel, $quantity);
            $currentCartItems[$newItemLine] = $item;
            $this->set_cart($order_id, $currentCartItems);
            $this->set_cart_new($order_id, 'yes');
            return array('success' => true, 'order_id' => $order_id, 'line' => $newItemLine, 'item' => $item);
        } else {
            if (true == $existInCuurentCart) {
                $currentCartItems[$updatekey]['quantity'] = $currentCartItems[$updatekey]['quantity'] + $quantity;
                $this->set_cart($order_id, $currentCartItems);
                $this->set_cart_new($order_id, 'yes');
                return array('success' => true, 'order_id' => $order_id, 'line' => $updatekey);
            }
            if (true == $existInDbCart) {
                $dbcart_items[$updatekey]['quantity'] = $dbcart_items[$updatekey]['quantity'] + $quantity;
                $this->set_cart_db($order_id, $dbcart_items);
                $this->set_cart_new($order_id, 'yes');
                return array('success' => true, 'order_id' => $order_id, 'line' => $updatekey);
            }
        }
    }

    function add_item($newItemLine, $order_id, $category, $menu, $sel = false, $quantity = false, $extra = false) {
        //get the item information from db
        $item_info = array();
        if ($sel == 'no' || $sel == false) {
            $item_info = $this->get_cart_item($category, $menu);
        } else {
            $sel = (int) $sel;
            $item_info = $this->get_cart_item($category, $menu, $sel);
        }
        //If item then attach it into cart 
        if (!empty($item_info)) {
            $orderObj = $this->get_single('gkpos_order', array('id' => $order_id), array('order_type'));
            $order_type = $orderObj->order_type;
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
                'line' => $newItemLine,
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
            );
            return $item;
        } else {
            return array();
        }
    }

    // Multiple Payments
    function get_payments($order_id) {
        if ($this->session->userdata('payments_' . $order_id))
            return $this->session->userdata('payments_' . $order_id);
    }

    function set_payments($order_id, $payments_data) {
        $this->session->set_userdata('payments_' . $order_id, $payments_data);
    }

    // Multiple Payments
    function empty_payments($order_id) {
        if ($this->session->userdata('payments_' . $order_id)) {
            $this->session->unset_userdata('payments_' . $order_id);
        }
    }

    // Multiple Payments
    function delete_payment($order_id, $payment_id) {
        $payments = $this->get_payments($order_id);
        unset($payments[urldecode($payment_id)]);
        $this->set_payments($order_id, $payments);
        return true;
    }

    // Multiple Payments
    function get_payments_total($order_id) {
        $subtotal = 0;
        $payemts_arr = $this->get_payments($order_id);
        if (!empty($payemts_arr)) {
            foreach ($this->get_payments($order_id) as $payments) {
                $subtotal = bcadd($payments['amount'], $subtotal, PRECISION);
            }
        }
        return to_currency_no_money($subtotal);
    }

    // Multiple Payments
    function get_amount_due($order_id) {
        $payment_total = $this->get_payments_total($order_id);
        $sales_total = $this->get_total($order_id);
        return to_currency_no_money(bcsub($sales_total, $payment_total, PRECISION));
    }

    function clear_all($order_id) {
        $this->empty_cart($order_id);
        $this->empty_cart_db($order_id);
        $this->clear_cart_new($order_id);
        $this->clear_discount($order_id);
        $this->clear_discount_amount($order_id);
        $this->clear_servicecharge($order_id);
        $this->clear_servicecharge_amount($order_id);
        $this->clear_vat($order_id);
        $this->clear_subtotal($order_id);
        $this->clear_total($order_id);
        $this->clear_deliveryplan($order_id);
        $this->clear_deliveryplan_amount($order_id);
        $this->empty_payments($order_id);
        // $this->clear_giftcard_remainder($order_id);
        // $this->empty_payments($order_id);
    }

    public function save_cart($data, $id = null) {
        $this->_table_name = 'gkpos_order_detail';
        $this->_primary_key = 'id';
        return $this->save($data, $id);
    }

    public function save_discount($discount_data, $order_id = null) {
        $this->_table_name = 'gkpos_order_discount';
        $this->_primary_key = 'order_id';
        return $this->save($discount_data, $order_id);
    }

    public function save_vat($vat_data, $order_id = null) {
        $this->_table_name = 'gkpos_order_vat';
        $this->_primary_key = 'order_id';
        return $this->save($vat_data, $order_id);
    }

    public function save_servicecharge($servicecharge_data, $order_id = null) {
        $this->_table_name = 'gkpos_order_servicecharge';
        $this->_primary_key = 'order_id';
        return $this->save($servicecharge_data, $order_id);
    }

    public function update_order($order_data, $order_id = null) {
        $this->_table_name = 'gkpos_order';
        $this->_primary_key = 'order_id';
        return $this->save($order_data, $order_id);
    }

}
