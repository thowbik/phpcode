<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

<?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>


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
                                        <h1>All Student list
                                            
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
                                        
                                         <span style="font-size: 22px;">Student List Section wise data </span>
                                                                         
 
                                          <span style="font-size: 22px;" class="pull-right">Level 3 - Section student data</span>
                                                 <hr>
                                                         
                                               <?php $section_id=$this->uri->segment(4,0); ?>
                                                  <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class <?php if($class!=""){ echo $class; } if($classid == 13){ echo 'LKG'; } else if($classid == 14){ echo 'UKG'; } else if($classid == 15){ echo 'PreKG'; }  ?> - Section <?php echo $section_id; ?></span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Data List </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    <?php if(!empty($allstuds)){  ?>
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th> sno </th>                        
                                                                    <th> Unique id</th>
                                                                    <th> Admision number</th>
                                                                    <th> Name </th>           
                                                                    <th> Gender </th>                                                         
                                                                    <th> DOB </th>
                                                                    <th> Class</th>
                                                                    <th> Section </th>
																	<th> Group Code </th>
                                                                    <th> Social Category </th>
                                                                    
                                                                </tr>
                                                                </thead>
                                                                <?php $i=1; foreach($allstuds as $all){ ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                   <!--  <td><a onclick="savestudentid1('<?php echo $all->unique_id_no; ?>')"><?php echo $all->unique_id_no; ?></a></td> -->
                                                                    <td><a href="<?php echo base_url().'Home/emis_student_profile/'.$all->unique_id_no;?>" target="_blank"><?php echo $all->unique_id_no; ?></a></td>
                                                                     <td><?php echo $all->school_admission_no; ?></td>
                                                                    <td><?php echo $all->name; ?></td>
                                                                    <td><?php if($all->gender==1) { echo "Male"; } else if($all->gender==2) { echo "Female"; } else if($all->gender==3) { echo "Transgender"; } ?></td>
                                                                    <td><?php echo $all->dob; ?></td>

                                                                    <?php  if($all->class_studying_id == '13')  
                                                                    {  ?> 
                                                                        <td> <?php echo 'LKG'; ?> </td>
                                                                 <?php } 
                                                                 else if($all->class_studying_id == '14') 
                                                                    {  ?> 
                                                                        <td> <?php echo 'UKG'; ?> </td>
                                                                 <?php } 
                                                                 else if($all->class_studying_id == '15') 
                                                                    {  ?> 
                                                                        <td> <?php echo 'PreKG'; ?> </td>
                                                                 <?php } 
                                                                     else
                                                                    { ?>
                                                                    <td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_class_studying');
                                                                   $this->db->where('id', $all->class_studying_id);  
                                                                   $query =  $this->db->get();
                                                                   $classs=$query->row('class_studying'); echo $classs;  ?></td>
                                                                   <?php } ?>

                                                                    <td><?php echo $all->class_section; ?></td>
																	
																	
																	<td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_group_code');
                                                                   $this->db->where('id', $all->group_code_id);
                                                                   $query =  $this->db->get();
                                                                   $group=$query->row('group_code');
                                                                   echo $group; ?></td>
																   
																	  <!--<td><?php echo $all->group_code_id; ?></td>-->
																	
                                                                     <td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_community');
                                                                   $this->db->where('id', $all->community_id);
                                                                   $query =  $this->db->get();
                                                                   $commm=$query->row('community_name');
                                                                   echo $commm; ?></td>
                                                                   <!-- <td><?php if($all->aadhaar_uid_number!=""){ echo 'XXXX-XXXX-'.substr($all->aadhaar_uid_number, -4); } ?></td> -->

                                                                </tr>
                                                                <?php $i++; } ?>
                                                            <tbody>
                                                      
                                                            </tbody>
                                                        </table>
                                                         <?php } else { ?><center>No Data Available!</center><?php } ?>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
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


        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
              <script type="text/javascript">
               function savestudentid1(value){
                var baseurl='<?php echo base_url(); ?>';
                $.ajax({
                type: "POST",
                url:baseurl+'Home/savestudentidsession',
                data:"&studid="+value,
                success: function(resp){ 
                if(resp==true){    
                window.open(baseurl+'Home/emis_student_profile1','_blank');
                 }
                 return true;  
                         
                 },
                error: function(e){ 
                return false;  

                }
                });
               }
              </script>
    </body>

</html>