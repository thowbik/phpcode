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
        .tooltip-inner {
            max-width:100% !important;
        }
    </style>
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
            <?php  
                if($this->session->userdata('emis_state_id')!=''){
                    $this->load->view('state/header.php');
                }elseif($this->session->userdata('emis_district_id')!=''){
                    $this->load->view('Ceo_District/header.php');
                }elseif($this->session->userdata('emis_deo_id')){
                    $this->load->view('Deo_District/header.php'); 
                }elseif($this->session->userdata('emis_block_id')){
                    $this->load->view('beo_Block/header.php'); 
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
                                    <h1>SCHOOL BASIC INFORMATION</h1>
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
                        <div class="page-content" >
                            <div class="container" style="width:95%;">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                    <div class="portlet light portlet-fit ">
                                        <form style="padding:10px;">
                                            <div class="col-md-6">
                                                <label for="udisecode">UDISE CODE</label><br />
                                                <label>(If multiple Udise Code Use Comma Seperated eg:33xxxxxxxxx,33xxxxxxxxx)</label>
                                            </div>
                                            <div class="col-md-4">
                                                <textarea class="form-control" id="udise_code" rows="5" placeholder="33201201201,33201201202,...." onblur="textareaLengthChecking()" onkeypress="return PressLengthChecking(event)"></textarea>
                                            </div>
                                            <div class="col-md-2"><input type="button" value="Search" name="Search" class="btn btn-primary" style="margin:30px 0;" onclick="event.preventDefault();renewalChecking();" /></div>
                                        </form>
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th>S.No.</th>
                                                <th>Udise Code</th>
                                                <th>School Name</th>
                                                <th>District</th>
                                                <th>Edu.District</th>
                                                <th>Block</th>
                                                <th>Directorate</th>
                                                <th>Applied</th>
                                                <th>Pending</th>
                                                <th>Validity</th>
                                                <th>Classes</th>
                                                <th>PENDING STATUS</th>
                                            </thead>
                                            <tbody id="statuschecklist">
                                            </tbody>
                                        </table>
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
    
    <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/js/vivekrao/jsonpost.js';?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!-- END PAGE LEVEL SCRIPTS --> 
    
    <script>
        $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip();   
        });
        
        function PressLengthChecking(evt){
            var udise=document.getElementById('udise_code');
            var fil=udise.value;
            var newStr='';
            
            var evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            if(fil.length>11){
                var str_array=fil.split(",");
                for(var i = 0; i < str_array.length; i++) {
                    newStr+=str_array[i].replace(/(\d{11})/g,'$1,');
                }
                fil=newStr;
            }
            udise.value=fil;
            return true;    
        }
        
        function textareaLengthChecking(){
            var udise=document.getElementById('udise_code');
            var fil=udise.value;
            var str_array=fil.split(",");
            var newStr='';
            for(var i = 0; i < str_array.length; i++) {
                if(str_array[i]!='')
                    newStr+=str_array[i].replace(/(\d{11})/g,'$1,');
            }
            udise.value=newStr;
        }
        
        function renewalChecking(){
            var fil=document.getElementById('udise_code').value.split(',');
            var fileid=JSON.stringify(fil);
            //alert(fileid);
            $.ajax({
                type: "POST",
                url:baseurl+'AllApprove/renewalChecking/1',
                data:"&udise="+fileid,
                success: function(resp){
                    var js=JSON.parse(resp);
                    if(js!=''){
                        var i=1;var str='';
                        for(var v in js){
                            str+='<tr>';
                            str+='<td>'+(i++)+'</td>';
                            str+='<td>'+js[v]['udise_code']+'</td>';
                            str+='<td>'+js[v]['school_name']+'</td>';
                            str+='<td>'+js[v]['district_name']+'</td>';
                            str+='<td>'+js[v]['edu_dist_name']+'</td>';
                            str+='<td>'+js[v]['block_name']+'</td>';
                            str+='<td>'+js[v]['directorate']+'</td>';
                            str+='<td>'+js[v]['applied_category']+'</td>';
                            str+='<td>'+js[v]['pending_days']+'</td>';
                            str+='<td>'+js[v]['validity']+'</td>';
                            str+='<td>'+js[v]['valid_class']+'</td>';
                            str+='<td>'+js[v]['pending_desc']+'</td>';
                            str+='</tr>';
                        }
                        $("#statuschecklist").html(str);
                    }            
                },
                error: function(e){ 
                    alert('Error: ' + e.responseText);
                    rtmnode.innerHTML='';
                    return false;  
                }
            });
        }
        
    </script>
</body>
</html>
