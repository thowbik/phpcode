
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
<style> 
.center 
{
text-align: center;
}   
</style>
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
            

  <?php $this->load->view('Ceo_District/header.php'); ?>

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
                                         <h1>Dashboard
                                        
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
                          
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row" style="margin-left: 6px;">
                                             
                                                      <label class="control-label"></label>
                                                      <form  method="POST" >
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_state_fix" name="emis_state_fix" required="" onchange="this.form.submit()"   style="  width: inherit;">
                                                               <option value="" >Select </option>
                                                               <option value="elig_">Eligible</option>
                                                               <option value="sanc_">Sanction</option>
                                                               <option value="avail_">Available</option>
                                                               <option value="need_">Needed</option>
                                                               <option value="swp_">Surplus With Person</option>
                                                               <option value="swop_">Surplus Without Person</option>
                                                               <option value="vac_">Vacancy</option>
                                                              
                                                         </select>
                                                         </form>
                                              </div>    

                                             
                                             <br>
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>PG - Staff Fixation Report Subject-Wise  <?php  $pst=$this->input->post('emis_state_fix')==''?'elig_':$this->input->post('emis_state_fix');
                                                             if($pst=='elig_')
                                                             {
                                                              echo '(Eligible)';
                                                             }
                                                             if($pst=='sanc_')
                                                             {
                                                              echo '(Sanctioned)';
                                                             }
                                                             if($pst=='avail_')
                                                             {
                                                              echo '(Available)';
                                                             }
                                                             if($pst=='need_')
                                                             {
                                                              echo '(Needed)';
                                                             }
                                                             if($pst=='swp_')
                                                             {
                                                              echo '(surplus_with_person)';
                                                             }
                                                             if($pst=='swop_')
                                                             {
                                                              echo '(Surplus_without_person)';
                                                             }
                                                              if($pst=='vac_')
                                                             {
                                                              echo '(Vacancy)';
                                                             }
                                                            ?></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">


                                        
                                  <table class="table table-striped table-bordered table-hover" id="sample_2">
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
                              <th>Block</th>       
                              <th>School</th>                 
                              <th style="text-align: center;">Tamil</th>
                              <th style="text-align: center;">English</th>
                              <th style="text-align: center;">Physics</th>
                              <th style="text-align: center;">Chemistry</th>
                              <th style="text-align: center;">Biology</th>


                              <th style="text-align: center;">Botony</th>
                              <th style="text-align: center;">Zoology</th>
                              <th style="text-align: center;">Statistics</th>
                              <th style="text-align: center;">Computer Science</th>
                              <th style="text-align: center;">Geography</th>
                              <th style="text-align: center;">MICRO-BIOLOGY</th>
                              <th>BIO-CHEMISTRY</th>
                              <th>NURSING GENERAL</th>
                              <th>NUTRITION & DIETETICS</th>
                              <th>COMMUNICATIVE ENGLISH</th>
                              <th style="text-align: center;">Maths</th>
                              <th style="text-align: center;">Home Science</th>

                              <th style="text-align: center;">History</th>
                              <th style="text-align: center;">Economics</th>
                              <th style="text-align: center;">Political Science</th>
                              <th>COMMERCE</th>
                              <th style="text-align: center;">Accounts</th>
                              <th>ETHICS AND INDIAN CULTURE</th>
                              <th>ADVANCED LANGUAGE(TAMIL)</th>
                              <th>BUSINESS MATHEMATICS AND STATISTICS</th>
                              <th>COMPUTER APPLICATIONS</th>
                              <th>BASIC MECHANICAL ENGINEERING</th>
                              <th>BASIC ELECTRICAL ENGINEERING</th>
                              <th>BASIC ELECTRONICS ENGINEERING</th>
                              <th>BASIC CIVIL ENGINEERING</th>
                              <th>BASIC AUTOMOBILE ENGINEERING</th>
                              <th>TEXTILE TECHNOLOGY</th>
                              <th>NURSING</th>
                              <th>TEXTILES AND DRESS DESIGNING</th>
                              <th>FOOD SERVICE MANAGEMENT</th>
                              <th>AGRICULTURAL SCIENCE</th>
                              <th>OFFICE MANAGEMENT AND SECRETARYSHIP</th>
                              <th>COMPUTER TECHNOLOGY</th>
                              <th>URDU</th>

                              <th style="text-align: center;">Kannada</th>
                              <th>MALAYALAM</th>
                              <th>TELUGU</th>
                              <th>PD-1</th>
                              <th>HrSec-HM</th>
                              <th>SCIENCE</th>
                              <th>SOCIAL SCIENCE</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[]; ?>
                            
                              <?php if(!empty($DT)){  $i=1; 
                                foreach($DT as $student_fig){ 
                                    $pst=$this->input->post('emis_state_fix')==''?'elig_':$this->input->post('emis_state_fix');
                                    $sub=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46];  
                              ?>
                              <tr>
                              <td style="text-align: center;"><?php echo $i++;?></td>
                              <td><a> <?php echo $student_fig->block_name; ?></a></td>
                               <td><a> <?php echo $student_fig->school_name; ?></a></td>
                              <?php
                                foreach ($sub as $s) { $comp=$pst.$s;
                              ?>
                              <td style="text-align: center;"><?php echo number_format($student_fig->$comp); ?></a></td>
                      
                              <?php
                                $total1[$comp]+=$student_fig->$comp;

                              }
                              ?>
                              </tr>
                            <?php  } ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th colspan="2">TOTAL</th>
                                <th></th>
                                <?php
                                  foreach ($total1 as $t) { ?>
                                  <th style="text-align: center;"><?php echo number_format($t);?></th>
                                 <?php } ?>
                                  </tr>
                            </tfoot> 
                            <?php } ?>
                            </table>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

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
 

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
             
             
    </body>

</html>