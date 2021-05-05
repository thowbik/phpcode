<?php

$class = '[';
$section = '[';
$count = 0;
$loginName = $schoolDetails[0]->udise_code;
try {
    if (is_array($classDetails)) {
        foreach ($classDetails as $cd) {
            if (is_object($cd)) {
                if ($count != 0) {
                    $class .= ',';
                }$count++;
                $class .= '{id:\'' . $cd->value . '\',text:\'' . $cd->value . '\'}';
            }
        }
    }
} catch (Exception $e) {
    echo $e;
}
$class .= ']';
?>
<style type="text/css">
        .left{
            width:10%;
            float:left;
            margin-left: -4%;
        }
        .left table{
            background:#E0ECFF;
        }
        .left td{
            background:#eee;
        }
        .right{
            float:right;
            width:90%;
        }
        .right table{
            background:#E0ECFF;
            width:99%;
        }
        .right td{
            background:#fafafa;
            color:#444;
            text-align:center;
            padding:2px;
        }
        .right td{
            background:#E0ECFF;
        }
        .right td.drop{
            background:#fafafa;
            width:100px;
        }
        .right td.over{
            background:#FBEC88;
        }
        .item{
            text-align:center;
            border:1px solid #4ba6d8;
            background:#fafafa;
            color:#444;
            width:120px;
            font-size: 80%;
        }
        .assigned{
            border:1px solid #499B30;
        }
        .updatingCell{
            border:1px solid #BC2A4D;
        }
        .trash{
            background-color:red;
        }
        .time{
            width:8%;      
        }
        .break{
            width:2%;
        }
        .ttWorkSpace{
            width:100%;
            margin-top: 2%;
        }
        .right > .table > tbody > tr > td {
            padding: 3px !Important;
        }
        .checkbox{
            border:none !Important
        }
    </style>

 <head>
    
   <!-- <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />-->
       <?php $this->load->view('head.php'); ?>
		 
        <!-- BEGIN PAGE LEVEL STYLES -->

       
        <!-- END PAGE LEVEL STYLES -->

        </head>
		<body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
		
<?php $userlogin=$this->session->userdata('emis_user_type_id'); 	?>            
<?php if($this->session->userdata('emis_user_type_id') == 3 ) 	
{?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>

<h3 align="center"><?php echo $schoolDetails[0]->school_name; ?> <span> <?php echo $schoolDetails[0]->udise_code; ?> </span></h3>
<input type="hidden" id="schoolId" value="<?php echo $schoolDetails[0]->id; ?>"/>
<div class="demo-info container" style="margin-bottom:10px">
    <div class="demo-tip icon-tip"></div>      
    <div>Option to declare a day as holiday across all classes</div>
    <div class="typeDivision" align="center">
        <form class="form-horizontal" role="form" id="dayHasHoliday" method="post" autocomplete="off">
            <table>
                <tr>
                    <td>Date  :</td><td> <input id="dateToClearADay" name="term" data-options="formatter:myformatter,parser:myparser"/></td>
                </tr>
                <tr> 
                    <td>Reason :</td><td>  <textarea id="holidayReason" type="text" name="Reason" ></textarea></td> 
                </tr>
                <tr>
                    <td></td><td><button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="declareSchoolHasHoliday();">Submit</button></td>
                </tr>
            </table>
        </form>        
        <h4 id="statusHolidayMsg"></h4> 
    </div> 
    <div>Option to declare a day as holiday for selected classes </div>
    <div class="typeDivision" align="center">
        <form class="form-horizontal" role="form" id="particularClassHasHoliday" method="post" autocomplete="off">
            <table>
                <tr>
                    <td>Date  :</td><td><input id="dateToClearAParticularClass" name="term" data-options="formatter:myformatter,parser:myparser"/></td>
                </tr>
                <tr> 
                    <td>Class :  </td><td><input id="holidayParticularClass" type="text" name="holidayDetails" /> </td>
                </tr>
                <tr>  
                    <td>Reason :   </td><td><textarea id="holidayReasonParticularClass" type="text" name="Reason" ></textarea> </td>
                </tr>
                <tr>
                    <td></td><td><button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="declareParticularClassHasHoliday();">Submit</button></td    
                </tr>
            </table>
        </form>
        <h4 id="statusClassMsg"></h4> 
    </div>  
    <div>Option to clear-off selected periods for the entire school / selected classes</div>
    <div class="typeDivision" align="center">
        <form class="form-horizontal" role="form" id="clearParticularPeriodInSchoolForm" method="post" autocomplete="off">
            <table>
                <tr>
                    <td>Date  :</td><td><input id="dateToPermissisonClass" name="term" data-options="formatter:myformatter,parser:myparser"/></td>
                </tr>
                <tr> 
                    <td>Period :  </td><td><input id="permissionForPeriod" type="text" name="" /> </td>
                </tr>
                <tr> 
                    <td> Class :  </td><td><input id="permissionForClass" type="text" name="" /> </td>
                </tr>
                <tr> 
                    <td>Reason :  </td><td><textarea id="permissionForReason" type="text" name="" ></textarea> </td>
                </tr>
                <tr> 
                    <td></td><td><button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="submitDayToClearParticularPeriodForSchool();">Submit</button></td    
                </tr>
            </table>
        </form>
        <h4 id="statusClearParticularPeriodInSchoolMsg"></h4> 
    </div> 
    <!--    <div>Option to mark a day as holiday with a single click for the school  </div>
        <div class="typeDivision" align="center">
            <form class="form-horizontal" role="form" id="clearSchoolForm" method="post" autocomplete="off">
                <table>
                    Date  : <input id="dateToClearSchool" name="term" data-options="formatter:myformatter,parser:myparser"/>
                    District :  <input id="clearSchoolDist" type="text" name="holidayDetails" /> 
                    School :  <input id="clearSchool" type="text" name="holidayDetails" /> 
                    Reason :  <textarea id="clearSchoolReason" type="text" name="Reason" ></textarea> 
                    <button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="submitDayToClearSchool();">Submit</button>
                </table>
            </form>
            <h4 id="statusClearSchoolMsg"></h4> 
        </div> 
        <div>Option to mark a day as holiday with a single click for the district </div>
        <div class="typeDivision" align="center">
            <form class="form-horizontal" role="form" id="clearDistrictForm" method="post" autocomplete="off">
                <table>
                    Date  : <input id="dateToClearDist" name="term" data-options="formatter:myformatter,parser:myparser"/>
                    District :  <input id="clearDistrict" type="text" name="holidayDetails" /> 
                    Reason :  <textarea id="clearDistrictReason" type="text" name="Reason" ></textarea> 
                    <button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="submitDayToClearSchoolInDistrict();">Submit</button>
                </table>
            </form>
            <h4 id="statusClearDistrictMsg"></h4> 
        </div> 
        <div>Option to mark a day as holiday with a single click for the state </div>
        <div class="typeDivision" align="center">
            <form class="form-horizontal" role="form" id="clearStateForm" method="post" autocomplete="off">
                <table>
                    Date  : <input id="dateToClearState" name="term" data-options="formatter:myformatter,parser:myparser"/>
                    State :  <input id="clearState" type="text" name="holidayDetails" /> 
                    Reason :  <textarea id="clearStateReason" type="text" name="Reason" ></textarea> 
                    <button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="submitDayToClearSchoolInState();">Submit</button>
                </table>
            </form>
            <h4 id="statusClearStateMsg"></h4> 
        </div> -->
</div> 
<?php $this->load->view('footer.php'); ?>	
</div>
<?php $this->load->view('scripts.php'); ?>    
</body>
<script>
    var loginaname = '<?php echo $loginName; ?>';
    var baseUrl = '<?php echo base_url() ?>';
    $(document).each(function () {
        $('#dateToClearADay').datebox().datebox('calendar').calendar({
            validator: function (date) {
                var d1 = new Date('<?php echo $startDate; ?> 00:00:00');
                var d2 = new Date('<?php echo $endDate; ?> 00:00:00');
                return d1 <= date && date <= d2;
            }
        });
//        $('#dateToClearDist').datebox({
//            onSelect: function (date) {
//                loadClearSchoolDist('clearDistrict', null);
//            }
//        }).datebox('calendar').calendar({
//            validator: function (date) {
//                var d1 = new Date('<?php echo $startDate; ?> 00:00:00');
//                var d2 = new Date('<?php echo $endDate; ?> 00:00:00');
//                return d1 <= date && date <= d2;
//            }
//        });
        $('#dateToPermissisonClass').datebox({
            onSelect: function (date) {
                loadPeriodDetails();
            }
        }).datebox('calendar').calendar({
            validator: function (date) {
                var d1 = new Date('<?php echo $startDate; ?> 00:00:00');
                var d2 = new Date('<?php echo $endDate; ?> 00:00:00');
                return d1 <= date && date <= d2;
            }
        });
//        $('#dateToClearSchool').datebox({
//            onSelect: function (date) {
//                loadClearSchoolDist('clearSchoolDist', 'clearSchool');
//            }
//        }).datebox('calendar').calendar({
//            validator: function (date) {
//                var d1 = new Date('<?php echo $startDate; ?> 00:00:00');
//                var d2 = new Date('<?php echo $endDate; ?> 00:00:00');
//                return d1 <= date && date <= d2;
//            }
//        });
//        $('#dateToClearState').datebox().datebox('calendar').calendar({
//            validator: function (date) {
//                var d1 = new Date('<?php echo $startDate; ?> 00:00:00');
//                var d2 = new Date('<?php echo $endDate; ?> 00:00:00');
//                return d1 <= date && date <= d2;
//            }
//        });
        $('#dateToClearAParticularClass').datebox({
            onSelect: function (date) {
                loadClassDetails('holidayParticularClass');
            }
        }).datebox('calendar').calendar({
            validator: function (date) {
                var d1 = new Date('<?php echo $startDate; ?> 00:00:00');
                var d2 = new Date('<?php echo $endDate; ?> 00:00:00');
                return d1 <= date && date <= d2;
            }
        });
    });
    function myformatter(date) {
        var y = date.getFullYear();
        var m = date.getMonth() + 1;
        var d = date.getDate();
        return y + '-' + (m < 10 ? ('0' + m) : m) + '-' + (d < 10 ? ('0' + d) : d);
    }
    function myparser(s) {
        if (!s)
            return new Date();
        var ss = (s.split('-'));
        var y = parseInt(ss[0], 10);
        var m = parseInt(ss[1], 10);
        var d = parseInt(ss[2], 10);
        if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
            return new Date(y, m - 1, d);
        } else {
            return new Date();
        }
    }
    function loadPeriodDetails() {
        $('#permissionForPeriod').combobox({
            data: [{"id": 1, "text": "Period 1"}, {"id": 2, "text": "Period 2"}, {"id": 3, "text": "Period 3"}, {"id": 4, "text": "Period 4"}, {"id": 1, "text": "Period 5"}, {"id": 6, "text": "Period 6"}, {"id": 7, "text": "Period 7"}, {"id": 8, "text": "Period 8"}],
            valueField: 'id',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true,
            multiple: true,
            onChange: function (newValue, oldValue) {
                if (newValue !== oldValue) {
                    loadClassDetails('permissionForClass');
                }
            }
        });
    }
    function loadClearSchoolDist(id, childId) {
        $('#' + id).combobox({
            url: baseUrl + 'TimetableController/getDistrict',
            method: 'get',
            valueField: 'value',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true,
            onChange: function (newValue, oldValue) {
                if (newValue !== oldValue && childId !== null) {
                    loadSchoolDetails(childId, newValue);
                }
            }
        });
    }
    function loadSchoolDetails(id, districtId) {
        $('#' + id).combobox({
            url: baseUrl + 'TimetableController/getSchoolDetailBasedOnDistrict/' + districtId,
            method: 'get',
            valueField: 'value',
            textField: 'text',
            width: '250px',
            editable: false,
            required: true,
            multiple: true
        });
    }
    function loadClassDetails(id) {
        $('#' + id).combobox({
            url: baseUrl + 'TimetableController/getClassWithSchoolId/' + loginaname,
            method: 'get',
            valueField: 'value',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true,
            multiple: true
        });
    }
    function declareParticularClassHasHoliday() {
        if ($("#particularClassHasHoliday").form('validate') && $('#holidayReasonParticularClass').val() !== "") {
            console.log($('#holidayParticularClass').combobox('getValues').toString())
            $.ajax({
                data: {
                    selDate: $('#dateToClearAParticularClass').datebox('getValue'),
                    reason: $('#holidayReasonParticularClass').val().replace(/\n/g, " "),
                    classList: $('#holidayParticularClass').combobox('getValues').toString(),
                    loginName: '<?php echo $loginName; ?>',
                },
                type: 'GET',
                url: '<?php echo base_url() ?>TimetableController/declareHolidayForSelectedClass',
                success: function (data) {
                    $("#statusClassMsg").empty().html(data);
                    $("#particularClassHasHoliday").form('clear');
                }
            });
        }
    }
    function submitDayToClearParticularPeriodForSchool() {
        if ($("#clearParticularPeriodInSchoolForm").form('validate') && $('#permissionForReason').val() !== "") {
            $.ajax({
                data: {
                    selDate: $('#dateToPermissisonClass').datebox('getValue'),
                    periodList: $('#permissionForPeriod').datebox('getValues').toString(),
                    classList: $('#permissionForClass').datebox('getValues').toString(),
                    reason: $('#permissionForReason').val().replace(/\n/g, " "),
                    loginName: '<?php echo $loginName; ?>',
                },
                type: 'GET',
                url: '<?php echo base_url() ?>TimetableController/declareDayHasHolidayForParticularPeriodInClass',
                success: function (data) {
                    $("#statusClearParticularPeriodInSchoolMsg").empty().html(data);
                    $("#permissionForReason").form('clear');
                }
            });
        }
    }
    function declareSchoolHasHoliday() {
        if ($("#dayHasHoliday").form('validate') && $('#holidayReason').val() !== "") {
            $.ajax({
                data: {
                    selDate: $('#dateToClearADay').datebox('getValue'),
                    reason: $('#holidayReason').val().replace(/\n/g, " "),
                    loginName: '<?php echo $loginName; ?>',
                },
                type: 'GET',
                url: '<?php echo base_url() ?>TimetableController/declareDayHasHoliday',
                success: function (data) {
                    $("#statusHolidayMsg").empty().html(data);
                    $("#dayHasHoliday").form('clear');
                }
            });
        }
    }
    function  submitDayToClearSchool() {
        if ($("#clearSchoolForm").form('validate') && $('#clearSchoolReason').val() !== "") {
            $.ajax({
                data: {
                    selDate: $('#dateToClearSchool').datebox('getValue'),
                    reason: $('#clearSchoolReason').val().replace(/\n/g, " "),
                    schoolId: $('#clearSchool').combobox('getValues').toString(),
                    loginName: '<?php echo $loginName; ?>',
                },
                type: 'GET',
                url: '<?php echo base_url() ?>TimetableController/declareHolidayOnSchoolLevel',
                success: function (data) {
                    $("#statusClearSchoolMsg").empty().html(data);
                    $("#clearSchoolForm").form('clear');
                }
            });
        }
    }
    function submitDayToClearSchoolInDistrict() {
        if ($("#clearDistrictForm").form('validate') && $('#clearDistrictReason').val() !== "") {
            $.ajax({
                data: {
                    selDate: $('#dateToClearDist').datebox('getValue'),
                    reason: $('#clearDistrictReason').val().replace(/\n/g, " "),
                    districtId: $('#clearDistrict').combobox('getValue').toString(),
                    loginName: '<?php echo $loginName; ?>',
                },
                type: 'GET',
                url: '<?php echo base_url() ?>TimetableController/declareHolidayForSchoolInDistrict',
                success: function (data) {
                    $("#statusClearDistrictMsg").empty().html(data);
                    $("#clearDistrictForm").form('clear');
                }
            });
        }
    }
    function submitDayToClearSchoolInState() {
        if ($("#clearStateForm").form('validate') && $('#clearStateReason').val() !== "") {
            $.ajax({
                data: {
                    selDate: $('#dateToClearState').datebox('getValue'),
                    reason: $('#clearStateReason').val().replace(/\n/g, " "),
                    loginName: '<?php echo $loginName; ?>',
                },
                type: 'GET',
                url: '<?php echo base_url() ?>TimetableController/declareHolidayForSchoolInState',
                success: function (data) {
                    $("#statusClearStateMsg").empty().html(data);
                    $("#clearStateForm").form('clear');
                }
            });
        }
    }
</script>