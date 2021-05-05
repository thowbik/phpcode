<?php $redirect = 'Basic/hill_station_scheme' ;
      $action = 'Basic/save_hill_station_scheme';  ?>
<!DOCTYPE html>
<!-- $redirect= $this->uri->segment(6,0) == 0 ? 'Basic/hill_station_scheme' :  'Basic/hill_station_scheme_dist';-->
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
          <style type="text/css">
            .center{ text-align: center; }
          </style>
          <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url().'asset/js/croppie-VIT/croppie.css'?>" rel="stylesheet" type="text/css"/>
          <?php $this->load->view('head.php'); ?>        
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
               <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
               <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
               <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 9) { ?>
               <?php $this->load->view('Ceo_District/header.php'); }else if($this->session->userdata('emis_user_type_id') == 6) { ?>
               <?php $this->load->view('beo_Block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 10) { ?>
               <?php $this->load->view('Deo_District/header.php'); }else{ ?>
               <?php $this->load->view('header.php'); }?>
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
                                                                    <label class="control-label bold">Available Scheme</label>  
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
                                                        </div>
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
                                                        <div class="col-md-2">
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
                                                                
                                                                <input type="hidden" id="hide_class_id" name="hd_class_id" />
                                                                <input type="hidden" id="hide_section_id" name="hd_section_id" />
                                                                <input type="hidden" id="hide_scheme_id" name="hd_scheme_id" />
                                                                <input type="hidden" id="hide_scheme_type" name="hd_scheme_type" />

															        <table class="table table-striped table-bordered table-hover hillSectionTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="center">S.No.</th>
                                                                                <th class="center">Student ID</th>                        
                                                                                <th class="center">Student Name</th>
                                                                                <th class="center th_section">Section</th>
                                                                                <th class="center">Select&nbsp;&nbsp;<input type="checkbox" id="selectall" name="selectall" class="custom-form-control" onchange="selectallcheck(this)" /></th>
                                                                                <th class="center th_size" style="display:none"></th>
                                                                                <th class="center" style="width:150px;">Indent Date</th>
                                                                                <th class="center">Distribution Date
                                                                                <div class="input-append date th_fordist" style="display:none" id="dp3" max="<?php echo(date("Y-m-d",strtotime("now+5hours30minutes"))); ?>">
                                                                                    <input type="hidden" id="datepicker" onchange="alldatedisplay(this)"  /> 
                                                                                    <span class="add-on"><i class="icon-calendar" id="cal2"></i></span>
                                                                                </div>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="tbleAppend"></tbody>
														            </table>

                                                                    <div class="form-row text-center">
                                                                        <input type="hidden" name="redirect" id="redirect" value="<?php echo $redirect; ?>" />
                                                                        <div class="form-group col-md-offset-8 col-md-4 initial_save">
                                                                            <button type="button" class="btn btn-primary" id="save" onclick="return validate();">Submit</button>
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
                    <!-- END of page-wrapper-middle -->
               </div>
               <!-- END Of page-wrapper-row full-height -->
               <?php $this->load->view('footer.php'); ?>
        </div>
                <?php $this->load->view('scripts.php'); ?>
                <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
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
                <!-- Js for hide and show the tables and datas ending-->
                <!-- END PAGE LEVEL PLUGINS -->
                <!-- BEGIN PAGE LEVEL SCRIPTS -->
                <script>
                var unique_arr = [];
                window.onload=function(){
                        
                        var urischeme = <?php echo $this->uri->segment(3,0); ?>;
                        var uriclass = <?php echo $this->uri->segment(4,0); ?>;
                        var urisection = "<?php echo $this->uri->segment(5,0); ?>";
                        var uritype = <?php echo $this->uri->segment(6,0); ?>;

                        document.getElementById('scheme_name').value=urischeme;
                        document.getElementById('scheme_name').onchange();
                        document.getElementById('hide_scheme_id').value=urischeme;
                        document.getElementById('hide_scheme_type').value=uritype;
                        $(".page-title").text('');
                        if(uritype == 0){
                            $(".page-title").text('SPECIAL SCHEME INDENT (HILL STATION)').css({ 'font-weight': 'bold' });
                        }
                        else{
                            $(".page-title").text('SPECIAL SCHEME DISTRIBUTION (HILL STATION)').css({ 'font-weight': 'bold' });
                        }
                        
                        if(uriclass != 0){
                                        $("#appli_class option[value='.uriclass.']").attr('selected','selected');
                                        document.getElementById('appli_class').value=uriclass;
                                        document.getElementById('hide_class_id').value=uriclass;
                                        document.getElementById('hide_section_id').value=urisection;
                                        get_section(uriclass,urisection);
                        }
                        else{
                            
                                var arr =  (<?php echo json_encode($scheme); ?>).filter(function(dataitem) {
                                        return dataitem.id == urischeme ;
                                });

                                $("#appli_class option[value='.low.']").attr('selected','selected');
                                document.getElementById('appli_class').value=arr[0].appli_lowclass;       
                                document.getElementById('hide_class_id').value=arr[0].appli_lowclass;
                                document.getElementById('hide_section_id').value=urisection;
                                get_section(arr[0].appli_lowclass,urisection);
                        
                        }
                            
                        setTimeout(function(){ document.getElementById('emis_stu_searchsep_sub').click(); }, 500);

                        uritype == 0 ? $(".th_fordist").hide() : $(".th_fordist").show();

                };

            var dt=document.getElementById('dp3');
            
            $("#dp3").click(function(){
                // var mind=dt.getAttribute('min').split('-');
                var maxd=dt.getAttribute('max').split('-');
                // mind[1]=parseInt((parseInt(mind[1])/10))==0?(parseInt(mind[1])%10):mind[1];
                // mind[1]=parseInt(mind[1])-1;
                maxd[1]=parseInt((parseInt(maxd[1])/10))==0?(parseInt(maxd[1])%10):maxd[1];
                maxd[1]=parseInt(maxd[1])-1;
                $("#dp3").datepicker({
                    // startDate: new Date(mind[0],mind[1],mind[2]),
                    endDate: new Date(maxd[0],maxd[1],maxd[2])});
             
            });

            function alldatedisplay(node){
                var datebox=document.querySelectorAll('input[type="date"]');
                var updationCheck=document.querySelectorAll('input[id^="updated_"]');
                var dt=new Date(node.value);
                var yy=dt.getFullYear();
                var mm=dt.getMonth()+1;
                var dd=dt.getDate();
                if(mm<10){mm='0'+mm;}if(dd<10){dd='0'+dd;}
                for(c in datebox){
                   datebox[c].value=yy+'-'+mm+'-'+dd;
                }
                if(unique_arr.length > 0){
                        validation = [0,0];
                        for(var z=0;z<unique_arr.length;z++){
                            var data = unique_arr[z];

                            
                            if(data['scheme_category'] != null && data['scheme_category'] != '') validation[0] = 1;            
                            else validation[0] = 0;

                            validation[1] = (data['dist_date'] != null && data['dist_date'] != '') ? 1: 0;
                                        
                            vdt = validation.reduce(function(acc, val) { return acc + val; }, 0);

                            if(updationCheck[z] instanceof HTMLInputElement){
                                if((node.checked && vdt == 0) || (!node.checked && vdt > 0)){
                                    updationCheck[z].value = 1;
                                }
                                else if((node.checked && vdt > 0) || (!node.checked && vdt == 0)){
                                    updationCheck[z].value = 0;
                                }
                            }
                        }               
                }
            }

            function setApplicableClass(node){
                            $("#tbleAppend").empty();
                            $("#additional_title").text('');
                            var low=node.options[node.selectedIndex].getAttribute('data-low');
                            var high=node.options[node.selectedIndex].getAttribute('data-high');
                            var html='<option value="">Avaliable Class</option>';
                            for(var i=parseInt(low);i<=parseInt(high);i++){
                                html+='<option value="'+i+'">'+i+'</option>';
                            }
                            document.getElementById('appli_class').innerHTML=html;
                            document.getElementById('appli_section').innerHTML='<option value="">Available Section</option>';
            }

                $("#appli_class").change(function () {    
                        class_id = $(this).val();
                        section_id = null;
                        get_section(class_id,section_id);
                });

                function get_section(class_id,section_id)
                {
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
                $(document).ready(function() {


                $("#emis_stu_searchsep_sub").click(function(){ 
                    var appli_class = $("#appli_class").val();
                    var appli_section = $("#appli_section").val() != '' ? $("#appli_section").val() : 0;
                    var appli_scheme = $("#scheme_name").val();
                    var appli_scheme_text = appli_scheme == 12 ? "Sweater" : $("#scheme_name option:selected").text();
                    
                    if(appli_class == ''){
                            alert("Select the class");
                            return true;
                    }
                    
                    $("#hide_class_id").val(appli_class);
                    $("#hide_section_id").val(appli_section);
                    $("#hide_scheme_id").val(appli_scheme);

                    var uritype = <?php echo $this->uri->segment(6,0); ?>;

                    var Classes = ["0","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII","PRE-KG","LKG","UKG"];
                    var Sec = (appli_section == '0') ? 'ALL Section' : appli_section +' Section';
                    if(uritype == 0){
                        $("#additional_title").text(': '+appli_scheme_text+' Indent / '+Classes[appli_class]+ ' Standard - '+Sec);
                    }
                    else if(uritype != 0){
                        $("#additional_title").text(': '+appli_scheme_text+' Distribution / '+Classes[appli_class]+ ' Standard - '+Sec);
                    }
                    $(".th_size").show().text(appli_scheme_text+' Size ').css({"text-align":"center","width":"300px"});

                
                        $.ajax({ 
                            data:{'appli_class':appli_class,'appli_section':appli_section,'scheme':appli_scheme },
                            type:"POST",
                            url:baseurl+'Basic/get_hill_station_scheme',
                            success:function(data) 
                            {
                            var records = $.parseJSON(data);
                            
                                var trHTML = '';
                                var line = '<option value="">choose</option>';
                                // var validationFlag = 0;
                                // var readele = '';
                                unique_arr = [];
                            
                                $.each(records.schemes_category, function (i, item) {
                                    line +='<option value='+item.id+' '+item.sel+' >'+item.scheme_category+'</option>';
                                });        
                                if(records.students.length > 0){
                                        $.each(records.students,function (i, item) {
                    
                                            // if(item.indent_date != null){
                                            //         validationFlag++;
                                            // }
                                            unique_arr.push({'scheme_category' : item.new_scheme_category,
                                                             'dist_date':item.distribution_date });
                                            i=i+1;
                                            if(item.indent_date!=null){ indent_date_format = moment(item.indent_date, "YYYY-MM-DD").format("DD/MM/YYYY");} else { indent_date_format = '-'}
                                            
                                            if(uritype == 0){
                                                if(item.distribution_date!=null){ 
                                                      dist_date_format = moment(item.distribution_date, "YYYY-MM-DD").format("DD/MM/YYYY");} 
                                                else{ dist_date_format = '-'}
                                            }
                                            else{ dist_date_format ='<input type="date" class="form-control commondistdate" id="dt_'+item.id+'" name="dt_'+item.id+'" min="'+item.indent_date+'"  onkeypress="return false"  value="'+item.distribution_date+'" onchange="checkwithexistingvalue('+item.id+','+i+')" />';}

                                            if(item.indent_date!=null){                                        
                                                    checkbox='<input type="checkbox" class="custom-form-control" id="opt_'+item.id+'" name="opt_'+item.id+'" onchange="optionenable(this,'+i+')" checked value="1"  />';
                                            }
                                            else{
                                                    checkbox='<input type="checkbox" class="custom-form-control" id="opt_'+item.id+'" name="opt_'+item.id+'" onchange="optionenable(this,'+i+')"  value="1"  />';
                                            }
                                                    trHTML += '<tr id='+i+'>' +
                                                        '<td align="right">' + i + '</td>' +            
                                                        '<td>'+item.unique_id_no+'</td>' +
                                                        '<td>'+item.name+'</td>' +
                                                        '<td class="center td_section">'+item.class_section+'</td>' +
                                                        '<td class="center" >'+checkbox+'</td>' +
                                                        // '<td class="td_size" style="width: 300px !important;"><select class="form-control" id="size_'+item.id+'" name="size_'+item.id+'" onchange="checkwithexistingvalue('+item.id+','+item.new_scheme_category+')">'+line+'</select></td>'+
                                                        '<td class="td_size" style="width: 300px !important;"><select class="form-control" id="size_'+item.id+'" name="size_'+item.id+'" onchange="checkwithexistingvalue('+item.id+','+i+')">'+line+'</select></td>'+
                                                        '<td>'+indent_date_format+'</td>'+
                                                        '<td>'+dist_date_format+'</td>'+
                                                        //  '<td class="td_action"> <button type="button" class="btn btn-primary" id="save" onclick="edit_hill_station_scheme_indent('+item.id+')">save changes</button></td>'+ 
                                                        '<td style="display:none"><input type="hidden" id="updated_'+item.id+'" name="updated_'+item.id+'" value=0 class="form-control" /></td>'+
                                                        '</tr>';	
                                                        
                                                    // readele = '';

                                        });
                                }
                                
                                $("#tbleAppend").empty();
                                $('.hillSectionTable > tbody').append(trHTML);
                                $.each(records.students,function (i, item) {
                                        if(item.new_scheme_category!= null){
                                        $('#size_'+item.id).val(item.new_scheme_category).attr("selected", "selected");
                                        }
                                });
                                
                                if(appli_section == '0'){
                                            $(".th_section").show(); 
                                            $(".td_section").show(); 
                                }
                                else{
                                            $(".th_section").hide(); 
                                            $(".td_section").hide(); 
                                }
                                

                                // appli_scheme != '' ? $(".td_size").show()  : $(".td_set4").hide();

                                // if(validationFlag > 0){ 
                                //     $(".th_action").show(); 
                                //     $(".td_action").show(); 
                                //     $(".initial_save").hide();
                                // }
                                // else{ 
                                //     // alert('else part');
                                //     $(".th_action").hide(); 
                                //     $(".td_action").hide(); 
                                    $(".initial_save").show(); 
                                //     }
                            } 
                        });        
                });});

            function selectallcheck(node){
                //alert(node.checked);
                var checkbox=document.querySelectorAll('input[type="checkbox"]');
                var updationCheck=document.querySelectorAll('input[id^="updated_"]');
                var uritype = <?php echo $this->uri->segment(6,0); ?>;
                if(node.id=='selectall'){
                    for(c in checkbox){
                        if(checkbox[c] instanceof HTMLInputElement)
                            checkbox[c].checked=node.checked;
                    }
                    if(unique_arr.length > 0){
                        if(uritype == 0){
                            for(var z=0;z<unique_arr.length;z++){
                                var cate = unique_arr[z].scheme_category;
                                var thcheck = node.checked == true ? 1: 0;
                                if(updationCheck[z] instanceof HTMLInputElement)
                                updationCheck[z].value = (cate == null) ? thcheck : (!thcheck && cate != null) ? 1 : 0 ;
                                // document.getElementById('eligbleall').indeterminate=true;                            
                            }               
                        }
                        else if(uritype == 1){ 
                            validation = [0,0,0,0];
                                for(var z=0;z<unique_arr.length;z++){
                                    var data = unique_arr[z];
                                    validation[0] = data['scheme_category'] != null ? 1: 0;
                                    validation[1] = data['dist_date'] != null ? 1: 0;
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

                }
                else{
                    document.getElementById('selectall').checked=false;
                }
               
            }

            function optionenable(node,inx){
                var opspt=node.id.split('_');
                var tdcheck = node.checked == true ? 1: 0;
                var updated = document.getElementById('updated_'+opspt[1]);
                var uritype = <?php echo $this->uri->segment(6,0); ?>;
                if(uritype == 0){
                    v = 0;    
                    var current_size =document.getElementById('size_'+opspt[1]);
                    var data = unique_arr[inx-1];
                    var existing_size =  data['scheme_category'];
                    if(current_size){
                        
                        v = (existing_size == null) ? tdcheck 
                                        : (current_size.value != existing_size) ? 1 
                                                                : (!tdcheck) ? 1: 0 ;
                    }   
                    updated.value = v;
                }
                else if(uritype == 1){
                        vdt = validatewithexistingvalue(opspt[1],inx);
                        if((node.checked && vdt == 0) || (!node.checked && vdt > 0)){
                            updated.value = 0;
                        }
                        else if((node.checked && vdt > 0) || (!node.checked && vdt == 0)){
                            updated.value = 1;
                        }
                        else{
                            updated.value = 0;
                        }
                }
            }
            
            // function checkwithexistingvalue(studid,cate){
            //         if(document.getElementById('opt_'+studid).checked == true){
            //             v = 0;    
            //             if(document.getElementById('size_'+studid)){
            //                 var chode=document.getElementById('size_'+studid);
            //                 v = chode.value != cate ? 1: 0;
            //             }                
            //              var updated = document.getElementById('updated_'+studid);
            //              updated.value = v ;                    
            //     }
            // }

                function checkwithexistingvalue(studid,inx){

                    var uritype = <?php echo $this->uri->segment(6,0); ?>;
                    var data = unique_arr[inx-1];
                    var updated = document.getElementById('updated_'+studid);
                    if(document.getElementById('opt_'+studid).checked == true){
                        if(uritype == 0){
                            
                            v = 0;    
                            var existing_size =  data['scheme_category'];
                            if(document.getElementById('size_'+studid)){
                                var current_size=document.getElementById('size_'+studid);
                                v = current_size.value != existing_size ? 1: 0;
                            }                
                            updated.value = v ;                    
                        }
                        else if(uritype != 0){
                            
                            vdt = validatewithexistingvalue(studid,inx);
                            updated.value = vdt > 0 ? 1 : 0 ;                            
                        }
                        
                    }
                }

                function validatewithexistingvalue(studid,inx){
                    var data = unique_arr[inx-1];
                    
                    validation = [0,0];
                    
                    if(document.getElementById('size_'+studid)){
                        var current_size = document.getElementById('size_'+studid);
                            validation[0] = current_size.value != data['scheme_category'] ? 1: 0;
                    }
                    if(document.getElementById('dt_'+studid)){
                        var ddt = document.getElementById('dt_'+studid);
                    
                        if(ddt.value != '' && ddt.value != null){
                            validation[1] = ddt.value != data['dist_date'] ? 1: 0;
                        }
                    }
                    
                    vdt = validation.reduce(function(acc, val) { return acc + val; }, 0)
                    return vdt;
                }

                //    function edit_hill_station_scheme_indent(stud_id){            
                    
                //     if($("#size_"+stud_id).val() != ''){
                //         var arrayDtls = {'class':$("#appli_class").val(),'section':$("#appli_section").val(),'stud_id':stud_id,'scheme':$("#scheme_name").val(),'size':$("#size_"+stud_id).val()};
                    
                //         $.ajax({
                //             type: 'POST',
                //             url:baseurl+'Basic/update_hill_station_scheme_indent',
                //             data: arrayDtls,
                //             success: function (result, textStatus, xhrContent) {
                //                 // alert('Success ');
                //                 swal("Done", result, "success");
                //             },
                //             // error: function (result) {
                //             //     // alert('Fail ');
                //             //     swal("Fail", result, "error");
                //             // }
                //             error: OnError
                //         });     
                //     }
                //     else
                //     {
                //         swal("Cancelled", "Size Fields Is Empty", "error");
                //     }
                //    }

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
            </script>
            <!-- END PAGE LEVEL SCRIPTS -->
    </body>
</html>