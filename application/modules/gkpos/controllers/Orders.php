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

    public function getcategory($offset = 0) {
        $result = $this->Orders_Model->get_list('gkpos_menu_category', array('status' => 1, 'deleted' => 0, 'published' => 1), array('id', 'title', 'type', 'print_option','order', 'content'), 5, $offset, 'order', 'ASC');
        if(!empty($result)){
            echo json_encode(array('status'=>true,'data'=>$result));
        }else{
            echo json_encode(array('status'=>false,'data'=>  $result));  
        }
      
    }

}
