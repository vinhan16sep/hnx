<?php 
/**
* 
*/
class About extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('about_model');
	}

	public function index(){

		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->about_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->about_model->count_search($keywords);
        }

		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('admin/about/index');
		$per_page = 10;
		$uri_segment = 4;
		foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->about_model->get_all_with_pagination_search($per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->about_model->get_all_with_pagination_search($per_page, $this->data['page'], $keywords);
        }
        // print_r($result);die;

        $output = array();
        foreach($result as $key => $value){
            $output[$key]['id'] = $value['id'];
            $output[$key]['data'] = $this->about_model->get_by_id($value['id']);
        }
        $this->data['abouts'] = $output;
        // print_r($output);die;

		$this->render('admin/about/list_about_view');
	}


	public function create(){
		$this->load->model('about_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name-en', 'Name', 'required');
		$this->form_validation->set_rules('name-hu', 'Név', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){
				$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/about', '');
                $slug_en = $this->input->post('slug-en');
                $slug_hu = $this->input->post('slug-hu');
                $unique_slug_en = $this->about_model->build_unique_slug($slug_en, 'en');
                $unique_slug_hu = $this->about_model->build_unique_slug($slug_hu, 'hu');
				$data = array(
                        'image' => $image,
                        'facebook' => $this->input->post('facebook'),
                        'instagram' => $this->input->post('instagram'),
                        'created_at'    => $this->author_info['created'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
                    try {
                        $about_id = $this->about_model->insert($data);
                        $data_en = array(
                        	'about_id' => $about_id,
                        	'name' => $this->input->post('name-en'),
                        	'slug' => $unique_slug_en,
                        	'position' => $this->input->post('position-en'),
                        	'language' => 'en'
                        );
                        $data_hu = array(
                        	'about_id' => $about_id,
                        	'name' => $this->input->post('name-hu'),
                        	'slug' => $unique_slug_hu,
                        	'position' => $this->input->post('position-hu'),
                        	'language' => 'hu'
                        );
                        $this->about_model->insert_with_language($data_en, $data_hu);

                        $this->session->set_flashdata('message', 'Add is success');
                    }catch (Exception $e) {
                        $this->session->set_flashdata('message', 'Add is failures: ' . $e->getMessage());
                    }
                    redirect('admin/about/index', 'refresh');
        	}
		}

		$this->render('admin/about/create_about_view');
	}

	public function edit($id){

		$this->load->model('about_model');
		$about = $this->about_model->get_by_id($id);
        if(!$about){
            redirect('admin/about/index','refresh');
        }

        $name = explode('|||', $about['about_name']);
        $about['name_en'] = $name[0];
        $about['name_hu'] = $name[1];

        $position = explode('|||', $about['about_position']);
        $about['position_en'] = $position[0];
        $about['position_hu'] = $position[1];

        $slug = explode('|||', $about['about_slug']);
        $about['slug_en'] = $slug[0];
        $about['slug_hu'] = $slug[1];

        

        // print_r($id_en);die;
		$this->data['about'] = $about;
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name-en', 'Name', 'required');
        $this->form_validation->set_rules('name-hu', 'Név', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){
				$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/about', '');

                $about_en = $this->about_model->get_by_id_with_table_lang($this->input->post('slug-en'), 'en');
                $about_hu = $this->about_model->get_by_id_with_table_lang($this->input->post('slug-hu'), 'hu');
                // echo $about_en['id'].'-'.$about_hu['id'];die;
                $slug_en = $this->input->post('slug-en');
                $slug_hu = $this->input->post('slug-hu');
                $unique_slug_en = $this->about_model->build_unique_slug($slug_en, 'en', $about_en['id']);
                $unique_slug_hu = $this->about_model->build_unique_slug($slug_hu, 'hu', $about_hu['id']);

				$data = array(
                        'facebook' => $this->input->post('facebook'),
                        'instagram' => $this->input->post('instagram'),
                        'created_at'    => $this->author_info['created'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
                if($image){
                    $data['image'] = $image;
                }
				
                try {
                    $this->about_model->update($id, $data);
                    $data_en = array(
                        'about_id' => $id,
                        'name' => $this->input->post('name-en'),
                        'slug' => $unique_slug_en,
                        'position' => $this->input->post('position-en'),
                        'language' => 'en'
                    );
                    $this->about_model->update_with_language_en($id, $data_en);
                    $data_hu = array(
                        'about_id' => $id,
                        'name' => $this->input->post('name-hu'),
                        'slug' => $unique_slug_hu,
                        'position' => $this->input->post('position-hu'),
                        'language' => 'hu'
                    );
                    $this->about_model->update_with_language_hu($id, $data_hu);
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật thất bại: ' . $e->getMessage());
                }
                redirect('admin/about/index', 'refresh');
        	}
		}

		$this->render('admin/about/edit_about_view');
	}

	public function remove(){
		$this->load->model('about_model');
		$id = $_GET['id'];
		$about = $this->about_model->get_by_id_table($id);
        if($this->about_model->remove($id) == true){
            $this->about_model->remove_table_lang($id);
            unlink('assets/upload/about/'.$about['image']);
        }
	}
}