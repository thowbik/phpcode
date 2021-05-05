<?php 
     //echo 'mkp'.$mediumid;
      $next=''; 
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
                            $title='Educational District';$index='EduDist';$next='Block';$idval='edu_dist_id';
                            break;
                            }
                    case 'Block':{
                            $title='Block';$index='Block';$next='School';$idval='block_id';
                            break;
                            }
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
                    case 'Block':{
                        $title='Block';$index='Block';$next='School';$idval='block_id';
                        break;
                    }
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
                    case 'Block':{
                         $title='Block';$index='Block';$next='School';$idval='block_id';
                         break;
                    }
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
                    case 'Block':{
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
        <?php $this->load->view('allheader.php'); ?>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN PAGE CONTENT WRAPPER -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title"  id="page-title">
                                        <h1> TextBook <?php echo($title); ?> Wise - Distribution List </h1>
                                        <br/>   
                                        
                                    </div>
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar"></div>
                                    <!-- END PAGE TOOLBAR -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content"> <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">

                                         <?php if ($this->session->flashdata('staff')) {  ?> 
                                                   
                                                   <div class="page-content-inner">
                                                       <div class="row">
                                                           <div class="col-md-12">
                                                               <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('staff'); ?>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                         <?php  }  ?>

                                            <div class="portlet light ">
                                                <div class="portlet-body">
                                                    <div class="row">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active">
                                                                <a data-toggle="tab"  id="tabset1" class="tablinks" onclick="openCity(event,'StandardUpto8')"><b>Standard I to VIII</b></a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="tab"  id="tabset2" class="tablinks" onclick="openCity(event,'Standard9and10')"><b>Standard IX and X</b></a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="tab"  id="tabset3" class="tablinks" onclick="openCity(event,'Standard11and12')"><b>Standard XI and XII</b></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            
                                                    <div id="StandardUpto8" class="tabcontent tab-pane fade in active">
                                                               
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                                
                                                                <div class="page-content-inner">
                                                                                    
                                                                                
                                                                    <?php if($this->session->flashdata('errors')){?>
                                                                        <div class="portlet-body">
                                                                            <div class ="row">
                                                                                <div class="col-md-4">
                                                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                                                                                
                                                                    <form id="tab1_form_id" name="tab1_form_id" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label bold">Medium Of Instruction</label>
                                                                                <select class="form-control"  id="medium_name1" name="medname1" onchange="changebookslist(1)">
                                                                                    <option value="">Choose Medium</option>
                                                                                    <?php foreach($mediumofinstruction as $M) {  
                                                                                        if($M->MEDINSTR_ID != 98) {  ?>
                                                                                        <option value="<?php echo($M->MEDINSTR_ID); ?>"  <?php if($tabid == 1 && $mediumid==$M->MEDINSTR_ID){echo('selected');} ?> ><?php echo($M->MEDINSTR_DESC); ?></option>
                                                                                    <?php  } 
                                                                                    }  ?>
                                                                                </select> 
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                            <label class="control-label bold">Term</label>
                                                                                            <select class="form-control"  id="term_name" name="term" onchange="changebookslist(1)">
                                                                                            <option value="">Choose Term</option>
                                                                                            <?php for($i=1;$i<=3;$i++){  ?>
                                                                                                <option value="<?php echo $i; ?>"  <?php if($tabid == 1 && $termid==$i){echo('selected');} ?> ><?php echo 'Term '.$i ?></option>  
                                                                                            <?php } ?>
                                                                                            </select> 
                                                                            </div>
                                                                            <div class="col-md-3" id="book_div1">
                                                                                            <label class="control-label bold">Books</label>
                                                                                            <select class="form-control"  id="book_name1" name="bkname1">
                                                                                                <option value="">Choose Books</option>
                                                                                                <?php foreach($textbooklist as $B){ ?>
                                                                                                        <option value="<?php echo($B->book_id); ?>"  <?php if($tabid == 1 && $bookid==$B->book_id){echo('selected');} ?> ><?php echo($B->book_name); ?></option>
                                                                                                <?php } ?>
                                                                                            </select> 
                                                                            </div>
                                                                            <div class="col-md-3" style="padding-top: 24px;">
                                                                                <input type="hidden" id="hd_tabid" name="hd_tabid" value=1>
                                                                                <button type="submit" id="tab1_btn_submit" name="tab1_rpt_btn_submit" class="btn green btn-md">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    <br/>
                                                                                    
                                                                </div><!-- page-content-inner close -->
                                                                                     
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">

                                                                <div class="portlet box green">
                                                                        <div class="portlet-title">
                                                                            <div class="caption">
                                                                                <i class="fa fa-globe"></i> TextBook Distribution - <?php echo($title); ?> Wise </div>
                                                                            <div class="tools"></div>
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                                <?php if($providing_list1!=null){  ?>
                                                                                        <div style="padding-top:3px;"></div>
                                                                                        <table class="table table-striped table-bordered table-hover" id="sample_3" style="text-align: center;">                                
                                                                                            <thead>
                                                                                                <tr class="portlet box green" >    
                                                                                                    <th style="text-align: left;">S.No</th>
                                                                                                    <th style="text-align: left;"><?php echo($title); ?></th>    
                                                                                                    <th colspan="3" style="text-align: center;">I</th>
                                                                                                    <th colspan="3" style="text-align: center;">II</th>
                                                                                                    <th colspan="3" style="text-align: center;">III</th>
                                                                                                    <th colspan="3" style="text-align: center;">IV</th>
                                                                                                    <th colspan="3" style="text-align: center;">V</th>
                                                                                                    <th colspan="3" style="text-align: center;">VI</th>
                                                                                                    <th colspan="3" style="text-align: center;">VII</th>
                                                                                                    <th colspan="3" style="text-align: center;">VIII</th>    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th>&nbsp;</th>
                                                                                                    <th>&nbsp;</th>
                                                                                                    <?php for($i=1;$i<=8;$i++) {  ?>
                                                                                                        <th class="sum">Enrollment</th>                                            
                                                                                                        <th class="sum">Dispatched</th>    
                                                                                                        <th class="sum">Distributed</th>
                                                                                                    <?php  }  ?>
                                                                                                </tr>
                                                                                            </thead>

                                                                                            <tbody>
                                                                                                <?php $sno = 1;
                                                                                                      $concat_id = $this->input->post('term').'-'.$this->input->post('bkname1');
                                                                                                      foreach($providing_list1 as $key=>$value) {
                                                                                                        $mid = $this->uri->segment(5,0)!=0 ? $this->uri->segment(5,0) : $value->mediumid.'-'.$concat_id; 
                                                                                                ?>
                                                                                                <tr>    
                                                                                                    <td style="text-align: center;"><?php echo($sno); ?></td>
                                                                                                    <td style="text-align: left;">
                                                                                                        <?php if($next!=''){ ?>
                                                                                                            <a href="<?php echo(base_url().'Basic/textbook_providing_list/'.$next.'/'.$value->$idval.'/'.$mid.'/1'); ?>">
                                                                                                            <?php echo($value->$index); ?></a><?php } else { echo($value->$index); } ?>
                                                                                                    </td>
                                                                                                    <?php for($i=1;$i<=8;$i++) {
                                                                                                        $class_des = 'Class'.$i.'_Despatched';$class_eli = 'Class'.$i.'_Eligible';$class_dis = 'Class'.$i.'_Distributed';  ?>
                                                                                                        <td style="text-align: center;"><?php echo $value->$class_eli; ?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value->$class_des; ?></td>
                                                                                                        <td style="text-align: center;"><?php echo $value->$class_dis; ?></td>
                                                                                                    <?php } ?>
                                                                                                </tr>
                                                                                                <?php $sno++; }  ?>
                                                                                            </tbody>
                                                                                                                                    
                                                                                            <tfoot>
                                                                                                <tr class="bg-primary text-white">
                                                                                                    <td colspan="2" style="text-align: left;">Total</td>    
                                                                                                    <?php for($i=1;$i<=8;$i++) {  ?>
                                                                                                        <td style="text-align: center;"></td>
                                                                                                        <td style="text-align: center;"></td>
                                                                                                        <td style="text-align: center;"></td>
                                                                                                    <?php }  ?>
                                                                                                </tr>
                                                                                            </tfoot>
                                                                                        </table>
                                                                                        <?php } else { echo "No data found"; } ?>
                                                                        </div><!-- END portlet-body -->
                                                                </div><!-- END portlet box green -->

                                                            </div>
                                                        </div>

                                                    </div>

                                                
                                                    <div id="Standard9and10" class="tabcontent" style="display: none;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                                
                                                                <div class="page-content-inner">
                                                                                    
                                                                                
                                                                                        <?php if($this->session->flashdata('errors')){?>
                                                                                        <div class="portlet-body">
                                                                                            <div class ="row">
                                                                                                <div class="col-md-4">
                                                                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php } ?>
                                                                                        <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                                                                                
                                                                                        <form id="tab2_form_id" name="tab2_form_id" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-3">
                                                                                                                    <label class="control-label bold">Medium Of Instruction</label>
                                                                                                                    <select class="form-control"  id="medium_name2" name="medname2" onchange="changebookslist(2)">
                                                                                                                        <option value="">Choose Medium</option>
                                                                                                                        <?php foreach($mediumofinstruction as $M){ 
                                                                                                                            if($M->MEDINSTR_ID != 98){ ?>
                                                                                                                            <option value="<?php echo($M->MEDINSTR_ID); ?>"  <?php if($tabid == 2 && $mediumid==$M->MEDINSTR_ID){echo('selected');} ?> ><?php echo($M->MEDINSTR_DESC); ?></option>
                                                                                                                        <?php  }
                                                                                                                            }   ?>
                                                                                                                    </select> 
                                                                                                    </div>
                                                                                                    <div class="col-md-3" id="book_div2">
                                                                                                            <label class="control-label bold">Books</label>
                                                                                                            <select class="form-control"  id="book_name2" name="bkname2">
                                                                                                               <option value="">Choose Books</option>
                                                                                                                <?php foreach($textbooklist as $B){ ?>
                                                                                                                        <option value="<?php echo($B->book_id); ?>"  <?php if($tabid == 2 && $bookid==$B->book_id){echo('selected');} ?> ><?php echo($B->book_name); ?></option>
                                                                                                                <?php } ?>
                                                                                                            </select> 
                                                                                                    </div>        
                                                                                                    <div class="col-md-3" style="padding-top: 24px;">
                                                                                                        <input type="hidden" id="hd_tabid" name="hd_tabid" value=2>
                                                                                                        <button type="submit" id="tab2_btn_submit" name="tab2_rpt_btn_submit" class="btn green btn-md">Submit</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                        </form>
                                                                                        <br/>
                                                                </div><!-- END page-content-inner -->
                                                            
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                              <div class="portlet box green">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-globe"></i> TextBook Distribution - <?php echo($title); ?> Wise 
                                                                    </div>
                                                                    <div class="tools"> </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                        <?php if($providing_list2!=null){  ?>
                                                                            <table class="table table-striped table-bordered table-hover" id="sample_4" style="text-align: center;">                                
                                                                                <thead>
                                                                                    <tr class="portlet box green" >    
                                                                                        <th style="text-align: left;">S.No</th>
                                                                                        <th style="text-align: left;"><?php echo($title); ?></th>
                                                                                        <th colspan="3" style="text-align: center;">IX</th>
                                                                                        <th colspan="3" style="text-align: center;">X</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>&nbsp;</th>
                                                                                        <th>&nbsp;</th>
                                                                                        <?php for($i=9;$i<=10;$i++) {  ?>
                                                                                            <th class="sum">Enrollment</th>                                            
                                                                                            <th class="sum">Dispatched</th>    
                                                                                            <th class="sum">Distributed</th>
                                                                                        <?php } ?>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                    <?php $sno = 1;

                                                                                        $concat_id = '0-'.$this->input->post('bkname2');
                                                                                        foreach($providing_list2 as $key=>$value) {
                                                                                            $mid = $this->uri->segment(5,0)!=0 ? $this->uri->segment(5,0) : $value->mediumid.'-'.$concat_id;
                                                                                    ?>
                                                                                    <tr>    
                                                                                        <td style="text-align: center;"><?php echo($sno); ?></td>
                                                                                        <td style="text-align: left;">
                                                                                            <?php if($next!=''){ ?>
                                                                                                <a href="<?php echo(base_url().'Basic/textbook_providing_list/'.$next.'/'.$value->$idval.'/'.$mid.'/1'); ?>">
                                                                                            <?php echo($value->$index); ?></a><?php } else{echo($value->$index);} ?>
                                                                                        </td>
                                                                                        <?php for($i=9;$i<=10;$i++){
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
                                                                                        <?php for($i=9;$i<=10;$i++){ ?>
                                                                                            <td style="text-align: center;"></td>
                                                                                            <td style="text-align: center;"></td>
                                                                                            <td style="text-align: center;"></td>
                                                                                        <?php  }  ?>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        <?php  } else { echo "No data found"; } ?>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                        
                                                    <div id="Standard11and12" class="tabcontent" style="display: none;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                                
                                                                <div class="page-content-inner">
                                                                                    
                                                                                
                                                                                        <?php if($this->session->flashdata('errors')){?>
                                                                                        <div class="portlet-body">
                                                                                            <div class ="row">
                                                                                                <div class="col-md-4">
                                                                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php } $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                                                                                
                                                                    <form id="tab3_form_id" name="tab3_form_id" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label bold">Medium Of Instruction</label>
                                                                                <select class="form-control"  id="medium_name3" name="medname3" onchange="changebookslist(3)">
                                                                                    <option value="">Choose Medium</option>
                                                                                    <?php foreach($mediumofinstruction as $M){ 
                                                                                        if($M->MEDINSTR_ID != 98) {  ?>
                                                                                        <option value="<?php echo($M->MEDINSTR_ID); ?>"  <?php if($tabid == 3 && $mediumid==$M->MEDINSTR_ID) { echo('selected'); } ?> ><?php echo($M->MEDINSTR_DESC); ?></option>
                                                                                        <?php  } ?>
                                                                                      <?php } ?>
                                                                                </select> 
                                                                            </div>
                                                                            <div id="book_div3" class="col-md-3">
                                                                                            <label class="control-label bold">Books</label>
                                                                                            <select class="form-control"  id="book_name3" name="bkname3">
                                                                                                <option value="">Choose Books</option>
                                                                                                <?php foreach($textbooklist as $B){ ?>
                                                                                                        <option value="<?php echo($B->book_id); ?>"  <?php if($tabid == 3 && $bookid==$B->book_id){echo('selected');} ?> ><?php echo($B->book_name); ?></option>
                                                                                                <?php } ?>
                                                                                            </select> 
                                                                            </div>        
                                                                            <div class="col-md-3" style="padding-top: 24px;">
                                                                                <input type="hidden" id="hd_tabid" name="hd_tabid" value=3>
                                                                                <button type="submit" id="tab3_btn_submit" name="tab3_rpt_btn_submit" class="btn green btn-md">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    <br/>   
                                                                </div><!-- END OF page-content-inner -->
                                                                                     
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="portlet box green">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class="fa fa-globe"></i> TextBook Distribution - <?php echo($title); ?> Wise 
                                                                        </div>
                                                                        <div class="tools"> </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <?php if($providing_list3 != null) {  ?>
                                                                            <table class="table table-striped table-bordered table-hover" id="sample_5" style="text-align: center;">                                
                                                                                <thead>
                                                                                    <tr class="portlet box green" >    
                                                                                        <th style="text-align: left;">S.No</th>
                                                                                        <th style="text-align: left;"><?php echo($title); ?></th>
                                                                                        <th colspan="3" style="text-align: center;">XI</th>
                                                                                        <th colspan="3" style="text-align: center;">XII</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>&nbsp;</th>
                                                                                        <th>&nbsp;</th>
                                                                                        <?php for($i=11;$i<=12;$i++) {  ?>
                                                                                            <th class="sum">Enrollment</th>                                            
                                                                                            <th class="sum">Dispatched</th>    
                                                                                            <th class="sum">Distributed</th>
                                                                                        <?php  }   ?>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                    <?php $sno = 1;
                                                                                        $concat_id = '0-'.$this->input->post('bkname3');
                                                                                        foreach($providing_list3 as $key=>$value) {
                                                                                            $mid = $this->uri->segment(5,0)!=0 ? $this->uri->segment(5,0) : $value->mediumid.'-'.$concat_id;
                                                                                    ?>
                                                                                        <tr>    
                                                                                            <td style="text-align: center;"><?php echo($sno); ?></td>
                                                                                            <td style="text-align: left;">
                                                                                            <?php if($next!='') {  ?>
                                                                                                <a href="<?php echo(base_url().'Basic/textbook_providing_list/'.$next.'/'.$value->$idval.'/'.$mid.'/3'); ?>">
                                                                                                <?php echo($value->$index); ?></a><?php } else{echo($value->$index);} ?>
                                                                                            </td>
                                                                                            <?php for($i=11;$i<=12;$i++) { 
                                                                                                $class_des = 'Class'.$i.'_Despatched';
                                                                                                $class_eli = 'Class'.$i.'_Eligible';
                                                                                                $class_dis = 'Class'.$i.'_Distributed';  ?>
                                                                                            <td style="text-align: center;"><?php echo $value->$class_eli; ?></td>
                                                                                            <td style="text-align: center;"><?php echo $value->$class_des; ?></td>
                                                                                            <td style="text-align: center;"><?php echo $value->$class_dis; ?></td>
                                                                                            <?php  }  ?>
                                                                                        </tr>
                                                                                        <?php $sno++;  }  ?>
                                                                                </tbody>
                                                                                                                                
                                                                                <tfoot>
                                                                                    <tr class="bg-primary text-white">
                                                                                        <td colspan="2" style="text-align: left;">Total</td>    
                                                                                        <?php for($i=11;$i<=12;$i++) {  ?>
                                                                                            <td style="text-align: center;"></td>
                                                                                            <td style="text-align: center;"></td>
                                                                                            <td style="text-align: center;"></td>
                                                                                        <?php  }  ?>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        <?php } else { echo "No data found";}?>

                                                                    </div>
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
                        </div>
                        <!-- END PAGE CONTENT WRAPPER -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
                <!-- END PAGE WRAPPER MIDDLE -->
            </div>
            <!-- END PAGE WRAPPER ROW -->
        <?php $this->load->view('footer.php'); ?>
        </div>
        <!-- END PAGE-WRAPPER -->
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

                    
                    $("#book_div1").hide();
                    $("#book_div2").hide();
                    $("#book_div3").hide();

                    <?php if(isset($_POST['hd_tabid'])){   ?>
                        var curr_tab_id = <?php echo $this->input->post('hd_tabid');?>;
                        var medium_dropdown_id =  <?php if($mediumid != '' && $mediumid != 0){ echo $mediumid; }else{ echo 0; }?>;
                        if(curr_tab_id != ''){
                            var tabid = 'tabset'+curr_tab_id;
                            document.getElementById(tabid).click();
                            switch(curr_tab_id){
                                case 1:if(medium_dropdown_id != ''){$("#book_div1").show();}else{$("#book_div1").hide();}break;
                                case 2:if(medium_dropdown_id != ''){$("#book_div2").show();}else{$("#book_div2").hide();}break;
                                case 3:if(medium_dropdown_id != ''){$("#book_div3").show();}else{$("#book_div3").hide();}break;
                            }

                        }
                    <?php } 
                     else {  ?>
                        var curr_tab_id = <?php echo $this->uri->segment(6,0);?>;
                        var medium_uri_seg = <?php echo $this->uri->segment(5,0);?>;
                        if(curr_tab_id != ''){
                            var tabid = 'tabset'+curr_tab_id;
                            document.getElementById(tabid).click();
                            switch(curr_tab_id){
                                case 1:if(medium_uri_seg != 0){$("#book_div1").show();}else{$("#book_div1").hide();}break;
                                case 2:if(medium_uri_seg != 0){$("#book_div2").show();}else{$("#book_div2").hide();}break;
                                case 3:if(medium_uri_seg != 0){$("#book_div3").show();}else{$("#book_div3").hide();}break;
                            }
                        }
                    <?php } ?>
                    
                    sum_dataTable('#sample_3',true);
                    sum_dataTable('#sample_4',false);
                    sum_dataTable('#sample_5',false);
        	    });

                function openCity(evt,cityName) {
        
                    /** Declare all variables */
                    var i, tabcontent, tablinks;

                    /** Get all elements with class="tabcontent" and hide them*/
                    tabcontent = document.getElementsByClassName("tabcontent");

                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }

                    /** Get all elements with class="tablinks" and remove the class "active"*/
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }

                    /** Show the current tab, and add an "active" class to the button that opened the tab*/
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }

                function changebookslist(flag){
                    if(flag == 1){
                            var term = $('#term_name').val();
                            var medium = $('#medium_name1').val();
                            if(term != '' && medium != ''){ 
                                $("#book_div1").show();
                                $('#book_name1').empty().append('<option value="">Choose Books</option>');
                                var pausedropdowncontent1 = <?php echo json_encode($textbooklist); ?>;
                                    pausedropdowncontent1.filter(function(val) {
                                    if(val.medium == medium && val.term == term) {    
                                            $('#book_name1').append($('<option></option>').text(val.book_name).attr('value', val.book_id));
                                    }
                                    });
                            }
                            else{ 
                                $("#book_div1").hide(); 
                                $('#book_name1').val('');
                            }
                    }
                    else if(flag == 2){
                        var medium = $('#medium_name2').val();

                        if(medium != ''){ 
                                $("#book_div2").show();
                                $('#book_name2').empty().append('<option value="">Choose Books</option>');
                                var pausedropdowncontent2 = <?php echo json_encode($textbooklist); ?>;
                                    pausedropdowncontent2.filter(function(val) {
                                    if(val.medium == medium && val.class == 9) {    
                                            $('#book_name2').append($('<option></option>').text(val.book_name).attr('value', val.book_id));
                                    }
                                    });
                        }
                        else{ 
                            $("#book_div2").hide(); 
                            $('#book_name2').val('');
                        }
                    }
                    else if(flag == 3){
                        var medium = $('#medium_name3').val();

                        if(medium != ''){ 
                                $("#book_div3").show(); 
                                $('#book_name3').empty().append('<option value="">Choose Books</option>');
                                var pausedropdowncontent3 = <?php echo json_encode($textbooklist); ?>;
                                    pausedropdowncontent3.filter(function(val) {
                                    if(val.medium == medium && val.class == 11) {    
                                            $('#book_name3').append($('<option></option>').text(val.book_name).attr('value', val.book_id));
                                    }
                                    });
                        }
                        else{ 
                                /*** $("#th_book").hide(); $('#book_name3').val(''); */
                                $("#book_div3").hide(); 
                        }
                    }
        }

                /*** On click For Validate the Field */
                $('#tab1_btn_submit').click(function(){
                    if($("option:selected", $("#medium_name1")).val() == "")
                        {
                                alert('Please Select Medium Of Instruction');
                                $("#medium_name1").focus();
                                return false;
                        }
                        if($("option:selected", $("#term_name")).val() == "")
                        {
                                alert('Please Select Term');
                                $("#term_name").focus();
                                return false;
                        }
                        if($("option:selected", $("#book_name1")).val() == "")
                        {
                                alert('Please Select Books');
                                $("#book_name1").focus();
                                return false;
                        }
                });

                /*** On click For Validate the Field */
                $('#tab2_btn_submit').click(function(){
                        if($("option:selected", $("#medium_name2")).val() == "")
                        {
                                alert('Please Select Medium Of Instruction');
                                $("#medium_name2").focus();
                                return false;
                        }
                        if($("option:selected", $("#book_name2")).val() == "")
                        {
                                alert('Please Select Books');
                                $("#book_name2").focus();
                                return false;
                        }
                });

                /*** On click For Validate the Field */
                $('#tab3_btn_submit').click(function(){
                        if($("option:selected", $("#medium_name3")).val() == "")
                        {
                                alert('Please Select Medium Of Instruction');
                                $("#medium_name3").focus();
                                return false;
                        }
                        if($("option:selected", $("#book_name3")).val() == "")
                        {
                                alert('Please Select Books');
                                $("#book_name3").focus();
                                return false;
                        }
                });


                /*** Datatable to sum and display on tfoot */
                function sum_dataTable(dataId,x_status){
                    
                    var table = $(dataId).DataTable({
                        "fnInitComplete": function(){
                                /** Disable TBODY scoll bars */
                                $('.dataTables_scrollBody').css({
                                    'overflow': 'hidden',
                                    'border': '0'
                                });
                                /** Enable TFOOT scoll bars */
                                $('.dataTables_scrollFoot').css('overflow', 'auto');                                  
                                /** Sync TFOOT scrolling with TBODY */
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
                                { extend: 'csv', className: 'btn default' ,filename: function(){ return 'EMIS TN Schools Textbook <?php echo($title); ?> Wise - <?php echo ($selectedSchemeName)?> Distribution List';}}                                                                           
                        ],          
                        "order": [[0, "asc"]],
                        "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
                        "pageLength": 10,
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
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>
</html>