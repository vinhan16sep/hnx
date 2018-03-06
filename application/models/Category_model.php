<?php
/**
* 
*/
class Category_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function insert($data){
		$this->db->set($data)->insert('category');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
	}

	public function insert_with_language($data_en, $data_hu){
        $data_merge = array($data_en, $data_hu);
        return $this->db->insert_batch('category_lang', $data_merge);
    }

    public function get_all_with_pagination($limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

	public function get_all_with_pagination_search($limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select('category.*, category_lang.name');
        $this->db->from('category');
        $this->db->join('category_lang', 'category_lang.category_id = category.id');
        $this->db->like('category_lang.name', $keywords);
        $this->db->where('category.is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->group_by('category_lang.category_id');
        $this->db->order_by("category.id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function count_search($keyword = ''){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->join('category_lang', 'category_lang.category_id = category.id');
        $this->db->like('category_lang.name', $keyword);
        $this->db->group_by('category_lang.category_id');
        $this->db->where('category.is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

    public function count_all_for_list_admin() {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

    public function get_by_id($id, $lang = '') {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select('category.*, GROUP_CONCAT(category_lang.name ORDER BY category_lang.language separator \' ||| \') as category_name, 
                            GROUP_CONCAT(category_lang.slug ORDER BY category_lang.language separator \' ||| \') as category_slug');
        $this->db->from('category');
        $this->db->join('category_lang', 'category_lang.category_id = category.id', 'left');
        if($lang != ''){
            $this->db->where('category_lang.language', $lang);
        }
        $this->db->where('category.is_deleted', 0);
        $this->db->where('category.id', $id);
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }

    public function get_by_id_with_table_lang($slug = '', $lang = ''){
        $this->db->select('*');
        $this->db->from('category_lang');
        $this->db->where('slug', $slug);
        $this->db->where('language', $lang);

        return $result = $this->db->get()->row_array();
    }



	public function update($id, $data) {
        $this->db->where('id', $id);

        return $this->db->update('category', $data);
    }

    public function update_with_language_en($id, $data_en){
        $this->db->where('category_id', $id);
        $this->db->where('language', 'en');
        return $this->db->update('category_lang', $data_en);
    }

    public function update_with_language_hu($id, $data_hu){
        $this->db->where('category_id', $id);
        $this->db->where('language', 'hu');
        return $this->db->update('category_lang', $data_hu);
    }

	public function remove($id) {
        $this->db->set('is_deleted', 1);
		$this->db->where('id', $id);
		$this->db->update('category');
        return true;
    }

    public function remove_table_lang($id){
        $this->db->where('category_id', $id);
        $this->db->delete('category_lang');
        return true;
    }

    public function get_by_id_table($id){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('is_deleted', 0);
        $this->db->where('id', $id);

        return $result = $this->db->get()->row_array();
    }

    public function build_unique_slug($slug, $lang, $id = null){
        $count = 0;
        $temp_slug = $slug;
        while(true) {
            $this->db->select('id');
            $this->db->where('slug', $temp_slug);
            $this->db->where('language', $lang);
            if($id != null){
                $this->db->where('id !=', $id);
            }
            $query = $this->db->get('category_lang');
            if ($query->num_rows() == 0) break;
            $temp_slug = $slug . '-' . (++$count);
        }
        return $temp_slug;
    }

    public function get_all() {
        $this->db->select('category.id, category_lang.name');
        $this->db->from('category');
        $this->db->join('category_lang', 'category_lang.category_id = category.id');
        $this->db->where('category.is_deleted', 0);
        $this->db->group_by('category_lang.category_id');
        $this->db->order_by("category.id", "asc");

        return $result = $this->db->get()->result_array();
    }

    public function get_by_type($type = '') {
        $this->db->select('category.id, category_lang.name');
        $this->db->from('category');
        $this->db->join('category_lang', 'category_lang.category_id = category.id');
        $this->db->where('category.is_deleted', 0);
        $this->db->where('type', $type);
        
        $this->db->group_by('category_lang.category_id');
        $this->db->order_by("category.id", "asc");

        return $result = $this->db->get()->result_array();
    }

    /**
     *
     * select frontend
     *
     */
    
    public function get_latest_article($lang){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->join('category_lang', 'category_lang.category_id = category.id', 'left');
        $this->db->where('category_lang.language', $lang);
        $this->db->where('category.is_deleted', 0);
        $this->db->limit(3);
        $this->db->order_by("category.id", "desc");

        return $result = $this->db->get()->result_array();
    }


    
    
}