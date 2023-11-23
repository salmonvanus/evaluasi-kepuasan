<?php if ($this->session->flashdata('success')) { ?>
  <script>
    swal({
      title: "Sukses",
      text: "<?= $this->session->flashdata('success'); ?>",
      icon: "success",
      button: false,
      timer: 1500,
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('error')) { ?>
  <script>
    swal({
      title: 'Gagal!'
      text: "<?= $this->session->flashdata('error'); ?>",
      icon: "error",
      button: false,
      timer: 1500,
    });
  </script>
<?php } ?>