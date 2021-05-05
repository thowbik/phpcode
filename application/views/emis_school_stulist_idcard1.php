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
                                            <small> Section wise student list</small>
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
                                    <?php $this->load->view('emis_school_profile_header.php'); ?>
                                        </center>
           
                                        <!-- BEGIN CARDS -->
                                        
                                         <span style="font-size: 22px;">Student List Section wise </span>
                                                                         
 <?php  $school_id=$this->session->userdata('emis_school_id');
      ?>
                                          <span style="font-size: 22px;" class="pull-right">Level 2 - For Class 
                                          <?php if($class!=""){ echo $class; } ?></span>
                                                 <hr>
                                                           <div class="portlet-body">
                                                        <div class="row visible-ie8">
                                                            <div class="col-md-12">
                                                                <span class="label label-danger"> NOTE: </span> The Circle Dial plugin is not compatible with Internet Explorer 8 and older. </div>
                                                        </div>
                                                        <center>
                                                        <div class="row">
                                                        <?php $class_id=$this->uri->segment(3,0); ?>
                                                        <?php if($allsections!=""){ $a=explode(',',$allsections); 
                                                        // echo $allsections;
                                                        foreach($a as $v){?> 
                                                            <div class="col-md-4">
                                                            <a href="<?php echo base_url().'Home/emis_school_studentlist_idcard2/'.$class_id.'/'.$v;?>" style="text-decoration: none;">
                                                            <h1>Section <?php echo $v;?></h1></a>
                                                             <?php  $this->db->select('name'); 
                                                           $this->db->from('students_child_detail');
                                                           $this->db->where('class_section', $v);
                                                           $this->db->where('class_studying_id', $class_id);
                                                           $this->db->where('school_id',$school_id);
                                                            $this->db->where('transfer_flag',0);
                                                              $this->db->where('idcardstatus','Not Aprooved');   
                                                           $query =  $this->db->get();
                                                           $stu_length=count($query->result()); ?>
                                                                <input class="knob" data-angleoffset=-125 data-anglearc=250 data-fgcolor="#66EE66" value="<?php echo $stu_length;?>" disabled>
                                                             </a>    
                                                            </div>
                                                            <?php }} else {  ?><center>No data Available!..</center><?php  } ?>
                                                        </div>
                                                        </center>
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

        <script src="<?php echo base_url().'asset/global/plugins/jquery-knob/js/jquery.knob.js';?>" type="text/javascript"></script>
       <script src="<?php echo base_url().'asset/pages/scripts/components-knob-dials.min.js';?>" type="text/javascript"></script>

    </body>

</html>