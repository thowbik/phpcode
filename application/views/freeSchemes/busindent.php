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
                                    <h1>BUS PASS INDENT</h1>
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
                                    <!-- <?php $this->load->view('emis_school_profile_header1.php'); ?> -->
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
                                                <table class="table">
                                                <tr>
                                                    <th>
                                                        <label class="control-label bold">Select Class</label>
                                                        <select class="form-control" id="appli_class" name="appli_class" onchange="document.getElementById('selected_class').value=this.value">
                                                            <option value="" >Select Classes</option>
                                                            <?php
                                                                foreach($class_id as $cls){
                                                            ?>
                                                                    <option value="<?php echo($cls['id']); ?>" ><?php echo($cls['class_studying']); ?></option>
                                                            <?php
                                                                } 
                                                            ?>
                                                        </select>
                                                    </th>
                                                    <!--<th>
                                                        <br />
                                                        <label for="selectall">Select All</label>
                                                        <input type="checkbox" id="selectall" name="selectall" class="custom-form-control" /></th>-->
                                                    <th>
                                                        <br />
                                                        <button type="button" id="emis_stu_searchsep_sub" name="emis_stu_searchsep_sub" class="btn green btn-md">Submit</button>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>         
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>BusPass Indent</div>
                                            <div class="tools"></div> 
                                        </div>
                                        <div class="portlet-body">
                                            <form id="bus_scheme_indent" name="bus_scheme_indent" method="post" action="<?php echo base_url().'Basic/busIndentSubmit/';?>">   
                                                <table class="table table-striped table-bordered table-hover" style="alignment- left: !important;" id="busindent">
                                                    <thead>
                                                        <tr style="text-align: left;">
                                                            <th>S.No.</th>
                                                            <th>Student ID</th>                        
                                                            <th>Student Name   &nbsp;&nbsp;</th>
                                                            <th>Section</th>
                                                            <th>
                                                                Buspass Required &nbsp;&nbsp;<input type="checkbox" id="selectall" name="selectall" class="custom-form-control" onchange="selectallcheck(this)" />
                                                                <input type="hidden" id="selected_class" name="selected_class" value="" /> 
                                                            </th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>Route </th>
                                                            <!--th style="width:150px;">Options</th>
                                                            <th></th--!>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="busIndent"> 
                                                    </tbody>
                                                </table>
                                                <div class="form-row text-center">
                                                    <input type="hidden" name="finalsub" id="finalsub" value="0" />
                                                    <input type="hidden" name="redirect" id="redirect" value="Basic/callbusindent" />
                                                    <div class="form-group col-md-12">
                                                        <button type="button" class="btn btn-primary" id="ssubmit"  onclick="return checkRequired(this.form.id,'','recommed',validate)">Submit</button>
                                                        <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                        <button type="button" class="btn btn-danger" id="fsubmit" onclick="document.getElementById('finalsub').value=1;return checkRequired(this.form.id,'','recommed',validate);">Final Submit</button>
                                                    </div>
                                                </div>
                                                    
                                                <button style="visibility:hidden;">DDDD</button>
                                            </form>
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
    <?php $this->load->view('footer.php'); ?>
    <?php $this->load->view('scripts.php'); ?>
    <script src="<?php echo base_url().'asset/js/block.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
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
        
        <script>
            function setApplicableClass(node){
                var low=node.options[node.selectedIndex].getAttribute('data-low');
                var high=node.options[node.selectedIndex].getAttribute('data-high');
                //alert(low+' ------ '+high);
                var html='<option value="">Select Class</option>';
                for(var i=parseInt(low);i<=parseInt(high);i++){
                    html+='<option value="'+i+'">'+i+'</option>';
                }
                document.getElementById('appli_class').innerHTML=html;
            }
            
            
            
            $(document).ready(function(){ 
                $("#emis_stu_searchsep_sub").click(function(){ 
                    var appli_class = $("#appli_class").val();
                    document.getElementById('selectall').checked=false;
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/getStudentsForBusIndent',
                        data:"&appli_class="+appli_class,
                        success: function(resp){
                            var jsArr=JSON.parse(resp);
                            var ele='',check='';opt='';
                            var tr='<tr>';
                            
                            for(ver in jsArr){
                                if(jsArr[ver]['finalsub']==1)
                                    opt='disabled';
                            }
                            
                            for(td in jsArr){
                                if(jsArr[td]['created_date']!=null){
                                    if(jsArr[td]['finalsub']!=1){
                                        check='checked';
                                        ele='';
                                    }
                                    else{
                                        check='checked';
                                        ele='disabled';
                                    }
                                }
                                else{
                                    ele='disabled';
                                    check='';
                                }
                                tr+='<td style="text-align: center;">'+(parseInt(td)+1)+'</td>';
                                tr+='<td style="text-align: center;">'+jsArr[td]['unique_id_no']+'</td>';
                                tr+='<td style="text-align: left;">'+jsArr[td]['name']+'</td>';
                                tr+='<td style="text-align: center;">'+jsArr[td]['class_section']+'</td>';
                                tr+='<td style="text-align: left;"><input type="checkbox" class="custom-form-control" id="opt_'+jsArr[td]['id']+'" name="opt_'+jsArr[td]['id']+'" value="1" onchange="optionenable(this)" '+opt+' '+check+' /> </td>';
                                tr+='<td style="text-align: left;"><input type="text" class="form-control" id="busfrom_'+jsArr[td]['id']+'" name="busfrom_'+jsArr[td]['id']+'" value="'+(jsArr[td]['from_stoping']==null?'':jsArr[td]['from_stoping'])+'" '+ele+' /> </td>';
                                tr+='<td style="text-align: left;"><input type="text" class="form-control" id="busto_'+jsArr[td]['id']+'" name="busto_'+jsArr[td]['id']+'" value="'+(jsArr[td]['to_stoping']==null?'':jsArr[td]['to_stoping'])+'" '+ele+' /> </td>';
                                tr+='<td style="text-align: left;"><input type="text" class="form-control" id="route_'+jsArr[td]['id']+'" name="route_'+jsArr[td]['id']+'" value="'+(jsArr[td]['bus_routes']==null?'':jsArr[td]['bus_routes'])+'" '+ele+' /> </td>';
                                tr+='</tr>';
                            }
                            $("#busIndent").html(tr);
                            if(opt!=''){
                                document.getElementById('ssubmit').disabled=true;
                                document.getElementById('fsubmit').disabled=true;
                            }
                            return true;              
                        },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            return false;  
                        }
                    });
                });  
            }); 
            
            
            async function selectallcheck(node){
                //alert(node.checked);
                var checkbox=document.querySelectorAll('input[type="checkbox"]');
                if(node.id=='selectall'){
                    for(c in checkbox){
                        checkbox[c].checked=node.checked;
                        if(checkbox[c].hasAttribute('onchange')){
                            await sleep(50);
                            checkbox[c].onchange();
                        }
                    }
                }
                else{
                    document.getElementById('selectall').checked=false;
                }
               
            }
            function sleep(ms) {
                var promise1 = new Promise(function(resolve, reject) {
                  setTimeout(function() {
                    resolve('foo');
                  }, ms);
                });
            }
           function validate(frm){
               frm=document.getElementById(frm);
               swal({
               title: "Are you sure?",
               text: "You Have Validated The Form",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Yes, Save!",
               closeOnConfirm: false,
               showLoaderOnConfirm: true
                }, function(isConfirm){
               if (isConfirm) 
                      frm.submit();
               else
                       swal("Cancelled", "Your cancelled the student profile", "error");
               });	
           }
           
           function optionenable(opt){
                var optid=opt.id.split('_');
                if(opt.checked){
                    document.getElementById('busfrom_'+optid[1]).disabled=false;
                    document.getElementById('busto_'+optid[1]).disabled=false;
                    document.getElementById('route_'+optid[1]).disabled=false;
                    document.getElementById('busfrom_'+optid[1]).setAttribute('required','required');
                    document.getElementById('busto_'+optid[1]).setAttribute('required','required');
                    document.getElementById('route_'+optid[1]).setAttribute('required','required');
                }
                else{
                    document.getElementById('busfrom_'+optid[1]).disabled=true;
                    document.getElementById('busto_'+optid[1]).disabled=true;
                    document.getElementById('route_'+optid[1]).disabled=true;
                    document.getElementById('busfrom_'+optid[1]).removeAttribute('required');
                    document.getElementById('busto_'+optid[1]).removeAttribute('required');
                    document.getElementById('route_'+optid[1]).removeAttribute('required');
                }
                return true;
           }
           
           function distridateinput(node){
                var id=node.id;
                var sp=id.split('_');
                var dt=document.getElementById('dt_'+sp[1]).value;
                if(node.value!=''||node.value!=null){
                    if(dt==null||dt=='')
                        alert('Both Distribution And Unique ID is Compulsory');
                }
            }
        </script>
              
    </body>
</html>