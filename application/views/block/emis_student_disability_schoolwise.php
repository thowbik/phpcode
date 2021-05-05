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
            


<?php $this->load->view('block/header.php'); ?>


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
                                        <h1>Children With Special Need                                   
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
                          

                               <!--     <div class="page-content-inner">
                                     <div class="row margin-bottom-20">
                                    <div class=" row page-content-inner">
<div class="col-lg-12">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> <?php if($schoolname!=""){ echo $schoolname; } ?> ( <?php if($udise_code!=""){ echo $udise_code; } ?> )</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-9 ">
                                                
                                                   
                                                <div class="col-lg-12 col-md-6 ">
                                                     <h3>Block : <?php if($blockname!=""){ echo $blockname; } ?> <br/></h3>
                                                    <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management :</font>  <?php if($schmanage!=""){ echo $schmanage; } ?> 
                                                    
                                                    <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category :</font> 
                                                 <?php if($schoolcate!=""){ echo $schoolcate; } ?>
                                                    <br/>
                                                  <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate :</font>  <?php if($schdirector!=""){ echo $schdirector; } ?> 
                                                
                                                   
                                                </div>
                                            </div>

                                                
                </div>
        </div>
    
    </div>
                                       
                                           

                                        </div>
                                       

                                </div>

                              <!--      <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class <?php
                                                      // echo $cls_id;
                                                      $cls_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                            $cls_roman_name = array_search($cls_id,$cls_roma);
                                                            echo $cls_roman_name;
                                                    ?></span>
                                                </div>
                                                    
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                  <form action="<?=base_url().'Home/emis_student_disablity_list' ?>" method="post">
                                                    <div class="col-md-4">
                                                     
                                                        <!-- <?php print_r($cls_roma);?> -->
                                                  <!--    <select name="cls_id" id="cls_id" class="form-control">
                                                          
                                                        <option value="0">--select--</option>
                                                        <?php if(!empty($school_classwise)){
                                                            foreach($school_classwise as $cls_wise)
                                                            {

                                                              $cls_roman_names = array_search($cls_wise->cls_id,$cls_roma);
                                                              // echo $cls_wise->cls_id; 
                                                          ?>
                                                           <option value="<?=$cls_wise->cls_id?>" <?php echo ($cls_wise->cls_id == $cls_id) ? 'selected' : ''; ?>><?=$cls_roman_names.'-'.$cls_wise->cls_id;?></option>
                                                         <?php } }?>
                                                      </select>
                                                     
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div id="section">
                                                            <select class="form-control" id="section_id">
                                                                <option value="<?=$section_id?>"><?=(!empty($section_id))?$section_id:'All'?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" onclick="return cls_validation();">Search</button>
                                                    <div id="msg"></div>
                                                  </form>
                                                </div>
                                            </div>
                                        </div>
           
                                        <!-- BEGIN CARDS -->
                                        
                                       
                                              
                                                 <!-- <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class <?=$cls_roman_name?></span>
                                                </div>

                                            </div>-->

                                                
                                           <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>CWSN-Student Report | School-wise</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                       <?php $prekg_tot=0;$lkg_tot=0;$ukg_tot=0;$c1_tot=0;$c2_tot=0;$c3_tot=0;$c4_tot=0;$c5_tot=0;$c6_tot=0;$c7_tot=0;$c8_tot=0;$c9_tot=0;$c10_tot=0;$c11_tot=0;$c12_tot=0; ?>
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                     <th>S.No</th>
                                                                    <th>School</th>
                                                                    <th>School Type</th>
                                                                    <th>VI(B)</th>
                                                                    <th>VI(LV)</th>
                                                                    <th>HI</th>
                                                                    <th>SI</th>
                                                                    <th>LI</th>
                                                                    <th>MR</th>
                                                                    <th>LD</th>
                                                                    <th>CP</th>
                                                                    <th>Aut</th>
                                                                    <th>MD</th>
                                                                    <th>Mus_dyp</th>
                                                                    <th>DS</th>
                                                                    <th>LC</th>
                                                                    <th>Dwar</th>
                                                                    <th>ID</th>
                                                                    <th>CNC</th>
                                                                    <th>MS</th>
                                                                    <th>Tha</th>
                                                                    <th>Hemo</th> 
                                                                    <th>SCD</th> 
                                                                    <th>AAV</th> 
                                                                    <th>PD</th> 
                                                                    <th>total</th>
                                                                </tr>
                                                                </thead>
                                                               
                                                                 
                                                            <?php $total1 = []; if(!empty($allstuds)){  $VIB_tot= [];$VILV_tot= [];$HI_tot= [];$SI_tot= [];$LI_tot=[];$MR_tot= [];$LD_tot= [];$CP_tot= [];$Aut_tot= [];$MD_tot= [];$Mus_dyp_tot= [];$DS_tot= [];$LC_tot= [];$Dwar_tot= [];$ID_tot= [];$CNC_tot= [];$MS_tot= [];$Tha_tot= []; $Hemo_tot= []; $PD_tot= []; $SCD_tot= []; $AAV_tot= [];$i=1; foreach($allstuds as $det){ $total = $det->VIB+$det->VILV+$det->HI+$det->SI+$det->LI+$det->MR+$det->LD+$det->CP+$det->Aut+$det->MD+$det->Mus_dyp+$det->DS+$det->LC+$det->Dwar+$det->ID+$det->CNC+$det->MS+$det->Tha+$det->Hemo+$det->SCD+$det->AAV+$det->PD;
                                                             ?>

                                                                <tr>
                                                                  <td style="text-align: center;"><?php echo $i;?></td>
                                                                  
                                                                    <td> <a  href="#">
                                                                    <?php echo $det->school_name; ?></a></td>
                                                                    <td> <a  href="#">
                                                                    <?php echo $det->school_type; ?></a></td>
                                                                    
                                                                    <td style="text-align: center;"><?php echo number_format($det->VIB); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->VILV); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->HI); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->SI); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->LI); ?></td>
                                                                     <td style="text-align: center;"><?php echo number_format($det->MR); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->LD); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->CP); ?></td>
                                                                     <td style="text-align: center;"><?php echo number_format($det->Aut); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->MD); ?></td>
                                                                 <td style="text-align: center;"><?php echo number_format($det->Mus_dyp); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->DS); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->LC); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->Dwar); ?></td>
                                                                    <td style="text-align: center;"><?php echo number_format($det->ID); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->CNC); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->MS); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->Tha); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->Hemo); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->SCD); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->AAV); ?></td>
                                                                   <td style="text-align: center;"><?php echo number_format($det->PD); ?></td>
                                                                 <td style="text-align: center;"><?php echo number_format($total); ?></td>
                                                                 
                                                                   
                                                                </tr>
                                                                <?php $i++;?>
                                                             <?php 

                                                            array_push($VIB_tot,$det->VIB);
                                                            array_push($VILV_tot,$det->VILV);
                                                            array_push($HI_tot,$det->HI);
                                                            array_push($SI_tot,$det->SI);
                                                            array_push($LI_tot,$det->LI);
                                                            array_push($MR_tot,$det->MR);
                                                            array_push($LD_tot,$det->LD);
                                                            array_push($CP_tot,$det->CP);
                                                            array_push($Aut_tot,$det->Aut);
                                                            array_push($MD_tot,$det->MD);
                                                            array_push($Mus_dyp_tot,$det->Mus_dyp);
                                                            array_push($DS_tot,$det->DS);
                                                            array_push($LC_tot,$det->LC);
                                                            array_push($Dwar_tot,$det->Dwar);
                                                            array_push($ID_tot,$det->ID);
                                                            array_push($CNC_tot,$det->CNC);
                                                            array_push($MS_tot,$det->MS);
                                                            array_push($Tha_tot,$det->Tha);
                                                            array_push($Hemo_tot,$det->Hemo);
                                                            array_push($SCD_tot,$det->SCD);
                                                            array_push($AAV_tot,$det->AAV);
                                                            array_push($PD_tot,$det->PD);
                                                          



                                                        }?>
                                                           
                                                  
                                                         
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th></th>
                                                            <th style="text-align: center;"><?php 
                                                            $VIB_tot= array_sum($VIB_tot);
                                                            array_push($total1,$VIB_tot);
                                                            echo number_format($VIB_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                               $VILV_tot = array_sum($VILV_tot);
                                                                array_push($total1,$VILV_tot);
                                                            echo number_format($VILV_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $HI_tot = array_sum($HI_tot);
                                                                array_push($total1,$HI_tot);
                                                                echo number_format($HI_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $SI_tot= array_sum($SI_tot);
                                                                array_push($total1,$SI_tot);
                                                           echo number_format($SI_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                           $LI_tot = array_sum($LI_tot);
                                                                array_push($total1,$LI_tot);
                                                                echo number_format($LI_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $MR_tot = array_sum($MR_tot);
                                                                array_push($total1,$MR_tot);
                                                                echo number_format($MR_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $LD_tot = array_sum($LD_tot);
                                                                array_push($total1,$LD_tot);
                                                                echo number_format($LD_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $CP_tot = array_sum($CP_tot);
                                                                array_push($total1,$CP_tot);
                                                                echo number_format($CP_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $Aut_tot = array_sum($Aut_tot);
                                                                array_push($total1,$Aut_tot);
                                                            echo number_format($Aut_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $MD_tot = array_sum($MD_tot);
                                                                array_push($total1,$MD_tot);
                                                            echo number_format($MD_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $Mus_dyp_tot = array_sum($Mus_dyp_tot);
                                                                array_push($total1,$Mus_dyp_tot);
                                                            echo number_format($Mus_dyp_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $DS_tot = array_sum($DS_tot);
                                                                array_push($total1,$DS_tot);
                                                            echo number_format($DS_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $LC_tot = array_sum($LC_tot);
                                                                array_push($total1,$LC_tot);
                                                            echo number_format($LC_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $Dwar_tot = array_sum($Dwar_tot);
                                                                array_push($total1,$Dwar_tot);
                                                            echo number_format($Dwar_tot);?></th>

                                                             <th style="text-align: center;"><?php 
                                                            $ID_tot = array_sum($ID_tot);
                                                                array_push($total1,$ID_tot);
                                                            echo number_format($ID_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $CNC_tot = array_sum($CNC_tot);
                                                                array_push($total1,$CNC_tot);
                                                            echo number_format($CNC_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $MS_tot = array_sum($MS_tot);
                                                                array_push($total1,$MS_tot);
                                                            echo number_format($MS_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $Tha_tot = array_sum($Tha_tot);
                                                                array_push($total1,$Tha_tot);
                                                            echo number_format($Tha_tot);?></th>

                                                             <th style="text-align: center;"><?php 
                                                            $Hemo_tot = array_sum($Hemo_tot);
                                                                array_push($total1,$Hemo_tot);
                                                            echo number_format($Hemo_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $SCD_tot = array_sum($SCD_tot);
                                                                array_push($total1,$SCD_tot);
                                                            echo number_format($SCD_tots);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $AAV_tot = array_sum($AAV_tot);
                                                                array_push($total1,$AAV_tot);
                                                            echo number_format($AAV_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $PD_tot = array_sum($PD_tot);
                                                                array_push($total1,$PD_tot);
                                                            echo number_format($PD_tot);?></th>
                                                          <th>   <?php echo $tot_all=$VIB_tot+ $VILV_tot+$HI_tot+ $SI_tot+$LI_tot+$MR_tot+$LD_tot+$CP_tot+$Aut_tot+$MD_tot+ $Mus_dyp_tot+$DS_tot+$LC_tot+$Dwar_tot+$ID_tot+$CNC_tot+$MS_tot+ $Tha_tot+$Hemo_tot+$SCD_tot+$AAV_tot+$PD_tot?></th>
                                                           

                                                        </tr>
                                                            </tfoot>
                                                            <?php } ?> 
                                            </table>
                                              <div class="page-head">
                                <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                        <div class="col-md-12" style="width: 96%">
                                                        <h5><b>VI(LV):</b>Visual Impairment (Low-vision)
                                                            <b>VIB :</b>  Visual Impairment (Blindness)
                                                            <b>HI :</b> Hearing Impairment
                                                            <b>SI:</b>  Speech Impairment
                                                            <b>LI :</b>  Locomotor Impairment/Handicap
                                                            <b>MR :</b> Mental Retardation
                                                            <b>LD :</b>  Learning disability/Dyslexia
                                                            <b>CP :</b>  Cerebral Palsy
                                                            <b>Aut :</b> Autism
                                                            <b>MD :</b>  Multiple disability
                                                            <b>Mus_dyp :</b>  Muscular dystrophy
                                                            <b>DS :</b>  Down syndrome
                                                            <b>LC :</b> Leprosy Cured
                                                            <b>Dwar :</b>  Dwarfism
                                                            <b>ID :</b>  Intellectual Disability
                                                            <b>CNC :</b>  Chronic Neurological conditions
                                                            <b>MS :</b> Multiple Sclerosis
                                                            <b>Tha :</b> Thalassemia
                                                            <b>Hemo :</b> Hemophilia
                                                            <b>SCD :</b>  Sickle cell disease
                                                            <b>AAV :</b>  Acid Attack victims
                                                            <b>PD :</b>  Parkinsons disease
                                                            
                                                        </h5>
                                                        
                                                    </div>  
                                        
                                    </div>
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
<script type="text/javascript">
  var cls_id = 0;
    $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    }
})

$(document).ready(function(){
  cls_id = $('#cls_id').val();
  var section_id  =0;
 section_id = <?php echo json_encode($section_id,JSON_PRETTY_PRINT);?>;
  get_section(cls_id,section_id);

})
    $(document).on('change','#cls_id',function()
{
    cls_id = $(this).val();
    get_section(cls_id,section_id);
    // var school_id = $("#school_code").val();
    

})
    function get_section(cls_id,section_id)
    {
  // alert(section_id);

      if(cls_id !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Home/get_school_section_details',
        data:{'cls_id':cls_id},
        success: function(resp){
        // alert(resp);  
       
        var section = JSON.parse(resp);
        console.log(section);
        var section_drop = '<select name="section_id" class="form-control" id="section_id">';
        section_drop += '<option value=0>All</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $("#section").empty('');            
            $("#section").html(section_drop); 
            // alert(section_id);
            if(section_id !=0){
            $("#section_id").val(section_id).attr('selected','selected');   
            }      
         },
          
    })
    }
    }
    function cls_validation()
{
    // alert();
    var cls_id = $("#cls_id").val();
    // console.log(cls_id);
    // var section = $("#section_id").val();
    // console.log(section);
    if(cls_id =='0')
    {
        var msg = '<span style="color:red;">You must select your Class!</span><br /><br />';
                    document.getElementById('msg').innerHTML = msg;
                    return false;
    }else
    {
        return true;
    }
}

</script>
</html>