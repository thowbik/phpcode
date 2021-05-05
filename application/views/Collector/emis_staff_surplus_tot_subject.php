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
            

 <?php  $this->load->view('Collector/header.php');  ?>
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
        <?php echo number_format($staff_fixa[0]->elig_tot2 );?></h3>
              </a>
            </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('sanct')">
                <span class="bottom" data-counter="counterup" data-value="30" style="font-size: 20px;"> Sanctioned </br> Posts</br> </span>
                  <h3> <?php echo number_format($staff_fixa[0]->sanc_tot); ?></h3>
              </a>
            </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('avail')">
                 <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 20px;">Available</br> Teachers</br></span>
                                   <h3> 
        <?php echo number_format($staff_fixa[0]-> avail_tot) ?></h3>
              </a>
            </div>
            </div>
          <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('need')">
                 <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 20px;">Needed </br>Teachers</br></span>
                            <h3> 
                       <?php echo number_format($staff_fixa[0]-> need_tot) ?></h3>
              </a>
            </div>
            </div> -->
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('surpwith')">
               <span class="bottom" style="font-size: 20px;">Surplus Post </br>With Person </span>
                              <h3> 
                        <?php echo number_format($surptot[0]->surp); ?></h3>
              </a>
            </div>
            </div>
        <!--    <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('surpwithout')">
                <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 20px;">Surplus Post</br>WithOut Person</span>
                  <h3> 
                          <?php echo number_format($staff_fixa[0]->surp_wo_tot) ?></h3>
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
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat6">
              
              </div>
              </div>
              </div>
              </div> 
			   <div class="row cards hidden six_grp" >
      <div class="col-md-2">
         <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat7">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat8"> 
              
              </div>
              </div>
              </div>
              <!--<div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat9">
              
              </div>
              </div>
              </div> -->
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat10">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat11">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat12">
              
              </div>
              </div>
              </div>
			  <div class="col-md-2">
         <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat13">
              
              </div>
              </div>
              </div>
              </div> 
			    <div class="row cards hidden six_grp" >
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
    // console.log(nameid);
  $('.cards').addClass('hidden');
  
	  $("#stat1").html('<a href="<?php echo base_url().'Collector/emis_sgstaff_surpwithpost'; ?>"> <h4>SecondaryGrade Teacher</h4> <span><?php echo $surplus_sub[0]-> sg;?></span></a>');
	  $("#stat2").html('<a href="<?php echo base_url().'Collector/emis_sciencestaff_surpwithpost'; ?>"> <h4>Science</h4> <span><?php echo $surplus_sub[0]-> sci;?></span></a>');
	  $("#stat3").html('<a href="<?php echo base_url().'Collector/emis_mathstaff_surpwithpost'; ?>"> <h4>Maths</h4> <span><?php echo $surplus_sub[0]-> mat;?></span></a>');
	  $("#stat4").html('<a href="<?php echo base_url().'Collector/emis_englishstaff_surpwithpost'; ?>"> <h4>English</h4> <span><?php echo $surplus_sub[0]-> eng;?></span></a>');
	  $("#stat5").html('<a href="<?php echo base_url().'Collector/emis_tamilstaff_surpwithpost'; ?>"> <h4>Tamil</h4> <span><?php echo $surplus_sub[0]-> tam;?></span></a>');
	  $("#stat6").html('<a href="<?php echo base_url().'Collector/emis_socialsciencestaff_surpwithpost'; ?>"> <h4>SocialScience</h4> <span><?php echo $surplus_sub[0]-> soc;?></span></a>');
	 

	  
	  $("#stat7").html('<a href="<?php echo base_url().'Collector/emis_primaryhmstaff_surpwithpost'; ?>"> <h4>Primary HM</h4> <span><?php echo $surplus_sub[0]->phm ;?></span></a>');
	  $("#stat8").html('<a href="<?php echo base_url().'Collector/emis_middlehmstaff_surpwithpost'; ?>"> <h4>Middle HM</h4> <span><?php echo $surplus_sub[0]->mhm ;?></span></a>');
	  $("#stat9").html('<a href="<?php echo base_url().'Collector/emis_highhmstaff_surpwithpost'; ?>"> <h4>High HM</h4> <span><?php echo $surplus_sub[0]->hhm ;?></span></a>');
	  $("#stat10").html('<a href="<?php echo base_url().'Collector/emis_telgustaff_surpwithpost'; ?>"> <h4>Telugu</h4> <span><?php echo $surplus_sub[0]->telu ;?></span></a>');
	  $("#stat11").html('<a href="<?php echo base_url().'Collector/emis_kannadastaff_surpwithpost'; ?>"> <h4>Kannada</h4> <span><?php echo $surplus_sub[0]->kann ;?></span></a>');
	  $("#stat12").html('<a href="<?php echo base_url().'Collector/emis_urdustaff_surpwithpost'; ?>"> <h4>Urdu</h4> <span><?php echo $surplus_sub[0]->urdu ;?></span></a>');
	  $("#stat13").html('<a href="<?php echo base_url().'Collector/emis_malayalamstaff_surpwithpost'; ?>"> <h4>Malayalam</h4> <span><?php echo $surplus_sub[0]->mala ;?></span></a>');
  
  $('.six_grp').removeClass('hidden').addClass('visible');
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