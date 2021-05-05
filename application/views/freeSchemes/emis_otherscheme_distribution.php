<?php $title='DISTRIBUTION'; ?>

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
        .container {
            width: 1270px !important;
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
                                    <h1>SPECIAL SCHEME <?php echo $title; ?></h1>
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
                                                 <div id="th_scheme">
                                                 <div class="col-md-3" style="margin-left:15px;">
                                                             <label class="control-label bold">Available Scheme</label>  
                                                        <!-- <label class="control-label bold">Scheme Names</label> -->
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
                                        <div class="portlet-body" style="overflow: auto;">
                                            <form id="free_scheme_indent" name="free_scheme_indent" method="post" action="<?php echo base_url().'Basic/save_scheme_dtls/0';?>">
                                                <input type="hidden" id="scheme_id" name="scheme_id" />
                                                <input type="hidden" id="class_id" name="class_id" />
                                                <input type="hidden" id="section_id" name="section_id" />
                                                <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;" >
                                                    <thead>
                                                        <tr>
                                                        
                                                            <th class="center" rowspan="2">S.No.</th>
                                                            <th class="center" rowspan="2">Student ID</th>                        
                                                            <th class="center" rowspan="2">Student Name</th>
                                                            <th class="center th_section" rowspan="2">Section</th>
                                                            <th class="center" rowspan="2" style="width:50px;" >Select<input type="checkbox" id="selectall" name="selectall" class="custom-form-control" onchange="selectallcheck(this)" /></th>
                                                            <th class="center th_title" rowspan="2">Options</th>
                                                            <th class="center" rowspan="2" style="width:100px;" >Indent Date</th>
                                                            <th class="center th_distdate" >Distribution Date
                                                                                <div class="input-append date" id="dp0" max="<?php echo(date("Y-m-d",strtotime("now+5hours30minutes"))); ?>" onclick="dp(0)">
                                                                                    <input type="hidden" id="datepicker" onchange="alldatedisplay(this)"  /> 
                                                                                    <span class="add-on"><i class="icon-calendar" id="cal2"></i></span>
                                                                                </div>
                                                            </th>
                                                            <th class="center th_uniform_distdate" style="display:none">Distribution Date</th>
                                                            
                                                        </tr>
                                                        <tr class="additional_thead" style="display:none">
                                                            <?php for($i=1;$i<=4;$i++){ ?>
                                                                <th class="center" style="width:100px;"><?php echo 'Set '.$i; ?>
                                                                    <span class="input-append date" id="<?php echo 'dp'.$i ; ?>" max="<?php echo(date("Y-m-d",strtotime("now+5hours30minutes"))); ?>" onclick="dp(<?php echo $i; ?>)">
                                                                        <input type="hidden" id="datepicker" onchange="alldatedisplayforuniformsetwise(this,<?php echo $i; ?>)"  /> 
                                                                        <i class="icon-calendar add-on" id="cal2"></i>
                                                                    </span>
                                                                </th>
                                                            <?php } ?>
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody id="schemeIndent"> 
                                                    </tbody>
                                                </table>
                                                <div class="form-row text-center">
                                                    <input type="hidden" name="finalsub" id="finalsub" value="1" />
                                                    <input type="hidden" name="redirect" id="finalsub" value="<?php echo 'Basic/essentials_dist'?>"/>
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
        // window.onload=function(){                
        //                
        // };
        window.onload=function(){

                //    $("#scheme_name option[value='11']").hide();//sceheme id - 11(laptop) option hided
                //    $("#scheme_name option[value='14']").hide();//sceheme id - 14(breadwinner) option hided
                //    $("#scheme_name option[value='9']").hide();//sceheme id - 9(TextBook) option hided
                //    $("#scheme_name option[value='3']").hide();//sceheme id - 3(NoteBook) option hided     
                      $('#scheme_name option').filter('[value="3"],[value="9"],[value="11"],[value="14"]').remove();

                        var urischeme = <?php echo $this->uri->segment(3,0); ?>;
                        var uriclass = <?php echo $this->uri->segment(4,0); ?>;
                        var urisection = "<?php echo $this->uri->segment(5,0); ?>";

                        document.getElementById('scheme_name').value=urischeme;
                        document.getElementById('scheme_name').onchange();
                        document.getElementById('scheme_id').value=urischeme;
                        
                        if(uriclass != 0){
                            $("#appli_class option[value='.uriclass.']").attr('selected','selected');
                            document.getElementById('appli_class').value=uriclass;
                            document.getElementById('class_id').value=uriclass;
                            document.getElementById('section_id').value=urisection;
                            get_section(uriclass,urisection);
                        
                        }
                        else{
                            // alert('urisection'+urisection);
                                var arr =  (<?php echo json_encode($scheme); ?>).filter(function(dataitem) {
                                        return dataitem.id == urischeme ;
                                });

                               $("#appli_class option[value='.low.']").attr('selected','selected');
                               document.getElementById('appli_class').value=arr[0].appli_lowclass;       
                               document.getElementById('class_id').value=arr[0].appli_lowclass;
                               document.getElementById('section_id').value=urisection;
                               get_section(arr[0].appli_lowclass,urisection);
                        
                         }
                        
                        setTimeout(function(){ document.getElementById('emis_stu_searchsep_sub').click(); }, 600);
                };
                    
            // var dt=document.getElementById('dp3');
            
            // $("#dp3").click(function(){
            //     // var mind=dt.getAttribute('min').split('-');
            //     var maxd=dt.getAttribute('max').split('-');
            //     // mind[1]=parseInt((parseInt(mind[1])/10))==0?(parseInt(mind[1])%10):mind[1];
            //     // mind[1]=parseInt(mind[1])-1;
            //     maxd[1]=parseInt((parseInt(maxd[1])/10))==0?(parseInt(maxd[1])%10):maxd[1];
            //     maxd[1]=parseInt(maxd[1])-1;
            //     $("#dp3").datepicker({
            //         // startDate: new Date(mind[0],mind[1],mind[2]),
            //         endDate: new Date(maxd[0],maxd[1],maxd[2])});
             
            // });

            function dp(val){
                 var dt=document.getElementById('dp'+val);
                // var mind=dt.getAttribute('min').split('-');
                // var maxd=dt.getAttribute('max').split('-');
                // mind[1]=parseInt((parseInt(mind[1])/10))==0?(parseInt(mind[1])%10):mind[1];
                // mind[1]=parseInt(mind[1])-1;
                // maxd[1]=parseInt((parseInt(maxd[1])/10))==0?(parseInt(maxd[1])%10):maxd[1];
                // maxd[1]=parseInt(maxd[1])-1;
                // $("#dp"+val).datepicker({
                //     startDate: new Date(mind[0],mind[1],mind[2]),
                //     endDate: new Date(maxd[0],maxd[1],maxd[2])});

                
                var maxd=dt.getAttribute('max').split('-');
            
                 maxd[1]=parseInt((parseInt(maxd[1])/10))==0?(parseInt(maxd[1])%10):maxd[1];
                 maxd[1]=parseInt(maxd[1])-1;
                 $("#dp"+val).datepicker({
                    // startDate: new Date(mind[0],mind[1],mind[2]),
                    endDate: new Date(maxd[0],maxd[1],maxd[2])});
             
            }

            function setApplicableClass(node){
                $("#schemeIndent").empty();
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
            
            function alldatedisplay(node){
                var datebox=document.querySelectorAll('.commondistdate');
                var updationCheck=document.querySelectorAll('input[id^="updated_"]');
                var dt=new Date(node.value);
                var yy=dt.getFullYear();
                var mm=dt.getMonth()+1;
                var dd=dt.getDate();
                if(mm<10){mm='0'+mm;}if(dd<10){dd='0'+dd;}
                for(c in datebox){
                   datebox[c].value=yy+'-'+mm+'-'+dd;
                }if(unique_arr.length > 0){
                        validation = [0,0];
                        for(var z=0;z<unique_arr.length;z++){
                            var data = unique_arr[z];

                            if(data['unique_supply'] != null && data['unique_supply'] != '') validation[0] = 1;
                            else if(data['scheme_category'] != null && data['scheme_category'] != '') validation[0] = 1;            
                            else validation[0] = 0;

                            validation[1] = (data['dist_dt'] != null && data['dist_dt'] != '') ? 1: 0;
                                        
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


            function alldatedisplayforuniformsetwise(node,set){
                var datebox=document.querySelectorAll('.set'+set+'distdate');
                var updationCheck=document.querySelectorAll('input[id^="updated_"]');
                var dt=new Date(node.value);
                var yy=dt.getFullYear();
                var mm=dt.getMonth()+1;
                var dd=dt.getDate();
                if(mm<10){mm='0'+mm;}if(dd<10){dd='0'+dd;}
                for(c in datebox){
                   datebox[c].value=yy+'-'+mm+'-'+dd;
                } if(unique_arr.length > 0){
                        validation = [0,0,0,0];
                        for(var z=0;z<unique_arr.length;z++){
                            var data = unique_arr[z];
                            for(var i=0;i<4;i++){
                                validation[i] = data['set'+(i+1)+'_dt'] != 0 ? 1: 0;
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

            
            $(document).ready(function(){ 
                
                $("#emis_stu_searchsep_sub").click(function(){ 
                    
                    var appli_class = $("#appli_class").val();
                    var scheme_id = $("#scheme_name").val();
                    var appli_section = $("#appli_section").val();

                    $("#scheme_id").val(scheme_id);
                    $("#class_id").val(appli_class);
                    $("#section_id").val(appli_section);

                    var Classes = ["0","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII","PRE-KG","LKG","UKG"];
                    var Sec = (appli_section == '0') ? 'ALL Section' : appli_section +' Section';
                    $("#additional_title").text(': '+ $("#scheme_name option:selected").text() +' Distribution / '+Classes[appli_class]+ ' Standard - '+Sec);
                    
                    switch($("#scheme_id").val()){
                        
                        case '1': $(".th_title").hide()
                                                .text("Uniform Size")
                                                .css({"text-align":"left","width":"0px"})
                                  $(".th_uniform_distdate").show()
                                                .css({"text-align":"center","width":"800px"})
                                                .attr('colspan','4'); 
                                  $(".th_distdate").hide();
                                  $(".additional_thead").show(); 
                                  break;
                        case '2': $(".th_title").show()
                                                .text("Footwear Size")
                                                .css({"text-align":"left","width":"150px"});
                                  $(".th_uniform_distdate").hide().attr('colspan','1'); 
                                  $(".th_distdate").show();
                                  $(".additional_thead").hide();
                                  break;
                        case '4': $(".th_title").show()
                                                .text("Options")
                                                .css({"text-align":"left","width":"150px"});
                                   $(".th_uniform_distdate").hide().attr('colspan','1'); 
                                   $(".th_distdate").show();
                                   $(".additional_thead").hide();  
                                   break;
                        case '10': $(".th_title").show()
                                                 .text("Unique No")
                                                 .css({"text-align":"left","width":"150px"});
                                   $(".th_uniform_distdate").hide().attr('colspan','1'); 
                                   $(".th_distdate").show();
                                   $(".additional_thead").hide();  
                                   break;
                        default: $(".th_title").hide(); 
                                 $(".th_distdate").show();
                                 $(".th_uniform_distdate").hide().attr('colspan','1'); 
                                 $(".additional_thead").hide(); break;
                    }
                    document.getElementById('hdsearch').value=1;

                    if(appli_class == ''){
                        alert("Select the class");
                        return true;
                    }

                    if($.fn.dataTable.isDataTable('#sample_33')){
                         $('#sample_33').DataTable().clear().destroy();
                    }
                    
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/get_essentials_dist',
                        data:"&appli_class="+appli_class+"&scheme_id="+scheme_id+"&appli_section="+appli_section,
                        success: function(resp, textStatus, xhrContent) {
                            var jsArr=JSON.parse(resp);
                            var tr="";
                            unique_arr = [];
                            var checkbox,selectbox,datebox,readele,count=0,depe;
                            var datebox2;

                        
                            // if(jsArr['students'].length<=0){
                            //     alert('No Eligible Students Found');
                            //     return true;
                            // }

                            var dis=0;
                            for(var i=0;i<jsArr['students'].length;i++){
                                if($("#scheme_id").val() != 1){
                                    unique_arr.push({'scheme_category':jsArr['students'][i]['scheme_category'],
                                                     'unique_supply':jsArr['students'][i]['unique_supply'],
                                                     'dist_dt':jsArr['students'][i]['distribution_date']});
                                }
                                else if($("#scheme_id").val() == 1){
                                    unique_arr.push({'set1_dt':jsArr['students'][i]['set1_distribution_date'],
                                                 'set2_dt':jsArr['students'][i]['set2_distribution_date'],
                                                 'set3_dt':jsArr['students'][i]['set3_distribution_date'],
                                                 'set4_dt':jsArr['students'][i]['set4_distribution_date']});
                                }
                                checkbox='<input type="checkbox" class="custom-form-control"';
                                selectbox='<select class="form-control" ';
                                datebox='<input type="date" class="form-control commondistdate" ';                                
                                readele='';

                                if($("#scheme_id").val() == '1' || $("#scheme_id").val() == '2'){
                                    if(jsArr['students'][i]['indent_date'] == null){
                                        readele='disabled'; 
                                    }
                                    else{
                                        readele='';
                                    }
                                } 
                                    
                                tr+='<tr>';
                                    tr+='<td>'+(i+1)+'</td>';        //SNO.
                                    tr+='<td>'+jsArr['students'][i]['unique_id_no']+'</td>';        //Student ID NO
                                    tr+='<td>'+jsArr['students'][i]['name']+'</td>';        //Student Name
                                    tr+='<td class="td_section" style="display:none">'+jsArr['students'][i]['class_section']+'</td>';  // Class-Section
                                    if(jsArr['students'][i]['scheme_id']!=null){
                                        checkbox+=' id="opt_'+jsArr['students'][i]['id']+'" name="opt_'+jsArr['students'][i]['id']+'" checked '+readele+' value="1" onchange="optionenable(this,'+i+')" />';
                                    }
                                    else{
                                        checkbox+=' id="opt_'+jsArr['students'][i]['id']+'" name="opt_'+jsArr['students'][i]['id']+'" value="1" '+readele+' onchange="optionenable(this,'+i+')" />';
                                    }
                                    tr+='<td class="center" >'+checkbox+'</td>';        //Eligble
                                    

                                    if(jsArr['scheme'].length>=1){
                                        if($("#scheme_id").val()!=3)
                                            selectbox+='id="size_'+jsArr['students'][i]['id']+'" name="size_'+jsArr['students'][i]['id']+'" onchange="checkwithexistingvalue('+jsArr['students'][i]['id']+','+i+')" '+readele+'></select>';
                                        else
                                            selectbox='All Notebooks'   
                                    }
                                    else if($("#scheme_id").val()!=10 && $("#scheme_id").val()!=14)
                                            selectbox='-NA-';
                                    else{
                                        if(jsArr['students'][i]['unique_supply'] == null || jsArr['students'][i]['unique_supply'] == '')
                                            selectbox='<input type="text" id="ser_'+jsArr['students'][i]['id']+'" name="ser_'+jsArr['students'][i]['id']+'" placeholder="UNIQUE NUMBER" class="form-control" onblur="distridateinput(this)" onchange="optionenable(this,'+i+')" />';
                                        else 
                                            selectbox='<input type="text" id="ser_'+jsArr['students'][i]['id']+'" name="ser_'+jsArr['students'][i]['id']+'" value="'+jsArr['students'][i]['unique_supply']+'" class="form-control" onblur="distridateinput(this)" onchange="optionenable(this,'+i+')" />';
                                    }
                                    if($("#scheme_name").val() == '2' || $("#scheme_name").val() == '4' || $("#scheme_name").val() == '10'){ tr+='<td>'+selectbox+'</td>'; }       //Options   
                                    
                                    
                                    if(jsArr['students'][i]['indent_date']!=null){
                                        
                                        var newDate = moment(jsArr['students'][i]['indent_date'], "YYYY-MM-DD").format("DD/MM/YYYY");
                                        document.getElementById('dp0').setAttribute('min',jsArr['students'][i]['indent_date']);
                                        tr+='<td>'+newDate+'</td>';
                                        // document.getElementById('dp0').setAttribute('min',jsArr['students'][i]['indent_date']);
                                    }
                                    else{
                                            tr+='<td>-</td>';
                                    }                                   //Date
                                    
                                    // tr+='<td style="display:none">'+hidden+'</td>';

                                    if($("#scheme_id").val()==1){
                                      for(var j=1;j<=4;j++){
                                            datebox2='<input type="date" class="form-control set'+j+'distdate" style="width: 97% !important; padding: 5px 0px !important;"';                                
                                            if(jsArr['students'][i]['indent_date']!=null && jsArr['students'][i]['set'+j+'_distribution_date']!=null){
                                                
                                                if (jsArr['students'][i]['set'+j+'_distribution_date'] !== '0000-00-00'){
                                                    var DbDate = jsArr['students'][i]['set'+j+'_distribution_date'];
                                                    datebox2+=' id="set'+j+'_dt_'+jsArr['students'][i]['id']+'" name="set'+j+'_dt_'+jsArr['students'][i]['id']+'" min="'+jsArr['students'][i]['indent_date']+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false"  value="'+DbDate+'" '+readele+' onchange="checkwithexistingvalue('+jsArr['students'][i]['id']+','+i+')"/>';       
                                                }
                                                else{
                                                    datebox2+=' id="set'+j+'_dt_'+jsArr['students'][i]['id']+'" name="set'+j+'_dt_'+jsArr['students'][i]['id']+'" min="'+jsArr['students'][i]['indent_date']+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false"  '+readele+' onchange="checkwithexistingvalue('+jsArr['students'][i]['id']+','+i+')"/>';       
                                                }
                                            }
                                            else if(jsArr['students'][i]['indent_date']!=null && jsArr['students'][i]['set1_distribution_date']==null){
                                                datebox2+=' id="set'+j+'_dt_'+jsArr['students'][i]['id']+'" name="set'+j+'_dt_'+jsArr['students'][i]['id']+'" min="'+jsArr['students'][i]['indent_date']+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false"  '+readele+' onchange="checkwithexistingvalue('+jsArr['students'][i]['id']+','+i+')"/>';       
                                            }
                                            else{
                                                // datebox='-';
                                                datebox2+=' id="set'+j+'_dt_'+jsArr['students'][i]['id']+'" name="set'+j+'_dt_'+jsArr['students'][i]['id']+'" min="'+jsArr['students'][i]['indent_date']+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false"  '+readele+' onchange="checkwithexistingvalue('+jsArr['students'][i]['id']+','+i+')"/>';       
                                            }
                                            tr+='<td>'+datebox2+'</td>';        //  Uniform Distribution
                                      }
                                    }
                                    else if($("#scheme_id").val()!=1){
                                            if(jsArr['students'][i]['indent_date']!=null && jsArr['students'][i]['distribution_date']!=null){
                                                if (jsArr['students'][i]['distribution_date'] !== '0000-00-00'){
                                                    var DbDate = jsArr['students'][i]['distribution_date'];
                                                    datebox+=' id="dt_'+jsArr['students'][i]['id']+'" name="dt_'+jsArr['students'][i]['id']+'" min="'+jsArr['students'][i]['indent_date']+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false"  value="'+DbDate+'" '+readele+' onchange="checkwithexistingvalue('+jsArr['students'][i]['id']+','+i+')"/>';       
                                                }
                                                else{
                                                    datebox+=' id="dt_'+jsArr['students'][i]['id']+'" name="dt_'+jsArr['students'][i]['id']+'" min="'+jsArr['students'][i]['indent_date']+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false"  '+readele+' onchange="checkwithexistingvalue('+jsArr['students'][i]['id']+','+i+')"/>';
                                                }
                                            }
                                            else if(jsArr['students'][i]['indent_date']!=null && jsArr['students'][i]['distribution_date']==null){
                                                
                                                datebox+=' id="dt_'+jsArr['students'][i]['id']+'" name="dt_'+jsArr['students'][i]['id']+'" min="'+jsArr['students'][i]['indent_date']+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false" '+readele+' onchange="checkwithexistingvalue('+jsArr['students'][i]['id']+','+i+')"/>';       
                                            }
                                            else{
                                                // datebox='-';
                                                datebox+=' id="dt_'+jsArr['students'][i]['id']+'" name="dt_'+jsArr['students'][i]['id']+'" min="'+jsArr['students'][i]['indent_date']+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false" '+readele+' onchange="checkwithexistingvalue('+jsArr['students'][i]['id']+','+i+')"/>';       
                                            }
                                            tr+='<td>'+datebox+'</td>';        //Distribution
                                    }
                                    hidden='<input type="hidden" id="updated_'+jsArr['students'][i]['id']+'" name="updated_'+jsArr['students'][i]['id']+'" value=0 class="form-control" />';
                                    tr+='<td style="display:none">'+hidden+'</td>';
                                    tr+='</tr>';checkbox=selectbox=datebox='';
                                    // if(dis==2){readele='';}
                            }  
                            document.getElementById('schemeIndent').innerHTML=tr;
                            sum_dataTable('#sample_3');
                            //document.getElementById('selectall').checked=false;
                            var opt='',multi=0;var node;
                            if(jsArr['scheme'].length>0 && $("#scheme_id").val() != 1){
                               
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

                // if (<?php // echo $this->uri->segment(3,0) ?> == 0) {
                //    $("#scheme_name option[value='11']").hide();//sceheme id - 11(laptop) option hided
                //    $("#scheme_name option[value='14']").hide();//sceheme id - 14(breadwinner) option hided
                //    $("#scheme_name option[value='9']").hide();//sceheme id - 9(TextBook) option hided
                //    $("#scheme_name option[value='3']").hide();//sceheme id - 3(NoteBook) option hided
                // }
            }); 
            
            // function selectallcheck(node){
            //     //alert(node.checked);
            //     var checkbox=document.querySelectorAll('input[type="checkbox"]');
            //     if(node.id=='selectall'){
            //         for(c in checkbox){
            //             if(checkbox[c] instanceof HTMLInputElement)
            //                 checkbox[c].checked=node.checked;
            //         }
            //     }
            //     else{
            //         //document.getElementById('selectall').checked=false;
            //     }
               
            // }

            // function optionenable(node){
            //     var opspt=node.id.split('_');
            //     if(document.getElementById('size_'+opspt[1])){
            //     var chode=document.getElementById('size_'+opspt[1]);
            //     chode.disabled=!node.checked;}
            // }

            function selectallcheck(node){
                //alert(node.checked);
                var checkbox=document.querySelectorAll('input[type="checkbox"]');
                var updationCheck=document.querySelectorAll('input[id^="updated_"]');
                if(node.id=='selectall'){
                    for(c in checkbox){
                        if(checkbox[c] instanceof HTMLInputElement)
                            checkbox[c].checked=node.checked;
                    }
                    if($("#scheme_id").val() == 1 && unique_arr.length > 0){
                        validation = [0,0,0,0];
                        for(var z=0;z<unique_arr.length;z++){
                            var data = unique_arr[z];
                            for(var i=0;i<4;i++){
                                validation[i] = data['set'+(i+1)+'_dt'] != 0 ? 1: 0;
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
                    if($("#scheme_id").val() != 1 && unique_arr.length > 0){
                        validation = [0,0];
                        for(var z=0;z<unique_arr.length;z++){
                            var data = unique_arr[z];
                            // for(var i=0;i<4;i++){
                            //     validation[i] = data['set'+(i+1)+'_dt'] != 0 ? 1: 0;
                            // }
                            validation[0] = data['scheme_category'] != null ? 1: 0;
                            validation[1] = data['dist_dt'] != null ? 1: 0;
                            
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
                    var data = unique_arr[inx];
                    console.log(unique_arr);
                    if($("#scheme_id").val() != 1){
                        console.log($("#scheme_id").val());
                        validation = [0,0];
                        // unique_arr.push({'scheme_category':jsArr['students'][i]['unique_supply'],
                        //                  'unique_supply':jsArr['students'][i]['unique_supply'],
                        //                          'dist_dt':jsArr['students'][i]['distribution_date']});
                        if(document.getElementById('ser_'+studid)){
                            var current_serial_no =document.getElementById('ser_'+studid);
                            
                            if(current_serial_no.value != null && current_serial_no.value != ''){
                                        validation[0] = current_serial_no.value != data['unique_supply'] ? 1: 0;
                            }
                            else{
                                validation[0] = 0;
                            }
                        }
                        else if(document.getElementById('size_'+studid)){
                            var current_size =document.getElementById('size_'+studid);
                            if(current_size.value != null && current_size.value != ''){
                                        validation[0] = current_size.value != data['scheme_category'] ? 1: 0;
                            }
                            else{
                                validation[0] = 0;
                            }       
                        }            

                        if(document.getElementById('dt_'+studid)){
                            var current_dist_date =document.getElementById('dt_'+studid);
                            if(current_dist_date.value != null && current_dist_date.value != ''){
                                        validation[1] = current_dist_date.value != data['dist_dt'] ? 1: 0;
                            }
                            else{
                                validation[1] = 0;
                            }       
                        }            
                          console.log(validation);
                    }else{
                            validation = [0,0,0,0];
                            // var opspt=node.id.split('_');

                            for(var i=0;i<4;i++){
                                
                                if(document.getElementById('set'+(i+1)+'_dt_'+studid)){
                                    
                                    var chode=document.getElementById('set'+(i+1)+'_dt_'+studid);
                                    // console.log('chode.value'+chode.value);
                                    // console.log(data['set'+(i+1)+'_dt']);
                                    if(chode.value != null && chode.value != ''){
                                        validation[i] = chode.value != data['set'+(i+1)+'_dt'] ? 1: 0;
                                    }
                                    else{
                                        validation[i] = 0;
                                    }
                                            // console.log('They are Not Equal'+chode.value+data['set'+(i+1)+'_dt']+validation);
                                            // console.log('They are Equal'+chode.value+data['set'+(i+1)+'_dt']);
                                        
                                }
                            }                
                    }
                    // console.log(validation);
                    vdt = validation.reduce(function(acc, val) { return acc + val; }, 0)
                    return vdt;
                }

            function optionenable(node,inx){
                var opspt=node.id.split('_');
                vdt = vaildate2(opspt[1],inx);
                var tdselectcheck = node.checked == true ? 1:vdt > 0 ? 1 : 0;
                console.log('t'+tdselectcheck);
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
            
            function distridateinput(node){
                var id=node.id;
                var sp=id.split('_');
                var dt=document.getElementById('dt_'+sp[1]).value;
                if(node.value!=''||node.value!=null){
                    // if(dt==null||dt=='')
                        // alert('Both Distribution And Unique ID is Compulsory');
                }
            }


            $("#appli_class").change(function () {    
               class_id = $(this).val();
               section_id = null;
               get_section(class_id,section_id);
            })

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
                                        
                                    })
                    }
            }

            
            function validate(){
                if($("#hdsearch").val()=="1"){ 
                // console.log(JSON.stringify($('#free_scheme_indent').serializeArray()));
                
                var validationFlag = 0;
                var optkeycount = 0
                var values = {};
                var existing_serial_no = current_serial_no = '';

                $.each($('#free_scheme_indent').serializeArray(), function(i, field) {
                    if(field.value != '')
                    values[field.name] = field.value;
                });
                
            
                $.each(values, function(index,val) {
                    var splited=index.split('_');
                
                    if(index.substring(0,3) == 'opt') {
                        optkeycount++;
                    }

                    // if(val.hasOwnProperty('opt_'+splited[1])) {
                      if(splited[0] == 'opt'){
                        var opt_val = document.getElementById('opt_'+splited[1]).value;                                   
                        if(opt_val == 1){
                            var dt_val = $("#scheme_id").val() != 1 ? document.getElementById('dt_'+splited[1]).value : '' ;           
                            var ser_val =  document.getElementById('ser_'+splited[1]) ? document.getElementById('ser_'+splited[1]).value : document.getElementById('size_'+splited[1]) ? document.getElementById('size_'+splited[1]).value : '' ;      
                        
                            switch($("#scheme_id").val()){
                                case '1': break;
                                case '2': if(dt_val == '' || ser_val == '' || ser_val == null){
                                            validationFlag++;
                                          } break;
                                case '4': if(dt_val == '' || ser_val == '' || ser_val == null){
                                            validationFlag++;
                                          } break;
                                case '10': if(dt_val == '' || ser_val == '' || ser_val == null){
                                            validationFlag++;
                                         } break;
                                default: if(dt_val == ''){
                                            validationFlag++; 
                                         } break;
                            }
                            
                        }
                        
                    }
                });

               if(validationFlag > 0 && optkeycount > 0)
                    // if($("#scheme_id").val() == '1' || $("#scheme_id").val() == '2' || $("#scheme_id").val() == '4' || $("#scheme_id").val() == '10'){ alert('Both Distribution And Serial Number is Compulsory !'); }
                    // else {}
                        alert('Distribution Date is Compulsory !'); 
               else if(optkeycount == 0) alert('Check Atleast One Checkbox !'); 
               else{
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
            }

        function sum_dataTable(dataId){
    // alert();
    table = $(dataId).DataTable({
      "dom": 'Bfrtip',
      responsive: true,
      retrieve: true,

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