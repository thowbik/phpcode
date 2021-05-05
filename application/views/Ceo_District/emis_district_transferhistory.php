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
        

        </style>
        
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('Ceo_District/header.php');?>

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
                                        <h1>Teacher Transfer History
                                            
                                        </h1>
                                    </div>
									
									 <div style="text-align:right;">
									 <label> </label>
  
	
	 <button onclick="goBack()" class="btn green"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
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
                                     
                                
                                     <div class="row">

                                       
                                        </div>

                    <?php $filter1_val = $this->session->userdata('state_trans_filter1');
                         $filter2_val = $this->session->userdata('state_trans_filter2');
                         if($filter1_val!="" || $filter2_val!=""){ ?> 
        
                        <!--<div class="row">
                            <div class="col-md-12">
                                <h4><b>Selected Filter :<br/><?php if($filter1_val!=""){ echo "Transferer - ".$this->Statemodel->gettransfrername($filter1_val)."     ";  } if($filter2_val!=""){ echo "Date - ".$filter2_val;  } ?></b>
                                <a href="<?php echo base_url().'State/removefilter_inteachertransfer';?>" class="btn red btn-xs" >Remove Filter</a> </h4>
                            </div>
                        </div>-->
                                              <?php  } ?>
                                    
                                   </div>
           
                                       <div class="row">

                                         <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> Teacher Transfer History - List <?= $fdate; ;?> TO <?= $tdate; ?></div>
                                    <!--<div class="tools"> <font class="font font-lg"><b>Total transfer list - <?php echo $totalcount; ?></b></font> </div>-->
                                </div>
                                <div class="portlet-body">
                                
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">S.No </th> 
												
                                                <th style="text-align: center;">Name</th>
												<th style="text-align: center;">Designation</th>
                                                <th style="text-align: center;">Transfer Authority </th>
                                                <th style="text-align: center;">From School</th>
                                                <th style="text-align: center;">To School /Office</th>
                                                <th style="text-align: center;">Transfer Date</th>
                                                <th>PDF</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           <?php $i=$offset+1; if(!empty($history)){  foreach($history as $his){ ?> 
                                            <tr>
                                                  <td><?php echo $i; ?></td>
												
                                                <td><?php echo $his->teacher_name?></td>
												<td><?php echo $his->type_teacher?></td>
                                                <td><?php echo $his->transferer; ?></td>

                                                <td><?php echo $his->oldschool?></td>
                                                <?php if(!empty($his->newschool))
												{
													$new=$his->newschool;
												}
												else
												{
													$new=$his->office_name;
												}
												?>
                                                <td><?php echo $new?></td>
                                                <td style="text-align: center;"><?= date('d-m-Y',strtotime($his->trans_date)); ?></td>
												<td><a href="<?=base_url().'Ceo_District/generate_pdf_transfer/'.$his->staff_id?>"><i class="fa fa-file-pdf-o"></i></a></td>
                                            </tr>
                                            <?php $i++; } } ?>
                                  
                                        </tbody>
                                    </table> 
                                   
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
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>

        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
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
<script>
	   $(document).ready(function()
{
    sum_dataTable('.sample_2');
});

function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Bfrtip',
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
            ],
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
                console.log(a);
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
<script>
	function goBack() {
  window.history.back();
}
	</script>