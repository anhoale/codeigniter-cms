<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public $data = array();
	
	function __construct() {
		parent::__construct();
		$this->load->helper('security');
		$this->load->helper('language');
		// Load language file
		$this->lang->load('en_admin', 'english');
		$this->data['errors'] = array();
		$this->data['site_name'] = config_item('site_name');
	}

}