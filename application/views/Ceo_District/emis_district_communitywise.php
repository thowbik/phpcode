<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

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
            

  <?php $this->load->view('Ceo_District/header.php'); ?>


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
                                        <h1>Student Social Category wise
                                            
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
                                      <div class="portlet-body">
                                         <div class="mt-element-step">
                                            <div class="row step-thin">
                                               
                                              <div class="row">
                                              <div class="col-md-6">
                                                    <div class="row">
               
                                                    <a onclick="savecommuntiyonly('C1')"><div class="col-md-3 bg-grey-steel mt-step-col <?php if($communityid=='C1'){ ?> active <?php } ?>">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">BC</div>
                                                    <div class="mt-step-content font-grey-cascade">Others</div>
                                                </div></a>
                                                 <a onclick="savecommuntiyonly('C2')"><div class="col-md-3 bg-grey-steel mt-step-col  <?php if($communityid=='C2'){ ?> active <?php } ?>" >
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">BC</div>
                                                    <div class="mt-step-content font-grey-cascade">Muslim</div>
                                                </div></a>
                                                 <a onclick="savecommuntiyonly('C3')"><div class="col-md-3 bg-grey-steel mt-step-col  <?php if($communityid=='C3'){ ?> active <?php } ?>">
                                                     <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">MBC</div>
                                                    <div class="mt-step-content font-grey-cascade"></div>
                                                </div></a>
                                                 <a onclick="savecommuntiyonly('C4')"><div class="col-md-3 bg-grey-steel mt-step-col  <?php if($communityid=='C4'){ ?> active <?php } ?>">
                                                     <div class="mt-step-number bg-white font-grey">4</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">ST</div>
                                                    <div class="mt-step-content font-grey-cascade"></div>
                                                </div></a>
                
                                                            
                                                 </div>

                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="row">
                                                     <a onclick="savecommuntiyonly('C5')"><div class="col-md-3 bg-grey-steel mt-step-col  <?php if($communityid=='C5'){ ?> active <?php } ?>">
                                                    <div class="mt-step-number bg-white font-grey">5</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">SC</div>
                                                    <div class="mt-step-content font-grey-cascade">Others</div>
                                                </div></a>
                                                 <a onclick="savecommuntiyonly('C6')"><div class="col-md-3 bg-grey-steel mt-step-col  <?php if($communityid=='C6'){ ?> active <?php } ?>">
                                                  <div class="mt-step-number bg-white font-grey">6</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">SC</div>
                                                    <div class="mt-step-content font-grey-cascade">Arunthathiyar</div>
                                                </div></a>
                                                 <a onclick="savecommuntiyonly('C7')"><div class="col-md-3 bg-grey-steel mt-step-col  <?php if($communityid=='C7'){ ?> active <?php } ?>">
                                                    <div class="mt-step-number bg-white font-grey">7</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">OC</div>
                                                    <div class="mt-step-content font-grey-cascade"></div>
                                                </div></a>
                                                 <a onclick="savecommuntiyonly('C8')"><div class="col-md-3 bg-grey-steel mt-step-col  <?php if($communityid=='C8'){ ?> active <?php } ?>">
                                                   <div class="mt-step-number bg-white font-grey">8</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">DNC</div>
                                                    <div class="mt-step-content font-grey-cascade">Denotified</div>
                                                            </div></a>
                                                          </div>
                                                    </div>
                                                </div>

                                            </div>
                                         </div>
                                         </div>

                                    <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Community wise - <?php if($distname!=""){ echo $distname; } ?> </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th>Block </th>                        
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

                                                            <tr>
                                                            <td><a onclick="saveblockcomunity('<?php echo $det->id; ?>')" >
                                                                <?php echo $det->block_name; ?></a></td>
                                                                <td><?php echo $det->class_1; ?></td>
                                                                 <td><?php echo $det->class_2; ?></td>
                                                                <td><?php echo $det->class_3; ?></td>
                                                               <td><?php echo $det->class_4; ?></td>
                                                                <td><?php echo $det->class_5; ?></td>
                                                                 <td><?php echo $det->class_6; ?></td>
                                                                <td><?php echo $det->class_7; ?></td>
                                                               <td><?php echo $det->class_8; ?></td>
                                                                 <td><?php echo $det->class_9; ?></td>
                                                                <td><?php echo $det->class_10; ?></td>
                                                             <td><?php echo $det->class_11; ?></td>
                                                               <td><?php echo $det->class_12; ?></td>
                                                               
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
   <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>
         <script type="text/javascript">
                function saveblockcomunity(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'District/saveblockcommunity',
                data:"&block_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'District/emis_district_community_schools'; 
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

       <script type="text/javascript">
               function savecommuntiyonly(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'District/savecommunityonly',
                data:"&comm="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'District/emis_district_communitywise'; 
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