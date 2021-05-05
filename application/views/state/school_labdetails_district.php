<?php  ?>     
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
            


<?php if($this->session->userdata('user_type')==5){ 
            $this->load->view('state/header.php');
        }elseif($this->session->userdata('user_type')==9){
            $this->load->view('Ceo_District/header.php');
        }elseif($this->session->userdata('user_type')==10){
            $this->load->view('Deo_District/header.php');
        }elseif($this->session->userdata('user_type')==6){
            $this->load->view('beo_Block/header.php');
        }elseif($this->session->userdata('user_type')==2){
            $this->load->view('block/header.php');
        }  ?>


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
                                        <h1>School LAB Details - Verification Report
                                            
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
                                   
                                    <div class="portlet light portlet-fit ">
                                        <div class="portlet-title">
                                            
                                                <div class="portlet-body">
                                                   
                                                        <form action="<?php if($this->uri->segment(4,0)==null){echo base_url().'State/school_lab_details/'.$this->uri->segment(3,0);}else{echo base_url().'State/school_lab_details/'.$this->uri->segment(3,0).'/'.$this->uri->segment(4,0).'/'.$this->uri->segment(5,0),'/';} ?>" method="post">
                                                    <div class="col-md-6">
                                                        <div ><i class="icon-settings font-dark"></i> <label>Lab List</label> </div>
                                                        <select name="lablist" id="lablist" class="form-control">  
                                                            <option value="">--select--</option>
                                                            <?php foreach($lablist as $listlab) { ?>
                                                            <option value="<?php echo $listlab->id; ?>"><?php echo $listlab->Lab; ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div><i class=""></i> <label></label></div>
                                                        <button class="btn btn-primary" name="lablistsearch" >Search</button>
                                                         
                                                    </div>
                                                    
                                                   </form>       
                                             
                                        </div>
                                       
                                        </div>
                                        </div>
                                        
                                        <p></p>
                                           <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>School LAB Details - Verification Report</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                       

                                                      <?php if($this->uri->segment(4,0)==null){ ?>
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center;">S.No</th>
                                                                    <th>District Name</th> 
                                                                    <th style="text-align:center;">Total School Count</th>
                                                                </tr>
                                                                </thead>
                                                               <?php $totschool=0; $i=1; foreach($labentry as $lab) { ?>
                                                                <tr>
                                                                    <td style="text-align: center;"><?php echo $i++; ?></td>
                                                                    <td ><a href="<?php $seg=$postvar[0].'/'; echo base_url().'State/school_lab_details/1/'.$seg.$lab->district_id.'/'; ?>">
                                                                    <?php echo $lab->district_name;?>
                                                                    </a></td>
                                                                  
                                                                    <td style="text-align: center;"><?php echo $lab->noofschool; $totschool+=$lab->noofschool;?>
                                                                    </td>
                                                                    
                                                                  
                                                                    
                                                                </tr>
                                                                <?php }?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="2">Total</td>
                                                                    <td style="text-align: center;"><?php echo $totschool; ?></td>
                                                                </tr>
                                                            </tfoot> 
                                                              
                                                        </table>
                                                        <?php }elseif($this->uri->segment(4,0)!=null) {?>
                                                        
                                                      
                                                       <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center;">S.No</th>
                                                                    <th style="text-align:center;">Block Name</th> 
                                                                    <th style="text-align:center;">Udise Code</th>
                                                                    <th style="text-align:center;">School Name</th>
                                                                    <th style="text-align:center;">Lab Details</th>
                                                                    <th style="text-align:center;">Room Details</th>
                                                                    <th style="text-align:center;">Condition Details</th>
                                                                    <!--<?php foreach($lablist as $listlab) { ?>
                                                                    <th style="text-align:center;"><?php echo $listlab->Lab; ?></th>
                                                                    <?php }?>-->
                                                                </tr>
                                                                </thead>
                                                               <?php $i=1; foreach($labentry as $lab) {  ?>
                                                                <tr>
                                                                    <td style="text-align: center;"><?php echo $i++; ?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->block_name;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->udise_code;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->school_name;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->Lab;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->seperate_room;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->condition_now;?></td>
                                                                    <!--<td style="text-align: center;"><?php echo $lab->None;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->Physics;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->Chemistry;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->Biology;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->Computer;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->Mathematics;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->Language;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->Geography;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->HomeScience;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->Psychology;?></td>
                                                                    <td style="text-align: center;"><?php echo $lab->NotApplicable;?></td>-->
                                                                    
                                                                </tr>
                                                                 <?php }?>
                                                            </tbody>
                                                            <tfoot>
                                                             
                                                            </tfoot> 
                                                             
                                                        </table>
                                                      <?php }?>  
                                                      
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
<script type="text/javascript">
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




</script>
</html>
<?php ?>