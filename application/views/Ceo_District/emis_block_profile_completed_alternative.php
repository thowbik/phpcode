
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
	   <div class="container">
   
 

  <!-- Modal -->
  <div class="modal fade" id="test" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:140%">
        <div class="modal-header">
          <button type="button" class="close" onclick="refresh();" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profile completion status</h4>
        </div>
		<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial,align:center; sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;
}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-phtq{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-hmp3{text-align:left;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-ydyv{border-color:inherit;text-align:right;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-dvpl{border-color:inherit;text-align:right;vertical-align:top}
</style>
<center>

       <table class="tg" id="myTable">
  <tbody>
    <tr>
     
    </tr>
	
  </tbody>
  
  
</table>
	   </center>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="refresh();" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

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
                                    <form id="filter" method="post" action="<?php echo base_url().'Ceo_District/profile_status_schoollist_distwise';?>">
                           
                           <div class="form-group">
                           <div class="row">
                             
                                     <div class="col-md-3">  
                                    
                                     <label class="control-label"><strong>School Type</strong></label>
                                  <select class="form-control" id="school_type" name="school_type" >
                                  <option value="" >Choose</option>
                                   <?php foreach($school_type as $sc){ ?>
                                  <option value="<?php echo($sc->id);?>"<?php if($school_type_c==$sc->id) echo 'selected="selected"'; ?> ><?php echo($sc->manage_name); ?></option>  
                                   <?php } ?>
                                  </select>
                               
                           </div>
                          <div class="col-md-2" style="margin-top: 24px;">
                               
                                 <button type="submit"  class="btn green" id="emis_stu_searchsep_sub" >SUBMIT</button>
                                     
                           </div>
                           </div>
                           </form>
                           </br>


                                       
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
														
                                                            <i class="fa fa-globe"></i> SchoolWise - Profile Completion Status<span> </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                       
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
															 
                                                                <tr>
                                                                    <th>S.No</th>
																	 <th class="">Udise Code</th> 
                                                                    <th class="">School Name</th> 
                                                                    <th class="">Block Name</th> 
																	
                                                                     <th class="center">Basic</th>
                                                                     <th class="center">School</th>
                                                                     <th class="center">Training</th>
																	 
                                                                     <th class="center">Committee</th>
                                                                     <th class="center">Land</th>
																	 <th class="center">Inventory</th>
																	 
																	  <th class="center">Funds & Fees</th>
																	  <th class="center">Funds</th>
                                                                     
                                                                </tr>
                                                                </thead>
                                                               <tbody>
															    <?php $total1=[];?>
                                                            <?php 
															if(!empty($block_profile_completion_status_alternative))
															{
															 
															 
															 															  
														     
														foreach($block_profile_completion_status_alternative as $index=> $comp_status){  
                                                          $part1=$comp_status->part_1;
														  $part2=$comp_status->part_2;
														  $part3=$comp_status->part_3;
														  $part4=$comp_status->part_4;
														  $part5=$comp_status->part_5;
														  $part6=$comp_status->part_6;
														  $part7=$comp_status->part_7;
														  $part8=$comp_status->part_8;
														?>
                                                              
                                                                <tr>
                                                                    <td ><?=$index+1;?></td>
                                                                        <td class="center"><?=$comp_status->udise_code;?></td>
																	    <td class="center"><?=$comp_status->school_name;?></td> 
                                                                        <td class="center"><?=$comp_status->block_name;?></td> 
                                                                       
                                                                       
																		<?php if($part1==2)
																		{
																			?>
                                                                        <td class="center" style="color:blue;" onclick="reset(<?=$comp_status->school_key_id;?>,1);"><?php if($part1==0){ echo 'Not Started';} else if($part1==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		 else
																		{
																			?>
                                                                         <td class="center" ><?php if($part1==0){ echo 'Not Started';} else if($part1==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		?>
																		<!--  ------------------------------------->
																		<?php if($part2==2)
																		{
																			?>
                                                                        <td class="center" style="color:blue;" onclick="reset(<?=$comp_status->school_key_id;?>,2);"><?php if($part2==0){ echo 'Not Started';} else if($part2==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		 else
																		{
																			?>
                                                                         <td class="center" ><?php if($part2==0){ echo 'Not Started';} else if($part2==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		?>
																		<!--  ------------------------------------->
																		<?php if($part3==2)
																		{
																			?>
                                                                        <td class="center" style="color:blue;" onclick="reset(<?=$comp_status->school_key_id;?>,3);"><?php if($part3==0){ echo 'Not Started';} else if($part3==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		 else
																		{
																			?>
                                                                         <td class="center" ><?php if($part3==0){ echo 'Not Started';} else if($part3==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		?>
																		 <!--  ------------------------------------->
																		 
																		<?php if($part4==2)
																		{
																			?>
                                                                        <td class="center" style="color:blue;" onclick="reset(<?=$comp_status->school_key_id;?>,4);"><?php if($part4==0){ echo 'Not Started';} else if($part4==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		 else
																		{
																			?>
                                                                         <td class="center" ><?php if($part4==0){ echo 'Not Started';} else if($part4==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		?>
																		<!--  ------------------------------------->
																		
																		 
																		<?php if($part5==2)
																		{
																			?>
                                                                        <td class="center" style="color:blue;" onclick="reset(<?=$comp_status->school_key_id;?>,5);"><?php if($part5==0){ echo 'Not Started';} else if($part5==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		 else
																		{
																			?>
                                                                         <td class="center" ><?php if($part5==0){ echo 'Not Started';} else if($part5==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		?>
																		<!--  ------------------------------------->
																		<?php if($part6==2)
																		{
																			?>
                                                                        <td class="center" style="color:blue;" onclick="reset(<?=$comp_status->school_key_id;?>,6);"><?php if($part6==0){ echo 'Not Started';} else if($part6==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		 else
																		{
																			?>
                                                                         <td class="center" ><?php if($part6==0){ echo 'Not Started';} else if($part6==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		?>
																		<!--  ------------------------------------->
																		<?php if($part7==2)
																		{
																			?>
                                                                        <td class="center" style="color:blue;" onclick="reset(<?=$comp_status->school_key_id;?>,7);"><?php if($part7==0){ echo 'Not Started';} else if($part7==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		 else
																		{
																			?>
                                                                         <td class="center" ><?php if($part7==0){ echo 'Not Started';} else if($part7==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		?>
																		<!--  ------------------------------------->
																		<?php if($part8==2)
																		{
																			?>
                                                                        <td class="center" style="color:blue;" onclick="reset(<?=$comp_status->school_key_id;?>,8);"><?php if($part8==0){ echo 'Not Started';} else if($part8==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		 else
																		{
																			?>
                                                                         <td class="center" ><?php if($part8==0){ echo 'Not Started';} else if($part8==1){echo 'Saved';} else {echo 'Submitted';}?></td>
																		<?php
																		}
																		?>
																		<!--  ------------------------------------->
																		
                                                                        

                                                                </tr>
                                                                <?php 
                             
                             							 
							 }  ?>
                                                                
                                                      
                                                            </tbody>
                                                           
                                                            <?php } ?>
                                                        </table>

                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
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
   <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>


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
              <script>
			  function reset(school,partid)
{
	alert(partid);
   swal({
        title: "Are you sure?",
        text:  "Do you want to Reset the Form Submission? The School must verify Detail and submit again!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Reset Submit!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
   }, function(isConfirm){
    if (isConfirm)
				$.ajax(
				{
					data:{'school':school,'part_id':partid},
					url:baseurl+'Ceo_District/update_finalsubmit_part1',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						 swal("OK", "School Part 1 Forms Updated Successfully", "success");
						 window.location.reload();
						
					}
				});
				 else
				 
        swal("Cancelled", "Your cancelled the Final Submit", "error");
    });	
	
}
 			  
 
        </script>
    </body>

</html>