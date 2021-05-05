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
                                        <h1>Overall Analytics
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
       <?php $this->load->view('state/emis_state_profile_header.php'); ?>
                                        </center>
           
                                        <!-- BEGIN CARDS -->
                                        <span style="font-size: 22px;">Overall Analytics district wise </span>
                                        
                                       <!--  <span style="font-size: 22px;" class="pull-right">Level 2 - Overall School Strength</span> -->

                                              <div class=" col-md-12">
                                            <div class="row"><br/>
                                        <?php foreach($details as $res){   ?>
                                            <div class=" col-md-3 thumbnail" >
                                          <center> 
                                                <h4 style="color:#515151;"><a onclick="saveblockoverall('<?php echo $res->id;  ?>')"><?php echo $res->district_name  ?>
                                                    
                                                </a></h4>
                                                <h1 style="color:#d865bc;"><?php echo $res->total  ?></h1>
                                                    

                                                    </center>
                                                 </div> 
                                                   <?php } ?>  
                                                  

                                                   </div> 
                                                    
                                                     
                                                </div>                  
                                          

                                            <br>

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
               function saveblockoverall(value){
                var baseurl='<?php echo base_url(); ?>';
                $.ajax({
                type: "POST",
                url:baseurl+'State/saveblockoverallsession',
                data:"&district="+value,
                success: function(resp){ 
                if(resp==true){    
                window.location.href = baseurl+'State/emis_state_analytics_blocks'; 
                 }
                 return true;  
                   // return false;      
                 },
                error: function(e){ 
                // alert('Error: ' + e.responseText);
                return false;  

                }
                });
               }
              </script>


    </body>

</html>