<?php //print_r($scheme); echo($this->session->userdata('emis_school_id')); ?>
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
                                                    <th style="<?php echo($this->uri->segment(5,0)!=0?"display:''":"display:none"); ?>">
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
                                            <i class="fa fa-globe"></i>Select Scheme Beneficiaries</div>
                                            <div class="tools"></div> 
                                        </div>
                                        <div class="portlet-body">
                                            <form id="free_scheme_indent" name="free_scheme_indent" method="post" action="<?php echo base_url().'Basic/schemeIndentSubmit/2';?>">
                                                <input type="hidden" id="scheme_id" name="scheme_id" />
                                                <input type="hidden" id="class_id" name="class_id" />
                                                <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Student ID</th>                        
                                                            <th>Student Name</th>
                                                            <th>Section</th>
                                                            <th>Eligible&nbsp;&nbsp;<input type="checkbox" id="selectall" name="selectall" class="custom-form-control" onchange="selectallcheck(this)" /></th>
                                                            <th style="width:150px;">Options</th>
                                                            <th style="width:150px;">Date</th>
                                                            
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody id="schemeIndent"> 
                                                    </tbody>
                                                </table>
                                                <div class="form-row text-center">
                                                    <input type="hidden" name="finalsub" id="finalsub" value="0" />
                                                    <input type="hidden" name="redirect" id="finalsub" value="Basic/schemesummary" />
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
                                                        <button type="button" class="btn btn-primary" id="ssubmit"  onclick="return validate();">Submit</button>
                                                        <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                        <button type="button" class="btn btn-danger" id="fsubmit" onclick="document.getElementById('finalsub').value=1;return validate();">Final Submit</button>
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
            
            <?php 
                if($this->uri->segment(4,0)!='' && $this->uri->segment(4,0)!=0){
            ?>
                    window.onload=function(){
                        var scheme_id=<?php echo($this->uri->segment(3,0)); ?>;
                        var cls=<?php echo($this->uri->segment(4,0)); ?>;
                        document.getElementById('scheme_name').value=scheme_id;
                        document.getElementById('scheme_name').onchange();
                        document.getElementById('appli_class').value=cls;
                        document.getElementById('emis_stu_searchsep_sub').click();
                        var i=setTimeout(function(){
                            document.getElementById('selectall').checked=true;
                            document.getElementById('selectall').onchange();
                        },1000);
                    };
            <?php
                }
            ?>
            
            
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
            
            
            
            $(document).ready(function(){ 
                $("#emis_stu_searchsep_sub").click(function(){ 
                    
                    var appli_class = $("#appli_class").val();
                    var scheme_id = $("#scheme_name").val();
                    document.getElementById('hdsearch').value=1;
                    if(appli_class == ''){
                        alert("Select the class");
                        return true;
                    }
                    
                    $("#scheme_id").val(scheme_id);
                    $("#class_id").val(appli_class);
                    document.getElementById('selectall').checked=false;
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/getStudentforScheme',
                        data:"&appli_class="+appli_class+"&scheme_id="+scheme_id,
                        success: function(resp){
                            var jsArr=JSON.parse(resp);
                            var tr="";
                            var checkbox,selectbox,datebox,readele='',count=0,depe;
                            
                            if(jsArr['students'].length<=0){
                                alert('No Eligible Students Found');
                                return true;
                            }
                            var dis=0,temp='';
                            for(var i=0;i<jsArr['students'].length;i++){
                                checkbox='<input type="checkbox" class="custom-form-control"';
                                selectbox='<select class="form-control" ';
                                datebox='<input type="date" class="form-control" ';                                
                                readele='';
                                if(jsArr['students'][i]['finalsub']==1 && dis==0){
                                        dis=1; 
                                }
                                tr+='<tr>';
                                    tr+='<td>'+(i+1)+'</td>';        //SNO.
                                    tr+='<td>'+jsArr['students'][i]['unique_id_no']+'</td>';        //Student ID NO
                                    tr+='<td>'+jsArr['students'][i]['name']+'</td>';        //Student Name
                                    tr+='<td>'+jsArr['students'][i]['class_section']+'</td>';        //Student Name
                                    if(jsArr['students'][i]['dependscheme']!=null){
                                        if(jsArr['students'][i]['scheme_id']==null){
                                            depe=jsArr['students'][i]['dependscheme'];                                           
                                            readele='disabled';
                                            checkbox+=' id="opt_'+jsArr['students'][i]['id']+'" name="opt_'+jsArr['students'][i]['id']+'" '+readele+' value="1" onchange="optionenable(this)" />';
                                        }
                                        else{
                                            count++;
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
                                    
                                    if(jsArr['scheme'].length>=1)
                                        selectbox+='id="size_'+jsArr['students'][i]['id']+'" name="size_'+jsArr['students'][i]['id']+'" '+readele+'></select>';
                                    else
                                        selectbox='-NA-';
                                    tr+='<td>'+selectbox+'</td>';        //Options
                                    
                                    if(jsArr['students'][i]['indent']!=null){
                                        tr+='<td>'+jsArr['students'][i]['indent']+'</td>';
                                    }
                                    else{
                                        tr+='<td>-</td>';
                                    }
                                    if(jsArr['students'][i]['indent']!=null && jsArr['students'][i]['distri']!=null){
                                        datebox=jsArr['students'][i]['distri'];       
                                    }
                                    else if(jsArr['students'][i]['indent']!=null && jsArr['students'][i]['distri']==null){
                                        datebox+=' id="dt_'+jsArr['students'][i]['id']+'" name="dt_'+jsArr['students'][i]['id']+'"  />';       
                                    }
                                    else{
                                        datebox='-';
                                    }
                                    readele='';
                                    //tr+='<td>'+datebox+'</td>';        //Distribution
                                    // tr+='</tr>';checkbox=selectbox=datebox='';
                            }  
                            document.getElementById('schemeIndent').innerHTML=tr;
                            document.getElementById('selectall').checked=false;
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
                            if(depe!=null){
                                alert('Only ' + $("#scheme_name option[value='"+depe+"']").text()+' Students Are Eligible ('+$("#scheme_name option[value='"+depe+"']").text()+' Selected : '+count+')');
                            }
                            
                            if(dis==1){
                                 for(var i=0;i<jsArr['students'].length;i++){
                                    if(document.getElementById('opt_'+jsArr['students'][i]['id']))
                                        document.getElementById('opt_'+jsArr['students'][i]['id']).setAttribute('disabled','disabled');
                                    
                                    if(document.getElementById('size_'+jsArr['students'][i]['id']))
                                        document.getElementById('size_'+jsArr['students'][i]['id']).setAttribute('disabled','disabled');
                                 }
                                 readele='disabled';
                            }
                            
                            
                            if(readele=='disabled'){
                                document.getElementById('ssubmit').setAttribute(readele,readele);
                                document.getElementById('fsubmit').setAttribute(readele,readele);
                            }
                            else{
                                document.getElementById('ssubmit').removeAttribute('disabled');
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
                    document.getElementById('selectall').checked=false;
                }
               
            }
            function optionenable(node){
                var opspt=node.id.split('_');
                if(document.getElementById('size_'+opspt[1])){
                var chode=document.getElementById('size_'+opspt[1]);
                chode.disabled=!node.checked;}
            }
           function validate(){
               //alert('Click Submit');
               if($("#hdsearch").val()=="1"){
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