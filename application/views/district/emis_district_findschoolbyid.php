<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        



        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('district/header.php'); ?>


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
                                        <h1>Select School
                                            
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
                                
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->

                                    <div class="page-content-inner">
                                       
                                    <div class="portlet-body">

                                     <div class="col-md-12">
                                <form  method="post" action="<?php echo base_url().'district/emis_district_findschoolbyid';?>" id="emis_school_search_form" name="emis_school_search_form">
                                     <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-body">
                                         <div class="form-group">
                                            <label class="control-label col-md-6">Enter School id</label>
                                              <div class="col-md-9">
                                                <input type="text" class="form-control" id="emis_school_id" name="emis_school_id" placeholder="school ID *" required="">
                                                     <font style="color:#dd4b39;"><div id="emis_school_id_alert"><?php if(isset($error)){ ?> <?php echo $error;?> <?php } ?></div></font>
                                              </div>
                                                                                        
                                         </div>
                                         </div>
                                             <div class="form-actions">
                                                <div class="col-md-3" >
                                                    <button type="submit" id="emis_school_search_submit" name="emis_school_search_submit"  class="btn green "> View </button>
                                                </div>
                                             </div>
                                            
                                        </div>
                                       
                                        </div>
                                        </form>
                                     </div>

                                     <label style="margin-left: 3%; margin-top: 25px;">Note: If u select any school then only you can create a student</label> 

                                   </div>


                                   <?php if(isset($schoolname)){ ?> 

                                   <div class="portlet-body">
                                     <div class="col-md-12">
                                     <table id="user" class="table table-bordered table-striped">
                                        <tbody>
                                         <tr>
                                         <td>
                                         <b>School Name :</b> <?php echo $schoolname; ?>
                                         </td>
                                         <td>
                                         <b>Block name :</b> <?php echo $blockname; ?>
                                         </td>
                                         <td>
                                         <b>School Category :</b> <?php echo $schoolcate; ?>
                                         </td>
                                        </tr>
                                        <tr>
                                         <td>
                                         <b>Category :</b> <?php echo $schoolcate; ?>
                                         </td>
                                         <td>
                                         <b>Management :</b> <?php echo $schmanage; ?>
                                         </td>
                                         <td>
                                         <b>Directorate :</b> <?php echo $schdirector; ?>
                                         </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        <center>
                            <a  href="<?php echo base_url().'district/emis_district_schoolmainid/'.$schoolid;?>" class="btn green acedit" 
                                                            >Select this  School</a>  
                                        </center>
                                     </div>
                                     </div>
                                     <?php } ?>

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
   <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>

              <!--<script type="text/javascript">
                function gotosaveschoolid(){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                var Udisecode = $("#emis_school_id").val();
                $.ajax({
                type: "POST",
                url:baseurl+'district/emis_district_saveschool_id',
                data:"&emis_school_id="+Udisecode,
                success: function(resp){ 
                if(resp==true){  
                alert("true");
                window.location.href = baseurl+'district/emis_district_findschoolbyid'; 

                return true;  
                 }else{
                    alert("false");
                    return false;
                 }
                 
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  

                }
                });
               }  

              </script> -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
        <!-- END PAGE LEVEL SCRIPTS -->

             

    </body>

</html>