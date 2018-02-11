<?php
/**
* 
*/
class Menu extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('menu_model');
	}
	public function index(){
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->menu_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->menu_model->count_search($keywords);
        }

		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('admin/menu/index');
		$per_page = 10;
		$uri_segment = 4;
		foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->menu_model->get_all_with_pagination_search($per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->menu_model->get_all_with_pagination_search($per_page, $this->data['page'], $keywords);
        }
        $output = array();
        foreach($result as $key => $value){
            $output[$key]['id'] = $value['id'];
            $output[$key]['data'] = $this->menu_model->get_by_id($value['id']);
            $seperate = explode(' ||| ', $output[$key]['data']['menu_slug']);
            $output[$key]['slug_en'] = $seperate[0];
            $image = json_decode($output[$key]['data']['image']);
            if($image){
                $output[$key]['data']['image'] = $image[0];
            }
        	
        }
        $this->data['menu'] = $output;

		$this->render('admin/menu/list_menu_view');
	}

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name-en', 'Name', 'required');
		$this->form_validation->set_rules('name-hu', 'Név', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){
                $slug_en = $this->input->post('slug-en');
                $slug_hu = $this->input->post('slug-hu');
                $unique_slug_en = $this->menu_model->build_unique_slug($slug_en, 'en');
                $unique_slug_hu = $this->menu_model->build_unique_slug($slug_hu, 'hu');

                if(!file_exists("assets/upload/menu/".$unique_slug_en)){
                    mkdir("assets/upload/menu/".$unique_slug_en, 0755);
                }
                $image_list = $this->upload_file('./assets/upload/menu/'.$unique_slug_en, 'image_list');
				$image = json_encode($image_list);
				$data = array(
                        'image' => $image,
                        'price' => $this->input->post('price'),
                        'type' => $this->input->post('type'),
                        'created_at'    => $this->author_info['created'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
                    try {
                        $menu_id = $this->menu_model->insert($data);
                        $data_en = array(
                        	'menu_id' => $menu_id,
                        	'name' => $this->input->post('name-en'),
                        	'slug' => $unique_slug_en,
                            'folder' => $unique_slug_en,
                        	'description' => $this->input->post('description-en'),
                        	'language' => 'en'
                        );
                        $data_hu = array(
                        	'menu_id' => $menu_id,
                        	'name' => $this->input->post('name-hu'),
                        	'slug' => $unique_slug_hu,
                            'folder' => $unique_slug_en,
                        	'description' => $this->input->post('description-hu'),
                        	'language' => 'hu'
                        );
                        $this->menu_model->insert_with_language($data_en, $data_hu);

                        $this->session->set_flashdata('message', 'Add is success');
                    }catch (Exception $e) {
                        $this->session->set_flashdata('message', 'Add is failures: ' . $e->getMessage());
                    }
                    redirect('admin/menu/index', 'refresh');
        	}
		}

		$this->render('admin/menu/create_menu_view');
	}


	public function edit($id){
		$menu = $this->menu_model->get_by_id($id);
        if(!$menu){
            redirect('admin/menu/index','refresh');
        }

        $name = explode('|||', $menu['menu_name']);
        $menu['name_en'] = $name[0];
        $menu['name_hu'] = $name[1];

        $description = explode('|||', $menu['menu_description']);
        $menu['description_en'] = $description[0];
        $menu['description_hu'] = $description[1];

        $slug = explode('|||', $menu['menu_slug']);
        $menu['slug_en'] = $slug[0];
        $menu['slug_hu'] = $slug[1];

        $menu['image'] = json_decode($menu['image']);
		$this->data['menu'] = $menu;
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name-en', 'Name', 'required');
        $this->form_validation->set_rules('name-hu', 'Név', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){


                $menu_en = $this->menu_model->get_by_id_with_table_lang($this->input->post('slug-en'), 'en');
                $menu_hu = $this->menu_model->get_by_id_with_table_lang($this->input->post('slug-hu'), 'hu');
                // echo $menu_en['id'].'-'.$menu_hu['id'];die;
                $slug_en = $this->input->post('slug-en');
                $slug_hu = $this->input->post('slug-hu');
                $unique_slug_en = $this->menu_model->build_unique_slug($slug_en, 'en', $menu_en['id']);
                $unique_slug_hu = $this->menu_model->build_unique_slug($slug_hu, 'hu', $menu_hu['id']);
                $image = $this->upload_file('./assets/upload/menu/'.$unique_slug_en, 'image_list');

				$data = array(
                        'price' => $this->input->post('price'),
                        'type' => $this->input->post('type'),
                        'created_at'    => $this->author_info['created'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
                if($image){
                	$upload = $menu['image'];
                	foreach ($image as $key => $value) {
                		$upload[] = $value;
                	}
                	$new_upload = json_encode($upload);
                    $data['image'] = $new_upload;

                }
				
                try {
                    $this->menu_model->update($id, $data);
                    $data_en = array(
                        'menu_id' => $id,
                    	'name' => $this->input->post('name-en'),
                    	'slug' => $unique_slug_en,
                        'folder' => $unique_slug_en,
                    	'description' => $this->input->post('description-en'),
                    	'language' => 'en'
                    );
                    $this->menu_model->update_with_language_en($id, $data_en);
                    $data_hu = array(
                        'menu_id' => $id,
                    	'name' => $this->input->post('name-hu'),
                    	'slug' => $unique_slug_hu,
                        'folder' => $unique_slug_en,
                    	'description' => $this->input->post('description-hu'),
                    	'language' => 'hu'
                    );
                    $this->menu_model->update_with_language_hu($id, $data_hu);
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật thất bại: ' . $e->getMessage());
                }
                redirect('admin/menu/index', 'refresh');
        	}
		}

		$this->render('admin/menu/edit_menu_view');
	}

	public function remove(){
		$id = $_GET['id'];
		$slug = $this->input->get('slug');
		$slug = explode(' ', $slug);
		$slug = $slug[0];
		$menu = $this->menu_model->get_by_id_table($id);
		$image = json_decode($menu['image']);
        if($this->menu_model->remove($id) == true){
            $this->menu_model->remove_table_lang($id);
            foreach ($image as $key => $value) {
            	unlink('assets/upload/menu/'.$slug.'/'.$value);
            }
            rmdir('assets/upload/menu/'.$slug);
        }
	}

	public function delete_image(){
		$image = $this->input->get('image');
		$id = $this->input->get('id');
		$slug = $this->input->get('slug');
		$slug = explode(' ', $slug);
		$slug = $slug[0];
		$menu = $this->menu_model->get_by_id_table($id);

		$upload = [];
		$upload = json_decode($menu['image']);
		$key = array_search($image, $upload);
		unset($upload[$key]);
		unlink('assets/upload/menu/'.$slug.'/'.$image);
		$newUpload = [];
        foreach ($upload as $key => $value) {
            $newUpload[] = $value;
        }
        
        $image_json = json_encode($newUpload);
        $data = array('image' => $image_json);
		$this->menu_model->update($id, $data);
	}

    public function special(){
        $id = $_GET['id'];
        $isExists = false;
        $where = array('status' => 1);
        if($this->menu_model->update($id, $where) == true){
            $isExists = true;
        }
        
        $this->output->set_status_header(200)->set_output(json_encode(array('isExists' => $isExists)));
    }

    public function unspecialized()
    {
        $id = $_GET['id'];
        $isExists = false;
        $where = array('status' => 0);
        if($this->menu_model->update($id, $where) == true){
            $isExists = true;
        }
        
        $this->output->set_status_header(200)->set_output(json_encode(array('isExists' => $isExists)));
    }
}