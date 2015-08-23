<?php
class Admin_Controller extends MY_Controller {

	public function __construct ()
	{
		parent::__construct();
		$this->data['meta_title'] = "Amelia's Adventures";
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('MY_Form_Validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->load->model('user_m');

		//login_check if user already logged in
		$exception_uris = array('admin/user/login', 'admin/user/logout');
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->user_m->loggedin() == FALSE) {
				redirect('admin/user/login');
			}

		}


		

		
	}
}