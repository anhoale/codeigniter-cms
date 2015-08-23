		<!-- Main content -->

 <div class="col-md-9">

 <form  class="search" action="<?=site_url('/news-archive')?>" method="post">
  <div class="form-group">
    <label>Search</label>
    <input type="text" class="form-control" id="keyword" placeholder="Enter search keyword here" name="keyword" 
    value="<?php echo  set_value('keyword',$this->session->userdata('search_term')); ?>">
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

<?php if($pagination): ?>
			<section class="pagination"><?php echo $pagination; ?></section>
<?php endif; ?>
 			<div class="row">
<?php if (count($articles)): foreach ($articles as $article): ?>
 				<article class="col-md-12"><?php echo get_excerpt($article); ?><hr></article>
<?php endforeach; endif; ?>
 			</div>
 		</div>
 		
 		<!-- Sidebar -->
 		<div class="col-md-3 sidebar">
 			<h2>Recent news</h2>
<?php $this->load->view('sidebar'); ?>
 		</div>