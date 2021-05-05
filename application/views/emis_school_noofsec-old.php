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
                                        <h1>Profile
                                            <small>School profile edit and update</small>
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
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Class-wise No. of Sections Available in the School</span>
                                                </div>
                                            </div> 
                                            <div class="portlet-body">
                                               <div class ="row">
                                                    <div class="col-md-4">
                                                        <font style="color:#dd4b39;">
                                                            <?php echo $this->session->flashdata('errors'); ?>
                                                        </font>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--begin form -->
                                           

                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row"> 
                                                            <div class="col-md-4"> 
                                                                <a href="javascript:;" class="btn btn-sm green add-class-section"> Add Class Section details <i class="fa fa-edit"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <br>
                                                        </div>

                                                <!-- Add Model -->

                                                 
                                                <div id="myaddsectionModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Insert Class Section details</h4>
                                                  </div>

                                                  <form method="post" action="<?php echo base_url(); ?>section/emis_school_class_section_add_register">
                                                  <div class="modal-body">

                                                        
                                                            <div class="form-group">
                                                                <label class="control-label">Standard</label>
                                                                <select class="form-control" data-placeholder="Choose a Standard" tabindex="1" id="emis_add_school_class_standard" name="emis_add_school_class_standard">
                                                                
                                                                <option value="">Select Standard</option>
                                                        
                                                            </select>
                                                                <font style="color:#dd4b39;"><div id="emis_add_school_class_standard_alert"></div></font>
                                                            </div>
                                                        

                                                        
                                                            <div class="form-group">
                                                            <label class="control-label">No. of Sections</label>
                                                            <input type="text" class="form-control" id="emis_add_no_sections" name="emis_add_no_sections"  placeholder="" required  pattern="\d+">
                                                            <font style="color:#dd4b39;"><div id="emis_add_no_sections_alert"></div></font>
                                                            </div> <!-- form -group -->

                                                            <div class="form-group">
                                                            <label class="control-label">Sections Names</label>
                                                            <input type="text" class="form-control" id="emis_add_section_id" name="emis_add_section_id"  placeholder="" readonly="readonly" required>
                                                            <font style="color:#dd4b39;"><div id="emis_add_section_id_alert"></div></font>
                                                            </div> <!-- form -group -->

                                                            <div class="form-group">
                                                            <label class="control-label">Un-aided Sections Names </label>
                                                            <select multiple="multiple" class="form-control" data-placeholder="Choose a Standard" tabindex="1" id="emis_add_un_aided_section_id" name="emis_add_un_aided_section_id[]">
                                                            </select>

                                                            <font style="color:#dd4b39;"><div id="emis_add_un_aided_section_id_alert"></div></font>
                                                            </div> <!-- form -group -->


                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary green">Save changes</button>
                                                  </div>
                                                  </form>
                                                </div>

                                              </div>
                                            </div>



                                                <!-- Edit Model -->
                                                <div id="myeditsectionModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Class Section details</h4>
                                                  </div>
                                                  <form method="post" action="<?php echo base_url(); ?>section/emis_school_class_section_register">
                                                  <div class="modal-body">

                                                        
                                                            <div class="form-group">
                                                                <label class="control-label">Standard</label>
                                                                <input type="text" class="form-control" id="emis_school_class_standard" name="emis_school_class_standard"  placeholder="" readonly="readonly">
                                                                <font style="color:#dd4b39;"><div id="emis_school_class_standard_alert"></div></font>
                                                            </div>
                                                        

                                                        
                                                            <div class="form-group">
                                                            <label class="control-label">No. of Sections</label>
                                                            <input type="text" class="form-control" id="emis_no_sections" name="emis_no_sections"  placeholder=""  pattern="\d+" required>
                                                            <font style="color:#dd4b39;"><div id="emis_no_sections_alert"></div></font>
                                                            </div> <!-- form -group -->

                                                            <div class="form-group">
                                                            <label class="control-label">Sections Names</label>
                                                            <input type="text" class="form-control" id="emis_section_id" name="emis_section_id"  placeholder="" readonly="readonly" required>
                                                            <font style="color:#dd4b39;"><div id="emis_section_id_alert"></div></font>
                                                            </div> <!-- form -group -->

                                                            <div class="form-group">
                                                            <label class="control-label">Un-aided Sections Names </label>
                                                            <select multiple="multiple" class="form-control" data-placeholder="Choose a Standard" tabindex="1" id="emis_un_aided_section_id" name="emis_un_aided_section_id[]">
                                                            </select>

                                                            <font style="color:#dd4b39;"><div id="emis_un_aided_section_id_alert"></div></font>
                                                            </div> <!-- form -group -->
                                                        
                                                            <div class="form-group">
                                                            <input type='hidden' class="form-control" id='emis_class_section_id_hidden' name='emis_class_section_id_hidden' value=''>
                                                             </div>

                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary green">Save changes</button>
                                                  </div>
                                                  </form>
                                                </div>

                                              </div>
                                            </div>


                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Number of Sections Available in the School </div>
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th> Standard </th>
                                                                    <th> No. of Sections </th>
                                                                    <th> Sections Names </th>
                                                                    <th> un-Aided Section Names </th>
                                                                    <th> Edit / Update </th>
                                                                    <th> Delete </th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                                                                         
                                                               <?php foreach($details as $d) { $i=1;  ?>
                                                               <tr>
                                                                    
                                                                    <td><?php echo $d->class_id;  ?></td>
                                                                    <td><?php echo $d->sections;  ?></td>
                                                                    <td><?php echo $d->section_ids;  ?></td>
                                                                    <td><?php echo $d->un_aided_section_ids;  ?></td>
                                                                    <td><a href="javascript:;" class="btn btn-sm green edit-class-section" data-class-section-id ="<?php echo $d->id;  ?>"> Edit / Update <i class="fa fa-edit"></i></a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" 
                                                                           class="btn btn-sm red delete-class-section" 
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                             Delete <i class="fa fa-trash-o "></i>
                                                                        </a>
                                                                    </td>

                                                                    

                                                               </tr>
                                                               <?php $i++;  }  ?>
                                                      
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                         
           
                             

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




        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>

        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <script type="text/javascript">
            
            $('.delete-class-section').on('click',function(){


            var id = $(this).data("class-section-id");
            var table = $(this).parents('tr') ;
            swal({
                      title: "Are you sure?",
                      text: "You want to Delete!",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Yes, delete!",
                      cancelButtonText: "No, cancel!",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm) {
                          if (isConfirm) {

                               
                            $.ajax({
                                    type: "POST",
                                    url:baseurl+'section/deleteclassdetails',
                                    data:"&id="+id,
                                    success: function(resp){   

                                            table.remove();
                                            swal("Deleted!", "Deletion has been completed.", "success");  
                             
                                        },
                                    error: function(e){ 
                                        alert('Error: ' + e.responseText);
                                        return false;  
                    
                                        }
                                });

                    

                      } else {
                        swal("Cancelled", "Your cancelled Delete", "error");
                      }

                });

 


            });


            $('.edit-class-section').on('click',function(){

              
                
                var id = $(this).data("class-section-id");

                //$("#emis_school_class_standard").prop('disabled',true);
                $("#emis_school_class_standard").val($(this).closest('tr').find('td:nth-child(1)').text());
                $("#emis_no_sections").val($(this).closest('tr').find('td:nth-child(2)').text());

                $("#emis_section_id").val($(this).closest('tr').find('td:nth-child(3)').text());
                var all = $(this).closest('tr').find('td:nth-child(4)').text();
                var mySelect = $('#emis_un_aided_section_id');
                mySelect.empty();
                var result =  all.split(',');
                mySelect.append( $('<option></option>').val("").html("Select section names") );
                            $.each(result, function(value,group) {
                            mySelect.append(
                                $('<option></option>').val(group).html(group));
    
                                } ); 


                $("#emis_class_section_id_hidden").val(id); 

                $('#myeditsectionModal').modal('show'); 
               


            });

            $('.add-class-section').on('click',function(){

              
                $('#myaddsectionModal').modal('show'); 

                       $.ajax({
                        type: "POST",
                        url:baseurl+'section/getallstandards',
                        success: function(resp){   

                           var mySelect = $('#emis_add_school_class_standard');
                           var result = $.parseJSON(resp);
                           //alert(result);
                           mySelect.empty();
                           mySelect.append( $('<option></option>').val("").html("Select Standard") );
                            $.each(result, function(value,group) {
                            mySelect.append(
                                $('<option></option>').val(group.id).html(group.class_studying));
    
                                } );
                                return true;  
                 
                            },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            return false;  
        
                            }
                    }); 
                });
                
               $("#emis_add_no_sections").change(function(){
                    var num = $("#emis_add_no_sections").val();
                    var arr = "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,A1,B1,C1,D1,E1,F1,G1,H1,I1,J1,K1,L1,M1,N1,O1,P1,Q1,R1,S1,T1,U1,V1,W1,X1,Y1,Z1";
                   // var len = parseInt(num)*2-1 ;
                    var result_split =  arr.split(',');
                    $("#emis_add_section_id").val(result_split.slice(0,num).join(","));
                    var mySelect = $('#emis_add_un_aided_section_id');
                    mySelect.empty();
                    var result =  $("#emis_add_section_id").val().split(',');
                    mySelect.append( $('<option></option>').val("").html("Select section names") );
                            $.each(result, function(value,group) {
                            mySelect.append(
                                $('<option></option>').val(group).html(group));
    
                                } );

    
                });   
               //emis_no_sections
                $("#emis_no_sections").change(function(){
                    var num = $("#emis_no_sections").val();
                    var arr = "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,A1,B1,C1,D1,E1,F1,G1,H1,I1,J1,K1,L1,M1,N1,O1,P1,Q1,R1,S1,T1,U1,V1,W1,X1,Y1,Z1";
                   // var len = parseInt(num)*2-1 ;
                    var result_split =  arr.split(',');
                    $("#emis_section_id").val(result_split.slice(0,num).join(","));
                    var mySelect = $('#emis_un_aided_section_id');
                    mySelect.empty();
                    var result =  $("#emis_section_id").val().split(',');
                    
                    mySelect.append( $('<option></option>').val("").html("Select section names") );
                            $.each(result, function(value,group) {
                            mySelect.append(
                                $('<option></option>').val(group).html(group));
    
                                } ); 

    
                }); 
               


            


        </script>



    </body>

</html>