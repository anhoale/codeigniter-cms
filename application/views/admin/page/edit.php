
<h3 class="page-title"><?php echo empty($page->id) ? 'Add a new page': 'Edit page '.$page->id; ?></h3>


<?php echo validation_errors(); ?>

	<form method="post" accept-charset="utf-8" class='login-form'>
		<div class="form-group">
		    <label>Parent</label>
		    <?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ?$this->input->post('parent_id') : $page->parent_id); ?>
	  	</div>
		<div class="form-group">
		    <label>Template</label>
		    <?php 
		    echo form_dropdown('template', 
		    		array('page' => 'Page', "news_archive" => "News Archive", "homepage" => 'Homepage'),
		    		$this->input->post('template') ?$this->input->post('template') : $page->template
		    		);
		    ?>
	  	</div>

		<div class="form-group">
		    <label>Title</label>
		    <input type="text" class="form-control" id="title" name="title" placeholder="Please enter page title" value="<?php echo set_value('title',$page->title); ?>">
	  	</div>

		<div class="form-group">
		    <label>Slug</label>
		    <input type="slug" class="form-control" id="slug" name="slug" placeholder="Please enter slug" value="<?php echo set_value('slug', $page->slug); ?>">
	  	</div>

	  	<div class="form-group">
	    	<label>Body</label>
	    	<?php echo form_textarea('body',set_value('body',$page->body), 'class="form-control tinymce"'); ?>
	  	</div>

	
	   <div class="form-group">
	   	 	<button type="submit" name="submit" class="btn btn-primary">Save</button>
	   </div>
	
	</form>

