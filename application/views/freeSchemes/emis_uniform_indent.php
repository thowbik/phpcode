<?php $redirect='Basic/uniform_indent'; ?>
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
        .center
        {
                text-align: center;
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
                                    <h1>SPECIAL SCHEME INDENT (UNIFORM)</h1>
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
                                                <div class="col-md-3" style="margin-left:15px;">
                                                        <label class="control-label bold">Available Classes</label>  
                                                        <select class="form-control" id="appli_class" name="appli_class">
                                                            <option value="" >Available Classes</option>
                                                        </select>
                                                </div>

                                                <div class="col-md-3" style="margin-left:15px;">
                                                        <label class="control-label bold">Available Section</label>  
                                                        <select class="form-control" id="appli_section" name="appli_section">
                                                            <option value="" >Available Section</option>
                                                        </select>
                                                </div>

                                                <div class="col-md-5">
                                                    
                                                    <br />
                                                    <button type="button" id="emis_stu_searchsep_sub" name="emis_stu_searchsep_sub" class="btn green btn-md">Search</button>
                                                </div>
                                                   
                                            
                                          </div>
                                        </div>
                                        <br/>
                                    </div>         
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                  Scheme Beneficiaries <small id="additional_title"> </small></div>
                                                <div class="tools"></div> 
                                            </div>
                                            <div class="portlet-body">
                                                <form id="free_scheme_indent" name="free_scheme_indent" method="post" action="<?php echo base_url().'Basic/save_uniform_indent';?>">
                                                    <input type="hidden" id="scheme_id" name="scheme_id" />
                                                    <input type="hidden" id="class_id" name="class_id" />
                                                    <input type="hidden" id="section_id" name="section_id" />
                                                    <table class="table table-striped table-bordered table-hover uniformIndent" style="alignment-adjust: !important;">
                                                        <thead>
                                                            <tr>
                                                                <th class="center" rowspan="2" >S.No.</th>
                                                                <th class="center" rowspan="2" >Student ID</th>                        
                                                                <th class="center" rowspan="2" >Student Name</th>
                                                                <th class="center th_section" rowspan="2" style="display:none">Section</th>
                                                                <th class="center" rowspan="2" style="width:50px;">Select<br/><input type="checkbox" id="selectall" name="selectall" class="custom-form-control" onchange="selectallcheck(this)" /></th>
                                                                <th class="center" colspan="4" style="width:800px;">Uniform Size</th>
                                                                <th class="center" rowspan="2" style="width:150px;">Indent Date</th>
                                                                <!-- <th class="center th_action" rowspan="2">Action</th> -->
                                                            </tr>
                                                            <tr>
                                                                <th class="center">Set 1</th>
                                                                <th class="center">Set 2</th>
                                                                <th class="center">Set 3</th>
                                                                <th class="center">Set 4</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbleAppend">
                                                        </tbody>
                                                    </table>
                                                    <div class="form-row text-center">
                                                        <input type="hidden" name="redirect" id="redirect" value="<?php echo $redirect; ?>" />
                                                        <div class="form-group col-md-offset-8 col-md-4 initial_save">
                                                            <button type="button" class="btn btn-primary" id="save" disabled onclick="return validate();">Submit</button>
                                                            <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
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
        var unique_arr = [];
            window.onload=function(){
                        
                // $("#scheme_name option[value!='15']").hide;
                // $("#scheme_name option[value='15']").attr('selected','selected');
                // document.getElementById('scheme_name').value=15;
                // document.getElementById('scheme_name').onchange();

                var arr =  (<?php echo json_encode($scheme); ?>).filter(function(dataitem) {
                                    return dataitem.id == 1 ;
                            });

                low = arr[0].appli_lowclass;
                high = arr[0].appli_highclass;

                var html='<option value="">Avaliable Class</option>';
                for(var i=parseInt(low);i<=parseInt(high);i++){
                    html+='<option value="'+i+'">'+i+'</option>';
                }
                document.getElementById('appli_class').innerHTML=html;
                
                var uriclass = <?php echo $this->uri->segment(3,0); ?>;
                var urisection = "<?php echo $this->uri->segment(4,0); ?>";

                if(uriclass != 0){
                    $("#appli_class option[value='.uriclass.']").attr('selected','selected');
                    document.getElementById('appli_class').value=uriclass;
                    document.getElementById('class_id').value=uriclass;
                    document.getElementById('section_id').value=urisection;
                    get_section(uriclass,urisection);
                }
                else{
                    $("#appli_class option[value='.low.']").attr('selected','selected');
                    document.getElementById('appli_class').value=low;
                    document.getElementById('class_id').value=low;
                    document.getElementById('section_id').value=urisection;
                    get_section(low,urisection);
                }
                    
                setTimeout(function(){ document.getElementById('emis_stu_searchsep_sub').click(); }, 650);

            };
            
            
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
            
            $("#appli_class").change(function () {    
               class_id = $(this).val();
               section_id = null;
               get_section(class_id,section_id);
            });
            
            function get_section(class_id,section_id)
            {
                // $("#tbleAppend").empty();
                $("#additional_title").text('');
                    if(class_id != '' ){
                                    $.ajax(
                                    {
                                        type: "POST",
                                        url:baseurl+'Basic/get_school_section_details',
                                        data:{'class_id':class_id},
                                        success: function(resp, textStatus, xhrContent) {
                                        
                                            var section = JSON.parse(resp);
                                                                                
                                            $('#appli_section').empty().append('<option value=0>All</option>');
                                          
                                            $.each(section,function(id,val)
                                            {
                                                $('#appli_section').append($('<option></option>').text(val.section).attr('value', val.section));
                                            })

                                            if(section_id !=0 && section_id !=null){
                                               $("#appli_section").val(section_id).attr('selected','selected');   
                                            }else
                                            {
                                                $("#appli_section").val(0).attr('selected','selected');
                                            }      
                                        },
                                        error: function(xhr, errorType, exception) { 
                                            try {   responseText = jQuery.parseJSON(xhr.responseText);
                                                    alert(errorType + " \t " + exception +
                                                    + "\n\t• Exception: \t" + responseText.ExceptionType +
                                                    + "\n\t• StackTrace: \t" + responseText.StackTrace +
                                                    + "\n\t• Message: \t" + responseText.Message );
                                                } catch (e) {
                                                    alert('Error : ' + xhr.status+' ( '+ xhr.statusText + ' ) ');
                                                    // alert('Error: ' + e.responseText);
                                                }
                                            return false;  
                                        }
                                    })
                    }
            }


            $(document).ready(function(){ 
                $("#emis_stu_searchsep_sub").click(function(){ 
                    
                    var appli_class = $("#appli_class").val();
                    var appli_section = $("#appli_section").val();
                    var scheme_id = 1;
                    
                    
                    if(appli_class == ''){
                        alert("Select the class");
                        return true;
                    }

                    $("#class_id").val(appli_class);
                    $("#section_id").val(appli_section);
                    $("#scheme_id").val(1);

                    var Classes = ["0","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII","PRE-KG","LKG","UKG"];
                    var Sec = (appli_section == '0') ? 'ALL Section' : appli_section +' Section';
                    $("#additional_title").text(': Uniform / '+Classes[appli_class]+ ' Standard - '+Sec);
                                        
                    if($.fn.dataTable.isDataTable('#sample_3')){
                         $('#sample_3').DataTable().clear().destroy();
                    }
                    
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/get_uniform_indent',
                        data:"&appli_class="+appli_class+"&appli_section="+appli_section,
                        success: function(resp, textStatus, xhrContent) {
                            
                            
                            var jsArr=JSON.parse(resp);
                            // console.log(jsArr);
                            unique_arr = [];
                            var trHTML = '';
                            var line = '<option value="">choose</option>';
                            var validationFlag = 0;
                            var readele = '';
                            $.each(jsArr.scheme, function (i, item) {
						            line +='<option value='+item.id+' '+item.sel+' >'+item.scheme_category+'</option>';
                            });        

                              if(jsArr.students.length > 0){
                                $("#schemeIndent tr").remove();
                                $('#save').attr("disabled", false);
                                $(".initial_save").show(); 
                                $.each(jsArr.students,function (i, item) {
             
                                    // if(item.indent_date != null){
                                    //         validationFlag++;
                                    // }
                                    // if(item.NoonmealCheck!=null){
                                    //     readele='';
                                    // }
                                    // else{
                                    //     readele='disabled'; 
                                    // }
                                    unique_arr.push({'set1_size':item.set1_scheme_category,'set2_size':item.set2_scheme_category,'set3_size':item.set3_scheme_category,'set4_size':item.set4_scheme_category});
                                    
                                    i=i+1;
                                    if(item.indent_date!=null){ indent_date_format = moment(item.indent_date, "YYYY-MM-DD").format("DD/MM/YYYY");} else { indent_date_format = '-'}
                                    if(item.distribution_date!=null){ dist_date_format = moment(item.distribution_date, "YYYY-MM-DD").format("DD/MM/YYYY");} else { dist_date_format = '-'}
                                    if(item.indent_date!=null){                                        
                                            checkbox='<input type="checkbox" class="custom-form-control" id="opt_'+item.id+'" name="opt_'+item.id+'" onchange="optionenable(this,'+i+')" checked value="1"  />';
                                    }
                                    else{
                                            checkbox='<input type="checkbox" class="custom-form-control" id="opt_'+item.id+'" name="opt_'+item.id+'" onchange="optionenable(this,'+i+')"  value="1"  />';
                                    }

                                    hidden='<input type="text" id="updated_'+item.id+'" name="updated_'+item.id+'" value=0 class="form-control" />';
                                    
                                             trHTML += '<tr id='+i+'>' +
                                                 '<td align="right">' + i + '</td>' +            
                                                 '<td>'+item.unique_id_no+'</td>' +
                                                 '<td>'+item.name+'</td>' +
                                                //  '<td class="td_class">'+Classes[item.class_studying_id]+ ' - '+item.class_section+'</td>' +
                                                 '<td class="center td_section">'+item.class_section+'</td>' +
                                                 '<td class="center" >'+checkbox+'</td>' +
                                                 '<td style="width: 300px !important;"><select class="form-control" id="set1_size_'+item.id+'" onchange="checkwithexistingvalue('+item.id+','+i+')" name="set1_size_'+item.id+'" '+readele+'>'+line+'</select></td>'+
                                                 '<td style="width: 300px !important;"><select class="form-control" id="set2_size_'+item.id+'" onchange="checkwithexistingvalue('+item.id+','+i+')" name="set2_size_'+item.id+'" '+readele+'>'+line+'</select></td>'+
                                                 '<td style="width: 300px !important;"><select class="form-control" id="set3_size_'+item.id+'" onchange="checkwithexistingvalue('+item.id+','+i+')" name="set3_size_'+item.id+'" '+readele+'>'+line+'</select></td>'+
                                                 '<td style="width: 300px !important;"><select class="form-control" id="set4_size_'+item.id+'" onchange="checkwithexistingvalue('+item.id+','+i+')" name="set4_size_'+item.id+'" '+readele+'>'+line+'</select></td>'+
                                                 '<td>'+indent_date_format+'</td>'+
                                                 '<td style="display:none">'+hidden+'</td>'+
                                                //  '<td>'+dist_date_format+'</td>'+
                                                /**   '<td class="td_action"><button type="button" class="btn btn-primary" id="save" onclick="edit_uniform_indent('+item.id+')">save changes</button></td>'+  */
                                                 '</tr>';	
                                            readele = '';

                                });
                              }
                              else if(jsArr.students.length == 0){
                                $("#schemeIndent tr").remove();
                                $('#save').attr("disabled", true);
                                $(".initial_save").hide(); 
                                var sect = (appli_section == '0') ? '' : '- '+appli_section +' Section'
                                trHTML += '<tr><td class="center" colspan="10" > Data Not found </td></tr>';	
                                swal({
                                        title: "Noon Meal Students Not Selected",
                                        text: "In "+Classes[appli_class]+" Standard "+sect,
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "Proceed to Noonmeal!",
                                        cancelButtonText: "No, cancel !",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                    },
                                    function(isConfirm) {
                                        if (isConfirm) {
                                            window.location.href = baseurl+'Basic/noonmeal_indent/'+appli_class+'/'+appli_section; 
                                            return true; 
                                        } else {
                                            swal("Cancelled", "Your cancelled the Noon Meal Indent Entry For "+Classes[appli_class]+" Standard "+sect, "error");
                                            return true; 
                                        }});
                                        
                              }
                        
                        $("#tbleAppend").empty();
                        $('.uniformIndent > tbody').append(trHTML);

                        $.each(jsArr.students,function (i, item) {
                            if(item.set1_scheme_category!=0){
                                $('#set1_size_'+item.id).val(item.set1_scheme_category).attr("selected", "selected");
                            }
                            if(item.set2_scheme_category!=0){
                                $('#set2_size_'+item.id).val(item.set2_scheme_category).attr("selected", "selected");
                            }
                            if(item.set3_scheme_category!=0){
                                $('#set3_size_'+item.id).val(item.set3_scheme_category).attr("selected", "selected");
                            }
                            if(item.set4_scheme_category!=0){
                                $('#set4_size_'+item.id).val(item.set4_scheme_category).attr("selected", "selected");
                            }
                        });
                    
                        /**  if(validationFlag > 0){ 
                            $(".th_action").show(); 
                            $(".td_action").show(); 
                            $(".initial_save").hide();
                        }
                        else{ 
                            // alert('else part');
                            $(".th_action").hide(); 
                            $(".td_action").hide(); 
                            $(".initial_save").show(); 
                        }*/
                        if(appli_section == '0'){
                            $(".th_section").show(); 
                            $(".td_section").show(); 
                        }
                        else{
                            $(".th_section").hide(); 
                            $(".td_section").hide(); 
                        }

                        },
                        // error: function(e){ 
                        //     alert('Error: ' + e.responseText);
                        //     return false;  
                        // }
                        error: OnError
                    });
                });  
            }); 
            
            function selectallcheck(node){
                //alert(node.checked);
                var checkbox=document.querySelectorAll('input[type="checkbox"]');
                var updationCheck=document.querySelectorAll('input[id^="updated_"]');
                if(node.id=='selectall'){
                    for(c in checkbox){
                        if(checkbox[c] instanceof HTMLInputElement)
                            checkbox[c].checked=node.checked;
                    }
                    if(unique_arr.length > 0){
                        validation = [0,0,0,0];
                        for(var z=0;z<unique_arr.length;z++){
                            var data = unique_arr[z];
                            for(var i=0;i<4;i++){
                                validation[i] = data['set'+(i+1)+'_size'] != 0 ? 1: 0;
                            }
                            vdt = validation.reduce(function(acc, val) { return acc + val; }, 0);
                            if(updationCheck[z] instanceof HTMLInputElement){
                                if((node.checked && vdt == 0) || (!node.checked && vdt > 0)){
                                    updationCheck[z].value = 1;
                                }
                                else if((node.checked && vdt > 0) || (!node.checked && vdt == 0)){
                                    updationCheck[z].value = 0;
                                }
                            }
                            // document.getElementById('eligbleall').indeterminate=true;                            
                        }               
                    }
                }
                else{
                    document.getElementById('selectall').checked=false;
                }

                
               
            }
                function checkwithexistingvalue(studid,inx){
                    if(document.getElementById('opt_'+studid).checked == true){
                        vdt = vaildate2(studid,inx);
                        var updated = document.getElementById('updated_'+studid);
                        updated.value = vdt > 0 ? 1 : 0 ;                    
                        console.log(updated.value);
                    }
                }

                function vaildate2(studid,inx){
                    var data = unique_arr[inx-1];
                    validation = [0,0,0,0];
                    // var opspt=node.id.split('_');

                    for(var i=0;i<4;i++){
                        if(document.getElementById('set'+(i+1)+'_size_'+studid)){
                            var chode=document.getElementById('set'+(i+1)+'_size_'+studid);
                            validation[i] = chode.value != data['set'+(i+1)+'_size'] ? 1: 0;
                            // console.log('They are Not Equal'+chode.value+data['set'+i+'_size']+validation);
                            // console.log('They are Equal'+chode.value+data['set'+i+'_size']);
                        }                
                    }
                    vdt = validation.reduce(function(acc, val) { return acc + val; }, 0)
                    return vdt;
                }

            function optionenable(node,inx){
                var opspt=node.id.split('_');
                vdt = vaildate2(opspt[1],inx);
                // var tdselectcheck = node.checked == true ? 1:vdt > 0 ? 1 : 0;
                // console.log('t'+tdselectcheck);
                var updated = document.getElementById('updated_'+opspt[1]);
                
                if((node.checked && vdt == 0) || (!node.checked && vdt > 0)){
                    updated.value = 0;
                }
                else if((node.checked && vdt > 0) || (!node.checked && vdt == 0)){
                    updated.value = 1;
                }
                else{
                    updated.value = 0;
                }
                // console.log('u'+updated.value);
            }
        
            function validate(){
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

           function edit_uniform_indent(stud_id){            
            
            if($("#set1_size_"+stud_id).val() == '' && $("#set2_size_"+stud_id).val() == '' && $("#set3_size_"+stud_id).val() == '' && $("#set4_size_"+stud_id).val() == ''){
                swal("Cancelled", "Size Fields Are Empty", "error");
                return true;
            }
                var arrayDtls = {'class':$("#appli_class").val(),'section':$("#appli_section").val(),'stud_id':stud_id,'scheme':1,'set1_size':$("#set1_size_"+stud_id).val(),'set2_size':$("#set2_size_"+stud_id).val(),'set3_size':$("#set3_size_"+stud_id).val(),'set4_size':$("#set4_size_"+stud_id).val()};
              
                $.ajax({
                    type: 'POST',
                    url:baseurl+'Basic/update_uniform_scheme_indent',
                    data: arrayDtls,
                    success: function(result, textStatus, xhrContent) {
                        // alert('Success ');
                        swal("Done", result, "success");
                    },
                    // error: function (result) {
                    //     // alert('Fail ');
                    //     swal("Fail", result, "error");
                    // }
                    error: OnError
                });     
            
            
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
        </script>
    </body>
</html>