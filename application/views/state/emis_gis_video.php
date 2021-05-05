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
            

    <?php  if($this->session->userdata('emis_user_type_id') == 5) {
        $this->load->view('state/header.php');
       }elseif($this->session->userdata('emis_user_type_id') == 19){
            $this->load->view('DC/header.php');
       }elseif($this->session->userdata('emis_user_type_id') == 3){
            $this->load->view('district/header.php');
       }elseif($this->session->userdata('emis_user_type_id') == 10){
            $this->load->view('Deo_District/header.php');
       } elseif($this->session->userdata('emis_user_type_id') == 9){
            $this->load->view('Ceo_District/header.php');
       } elseif($this->session->userdata('emis_user_type_id') == 2){
            $this->load->view('block/header.php');
       } elseif($this->session->userdata('emis_user_type_id') == 6){
            $this->load->view('Beo_block/header.php');
       }  ?>

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
                                        <h1>GIS Helping Videos
                                            <small></small>
                                        </h1>
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
<div class="page-content">
                                <div>
                            
                                <br/>
                                   <?php 
   $keyname[0] = '01_How_to_login.mp4';
   $keyname[1] = '02_Schools.mp4';
   $keyname[2] = '03_AOI.mp4';
   $keyname[3] = '04_Administrative_layers.mp4';
   $keyname[4] = '05_Buffer_tool.mp4';
   $keyname[5] = '06_hubline_tool.mp4';
   $keyname[6] = '07_Specific_habitation_Rural.mp4';
   $keyname[7] = '08_Specific_habitation_Urban_specific.mp4';
   $keyname[8] = '09_arbitrary_final.mp4';
   $keyname[9] = '10_arbitrary_habitation.mp4';
   $keyname[10] ='11_Manual_mapping.mp4';
   $keyname[11] ='12_Served_habitations.mp4';
         
   // print_r($img_path);
  
  print_r($video);

   

    ?>
<div class="container text-center">
 <?php
  for($i=0;$i<count($keyname);$i++){
?>
<div class="row" style="
    border: solid;
    border-color: #33baa5;
"> 
<h3><strong><?php echo $keyname[$i];?></strong></h3>
 <video width="800" height="500" controls>
  <source src="<?php echo(Common::get_url('gisvideos',$keyname[$i],'+5 minutes',VIDEOS_KEY,VIDEOS_SECRET)); ?>" type="video/mp4">
</video>
</div>
<br/>
<?php
  }
 ?>                                
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
</div>
</div>
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
  
	  $("#stat1").html('<a href="<?php echo base_url().'Ceo_District/emis_sgstaff_surpwithpost'; ?>"> <h4>SecondaryGrade Teacher</h4> <span><?php echo $surplus_sub[0]-> sg;?></span></a>');
	  $("#stat2").html('<a href="<?php echo base_url().'Ceo_District/emis_sciencestaff_surpwithpost'; ?>"> <h4>Science</h4> <span><?php echo $surplus_sub[0]-> sci;?></span></a>');
	  $("#stat3").html('<a href="<?php echo base_url().'Ceo_District/emis_mathstaff_surpwithpost'; ?>"> <h4>Maths</h4> <span><?php echo $surplus_sub[0]-> mat;?></span></a>');
	  $("#stat4").html('<a href="<?php echo base_url().'Ceo_District/emis_englishstaff_surpwithpost'; ?>"> <h4>English</h4> <span><?php echo $surplus_sub[0]-> eng;?></span></a>');
	  $("#stat5").html('<a href="<?php echo base_url().'Ceo_District/emis_tamilstaff_surpwithpost'; ?>"> <h4>Tamil</h4> <span><?php echo $surplus_sub[0]-> tam;?></span></a>');
	  $("#stat6").html('<a href="<?php echo base_url().'Ceo_District/emis_socialsciencestaff_surpwithpost'; ?>"> <h4>SocialScience</h4> <span><?php echo $surplus_sub[0]-> soc;?></span></a>');
	 

	  
	  $("#stat7").html('<a href="<?php echo base_url().'Ceo_District/emis_primaryhmstaff_surpwithpost'; ?>"> <h4>Primary HM</h4> <span><?php echo $surplus_sub[0]->phm ;?></span></a>');
	  $("#stat8").html('<a href="<?php echo base_url().'Ceo_District/emis_middlehmstaff_surpwithpost'; ?>"> <h4>Middle HM</h4> <span><?php echo $surplus_sub[0]->mhm ;?></span></a>');
	  $("#stat9").html('<a href="<?php echo base_url().'Ceo_District/emis_highhmstaff_surpwithpost'; ?>"> <h4>High HM</h4> <span><?php echo $surplus_sub[0]->hhm ;?></span></a>');
	  $("#stat10").html('<a href="<?php echo base_url().'Ceo_District/emis_telgustaff_surpwithpost'; ?>"> <h4>Telugu</h4> <span><?php echo $surplus_sub[0]->telu ;?></span></a>');
	  $("#stat11").html('<a href="<?php echo base_url().'Ceo_District/emis_kannadastaff_surpwithpost'; ?>"> <h4>Kannada</h4> <span><?php echo $surplus_sub[0]->kann ;?></span></a>');
	  $("#stat12").html('<a href="<?php echo base_url().'Ceo_District/emis_urdustaff_surpwithpost'; ?>"> <h4>Urdu</h4> <span><?php echo $surplus_sub[0]->urdu ;?></span></a>');
	  $("#stat13").html('<a href="<?php echo base_url().'Ceo_District/emis_malayalamstaff_surpwithpost'; ?>"> <h4>Malayalam</h4> <span><?php echo $surplus_sub[0]->mala ;?></span></a>');
  
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