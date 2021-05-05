<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>


        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />



        <?php $this->load->view('head.php'); ?>

<style>
    div.row{
    margin-top: 0px;
}
</style>

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-dark page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('csr_admin/csr_admin_header.php'); ?>


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
                                        <h1></h1>
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
                            <div style="background-color:#ffffff;" class="page-content">
                                <div></div> 
                               <!--container-->
                                    <!-- BEGIN PAGE CONTENT INNER -->

                                    <div class="page-content-inner">
                                    
                                    <div class="portlet-body">
                                     <!--  <?php foreach($today_contribute as $count_key => $today_details){
                                        print_r($today_details);}?> -->
      
         <div class="container-fluid">                              
    
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="dashboard-stat2" style="background-color:#ffffff;padding-top:0px;border-color:white;border: 0px none;border-right: 0px solid #ffffff;padding-bottom:0px;background-color:white;display:">
                                                             

                                                         <left><b><h4 style="padding-left: 30px">SUPPORT RECEIVED TODAY</h4></b></left>
                                                            <div class="display">
                                                               <div class="row">
                                                                <div class="number" style="padding-left: 40px">

                                                                    <h3 style="color:#ff9900">
                                                                  
                                                                        <span data-counter="counterup"  data-value="100"> <?php foreach($today_contribute as $count_key => $today_details){?>
       
        <?php echo $today_details['count_name'] ?><?php }?>
        
        
        
        


           
                                                                        </span>
                                                               
                                                                    </h3>
                                                                      <p style="margin-top: -4px">Supporters</p>

                                                                    <!--<small class="font-purple">Total Teacher Count</small>-->
                                                                </div>
                                                                <div class="number" style="display: inline;padding-left: 35px">
                                                                     <h3 style="color: #a978e0">
                                                    <span  data-counter="counterup" data-value="80">
                                                                  <?php foreach ($today_contribute as $school_key => $today_value){?>
                                                                   <?php $need = number_format($today_value['sum_amount'])."<br>";?>
                                                                   <?php echo 'Rs.'.$need; ?>
                                                                         <?php }?>
                                                                       </span>
                                                            </h3><p style="margin-top: -4px">Value of Support</p></div>

                                                            
                                                             

                                                        </div> 
                                                          
                                                        </div>

                                                         <left><b><h4 style="padding-left: 30px">TOTAL SUPPORT RECEIVED</h4></b></left>
                                                            <div class="display">
                                                               <div class="row">
                                                                <div class="number" style="padding-left: 40px">

                                                                    <h3 style="color:#ff9900">
                                                                  
                                                                        <span data-counter="counterup"  data-value="100"> <?php foreach($count as $count_key => $count_details){?>
        <?php $formattedNum = number_format($count_details['count_name'])."<br>";?>
        <?php echo ''.$formattedNum; ?><?php }?>
        
        
        


           
                                                                        </span>
                                                               
                                                                    </h3>
                                                                      <p style="margin-top: -4px">Supporters</p>

                                                                    <!--<small class="font-purple">Total Teacher Count</small>-->
                                                                </div>
                                                                <div class="number" style="display: inline;padding-left: 35px">
                                                                     <h3 style="color: #a978e0">
                                                    <span  data-counter="counterup" data-value="80">
                                                                 <?php foreach($count as $count_key => $count_details){?>
                                                                   <?php $need = number_format($count_details['amount'])."<br>";?>
                                                                   <?php echo 'Rs.'.$need; ?>
                                                                         <?php }?></span>
                                                            </h3><p style="margin-top: -4px">Value of Support</p></div>
                                                             

                                                        </div> 
                                                          
                                                        </div>


                                                    </div>





        </div>
 <div class="col-md-6 col-lg-6 col-xl-3">

                 <div class="dashboard-stat2"style="background-color:#ffffff;padding-top:0px;padding-bottom:0px">
                                                           

                                                         <left><b><h4 style="padding-left: 30px">SUPPORT MODE <nobr style="padding-left: 60px"><a  href='<?php echo base_url();?>State/emis_csr_report' class="btn btn-primary btn-xs">Details</a></nobr></h4></b></left>
                                                            <div class="display">
                                                               <div class="row">
                                                                <div class="number" style="padding-left: 40px">

                                                                   <h3 style="color: #a978e0">
                                                                  
                                                                        <span data-counter="counterup"  data-value="100"> <?php foreach ($material['fund'] as $type_key => $material_val) {?> <?php $formattedNumber = number_format($material_val['total'])."<br>";?><?php echo 'Rs.'.$formattedNumber;?><?php } ?>
        
        
        


           
                                                                        </span>
                                                               
                                                                    </h3>
                                                                       <p style="margin-top: -4px">Funds</p>

                                                                    <!--<small class="font-purple">Total Teacher Count</small>-->
                                                                </div>  
                                                                 <div class="number" style="display: inline;padding-left: 40px">
                                                                     <h3 style="color: #a978e0">
                                                    <span  data-counter="counterup" data-value="80">
                                                                 <?php foreach ($material['material'] as $type_key => $material_val) {?><?php echo 'Rs.'.$material_val['total'];?><?php } ?>
                                                                        </span>
                                                            </h3><p style="margin-top: -4px">Material</p></div>
                                                             



                                                            </div> 
                                                                <div class="row">
                                                                 <div class="number" style="padding-left: 40px;margin-top:30px">

                                                                    <h3 style="color: #a978e0">
                                                                  
                                                                        <span data-counter="counterup"  style="font-size:20px" data-value="100"> <?php foreach ($material['online'] as $type_key => $material_val) {?><?php $formattedNumber = number_format($material_val['online'])."<br>";?><?php echo'Rs.'.$formattedNumber; ?><?php } ?>
        
        


           
                                                                        </span>
                                                               
                                                                    </h3>
                                                                      <p style="margin-top: -4px;">Online</p>

                                                                    <!--<small class="font-purple">Total Teacher Count</small>-->


                                                                </div>

                                                                <div class="number" style="display: inline;padding-left: 25px;margin-top:30px">
                                                                     <h3 style="color: #a978e0">
                                                    <span  data-counter="counterup" data-value="80" style="font-size:20px" >
                                                                 <?php foreach ($material['offline'] as $type_key => $material_val) {?><?php $formattedNumber = number_format($material_val['online'])."<br>";?><?php echo'Rs.'.$formattedNumber; ?><?php } ?>
                                                                        </span>
                                                            </h3><p style="margin-top: -6px">Offline</p>
                                                            <center></center>
                                                            
                                                            
                                                         
                                                             </div> 
                                                             

                                                       </div> 
                                                       
                                                      <br>
                                                          
                                                        </div>
                                            </div>

        </div>
</div>
<div class="row">

 <div class="col-md-6 col-lg-6 col-xl-3">
           <div class="dashboard-stat2" style="background-color:#ffffff;padding-top:0px;padding-bottom:0px">
                                                            <left><b><h4 style="padding-left: 30px">REGISTERED USERS</h4></b></left>
                                                            <div class="display">
                                                               <div class="row">
                                                                <div class="number" style="padding-left: 50px">

                                                                    <h3  style="color:#ff9900">
                                                                  
                                                                        <span data-counter="counterup" style="" data-value="100"><?php foreach($user_count['count'] as $count_key => $count_details){?>
        
                                                                    <?php echo $count_details['user']; ?><?php }?>
        
        


           
                                                                        </span>
                                                               
                                                                    </h3>
                                                                      <p style="margin-top: -4px;">Total Users</p>

                                                                    <!--<small class="font-purple">Total Teacher Count</small>-->
                                                                </div>
                                                                <div class="number" style="display: inline;padding-left: 40px">
                                                                    <h3 style="color: #ff9900">
                                                  <left>  <span  data-counter="counterup" data-value="80">
                                                                  <?php foreach($today_count['total'] as $total_key => $total_details){?>
        
                                                                    <?php echo $total_details['total_user']; ?><?php }?></span></left>
                                                            </h3><p style="margin-top: -4px">Today</p></div>
                                                             

                                                      
                                                          
                                                        </div>
                                                    </div></div>
                                                </div>
                                              <div class="col-md-6 col-lg-6 col-xl-3">
                                                   <div class="dashboard-stat2" style="background-color:#ffffff;padding-top:0px;padding-bottom:0px;">

                                                        <left><b><h4 style="padding-left: 30px">REQUIREMENTS</h4></b></left>
                                                            <div class="display">
                                                               <div class="row">
                                                                <div class="number" style="padding-left: 50px">

                                                                    <h3  style="color:#ff9900">
                                                                  
                                                                        <span data-counter="counterup" style="" data-value="100"><?php foreach($school as $school_key => $school_details){?>
        <?php $formattedNum = number_format($school_details['school'])."<br>";?>
        <?php echo ''.$formattedNum; ?>
        
        


           
                                                                        </span>
                                                               
                                                                    </h3>
                                                                      <p style="margin-top: -4px;">Schools</p>

                                                                    <!--<small class="font-purple">Total Teacher Count</small>-->
                                                                </div>
                                                                <div class="number" style="display: inline;padding-left: 40px">
                                                                    <h3 style="color: #ff9900">
                                                  <left>  <span  data-counter="counterup" data-value="80">
                                                                  <?php $need = number_format($school_details['req_amount'])."<br>";?>
                                                                        <?php echo 'Rs.'.$need; ?>
                                                                         <?php }?></span></left>
                                                            </h3><p style="margin-top: -4px">Value Of Requirements</p></div>
                                                             

                                                        </div> 
                                                          
                                                        </div>
 
                                                    </div>
                                                </div>
        </div>


</div>

</div>
      </div>
      <!--   <div class="row">
       
        <div class="col-md-6 col-lg-4 col-xl-3">
            
         <div class="dashboard-stat2"style="background-color:#ffffff;padding-top:0px;padding-bottom:0px;">
                                                            <left><b><h4 style="padding-left: 30px">TOTAL SUPPORT RECEIVED</h4></b></left>
                                                            <div class="display">
                                                               <div class="row">
                                                                <div class="number" style="padding-left: 40px">

                                                                    <h3 style="color:#ff9900">
                                                                  
                                                                        <span data-counter="counterup"  data-value="100"> <?php foreach($count as $count_key => $count_details){?>
        <?php $formattedNum = number_format($count_details['count_name'])."<br>";?>
        <?php echo ''.$formattedNum; ?><?php }?>
        
        
        


           
                                                                        </span>
                                                               
                                                                    </h3>
                                                                      <p style="margin-top: -4px">Supporters</p>

                                                                    <!--<small class="font-purple">Total Teacher Count</small>-->
                                                               <!--  </div>
                                                                <div class="number" style="display: inline;padding-left: 35px">
                                                                     <h3 style="color: #a978e0">
                                                    <span  data-counter="counterup" data-value="80">
                                                                 <?php foreach ($school as $school_key => $school_value){?>
                                                                   <?php $need = number_format($school_value['received_amt'])."<br>";?>
                                                                   <?php echo 'Rs.'.$need; ?>
                                                                         <?php }?></span>
                                                            </h3><p style="margin-top: -4px">Value of Support</p></div>
                                                             

                                                        </div> 
                                                          
                                                        </div></div>


</div>

        </div> -->
       <!-- </div> -->
    <!--  -->
       
  
    <div class="row">
         
        
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
            
                    
            /*$(document).ready(function(){  // function call for validate total
            $("#emis_state_special_search").change(function(){
            return validatetext('emis_state_special_search','emis_state_report_schmanage_alert'); 
            });   });*/
            
            function searchfilter(emis_state_report_schcate,emis_state_report_schmgtype,emis_state_special_search,emis_state_special_search1) {
                //var id = validatetext('emis_state_special_search','emis_state_report_schmanage_alert');
                
                
                var id1 = $("#emis_state_special_search").val();
                var id2= $("#emis_state_special_search1").val();
                var manage = $("input:radio[name=emis_state_report_schcate]:checked").val();
                var cate = $("input:radio[name=emis_state_report_schmgtype]:checked").val();
                
                        

                if(!manage || !cate){

                    var msg = '<span style="color:red;">You must select your both management and schooltype!</span><br /><br />';
                    document.getElementById('msg').innerHTML = msg;
                    return false;
                }else{
                
                
                var baseurl='<?php echo base_url(); ?>';
                return true;

                }
            }
            

               function saveschoolid(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'State/saveschoolidsession',
                data:"&school_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'State/emis_student_classwise_school'; 
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


             /**
             *
             *VIT
             */

            $(document).on('change','#student_count',function()
             {
                // alert($(this).val());
                $("#emis_state_special_search").val($(this).val());
             })
             $(document).on('change','#emis_state_special_search',function()
             {
                $("#student_count").val($(this).val());
             })
             $(document).on('change','#student_count',function()
             {
                // alert($(this).val());
                $("#emis_state_special_search1").val($(this).val());
             })
             $(document).on('change','#emis_state_special_search1',function()
             {
                $("#student_count").val($(this).val());
             })
               
                   
            

        </script>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

             <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/amcharts.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/serial.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/themes/light.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/amcharts/amcharts/themes/patterns.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
     
    </body>

</html>