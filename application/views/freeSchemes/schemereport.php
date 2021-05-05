<?php
    $next = '';
     switch($this->session->userdata('user_type')){
        case 5:{
            $group='district_id';
            $groupname='district_name';
            $title='District';
            $nextid='district_id';
            $nextname='EDU';
            if($this->uri->segment(3,0)!=null){
                switch($this->uri->segment(4,0)){
                    case 'EDU':{
                        $group='edu_dist_id';
                        $groupname='edu_dist_name';
                        $title='EDU District';
                        $nextid='edu_dist_id';
                        $nextname='BLK';
                        break;
                    }
                    case 'BLK':{
                        $group='block_id';
                        $groupname='block_name';
                        $title='Block';
                        $nextid='block_id';
                        $nextname='SCH';
                        break;
                    }
                    case 'SCH':{
                        $group='school_id';
                        $groupname='school_name';
                        $title='School';
                        $nextid='';
                        $nextname='';
                        break;
                    }
                }
            }
            break;
        }
        case 6:{
            $group='school_id';
            $groupname='school_name';
            $title='School';
            $nextid='block_id';
            $nextname='SCH';
            break;
        }
        case 9:{
            $group='edu_dist_id';
            $groupname='edu_dist_name';
            $title='EDU District';
            $nextid='edu_dist_id';
            $nextname='BLK';
            if($this->uri->segment(3,0)!=null){
                switch($this->uri->segment(4,0)){
                    case 'BLK':{
                        $group='school_id';
                        $groupname='school_name';
                        $title='School';
                        $nextid='block_id';
                        $nextname='SCH';
                        break;
                    }
                    case 'SCH':{
                        $group='school_id';
                        $groupname='school_name';
                        $title='School';
                        $nextid='';
                        $nextname='';
                        break;
                    }
                }
            }
            break;
        }
        case 10:{
            $group='block_id';
            $groupname='block_name';
            $title='Block';
            $nextid='block_id';
            $nextname='SCH';
            if($this->uri->segment(3,0)!=null){
                switch($this->uri->segment(4,0)){
                    case 'SCH':{
                        $group='school_id';
                        $groupname='school_name';
                        $title='School';
                        $nextid='';
                        $nextname='';
                        break;
                    }
                }
            }
            break;
        }
        case 1:{
            $group='';
            $groupname='school_name';
            break;
        }
     }
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
                                        <h1>School Scheme Details - Report
                                            
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
                                            
                                           
                                       
                                           <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>School Scheme Details - Report</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                         
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                   
                                                                    <th style="text-align:center;">S.No</th>
                                                                    <th><?php echo($title); ?></th>
                                                                    <?php 
                                                                        $result = array();$key='fscheme_id';
                                                                        foreach($schemeedureport as $val) {
                                                                            if(array_key_exists($key, $val)){
                                                                                $result[$val[$key]][] = $val;
                                                                            }else{
                                                                                $result[""][] = $val;
                                                                            }
                                                                        }
                                                                        krsort($result);
                                                                        $thvalue=count($result);$thdis=array();
                                                                        foreach($result as $rkey => $groupval){
                                                                    ?>
                                                                    <th><?php echo($groupval[0]['scheme_name']); ?></th>
                                                                    <?php array_push($thdis,$rkey); } ?>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                                <?php  
                                                                        $i=1; 
                                                                        $result = array();$key=$group;
                                                                        foreach($schemeedureport as $val) {
                                                                            if(array_key_exists($key, $val)){
                                                                                $result[$val[$key]][] = $val;
                                                                            }else{
                                                                                $result[""][] = $val;
                                                                            }
                                                                        }
                                                                        krsort($result);
                                                                        $total=array();
                                                                        foreach($result as $rkey => $groupval){
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $i++; ?></td>
                                                                    <td><a href="<?php echo(base_url().'state/schemeedureport/'.$groupval[0][$nextid].'/'.$nextname); ?>"><?php echo $groupval[0][$groupname]; ?></a></td>
                                                                        <?php
                                                                            foreach($thdis as $th){
                                                                                $groupcat = array();$key='fscheme_id';
                                                                                foreach($groupval as $val) {
                                                                                    if(array_key_exists($key, $val)){
                                                                                        $groupcat[$val[$key]][] = $val;
                                                                                    }else{
                                                                                        $groupcat[""][] = $val;
                                                                                    }
                                                                                }
                                                                                if($groupcat[$th]!=null){
                                                                                foreach($groupcat[$th] as $gcount){
                                                                        ?>
                                                                        <td><?php echo($gcount['scheme_count']); $total[$th]+=$gcount['scheme_count']; ?></td>
                                                                        <?php
                                                                                }
                                                                                }else{ $total[$th]+=0;
                                                                        ?>
                                                                        <td>-</td>
                                                                        <?php
                                                                                }
                                                                                
                                                                            }
                                                                        ?>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                            
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="2">Total</th>
                                                                    <?php 
                                                                    foreach($total as $v){
                                                                    ?>
                                                                    <td><?php echo($v); ?></td>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tr>
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