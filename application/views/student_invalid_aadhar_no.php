
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
          <h4 class="modal-title">Class And Sections</h4>
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
            
<?php $userlogin=$this->session->userdata('emis_user_type_id');?>            
<?php if($this->session->userdata('emis_user_type_id') == 3 ) 	
{?>
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
                                     

                                       
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
													 <center>
                                                <!--  <form id="filter" method="post" action="<?php echo base_url().'Home/get_student_scheme_list_inspire';?>">
												  
                                                    <div class="form-group">
                                                    <div class="row">
													                    <!--<div class="col-md-3" >  
                                                          <select style="width: 90%;" class="form-control" class="center" onchange="get_scholor();"  tabindex="1" id="schemeid" name="schemeid"   required="" >
                                                               	
                                                                <option value="0">Select scheme</option>
                                                                <option value="1">NMMS Scheme</option>
																<option value="2">TRSTSE Scholarship Scheme</option>
																<option value="3">Inspire Award Details</option>
																<option value="4">Students Sports Participation</option>
                                                               </select> 
															   
                                                         </div>-->
													
													<!-- <div class="col-md-3">  
                                                          <select style="width: 90%;" class="form-control" onchange="get_section();" data-placeholder="Choose a Category" tabindex="1" id="classno" name="classno"  style="width: 30%" required="" >
                                                               	
                                                                <option value="" >Select Class</option>
																	
                                                                 <?php foreach($classDetails as $sc) {
																	   $classid=$sc->value;
																  switch ($classid) {
																case $sta="1":$standard='I';break;
																case $sta="2":$standard='II';break;
																case $sta="3":$standard='III';break;	
																case $sta="4":$standard='IV';break;	
																case $sta="5":$standard='V';break;
																case $sta="6":$standard='VI';break;	
																case $sta="7":$standard='VII';break;	
																case $sta="3":$standard='VIII';break;
																case $sta="9":$standard='IX';break;	
																case $sta="10":$standard='X';break;	
																case $sta="11":$standard='XI';break;	
																case $sta="12":$standard='XII';break;	
																case $sta="13":$standard='Pre KG';break;	
																case $sta="14":$standard='UKG';break;	
																case $sta="15":$standard='LKG';break;
																}	 
														 ?>
                                                               <option value="<?php echo $sta;  ?>" ><?php echo $standard;?></option>
                                                                 <?php   }  ?>
																 
                                                               </select> 
                                                        
                                                    </div>
													<div class="col-md-2">  
                                                          <select style="width: 90%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="sectionname" name="sectionname"  style="width: 60%" required="" >
                                                              
                                                               
                                                               </select> 
                                                        
                                                    </div>
													<div class="col-md-2">
                                                     <button type="submit"  class="btn green" id="emis_stu_searchsep_sub" >SUBMIT</button>
                                                    </div>
													
													<div class="col-md-offset-2 col-md-2">
                                                    
                                                    </div>
													</div>
                                                    </form> -->
												</center>
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
													
                                                            <i class="fa fa-globe"></i>Student Invalid Aadhar Number List<span> </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                      
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
														
                                                            <thead>
                                                                <tr>
                                                                   <th> sno </th>                        
                                                                    <th> Unique id</th>
                                                                    <!-- <th> Admision number</th> -->
                                                                    <th> Name </th>           
                                                                    <th> Gender </th>                              
                                                                    <th> Class</th>
                                                                    <th> Section </th>
                                                                    <th>Aadhar Number</th>
																                                    <th>Action</th>
                                                                  
																	
                                                                   
                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php
                                                            														                                       $i=1;
															if(!empty($invalid_aadhar)){ $total1 = 0; foreach($invalid_aadhar as $key=>$all){   ?>

                                                                <tr>
                                                                  <td><?php echo $i; ?></td>
                                                                   <!--  <td><a onclick="savestudentid1('<?php echo $all->unique_id_no; ?>')"><?php echo $all->unique_id_no; ?></a></td> -->
                                                                    <td><?php echo $all->unique_id_no; ?>
                                                                          <input type="hidden" value="<?=$all->unique_id_no;?>" id="unique_id_no_<?php echo $key; ?>">
                                                                    </td>
                                                                     <!-- <td><?php echo $all->school_admission_no; ?></td> -->
                                                                    <td><?php echo $all->name; ?>
                                                                          <input type="hidden"value="<?=$all->id;?>">
                                                                    </td>
                                                                    <td><?php if($all->gender==1) { echo "Male"; } else if($all->gender==2) { echo "Female"; } else if($all->gender==3) { echo "Transgender"; } ?></td>
																	
                                
                                                                    <?php  if($all->class_studying_id == '13')  
                                                                    {  ?> 
                                                                        <td> <?php echo 'LKG'; ?> </td>
                                                                 <?php } 
                                                                 else if($all->class_studying_id == '14') 
                                                                    {  ?> 
                                                                        <td> <?php echo 'UKG'; ?> </td>
                                                                 <?php } 
                                                                 else if($all->class_studying_id == '15') 
                                                                    {  ?> 
                                                                        <td> <?php echo 'PreKG'; ?> </td>
                                                                 <?php } 
                                                                     else
                                                                    { ?>
                                                                    <td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_class_studying');
                                                                   $this->db->where('id', $all->class_studying_id);  
                                                                   $query =  $this->db->get();
                                                                   $classs=$query->row('class_studying'); echo $classs;  ?></td>
                                                                   <?php } ?>

                                                                    <td><?php echo $all->class_section; ?></td>
                                                                     <td>
																	 <input maxlength="12" value="<?php echo $all->aadhaar_uid_number; ?>" class="form-control" id="aadhar_<?php echo $key;?>" name="aadhar" onchange="check(this.value,this.id);" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text"  required="required"></input>
																	 </td>
																	 
								<td>
							<a  class="btn btn-sm green" onclick="return aadharcheck(this.parentNode.previousElementSibling.children[0],this.parentNode.previousElementSibling.children[0].id,document.getElementById('unique_id_no_<?php echo $key; ?>'));">Save </a>
                                                                    </td>
																	
                                                                  

                                                                </tr>
															<?php  
															$i++;
															}	
															?>
                                                                
                                                      
                                                            </tbody>
                                                       <!--   <tfoot>
                                                                <th  class="center">Total</th>
                                                              
																<th class="center"></th>
																 <th ><?php echo $aadharincount?></th>
                                                                <th ><?php echo $aadharnotincount?></th>
                                                            </tfoot> -->
                                                            <?php }   ?>
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

$("#tbl").hide(); 
var local_i =-1;
$("#sample_2 tbody").on('click', '.edit-class-section', function(e) {
     index =  $(this).closest('tr').index();

    var save = $(this).closest('tr').children('td').find('button').attr('id');
   // alert(save);
    var cancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
    var class_id = $(this).closest('tr').children('td').find('input').attr('id');
    //alert(class_id);
         var edit =  $(this).attr("id"); 
         if(local_i!=-1){
       // $("#edit"+local_i).show();
           // $("#save"+local_i).hide();
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(unique_id_no);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(name);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(gender);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(4).text(class_studying_id);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(5).text(class_section);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(aadhaar_uid_number);
         }
    unique_id_no =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).text();
    name =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).text();
    gender =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(3).text();
    class_studying_id =$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(4).text();
    class_section =$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).text();
    aadhaar_uid_number=$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(6).text();
   

          $('#'+edit).hide();
         $('#'+save).show();
     $('#'+cancel).show();
    $(this).closest('tr').find('td').attr('contenteditable','true');
 
       $('#sample_2').find('tbody').find('tr').eq(index).children('td').eq(6).html('<td><input type="text" id="aadhaar_uid_number" minlength="1" maxlength="12"  class="form-control" value="" ></td>');
   });
	 function get_section()
    {
  // alert(section_id);
  var classid=$("#classno").val();
      if(classid !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Home/get_school_section_details',
        data:{'class_id':classid},
        success: function(resp){
        // alert(resp);  
       
        var section = JSON.parse(resp);
        console.log(section);
        var section_drop = '<select name="section_id" class="form-control" id="section_id">';
        section_drop += '<option value=0>Select Section</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $("#sectionname").empty('');            
            $("#sectionname").html(section_drop); 
           
            
         },
          
    })
    }
    }  
$(document).ready(function()
{
    sum_dataTable('#sample_3');
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
    function isNumberKey(evt)
       {
      
          var charCode = (evt.which) ? evt.which : evt.keyCode;
           if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
        return false;
    }
    }
	
	
	/**************************************************************
			Function Aadhar Validation
	***************************************************************/
	
	function check(value,id){
   // alert(id);
		var uid=value;
		if(validate(uid)){
			return true;	
		}else{
			document.getElementById(id).value='';
			alert("Enter the valid aadhar");
			return false;
		}
	}
	
	function aadharcheck(nod,id,ele) {
		var check=nod.value;	
   // alert(value);	
    if(nod.value==null || nod.value=="" || nod.value==0){
        alert("AADHAR CANNOT BE EMPTY");
        return false;
    }
    
		$.ajax({
            type:"POST",
            url:baseurl+'Home/checkaadhar',
            data:"&aadhar="+check,
            success: function(resp) {
              check = JSON.parse(resp);
              
              if(check!=null && check!=""){
                alert('Aadhar linked to -'+check[0]['unique_id_no']+'---'+check[0]['name']);
				        document.getElementById(id).value='';
                return false;
              }else {
                saveaadhar(nod,ele);
                return true;
			       }
            },
            error: function(e) {
                alert('Error: ' + e.responseText);
                return false;
            }

		});
  }


	var d=[
		[0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
		[1, 2, 3, 4, 0, 6, 7, 8, 9, 5], 
		[2, 3, 4, 0, 1, 7, 8, 9, 5, 6], 
		[3, 4, 0, 1, 2, 8, 9, 5, 6, 7], 
		[4, 0, 1, 2, 3, 9, 5, 6, 7, 8], 
		[5, 9, 8, 7, 6, 0, 4, 3, 2, 1], 
		[6, 5, 9, 8, 7, 1, 0, 4, 3, 2], 
		[7, 6, 5, 9, 8, 2, 1, 0, 4, 3], 
		[8, 7, 6, 5, 9, 3, 2, 1, 0, 4], 
		[9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
	];

	// permutation table p
	var p=[
		[0, 1, 2, 3, 4, 5, 6, 7, 8, 9], 
		[1, 5, 7, 6, 2, 8, 3, 0, 9, 4], 
		[5, 8, 0, 3, 7, 9, 6, 1, 4, 2], 
		[8, 9, 1, 6, 0, 4, 3, 5, 2, 7], 
		[9, 4, 5, 3, 1, 2, 6, 8, 7, 0], 
		[4, 2, 8, 6, 5, 7, 3, 9, 0, 1], 
		[2, 7, 9, 3, 8, 0, 6, 4, 1, 5], 
		[7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
	];

	// inverse table inv
	var inv = [0, 4, 3, 2, 1, 5, 6, 7, 8, 9];

	// converts string or number to an array and inverts it
	function invArray(array){
		
		if (Object.prototype.toString.call(array) == "[object Number]"){
			array = String(array);
		}
		
		if (Object.prototype.toString.call(array) == "[object String]"){
			array = array.split("").map(Number);
		}
		
		return array.reverse();
		
	}

	// generates checksum
	function generate(array){
			
		var c = 0;
		var invertedArray = invArray(array);
		
		for (var i = 0; i < invertedArray.length; i++){
			c = d[c][p[((i + 1) % 8)][invertedArray[i]]];
		}
		
		return inv[c];
	}

	// validates checksum
	function validate(array) {
		var c = 0;
		var invertedArray = invArray(array);
		
		for (var i = 0; i < invertedArray.length; i++){
			c=d[c][p[(i % 8)][invertedArray[i]]];
		}
		return (c === 0);
	}
	
	
	function saveaadhar(node,studentid){
		alert("asdfssdfsdfsdfsdfsd");
		var uid=node.value;
		var adhaarpattern = /^\d{12}$/;
		
		if(uid == "" || uid == null){ 
			alert("Required Field");
            return 0; 
        }else if(isNaN(uid) || !validate(uid) || !adhaarpattern.test(uid)){
			alert("Enter valid aadhar");
            return true;
        }else{ 
			
			var val=node.value;		
			var studid=studentid.value;
			
			
			$.ajax({
				type: "POST",
				url:baseurl+'Home/aadhaarupdate/'+studid,
				data:"&aadhar="+val,
				success:function(resp){
					swal("OK", "Aadhar Updated Successfully", "success");
					window.location.reload();
				},error: function(e){
					alert('Error:'+e.reponseText);
					return false;
				}
			});
		}
		
	}
	
	
	
    </script>
    </body>

</html>