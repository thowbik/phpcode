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
  float: left;
  
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
                                                            <i class="fa fa-globe"></i>Term Plan
															
															</div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body" >
													
                                                        <table class="table table-striped table-bordered table-hover  sample_2" id="termplan">
														
                                                            <thead>
                                                                <tr>
																   <th>Term</th>
                                                                    <th>Term Satrting Date</th>
                                                                    <th style="width:0%;">Term Ending Date</th>
                                                                    <th style="width:0%;">Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
															<?php
                                                            	
                                                              for($i=1; $i<=3;$i++)
															   {
																   foreach($term_plan as $tp)
															   {
																   ?>
                                                                 <tr>
                                                                    <td>Term &nbsp;<?php echo $i;?></td>
																	<td><?phpecho $tp->start_date;?></td>
																	 <td><?php echo $tp->end_date;?></td>
                                                                     <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit / Update <!--<i class="fa fa-edit"></i>--></a>
																	 <!--<a href="javascript:;" class="btn btn-sm red delete-class-section" id="deleted<?php echo $i; ?>"  onclick='deletenmms(<?php echo $sd->id;?>);' contenteditable="false" data-class-deleted-id ="<?php echo $i;?>">Delete </a>-->
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;  ?>" class="btn btn-sm green save-class-section" onclick="saveterm(<?php echo $i;?>,<?php echo $tp->id;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
                                                               </tr>
															   <?php }
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


$(document).ready(function(){
	
	
	$("#save").hide();
	$("#cancel").hide();
	  })
	
 

           
               
/****************************************/
/*student nmms scholor scheme */
/**************************************/
			 var local_i =-1;
         $("#termplan tbody").on('click', '.edit-class-section', function(e) {
        index =  $(this).closest('tr').index();
		var nationalsave = $(this).closest('tr').children('td').find('button').attr('id');
		var nationalcancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		var nationalclass_id = $(this).closest('tr').children('td').find('input').attr('id');
         var nationaledit =  $(this).attr("id"); 
		 //var nationaldeleted =  $(this).closest('tr').children('td').find('.delete-class-section').attr('id'); 
		if(local_i!=-1){
			
           $('#termplan').find('tbody').find('tr').eq(local_i).find('td').eq(0).text(term);
            $('#termplan').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(term-start_date);
            $('#termplan').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(term-end_date);
            
         }
		term =  $('#termplan').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		term_s_d =  $('#termplan').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		term_e_d =  $('#termplan').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		
		// $('#'+nationaldeleted).hide();
		 $('#'+nationaledit).hide();
         $('#'+nationalsave).show();
		 $('#'+nationalcancel).show();
		 
	   $(this).closest('tr').find('td').attr('contenteditable','true');
       var termno =  '<input type="text" id="term" class="form-control" value="" disabled>';
	   var term_start_d = '<input type="date" id="start_date"   class="form-control" value="" >';
	   var term_end_d = '<input type="date" id="end_date" class="form-control" value="" >';
	  
		
		$('#termplan').find('tbody').find('tr').eq(index).find('td').eq(0).html(termno);
		$('#termplan').find('tbody').find('tr').eq(index).find('td').eq(1).html(term_start_d);
		$('#termplan').find('tbody').find('tr').eq(index).find('td').eq(2).html(term_end_d);
		
		
		$("#term").val(term);
		$("#start_date").val(term_s_d);
		$("#end_date").val(term_e_d);
		
		
		
		
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		  local_i = index;
          
      });
	   $("#termplan tbody").on('click', '.cancel-class-section', function(e) {
		  location.reload();
	          });
   function saveterm(i,id)
    {
		// alert(i);
		// alert(a);
		// return false;
		if(id==undefined)
		{
	    var term = i;
		var start_date = $("#start_date").val();
        var end_date =$("#end_date").val();
       
		 if(start_date == '' || end_date =='')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'term':term,'start_date':start_date,'end_date':end_date},
					url:baseurl+'State/term_plan_date_add',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Term Plan Date Saved Successfully", "success");
						window.location.reload();
					}
				});
		}
	}
	else
		{
		
		 var start_date = $("#start_date").val();
         var end_date =$("#end_date").val();
		   if(start_date == '' || end_date =='')
	             {
				swal("OK", "All Field Is Required", "error");
		         }
			/* End of the Condition */  	 
         else
		{		
				$.ajax(
				{
					data:{'term':term,'start_date':start_date,'end_date':end_date},
					url:baseurl+'State/term_plan_date_update',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						swal("OK", "Term Plan Date Saved Successfully", "success");
						window.location.reload();
					}
				});
		}
		}
	 }
	 

	 
		function isNumberKey(evt)
       {
		  
          var charCode = (evt.which) ? evt.which : evt.keyCode;
           if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
        return false;
    }

          return true;
       }
	   $(document).ready(function()
{
    sum_dataTable('.sample_2');
});

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
    }
      

        </script>



    </body>

</html>