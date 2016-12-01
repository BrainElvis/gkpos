<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menumanager_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    //Menu category 
    public function get_menu_category() {
        return $this->get_list('gkpos_menu_category', array('status' => 1, 'deleted' => 0, 'published' => 1), null, null, 0, 'order', 'ASC');
    }

    public function get_menu_category_by_id($id) {
        $this->_table_name = "gkpos_menu_category";
        $this->_primary_key = 'id';
        return $this->get($id);
    }

    public function save_menu_category($data) {
        $this->_table_name = "gkpos_menu_category";
        $this->_primary_key = "id";
        return $this->save($data);
    }

    public function update_menu_category($data, $id) {
        $this->_table_name = "gkpos_menu_category";
        $this->_primary_key = "id";
        return $this->save($data, $id);
    }

    public function sort_menu_category($id, $order) {
        $this->_table_name = "gkpos_menu_category";
        $this->_primary_key = "id";
        return $this->save(array('order' => $order), $id);
    }

    //menu 
    public function get_menu() {
        return $this->get_list('gkpos_menu', array('status' => 1, 'deleted' => 0, 'published' => 1), null, null, 0, 'order', 'ASC');
    }

    public function get_menu_by_id($id) {
        $this->_table_name = "gkpos_menu";
        $this->_primary_key = 'id';
        return $this->get($id);
    }

    public function save_menu($data) {
        $this->_table_name = "gkpos_menu";
        $this->_primary_key = "id";
        return $this->save($data);
    }

    public function update_menu_($data, $id) {
        $this->_table_name = "gkpos_menu";
        $this->_primary_key = "id";
        return $this->save($data, $id);
    }

    public function sort_menu($id, $order) {
        $this->_table_name = "gkpos_menu";
        $this->_primary_key = "id";
        return $this->save(array('order' => $order), $id);
    }

}
