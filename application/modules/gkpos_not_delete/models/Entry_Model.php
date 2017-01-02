<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entry_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    /*
      Attempts to login Admin and set session. Returns boolean based on outcome.
     */

    function logout() {
        $this->clear_gkpos();
        redirect('gkpos/entry');
    }

    /*
      Determins if a employee is logged in
     */

    function is_logged_in() {
        return $this->session->userdata('gkpos_userid') != false;
    }

    function get_info($id) {
        $this->db->from('gkpos_user');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            //Get empty base parent object, as $user_id is NOT an admin
            $user_obj = parent::get_info(-1);
            //Get all the fields from admin table
            $fields = $this->db->list_fields('gkpos_user');
            //append those fields to base parent object, we we have a complete empty object
            foreach ($fields as $field) {
                $user_obj->$field = '';
            }
            return $user_obj;
        }
    }

    function clear_gkpos() {
        // $this->session->unset_userdata('gkpos_userid');
        //$this->session->unset_userdata('gkpos_username');
        //$this->session->unset_userdata('gkpos_useremail');
        $this->session->sess_destroy();
    }

}
