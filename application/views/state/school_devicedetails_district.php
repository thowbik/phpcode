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
            //print_r($this->session->userdata('user_type'));
            //die();
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
                                        <h1>School Device Details - Verification Report
                                            
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
                                                <div class="caption">
                                                    
                                                    <span class="caption-subject font-dark sbold uppercase"></span>
                                                    
                                                </div>
                                                <div></div>
                                                    <div class="portlet-body">
                                                    <div class="row">
                                                    <form action="<?php if($this->uri->segment(4,0)==null){ echo base_url().'State/school_device_details/'.$this->uri->segment(3,0); }else{ echo base_url().'State/school_device_details/'.$this->uri->segment(3,0).'/'.$this->uri->segment(4,0).'/'.$this->uri->segment(5,0).'/'.$this->uri->segment(6,0).'/';} ?>" method="post">
                                                    <div class="col-md-4">
                                                        <div ><i class="icon-settings font-dark"></i> <label>Device List</label> </div>
                                                        <select name="devicelist" id="devicelist" class="form-control">  
                                                            <option value="">--select--</option>
                                                            <?php foreach($ictlist as $listdevice) { ?>
                                                            <option value="<?php echo $listdevice->id; ?>"><?php echo $listdevice->ict_type; ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div><i class="fa fa-users font-dark"></i> <label>Suppliers</label></div>
                                                        <select name="suppliers" id="suppliers" class="form-control">  
                                                            <option value="">--select--</option>
                                                            <?php foreach($ictsuppliers as $listsuppl) { ?>
                                                            <option value="<?php echo $listsuppl->id; ?>" ><?php echo $listsuppl->supplier_name; ?></option>
                                                            <?php }?>
                                                        </select>
                                                         
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div>
                                                            <p></p>
                                                        </div>
                                                            <button class="btn btn-primary" name="devicelistsearch">Search</button>
                                                        </div>
                                                    
                                                   
                                                   
                                                  </form>
                 
                                                 </div>

                                                </div>
                                        </div>
                                        </div>
                                       
                                           <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>School Device Details - Verification Report</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                      <?php if($this->uri->segment(4,0)==null){ ?>
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center;">S.No</th>
                                                                    <th >District Name</th> 
                                                                    <th style="text-align:center;">Total School Count</th>
                                                                    <th style="text-align:center;">Available</th> 
                                                                    <th style="text-align:center;">Functional</th> 
                                                                </tr>
                                                                </thead>
                                                               <?php $schooltot=0; $avail=0;$work=0; $i=1; 
                                                                    if($postvar[0]=='\'\''){$postvar[0]=0;}
                                                                    elseif($postvar[1]=='\'\''){$postvar[1]=0;}
                                                                    foreach($devicelist as $device) {  ?>
                                                                <tr>
                                                                    <td style="text-align:center;"><?php echo $i++; ?></td>
                                                                    <td ><a href="<?php $seg=$postvar[0].'/'.$postvar[1].'/'; echo base_url().'State/school_device_details/1/'.$seg.$device->district_id.'/'; ?>">
                                                                    <?php echo $device->district_name;?>
                                                                    </a></td>
                                                                  
                                                                    <td style="text-align:center;"><?php echo $device->schoolcount; $schooltot+= $device->schoolcount; ?>
                                                                    </td>
                                                                    <td style="text-align:center;"><?php echo $device->totalavail; $avail+=$device->totalavail; ?></td>
                                                                    <td style="text-align:center;"><?php echo $device->totalfunctional; $work+=$device->totalfunctional; ?></td>
                                                                    
                                                                  
                                                                    
                                                                </tr>
                                                                <?php }?>
                                                            </tbody>
                                                            <tfoot>
                                                                 <tr>
                                                                    <th colspan="2">Total</th>
                                                                    <th style="text-align:center;"><?php echo $schooltot; ?></th>
                                                                    <th style="text-align:center;"><?php echo $avail; ?></th>
                                                                    <th style="text-align:center;"><?php echo $work; ?></th>
                                                                </tr>
                                                            </tfoot> 
                                                              
                                                        </table>
                                                        <?php }elseif($this->uri->segment(4,0)!=null) {?>
                                                        
                                                      
                                                       <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center;">S.No</th>
                                                                    <th >Block Name</th> 
                                                                    <th style="text-align:center;">Udise Code</th>
                                                                    <th >School Name</th>
                                                                    <th>Devices</th>
                                                                    <th>Suppliers</th>
                                                                    <th>Purpose</th>
                                                                    <th>Available</th>
                                                                    <th>Functional</th>
                                                                   
                                                                </tr>
                                                                </thead>
                                                               <?php  $avail=0; $work=0; $i=1; foreach($devicelist as $device) {  ?>
                                                                <tr>
                                                                    <td style="text-align:center;"><?php echo $i++; ?></td>
                                                                    <td ><?php echo $device->block_name;?></td>
                                                                    <td style="text-align:center;"><?php echo $device->udise_code;?></td>
                                                                    <td ><?php echo $device->school_name;?></td>
                                                                    <td><?php echo $device->ict_type;?></td>
                                                                    <td><?php echo $device->supplied_by; ?></td>
                                                                    <td><?php echo $device->purpose; ?></td>
                                                                    <td style="text-align:center;"><?php echo $device->avail_nos; $avail+=$device->avail_nos; ?></td>
                                                                    <td style="text-align:center;"><?php echo $device->working_nos; $work+=$device->working_nos; ?></td>
                                                                </tr>
                                                                 <?php }?>
                                                            </tbody>
                                                            <tfoot>
                                                              <tr>
                                                                <th colspan="7">Total</th>
                                                                
                                                                
                                                                <th style="text-align:center;"><?php echo $avail; ?></th>
                                                                <th style="text-align:center;"><?php echo $work; ?></th>
                                                                </tr>
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

   /* $(document).ready(function () {
        $('#btnsearchlist').click(function() {
            var devicelist = $('#devicelist').val();
            var suppliers = $('#suppliers').val();
            $.ajax({
                type: "POST",
                url : baseurl+'State/school_device_details',
                data: "&devicelist="+devicelist+"&suppliers="+suppliers,
                success: function(resp) {
                    alert(resp);
                    return true;
                },
                error: function(e){
                    alert('Error: ' + e.responseText);
                    return false;
                }
            });
        })
    })*/




</script>
</html>
<?php ?>