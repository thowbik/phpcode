<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style>
        .dashboard-stat2 {
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;
    background: #fff;
    padding: 15px 15px 14px !important;
}
    .dashboard-stat2 .display {
    margin-bottom: 2px !important;
}
.bottom
{
  border-bottom: 1px solid gray;
}
.bs-callout-lightsteelblue {
    border-left: 8px solid lightsteelblue;
    border-radius: 3% !important;
}
.bs-callout-darkseagreen {
    border-left: 8px solid darkseagreen;
    border-radius: 3% !important;
}
.bs-callout-mediumaquamarine {
    border-left: 8px solid mediumaquamarine;
    border-radius: 3% !important;
}
.bs-callout-lightblue {
    border-left: 8px solid lightblue;
    border-radius: 3% !important;
}

.x_panel
{
      padding: 0px 8px !important;
}
.x_title {
    border-bottom: 2px solid #E6E9ED;
    margin: 0px -7px 0px;
    margin-bottom: 10px;
}
.khaki
{
  background-color: khaki;
  color: black;
}
.lightgrey
{
  background-color: lightgrey;
  color: black;

}
.lightyellow
{
  background-color: #f3a84ea6;
  color: black;

}
.lightgreen
{
  background-color: #ceeabf;
  color: black;

}
</style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('allheader.php'); ?>

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
                                        <h1>Dashboard - <label style="color:red;"><?php echo $details[0]->district_name;?></label>
                                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                             <li role="presentation">
                                            <a href="<?php echo base_url().'AllApprove/studentCount/1'?>">
                                              <span class="text">All Students</span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'AllApprove/studentCount/2'?>">
                                              <span class="text">Directorate Of Elementary Education</span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'AllApprove/studentCount/3'?>">
                                              <span class="text">Directorate Of School Education</span>
                                            </a>
                                          </li>
                                          <li role="presentation" class="next">
                                              <a href="<?php echo base_url().'AllApprove/studentCount/4'?>">
                                              <span class="text" >Directorate Of Matriculation School</a></span>
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
                                    <div class="page-content-inner">

                                     <div class="portlet-body">

                                          <div class="portlet light">
                                            <form action="<?php echo($_SERVER['REQUEST_URI'])?>" method="POST" id="studentcountpost">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-1" style="width:6%;padding-top:5%;">
                                                            All <input type="checkbox" id="emis_state_report_schmanage"  value="all" name="school_manage">
                                                        </div>
                                                        <div class="col-md-7" >
                                                            <div class="form-group" style="padding: 10px;padding-left: 8%">
                                                                <label class="control-label bold">
                                                                School Management</label><br/>
                                                                <?php 
                                                                $school_management = array();$key='school_type';$total=0;
                                                                $manselected=array();
                                                                foreach($totaldash as $val) {
                                                                    if(array_key_exists($key, $val)){
                                                                        $school_management[$val[$key]][] = $val;
                                                                    }else{
                                                                        $school_management[""][] = $val;
                                                                    }
                                                                    $total+=$val['total'];
                                                                    if(!in_array($val[$key],$manselected)){
                                                                        array_push($manselected,$val[$key]);
                                                                    }
                                                                }
                                                                
                                                                foreach($management as $ma){
                                                                ?>
                                                                <input type="checkbox" name="school_manage[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off" <?php echo (in_array($ma['manage_name'],$manselected)?'checked':'');?> value="<?php echo($ma['manage_name']); ?>"/><span class="label-text" ><?php echo($ma['manage_name']);?></span>&nbsp;
                                                                <?php }  ?>
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>    
                                                            </div>
                                                            <div style="padding: 4px;padding-left: 8%;margin-top: -2%;" class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                 School Category </label>&nbsp;&nbsp;<input type="checkbox" id="select_all"/>Category All<br/>
                                                                <?php 
                                                                    $school_management = array();$key='cate_type';$sctype=array();
                                                                    foreach($totaldash as $val) {
                                                                        if(array_key_exists($key, $val)){
                                                                            $school_management[$val[$key]][] = $val;
                                                                        }else{
                                                                            $school_management[""][] = $val;
                                                                        }
                                                                        if(!in_array($val[$key],$sctype)){
                                                                            array_push($sctype,$val[$key]);
                                                                        }
                                                                    }
                                                                    //print_r($sctype);
                                                                    foreach($schooltype as $type){
                                                                ?>
                                                                <input type="checkbox" class="emis_state_report_schcate" name="school_cate[]" id="emis_state_report_schcate" autocomplete="off" <?php echo (isset($_POST['catsubmit'])?(in_array($type['category_name'],$sctype)?'checked':''):'checked');?> value="<?php echo($type['category_name']); ?>" /><span style="padding-right:13px;" class="label-text"><?php echo($type['category_name']); ?></span>&nbsp;
                                                                <?php } ?>  
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1" >
                                                            <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                                <button type="submit" class="btn green btn-lg" name="catsubmit" id="catsubmit">Submit</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3" >
                                                            <div class="bs-callout-lightsteelblue dashboard-stat2" style="float:right;width:200px;">
                                                                <div class="display">
                                                                    <div class="number">
                                                                        <h4  class="font-green-sharp bottom" >Total Students</h4> 
                                                                       <h4><span class="counter-count" data-counter="counterup" data-value="<?php echo($total); ?>"><?php echo($total); ?></span></h4>
                                                                    </div>
                                                                    <div class="icon" style="margin-top:9%">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        
                                        <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-globe"></i> Student Block wise | <span>District :<?php echo $totaldash[0]['district_name'];?></span> </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Name</th>
                                                                <?php //print_r($totaldash);
                                                                    if($totaldash[0]!=null){
                                                                        $i=1;   $classes=array();                                                                  
                                                                        foreach($totaldash[0] as $key => $value){
                                                                            if($i>13 && $i<29){
                                                                ?>
                                                                <th><?php echo($key); array_push($classes,$key); ?></th>
                                                                <?php
                                                                            }
                                                                            $i++;
                                                                        } 
                                                                    }
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                    $total=array();
                                                                    $groupname = array();$key=$group['group'];
                                                                    foreach($totaldash as $val) {
                                                                        if(array_key_exists($key, $val)){
                                                                            $groupname[$val[$key]][] = $val;
                                                                        }else{
                                                                            $groupname[""][] = $val;
                                                                        }
                                                                    } $i=1;
                                                                    foreach($groupname as $grp){
                                                            ?>
                                                            <tr>
                                                                <td style="text-align: center;"><?php echo $i++;?></td>
                                                                <td><?php if($group['next']!=''){ ?><a href="javascript:null;" onclick="seturlpost(this)" url="<?php echo base_url().'AllApprove/studentCount/'.$this->uri->segment(3,0).'/'.$grp[0][$group['group']].'/'.$group['next'];?>"><?php } echo($grp[0][$group['groupname']]); ?></a></td>
                                                                <?php
                                                                    foreach($classes as $c){
                                                                        $count=0;
                                                                        foreach($grp as $g){
                                                                            $count+=$g[$c];    
                                                                        }
                                                                ?>
                                                                <td><?php echo(number_format($count)); $total[$c]+=$count; ?></td>
                                                                <?php
                                                                    } 
                                                                ?>
                                                                
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Total</th>
                                                                <th></th>
                                                                <?php 
                                                                    foreach($total as $c){
                                                                ?>
                                                                <th><?php echo(number_format($c)); ?></th>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                        </tfoot> 
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           
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
                <?php $this->load->view('footer.php'); ?>
            </div>
    <?php $this->load->view('scripts.php'); ?>
    <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>
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
        <script>
            $('.counter-count').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 5000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
            
            function seturlpost(node){
                var frm=document.getElementById('studentcountpost');
                frm.setAttribute('action',node.getAttribute('url'));
                var btn=document.getElementById('catsubmit');
                btn.click();
            }
        </script>
    </body>
</html>