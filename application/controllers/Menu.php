<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
        $this->load->model('menu_model');
    }

    public function index(){
        $this->output->enable_profiler(TRUE);
    	// $this->load->library('pagination');
     //    $base_url = base_url() . 'menu';
     //    $total_rows = $this->menu_model->count_all_for_list_admin();
     //    $per_page = 10;
     //    $uri_segment = 3;
     //    $config = $this->pagination_config($base_url, $total_rows, $per_page, $uri_segment);
     //    $this->pagination->initialize($config);

     //    $this->data['page_links'] = $this->pagination->create_links();
     //    $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->load->model('category_model');
        $category_main_menu = $this->category_model->get_by_type(0);
        $category_cocktail_card = $this->category_model->get_by_type(1);
        $category_main_menu = $this->convert_dropdown($category_main_menu);
        $category_cocktail_card = $this->convert_dropdown($category_cocktail_card);
        $main_menu = array();
        $cocktail_card = array();
        foreach ($category_main_menu as $key => $value) {
            $main_menu[$value] = $this->menu_model->get_latest_article($this->data['lang'], 0, $key, 1);
        }
        $this->data['main_menu'] = $main_menu;

        foreach ($category_cocktail_card as $key => $value) {
            $cocktail_card[$value] = $this->menu_model->get_latest_article($this->data['lang'], 0, $key, 1);
        }
        $this->data['cocktail_card'] = $cocktail_card;

        
        $special = $this->menu_model->get_latest_article_special($this->data['lang'], 1, 1, 3, 0 );
        foreach ($special as $key => $value) {
        	$images = json_decode($value['image']);
        	$special[$key]['image'] = $images[0];
        }
        $this->data['special'] = $special;
        $this->data['current_link'] = 'menu';

        $this->render('menu_view');
    }

    public function store_2(){

        $this->load->model('category_model');
        $category_main_menu = $this->category_model->get_by_type(0);
        $category_cocktail_card = $this->category_model->get_by_type(1);
        $category_main_menu = $this->convert_dropdown($category_main_menu);
        $category_cocktail_card = $this->convert_dropdown($category_cocktail_card);
        $main_menu = array();
        $cocktail_card = array();
        foreach ($category_main_menu as $key => $value) {
            $main_menu[$value] = $this->menu_model->get_latest_article($this->data['lang'], 0, $key, 2);
        }
        $this->data['main_menu'] = $main_menu;

        foreach ($category_cocktail_card as $key => $value) {
            $cocktail_card[$value] = $this->menu_model->get_latest_article($this->data['lang'], 0, $key, 2);
        }
        $this->data['cocktail_card'] = $cocktail_card;

        
        $special = $this->menu_model->get_latest_article_special($this->data['lang'], 1, 2, 3, 0 );
        foreach ($special as $key => $value) {
            $images = json_decode($value['image']);
            $special[$key]['image'] = $images[0];
        }
        $this->data['special'] = $special;
        $this->data['current_link'] = 'store_2';

        $this->render('menu_view');
    }

    protected function convert_dropdown($category){
        $dropdown = array();
        if(!empty($category)){
            foreach ($category as $key => $value) {
                $dropdown[$value['id']] = $value['name']; 
            }
        }

        return $dropdown;
    }
}

