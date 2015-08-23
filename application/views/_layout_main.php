<?php $this->load->view('components/page_head');?>

<body>

<div class="container">
	<section>
		<h1 class="logo"><a href="<?php echo site_url(); ?>"><img class="img-responsive" src="<?php echo base_url('asset/img/logo1.jpg') ;?>" alt="Amelia's Adventure">
		Welcome to Amelia's journey
		</a></h1>
	</section>

	<nav class="navbar navbar-default">
	 	<div class="collapse navbar-collapse">
	      	<?php echo get_menu($menu); ?>
	      	

	</nav>

 	<div class="row">
 	<?php $this->load->view('templates/'. $subview); ?>
 	</div>
 </div>

<?php $this->load->view('components/page_tail');?>