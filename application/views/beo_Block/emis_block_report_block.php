<!DOCTYPE html>

<html lang="en">

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
        <?php $this->load->view('head.php'); ?>



        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('block/header.php'); ?>


            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                        <h1>Smart Card Report - Student School wise
                                            
                                        </h1>
                                    </div>
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
                                <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                    <div class="page-content-inner">

                                        <div class="portlet light">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                School Management</label>
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_block_report_schcate" name="emis_block_report_schcate" >
                                                                <option value="" >Select School Management</option>
                                                                 <?php  foreach($getmanagecate as $det){ ?>
                                                                 <option value="<?php echo $det->id; ?>" ><?php echo $det->manage_name; ?></option>
                                                                  <?php }  ?>
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_block_report_schcate_alert"></div></font>
                                                              </div>
                                                              </div>

                                                              <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                 School category </label>
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_block_report_schmanage" name="emis_block_report_schmanage" >
                                                                <option value="" >Select category</option>
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_block_report_schmanage_alert"></div></font>
                                                              </div>
                                                              </div>
                                                               <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                                
                                                                <button type="button" class="btn green btn-lg" onclick="return checkmanagecate_block();" >Submit</button>
                                                              </div>
                                                              </div>
                                                      
                                                    </div>
                                                </div>
                                              <?php  $manage =$this->session->userdata('emis_blockreport_schmanage'); 
                                              if($manage!=""){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4><b>Selected School Management Categoty : <?php echo $this->Datamodel->get_schmanagementname($manage); ?></b>
                                                        <button type="button" class="btn red btn-xs" onclick="remove_catefilter()">Remove Filter</button> </h4>
                                                    </div>
                                                </div>
                                              <?php  } ?>
                                            </div>
                                       
                                    <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i> Student School wise | <span>Block : <?php if($blockname!="") { echo $blockname; } ?></span> </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr><th>Udise code </th>
                                                                    <th>Schools </th>                        
                                                                    <th> I</th>
                                                                    <th>II</th>
                                                                    <th>III</th>
                                                                    <th>IV</th>
                                                                    <th>V</th>
                                                                    <th>VI</th>
                                                                    <th>VII</th>
                                                                    <th>VIII</th>
                                                                    <th>IX</th>
                                                                     <th>X</th>
                                                                      <th>XI</th>
                                                                       <th>XII</th>
                                                                </tr>
                                                                </thead>
                                                               
                                                                 
                                                            <?php if(!empty($details)){ foreach($details as $det){ ?>

                                                                <tr><td><?php echo $det->udise_code; ?></td>
                                                                    <td> <a onclick="saveschoolid('<?php echo $det->school_id; ?> ')">
                                                                    <?php echo $det->school_name; ?></a></td>
                                                                    <td><?php echo number_format($det->class_1); ?></td>
                                                                     <td><?php echo number_format($det->class_2); ?></td>
                                                                    <td><?php echo number_format($det->class_3); ?></td>
                                                                   <td><?php echo number_format($det->class_4); ?></td>
                                                                    <td><?php echo number_format($det->class_5); ?></td>
                                                                     <td><?php echo number_format($det->class_6); ?></td>
                                                                    <td><?php echo number_format($det->class_7); ?></td>
                                                                   <td><?php echo number_format($det->class_8); ?></td>
                                                                     <td><?php echo number_format($det->class_9); ?></td>
                                                                    <td><?php echo number_format($det->class_10); ?></td>
                                                                 <td><?php echo number_format($det->class_11); ?></td>
                                                                   <td><?php echo number_format($det->class_12); ?></td>
                                                                   
                                                                </tr>
                                                                <?php } } ?>
                                                                
                                                      
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

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
         <script src="<?php echo base_url().'asset/js/block.js';?>" type="text/javascript"></script>


  <script type="text/javascript">
               function saveschoolid(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'Block/saveschoolidsession',
                data:"&school_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'Block/emis_student_report_school'; 
                return true;  
                 }else{
                    return false;
                 }
                 
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  

                }
                });
               }
              </script>


        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
        <!-- END PAGE LEVEL SCRIPTS -->

             

    </body>

</html>