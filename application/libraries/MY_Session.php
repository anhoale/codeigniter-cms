<?php 
class MY_Session extends CI_Session {
	//only update a session if it is not an ajax request
	function sess_update() {
		//Listen to HTTP_X_REQUESTED_WITH
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])  && $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
			parent::sess_update();
		}
	}
}

