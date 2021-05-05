<!-- Scheme Laptop-Distribution Page : 18.07.2019(venba/ps)  -->
<?php 
        $Starting ='';
        $Ending ='';
        $Year = '';
        $Curr_month_no = date('m');

        if($Curr_month_no >= 06){
            $Starting = date('Y');
            $Ending = date('Y')+1;
        }
        else{
            $Starting = date('Y')-1;
            $Ending = date('Y');
        }

        for($i=0;$i<2;$i++)
        {
            $Year = $Starting." - ".$Ending ;
            $Text = $i==0?"Current Year":"Previous Year";
            $opt[$i] = array("aca_yr_id"=>$i, "aca_year"=>$Year, "text"=>$Text);
            $Starting--;
            $Ending--;
        }
        // print_r($opt);
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
        #errormsg { height: 600px; overflow: auto; font-size: 10pt !important; font-weight: normal !important; background-color: #FFFFC1; margin: 10px; border: 1px solid #ff6a00; }
        #errormsg div { margin-bottom: 15px; }
    </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
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
                                        <h1>SPECIAL SCHEME DISTRIBUTION</h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar"></div>
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
                                        <!-- BEGIN FIRST-PORLET-FIT  -->
                                        <div class="portlet light portlet-fit ">
                                            <!-- BEGIN PORLET TITLE  -->
                                            <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-settings font-dark"></i>
                                                        <span class="caption-subject font-dark sbold uppercase">Laptop Distribution Class Wise</span>
                                                    </div>
                                            </div>
                                            <!-- END PORLET TITLE  -->

                                            <!-- BEGIN PORLET BODY -->
                                            <div class="portlet-body">
                                                <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                                <div class ="row">
                                                    <div class="col-md-4">
                                                        <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                    </div>
                                                </div>
                                            
                                                <div class="row">
                                                        
                                                        <div class="col-md-3">
                                                            <select class="form-control"  id="academic_year" name="academic_year">
                                                                <option value="">Academic Year</option>
                                                                <!--<option value="0">Current Year (2019-2020)</option>
                                                                <option value="1">Previous Year (2018-2019)</option> -->
                                                                <?php  $dates = range(date('Y'), date('Y')+1);
                                                                            $x = 1;
                                                                                foreach($dates as $date){
                                                                                if (date('m', strtotime($date)) <= 6) {
                                                                                    $year = $date . '-' . $date+1;
                                                                                    } else {
                                                                                        $year = $date-1 . '-' . $date;
                                                                                    }
                                                                                $text = $x==0?"Current Year":"Previous Year";
                                                                                echo "<option value=".$x.">".$text.' ( '.$year.' )'."</option>";
                                                                                $x--;
                                                                            } 
                                                                    ?>
                                                            </select> 
                                                        </div>

                                                        <div class="col-md-3">
                                                            <select class="form-control" id="appli_class" name="appli_class">
                                                                <option value="" >Available Classes</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-3">
                                                                <select class="form-control" id="appli_section" name="appli_section">
                                                                <option value="" >Available Section</option>
                                                                </select>
                                                        </div>
    
                                                            <input type="hidden" id="hdsearch" value="0" />
                                                            <button type="button" id="emis_stu_searchsep_sub" name="emis_stu_searchsep_sub" class="btn green btn-md">Submit</button>
                                                        <!-- <div id="errormsg" style="display: none"></div> -->
                                                </div>

                                            </div>
                                            <!-- END PORLET BODY -->
        
                                        </div>         
                                        <!-- END FIRST-PORLET-FIT  -->

                                        <!-- BEGIN SECOND-PORLET-FIT  -->
                                        <div class="portlet light portlet-fit ">
                                                <!-- BEGIN PORLET-TITLE  -->
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-settings font-dark"></i>
                                                        <span class="caption-subject font-dark sbold uppercase">Laptop Distribution Class Wise</span>
                                                    </div>

                                                </div>
                                                <!-- END PORLET-TITLE  -->

                                                <!-- BEGIN PORLET-BODY -->
                                                <div class="portlet-body">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <div class="portlet box green">
                                                                <div class="portlet-title">
                                                                <div class="caption">
                                                                     Scheme Beneficiaries <small id="additional_title"> </small>
                                                                    </div>
                                                                    <div class="tools"></div> 
                                                                </div>

                                                                <div class="portlet-body">
                                                                        <form id="free_scheme_indent" name="free_scheme_indent" method="post" action="<?php echo base_url().'Basic/save_laptop_distribution';?>">
                                                                            <input type="hidden" id="hdacademicyr" name="hide_academic_yr" />
                                                                            <input type="hidden" id="hdacayrid" name="hide_aca_yr_id" />
                                                                            <input type="hidden" id="hdclassid" name="hide_class_id" />
                                                                            <input type="hidden" id="hdsectionid" name="hide_section_id" />
                                                                            
                                                                            <table class="table table-striped table-bordered table-hover laptopDist" style="alignment-adjust: !important;">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>S.No.</th>
                                                                                        <th>Student ID</th>                        
                                                                                        <th>Student Name</th>
                                                                                        <th class="center th_section" style="display:none">Section</th>
                                                                                        <th style="width:50px;">Select&nbsp;&nbsp;<input type="checkbox" id="selectall" name="selectall" class="custom-form-control" onchange="selectallcheck(this)" /></th>
                                                                                        <th style="width:200px;">Serial No</th>
                                                                                        <th style="width:150px;">Distribution Date
                                                                                            <div class="input-append date" id="dp3" max="<?php echo(date("Y-m-d",strtotime("now+5hours30minutes"))); ?>">
                                                                                                <input type="hidden" id="datepicker" onchange="alldatedisplay(this)" /> 
                                                                                                <span class="add-on"><i class="icon-calendar" id="cal2"></i></span>
                                                                                            </div>
                                                                                        </th>
                                                                                        <th class="center" style="display:none"></th>                        
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="schemeIndent"> 
                                                                                </tbody>
                                                                            </table>
                                                                            
                                                                            <div class="form-row">
                                                                                <input type="hidden" name="finalsub" id="finalsub" value="1" />
                                                                                <input type="hidden" name="redirect" value="<?php echo 'Basic/laptop_dist';?>"/>
                                                    
                                                                                <div class="form-group col-md-offset-8 col-md-4">
                                                                                    <button type="button" class="btn btn-primary" id="fsubmit" onclick="document.getElementById('finalsub').value=1;return validate();">Submit</button>
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
                                                <!-- END PORLET-BODY -->
                                        </div>
                                        <!-- END SECOND-PORLET-FIT  -->
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                    </div>
                    <!-- END CONTAINER -->
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
                        
                        var arr =  (<?php echo json_encode($scheme); ?>).filter(function(dataitem) {
                                            return dataitem.id == 11 ;
                                    });
        
                        low = arr[0].appli_lowclass;
                        high = arr[0].appli_highclass;
        
                        var html='<option value="">Avaliable Class</option>';
                        for(var i=parseInt(low);i<=parseInt(high);i++){
                            html+='<option value="'+i+'">'+i+'</option>';
                        }
                        
                        document.getElementById('appli_class').innerHTML=html;        

                        var uriacyear = <?php echo $this->uri->segment(3,0); ?>;
                        var uriclass = <?php echo $this->uri->segment(4,0); ?>;
                        var urisection = "<?php echo $this->uri->segment(5,0); ?>";
                        console.log(parseInt(uriacyear));
                        if(uriclass != 0){
                            if(uriacyear == 1){
                                $("#academic_year option[value=1]").attr('selected','selected');
                            }else{
                                $("#academic_year option[value=0]").attr('selected','selected');
                            }
                            
                            AcYearChange();
                            $("#appli_class option[value='.uriclass.']").attr('selected','selected');
                            document.getElementById('appli_class').value=uriclass;
                            document.getElementById('hdacayrid').value=uriacyear;
                            document.getElementById('hdclassid').value=uriclass;
                            document.getElementById('hdsectionid').value=urisection;
                            get_section(uriclass,urisection);
                        }
                        else{
                            $("#academic_year option[value=0]").attr('selected','selected');
                            AcYearChange();
                            $("#appli_class option[value='.low.']").attr('selected','selected');
                            document.getElementById('appli_class').value=low;
                            document.getElementById('hdacayrid').value=uriacyear;
                            document.getElementById('hdclassid').value=low;
                            document.getElementById('hdsectionid').value=urisection;
                            get_section(low,urisection);
                        }
                        
                        setTimeout(function(){ document.getElementById('emis_stu_searchsep_sub').click(); }, 600);
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
            
            $("#appli_class").change(function () {    
               class_id = $(this).val();
               section_id = null;
               get_section(class_id,section_id);
            })

            

            // function alldatedisplay(node){
            //     var datebox=document.querySelectorAll('input[type="date"]');
            //     var dt=new Date(node.value);
            //     var yy=dt.getFullYear();
            //     var mm=dt.getMonth()+1;
            //     var dd=dt.getDate();
            //     if(mm<10){mm='0'+mm;}if(dd<10){dd='0'+dd;}
       
            //     for(c in datebox){
            //        datebox[c].value=yy+'-'+mm+'-'+dd;
            //     }
            // }

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
                }if(unique_arr.length > 0){
                        validation = [0,0];
                        for(var z=0;z<unique_arr.length;z++){
                            var data = unique_arr[z];

                            validation[0] = (data['unique_supply'] != null && data['unique_supply'] != '') ? 1 : 0;
                            validation[1] = (data['dist_dt'] != null && data['dist_dt'] != '0000-00-00' && data['dist_dt'] != '') ? 1: 0;
                                        
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


            $("#academic_year").change(function () {    
                AcYearChange();
                // var aca_yr_id = $("#academic_year").val();  
                // var academic_year = $('#academic_year option:selected').text();
                // // var subStr = academic_year.split("( ");
                // // subStr = subStr[1].split(" )");
                // // alert(subStr[0]);
                // if(aca_yr_id == 1){
                //     // $("#appli_class option[value*='11']").prop('disabled',true);
                //     $("#appli_class option[value*='11']").hide();
                //     $("#appli_class option[value='12']").attr('selected','selected');
                //     document.getElementById('appli_class').value=12;
                //     $("#hdclassid").val(appli_class);
                //     section_id = null;
                //     get_section(12,section_id);
                // }
                // else{
                //     // $("#appli_class option[value*='11']").prop('disabled',false);
                //     $("#appli_class option[value*='11']").show();
                // }
            });  
            function AcYearChange(){
                var aca_yr_id = $("#academic_year").val();  
                $("#schemeIndent").empty();
                $("#additional_title").text('');
                var academic_year = $('#academic_year option:selected').text();
                // var subStr = academic_year.split("( ");
                // subStr = subStr[1].split(" )");
                // alert(subStr[0]);
                if(aca_yr_id == 1){
                    // $("#appli_class option[value*='11']").prop('disabled',true);
                    $("#appli_class option[value*='11']").hide();
                    $("#appli_class option[value='12']").attr('selected','selected');
                    document.getElementById('appli_class').value=12;
                    $("#hdclassid").val(appli_class);
                    section_id = null;
                    get_section(12,section_id);
                }
                else{
                    // $("#appli_class option[value*='11']").prop('disabled',false);
                    $("#appli_class option[value*='11']").show();
                }
            }
            
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
                                            // console.log(textStatus);
                                            if(xhrContent.status == 200){
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
                                          }
                                          else if(xhrContent.status != 200){
                                            swal(xhrContent.status+" Error Occur ", statusText , "error")
                                          }
                                        },
                                        error: OnError
                                    })
                    }
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

            $(document).ready(function(){ 
              
                $("#emis_stu_searchsep_sub").click(function(){ 
                    
                    var appli_class = $("#appli_class").val();
                    var appli_section = $("#appli_section").val();
                    var aca_yr_id = $("#academic_year").val();
                    var academic_year = $('#academic_year option:selected').text();
                    var subStr = academic_year.split("( ");
                    var unique_supply = '';  
                    subStr = subStr[1].split(" )");
                    

                    $("#hdsectionid").val(appli_section);
                    $("#hdclassid").val(appli_class);
                    $("#hdacayrid").val(aca_yr_id);
                    $("#hdacademicyr").val(subStr[0]);
                    
                    document.getElementById('hdsearch').value=1;

                    if(appli_class == ''){
                        alert("Select the class");
                        return true;
                    }

                    if(appli_section == ''){
                        alert("Select the section");
                        return true;
                    }

                    if(aca_yr_id == ''){
                        alert("Select the academic year type");
                        return true;
                    }

                    $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/get_laptop_distribution',
                        data:"&appli_class="+appli_class+"&academic_year_id="+aca_yr_id+"&appli_section="+appli_section,
                        dataType:'json',
                        success: function(resp, textStatus, xhrContent) {
                            var Classes = ["0","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII","PRE-KG","LKG","UKG"];
                            var Sec = (appli_section == '0') ? 'ALL Section' : appli_section +' Section';
                            $("#additional_title").text(': Laptop - Distribution / '+Classes[appli_class]+ ' Standard - '+Sec);

                            var jsArr=resp;
                            unique_arr = [];
                            var trHTML = '';
                            var validationFlag = 0;
                            var readele = '';
                            if(jsArr.students.length > 0){
                                $.each(jsArr.students,function (i, item) {
                                    i=i+1;
                                    datebox='<input type="date" class="form-control" ';                                
                                    
                                    if(item.scheme_id != null){
                                            checkbox='<input type="checkbox" class="custom-form-control" id="opt_'+item.id+'" name="opt_'+item.id+'" checked value="1" onchange="optionenable(this,'+item.scheme_id+')" />';
                                    }
                                    else{
                                            checkbox='<input type="checkbox" class="custom-form-control" id="opt_'+item.id+'" name="opt_'+item.id+'" value="1" onchange="optionenable(this,'+item.scheme_id+')" />';
                                    }
                                    unique_arr.push({'unique_supply' : item.unique_supply,
                                        'dist_dt':item.distribution_date});
                                    if(item.unique_supply == null || item.unique_supply == '')
                                            textbox='<input type="text" class="form-control" id="ser_'+item.id+'" name="ser_'+item.id+'" placeholder="SERIAL NUMBER"  onblur="distridateinput(this)" onchange="checkwithexist(this,'+i+')" />';
                                    else {
                                            textbox='<input type="text" class="form-control" id="ser_'+item.id+'" name="ser_'+item.id+'" value="'+item.unique_supply+'"  onblur="distridateinput(this)" onchange="checkwithexist(this,'+i+');" />';
                                    }

                                    if(item.distribution_date!=null){
                                        if (item.distribution_date !== '0000-00-00'){
                                            var DbDate = item.distribution_date;
                                            datebox+=' id="dt_'+item.id+'" name="dt_'+item.id+'" min="'+item.indent+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false" value="'+DbDate+'" onchange="checkwithexistingvalue('+item.id+','+i+')" />';       
                                        }
                                        else{
                                            datebox+=' id="dt_'+item.id+'" name="dt_'+item.id+'" min="'+item.indent+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false"  onchange="checkwithexistingvalue('+item.id+','+i+')"/>';
                                        }
                                    }
                                    else if(item.distribution_date==null){
                                        datebox+=' id="dt_'+item.id+'" name="dt_'+item.id+'" min="'+item.indent+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false"  onchange="checkwithexistingvalue('+item.id+','+i+')"/>';       
                                    }
                                    else{
                                        datebox+=' id="dt_'+item.id+'" name="dt_'+item.id+'" min="'+item.indent+'" max='+<?php echo('"'.date('Y-m-d',strtotime('now+5hours30minutes')).'"') ?>+' onkeypress="return false"  onchange="checkwithexistingvalue('+item.id+','+i+')"/>';       
                                    }

                                    hidden='<input type="text" id="updated_'+item.id+'" name="updated_'+item.id+'" value=0 class="form-control" />';

                                    trHTML += '<tr id='+i+'>' +
                                                 '<td align="right">' + i + '</td>' +            
                                                 '<td>'+item.unique_id_no+'</td>' +
                                                 '<td>'+item.name+'</td>' +
                                                //  '<td class="td_class">'+Classes[item.class_studying_id]+ ' - '+item.class_section+'</td>' +
                                                 '<td class="center td_section">'+item.class_section+'</td>' +
                                                 '<td class="center" >'+checkbox+'</td>' +
                                                 '<td class="center" >'+textbox+'</td>' +             
                                                 '<td class="center" >'+datebox+'</td>' +             
                                                 '<td style="display:none">'+hidden+'</td>'+
                                                 '</tr>';	
                                    readele = '';

                                });
                            }
                              $("#schemeIndent").empty();
                              $('.laptopDist > tbody').append(trHTML);
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
                        validation = [0,0];
                        for(var z=0;z<unique_arr.length;z++){
                            var data = unique_arr[z];
                          
                            validation[0] = data['unique_supply'] != null ? 1: 0;
                            validation[1] = data['distribution_date'] != null ? 1: 0;
                            
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
                else{
                    //document.getElementById('selectall').checked=false;
                }
               
            }

            // function optionenable(node){
            //     var opspt=node.id.split('_');
            //     if(document.getElementById('size_'+opspt[1])){
            //     var chode=document.getElementById('size_'+opspt[1]);
            //     chode.disabled=!node.checked;}
            // }
            function checkwithexistingvalue(studid,inx){
                    if(document.getElementById('opt_'+studid).checked == true){
                        // vdt = vaildate2(studid,inx);
                        validation = [0,0];
                        for(var z=0;z<unique_arr.length;z++){
                            var data = unique_arr[z];
                            if(document.getElementById('ser_'+studid)){
                                    var current_serial_no =document.getElementById('ser_'+studid);
                                    
                                    if(current_serial_no.value != null && current_serial_no.value != ''){
                                                validation[0] = current_serial_no.value != data['unique_supply'] ? 1: 0;
                                    }
                                    else{
                                        validation[0] = 0;
                                    }
                            }
                            if(document.getElementById('dt_'+studid)){
                                    var current_dist_date =document.getElementById('dt_'+studid);
                                    if(current_dist_date.value != null && current_dist_date.value != '0000-00-00'){
                                                validation[1] = current_dist_date.value != data['dist_dt'] ? 1: 0;
                                    }
                                    else{
                                        validation[1] = 0;
                                    }       
                            }   
                            vdt = validation.reduce(function(acc, val) { return acc + val; }, 0);
                        }
                        var updated = document.getElementById('updated_'+studid);
                        updated.value = vdt > 0 ? 1 : 0 ;                    
                        
                    }
            }

            
            function optionenable(node,schemeid){
                var opspt=node.id.split('_');
                var tdcheck = node.checked == true ? 1: 0
                var updated = document.getElementById('updated_'+opspt[1]);
                updated.value = schemeid == null ? tdcheck : schemeid != tdcheck ? 1 : 0;
                // if(document.getElementById('size_'+opspt[1])){
                //     var chode=document.getElementById('size_'+opspt[1]);
                //     chode.disabled=!node.checked;
                // }                
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

            function checkwithexist(data,inx){
                // console.log(data.value);
                var uniq = unique_arr[inx-1].unique_supply;
                console.log(uniq);
                if(data.value != uniq){
                $.ajax({
                        type: "POST",
                        url:baseurl+'Basic/check_with_exist_serialno',
                        data:"&rec="+data.value,
                        success: function(resp, textStatus, xhrContent) {
                           var splitted=data.id.split('_');
                           if(resp == 1 ){
                            alert('Record already exists!');
                            if(document.getElementById('ser_'+splitted[1])){
                               document.getElementById('ser_'+splitted[1]).value = "";
                            }
                           }
                        },
                        error: OnError
                       });
                }
                var id=data.id;
                var sp=id.split('_');
                var updated = document.getElementById('updated_'+sp[1]);
                updated.value = data.value!=uniq ? 1 : 0;    
            }
            
            function validate(){
                if($("#hdsearch").val()=="1"){ 
                // console.log(JSON.stringify($('#free_scheme_indent').serializeArray()));
                
                var validationFlag = 0;
                var values = {};
                var existing_serial_no = current_serial_no = '';

                $.each($('#free_scheme_indent').serializeArray(), function(i, field) {
                    if(field.value != '')
                    values[field.name] = field.value;
                });

                $.each(values, function(index,val) {
                    var splited=index.split('_');
                    if(splited[0] == 'opt'){
                        var opt_val = document.getElementById('opt_'+splited[1]).value;                                   
                        if(opt_val == 1){
                            var dt_val = document.getElementById('dt_'+splited[1]).value;           
                            // var chode = 0;
                            var ser_val = document.getElementById('ser_'+splited[1]).value ;      
                            if(dt_val == '' || ser_val == '' || ser_val == null){
                                            validationFlag++;
                            }
                        }
                        
                    }
                    
                    if(splited[0] == 'ser'){
                        current_serial_no = document.getElementById('ser_'+splited[1]).value;
                        if(current_serial_no == existing_serial_no){
                            alert('Serial Number are Duplicated !');
                            document.getElementById('ser_'+splited[1]).value = "";
                            document.getElementById('ser_'+splited[1]).focus();
                            validationFlag++;
                            return false;
                        }
                        existing_serial_no = current_serial_no;
                    }
                });

               if(validationFlag > 0)
                     alert('Both Distribution And Serial Number is Compulsory !');
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

        </script>
</body>
<!-- END BODY -->
</html>