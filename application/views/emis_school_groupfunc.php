<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
  
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />

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
                                         

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mt-checkbox-inline">
                                                    <!-- <label class="mt-checkbox mt-checkbox-outline">
                                                        <input type="checkbox" id="autoopen">&nbsp;Auto-open next field
                                                        <span></span>
                                                    </label> -->
                                                   <!--  <label class="mt-checkbox mt-checkbox-outline">
                                                        <input type="checkbox" id="inline">&nbsp;Inline editing
                                                        <span></span>
                                                    </label> -->
                                                    <button id="enable" class="btn green">Enable / Disable Editor Mode</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Groups Functioning in the School</span>
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
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                     <div class="row"> 
                                                     <div class="col-md-4"> 
                                                    <a href="javascript:;" class="btn btn-sm green add-school-group"> Add group <i class="fa fa-edit"></i></a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <br>
                                                </div>

                                                <!-- Add-Modal -->
                                                <div id="addModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Add New group</h4>
                                                  </div>
                                                  <form method="post" action="<?php echo base_url(); ?>schoolgroups/add_group_register">
                                                  <div class="modal-body">

                                                        <div class="form-group">
                                                            <label class="control-label">Name of the group</label>
                                                            <select class="form-control" data-placeholder="Choose a group" tabindex="1" id="emis_group_add" name="emis_group_add" required>
                                                                
                                                                <option value="" >Select Group</option>
                                                        
                                                            </select>

                                                            <font style="color:#dd4b39;"><div id="emis_group_add_alert"></div></font>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label">No. of Sections</label>
                                                            <input type="text" class="form-control" id="emis_group_add_section" name="emis_group_add_section"  placeholder="" required pattern="\d+">
                                                            <font style="color:#dd4b39;"><div id="emis_group_add_section_alert"></div></font>
                                                        </div>
                                                    
                                                  </div>
                                                  
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary green">Submit</button>
                                                  </div>
                                                  </form>
                                                </div>

                                              </div>
                                            </div>
                                            <!--edit Model -->

                                         <div id="myeditModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit group</h4>
                                                  </div>
                                                  <form method="post" action="<?php echo base_url(); ?>schoolgroups/edit_group_register">
                                                  <div class="modal-body">

                                                        
                                                            <div class="form-group">
                                                                <label class="control-label">Name of the group</label>
                                                                <input type="text" class="form-control" id="emis_group_name" name="emis_group_name"  placeholder="" readonly="readonly">
                                                                <font style="color:#dd4b39;"><div id="emis_group_name_alert"></div></font>
                                                            </div>
                                                        

                                                        
                                                            <div class="form-group">
                                                                <label class="control-label">No. of Sections</label>
                                                                <input type="text" class="form-control" id="emis_group_section" name="emis_group_section"  placeholder="" required pattern="\d+">
                                                                <font style="color:#dd4b39;"><div id="emis_group_section_alert"></div></font>
                                                            </div> <!-- form -group -->
                                                        
                                                            <div class="form-group">
                                                            <input type='hidden' class="form-control" id='emis_group_id_hidden' name='emis_group_id_hidden' value=''>
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
                                                            <i class="fa fa-globe"></i> Groups Available in the School </div>
                                                        <div class="tools"> </div>
                                                       
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th> Name of the Group </th>
                                                                    <th> No. of Sections available in the Group </th>
                                                                    <th> Edit / Update </th>
                                                                    <th> Delete </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($details as $d) { $i=1;  ?>
                                                               <tr>
                                                                    
                                                                    <td><?php echo $d->group_name;  ?></td>
                                                                    <td><?php echo $d->sec_in_group;  ?></td>
                                                                    <td><a href="javascript:;" class="btn btn-sm green edit-school-group" data-school-group-id ="<?php echo $d->id;  ?>"> Edit / Update <i class="fa fa-edit"></i></a>
                                                                    </td>
                                                                    <td> <a href="javascript:;" class="btn btn-sm red delete-school-group" data-school-group-id ="<?php echo $d->id;  ?>"> Delete <i class="fa fa-trash-o "></i></a> </td>

                                                                    

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

        <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>

        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>

         <script>
        $('#noofsections').editable({
            type: 'text',
            pk: 1,
            name: 'schoolid',
            title: 'Enter School Name'
        });
        $('#grouppermission').editable({
            type: 'text',
            pk: 1,
            name: 'loweststd',
            title: 'Enter School Name in Tamil'
        });          

        var countries = [];
        $.each({
            "101": "101 - PHYSICS,CHEMISTRY,STATISTICS,MATHEMATICS",
            "102": "102 - PHYSICS,CHEMISTRY,COMPUTER SCIENCE,MATHEMATICS",
            "103": "103 - PHYSICS,CHEMISTRY,BIOLOGY,MATHEMATICS",
        }, function(k, v) {
            countries.push({
                id: k,
                text: v
            });
        });


         $('#nameofgroup').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });  
  
        $('#orderdate').editable({
            inputclass: 'form-control',
        });

            // init editable toggler
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });

        $('.delete-school-group').on('click',function(){

             var id = $(this).data("school-group-id");
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
                                    url:baseurl+'schoolgroups/deleteclassdetails',
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


            $('.edit-school-group').on('click',function(){

              
                //alert("hello");
                var id = $(this).data("school-group-id");
                //$("#emis_group_name").prop('disabled',true);
                $("#emis_group_name").val($(this).closest('tr').find('td:nth-child(1)').text());
                $("#emis_group_section").val($(this).closest('tr').find('td:nth-child(2)').text());
                
                $("#emis_group_id_hidden").val(id);

                $('#myeditModal').modal('show');
               


            });

         $('.add-school-group').on('click',function(){


             $('#addModal').modal('show');
   
                $.ajax({
                        type: "POST",
                        url:baseurl+'schoolgroups/getallschoolgroups',
                        success: function(resp){   

                           var mySelect = $('#emis_group_add');
                           var result = $.parseJSON(resp);
                            mySelect.empty();
                           mySelect.append( $('<option></option>').val("").html("Select Group") );
                            $.each(result, function(value,group) {
                            mySelect.append(
                                $('<option></option>').val(group.group_name).html(group.group_name));
    
                                } );
                                return true;  
                 
                            },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            return false;  
        
                            }
                    }); 
                




            }); 


</script>

    </body>

</html>