<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index() {
        $this->data['current_link'] = 'homepage';

        $this->render('homepage_view');
    }

}