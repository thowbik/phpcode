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
            

 <?php  $this->load->view('state/header.php');  ?>
<div class="page-content">
                                <div>
                            
                                <br/>
                                <div>
                                <div class="container">
                 
  <div class="row">
    <div class=" col-md-12"> 
      <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;">
              <a  href="javascript:void(0)" onclick="comp('elig')">
			  <span class="bottom" data-counter="counterup" data-value="30" style="font-size: 20px;"> Eligible</br>Posts</span>
                
                        <h3> 
        <?php echo number_format($dsestaff_fixa[0]->elig
		+$dsestaff_fixa[0]->sg_eligible+$dsestaff_fixa[0]->bt_eli);?></h3>
              </a>
            </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('sanct')">
                <span class="bottom" data-counter="counterup" data-value="30" style="font-size: 20px;"> Sanctioned </br> Posts</br> </span>
				
                  <h3> <?php echo number_format($dsestaff_fixa[0]-> sanc +$dsestaff_fixa[0]->bt_sanc +$dsestaff_fixa[0]->sg_sanctioned); ?></h3>
              </a>
            </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('avail')">
                 <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 20px;">Available</br> Teachers</br></span>
                                   <h3> 
								     
 
        <?php echo number_format($dsestaff_fixa[0]-> avail +$dsestaff_fixa[0]->bt_avail+$dsestaff_fixa[0]->sg_available) ?></h3>
              </a>
            </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('need')">
                 <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 20px;">Needed </br>Teachers</br></span>
                            <h3> 

                       <?php echo number_format($dsestaff_fixa[0]-> need +$dsestaff_fixa[0]->sg_need+$dsestaff_fixa[0]->bt_need ) ?></h3>
              </a>
            </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('surpwith')">
               <span class="bottom" style="font-size: 20px;">Surplus Post </br>With Person </span>
                              <h3> 
							  
                        <?php echo number_format($dsestaff_fixa[0]->swp+$dsestaff_fixa[0]->bt_surp+$dsestaff_fixa[0]->sg_sws ); ?></h3>
              </a>
            </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
              <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:2px !important;text-align:center;color:#4fbaa5;">
              <a  href="javascript:void(0)" onclick="comp('surpwithout')">
                <span class="bottom" data-counter="counterup" data-value="34" style="font-size: 20px;">Surplus Post</br>WithOut Person</span>
                  <h3> 

 
                          <?php echo number_format($dsestaff_fixa[0]->swop+$dsestaff_fixa[0]->bt_surpwo+$dsestaff_fixa[0]->sg_swos ) ?></h3>
              </a>
            </div>
            </div>
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
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat9">
              
              </div>
              </div>
              </div>
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
              <div class="col-md-2">
         <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat14"> 
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat15">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat16">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat17">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat18">
              
              </div>
              </div>
              </div>
			   <!--<div class="col-md-2">
         <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat19">
              
              </div>
              </div>
              </div> -->
              <div class="col-md-2">
         <div class="dashboard-stat2" style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat20"> 
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat21">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat22">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat23">
              
              </div>
              </div>
              </div>
              <div class="col-md-2">
         <div class="dashboard-stat2"  style="height: 110px;width: 170px;border-radius: 5px;padding:25px !important;text-align:center;">
              <div class="display" id="stat24">
              
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
    // console.log(nameid);
  $('.cards').addClass('hidden');
  switch(nameid)
  {   
      case 'elig':
	
	  
      $("#stat1").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>SecondaryGrade Teacher</h4> <span><?php echo $dsestaff_eli[0]-> sg;?></span></a>');
	  $("#stat2").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Tamil</h4> <span><?php echo $dsestaff_eli[0]-> tamil;?></span></a>');
	  $("#stat3").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>PG English</h4> <span><?php echo $dsestaff_eli[0]-> english;?></span></a>');
	  $("#stat4").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Physics</h4> <span><?php echo $dsestaff_eli[0]-> physics;?></span></a>');
	  $("#stat5").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Chemistry</h4> <span><?php echo $dsestaff_eli[0]-> chemistry;?></span></a>');
	  $("#stat6").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biology</h4> <span><?php echo $dsestaff_eli[0]-> biology;?></span></a>');
	  $("#stat7").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Botany</h4> <span><?php echo $dsestaff_eli[0]-> botany;?></span></a>');
	    
	  $("#stat8").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Zoology</h4> <span><?php echo $dsestaff_eli[0]-> zoology;?></span></a>');
	  $("#stat9").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Statistics</h4> <span><?php echo $dsestaff_eli[0]-> statistics;?></span></a>');
	  $("#stat10").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Geography</h4> <span><?php echo $dsestaff_eli[0]-> geography;?></span></a>');
	  $("#stat11").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG MicroBiology</h4> <span><?php echo $dsestaff_eli[0]-> microbiology;?></span></a>');
	  $("#stat12").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biochemistry</h4> <span><?php echo $dsestaff_eli[0]-> biochemistry;?></span></a>');
	  $("#stat13").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Mathematics</h4> <span><?php echo $dsestaff_eli[0]-> mathematics;?></span></a>');
	  $("#stat14").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG Homescience</h4> <span><?php echo $dsestaff_eli[0]-> homescience;?></span></a>');
	  $("#stat15").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG History</h4> <span><?php echo $dsestaff_eli[0]-> history;?></span></a>');
	  $("#stat16").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Economics</h4> <span><?php echo $dsestaff_eli[0]-> economics;?></span></a>');
	  $("#stat17").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Politicalscience</h4> <span><?php echo $dsestaff_eli[0]-> politicalscience;?></span></a>');
	  $("#stat18").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Commerce</h4> <span><?php echo $dsestaff_eli[0]-> commerce;?></span></a>');
	  
	   //$("#stat19").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>HM(High)</h4> <span><?php echo $dsestaff_eli[0]-> hhm;?></span></a>');
	  $("#stat20").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Science</h4> <span><?php echo $dsestaff_eli[0]-> sc;?></span></a>');
	  $("#stat21").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> BT Maths</h4> <span><?php echo $dsestaff_eli[0]-> mat;?></span></a>');
	  $("#stat22").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT English</h4> <span><?php echo $dsestaff_eli[0]-> eng;?></span></a>');
	  $("#stat23").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Tamil</h4> <span><?php echo $dsestaff_eli[0]-> tam;?></span></a>');
	  $("#stat24").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT SocialScience</h4> <span><?php echo $dsestaff_eli[0]-> ss;?></span></a>');
	  
	  
      break;
      case 'sanct':
      	  
	     $("#stat1").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>SecondaryGrade Teacher</h4> <span><?php echo $dsestaff_sanct[0]-> sg;?></span></a>');
	  $("#stat2").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Tamil</h4> <span><?php echo $dsestaff_sanct[0]-> tamil;?></span></a>');
	  $("#stat3").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>PG English</h4> <span><?php echo $dsestaff_sanct[0]-> english;?></span></a>');
	  $("#stat4").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Physics</h4> <span><?php echo $dsestaff_sanct[0]-> physics;?></span></a>');
	  $("#stat5").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Chemistry</h4> <span><?php echo $dsestaff_sanct[0]-> chemistry;?></span></a>');
	  $("#stat6").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biology</h4> <span><?php echo $dsestaff_sanct[0]-> biology;?></span></a>');
	  $("#stat7").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Botany</h4> <span><?php echo $dsestaff_sanct[0]-> botany;?></span></a>');
	    
	  $("#stat8").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Zoology</h4> <span><?php echo $dsestaff_sanct[0]-> zoology;?></span></a>');
	  $("#stat9").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Statistics</h4> <span><?php echo $dsestaff_sanct[0]-> statistics;?></span></a>');
	  $("#stat10").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Geography</h4> <span><?php echo $dsestaff_sanct[0]-> geography;?></span></a>');
	  $("#stat11").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG MicroBiology</h4> <span><?php echo $dsestaff_sanct[0]-> microbiology;?></span></a>');
	  $("#stat12").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biochemistry</h4> <span><?php echo $dsestaff_sanct[0]-> biochemistry;?></span></a>');
	  $("#stat13").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Mathematics</h4> <span><?php echo $dsestaff_sanct[0]-> mathematics;?></span></a>');
	  $("#stat14").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG Homescience</h4> <span><?php echo $dsestaff_sanct[0]-> homescience;?></span></a>');
	  $("#stat15").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG History</h4> <span><?php echo $dsestaff_sanct[0]-> history;?></span></a>');
	  $("#stat16").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Economics</h4> <span><?php echo $dsestaff_sanct[0]-> economics;?></span></a>');
	  $("#stat17").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Politicalscience</h4> <span><?php echo $dsestaff_sanct[0]-> politicalscience;?></span></a>');
	  $("#stat18").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Commerce</h4> <span><?php echo $dsestaff_sanct[0]-> commerce;?></span></a>');
	  
	   //$("#stat19").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>HM(High)</h4> <span><?php echo $dsestaff_sanct[0]-> hhm;?></span></a>');
	  $("#stat20").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Science</h4> <span><?php echo $dsestaff_sanct[0]-> sc;?></span></a>');
	  $("#stat21").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> BT Maths</h4> <span><?php echo $dsestaff_sanct[0]-> mat;?></span></a>');
	  $("#stat22").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT English</h4> <span><?php echo $dsestaff_sanct[0]-> eng;?></span></a>');
	  $("#stat23").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Tamil</h4> <span><?php echo $dsestaff_sanct[0]-> tam;?></span></a>');
	  $("#stat24").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT SocialScience</h4> <span><?php echo $dsestaff_sanct[0]-> ss;?></span></a>');
      break;
	   case 'avail':
     
	     $("#stat1").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>SecondaryGrade Teacher</h4> <span><?php echo $dsestaff_avail[0]-> sg;?></span></a>');
	  $("#stat2").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Tamil</h4> <span><?php echo $dsestaff_avail[0]-> tamil;?></span></a>');
	  $("#stat3").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>PG English</h4> <span><?php echo $dsestaff_avail[0]-> english;?></span></a>');
	  $("#stat4").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Physics</h4> <span><?php echo $dsestaff_avail[0]-> physics;?></span></a>');
	  $("#stat5").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Chemistry</h4> <span><?php echo $dsestaff_avail[0]-> chemistry;?></span></a>');
	  $("#stat6").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biology</h4> <span><?php echo $dsestaff_avail[0]-> biology;?></span></a>');
	  $("#stat7").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Botany</h4> <span><?php echo $dsestaff_avail[0]-> botany;?></span></a>');
	    
	  $("#stat8").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Zoology</h4> <span><?php echo $dsestaff_avail[0]-> zoology;?></span></a>');
	  $("#stat9").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Statistics</h4> <span><?php echo $dsestaff_avail[0]-> statistics;?></span></a>');
	  $("#stat10").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Geography</h4> <span><?php echo $dsestaff_avail[0]-> geography;?></span></a>');
	  $("#stat11").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG MicroBiology</h4> <span><?php echo $dsestaff_avail[0]-> microbiology;?></span></a>');
	  $("#stat12").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biochemistry</h4> <span><?php echo $dsestaff_avail[0]-> biochemistry;?></span></a>');
	  $("#stat13").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Mathematics</h4> <span><?php echo $dsestaff_avail[0]-> mathematics;?></span></a>');
	  $("#stat14").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG Homescience</h4> <span><?php echo $dsestaff_avail[0]-> homescience;?></span></a>');
	  $("#stat15").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG History</h4> <span><?php echo $dsestaff_avail[0]-> history;?></span></a>');
	  $("#stat16").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Economics</h4> <span><?php echo $dsestaff_avail[0]-> economics;?></span></a>');
	  $("#stat17").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Politicalscience</h4> <span><?php echo $dsestaff_avail[0]-> politicalscience;?></span></a>');
	  $("#stat18").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Commerce</h4> <span><?php echo $dsestaff_avail[0]-> commerce;?></span></a>');
	  
	   //$("#stat19").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>HM(High)</h4> <span><?php echo $dsestaff_avail[0]-> hhm;?></span></a>');
	  $("#stat20").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Science</h4> <span><?php echo $dsestaff_avail[0]-> sc;?></span></a>');
	  $("#stat21").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> BT Maths</h4> <span><?php echo $dsestaff_avail[0]-> mat;?></span></a>');
	  $("#stat22").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT English</h4> <span><?php echo $dsestaff_avail[0]-> eng;?></span></a>');
	  $("#stat23").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Tamil</h4> <span><?php echo $dsestaff_avail[0]-> tam;?></span></a>');
	  $("#stat24").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT SocialScience</h4> <span><?php echo $dsestaff_avail[0]-> ss;?></span></a>');
      break;
	   case 'need':
     
	     $("#stat1").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>SecondaryGrade Teacher</h4> <span><?php echo $dsestaff_need[0]-> sg;?></span></a>');
	  $("#stat2").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Tamil</h4> <span><?php echo $dsestaff_need[0]-> tamil;?></span></a>');
	  $("#stat3").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>PG English</h4> <span><?php echo $dsestaff_need[0]-> english;?></span></a>');
	  $("#stat4").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Physics</h4> <span><?php echo $dsestaff_need[0]-> physics;?></span></a>');
	  $("#stat5").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Chemistry</h4> <span><?php echo $dsestaff_need[0]-> chemistry;?></span></a>');
	  $("#stat6").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biology</h4> <span><?php echo $dsestaff_need[0]-> biology;?></span></a>');
	  $("#stat7").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Botany</h4> <span><?php echo $dsestaff_need[0]-> botany;?></span></a>');
	    
	  $("#stat8").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Zoology</h4> <span><?php echo $dsestaff_need[0]-> zoology;?></span></a>');
	  $("#stat9").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Statistics</h4> <span><?php echo $dsestaff_need[0]-> statistics;?></span></a>');
	  $("#stat10").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Geography</h4> <span><?php echo $dsestaff_need[0]-> geography;?></span></a>');
	  $("#stat11").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG MicroBiology</h4> <span><?php echo $dsestaff_need[0]-> microbiology;?></span></a>');
	  $("#stat12").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biochemistry</h4> <span><?php echo $dsestaff_need[0]-> biochemistry;?></span></a>');
	  $("#stat13").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>PG Mathematics</h4> <span><?php echo $dsestaff_need[0]-> mathematics;?></span></a>');
	  $("#stat14").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG Homescience</h4> <span><?php echo $dsestaff_need[0]-> homescience;?></span></a>');
	  $("#stat15").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG History</h4> <span><?php echo $dsestaff_need[0]-> history;?></span></a>');
	  $("#stat16").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Economics</h4> <span><?php echo $dsestaff_need[0]-> economics;?></span></a>');
	  $("#stat17").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Politicalscience</h4> <span><?php echo $dsestaff_need[0]-> politicalscience;?></span></a>');
	  $("#stat18").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Commerce</h4> <span><?php echo $dsestaff_need[0]-> commerce;?></span></a>');
	  
	   //$("#stat19").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>HM(High)</h4> <span><?php echo $dsestaff_need[0]-> hhm;?></span></a>');
	  $("#stat20").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Science</h4> <span><?php echo $dsestaff_need[0]-> sc;?></span></a>');
	  $("#stat21").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> BT Maths</h4> <span><?php echo $dsestaff_need[0]-> mat;?></span></a>');
	  $("#stat22").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT English</h4> <span><?php echo $dsestaff_need[0]-> eng;?></span></a>');
	  $("#stat23").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Tamil</h4> <span><?php echo $dsestaff_need[0]-> tam;?></span></a>');
	  $("#stat24").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT SocialScience</h4> <span><?php echo $dsestaff_need[0]-> ss;?></span></a>');
      break;
	   case 'surpwith':
  
	      $("#stat1").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>SecondaryGrade Teacher</h4> <span><?php echo $dsestaff_surpwith[0]-> sg;?></span></a>');
	  $("#stat2").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Tamil</h4> <span><?php echo $dsestaff_surpwith[0]-> tamil;?></span></a>');
	  $("#stat3").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>PG English</h4> <span><?php echo $dsestaff_surpwith[0]-> english;?></span></a>');
	  $("#stat4").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Physics</h4> <span><?php echo $dsestaff_surpwith[0]-> physics;?></span></a>');
	  $("#stat5").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Chemistry</h4> <span><?php echo $dsestaff_surpwith[0]-> chemistry;?></span></a>');
	  $("#stat6").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biology</h4> <span><?php echo $dsestaff_surpwith[0]-> biology;?></span></a>');
	  $("#stat7").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Botany</h4> <span><?php echo $dsestaff_surpwith[0]-> botany;?></span></a>');
	    
	  $("#stat8").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Zoology</h4> <span><?php echo $dsestaff_surpwith[0]-> zoology;?></span></a>');
	  $("#stat9").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Statistics</h4> <span><?php echo $dsestaff_surpwith[0]-> statistics;?></span></a>');
	  $("#stat10").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Geography</h4> <span><?php echo $dsestaff_surpwith[0]-> geography;?></span></a>');
	  $("#stat11").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG MicroBiology</h4> <span><?php echo $dsestaff_surpwith[0]-> microbiology;?></span></a>');
	  $("#stat12").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biochemistry</h4> <span><?php echo $dsestaff_surpwith[0]-> biochemistry;?></span></a>');
	  $("#stat13").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>PG Mathematics</h4> <span><?php echo $dsestaff_surpwith[0]-> mathematics;?></span></a>');
	  $("#stat14").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG Homescience</h4> <span><?php echo $dsestaff_surpwith[0]-> homescience;?></span></a>');
	  $("#stat15").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG History</h4> <span><?php echo $dsestaff_surpwith[0]-> history;?></span></a>');
	  $("#stat16").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Economics</h4> <span><?php echo $dsestaff_surpwith[0]-> economics;?></span></a>');
	  $("#stat17").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Politicalscience</h4> <span><?php echo $dsestaff_surpwith[0]-> politicalscience;?></span></a>');
	  $("#stat18").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Commerce</h4> <span><?php echo $dsestaff_surpwith[0]-> commerce;?></span></a>');
	  
	   //$("#stat19").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>HM(High)</h4> <span><?php echo $dsestaff_surpwith[0]-> hhm;?></span></a>');
	  $("#stat20").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Science</h4> <span><?php echo $dsestaff_surpwith[0]-> sc;?></span></a>');
	  $("#stat21").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> BT Maths</h4> <span><?php echo $dsestaff_surpwith[0]-> mat;?></span></a>');
	  $("#stat22").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT English</h4> <span><?php echo $dsestaff_surpwith[0]-> eng;?></span></a>');
	  $("#stat23").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Tamil</h4> <span><?php echo $dsestaff_surpwith[0]-> tam;?></span></a>');
	  $("#stat24").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT SocialScience</h4> <span><?php echo $dsestaff_surpwith[0]-> ss;?></span></a>');
      break;
	   case 'surpwithout':
        
	      $("#stat1").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>SecondaryGrade Teacher</h4> <span><?php echo $dsestaff_surpwithout[0]-> sg;?></span></a>');
	  $("#stat2").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Tamil</h4> <span><?php echo $dsestaff_surpwithout[0]-> tamil;?></span></a>');
	  $("#stat3").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>PG English</h4> <span><?php echo $dsestaff_surpwithout[0]-> english;?></span></a>');
	  $("#stat4").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Physics</h4> <span><?php echo $dsestaff_surpwithout[0]-> physics;?></span></a>');
	  $("#stat5").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Chemistry</h4> <span><?php echo $dsestaff_surpwithout[0]-> chemistry;?></span></a>');
	  $("#stat6").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biology</h4> <span><?php echo $dsestaff_surpwithout[0]-> biology;?></span></a>');
	  $("#stat7").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Botany</h4> <span><?php echo $dsestaff_surpwithout[0]-> botany;?></span></a>');
	    
	  $("#stat8").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Zoology</h4> <span><?php echo $dsestaff_surpwithout[0]-> zoology;?></span></a>');
	  $("#stat9").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Statistics</h4> <span><?php echo $dsestaff_surpwithout[0]-> statistics;?></span></a>');
	  $("#stat10").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Geography</h4> <span><?php echo $dsestaff_surpwithout[0]-> geography;?></span></a>');
	  $("#stat11").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG MicroBiology</h4> <span><?php echo $dsestaff_surpwithout[0]-> microbiology;?></span></a>');
	  $("#stat12").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Biochemistry</h4> <span><?php echo $dsestaff_surpwithout[0]-> biochemistry;?></span></a>');
	  $("#stat13").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>PG Mathematics</h4> <span><?php echo $dsestaff_surpwithout[0]-> mathematics;?></span></a>');
	  $("#stat14").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG Homescience</h4> <span><?php echo $dsestaff_surpwithout[0]-> homescience;?></span></a>');
	  $("#stat15").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>  PG History</h4> <span><?php echo $dsestaff_surpwithout[0]-> history;?></span></a>');
	  $("#stat16").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Economics</h4> <span><?php echo $dsestaff_surpwithout[0]-> economics;?></span></a>');
	  $("#stat17").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Politicalscience</h4> <span><?php echo $dsestaff_surpwithout[0]-> politicalscience;?></span></a>');
	  $("#stat18").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> PG Commerce</h4> <span><?php echo $dsestaff_surpwithout[0]-> commerce;?></span></a>');
	  
	   //$("#stat19").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>HM(High)</h4> <span><?php echo $dsestaff_surpwithout[0]-> hhm;?></span></a>');
	  $("#stat20").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Science</h4> <span><?php echo $dsestaff_surpwithout[0]-> sc;?></span></a>');
	  $("#stat21").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4> BT Maths</h4> <span><?php echo $dsestaff_surpwithout[0]-> mat;?></span></a>');
	  $("#stat22").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT English</h4> <span><?php echo $dsestaff_surpwithout[0]-> eng;?></span></a>');
	  $("#stat23").html('<a href="<?php echo base_url().'State/#'; ?>"> <h4>BT Tamil</h4> <span><?php echo $dsestaff_surpwithout[0]-> tam;?></span></a>');
	  $("#stat24").html('<a href="<?php echo base_url().'#'; ?>"> <h4>BT SocialScience</h4> <span><?php echo $dsestaff_surpwithout[0]-> ss;?></span></a>');
      break;
  }
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