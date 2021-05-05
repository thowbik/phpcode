
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
            

  <?php $this->load->view('Deo_District/header.php'); ?>

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
                         <h5 style="color:red;"><strong>NOTE: </strong># -Number Of Students. % -Percentage Of Total Students.</h5>
                        
                       
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
                                                      <form  action="<?php echo base_url().'Deo_District/slas_report_blk/?dist_id='.$dist_id?>" method="POST" >
                                                        <div class="row">
                                                        <div class="col-md-4">
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_state_fix" name="emis_state_fix" required="" value="emis_state_fix"  style="  width: 1inherit;">
                                                              
                                                               <option value="tamil">Tamil</option>
                                                               <option value="english">English</option>
                                                               <option value="maths">Maths</option>
                                                               <option value="science">Science</option>  
                                                               <option value="social">Social</option>
                                                              
                                                              
                                                         </select>
                                                       </div>
                                                        <div class="col-md-4">
                                                             <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="gender" name="gender" required="" value="gender"  style="  width: 1inherit;">
                                                              
                                                               <option value="all">Boys & Girls</option>
                                                               <option value="Boys">Boys</option>
                                                               <option value="Girls">Girls</option>
                                                             
                                                              
                                                              
                                                         </select>
                                                         </div>
                                                       
<div class="col-md-3">
        <button type="sumbit" class="btn green btn-md" >Submit</button>
                             </div>              
                                                         </form>

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
                                                            <i class="fa fa-globe"></i>SLAS Marks Range - <strong>SUBJECT : </strong> 
                                                            <?php if($this->input->post('emis_state_fix')==''){
                                                              echo '(';echo 'TAMIL'; echo ')';
                                                            } 
                                                            else{
                                                            echo '(';echo strtoupper($this->input->post('emis_state_fix')); echo ')'; } ?>



                                                            <strong> <span> </span> Gender :  </strong> <?php $gen=$this->input->post('gender');
                                                            if($gen=='' || $gen=='all'){
                                                              echo '(BOYS & GIRLS)';
                                                            }
                                                            
                                                            else if($gen=='Boys')
                                                            {
                                                              echo '(BOYS)';
                                                            }
                                                            else {//if($gen=='Girls'){
                                                              echo '(GIRLS)';
                                                            }
                                                            ;?>  <strong>DISTRICT :</strong> <?php echo $student_migration_details[0]->district_name; ?></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                              <thead>
                                <tr>
                                 <th style="text-align: center;"></th>
                                 <th style="text-align: center;"></th>  
                                 <th></th>
                                 <th style="text-align: center;" colspan="2">0 Marks</th>
                                 <th style="text-align: center;" colspan="2">1-3 Marks</th>
                                 <th style="text-align: center;" colspan="2">4-6 Marks</th>  
                                 <th style="text-align: center;" colspan="2">7-9 Marks</th> 
                                 <th style="text-align: center;" colspan="2">10-12 Marks</th> 
                                </tr>
                              <tr>
                                <th style="text-align: center;">S.No</th>
                                <th style="text-align: center;">Block</th>
                                <th style="text-align: center;">Total<br/>Students</th>  
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
                                      <td><a href="<?php echo base_url().'Deo_District/slas_report_schl/?blk_id='.$key->block_id?>"><?php echo($key->block_name); ?></a></td>
                                       <td style="text-align: center;"><?php echo ($key->total) ?> </td>
                                       <td style="text-align: center;"><?php echo ($key->p0) ?> </td>
                                       <td><?php echo ($key->per0); echo '%'; ?></td>
                                      <td style="text-align: center;"><?php echo ($key->p1) ?></td>
                                       <td><?php echo ($key->per1); echo '%'; ?></td>
                                      <td style="text-align: center;"><?php echo ($key->p2) ?> </td>
                                       <td><?php echo ($key->per2); echo '%'; ?></td>
                                      <td style="text-align: center;"><?php echo ($key->p3) ?></td>
                                       <td><?php echo ($key->per3); echo '%'; ?></td>
                                       <td style="text-align: center;"><?php echo ($key->p4) ?></td>
                                       <td><?php echo ($key->per4);echo '%';  ?></td>
                                    </tr>  
                                      <?php 
                                      $total['values']['p0']+=$key->p0;
                                      $total['values']['p1']+=$key->p1;
                                      $total['values']['p2']+=$key->p2;
                                      $total['values']['p3']+=$key->p3;
                                      $total['values']['p4']+=$key->p4;
                                      $total['val']['tot']+=$key->total;
                                      $total['percent']['per0']+=$key->per0;
                                      $total['percent']['per1']+=$key->per1;
                                      $total['percent']['per2']+=$key->per2;
                                      $total['percent']['per3']+=$key->per3;
                                      $total['percent']['per4']+=$key->per4;
                                     
                                      }  ?>   
                            </tbody>
                            <tfoot>
                              <tr>
                                  <th>Total</th>
                                  <th></th>
                                  <th style="text-align: center;"><?php echo number_format($total['val']['tot']) ?></th>
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