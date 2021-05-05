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
        </head>
    <!-- END HEAD -->
   
    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
   <style>
#body{
    color:red;
    background:grey;
}
.blur{
    position:absolute;
    top:0;left:0;right:0;bottom:0;
    background:rgba(0,0,0,0.5);
    display:none;
}
#sh{
    position:absolute;
    display:none;
    top:50px;left:50px;bottom:50px;right:50px;
    background:rgba(255,0,0,0.5);
}   
</style>

<?php $userlogin=$this->session->userdata('emis_user_type_id');?>            
<?php if($this->session->userdata('emis_user_type_id') == 3 ) 	
{?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>


            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    
                        <!-- BEGIN CONTENT -->
						<div class="content-wrapper">
						<section class="content" style="font-size: 12px;">
             <div id="content"></div> 
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                           
                               
                               
                          

                                    <div class="page-content-inner">
                                       
                                    
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            
                                            <div class="portlet-body">
                                               <div class ="row">
                                                    <div class="col-md-4">
                                                        <font style="color:#dd4b39;">
                                                            <?php echo $this->session->flashdata('errors'); ?>
                                                        </font>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--begin form -->
                                           

                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row"> 
                                                            <!--<div class="col-md-4"> 
                                                                <a href="javascript:;" class="btn btn-sm green add-class-section"> Add Class Section details <i class="fa fa-edit"></i></a>
                                                            </div>
                                                        </div>-->
                                                       

                                                <!-- Add Model -->
<style>
											.select2-container--bootstrap .select2-results__option[aria-selected=true] {
    
}

.select2-container--bootstrap {
    display: block;
   
}
</style>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;33150300204
  
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>

<br>

                                                
                                               
                                                </div>
                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Assign Timetable For Current Week 
														</div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
														 <table class="table table-striped table-bordered table-hover" id="classlist">
                                                            <thead>
                                                                <tr>
                                                                    <th>Class List</th>
																	<th>Option 1</th>
																	<th>Option 2</th>
																	<th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                               <tr>
															  
															   <?php
															    $i=1;
															   foreach($details as $dt)
																{
                                                                 $classid=$dt->class_id;
                                                                   switch ($classid) 
																   {
																case $sta="1":$standard='I';break;
																case $sta="2":$standard='II';break;
																case $sta="3":$standard='III';break;	
																case $sta="4":$standard='IV';break;	
																case $sta="5":$standard='V';break;
																case $sta="6":$standard='VI';break;	
																case $sta="7":$standard='VII';break;	
																case $sta="8":$standard='VIII';break;
																case $sta="9":$standard='IX';break;	
																case $sta="10":$standard='X';break;	
																case $sta="11":$standard='XI';break;	
																case $sta="12":$standard='XII';break;	
																case $sta="13":$standard='Pre KG';break;	
																case $sta="14":$standard='UKG';break;	
																case $sta="15":$standard='LKG';break;
																}
																	?>
																	
																	<td><strong><?php echo $standard?>-<?php echo $dt->section?></strong></td>
																	<?php if($dt->term_time_table==1)
																	{ ?>
																	 <td>
																	 <a href="javascript:;" class="btn btn-sm green delete-class-section" id="deleted<?php echo $i; ?>"  onclick='assigntermtimetable("<?php echo  $dt->class_id;?>","<?php echo $dt->section;?>","<?php echo $classid;?>");' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>"><strong>Assign Master Timetable</strong></a>
																	
                                                                    </td>
																	<?php
																	}
																	else
																	{
																		?>
																		<td style="color:red;"><strong>Create Master TimeTable</strong></td>
																		<?php
																	}
																	?>
																	 <td>
																	 <a href="javascript:;" class="btn btn-sm yellow delete-class-section lowercase" id="deleted<?php echo $i; ?>"  onclick='assignlastweektimetable("<?php echo $dt->class_id;?>","<?php echo $dt->section;?>","<?php echo $classid;?>");' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>"><strong>Assign Lastweek Timetable</strong></a>
																	
                                                                    </td>
																	<?php if($dt->time_table==0)
																	{
																		?>
																		<td style="color:red;"><strong>Not Assigned</strong> </td>
																		<?php
																	}
																	else
																	{
																		?>
																		<td style="color:green;"><strong>Assigned</strong> </td>
																		<?php
																	}
																	?></td>
                                                                    
																	
                                                               </tr>
															   <?php
															   $i++;
																}
																?>
                                                            </tbody>
                                                        </table>
														
														
														
														
														
														
																		</div>
																		
                                                    </div>
													
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                         
           
                             

                                    </div>
									</section>
									</div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                          
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                       

                        <!-- END QUICK SIDEBAR -->
                    </div>
                    <!-- END CONTAINER -->
                
            </div>

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>




        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
        
        <script type="text/javascript">




function assigntermtimetable(id,section)
{
	
classid=id;
section=section;

	$.ajax(
				{
					data:{'classid':classid,'section':section},
					url:baseurl+'TimetableController/checktermtimetable',
					type:"POST",
					
					success:function(resp)
					{
						var termtimetable = JSON.parse(resp);
		 $.each(termtimetable,function(id,val)
        {
            termtimetable=val.class_id;
			
        })
      
		if(termtimetable=='')
		{
			swal("OK","Please Create Master TimeTable", "error");
			return false;
		}
		else
		{
			$.ajax(
	          {
					data:{'classid':classid,'section':section},
					url:baseurl+'TimetableController/copysave_term_timetable',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Timetable Created Successfully", "success");
						window.location.reload();
						
					}
					
				});
			
		}
						
					}
				});
}
		 
function assignlastweektimetable(id,section)
{
classid=id;
section=section;

	$.ajax(
				{
					data:{'classid':classid,'section':section},
					url:baseurl+'TimetableController/checklastweektimetable',
					type:"POST",
					success:function(resp)
					{
						var lastweek = JSON.parse(resp);
		 $.each(lastweek,function(id,val)
        {
            lastweek=val.class_id;
			
        })
      
		if(lastweek=='')
		{
			swal("OK","Timetable was not created for this class last week", "error");
			return false;
		}
		else
		{
			$.ajax(
	          {
					data:{'classid':classid,'section':section},
					url:baseurl+'TimetableController/copysave_lastweek_timetable',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Timetable Created Successfully", "success");
						window.location.reload();
						//$("#Tokyo").show();
					}
					
				});
			
		}
					}
				});	
}	   
      

        </script>



    </body>

</html>