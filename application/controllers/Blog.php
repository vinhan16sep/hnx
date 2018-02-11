<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('blog_model');
        // $this->load->model('cover_model');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index() {
        redirect('/', 'refresh');
    }

    public function list_information(){
        $this->load->library('pagination');
        $base_url = base_url() . 'blog/list_information';
        $total_rows = $this->blog_model->count_all(0);
        $per_page = 10;
        $uri_segment = 3;
        $config = $this->pagination_config($base_url, $total_rows, $per_page, $uri_segment);
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $result = $this->blog_model->get_all_with_pagination_and_lang($per_page, $this->data['page'], $this->data['lang']);

        $this->data['current_link'] = 'list_information';
        // $this->data['latest_articles'] = $this->blog_model->get_latest_article($this->data['lang'], 0);
        // $this->data['most_viewed'] = $this->blog_model->fetch_most_viewed_article(0, $this->data['lang']);
        $this->data['blog'] = $result;

        // print_r($result);die;
        // $this->data['cover'] = $this->cover_model->get_by_id(1);
        $this->render('blog_view');
    }

    public function list_medicine(){
        $this->load->library('pagination');
        $base_url = base_url() . 'blog/list_medicine';
        $total_rows = $this->blog_model->count_all(1);
        $per_page = 1;
        $uri_segment = 3;
        $config = $this->pagination_config($base_url, $total_rows, $per_page, $uri_segment);
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $result = $this->blog_model->get_all_with_pagination_and_lang($per_page, $this->data['page'], $this->data['lang'], 1);

        $this->data['current_link'] = 'list_medicine';
        $this->data['latest_articles'] = $this->blog_model->get_latest_article($this->data['lang'], 1);
        $this->data['most_viewed'] = $this->blog_model->fetch_most_viewed_article(1, $this->data['lang']);
        $this->data['blog'] = $result;
        // $this->data['cover'] = $this->cover_model->get_by_id(2);
        $this->render('blog_view');
    }

    public function detail($slug = NULL){
        $this->data['current_link'] = 'blog_detail';
        $this->data['slug'] = $slug;
        $this->data['blog'] = $this->blog_model->get_by_slug($slug, $this->data['lang']);
        // print_r($this->data['blog']);die;

        if (!$this->data['blog']['blog_slug']) {
            redirect('', 'refresh');
        }
        // $data = array(
        //     'viewed' => (int)$this->data['blog']['viewed'] + 1
        // );
        // $this->blog_model->update_view_number($blog_id, $data);

        $this->render('detail_blogs_view');
    }

}
