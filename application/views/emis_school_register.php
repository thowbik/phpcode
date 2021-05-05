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
   
<?php $userlogin=$this->session->userdata('emis_user_type_id'); 	?>            
<?php if($this->session->userdata('emis_user_type_id') == 3 ) 	
{?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->


<!-- Sidebar/menu -->

<!-- Overlay effect when opening sidebar on small screens -->
<!--<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>-->


  <!-- Header -->
  <!--<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-registered"></i>Registerd</b></h5>
  </header>-->

 <!-- <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Messages</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Views</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Shares</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>-->

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <center><h5><b>Student Registers</b></h5></center>
		<br>
         <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue "></i></td>
            <td><a href="<?php echo base_url().'Home/get_student_scheme_list_nmms';?>?formid=<?php echo 1?>" class="nav-link"> 
                                                        <b>NMMS Scheme</b>
                                                     </a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/get_student_scheme_list_trstse';?>?formid=<?php echo 2?>" class="nav-link"> 
                                                        <b>TRSTSE Scholarship Scheme<b>
                                                     </a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/get_student_scheme_list_inspire';?>?formid=<?php echo 3?>" class="nav-link"> 
                                                        <b>Inspire Award Details</b>
                                                     </a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/get_student_scheme_list_sports';?>?formid=<?php echo 4?>" class="nav-link"> 
                                                        <b>Students Sports Participation</b>
                                                     </a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/get_students_wise_report';?>" class="nav-link  "><b>Students Attendance Register</b></a></td>
            
          </tr>
		  
		   <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/stud_community_report';?>" class="nav-link  "><b>Students Community Details</b></a></td>
            
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td> <a href="<?php echo base_url().'Home/emis_student_disablity_list';?>" class="nav-link  "><b>CWSN-Student Register</b></a></td>
            
          </tr>
		   <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>  <a href="<?php echo base_url().'Home/get_benefit_students_list';?>" class="nav-link"><b>CWSN-Student Benefits Register</b></a></td>
            
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>  <a href="<?php echo base_url().'Home/get_RTI_students_list';?>" class="nav-link"><b>RTE Student Register</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>  <a href="<?php echo base_url().'Home/students_osc';?>" class="nav-link"><b>Out Of School Children Register</b></a></td>
            
          </tr>

            <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/stud_religion_report';?>" class="nav-link  "><b>Student Religion Details</b></a></td>
            
          </tr>
      <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td> <a href="<?php echo base_url().'Home/stud_voc_nsqf_report';?>" class="nav-link  "><b>Vocational Student Under NSQF</b></a></td>
            
          </tr>
       <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>  <a href="<?php echo base_url().'Home/stud_cwsn_report';?>" class="nav-link"><b>Facilities provided to CWSN</b></a></td>
            
          </tr>
      <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>  <a href="<?php echo base_url().'Home/stud_BPL_report';?>" class="nav-link"><b>Students under Below Poverty Line</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>  <a href="<?php echo base_url().'Home/stud_aadhar_report';?>" class="nav-link"><b>Students having Aadhar</b></a></td>
            
          </tr>
           <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>  <a href="<?php echo base_url().'Home/get_report_age';?>" class="nav-link"><b>Students Report-By Age</b></a></td>
            
          </tr>
       
		  
         <!-- <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td>Subject Teacher Evaluation Register </td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td>CCE Register for All Subjects</td>
            
          </tr>
		   <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td>Student Medical Check Up Register</td>
            
          </tr>
		   <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td>Co-Scholastic Assessment Register</td>
            
          </tr>
		<!--  <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>RTE Act, 2009 25% Reservation Register</td>
            
          </tr> -->
       <!--   <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td>Minority Scholarship Disbursement Details</td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td>BC / MBC Student Scholarship Disbursement Details</td>
            
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>SC / ST Student Scholarship Disbursement Details</td>
            
          </tr>-->
         
        </table>
      </div>
      <div class="w3-third">
        <center><h5><b>Schemes Registers</b></h5></center>
		<br>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/ptmgr_noon_meal_program';?>" 
            class="nav-link"><b>PTMGR Nutritious Meal Programme Beneficiaries</b></a> </td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
			<td>  <a href="<?php echo base_url().'Home/emis_school_textbooks_Distribution_details';?>" 
            class="nav-link"><b>Cost Free Textbooks Distribution Details</b></a></td>
           
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_school_notebooks_Distribution_details';?>" 
            class="nav-link"><b>Cost Free Notebooks Distribution Details</b></a></td>
           
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td>
			 <a href="<?php echo base_url().'Home/emis_school_bags_Distribution_details';?>" 
            class="nav-link"><b>
			Cost Free Bags Distribution Details</b></a> </td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td>
			<a href="<?php echo base_url().'Home/emis_school_uniforms_Distribution_details';?>" 
            class="nav-link"><b>
			Cost Free Uniforms Distribution Details</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td>
		 <a href="<?php echo base_url().'Home/emis_school_footwear_Distribution_details';?>" 
            class="nav-link"><b>
			
			Cost Free Footwear Distribution Details</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>
			<a href="<?php echo base_url().'Home/emis_school_buspass_Distribution_details';?>" 
            class="nav-link"><b>Cost Free Bus Pass Distribution Details</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_school_ColourPencil_Distribution_details';?>" 
            class="nav-link"><b>Cost Free Colour Pencil Distribution Details</b></a></td>
          
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_school_GeometryBox_Distribution_details';?>" 
            class="nav-link"><b>Cost Free Geometry Box Distribution Details</b></a></td>
            
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td>
			<a href="<?php echo base_url().'Home/emis_school_Atlas_Distribution_details';?>" 
            class="nav-link"><b>Cost Free Atlas Distribution Details</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td>
			<a href="<?php echo base_url().'Home/emis_school_Sweater_Distribution_details';?>" 
            class="nav-link"><b>Cost Free Cut-Sweater Distribution Details</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_school_Raincoat_Distribution_details';?>" 
            class="nav-link"><b>Cost Free Raincoat Distribution Details</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_school_boot_Distribution_details';?>" 
            class="nav-link"><b>
			Cost Free Boot Distribution Details</b></a></td>
            
          </tr>
          <tr> 
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_school_Socks_Distribution_details';?>" 
            class="nav-link"><b>
			Cost Free Socks Distribution Details</b></a></td>
          
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_school_Laptops_Distribution11_details';?>" 
            class="nav-link"><b>
			Cost Free Laptops Distribution 11-Std Details</b></a></td>
            
          </tr>
		   <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_school_Laptops_Distribution12_details';?>" 
            class="nav-link"><b>
			Cost Free Laptops Distribution 12-Std Details</b></a></td>
            
          </tr>
		   <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_school_Laptops_Previous_Year_Distribution12_details';?>" 
            class="nav-link"><b>
			Cost Free Laptops Distribution Previous Year 12-Std Details</b></a></td>
            
          </tr>
        </table>
      </div>
	   <div class="w3-third">
       <center><h5><b>Teacher And School Registers</b></h5></center>
	   <br>
        <table class="w3-table w3-striped w3-white">
		 <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><b><a href="<?=base_url().'Udise_staff/emis_staff_attendance_monthly_schoolwise'?>" >Staff Attendance Register</a></b></td>
           
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><b><a href="<?=base_url().'Udise_staff/staff_training_dtls'?>" >Staff Training Details</a></b></td>
          </tr>
        <!--  <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>Teachers Attendance Register</td>
           
          </tr> -->
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td>Consolidated Abstract of Teacher Attendance </td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td>Casual and R.H Leave Register</td>
           
          </tr>
		   <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td>Medical Leave Register</td>
           
          </tr>
		   <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td>Earned Leave Register</td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td>Un-earned Leave on Private Affairs Register</td>
           
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>Register of Admission and Withdrawal</td>
           
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td>Stock Register </td>
           
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td>Swachh Bharat Award Register</td>
           
          </tr>
         
        </table>
      </div>
    </div>
  </div>
  <hr>
 
</div>
 <?php $this->load->view('footer.php'); ?>
        

        <?php $this->load->view('scripts.php'); ?>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
