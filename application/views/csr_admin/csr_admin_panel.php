
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html  lang="en">
    <!-- BEGIN HEAD OHS-->    
<head>
  
  <style> 
  .input-w label, .input-w input {
    /* if you had floats before? otherwise inline-block will behave differently */
    display: inline-block;
    padding-right: 35px;
}

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
<?php $this->load->view('head.php'); ?>
</head>
    <!-- END HEAD -->
<body id="sample"  class="page-container-bg-solid page-md">

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
                          <center>
                              <div class="form-group panel-heading" style="background-color: #32c5d2;color: #fff;">
                                <label class="control-label"><b>ADMIN UPDATE</b></label>
                              </div>
                                 <div class="form-group">
                                     <input type="hidden" name="hidden" id ="id">
                                                            
                                      <div class="col-md-3">
                                       <output id="name"></output>
                                      </div>
                                       <div class="col-md-3">
                                        <output id="amount"></output>
                                       </div>
                                       <div class="col-md-3">
                                        <output id="cat_name"></output>                  


                                      </div>
                                       <div class="col-md-3" id="pay">
                                 
                                         <output id="payment"></output>   
                                                                                            
                                        </div></br></br></br>
                                          <div class="col-md-4">
                                 
                                          <select id="payment_type" name="payment_type" class="form-control">
                                             <option value="" disabled selected>Payment Type</option>
                                             <option value="1">DD/Cheque</option>
                                              <option value="2">Bank</option>
                                            
  
                                          </select> 
                                        </div><br>
                                        <p id="details"></p>
                                    <div class="form-group"> 
                                           <div class="col-md-4">
                                         <label id="label_online"></label>
                                         <input type="text" id="payment_ref" name="payment_ref" class="form-control">
                                           </div>
                                           <div class="col-md-4">
                                             <label id="date">Date</label>
                                           <input type="datetime-local" id="payment_date" name="payment_date" class="form-control">
                                           </div>
                                           <div class="col-md-4">
                                             <label id="branch">Bank and Branch</label>
                                           <input type="text" id="bank_branch" name="bank_branch" class = "form-control">
                                           </div><br><br>
                                  </div>

                                  <br>
                                   <div class="form-group">
                                        <div class="col-md-4">
                                            
                                          <select id="mode_of_deposit" name="mode_of_deposit" class="form-control">
                                           <option value=""disabled selected>Mode Of Transfer</option>
                                             <option value="1">Cheque Drop</option>
                                              <option value="2">Dispatch</option>
                                            
  
                                          </select> 
                                        </div>
                                         <div class="col-md-4">
                                           <input type="text" id="address" name="cheque_drop_address"  class="form-control">
                                           </div>
                                      </div><br><br>

                                        <div class="col-md-4" id="ss">
                                       <label>Status</label>
                                          <select id="status" name="status" class="form-control">
    
                                             <option value="MAT_RECEIVED">MATERIAL RECEIVED</option>
                                              <option value="FUNDS_RECEIVED">FUNDS RECEIVED</option>
                                              <option value="INITIATED">INTIATED</option>
  
                                          </select> 

                                          <nobr style="color:red" id="demo"></nobr> 
                                                                                            
                                         </div></br><br>
                                         
                                         
                                          <br><br><br><br>
                                            <div class="form-group" id="delivery_dates">
                                                <div class="col-md-3">
                                                      <label>Delivery Date</label><input type="text" id="delivery_date" class="form-control" name="mat_delivery_date">
                                                </div>

                                                  <div class="col-md-3" id="delivery_points">
 
                                                      <label>Delivery Point</label> 
                                                        <textarea rows="2" cols="34" name="mat_delivery_point" class="form-control" name="mat_delivery_point" id="delivery_point">
                                                        </textarea>
                                                  </div>
                                                  <div class="col-md-3" id="remarks">
                                                    <label>Remarks</label> 
                                                      <textarea rows="2" cols="34" name="gen_dev_fund_remarks" class="form-control" id="gen_dev_fund_remarks">
                                                      </textarea>
                                                  </div>

                                                </div>
  
                                          
                                            
                                                
                                            
                                            
                                                    <br><br> 
                                                         <button  onclick="update_click();" id="update_1"  class="btn green">update<i class="fa fa-arrow-circle-right"></i></button>
                                                        
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
                                                            <i class="fa fa-globe"></i>Contributions</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                               
                                                        
                              <table class="table table-striped table-bordered table-hover" id="sample_2">
                              <thead>
                              <tr>                          <th style="text-align:center">Created On</th>
                                                            <th style="text-align:center">UserName</th>
                                                            <th style="text-align:center">Contribution</th>        
                                                            <th style="text-align:center">Amount</th>
                                                            <th style="text-align:center">Payment Mode</th>
                                                            <th style="text-align:center">Status</th>
                                                            <th style="text-align:center">Action</th>
                                                           
                                                          
                              <!--<th>Total</th>-->
                                                                   
                              </tr>
                              </thead>
                              <tbody>
                                    
                                <?php  if(!empty(contribution))
								{	foreach ($contribution as $csr_key => $csr_value) {?>
                                  
								
                              <tr>
                                      
                              <td style="text-align:right"><?php  $date = new DateTime($csr_value['timestamp']);echo $date->format('d-m-Y H:i:s');?></td>
                              <td style="text-align:left"><?php echo $csr_value['name'];?></td>
                              <td style="text-align:center"><?php if($csr_value['cont_type'] == 1){echo 'Fund';}else{echo 'Material';}?></td>
                             
                              <td style="text-align:right"><?php echo $csr_value['amount'];?></td>
                               <td sjaxtyle="text-align:center"><?php if($csr_value['payment_mode'] == 1){echo 'Online';}else if($csr_value['payment_mode'] == 2){echo 'Offline';}else{echo '-';}?></td>

                              
                               <td style="text-align:center"><?php if($csr_value['status'] == "MAT_RECEIVED"){echo "MATERIAL  RECEIVED";}else if($csr_value['status'] == "FUNDS_RECEIVED"){echo "FUNDS RECEIVED";}else{echo "INITIATED";}?></td>
                               <td><button id="ids" type="button" data-toggle="modal" data-todo ='{"id":"<?php echo $csr_value["id"]?>","name":"<?php echo $csr_value["name"]?>","cheque_drop_address":"<?php echo $csr_value["cheque_drop_address"]?>","payment_type":"<?php echo $csr_value["payment_type"]?>","payment_date":"<?php echo $csr_value["payment_date"]?>","bank_branch":"<?php echo $csr_value["bank_branch"]?>","mode_of_deposit":"<?php echo $csr_value["mode_of_deposit"]?>","cont_type":"<?php echo $csr_value["cont_type"]?>","amount":"<?php echo $csr_value["amount"]?>","payment_mode":"<?php echo $csr_value["payment_mode"]?>","status":"<?php echo $csr_value["status"]?>","gen_dev_fund_remarks":"<?php echo $csr_value["gen_dev_fund_remarks"]?>","mat_delivery_point":"<?php echo $csr_value["mat_delivery_point"]?>","mat_delivery_date":"<?php echo $csr_value["mat_delivery_date"]?>","payment_ref":"<?php echo $csr_value["payment_ref"]?>"}' data-target="#myModal" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span></button>
                                
                                 

                               <button onclick="update_child_click();" type="button" data-toggle="modal" data-todo ='{"id":"<?php echo $csr_value["id"]?>"}' data-target="#myModal2" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button>
                          
                               </td>

                              
								<?php }} ?>
                              </tr>
                      
                            
                               

                                                                                 
                           
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
            document.getElementById('name').value = 'Mr/Ms.'.concat(todoId.name);
            // console.log('VVVVALS');
            // console.log(document.getElementById('name').value = todoId.name);
            document.getElementById('amount').value = 'Rs.'.concat(todoId.amount);
            document.getElementById('payment_ref').value = todoId.payment_ref;
            document.getElementById('id').value = todoId.id;
            document.getElementById('payment_date').value = todoId.payment_date;
            document.getElementById('bank_branch').value = todoId.bank_branch;
            console.log(todoId.bank_branch);
            document.getElementById('address').value = todoId.cheque_drop_address;

                $('#mode_of_deposit').val(todoId.mode_of_deposit);
                $('#payment_type').val(todoId.payment_type);
                console.log();
              

            
            
                       
          
            
           

            var get_amount =  document.getElementById('amount').value;
         
            //console.log(get_amount);

            
              
            
            
             if((todoId.status) == "MAT_RECEIVED")
             {
              $('.input-w').hide();
             }
             else
             {
               $('.input-w').show();
             } 
             $('#status').val(todoId.status);
             $('#gen_dev_fund_remarks').val(todoId.gen_dev_fund_remarks);
             $('#delivery_date').val(todoId.mat_delivery_date);
             $('#delivery_point').val(todoId.mat_delivery_point);

          
           console.log(todoId.gen_dev_fund_remarks);
      if(todoId.gen_dev_fund_remarks == todoId.gen_dev_fund_remarks)
      {
        console.log(todoId.gen_dev_fund_remarks);
      } 
          // if(todoId.cont_type == 2 && todoId.amount == document.getElementById('amount').value =todoId.amount)
          // {
          //   console.log('worked');
          // }
          //  //for fund and material assign value
            if(todoId.cont_type == 1)
            {

              todoId.cont_type = 'Contribution :'.concat(' Fund');
              $('#cat_name').val(todoId.cont_type); 
              $('#delivery_points').hide();
              $('#delivery_points').html('');
              $('#delivery_dates').hide();
              $('#delivery_dates').html('');
              $('#remarks').hide();
              $('#remarks').html('');
              
                
            
            }
            else  if(todoId.cont_type == 2)
            {
              todoId.cont_type = 'Contribution - '.concat('Material');
              $('#cat_name').val(todoId.cont_type); 
               $('#delivery_points').show();
               $('#delivery_dates').show();
                $('#remarks').show();
                 todoId.cont_type = 2;
            
            }

 
           
      
            //for payment_mode assing value
            if(todoId.payment_mode == 1)
            {
              todoId.payment_mode ='Mode : '.concat('Online');
              $('#payment').val(todoId.payment_mode);
               $('#payment_type').hide();
               $("#mode_of_deposit").hide();
               $('#payment_ref').show();
               $('#ref_label').show();
               $('#date').hide();
               $('#branch').hide();
               $("#ss").css( { "margin-top" : "40px", "margin-right" : "200px" } );  
                // $("#payment_ref").attr("label", "Payment_ref").blur();
               $("#label_online").text("Reference Id").show();  

            }
            else if(todoId.payment_mode == 2)
            { 
              todoId.payment_mode ='Mode : '.concat('Offline');
              $('#payment').val(todoId.payment_mode);
              $('#payment_type').show();
               $('#ref_label').show();
               $('#date').hide();
               $('#branch').hide();
                  if($('#mode_of_deposit').val() == 1)
                   {
                     $("#address").show();
                    }
              
                    if($('#payment_type').val() == 1)
                    {
                $("#payment_ref").show();
                $("#payment_date").show();
                $("#bank_branch").show();
                $("#details").show();
                $("#label_online").text("DD/Cheq No").show();  
                $("#label_online").show();
                $('#date').show();
               $('#branch').show();
                }
                else if($('#payment_type').val() == 2)
                {
                  $("#payment_ref").show();
                $("#payment_date").show();
                $("#bank_branch").hide();
                $("#branch").hide();  
                $("#details").show();
                $("#date").show();
                $("#label_online").text("Bank Ref Id");
                $("#label_online").show();
                $("#mode_of_deposit").hide();
                // $("#address")+"\nfoo";
                // $("#address")+"\nfoo";
                //$('#status').val($('#status').val() + '<br/>');
                $("#address").hide();
                
                  if($('#cheque_drop_address').val() == 2)
                  {
                   $("#mode_of_deposit").hide(); 
                   $("#address").hide();
                   $("#address").html('');    
                  }
                } 
            }
            else
            {
              todoId.payment_mode ='-';
              $('#payment').val(todoId.payment_mode);
               $('#payment_type').hide();
               $("#mode_of_deposit").hide();
                $('#date').hide();
               $('#branch').hide();
            }
                
               
         })

  


  $('#cat_name').attr("disabled", true); 
// document.getElementById('delivery_dates').valueAsDate = new Date();
//for payment type dropdown hide.show
$( document ).ready(function() {
      $("#payment_ref").hide();
      $("#payment_date").hide();
      $("#bank_branch").hide();
      $("#details").hide();
      $("#address").hide();
      $("#label_online").hide();      
// console.log($('#payment_type').val());


//  if ($("#payment_type").val() == "1") 
//         {
//                console.log("FOUND");
// //                //  $("#payment_ref").show();
// //                //  $("#payment_date").show();
// //                //  $("#bank_branch").show();
// //                //  $("#details").show();
// //                //  $("#label_online").show();
// //                //  $('#date').show();
// //                // $('#branch').show();
// //                //  $("#bank_branch").empty();

                
//              // }
//  }
// var assign = $("#payment_type").val();
// alert(assign);
 
       $(function () {

        $("#payment_type").change(function () {
           
            if ($(this).val() == "1") 
            {
                $("#payment_ref").show();
                $("#payment_date").show();
                $("#bank_branch").show();
                $("#details").show();
                 $("#label_online").text("DD/Check No");
                $("#label_online").show();
                $('#date').show();
               $('#branch').show();
                $("#bank_branch").empty();
                $("#mode_of_deposit").show();

                  $("#address").hide();
                   if($("#mode_of_deposit").val() == "1")
                 {
                    //$("#mode_of_deposit").hide();
                    $("#address").show();


                 }


                 if($("#mode_of_deposit").val() == "2")
                 {
                    //$("#mode_of_deposit").hide();
                    $("#address").hide();
                    $("#address").val('');

                    


                 }



                
            } else if ($(this).val() == "2")
            {
               
                $("#payment_ref").show();
                $("#payment_date").show();
                $("#bank_branch").hide();
                $("#bank_branch").val('');
                
                $("#branch").hide();  

                $("#details").show();
                $("#date").show();
                 $("#label_online").text("Bank Ref Id");
                $("#label_online").show();
                // $("#mode_of_deposit").hide();
                //  $("#address").hide();
                 if($("#mode_of_deposit").val() == "2")
                 {
                    $("#mode_of_deposit").hide();
                    $("#address").hide();
                 }

            }
        });
    });
       });

       $("#details").hide();

$(function () {
        $("#mode_of_deposit").change(function () {
            if ($(this).val() == "1") 
            {
               
                $("#address").show();

                
            } else if ($(this).val() == "2")
            {
               
                
                $("#address").hide();
                $("#address").html('');
                
            }
        });
    });
$(function () {
        $("#ddlPassport").change(function () {
            if ($(this).val() == "Y") {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });


function update_child_click()
{ 
   $('#myModal2').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
           var todoId = button.data('todo');
           //getting values
       //console.log(todoId.id);
       document.getElementById('cont_id').value = todoId.id;
       
           
         var Id = todoId.id;
           // console.log(Id);
           $.ajax({

                url: '<?php echo base_url();?>Csr_admin_controller/update_child',  // define here controller then function 
               method: 'POST',
               data:{Id:Id},
               dataType: 'JSON',
              
               success:function (data) {
                           
            //console.log(data);
  //           var a = 0;
              


   var id = 0;
              data.forEach(function(element) {
                 var status_id='#'+'status'+(id + 1);
                 var status_id_ignore_hash = 'status'+(id + 1);
                 var split = status_id.slice(7);
                 console.log(split);
              console.log(status_id);
              console.log(status_id+" "+"option");
              console.log(status_id_ignore_hash);
               

            $('#table_id').append('<tr><td>'+ element.timestamp +'</td><td>'+ element.amount +'</td><td>'+ element.district_name +'</td><td>'+ element.school_name +'</td><td>'+ element.req_id +'</td><td>'+ element.qty +'</td><td><select id ="'+ status_id_ignore_hash +'" name="'+ status_id_ignore_hash +'"><option value="MAT_RECEIVED">MATERIAL RECEIVED</option><option value="FUNDS_RECEIVED">FUNDS RECEIVED</option><option value="INITIATED">INITIATED</option></select></td><td><button type="button" onclick="update_child_list('+element.id+','+split+')" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit" id="update"></span></button></td></tr>');

              // console.log(element.status);
               if(element.status  == "MAT_RECEIVED")
                {
                   $(status_id+" "+"option[value='MAT_RECEIVED']").attr('selected','selected');
              // $(status_id +' '+"option:selected").attr("MAT_RECEIVED");
               //$(status_id +' '+"option:selected").val("MAT_RECEIVED");
                // console.log('MATERIAL');
                }
                else if(element.status  == "FUNDS_RECEIVED")
                {
                  // var sample = $("select"+status_id+' '+"> option:selected").val();
                  // console.log(sample);
                  // $(status_id).val('FUNDS_RECEIVED');
                  $(status_id+" "+"option[value='FUNDS_RECEIVED']").attr('selected','selected');

                 //// $(status_id).val($(status_id+" "+"option").eq("FUNDS_RECEIVED").val());
        }


                //var sample =  $(status_id+':selected').val();
                  //console.log($(status_id+"option:selected" ).attr("value"));
                  //var $option = $(status_id).find('option:selected');

    // //Added with the EDIT
    // var value = $option.val();
    //  console.log(value);
    // var conceptName = $(status_id).find(":selected").attr('value');
    // //              // $(status_id +' '+"option[value='FUNDS_RECEIVED']").prop('selected',true);
    //                  console.log(conceptName);
                   // $(status_id +' '+'option[value="FUNDS_RECEIVED"]').attr("selected","selected");
                   // $(status_id +' ').find('option[value="FUNDS_RECEIVED"]').attr('selected','selected')
                   
                
                 else if(element.status  == "INITIATED")
                {
                    $(status_id+" "+"option[value='INITIATED']").attr('selected','selected');
                  //$(status_id +' '+"option:selected").attr("INITIATED");
                   // console.log('INTITATED');
                }
               
       
             


       id++;
          // document.getElementById('table_id').innerHTML = data;
         });
           
      }
   });
 })
} 
function update_child_list(id,row_id){
   
//console.log(id);

//   //      $(document).ready(function() {
//   // $(this).on('change', function() {
//   //   alert($(this).val());
//   });
// });

 var status_id = $('#status'+row_id).val();
          $.ajax({
                 url: '<?php echo base_url();?>Csr_admin_controller/Update_csr_admin_child_details',  // define here controller then function 
                 method: 'POST',
                 data: {id:id,status_id:status_id},
                 dataType:'text',
                 crossDomain : true,
				
                 success:function(success) {
                             alert("Updated Successfully!");
                                     }
                 });
                       }     

                //
  //             $(document).ready(function(){ 
  //             $("#emis_state_report_schcate").change(function(){ 

  //              var emis_state_report_schcate = $("#emis_state_report_schcate").val();

      

  // });  }); 

  function update_click(){
        var formValues = $('#form_update').serialize();
          $.ajax({
                url: '<?php echo base_url();?>Csr_admin_controller/Update_csr_admin_details',  // define here controller then function 
                method: 'POST',
                data: {form :formValues},
                dataType:'text',
                crossDomain : true,
                  success:function(success) {
                              alert("update Successfully");
                                    }
                });
                        }     

                //
              $(document).ready(function(){ 
              $("#emis_state_report_schcate").change(function(){ 

               var emis_state_report_schcate = $("#emis_state_report_schcate").val();

      

  });  }); 

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_state_report_schcate").change(function(){
      return validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 
});   });

// $(document).ready(function(){  // function call for validate company name 
//     $("#emis_state_report_schmanage").change(function(){
//       return validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert'); 
// });   });


function checkmanagecate(){

var baseurl='<?php echo base_url(); ?>';

//var manage = validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert');
var cate = validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 

//var manage1=$("#emis_state_report_schmanage").val();
var cate1 = $("#emis_state_report_schcate").val();

if(cate == 0 ){
    return false;
}

  $.ajax({
        type: "POST",
        url:baseurl+'State/savereport_schoolcatemanage',
        data:"&cate="+cate1,
        success: function(resp){
        // alert(resp);  
        // location.reload(true);
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
       
}



function remove_catefilter(){

  $.ajax({
        type: "POST",
        url:baseurl+'State/deletereport_schoolcatemanage',
        data:"&test=1",
        success: function(resp){
        // alert(resp);  
        location.reload(true);
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
}


 function reload(){
    setTimeout(function(){location.reload()}, 0);
  }

$('#emis_state_report_schmanage').click(function () {    
        console.log(this.checked,$('input:checkbox').find(".school_manage").find());
     $('input:checkbox').prop('checked', this.checked);
     if(this.checked){    
     console.log($(this).val());
     }
 });

$("#select_all").change(function(){ 
 //"select all" change 
    $(".emis_state_report_schcate").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});




//".checkbox" change 
$('.emis_state_report_schcate').change(function(){ 
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(false == $(this).prop("checked")){ //if this item is unchecked
        $("#select_all").prop('checked', false); //change "select all" checked status to false
    }
    //check "select all" if all checkbox items are checked
    if ($('.emis_state_report_schcate:checked').length == $('.checkbox').length ){
        $("#select_all").prop('checked', true);
    }
});


 </script>  


        <script>(function($) {

  'use strict';

  $(document).on('show.bs.tab', '.nav-tabs-responsive [data-toggle="tab"]', function(e) {
    var $target = $(e.target);
    var $tabs = $target.closest('.nav-tabs-responsive');
    var $current = $target.closest('li');
    var $parent = $current.closest('li.dropdown');
        $current = $parent.length > 0 ? $parent : $current;
    var $next = $current.next();
    var $prev = $current.prev();
    var updateDropdownMenu = function($el, position){
      $el
        .find('.dropdown-menu')
        .removeClass('pull-xs-left pull-xs-center pull-xs-right')
        .addClass( 'pull-xs-' + position );
    };

    $tabs.find('>li').removeClass('next prev');
    $prev.addClass('prev');
    $next.addClass('next');
    
    updateDropdownMenu( $prev, 'left' );
    updateDropdownMenu( $current, 'center' );
    updateDropdownMenu( $next, 'right' );
  });

})(jQuery);</script>
             
    </body>

</html>