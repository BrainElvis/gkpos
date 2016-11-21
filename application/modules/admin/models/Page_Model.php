<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page_Model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->_table_name = 'page';
    }

}
