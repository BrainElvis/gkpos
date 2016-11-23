<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Model extends CI_Model {

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    protected $_rules = array();
    protected $_timestamps = FALSE;

    function __construct() {
        parent::__construct();
    }

    public function get($id = NULL, $single = FALSE) {
        if ($id != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } else if ($single == TRUE) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        if (!count($this->db->order_by($this->_order_by))) {
            $this->db->order_by($this->_order_by);
        }
        return $this->db->get($this->_table_name)->$method();
    }

    public function get_by($where, $single = FALSE) {
        $this->db->where($where);
        return $this->get(NULL, $single);
    }

    public function save($data, $id = NULL) {
        //set Timestamps 
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }
        if ($id === NULL) {
            //insert
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] == NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        } else {
            //update
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }
        return $id;
    }

    public function delete($id) {
        $filter = $this->_primary_filter;
        $id = $filter($id);
        if (!$id) {
            return FALSE;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }
   public function get_paged_list($table, $condition, $url, $segment, $offset = 0, $order_field = null, $order_type = null) {
        $result = array('rows' => array(), 'total_rows' => 0);
        $this->load->library('pagination');
        $limit = $this->config->item('lines_per_page');
        if ($condition)
            $this->db->where($condition);
        if ($order_field && $order_type)
            $this->db->order_by($order_field, $order_type);
        $result['rows'] = $this->db->get($table, $limit, $offset)->result();
        if ($condition)
            $this->db->where($condition);
        $result['total_rows'] = $total_rows = $this->db->count_all_results($table);
        $config = $this->pagination->setPagination();
        $config['uri_segment'] = $segment;
        $config['base_url'] = site_url() . $url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->config->item('lines_per_page');
        $this->pagination->initialize($config);
        $result['pagination'] = $this->pagination->create_links();
        return $result;
    }
    
    public function get_list($table, $condition=null, $columns = null, $limit = null, $offset = 0, $order_field = null, $order_type = null) {
      if($columns)
         $this->db->select($columns);
      if($limit)
         $this->db->limit($limit, $offset);

      if($condition)
         $this->db->where($condition);

      if($order_field && $order_type)
         $this->db->order_by($order_field, $order_type);

      return $this->db->get($table)->result();
   }
   public function get_single($table, $condition = null, $columns = '*', $order = null) {
      $this->db->select($columns);
      if($order)
         $this->db->order_by($order);
      if($condition)
         $this->db->where($condition);
      $this->db->limit(1);
      return $this->db->get($table)->row();
   }

}

?>
