<?php

$teacherList = '[';
$section = '[';
$count = 0;
$loginName = $schoolDetails[0]->udise_code;
try {
//    print_r($schoolDetails);
//    var_dump($schoolDetails[0]->udise_code);
////    echo tttdp_build_query($schoolDetails, '', ', ');
//     
    if (is_array($teacherDetails)) {
        foreach ($teacherDetails as $cd) {
            if (is_object($cd)) {
                if ($count != 0) {
                    $teacherList .= ',';
                }$count++;
//                print_r($cd);
                $teacherList .= '{id:\'' . $cd->value . '\',text:\'' . $cd->text . '\'}';
            }
        }
    }
} catch (Exception $e) {
    echo $e;
}
$teacherList .= ']';
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
<!--<button onclick="location.href = '<?php echo base_url(); ?>TableView'">Show</button>-->
<h2 align="center"><?php echo $schoolDetails[0]->school_name; ?> <span> <?php echo $schoolDetails[0]->udise_code; ?> </span></h2>
<input type="hidden" id="schoolId" value="<?php echo $schoolDetails[0]->id; ?>"/>
<div class="demo-info container" style="margin-bottom:10px">
    <div class="demo-tip icon-tip"></div>      
    <div>Actual versus completed periods for the term as on date</div>
    <div class="typeDivision" align="center">
        <h5>By Subject</h5>
        <form class="form-horizontal" role="form" id="teacherTimetableForm" method="post" autocomplete="off">
            <table>
                Term  : <input id="reportTermUsingSubject"  type="text" name="term"/>
                <!--Week :  <input id="reportWeek" type="text" name="class" />--> 
                Subject :  <input id="reportSubjUsingSubject" type="text" name="subject" /> 
                <button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="getActualvsScheduleSubjectDetails();">Refresh</button>
            </table>
        </form>
    </div>
    <div class="container" id="reportTimetable">
        <div class="box box-body">
            <div class="ttWorkSpace row" > 
                <div id="selTimetableView" class="page-header" style="text-align:center;margin:0px 020px;"></div>  
                <div class="right col-md-12" style="width:100%">
                    <table class="table table-bordered">
                        <thead>
                            <tr > 
                                <td class="title">Teacher</td>
                                <td class="title">Class</td>
                                <td class="title">Section</td>
                                <td class="title">Scheduled periods till date</td>
                                <td class="title">Actual periods completed</td>
                                <td class="title">Difference</td>
                            </tr>
                        </thead>
                        <tbody id = "actualAndCompleteSubjectTable">
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div>
    </div>

    <div class="typeDivision" align="center">
        <h5>By Teacher</h5>
        <form class="form-horizontal" role="form" id="teacherTimetableForm" method="post" autocomplete="off">
            <table>
                Term  : <input id="reportTermBYteacher"  type="text" name="term"/>
                <!--Week :  <input id="reportWeek" type="text" name="class" />--> 
                Teacher :  <input id="reportTeacByteacher" type="text" name="subject" /> 
                <button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="getActualvsScheduleTeacherDetails();">Refresh</button>
            </table>
        </form>
    </div>
    <div class="container" id="reportTimetable">
        <div class="box box-body">
            <div class="ttWorkSpace row" > 
                <div id="selTimetableView" class="page-header" style="text-align:center;margin:0px 020px;"></div>  
                <div class="right col-md-12" style="width:100%">
                    <table class="table table-bordered">
                        <thead>
                            <tr > 
                                <td class="title">Subject</td>
                                <td class="title">Class</td>
                                <td class="title">Section</td>
                                <td class="title">Scheduled hours till date</td>
                                <td class="title">Actual periods completed</td>
                                <td class="title">Difference</td>
                            </tr>
                        </thead>
                        <tbody id = "actualAndCompleteTeacherTable">
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div>
    </div>

    <div class="typeDivision" align="center">
        <h5>By Class</h5>
        <form class="form-horizontal" role="form" id="teacherTimetableForm" method="post" autocomplete="off">
            <table>
                Term  : <input id="reportTermByclass"  type="text" name="term"/>
                <!--Week :  <input id="reportWeek" type="text" name="class" />--> 
                <!--Subject :  <input id="reportTeacByteacher" type="text" name="subject" />--> 
                <button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="getActualvsScheduleClassDetails();">Refresh</button>
            </table>
        </form>
    </div>
    <div class="container" id="reportTimetable">
        <div class="box box-body">
            <div class="ttWorkSpace row" > 
                <div id="selTimetableView" class="page-header" style="text-align:center;margin:0px 020px;"></div>  
                <div class="right col-md-12" style="width:100%">
                    <table class="table table-bordered">
                        <thead>
                            <tr > 
                                <td class="title">Subject</td>
                                <td class="title">Teacher</td> 
                                <td class="title">Class & Section</td> 
                                <td class="title">Scheduled hours till date</td>
                                <td class="title">Actual periods completed</td>
                                <td class="title">Difference</td>
                            </tr>
                        </thead>
                        <tbody id = "actualAndCompleteClassTable">
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div>
    </div>

    <div>Teacher-wise Period allotment for a week</div>
    <div class="typeDivision" align="center">
        <h5>By Teacher</h5>
        <form class="form-horizontal" role="form" id="teacherTimetableForm" method="post" autocomplete="off">
            <table>
                Term  : <input id="reportTermPeriodteacher"  type="text" name="term"/>
                <!--Week :  <input id="reportWeek" type="text" name="class" />--> 
                Teacher :  <input id="reportTeacherPeriodteacher" type="text" name="subject" /> 
                <button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="getActualvsSchedulePeriodAlloc();">Refresh</button>
            </table>
        </form>
    </div>
    <div class="container" id="reportTimetable">
        <div class="box box-body">
            <div class="ttWorkSpace row" > 
                <div id="selTimetableView" class="page-header" style="text-align:center;margin:0px 020px;"></div>  
                <div class="right col-md-12" style="width:100%">
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <td class="title">Subject</td> 
                                <td class="title">Class</td> 
                                <td class="title">Section</td> 
                                <td class="title">Count</td> 
                            </tr>
                        </thead>
                        <tbody id="periodAllocTeacherViewTable">
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div>
    </div>

    <div class="typeDivision" align="center">
        <h5>By School</h5>
        <form class="form-horizontal" role="form" id="teacherTimetableForm" method="post" autocomplete="off">
            <table>
                Term  : <input id="reportTermPeriod"  type="text" name="term"/>
                <!--Week :  <input id="reportWeek" type="text" name="class" />--> 
                <!--Subject :  <input id="reportTeacherPeriodteacher" type="text" name="subject" />--> 
                <button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="getPeriodAllocDetails();">Refresh</button>
            </table>
        </form>
    </div>
    <div class="container" id="reportTimetable">
        <div class="box box-body">
            <div class="ttWorkSpace row" > 
                <div id="selTimetableView" class="page-header" style="text-align:center;margin:0px 020px;"></div>  
                <div class="right col-md-12" style="width:100%">
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <td class="title">Teacher</td> 
                                <td class="title">Subject</td> 
                                <td class="title">Class</td> 
                                <td class="title">Section</td> 
                                <td class="title">Count</td> 
                            </tr>
                        </thead>
                        <tbody id = "periodAllocViewTable">
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div>
    </div>

    <div>Teacher based reports at the block / district / state level</div>
    <div class="typeDivision" align="center">
        <h5>Behind schedule</h5>
        <form class="form-horizontal" role="form" id="teacherTimetableForm" method="post" autocomplete="off">
            <table>
                Term  : <input id="reportTermdistStateBlock"  type="text" name="term"/>
                <!--Week :  <input id="reportWeek" type="text" name="class" />--> 
<!--                Subject :  <input id="reportTeacherPeriodteacher" type="text" name="subject" /> -->
                <button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="getreportForBlockDistrictState()">Refresh</button>
            </table>
        </form>
    </div>
    <div class="container" id="reportTimetable">
        <div class="box box-body">
            <div class="ttWorkSpace row" > 
                <div id="selTimetableView" class="page-header" style="text-align:center;margin:0px 020px;"></div>  
                <div class="right col-md-12" style="width:100%">
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <td class="title">Block</td> 
                                <td class="title">School</td> 
                                <td class="title">Teacher</td> 
                                <td class="title">Designation</td> 
                                <td class="title">Scheduled hours till date</td>
                                <td class="title">Actual periods completed</td>
                                <td class="title">Difference</td>
                            </tr>
                        </thead>
                        <tbody id="reportForBlockDistrictState"> 
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div>
    </div>

    <div>  Report to show teachers who are underutilized with option to get input periods from the user </div> 
    <div class="typeDivision" align="center">
        <h5><input id="underutilized" type="hidden" value="28"/></h5>
        <form class="form-horizontal" role="form" id="teacherTimetableForm" method="post" autocomplete="off">
            <table>
                Term  : <input id="reportTermunderutilized"  type="text" name="term"/>
                Type :  <input id="reportOverOrUnderUtilized" type="text" name="class" />  
                <button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="getunderUtilizedteacher();">Refresh</button>
            </table>
        </form>
    </div>
    <div class="container" id="reportTimetable">
        <div class="box box-body">
            <div class="ttWorkSpace row" > 
                <div id="selTimetableView" class="page-header" style="text-align:center;margin:0px 020px;"></div>  
                <div class="right col-md-12" style="width:100%">
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <td class="title">Block</td> 
                                <td class="title">School</td> 
                                <td class="title">Teacher</td> 
                                <td class="title">Designation</td> 
                                <td class="title">Period per week</td>
                            </tr>
                        </thead>
                        <?php ?>
                        <tbody id="reportUnderUtillizedTable">
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div>
    </div>
    <h4 id="statusMsg"></h4> 
</div>
<?php $this->load->view('footer.php'); ?>
</div>
   <?php $this->load->view('scripts.php'); ?>   
<script>
    var loginaname = '<?php echo $loginName; ?>';
    var baseUrl = '<?php echo base_url() ?>';
    var weekJson = [{"id": 1, "text": "Week 1"}, {"id": 2, "text": "Week 2"}, {"id": 3, "text": "Week 3"}, {"id": 4, "text": "Week 4"}, {"id": 5, "text": "Week 5"},
        {"id": 6, "text": "Week 6"}, {"id": 7, "text": "Week 7"}, {"id": 8, "text": "Week 8"}, {"id": 9, "text": "Week 9"}, {"id": 10, "text": "Week 10"},
        {"id": 11, "text": "Week 11"}, {"id": 12, "text": "Week 12"}, {"id": 13, "text": "Week 13"}, {"id": 14, "text": "Week 14"}, {"id": 15, "text": "Week 15"},
        {"id": 16, "text": "Week 16"}, {"id": 17, "text": "Week 17"}, {"id": 18, "text": "Week 18"}, {"id": 19, "text": "Week 19"}, {"id": 20, "text": "Week 20"},
        {"id": 21, "text": "Week 21"}, {"id": 22, "text": "Week 22"}, {"id": 23, "text": "Week 23"}, {"id": 24, "text": "Week 24"}, {"id": 25, "text": "Week 25"},
        {"id": 26, "text": "Week 26"}, {"id": 27, "text": "Week 27"}, {"id": 28, "text": "Week 28"}, {"id": 29, "text": "Week 29"}, {"id": 30, "text": "Week 30"},
        {"id": 31, "text": "Week 31"}, {"id": 32, "text": "Week 32"}, {"id": 33, "text": "Week 33"}, {"id": 34, "text": "Week 34"}, {"id": 35, "text": "Week 35"},
        {"id": 36, "text": "Week 36"}, {"id": 37, "text": "Week 37"}, {"id": 38, "text": "Week 38"}, {"id": 39, "text": "Week 39"}, {"id": 40, "text": "Week 40"},
        {"id": 41, "text": "Week 41"}, {"id": 42, "text": "Week 42"}, {"id": 43, "text": "Week 43"}, {"id": 44, "text": "Week 44"}, {"id": 45, "text": "Week 45"},
        {"id": 46, "text": "Week 46"}, {"id": 47, "text": "Week 47"}, {"id": 48, "text": "Week 48"}, {"id": 49, "text": "Week 49"}, {"id": 50, "text": "Week 50"},
        {"id": 51, "text": "Week 41"}, {"id": 52, "text": "Week 52"}];
    $(document).each(function () {
        $('#reportTermUsingSubject').combobox({
            data: [{"id": 1, "text": "Term 1"}, {"id": 2, "text": "Term 2"}, {"id": 3, "text": "Term 3"}],
            valueField: 'id',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true,
            onChange: function (newValue, oldValue) {
                if (newValue !== oldValue) {
                    loadAllSubjectDetails('reportSubjUsingSubject');
                }
            }
        });
        $('#reportTermBYteacher').combobox({
            data: [{"id": 1, "text": "Term 1"}, {"id": 2, "text": "Term 2"}, {"id": 3, "text": "Term 3"}],
            valueField: 'id',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true,
            onChange: function (newValue, oldValue) {
                if (newValue !== oldValue) {
                    loadAllTeacherDetails('reportTeacByteacher');
                }
            }
        });
        $('#reportTermPeriodteacher').combobox({
            data: [{"id": 1, "text": "Term 1"}, {"id": 2, "text": "Term 2"}, {"id": 3, "text": "Term 3"}],
            valueField: 'id',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true,
            onChange: function (newValue, oldValue) {
                if (newValue !== oldValue) {
                    loadAllTeacherDetails('reportTeacherPeriodteacher');
                }
            }
        });
        $('#reportTermPeriod').combobox({
            data: [{"id": 1, "text": "Term 1"}, {"id": 2, "text": "Term 2"}, {"id": 3, "text": "Term 3"}],
            valueField: 'id',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true,
            onChange: function (newValue, oldValue) {
                if (newValue !== oldValue) {
                    //loadAllTeacherDetails('reportTeacherPeriodteacher');
                }
            }
        });
        $('#reportTermdistStateBlock').combobox({
            data: [{"id": 1, "text": "Term 1"}, {"id": 2, "text": "Term 2"}, {"id": 3, "text": "Term 3"}],
            valueField: 'id',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true,
            onChange: function (newValue, oldValue) {
                if (newValue !== oldValue) {
                    //loadAllTeacherDetails('reportTeacherPeriodteacher');
                }
            }
        });
        $('#reportTermByclass').combobox({
            data: [{"id": 1, "text": "Term 1"}, {"id": 2, "text": "Term 2"}, {"id": 3, "text": "Term 3"}],
            valueField: 'id',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true,
            onChange: function (newValue, oldValue) {
                if (newValue !== oldValue) {
                    //loadAllTeacherDetails('reportTeacherPeriodteacher');
                }
            }
        });
        $('#reportTermunderutilized').combobox({
            data: [{"id": 1, "text": "Term 1"}, {"id": 2, "text": "Term 2"}, {"id": 3, "text": "Term 3"}],
            valueField: 'id',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true,
            onChange: function (newValue, oldValue) {
                if (newValue !== oldValue) {
                    loadTypeDetails('reportOverOrUnderUtilized');
                }
            }
        });//
    });
    function loadTypeDetails(id) {
        $('#' + id).combobox({
            data: [{"id": 1, "text": "Over Utilized"}, {"id": 2, "text": "Under Utilized"}],
            valueField: 'id',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true,
            onChange: function (newValue, oldValue) {

            }
        });//
    }
    function loadAllSubjectDetails(id) {
        $('#' + id).combobox({
            url: baseUrl + 'TimetableController/getAllSubjectDetails/' + loginaname,
            method: 'get',
            valueField: 'value',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true
        });
    }
    function loadAllTeacherDetails(id) {
        $('#' + id).combobox({
            url: baseUrl + 'TimetableController/getAllTeacherDetails/' + loginaname,
            method: 'get',
            valueField: 'value',
            textField: 'text',
            width: '250px',
            editable: false,
            required: true
        });
    }

    function getActualvsScheduleSubjectDetails() {
        $("#actualAndCompleteSubjectTable").empty();
        $.ajax({
            data: {
                loginName: '<?php echo $loginName; ?>',
                term: $('#reportTermUsingSubject').combobox('getValue'),
                subjectId: $('#reportSubjUsingSubject').combobox('getValue')
            },
            type: 'GET',
            url: baseUrl + 'TimetableController/getActualvsScheduleSubjectDetails',
            success: function (data) {
                var result = eval('(' + data + ')');
                $.each(result, function (i, val) {
                    $("#actualAndCompleteSubjectTable").append('<tr><td class="time">' + val.name + '</td><td class="drop">' + val.dep + '</td><td class="drop">' + val.section + '</td><td class="drop">' + val.scheuledcount + '</td><td class="drop">' + val.actualcount + '</td><td class="drop">' + val.diff + '</td></tr>')
                });
            }
        });
    }
    function getActualvsScheduleTeacherDetails() {
        $("#actualAndCompleteTeacherTable").empty();
        $.ajax({
            data: {
                loginName: '<?php echo $loginName; ?>',
                term: $('#reportTermBYteacher').combobox('getValue'),
                teacId: $('#reportTeacByteacher').combobox('getValue')
            },
            type: 'GET',
            url: baseUrl + 'TimetableController/getActualvsScheduleTeacherDetails',
            success: function (data) {
                var result = eval('(' + data + ')');
                $.each(result, function (i, val) {
                    $("#actualAndCompleteTeacherTable").append('<tr><td class="time">' + val.subjects + '</td><td class="drop">' + val.dep + '</td><td class="drop">' + val.section + '</td><td class="drop">' + val.scheuledcount + '</td><td class="drop">' + val.actualcount + '</td><td class="drop">' + val.diff + '</td></tr>')
                });
            }
        });
    }
    function getActualvsSchedulePeriodAlloc() {
        $("#periodAllocTeacherViewTable").empty();
        var totalClass = 0;
        $.ajax({
            data: {
                loginName: '<?php echo $loginName; ?>',
                term: $('#reportTermPeriodteacher').combobox('getValue'),
                teacId: $('#reportTeacherPeriodteacher').combobox('getValue')
            },
            type: 'GET',
            url: baseUrl + 'TimetableController/getPeriodAllocBasedOnTeacherDetails',
            success: function (data) {
                var result = eval('(' + data + ')');
                $.each(result, function (i, val) {
                    if (val.tpdhourcount !== null && val.tpdhourcount !== "" && val.tpdhourcount !== undefined) {
                        totalClass += parseInt(val.tpdhourcount);
                    }
                    $("#periodAllocTeacherViewTable").append('<tr><td class="time">' + val.subjects + '</td><td class="drop">' + val.tpdclass + '</td><td class="drop">' + val.tpdclasssection + '</td><td class="drop">' + val.tpdhourcount + '</td></tr>')
                });
                if (totalClass !== null && totalClass !== "" && totalClass !== undefined && totalClass !== 0) {
                    $("#periodAllocTeacherViewTable").append('<tr><td></td><td></td><td></td><td>' + totalClass + '</td></tr>');
                }
            }
        });
    }
    function getPeriodAllocDetails() {
        $("#periodAllocViewTable").empty();
        var totalClass = 0;
        $.ajax({
            data: {
                loginName: '<?php echo $loginName; ?>',
                term: $('#reportTermPeriod').combobox('getValue')
            },
            type: 'GET',
            url: baseUrl + 'TimetableController/getPeriodAllocBasedOnSchoolDetails',
            success: function (data) {
                var result = eval('(' + data + ')');
                $.each(result, function (i, val) {
                    $("#periodAllocViewTable").append('<tr><td class="time">' + val.teacher_name + '</td><td class="time">' + val.subjects + '</td><td class="drop">' + val.tpdclass + '</td><td class="drop">' + val.tpdclasssection + '</td><td class="drop">' + val.tpdhourcount + '</td></tr>')
                });
            }
        });
    }
    function getreportForBlockDistrictState() {
        $.ajax({
            type: 'GET',
            url: baseUrl + 'TimetableController/getreportForBlockDistrictState/' + $('#reportTermdistStateBlock').combobox('getValue'),
            success: function (data) {
                console.log(data)
                var result = eval('(' + data + ')');
                $.each(result, function (i, val) {
                    $("#reportForBlockDistrictState").append('<tr><td class="time">' + val.blockname + '</td><td class="time">' + val.schoolname + '</td><td class="time">' + val.teachername + '</td><td class="time">' + val.designation + '</td><td class="drop">' + val.scheuledcount + '</td><td class="drop">' + val.actualcount + '</td><td class="drop">' + val.diff + '</td></tr>')
                });
            }
        });
    }
    function getActualvsScheduleClassDetails() {
        $.ajax({
            type: 'GET',
            url: baseUrl + 'TimetableController/getreportForActualScheduleClass/' + $('#reportTermByclass').combobox('getValue') + '/' + <?php echo $loginName; ?>,
            success: function (data) {
                console.log(data)
                var result = eval('(' + data + ')');
                $.each(result, function (i, val) {
                    $("#actualAndCompleteClassTable").append('<tr><td class="time">' + val.teacherName + '</td><td class="time">' + val.subject + '</td><td class="drop">' + val.Class + '</td><td class="drop">' + val.scheuledcount + '</td><td class="drop">' + val.actualcount + '</td><td class="drop">' + val.diff + '</td></tr>')
                });
            }
        });
    }
    function getunderUtilizedteacher() {
        $.ajax({
            type: 'GET',
            url: baseUrl + 'TimetableController/getreportForoverunderutilized/' + $('#reportTermunderutilized').combobox('getValue') + '/' + <?php echo $loginName; ?>,
            success: function (data) {
                console.log(data)
                var result = eval('(' + data + ')');
                var condition = $('#reportOverOrUnderUtilized').combobox('getValue');
                var count = $('#underutilized').val();
                console.log(count + " -- " + condition)
                if (condition === 1 || condition === "1") {
                    $("#reportUnderUtillizedTable").empty();
                    $.each(result, function (i, val) {
                        if (Number(val.period) > Number(count)) {
                            $("#reportUnderUtillizedTable").append('<tr><td class="drop">' + val.blockname + '</td><td class="drop">' + val.schoolname + '</td><td class="drop">' + val.teachername + '</td><td class="drop">' + val.desig + '</td><td class="drop">' + val.period + '</td> </tr>')
                        }
                    });
                } else if (condition === "2" || condition === 2) {
                    $.each(result, function (i, val) {
                        if (Number(val.period) < Number(count)) {
                            $("#reportUnderUtillizedTable").append('<tr><td class="drop">' + val.blockname + '</td><td class="drop">' + val.schoolname + '</td><td class="drop">' + val.teachername + '</td><td class="drop">' + val.desig + '</td><td class="drop">' + val.period + '</td> </tr>')
                        }
                    });
                }
            }
        });
    }

</script>