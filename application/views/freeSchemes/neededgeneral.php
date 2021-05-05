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
                                    <h1> SCHEME GENERAL INFORMATION</h1>
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
                                        
                                </div>         
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Student Utilities & Stationeries</div>
                                            
                                        </div>
                                        <div class="portlet-body">
                                            <form id="free_scheme_indent" name="free_scheme_indent" method="post" >
                                                <input type="hidden" id="scheme_id" name="scheme_id" />
                                                <input type="hidden" id="class_id" name="class_id" />
                                                <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;">
                                                    <thead>
                                                        <tr class="portlet box green" style="text-align: center;">
                                                           <th>Class</th>
                                                           <th>Text book</th>                        
                                                           <th>School Bag size</th>
                                                           <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Footwear&nbsp;&nbsp;size</th>                                                    
                                                           <th>Uniform&nbsp;&nbsp;&nbsp;&nbsp; size</th>
                                                           <th>Crayon</th>
                                                           <th>Color pencil</th>
                                                           <th>Geometry box</th>
                                                           <th>Atlas</th>
                                                           <th>Cycle</th>
                                                           <th>Laptop</th>
                                                           
                                                    </tr>
                                                   </thead>
                                                    
                                                    <tr style="text-align: center;">
                                                           <td><b>I</b></td>
                                                           <td>All</td>
                                                           <td>Small</td>
                                                           <td>XI</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td>1</td>
                                                           <td>1</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                    
                                                    </tr>
                                                    
                                                    
                                                     <tr style="text-align: center;">
                                                           <td><b>II</b></td>
                                                           <td>All</td>
                                                           <td>Small</td>
                                                           <td>XI</td>
                                                           <td>XII</td>
                                                           <td>XIII	</td>
                                                           <td></td>
                                                           <td>2</td>
                                                           <td>1</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                    
                                                    </tr> 
                                                    
                                                    
                                                    
                                                    <tr style="text-align: center;">
                                                           <td><b>III</b></td>
                                                           <td>All</td>
                                                           <td>Small</td>
                                                           <td>XIII</td>
                                                           <td>I</td>
                                                           <td>II</td>
                                                           <td></td>
                                                           <td>3</td>
                                                           <td></td>
                                                           <td>1</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                    
                                                    </tr>
                                                    
                                                    
                                                    <tr style="text-align: center;">
                                                           <td><b>IV</b></td>
                                                           <td>All</td>
                                                           <td>Medium</td>
                                                           <td>II</td>
                                                           <td>III</td>
                                                           <td>IV</td>
                                                           <td></td>
                                                           <td>4</td>
                                                           <td></td>
                                                           <td>1</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                    
                                                    </tr>
                                                    
                                                    <tr style="text-align: center;">
                                                           <td><b>V</b></td>
                                                           <td>All</td>
                                                           <td>Medium</td>
                                                           <td>IV</td>
                                                           <td>V</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td>5,Large primary</td>
                                                           <td></td>
                                                           <td>1</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                    
                                                    </tr>
                                                    
                                                    
                                                    <tr style="text-align: center;">
                                                           <td><b>VI</b></td>
                                                           <td>All</td>
                                                           <td>Medium</td>
                                                           <td>V</td>
                                                           <td>VI</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td>6</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td>1</td>
                                                           <td>1</td>
                                                           <td></td>
                                                           <td></td>
                                                    
                                                    </tr>
                                                    
                                                    
                                                    <tr style="text-align: center;">
                                                           <td><b>VII</b></td>
                                                           <td>All</td>
                                                           <td>Medium</td>
                                                           <td>VI</td>
                                                           <td>VII</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td>7</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td>1</td>
                                                           <td>1</td>
                                                           <td></td>
                                                           <td></td>
                                                    
                                                    </tr>
                                                    
                                                     <tr style="text-align: center;">
                                                           <td><b>VIII</b></td>
                                                           <td>All</td>
                                                           <td>Large</td>
                                                           <td>VII</td>
                                                           <td>VIII</td>
                                                           <td>IX</td>
                                                           <td>X</td>
                                                           <td>8,Large upper primary</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td>1</td>
                                                           <td>1</td>
                                                           <td></td>
                                                           <td></td>
                                                    
                                                    </tr>
                                                    
                                                    <tr style="text-align: center;">
                                                          <td><b>IX</b></td>
                                                           <td>All</td>
                                                           <td>Large</td>
                                                           <td>VIII</td>
                                                           <td>IX</td>
                                                           <td>X</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td>1</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                    
                                                    </tr>
                                                    
                                                     <tr style="text-align: center;">
                                                          <td><b>X</b></td>
                                                           <td>All</td>
                                                           <td>Large</td>
                                                           <td>VIII</td>
                                                           <td>IX</td>
                                                           <td>X</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                    
                                                    </tr>
                                                    
                                                    
                                                    
                                                     <tr style="text-align: center;">
                                                          <td><b>XI</b></td>
                                                           <td>All</td>
                                                           <td>Large</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td>1</td>
                                                           <td></td>
                                                    
                                                    </tr>
                                                    
                                                    <tr style="text-align: center;">
                                                          <td><b>XII</b></td>
                                                           <td>All</td>
                                                           <td>Large</td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td>1</td>
                                                    
                                                    </tr>
                                               
                                                    <tbody id="schemeIndent"> 
                                                    </tbody>
                                                </table>
                                        
                                                   
                                                </div>
                                                <button style="visibility:hidden;">DDDD</button>
                                                </div>
                                                
                                                
                                    <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Number of notebooks for each student</div>
                                        </div>
                                        <div class="portlet-body">    

                                                    <input type="radio" name="term" value="1" checked> Term 1  &nbsp;&nbsp;
                                                    <input type="radio" name="term" value="2"> Term 2  &nbsp;&nbsp;
                                                    <input type="radio" name="term" value="3"> Term 3  &nbsp;&nbsp;
                                                    <input type="radio" name="term" value="4"> Full Academic Years  
                                                    <br/><br/>
                                                
                                                <table class="table table-striped table-bordered table-hover" style="alignment-adjust: !important;">
                                                    <thead>
                                                        <tr class="portlet box green">
                                                            <td rowspan="3"><b>Class</b></td>
                                                         </tr>   
                                                         
                                                         <tr class="portlet box green" style="text-align: center;">
                                                         
                                                              <td colspan="3"><b>40 pages</b></td>
                                                              <td colspan="3"><b>80 pages</b></td>
                                                              <td rowspan="2"><b>2 lines</b></td>
                                                              <td rowspan="2"><b>4 lines</b></td>
                                                              <td rowspan="2"><b>Drawing</b></td>
                                                              <td rowspan="2"><b>Composition</b></td>
                                                              <td rowspan="2"><b>Geometry</b></td>
                                                              <td rowspan="2"><b>Graph</b></td>
                                                              <td rowspan="2"><b>Record</b></td>
                                                         
                                                         </tr>
                                                         
                                                         <tr class="portlet box green" style="text-align: center;">
                                                              <td><b>Ruled</b></td>
                                                              <td><b>Science</b></td>
                                                              <td><b>Maths</b></td>
                                                              <td><b>Ruled</b></td>
                                                              <td><b>Science</b></td>
                                                              <td><b>Maths</b></td>
                                                         
                                                        </tr>
                                                   </thead>
                               
                                                    <tbody id="nbtbody"></tbody>
                                                </table>
                                        
                                                   
                                                </div>
                                                <button style="visibility:hidden;">DDDD</button>
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
        
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script> 
        <script>
        var changedValues = [];
        var Classes = ["0","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII","PRE-KG","LKG","UKG"];
        var tr="";
            $(document).ready(function(){ 
                        changedValues =  (<?php echo json_encode($notebook); ?>).filter(function(dataitem) {
                                    return  dataitem.term == 1 && dataitem.class <= 8;
                        });
                        tableAppend(changedValues);
            });
        

            $('input[type=radio]').change(function() {
                    if (this.value == '1') {
                        tr="";
                        changedValues =  (<?php echo json_encode($notebook); ?>).filter(function(dataitem) {
                                    return  dataitem.term == 1 && dataitem.class <= 8;
                        });                
                    }
                    else if (this.value == '2') {
                        tr="";
                        changedValues =  (<?php echo json_encode($notebook); ?>).filter(function(dataitem) {
                                    return dataitem.term == 2 && dataitem.class <= 8;
                        });
                    }
                    else if (this.value == '3') {
                        tr="";
                        changedValues =  (<?php echo json_encode($notebook); ?>).filter(function(dataitem) {
                                    return dataitem.term == 3 && dataitem.class <= 8;
                        });
                    }
                    else if (this.value == '4'){
                        
                        tr="";
                        changedValues =  (<?php echo json_encode($notebook); ?>).filter(function(dataitem) {
                                    return dataitem.class >= 9;
                        });   
                    }
                    tableAppend(changedValues);
            });

                function tableAppend(changedValues){

                    var TotalofFortyPageRuled = [];var TotalofFortyPageScience = [];var TotalofFortyPageMaths = [];var TotalofEightyPageRuled = [];
                    var TotalofEightyPageScience = [];var TotalofEightyPageMaths = [];var TotalofTwoLines = [];var TotalofFourLines = [];
                    var TotalofComposition = [];
                    var TotalofDrawing = [];var TotalofGeometryNote = [];var TotalofGraphNote = [];var TotalofRecordNote = [];

                    for(var i=0;i<changedValues.length;i++){
                                    tr+='<tr style="text-align: center;" >';               
                                    tr+='<td><b>'+Classes[changedValues[i].class]+'</b></td>';     
                                    changedValues[i].FortyPageRuled == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].FortyPageRuled+'</td>' ;        
                                    TotalofFortyPageRuled[i] = changedValues[i].FortyPageRuled;
                                    changedValues[i].FortyPageScience == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].FortyPageScience+'</td>';     
                                    TotalofFortyPageScience[i] = changedValues[i].FortyPageScience;
                                    changedValues[i].FortyPageMaths == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].FortyPageMaths+'</td>';     
                                    TotalofFortyPageMaths[i] = changedValues[i].FortyPageMaths;
                                    changedValues[i].EightyPageRuled == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].EightyPageRuled+'</td>';     
                                    TotalofEightyPageRuled[i] = changedValues[i].EightyPageRuled;
                                    changedValues[i].EightyPageScience == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].EightyPageScience+'</td>';     
                                    TotalofEightyPageScience[i] = changedValues[i].EightyPageScience;
                                    changedValues[i].EightyPageMaths == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].EightyPageMaths+'</td>';     
                                    TotalofEightyPageMaths[i] = changedValues[i].EightyPageMaths;
                                    changedValues[i].TwoLines == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].TwoLines+'</td>';     
                                    TotalofTwoLines[i] = changedValues[i].TwoLines;
                                    changedValues[i].FourLines == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].FourLines+'</td>';     
                                    TotalofFourLines[i] = changedValues[i].FourLines;
                                    changedValues[i].Drawing == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].Drawing+'</td>';     
                                    TotalofDrawing[i] = changedValues[i].Drawing;
                                    changedValues[i].Composition == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].Composition+'</td>';     
                                    TotalofComposition[i] = changedValues[i].Composition;
                                    changedValues[i].GeometryNote == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].GeometryNote+'</td>';     
                                    TotalofGeometryNote[i] = changedValues[i].GeometryNote;
                                    changedValues[i].GraphNote == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].GraphNote+'</td>';     
                                    TotalofGraphNote[i] = changedValues[i].GraphNote;
                                    changedValues[i].RecordNote == 0 ? tr+='<td> </td>' : tr+='<td>'+changedValues[i].RecordNote+'</td>';     
                                    TotalofRecordNote[i] = changedValues[i].RecordNote;
                                    tr+='</tr>';
                    }
                             tr+='<tr style="text-align: center;" >';               
                             tr+='<td><i>Total</i></td>';     
                             tr+='<td><b>'+eval(TotalofFortyPageRuled.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofFortyPageScience.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofFortyPageMaths.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofEightyPageRuled.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofEightyPageScience.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofEightyPageMaths.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofTwoLines.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofFourLines.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofDrawing.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofComposition.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofGeometryNote.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofGraphNote.join("+"))+'</b></td>';     
                             tr+='<td><b>'+eval(TotalofRecordNote.join("+"))+'</b></td>';     
                             tr+='</tr>';  
                             document.getElementById('nbtbody').innerHTML=tr;
                    
                }
        </script>
              
    </body>
</html>