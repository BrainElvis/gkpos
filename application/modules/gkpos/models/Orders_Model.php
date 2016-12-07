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

    public function get_menulist_by_cat($catid) {
        $this->db->select('gm.id,gm.title,gm.content,gm.base_price,gm.in_price,gm.out_price,gc.id as categoryId,gc.title as categoryTitle,gc.content as categoryContent,gc.type,gc.print_option');
        $this->db->from('gkpos_menu gm');
        $this->db->join('gkpos_category gc', 'gc.id=gm.category', 'left');
        $this->db->where(array('gm.category' => $catid, 'gm.status' => 1));
        $this->db->order_by('gm.order', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

}
