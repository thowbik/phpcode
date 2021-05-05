<!-- <?php print_r($stulist);?> -->
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
        <style type="text/css">
            #breadcrumbs{
                color:#2bbaa5;
            }
            #breadcrumbs a{
                color:#2bbaa5;
                padding:2px;
            }
        </style>
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
        <?php $this->load->view('allheader.php'); ?>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN PAGE CONTENT WRAPPER -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title"  id="page-title">
                                        <h1> School Wise - Laptop List </h1>
                                        <br/>                                      
                                            <small id="breadcrumbs">
                                            </small>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar"></div>
                                    <!-- END PAGE TOOLBAR -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content"> <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">

                                         <?php if ($this->session->flashdata('staff')){ ?> 
                                                   
                                                   <div class="page-content-inner">
                                                       <div class="row">
                                                           <div class="col-md-12">
                                                               <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('staff'); ?>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                         <?php } ?>

                                            <div class="portlet light ">
                                                <div class="portlet-body">
                                                    <div class="row">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active">
                                                                <a data-toggle="tab"  id="tabset1" class="tablinks" onclick="openCity(event,'Standard1')"><b>Current Year 11th Standard</b></a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="tab"  id="tabset2" class="tablinks" onclick="openCity(event,'Standard2')"><b>Current Year 12th Standard</b></a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="tab"  id="tabset3" class="tablinks" onclick="openCity(event,'Standard3')"><b>Previous Year 12th Standard</b></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            
                                                    <div id="Standard1" class="tabcontent tab-pane fade in active">
                                                               
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                                
                                                                <div class="page-content-inner">
                                                                                    
                                                                    <?php if($this->session->flashdata('errors')){?>
                                                                        <div class="portlet-body">
                                                                            <div class ="row">
                                                                                <div class="col-md-4">
                                                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                                                                                                
                                                                </div><!-- page-content-inner close -->
                                                                                     
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">

                                                                <div class="portlet box green">
                                                                        <div class="portlet-title">
                                                                            <div class="caption">
                                                                                <i class="fa fa-globe"></i> Laptop Distribution - Class Wise  </div>
                                                                            <div class="tools"></div>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                                <?php 
                                                                                
                                                                                $CLASS_ELEVEN = array_filter($stulist, function ($var) {
                                                                                    if($var['class_studying_id']==11 && $var['transfer_flag']==0)
                                                                                    {
                                                                                        return $var;
                                                                                    }
                                                                                        
                                                                                });
                                                                                
                                                                                if($CLASS_ELEVEN !=null){  ?>
                                                                                        <div style="padding-top:3px;"></div>
                                                                                        <table class="table table-striped table-bordered table-hover" id="sample_3" style="text-align: center;">                                
                                                                                        <thead>
                                                                                                <tr>
                                                                                                        <th style="text-align: center;">S.No</th>
                                                                                                        <th style="text-align: center;">Student ID</th>
                                                                                                        <th style="text-align: center;">Student Name</th>
                                                                                                        <th style="text-align: center;">Class</th>
                                                                                                        <th style="text-align: center;">Serial No</th>
                                                                                                </tr>
                                                                                            </thead>

                                                                                            <tbody>
                                                                                                <?php $sno = 1;
                                                                                                      foreach($CLASS_ELEVEN as $key=>$value) {
                                                                                                          
                                                                                                ?>
                                                                                                <tr>    
                                                                                                        <td style="text-align: center;"><?php echo($sno); ?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value['unique_id_no']; ?></td>
                                                                                                        <td style="text-align: left;color:<?=($value['unique_supply']==null?'red':'green');?>"><?php echo $value['name'];?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value['class_studying_id'] . ' - ' . $value['class_section']; ?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value['unique_supply']; ?></td>
                                                                                                
                                                                                                </tr>
                                                                                                <?php $sno++; } ?>
                                                                                            </tbody>
                                                                                                                                    
                                                                                        </table>
                                                                                        <?php } else { echo "No data found";}?>
                                                                        </div><!-- END portlet-body -->
                                                                </div><!-- END portlet box green -->

                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div id="Standard2" class="tabcontent" style="display: none;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                                
                                                                <div class="page-content-inner">
                                                                                    
                                                                                
                                                                                        <?php if($this->session->flashdata('errors')){?>
                                                                                        <div class="portlet-body">
                                                                                            <div class ="row">
                                                                                                <div class="col-md-4">
                                                                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php } $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 

                                                                </div><!-- END page-content-inner -->
                                                            
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                              <div class="portlet box green">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-globe"></i> Laptop Distribution - Class Wise  
                                                                    </div>
                                                                    <div class="tools"> </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                                <?php 
                                                                                $CLASS_TWEL = array_filter($stulist, function ($var) {
                                                                                    if($var['class_studying_id']==12 && $var['transfer_flag']==0)
                                                                                    {
                                                                                        return $var;
                                                                                    }
                                                                                        
                                                                                });
                                                                                if($CLASS_TWEL !=null){  ?>
                                                                                        <div style="padding-top:3px;"></div>
                                                                                        <table class="table table-striped table-bordered table-hover" id="sample_4" style="text-align: center;">                                
                                                                                            <thead>
                                                                                                <tr>    
                                                                                                        <th style="text-align: center;">S.No</th>
                                                                                                        <th style="text-align: center;">Student ID</th>
                                                                                                        <th style="text-align: center;">Student Name</th>
                                                                                                        <th style="text-align: center;">Class</th>
                                                                                                        <th style="text-align: center;">Serial No</th>
                                                                                                </tr>
                                                                                            </thead>

                                                                                            <tbody>
                                                                                                <?php $sno = 1;
                                                                                                      foreach($CLASS_TWEL as $key=>$value) {
                                                                                                ?>
                                                                                                <tr>    
                                                                                                        <td style="text-align: center;"><?php echo($sno); ?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value['unique_id_no']; ?></td>
                                                                                                        <td style="text-align: left;color:<?=($value['unique_supply']==null?'red':'green');?>"><?php echo $value['name'];?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value['class_studying_id'] . ' - ' . $value['class_section']; ?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value['unique_supply']; ?></td>
                                                                                                
                                                                                                </tr>
                                                                                                <?php $sno++; } ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <?php } else { echo "No data found";}?>
                                                                        </div><!-- END portlet-body -->
                                                              </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                        
                                                    <div id="Standard3" class="tabcontent" style="display: none;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                                
                                                                <div class="page-content-inner">
                                                                                    
                                                                                
                                                                                        <?php if($this->session->flashdata('errors')){?>
                                                                                        <div class="portlet-body">
                                                                                            <div class ="row">
                                                                                                <div class="col-md-4">
                                                                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php } $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                                                                                
                                                                </div><!-- END OF page-content-inner -->
                                                                                     
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="portlet box green">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class="fa fa-globe"></i> Laptop Distribution - Class Wise 
                                                                        </div>
                                                                        <div class="tools"> </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                                <?php 
                                                                                $CLASS_TWEL_PRE = array_filter($stulist, function ($var) {
                                                                                    if($var['class_studying_id']==12 && $var['transfer_flag']==1)
                                                                                    {
                                                                                        return $var;
                                                                                    }
                                                                                        
                                                                                });
                                                                                if($CLASS_TWEL_PRE !=null){  ?>
                                                                                        <div style="padding-top:3px;"></div>
                                                                                        <table class="table table-striped table-bordered table-hover" id="sample_5" style="text-align: center;">                                
                                                                                            <thead>
                                                                                                <tr>    
                                                                                                        <th style="text-align: center;">S.No</th> 
                                                                                                        <th style="text-align: center;">Student ID</th>
                                                                                                        <th style="text-align: center;">Student Name</th>
                                                                                                        <th style="text-align: center;">Class</th>
                                                                                                        <th style="text-align: center;">Serial No</th>
                                                                                                </tr>
                                                                                            </thead>

                                                                                            <tbody>
                                                                                                <?php $sno = 1;
                                                                                                      foreach($CLASS_TWEL_PRE as $key=>$value) {
                                                                                                ?>
                                                                                                <tr>    
                                                                                                        <td style="text-align: center;"><?php echo($sno); ?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value['unique_id_no']; ?></td>
                                                                                                        <td style="text-align: left;color:<?=($value['unique_supply']==null?'red':'green');?>"><?php echo $value['name'];?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value['class_studying_id'] . ' - ' . $value['class_section']; ?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value['unique_supply']; ?></td>
                                                                                                
                                                                                                </tr>
                                                                                                <?php $sno++; } ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <?php } else { echo "No data found";}?>
                                                                        </div><!-- END portlet-body -->
                                                              </div>
                                                                </div>
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
                        </div>
                        <!-- END PAGE CONTENT WRAPPER -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
                <!-- END PAGE WRAPPER MIDDLE -->
            </div>
            <!-- END PAGE WRAPPER ROW -->
        <?php $this->load->view('footer.php'); ?>
        </div>
        <!-- END PAGE-WRAPPER -->
        <?php $this->load->view('scripts.php'); ?>
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
            <!-- DataTable Scripts-->
            <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
            <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
            <!-- ends of DataTable Scripts-->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script>
                /*** On ready For Hide Medium Field */
                $(document).ready(function(){
                    sum_dataTable('#sample_3',false);
                    sum_dataTable('#sample_4',false);
                    sum_dataTable('#sample_5',false);
        	    });

                function openCity(evt,cityName) {
        
                    // Declare all variables
                    var i, tabcontent, tablinks;

                    // Get all elements with class="tabcontent" and hide them
                    tabcontent = document.getElementsByClassName("tabcontent");

                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }

                    // Get all elements with class="tablinks" and remove the class "active"
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }

                    // Show the current tab, and add an "active" class to the button that opened the tab
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }


                /*** Datatable to sum and display on tfoot */
                function sum_dataTable(dataId,x_status){
                    
                    var table = $(dataId).DataTable({
                        "dom": 'Blfrtip',
                        "scrollX": x_status,
                        "scrollCollapse": true,            
                        "buttons": [
                                { extend: 'print', className: 'btn default' },
                                { extend: 'pdf', className: 'btn default' },
                                { extend: 'csv', className: 'btn default' ,filename: function(){ return 'EMIS TN Schools -Laptop  Distribution List';}}                                                                           
                        ],          
                        "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
                        "pageLength": 10,
                    "footerCallback": function ( row, data, start, end, display ) {
                            this.api().columns('.sum').every(function () {
                                var column = this;
                                var intVal = function ( i ) {
                                    return typeof i === 'string' ?
                                        i.replace(/[\$,]/g, '')*1 :
                                        typeof i === 'number' ?
                                            i : 0;
                                };
                                var sum = column
                                .data()
                                .reduce(function (a, b) { 

                                    a = intVal(a, 10);
                                    if(isNaN(a)){ a = 0; }
                                    
                                    b = intVal(b, 10);
                                    if(isNaN(b)){ b = 0; }
                                    
                                    return a + b;
                                });
                                column.selector.opts.page='current';
                                var currentPage = column
                                .data()
                                .reduce(function (a, b) { 
                                    a = parseInt(a, 10);
                                    if(isNaN(a)){ a = 0; }
                                    
                                    b = parseInt(b, 10);
                                    if(isNaN(b)){ b = 0; }
                                    
                                    return a + b;
                                });
                                $(column.footer()).html(sum);
                                });
                            }
                        });
                    }
         </script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>
</html>