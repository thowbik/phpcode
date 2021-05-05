<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('head.php'); ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
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
                                <div class="page-title"><h1>Dashboard<small>Block Dashboard</small></h1></div>
                                <!-- END PAGE TITLE -->
                                <!-- BEGIN PAGE TOOLBAR -->
                                <div class="page-toolbar"><!-- BEGIN THEME PANEL --><!-- END THEME PANEL --></div>
                                <!-- END PAGE TOOLBAR -->
                            </div>
                        </div>
                        <!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE CONTENT BODY -->
                        <div class="page-content"> 
                            <div class="container">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                    <center><?php $this->load->view('block/emis_block_profile_header.php'); ?></center>
                                    <!-- BEGIN BLOCK BUTTONS PORTLET-->
                                    <div class="portlet light col-md-12">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-settings font-green-sharp"></i>
                                                <span class="caption-subject font-green-sharp bold uppercase">Customized Multi level analysis </span>
                                            </div>
                                            <div class="actions">
                                                <span class="caption-subject  bold uppercase" style="color: #ec1358;">Note: Yet to come</span>
                                            </div>
                                        </div>
                                        <?php if($this->uri->segment(5,0)!=''){ ?>
                                        <div class="col-md-12 thumbnail" style="margin-left: 10px;">
                                            <form method="post" action="" onsubmit="event.preventDefault();">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label">Select Class *</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_block_schoolsclassid" name="emis_block_schoolsclassid">
                                                            <option value="" >Select Class *</option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">Select Class *</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_block_schoolsclasssectionid" name="emis_block_schoolsclasssectionid" >
                                                            <option value="" >Select Section </option>
                                                        </select>
                                                    </div> 
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn green" id="emis_stu_searchsep_sub" style="margin-top: 10px;" >Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php } ?>
                                        <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-globe"></i> Student Overall count - <?php echo($cat); ?> wise </div>
                                                <div class="tools"> </div>
                                            </div>
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                    <thead>
                                                        <tr>
                                                            <th>Udise code</th>  
                                                            <th>Name </th>
                                                            <th>NULL</th>                      
                                                            <th>PRE-KG</th>
                                                            <th>LKG</th>
                                                            <th>UKG</th>
                                                            <th>CLASS I</th>
                                                            <th>CLASS II</th>
                                                            <th>CLASS III</th>
                                                            <th>CLASS IV</th>
                                                            <th>CLASS V</th>
                                                            <th>CLASS VI</th>
                                                            <th>CLASS VII</th>
                                                            <th>CLASS VIII</th>
                                                            <th>CLASS IX</th>
                                                            <th>CLASS X</th>
                                                            <th>CLASS XI</th>
                                                            <th>CLASS XII</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="stulist">   
                                                        <?php $total=0; foreach($count as $sc => $school){ 
                                                        $school=(object)$school;
                                                            if($cat=="Schools"){$total++;}
                                                            elseif($cat=="Students"){
                                                            $total+=($school->DISCLOSED+$school->PREKG+$school->LKG+
                                                            $school->UKG+$school->CLASS_1+$school->CLASS_2+$school->CLASS_3+
                                                            $school->CLASS_4+$school->CLASS_5+$school->CLASS_6+$school->CLASS_7+
                                                            $school->CLASS_8+$school->CLASS_9+$school->CLASS_10+$school->CLASS_11+$school->CLASS_12);}
                                                        ?>
                                                        <tr>
                                                            <th><a class="link-unstyled" href="<?php echo base_url().'Block/emis_block_view_segment/Schools/'.$this->uri->segment(4,0).'/'.$school->school_id;?>"><?php echo($school->udise_code) ?></a></th>  
                                                            <th><?php echo($school->school_name) ?> </th>
                                                            <th><?php echo($school->DISCLOSED) ?></th>                      
                                                            <th><?php echo($school->PREKG) ?></th>
                                                            <th><?php echo($school->LKG) ?></th>
                                                            <th><?php echo($school->UKG) ?></th>
                                                            <th><?php echo($school->CLASS_1) ?></th>
                                                            <th><?php echo($school->CLASS_2) ?></th>
                                                            <th><?php echo($school->CLASS_3) ?></th>  
                                                            <th><?php echo($school->CLASS_4) ?> </th>
                                                            <th><?php echo($school->CLASS_5) ?></th>                      
                                                            <th><?php echo($school->CLASS_6) ?></th>
                                                            <th><?php echo($school->CLASS_7) ?></th>
                                                            <th><?php echo($school->CLASS_8) ?></th>
                                                            <th><?php echo($school->CLASS_9) ?></th>
                                                            <th><?php echo($school->CLASS_10) ?></th>
                                                            <th><?php echo($school->CLASS_11) ?></th>
                                                            <th><?php echo($school->CLASS_12) ?></th>
                                                        </tr>
                                                        <?php } ?>     
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="thumbnail col-md-12">
                                                <div class="card-title col-md-6"><span class=""> Total</span></div>
                                                <div class="card-title col-md-6"><span class=""><?php echo($total); ?></span></div>
                                            </div>
                                        </div>
                                    <!-- BEGIN BLOCK BUTTONS PORTLET-->
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
                </div>
                <!-- END CONTAINER -->
            </div>
        </div>
        <?php $this->load->view('footer.php'); ?>
    </div>
    <?php $this->load->view('scripts.php'); ?>
    <script src="<?php echo base_url().'asset/js/block.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
    <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
    
    <script>
        window.onload=(function(){ 
            var emis_block_schoolsid =<?php echo($this->uri->segment(5,0)); ?>;
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
        $(document).ready(function(){ 
                $("#emis_block_schoolsclassid").change(function(){ 
                    var emis_block_schoolsid = <?php echo($this->uri->segment(5,0)); ?>;
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
                    var emis_block_schoolsid = <?php echo($this->uri->segment(5,0)); ?>;
                    var emis_block_schoolsclassid = $("#emis_block_schoolsclassid").val();
                    var emis_block_schoolsclasssectionid=$("#emis_block_schoolsclasssectionid").val();
                    $.ajax({
                        type: "POST",
                        url:baseurl+'Block/BlockStudentDetail',
                        data:"&emis_block_schoolsid="+emis_block_schoolsid+"&emis_block_schoolsclassid="+emis_block_schoolsclassid+"&emis_block_schoolsclasssectionid="+emis_block_schoolsclasssectionid,
                        success: function(resp){
                            //alert(resp);  
                            $('#sample_2').html(resp);  
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
    </script>
</body>
</html>