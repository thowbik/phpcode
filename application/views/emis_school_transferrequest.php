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
                                        <h1>Request Came from other schools to transfer the following students
                                            
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
                                     
                                    <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                       
           
                                        <!-- BEGIN CARDS -->
                                               
                                                         
                                               <?php $section_id=$this->uri->segment(4,0); ?>
                                                  <div class="portlet light portlet-fit ">
                                           <!--  <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data</span>
                                                </div>
                                            </div> -->
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student list - Requested from other schools </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th> sno </th>                        
                                                                    <th> Unique id</th>
                                                                    <th> Admision number</th>
                                                                    <th> Name </th>                                                                    
                                                                    <th> DOB </th>
                                                                    <th> Class</th>
                                                                    
                                                                    <th> Requested School Name </th>
                                                                </tr>
                                                                </thead>
                                                                <?php $i=1; foreach($allstuds as $all){ ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                   <!--  <td><a onclick="savestudentid1('<?php echo $all->unique_id_no; ?>')"><?php echo $all->unique_id_no; ?></a></td> -->
                                                                    <td><a href="javascript:void(0);" onclick="save_transfer(<?=$all->unique_id_no?>)"><?php echo $all->unique_id_no; ?></a></td>
                                                                     <td><?php echo $all->school_admission_no; ?></td>
                                                                    <td><?php echo $all->name; ?></td>
                                                                    
                                                                    <td><?php echo $all->dob; ?></td>
                                                                    <td><?=$all->class_studying_id;?></td>
                                                                    
                                                                   <td><?=$all->school_name;?></td>
                                                                </tr>
                                                                <?php $i++; } ?>
                                                            <tbody>
                                                      
                                                            </tbody>
                                                        </table>
                                                       
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
              <script type="text/javascript">
                  var students_details = <?=json_encode($allstuds);?>;
            function save_transfer(id)
            {
                    // console.log(students_detail);
                   var students_detail = students_details.filter(stu=>stu.unique_id_no==id)[0];
                    $("#err_msg").html('');
                var trans_stu = 2;
                var label = 'Transfer Request by Parent';
                
                    swal({  
                        title: "Are you sure?",
                        text: "Do you want to Transfer To Common Pool?",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function(isConfirm){
                        if(isConfirm){
                    $("#save_trans").hide();    
                    var data = {'records':{'unique_id_no':students_detail.unique_id_no,'school_id_transfer':students_detail.school_id,'school_id_transfer':students_detail.school_id,'class_studying_id':students_detail.class_studying_id,'process_type':1,'admission_no':students_detail.school_admission_no,'medium_of_ins':students_detail.education_medium_id,'transfer_reason':trans_stu,'label':label}};
                    // data = {'records':data};
                    // console.log(data);return false;
                    $.ajax(
                    {
                        method:"POST",
                        dataType:"JSON",
                        url:'<?=base_url()."Registration/update_students_transfer"?>',
                        data:data,
                        success:function(res)
                        {
                            if(res)
                            {
                                $("#transferModal").modal('hide');
                                swal({
                                    title: "Success",
                                    text: students_detail.name+"-"+students_detail.unique_id_no+' Students Transfered To Common Pole',
                                    type: "success",
                                    
                                    confirmButtonText: "ok",
                                    
                                    // showLoaderOnConfirm: true
                                }, function(isConfirm){
                                    location.reload();
                                             });

                            }
                        }
                    })
                }
            });
                
        }
              </script>
    </body>

</html>