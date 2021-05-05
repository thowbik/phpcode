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
                                    <h1>SPECIAL SCHEME INDENT (FOOTWEAR) </h1>
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
                                                        <input type="hidden" id="hdsearch" value="0" />
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
                                            <form id="free_scheme_indent" name="free_scheme_indent" method="post" action="<?php echo base_url().'Basic/save_footwear_indent';?>">
                                                <input type="hidden" id="scheme_id" name="scheme_id" />
                                                <input type="hidden" id="class_id" name="class_id" />
                                                <input type="hidden" id="section_id" name="section_id" />
                                                <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;" id="sample_33">
                                                    <thead>
                                                        <tr>
                                                            <th class="center">S.No.</th>
                                                            <th class="center">Student ID</th>                        
                                                            <th class="center">Student Name</th>
                                                            <th class="center th_section" style="display:none;">Section</th>
                                                            <th class="center" style="width:50px;">Select&nbsp;&nbsp;<input type="checkbox" id="selectall" name="selectall" class="custom-form-control" onchange="selectallcheck(this)" /></th>
                                                            <!-- <th id="row_dim" style="width:200px;">Uniform Size </th> -->
                                                            <th class="center" style="width:200px;">Footwear Size </th>
                                                            <th class="center" style="width:150px;">Indent Date</th>
                                                            
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody id="schemeIndent"> 
                                                    </tbody>
                                                </table>
                                                <div class="form-row text-center">
                                                    <input type="hidden" name="finalsub" id="finalsub" value="1" />
                                                    <input type="hidden" name="redirect" id="finalsub" value="<?php echo 'Basic/essentials_indent';?>"/>
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
                                                    <div class="form-group col-md-offset-8 col-md-4">
                                                        <button type="button" class="btn btn-primary" id="fsubmit" onclick="document.getElementById('finalsub').value=1;return validate();">Submit</button>
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
var unique_arr = [];
            window.onload=function(){
                        
                        $("#scheme_name option[value!='11']").hide;

                        // var arr =  (<?php echo json_encode($scheme); ?>).filter(function(dataitem) {
                        //             return dataitem.id == 1;
                        // });
                        // console.log('arr',arr);

                        var arr1 =  (<?php echo json_encode($scheme); ?>).filter(function(dataitem) {
                                    return dataitem.id == 2;
                        });
                        // console.log('arr1',arr1);

                        
                        

                        // if (arr[0].appli_lowclass < arr1[0].appli_lowclass){
                        //     low = arr[0].appli_lowclass;
                        // }
                        // else{}
                            low = arr1[0].appli_lowclass;
                          


                        // if (arr[0].appli_highclass > arr1[0].appli_highclass){}
                            high = arr1[0].appli_highclass;
                        
                        // else{
                        //     high = arr[0].appli_highclass;
                        // }
                        // console.log('console.log',low);
                        // console.log('console.log high',high);
                        
                        var html='<option value="">Avaliable Class</option>';
                        for(var i=parseInt(low);i<=parseInt(high);i++){
                            html+='<option value="'+i+'">'+i+'</option>';
                        }
                        document.getElementById('appli_class').innerHTML=html;
                        // document.getElementById('scheme_name').value=15;
                        // document.getElementById('scheme_name').onchange();

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
                    
                setTimeout(function(){ document.getElementById('emis_stu_searchsep_sub').click(); }, 500);



            };
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
                    
                    var appli_class = $("#appli_class").val();
                    var appli_section = $("#appli_section").val();
                    $("#class_id").val(appli_class);
                    document.getElementById('hdsearch').value=1;
                    $("#section_id").val(appli_section);

                    var Classes = ["0","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII","PRE-KG","LKG","UKG"];
                    var Sec = (appli_section == '0') ? 'ALL Section' : appli_section +' Section';
                    $("#additional_title").text(' : FootWear / '+Classes[appli_class]+ ' Standard - '+Sec);
                    
                    if(appli_class == ''){
                        alert("Select the class");
                        return true;
                    }

                    // if(appli_class <= 8){
                    //    $('#row_dim').show(); 
                    // } else {
                    //    $('#row_dim').hide(); 
                    // }

                    
                    if($.fn.dataTable.isDataTable('#sample_3')){
                            $('#sample_3').DataTable().clear().destroy();
                    }

                    document.getElementById('selectall').checked=false;

                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/get_footwear_indent',
                        data:"&appli_class="+appli_class+"&appli_section="+appli_section,
                        success: function(resp, textStatus, xhrContent) {
                    
                            // console.log(JSON.parse(resp));
                            var jsArr=JSON.parse(resp);
                            unique_arr = [];
                            var tr="";
                            var checkbox,selectbox,datebox,readele,count=0,depe;
                            // if(jsArr['students'].length<=0){
                            //     alert('No Eligible Students Found');
                            //     return true;
                            // }
                            var dis=0;
                            for(var i=0;i<jsArr['students'].length;i++){
                                checkbox='<input type="checkbox" class="custom-form-control"';
                                selectbox1='<select class="form-control" ';
                                selectbox2='<select class="form-control" ';
                                readele='';
                                
                                unique_arr.push({'scheme_category' : jsArr['students'][i]['new_scheme_category']});
                                // if(dis==0){
                                //     if(jsArr['students'][i]['finalsub']==0||jsArr['students'][i]['finalsub']==null){
                                //         readele='';
                                //     }
                                //     else{
                                //         readele='disabled'; 
                                //     }
                                //     dis=1;
                                // }

                                tr+='<tr>';
                                    tr+='<td class="center">'+(i+1)+'</td>';        //SNO.
                                    tr+='<td class="center">'+jsArr['students'][i]['unique_id_no']+'</td>';        //Student ID NO
                                    tr+='<td>'+jsArr['students'][i]['name']+'</td>';        //Student Name
                                    tr+='<td class="td_section" style="display:none">'+jsArr['students'][i]['class_section']+'</td>';  // Class-Section
                                    if(jsArr['students'][i]['scheme_id']!=null && jsArr['students'][i]['scheme_id']!=''){                                        
                                        checkbox+=' id="opt_'+jsArr['students'][i]['id']+'" name="opt_'+jsArr['students'][i]['id']+'" onchange="optionenable(this,'+jsArr['students'][i]['new_scheme_category']+')" checked value="1"  />';
                                    }
                                    else{
                                        checkbox+=' id="opt_'+jsArr['students'][i]['id']+'" name="opt_'+jsArr['students'][i]['id']+'" onchange="optionenable(this,'+jsArr['students'][i]['new_scheme_category']+')" value="1"   />';
                                    }
                                    tr+='<td class="center">'+checkbox+'</td>';        //Eligble
                                                
                                    
                                    if(jsArr['footwear_scheme'].length>=1){
                                            selectbox2+='id="footwear_size_'+jsArr['students'][i]['id']+'" name="footwear_size_'+jsArr['students'][i]['id']+'" onchange="checkwithexistingvalue('+jsArr['students'][i]['id']+','+jsArr['students'][i]['new_scheme_category']+')" '+readele+'></select>';
                                    }
                                    else selectbox2='-NA-'; 
                                    tr+='<td>'+selectbox2+'</td>';        //Options

                                    
                                     if(jsArr['students'][i]['indent_date']!=null){
                                        var newDate = moment(jsArr['students'][i]['indent_date'], "YYYY-MM-DD").format("DD/MM/YYYY");
                                        tr+='<td>'+newDate+'</td>';
                                     }
                                     else{
                                        tr+='<td>-</td>';
                                     }                                   //Date
                                    hidden='<input type="hidden" id="updated_'+jsArr['students'][i]['id']+'" name="updated_'+jsArr['students'][i]['id']+'" value=0 class="form-control" />';
                                    tr+='<td style="display:none">'+hidden+'</td>';

                                    tr+='</tr>';checkbox=selectbox1=selectbox2=datebox='';
                                    // if(dis==2){readele='';}
                            }  
                            document.getElementById('schemeIndent').innerHTML=tr;
                            sum_dataTable('#sample_3');
                            // document.getElementById('selectall').checked=false;
                            var opt='',multi=0;var node;
                            var opt2='',multi2=0;var node2;
                            // console.log(jsArr['uniform_scheme']);
                            if(jsArr['footwear_scheme'].length>0){
                                for(var k=0;k<jsArr['students'].length;k++){
                                    node2=document.getElementById('footwear_size_'+jsArr['students'][k]['id']);
                                    for(var l=0;l<jsArr['footwear_scheme'].length;l++){
                                        opt2+='<option value="'+jsArr['footwear_scheme'][l]['id']+'" '+jsArr['footwear_scheme'][l]['sel']+' >'+jsArr['footwear_scheme'][l]['scheme_category']+'</option>';
                                        multi2=jsArr['footwear_scheme'][l]['multiselect'];
                                    }
                                    node2.innerHTML=opt2;
                                    if(jsArr.students[k].new_scheme_category != null){
                                         node2.value=jsArr.students[k].new_scheme_category;
                                    }
                                    opt2='';multi2=0;
                                }
                            }
                                                       
                            if(parseInt(count)>=jsArr['students'].length){
                                //alert(parseInt(count)+'-----------'+jsArr['students'].length)
                                document.getElementById('fsubmit').setAttribute(readele,readele);
                            }
                            else{
                                document.getElementById('fsubmit').removeAttribute('disabled');
                            }
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
                        for(var z=0;z<unique_arr.length;z++){
                            var cate = unique_arr[z].scheme_category;
                            var thcheck = node.checked == true ? 1: 0;
                            if(updationCheck[z] instanceof HTMLInputElement)
                            updationCheck[z].value = (cate == null) ? thcheck : (!thcheck && cate != null) ? 1 : 0 ;
                            // document.getElementById('eligbleall').indeterminate=true;                            
                        }               
                    }

                }
                else{
                    document.getElementById('selectall').checked=false;
                }
               
            }

            // function optionenable(node){
            //     var opspt=node.id.split('_');
            //     if(document.getElementById('size_'+opspt[1])){
            //     var chode=document.getElementById('size_'+opspt[1]);
            //     chode.disabled=!node.checked;}
            // }

            function optionenable(node,cate){
                var opspt=node.id.split('_');
                var tdcheck = node.checked == true ? 1: 0
                v = 0;    

                if(document.getElementById('footwear_size_'+opspt[1])){
                    var chode=document.getElementById('footwear_size_'+opspt[1]);
                    v = (cate == null) ? tdcheck 
                                       : (chode.value != cate) ? 1 
                                                             : (!tdcheck) ? 1: 0 ;
                }   
                
                var updated = document.getElementById('updated_'+opspt[1]);
                updated.value = v
            }
            
            function checkwithexistingvalue(studid,cate){
                    if(document.getElementById('opt_'+studid).checked == true){
                        v = 0;    
                        if(document.getElementById('footwear_size_'+studid)){
                            var chode=document.getElementById('footwear_size_'+studid);
                            v = chode.value != cate ? 1: 0;
                        }                
                         var updated = document.getElementById('updated_'+studid);
                         updated.value = v ;                    
                }
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

           function sum_dataTable(dataId){
    // alert();
    table = $(dataId).DataTable({
      dom: 'Blfrtip',
      retrieve: true,
      "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 10,
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
        
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' },
             
            ],
           columnDefs: [
            
    ],

    "footerCallback": function ( row, data, start, end, display ) {
        this.api().columns('.sum').every(function () {
            var column = this;
          var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            var sum = column
               .data()
               .reduce(function (a, b) { 
                // console.log(a);
                   a = intVal(a, 10);
                   if(isNaN(a)){ a = 0; }
                   
                   b = intVal(b, 10);
                   if(isNaN(b)){ b = 0; }
                   
                   return a + b;
               });
column.selector.opts.page='current';
               var currentPage = column
               .data()
               .reduce(function (a, b) { 
                   a = parseInt(a, 10);
                   if(isNaN(a)){ a = 0; }
                   
                   b = parseInt(b, 10);
                   if(isNaN(b)){ b = 0; }
                   
                   return a + b;
               });
               
            sum = sum.toLocaleString(undefined, {maximumFractionDigits:3});
            $(column.footer()).html(sum);
                        });
            }
        });
    return table;
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