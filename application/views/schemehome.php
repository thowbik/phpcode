<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />



        <?php $this->load->view('head.php'); ?>



        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('state/header.php'); ?>


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
                                        <div class="col-md-12">
                                            <h2>Free Schemes </h2>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label bold">Scheme Names</label>
                                                                 <select class="form-control"  id="scheme_name" name="schname" >
                                                                 <option value="" >Select Scheme</option>
                                                                 <option value="" >Uniform </option>
                                                                 <option value="" >Footware</option>
                                                                 <option value="" >Notebook</option>
                                                                 <option value="" >School bag</option>
                                                                 <option value="" >Crayon</option>
                                                                 <option value="" >Colour pencil </option>
                                                                 <option value="" >Geometry box </option>
                                                                 <option value="" >Atlas</option>
                                                                 <option value="" >Text book </option>
                                                                 <option value="" >Cycle </option>
                                                                 <option value="" >Laptop </option>
                                                                 <option value="" >Sweater(Only for hill stations)</option>
                                                                 <option value="" >Special Cash Incentive</option>
                                                                 <option value="" >Breadwinner</option>
                                                              </select>
                                                                
                                        </div>
                                                            <div class="col-md-3">
                                                            <label class="control-label bold">Avilabilty Class </label>
                                                            <select class="form-control" id="avl_class" name="avlclass" >
                                                            <option value="" >Availability Classes</option>
                                                            </select>
                                           </div>                      
                                        
                                         <div class="col-md-3">
                                                            <label class="control-label bold">Size </label>
                                                            <select class="form-control" id="size" name="size" >
                                                            <option value="" >Select Size</option>
                                                            <option value="" >Size I</option>
                                                            <option value="" >Size II</option>
                                                            <option value="" >Size III</option>
                                                            <option value="" >Size IV</option>
                                                            <option value="" >Size V</option>
                                                            <option value="" >Size VI</option>
                                                            <option value="" >Size VII </option>
                                                            <option value="" >Size VIII</option>
                                                            <option value="" >Size IX </option>
                                                            <option value="" >Size X </option>
                                                            <option value="" >Size XI </option>
                                                            <option value="" >Size XII </option>
                                                            </select>
                                          </div>                      
                                       
                                      <div class="col-md-3">
                                        <button type="button" class="btn green btn-md">Submit</button>
                                      </div>
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

                                    <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                          
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>         

                                                 <div class="portlet box green">
                                                   <div class="form-actions">
                                                 <div class="portlet box green">
                                                   <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-globe"></i>Report</div>
                                                    <div class="tools"></div>
                                                </div>
                                                <div class="portlet-body">    
                                                    <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;" id="sample_2">
                                                        <thead>
                                                            <tr>
                                                                    <th>Student ID</th>                        
                                                                    <th>Student Name</th>
                                                                    <th>Indent</th>
                                                                    <th>Received Date</th>
                                                                   </th>
                                                                </tr>
                                                                
                                                          </thead>
                                                            
                                                        </table>
                                                        
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

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


        <!-- BEGIN PAGE LEVEL PLUGINS -->
   

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>
     
}
 </script>  

</html>