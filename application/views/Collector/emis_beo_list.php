<?php 

    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Homemodel');
    $school_id=$this->session->userdata('emis_school_id');
    $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id);
/*    $schoolname  = $schoolprofile[0]->school_name;
    $udise_code  = $schoolprofile[0]->udise_code;
    $blockname  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $schoolcate  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
    $schmanage  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $schdirector  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);*/
     $section_details = [];
     array_push($section_details,array('sections'=>1,'section_ids'=>'A'),array('sections'=>2,'section_ids'=>'B'),array('sections'=>3,'section_ids'=>'C'),array('sections'=>4,'section_ids'=>'D'),array('sections'=>'5','section_ids'=>'E'),array('sections'=>6,'section_ids'=>'F'),array('sections'=>7,'section_ids'=>'G'));
      
     // print_r($section_details);die;
     ?>     
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
      <style type="text/css">
  .panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.tablecolor
{
    background-color: #32c5d2; 
}
</style>
    
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            


<?php $this->load->view('Collector/header.php');  ?>


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
                                        <h1>Transfer Applied
                                            
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
                               
                                                
                                           <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>BEO-Transfer Applied</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                     <th>S.No</th>                                                                 
                                                                     <th>Name</th>
                                                                    <th>Block</th> 
                                                                     <th>First Date of<br/> joining as <br/>middle school HM</th>
                                                                     <th>Date of <br/>joining as<br/> BEO</th>
                                                                     <th>Date of joining <br/> as BEO <br/>In Present Station</th>
                                                                     <th>PDF</th>
                                                                </tr>
                                                                </thead>
                                                               
                                                                 
                                             <?php $i=1; foreach($beo_list as $det){ 
                                                      //print_r($beo_list);            
                                             ?>

                                                                <tr>
                                                                    <td style="text-align: center;"><?php echo $i++;?></td>
                                                                    <td><?=$det->name;?>
                                                                      
                                                                    </td>
                                                                    <td><?=$det->block_name;?>
                                                                      
                                                                    
                                                                    <td><?=$det->doj_mhm;?>
                                                                    
                                                                    </td>
                                                                   <td><?=$det->doj_beo;?>
                                                                      
                                                                    </td>
                                                                      <td><?=$det->doj_pr_beo;?>
                                                                      
                                                                    </td>
                                                                   <td><a href="<?=base_url().'Collector/generate_pdf_beo/'.$det->id?>"><i class="fa fa-file-pdf-o"></i></a></td>
                                                                  
                                                                </tr>
                                                             
                                                             <?php 
                                                        }?>
                                                       
                                                            </tbody>
                                                            <tfoot>
                                                             
                                                            </tfoot> 
                                            </table>
                           
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar">
                                        <!-- BEGIN THEME PANEL -->
                           
                                        <!-- END THEME PANEL -->
                                    </div>
                                    <!-- END PAGE TOOLBAR -->
                                </div>
                            </div>
                            </div>
                                                        
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

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
            
    </body>

</html>