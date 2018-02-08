<?php
/**
* 
*/
class Order extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->data['orders'] = null;
		$this->render('admin/order/list_order_view');
	}
}