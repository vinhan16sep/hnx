<?php
/**
* 
*/
class About_lang_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function insert_with_language($data_en, $data_hu){
        $data_merge = array($data_en, $data_hu);
        return $this->db->insert_batch('blog_lang', $data_merge);
    }
}