<?php 

    
      // echo"<pre>";print_r($staff_details);echo"</pre>";
     ?>           

<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
	<style>
    .visible
    {
            display:block !important;
    }

</style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-table/bootstrap-table.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->


    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

 <?php $this->load->view('Ceo_District/header.php'); ?>
<div class="page-content">
                                <div>
                            
                                <br/>
                                <div>
                                <div class="container">
                 
  <div class="row">
    <div class=" col-md-12"> 
      <div class="row">
           <!--    <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;">
              <a  href="javascript:void(0)" onclick="comp('elig')">
			  <span class="bottom" data-counter="counterup" data-value="30" style="font-size: 20px;"> Eligible</br>Posts</span>
                
                        <h3> 
        <?php echo number_format($dsestaff_fixa[0]->elig_tot2 );?></h3>
              </a>
            </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('sanct')">
                <span class="bottom" data-counter="counterup" data-value="30" style="font-size: 20px;"> Sanctioned </br> Posts</br> </span>
                  <h3> <?php echo number_format($dsestaff_fixa[0]->sanc_tot); ?></h3>
              </a>
            </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('avail')">
                 <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 20px;">Available</br> Teachers</br></span>
                                   <h3> 
        <?php echo number_format($dsestaff_fixa[0]-> avail_tot) ?></h3>
              </a>
            </div>
            </div>
          <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('need')">
                 <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 20px;">Needed </br>Teachers</br></span>
                            <h3> 
                       <?php echo number_format($dsestaff_fixa[0]-> need_tot) ?></h3>
              </a>
            </div>
            </div> -->
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('surpwith')">
               <span class="bottom" style="font-size: 20px;">Teachers Marked As Surplus</span>
                              <h3> 
                        <?php echo number_format($totalsurplus[0]->total); ?></h3>
              </a>
            </div>
            </div>
        <!--    <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('surpwithout')">
                <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 20px;">Surplus Post</br>WithOut Person</span>
                  <h3> 
                          <?php echo number_format($dsestaff_fixa[0]->surp_wo_tot) ?></h3>
              </a>
            </div> 
            </div> -->
          </div>
        
          
        <div class="row cards hidden six_grp" >
      <div class="col-md-2">
         <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat1">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat2"> 
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat3">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat4">
              
              </div>
              </div>
              </div>
             <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat5">
              
              </div>
              </div>
              </div>
              </div> 
			      <div class="row card2 hidden five_grp" >
      <div class="col-md-2">
         <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="st1">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="st2"> 
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="st3">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="st4">
              
              </div>
              </div>
              </div>
             <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="st5">
              
              </div>
              </div>
              </div>
              </div> 
     
     
         
      </div>
    </div>


     </div>
                                       

  </div>
</div>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="title"></h4>
		  
        </div>
        <div class="modal-body">
          <p class="content"></p>
        </div>
        <div class="modal-footer">
          <p id="create"></p>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
     
    </div>
  </div>

                                
                    
            <?php $this->load->view('scripts.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas -->
            <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
           
        
    </div>
</div>
         <?php $this->load->view('footer.php'); ?>

</div>
</body>

<script>
$('.six_grp').hide();

function comp(nameid) {
    // console.log(nameid);return false;
  $('.cards').addClass('hidden');
  
	  $("#stat1").html('<a href="<?php echo base_url().'Ceo_District/emis_teacher_surplus_sg'; ?>"> <h4>SG Teachers</h4> <span><?php echo $teachertype_total[0]-> SG;?></span></a>');
	  
	  // $("#stat2").html('<a href="<?php echo base_url().'Ceo_District/emis_teacher_surplus_bt'; ?>"> <h4>BT Teachers</h4> <span><?php echo $teachertype_total[0]->BT;?></span></a>');
	  // var name = "asdasd";
	  $("#stat2").html('<a href="javascript:void(0)" onclick="com()" > <h4>BT Teachers</h4> <span><?php echo $teachertype_total[0]->BT;?></span></a>');
	  
	  $("#stat3").html('<a href="<?php echo base_url().'Ceo_District/emis_teacher_surplus_pg'; ?>"> <h4>PG Teachers</h4> <span><?php echo $teachertype_total[0]->PG;?></span></a>');
	  $("#stat4").html('<a href="<?php echo base_url().'Ceo_District/emis_teacher_surplus_highhm'; ?>"> <h4>High School HM</h4> <span><?php echo $teachertype_total[0]-> high_hm;?></span></a>');
	   $("#stat5").html('<a href="<?php echo base_url().'Ceo_District/emis_teacher_surplus_hrshm'; ?>"> <h4>Hrsc School HM</h4> <span><?php echo $teachertype_total[0]-> hrs_hm;?></span></a>');
	  
  
  $('.six_grp').removeClass('hidden').addClass('visible');
}


$('.five_grp').hide();

function com() {
    // console.log(nameid);
  $('.card2').addClass('hidden');
  
	  $("#st1").html('<a href="<?php echo base_url().'Ceo_District/tamil_teacher_surplus_report'; ?>"> <h4>Tamil Teachers</h4> <span><?php echo $bt_sub_teacher_total[0]-> tamil;?></span></a>');
	  
	   $("#st2").html('<a href="<?php echo base_url().'Ceo_District/english_teacher_surplus_report'; ?>"> <h4>Engligh Teachers</h4> <span><?php echo $bt_sub_teacher_total[0]->english;?></span></a>');
	  //$("#stat2").html('<a href="javascript:void(0)" onclick="comp()"> <h4>BT Teachers</h4> <span><?php echo $teachertype_total[0]->BT;?></span></a>');
	  
	  $("#st3").html('<a href="<?php echo base_url().'Ceo_District/maths_teacher_surplus_report'; ?>"> <h4>Maths Teachers</h4> <span><?php echo $bt_sub_teacher_total[0]->maths;?></span></a>');
	  $("#st4").html('<a href="<?php echo base_url().'Ceo_District/sc_teacher_surplus_report'; ?>"> <h4>Science Teachers</h4> <span><?php echo $bt_sub_teacher_total[0]-> sc;?></span></a>');
	   $("#st5").html('<a href="<?php echo base_url().'Ceo_District/ssc_teacher_surplus_report'; ?>"> <h4>SocialScience<br> Teachers</h4> <span><?php echo $bt_sub_teacher_total[0]-> ss;?></span></a>');
	  
  
  $('.five_grp').removeClass('hidden').addClass('visible');
}
</script>
<script type="text/javascript">
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

<script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
              <script type="text/javascript">
            $(document).ready(function(){
            $("#myModal").modal('hide');
        });
             

  </script>
        <script type="text/javascript">
            var flash_data = <?php echo json_encode($old_flash_message)?>;
  // console.log(flash_data);
  function show_data(data)
  {

    // console.log(data);
      var flash_details = flash_data.filter(flash=>flash.id == data)[0];
      // console.log(flash_details); 
      $(".modal-title").text(flash_details.title);
      $('.content').text(flash_details.content);
      // $('#create').text(flash_details.user_type +' - '+flash_details.created_date);
      $("#myModal").modal('show');
  }
        </script>
</html>