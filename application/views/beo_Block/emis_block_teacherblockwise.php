
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
            

  <?php $this->load->view('Beo_block/header.php'); ?>

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
                                         <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Block/emis_teaching_schoolwise_block';?>">
                                              <span class="text">Teaching Staff</span>
                                            </a>
                                          </li>
                                          <li role="presentation" class="next">
                                                                              <a href="<?php echo base_url().'Block/emis_teacher_classwise_block';?>">
                                              <span class="text" >Government Teaching Staff By Grade</a></span>
                                          </a>
                                          </li>
                                                </ul>
                                            </div>
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Teaching Staff Details By Grade-Block wise</div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">
<?php $Govteacher=0;$BTteacher=0;$SGteacher=0;$PGteacher=0; ?>
                                                 
                                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;">S.No</th>
                                                          <th>District</th>                        
                                                             <th style="text-align: center;">SG- Teacher</th>
                                                            <th style="text-align: center;">BT - Teacher</th>
                                                            <th style="text-align: center;">PG - Teacher</th>
                                                            <th style="text-align: center;">Others</th>
                                                            <th style="text-align: center;">Total</th>
                                                            <!--<th>Total</th>-->
                                                            <!--<th>Total</th>-->
                                                            <!--<th>Total</th>-->
                                                                   
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(!empty($details)){ $total1 = []; $Govteacher_tot= [];$BTteacher_tot= [];$SGteacher_tot= [];$PGteacher_tot= [];$others_tot=[]; $i=1; foreach($details as $det){ 
                                                         ?>
                                                        <tr>
                                                            <td style="text-align: center;"><?php echo $i;?></td>
                                                           <td><a onclick="savedistrictid('<?php echo $det->block_id; ?>')">
                                                            <?php echo $det->block_name; ?></td></a>
                                                            <td style="text-align: center;"> <?php echo number_format($det->SGteacher); ?></td>
                                                            
                                                            <td style="text-align: center;"> <?php echo number_format($det->BTteacher); ?></td>
                                                            
                                                            <td style="text-align: center;"> <?php echo number_format($det->PGteacher); ?></td>
                                                            <td style="text-align: center;"> <?php echo number_format($det->Others); ?></td>
                                                             <td style="text-align: center;"> <?php echo number_format($det->Govteacher); ?></td>
                                                            <!--<td> <?php echo number_format($det->total); ?></td>-->
                                                        </tr>
                                                        <?php $i++ ?>
                                                         <?php  

                                                            array_push($Govteacher_tot,$det->Govteacher);
                                                            array_push($BTteacher_tot,$det->BTteacher);
                                                            array_push($SGteacher_tot,$det->SGteacher);
                                                            array_push($PGteacher_tot,$det->PGteacher);
                                                            array_push($others_tot,$det->Others);
                                                           
                                                       } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                      <tfoot>
                                                                <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th style="text-align: center;"><?php 
                                                            $SGteacher_tot = array_sum($SGteacher_tot);
                                                                array_push($total1,$SGteacher_tot);
                                                                echo number_format($SGteacher_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                                $BTteacher_tot = array_sum($BTteacher_tot);
                                                                array_push($total1,$BTteacher_tot);
                                                            echo number_format($BTteacher_tot);?></th>
                                                           
                                                            <th style="text-align: center;"><?php 
                                                             $PGteacher_tot = array_sum($PGteacher_tot);
                                                                array_push($total1,$PGteacher_tot);
                                                           echo number_format($PGteacher_tot);?></th>
                                                           <th style="text-align: center;"><?php 
                                                            $others_tot = array_sum($others_tot);
                                                                array_push($total1,$others_tot);
                                                           echo number_format($others_tot);?></th>
                                                             <th style="text-align: center;"><?php 
                                                            $Govteacher_tot = array_sum($Govteacher_tot);
                                                            array_push($total1,$Govteacher_tot);
                                                            echo number_format($Govteacher_tot);?></th>
                                                          
                                                        </tr>
                                                            </tfoot> 
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
                 <script type="text/javascript">
               function savedistrictid(value){
                var baseurl='<?php echo base_url(); ?>';
                //alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'State/saveblockidsession',
                data:"&block_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'State/emis_teacher_classwise_block'; 
                return true;  
                 }else{
                    return false;
                 }
                 
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  

                }
                });
               }
              </script>
             
    </body>

</html>