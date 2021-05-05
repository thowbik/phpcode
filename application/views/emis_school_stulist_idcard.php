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
            

<?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else{ ?>
<?php $this->load->view('header.php'); }?>

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
                                     <?php $this->load->view('emis_school_profile_header.php'); ?>
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
                                                         $this->load->model('Homemodel'); ?>

                                                <?php if(!empty($classlist)){ foreach ($classlist as $key){ ?>
                                                   
                                                    <div class="m-grid-col m-grid-col-middle m-grid-col-center">
                                            <a href="<?php echo base_url().'Home/emis_school_studentlist_idcard1/'.$key; ?>" style="text-decoration: none;"> 
                                              <?php 
                                                $classname =  $this->Homemodel->getstandaradnamesepe($key); ?>
                                                        <h2><?php echo $classname; ?></h2>
                                                <?php 
                                                $strength =  count($this->Homemodel->getallbrachesbyschoolinchildetail_idcard($school_id,$key)); ?>
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

        <?php $this->load->view('scripts.php'); ?>


    </body>

</html>