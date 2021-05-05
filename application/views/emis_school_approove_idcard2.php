<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
      <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
    <?php $this->load->view('head.php'); ?>
       
        

        <style type="text/css">
           .circular--portrait {
              float:left;
              position: relative;
              width: 100px;
              height: 100px;
              overflow: hidden;
              border-radius: 50%;
            }

            .circular--portrait img {
              width: 100%;
              height: auto;
            }

        </style>
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
                                        <h1>Approoved Student list
                                            
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
                                        
                                         <span style="font-size: 22px;">Approoved Student List Section wise data </span>
                                                                         
 
                                          <span style="font-size: 22px;" class="pull-right">Level 3 - Section student data</span>
                                                 <hr>
                                                         
                                               <?php $section_id=$this->uri->segment(4,0); ?>
                                                  <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class <?php if($class!=""){ echo $class; } ?> - Section <?php echo $section_id; ?></span>
                                                
                                                </div>
                                                <div class="pull-right">
                                                     <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_stu_idcard_view" name="emis_stu_idcard_view" onchange="selectviewdrop(this.value)">
                                                              <option value="" style="color:#bfbfbf;">Show</option> 
                                                             <option value="10">10</option>
                                                             <option value="20">20</option>
                                                             <option value="50">50</option>
                                                             <option value="<?php echo $allstudscount; ?>">All</option>
                                                             </select>
                                                         </div>
                                            </div>
                                            <div class="portlet-body">

                                                        <?php if(!empty($allstuds)){  ?>
                                                          <?php foreach($allstuds as $all){ ?>


                                <?php $photo=""; if($this->Homemodel->getidcardupdatestudent($all->unique_id_no)){
                                        $stuprofile2  = $this->Homemodel->getstuprofileimages($all->unique_id_no); 
                                          $photo =  $stuprofile2[0]->photo;
                                           
                                      }  ?>
                                                       
                                                        <div class="timeline">
                                                            <!-- TIMELINE ITEM -->
                                                            <div class="timeline-item">
                                                                <div class="circular--portrait">

                                                            <?php  if($photo!=""){ ?>
                                                                <img  src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $photo ); ?>";  alt="" />
                                                                <?php }else{?> 
                                                                 <img  src="<?php echo base_url().'asset/images/avatar1.png';?>";  alt="" /> <?php } ?>
                                                                    </div>
                                                                <div class="timeline-body">
                                                                    <div class="timeline-body-arrow"> </div>
                                                                    <div class="timeline-body-head">
                                                                        <div class="timeline-body-head-caption">
                                                                            <a href="javascript:;" class="timeline-body-title font-blue-madison"><?php echo $all->name.' - '.$all->unique_id_no; ?></a>

                                                                  </div>
                                                              <div class="timeline-body-head-actions">
                                                                  <div class="btn-group">
                                                                      <a class="btn btn-circle green btn-md dropdown-toggle" href="<?php echo base_url().'Home/emis_school_stulist_idcard_edit/'.$all->unique_id_no;?>">Edit </a>
                                                                  </div>

                                                          <div class="btn-group">
                                                          
                                                            <?php if($all->idapproove=="1"){ ?>
                                                          <button type="button" data-target="#long" data-toggle="modal" class="btn btn-circle green" onclick="uper('<?php echo $all->unique_id_no; ?>')"> ID Approoved</button>
                                                          <?php }else{ ?>
                                                           <button type="button" data-target="#long" data-toggle="modal"   class="btn btn-circle red " onclick="uper('<?php echo $all->unique_id_no; ?>')"> ID Approove</button>
                                                          <?php } ?>
                                                         </div>

                                                       
                                                                                  
                                                          </div>
                                                      </div>
                                                                    <div class="timeline-body-content">
                                                                         <ul class="list-inline">
                                                                            <li>
                                                                                <i class="fa fa-star"></i> Aadhaar : <?php echo $all->aadhaar_uid_number; ?></li>
                                                                            <li>
                                                                                <i class="fa fa-calendar"></i> DOB : <?php echo $all->dob; ?> </li>
                                                                            <li>
                                                                                <i class="fa fa-male"></i> Gender : <?php if($all->gender==1){ echo "Male"; }else if($all->gender==2){ echo "Female"; }else if($all->gender==3){ echo "Transgender"; } ?> </li>
                                                                            <li>
                                                                                <i class="fa fa-user"></i> <?php if($all->father_name!=""){ echo "Father name :".$all->father_name; }elseif ($all->mother_name!="") {
                                                                                    echo "Mother name :".$all->mother_name;
                                                                                }elseif ($all->guardian_name!="") {
                                                                                    echo "Guardian name :".$all->guardian_name;
                                                                                } ?> </li>
                                                                            <li>
                                                                                <i class="fa fa-newspaper-o"></i> Class - section : <?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_class_studying');
                                                                   $this->db->where('id', $all->class_studying_id);  
                                                                   $query =  $this->db->get();
                                                                   $classs=$query->row('class_studying'); 
                                                                   echo $classs.' - '.$all->class_section;  ?> </li>
                                                                        </ul>
                                                                        <ul class="list-inline">
                                                                            <li>
                                                                                <i class="fa fa-tint"></i> Blood group : 
                                                <?php if($all->bloodgroup!="" || $all->bloodgroup!=0){ $bloodgrup = $this->Homemodel->getspecbloodgroup($all->bloodgroup);
                                                       echo $bloodgrup; }else { echo "null";} ?></li>
                                                                            <li>
                                                                                <i class="fa fa-map-marker"></i> Address : <?php echo $all->house_address.','.$all->street_name.','.$all->area_village.','.$all->pin_code; ?></li>
                                                                        </ul>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php } } ?>

 
                                                       
                                                        
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        </div>   

                                    


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

 <div id="long" class="modal fade bs-modal" tabindex="-1" data-replace="true" >
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-body">

                                                       <div class="col-md-12 thumbnail" id="pdfload1">
                                                       <?php $this->load->view('emis_school_idcard_modal'); ?>

                                                         </div>
                                                    <div class="modal-footer">
                                                         
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                

        

    </body>
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

              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
         <script type="text/javascript" src="//cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js">
    </script>
    <script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"> </script>
              
              <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

              <script type="text/javascript">
  

function aproovedataall(studid){


     $.ajax({
        type: "POST",
        url:baseurl+'Home/getidcardidaproove',
        data:"&studentid="+studid,
        success: function(resp){  
        // alert(resp);   
        if(resp==1){
            
         location.reload(true); 
                    
        }
         
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });


}




function selectviewdrop(value){

 $.ajax({
        type: "POST",
        url:baseurl+'Home/emis_saveviewlimitsession',
        data:"&limit="+value,
        success: function(resp){  
        // alert(resp);   
         location.reload(true);

        },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
}


        function uper(val){

          // alert(val);

           <?php $this->session->unset_userdata('emis_idcard_generate_stuid'); ?>

          $.ajax({
        type: "POST",
        url:baseurl+'Home/emis_savegenerateidcardsession',
        data:"&studid="+val,
        success: function(resp){  
        // alert(resp);   
         $("#pdfload1").load(location.href + " #pdfload1");

        },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
        }
    </script>


</html>