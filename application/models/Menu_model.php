<?php
/**
* 
*/
class Menu_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function insert($data){
		$this->db->set($data)->insert('menu');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
	}

	public function insert_with_language($data_en, $data_hu){
        $data_merge = array($data_en, $data_hu);
        return $this->db->insert_batch('menu_lang', $data_merge);
    }

    public function get_all_with_pagination($limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

	public function get_all_with_pagination_search($limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select('menu.*');
        $this->db->from('menu');
        $this->db->join('menu_lang', 'menu_lang.menu_id = menu.id');
        $this->db->like('menu_lang.name', $keywords);
        $this->db->where('menu.is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->group_by('menu_lang.menu_id');
        $this->db->order_by("menu.id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function count_search($keyword = ''){
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('menu_lang', 'menu_lang.menu_id = menu.id');
        $this->db->like('menu_lang.name', $keyword);
        $this->db->group_by('menu_lang.menu_id');
        $this->db->where('menu.is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

    public function count_all_for_list_admin() {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

    public function get_by_id($id, $lang = '') {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select('menu.*, GROUP_CONCAT(menu_lang.name ORDER BY menu_lang.language separator \' ||| \') as menu_name, 
                            GROUP_CONCAT(menu_lang.description ORDER BY menu_lang.language separator \' ||| \') as menu_description,
                            GROUP_CONCAT(menu_lang.slug ORDER BY menu_lang.language separator \' ||| \') as menu_slug');
        $this->db->from('menu');
        $this->db->join('menu_lang', 'menu_lang.menu_id = menu.id', 'left');
        if($lang != ''){
            $this->db->where('menu_lang.language', $lang);
        }
        $this->db->where('menu.is_deleted', 0);
        $this->db->where('menu.id', $id);
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }

    public function get_by_id_with_table_lang($slug = '', $lang = ''){
        $this->db->select('*');
        $this->db->from('menu_lang');
        $this->db->where('slug', $slug);
        $this->db->where('language', $lang);

        return $result = $this->db->get()->row_array();
    }



	public function update($id, $data) {
        $this->db->where('id', $id);

        return $this->db->update('menu', $data);
    }

    public function update_with_language_en($id, $data_en){
        $this->db->where('menu_id', $id);
        $this->db->where('language', 'en');
        return $this->db->update('menu_lang', $data_en);
    }

    public function update_with_language_hu($id, $data_hu){
        $this->db->where('menu_id', $id);
        $this->db->where('language', 'hu');
        return $this->db->update('menu_lang', $data_hu);
    }

	public function remove($id) {
        $this->db->set('is_deleted', 1);
		$this->db->where('id', $id);
		$this->db->update('menu');
        return true;
    }

    public function remove_table_lang($id){
        $this->db->where('menu_id', $id);
        $this->db->delete('menu_lang');
        return true;
    }

    public function get_by_id_table($id){
        $this->db->select('*');
        $this->db->from('menu');
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
            $query = $this->db->get('menu_lang');
            if ($query->num_rows() == 0) break;
            $temp_slug = $slug . '-' . (++$count);
        }
        return $temp_slug;
    }

    public function count_search_store($store = '', $keyword = ''){
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('menu_lang', 'menu_lang.menu_id = menu.id');
        $this->db->like('menu_lang.name', $keyword);
        $this->db->group_by('menu_lang.menu_id');
        $this->db->where('menu.is_deleted', 0);
        if($store != ''){
            $this->db->group_start();
            $this->db->where('menu.store', $store);
            $this->db->or_where('menu.store', 3);
            $this->db->group_end();
        }
        

        return $result = $this->db->get()->num_rows();
    }

    public function get_all_with_pagination_search_store($limit = NULL, $start = NULL, $keywords = '', $store = '') {
        $this->db->select('menu.*');
        $this->db->from('menu');
        $this->db->join('menu_lang', 'menu_lang.menu_id = menu.id');
        $this->db->like('menu_lang.name', $keywords);
        $this->db->where('menu.is_deleted', 0);
        $this->db->limit($limit, $start);
        if($store != ''){
            $this->db->group_start();
            $this->db->where('menu.store', $store);
            $this->db->or_where('menu.store', 3);
            $this->db->group_end();
        }
        $this->db->group_by('menu_lang.menu_id');
        $this->db->order_by("menu.id", "desc");

        return $result = $this->db->get()->result_array();
    }

    /**
     *
     * model for frontend
     *
     */
    
    public function get_latest_article_special($lang, $status = null, $store = 1, $limit = null, $start = null){
        $this->db->select('menu.*, menu.id as menu_id, menu_lang.*, category_lang.name as cate_name');
        $this->db->from('menu');
        $this->db->join('menu_lang', 'menu_lang.menu_id = menu.id');
        $this->db->join('category', 'category.id = menu.category_id');
        $this->db->join('category_lang', 'category_lang.category_id = category.id');
        $this->db->where('menu_lang.language', $lang);
        $this->db->where('category_lang.language', $lang);
        if($status != null){
            $this->db->where('menu.status', $status);
        }
        $this->db->where('menu.is_deleted', 0);
        $this->db->group_start();
        $this->db->where('menu.store', $store);
        $this->db->or_where('menu.store', 3);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        $this->db->order_by("menu.id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function get_latest_article($lang, $status = null, $category = null, $store = 1, $limit = null){
        $this->db->select('menu.*, menu.id as menu_id, menu_lang.*, category_lang.name as cate_name');
        $this->db->from('menu');
        $this->db->join('menu_lang', 'menu_lang.menu_id = menu.id');
        $this->db->join('category', 'category.id = menu.category_id');
        $this->db->join('category_lang', 'category_lang.category_id = category.id');
        $this->db->where('menu_lang.language', $lang);
        $this->db->where('category_lang.language', $lang);
        if($status != null){
            $this->db->where('menu.status', $status);
        }
        if($category != null){
            $this->db->where('menu.category_id', $category);
        }

        $this->db->where('menu.is_deleted', 0);
        $this->db->group_start();
        $this->db->where('menu.store', $store);
        $this->db->or_where('menu.store', 3);
        $this->db->group_end();
        if($limit != null){
            $this->db->order_by("menu.id", "RANDOM");
            $this->db->limit($limit, 0);
        }
        $this->db->order_by("menu.id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function get_row_latest_article($lang, $status){
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('menu_lang', 'menu_lang.menu_id = menu.id', 'left');
        $this->db->where('menu_lang.language', $lang);
        $this->db->where('status', $status);
        $this->db->where('menu.is_deleted', 0);
        $this->db->limit(1);
        $this->db->order_by("menu.id", "desc");

        return $result = $this->db->get()->row_array();
    }
    
}