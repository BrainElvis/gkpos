<?php

class Gkpos_lib {

    var $CI;

    function __construct() {
        $this->CI = & get_instance();
        //$this->CI->load->model('gkpos/Orders_Model', 'ord_model');
    }
    
    public function test(){
        return "something";
    }

    
    
    
    function get_cart($order_id) {
        if (!$this->CI->session->userdata('cart_' . $order_id))
            $this->set_cart(false, array());
        return $this->CI->session->userdata('cart_' . $order_id);
    }

    function set_cart($order_id, $cart_data) {
        $this->CI->session->set_userdata('cart_' . $order_id, $cart_data);
    }

    function empty_cart($order_id) {
        $this->CI->session->unset_userdata('cart_' . $order_id);
    }

    function get_cart_db($order_id) {
        if (!$this->CI->session->userdata('cart_' . $order_id))
            $this->set_cart(false, array());
        return $this->CI->session->userdata('cart_' . $order_id);
    }

    function set_cart_db($order_id, $cart_data) {
        $this->CI->session->set_userdata('cart_' . $order_id, $cart_data);
    }

    function empty_cart_db($order_id) {
        $this->CI->session->unset_userdata('cart_' . $order_id);
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
            return array('success' => true, 'order_id' => $order_id, 'line' => $newItemLine, 'item' => $item);
        } else {
            if (true == $existInCuurentCart) {
                $currentCartItems[$updatekey]['quantity'] = $currentCartItems[$updatekey]['quantity'] + $quantity;
                $this->set_cart($order_id, $currentCartItems);
                return array('success' => true, 'order_id' => $order_id, 'line' => $updatekey);
            }
            if (true == $existInDbCart) {
                $dbcart_items[$updatekey]['quantity'] = $dbcart_items[$updatekey]['quantity'] + $quantity;
                $this->set_db_cart($order_id, $dbcart_items);
                return array('success' => true, 'order_id' => $order_id, 'line' => $updatekey);
            }
        }
    }

    function add_item($newItemLine, $order_id, $category, $menu, $sel = false, $quantity = false, $extra = false) {
        //get the item information from db
        $item_info = array();
        if ($sel == 'no' || $sel == false) {
            $item_info = $this->Orders_Model->get_cart_item($category, $menu);
        } else {
            $sel = (int) $sel;
            $item_info = $this->Orders_Model->get_cart_item($category, $menu, $sel);
        }
        //If item then attach it into cart 
        if (!empty($item_info)) {
            $orderObj = $this->Orders_Model->get_single('gkpos_order', array('id' => $order_id), array('order_type'));
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
        if (!$this->CI->session->userdata('payments_' . $order_id))
            $this->set_payments(false, array());
        return $this->CI->session->userdata('payments_' . $order_id);
    }

    // Multiple Payments
    function set_payments($order_id, $payments_data) {
        $this->CI->session->set_userdata('payments_' . $order_id, $payments_data);
    }

    function add_payment($order_id, $payment_id, $payment_amount) {
        $payments = $this->get_payments($order_id);
        if (isset($payments[$payment_id])) {
            //payment_method already exists, add to payment_amount
            $payments[$payment_id]['payment_amount'] = bcadd($payments[$payment_id]['payment_amount'], $payment_amount, PRECISION);
        } else {
            //add to existing array
            $payment = array(
                'payment_type' => $payment_id,
                'payment_amount' => $payment_amount
            );
            $payments [$payment_id] = $payment;
        }
        $this->set_payments($order_id, $payments);

        return true;
    }

    // Multiple Payments
    function edit_payment($order_id, $payment_id, $payment_amount) {
        $payments = $this->get_payments($order_id);
        if (isset($payments[$payment_id])) {
            $payments[$payment_id]['payment_type'] = $payment_id;
            $payments[$payment_id]['payment_amount'] = $payment_amount;
            $this->set_payments($order_id, $payments);
        }
        return false;
    }

    // Multiple Payments
    function delete_payment($order_id, $payment_id) {
        $payments = $this->get_payments($order_id);
        unset($payments[urldecode($payment_id)]);
        $this->set_payments($order_id, $payments);
    }

    // Multiple Payments
    function empty_payments() {
        $this->CI->session->unset_userdata('payments');
    }

    // Multiple Payments
    function get_payments_total($order_id) {
        $subtotal = 0;
        foreach ($this->get_payments($order_id) as $payments) {
            $subtotal = bcadd($payments['payment_amount'], $subtotal, PRECISION);
        }
        return to_currency_no_money($subtotal);
    }

    // Multiple Payments
    function get_amount_due($order_id) {
        $payment_total = $this->get_payments_total($order_id);
        $sales_total = $this->get_total($order_id);
        return to_currency_no_money(bcsub($sales_total, $payment_total, PRECISION));
    }

    function get_customer() {
        if (!$this->CI->session->userdata('customer'))
            $this->set_customer(-1);
        return $this->CI->session->userdata('customer');
    }

    function set_customer($customer_id) {
        $this->CI->session->set_userdata('customer', $customer_id);
    }

    function set_giftcard_remainder($value) {
        $this->CI->session->set_userdata('giftcard_remainder', $value);
    }

    function get_giftcard_remainder() {
        return $this->CI->session->userdata('giftcard_remainder');
    }

    function clear_giftcard_remainder() {
        $this->CI->session->unset_userdata('giftcard_remainder');
    }

    function get_item_id($line_to_get, $order_id) {
        $items = $this->get_cart();
        foreach ($items as $line => $item) {
            if ($line == $line_to_get) {
                return $item['id'];
            }
        }
        return -1;
    }

    function edit_item($order_id, $line, $description, $serialnumber, $quantity, $discount, $price) {
        $items = $this->get_cart();
        if (isset($items[$line])) {
            $line = &$items[$line];
            $line['description'] = $description;
            $line['serialnumber'] = $serialnumber;
            $line['quantity'] = $quantity;
            $line['discount'] = $discount;
            $line['price'] = $price;
            $line['total'] = $this->get_item_total($quantity, $price, $discount);
            $line['discounted_total'] = $this->get_item_total($quantity, $price, $discount, TRUE);
            $this->set_cart($order_id, $items);
        }

        return false;
    }

    function delete_item($order_id, $line) {
        $items = $this->get_cart($order_id);
        unset($items[$line]);
        $this->set_cart($order_id, $items);
    }

    function remove_customer() {
        $this->CI->session->unset_userdata('customer');
    }

    function clear_all() {
        $this->empty_cart();
        $this->clear_giftcard_remainder();
        $this->empty_payments();
        $this->remove_customer();
    }

    function get_taxes($order_id) {
        return $taxes;
    }

    function get_discount($order_id) {
        $discount = 0;
        return $discount;
    }

    function get_subtotal($include_discount = FALSE, $exclude_tax = FALSE) {
        $subtotal = $this->calculate_subtotal($include_discount, $exclude_tax);
        return to_currency_no_money($subtotal);
    }

    function calculate_subtotal($include_discount = FALSE, $exclude_tax = FALSE) {
        $subtotal = 0;
        foreach ($this->get_cart() as $item) {
            if ($exclude_tax && $this->CI->config->config['tax_included']) {
                $subtotal = bcadd($subtotal, $this->get_item_total_tax_exclusive($item['item_id'], $item['quantity'], $item['price'], $item['discount'], $include_discount), PRECISION);
            } else {
                $subtotal = bcadd($subtotal, $this->get_item_total($item['quantity'], $item['price'], $item['discount'], $include_discount), PRECISION);
            }
        }

        return $subtotal;
    }

    function get_total() {
        $total = $this->calculate_subtotal(TRUE);
        if (!$this->CI->config->config['tax_included']) {
            foreach ($this->get_taxes() as $tax) {
                $total = bcadd($total, $tax, PRECISION);
            }
        }

        return to_currency_no_money($total);
    }

}

?>
