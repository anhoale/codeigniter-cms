<?php $this->load->view('admin/components/page_head'); ?>
  <body>
  <!-- Fixed navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url();?>"><?php echo $meta_title; ?></a>
			</div>

			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo site_url('admin/dashboard') ?>" >Dashboard</a></li>
					<li><?php echo anchor('admin/page', 'Pages');?></li>
					<li><?php echo anchor('admin/page/order', 'Order pages');?></li>
					<li><?php echo anchor('admin/user', 'Users');?></li>
					<li><?php echo anchor('admin/article', 'Articles');?></li>
				</ul>
			</div><!--/.navbar-collapse -->
			</div>
		</div>

<div class="container theme-showcase" role="main">
	<div class="row">
		<!--Main column-->
		<div class="col-md-9">
			<?php $this->load->view($subview); //subview is set in controller ?>
		</div>
		<!--Side bar-->
		<div class="col-md-3">
			<section>
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $this->session->userdata('name'); ?><br/>
				<span class="glyphicon glyphicon-send" aria-hidden="true"></span> <?php echo mailto($this->session->userdata('email'), $this->session->userdata('email')); ?><br/>
				<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> <?php echo anchor('admin/user/logout', 'Logout'); ?>
			</section>
		</div>
	</div>
</div>
<?php $this->load->view('admin/components/page_tail'); ?>
