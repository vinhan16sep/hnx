<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
        $this->load->model('about_model');
    }

    public function index(){
    	$this->data['current_link'] = 'about';
    	$about = $this->about_model->get_latest_article($this->data['lang']);
    	$this->data['abouts'] = $about;
        $this->render('about_view');
    }

    public function about_2(){
        $this->data['current_link'] = 'about';
        $about = $this->about_model->get_latest_article($this->data['lang']);
        $this->data['abouts'] = $about;
        $this->render('about_2_view');
    }
}
