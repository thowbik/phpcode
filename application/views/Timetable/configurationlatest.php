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
				$classid=$cd->value;
																  switch ($classid) {
																case "1":$class1='1';$standard='I';break;
																case "2":$class1='2';$standard='II';break;
																case "3":$class1='3';$standard='III';break;	
																case "4":$class1='4';$standard='IV';break;	
																case "5":$class1='5';$standard='V';break;
																case "6":$class1='6';$standard='VI';break;	
																case "7":$class1='7';$standard='VII';break;	
																case "8":$class1='8';$standard='VIII';break;
																case "9":$class1='9';$standard='IX';break;	
																case "10":$class1='10';$standard='X';break;	
																case "11":$class1='11';$standard='XI';break;	
																case "12":$class1='12';$standard='XII';break;	
																case "13":$class1='13';$standard='Pre KG';break;	
																case "14":$class1='14';$standard='UKG';break;	
																case "15":$class1='15';$standard='LKG';break;	
																	
																}
                $class .= '{id:\'' . $class1 . '\',text:\'' . $standard . '\'}';
				
            }
        }
		
    }
} catch (Exception $e) {
    echo $e;
}
$class .= ']';
?> 
<style type="text/css">
       @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);
* {
  font-family: 'Open Sans', sans-serif;
}

body {
  margin: 0;
  padding: 0;
  overflow: hidden;
  background: #111;
  background-repeat: no-repeat;
}

.signupSection {
  background: url(https://source.unsplash.com/TV2gg2kZD1o/1600x800);
  background-repeat: no-repeat;
  position: absolute;
  top: 45%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 1250px;
  height: 250px;
  text-align: center;
  display: flex;
  color: white;
  box-shadow: 3px 10px 20px 5px rgba(0, 0, 0, .5);
}

.info {
  width: 45%;
  background: rgba(20, 20, 20, .8);
  padding: 30px 0;
  border-right: 5px solid rgba(30, 30, 30, .8);
  h2 {
    padding-top: 30px;
    font-weight: 300;
  }
  p {
    font-size: 18px;
  }
  .icon {
    font-size: 8em;
    padding: 20px 0;
    color: rgba(10, 180, 180, 1);
  }
}

.signupForm {
  width: 70%;
  padding: 30px 0;
  background: rgba(20, 40, 40, .8);
  transition: .2s;
  h2 {
    font-weight: 300;
  }
}

.inputFields {
  margin: 15px 0;
  font-size: 16px;
  padding: 10px;
  width: 300px;
  border: 1px solid rgba(10, 180, 180, 1);
  border-top: none;
  border-left: none;
  border-right: none;
  background: rgba(20, 20, 20, .2);
  color: white;
  outline: none;
}

.noBullet {
  list-style-type: none;
  padding: 0;
}

#join-btn {
  border: 1px solid rgba(10, 180, 180, 1);
  background: rgba(20, 20, 20, .6);
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
  &:hover {
    background: rgba(20, 20, 20, .8);
    padding: 10px 80px;
  }
}


    </style>

 <head>
    
   
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'asset/easyui/themes/default/easyui.css' ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'asset/easyui/themes/icon.css' ?>"/>
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
<div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
								
									 <div class="page-content">
                                <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                    <div class="page-content-inner">
									 <?php $this->load->view('emis_school_profile_header1.php'); ?>
									<div class="portlet light portlet-fit ">
                                             <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Define Peroids Start and End Time</span>
                                                </div>
                                            </div> 
                                           
    <div class="box box-primary">
        <div class="row ">
            <div class="demo-info container" style="margin-bottom:10px">
                <div class="demo-tip icon-tip"></div>  
                <div class="typeDivision" align="center">
                    <form class="form-horizontal" role="form" id="configurationForm" method="post" autocomplete="off" required>
                        <table>
                           <div class="signupSection">
  <div class="info">
    <h2>Mission to Deep Space</h2>
    <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
    <p>The Future Is Here</p>
  </div>
  
    <h2>Sign Up</h2>
    <ul class="noBullet">
      <li>
        <label for="Term"></label>
        <input style="font-color:green" type="text" class="inputFields" id="confTerm" name="class" placeholder="Term"  oninput="return"  required />
      </li>
	  <li>
        <label for="username"></label>
        <input type="text" class="inputFields" id="username" name="username" placeholder="Username" value="" oninput="return userNameValidation(this.value)" required/>
      </li>
      <li>
        <label for="password"></label>
        <input type="password" class="inputFields" id="password" name="password" placeholder="Password" value="" oninput="return passwordValidation(this.value)" required/>
      </li>
      <li>
        <label for="email"></label>
        <input type="email" class="inputFields" id="email" name="email" placeholder="Email" value="" required/>
      </li>
       <button id="submit" type="button" align="right" style="margin-left: 22px;" class="btn btn-primary btn-sm" onClick="loadSubjectList();">Submit</button>
    </ul>
  
</div>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <!--<h4 id="noPeriodForSubject" style="display:none">Fill number of periods in this term for a subject</h4>
        <form class="form-horizontal" role="form" id="periodAllocForm" method="post" autocomplete="off"></form>--> 
        <h4 id="statusMsg"></h4> 
    </div>
	<center><h4 id="recordTimeForSubject" style="display:none">Start Time And End Time for Periods</h4></center> 
    <div class="box box-primary">
        
        <div id="recordTimeForSubjectForm" style="display:none" class="row"> 
            <form role="form" id="experienceForm" method="post" class="form horizontal" autocomplete="off">
                <!--<center><h4><b>Period's Time Details</b></h4></center>-->
                <div id="addPeriod">
                    <div id="periodCount" class='form-group'>
                        
                       						
                        <div class="periodDetails" align="center">
                           
                    </div>  
                </div>
				<br>
               
            </form> 
            <h4 id="statusTimeMsg"></h4> 
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
		</div>
<?php $this->load->view('footer.php'); ?>		
    </div> 
<?php $this->load->view('scripts.php'); ?>    
</body>
<script>
var inputEle = document.getElementById('timeInput');

function onTimeChange() {
  var timeSplit = inputEle.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  alert(hours + ':' + minutes + ' ' + meridian);
}
    var loginaname = '<?php echo $loginName; ?>';
    var index = $("#periodCount").length;
    var periodCount = 0;
    var regex = /^(.+?)(\d+)$/i;
    $.extend($.fn.validatebox.defaults.rules, {
        startTimeValidation: {
            validator: function (value, param) {
                if (param[0] !== null && param[0] !== "" && param[0] !== undefined) {
                    var lastTime = $(param[0]).timespinner('getValue');
                    return value >= lastTime;
                } else {
                    return true;
                }
            },
            message: 'Start time should greater than previous end time. '
        }
    });
    $.extend($.fn.validatebox.defaults.rules, {
        endTimeValidation: {
            validator: function (value, param) {
                var startTime = $(param[0]).timespinner('getValue');
                var start = startTime.split(":");
                var end = value.split(":");
                var startDate = new Date(0, 0, 0, start[0], start[1], 0);
                var endDate = new Date(0, 0, 0, end[0], end[1], 0);
                var diff = endDate.getTime() - startDate.getTime();
                var hours = Math.floor(diff / 1000 / 60 / 60);
                diff -= hours * 1000 * 60 * 60;
                var minutes = Math.floor(diff / 1000 / 60);
                if (!isNaN(minutes)) {
                    $('#' + param[1]).textbox('setValue', minutes);
                } else {
                    $('#' + param[1]).textbox('setValue', "0");
                }
                return  value > startTime;
            },
            message: 'End time should lesser than starttime. '
        }
    });
    function clonePeriod() {
        $('.cloneAClass').parents("#periodCount").clone()
                .find("input").val("").end()
                .appendTo("#addPeriod")
                .attr("id", "periodCount" + index)
                .each(function () {
                    var id = this.id || "";
                    var match = id.match(regex) || [];
                    if (match.length === 3) {
                        this.id = match[1] + (index);
                    }
                    $(this).find('label, input').each(function (i, field) {
                        var elementId = field.id;
                        if (elementId.indexOf("period") !== -1) {
                            field.id = index + elementId;
                        }
                    });
                })
                .on('click', 'button.clone', clonePeriod)
                .on('click', 'button.remove', remove);
        $("#periodCount" + index + " button.cloneAClass").remove();
        $("#periodCount" + index + " button.disabled").removeClass("disabled");
        $("#periodCount" + index).find("span").remove();
        $("#periodCount" + index).find('label, input').each(function (i, field) {
            var elementId = field.id;
            if ($('#' + elementId).hasClass("easyui-timespinner")) {
                $('#' + elementId).removeClass();
                $("#" + elementId).removeAttr("style")
                $('#' + elementId).addClass("easyui-timespinner");
                if (elementId.indexOf('Start') > -1) {
                    var period = (index - 1 === 0) ? "" : index - 1;
                    $('#' + elementId).attr('validtype', "startTimeValidation['#" + period + "periodEndTime']");
                } else if (elementId.indexOf('End') > -1) {
                    var period = (index === 0) ? "" : index;
                    $('#' + elementId).attr('validtype', "endTimeValidation['#" + period + "periodStartTime','" + period + "periodDuration']");
                }
                $(this).timespinner({
                    value: ""
                });
            } else if ($('#' + elementId).hasClass("easyui-textbox")) {
                $('#' + elementId).removeClass();
                $("#" + elementId).removeAttr("style")
                $('#' + elementId).addClass("easyui-textbox");
                $('#' + elementId).textbox({
                    value: ""
                });
            } else if ($('#' + elementId).hasClass("periodLabel")) {
                var clsNo = index + 1;
                $('#' + elementId).empty().html("<strong>Period </strong>" + clsNo)
            }
        });
        index++;
        periodCount++;
    }

    function removePeriod() {
        index--;
        if (clickeduser !== undefined && clickeduser !== "") {
            var expID = $("div #employeeExp" + " #empexpid").val();
            var expempID = clickededitUser;
            var URL = serverURL + "/delProj_empexperience";
            var parameters = "requestType=proj_empacademicView&subRequestType=delProj_empexperience&empexpid=" + expID + "&empexpempid=" + expempID;
            replyFormat = getDataFromServer("POST", URL, $.deserialize(parameters), "text");
            data = eval('(' + replyFormat + ')');
        }
    }
    function remove() {
        $(this).parents("#periodDetails").parent().remove();
    }
    function submitPeriodTimeDetails() {
		
        if (periodCount >= 0) {
            var periodList = '[{'
            for (var i = 0; i <= periodCount; i++) {
                if (i === 0) {
                    i = "";
                } else {
                    periodList += ',';
                }
                var periodNo = i + 1;
                periodList += '"period' + i + '":{ "tfepdid" : "' + $("#periodCount" + i + " #" + i + "periodId").val() + '",';
                periodList += '"tfepdperiodno" : "' + periodNo + '",'
                periodList += '"tfepdstarttime" : "' + $("#periodCount" + i + " #" + i + "periodStartTime").timespinner('getValue') + '",'
                periodList += '"tfepdendtime" : "' + $("#periodCount" + i + " #" + i + "periodEndTime").timespinner('getValue') + '",'
                periodList += '"tfepdduration" : "' + $("#periodCount" + i + " #" + i + "periodDuration").timespinner('getValue') + '"}';
            }
            periodList += "}]";
            $.ajax({
                data: {
                    schoolId: $('#schoolId').val(),
                    loginName: '<?php echo $loginName; ?>',
                    term: $('#confTerm').combobox('getValue'),
                    classNumber: $('#confClass').combobox('getValue'),
                    periodList: periodList
                },
                type: 'GET',
                url: '<?php echo base_url() ?>TimetableController/setPeriodTimeAlllocDetails',
                success: function (data) {
                    $("#statusTimeMsg").empty().html(data);
                }
            });
        }
    }
    function setSchoolId() {
        $.ajax({
            data: {
                selClass: $('#confClass').combobox('getValue'),
                loginName: '<?php echo $loginName; ?>',
            },
            type: 'GET',
            url: '<?php echo base_url() ?>TimetableController/getSchoolIdUsingUdisecodeAndClass',
            success: function (data) {
                var data = eval('(' + data + ')');
                if (data[0] !== "" && data[0] !== null && data[0] !== undefined) {
                    $("#schoolId").val(data[0].id);
                }
            }
        });
    }
    function loadSubjectList() {
        if ($("#configurationForm").form('validate')) {
            setSchoolId();
            $("#noPeriodForSubject").css('display', 'none');
            $.ajax({
                data: {
                    loginName: '<?php echo $loginName; ?>',
                    term: $('#confTerm').combobox('getValue'),
                    classNumber: $('#confClass').combobox('getValue')
                },
                type: 'GET',
                url: '<?php echo base_url() ?>TimetableController/getPeriodAlllocSubjectDetails',
                success: function (data) {
                    var result = eval('(' + data + ')');
                    $("#noPeriodForSubject").css('display', 'block');
                    var comboList = '<div class="form-body">';
                    $.each(result, function (i, val) {
                        if (i % 2 === 0) {
                            comboList += '<div class="row">';
                        }
                        comboList += '<div class="col-md-6"><div class="form-group">';
                        comboList += '<label for="' + val.subject1 + '" class="control-label col-md-5">' + val.subjects + '</label>';
                        comboList += '<div class="col-md-7">';
                        comboList += '<input id="' + val.subject1 + '" class="easyui-numberspinner" name="' + val.subjects + '" value="' + val.period + '"/>';
                        comboList += '</div>';
                        comboList += '</div></div>';
                        if (i % 2 !== 0) {
                            comboList += '</div>';
                        }
                    });
                    comboList += '</div>';
                    comboList += '';
                    comboList += '<div onclick="submitPeriodAllocDetail()" align="center"><button id="submit" type="button" align="right" class="btn btn-primary btn-sm" >Save</button></div>';
                    $("#periodAllocForm").empty().append(comboList);
                    $('#periodAllocForm').find('input').each(function (i, field) {
                        var elementId = field.id;
                        if ($('#'+ elementId).hasClass("easyui-numberspinner")) {
                            $('#'+ elementId).numberspinner();
                        }
                    });
                }
            });
            loadTimeAllocationList();
        }
    }
    function loadTimeAllocationList() {
		
        $("#recordTimeForSubjectForm").css('display', 'none');
        $("#recordTimeForSubject").css('display', 'none');
        //$("#periodStartTime").css('display', 'block');
        //$("#recordTimeForSubject").css('display', 'none');
        var $rows = $("#addPeriod").find("div.form-group");
        $.each($rows, function (i, val) {
            if (i !== 0) {
                $(this).remove();
                index--;
                periodCount--;
            } else {
                $("#periodStartTime").timespinner('clear');
                $("#periodEndTime").timespinner('clear');
                $("#periodDuration").textbox('clear');
                $("#periodId").val(-1);
            }
        });
        $.ajax({
            data: {
                loginName: '<?php echo $loginName; ?>',
                term: $('#confTerm').combobox('getValue'),
                classNumber: $('#confClass').combobox('getValue')
            },
            type: 'GET',
            url: '<?php echo base_url() ?>TimetableController/getPeriodTimeAlllocDetails',
            success: function (data) {
                var result = eval('(' + data + ')');
                $("#recordTimeForSubjectForm").css('display', 'block');
                $("#recordTimeForSubject").css('display', 'block');
                var fillIndex = "";
                $.each(result, function (i, val) {
                    if (i > 0) {
                        $(".cloneAClass").click();
                        fillIndex = i;
                    }
                    $('#' + fillIndex + 'periodId').val(val.tfepdid);
                    $('#' + fillIndex + 'periodStartTime').timespinner('setValue', val.tfepdstarttime);
                    $('#' + fillIndex + 'periodEndTime').timespinner('setValue', val.tfepdendtime);
                    $('#' + fillIndex + 'periodDuration').textbox('setValue', val.tfepdduration);
                });
            }
        });
    }
    function submitPeriodAllocDetail() {
	
        var periodAllocList = '[{'
        $('#periodAllocForm').find('input').each(function (i, field) {
            if (field.value !== "" && field.value !== null && field.value !== undefined && field.id !== "" && field.id !== null && field.id !== undefined && isNaN(field.id) === false) {
                if (i !== 0)
                    periodAllocList += ',';
                periodAllocList += '"' + field.id + '":"' + field.value + '"';
            }
        });
        periodAllocList += '}]';
        $.ajax({
            data: {
                periodAllocList: periodAllocList,
                loginName: '<?php echo $loginName; ?>',
                classNumber: $('#confClass').combobox('getValue'),
                term: $('#confTerm').combobox('getValue'),
                schoolId: $('#schoolId').val(),
            },
            type: 'GET',
            url: '<?php echo base_url() ?>TimetableController/setPeriodAllocClass',
            success: function (data) {
                $("#statusMsg").empty().html(data);
                loadSubjectList();
            }
        });
    }
    $(document).each(function () {
        $('#confTerm').combobox({
            data: [{"id": 1, "text": "Term 1"}, {"id": 2, "text": "Term 2"}, {"id": 3, "text": "Term 3"}],
            valueField: 'id',
            textField: 'text',
            width: '200px',
            editable: false,
            required: true,
            onChange: function (newValue, oldValue) {
                if (newValue !== oldValue) {
                    loadConfClassDetails('conf');
                }
            }
        });
    });
    function loadConfClassDetails(prefixId) {
        $('#' + prefixId + 'Class').combobox({
            data:<?php echo $class; ?>,
            valueField: 'id',
            textField: 'text',
            width: '150px',
            editable: false,
            required: true
        });
    }
</script>
