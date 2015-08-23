
<h3 class="article-title"><?php echo empty($article->id) ? 'Add a new article': 'Edit article '.$article->id; ?></h3>


<?php echo validation_errors(); ?>

	<form method="post" accept-charset="utf-8" class='login-form'>
		<div class="form-group">
		    <label>Publication Date</label>
		    <div class='input-group date' id="datetimepicker1">
		    	<input type="text" class="form-control" id="pubdate" name="pubdate" value="<?php echo set_value('title',format_date($article->pubdate)); ?>">
		    	<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
		    </div>
	  	</div>

		<div class="form-group">
		    <label>Title</label>
		    <input type="text" class="form-control" id="title" name="title" placeholder="Please enter article title" value="<?php echo set_value('title',$article->title); ?>">
	  	</div>

		<div class="form-group">
		    <label>Slug</label>
		    <input type="slug" class="form-control" id="slug" name="slug" placeholder="Please enter slug" value="<?php echo set_value('slug', $article->slug); ?>">
	  	</div>

	  	<div class="form-group">
	    	<label>Body</label>
	    	<?php echo form_textarea('body',set_value('body',$article->body), 'class="form-control tinymce"'); ?>
	  	</div>

	
	   <div class="form-group">
	   	 	<button type="submit" name="submit" class="btn btn-primary">Save</button>
	   </div>
	
	</form>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({ format : 'DD/MM/YYYY' });
            });
        </script>
