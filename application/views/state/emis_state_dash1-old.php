<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('state/header.php'); ?>

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
                                        <h1>Dashboard
                                            <small>Enrollment in Current year</small>
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

                                          <div class="portlet light">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                School Management</label>
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_state_report_schcate" name="emis_state_report_schcate" >
                                                                <option value="" >Select School Management</option>
                                                                 <?php  foreach($getmanagecate as $det){ ?>
                                                                 <option value="<?php echo $det->id; ?>" ><?php echo $det->manage_name; ?></option>
                                                                  <?php }  ?>
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>
                                                              </div>

                                                              <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                 School Category </label>
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_state_report_schmanage" name="emis_state_report_schmanage" >
                                                                <option value="" >Select Category</option>
                                                                </select>
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schmanage_alert"></div></font>
                                                              </div>
                                                              </div>
                                                               <div class="col-md-4" >
                                                              <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                                
                                                                <button type="button" class="btn green btn-lg" onclick="return checkmanagecate();" >Submit</button>
                                                              </div>
                                                              </div>
                                                      
                                                    </div>
                                                </div>
                                              <?php  $manage =$this->session->userdata('emis_statereport_schmanage'); 
                                              if($manage!=""){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4><b>Selected School Management Categoty : <?php echo $this->Datamodel->get_schmanagementname($manage); ?></b>
                                                        <button type="button" class="btn red btn-xs" onclick="remove_catefilter()">Remove Filter</button> </h4>
                                                    </div>
                                                </div>
                                              <?php  } ?>
                                            </div>
                                       
                                       
                                     <div class="col-md-12">
                                     <center> <h2>Enrollment in current year - 2019</h2></center>

                                     <a  onclick="saveclassid(1)">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class1!=""){ echo $classcount[0]->class1; } else { echo 0; } ?> </span>
                                                               
                                                            </h3>
                                                            <small class="font-purple">Class - I</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>


                                             <a  onclick="saveclassid(2)">

                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class2!=""){ echo $classcount[0]->class2; } else { echo 0; } ?> </span>
                                                               
                                                            </h3>
                                                            <small class="font-purple">Class - II </small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>


                                             <a  onclick="saveclassid(3)">

                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class3!=""){ echo $classcount[0]->class3; } else { echo 0; } ?> </span>
                                                               
                                                            </h3>
                                                            <small class="font-purple">Class - III</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>


                                             <a  onclick="saveclassid(4)">

                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class4!=""){ echo $classcount[0]->class4; } else { echo 0; } ?> </span>
                                                               
                                                            </h3>
                                                            <small class="font-purple">Class - IV</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>


                                             <a  onclick="saveclassid(5)">

                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class5!=""){ echo $classcount[0]->class5; } else { echo 0; } ?>  </span>
                                                               
                                                            </h3>
                                                            <small class="font-purple">Class - V </small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>


                                             <a  onclick="saveclassid(6)">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class6!=""){ echo $classcount[0]->class6; } else { echo 0; } ?> </span>
                                                               
                                                            </h3>
                                                            <small class="font-purple">Class - VI</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>

                                             <a  onclick="saveclassid(7)">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class7!=""){ echo $classcount[0]->class7; } else { echo 0; } ?> </span>
                                                               
                                                            </h3>
                                                            <small class="font-purple">Class - VII</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>

                                             <a  onclick="saveclassid(8)">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class8!=""){ echo $classcount[0]->class8; } else { echo 0; } ?></span>
                                                               
                                                            </h3>
                                                            <small class="font-purple">Class - VIII</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>

                                             <a  onclick="saveclassid(9)">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class9!=""){ echo $classcount[0]->class9; } else { echo 0; } ?> </span>
                                                             
                                                            </h3>
                                                            <small class="font-purple">Class - IX</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>

                                             <a  onclick="saveclassid(10)">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class10!=""){ echo $classcount[0]->class10; } else { echo 0; } ?></span>
                                                               
                                                            </h3>
                                                            <small class="font-purple">Class - X</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>

                                             <a  onclick="saveclassid(11)">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class11!=""){ echo $classcount[0]->class11; } else { echo 0; } ?></span>
                                                               
                                                            </h3>
                                                            <small class="font-purple">Class - XI</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>

                                             <a  onclick="saveclassid(12)">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                         <span data-counter="counterup" data-value="34"><?php if($classcount[0]->class12!=""){ echo $classcount[0]->class12; } else { echo 0; } ?></span>
                                                               
                                                            </h3>
                                                            <small class="font-purple">Class - XII </small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-pie-chart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                       <!--  <div class="progress">
                                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div> -->
                                                        <div class="status">
                                                            <div class="status-title">OVERALL STUDENT COUNT</div>
                                                            <!-- <div class="status-number"> 76% </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>
                                           
                                           
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
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>

        <script type="text/javascript">
            function saveclassid(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'State/savedash_classidsession',
                data:"&class_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'State/emis_dash_district_count'; 
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
              $(document).ready(function(){ 
  $("#emis_state_report_schcate").change(function(){ 

    var emis_state_report_schcate = $("#emis_state_report_schcate").val();

      $.ajax({
        type: "POST",
        url:baseurl+'State/get_school_management_data',
        data:"&emis_state_report_schcate="+emis_state_report_schcate,
        success: function(resp){
        // alert(resp);  
        $("#emis_state_report_schmanage").html(resp);  
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

  });  }); 

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_state_report_schcate").change(function(){
      return validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_state_report_schmanage").change(function(){
      return validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert'); 
});   });


function checkmanagecate(){

var baseurl='<?php echo base_url(); ?>';

var manage = validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert');
var cate = validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 

var manage1=$("#emis_state_report_schmanage").val();
var cate1 = $("#emis_state_report_schcate").val();

if(manage == 0 || cate == 0){
    return false;
}

  $.ajax({
        type: "POST",
        url:baseurl+'State/savereport_schoolcatemanage',
        data:"&cate="+cate1+"&manage="+manage1,
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
 </script>  


    </body>

</html>