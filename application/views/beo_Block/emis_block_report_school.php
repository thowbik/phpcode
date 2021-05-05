<!DOCTYPE html>
<html lang="en">


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
            

<?php $this->load->view('block/header.php'); ?>

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
                                        <h1>Smart Card Report
                                            <small> Class wise student list</small>
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
                          
                         <?php  $school_id=$this->session->userdata('emis_school_id'); ?>

                         <?php $classlist=array();
                                for($i=$lowclass; $i<=$highclass; $i++){ array_push($classlist, $i); } ?>
                                    <div class="page-content-inner">
                                     <center>   
                                    <div class="row">
                                                        
                                               
                                            <div class="col-md-12"><br/>
                                            <i class="fa fa-bank fa-3x font-green-haze"></i>
                                                <h1 class="number font-red"> <?php if($schoolname!=""){ echo $schoolname; } ?> ( <?php if($udise_code!=""){ echo $udise_code; } ?> )</h1>
                                                <div class=" details">
                                                    <h3>Block : <?php if($blockname!=""){ echo $blockname; } ?> <br/></h3>
                                                </div>
                                            </div>
                                          <ul class="list-inline">
                                             <li>
                                            <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category :</font> 
                                                 <?php if($schoolcate!=""){ echo $schoolcate; } ?> </li>
                                                <li>
                                            <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management :</font>  <?php if($schmanage!=""){ echo $schmanage; } ?> </li>
                                                <li>
                                            <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate :</font>  <?php if($schdirector!=""){ echo $schdirector; } ?> </li>
                                            </ul><br/>
                                           
                                        </div>
                                        </center>

                                       <!---<?php $classes=array();
                                        if(!empty($allclass)){ foreach($allclass as $det){ 
                                          
                                        if($det->total!=0){ array_push($classes, $det->total); } 
                                        if($det->class2!=0){array_push($classes, $det->class2); }
                                        if($det->class3!=0){ array_push($classes, $det->class3); }
                                        if($det->class4!=0){  array_push($classes, $det->class4); }
                                        if($det->class5!=0){ array_push($classes, $det->class5);  } 
                                        if($det->class6!=0){ array_push($classes, $det->class6); }
                                        if($det->class7!=0){ array_push($classes, $det->class7); } 
                                        if($det->class8!=0){array_push($classes, $det->class8); }
                                        if($det->class9!=0){ array_push($classes, $det->class9); } 
                                        if($det->class10!=0){ array_push($classes, $det->class10); }
                                        if($det->class11!=0){ array_push($classes, $det->class11); } 
                                        if($det->class12!=0){ array_push($classes, $det->class12); }
                                         } }?>

                                         !-->

                                        <!-- BEGIN CARDS -->
                                        <span style="font-size: 22px;">Student List Class wise </span>
                                        
                                        <span style="font-size: 22px;" class="pull-right">Level 1 - Overall School Strength - <?php echo $overallstrength; ?></span>

                                      <div class="m-grid m-grid-responsive-xs m-grid-demo" style="margin-top:15px; ">
                                            <div class="m-grid-row">
                                            
<!-- 
                                             <?php $i=0; $k=1; if(!empty($standardlist)){ foreach($standardlist as $std){  
                                                $j=$lowclass+$k;?>    
                                             <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                            <a href="<?php echo base_url().'Home/emis_school_studentsectionwise/'.$j; ?>" style="text-decoration: none;"> 
                                                        <h2><?php echo $std->class_studying; ?></h2>
                                                 <p style="color: red;">strength : <?php echo $classes[$i]; ?></p> 
                                                <?php   $this->load->database(); 
                                                         $this->load->model('Homemodel');
                                                $strength =  count($this->Homemodel->getallbrachesbyschoolinchildetail($school_id,$j)); ?>
                                                <p style="color: red;">strength : <?php echo $strength; ?></p>
                                                    </a>
                                                    </div>  
                                                    <?php $i++; $k++; }} ?> -->

                                                      <?php   $this->load->database(); 
                                                         $this->load->model('Statemodel'); 
                                                          $school_id =$this->session->userdata('emis_stateschool_id'); ?>

                                                          

                                                <?php if(!empty($classlist)){ foreach ($classlist as $key){ ?>
                                                   
                                                    <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                            <a onclick="saveclassid('<?php echo $key; ?>')"  style="text-decoration: none;"> 
                                              <?php 
                                                $classname =  $this->Statemodel->getstandaradnamesepe($key); ?>
                                                        <h2><?php echo $classname; ?></h2>
                                                <?php 
                                                $strength =  count($this->Statemodel->getclasschildcout($school_id,$key)); ?>
                                                <p style="color: red;">strength : <?php echo $strength; ?></p>
                                                    </a>
                                                    </div> 
                                                    <?php } } ?>
                                                
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
 <script type="text/javascript">
               function saveclassid(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'Block/saveclassidsession',
                data:"&class_id="+value,
                success: function(resp){ 
                if(resp==true){    
                window.location.href = baseurl+'Block/emis_student_classwise_report'; 
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

        <?php $this->load->view('scripts.php'); ?>


    </body>

</html>