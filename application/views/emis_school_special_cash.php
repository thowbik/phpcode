<?php 

    
      

    //   print_r($this->session->userdata());
     // print_r($section_details);die;
     ?>     
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
      <style type="text/css">
      .clickable{
    cursor: pointer;   
}
  .panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.center
{
    text-align: center;
}
.tablecolor
{
    background-color: #32c5d2; 
}
body.modal-open {
    overflow-y: hidden !important;
    position: fixed;
}
.dt-button-collection a.buttons-columnVisibility:before,
.dt-button-collection a.buttons-columnVisibility.active span:before {
    display:block;
    position:absolute;
    top:1.2em;
    left:0;
    width:12px;
    height:12px;
    box-sizing:border-box;
}


.dt-button-collection a.buttons-columnVisibility:before {
    content:' ';
    margin-top:-6px;
    margin-left:10px;
    border:1px solid black;
    border-radius:3px;
}

.dt-button-collection a.buttons-columnVisibility.active span:before {
    content:'\2714';
    margin-top:-11px;
    margin-left:12px;
    text-align:center;
    text-shadow:1px 1px #DDD, -1px -1px #DDD, 1px -1px #DDD, -1px 1px #DDD;
}

.dt-button-collection a.buttons-columnVisibility span {
    margin-left:20px;    
}

</style>
</style>
    <style type="text/css" media="print">
  @page { size: landscape; }
</style>
 <style type="text/css" media="file">
  @page { size: landscape; }
</style>
    
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
                        

        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

<?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>


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
                                        <h1>Student Special Cash Incentive
                                            
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
                                     <div class="row margin-bottom-20">
                                    <div class="">
<!-- <div class="col-lg-12">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> <?php if($schoolname!=""){ echo $schoolname; } ?> ( <?php if($udise_code!=""){ echo $udise_code; } ?> )</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-9 ">
                                                
                                                   
                                                <div class="col-lg-12 col-md-6 ">
                                                     <h3>Block : <?php if($blockname!=""){ echo $blockname; } ?> <br/></h3>
                                                    <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management :</font>  <?php if($schmanage!=""){ echo $schmanage; } ?> 
                                                    
                                                    <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category :</font> 
                                                 <?php if($schoolcate!=""){ echo $schoolcate; } ?>
                                                    <br/>
                                                  <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate :</font>  <?php if($schdirector!=""){ echo $schdirector; } ?> 
                                                
                                                   
                                                </div>
                                            </div>

                                                
                </div>
        </div>
    
    </div> -->
                                       
                                           

                                        </div>
                                       

                                </div>

                                    
           
                                        <!-- BEGIN CARDS -->
                                        
                                       
                                              
                                                  <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Special Cash Incentive</span>
                                                </div>

                                            </div>

                                                
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Special Cash Incentive</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    <?php if(!empty($allstuds)){  
                                                       // echo"<pre>";print_r($allstuds);echo"</pre>";?>
                                                        <table class="table table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th> sno </th>                        
                                                                    <!-- <th class=""> Register.No</th> -->
                                                                    
                                                                    <th> Studnets Name </th>
                                                                               
                                                                    <th> Students ID </th>
                                                                      <th>Class </th>
                                                                    <th>Section</th>                                  
                                                                    <th>Student Eligible</th>
                                                                    <th class=""> IFSC Code </th>
                                                                    
                                                                    <th> MICR.No </th>                                                     
                                                                    <th class="">Bank Name</th>
                                                                    <th class="">Branch Name</th>
                                                                    <th >Bank Account </th>
                                                                    <th class="">Bank Account Opened Date</th>
                                                                    <th class="detail"> Bank Account Status</th>

																	 
                                                                    <th class="detail"> Students Mobile Number </th>
                                                                    <th class="detail">X STD Studied In</th>
                                                                    
                                                                    <th class="detail"> XI STD Studied In</th>
                                                                    <th class="detail">XII STD Studied In</th>
                                                                    <th class="sum">Total</th>
                                                                    
                                                                    <!-- <th>Transfer</th> -->
                                                                </tr>
                                                                </thead>
                                                                 <tbody>
                                                                <?php  foreach($allstuds as $index=> $all){ 
                                                                        $index = $index+1;
                                                                    ?>
                                                                <tr> 
                                                                    <td><?=$index;?></td>
                                                                    <!-- <td><?=(!empty($all->reg_no)?$all->reg_no:'--');?></td> -->
                                                                    
                                                                    <td><?=$all->name;?></td>
                                                                    <td class="center"><a href="javascript:void(0);" onclick="opentab('<?=$all->stu_id;?>')"><?=$all->stu_unique_id;?></a></td>
                                                                    <td><?=$all->class_studying_id;?></td>
                                                                    <td><?=$all->class_section;?></td>
                                                                    <td><?php 
                                                                        if($all->student_eligible !=''){
                                                                        switch ($all->student_eligible) {
                                                                            case 1:
                                                                               echo "Eligible";
                                                                                break;
                                                                            case 0:
                                                                                echo "Not Eligible";
                                                                                break;
                                                                            default:
                                                                               echo "Not Eligible";
                                                                                break;
                                                                        }
                                                                    }
                                                                    ?></td>
                                                                    <td><?=$all->ifsc_code;?></td>
                                                                    
                                                                    <td><?=$all->micr_code;?></td>
                                                                    <td><?=$all->bank_name;?></td>
                                                                    <td><?=$all->branch;?></td>
                                                                    <td><?=$all->bank_acc;?></td>
                                                                    <td><?=(!empty($all->bank_acc_open_date)?date('d-m-Y',strtotime($all->bank_acc_open_date)):'');?></td>
                                                                    <td><?php 
                                                                            $bank_status = $all->bank_acc_status;
                                                                            // echo $bank_status;
                                                                        if(!empty($bank_status)){
                                                                            echo ($bank_status==1?'Active':'InActive');
                                                                        }
                                                                    ?></td>
                                                                    <td><?=$all->phone_number;?></td>
                                                                    <td><?=$all->study_at_X;?><?=(!empty(('/ '.$all->study_at_X_sec==0?'':$all->study_at_X_sec)));?></td>
                                                                    <td><?=$all->study_at_XI;?><?=(!empty(('/ '.$all->study_at_XI_sec==0?'':$all->study_at_XI_sec)));?></td>
                                                                    <td><?=$all->study_at_XII;?><?=(!empty(('/ '.$all->study_at_XII_sec==0?'':$all->study_at_XII_sec)));?></td>
                                                                    <td><?=$all->total;?> </td>
                                                                                                                               
                                                                                                                              
                                                                </tr>
                                                                <?php  } ?>
                                                           
                                                      
                                                            </tbody>
                                                            <tfoot>
                                                                <th colspan="16">Total</th>
                                                                <th></th>
                                                            </tfoot>
                                                        </table>
                                                         <?php } else { ?><center>No Data Available!</center><?php } ?>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        


                                               <br>





                                        <!-- END CARDS -->

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

        <div class="modal fade" id="special_cash_modal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <div class="row">
                <div class="col-md-7">
          <h4 class="modal-title" id="stu_id"></h4>
      </div>
      <div class="col-md-4">
        <div class="form-check">
                    <label class="control-label">Student Status</label>
                        <div class="form-group">
                           <select class="form-control" data-placeholder="Choose a Status" id="stu_eligible" name="stu_eligible">
                               
                                <option value="0">Not Eligible</option>
                                <option value="1">Eligible</option>
                            </select>
                                <font style="color:#dd4b39;"><div id="bank_acc_status_alert"></div></font>
                       </div>
                </div>
      </div>
      <div class="col-md-1">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
          </div>
        </div>
        <div class="modal-body">
            <!------ Bank Details--------->
            <form method="post">
            <div class="row">
                <input type="hidden" name="school_id" id="school_id">
                <div class="col-md-6">
                       <label class="control-label">IFSC Code *</label>
                       <div class="form-group">
                           <div class="">
                                <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" onchange="get_ifsc(this.value,<?=$index;?>)" maxlength="11" placeholder="IFSC Code" required>
                                <font style="color:#dd4b39;"><div id="ifsc_code_alert"></div></font>
                          </div>
                     </div>
                </div>
                <div class="col-md-6">
                       <label class="control-label">MCIR No *</label>
                       <div class="form-group">
                           <div class="">
                                <input type="text" class="form-control" id="MCIR_No" name="emis_reg_stu_admission" placeholder="" readonly>
                                <font style="color:#dd4b39;"><div id="MCIR_No_alert"></div></font>
                          </div>
                     </div>
                </div>
                <div class="col-md-6">
                       <label class="control-label">Branch Name *</label>
                       <div class="form-group">
                           <div class="">
                                <input type="text" class="form-control" id="branch_name" readonly name="branch_name">
                                <font style="color:#dd4b39;"><div id="branch_name_alert"></div></font>
                          </div>
                     </div>
                </div>
                <div class="col-md-6">
                       <label class="control-label">Bank Name </label>
                       <div class="form-group">
                           <div class="">
                                <input type="text" class="form-control" id="bank_name" readonly>
                                <font style="color:#dd4b39;"><div id="bank_name_alert"></div></font>
                          </div>
                     </div>
                </div>
                <div class="col-md-6">
                       <label class="control-label">Bank Account *</label>
                       <div class="form-group">
                           <div class="">
                                <input type="text" class="form-control" id="bank_acc_no" name="bank_acc_no" maxlength="20" onchange="check_acc_no(this.value);"placeholder="" autocomplete="off">
                                <font style="color:#dd4b39;"><div id="bank_acc_no_alert"></div></font>
                          </div>
                     </div>
                </div>
            
                <div class="col-md-6">
                       <label class="control-label">Bank Account Open Date*</label>
                       <div class="form-group">
                           <div class="">
                                <input type="text" id="bank_acc_open_data" name="bank_acc_open_data"  class="form-control date" value="" autocomplete="off" placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48"required />
                                <font style="color:#dd4b39;"><div id="bank_acc_open_data_alert"></div></font>
                          </div>
                     </div>
                </div>
                </div>
            <div class="row">
                <div class="col-md-6">
                        <label class="control-label">Bank Account Status</label>
                        <div class="form-group">
                           <select class="form-control" data-placeholder="Choose a Status" id="bank_acc_status" name="bank_acc_status">
                                <option value="-1" >Select Account Status</option>
                                <option value="1">Active</option>
                                <option value="2">InActive</option>
                            </select>
                                <font style="color:#dd4b39;"><div id="bank_acc_status_alert"></div></font>
                       </div>
                </div>
                <div class="col-md-6">
                       <label class="control-label">Students Mobile Number *</label>
                       <div class="form-group">
                           <div class="">
                                <input type="text" class="form-control" id="stu_mobile_no" name="stu_mobile_no" maxlength="20" placeholder="" required autocomplete="off" readonly>
                                <font style="color:#dd4b39;"><div id="stu_mobile_no_alert"></div></font>
                          </div>
                     </div>
                </div>
            </div><!---- Row Complete---->
            <div class="row">
                <div class="col-md-6">
                        <label class="control-label">X Std Studied IN *</label>
                        <div class="form-group">
                           <select class="form-control" data-placeholder="Choose a Category"  id="study_at_X" name="study_at_X" required>
                                <option value="-1" style="color:#bfbfbf;">Select Category</option>
                                <option value="Government">Government</option>
                                <option value="Aided">Aided</option>
                                <option value="Partially Aided">Paritial Aided</option>
                                <option value="Un-aided">Un Aided</option>            
                             </select>
                                <font style="color:#dd4b39;"><div id="bank_acc_status_alert"></div></font>
                       </div>
                </div>

                <div class="col-md-6 section_group" id="study_at_X_sec_group" >
                        <label class="control-label">X Std Studied IN Section</label>
                        <div class="form-group">
                           <select class="form-control" data-placeholder="Choose a Category"  id="study_at_X_sec" name="study_at_X_sec" required>
                                <option value="-1" style="color:#bfbfbf;">Select Category</option>
                                <option value="Aided">Aided</option>
                                <option value="Self Finance">Self Finance</option>
                                                         
                             </select>
                                <font style="color:#dd4b39;"><div id="bank_acc_status_alert"></div></font>
                       </div>
                </div>
                
            </div>
            <div class="row">
                <!--- 2 nd --->
                <div class="col-md-6">
                        <label class="control-label">XI Std Studied IN *</label>
                        <div class="form-group">
                           <select class="form-control" data-placeholder="Choose a Category"  id="study_at_XI" name="study_at_XI" required>
                                <option value="-1" style="color:#bfbfbf;">Select Category</option>
                                <option value="Government">Government</option>
                                <option value="Aided">Aided</option>
                                <option value="Partially Aided">Paritial Aided</option>
                                <option value="Un-aided">Un Aided</option>                
                             </select>
                                <font style="color:#dd4b39;"><div id="bank_acc_status_alert"></div></font>
                       </div>
                </div>
                <div class="col-md-6 section_group" id="study_at_XI_sec_group">
                        <label class="control-label">XI Std Studied IN Sec*</label>
                        <div class="form-group">
                           <select class="form-control" data-placeholder="Choose a Category"  id="study_at_XI_sec" name="study_at_XI_sec" required>
                                <option value="-1" style="color:#bfbfbf;">Select Category</option>
                                <option value="Aided">Aided</option>
                                <option value="Self Finance">Self Finance</option>
                                              
                             </select>
                                <font style="color:#dd4b39;"><div id="bank_acc_status_alert"></div></font>
                       </div>
                </div>
                </div>
            <div class="row">
                <!-- 3 rd -->
                <div class="col-md-6">
                        <label class="control-label">XII Std Studied IN *</label>
                        <div class="form-group">
                           <select class="form-control" data-placeholder="Choose a Category"  id="study_at_XII" name="study_at_XII" required>
                                <option value="-1" style="color:#bfbfbf;">Select Category</option>
                                <option value="Government">Government</option>
                                <option value="Aided">Aided</option>
                                <option value="Partially Aided">Paritial Aided</option>
                                <option value="Un-aided">Un Aided</option>               
                             </select>
                                <font style="color:#dd4b39;"><div id="bank_acc_status_alert"></div></font>
                       </div>
                </div>
                <div class="col-md-6 section_group" id="study_at_XII_sec_group">
                        <label class="control-label">XII Std Studied IN Sec*</label>
                        <div class="form-group">
                           <select class="form-control" data-placeholder="Choose a Category"  id="study_at_XII_sec" name="study_at_XII_sec" required>
                                <option value="-1" style="color:#bfbfbf;">Select Category</option>
                                <option value="Aided">Aided</option>
                                <option value="Self Finance">Self Finance</option>
                                                         
                             </select>
                                <font style="color:#dd4b39;"><div id="bank_acc_status_alert"></div></font>
                       </div>
                </div>

            </div><!-------Row End--------->
            
        </div>
        <form>
        <div class="modal-footer">
          <div id="save_load"></div><button type="button" class="btn btn-success" id="save_btn" onclick="save()">Save</button>
          <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
          <font style="color:#dd4b39;"><div id="save_err"></div></font>
        </div>
      </div>
      
    </div>
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
                            


              <script type="text/javascript">

               function savestudentid1(value){
                var baseurl='<?php echo base_url(); ?>';
                $.ajax({
                type: "POST",
                url:baseurl+'Home/savestudentidsession',
                data:"&studid="+value,
                success: function(resp){ 
                if(resp==true){    
                window.open(baseurl+'Home/emis_student_profile1','_blank');
                 }
                 return true;  
                         
                 },
                error: function(e){ 
                return false;  

                }
                });
               }
              </script>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
    // $('.display').dataTable();
    
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           
 var curr = new Date();

// console.log(curr.getFullYear()-19); 
var first = new Date(curr.getFullYear() -19,'01','01');
var end = new Date(curr.getFullYear() ,curr.getMonth(), curr.getDate()+1);

$('.date').datepicker({
    // daysOfWeekDisabled: [0,6]
        
    

});
$(".date1").datepicker({
   
});
// console.log(first,end);
 // $('.date').datepicker("setStartDate",first);

$('.date').datepicker("setEndDate",end);
 // $(".datepicker").val(new Date());

      });
        function textvalidate(id,alertid){
                
            var text = document.getElementById(id);
            var alt = document.getElementById(alertid);
            if(text.value==''){
                alt.innerHTML="Required Field";
            }else {
                alt.innerHTML="";
            }
        }
    </script>
<script type="text/javascript">
  var class_id = 0;
    $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    }
})



</script>
<script type="text/javascript">
    var table = '';
    $(document).ready(function()
{
   var table =  sum_dataTable('#sample_3',7);

   function sum_dataTable(dataId,col){
    // alert();
    table = $(dataId).DataTable({
      dom: 'Blfrtip',
      "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 10,
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
        
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
           columnDefs: [
            
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
               console.log(sum);
            sum = sum.toLocaleString(undefined, {maximumFractionDigits:3});
            $(column.footer()).html(sum);
                        });
            }
        });
    return table;
    }


      
        // console.log(table);
      
  
  //       console.log('i');
  //     table.on( 'order.dt search.dt', function () {
  //       table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
  //           cell.innerHTML = i+1;
  //       } );
  //   } ).draw();
  // },1000);
    // table.column(0).visible(false);
    

});
    
</script>

<script type="text/javascript">
    var base_url='<?php echo base_url(); ?>';
    var bank_status = false;
    function get_ifsc(ifsc_val)
    {
        // id = id-1;
            $("#ifsc_code_alert").html('');
        // console.log(table_details);
        if(ifsc_val !=null)
        {
            $("#ifsc_code_alert").html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            var data = {'class_id':ifsc_val,'table':'schoolnew_branch','where_col':'ifsc_code'};
            $.ajax(
            {
                method:"POST",
                url:base_url+'Home/get_common_tables',
                dataType:'JSON',
                data:data,
                success:function(res)
                {

                    console.log(res);
                    if(res.length !=0){
                        var acc_no = $("#bank_acc_no").val();
                        check_acc_no(acc_no,ifsc_val);
                        $("#ifsc_code_alert").html('');
                    var bank_details = res[0];
                    $("#bank_name").val(bank_details.bank_name);
                    $("#branch_name").val(bank_details.branch);
                    $("#MCIR_No").val(bank_details.micr_code);

                    }else
                    {
                        $("#ifsc_code_alert").html('Please Enter The Correct IFSC Code');
                    }

                }

            })
        }

    }

    
</script>
<script type="text/javascript">
     $("#study_at_X").change(function()
        {
            var x_id = $(this).val();
            $("#study_at_X_sec").val(-1);

            if(x_id=='Partially Aided'){
                $('#study_at_X_sec_group').show();
            }else
            {
                $('#study_at_X_sec_group').hide();

            }
        });

        $("#study_at_XI").change(function()
        {
            var x_id = $(this).val();
            $("#study_at_XI_sec").val(-1);
            if(x_id=='Partially Aided'){
                $('#study_at_XI_sec_group').show();
            }else
            {
                $('#study_at_XI_sec_group').hide();

            }
        });
        $("#study_at_XII").change(function()
        {
            var x_id = $(this).val();
            $("#study_at_XII_sec").val(-1);

            if(x_id=='Partially Aided'){
                $('#study_at_XII_sec_group').show();
            }else
            {
                $('#study_at_XII_sec_group').hide();

            }
        });
</script>

<script type="text/javascript">
    var base_url='<?php echo base_url(); ?>';

    $("#special_cash_modal").on("hidden.bs.modal", function(){
    window.location.reload();
});
    $(".section_group").hide();
    var chk_bank_status = false;
    var students_details = <?=json_encode($allstuds);?>;
    var students_detail = '';
    function check_acc_no(acc_no,ifsc_code='')
    {
            if(ifsc_code==''){
            var ifsc_code = $("#ifsc_code").val();
            }else
            {
                ifsc_code = ifsc_code;
            }
            if(acc_no !='')
        {
            if(ifsc_code !=''){
            $("#bank_acc_no_alert").html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            var data = {'ifsc_code':ifsc_code,'acc_no':acc_no,'id':students_detail.id};
            $.ajax(
            {
                method:"POST",
                url:base_url+'Home/check_students_acc_no',
                dataType:'JSON',
                data:data,
                success:function(res)
                {

                    // console.log(res); 
                    chk_bank_status = res;
                    if(res){
                        $("#bank_acc_no_alert").html('Already Exits Number In DB');
                    

                    }else
                    {
                        $("#bank_acc_no_alert").html('');
                    }

                }

            })
            }else
            {
                $("#bank_acc_no_alert").html('Please Enter The IFSC Code');
            }
        }
    }

    
        function opentab(id)
        {
                students_detail = students_details.filter(stu=>stu.stu_id==id)[0];
                console.log(students_detail);
                $("#stu_id").text(students_detail.name +' - '+students_detail.stu_unique_id);
                $("#stu_mobile_no").val(students_detail.phone_number);
                $("#school_id").val(students_detail.school_id);


                if(students_detail.id !=null){
            $("#ifsc_code").val(students_detail.ifsc_code);
            $("#branch_name").val(students_detail.branch);
            $("#bank_acc_no").val(students_detail.bank_acc);
            $("#bank_acc_open_data").val(students_detail.bank_acc_open_data);
            $("#bank_acc_status").val((students_detail.bank_acc_status==null?'-1':students_detail.bank_acc_status)).attr('selected','selected');
            if(students_detail.bank_acc_open_date !=null && students_detail.bank_acc_open_date !='1970-01-01'){
            var date_join = new Date(students_detail.bank_acc_open_date);
        // console.log(date_join);
        var doj_month = date_join.getMonth()+1;
        var doj = (date_join.getDate() < 10 ? '0'+date_join.getDate():date_join.getDate())+'-'+(doj_month < 10 ? '0'+doj_month:doj_month)+'-'+date_join.getFullYear();

// console.log(doj);
        $("#bank_acc_open_data").datepicker("update",doj);
            }

        $("#MCIR_No").val(students_detail.micr_code);
        $("#bank_name").val(students_detail.bank_name);            
            $("#study_at_X").val((students_detail.study_at_X==0?'-1':students_detail.study_at_X)).attr('selected','selected');
             if(students_detail.study_at_X=='Partially Aided')
             {
                $("#study_at_X_sec_group").show();
             }
            $("#study_at_X_sec").val((students_detail.study_at_X_sec==0?'-1':students_detail.study_at_X_sec)).attr('selected','selected');
           
            $("#study_at_XI").val((students_detail.study_at_XI==0?'-1':students_detail.study_at_XI)).attr('selected','selected');
             if(students_detail.study_at_XI=='Partially Aided')
             {
                $("#study_at_XI_sec_group").show();
             }
            $("#study_at_XI_sec").val((students_detail.study_at_XI_sec==0?'-1':students_detail.study_at_XI_sec)).attr('selected','selected');

            $("#study_at_XII").val((students_detail.study_at_XII==0?'-1':students_detail.study_at_XII)).attr('selected','selected');
            if(students_detail.study_at_XII=='Partially Aided')
             {
                $("#study_at_XII_sec_group").show();
             }

            $("#study_at_XII_sec").val((students_detail.study_at_XII_sec==0?'-1':students_detail.study_at_XII_sec)).attr('selected','selected');
            $("#stu_eligible").val(students_detail.student_eligible).attr('selected','selected');
        }
                $("#special_cash_modal").modal('show');
        }

        function save()
        {
            // alert();
            // console.log(students_detail);
            $("#save_err").html('');
            var ifsc_code = $("#ifsc_code").val();
            var branch = $("#branch_name").val();
            var bank_acc = $("#bank_acc_no").val();
            var bank_acc_date = $("#bank_acc_open_data").val();
            var bank_status = $("#bank_acc_status").val();
            var bank_acc_open_data = $("#bank_acc_open_data").val();
            var bank_acc_status = $("#bank_acc_status").val();

            // console.log(bank_acc_open_data);
            var study_at_X = $("#study_at_X").val();
            var study_at_X_sec = $("#study_at_X_sec").val();
            var study_at_XI = $("#study_at_XI").val();
            var study_at_XI_sec = $("#study_at_XI_sec").val();
            var study_at_XII = $("#study_at_XII").val();
            var study_at_XII_sec = $("#study_at_XII_sec").val();
            var student_eligible = $("#stu_eligible").val();
            // console.log(student_eligible);return false;
            /*else if(bank_acc_open_data =='')
            {
                $("#save_err").html('Please Pick the Bank Account Open Date');

            }else if(bank_acc_status ==-1)
            {
                $("#save_err").html('Please Select Bank Account Status');

            }*/
            if(student_eligible !=0){
            if(ifsc_code =='')
            {
                $("#save_err").html('Please Enter The IFSC Code');

            }else if(bank_acc =='' || chk_bank_status)
            {
                $("#save_err").html('Please Enter The Bank Account Number');
            }else if(study_at_X ==-1 && study_at_XI ==-1 && study_at_XI ==-1)
            {
                $("#save_err").html('Please Select <b>study at X</b> and <b>study and XI</b> and <b>study at XII</b>');
            }else if(study_at_X =='Partially Aided' && study_at_X_sec ==-1)
            {
                $("#save_err").html('Please Select <b>studying at X section</b>');

            }else if(study_at_XI =='Partially Aided' && study_at_XI_sec ==-1)
            {
                $("#save_err").html('Please Select <b>studying at XI section</b>');

            }else if(study_at_XII =='Partially Aided' && study_at_XII_sec ==-1)
            {
                $("#save_err").html('Please Select <b>studying at XII section</b>');

            }else
            {

                var data = {'records':{'id':students_detail.id,'reg_no':students_detail.reg_no,'Students_name':students_detail.name,'unique_id_no':students_detail.stu_unique_id,'school_id':students_detail.school_id,'ifsc_code':ifsc_code,'branch':branch,'bank_acc':bank_acc,'bank_acc_open_date':bank_acc_open_data,'bank_acc_status':bank_acc_status,'stu_mobile_no':students_detail.phone_number,'study_at_X':study_at_X,'study_at_X_sec':(study_at_X_sec !=-1?study_at_X_sec:''),'study_at_XI':study_at_XI,'study_at_XI_sec':(study_at_XI_sec !=-1?study_at_XI_sec:''),'study_at_XII':study_at_XII,'study_at_XII_sec':(study_at_XII_sec !=-1?study_at_XII_sec:''),'student_eligible':student_eligible}};
                // console.log(data);return false;
                $("#save_btn").hide();
                $("#save_load").html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                $.ajax(
                {
                    url:base_url+'Home/save_special_cash',
                    method:"POST",
                    dataType:'JSON',
                    data:data,
                    success:function(res)
                    {
                        console.log(res);
                        if(res)
                        {
                            $("#special_cash_modal").modal('hide');
                                            swal({
                        title: "Special Cash Incentive",
                        text: "success Fully Saved",
                        type: "success",
                        
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "OK",
                    }, function(isConfirm){

                            window.location.reload();
                                        })
                            }



                    }       
                });
            }
            }else
            {
                var data = {'records':{'id':students_detail.id,'reg_no':students_detail.reg_no,'Students_name':students_detail.name,'unique_id_no':students_detail.stu_unique_id,'school_id':students_detail.school_id,'student_eligible':student_eligible}};
                // console.log(data);return false;
                $("#save_btn").hide();
                $("#save_load").html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                $.ajax(
                {
                    url:base_url+'Home/save_special_cash',
                    method:"POST",
                    dataType:'JSON',
                    data:data,
                    success:function(res)
                    {
                        console.log(res);
                        if(res)
                        {
                            $("#special_cash_modal").modal('hide');
                                            swal({
                        title: "Special Cash Incentive",
                        text: "success Fully Saved",
                        type: "success",
                        
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "OK",
                    }, function(isConfirm){

                            window.location.reload();
                                        })
                            }



                    }       
                });
            }   
            
        }
       
    
</script>


</html>