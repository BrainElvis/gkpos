<?php

class Emails extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'contact';
    }

}
