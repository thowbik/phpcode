<?php $action = 'Basic/save_noonmeal_indent';
      $redirect = 'Basic/noonmeal_indent';
    //   print_r($dtls);
    // echo $school_manage;
?>
<style>
    .green {
        color: green;
    }
    .red {
        color: red;
    }
</style>
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
	<link href="<?php echo base_url().'asset/css/support/custom-vivek.css';?>" rel="stylesheet" type="text/css" />
    
    <style type="text/css">
        a:hover,a:focus{
              text-decoration: none;
              outline: none;
        }

        .tab .nav-tabs{
            border: none;
            margin: 0;
        }
        .tab .nav-tabs li a{
            padding: 10px;
            /* margin-right: 20px; */
            margin-left: 20px;
            font-size: 14px;
            font-weight: 600;
            color: #293241;
            text-transform: uppercase;
            border: none;
            border-radius: 0;
            background: transparent;
            z-index: 2;
            position: relative;
            transition: all 0.3s ease 0s;
        }

.tab .nav-tabs li a:hover,
.tab .nav-tabs li.active a{ border: none; }
.tab .nav-tabs li a:before{
    content: "";
    width: 100%;
    height: 4px;
    background: #f6f6f6;
    border: 1px solid #e9e9e9;
    border-radius: 2px;
    position: absolute;
    bottom: 0;
    left: 0;
}
.tab .nav-tabs li a:after{
    content: "";
    width: 0;
    height: 4px;
    background: #2bbaa5;
    border: 1px solid #2bbaa5;
    border-radius: 2px;
    position: absolute;
    bottom: 0;
    left: 0;
    opacity: 0;
    z-index: 1;
    transition: all 1s ease 0s;
}
.tab .nav-tabs li:hover a:after,
.tab .nav-tabs li.active a:after{
    width: 100%;
    opacity: 1;
}
.tab .tab-content{
    padding: 15px 20px;
    /* margin-top: 20px;
    font-size: 17px;
    color: #fff;
    letter-spacing: 1px;
    line-height: 30px;
    background: #727cb6; */
    position: relative;
}
@media only screen and (max-width: 479px){
    .tab .nav-tabs li{
        width: 100%;
        text-align: center;
        margin-bottom: 15px;
    }
    .tab .tab-content{ margin-top: 0; }
}

.table-row
{
    text-align: center !important;
    background-color: #32c5d2;
    color: #ffffff;
}

    </style>
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
            <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
            <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
            <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
            <?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>
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
                                    <h1>Previous Year Student list </h1>
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
                            <div class="container">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                    <?php $this->load->view('emis_school_profile_header1.php'); ?>
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
                                                        <div class="tab" role="tabpanel">
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Academic-year (2017-18)</a></li>
                                                                <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Academic-year (2018-19)</a></li>
                                                            </ul>
                                                            <!-- Tab panes -->
                                                            <div class="tab-content tabs">
                                                                <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                                                                        <div class="portlet-body">
                                                                                            <!-- <form id="acyr_form1" name="acyr_form1" method="post" action="<?php echo base_url().$action;?>"> -->
                                                                                                <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;" id="sample_3">
                                                                                                    <thead>
                                                                                                        <tr class="table-row">
                                                                                                            <th class="center">S.No.</th>
                                                                                                            <!-- <th class="center">Student ID</th>  -->
                                                                                                            <th class="center">Register No.</th>
                                                                                                            <th class="center">Student Name</th>
                                                                                                            <th class="center">Gender</th>
                                                                                                            <th class="center">Date of Brith </th>
                                                                                                            <th class="center">Result</th>                        
                                                                                                            <th class="center">Current Status</th>
                                                                                                            <th class="center th_management" style="display:none">XII Std Section</th>
                                                                                                            <th class="center" style="width:2% !important;">Has Laptop Been Distributed?</th>
                                                                                                            <th class="center">Action</th>
                                                                                                        </tr>
                                                                                                        
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php if(!empty($acyr_1718_dtls)){ 
                                                                                                            $sno = 1;
                                                                                                            foreach($acyr_1718_dtls as $d){ 
                                                                                                        ?>
                                                                                                            <tr>
                                                                                                            <td class="center"><?=$sno++;?></td>
                                                                                                            <td><?= $d->REGNO; ?></td>
                                                                                                            <td <?=($d->id == '') ? "class='red'" : "class='green'" ?>><?= $d->NAME; ?></td>
                                                                                                            <td><?= $d->SEX; ?></td>
                                                                                                            <td><?= date('d/m/Y', strtotime(substr($d->DOB, 2, 2).'/'.substr($d->DOB, 0, 2).'/'.substr($d->DOB, 4, 2))); ?>
                                                                                                            </td>
                                                                                                            <td><select class="form-control" id="result1718_<?= $d->REGNO; ?>" name="result1718_<?= $d->REGNO; ?>" onchange="myFunction(this,<?= $d->REGNO; ?>,'1718')"  >
                                                                                                                    <option value="pass">Pass</option>
                                                                                                                    <option value="fail">Fail</option>
                                                                                                                    <option value="other">Others</option>
                                                                                                                </select>
                                                                                                                <div id="resultdiv1718_<?= $d->REGNO; ?>" style="padding-top: 5px;display:none;"><input type="text" size="6" class="form-control" id="specify_result1718_<?= $d->REGNO; ?>" name="specify_result1718_<?= $d->REGNO; ?>" placeholder="Specify Result" > </div>
                                                                                                                </td>
                                                                                                            <td><select class="form-control" id="current_status1718_<?= $d->REGNO; ?>" name="current_status1718_<?= $d->REGNO; ?>" onchange="myFunction2(this,<?= $d->REGNO; ?>,'1718')"> 
                                                                                                                    <option value="joined engineering college">Joined Engineering College</option>
                                                                                                                    <option value="joined polytechnic college">Joined Polytechnic College</option>
                                                                                                                    <option value="joined arts and science / law college">Joined Arts And Science / Law College</option>
                                                                                                                    <option value="joined medical college">Joined Medical College</option>
                                                                                                                    <option value="not studying / working">Not Studying / Working</option>
                                                                                                                    <option value="working">Working</option>
                                                                                                                    <option value="other">Others</option>  
                                                                                                                </select>
                                                                                                                <div id="statusdiv1718_<?= $d->REGNO; ?>" style="padding-top: 5px;display:none;"><input type="text" class="form-control" id="specify_current_status1718_<?= $d->REGNO; ?>" name="specify_current_status1718_<?= $d->REGNO; ?>" placeholder="Specify Current Status" > </div>
                                                                                                            </td>
                                                                                                            <td class="td_management" style="display:none"><select class="form-control" id="management_type1718_<?= $d->REGNO; ?>" name="management_type1718_<?= $d->REGNO; ?>"  >
                                                                                                                    <option value="aided">Govt.Aided Section</option>
                                                                                                                    <option value="self financial">Self Financed Section</option>
                                                                                                                </select>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                <select class="form-control" id="distribution1718_<?= $d->REGNO; ?>" name="distribution1718_<?= $d->REGNO; ?>"> 
                                                                                                                    <option value=1>Yes</option>
                                                                                                                    <option value=0>No</option>
                                                                                                                </select>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                <div style="display:none"><input type="hidden" class="form-control" id="hide_dob1718_<?= $d->REGNO; ?>" name="hide_dob1718_<?= $d->REGNO; ?>" value="<?= date('Y-m-d', strtotime(substr($d->DOB, 2, 2).'/'.substr($d->DOB, 0, 2).'/'.substr($d->DOB, 4, 2))); ?>" > </div>
                                                                                                                <div style="display:none"><input type="hidden" class="form-control" id="hide_flag1718_<?= $d->REGNO; ?>"> </div>
                                                                                                                <button class="btn green" onclick="save_dtls(<?= $d->REGNO; ?>,'1718');">Save</button>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <?php  } } else { ?><tr> <td colspan="7"> <center>No Data Found </center></td> </tr> <?php } ?>
                                                                                                        </tbody>
                                                                                                    
                                                                                                </table>
                                                                                                <!-- <div class="form-row text-center">
                                                                                                    <div class="form-group col-md-offset-8 col-md-4">
                                                                                                        <button type="button" class="btn btn-primary" id="form1_submit"  onclick="return validate();">Submit</button>
                                                                                                        <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form> -->
                                                                                        </div>
                                                                                    
                                                                    
                                                                </div>
                                                                <div role="tabpanel" class="tab-pane fade" id="Section2">
                                                                                        <div class="portlet-body">
                                                                                                <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;" id="sample_3">
                                                                                                    <thead>
                                                                                                        <tr class="table-row">
                                                                                                            <th class="center">S.No.</th>
                                                                                                            <!-- <th class="center">Student ID</th>  -->
                                                                                                            <th class="center">Register No.</th>
                                                                                                            <th class="center">Student Name</th>
                                                                                                            <th class="center">Gender</th>
                                                                                                            <th class="center">Date of Brith </th>
                                                                                                            <th class="center">Result</th>                        
                                                                                                            <th class="center">Current Status</th>
                                                                                                            <th class="center th_management" style="display:none">Management Type</th>
                                                                                                            <th class="center" style="width:2% !important;">Has Laptop Been Distributed ?</th>
                                                                                                            <th class="center">Action</th>
                                                                                                        </tr>
                                                                                                        
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php if(!empty($acyr_1819_dtls)){ 
                                                                                                            $sno = 1;
                                                                                                            foreach($acyr_1819_dtls as $d){ 
                                                                                                        ?>
                                                                                                            <tr>
                                                                                                            <td class="center"><?=$sno++;?></td>
                                                                                                            <td><?= $d->REGNO; ?></td>
                                                                                                            <td <?=($d->id == '') ? "class='red'" : "class='green'" ?>><?= $d->NAME; ?></td>
                                                                                                            <td><?= $d->SEX; ?></td>
                                                                                                            <td><?= date('d/m/Y', strtotime(substr($d->DOB, 2, 2).'/'.substr($d->DOB, 0, 2).'/'.substr($d->DOB, 4, 2))); ?>
                                                                                                            </td>
                                                                                                            <td><select class="form-control" id="result1819_<?= $d->REGNO; ?>" name="result1819_<?= $d->REGNO; ?>" onchange="myFunction(this,<?= $d->REGNO; ?>,'1819')"  >
                                                                                                                    <option value="pass">Pass</option>
                                                                                                                    <option value="fail">Fail</option>
                                                                                                                    <option value="other">Others</option>
                                                                                                                </select>
                                                                                                                <div id="resultdiv1819_<?= $d->REGNO; ?>" style="padding-top: 5px;display:none;"><input type="text" class="form-control" id="specify_result1819_<?= $d->REGNO; ?>" name="specify_result1819_<?= $d->REGNO; ?>" placeholder="Specify Result" > </div>
                                                                                                                </td>
                                                                                                            <td><select class="form-control" id="current_status1819_<?= $d->REGNO; ?>" name="current_status1819_<?= $d->REGNO; ?>" onchange="myFunction2(this,<?= $d->REGNO; ?>,'1819')"> 
                                                                                                                    <option value="joined engineering college">Joined Engineering College</option>
                                                                                                                    <option value="joined polytechnic college">Joined Polytechnic College</option>
                                                                                                                    <option value="joined arts and science / law college">Joined Arts And Science / Law College</option>
                                                                                                                    <option value="joined medical college">Joined Medical College</option>
                                                                                                                    <option value="not studying / working">Not Studying / Working</option>
                                                                                                                    <option value="working">Working</option>
                                                                                                                    <option value="other">Others</option>  
                                                                                                                </select>
                                                                                                                <div id="statusdiv1819_<?= $d->REGNO; ?>" style="padding-top: 5px;display:none;"><input type="text" class="form-control" id="specify_current_status1819_<?= $d->REGNO; ?>" name="specify_current_status1819_<?= $d->REGNO; ?>" placeholder="Specify Current Status" > </div>
                                                                                                            </td>
                                                                                                            <td class="td_management" style="display:none"><select class="form-control" id="management_type1819_<?= $d->REGNO; ?>" name="management_type1819_<?= $d->REGNO; ?>"  >
                                                                                                                    <option value="aided">Govt.Aided</option>
                                                                                                                    <option value="self financial">Self Financial</option>
                                                                                                                </select>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                <select class="form-control" id="distribution1819_<?= $d->REGNO; ?>" name="distribution1819_<?= $d->REGNO; ?>"> 
                                                                                                                    <option value=1>Yes</option>
                                                                                                                    <option value=0>No</option>
                                                                                                                </select>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                <div style="display:none"><input type="hidden" class="form-control" id="hide_dob1819_<?= $d->REGNO; ?>" name="hide_dob1718_<?= $d->REGNO; ?>" value="<?= date('Y-m-d', strtotime(substr($d->DOB, 2, 2).'/'.substr($d->DOB, 0, 2).'/'.substr($d->DOB, 4, 2))); ?>" > </div>
                                                                                                                <div style="display:none"><input type="hidden" class="form-control" id="hide_flag1819_<?= $d->REGNO; ?>"> </div>
                                                                                                                <button class="btn green" onclick="save_dtls(<?= $d->REGNO; ?>,'1819');">Save</button>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <?php  } }else{?><tr> <td colspan="7"> <center>No Data Found </center></td> </tr> <?php } ?>
                                                                                                        </tbody>
                                                                                                    
                                                                                                </table>
                                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                <strong> NOTE :<i><span class="green">Green</span> Enteries are saved
                                                                <span class="red">Red</span> Enteries are not saved </i> </strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <!-- <div class="alert alert-danger alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Error Occur ! </strong><span id="errormsg"></span>
                                            </div> -->
                                            <!-- <div class="alert alert-danger" style="display: none">
                                                <strong>Error Occur ! </strong><span id="errormsg"></span>
                                            </div> -->
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('footer.php'); ?>
    
    <?php $this->load->view('scripts.php'); ?>
    <script src="<?php echo base_url().'asset/js/block.js';?>" type="text/javascript"></script>
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
        <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->

        <script>
            window.onload=function(){};
                        
            $(document).ready(function(){ 
                            var hash = window.location.hash;
                            // alert(hash)
                            if(hash == '1819'){$('.nav-tabs a[href="' + hash + '"]').tab('show');}
                            //Validation 2,4(aided schools and partially aided) means management will shown otherwise hide 
                            if('<?= $school_manage; ?>' == 2 || '<?= $school_manage; ?>' == 4){
                                    $(".th_management").show(); 
                                    $(".td_management").show(); 
                            }
                            else{
                                    $(".th_management").hide(); 
                                    $(".td_management").hide(); 
                            }

                var arr1 = <?php echo json_encode($acyr_1718_dtls); ?>;
                $.each(arr1, function(key,val) {
                    // console.log(val);
                    if(val.id != ''){
                        if( val.ac_year == '2017-2018'){
                            $("#hide_flag1718_"+val.REGNO).val(1);
                            $("#management_type1718_"+val.REGNO+" option[value='"+val.class_type+"']").attr('selected','selected');
                            $("#result1718_"+val.REGNO+" option[value='"+val.result+"']").attr('selected','selected');
                            if(val.result == 'other'){
                                $("#specify_result1718_"+val.REGNO).val(val.result_other);
                                $("#resultdiv1718_"+val.REGNO).show();
                            }
                            $("#current_status1718_"+val.REGNO+" option[value='"+val.current_status+"']").attr('selected','selected');
                            if(val.current_status == 'other'){
                                $("#specify_current_status1718_"+val.REGNO).val(val.status_other);
                                $("#statusdiv1718_"+val.REGNO).show();
                            } 
                            $("#distribution1718_"+val.REGNO+" option[value='"+val.laptop_distributed+"']").attr('selected','selected') ;
                        }
                        else $("#hide_flag1718_"+val.REGNO).val(0); 
                        // 'result':$("#result1718_"+stud_reg_no).val(),
                        // 'result_other':$("#specify_result1718_"+stud_reg_no).val(),
                        // 'current_status':$("#current_status1718_"+stud_reg_no).val(),
                        // 'status1718_other':$("#specify_current_status1718_"+stud_reg_no).val(),
                        // 'created_at': date.getFullYear()+'-'+(date.getMonth()+1)+"-"+date.getDate()
                    }
                    else $("#hide_flag1718_"+val.REGNO).val(0);
                });

                var arr2 = <?php echo json_encode($acyr_1819_dtls); ?>;
                $.each(arr2, function(key,val) {
                    if(val.id != ''){
                        if( val.ac_year == '2018-2019'){
                            $("#hide_flag1819_"+val.REGNO).val(1);
                            $("#management_type1819_"+val.REGNO+" option[value='"+val.class_type+"']").attr('selected','selected');
                            $("#result1819_"+val.REGNO+" option[value='"+val.result+"']").attr('selected','selected');
                            if(val.result == 'other'){
                                $("#specify_result1819_"+val.REGNO).val(val.result_other);
                                $("#resultdiv1819_"+val.REGNO).show();
                            }
                            $("#current_status1819_"+val.REGNO+" option[value='"+val.current_status+"']").attr('selected','selected');
                            if(val.current_status == 'other'){
                                $("#specify_current_status1819_"+val.REGNO).val(val.status_other);
                                $("#statusdiv1819_"+val.REGNO).show();
                            }
                                $("#distribution1819_"+val.REGNO+" option[value='"+val.laptop_distributed+"']").attr('selected','selected') ;
                        } else $("#hide_flag1819_"+val.REGNO).val(0);
                    } else $("#hide_flag1819_"+val.REGNO).val(0);
                });
            }); 

           function myFunction(selectObject,regNo,acyr) {
               var value = selectObject.value;
               if(value == 'other'){
                   $("#resultdiv"+acyr+"_"+regNo).show();
               }
               else{
                $("#resultdiv"+acyr+"_"+regNo).hide();
                $("#specify_result"+acyr+"_"+regNo).val('');
               }
           }

           function myFunction2(selectObject,regNo,acyr) {
               var value = selectObject.value;
               if(value == 'other'){
                   $("#statusdiv"+acyr+"_"+regNo).show();
               }
               else{
                $("#statusdiv"+acyr+"_"+regNo).hide();
                $("#specify_current_status"+acyr+"_"+regNo).val('');
               }
           }

           function OnError(xhr, errorType, exception) {
                     try {   responseText = jQuery.parseJSON(xhr.responseText);
                        alert(errorType + " \t " + exception +
                                                + "\n\t• Exception: \t" + responseText.ExceptionType +
                                                + "\n\t• StackTrace: \t" + responseText.StackTrace +
                                                + "\n\t• Message: \t" + responseText.Message );
                     } catch (e) {
                        alert(xhr.status+' ( '+ xhr.statusText + ' ) ');
                     }
                     // alert('Error: ' + e.responseText);
                     return false;  
            }

        // function capitalize_Words(str)
        // {
        //     return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
        // }
        // console.log(capitalize_Words('js string exercises'));
        
           function save_dtls(stud_reg_no,acyr){       

                       if($("#result"+acyr+"_"+stud_reg_no).val() == 'other' && $("#specify_result"+acyr+"_"+stud_reg_no).val() == '') {
                            alert('please Enter the Result');
                            $("#specify_result"+acyr+"_"+stud_reg_no).focus();
                            return true;
                       }

                       if( $("#current_status"+acyr+"_"+stud_reg_no).val() == 'other' && $("#specify_current_status"+acyr+"_"+stud_reg_no).val() == ''){
                            alert('please Enter the Status');
                            $("#specify_current_status"+acyr+"_"+stud_reg_no).focus();
                            return true;
                       }
               
                        var arr = '';
                        var year = '';
                        if(acyr == '1718'){arr = <?php echo json_encode($acyr_1718_dtls); ?>;year = '2017-2018';}
                        else if(acyr == '1819'){arr = <?php echo json_encode($acyr_1819_dtls); ?>;year = '2018-2019';}

						var array = arr.filter(function (el) {
									return el.REGNO == stud_reg_no ;
						});

                        if($("#hide_flag"+acyr+"_"+stud_reg_no).val() == 0){
                        
                            var arrayDtls = {
                                    'school_udise_code':+array[0].UDISE_CODE, 
                                    'name':array[0].NAME,
                                    'regno':stud_reg_no,
                                    'gender':array[0].SEX,
                                    'dob':$("#hide_dob"+acyr+"_"+stud_reg_no).val(),
                                    'ac_year':year,
                                    'result':$("#result"+acyr+"_"+stud_reg_no).val(),
                                    'current_status':$("#current_status"+acyr+"_"+stud_reg_no).val(),
                                    'laptop_distributed':$("#distribution"+acyr+"_"+stud_reg_no).val(),
                            };

                            
                            if($("#specify_result"+acyr+"_"+stud_reg_no).val() != ''){
                                arrayDtls["result_other"] = $("#specify_result"+acyr+"_"+stud_reg_no).val();}
                            if($("#specify_current_status"+acyr+"_"+stud_reg_no).val() != ''){
                                arrayDtls["status_other"] = $("#specify_current_status"+acyr+"_"+stud_reg_no).val();}
                            if('<?= $school_manage; ?>' == 1){
                                arrayDtls["class_type"] = 'government'; }
                            else if('<?= $school_manage; ?>' == 2 || '<?= $school_manage; ?>' == 4){
                                arrayDtls["class_type"] = $("#management_type"+acyr+"_"+stud_reg_no).val();}
                            
                            $.ajax({
                                type: 'POST',
                                url:baseurl+'Home/add_previous_XII_dtls',
                                data: arrayDtls,
                                success: function (result, textStatus, xhrContent) {
                                    // alert('Success ');
                                         var jsArr=JSON.parse(result); 
                                         swal(jsArr[0],jsArr[1],jsArr[2]);
                                         window.location.hash = acyr == '1819' ? 'Section2' : 'Section1' ;
									     window.location.reload();
                                },
                                // error: function (result) {
                                //     // alert('Fail ');
                                //     swal("Fail", result, "error");
                                // }
                                error: OnError
                            });     
                        }
                        else if($("#hide_flag"+acyr+"_"+stud_reg_no).val() == 1){

                            var edited_arrayDtls = {
                                    'result':$("#result"+acyr+"_"+stud_reg_no).val(),
                                    'current_status':$("#current_status"+acyr+"_"+stud_reg_no).val(),
                                    'laptop_distributed':$("#distribution"+acyr+"_"+stud_reg_no).val(),
                            };

                            if(edited_arrayDtls["result"] == 'other' && $("#specify_result"+acyr+"_"+stud_reg_no).val() != ''){
                                edited_arrayDtls["result_other"] = $("#specify_result"+acyr+"_"+stud_reg_no).val();}
                            else{ edited_arrayDtls["result_other"] = null; }
                            if(edited_arrayDtls["current_status"] == 'other' && $("#specify_current_status"+acyr+"_"+stud_reg_no).val() != ''){
                                edited_arrayDtls["status_other"] = $("#specify_current_status"+acyr+"_"+stud_reg_no).val();}
                            else{ edited_arrayDtls["status_other"] = null; }
                            if('<?= $school_manage; ?>' == 1){
                                edited_arrayDtls["class_type"] = 'government'; }
                            else if('<?= $school_manage; ?>' == 2 || '<?= $school_manage; ?>' == 4){
                                edited_arrayDtls["class_type"] = $("#management_type"+acyr+"_"+stud_reg_no).val(); }
                    
                            $.ajax({
                                type: 'POST',
                                url:baseurl+'Home/edit_previous_XII_dtls',
                                data:{'id':array[0].id,'records':edited_arrayDtls},
                                success: function (result, textStatus, xhrContent) {
                                    if(result == 1)
                                    { 
                                        swal("Done", "Updated Student Successfully", "success");
                                        window.location.hash = acyr == '1819' ? 'Section2' : 'Section1' ;
                                        window.location.reload();
                                    }
                                    else swal("Fail", 'Something Went Wrong', "error");
                                },
                                error: OnError
                            });     
                        }
           }

        </script>      
    </body>
</html>