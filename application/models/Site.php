<?php

class Site extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_single_post($slug) {
        $this->_table_name = 'post';
        return $this->get_by(array('slug' => $slug, 'is_published' => 1, 'is_deleted' => 0), TRUE);
    }

    public function get_single_award($slug) {
        $this->_table_name = 'award';
        return $this->get_by(array('slug' => $slug, 'is_published' => 1), TRUE);
    }

    public function get_single_participant($slug) {
        $this->_table_name = 'award_participant';
        return $this->get_by(array('slug' => $slug, 'is_published' => 1), TRUE);
    }

    public function get_single_associate($slug) {
        $this->_table_name = 'award_associate';
        return $this->get_by(array('slug' => $slug, 'is_published' => 1), TRUE);
    }

    public function get_single_sponsor($slug) {
        $this->_table_name = 'award_sponsor';
        return $this->get_by(array('slug' => $slug, 'is_published' => 1), TRUE);
    }

    public function get_single_partner($slug) {
        $this->_table_name = 'award_partner';
        return $this->get_by(array('slug' => $slug, 'is_published' => 1), TRUE);
    }

    public function get_page($slug) {
        $this->_table_name = 'page';
        return $this->get_by(array('slug' => $slug, 'is_published' => 1), TRUE);
    }

}
