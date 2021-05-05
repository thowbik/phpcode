<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
		<link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
		<?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

    </head>
	<style type="text/css">
		h2 {
			font-size: 22px;
		}
	</style>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

			<?php $this->load->view('state/header.php'); ?>

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
                                        <h1>Student list
                                            <small> Class and Section wise student list</small>
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
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                    <div class="page-content-inner">
                                     <center>   
										<div class="row">
                                                        
                                               
                                            <div class="col-md-12"><br/>
                                            <i class="fa fa-bank fa-3x font-green-haze"></i>
                                                <h1 class="number font-red"> <?php if($details->school_name!=""){ echo $details->school_name; } ?> ( <?php if($details->udise_code!=""){ echo $details->udise_code; } ?> )</h1>
                                                <div class=" details">
                                                    <h3>Block : <?php if($details->block_name!=""){ echo $details->block_name; } ?> <br/></h3>
                                                </div>
                                            </div>
                                          <ul class="list-inline">
                                             <li>
                                            <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category :</font> 
                                                 <?php if($details->category!=""){ echo $details->category; } ?> </li>
                                                <li>
                                            <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management :</font>  <?php if($details->management!=""){ echo $details->management; } ?> </li>
                                                <li>
                                            <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate :</font>  <?php if($schdirector!=""){ echo $schdirector; } ?> </li>
                                            </ul><br/>
                                           
                                        </div>
                                        </center>
           
                                          <!-- BEGIN CARDS -->
                                        <span style="font-size: 22px;">Student List Class wise </span>
                                        
                                        <!-- <span style="font-size: 22px;" class="pull-right"> Overall School Strength</span> -->
                                                                
                                            <div class="m-grid m-grid-responsive-xs m-grid-demo" style="margin-top:15px; ">
												<div class="m-grid-row">
												<?php if(!empty($details)){ $i=1; $det = $details; ?>
												<div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a href="" style="text-decoration: none;"> 
                                                    <h2><a onclick="saveclassid(15)">PRE<br/>KG</a></h2>
													<p style="color: red;">strength : <?php echo $det->PREKG; ?></p>
                                                 </a>
                                                </div>  
												<div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a href="" style="text-decoration: none;"> 
                                                   <h2><a onclick="saveclassid(13)">LKG</a></h2>
													<p style="color: red;">strength : <?php echo $det->LKG; ?></p>
                                                 </a>
                                                </div>
												<div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a href="" style="text-decoration: none;"> 
                                                 <h2><a onclick="saveclassid(14)">UKG</a></h2>
													<p style="color: red;">strength : <?php echo $det->UKG; ?></p>
                                                    </a>
                                                </div>
												
                                             <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a href="" style="text-decoration: none;"> 
                                                        <h2><a onclick="saveclassid(1)">I</a></h2>
                                                <p style="color: red;">strength : <?php echo $det->class1; ?></p>
                                                    </a>
                                                    </div>  
                                                    <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a onclick="saveclassid(2)" style="text-decoration: none;"> 
                                                        <h2>II</h2>
                                                <p style="color: red;">strength : <?php echo $det->class2; ?></p>
                                                    </a>
                                                    </div>
                                                     <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a onclick="saveclassid(3)" style="text-decoration: none;"> 
                                                        <h2>III</h2>
                                                <p style="color: red;">strength : <?php echo $det->class3; ?></p>
                                                    </a>
                                                    </div>
                                                     <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a onclick="saveclassid(4)" style="text-decoration: none;"> 
                                                        <h2>IV</h2>
                                                <p style="color: red;">strength : <?php echo $det->class4; ?></p>
                                                    </a>
                                                    </div>
                                                     <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a onclick="saveclassid(5)" style="text-decoration: none;"> 
                                                        <h2>V</h2>
                                                <p style="color: red;">strength : <?php echo $det->class5; ?></p>
                                                    </a>
                                                    </div>
                                                     <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a onclick="saveclassid(6)" style="text-decoration: none;"> 
                                                        <h2>VI</h2>
                                                <p style="color: red;">strength : <?php echo $det->class6; ?></p>
                                                    </a>
                                                    </div>
                                                     <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a onclick="saveclassid(7)" style="text-decoration: none;"> 
                                                        <h2>VII</h2>
                                                <p style="color: red;">strength : <?php echo $det->class7; ?></p>
                                                    </a>
                                                    </div>
                                                     <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a onclick="saveclassid(8)" style="text-decoration: none;"> 
                                                        <h2>VIII</h2>
                                                <p style="color: red;">strength : <?php echo $det->class8; ?></p>
                                                    </a>
                                                    </div>
                                                     <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a onclick="saveclassid(19)" style="text-decoration: none;"> 
                                                        <h2>IX</h2>
                                                <p style="color: red;">strength : <?php echo $det->class9; ?></p>
                                                    </a>
                                                    </div>
                                                     <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a onclick="saveclassid(10)" style="text-decoration: none;"> 
                                                        <h2>X</h2>
                                                <p style="color: red;">strength : <?php echo $det->class10; ?></p>
                                                    </a>
                                                    </div>
                                                     <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a onclick="saveclassid(11)" style="text-decoration: none;"> 
                                                        <h2>XI</h2>
                                                <p style="color: red;">strength : <?php echo $det->class11; ?></p>
                                                    </a>
                                                    </div>
                                                     <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                                 <a onclick="saveclassid(12)" style="text-decoration: none;"> 
                                                        <h2>XII</h2>
                                                <p style="color: red;">strength : <?php echo $det->class12; ?></p>
                                                    </a>
                                                    </div>
                                                </div> 
												<?php } ?>
                                            </div>

                                            <br/>

                                        <!-- END CARDS -->

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
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>

         <script type="text/javascript">
               function saveclassid(value){
                var baseurl='<?php echo base_url(); ?>';
                
                $.ajax({
                type: "POST",
                url:baseurl+'State/saveclassidsession',
                data:"&class_id="+value,
                success: function(resp){ 
                if(resp==true){    
                    
                //window.location.href = baseurl+'State/emis_student_classwise_students'; 
                 }
                 return true;  
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  

                }
                });
               }
              </script>


    </body>

</html>