<!DOCTYPE html> 

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style>
        .dashboard-stat2 {
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;
    background: #fff;
    padding: 15px 15px 14px !important;
}
    .dashboard-stat2 .display {
    margin-bottom: 2px !important;
}
.bottom
{
  border-bottom: 1px solid gray;
}
.bs-callout-lightsteelblue {
    border-left: 8px solid lightsteelblue;
    border-radius: 3% !important;
}
.bs-callout-darkseagreen {
    border-left: 8px solid darkseagreen;
    border-radius: 3% !important;
}
.bs-callout-mediumaquamarine {
    border-left: 8px solid mediumaquamarine;
    border-radius: 3% !important;
}
.bs-callout-lightblue {
    border-left: 8px solid lightblue;
    border-radius: 3% !important;
}

.x_panel
{
      padding: 0px 8px !important;
}
.x_title {
    border-bottom: 2px solid #E6E9ED;
    margin: 0px -7px 0px;
    margin-bottom: 10px;
}
.khaki
{
  background-color: khaki;
  color: black;
}
.lightgrey
{
  background-color: lightgrey;
  color: black;

}
.lightyellow
{
  background-color: #f3a84ea6;
  color: black;

}
.lightgreen
{
  background-color: #ceeabf;
  color: black;

}
    </style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
      
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
                         
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div></div>
                                <div class="container">
     
                                    <div class="page-content-inner">

                                     <div class="portlet-body">



                                               
                                           <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>DSESchool Surplus  <?php echo "  Eligible Surplus :(".$sur.')'?> Home Science</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                     
                                                   
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                             <tr>
                                                                    <th>S.No</th>
                                                                    <th>Name</th>
 <th>Teacher ID</th>
 <th>Gender</th>
 <th>Date Of <br>Appointment</th>
																	
																	<th>Date of join <br>Present School</th>
																	<!-- <th>Date of <br>Regularization</th> -->
																	<th>Date of Birth</th>
																	<th>Disability</th>
																	<th>Designation</th>
                                                                    <th>Surplus</th>




                                                                </tr>
                                                                </thead>
                                                              
                                                                
                                                            <?php $i=1;
                                                         if(!empty($dsegovsurplus_homesciencestaff)){
                                                           // print_r(dsegovsurplus_homesciencestaff);
															foreach($dsegovsurplus_homesciencestaff as $sd){
																
                                                             
                                                             ?>

                                                        <tr>
                                                        <td><?php echo $i;?></td>
														
														<td><?=$sd->teacher_name;?>
<input type="hidden" id="teach_id<?=$i?>" value="<?=$sd->teacher_code;?>">
														
</td>
<td><?=$sd->teacher_code;?></td>
<td><?php echo $sd->gender==1?'Male':'Female'; ?>
<input type="hidden" id="school_id<?=$i?>" value="<?=$sd->school_id;?>">
</td>
														
														
													<td><?=
														date('d-m-Y', strtotime($sd->staff_join))?>
														<input type="hidden" id="dist_id<?=$i?>" value="<?=$sd->district_id;?>">
														</td>
														
														<td><?= date('d-m-Y', strtotime($sd->staff_psjoin))
														?><input type="hidden" id="edudist_id<?=$i?>" value="<?=$sd->edu_dist_id;?>">
														<input type="hidden" id="block<?=$i?>" value="<?=$sd->block_id;?>">
														
														</td>
														
														
														
													
														<td><?=
														date('d-m-Y', strtotime($sd->staff_dob))?>
														<input type="hidden" id="sub_id<?=$i?>" value="<?=$sd->appointed_subject;?>"></td>
														<td><?php if($sd->disability_type ==3)
													{   echo 'Visually Impaired';}
                                                    elseif($sd->disability_type ==2)
													{  	echo 'Physically Challenged';}else
													{   echo  'Not Applicable';}?></td>
														<td><?=$sd->type_teacher;?>
														<input type="hidden" id="m_id<?= $i?>" value="<?=$sd->trans_id;?>">
														<input type="hidden" id="teacher_type<?= $i?>" value="<?=$sd->teacher_type;?>">
														</td>
                                                                  
                                                     <!--   <td style="text-align: center !important;"><input type="checkbox" class="checkbox" id="profile<?php echo $i ?>" name="profile_count[] " value="1"<?=$sd->surplus == 1 ?checked:unchecked ;?> ></td> -->
													 
													 <td >
													 <select name="profile_count"id="profile<?php echo $i ?>" class="sur_class" >
													 
  <option value="0" <?=$sd->surplus == 1 ?'selected="selected"':'';?>>NotSurplus</option>
  <option value="1" <?=$sd->surplus == 1 ?'selected="selected"':'';?>>Surplus</option>
 
</select></td>
                                                                  
                                                          </tr>
                                                                <?php $i++;?>
                                                                  <?php
                                                          
                                                        }?>
                                                            
                                                      
                                                            </tbody>

                                                            <tfoot>
                                                              
                                                              
                                                            </tfoot>
                                                              <?php } ?>
 
                                            </table>
                          
                          
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar">
                                        <!-- BEGIN THEME PANEL -->
                          
                                        <!-- END THEME PANEL -->
                                    </div>
                                    <!-- END PAGE TOOLBAR -->
<div class ="row">
                                       <div class="col-md-12" >
                                                              <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                               
                                                                <button type="submit" class="btn green btn-lg" onclick ="saveleaveperiods()">Submit</button>
                                                              </div>
                                                              </div>
                                </div>
                                </div>

                            </div>


                            </div>
                                                       
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->          

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

           
        </script>

         <script type="text/javascript">
//changes values



// var school_verification = new Array();
// var teach_id = new Array();
// $(".checkbox").click(function(){

    
   
       // $.each($(".checkbox:checked"), function() {
           // var data = $(this).parents('tr:eq(0)');

           // teach_id.push($(data).find('td:eq(0)').text().trim());
           // school_verification.push({ 'teach_id':$(data).find('td:eq(0)').find('input').val(),
            // 'teach_id':$(data).find('td:eq(1)').find('input').val(),
			// 'school_id':$(data).find('td:eq(2)').find('input').val()	
             // , modeule_id1:($(data).find('td:eq(7)').find('input[type="checkbox"]:checked').val())
// });            
       // });
       // // $("#school").html('<b>'+school.toString()+'</b>');
       // $("#teach_id").html('<h5>'+teach_id.length+' Selected</h5>');
       // if ($("input[name='profile_count[]']:checked").length == $(".checkbox").length ){
        // $("#select_all").prop('checked', true);
    // }else
    // {
        // $("#select_all").prop('checked', false);
       
    // }
 // console.log(school_verification.length);
   // });
   
   

// // var profile_count=new array(); 


 
function saveleaveperiods()
{
	
	
	var surplus_count = <?php echo json_encode($sur);?>;
	
	var dsegovsurplus_sgstaff = <?=json_encode($dsegovsurplus_homesciencestaff);?>;
	
		school_verification = new Array();
			var sur_count = 0;
		for(var i =1;i<=dsegovsurplus_sgstaff.length;i++)
		{
			var modeule_id1 = $("#profile"+i).val();
		    var type_teacher = $("#teacher_type"+i).val();
			var school_id = $("#school_id"+i).val();
			var dist_id = $("#dist_id"+i).val();
			var edudist_id = $("#edudist_id"+i).val();
			var teach_id =$("#teach_id"+i).val();
			var m_id =$("#m_id"+i).val();
			var subject =$("#sub_id"+i).val();
			var block =$("#block"+i).val();
			console.log(subject);
			var count='';
			if(m_id ==''){
			if(modeule_id1 != 0)
			{
		         school_verification.push({'modeule_id1':modeule_id1,'school_id':school_id,'teach_id':teach_id,'subject':subject,'dist_id':dist_id,'edudist_id':dist_id,'block':block,'type_teacher':type_teacher});
				 // count =school_verification.length;
			}
			}else
			{
				school_verification.push({'modeule_id1':modeule_id1,'school_id':school_id,'teach_id':teach_id,'subject':subject,'dist_id':dist_id,'edudist_id':dist_id,'block':block,'type_teacher':type_teacher});
				 
			}
			
			if(modeule_id1 !=0)
			{
				sur_count = sur_count +1;
			}
			
			
		}
		 console.log(school_verification); 
		 console.log(count);
		 // return false;
		
	/*if(surplus_count >= sur_count){*/
			
			
			
			$.ajax(
          {
			data:{'school_verification':school_verification},
			url:baseurl+'Ceo_District/save_surplusdse',
			type:"POST",
			dataType:"JSON",

			success:function(res)
			{
			swal("OK", "Save Successfully", "success");
            location.reload();
			}
			});
		/*}else
		{
			alert('Eligibles Surplus <?php echo $sur ?>');
		}return false;*/

}


$('#emis_state_report_schmanage').click(function () {   
        console.log(this.checked,$('input:checkbox').find(".school_manage").find());
     $('input:checkbox').prop('checked', this.checked);
     if(this.checked){   
     // console.log($(this).val());
     }
});



</script> 


    </body>

</html>
