<?php $next='';
                                                                
        switch(1)
		{
            case $this->session->userdata('emis_state_id')!=null:
			{
                switch($this->uri->segment(3,0))
				{
                    case '0':
					{
                        $title='District';$index='district_name';$next='EDU';$idval='dist_id';
                        break;
                    }
                    case 'EDU':
					{
                        $title='Educational District';$index='edn_dist_name';$next='Block';$idval='edudistrict_id';
                        break;
                    }
                    case 'Block':
					{
                        $title='Block';$index='block_name';$next='School';$idval='blk_id';
                        break;
                    }
                    case 'School':
					{
                        $title='School';$index='school_name';$idval='school_id';
                         break;
                    }
                }
                break;
            }
            case $this->session->userdata('emis_district_id')!=null:
			{
                switch($this->uri->segment(3,0))
				{
                    case '0':
					{
                        $title='Educational District';$index='edn_dist_name';$next='Block';$idval='edudistrict_id';
                        break;
                    }
                    case 'EDU':
					{
                        $title='Educational District';$index='edn_dist_name';$next='Block';$idval='edudistrict_id';
                        break;
                    }
                    case 'Block':
					{
                        $title='Block';$index='block_name';$next='School';$idval='blk_id';
                        break;
                    }
                    case 'School':
					{
                        $title='School';$index='school_name';$idval='school_id';
                        break;
                    }
                }
                 break;                                                      
            }
            case $this->session->userdata('emis_deo_id')!=null:
			{
                switch($this->uri->segment(3,0))
				{
                    case '0':
					{
                        $title='Block';$index='block_name';$next='School';$idval='blk_id';
                        break;
                    }
                    case 'Block':
					{
                        $title='Block';$index='block_name';$next='School';$idval='blk_id';
                        break;
                    }
                    case 'School':
					{
                        $title='School';$index='school_name';$idval='school_id';
                        break;
                    }
                }
                 break;
            }
            case $this->session->userdata('emis_block_id')!=null:
			{
                switch($this->uri->segment(3,0))
				{
                    case '0':
					{
                        $title='School';$index='school_name';$idval='school_id';
                        break;
                    }
                    case 'Block':
					{
                        $title='School';$index='school_name';$idval='school_id';
                        break;
                    }
                    case 'School':
					{
                        $title='School';$index='school_name';$idval='school_id';
                        break;
                    }
                }
                break;
            }
            case $this->session->userdata('emis_school_id')!=null:
			{
                switch($this->uri->segment(3,0))
				{
                    case 0:
				    {
                        $title='School';$index='school_name';$idval='school_id';
                        break;
                    }
                    case 'School':
					{
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
        <style type="text/css">
            #breadcrumbs{
                padding:0.5% 2.5%;
                background-color:#2bbaa5;
                width:97.6%;
                margin-left:1.2%;
                color:whitesmoke;
            }
            #breadcrumbs a{
                color:whitesmoke;
                padding:2px;
            }
        </style>
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
        <?php 
            $this->load->view('allheader.php');
            /*if($this->session->userdata('emis_state_id')!=null){
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
            }*/
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
                                  <h1> Scheme <?php echo($this->uri->segment(6,0)!=0?'Distribution':'Indent'); ?> Summary- <?php echo($title); ?></h1> 
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
                                                        <div class="portlet-body">
                                                            <div class ="row">
                                                                <div class="col-md-4">
                                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form id="free_scheme_indent" name="free_scheme_indent" method="post" action="<?php  echo $_SERVER['REQUEST_URI']; ?>">
                                                                <table class="table table-striped">
                                                                    <tr>
                                                                        <th>
                                                                            <label class="control-label bold">Scheme Names</label>
                                                                            <select class="form-control"  id="scheme_name" name="schname" onchange="setApplicableClass(this)" >
                                                                                <option value=""><br/>Choose Scheme</option>
                                                                                <?php foreach($scheme as $s){ ?>
                                                                                <option value="<?php echo($s->id); ?>" data-low="<?php echo($s->appli_lowclass); ?>" data-high="<?php echo($s->appli_highclass); ?>" <?php if($scheme_id==$s->id){echo('selected');} ?> ><?php echo($s->scheme_name); ?></option>
                                                                                <?php } ?>
                                                                            </select> 
                                                                        </th>
                                                                        <th>
                                                                            <br />
                                                                           
                                                                            <input type="hidden" id="hdsearch" value="<?php echo($scheme_id); ?>" />
                                                                            <button type="submit" id="emis_stu_searchsep_sub" name="emis_stu_searchsep_sub" class="btn green btn-md">Submit</button>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </form>
                                                        </div>
                                                        <div id="breadcrumbs">
                                                            <?php 
                                                                foreach($dashboard as $bread){
                                                                    $breadcrumbs='';
                                                                    $distribu=$this->uri->segment(6,0)!=0?1:'';
                                                                    $crumbs_district = '<a href="'.base_url().'Basic/calldashboard/0/0/'.$this->uri->segment(5,0).'/'.$distribu.'">District</a> &GreaterGreater;';
                                                                    $crumbs_edudistrict = '<a href="'.base_url().'Basic/calldashboard/EDU/'.$bread[0]['dist_id'].'/'.$this->uri->segment(5,0).'/'.$distribu.'">Educational District</a> &GreaterGreater;';
                                                                    $crumbs_block = '<a href="'.base_url().'Basic/calldashboard/Block/'.$bread[0]['edudistrict_id'].'/'.$this->uri->segment(5,0).'/'.$distribu.'">Block</a> &GreaterGreater;';
                                                                    $crumbs_school = 'School'; 
                                                                    break;
                                                                }
                                                                if($this->session->userdata('user_type')==5){
                                                                    $breadcrumbs=$crumbs_district;
                                                                    if($this->uri->segment(3,0)=='EDU'){
                                                                        $breadcrumbs.=$crumbs_edudistrict;
                                                                    }elseif($this->uri->segment(3,0)=='Block'){
                                                                        $breadcrumbs.=$crumbs_edudistrict.$crumbs_block;
                                                                    }elseif($this->uri->segment(3,0)=='School'){
                                                                        $breadcrumbs.=$crumbs_edudistrict.$crumbs_block.$crumbs_school;
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
                                                                    }elseif($this->uri->segment(3,0)=='Block'){
                                                                        $breadcrumbs.=$crumbs_block;
                                                                    }elseif($this->uri->segment(3,0)=='School'){
                                                                        $breadcrumbs.=$crumbs_block.$crumbs_school;
                                                                    }
                                                                }
                                                                echo($breadcrumbs);
                                                            ?>
                                                               
                                                        </div>
                                                    </div>
                                                </div>         
                                            </div>
                                                  <div class="portlet box green">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-globe"></i><?php echo($title); ?> - Wise <?php echo($this->uri->segment(6,0)!=0?'Distribution':'Indent'); ?> Summary</div>
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
                                                                            $gender_scheme=[1,2,10,12,16,18]; 
                                                                            $dashcount=0;$dcount=0;$idx=array();
                                                                            foreach($dashboard as $titleget){
                                                                                foreach($titleget as $ti){
                                                                                    if(!in_array($ti['scheme_category'],$idx)){
                                                                                        array_push($idx,$ti['scheme_category']);
                                                                                    }
                                                                                }
                                                                            }
                                                                            $class=array();$colspan='';
                                                                            if($scheme_id==9){
                                                                                foreach($dashboard as $textclass){
                                                                                    foreach($textclass as $cls){
                                                                                        if(!in_array($cls['class_studying'],$class)){
                                                                                            array_push($class,$cls['class_studying']);
                                                                                        }
                                                                                    }  
                                                                                }
                                                                                $colspan='colspan="'.count($class).'"';
                                                                            }
                                                                            
                                                                            //print_r($idx);
                                                                            //die();
                                                                            foreach($idx as $vi){ 
                                                                                $dcount++;
                                                                                $vi=($vi!=''?$vi:'Count');
                                                                                if(in_array($scheme_id,$gender_scheme)){
                                                                            ?>  
                                                                            <th colspan="3" style="text-align: left;"><?php echo($vi); ?></th>   
                                                                            <?php }else{ ?>
                                                                            <th style="text-align: left;" <?php echo($colspan); ?> ><?php echo($vi); ?></th>
                                                                            <?php    
                                                                                }
                                                                            }
                                                                            ?>
                                                                    </tr>
                                                                    <?php if(in_array($scheme_id,$gender_scheme)){ ?>
                                                                    <tr>
                                                                        <th>&nbsp;</th>
                                                                        <th>&nbsp;</th>
                                                                        <?php
                                                                            for($bandg=0;$bandg<($dcount);$bandg++){
                                                                        ?>
                                                                             <th>BOYS</th>
                                                                             <th>GIRLS</th>
                                                                             <th>TRANSGENDER</th>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </tr>
                                                                <?php } 
                                                                    if($scheme_id==9){ ?>
                                                                    <tr>
                                                                        <th>&nbsp;</th>
                                                                        <th>&nbsp;</th>
                                                                    <?php for($bandg=0;$bandg<($dcount);$bandg++){
                                                                                foreach($class as $c){
                                                                    ?>
                                                                        <th><?php echo($c); ?></th>
                                                                    <?php
                                                                                }
                                                                            }
                                                                    ?>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i=1; foreach($dashboard as $d){ $j=0; $distri=($this->uri->segment(6,0)!=null?('/'.$this->uri->segment(6,0)):'');  ?>
                                                                    <tr>
                                                                        <th style="text-align: center;"><?php echo($i++); ?></th>
                                                                        <th style="text-align: left;"><?php if($next!=''){ ?><a href="<?php echo(base_url().'Basic/calldashboard/'.$next.'/'.$d[0][$idval].'/'.$scheme_id.$distri); ?>"><?php echo($d[0][$index]); ?></a><?php } else{echo($d[0][$index]);} ?></th>
                                                                        <?php 
                                                                        foreach($idx as $vi){ $ch=0; $colcount=0; $lst=0; $f=0;
                                                                            foreach($d as $v){ 
                                                                                if($vi==$v['scheme_category']){
                                                                                     $app=$v['appli_count']!=null?$v['appli_count']:1; 
                                                                                     if(in_array($scheme_id,$gender_scheme)){
                                                                                        $count[$j++]+=($v['boys_count']*$app);
                                                                                        $count[$j++]+=($v['girls_count']*$app); 
                                                                                        $count[$j++]+=($v['trans_count']*$app);
                                                                                        $thcount=3;
                                                                                        //print_r($v);echo("<br>");continue;
                                                                                ?>
                                                                                <th style="text-align: center;"><?php echo($v['boys_count']);?></th>
                                                                                <th style="text-align: center;"><?php echo($v['girls_count']);?></th>
                                                                                <th style="text-align: center;"><?php echo($v['trans_count']);?></th>
                                                                                <?php
                                                                                     }
                                                                                     elseif($scheme_id!=9){
                                                                                        $count[$j++]+=($v['catcount']*$app);
                                                                                        $thcount=1; 
                                                                                ?>
                                                                                <th style="text-align: center;"><?php 
                                                                                    echo($vi==$v['scheme_category']?$v['catcount']:'-'); 
                                                                                ?></th>
                                                                                <?php    
                                                                                        }
                                                                                        elseif($scheme_id==9){ $cnt=0; 
                                                                                            $thcount=1; 
                                                                                            foreach($class as $c){
                                                                                                if($v['class_studying']==$c){
                                                                                                    $colcount=$cnt;
                                                                                                }
                                                                                                $cnt++;
                                                                                            }
                                                                                            for($n=$lst;$n<=$colcount;$n++){
                                                                                                if($n==$colcount){
                                                                                                    $count[$j++]+=$v['catcount'];
                                                                                                    echo('<th style="text-align: center;">'.$v['catcount'].'</th>');
                                                                                                    $lst=$colcount+1;
                                                                                                    $f++;
                                                                                                    break;
                                                                                                }
                                                                                                else{
                                                                                                    $count[$j++]+=0;
                                                                                                    echo('<th style="text-align: center;">-</th>');
                                                                                                    $f++;
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        $ch=1;
                                                                                } //End of if $vi
                                                                            }// End of for $d
                                                                            if($ch==0 && $v['scheme_id']!=9){
                                                                                    $count[$j++]+=0;
                                                                                    echo('<th style="text-align: center;">-</th>');
                                                                            }
                                                                            if($v['scheme_id']==9){
                                                                                if($f<count($class) && $f!=0){
                                                                                    $f=count($class)-$f;
                                                                                    for($clen=0;$clen<$f;$clen++){
                                                                                        echo('<th style="text-align: center;">-</th>');
                                                                                        $count[$j++]+=0;
                                                                                    }
                                                                                }
                                                                                elseif($f==0){
                                                                                    $f=count($class)-$f;
                                                                                    for($clen=0;$clen<$f;$clen++){
                                                                                        echo('<th style="text-align: center;">-</th>');
                                                                                        $count[$j++]+=0;
                                                                                    }
                                                                                }
                                                                            }
                                                                            
                                                                        }// End for $vi 
                                                                        if($j<($dcount*$thcount) && $scheme_id!=9){
                                                                            for($z=$j;$z<($dcount*$thcount);$z++){
                                                                        ?>
                                                                        <th style="text-align: center;">-</th>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr class="bg-primary text-white">
                                                                        <th colspan="2" style="text-align: left;">Total</th>
                                                                        <?php $chth=0; foreach($count as $c => $total){ ?>
                                                                        <th style="text-align: center;"><?php echo($total); $chth++; ?></th>
                                                                        <?php } 
                                                                            if($chth<($dcount*$thcount)){
                                                                                for($k=$chth;$k<($dcount*$thcount);$k++){
                                                                        ?>
                                                                        <th style="text-align: center;">-</th>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                            <?php } ?>
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
        
        <script src="<?php echo base_url().'asset/global/plugins/datatables/latest/datatables.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/latest/DataTables/js/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.js';?>" type="text/javascript"></script>
        
        <!-- END PAGE LEVEL SCRIPTS ----->
    </body>
</html>