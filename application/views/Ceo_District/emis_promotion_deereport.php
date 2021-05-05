
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>DEE-Promotion Report :<?php echo $pan?></div>
                                                        
                                                    </div>
													<form action="<?=base_url().'Ceo_District/promotion_deereport' ?>" method="post">
														               			  <div class="col-md-3"> 
                       <label class="control-label"><b>Designation</b></label>
                       <div class="form-group"> 
					   
                           

  <select  class="form-control"  id="desig" name="desig" required="" >
						 
<option value="0" >select panel</option>							 
<option value="28HM(MiddleSchool)" <?=$sd->panel1 == 'HM(MiddleSchool)' ?'selected="selected"':'';?>>HM(MiddleSchool)</option>
<option value="29HM(PrimarySchool)" <?=$sd->panel1 == 'HM(PrimarySchool)' ?'selected="selected"':'';?>>HM(PrimarySchool) </option>
<option value="46BT Asst-English" <?=$sd->panel1 == 'BT Asst-English' ?'selected="selected"':'';?> >BT Asst-English</option>
<option value="48BT Asst-Tamil" <?=$sd->panel1 == 'BT Asst-Tamil' ?'selected="selected"':'';?>>BT Asst-Tamil</option>
<option value="3 BT Asst-Mathematics" <?=$sd->panel1 == 'BT Asst-Mathematics' ?'selected="selected"':'';?> >BT Asst-Mathematics</option>
<option value="7 BT Asst-Science" <?=$sd->panel1 == 'BT Asst-Science' ?'selected="selected"':'';?>>BT Asst-Science</option>
<option value="8 BT Asst-Social Science" <?=$sd->panel1 == 'BT Asst-Social Science' ?'selected="selected"':'';?>>BT Asst-Social Science</option>
                         </select>  						 
                       </div> 
                  </div> 
				    <div class="col-md-2"> 
                      
                       <div class="form-group"> 
						<label class="control-label">
						</label>	</br>				   
                        <button type="submit" ID="addClick"  class="btn btn-primary">Submit</button>
						
                       </div>  </div>
					   </form>
                                                    <div class="portlet-body">

                                        
                                  <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                               <th style="text-align: center;">S.No</th>
							   
							   <th style="text-align: center;">Panel Senority No.</th>
							   <th style="text-align: center;">Block</th>
                              <th style="text-align: center;">Name</th>
                               <th style="text-align: center;">Teacher ID</th>    
                              <th style="text-align: center;">Designation</th>	
                               <th style="text-align: center;">Subject</th> 
                             <th style="text-align: center;">UDISE Code</th>
                              <th style="text-align: center;">School</th>
							  
							   <th style="text-align: center;">Date Of <br>Join School</th>
                              <th style="text-align: center;">DOB</th> 
                              <th style="text-align: center;">Date of <br>Appointment</th>
                              <th>Date of<br> Regularisation</th>


                            

                              </tr>
                              </thead>
                              <tbody id="student_detail">
                                                            
                                                 <?php
                                                             $i=1; 
                                                           								
														   if(!empty($deepromotion)){ $total1 = 0; foreach($deepromotion as $sd){   

														   $rank = '';
							if($sd->rank1!=0)
							{
								$rank = $sd->rank1;
							}else if($sd->rank2 !=0)
							{
								$rank = $sd->rank2;
							}else if($sd->rank3 !=0)
							{
								$rank = $sd->rank3;
							}else{
								$rank = '-'; 
							}
                                                ?>                <tr>
                                                                 <td class="center"><?=$i;?></td>
                                                                   
                                                                  <td><?php echo $rank ?></td>
																  <td><?php echo $sd->block_name ?></td>    
                                                               <td><?php echo $sd->teacher_name?></td>
                                                               <td><?php echo $sd->teacher_id?></td>
															   <td><?php echo $sd->type_teacher ?></td>
															   
																 <td><?php echo $sd->subjects ?></td>
																  <td><?php echo $sd->udise_code ?></td>
																<td class="center"><?=$sd->school_name;?></td>
																
																 
																 
																  <td><?=$sd->doj_pr_school !='0000-00-00' && $sd->doj_pr_school !=''? date('d-m-Y', strtotime($sd->doj_pr_school)):' '?></td>
																  <td><?= $sd->dob !='0000-00-00' && $sd->dob !=''? date('d-m-Y', strtotime($sd->dob)):' '?></td> 
																	
																<td><?= $sd->appointment_date !='0000-00-00' && $sd->appointment_date !=''? date('d-m-Y', strtotime($sd->appointment_date)):' '?></td>
																	
																	<td><?= $sd->regularisation_date!='0000-00-00' && $sd->regularisation_date !=''? date('d-m-Y', strtotime($sd->regularisation_date)):' '?></td> 
                                                              
                                                                </tr>
														   <?php $i++;  } } ?>          
														  
														  
														  
														  
														  
														  
														  </tbody>
                             
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
	<script>
    if($.fn.dataTable.isDataTable('#sample_2')){
           $('#sample_2').DataTable().clear().destroy();


                   }
			   
			   // function getIndex(s)
			   // {
				   // var a =s;
				    // $.ajax({
// data:{'a':a},
// url:baseurl+'Ceo_District/promotion_deereport',
// type:"POST",
// dataType:"JSON",
// success:function(res)
// {
	
	
                    // students_data = res;
                     // console.log(students_data);
					 // // return false;
                      // // var student_detail = 
                      // $("#student_detail").empty();
                       // var tables = $("#sample_3 tbody");
                        // tables.empty();
                        // // console.log(students_data);
						// var rank = '';
                      // $.each(students_data,function(i,val)
                      // {
                        // i = i+1;
						
						// var rank = '';
							// if(val.rank1!=0)
							// {
								// rank = val.rank1;
							// }else if(val.rank2 !=0)
							// {
								// rank = val.rank2;
							// }else if(val.rank3 !=0)
							// {
								// rank = val.rank3;
							// }else{
								// rank = '-'; 
							// }
							
						  // // var date = new Date(val.dob);
        // // var dob_month = date.getMonth()+1;
        // // var dob = (date.getDate() < 10 ? '0'+date.getDate():date.getDate())+'-'+(dob_month < 10 ? '0'+dob_month:dob_month)+'-'+date.getFullYear();
                        // students_tbl = '<tr id="student_detail">';
                   
school_name udise_code subjects  type_teacher doj_pr_school dob appointment_date  regularisation_date
                          // students_tbl +='<td>'+ i +'</td>';
                          // students_tbl +='<td>'+val.teacher_name+'</td>';
                          // students_tbl +='<td>'+val.school_name+'</td>';
						  // students_tbl +='<td>'+val.udise_code+'</td>';
                          // students_tbl +='<td>'+val.subjects+'</td>';
						  // students_tbl +='<td>'+rank+'</td>';
                          // students_tbl +='<td>'+val.type_teacher+'</td>';
                         
                          // students_tbl +='<td>'+chnage_date_format(val.doj_pr_school)+'</td>';
                          // students_tbl +='<td>'+chnage_date_format(val.dob)+'</td>';
                          // students_tbl +='<td>'+chnage_date_format(val.appointment_date)+'</td>';
                           // students_tbl +='<td>'+chnage_date_format(val.regularisation_date)+'</td>';

                      // students_tbl +='</tr>';
                      // $("#student_detail").append(students_tbl);
                      // });
	   // // }else{
		    // // $("#err_msg").html('<h3>'+res.message+'</h3>');
	   // // }
	    // // table =  sum_dataTable('#sample_2');
   
// }
             
          // });
			   // }
			   
		$("#student_detail-pagination").pagination({
        items: 25,
        itemsOnPage: 4,
        cssStyle: "light-theme",
        // This is the actual page changing functionality.
        onPageClick: function(pageNumber) {
          // We need to show and hide `tr`s appropriately.
          var showFrom = 4 * (pageNumber - 1);
          var showTo = showFrom + 4;

          items.hide();
          slice(showFrom, showTo).show();
        }
      });
			   
			   
				  function chnage_date_format(date)
            {
				if(date !='0000-00-00'){
              var date_join = new Date(date);
              console.log(date_join);
              var doj_month = date_join.getMonth()+1;
              var doj = (date_join.getDate() < 10 ? '0'+date_join.getDate():date_join.getDate())+'-'+(doj_month < 10 ? '0'+doj_month:doj_month)+'-'+date_join.getFullYear();

              return doj;
				}else
				{
					return '-';
				}
            }
			   
			   function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Bfrtip',
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
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
                console.log(a);
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
               
            
            $(column.footer()).html(sum);
                        });
            }
        });
		return table;
    }
    </script>         
    </body>

</html>