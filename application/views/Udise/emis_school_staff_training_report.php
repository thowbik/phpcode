
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
<?php $school_name = $this->session->userdata('school_profile');
    // print_r($this->session->userdata());

// print_r($school_name);
?>
<title>EMIS | TN Schools |  <?=$school_name[0]['school_name'].' | '.$title;?></title>
    <!-- BEGIN HEAD -->

    <head>

    <style>
    .center
    {
        text-align: center;
    }

    .fa-check-circle
    {
        color:green;
    }
    .fa-times-circle-o
    {
        color:red;
    }
th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        
        margin: 0 auto;
    }

    .DTFC_LeftBodyLiner
    {
        position: absolute !important ;
        top: -11px !important;
        left: 0px !important;
        overflow-y:initial !important;
        width: 260px !important;
        height: 361px !important;
    }
</style>
    <style type="text/css" media="print">
  @page { size: landscape; }
</style>
 <style type="text/css" media="file">
  @page { size: landscape; }
</style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Tamilnadu Educational Informtion Management System" name="Educational Management Information System. Online Applications, State , District , Schools" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
       
        <link href="<?php echo base_url().'asset/global/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet" type="text/css" />
  
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet" type="text/css" />

         <link href="<?php echo base_url().'asset/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css';?>" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url().'asset/global/css/components-md.min.css';?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url().'asset/global/css/plugins-md.min.css';?>" rel="stylesheet" type="text/css" />

        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url().'asset/layouts/layout3/css/layout.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/layouts/layout3/css/themes/default.min.css';?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url().'asset/layouts/layout3/css/custom.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-sweetalert/sweetalert.css';?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-toastr/toastr.min.css';?>" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo base_url().'asset/images/favicon.ico';?>" />
        <?php ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

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
                                <div class="page-head">

                                <div class="container">

                                     BEGIN PAGE TITLE -->
                                   <div class="page-head">
                                        <div class="container">
                                            <!-- BEGIN PAGE TITLE -->
                                            <!-- END PAGE TITLE -->
                                            <!-- BEGIN PAGE TOOLBAR -->
                                            <div class="page-toolbar">
                                                <!-- BEGIN THEME PANEL -->
                                                <!-- END THEME PANEL -->
                                            </div>
                                            <!-- END PAGE TOOLBAR -->
                                        </div>
                                    </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">

                            <div class="row" style="padding: 12px 63px;" >
                                    
                                    <form action="<?=base_url().'Udise_staff/staff_training_dtls' ?>" method="post">
                                            
                                        <div class="col-md-3">
                                        
                                            <select class="form-control"  id="academic_year" name="academic_year">
                                                     <option value="">Academic Year</option>
                                                    <!--<option value="0">Current Year (2019-2020)</option>
                                                    <option value="1">Previous Year (2018-2019)</option> -->
                                                    <!-- <?php  $dates = range(date('Y'), date('Y')+1);
                                                                  $x = 1;
                                                                    foreach($dates as $date){
                                                                       if (date('m', strtotime($date)) <= 6) {
                                                                          $year = $date . '-' . $date+1;
                                                                        } else {
                                                                            $year = $date-1 . '-' . $date;
                                                                        }
                                                                       $text = $x==0?"Current Year":"Previous Year";
                                                                       if($aca_year==$year){
                                                                        echo "<option value=".$year." selected >".$text.' ( '.$year.' )'."</option>";
                                                                       }
                                                                       else{
                                                                        echo "<option value=".$year." >".$text.' ( '.$year.' )'."</option>";
                                                                       }
                                                                       $x--;
                                                                   } 
                                                        ?> -->

                                                        <?php
                                                            foreach($aca_year_list as $y){ 
                                                                ?>
                                                                    <option value="<?php echo($y->acyear); ?>" data-low="<?php echo($s->appli_lowclass); ?>" data-high="<?php echo($s->appli_highclass); ?>" <?php if($aca_year==$y->acyear){echo('selected');} ?> ><?php echo($y->acyear); ?></option>
                                                        <?php } ?>

                                                </select> 
                                            </div>

                                            <button class="btn btn-primary">Search</button>
                                            <div id="msg"></div>
                                          </form>
                                        </div>
                                <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Staff Training Report <span><?=$aca_year;?></span> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                                    <thead>
                                                                        <tr>
                                                                           <th style="text-align: center !important;">S.NO</th>
                                                                           <th style="text-align: center !important;">Teacher Code</th>
                                                                           <th style="text-align: center !important;">Teacher Name</th>
                                                                           <th style="text-align: center !important;">Training Type</th>
                                                                           <th style="text-align: center !important;">Trained at</th>
                                                                           <th style="text-align: center !important;">Date</th>
                                                                           <th style="text-align: center !important;">No of Days In Training</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                       <?php $i=1; foreach($training_staff_list as $ts) { 
                                                                           $type = $ts->training_type_id == "0" ? 'Others ( '.$ts->training_other.' )':$ts->training_type; ?>
                                                                        <tr>
                                                                        <td style="text-align: center !important;"><?php echo $i++; ?></td>
                                                                        <td style="text-align: center !important;"><?php echo $ts->teacher_code; ?></td>
                                                                        <td><?php echo $ts->teacher_name; ?></td>
                                                                        <td><?php echo $type; ?></td>
                                                                        <td><?php echo $ts->trained_at; ?></td>
                                                                        <td><?php echo $ts->training_date; ?></td> 
                                                                        <td style="text-align: center !important;"><?php echo $ts->training_days; ?></td> 
                                                                        </tr>
                                                                       <?php } ?>
                                                                        
                                                                    
                                                                    </tbody>
														        </table>					 
                                                                <div id="msg"></div>

                                                    </div>
  
                                                    </div>

                                                </div>

                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                            <!-- <div class="portlet light">
                                            
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div>Selected Teachers Name : <span id="teacher_count"></span><br/><span id="teacher_name"> </span></div>
                                                    </div>
                                                       <div class="col-md-3">
        <button type="sumbit" class="btn green btn-lg" >Submit</button>
                             </div>  
                                                      
                                                    
                                                </div> -->
                                           
                                              
                                            </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- END CARDS -->

                                         <!-- BEGIN BLOCK BUTTONS PORTLET-->
                                                                   
                                         <!-- BEGIN BLOCK BUTTONS PORTLET-->

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
        <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>


        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
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
        <script> 
            $(document).ready(function(){});
        </script>

    </body>

</html>