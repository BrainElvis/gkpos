<?php

class Orders_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }
    function showcategory() {
        $data = array();
        return $this->load->view('gkpos/subviews/category', $data, true);
    }

}
