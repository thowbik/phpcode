
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
   
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('Deo_District/header.php'); ?>

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
                                        <h1>BEO - Assignment 
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
                                        <!-- BEGIN CARDS -->
                                        <div class="row">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>BEO Assignment Task - School </span>
                                                        </div>
                                                        <div class="tools"> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                        <form id="frmid" onsubmit="event.preventDefault();radio(this);">
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                    <th>UDISE</th>
                                                                    <th>School Name</th>
                                                                    <th>Block name</th>
                                                                    
                                                                    <th >BEO 1</th>
                                                                    <th >BEO 2</th>
                                                                    <th >BEO 3</th>
                                                                    <th >BEO 4</th>
                                                                    <th >BEO 5</th>
                                                                   
                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                                
                                                                <?php  $i=1; foreach ($deoschools as $list) {  ?>
                                                                <tr>
                                                                   <td style="text-align: center;"><?php  echo $i; ?></td>
                                                                   <td ><?php echo $list['udise_code']; ?></td>
                                                                   <td ><?php echo $list['school_name']; ?></td>
                                                                   <td ><?php echo $list['block_name']; ?></td>
                                                                  
                                                                 
                                                                   <td style="text-align: center;">
                                                                       <!--<?php //if($list['beo_count']<=3) { ?> <?php //} ?>-->
                                                                        <input type="radio" id="<?php echo $list['udise_code'];?>" value="1" <?php echo($list['beo_map'] == (1))?'checked ':'' ?> name="<?php echo $list['udise_code'];?>" />
                                                                       
                                                                   </td>  
                                                                   <td style="text-align: center;">
                                                                       <!--<?php //if($list['beo_count']>1) { ?> <?php //} ?>-->
                                                                        <input type="radio" id="<?php echo $list['udise_code'];?>" value="2" <?php echo($list['beo_map'] == (2))?'checked ':'' ?> name="<?php echo $list['udise_code'];?>" />
                                                                       
                                                                   </td>  
                                                                   <td style="text-align: center;">
                                                                       <!--<?php //if($list['beo_count']>=3) { ?> <?php //} ?>-->
                                                                        <input type="radio" id="<?php echo $list['udise_code'];?>" value="3" <?php echo($list['beo_map'] == (3))?'checked ':'' ?> name="<?php echo $list['udise_code'];?>" />
                                                                        
                                                                   </td> 
                                                                  <td style="text-align: center;">
                                                                       
                                                                        <input type="radio" id="<?php echo $list['udise_code'];?>" value="4" <?php echo($list['beo_map'] == (4))?'checked ':'' ?> name="<?php echo $list['udise_code'];?>" />
                                                                       
                                                                   </td>
                                                                   <td style="text-align: center;">
                                                                       
                                                                        <input type="radio" id="<?php echo $list['udise_code'];?>" value="5" <?php echo($list['beo_map'] == (5))?'checked ':'' ?> name="<?php echo $list['udise_code'];?>" />
                                                                        
                                                                   </td>
                                                                   
                                                                </tr>
                                                               <?php $i++; }?>
                                                      
                                                            </tbody>
                                                           
                                                           
                                                        </table>

                                                        <button class="btn btn-success" style="text-align: center;" >Submit</button>
                                                        </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END CARDS -->


                                         <!-- BEGIN BLOCK BUTTONS PORTLET-->
                                                                   
                                                                    <!-- BEGIN BLOCK BUTTONS PORTLET-->

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


    
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <script>
           function radio(frmid) {
             var jsArray={};
             for(var i=0;i<frmid.elements.length;i++) {
                if(frmid.elements[i].type=='radio') {
                    if(frmid.elements[i].checked) {
                        jsArray[frmid.elements[i].name]=frmid.elements[i].value;
                    }
                 }
             }
                var js =JSON.stringify(jsArray);
                
                
                  $.ajax({
                      type: "POST",
                      url:baseurl+'Deo_District/deosubmit',
                      data:"&js="+js,
                      success: function(resp){ 
                        
                        swal("OK", "Assign to BEO Successfully", "success");
                       }
                       
                       });
                       
                       
            //var x = document.querySelectorAll('input[type="radio"]');
          
           
           }
        
           
        </script>

    </body>

</html>