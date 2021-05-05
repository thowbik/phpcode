<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .clickable{
    cursor: pointer;   
}

.panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.tablecolor
{
    background-color: #32c5d2; 
}
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 35px;
}
.btn-circle.btn-lgs {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
  font-size:16px  !important;
}
.header-size
{
    font-size:11px !important ; 
}
small
{
  font-size:14px!important;
}
.btn
{
      text-transform: initial !important;

}
.btn-block
{
  width: 80% !important;
  border-radius: 10px !important; 
  font-size: 15px !important;
  margin-left :5px !important;
}
.custom
{
  width: 100px !important;
  margin-bottom: 5px !important;
}
.badge
{
  color:black !important;
}
.panel-title
{
  color:#000 !important;
}
.pull-right
{
  color:#000 !important;
}
.fa-stack-1x
{
  margin-left :-30% !important;
  /*color :black !important;*/
  margin-top: 2px !important;
  font-size:18px !important;
}
.space-2px
{
    padding-bottom: 23px !important;
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
 .panel-success > .bs-callout-lightsteelblue {
        background-color:  lightsteelblue !important;
        /*border-radius: 3% !important;*/
            border-color: lightsteelblue !important;
            color :white !important;
    }
    .panel-success > .bs-callout-lightblue {
        background-color:  lightblue !important;
        /*border-radius: 3% !important;*/
            border-color: lightblue !important;
            color :white !important;
    }
    .panel-success > .bs-callout-darkseagreen {
        background-color:  darkseagreen !important;
        /*border-radius: 3% !important;*/
            border-color: darkseagreen !important;
            color :white !important;
    }
    .panel-success > .bs-callout-mediumaquamarine {
        background-color:  mediumaquamarine !important;
        /*border-radius: 3% !important;*/
            border-color: mediumaquamarine !important;
            color :white !important;
    }
.icon>i {
        color: #cbd4e0;
    font-size: 42px !important;
}
.icon
{
    margin-top:-16% !important;

}
.dashboard-stat2 {
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;
    background: #fff;
    padding: 15px 15px 3px!important;
}
</style>
    <?php $this->load->view('head.php'); ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->

 <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

 <?php  $this->load->view('block/header.php');  ?>
<div class="page-content">
                                <div></div> 
                                <br/>
                                <div class="container">
                                    <div class="row">
                                        <div class="row margin-bottom-20">
                                    <div class=" row page-content-inner">

                                      <a href="#">
                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="bs-callout-lightsteelblue dashboard-stat2">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                                         <span class="bottom" data-counter="counterup" data-value="34">Total Students</span>

                                                            </h3>
                                     <?php $total=0; foreach($students as $sc => $school){ 
                                                        $school=(object)$school;?>
                                                         <?php $total+=$school->total; } ?>
                                    <h3>  <?php echo($total); ?></h3>
                                </div>
                                <br/>
                                <br/>
                                <br/>

                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                <!-- 1 Card End -->
                <a href="#">
                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="bs-callout-lightblue dashboard-stat2">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                                         <span class="bottom" data-counter="counterup" data-value="30">Total Teachers</span>

                                                            </h3>
                        <?php $total=0; foreach($teachers as $sc => $school){ 
                                                        $school=(object)$school;?>
                                                         <?php $total+=$school->total; } ?>
                                    <h3>  <?php echo($total); ?></h3>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                <!-- 2 Card End -->
                <a href="#">
                    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="bs-callout-mediumaquamarine dashboard-stat2">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                                         <span class="bottom" data-counter="counterup" data-value="34">Total Schools</span>

                                                            </h3>

                                 <?php $total=0; foreach($schools as $sc => $school){ 
                                                        $school=(object)$school;?>
                                                         <?php $total+=$school->total; } ?>
                                    <h3>  <?php echo($total); ?></h3>
                                </div>
                                <br/>
                                <br/>
                                <br/>

                                <div class="icon">
                                    <i class="fa fa-university"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
        </div>
                                    </div>
                                    <div class="row">
        
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          
                    <div class="row margin-bottom-20">
                                    <div class=" row page-content-inner">

<div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading bs-callout-lightsteelblue">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-users"></i> Students Details</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body">
                                   <div class="row">
                                         <?php $total=0; foreach($students as $sc => $school){ 
                                                        $school=(object)$school;?>
                                                    <div class="col-md-7 space-2px">
                                                            <small><?php echo($school->management_name); ?></small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small style="text-align: right;">: &nbsp;&nbsp;<b style="float: right;">
                                                                <?php echo($school->total); ?>
                                                                   <?php $total+=$school->total;  ?>
                                                            </b></small>
                                                   </div>
                                                    <?php } ?>
                                                        <div class="col-md-7 space-2px">
                                                            <small>Total</small>
                                                        </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b style="float: right;">

                                                                    <?php echo($total); ?>
                                                            </b></small>
                                                    </div>
                                           
                                    </div>

                                                
                </div>
        </div>
    
    </div>
    

    <!-- 2 page -->

    <div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading bs-callout-lightblue">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-graduation-cap
"></i> Teachers</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                 <div class="panel-body">
                                   <div class="row">
                                         <?php $total=0; foreach($teachers as $sc => $school){ 
                                                        $school=(object)$school;?>
                                                    <div class="col-md-7 space-2px">
                                                            <small><?php echo($school->management_name); ?></small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small style="text-align: right;">: &nbsp;&nbsp;<b style="float: right;">
                                                                <?php echo($school->total); ?>
                                                                   <?php $total+=$school->total;  ?>
                                                            </b></small>
                                                   </div>
                                                    <?php } ?>
                                                        <div class="col-md-7 space-2px">
                                                            <small>Total</small>
                                                        </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b style="float: right;">

                                                                    <?php echo($total); ?>
                                                            </b></small>
                                                    </div>
                                           
                                    </div>

                                                
                </div>

                                                
                </div>
        </div>
    
    

    <!-- 3 Page -->

    <div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading bs-callout-darkseagreen">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> Schools</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                 <div class="panel-body">
                                   <div class="row">
                                         <?php $total=0; foreach($schools as $sc => $school){ 
                                                        $school=(object)$school;?>
                                                    <div class="col-md-7 space-2px">
                                                            <small><?php echo($school->management_name); ?></small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small style="text-align: right;">: &nbsp;&nbsp;<b style="float: right;">
                                                                <?php echo($school->total); ?>
                                                                   <?php $total+=$school->total;  ?>
                                                            </b></small>
                                                   </div>
                                                    <?php } ?>
                                                        <div class="col-md-7 space-2px">
                                                            <small>Total</small>
                                                        </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b style="float: right;">

                                                                    <?php echo($total); ?>
                                                            </b></small>
                                                    </div>
                                           
                                    </div>

                                                
                </div>
        </div>
    
    </div>
    
    <!-- 4 page -->

    <div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading mediumaquamarine">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> Assessment</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body">
                   <div class="row">
                                                    <div class="col-md-7 space-2px">
                                                            <small>Term-end Exams</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>--</b></small>
                                                        </div>

                                                        <div class="col-md-7 space-2px">
                                                            <small>SSLC</small>
                                                    </div>
                                                    
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>--</b></small>
                                                        </div>
                                                        
                                                          <div class="col-md-7 space-2px">
                                                            <small>PLUS 2</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>--</b></small>
                                                        </div>
                                                        <div class="col-md-7 space-2px">
                                                            <small>SLAS</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>--</b></small>
                                                        </div>
                                                        <div class="col-md-7 space-2px">
                                                            <small>NAS</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>--</b></small>
                                                        </div>
                                                        <div class="col-md-7 space-2px">
                                                            <small></small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small> &nbsp;&nbsp;</small>
                                                        </div>
                                                        </div>

                                                
                </div>
        </div>
    
    </div>

    <!-- 5 page -->
<div class=" row page-content-inner">
    <div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> Schemes</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body">
                   <div class="row">
                                                    <div class="col-md-7 space-2px">
                                                            <small>TextBooks &Notebooks</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>--</b></small>
                                                        </div>

                                                        <div class="col-md-7 space-2px">
                                                            <small>Uniforms</small>
                                                    </div>
                                                    
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>--</b></small>
                                                        </div>
                                                        
                                                          <div class="col-md-7 space-2px">
                                                            <small>School Bags</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>--</b></small>
                                                        </div>
                                                        <div class="col-md-7 space-2px">
                                                            <small>Footware</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>--</b></small>
                                                        </div>
                                                        <div class="col-md-7 space-2px">
                                                            <small>BiCycles</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>--</b></small>
                                                        </div>
                                                        <div class="col-md-7 space-2px">
                                                            <small>Laptops</small>
                                                    </div>
                                                    <div class="col-md-5 space-2px">
                                                            <small>: &nbsp;&nbsp;<b>--</b></small>
                                                        </div>
                                                        </div>

                                                
                </div>
        </div>
    
    </div>

    <!-- 6 Page -->

    <div class="col-lg-3">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> Renewal/Recognition</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> </span>
                </div>
                <div class="panel-body">
                   <div class="row">
                                                    <div class="col-md-9 space-2px">
                                                            <small>Total Pending Application</small>
                                                    </div>
                                                    <div class="col-md-3 space-2px">

                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'State/dash_renewal';?>"><?php echo ($renewal_details[0]['TOTAL']); ?></a></b></small>
                                                        </div>

                                                        <div class="col-md-9 space-2px">
                                                            <small>Pending BEO Approval</small>
                                                    </div>
                                                    
                                                    <div class="col-md-3 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'State/dash_renewal_beo/';?>"><?php echo ($renewal_details[0]['BEO']); ?></a></b></small>
                                                        </div>
                                                        
                                                          <div class="col-md-9 space-2px">
                                                            <small>Pending DEO Approval</small>
                                                    </div>
                                                    <div class="col-md-3 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'State/dash_renewal_deo/';?>"><?php echo ($renewal_details[0]['DE0']); ?></a></b></small>
                                                        </div>
                                                        <div class="col-md-9 space-2px">
                                                            <small>Pending CEO Approval</small>
                                                    </div>
                                                    <div class="col-md-3 space-2px">
                                                            <small>: &nbsp;&nbsp;<b><a href="<?php echo base_url().'State/dash_renewal_ceo/';?>"><?php echo ($renewal_details[0]['CE0']); ?></a></b></small>
                                                        </div>
                                                        <div class="col-md-9 space-2px">
                                                            <small></small>
                                                    </div>
                                                    <div class="col-md-3 space-2px">
                                                            <small> &nbsp;&nbsp;</small>
                                                        </div>
                                                        <div class="col-md-9 space-2px">
                                                            <small></small>
                                                    </div>
                                                    <div class="col-md-3 space-2px">
                                                            <small> &nbsp;&nbsp;</small>
                                                        </div>
                                                        </div>

                                                
                </div>
        </div>
    
    </div> 

    <!-- 7 Page-->
                                       
                                           

                                        </div>
                                       

                                </div>

                                
                    
            <?php $this->load->view('scripts.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas -->
            <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
           
        </div>
    </div>
</div>
         <?php $this->load->view('footer.php'); ?>

</div>
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