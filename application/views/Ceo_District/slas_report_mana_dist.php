
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
<style> 
.center 
{
text-align: center;
}   
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
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

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
                                         <h1>SLAS Marks  
                                           <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/slas_report_schl_blk'; ?>">
                                              <span class="text">District-Wise</span>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/slas_report_cate_dist'; ?>">
                                              <span class="text">Category-Wise</span>
                                            </a>
                                          </li>
                                            <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/slas_report_mana_dist'; ?>">
                                              <span class="text">Management-Wise</span>
                                            </a>
                                          </li>
                                        
                                                </ul>
                                            </div>                                     
                                        </h1>  
                                    
                                    </div>
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar">
                                        <!-- BEGIN THEME PANEL -->
                             <div class="row">
                         <div class="col-md-12">
                         </div>
                         <div class="col-md-12">
                         <h5 style="color:red;"><strong>NOTE: </strong># -Number Of Schools. % -Percentage Of Total Schools.</h5>
                        
                       
                         </div>
                         </div>
                                        <!-- END THEME PANEL -->
                                    </div>
                                    <!-- END PAGE TOOLBAR -->
                                </div>
                            </div>

                                  

                                      <br>         

                                                   
                                                    
                                                   
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row" style="margin-left: 6px;">
                                             
                                                      <label class="control-label"></label>
                                                    <!--  <form  action="<?=base_url().'Ceo_District/slas_report_dist'?>" method="POST" >
                                                        <div class="row">
                                                        <div class="col-md-4">
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_state_fix" name="emis_state_fix" required="" value="emis_state_fix"  style="  width: 1inherit;">
                                                               <option value="" >SELECT SUBJECT</option>
                                                               <option value="tamil">Tamil</option>
                                                               <option value="english">English</option>
                                                               <option value="maths">Maths</option>
                                                               <option value="science">Science</option>  
                                                               <option value="social">Social</option>
                                                              
                                                              
                                                         </select>
                                                       </div>
                                                         <div class="col-md-4">
                                                             <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="gender" name="gender" required="" value="gender"  style="  width: 1inherit;">
                                                               <option value="" >SELECT GENDER </option>
                                                               <option value="all">ALL</option>
                                                               <option value="Boys">Boys</option>
                                                               <option value="Girls">Girls</option>
                                                             
                                                              
                                                              
                                                         </select>
                                                         </div>
                                                       
<div class="col-md-3">
        <button type="sumbit" class="btn green btn-md" >Submit</button>
                             </div>              
                                                         </form>-->

                                              </div>   
                                              </div> 

                               
        <br>
                                       
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>SLAS Marks Range -
                                                             <strong>MANAGEMENT-WISE</strong>
                                                              </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                              <table class="table table-striped table-bordered table-hover" id="sample_3">
                              <thead>
                                <tr>
                                 <th style="text-align: center;"></th>
                                 <th style="text-align: center;"></th>
                                  <th style="text-align: center;"></th>  
                                   <th style="text-align: center;" colspan="2">Average<br/>SLAS Score<br/>0%</th>
                                 <th style="text-align: center;" colspan="2">Average<br/>SLAS Score<br/>0-20%</th>
                                 <th style="text-align: center;" colspan="2">Average<br/>SLAS Score<br/>20-40%</th>
                                 <th style="text-align: center;" colspan="2">Average<br/>SLAS Score<br/>40-60%</th>  
                                 <th style="text-align: center;" colspan="2">Average<br/>SLAS Score<br/>60-80%</th> 
                                 <th style="text-align: center;" colspan="2">Average<br/>SLAS Score<br/>80-100%</th>
                                </tr>
                              <tr>
                                <th style="text-align: center;">S.No</th>
                                <th style="text-align: center;">School Management</th>  
                                 <th style="text-align: center;">Total<br/>Schools</th>
                                 <th style="text-align: center;">#</th> 
                                <th style="text-align: center;">%</th>
                                <th style="text-align: center;">#</th> 
                                <th style="text-align: center;">%</th>
                                <th style="text-align: center;">#</th> 
                                <th style="text-align: center;">%</th> 
                                <th style="text-align: center;">#</th> 
                                <th style="text-align: center;">%</th> 
                                <th style="text-align: center;">#</th> 
                                <th style="text-align: center;">%</th> 
                                <th style="text-align: center;">#</th> 
                                <th style="text-align: center;">%</th>  
                                   
                               
                              </tr>
                             
                              </thead>
                              <tbody>
                              <?php $total1=[]; ?>
                              <?php if(!empty($student_migration_details)){ $per0= [];$per1= [];$per2= [];$per3= []; $per4= [];  $assigned_sum1=[]; $not_marked1=[]; $i=1; $cnt=count($student_migration_details);
                              foreach($student_migration_details as $key){
                               $j=0; $sum=0; $assigned_sum=0; $not_marked=0;//print_r($value); die();
                                                               
                                ?>
                                  <tr>
                                      <td style="text-align: center;"><?php echo($i++); ?></td>
                                      <td><a href="<?php echo base_url().'Ceo_District/slas_report_schl_blk/?manage_id='.$key->manage_id?>"><?php echo($key->management); ?></a></td>
                                       <td style="text-align: center;"><?php echo number_format($key->tot_schl) ?> </td>
                                       <td style="text-align: center;"><?php echo ($key->per_0) ?> </td>
                                       <td style="text-align: center;"><?php echo ($key->per0); echo '%'; ?></td>
                                       <td style="text-align: center;"><?php echo ($key->per_20) ?> </td>
                                       <td style="text-align: center;"><?php echo ($key->per20); echo '%'; ?></td>
                                       <td style="text-align: center;"><?php echo ($key->per_21_40) ?></td>
                                       <td style="text-align: center;"><?php echo ($key->per40); echo '%'; ?></td>
                                       <td style="text-align: center;"><?php echo ($key->per_41_60) ?> </td>
                                       <td style="text-align: center;"><?php echo ($key->per60); echo '%'; ?></td>
                                       <td style="text-align: center;"><?php echo ($key->per_61_80) ?></td>
                                       <td style="text-align: center;"><?php echo ($key->per80); echo '%'; ?></td>
                                       <td style="text-align: center;"><?php echo ($key->per_81_100) ?></td>
                                       <td style="text-align: center;"><?php echo ($key->per100);echo '%';  ?></td>
                                    </tr>  
                                      <?php
                                      $total['values']['p0']+=$key->per_0; 
                                      $total['values']['p1']+=$key->per_20;
                                      $total['values']['p2']+=$key->per_21_40;
                                      $total['values']['p3']+=$key->per_41_60;
                                      $total['values']['p4']+=$key->per_61_80;
                                      $total['values']['p5']+=$key->per_81_100;
                                      $total['val']['tot']+=$key->tot_schl;
                                      $total['percent']['per0']+=$key->per0;
                                      $total['percent']['per1']+=$key->per20;
                                      $total['percent']['per2']+=$key->per40;
                                      $total['percent']['per3']+=$key->per60;
                                      $total['percent']['per4']+=$key->per80;
                                      $total['percent']['per5']+=$key->per100;
                                     
                                      }  ?>   
                            </tbody>
                            <tfoot>
                              <tr>
                                  <th>Total</th>
                                  <th></th>
                                  <th style="text-align: center;"><?php echo number_format($total['val']['tot']); ?></th>
                                  <?php
                                      for($i=0;$i<count($total['values']);$i++){
                                   ?>
                                        <th  style="text-align: center;"><?php echo(number_format($total['values']['p'.$i])); ?></th>
                                        <th  style="text-align: center;"><?php echo (round(($total['percent']['per'.$i]/$cnt),2)."%"); ?></th>
                                   <?php     
                                      }
                                  ?>
                              </tr>
                         
                                                                
                            </tfoot> 

                            <?php } ?>

                            </table>
                                                  </div>
                                                </div>
                                              </div>
                                                    </div>
                                                

                                                <!-- END EXAMPLE TABLE PORTLET-->           

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
 

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
               <script type="text/javascript">
    $(document).ready(function()
{
    sum_dataTable('#sample_3');
    sum_dataTable('#sample_4');
});

function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Blfrtip',
      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: -1,
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
        buttons: [
            'colvis'
        ],
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' },
    //             {
    //     extend: 'colvis',
       
    //     className: 'btn default',
    //     columnText: function ( dt, idx, title ) {

    //         return (idx+1)+': '+title;
    //     }
    // }
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
                // console.log(a);
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
               
            sum = sum.toLocaleString(undefined, {maximumFractionDigits:3});
            $(column.footer()).html(sum);
                        });
            }
        });
    // table.column(0).visible(false);
    }
</script>
             
    </body>

</html>