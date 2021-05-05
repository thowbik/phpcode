<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
       
<link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('header.php'); ?>


            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
<!-- <div class="page-head">
<div class="container">
    <!-- BEGIN PAGE TITLE --
    <div class="page-title">
        <h1>Declaration Form
            <small></small>
        </h1>
    </div>
    <!-- END PAGE TITLE --
    <!-- BEGIN PAGE TOOLBAR --
    <div class="page-toolbar">
        <!-- BEGIN THEME PANEL --

        <!-- END THEME PANEL --
    </div>
    <!-- END PAGE TOOLBAR --
</div>
</div> -->
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE CONTENT BODY -->
<div class="page-content">
<div></div> 
<div class="container">
    <!-- BEGIN PAGE CONTENT INNER -->


    <div class="page-content-inner">
       
 

           <!-- <div class="m-heading-1 border-green m-bordered">
            <h3>Basic Information</h3>
        </div> -->  


        <div class="portlet light portlet-fit ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>
                    <span class="caption-subject font-dark sbold uppercase">Declaration Form</span>
                </div>
                <div class="col-md-offset-5 col-md-4"><?php if(isset($success)){?>
                            <div class="alert alert-success"><button class="close" data-close="alert"></button>
                                <?=$success;?></div>
                            <?php } ?></div>
            </div>
            <!-- <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                     <div class="tab-pane" id="tab_2"> -->
                         
                            <div class="portlet light ">
                                
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                 <form class="form-horizontal" method="post" action="<?=base_url().'Home/save_mhrd_dcf'?>">                                
                                  <!-- <form class="form-horizontal" method="post" id="emis_stu_reg_form" name="emis_stu_reg_form"
                                > --><center>
                                        <div class="form-body">
                                            <h3 class="form-section">I hereby declare that the information entered in this data Capture Format (DCF) is true and correct to the best of my knowledge. I undertake to inform any changes therein, immediately</h3>
                                            <center>
                                             <div class="row">
                                              <input type="hidden" name="id" value="<?=$decleartion_data->id;?>">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4"> Name *</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="" name="sch_auth_name"  placeholder="Name *" value="<?=$decleartion_data->dcf_certify_by_school_auth_name;?>" required=true>
                                                             <font style="color:#dd4b39;"><div id=""></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">Designation *</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="" name="sch_auth_desi"  placeholder="Designation"  value="<?=$decleartion_data->dcf_certify_by_school_auth_desig;?>" required=true>
                                                             <font style="color:#dd4b39;"><div id=""></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">Date *</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control date" id="date" name="sch_auth_date"  placeholder="Date *" autocomplete="off" value="<?=($decleartion_data->dcf_certify_by_school_auth_date !=''?date('d-m-Y',strtotime($decleartion_data->dcf_certify_by_school_auth_date)):'');?>" required=true>
                                                             <font style="color:#dd4b39;"><div id=""></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                       </div>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-6">
                                                            <button type="submit" class="btn green" id="">Submit</button>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                        </div>
                                        </center> 
                                    </form>
                                    <!-- END FORM-->
                                <!-- </div>
                            </div>
                        </div>  -->

                    </div>
                </div>
            </div>
        </div>


</div>


    </div>
    <!-- END PAGE CONTENT INNER -->
</div>
</div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                        <!-- BEGIN QUICK SIDEBAR -->

                        <!-- END QUICK SIDEBAR -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>

                  <?php $this->load->view('footer.php'); ?>
        </div>
        <?php $this->load->view('scripts.php'); ?>

        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/utf.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/tamil.js'?>" type="text/javascript"></script>






        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

    <script type="text/javascript">
        $(document).ready(function(){
    // $('.display').dataTable();
    
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           
 var curr = new Date();

// console.log(curr.getFullYear()-19); 
// var first = new Date(curr.getFullYear(),'01','01');
var end = new Date(curr.getFullYear(),curr.getMonth(), curr.getDate()+1);

$('.date').datepicker({
    // daysOfWeekDisabled: [0,6]
        autoclose:true,
    

});
$(".date1").datepicker({
   
});
// console.log(first,end);
 // $('.date').datepicker("setStartDate",first);

$('.date').datepicker("setEndDate",end);

});

      
    </script>

</html>