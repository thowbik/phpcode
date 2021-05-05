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
            

  <?php  $this->load->view('state/header.php');  ?>

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
                          

                                    <div class="page-content-inner">

                                     <div class="portlet-body">

                                                <div class="portlet box green">
                                                    <div class="portlet-title col-md-12">
                                                        <div class="caption col-md-4">
                                                            <i class="fa fa-globe"></i>DEE Live Vacancy Others</div>
                                                            <div class="col-md-5" style="margin-top: -1%;"><h3></h3></div>
                                                        <div class="col-md-3 tools">  </div>
                                                        
                                                    </div>

                                                    <div class="portlet-body">
                                                    
                                                       <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                 <th style="text-align: center;">S.No</th>
								 <th>District Name</th>
								 <th>Block Name</th>
								  <th>Udise Code</th> 
                              <th>School Name</th>                        
                            <th style="text-align: center;">SG</th>
                              <th style="text-align: center;">BT-Sciense</th>
                              <th style="text-align: center;">BT-Maths</th>
                              <th style="text-align: center;">BT-English</th>
                              <th style="text-align: center;">BT-Tamil</th>


                              <th style="text-align: center;">BT-Social</th>
							  <th style="text-align: center;">PHM</th>
                              <th style="text-align: center;">MHM</th>
                              
                              <th style="text-align: center;">BT-Telugu</th>
                              

                              <th style="text-align: center;">BT-kannadam</th>
                              <th style="text-align: center;">BT-malayalam</th>
                              <th style="text-align: center;">BT-urudu</th>
							  <th style="display:none;">School id</th>
							  <th style="text-align: center;">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[]; 
                               $i=1;
							   ?>
                              <?php if(!empty($live_vacancy_deereportsgbt)){  $i=1;  $vac_sg=[]; $sciense=[]; $maths=[];
                                $english=[]; $tamil=[]; $social=[]; $phm=[]; $mhm=[]; $telugu=[];  $kannadam=[]; $malayalam=[]; $urudu=[];
                                foreach($live_vacancy_deereportsgbt as $vacancydse){ 
								?>
								<tr>
                               <td id="sone<?php echo $i;?>" contentEditable="false"><?php echo $i?></td>
							   <td id="sone<?php echo $i;?>" contentEditable="false"> <?php echo $vacancydse->district_name; ?></td>
							   <td id="sone<?php echo $i;?>" contentEditable="false"> <?php echo $vacancydse->block_name; ?></td>
							   <td id="sone<?php echo $i;?>" contentEditable="false"> <?php echo $vacancydse->udise_code; ?></td>
                              <td id="sone<?php echo $i;?>" contentEditable="false"> <?php echo $vacancydse->school_name; ?></td>
							  <td id="sone<?php echo $i;?>"> <?php echo $vacancydse->vac_sg; ?></td>
							  <td id="sone<?php echo $i;?>"> <?php echo $vacancydse->sciense; ?></td>
							  <td id="sone<?php echo $i;?>"> <?php echo $vacancydse->maths; ?></td>
							  <td id="sone<?php echo $i;?>"> <?php echo $vacancydse->english; ?></td>
							  <td id="sone<?php echo $i;?>"> <?php echo $vacancydse->tamil; ?></td>
							  <td id="sone<?php echo $i;?>"> <?php echo $vacancydse->social; ?></td>
							 
							  <td id="sone<?php echo $i;?>"> <?php echo $vacancydse->phm; ?></td>
							  <td id="sone<?php echo $i;?>"> <?php echo $vacancydse->mhm; ?></td>
							 
							  <td> <?php echo $vacancydse->telugu; ?></td>
							 
							  <td id="sone<?php echo $i;?>"> <?php echo $vacancydse->kannadam; ?></td>
							  <td id="sone<?php echo $i;?>"> <?php echo $vacancydse->malayalam; ?></td>
							  <td id="sone<?php echo $i;?>"> <?php echo $vacancydse->urudu; ?></td>
							  <td  style="display:none;" id="sone<?php echo $i;?>"><?php echo $vacancydse->school_id;?></td>
							   <td><a href="javascript:;" class="btn btn-sm green edit-class-section" id="edit<?php echo $i; ?>"  contenteditable="false" data-class-section-id ="<?php echo $i;  ?>">Edit <!--<i class="fa fa-edit"></i>--></a>
																	
																	<span>
																	<button data-id="2" style="display:none;" id="save<?php echo $i;?>" class="btn btn-sm green save-class-section" onclick="saveupdate(<?php echo $i;?>)" contenteditable="false">save</button>
																	<button data-id="3"  style="display:none; margin-left: 72px margin-top: -54px"; id="cancel<?php echo $i; ?>" class="btn btn-sm red cancel-class-section" onclick="cancel(<?php echo $i?>)">cancel</button>
																   </span>
                                                                    </td>
							  </tr>
                            <?php 
                                array_push($vac_sg,$vacancydse->vac_sg);
                                 array_push($sciense,$vacancydse->sciense);
                                 array_push($maths,$vacancydse->maths);
                                 array_push($english,$vacancydse->english);
                                 array_push($tamil,$vacancydse->tamil);
                                 array_push($social,$vacancydse->social);
                                 array_push($phm,$vacancydse->phm);
								 array_push($mhm,$vacancydse->mhm);
                                 array_push($telugu,$vacancydse->telugu);
                                
                                 array_push($kannadam,$vacancydse->kannadam);
                                 array_push($malayalam,$vacancydse->malayalam);
                                 array_push($urudu,$vacancydse->urudu);
                               
                            $i++; } ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                                  <th>Total</th>
                                                            <th></th>
                                                            <th></th>
															<th></th>
                                                            <th></th>
                                                            <th><?php 
                                                            $vac_sg = array_sum($vac_sg);
                                                            array_push($total1,$vac_sg);
                                                            echo number_format($vac_sg);?></th>
                                                            <th ><?php 
                                                                $sciense = array_sum($sciense);
                                                                array_push($total1,$sciense);
                                                            echo number_format($sciense);?></th>
                                                            <th ><?php 
                                                             $maths = array_sum($maths);
                                                                array_push($total1,$maths);
                                                           echo number_format($maths);?></th>
                                                            <th><?php 
                                                            $english = array_sum($english);
                                                                array_push($total1,$english);
                                                                echo number_format($english);?></th>
                                                                 <th><?php 
                                                            $tamil = array_sum($tamil);
                                                                array_push($total1,$tamil);
                                                                echo number_format($tamil);?></th>

                                                                 <th><?php 
                                                            $social = array_sum($social);
                                                            array_push($total1,$social);
                                                            echo number_format($social);?></th>
                                                            <th><?php 
                                                                $phm = array_sum($phm);
                                                                array_push($total1,$phm);
                                                            echo number_format($phm);?></th>
															<th><?php 
                                                                $mhm = array_sum($mhm);
                                                                array_push($total1,$mhm);
                                                            echo number_format($mhm);?></th>
                                                            <th><?php 
                                                             $telugu = array_sum($telugu);
                                                                array_push($total1,$telugu);
                                                           echo number_format($maths);?></th>
                                                            
                                                                 <th><?php 
                                                            $kannadam = array_sum($kannadam);
                                                            array_push($total1,$kannadam);
                                                            echo number_format($kannadam);?></th>
                                                            <th><?php 
                                                                $malayalam = array_sum($malayalam);
                                                                array_push($total1,$malayalam);
                                                            echo number_format($malayalam);?></th>
                                                            <th><?php 
                                                             $urudu = array_sum($urudu);
                                                                array_push($total1,$urudu);
                                                           echo number_format($urudu);?></th>
                                                            <th></th>
                                                         
                                                          
                                                        </tr>
                            </tfoot> 
                            <?php } ?>
                            </table>
                                                        
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
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
                   <?php $this->load->view('scripts.php'); ?>
        </body>
<script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
       
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>

        <script type="text/javascript">

           			 var local_i =-1;
			 var standard = '';
			 var medium='';
			 
  $("#sample_2 tbody").on('click', '.edit-class-section', function(e) {
     index =  $(this).closest('tr').index();
	 
		 
		  
	    
		var save = $(this).closest('tr').children('td').find('button').attr('id');
		var cancel = $(this).closest('tr').children('td').find('.cancel-class-section').attr('id');
		var class_id = $(this).closest('tr').children('td').find('input').attr('id');
		//alert(class_id);
         var edit =  $(this).attr("id"); 
		 
		if(local_i!=-1){
		   // $("#edit"+local_i).show();
           // $("#save"+local_i).hide();
		   $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(0).text(s_no);
		    $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(1).text(district_name);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(2).text(block_name);
           $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(3).text(udise_code);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(4).text(school_name);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(5).text(sg);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(6).text(sciense);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(7).text(maths);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(8).text(english);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(9).text(tamil);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(10).text(social);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(11).text(phm);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(12).text(mhm);
            $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(13).text(telugu);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(14).text(kannadam);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(15).text(malayalam);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(16).text(urudu);
			$('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(17).text(schoolid);
            
         }
		 s_no= $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(0).text();
		 district_name=$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).text();
		 block_name=$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).text();
		udise_code =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(3).text();
		school_name =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(4).text();
		sg =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).text();
		sciense =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(6).text();
		maths =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(7).text();
		english =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(8).text();
		tamil =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(9).text();
		social =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(10).text();
		phm =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(11).text();
		mhm =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(12).text();
		telugu =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(13).text();
		kannadam =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(14).text();
		malayalam =  $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(15).text();
		urudu=$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(16).text();
		schoolid=$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(17).text();
		
		 $('#'+edit).hide();
         $('#'+save).show();
		 $('#'+cancel).show();	
		 var classid=$('#'+class_id).val();
	   $(this).closest('tr').find('td').attr('contenteditable','true');
	    var sno =  '<input type="text" id="sno" class="form-control" value="" disabled>';
		var district =  '<input type="text" id="district" class="form-control" value="" disabled>';
		var block =  '<input type="text" id="block" class="form-control" value="" disabled>';
		var udisecode =  '<input type="text" id="udise_code" class="form-control" value="" disabled>';
	   var schoolname = '<input type="text" id="school_name"   class="form-control" value="" disabled>';
	   var sge = '<input type="text" id="sg" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" >';
	  var sci = '<input type="text" id="sciense" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	  var math = '<input type="text" id="maths" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   var eng = '<input type="text" id="english" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	  var tam = '<input type="text" id="tamil" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	  var soc = '<input type="text" id="social" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   var prihm = '<input type="text" id="phm" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	  var midhm = '<input type="text" id="mhm" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	  var tel = '<input type="text" id="telungu" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   var kann = '<input type="text" id="kannadam" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   var mala = '<input type="text" id="malayalam" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   var uru = '<input type="text" id="urudu" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	   var school_id = '<input type="text" id="schid" minlength="1" maxlength="3" onKeypress="return isNumberKey(event);"; class="form-control" value="" >';
	    $('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(0).html(sno);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(1).html(district);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(2).html(block);
		
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(3).html(udisecode);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(4).html(schoolname);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(5).html(sge);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(6).html(sci);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(7).html(math);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(8).html(eng);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(9).html(tam);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(10).html(soc);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(11).html(prihm);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(12).html(midhm);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(13).html(tel);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(14).html(kann);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(15).html(mala);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(16).html(uru);
		$('#sample_2').find('tbody').find('tr').eq(index).find('td').eq(17).html(school_id);
		$("#sno").val(s_no);
		$("#district").val(district_name);
		$("#block").val(block_name);
		$("#udise_code").val(udise_code);
		$("#school_name").val(school_name);
		$("#sg").val(sg);
		$("#sciense").val(sciense);
		$("#maths").val(maths);
		$("#english").val(english);
		$("#tamil").val(tamil);
		$("#social").val(social);
		$("#phm").val(phm);
		$("#mhm").val(mhm);
		$("#telungu").val(telugu);
		$("#kannadam").val(kannadam);
		$("#malayalam").val(malayalam);
		$("#urudu").val(urudu);
		$("#schid").val(schoolid);
		
		  $(this).prop("id","edit"+local_i);
          $(this).closest('tr').children('td').find('span').prop('id','save'+local_i);
		  local_i = index;
          
      });
	   $("#sample_2 tbody").on('click', '.cancel-class-section', function(e) {
		  location.reload();
	   });
	     function saveupdate(i)  
		 {
		
        var school_id = $("#schid").val();
		
		var sg=document.getElementById("sg").value;  
		var sciense=document.getElementById("sciense").value;  
		var maths=document.getElementById("maths").value;  
		var english=document.getElementById("english").value;  
		var tamil=document.getElementById("tamil").value;  
		var social=document.getElementById("social").value;  
		var phm=document.getElementById("phm").value;  
		var mhm=document.getElementById("mhm").value;  
		var telungu=document.getElementById("telungu").value; 
        var kannadam=document.getElementById("kannadam").value; 
        var malayalam=document.getElementById("malayalam").value; 
       var urudu=document.getElementById("urudu").value; 		
	
				 $.ajax(
		            {
			data:{'schoolid':schoolid,'sg':sg,'sciense':sciense,'maths':maths,'english':english,'tamil':tamil,'social':social,'phm':phm,'mhm':mhm,'telungu':telungu,'kannadam':kannadam,'malayalam':malayalam,'urudu':urudu},
			url:baseurl+'State/save_live_vacancy_data',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
			swal("OK", "Data Saved Successfully", "success");
			window.location.reload();
				}
		    });
		 
		 
		 }
	   
	   $(document).ready(function(){
	$("#save").hide();
	$("#cancel").hide();
	  })

 </script>  


    </body>

</html>