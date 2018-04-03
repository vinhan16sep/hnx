<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
        $this->data['show_intro_popup'] = true;
        // $this->data['popup_content'] = $this->intro_model->get_by_id(1, $this->data['lang']);
    }

    public function index(){
        $this->output->enable_profiler(TRUE);
        $this->load->model('menu_model');
        $menu_last = $this->menu_model->get_row_latest_article($this->data['lang'], 1);
        $menu_last['image'] = json_decode($menu_last['image'])[0];
        

        $menu_image_icon = $this->menu_model->get_latest_article($this->data['lang'], 1, 2, 1);
        foreach ($menu_image_icon as $key => $value) {
            $menu_image_icon[$key]['image'] = json_decode($value['image'])[0];
        }

        $main_menu = $this->menu_model->get_latest_article($this->data['lang'], null, null, 1, 9);
        
        $this->data['menu_last'] = $menu_last;
        $this->data['menu_image_icon'] = $menu_image_icon;
        $this->data['main_menu'] = $main_menu;

        // print_r($main_menu);die;
        $this->data['current_link'] = 'homepage';
        $this->render('homepage_view');
    }
}
