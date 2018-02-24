<?php
class Category extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('category_model');
	}

	public function index(){
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->category_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->category_model->count_search($keywords);
        }

		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('admin/category/index');
		$per_page = 10;
		$uri_segment = 4;
		foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->category_model->get_all_with_pagination_search($per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->category_model->get_all_with_pagination_search($per_page, $this->data['page'], $keywords);
        }
        // print_r($result);die;

        $output = array();
        foreach($result as $key => $value){
            $output[$key]['id'] = $value['id'];
            $output[$key]['data'] = $this->category_model->get_by_id($value['id']);
        }
        $this->data['category'] = $output;
        // print_r($output);die;


		$this->render('admin/category/list_category_view');
	}

	public function create(){
		$this->load->model('category_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name-en', 'Name', 'required');
		$this->form_validation->set_rules('name-hu', 'Név', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){
                $slug_en = $this->input->post('slug-en');
                $slug_hu = $this->input->post('slug-hu');
                $unique_slug_en = $this->category_model->build_unique_slug($slug_en, 'en');
                $unique_slug_hu = $this->category_model->build_unique_slug($slug_hu, 'hu');
				$data = array(
                        'created_at'    => $this->author_info['created'],
                        'created_by'    => $this->author_info['created_by'],
                        'updated_at'   => $this->author_info['modified'],
                        'updated_by'   => $this->author_info['modified_by']
                    );
                    try {
                        $category_id = $this->category_model->insert($data);
                        $data_en = array(
                        	'category_id' => $category_id,
                        	'name' => $this->input->post('name-en'),
                        	'slug' => $unique_slug_en,
                        	'language' => 'en'
                        );
                        $data_hu = array(
                        	'category_id' => $category_id,
                        	'name' => $this->input->post('name-hu'),
                        	'slug' => $unique_slug_hu,
                        	'language' => 'hu'
                        );
                        $this->category_model->insert_with_language($data_en, $data_hu);

                        $this->session->set_flashdata('message', 'Add is success');
                    }catch (Exception $e) {
                        $this->session->set_flashdata('message', 'Add is failures: ' . $e->getMessage());
                    }
                    redirect('admin/category/index', 'refresh');
        	}
		}

		$this->render('admin/category/create_category_view');
	}

	public function edit($id){

		$this->load->model('category_model');
		$category = $this->category_model->get_by_id($id);
        if(!$category){
            redirect('admin/category/index','refresh');
        }

        $name = explode('|||', $category['category_name']);
        $category['name_en'] = $name[0];
        $category['name_hu'] = $name[1];


        $slug = explode('|||', $category['category_slug']);
        $category['slug_en'] = $slug[0];
        $category['slug_hu'] = $slug[1];

        

        // print_r($id_en);die;
		$this->data['category'] = $category;
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name-en', 'Name', 'required');
        $this->form_validation->set_rules('name-hu', 'Név', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){

                $category_en = $this->category_model->get_by_id_with_table_lang($this->input->post('slug-en'), 'en');
                $category_hu = $this->category_model->get_by_id_with_table_lang($this->input->post('slug-hu'), 'hu');
                // echo $category_en['id'].'-'.$category_hu['id'];die;
                $slug_en = $this->input->post('slug-en');
                $slug_hu = $this->input->post('slug-hu');
                $unique_slug_en = $this->category_model->build_unique_slug($slug_en, 'en', $category_en['id']);
                $unique_slug_hu = $this->category_model->build_unique_slug($slug_hu, 'hu', $category_hu['id']);

				$data = array(
                        'created_at'    => $this->author_info['created'],
                        'created_by'    => $this->author_info['created_by'],
                        'updated_at'   => $this->author_info['modified'],
                        'updated_by'   => $this->author_info['modified_by']
                    );
				
                try {
                    $this->category_model->update($id, $data);
                    $data_en = array(
                        'category_id' => $id,
                        'name' => $this->input->post('name-en'),
                        'slug' => $unique_slug_en,
                        'language' => 'en'
                    );
                    $this->category_model->update_with_language_en($id, $data_en);
                    $data_hu = array(
                        'category_id' => $id,
                        'name' => $this->input->post('name-hu'),
                        'slug' => $unique_slug_hu,
                        'language' => 'hu'
                    );
                    $this->category_model->update_with_language_hu($id, $data_hu);
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật thất bại: ' . $e->getMessage());
                }
                redirect('admin/category/index', 'refresh');
        	}
		}

		$this->render('admin/category/edit_category_view');
	}

	public function remove(){
		$this->load->model('category_model');
		$id = $_GET['id'];
		$category = $this->category_model->get_by_id_table($id);
        if($this->category_model->remove($id) == true){
            $this->category_model->remove_table_lang($id);
        }
	}
}