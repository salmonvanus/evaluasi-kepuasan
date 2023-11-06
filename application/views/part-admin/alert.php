<?php if ($this->session->flashdata('success')): ?>
<script>
swal({
  title: "<?= $this->session->flashdata('success'); ?>",
  icon: "success",
  button: false,
  timer: 1500,
});
</script>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
<script>
swal({
  title: "<?= $this->session->flashdata('error'); ?>",
  icon: "error",
  button: false,
  timer: 1500,
});
</script>
<?php endif; ?>

