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
    	
    	// $this->load->library('pagination');
     //    $base_url = base_url() . 'menu';
     //    $total_rows = $this->menu_model->count_all_for_list_admin();
     //    $per_page = 10;
     //    $uri_segment = 3;
     //    $config = $this->pagination_config($base_url, $total_rows, $per_page, $uri_segment);
     //    $this->pagination->initialize($config);

     //    $this->data['page_links'] = $this->pagination->create_links();
     //    $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->data['main_menu'] = $this->menu_model->get_latest_article($this->data['lang'], null, null, null, 0);
        $this->data['cocktail_card'] = $this->menu_model->get_latest_article($this->data['lang'], null, null, null, 1);
        $special = $this->menu_model->get_latest_article($this->data['lang'], 1, 3, 0);
        foreach ($special as $key => $value) {
        	$images = json_decode($value['image']);
        	$special[$key]['image'] = $images[0];
        }
        $this->data['special'] = $special;
        $this->data['current_link'] = 'menu';

        $this->render('menu_view');
    }
}

