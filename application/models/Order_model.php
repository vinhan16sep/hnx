<?php
/**
* 
*/
class Order_model extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
	}

	public function get_all_with_pagination_search($limit = NULL, $start = NULL, $keywords = '', $status = '') {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->like('name', $keywords);
        $this->db->limit($limit, $start);
        $this->db->order_by("about.id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function count_search($keyword = '', $status = ''){
        $this->db->select('*');
        $this->db->from('order');
        $this->db->like('name', $keyword);
        $this->db->where('status', $status);

        return $result = $this->db->get()->num_rows();
    }
}