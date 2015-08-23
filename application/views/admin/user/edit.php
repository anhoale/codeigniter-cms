<section>
<h2 class="page-title"><?php echo empty($user->id) ? 'Add a new User': 'Edit user '.$user->id; ?></h2>


<div class="modal-body">
<?php if($this->session->flashdata('error')) : ?>
	<div class="alert alert-danger">
		<?php echo $this->session->flashdata('error'); ?>
	</div>
<?php endif; ?>
<?php echo validation_errors(); ?>

	<form method="post" accept-charset="utf-8" class='login-form'>
		<div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Please enter name" value="<?php echo set_value('name',$user->name); ?>">
	  	</div>

		<div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Please enter Email" value="<?php echo set_value('email', $user->email); ?>">
	  	</div>

	  	<div class="form-group">
	    	<label for="email"><?php echo empty($user->id) ? '': 'Reset ' ;?>Password</label>
	    	<input type="password" class="form-control" id="password" name="password" >
	  	</div>

	  	<div class="form-group">
	    	<label for="password_confirm">Confirm Password</label>
	    	<input type="password" class="form-control" id="password_confirm" name="password_confirm" >
	  	</div>
	
	   <div class="form-group">
	   	 	<button type="submit" name="submit" class="btn btn-primary">Save</button>
	   </div>
	
	</form>

</div>
</section>