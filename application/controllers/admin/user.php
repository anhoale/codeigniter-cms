<?php 
class User extends Admin_Controller{
	
	public function __construct(){

		parent::__construct();
	}

	public function index(){
		//Fetch all users
		$this->data['users'] = $this->user_m->get();
		
		//Load view
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($id = NULL){
		//Fetch a user or set a new one
		if ($id) {
			$this->data['user'] = $this->user_m->get($id);
			count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
		} 
		else {
			//to avoid Error : Trying to get property of non-object triggered by set_value  to repopulate the form when adding new user
			$this->data['user'] = $this->user_m->get_new();
		}

		//set up the form
		$rules = $this->user_m->rules_admin;
		//password field will be empty if update existing users, but is required if new user is added
		$id || $rules['password']['rules'] .= '|required' ;
		$this->form_validation->set_rules($rules);

		//Process the form
		if ($this->form_validation->run()  == TRUE) {
			$data = $this->user_m->array_from_post(array('name', 'email', 'password'));
			
			//if user don't want to update password, remove the password from data array
			if ($id != null && $data['password'] == '') {
				unset($data['password']);
			} else {
				$data['password'] = $this->user_m->hash($data['password']);
			}

			$this->user_m->save($data, $id);
			redirect('admin/user');
		}

		//Load the view
		$this->data['subview'] = 'admin/user/edit';
		$this->load->view('admin/_layout_main', $this->data);

	}

	public function delete($id){
		$this->user_m->delete($id);
		redirect('admin/user');
	}


	public function login(){
		//redirect a user if he's already logged in
		$dashboard = 'admin/dashboard';
		//if the user is not logged in -> continue, otherwise redirect to dashboard
		$this->user_m->loggedin() == FALSE || redirect($dashboard);
		//set form
		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);
		//process form
		if ($this->form_validation->run()  == TRUE) {
			//we can login and redirect
			if ($this->user_m->login() == TRUE) {
				redirect($dashboard);
			}
			else {
				$this->session->set_flashdata('error', 'That email/password combination does not exist.');
				redirect('admin/user/login', 'refresh');
			}

		}
		//load view
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_layout_modal', $this->data);
	}

	public function logout(){

		$this->user_m->logout();
		redirect('admin/user/login');
	}

	public function _unique_email($str) {
		// Do NOT validate if email already exists UNLESS it's the email for the current user
		$id = $this->uri->segment(4);
		$this->db->where('email', $this->input->post('email'));
		//let assume we don't have user_id, if we do have to exclude that id from the unique search
		!$id || $this->db->where('id != ', $id);
		$user = $this->user_m->get();

		if (count($user)) {
			$this->form_validation->set_message('_unique_email','%s should be unique');
			return FALSE;
		}

		return TRUE;
	}

}