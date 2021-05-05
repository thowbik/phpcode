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



  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <center><h5><b>DEE Indent Summary</b></h5></center>
		<br>
         <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-bookmark w3-text-red "></i></td>
            <td><a href="<?php echo base_url().'Home/emis_uniform_indent';?>?schemeid=<?php echo 1?>" class="nav-link"> 
                                                        <b>Uniforms</b>
                                                     </a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_footwear_indent';?>?schemeid=<?php echo 2?>" class="nav-link"> 
                                                        <b>Footwears<b>
                                                     </a></td>
            
          </tr>
           <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td>
			 Notebooks 
		    </td>
            
          </tr>
        
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_bag_indent';?>?schemeid=<?php echo 4?>" class="nav-link"> 
                                                        <b>Bags</b>
                                                     </a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_crayan_indent';?>?schemeid=<?php echo 5?>"  class="nav-link  "><b>Crayon</b></a></td>
            
          </tr>
		  
		   <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_colorpencil_indent';?>?schemeid=<?php echo 6?>" class="nav-link  "><b>Color Pencil</b></a></td>
            
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td> <a href="<?php echo base_url().'Home/emis_geomentry_indent';?>?schemeid=<?php echo 7?>" class="nav-link  "><b>Geometry Box</b></a></td>
            
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>  <a href="<?php echo base_url().'Home/emis_atlas_indent';?>?schemeid=<?php echo 8?>" class="nav-link"><b>Atlas</b></a></td>
            
          </tr>
        
         
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td>  
			Textbooks
			</td>
            
          </tr>
         
		   <!--<tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td> Bread Winner</td>
            
          </tr> -->
		   <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td>  <a href="<?php echo base_url().'Home/emis_Sweater_indent';?>?schemeid=<?php echo 12?>" class="nav-link"><b>Sweater</b></a></td>
            
           </tr> 
		   <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
             <td><a href="<?php echo base_url().'Home/emis_deeankleboot_indent';?>?schemeid=<?php echo 16?>" class="nav-link"><b>Ankle Boot</b></a></td>
            
          </tr>
		
          <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
           <td><a href="<?php echo base_url().'Home/emis_deesocks_indent';?>?schemeid=<?php echo 17?>" class="nav-link"><b>Socks</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
               <td><a href="<?php echo base_url().'Home/emis_deeraincoat_indent';?>?schemeid=<?php echo 18?>" class="nav-link"><b> Raincoat</b></a></td>
            
          </tr>
		 
         
        </table>
      </div>
      <div class="w3-third">
        <center><h5><b>DSE Indent Summary</b></h5></center>
		<br>
        <table class="w3-table w3-striped w3-white">
         
		   <tr>
            <td><i class="fa fa-bookmark w3-text-red"></i></td>
            <td>Uniforms</td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td>Footwears</td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td> Notebooks</td>
            
          </tr>
      
		  
		    <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_dsebag_indent';?>?schemeid=<?php echo 4?>" class="nav-link"> 
                                                        <b>Bags</b>
                                                     </a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_dsecrayan_indent';?>?schemeid=<?php echo 5?>"  class="nav-link  "><b>Crayon</b></a></td>
            
          </tr>
		  
		    <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_dsecolorpencil_indent';?>?schemeid=<?php echo 6?>" class="nav-link  "><b>Color Pencil</b></a></td>
            
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_dsegeomentry_indent';?>?schemeid=<?php echo 7?>" class="nav-link  "><b>Geometry Box</b></a></td>
            
          </tr>
		  <tr>
          <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><a href="<?php echo base_url().'Home/emis_dseatlas_indent';?>?schemeid=<?php echo 8?>" class="nav-link"><b>Atlas</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td>Textbooks</td>
            
          </tr>
          <tr>
         <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td>  <a href="<?php echo base_url().'Home/emis_dseSweater_indent';?>?schemeid=<?php echo 12?>" class="nav-link"><b>Sweater</b></a></td>
            
          </tr>
		 <!--<tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td> Bread Winner</td>
            
          </tr> -->
		   <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
             <td><a href="<?php echo base_url().'Home/emis_dseankleboot_indent';?>?schemeid=<?php echo 16?>" class="nav-link"><b>Ankle Boot</td>
            
          </tr>
		
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
           <td><a href="<?php echo base_url().'Home/emis_dsesocks_indent';?>?schemeid=<?php echo 17?>" class="nav-link"><b>Socks</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
                <td><a href="<?php echo base_url().'Home/emis_dseraincoat_indent';?>?schemeid=<?php echo 18?>" class="nav-link"><b> Raincoat</b></a></td>
            
          </tr>
		  
		  <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td> Cycle</td>
            
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
