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
                                    <h1>BUSPASS DISTRIBUTION</h1>
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
                                            <i class="fa fa-globe"></i>BusPass Distribution Indent</div>
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
                                                            <th>Buspass Required &nbsp;&nbsp;<input type="checkbox" id="selectall" name="selectall" class="custom-form-control" onchange="selectallcheck(this)" />
                                                            <input type="hidden" id="selected_class" name="selected_class" value="" /> 
                                                            </th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>Route </th>
                                                            <th>Reference </th>
                                                            <th style="width:150px;">Distribution Date
                                                                <div class="input-append date" id="dp3" max="<?php echo(date("Y-m-d",strtotime("now+5hours30minutes"))); ?>">
                                                                    <input type="hidden" id="datepicker" onchange="alldatedisplay(this)" /> 
                                                                    <span class="add-on"><i class="icon-calendar" id="cal2"></i></span>
                                                                </div>
                                                            </th>
                                                            <!--th style="width:150px;">Options</th>
                                                            <th></th--!>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="busIndent"> 
                                                    </tbody>
                                                </table>
                                                <div class="form-row text-center">
                                                    <input type="hidden" name="finalsub" id="finalsub" value="1" />
                                                    <input type="hidden" name="redirect" id="redirect" value="Basic/callbusdis" />
                                                    <div class="form-group col-md-12">
                                                        <button type="button" class="btn btn-primary" id="ssubmit"  onclick="return checkRequired(this.form.id,'','recommed',validate)">Submit</button >
                                                        <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                        <!--button type="button" class="btn btn-danger" id="fsubmit" onclick="document.getElementById('finalsub').value=1;return checkRequired(this.form.id,'','recommed',validate);">Final Submit</button --!>
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
            var dt=document.getElementById('dp3');
            
            $("#dp3").click(function(){
                var mind=dt.getAttribute('min').split('-');
                var maxd=dt.getAttribute('max').split('-');
                mind[1]=parseInt((parseInt(mind[1])/10))==0?(parseInt(mind[1])%10):mind[1];
                mind[1]=parseInt(mind[1])-1;
                maxd[1]=parseInt((parseInt(maxd[1])/10))==0?(parseInt(maxd[1])%10):maxd[1];
                maxd[1]=parseInt(maxd[1])-1;
                $("#dp3").datepicker({
                    startDate: new Date(mind[0],mind[1],mind[2]),
                    endDate: new Date(maxd[0],maxd[1],maxd[2])});
             
            });
            
             function alldatedisplay(node){
                var datebox=document.querySelectorAll('input[type="date"]');
                var dt=new Date(node.value);
                var yy=dt.getFullYear();
                var mm=dt.getMonth()+1;
                var dd=dt.getDate();
                if(mm<10){mm='0'+mm;}if(dd<10){dd='0'+dd;}
                for(c in datebox){
                   datebox[c].value=yy+'-'+mm+'-'+dd;
                }
            }
             
            
            $(document).ready(function(){ 
                $("#emis_stu_searchsep_sub").click(function(){ 
                    var appli_class = $("#appli_class").val();
                    document.getElementById('selectall').checked=false;
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/busDistribution',
                        data:"&appli_class="+appli_class,
                        success: function(resp){
                            var jsArr=JSON.parse(resp);
                            var ele='',check='',opt='',bit=0;
                            var tr='<tr>';
                            if(jsArr.length>0){
                                for(td in jsArr){
                                    if(jsArr[td]['distribution_date']!='' && jsArr[td]['distribution_date']!=null){
                                        opt='readonly';
                                    }
                                    else{
                                        opt='';
                                        bit=1;
                                    }
                                    tr+='<td style="text-align: center;">'+(parseInt(td)+1)+'</td>';
                                    tr+='<td style="text-align: center;">'+jsArr[td]['unique_id_no']+'</td>';
                                    tr+='<td style="text-align: left;">'+jsArr[td]['name']+'</td>';
                                    tr+='<td style="text-align: center;">'+jsArr[td]['name']+'</td>';
                                    tr+='<td style="text-align: left;"><input type="checkbox" class="custom-form-control" id="opt_'+jsArr[td]['id']+'" name="opt_'+jsArr[td]['id']+'" value="1" onchange="optionenable(this)" checked readonly /> </td>';
                                    tr+='<td style="text-align: left;"><input type="text" class="form-control" id="busfrom_'+jsArr[td]['id']+'" name="busfrom_'+jsArr[td]['id']+'" value="'+(jsArr[td]['from_stoping']==null?'':jsArr[td]['from_stoping'])+'"  readonly  /> </td>';
                                    tr+='<td style="text-align: left;"><input type="text" class="form-control" id="busto_'+jsArr[td]['id']+'" name="busto_'+jsArr[td]['id']+'" value="'+(jsArr[td]['to_stoping']==null?'':jsArr[td]['to_stoping'])+'"  readonly  /> </td>';
                                    tr+='<td style="text-align: left;"><input type="text" class="form-control" id="route_'+jsArr[td]['id']+'" name="route_'+jsArr[td]['id']+'" value="'+(jsArr[td]['bus_routes']==null?'':jsArr[td]['bus_routes'])+'"  readonly  /> </td>';
                                    tr+='<td style="text-align: left;"><input type="text" id="ser_'+jsArr[td]['id']+'" name="ser_'+jsArr[td]['id']+'" placeholder="UNIQUE NUMBER" value="'+(jsArr[td]['unique_supply']==null?'':jsArr[td]['unique_supply'])+'" class="form-control" onblur="distridateinput(this)" '+opt+' /></td>';
                                    tr+='<td style="text-align: left;"><input type="date" class="form-control" id="dt_'+jsArr[td]['id']+'" name="dt_'+jsArr[td]['id']+'" value="'+(jsArr[td]['distribution_date']==null?'':jsArr[td]['distribution_date'])+'"   max="'+jsArr[td]['lstdt']+'" '+opt+' /> </td>';
                                    tr+='</tr>';
                                    check=jsArr[td]['created_date'];
                                }
                                $("#busIndent").html(tr);
                                document.getElementById('dp3').setAttribute('min',check);
                                if(opt!='' && bit==0){
                                    document.getElementById('ssubmit').disabled=true;
                                    document.getElementById('fsubmit').disabled=true;
                                }
                            }
                            else{
                                alert('No Entries Found');
                                $("#busIndent").html('');
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
            
            function alldatedisplay(node){
                var datebox=document.querySelectorAll('input[type="date"]');
                var dt=new Date(node.value);
                var yy=dt.getFullYear();
                var mm=dt.getMonth()+1;
                var dd=dt.getDate();
                if(mm<10){mm='0'+mm;}if(dd<10){dd='0'+dd;}
                for(c in datebox){
                   datebox[c].value=yy+'-'+mm+'-'+dd;
                }
            }
        </script>
              
    </body>
</html>