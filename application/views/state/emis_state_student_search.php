
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
<style> 




/******************* Timeline Demo - 3 *****************/
.main-timeline3{overflow:hidden;position:relative}
.main-timeline3:before{content:"";width:10px;height:100%;border:3px solid #959595;position:absolute;top:40px;left:50%;transform:translateX(-50%)}
.main-timeline3 .timeline{width:50%;padding:10px 60px 10px 100px;float:right;position:relative}
.main-timeline3 .timeline:before{content:"";width:40px;height:40px;border-radius:50%;background:#c47c48;border:5px solid #fff;box-shadow:0 0 1px 5px #c47c48;position:absolute;top:42px;left:-59px}
.main-timeline3 .timeline-content{display:block;background:#e9e9e7;padding:70px 30px 20px;box-shadow:0 0 10px rgba(0,0,0,.2) inset;position:relative}
.main-timeline3 .timeline-content:hover{text-decoration:none}
.main-timeline3 .year{display:block;width:80%;height:50px;background:#c47c48;padding:0 0 0 50px;font-size:30px;font-weight:800;color:#fff;line-height:50px;box-shadow:0 0 20px rgba(0,0,0,.4) inset;border-radius:10px 10px 10px 0;position:absolute;top:20px;left:-20px}
.main-timeline3 .year:before{content:"";border-top:40px solid #c47c48;border-left:20px solid transparent;border-bottom:20px solid transparent;position:absolute;bottom:-60px;left:0}
.main-timeline3 .title{font-size:18px;font-weight:600;text-transform:uppercase;color:#4a4a4a}
.main-timeline3 .description{font-size:14px;color:#6f6f6f;margin:0 0 5px}
.main-timeline3 .timeline:nth-child(2n){padding:10px 100px 10px 60px;text-align:right}
.main-timeline3 .timeline:nth-child(2n):before{left:auto;right:-20px;background:#bf3fc8;box-shadow:0 0 1px 5px #bf3fc8}
.main-timeline3 .timeline:nth-child(2n) .year{padding-right:50px;border-radius:10px 10px 0;left:auto;right:-20px;background:#bf3fc8}
.main-timeline3 .timeline:nth-child(2n) .year:before{border-left:none;border-right:20px solid transparent;left:auto;right:0;border-top-color:#bf3fc8}
.main-timeline3 .timeline:nth-child(2){margin-top:140px!important;}
.main-timeline3 .timeline:nth-child(odd){margin:-140px 0 0}
.main-timeline3 .timeline:nth-child(even){margin-bottom:60px}
.main-timeline3 .timeline:first-child,.main-timeline3 .timeline:last-child:nth-child(even){margin:0}
.main-timeline3 .timeline:nth-child(3n):before{background:#ce3c41;box-shadow:0 0 1px 5px #ce3c41}
.main-timeline3 .timeline:nth-child(3n) .year{background:#ce3c41}
.main-timeline3 .timeline:nth-child(3n) .year:before{border-top-color:#ce3c41}
.main-timeline3 .timeline:nth-child(4n):before{background:#8cc43d;box-shadow:0 0 1px 5px #8cc43d}
.main-timeline3 .timeline:nth-child(4n) .year{background:#8cc43d}
.main-timeline3 .timeline:nth-child(4n) .year:before{border-top-color:#8cc43d}
@media only screen and (max-width:990px){.main-timeline3:before{top:8%}
.main-timeline3 .timeline{padding:10px 10px 10px 100px}
.main-timeline3 .timeline:nth-child(2n){padding:10px 100px 10px 10px}
}
@media only screen and (max-width:767px){.main-timeline3:before{width:8px;top:0;left:12px;transform:translateX(0)}
.main-timeline3 .timeline,.main-timeline3 .timeline:nth-child(even),.main-timeline3 .timeline:nth-child(odd){width:100%;float:none;text-align:left;padding:0 0 0 60px;margin:0 0 30px}
.main-timeline3 .timeline:before,.main-timeline3 .timeline:nth-child(2n):before{width:20px;height:20px;border:3px solid #fff;top:38px;left:6px}
.main-timeline3 .timeline:nth-child(2n) .year{right:auto;left:-20px;border-radius:10px 10px 10px 0}
.main-timeline3 .timeline:nth-child(2n) .year:before{border-left:20px solid transparent;border-bottom:20px solid transparent;border-right:none;right:auto;left:0}
}


</style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view($header.'/header.php'); ?>

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
                                        <h1>Studnets Search Filter
                                            
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
                                <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                    <div class="page-content-inner">
                                     <!-- <div class="portlet light">
                                            <form action="<?php echo base_url()?>"<?=$link;?>"/get_district_strick_report" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2" style="width:6%;padding-top:5%;">

                                                            
                                                        </div>
                                                        <div class="col-md-8" >
                                                            
                                                              <div class="form-group" style="padding: 10px;padding-left: 8%">
                                                                <label class="control-label bold">
                                                               School Management  <input type="checkbox" id="emis_state_report_schmanage"  value="all" name="school_manage"> All</label><br/></label><br/>
                                                               
                                                                 <?php  foreach($getmanagecate as $det){    if($det->manage_name !='Un-aided' && $det->manage_name !='Central Govt'){ 
                                                                    ?>
                                                                 
            <input type="checkbox" name="school_manage[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off" <?php echo ($det->manage_name== 'Government' && count($manage) == '0'? 'checked' : '');?> value="<?=$det->manage_name;?>"/><span class="label-text" ><?=$det->manage_name;?></span>&nbsp;&nbsp;&nbsp;
            
                                                                  <?php }  } ?>

                                                               
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>
                                                              
                                                              <div style="padding: 4px;padding-left: 8%;margin-top: -2%;" class="form-group" style="padding: 10px;">
                                                                
                                                              
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>
                                                              </div>
                                                               <div class="col-md-1" >
                                                              <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                                
                                                                <button type="submit" class="btn green btn-lg">Submit</button>
                                                              </div>
                                                              </div>
                                                      
                                                    </div>
                                                </div>
                                            </form>
                                              <?php if($manage!=""){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5><b>Selected School Management :</b><?=implode(",",$manage);?></h5>
                                                        
                                                    </div>
                                                </div>
                                              <?php  }
$total1 = [];
                                               ?>
                                            </div> -->

                                       
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Students Search Filter  </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">
                                                        <form >
                                    <div class="row">
                                                    <div class="col-md-offset-2 col-md-4">
                                                      <label class="control-label"> Students Search Filter</label>
                                                             <select class="form-control" data-placeholder="Students Filter "  id="emis_students_admit" name="emis_students_admit">
                                                               <option value="-1" >Select</option>
                                                                <option value="1">Unique Number</option>
                                                                <option value="2">Aadhaar Number</option>
                                                                <option value="3">Mobile Number</option>
                                                                <option value="4">UDISE Code</option>


                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_aidunaid_alert"></div></font>
                                                        </div>
                                                      <div class="col-md-4">
                                                        <?php
                                    if($this->session->flashdata('students_update')) {
$message = $this->session->flashdata('students_update');

// echo $message;

  
                                     ?>
                                   <div class="alert alert-success" style="width: 300px;"><button class="close" data-close="alert"></button>
                                <?=$message;?></div>
                                    <!-- BEGIN THEME PANEL -->
                                    <!-- END THEME PANEL -->
                                  <?php } ?>
                                                      </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="filterGroup">
                                                        <div class="col-md-offset-2 col-md-4">
                                                          <label class="control-label" id="label"> </label>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <input type="text" class="form-control" id="emis_filter" name="emis_filter" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="" required>
                                                            <font style="color:#dd4b39;"><div id="emis_reg_stu_pincode_alert"></div></font>
                                                        </div>
                                                        
                                                    </div>
                                                
                                                        </div>
                                                        <div class="col-md-4 classgroup">
                                                    <label class="control-label">Select Class</label>
                                                    <div class="form-group">
                                                        <div class="">
                                                           
                                                           
                                                            
                                                            <select  class="form-control" data-placeholder="Choose a Category" id="class_id" name="emis_class_study" required>
                                                                <option value="-1">select Class</option>
                                                                
                                                                <?php 

                                                                $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                            for($i=1;$i<=15;$i++){ 
                                                                $class_name = array_search($i, $class_roma);
                                                              ?>
                                                                    <option value="<?=$i;?>"><?=$class_name?></option>
                                                                  <?php  }?>
                                                            </select>
                                                            <font style="color:#dd4b39;"><div id="emis_class_studying_alert"></div></font>
                                                        </div>

                                                    </div>
                                                </div>


                                                      <div class="col-md-offset-8 col-md-4">
                                                      <button type="button" class="btn btn-success search" onclick="student_search();"><span>Search</span></button>
                                                      <button type="button" class="btn btn-success search_archive" onclick="student_search_arch();"><span>Search archive</span></button>

                                                    <div id="err_msg"></div>
                                                    </div>
                                                      </div>
                                                      
                                                  </div>
                                                    </form>
                                                    <br/>
                                                    <div class="portlet box green filter_students_info">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Data List </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    <div class="row ">
                                                      <div class="col-md-12">
                                                        <table class="table table-striped table-bordered table-hover district" id="sample_3">
                                                          <thead>
                                                            <tr>
                                                              <th>S.No.</th>
                                                              <th>Unique ID</th>
                                                              <th>Name</th>
                                                              <th>Gender</th>
                                                              <th>Date<br/>Of Birth</th>
                                                              <th>Class</th>
                                                              <th>Sec</th>
                                                              <th>School Name</th>
                                                              <th>Social Category</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody id="student_detail">
                                                            
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                        
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END CARDS -->


                                         <!-- BEGIN BLOCK BUTTONS PORTLET-->
                                                                   
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
                    <!-- END CONTAINER -->
                </div>
            </div>

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>
   <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>


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
            <script type="text/javascript">
      $(".filterGroup").hide();
      $(".filter_students_info").hide();
      var textbox ='';
      var label = '';
      var db_col = '';
      var db_sub_col = '';
      
      $("#emis_students_admit").change(function()
      {
          var admit = $(this).val();
          label = $(this).find('option:selected').text();
          textbox = $("#emis_filter");
          $(textbox).val('');
          db_sub_col = '';
          switch(parseInt(admit))
          {
            case 1:
            $("#label").text(label+' *');
            $(textbox).attr('placeholder','Enter The '+label);
            $(textbox).attr('maxlength','20');
            db_col = 'unique_id_no';
            $(".filterGroup").show();
            $(".classgroup").hide();
            break;
            case 2:
            $("#label").text(label+' *');
            $(textbox).attr('placeholder','Enter The '+label);
            $(textbox).attr('maxlength','12');
            db_col = 'aadhaar_uid_number';
            $(".filterGroup").show();
            $(".classgroup").hide();

            break;
            case 3:
            $("#label").text(label+' *');
            $(textbox).attr('placeholder','Enter The '+label);
            $(textbox).attr('maxlength','10');
            db_col = 'phone_number';
            $(".filterGroup").show();
            $(".classgroup").hide();

            break;
            case 4:
            $("#label").text(label+' *');
            $(textbox).attr('placeholder','Enter The '+label);
            $(textbox).attr('maxlength','12');
            db_col = 'udise_code';
            db_sub_col = 'class_studying_id';

            $(".filterGroup").show();
            $(".classgroup").show();

            break;
            case -1:
            $(".filterGroup").hide();
            $(".classgroup").hide();

            break;
          }
      });

        var table = '';
        var students_data = '';
      function student_search()
      {
        // alert('function');
                    $("#err_msg").html('');
if($.fn.dataTable.isDataTable('#sample_3')){
           $('#sample_3').DataTable().clear().destroy();


                   }
          var filter_val = $(textbox).val();
          var class_id = $("#class_id").val();
          // console.log(class_id);
          if(filter_val =='' || filter_val ==null || filter_val==undefined)
          {
          // alert();
            $("#err_msg").html('<h4 style="color:red;">Please Enter The '+label+'</h4>');
            return false;
          }else if(label =='UDISE Code' && class_id =='-1')
          {
            $("#err_msg").html('<h4 style="color:red;">Please Enter The '+label+' And Select Class </h4>');

          }else{
          
              $('.search span').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
              data = {'search_data':filter_val,'db_col':db_col,'db_sub_col':db_sub_col,'class_id':class_id};

              $.ajax(
              {
                method:"POST",
                url:'<?=base_url()."Registration/get_studetus_search"?>',
                dataType:'JSON',
                data:data,
                success:function(res)
                {
              $('.search span').html('search');
               //$('.search_archive span').html('search archive');
      $(".filter_students_info").hide();

                  if(res.status)
                  {
      $(".filter_students_info").show();

                    students_data = res.data;
                    // console.log(students_data);
                      // var student_detail = 
                      $("#student_detail").empty();
                       var tables = $("#sample_3 tbody");
                        tables.empty();
                        // console.log(students_data);
                      $.each(students_data,function(i,val)
                      {
                        i = i+1;
                        students_tbl = '<tr id="student_detail">';
                        var date = new Date(val.dob);
        var dob_month = date.getMonth()+1;
        var dob = (date.getDate() < 10 ? '0'+date.getDate():date.getDate())+'-'+(dob_month < 10 ? '0'+dob_month:dob_month)
+'-'+date.getFullYear();

                          students_tbl +='<td>'+ i +'</td>';
                          students_tbl +='<td><a href="http://smartcard.tnschools.gov.in/qr/'+val.smart_id+'" target="_blank">'+val.unique_id_no+'</a></td>';
                          students_tbl +='<td><span style="color:'+(val.transfer_flag==0?'red':'green')+'">'+val.name+'</span></td>';
                          students_tbl +='<td style="text-align:center">'+(val.gender==1?'M':'F')+'</td>';
                          students_tbl +='<td>'+dob+'</td>';
                          students_tbl +='<td  style="text-align:center">'+val.class_studying_id+'</td>';
                          students_tbl +='<td style="text-align:center">'+val.class_section+'</td>';
                          students_tbl  +='<td>'+val.school_name+'</td>';
                          students_tbl +='<td>'+val.community_name+'</td>';
                          

                      students_tbl +='</tr>';
                      $("#student_detail").append(students_tbl);
                      });
          
   table =  sum_dataTable('#sample_3');
   // table.clear();
                   // table.ajax.url(students_data).load();

                  }else
                  {
                    $("#err_msg").html('<h3>'+res.message+'</h3>');
                  }
                }
              })

          }
      }


       var table = '';
        var students_data = '';
      function student_search_arch()
      {
        // alert('function');
                    $("#err_msg").html('');
if($.fn.dataTable.isDataTable('#sample_3')){
           $('#sample_3').DataTable().clear().destroy();


                   }
          var filter_val = $(textbox).val();
          var class_id = $("#class_id").val();
          // console.log(class_id);
          if(filter_val =='' || filter_val ==null || filter_val==undefined)
          {
          // alert();
            $("#err_msg").html('<h4 style="color:red;">Please Enter The '+label+'</h4>');
            return false;
          }else if(label =='UDISE Code' && class_id =='-1')
          {
            $("#err_msg").html('<h4 style="color:red;">Please Enter The '+label+' And Select Class </h4>');

          }else{
          
              $('.search_archive span').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
              data = {'search_data':filter_val,'db_col':db_col,'db_sub_col':db_sub_col,'class_id':class_id};

              $.ajax(
              {
                method:"POST",
                url:'<?=base_url()."Registration/get_studetus_search_arch"?>',
                dataType:'JSON',
                data:data,
                success:function(res)
                {
              //$('.search span').html('search');
               $('.search_archive span').html('search archive');
      $(".filter_students_info").hide();

                  if(res.status)
                  {
      $(".filter_students_info").show();

                    students_data = res.data;
                    // console.log(students_data);
                      // var student_detail = 
                      $("#student_detail").empty();
                       var tables = $("#sample_3 tbody");
                        tables.empty();
                        // console.log(students_data);
                      $.each(students_data,function(i,val)
                      {
                        i = i+1;
                        students_tbl = '<tr id="student_detail">';
                        var date = new Date(val.dob);
        var dob_month = date.getMonth()+1;
        var dob = (date.getDate() < 10 ? '0'+date.getDate():date.getDate())+'-'+(dob_month < 10 ? '0'+dob_month:dob_month)
+'-'+date.getFullYear();

                          students_tbl +='<td>'+ i +'</td>';
                          students_tbl +='<td><a href="<?=base_url()."Registration/get_stud_insert/?unique_id="?>'+val.unique_id_no+'">'+val.unique_id_no+'</a></td>';
                          students_tbl +='<td><span style="color:'+(val.transfer_flag==0?'red':'green')+'">'+val.name+'</span></td>';
                          students_tbl +='<td>'+(val.gender==1?'M':'F')+'</td>';
                          students_tbl +='<td>'+dob+'</td>';
                          students_tbl +='<td>'+val.class_studying_id+'</td>';
                          students_tbl +='<td>'+val.class_section+'</td>';
                          students_tbl  +='<td>'+val.school_name+'</td>';
                          students_tbl +='<td>'+val.community_name+'</td>';
                          

                      students_tbl +='</tr>';
                      $("#student_detail").append(students_tbl);
                      });
          
   table =  sum_dataTable('#sample_3');
   // table.clear();
                   // table.ajax.url(students_data).load();

                  }else
                  {
                    $("#err_msg").html('<h3>'+res.message+'</h3>');
                  }
                }
              })

          }
      }
    
   // table =  sum_dataTable('#sample_3');

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


function admission_tab(id)
{
  
  // console.log(school_id);
  var students_det  = students_data.filter(stu=>stu.id == id)[0];
    
    if(students_det.transfer_flag==1){
    $(".group").hide();
    $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           
 var curr = new Date();


var end = new Date(curr.getFullYear(), curr.getMonth(), curr.getDate());

$('.date').datepicker({
    
});
 

$('.date').datepicker("setEndDate",end);
    students_detail = students_data.filter(stu=>stu.id == id)[0];
    var dob_month = end.getMonth()+1
var dob = (end.getDate() < 10 ? '0'+end.getDate():end.getDate())+'-'+(dob_month < 10 ? '0'+dob_month:dob_month)
+'-'+end.getFullYear();
    // console.log(students_detail);



      $("#emis_unique_id_no").val(students_detail.unique_id_no);
    $("#stu_id").text(students_detail.name+'-'+students_detail.unique_id_no);
    $("#dat").datepicker("setDate",dob);
    // console.log(students_detail.class_studying_id);
      $("#students_id").val(students_detail.id);

        $("#emis_class_id").val(students_detail.class_studying_id).attr('selected','selected');
        $("#emis_reg_mediofinst_ad").val(students_detail.education_medium_id).attr('selected','selected');
       
       $("#emis_reg_stu_admission_admiss_ad").val(students_detail.school_admission_no);
        get_stu_section(students_detail.class_studying_id,students_detail.class_section);
        $("#emis_reg_stu_rte_ad").val(students_detail.child_admitted_under_reservation).attr('selected','selected');
    if(students_detail.class_studying_id ==11 || students_detail.class_studying_id==12 )
        {
                $(".group").show();
                get_group(students_detail.class_studying_id.substr(1,2),students_detail.group_code_id);


        }
    $("#admitModal").modal('show');
  }else if(school_id == students_det.school_id){
        swal('Not Allowed','Student is already in the School','error');
        return false;
    }else if(students_det.request_flag ==null || students_det.request_flag==0 )
  {
    // console.log('else');
      var data = {'id':id};
    swal({  
        title: "Are you sure?",
        text: "Do you want to Raise Request for the Student?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function(isConfirm){
        if(isConfirm){
        $.ajax(
        {
            method:'POST',
            dataType:'JSON',
            data:data,
            url:'<?=base_url()."Registration/update_students_raise_request"?>',
            success:function(res)
            {
                if(res)
                {
                    swal({
                      title:'Requeted',
                      text:'Request Raised Successfully',
                      type:'success',
                      confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ok!",
                    },function(isConfirm){
                        window.location.reload();
                    })
                }
            }
        })
      }
    })
    
  }else
  {
    // console.log(requestflag);
    swal('Requested','Request Already Raised for This Student','error');

  }

}

$("#emis_class_id").change(function()
    {
        //alert('sample');
        var class_id = $(this).val();
        if(class_id ==11 || class_id ==12)
    {   
        // console.log('if');
        $(".group").show();
        get_group(class_id.substr(1,2),null);

    }else
    {
        $(".group").hide();
    }

        get_stu_section(class_id,null);
    })

    function get_stu_section(class_id,section_id)
    {
  // alert(section_id);

      if(class_id !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Home/get_school_section_details',
        data:{'class_id':class_id},
        success: function(resp){
        // alert(resp);  
       
        var section = JSON.parse(resp);
        console.log(section);
            $(".section_det").empty('');            

        var section_drop = '<select name="emis_reg_stu_section" class="form-control" id="emis_reg_section_id">';

        section_drop += '<option value="0">பிரிவு</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $(".section_det").append(section_drop); 
            // alert(section_id);
            if(section_id !='' && section_id !=null){
            $("#emis_reg_section_id").val(section_id).attr('selected','selected');   
            }else
            {
                // console.log('else');
                $("#emis_reg_section_id").val(0).attr('selected','selected');
            }      
         },
          
    })
    }
    }

    function get_group(class_id,group_id)
    {
        // alert(group_id);

        $.ajax({
        type: "POST",
        url:baseurl+'Home/get_common_tables',
        data:{'class_id':class_id,'table':'baseapp_group_code','where_col':'group_description'},
        success: function(resp){

    $(".group_det").empty('');  
            // $(".group").show();


        var group_drop = '<select name="emis_reg_grup_code" class="form-control" id="emis_reg_grup_code_ad">';

        group_drop += '<option value="">Select Group</option>';
        $.each(JSON.parse(resp),function(id,val)
        {
            group_drop +='<option value='+ val.id +'>'+val.group_code+'-'+val.group_name+'</option>';
        })
            group_drop +='</select>';
            
            $(".group_det").append(group_drop); 
            // console.log(group_id);
            if(group_id !='' && group_id !=null){
            $("#emis_reg_grup_code_ad").val(group_id).attr('selected','selected');   
            }else
            {
                // console.log('else');
                $("#emis_reg_grup_code_ad").val(0).attr('selected','selected');
            }  
        }

        })
    }


    


    
</script>
    </body>

</html>