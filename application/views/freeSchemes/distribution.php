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
        .bootstrap-datetimepicker-widget.dropdown-menu.bottom {
            top: 26px !important;
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
                                    <h1>SPECIAL SCHEME INDENT</h1>
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
                                                <table class="table table-striped">
                                                <tr>
                                                    <th>
                                                        
                                                        <label class="control-label bold">Scheme Names</label>
                                                        <select class="form-control"  id="scheme_name" name="schname" onchange="setApplicableClass(this)" >
                                                            <option value="">Choose Scheme</option>
                                                            <?php
                                                                foreach($scheme as $s){
                                                            ?>
                                                                    <option value="<?php echo($s->id); ?>" data-low="<?php echo($s->appli_lowclass); ?>" data-high="<?php echo($s->appli_highclass); ?>"><?php echo($s->scheme_name); ?></option>
                                                            <?php
                                                                } 
                                                            ?>
                                                        </select> 
                                                    </th>
                                                    <th>
                                                        <label class="control-label bold">Available Classes</label>  
                                                        <select class="form-control" id="appli_class" name="appli_class">
                                                            <option value="" >Available Classes</option>
                                                        </select>
                                                    </th>
                                                    <th>
                                                        <br />
                                                        <input type="hidden" id="hdsearch" value="0" />
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
                                            <i class="fa fa-globe"></i>Distribution Indent</div>
                                            <div class="tools"></div> 
                                        </div>
                                        <div class="portlet-body">
                                            <form id="free_scheme_indent" name="free_scheme_indent" method="post" action="<?php echo base_url().'Basic/schemeIndentSubmit/';?>">
                                                <input type="hidden" id="scheme_id" name="scheme_id" />
                                                <input type="hidden" id="class_id" name="class_id" />
                                                <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Student ID</th>                        
                                                            <th>Student Name</th>
                                                            <th>Section</th>
                                                            <th>Selected</th>
                                                            <th style="width:150px;">Options</th>
                                                            <th style="width:150px;">Date</th>
                                                            <th style="width:150px;">Distribution Date
                                                                <div class="input-append date" id="dp3" max="<?php echo(date("Y-m-d",strtotime("now+5hours30minutes"))); ?>">
                                                                    <input type="hidden" id="datepicker" onchange="alldatedisplay(this)" /> 
                                                                    <span class="add-on"><i class="icon-calendar" id="cal2"></i></span>
                                                                </div>
                                                            </th>
                                                            
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody id="schemeIndent"> 
                                                    </tbody>
                                                </table>
                                                <div class="form-row text-center">
                                                    <input type="hidden" name="finalsub" id="finalsub" value="1" />
                                                    <input type="hidden" name="redirect" id="finalsub" value="Basic/calldis" />
                                                    <?php if($this->uri->segment(4,0)=='success' && $this->uri->segment(4,0)!=''){ ?>
                                                    <div class="form-group col-md-9">
                                                        <button type="button" class="btn btn-primary" onclick="return checkRequired(this.form.id);">Submit</button>
                                                        <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                        <button type="button" class="btn btn-danger" onclick="this.form.setAttribute('active','<?php echo base_url()."Basic/schemeIndentFSubmit/";?>');return checkRequired(this.form.id);">Final Submit</button>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <button type="button" class="btn btn-primary" onclick="location.href='<?php echo substr($_SERVER['PHP_SELF'], 0, -10)."/".(substr($_SERVER['PHP_SELF'], 53, -8)+1);?>'">NEXT</button>
                                                    </div>
                                                    <?php }
                                                        else{ 
                                                    ?>
                                                    <div class="form-group col-md-12">
                                                        <button type="button" class="btn btn-danger" id="fsubmit" onclick="document.getElementById('finalsub').value=1;return validate();">Submit</button>
                                                        <!--<button type="button" class="btn btn-primary" id="ssubmit"  onclick="return validate();">Submit</button>-->
                                                        <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                        
                                                    </div>
                                                    <?php } ?>
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
            
            function setApplicableClass(node){
                var low=node.options[node.selectedIndex].getAttribute('data-low');
                var high=node.options[node.selectedIndex].getAttribute('data-high');
                //alert(low+' ------ '+high);
                var html='<option value="">Avaliable Class</option>';
                for(var i=parseInt(low);i<=parseInt(high);i++){
                    html+='<option value="'+i+'">'+i+'</option>';
                }
                document.getElementById('appli_class').innerHTML=html;
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
            
            $(document).ready(function(){ 
                $("#emis_stu_searchsep_sub").click(function(){ 
                    var appli_class = $("#appli_class").val();
                    var scheme_id = $("#scheme_name").val();
                    $("#scheme_id").val(scheme_id);
                    $("#class_id").val(appli_class);
                    document.getElementById('hdsearch').value=1;
                    //document.getElementById('selectall').checked=false;
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/getDistributionScheme',
                        data:"&appli_class="+appli_class+"&scheme_id="+scheme_id,
                        success: function(resp){
                            var jsArr=JSON.parse(resp);
                            var tr="";
                            var checkbox,selectbox,datebox,readele,count=0,depe;
                            
                            if(jsArr['students'].length<=0){
                                alert('No Eligible Students Found');
                                return true;
                            }
                            var dis=0;
                            for(var i=0;i<jsArr['students'].length;i++){
                                checkbox='<input type="checkbox" class="custom-form-control"';
                                selectbox='<select class="form-control" ';
                                datebox='<input type="date" class="form-control" ';                                
                                if(dis==0){
                                    if(jsArr['students'][i]['finalsub']==0||jsArr['students'][i]['finalsub']==null){
                                        readele='';
                                    }
                                    else{
                                        readele='disabled'; 
                                    }
                                    dis=1;
                                }
                                tr+='<tr>';
                                    tr+='<td>'+(i+1)+'</td>';        //SNO.
                                    tr+='<td>'+jsArr['students'][i]['unique_id_no']+'</td>';        //Student ID NO
                                    tr+='<td>'+jsArr['students'][i]['name']+'</td>';        //Student Name
                                    tr+='<td>'+jsArr['students'][i]['class_section']+'</td>';
                                    if(jsArr['students'][i]['dependscheme']!=null){
                                        if(jsArr['students'][i]['scheme_id']==null){
                                            depe=jsArr['students'][i]['dependscheme'];
                                            if(readele==''){
                                                readele='disabled';dis=2;
                                            }
                                            checkbox+=' id="opt_'+jsArr['students'][i]['id']+'" name="opt_'+jsArr['students'][i]['id']+'" '+readele+' value="1" onchange="optionenable(this)" />';
                                        }
                                        else{
                                            checkbox+=' id="opt_'+jsArr['students'][i]['id']+'" name="opt_'+jsArr['students'][i]['id']+'" checked '+readele+' value="1" onchange="optionenable(this)" />';
                                        }
                                    }
                                    else if(jsArr['students'][i]['scheme_id']!=null){
                                        checkbox+=' id="opt_'+jsArr['students'][i]['id']+'" name="opt_'+jsArr['students'][i]['id']+'" checked '+readele+' value="1" onchange="optionenable(this)" />';
                                    }
                                    else{
                                        checkbox+=' id="opt_'+jsArr['students'][i]['id']+'" name="opt_'+jsArr['students'][i]['id']+'" value="1" '+readele+' onchange="optionenable(this)" />';
                                    }
                                    
                                    tr+='<td>'+checkbox+'</td>';        //Eligble
                                    
                                    if(jsArr['scheme'].length>=1){
                                        if(jsArr['students'][i]['scheme_id']!=3)
                                            selectbox+='id="size_'+jsArr['students'][i]['id']+'" name="size_'+jsArr['students'][i]['id']+'" '+readele+'></select>';
                                        else
                                            selectbox='All Notebooks'   
                                    }
                                    else if(jsArr['students'][i]['scheme_id']!=10 && jsArr['students'][i]['scheme_id']!=11 && jsArr['students'][i]['scheme_id']!=14)
                                        selectbox='-NA-';
                                    else{
                                        if(jsArr['students'][i]['unique_supply']==null)
                                            selectbox='<input type="text" id="ser_'+jsArr['students'][i]['id']+'" name="ser_'+jsArr['students'][i]['id']+'" placeholder="UNIQUE NUMBER" class="form-control" onblur="distridateinput(this)" />';
                                        else
                                            selectbox=jsArr['students'][i]['unique_supply'];
                                    }
                                    tr+='<td>'+selectbox+'</td>';        //Options
                                    
                                    if(jsArr['students'][i]['indent']!=null){
                                        tr+='<td>'+jsArr['students'][i]['indent']+'</td>';
                                        document.getElementById('dp3').setAttribute('min',jsArr['students'][i]['indent']);
                                    }
                                    else{
                                        tr+='<td>-</td>';
                                    }
                                    if(jsArr['students'][i]['indent']!=null && jsArr['students'][i]['distri']!=null){
                                        datebox=jsArr['students'][i]['distri'];
                                        count++;       
                                    }
                                    else if(jsArr['students'][i]['indent']!=null && jsArr['students'][i]['distri']==null){
                                        datebox+=' id="dt_'+jsArr['students'][i]['id']+'" name="dt_'+jsArr['students'][i]['id']+'" min="'+jsArr['students'][i]['indent']+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false"  />';       
                                    }
                                    else{
                                        datebox='-';
                                    }
                                    tr+='<td>'+datebox+'</td>';        //Distribution
                                    tr+='</tr>';checkbox=selectbox=datebox='';
                                    if(dis==2){readele='';}
                            }  
                            document.getElementById('schemeIndent').innerHTML=tr;
                            //document.getElementById('selectall').checked=false;
                            var opt='',multi=0;var node;
                            if(jsArr['scheme'].length>0){
                                for(var i=0;i<jsArr['students'].length;i++){
                                    node=document.getElementById('size_'+jsArr['students'][i]['id']);
                                    for(var j=0;j<jsArr['scheme'].length;j++){
                                        opt+='<option value="'+jsArr['scheme'][j]['id']+'" '+jsArr['scheme'][j]['sel']+' >'+jsArr['scheme'][j]['scheme_category']+'</option>';
                                        multi=jsArr['scheme'][j]['multiselect'];
                                    }
                                    node.innerHTML=opt;
                                    if(jsArr['students'][i]['scheme_category']!=null){
                                        node.value=jsArr['students'][i]['scheme_category'];
                                        //node.setAttribute("readonly","readonly");
                                    }
                                    opt='';multi=0;
                                }
                            }
                                                       
                            if(parseInt(count)>=jsArr['students'].length){
                                //alert(parseInt(count)+'-----------'+jsArr['students'].length)
                                document.getElementById('fsubmit').setAttribute(readele,readele);
                            }
                            else{
                                document.getElementById('fsubmit').removeAttribute('disabled');
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
            
            
            function selectallcheck(node){
                //alert(node.checked);
                var checkbox=document.querySelectorAll('input[type="checkbox"]');
                if(node.id=='selectall'){
                    for(c in checkbox){
                        if(checkbox[c] instanceof HTMLInputElement)
                            checkbox[c].checked=node.checked;
                    }
                }
                else{
                    //document.getElementById('selectall').checked=false;
                }
               
            }
            function optionenable(node){
                var opspt=node.id.split('_');
                if(document.getElementById('size_'+opspt[1])){
                var chode=document.getElementById('size_'+opspt[1]);
                chode.disabled=!node.checked;}
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
            
           function validate(){
                if($("#hdsearch").val()=="1"){ 
               //alert('Click Submit');
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
                      document.getElementById('free_scheme_indent').submit();
               else
                       swal("Cancelled", "Your cancelled the student profile", "error");
               });
               }	
           }
        </script>
              
    </body>
</html>