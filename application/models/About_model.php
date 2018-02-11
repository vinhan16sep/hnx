<?php
/**
* 
*/
class About_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function insert($data){
		$this->db->set($data)->insert('about');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
	}

	public function insert_with_language($data_en, $data_hu){
        $data_merge = array($data_en, $data_hu);
        return $this->db->insert_batch('about_lang', $data_merge);
    }

    public function get_all_with_pagination($limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('about');
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

	public function get_all_with_pagination_search($limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select('about.*');
        $this->db->from('about');
        $this->db->join('about_lang', 'about_lang.about_id = about.id');
        $this->db->like('about_lang.name', $keywords);
        $this->db->where('about.is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->group_by('about_lang.about_id');
        $this->db->order_by("about.id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function count_search($keyword = ''){
        $this->db->select('*');
        $this->db->from('about');
        $this->db->join('about_lang', 'about_lang.about_id = about.id');
        $this->db->like('about_lang.name', $keyword);
        $this->db->group_by('about_lang.about_id');
        $this->db->where('about.is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

    public function count_all_for_list_admin() {
        $this->db->select('*');
        $this->db->from('about');
        $this->db->where('is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

    public function get_by_id($id, $lang = '') {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select('about.*, GROUP_CONCAT(about_lang.name ORDER BY about_lang.language separator \' ||| \') as about_name, 
                            GROUP_CONCAT(about_lang.position ORDER BY about_lang.language separator \' ||| \') as about_position,
                            GROUP_CONCAT(about_lang.slug ORDER BY about_lang.language separator \' ||| \') as about_slug');
        $this->db->from('about');
        $this->db->join('about_lang', 'about_lang.about_id = about.id', 'left');
        if($lang != ''){
            $this->db->where('about_lang.language', $lang);
        }
        $this->db->where('about.is_deleted', 0);
        $this->db->where('about.id', $id);
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }

    public function get_by_id_with_table_lang($slug = '', $lang = ''){
        $this->db->select('*');
        $this->db->from('about_lang');
        $this->db->where('slug', $slug);
        $this->db->where('language', $lang);

        return $result = $this->db->get()->row_array();
    }



	public function update($id, $data) {
        $this->db->where('id', $id);

        return $this->db->update('about', $data);
    }

    public function update_with_language_en($id, $data_en){
        $this->db->where('about_id', $id);
        $this->db->where('language', 'en');
        return $this->db->update('about_lang', $data_en);
    }

    public function update_with_language_hu($id, $data_hu){
        $this->db->where('about_id', $id);
        $this->db->where('language', 'hu');
        return $this->db->update('about_lang', $data_hu);
    }

	public function remove($id) {
        $this->db->set('is_deleted', 1);
		$this->db->where('id', $id);
		$this->db->update('about');
        return true;
    }

    public function remove_table_lang($id){
        $this->db->where('about_id', $id);
        $this->db->delete('about_lang');
        return true;
    }

    public function get_by_id_table($id){
        $this->db->select('*');
        $this->db->from('about');
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
            $query = $this->db->get('about_lang');
            if ($query->num_rows() == 0) break;
            $temp_slug = $slug . '-' . (++$count);
        }
        return $temp_slug;
    }

    /**
     *
     * select frontend
     *
     */
    
    public function get_latest_article($lang){
        $this->db->select('*');
        $this->db->from('about');
        $this->db->join('about_lang', 'about_lang.about_id = about.id', 'left');
        $this->db->where('about_lang.language', $lang);
        $this->db->where('about.is_deleted', 0);
        $this->db->limit(3);
        $this->db->order_by("about.id", "desc");

        return $result = $this->db->get()->result_array();
    }
    
}