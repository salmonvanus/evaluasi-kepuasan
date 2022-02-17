
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
              <div class="col-sm-12">
                <div class="panel panel-inverse panel-border">
									<div class="panel-heading">
                    <br>
                    <h3 class="panel-title" style="font-size:30pt">Read SMS</h3>
                    <br>
                  </div>
									<div class="panel-body">
                    <form id="form2" class="form-horizontal group-border-dashed" >
                      <div class="form-group">
                        <label class="col-sm-2 control-label">To</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php echo $msg[0]->cp_name; ?>" />
                        </div>
                      </div>
                      <div class="form-group" >
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" value="<?php echo $msg[0]->cp_phone; ?>" />
                        </div>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" value="<?php echo $msg[0]->cp_email; ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Subject</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php echo $msg[0]->msg_subject; ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-9">
                          <textarea name="new_msg" id="new_msg" type="text" class="form-control" /><?php echo $msg[0]->msg_text; ?></textarea>
                        </div>
                      </div>
                    </form>



                  </div>
                </div>
              </div>
            </div>
        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer">
        110216012 © Teknik Informatika UNSRAT 2017. All rights reserved.
    </footer>

</div>

    <!-- Javascripts-->




    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>


    <script src="<?php echo base_url();?>assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/switchery/js/switchery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/autocomplete/jquery.mockjax.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/autocomplete/countries.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/pages/autocomplete.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/pages/jquery.form-advanced.init.js"></script>




    <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>

    <!-- Modal-Effect -->
    <script src="<?php echo base_url();?>assets/plugins/custombox/js/custombox.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/custombox/js/legacy.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/parsleyjs/parsley.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('form').parsley();
        });
    </script>
