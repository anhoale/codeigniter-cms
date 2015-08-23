<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h3 class="modal-title">Log in</h3>
<p>Please Log In using your credentials</p>
</div>

<div class="modal-body">
<?php if($this->session->flashdata('error')) : ?>
	<div class="alert alert-danger">
		<?php echo $this->session->flashdata('error'); ?>
	</div>
<?php endif; ?>
<?php echo validation_errors(); ?>
	<form method="post" accept-charset="utf-8" class='login-form'>
	  <div class="form-group">
	    <label for="email">Email address</label>
	    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
	   
	  </div>
	   <div class="form-group">
	    <button type="submit" name="submit" class="btn btn-primary">Log In</button>
	   </div>
	
	</form>

</div>