<?php
    $next = '';
    $part = $this->uri->segment(3,0);
    switch(1) {
        case $this->session->userdata('emis_state_id')!=null:{
            switch($part) {
                case '0': {
                    $title = 'District';
                    $disname = 'district_name';
                    $a = 'Total School Count';
                    $b = 'schoolcount';
                    $next = 'block';
                    $val1 = 'district_id';
                    
                    
                    break;
                }
                case 'block': {
                    $title = 'Block';
                    $disname = 'block_name';
                    $a = 'Total School Count';
                    $b = 'schoolcount';
                    $next = 'school';
                    $val1 = 'block_id';
                    
                    break;
                }
                case 'school': {
                    $title = 'Schools';
                    $disname = 'school_name';
                    $a = 'Udise Code';
                    $b = 'udise_code';
                    $val1 = 'school_id';
                    
                    break;
                }
           } 
           break;
      }
      
      case $this->session->userdata('emis_district_id')!=null: {
            switch($part) {
                case '0': {
                    $title = 'District';
                    $disname = 'district_name';
                    $a = 'Total School Count';
                    $b = 'schoolcount';
                    $next = 'block';
                    $val1 = 'district_id';
                    break;
                    
                }
                case 'block': {
                    $title = 'Block';
                    $disname = 'block_name';
                    $a = 'Total School Count';
                    $b = 'schoolcount';
                    $next = 'school';
                    $val1 = 'block_id';
                    break;
                }
                case 'school': {
                    $title = 'Schools';
                    $disname = 'school_name';
                    $a = 'Udise Code';
                    $b = 'udise_code';
                    $val1 = 'school_id';
                    break;
                }
                
                
            }
            break;
      }
      
      case $this->session->userdata('emis_deo_id')!=null: {
        switch($part) {
            case '0': {
                    $title = 'Block';
                    $disname = 'block_name';
                    $a = 'Total School Count';
                    $b = 'schoolcount';
                    $c = 'DEO Verified';
                    $next = 'school';
                    $val1 = 'block_id';
                    break;
                    
                }
                case 'block': {
                    $title = 'Block';
                    $disname = 'block_name';
                    $a = 'Total School Count';
                    $b = 'schoolcount';
                    $next = 'school';
                    $val1 = 'block_id';
                    break;
                }
                case 'school': {
                    $title = 'Schools';
                    $disname = 'school_name';
                    $a = 'Udise Code';
                    $b = 'udise_code';
                    $val1 = 'school_id';
                    break;
                }
        }
        break;
      }
      
      
      case $this->session->userdata('emis_block_id')!=null: {
        switch($part){
            case '0': {
                    $title = 'Schools';
                    $disname = 'school_name';
                    $a = 'Udise Code';
                    $b = 'udise_code';
                    $next = 'school';
                    $val1 = 'school_id';
                    break;
                    
                }
                case 'block': {
                    $title = 'Schools';
                    $disname = 'school_name';
                    $a = 'Udise Code';
                    $b = 'udise_code';
                    $next = 'school';
                    $val1 = 'school_id';
                    break;
                }
                case 'school': {
                    $title = 'Schools';
                    $disname = 'school_name';
                    $a = 'Udise Code';
                    $b = 'udise_code';
                    $val1 = 'school_id';
                    break;
                }
        }
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
                                            
                                           
                                       
                                           <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>School Device Details - Verification Report</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <form id="formid"> 
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                   
                                                                    <th style="text-align:center;">S.No</th>
                                                                    <th ><?php echo $title; ?></th>
                                                                    <th style="text-align: center;"><?php echo $a; ?></th>
                                                                    <?php   
                                                                    if($this->uri->segment(3,0) =='school') {
                                                                      
                                                                     foreach($head as $profhead){ ?>
                                                                     
                                                                    <th><?php echo $profhead->module;?></th>
                                                                    
                                                                    <?php } } ?>
                                                                    <?php 
                                                                        $x=[6,10,9];
                                                                        $y=[6  => 'BEO',
                                                                            10 => 'DEO',
                                                                            9  => 'CEO'];
                                                                        $l = array_search($this->session->userdata('emis_user_type_id'),$x);
                                                                        for($i=-1;($i<$l) && ($this->uri->segment(3,0) =='school');$i++){
                                                                    ?>
                                                                        <th><?php echo $y[$x[$i+1]]; ?> Verified</th> 
                                                                    <?php } //echo ('Search='.$l); die();
                                                                         ?>
                                                                </tr>
                                                                
                                                            </thead>
                                                            
                                                            <tbody >
                                                                <?php $sclcount=0; $k=1; $j=1; 
                                                                    
                                                                    $comlist = array();$key='school_id';
                                                                        foreach($complist as $val) {
                                                                            if(array_key_exists($key, $val)){
                                                                                $comlist[$val[$key]][] = $val;
                                                                            }else{
                                                                                $comlist[""][] = $val;
                                                                            }
                                                                        }
                                                                        krsort($comlist);
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    foreach($comlist as $prolist){ ?>
                                                                <tr>
                                                                    <td style="text-align:center;"><?php echo $k++; ?></td>
                                                                    <td ><a href="<?php if($next!=''){echo base_url().'State/schoolprofileverifcation/'.$next.'/'.$prolist[0][$val1];} ?>"><?php echo $prolist[0][$disname]; ?></a></td>
                                                                    <td style="text-align: center;"><?php echo $prolist[0][$b]; $sclcount+=$prolist[0][$b]; ?></td>
                                                                    <?php if($this->uri->segment(3,0) == 'school') {
                                                                            $modlist = array();$key='module_id';
                                                                            foreach($prolist as $val) {
                                                                                if(array_key_exists($key, $val)){
                                                                                    $modlist[$val[$key]][] = $val;
                                                                                }else{
                                                                                 $modlist[""][] = $val;
                                                                                }
                                                                            }
                                                                            krsort($modlist);
                                                                              
                                                                            $mods = array();
                                                                            foreach($modlist as $mod){
                                                                                $mods[]=$mod[0]['module_id'];
                                                                            }  
                                                                            
                                                                    
                                                                    ?>
                                                                    <td style="text-align: center;"><input <?php echo((in_array(1,$mods)?'checked':'')); ?> type="checkbox" id="<?php echo $prolist[0]['school_id'];?>_1" name="<?php echo $prolist[0]['school_id'];?>_1" value="1"></td>
                                                                    <td style="text-align: center;"><input <?php echo((in_array(2,$mods)?'checked':'')); ?> type="checkbox" id="<?php echo $prolist[0]['school_id'];?>_2" name="<?php echo $prolist[0]['school_id'];?>_2" value="2"></td>
                                                                    <td style="text-align: center;"><input <?php echo((in_array(3,$mods)?'checked':'')); ?> type="checkbox" id="<?php echo $prolist[0]['school_id'];?>_3" name="<?php echo $prolist[0]['school_id'];?>_3" value="3"></td>
                                                                    <td style="text-align: center;"><input <?php echo((in_array(4,$mods)?'checked':'')); ?> type="checkbox" id="<?php echo $prolist[0]['school_id'];?>_4" name="<?php echo $prolist[0]['school_id'];?>_4" value="4"></td>
                                                                    <td style="text-align: center;"><input <?php echo((in_array(5,$mods)?'checked':'')); ?> type="checkbox" id="<?php echo $prolist[0]['school_id'];?>_5" name="<?php echo $prolist[0]['school_id'];?>_5" value="5"></td>
                                                                    <td style="text-align: center;"><input <?php echo((in_array(6,$mods)?'checked':'')); ?> type="checkbox" id="<?php echo $prolist[0]['school_id'];?>_6" name="<?php echo $prolist[0]['school_id'];?>_6" value="6"></td>
                                                                    <td style="text-align: center;"><input <?php echo((in_array(7,$mods)?'checked':'')); ?> type="checkbox" id="<?php echo $prolist[0]['school_id'];?>_7" name="<?php echo $prolist[0]['school_id'];?>_7" value="7"></td>
                                                                    <td style="text-align: center;"><input <?php echo((in_array(8,$mods)?'checked':'')); ?> type="checkbox" id="<?php echo $prolist[0]['school_id'];?>_8" name="<?php echo $prolist[0]['school_id'];?>_8" value="8"></td>
                                                                    <?php  for($i=-1;($i<$l) && ($this->session->userdata('emis_user_type_id')!=5);$i++){
                                                                        //print_r($mods);
                                                                        //print_r($x[$i+1]);
                                                                        if($x[$i+1]!=$this->session->userdata('emis_user_type_id')){
                                                                            
                                                                            if(in_array(1,$mods) && in_array(2,$mods) && in_array(3,$mods) && in_array(4,$mods) && 
                                                                            in_array(5,$mods) && in_array(6,$mods) && in_array(7,$mods) && in_array(8,$mods) && $prolist[0]['verification']==6){
                                                                                
                                                                                echo '<td>'.$y[$x[$i+1]].' Completed'.'</td>';
                                                                            }else{
                                                                                echo '<td>'.'Kindly Complete the school details.'.$y[$x[$i+1]].'Side.'.'</td>';
                                                                            }
                                                                        }else{
                                                                            
                                                                        
                                                                    ?>
                                                                    <td><button type="button" id="beoverify" name="beoverify" class="btn green btn-md" onclick="usersubmit(this);">Verify</button></td>
                                                                    <?php }} ?>
                                                                    <?php } //print_r($mod);die();?>
                                                                </tr>
                                                                <?php unset($mods); } $j++; ?>
                                                            </tbody>
                                                            <?php if($this->uri->segment(3,0) != 'school'){?>
                                                            <tfoot>
                                                                <tr>
                                                                    <th style="text-align: center;">Total</th>
                                                                    <th></th>
                                                                    <th style="text-align: center;"><?php echo ($this->uri->segment(3,0)!='school'?$sclcount:''); ?></th>
                                                                </tr>
                                                            </tfoot> 
                                                            <?php } ?>
                                                        </table>
                                                       </form>
                                                       <!--<?php if($this->uri->segment(3,0) == 'school' && $this->session->userdata('emis_user_type_id')!=5){?>
                                                       <div style="text-align: center;">
                                                        <button class="btn btn-success"  onclick="usersubmit();">Submit</button>
                                                       </div>
                                                      <?php } ?>-->
                                                      
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

    function usersubmit(node) {
        var jsArray= new Array();
        var verification = <?php echo $this->session->userdata('emis_user_type_id'); ?>;
        var emisuserid      = <?php echo $this->session->userdata('emis_user_sno'); ?>;
        var z=0;
        var sp='';        
        var prnode=node.parentNode.parentNode;
        for(var i=3;i<11;i++){
            if(prnode.children[i].children[0].checked){
                jsArray[z]={};
                sp = prnode.children[i].children[0].name.split('_');
                jsArray[z]['school_key_id'] = sp[0];
                jsArray[z++]['module_id'] = sp[1];
                jsArray[0]['verification'] = verification;
                jsArray[0]['emis_sno'] = emisuserid;
                jsArray[prnode.children[i].children[0].name]=prnode.children[i].children[0].value;
            
            }
        }
        var js = JSON.stringify(jsArray);
        //alert(js);
        //return false;
        $.ajax({
                type: "POST",
                url : baseurl+'State/beoverify',
                data: "&js="+js,
                success: function(resp) {
                    //alert(resp);
                    swal("OK", "Successfully Verified", "success");
                    return true;
                },
                error: function(e){
                    alert('Error: ' + e.responseText);
                    return false;
                }
            });
        
    }

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