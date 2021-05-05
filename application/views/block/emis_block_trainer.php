<!DOCTYPE html>

<html lang="en">


    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        



        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('block/header.php'); ?>


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
                                        <h1>Select School
                                            
                                        </h1>
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
                                       
                                    <div class="portlet-body">
                                     
                                
                                     <div class="row">
                                     <div class="col-md-12">
                                        <!--  <div class="col-md-4 thumbnail" style="margin-left: 10px; width: 20%"><center>
                                                    <form method="post" action="<?php echo base_url().'District/emis_district_findschoolbyid';?>">
                                                    <div class="form-group">
                                                    <label class="control-label">Enter School Id *</label>
                                                        <input type="text" class="form-control" id="emis_school_id" name="emis_school_id" placeholder="School id *" style="width: 60%" required="">
                                                        <font style="color:#dd4b39;"><div id="emis_school_id_alert"><?php if(isset($error1)){ ?> <?php echo $error1;?> <?php } ?></div></font>
                                                         <br/>
                                                          <button type="submit" class="btn green" id="emis_stu_searchsep_sub">Search</button> 
                                                    </div>
                                                    </form></center>
                                                </div> 

                                         <div class="col-md-6 thumbnail" style="margin-left: 10px; width: 40%; height: 170px;"><center>
                                                    <form method="post" action="<?php echo base_url().'Block/emis_block_findschoolbyudise';?>">
                                                    <div class="form-group">
                                                    <label class="control-label">Enter School Udise Code *</label>
                                                        <input type="text" class="form-control" id="emis_school_udise" name="emis_school_udise" placeholder="Udise code *" style="width: 60%" required="">
                                                         <font style="color:#dd4b39;"><div id="emis_school_udise_alert"><?php if(isset($error2)){ ?> <?php echo $error2;?> <?php } ?></div></font>
                                                         
                                                          <button type="submit" class="btn green" id="emis_stu_searchsep_sub" style="margin-top: 15px;">Search</button> 

                                                    </div>
                                                    </form></center>
                                                </div>---->
                                        <div class="col-md-12 thumbnail" style="margin-left: 10px;">
                                        <center>
                                                   <form method="post" action="" onsubmit="event.preventDefault();">
                                                    <div class="form-group">
                                                    
                                                         <div class="col-md-3">
                                                            <label class="control-label">Select School *</label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_block_schoolsid" name="emis_block_schoolsid" style="width: 90%" required="">
                                                                <option value="" >Select School *</option>
                                                                 <?php foreach($schools as $b) {   ?>
                                                                <option value="<?php echo $b->school_id;  ?>" ><?php echo $b->school_name.' - '.$b->udise_code; ?></option>
                                                                 <?php   }  ?>
                                                            </select> 
                                                            <font style="color:#dd4b39;"><div id="emis_block_schoolsid_alert"><?php if(isset($error3)){ ?> <?php echo $error3;?> <?php } ?></div></font>
                                                         </div>
                                                         <div class="col-md-3">
                                                            <label class="control-label">Select Class *</label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_block_schoolsclassid" name="emis_block_schoolsclassid" style="width: 90%" required="">
                                                               <option value="" >Select Class *</option>
                                                            </select> 
                                                         </div>
                                                         <div class="col-md-3">
                                                            <label class="control-label">Select Class *</label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_block_schoolsclasssectionid" name="emis_block_schoolsclasssectionid" style="width: 90%" required="">
                                                                <option value="" >Select Section </option>
                                                            </select>
                                                         </div> 
                                                           
                                                         <div class="col-md-3">
                                                            <button type="submit" class="btn green" id="emis_stu_searchsep_sub" style="margin-top: 10px;" >Search</button>
                                                         </div>
                                                    </div>
                                                    </form></center>
                                        </div>
                                       
                                        </div>
                                       
                                     </div>
                                     <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-globe"></i> Student Class wise - Training Update
                                            </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="training_update">
                                            <thead>
                                                <tr>
                                                    <th> sno </th>                        
                                                    <th> Unique id</th>
                                                    <th> Name </th>  
                                                    <th> Class</th>
                                                    <th> Section </th>         
                                                    <th colspan="2"> Reading </th>                                                         
                                                    <th colspan="2"> Writing</th>
                                                    <th colspan="2"> Maths </th>
                                                    <th> Option </th>
                                                </tr>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th>Tamil</th>                                                         
                                                    <th>English</th>
                                                    <th>Tamil</th>
                                                    <th>English</th>
                                                    <th>Apptitude</th>
                                                    <th>Functional</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody id="block_training_update"></tbody>                                                
                                        </table>
                                    </div>
                                </div>
                                     <label style="margin-left: 3%; margin-top: 25px;">Note: If u select any school then only you can create a student</label> 

                                   </div>
                                   
                                   
                                   
                                   
                                   </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                        <!-- BEGIN QUICK SIDEBAR -->

                        <!-- END QUICK SIDEBAR -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>

                  <?php $this->load->view('footer.php'); ?>
        </div>

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
        <!-- END PAGE LEVEL SCRIPTS -->
        
        <!----Custom Script------------>
        <script>
            $(document).ready(function(){ 
                $("#emis_block_schoolsid").change(function(){ 
                    var emis_block_schoolsid = $("#emis_block_schoolsid").val();
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Block/getClassesbySchoolHTML',
                        data:"&emis_block_schoolsid="+emis_block_schoolsid,
                        success: function(resp){
                            //alert(resp);  
                            $("#emis_block_schoolsclassid").html(resp);  
                            return true;              
                        },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            return false;  
                        }
                    });
                });  
            }); 
            $(document).ready(function(){ 
                $("#emis_block_schoolsclassid").change(function(){ 
                    var emis_block_schoolsid = $("#emis_block_schoolsid").val();
                    var emis_block_schoolsclassid = $("#emis_block_schoolsclassid").val();
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Block/getAllSectionByClassHTML',
                        data:"&emis_block_schoolsid="+emis_block_schoolsid+"&emis_block_schoolsclassid="+emis_block_schoolsclassid,
                        success: function(resp){
                            //alert(resp);  
                            $("#emis_block_schoolsclasssectionid").html(resp);  
                            return true;              
                        },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            return false;  
                        }
                    });
                });  
            }); 
            $(document).ready(function(){ 
                $("#emis_stu_searchsep_sub").click(function(){ 
                    var emis_block_schoolsid = $("#emis_block_schoolsid").val();
                    var emis_block_schoolsclassid = $("#emis_block_schoolsclassid").val();
                    var emis_block_schoolsclasssectionid=$("#emis_block_schoolsclasssectionid").val();
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Block/getAllStudentsByClassAndSection',
                        data:"&emis_block_schoolsid="+emis_block_schoolsid+"&emis_block_schoolsclassid="+emis_block_schoolsclassid+"&emis_block_schoolsclasssectionid="+emis_block_schoolsclasssectionid,
                        success: function(resp){
                            //alert(resp);  
                            $("#block_training_update").empty(); 
                            $("#block_training_update").html(resp);  
                            $('#training_update').DataTable();
                            return true;              
                        },
                        error: function(e){ 
                            alert('Error: ' + e.responseText);
                            return false;  
                        }
                    });
                });  
            }); 
            
            function rowUpdate(id,sno){
                var stuId=id.split('_');
                //alert(stuId[1]);
                var needIndex=['reading_tamil','reading_english','writing_tamil','writing_english','apptitude','functional'];
                var input;
                for(ind in needIndex){
                    input=document.getElementById(needIndex[ind]+"_"+stuId[1]);
                    var patt=new RegExp("^"+input.getAttribute("pattern")+"$");
                    if(!patt.test(input.value.toUpperCase())){
                        input.focus();
                        ind<4?alert("ONLY A|B|C|D IS ACCEPTED"):alert("ONLY A|B|C IS ACCEPTED");
                        return false;
                    }
                }
                
                var reading_tamil= $("#reading_tamil_"+stuId[1]).val().toUpperCase();
                var reading_english= $("#reading_english_"+stuId[1]).val().toUpperCase();
                var writing_tamil= $("#writing_tamil_"+stuId[1]).val().toUpperCase();
                var writing_english= $("#writing_english_"+stuId[1]).val().toUpperCase();
                var apptitude= $("#apptitude_"+stuId[1]).val().toUpperCase();
                var functional= $("#functional_"+stuId[1]).val().toUpperCase();
                
                var specURL = baseurl+'Block/updateTrainingRecord/'+stuId[1];
                
                
                var postParameters = "&reading_tamil="+reading_tamil;
                postParameters += "&reading_english="+reading_english;
                postParameters += "&writing_tamil="+writing_tamil;
                postParameters += "&writing_english="+writing_english;
                postParameters += "&apptitude="+apptitude;
                postParameters += "&functional="+functional;
                postParameters += "&sno="+sno;
                //alert(stuId[1] + " ===== " + specURL);
                $.ajax({
                    type: "POST",
                    url:baseurl+'Block/updateTrainingRecord/'+stuId[1],
                    data:postParameters,
                    success: function(resp){
                        //alert(resp);  
                        $("#"+stuId[1]).html(resp);  
                        return true;              
                    },
                    error: function(e){ 
                        alert('Error: ' + e.responseText);
                        return false;  
                    }
                });
            }
            
            function rowEdit(id){
                var stuId=id.split('_');
                var node=document.getElementById(stuId[1]);
                var needIndex=['reading_tamil','reading_english','writing_tamil','writing_english','apptitude','functional'];
                var chInnerText='';
                var selectNode='';
                var index=0;
                var idandName='';
                var sno=node.children[0].innerHTML;
                for(var i=5; i< (node.children.length-1);i++,index++){
                    chInnerText=node.children[i].innerHTML;
                    idandName = needIndex[index]+'_'+stuId[1];
                    if(i!=10 && i!=11){
                        selectNode='<input type="text" id="'+idandName+'" name="'+idandName+'" value="'+chInnerText+'" required="required" style="width:90%;" pattern="[A-D]{1}"/>';
                    }
                    else if(i==10 || i==11){
                        selectNode='<input type="text" id="'+idandName+'" name="'+idandName+'" value="'+chInnerText+'" required="required" style="width:90%;" pattern="[A-C]{1}"/>';
                    }
                    node.children[i].innerHTML=selectNode;
                    selectNode='';
                }
                node.children[(node.children.length-1)].innerHTML='<input type="button" id="rowEditUpdate_'+stuId[1]+'" name="rowUpdate_'+stuId[1]+'"  value="Update" onclick="rowEditUpdate(this.id,'+sno+')" />';
                
            }
            
            function rowEditUpdate(id,sno){
                //alert(id+'============'+sno);
                var stuId=id.split('_');
                
                var tr=document.getElementById(stuId[1]);
                
                
                var reading_tamil= $("#reading_tamil_"+stuId[1]).val();
                var reading_english= $("#reading_english_"+stuId[1]).val();
                var writing_tamil= $("#writing_tamil_"+stuId[1]).val();
                var writing_english= $("#writing_english_"+stuId[1]).val();
                var apptitude= $("#apptitude_"+stuId[1]).val();
                var functional= $("#functional_"+stuId[1]).val();
                
                var specURL = baseurl+'Block/updateTrainingRecord/'+stuId[1];
                
                
                var postParameters = "&reading_tamil="+reading_tamil;
                postParameters += "&reading_english="+reading_english;
                postParameters += "&writing_tamil="+writing_tamil;
                postParameters += "&writing_english="+writing_english;
                postParameters += "&apptitude="+apptitude;
                postParameters += "&functional="+functional;
                postParameters += "&sno="+sno;
                //alert(stuId[1] + " ===== " + specURL);
                //alert(postParameters);
                $.ajax({
                    type: "POST",
                    url:baseurl+'Block/updateEditedRecord/'+stuId[1],
                    data:postParameters,
                    success: function(resp){
                        //alert(resp);  
                        alert($("#"+stuId[1]).getAttribute(id));
                        $("#"+stuId[1]).html(resp);  
                        return true;              
                    },
                    error: function(e){ 
                        alert('Error: ' + e.responseText);
                        return false;  
                    }
                });
            }
        </script>
             

    </body>

</html>