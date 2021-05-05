<?php $next='';
                                                                
                                                                switch(1){
                                                                    case $this->session->userdata('emis_state_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='District';$index='district_name';$next='EDU';$idval='dist_id';
                                                                                break;
                                                                            }
                                                                            case 'EDU':{
                                                                                $title='Educational District';$index='edn_dist_name';$next='Block';$idval='edudistrict_id';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='Block';$index='block_name';$next='School';$idval='blk_id';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_district_id')!=null:{
                                                                         switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='Educational District';$index='edn_dist_name';$next='Block';$idval='edudistrict_id';
                                                                                break;
                                                                            }
                                                                            case 'EDU':{
                                                                                $title='Educational District';$index='edn_dist_name';$next='Block';$idval='edudistrict_id';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='Block';$index='block_name';$next='School';$idval='blk_id';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_deo_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='Block';$index='block_name';$next='School';$idval='blk_id';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='Block';$index='block_name';$next='School';$idval='blk_id';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_block_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_school_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case 0:{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='school_name';$idval='school_id';
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
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
        <?php 
            if($this->session->userdata('emis_state_id')!=null){
                $this->load->view('state/header.php');
            }
            elseif($this->session->userdata('emis_district_id')!=null){
                $this->load->view('Ceo_District/header.php');
            }
            elseif($this->session->userdata('emis_deo_id')!=null){
                $this->load->view('Deo_District/header.php');
            }
            elseif($this->session->userdata('emis_block_id')!=null){
                $this->load->view('block/header.php');
            }
            elseif($this->session->userdata('emis_school_id')!=null){
                $this->load->view('header.php');
            }
        
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
                                <div class="page-title">
                                    <h1> Renewal Summary- <?php echo($title); ?></h1>
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
                                              
                                            </div>
                                                  <div class="portlet box green">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-globe"></i><?php echo($title); ?> - Wise Renewal Summary</div>
                                                             
                                                            <div class="tools"> </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <?php
                                                                
                                                            if($dashboard!=null){    
                                                            ?>
                                                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                          
                                                                <thead>
                                                                    <tr class="portlet box green" >
                                                                    
                                                                        <th style="text-align: left;">S.No</th>
                                                                        <th style="text-align: left;"><?php echo($title); ?></th>
                                                                        <!----Generate Scheme Category------->
                                                                        <?php
                                                                            //print_r($dashboard); die();
                                                                            $dashcount=0;$dcount=0;
                                                                            foreach($dashboard as $titleget){
                                                                                if($dashcount<count($titleget)){
                                                                                    $dashcount=count($titleget);
                                                                                    $titleindex=$titleget;
                                                                                }
                                                                            }
                                                                            foreach($titleindex as $vi){ //$row=count($v);
                                                                                //print_r($vi);
                                                                                $dcount++;
                                                                                $discat=$vi['scheme_category']!=null?$vi['scheme_category']:'Count';
                                                                                if($title=='School'){$discat='Order';}
                                                                        ?>  
                                                                        <th style="text-align: left;"><?php echo($discat); ?></th>
                                                                        <?php }
                                                                                
                                                                        ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i=1; 
                                                                    foreach($dashboard as $d){
                                                                        $j=0;
                                                                        ?>  
                                                                          <tr>
                                                                                <th style="text-align: center;"><?php echo($i++); ?></th>
                                                                                <th style="text-align: left;"><a href="<?php if($next!=''){echo(base_url().'Block/getRenewalDash/'.$next.'/'.$d[0][$idval].'/'.$scheme_id);} ?>"><?php echo($d[0][$index]); ?></a></th>
                                                                                <?php foreach($d as $v){$app=$v['appli_count']!=null?$v['appli_count']:1; 
                                                                                    $actcount=($v['catcount']*$app);
                                                                                    $count[$j++]+=$actcount; 
                                                                                    if($title=='School' && $scheme_id!=2){
                                                                                        $finaltxt=base_url().'Basic/pdf/'.$v['school_id'].'/98/1';
                                                                                        $finaltxt='<span class="badge" style="cursor: pointer;" onclick="popuppdf(\''.$finaltxt.'\');">APPROVAL ORDER</span>';
                                                                                        $actcount=$finaltxt;
                                                                                    }
                                                                                ?>
                                                                                <th style="text-align: center;"><?php echo($actcount);?></th>
                                                                                <?php } 
                                                                                if($j<$dcount){
                                                                                        for($z=$j;$z<$dcount;$z++){
                                                                                ?>
                                                                                        <th style="text-align: center;">-</th>
                                                                                <?php
                                                                                        }
                                                                                    }
                                                                                ?>                                                                                                                                                 
                                                                          </tr>  
                                                                        <?php
                                                                    } ?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr class="bg-primary text-white">
                                                                        <th colspan="2" style="text-align: left;">Total</th>
                                                                        <?php foreach($count as $c => $total){ ?>
                                                                        <th style="text-align: center;"><?php echo($total); ?></th>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           
                                                </div>
                                                <div id="myModal" class="modal">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                    <div class="modal-body" id="modalbody" style="width: 100%;">
	                                                  <span style="font-size: 28px;font-weight: bold;cursor: pointer; float:right;" onclick="closefile('myModal');">&times;</span>
		                                              <table class="table">
                                                        <tr>
                                                            <td>
                                                                <object id="viewpdf" style="width:100%; min-height:500px;" src="" ></object>
                                                            </td>
                                                        </tr>                                                      
                                                      </table>
                                                    </div>
                                                    </div>
                                                </div>                                                                                                                                                                                                                        
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
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS ----->
        <script>
        function popuppdf(url) {
            document.getElementById('viewpdf').setAttribute('data',url);
            document.getElementById('myModal').style.display='block';
            return true;
        }
        function closefile(closeDialog) {
            document.getElementById(closeDialog).style.display='none';
        }
        </script>
    </body>
</html>