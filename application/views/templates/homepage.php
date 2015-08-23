		<!-- Main content -->
 		<div class="col-md-9">
 			<div class="row">
 				<div class="col-md-12"><?php if(isset($articles[0])) echo get_excerpt($articles[0]); ?></div>
 			</div>
 			<div class="row">
	 			<div class="col-md-6"><?php if(isset($articles[1])) echo get_excerpt($articles[1]); ?></div>
	 			<div class="col-md-6"><?php if(isset($articles[2])) echo get_excerpt($articles[2]); ?></div>
	 		</div>
 		</div>
 		
 		<!-- Sidebar -->
 		<div class="col-md-3 sidebar">
 			<h2>Recent news</h2>
		<?php echo anchor($news_archive_link, '+ News archive'); ?>
		<?php $articles = array_slice($articles, 0, 3);?> 
		<?php echo article_links($articles); ?>

 		</div>