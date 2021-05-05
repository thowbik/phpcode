<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
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
  
  line-height: 1.33;
  border-radius: 25px;
  font-size:15px  !important;
}
.header-size
{
    font-size:11px !important ; 
    text-align: center;
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
.center
{
  text-align:center;
}
    </style>
    <?php $this->load->view('head.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-table/bootstrap-table.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
</head>

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header" style="height: 40px;">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo" style="min-width:40%;font-size: 18px;">
                                    <a href="<php echo base_url(); ?>">
                                        <img class="img-responsive" src="<?php echo base_url().'asset/pages/img/emis_logo.png';?>"  style="height: 100%;margin:0px;"  alt="logo" class="logo-default">
                                    </a>
                                </div>
                                
                                            
                                            
                                
                                
                                
                    </div>
                </div>
            </div>
        </div>
    </div>



            <div class="container">
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>                               <div class="row">
        
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          
                    <div class="container">
                                    <div class=" row ">
<div class="col-md-6 ">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><?=$students_details->name;?></h3>
                    <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> View Details</span>
                </div>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="center"><b><?=$students_details->school_name;?></b></h4>
                            </div>
                            <div class="col-md-offset-1 col-md-5 col-xs-5">
                                <h4 >Students ID</h4>

                            </div>
                                                        <div class="col-md-offset-1 col-md-5 col-xs-7">
                                <h4><b><?=$students_details->unique_id_no;?></b></h4>

                            </div>
                            <div class="col-md-offset-1 col-md-5 col-xs-5">
                                <h4>Father Name</h4>

                            </div>
                                                        <div class="col-md-offset-1 col-md-5 col-xs-7">
                                <h4><b><?=$students_details->father_name;?></b></h4>

                            </div>
                            <div class="col-md-offset-1 col-md-5 col-xs-5">
                                <h4>Date Of Birth</h4>

                            </div>
                                                        <div class="col-md-offset-1 col-md-5 col-xs-7">
                                <h4><b><?=date('d/m/Y',strtotime($students_details->dob));?></b></h4>

                            </div>
                            <div class="col-md-offset-1 col-md-5 col-xs-5">
                                <h4>Blood Group</h4>

                            </div>
                                                        <div class="col-md-offset-1 col-md-5 col-xs-7">
                                <h4><b><?=$students_details->group;?></b></h4>

                            </div>
                            
                        </div>
                                                
                </div>
        </div>
        <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Academics Info</h3>
                    <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-9 ">
                                                
                                                   
                                                
                                            </div>

                                                
                </div>
        </div>
        </div>
        <div class="col-md-6">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Attendance Info</h3>
                    <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-9 ">
                                                
                                                   
                                                
                                            </div>

                                                
                </div>
        </div>
        <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Homework Info</h3>
                    <span class="pull-right clickable"> <i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-9 ">
                                                
                                                   
                                                
                                            </div>

                                                
                </div>
        </div>
        </div>
        </div>

    </div>
</div>
</div>
</div>

</div>

               

</body>
            <?php $this->load->view('scripts.php'); ?>

 <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
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
<script type="text/javascript">
  $(document).ready(function()
  {
    // $(".close-body").css('display','none');
    //     $('.panel-heading').find('span').find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');

  })
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
