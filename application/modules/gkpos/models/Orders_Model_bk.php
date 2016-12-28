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
        //return array('category'=>$category,'menu'=>$menu,'sel'=>$sel);
    }

    function get_cart($order_id) {
        if (!$this->session->userdata('cart' . $order_id)) {
            $this->set_cart(false, array());
        }
        return $this->session->userdata('cart' . $order_id);
    }

    function set_cart($order_id, $cart_data) {
        $this->session->set_userdata('cart' . $order_id, $cart_data);
    }

    public function clear_cart($order_id) {
        $this->session->unset_userdata('cart' . $order_id);
    }

    function get_db_cart($order_id) {
        if (!$this->session->userdata('dbcart' . $order_id)) {
            $this->set_db_cart(false, array());
        }
        return $this->session->userdata('dbcart' . $order_id);
    }

    function set_db_cart($order_id, $cart_data) {
        $this->session->set_userdata('dbcart' . $order_id, $cart_data);
    }

    public function clear_db_cart($order_id) {
        $this->session->unset_userdata('dbcart' . $order_id);
    }

    function get_deliveryplan($order_id) {
        if (!$this->session->userdata('deliveryplan' . $order_id)) {
            $this->set_deliveryplan(false, array());
        }
        return $this->session->userdata('deliveryplan' . $order_id);
    }

    function set_deliveryplan($order_id, $data) {
        $this->session->set_userdata('deliveryplan' . $order_id, $data);
    }

    public function clear_deliveryplan($order_id) {
        $this->session->unset_userdata('deliveryplan' . $order_id);
    }

    function get_servicecharge($order_id) {
        if (!$this->session->userdata('servicecharge' . $order_id)) {
            $this->set_servicecharge(false, array());
        }
        return $this->session->userdata('servicecharge' . $order_id);
    }

    function set_servicecharge($order_id, $data) {
        $this->session->set_userdata('servicecharge' . $order_id, $data);
    }

    public function clear_servicecharge($order_id) {
        $this->session->unset_userdata('servicecharge' . $order_id);
    }

    function get_discount($order_id) {
        if (!$this->session->userdata('discount' . $order_id)) {
            $this->set_discount(false, array());
        }
        return $this->session->userdata('discount' . $order_id);
    }

    function set_discount($order_id, $data) {
        $this->session->set_userdata('discount' . $order_id, $data);
    }

    public function clear_discount($order_id) {
        $this->session->unset_userdata('discount' . $order_id);
    }

    public function save_cart($data, $id = null) {
        $this->_table_name = 'gkpos_order_detail';
        $this->_primary_key = 'id';
        return $this->save($data, $id);
    }

}
