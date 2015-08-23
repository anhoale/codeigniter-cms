<?php $this->load->view('admin/components/page_head'); ?>
<body class="my-modal-body">


  <div class="modal-dialog">
    <div class="modal-content">

      <?php $this->load->view($subview);//subview is set in controller ?>

    <div class="modal-footer">
        <p>&copy; <?php echo $meta_title; ?></p>

    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

  
<?php $this->load->view('admin/components/page_tail'); ?>
