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

<?php $this->load->view('Ceo_District/header.php');?>
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
            <td><a href="<?php echo base_url().'Ceo_District/emis_uniform_indent';?>?schemeid=<?php echo 1?>" class="nav-link"><b>Uniforms</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_footwear_indent';?>?schemeid=<?php echo 2?>" class="nav-link"><b>Footwears<b> </a></td>
            
          </tr>
          <!--<tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_notebook_indent';?>?schemeid=<?php echo 3?>" class="nav-link"><b>Notebooks <b></a>
		    </td> -->
            
          </tr> 
		   <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td>  
			Notebooks
			</td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_bag_indent';?>?schemeid=<?php echo 5?>"  class="nav-link  "><b>Bags</b></a>
			</td>
            
          </tr> 
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_crayan_indent';?>?schemeid=<?php echo 5?>"  class="nav-link  "><b>Crayon</b></a></td>
            
          </tr>
		  
		   <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_colorpencil_indent';?>?schemeid=<?php echo 6?>" class="nav-link  "><b>Color Pencil</b></a></td>
            
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td> <a href="<?php echo base_url().'Ceo_District/emis_geomentry_indent';?>?schemeid=<?php echo 7?>" class="nav-link  "><b>Geometry Box</b></a></td>
            
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>  <a href="<?php echo base_url().'Ceo_District/emis_atlas_indent';?>?schemeid=<?php echo 8?>" class="nav-link"><b>Atlas</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td>  
			Textbooks
			</td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td> <a href="<?php echo base_url().'Ceo_District/emis_sweater_indent';?>?schemeid=<?php echo 12?>" class="nav-link"><b>Sweater</b></a></td>
            
          </tr>
		   <tr>
           <!-- <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td> Bread Winner</td>-->
            
          </tr>
		   <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
             <td> <a href="<?php echo base_url().'Ceo_District/emis_deeankleboot_indent';?>?schemeid=<?php echo 16?>" class="nav-link"><b> Ankle Boot</b></a></td>
            
          </tr>
		
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
           <td><a href="<?php echo base_url().'Ceo_District/emis_deesocks_indent';?>?schemeid=<?php echo 17?>" class="nav-link"><b>Socks</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
                <td> <a href="<?php echo base_url().'Ceo_District/emis_deeraincoat_indent';?>?schemeid=<?php echo 18?>" class="nav-link"><b>Raincoat</b></a></td>
            
          </tr>
		 
         
        </table>
      </div>
      <div class="w3-third">
        <center><h5><b>DSE Indent Summary</b></h5></center>
		<br>
        <table class="w3-table w3-striped w3-white">
         
        
        <!--  <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td> Cycle</td>
            
          </tr>
         
		    <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
                <td><a href="<?php echo base_url().'Ceo_District/deslap_indent';?>?schemeid=<?php echo 11?>" class="nav-link  "><b>Laptop</b></a></td>
            
          </tr> -->
		   <tr>
            <td><i class="fa fa-bookmark w3-text-blue "></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_desuniform_indent';?>?schemeid=<?php echo 1?>" class="nav-link  "><b>Uniforms</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_desfootwear_indent';?>?schemeid=<?php echo 2?>" class="nav-link  "><b>Footwears</td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td> Notebooks</td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_desbag_indent';?>?schemeid=<?php echo 4?>" class="nav-link  "><b>Bags</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_descrayan_indent';?>?schemeid=<?php echo 5?>" class="nav-link  "><b>Crayon</b></a></td>
            
          </tr>
		  
		   <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_descolorpencil_indent';?>?schemeid=<?php echo 6?>" class="nav-link  "><b>Color Pencil</b></a></td>
            
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_desgeomentry_indent';?>?schemeid=<?php echo 7?>" class="nav-link  "><b> Geometry Box</b></a></td>
            
          </tr>
		  <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_desatlas_indent';?>?schemeid=<?php echo 8?>" class="nav-link  "><b>Atlas</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>Textbooks</td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-red w3-large"></i></td>
            <td><a href="<?php echo base_url().'Ceo_District/emis_dessweater_indent';?>?schemeid=<?php echo 12?>" class="nav-link  "><b>Sweater</b></a></td>
            
          </tr>
		   <tr>
           <!-- <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
            <td>Bread Winner</td>-->
            
          </tr>
		   <tr>
            <td><i class="fa fa-bookmark w3-text-yellow w3-large"></i></td>
             <td><a href="<?php echo base_url().'Ceo_District/emis_dseankleboot_indent';?>?schemeid=<?php echo 16?>" class="nav-link  "><b>Ankle Boot</b></a></td>
            
          </tr>
		
          <tr>
            <td><i class="fa fa-bookmark w3-text-green w3-large"></i></td>
           <td><a href="<?php echo base_url().'Ceo_District/emis_dsesocks_indent';?>?schemeid=<?php echo 17?>" class="nav-link  "><b>Socks</b></a></td>
            
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
                <td><a href="<?php echo base_url().'Ceo_District/emis_dseraincoat_indent';?>?schemeid=<?php echo 18?>" class="nav-link  "><b>Raincoat</td>
            
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
