<?php $next=''; 
      $selectedSchemeName = '';
      $class_roma = array('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');

                                                                switch(1){
                                                                    case $this->session->userdata('emis_state_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='District';$index='District';$next='EDU';$idval='district_id';
                                                                                break;
                                                                            }
                                                                            case 'EDU':{
                                                                                $title='Educational District';$index='EduDist';$next='School';$idval='edu_dist_id';
                                                                                break;
                                                                            }
                                                                            // case 'Block':{
                                                                            //     $title='Block';$index='Block';$next='School';$idval='block_id';
                                                                            //     break;
                                                                            // }
                                                                            case 'School':{
                                                                                $title='School';$index='School';$idval='schoolid';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_district_id')!=null:{
                                                                         switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='Educational District';$index='EduDist';$next='Block';$idval='edu_dist_id';
                                                                                break;
                                                                            }
                                                                            case 'EDU':{
                                                                                $title='Educational District';$index='EduDist';$next='Block';$idval='edu_dist_id';
                                                                                break;
                                                                            }
                                                                            // case 'Block':{
                                                                            //     $title='Block';$index='Block';$next='School';$idval='block_id';
                                                                            //     break;
                                                                            // }
                                                                            case 'School':{
                                                                                $title='School';$index='School';$idval='schoolid';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_deo_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='Block';$index='Block';$next='School';$idval='block_id';
                                                                                break;
                                                                            }
                                                                            // case 'Block':{
                                                                            //     $title='Block';$index='Block';$next='School';$idval='block_id';
                                                                            //     break;
                                                                            // }
                                                                            case 'School':{
                                                                                $title='School';$index='School';$idval='schoolid';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_block_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='School';$index='School';$idval='schoolid';
                                                                                break;
                                                                            }
                                                                            // case 'Block':{
                                                                            //     $title='School';$index='School';$idval='schoolid';
                                                                            //     break;
                                                                            // }
                                                                            case 'School':{
                                                                                $title='School';$index='School';$idval='schoolid';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_school_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case 0:{
                                                                                $title='School';$index='School';$idval='schoolid';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='School';$idval='schoolid';
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
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
        <style type="text/css">
            /* #breadcrumbs{
                padding:0.5% 2.5%;
                background-color:#2bbaa5;
                width:97.6%;
                margin-left:1.2%;
                color:whitesmoke;
            }
            #breadcrumbs a{
                color:whitesmoke;
                padding:2px;
            } */
        
            #breadcrumbs{
                color:#2bbaa5;
            }
            #breadcrumbs a{
                        color:#2bbaa5;
                        padding:2px;
            }
        
        </style>
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
        <?php 
            $this->load->view('allheader.php');
        ?>
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
                                <div class="page-title"  id="page-title">
                                    <h1> DSE <?php echo($title); ?> Wise - Distribution List </h1>
                                    <small id="breadcrumbs">
                                                            <?php 
                                                            if($providing_list!=null){
                                                                foreach($providing_list as $bread){
                                                                     
                                                                    //  print_r($bread->district_id);
                                                                     $breadcrumbs='';
                                                                     $crumbs_district = '<a href="'.base_url().'Basic/dse_providing_list/0/0/'.$this->uri->segment(5,0).'/'.$this->uri->segment(6,0).'">District</a> &GreaterGreater;';
                                                                     $crumbs_edudistrict = '<a href="'.base_url().'Basic/dse_providing_list/EDU/'.$bread->district_id.'/'.$this->uri->segment(5,0).'/'.$this->uri->segment(6,0).'">Educational District</a> &GreaterGreater;';
                                                                    //  $crumbs_block = '<a href="'.base_url().'Basic/providing_list/Block/'.$bread->edu_dist_id.'/'.$this->uri->segment(5,0).'/'.$this->uri->segment(6,0).'/1'.'">Block</a> &GreaterGreater;';
                                                                     $crumbs_school = 'School'; 
                                                                     break;
                                                                }
                                                                if($this->session->userdata('user_type')==5){
                                                                    $breadcrumbs=$crumbs_district;
                                                                    if($this->uri->segment(3,0)=='EDU'){
                                                                        $breadcrumbs.=$crumbs_edudistrict;
                                                                    // }elseif($this->uri->segment(3,0)=='Block'){
                                                                    //     $breadcrumbs.=$crumbs_edudistrict.$crumbs_block;
                                                                    }elseif($this->uri->segment(3,0)=='School'){
                                                                        // $breadcrumbs.=$crumbs_edudistrict.$crumbs_block.$crumbs_school;
                                                                        $breadcrumbs.=$crumbs_edudistrict.$crumbs_school;
                                                                    }
                                                                }
                                                                else{
                                                                    if($this->session->userdata('user_type')==9 || $this->session->userdata('user_type')==3){
                                                                        $breadcrumbs='District &GreaterGreater;'.$crumbs_edudistrict;
                                                                    }
                                                                    elseif($this->session->userdata('user_type')==10){
                                                                        $breadcrumbs='Education District &GreaterGreater;';
                                                                    }
                                                                    elseif($this->session->userdata('user_type')==6 || $this->session->userdata('user_type')==2){
                                                                        $breadcrumbs='Block &GreaterGreater;'.$crumbs_school;
                                                                    }
                                                                }
                                                                if($this->session->userdata('user_type')!=5){
                                                                    if($this->uri->segment(3,0)=='EDU'){
                                                                        $breadcrumbs.=$crumbs_edudistrict;
                                                                    // }elseif($this->uri->segment(3,0)=='Block'){
                                                                    //     $breadcrumbs.=$crumbs_block;
                                                                    }elseif($this->uri->segment(3,0)=='School'){
                                                                        // $breadcrumbs.=$crumbs_block.$crumbs_school;
                                                                        $breadcrumbs.=$crumbs_school;
                                                                    }
                                                                }
                                                                echo($breadcrumbs);
                                                            }
                                                            ?>
                                    </small>
                                </div>
                                <!-- END PAGE TITLE -->
                                <!-- BEGIN PAGE TOOLBAR -->
                                <div class="page-toolbar"></div>
                                <!-- END PAGE TOOLBAR -->
                            </div>
                        </div>
                        <!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE CONTENT BODY -->
                        <div class="page-content"><div></div> 
                            <div class="container">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="page-content-inner">
                                                    
                                                    <?php 
                                                        if($this->session->userdata('emis_state_id')!=null){
                                                            //$this->load->view('state/emis_state_profile_header1');
                                                        }
                                                        elseif($this->session->userdata('emis_district_id')!=null){
                                                            //$this->load->view('Ceo_District/emis_district_profile_header');
                                                        }
                                                        elseif($this->session->userdata('emis_deo_id')!=null){
                                                            //$this->load->view('Deo_District/header.php');
                                                        }
                                                        elseif($this->session->userdata('emis_block_id')!=null){
                                                            //$this->load->view('block/emis_block_profile_header');
                                                        }
                                                        elseif($this->session->userdata('emis_school_id')!=null){
                                                            //$this->load->view('emis_school_profile_header1');
                                                        }
                                                    ?>
                                                    <div class="portlet light portlet-fit ">
                                                        <?php if($this->session->flashdata('errors')){?>
                                                        <div class="portlet-body">
                                                            <div class ="row">
                                                                <div class="col-md-4">
                                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } $user_type_id = $this->session->userdata('emis_user_type_id'); 
                                                                $selectedSchemeName = searchForSchemeData($schemeid, $scheme,'scheme_name'); 
                                                                $min_class = searchForSchemeData($schemeid, $scheme,'appli_lowclass');
                                                                $max_class = searchForSchemeData($schemeid, $scheme,'appli_highclass');?> 
                                                        <div class="row">
                                                        <div class="col-md-12">
                                                        <form id="text_form_id" name="text_form_id" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                                                    <table class="table table-striped">
                                                                        <tr>
                                                                            <th style="width:300px;" id="th_scheme">
                                                                                <label class="control-label bold">Scheme Names</label>
                                                                                <select class="form-control"  id="scheme_name" name="schname">
                                                                                    <option value=""><br/>Choose Scheme</option>
                                                                                    <?php foreach($scheme as $s){ ?>
                                                                                        <option value="<?php echo($s->id); ?>" data-low="<?php echo($s->appli_lowclass); ?>" data-high="<?php echo($s->appli_highclass); ?>" <?php if($schemeid==$s->id){echo('selected');} ?> ><?php echo($s->scheme_name); ?></option>
                                                                                    <?php } ?>
                                                                                </select>     
                                                                            </th>
                                                                            <th style="width:300px;" id="th_medium">
                                                                                <label class="control-label bold">Medium Of Instruction</label>
                                                                                <select class="form-control"  id="medium_name" name="medname">
                                                                                    <option value="">Choose Medium</option>
                                                                                    <?php foreach($mediumofinstruction as $M){ 
                                                                                        if($M->MEDINSTR_ID != 98){ ?>
                                                                                    
                                                                                            <option value="<?php echo($M->MEDINSTR_ID); ?>"  <?php if($mediumid==$M->MEDINSTR_ID){echo('selected');} ?> ><?php echo($M->MEDINSTR_DESC);?></option>
                                                                                    <?php }} ?>
                                                                                </select> 
                                                                            </th>
                                                                            <th id="th_set" style="width:300px;">
                                                                                            <label class="control-label bold">Sets</label>
                                                                                            <select class="form-control"  id="set_name" name="set">
                                                                                            <option value="">Choose Set</option>
                                                                                            <?php for($i=1;$i<=4;$i++){ ?>
                                                                                                <option value="<?php echo $i; ?>"  <?php if($setid==$i){echo('selected');} ?> ><?php echo 'Set '.$i ?></option>  
                                                                                            <?php } ?>
                                                                                            </select> 
                                                                            </th>
                                                                            <th style="padding-top: 12.5px;" id="th_btn_submit">
                                                                                <br />
                                                                                <button type="submit" id="dee_rpt_btn_submit" name="dee_rpt_btn_submit" class="btn green btn-md">Submit</button>
                                                                            </th>
                                                                        </tr>
                                                                    </table>
                                                                </form>
                                                        </div>
                                                    </div>
                                                </div>         
                                            </div>
                                                  <div class="portlet box green">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                            <!-- <i class="fa fa-globe"></i><?php echo($title); ?> Wise - Distribution List</div> -->
                                                            <i class="fa fa-globe"></i> <?php echo ($selectedSchemeName); ?> Distribution - <?php echo($title); ?> Wise </div>
                                                            <div class="tools"> </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <?php if($providing_list!=null){  ?>
                                                            <!--class="table table-striped table-bordered table-hover district" id="sample_3" style="text-align: center;" -->
                                                            <table class="table table-striped table-bordered table-hover" id="sample_3" style="text-align: center;">
                                                                                            
                                                                                            <thead>
                                                                                                <tr class="portlet box green" >    
                                                                                                    <th style="text-align: left;">S.No</th>
                                                                                                    <th style="text-align: left;"><?php echo($title); ?></th>
                                                                                                    <?php $class=$min_class; for($i=$min_class;$i<=$max_class;$i++){ 
                                                                                                          $class_roman_name = array_search($class,$class_roma); ?>
                                                                                                    <th colspan="3" style="text-align: center;"><?php echo $class_roman_name;$class++; ?></th>
                                                                                                    <?php } ?>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th>&nbsp;</th>
                                                                                                    <th>&nbsp;</th>
                                                                                                    <?php for($i=$min_class;$i<=$max_class;$i++){ ?>
                                                                                                        <th class="sum">Enrollment</th>                                            
                                                                                                        <th class="sum">Dispatched</th>
                                                                                                        <th class="sum">Distributed</th>
                                                                                                    <?php }?>
                                                                                                </tr>
                                                                                            </thead>

                                                                                            <tbody>
                                                                                            <?php $sno = 1;
                                                                                                foreach($providing_list as $key=>$value) {
                                                                                                    $sid = $schemeid != null ? $schemeid : 0;
                                                                                                    if($schemeid == 1) $dyn = $this->uri->segment(5,0)!=0 ? $this->uri->segment(5,0) : $setid;
                                                                                                    else $dyn = 0;
                                                                                                    ?>
                                                                                                <tr>    
                                                                                                        <td style="text-align: center;"><?php echo($sno); ?></td>
                                                                                                        <td style="text-align: left;">
                                                                                                                <?php if($next!=''){ ?>
                                                                                                                    <a href="<?php echo(base_url().'Basic/dse_providing_list/'.$next.'/'.$value->$idval.'/'.$dyn.'/'.$sid); ?>">
                                                                                                                <?php echo($value->$index); ?></a><?php } else{echo($value->$index);} ?>
                                                                                                        </td>
                                                                                                        <?php for($i=$min_class;$i<=$max_class;$i++){
                                                                                                            $class_des = 'Class'.$i.'_Despatched';
                                                                                                            $class_eli = 'Class'.$i.'_Eligible';
                                                                                                            $class_dis = 'Class'.$i.'_Distributed';  ?>
                                                                                                        <td style="text-align: center;"><?php echo $value->$class_eli; ?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value->$class_des; ?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value->$class_dis; ?></td>
                                                                                                        <?php } ?>
                                                                                                </tr>
                                                                                            <?php $sno++; } ?>
                                                                                            </tbody>
                                                                                            
                                                                                              <tfoot>
                                                                                                    <tr class="bg-primary text-white">
                                                                                                    <td colspan="2" style="text-align: left;">Total</td>    
                                                                                                    <?php for($i=$min_class;$i<=$max_class;$i++){ ?>
                                                                                                        <td style="text-align: center;"></td>
                                                                                                        <td style="text-align: center;"></td>
                                                                                                        <td style="text-align: center;"></td>
                                                                                                    <?php } ?>
                                                                                                    </tr>
                                                                                             </tfoot>
                                                            </table>
                                                            <?php } else { echo "No data found";}?>

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
        <?php $this->load->view('scripts.php');

        function searchForSchemeData($id, $array,$key) {
            foreach ($array as $val) {
                if ($val->id === $id) {
                    return $val->$key;
                }
            }
            return null;
         }
        ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
            <!-- DataTable Scripts-->
            <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
            <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
            <!-- ends of DataTable Scripts-->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script>

        /*** On ready For Hide Medium Field */
        $(document).ready(function(){
            $("#appli_class option[value*='9']").hide();
            var scheme_drop_id = $('#scheme_name').val();
            scheme_drop_id == 9 ? $("#th_medium").show() : $("#th_medium").hide();
            scheme_drop_id == 1 ? $("#th_set").show() : $("#th_set").hide();
            // $('#scheme_name :selected').text();
            var x_scroll_status = (scheme_drop_id == 5 || scheme_drop_id == 10 || scheme_drop_id == 11 ? false : true );
            sum_dataTable('#sample_3',x_scroll_status);
	    });

        /*** On change For Show And Hide Medium Field */
        $('#scheme_name').change(function() {
            var val = $(this).val();
            val == 9 ? $("#th_medium").show() : $("#th_medium").hide();
            if(val != 9) $('#medium_name').val('');
            val == 1 ? $("#th_set").show() : $("#th_set").hide();
            if(val != 1) $('#set_name').val('');
        });

        /*** On click For Validate the Field */
        $('#dee_rpt_btn_submit').click(function(){
            if($("option:selected", $("#scheme_name")).val() == "")
            {
                alert('Please Select Scheme');
                $("#scheme_name").focus();
                return false;
            }
            if($("option:selected", $("#scheme_name")).val() == 9){
                if($("option:selected", $("#medium_name")).val() == "")
                {
                    alert('Please Select Medium Of Instruction');
                    $("#medium_name").focus();
                    return false;
                }
            }
            if($("option:selected", $("#scheme_name")).val() == 1){
                if($("option:selected", $("#set_name")).val() == ""){
                            alert('Please Select Sets');
                            $("#set_name").focus();
                            return false;
                }
            }
        });

                /*** Datatable to sum and display on tfoot */
                function sum_dataTable(dataId,x_status){
                    
                    var table = $(dataId).DataTable({
                        "fnInitComplete": function(){
                                /**  Disable TBODY scoll bars */
                                $('.dataTables_scrollBody').css({
                                    'overflow': 'hidden',
                                    'border': '0'
                                });
                                /**  Enable TFOOT scoll bars */
                                $('.dataTables_scrollFoot').css('overflow', 'auto');                                  
                                /**  Sync TFOOT scrolling with TBODY */
                                $('.dataTables_scrollFoot').on('scroll', function () {
                                    $('.dataTables_scrollBody').scrollLeft($(this).scrollLeft());
                                });                    
                        },
                        "dom": 'Bfrtip',
                        "scrollX": x_status,
                        "scrollCollapse": true,            
                        "buttons": [
                                { extend: 'print', className: 'btn default' },
                                { extend: 'pdf', className: 'btn default' },
                                { extend: 'csv', className: 'btn default' ,filename: function(){ return 'EMIS TN Schools DSE <?php echo($title); ?> Wise - <?php echo ($selectedSchemeName)?> Distribution List';}}                                                                           
                        ],          
                    "footerCallback": function ( row, data, start, end, display ) {
                            this.api().columns('.sum').every(function () {
                                var column = this;
                                var intVal = function ( i ) {
                                    return typeof i === 'string' ?
                                        i.replace(/[\$,]/g, '')*1 :
                                        typeof i === 'number' ?
                                            i : 0;
                                };
                                var sum = column
                                .data()
                                .reduce(function (a, b) { 

                                    a = intVal(a, 10);
                                    if(isNaN(a)){ a = 0; }
                                    
                                    b = intVal(b, 10);
                                    if(isNaN(b)){ b = 0; }
                                    
                                    return a + b;
                                });
                                column.selector.opts.page='current';
                                var currentPage = column
                                .data()
                                .reduce(function (a, b) { 
                                    a = parseInt(a, 10);
                                    if(isNaN(a)){ a = 0; }
                                    
                                    b = parseInt(b, 10);
                                    if(isNaN(b)){ b = 0; }
                                    
                                    return a + b;
                                });
                                $(column.footer()).html(sum);
                                });
                            }
                        });
                    }
         </script>
        <!-- END PAGE LEVEL SCRIPTS ----->
    </body>
</html>