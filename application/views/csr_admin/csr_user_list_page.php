
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD SOLVE -->    
<head>
  
  <style> 
  .input-w label, .input-w input {
    /* if you had floats before? otherwise inline-block will behave differently */
    display: inline-block;
    padding-right: 35px;
}
 table {border-collapse:collapse; table-layout:fixed; width:310px;}
   table tr {border:solid 1px #fab; width:100px; word-wrap:break-word;}
.center 
{
text-align: center;
}   
 </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
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
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<?php $this->load->view('head.php'); ?>
</head>
    <!-- END HEAD -->
<body class="page-container-bg-solid page-md">

<div class="page-wrapper">
            
   <?php $this->load->view('csr_admin/csr_admin_header.php'); ?>
 
      <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">

         <div class="modal fade" id="myModal" role="dialog">

           <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
             <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="reload();">&times;</button>
                      <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                                    
                    <form  method="post" class="form_update" id="form_update">
                        <div class="col-md-12 thumbnail" >
                         
                              <div class="form-group panel-heading" style="background-color: #32c5d2;color: #fff;">
                                <label class="control-label"><b>USER DETAILS</b></label>
                              </div>
                                 <div class="form-group">
                                     <input type="hidden" name="hidden" id ="id">
                                                            
                                      <div class="col-md-5">
                                       <nobr><output id="name"></output></nobr>
                                      </div>
                                       <div class="col-md-5">
                                       <nobr> <output id="email"></output></nobr>
                                       </div><br><br>
                                       <div class="col-md-5">
                                        <nobr><output id="mobile"></output></nobr>                  


                                      </div>
                                       <div class="col-md-5">
                                 
                                       <output id="orgname"></output>  
                                                                                            
                                        </div><br><br>
                                      <div class="col-md-5">
                                 
                                         <nobr><output id="org_pan"></output></nobr>   
                                                                                            
                                        </div>
                                         <div class="col-md-5">
                                 
                                         <nobr><output id="org_other_details"></output></nobr>   
                                                                                            
                                        </div><br><br>
                                   </div>
                                   
                                       

                                        
                                                                                            
                                       
                                         
                                         
                                          <br><br><br><br>
                                           
  
                                          
                                            
                                                
                                            
                                            
                                                   
                                                    </center>
                                                  
                                        </div>
                </form>
        </div>

                      <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" onClick="reload();">Close</button>
                     </div>

              </div>
             
         </div>
  </div>

       <div class="modal fade" id="myModal2" role="dialog">

     <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
            <div class="modal-content">
                      <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" onClick="reload();">&times;</button>
                                  <h4 class="modal-title"></h4>
                      </div>
                <div class="modal-body">
                                    
                    <form  method="post">
                                      <div class="col-md-12 thumbnail" >
                                            <center>
                                                <div class="form-group panel-heading" style="background-color: #32c5d2;color: #fff;">
                                                <label class="control-label"><b>SCHOOL UPDATE</b></label>
                                                </div>
 <div class="form-group">
                                      <input type="hidden" name="hidden" id ="cont_id">
      
                                                         
    
   
   

 

<div class="col-md-12" id="hodm_table">
  <form name="form_update_child_list" id="form_update_child_list">
    <div class="table-responsive">
<table id="example" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                <th style="text-align:left">Created On</th>
                <th style="text-align:left">Amount</th>
                <th style="text-align:center">District</th>
                <th style="text-align:center">School</th>
                <th  style="text-align:left">Requirement</th>
                <th style="text-align:left">Quantity</th>
               <th style="text-align:center">Status</th>
               <th>Action</th>
            </tr>
        </thead>
       
        <tbody id="table_id">
 
        
       

        </tbody>
</div>
      </form>
    
    </table> 
 

</div><br><br> 
                                            
</center>
</div>
  </form>
        </div>

                      <div class="modal-footer">
                        <!--  <button  onclick="update_click();"  class="btn green">update<i class="fa fa-arrow-circle-right"></i></button> -->
                                <button type="button" class="btn btn-default" data-dismiss="modal" onClick="reload();">Close</button>
                     </div>

              </div>
             
         </div>
  </div>
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
                                         <h1>
                                      
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
                          
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                               
                                             
                                             <br>
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>CSR- USERS</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                               
                                                        
                              <table class="table table-striped table-bordered table-hover" id="sample_2">
                              <thead>

                              <tr>                        
                                                          
                                                            <th style="text-align:center">Created On</th>
                                                            <th  style="text-align:center">Name</th>
                                                            <th  style="text-align:center">Email</th>        
                                                            <th  style="text-align:center">Mobile</th>
                                                            <th  style="text-align:center">Org</th>
                                                            <th  style="text-align:center">PAN</th>
                                                            <th  style="text-align:center">Org Address</th>
                                                            <th>Profile Share<br> Option</th>
                                                            <th style="text-align:center;word-wrap:break-word">Notify Option</th>
                                                            <th style="text-align:center">Action</th>
                                                           
                                                         
                                                            
                                                           
                                                          
                              <!--<th>Total</th>-->
                                                                   
                              </tr>
                              </thead>
                              <tbody>
                                <form>

                                 
                                     
                                     <?php  foreach ($csr_user_list as $csr_key => $csr_value) {?>
                                  
                                   
                                                                   
                              <tr>
                             
                              <td style="text-align:left"><?php  $date = new DateTime($csr_value['created_on']);echo $date->format('d-m-Y H:i:s');?></td>
                              <td style="text-align:left"><?php echo $csr_value['name'];?></td>
                              <td style="text-align:left"><?php echo $csr_value['email'];?></td>
                              <td style="text-align:left"><?php echo $csr_value['mobile'];?></td>
                              <td style="text-align:left"><?php echo $csr_value['orgname'];?></td>
                               <td style="text-align:right"><?php echo $csr_value['org_pan'];?></td>
                              <td style="text-align:left"><?php echo $csr_value['org_address'];?></td>
                              <td  style="text-align:left"><?php if($csr_value['profile_share'] == 1){echo 'YES';}else{echo 'NO';}?></td>
                               <td  style="text-align:left"><?php if($csr_value['notify_pref'] == 1){echo 'YES';}else{echo 'NO';}?></td>
                                 

                             <td> <a href="<?php echo base_url();?>Csr_admin_controller/csr_user_for_contribution/<?php echo $csr_value['id'];?>" type="button" class="btn btn-info btn-xs"><i class='fas fa-donate' style='font-size:15px'></i></a>
                             
                               </td> 

                              
                                  <?php } ?>
                              </tr>
                      
                            
                               

                                                                                 
                           </form>
                            </tbody>
                              <tfoot>
                                                                
                                                            </tfoot> 
                               
                            </table>

                                                        
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

 
      
$('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
           var todoId = button.data('todo');
           //getting values

          console.log(todoId);
       
             //   $('#status').change(function(){
             //    var get_current_status = document.getElementById("status").value;
              
             //   var trim_value =todoId.cont_type.slice(7);
             //     console.log(trim_value);
             //    console.log(get_current_status);
             //    if(todoId.cont_type == 1 && get_current_status == "MAT_RECEIVED")
             //     {
        
             //      document.getElementById("demo").innerHTML = "*Wrong Selection For Contribution FUNDS";
             //      $("#update_1").prop('disabled', true);
             //     }
             //   if(todoId.cont_type == "FUND" && get_current_status == "MAT_RECEIVED")
             //   {
             //          alert("hi");
             //          document.getElementById("demo").innerHTML = "*Wrong Selection For Contribution MATERIALS";
             //           $("#update_1").prop('disabled', true);
             //   } 
             //   else
             //   {
             //       document.getElementById("demo").innerHTML = "";
             //        $("#update_1").prop('disabled', false);
             //   }
             // }) 

             $("#status").change(function(){
             //  alert(todoId.cont_type);
               var get_current_status = document.getElementById("status").value;
               console.log(todoId.cont_type);
               if((todoId.cont_type == "Contribution : Fund") && (get_current_status =="MAT_RECEIVED"))
               { 
                console.log(todoId.cont_type);
              
                document.getElementById("demo").innerHTML = "*Wrong Selection For Contribution FUNDS";
                $("#update_1").prop('disabled', true);

               }

                else if(todoId.cont_type == "2" && get_current_status =="FUNDS_RECEIVED")
                {

                document.getElementById("demo").innerHTML = "*Wrong Selection For Contribution MATERIALS";
                 $("#update_1").prop('disabled', true);
                }
                else
                {
                     document.getElementById("demo").innerHTML = "";
                      $("#update_1").prop('disabled', false);
                 }
             })
             
           // if(todoId.isactive == "1")
           // {
           //  $('#active').prop('checked',true);
           // }
           // var a = $("#status").val();
           // alert(a);
               document.getElementById('name').value = 'UserName : '.concat(todoId.name);
               document.getElementById('email').value = 'Email Id : '.concat(todoId.email);
               document.getElementById('mobile').value = 'Mobile : '.concat(todoId.mobile);
               document.getElementById('orgname').value = 'Organisation : '.concat(todoId.orgname);
               document.getElementById('org_pan').value = 'PanCard No : '.concat(todoId.org_pan);
               document.getElementById('org_other_details').value = 'Organisation Details : '.concat(todoId.org_other_details);
               
            // console.log('VVVVALS');
            // console.log(document.getElementById('name').value = todoId.name);
          
        });

function contribute_user(val){
  
   
//console.log(id);

//   //      $(document).ready(function() {
//   // $(this).on('change', function() {
//   //   alert($(this).val());
//   });
// });
var Id = val;
console.log(Id);

 
          $.ajax({
                  url: '<?php echo base_url();?>Csr_admin_controller/csr_user_for_contribution',  // define here controller then function 
                    method: 'POST',
                     data: {Id:Id},
                     dataType:'text',
                     crossDomain : true,
                     success:function(success) {
                          

                                   }
                  });
                       }     

  

</script>
             
    </body>

</html>