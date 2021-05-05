<?php $action = 'Basic/save_noonmeal_indent';
      $redirect = 'Basic/noonmeal_indent';
?>
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
                                    <h1>SPECIAL SCHEME INDENT (NOON MEAL)</h1>
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
                                        <br/>
                                        
                                    </div>       
                                <!-- <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                       <strong>Error Occur ! </strong><span id="errormsg"></span>
                                </div> -->
                                <!-- <div class="alert alert-danger" style="display: none">
                                    <strong>Error Occur ! </strong><span id="errormsg"></span>
                                </div> -->
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                    Scheme Beneficiaries <small id="additional_title"> </small></div>
                                                <div class="tools"></div> 
                                            </div>
                                            <div class="portlet-body">
                                                <form id="free_scheme_indent" name="free_scheme_indent" method="post" action="<?php echo base_url().$action;?>">
                                                    <input type="hidden" id="scheme_id" name="scheme_id" value=15 />
                                                    <input type="hidden" id="class_id" name="class_id" />
                                                    <input type="hidden" id="section_id" name="section_id" />
                                                    <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;" id="sample_3">
                                                        <thead>
                                                            <tr style="text-align: center !important;">
                                                                <th class="center">S.No.</th>
                                                                <th class="center">Student ID</th>                        
                                                                <th class="center">Student Name</th>
                                                                <th class="center th_section" style="display:none">Section</th>
                                                                <th class="center">Opted for Noon Meal&nbsp;&nbsp;<input type="checkbox" id="eligbleall" name="eligbleall" class="custom-form-control" onchange="eligbleallcheck(this)" /></th>
                                                                <th class="center">Date</th>                        
                                                                <th class="center" style="display:none"></th>                        
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody id="schemeIndent"> 
                                                        </tbody>
                                                    </table>
                                                    <div class="form-row text-center">
                                                        <input type="hidden" name="finalsub" id="finalsub" value="0" />
                                                        <input type="hidden" name="redirect" id="finalsub" value="<?php echo $redirect; ?>" />
                                                        <div class="form-group col-md-offset-8 col-md-4">
                                                            <button type="button" class="btn btn-primary" id="ssubmit"  onclick="return validate();">Submit</button>
                                                            <button type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF'];?>'" class="btn default">Cancel</button>
                                                            <!-- <button type="button" class="btn btn-danger" id="fsubmit" onclick="document.getElementById('finalsub').value=1;return validate();">Final Submit</button> -->
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
            window.onload=function(){
                        
                // $("#scheme_name option[value!='15']").hide;
                // $("#scheme_name option[value='15']").attr('selected','selected');
                // document.getElementById('scheme_name').value=15;
                // document.getElementById('scheme_name').onchange();

                var arr =  (<?php echo json_encode($scheme); ?>).filter(function(dataitem) {
                                    return dataitem.id == 15 ;
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
                    get_student(uriclass,urisection);
                }
                else{
                    $("#appli_class option[value='.low.']").attr('selected','selected');
                    document.getElementById('appli_class').value=low;
                    document.getElementById('class_id').value=low;
                    document.getElementById('section_id').value=urisection;
                    get_section(low,urisection);
                    get_student(low,urisection);
                }
                // setTimeout(function(){ document.getElementById('emis_stu_searchsep_sub').click(); }, 350);
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
                $("#schemeIndent").empty();
                $("#additional_title").text('');
                    if(class_id != '' ){
                                    $.ajax(
                                    {
                                        type: "POST",
                                        url:baseurl+'Basic/get_school_section_details',
                                        data:{'class_id':class_id},
                                        success: function(resp, textStatus, xhrContent) {
                                            // $(".alert-danger").hide();
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
                                        error: OnError
                                    })
                    }
            }
            
            $(document).ready(function(){ 
                $("#emis_stu_searchsep_sub").click(function(){ 
                    // alert();
                    var appli_class = $("#appli_class").val();
                    var appli_section = $("#appli_section").val();
                    $("#class_id").val(appli_class);
                    $("#section_id").val(appli_section);
                    
                    if(appli_class == ''){
                        alert("Select the class");
                        return true;
                    }
                    
                    // document.getElementById('selectall').checked=false;
                    // if($.fn.dataTable.isDataTable('#sample_3')){
                    //        $('#sample_3').DataTable().clear().destroy();
                    // }
                    get_student(appli_class,appli_section);

                });  
            }); 
                var unique_arr = [];
                function get_student(appli_class,appli_section){

                    var scheme_id = $("#scheme_id").val();
                    
                    var Classes = ["0","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII","PRE-KG","LKG","UKG"];
                    var Sec = (appli_section == '0') ? 'ALL Section' : appli_section +' Section';
                    $("#additional_title").text(': Noon Meal / '+Classes[appli_class]+ ' Standard - '+Sec);

                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/get_noonmeal_indent',
                        data:"&appli_class="+appli_class+"&appli_section="+appli_section+"&scheme_id="+scheme_id,
                            success: function(resp, textStatus, xhrContent) {
                            // $(".alert-danger").hide();
                            var jsArr=JSON.parse(resp);
                            unique_arr = [];
                            // console.log(jsArr);
                            var tr="";
                            var checkbox,selectbox,datebox,readele='',count=0,depe;

                            if(jsArr['students'].length<=0){
                                alert('No Eligible Students Found');
                                return true;
                            }
                            
                            var dis=0,temp='';
                            for(var i=0;i<jsArr['students'].length;i++){
                                unique_arr.push({'unique_supply' : jsArr['students'][i]['unique_supply']});
                                eligble_checkbox='<input type="checkbox" class="custom-form-control"';
                                
                                tr+='<tr>';
                                    tr+='<td style="text-align: center !important;">'+(i+1)+'</td>';        //SNO.
                                    tr+='<td style="text-align: center !important;">'+jsArr['students'][i]['unique_id_no']+'</td>';        //Student ID NO
                                    tr+='<td>'+jsArr['students'][i]['name']+'</td>';        //Student Name
                                    tr+='<td class="td_section" style="display:none">'+jsArr['students'][i]['class_section']+'</td>';        //Student Name
                                    if(jsArr['students'][i]['unique_supply'] == "1"){
                                        eligble_checkbox+=' id="eligble_'+jsArr['students'][i]['id']+'" name="eligble_'+jsArr['students'][i]['id']+'" checked value="1" onchange="optionenable(this,'+jsArr['students'][i]['unique_supply']+')" />'; 
                                    }
                                    else{
                                        eligble_checkbox+=' id="eligble_'+jsArr['students'][i]['id']+'" name="eligble_'+jsArr['students'][i]['id']+'" value="1" onchange="optionenable(this,'+jsArr['students'][i]['unique_supply']+')" />'; 
                                    }
                                    tr+='<td>'+eligble_checkbox+'</td>';        //Eligble

                                    if(jsArr['students'][i]['indent']!=null && jsArr['students'][i]['unique_supply'] == 1){
                                        var userDate = jsArr['students'][i]['indent'];
                                        var newDate = moment(userDate, "YYYY-MM-DD").format("DD/MM/YYYY");
                                        tr+='<td>'+newDate+'</td>';
                                    }
                                    else{
                                        tr+='<td>-</td>';
                                    }
                                    hidden='<input type="hidden" id="updated_'+jsArr['students'][i]['id']+'" name="updated_'+jsArr['students'][i]['id']+'" value=0 class="form-control" />';
                                    tr+='<td style="display:none">'+hidden+'</td>';
                                    // tr+='<td>'+hidden+'</td>';

                            }  
                            document.getElementById('schemeIndent').innerHTML=tr;
                            // sum_dataTable('#sample_3');
                            if(appli_section == '0'){
                                    $(".th_section").show(); 
                                    $(".td_section").show(); 
                            }
                            else{
                                    $(".th_section").hide(); 
                                    $(".td_section").hide(); 
                            }
                            return true;              
                        },
                        error: OnError
                    });
                }            
            
            function eligbleallcheck(node){
                // console.log(unique_arr);
                var checkbox=document.querySelectorAll('input[id^="eligble_"]');
                var updationCheck=document.querySelectorAll('input[id^="updated_"]');
                if(node.id=='eligbleall'){
                    for(c in checkbox){
                        if(checkbox[c] instanceof HTMLInputElement)
                            checkbox[c].checked=node.checked;
                    }    
                    if(unique_arr.length > 0){
                        for(var z=0;z<unique_arr.length;z++){
                            var uniq = unique_arr[z].unique_supply;
                            var theligblecheck = node.checked == true ? 1: 0;
                            if(updationCheck[z] instanceof HTMLInputElement)
                               updationCheck[z].value = uniq == null ? theligblecheck : uniq != theligblecheck ? 1 : 0;        
                            // document.getElementById('eligbleall').indeterminate=true;                            
                        }               
                    }
                    
                }
                else{
                    document.getElementById('eligbleall').checked=true;
                }
            }

            function optionenable(node,uniqid){
                var opspt=node.id.split('_');
                var tdeligblecheck = node.checked == true ? 1: 0
                var updated = document.getElementById('updated_'+opspt[1]);
                updated.value = uniqid == null ? tdeligblecheck : uniqid != tdeligblecheck ? 1 : 0;
                // if(document.getElementById('size_'+opspt[1])){
                //     var chode=document.getElementById('size_'+opspt[1]);
                //     chode.disabled=!node.checked;
                // }                
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
        // function OnError(xhr, errorType, exception) {
        //         // var responseText;
        //         $("#errormsg").html("");
        //         try {
        //             responseText = jQuery.parseJSON(xhr.responseText);
        //             $("#errormsg").append(errorType + " " + exception);
        //             $("#errormsg").append("<div><u>Exception</u>:<br /><br />" + responseText.ExceptionType + "</div>");
        //             $("#errormsg").append("<div><u>StackTrace</u>:<br /><br />" + responseText.StackTrace + "</div>");
        //             $("#errormsg").append("<div><u>Message</u>:<br /><br />" + responseText.Message + "</div>");
        //         } catch (e) {
        //             // responseText = xhr.responseText;
        //             $("#errormsg").append(xhr.status+' ( '+ xhr.statusText + ' ) ');
        //         }
        //         $(".alert-danger").show();
        //     }
        </script>      
    </body>
</html>