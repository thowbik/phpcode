<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style>
        .dashboard-stat2 {
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;
    background: #fff;
    padding: 15px 15px 14px !important;
}
    .dashboard-stat2 .display {
    margin-bottom: 2px !important;
}
.bottom
{
  border-bottom: 1px solid gray;
}
.bs-callout-lightsteelblue {
    border-left: 8px solid lightsteelblue;
    border-radius: 3% !important;
}
.bs-callout-darkseagreen {
    border-left: 8px solid darkseagreen;
    border-radius: 3% !important;
}
.bs-callout-mediumaquamarine {
    border-left: 8px solid mediumaquamarine;
    border-radius: 3% !important;
}
.bs-callout-lightblue {
    border-left: 8px solid lightblue;
    border-radius: 3% !important;
}

.x_panel
{
      padding: 0px 8px !important;
}
.x_title {
    border-bottom: 2px solid #E6E9ED;
    margin: 0px -7px 0px;
    margin-bottom: 10px;
}
.khaki
{
  background-color: khaki;
  color: black;
}
.lightgrey
{
  background-color: lightgrey;
  color: black;

}
.lightyellow
{
  background-color: #f3a84ea6;
  color: black;

}
.lightgreen
{
  background-color: #ceeabf;
  color: black;

}
    </style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('state/header.php'); ?>

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
                                        <h1>Dashboard
                                           
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

                                     <div class="portlet-body">

                                          <div class="portlet light">
                                            <form action="<?php echo base_url().'State/school_sanitation_verification_district?dist_id='.$district_id?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2" style="width:6%;padding-top:5%;">

                                                            All <input type="checkbox" id="emis_state_report_schmanage"  value="all" name="school_manage">
                                                        </div>
                                                        <div class="col-md-8" >
                                                            
                                                              <div class="form-group" style="padding: 10px;padding-left: 8%">
                                                                <label class="control-label bold">
                                                                School Management</label><br/>
                                                                <?php //print_r($data['cate']); ?>
                                                                 <?php  foreach($getmanagecate as $det){ 

                                                                 ?>
                                                                 
            <input type="checkbox" name="school_manage[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off" <?php if($det->manage_name== $this->input->get('magt_type') && count($manage) == '0'){ 
                    echo ($det->manage_name== $this->input->get('magt_type') && count($manage) == '0'? 'checked' : '');
            }
            else  if($this->input->get('magt_type')=='' && count($manage) == '0')
            {
             echo ($det->manage_name== 'Government' && count($manage) == '0'? 'checked' : '');   
            } ?>  value="<?=$det->manage_name;?>"/><span class="label-text" ><?=$det->manage_name;?></span>&nbsp;
            
                                                                  <?php }  ?>
                                                            
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>    
                                                              
                                                              <div style="padding: 4px;padding-left: 8%;margin-top: -2%;" class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                 School Category </label>&nbsp;&nbsp;<input type="checkbox" id="select_all"/>Category All<br/>
                                                                <?php if(!empty($getsctype))
                                                                {
                                                                    foreach($getsctype as $school_type)
                                                                    {?>
                                                                
<input type="checkbox"  class="emis_state_report_schcate" name="school_cate[]" id="emis_state_report_schcate" autocomplete="off" value="<?=$school_type->category_name;?>" <?php echo (count($cate) == '0'? 'checked' : '');?>/><span class="label-text"><?=$school_type->category_name;?></span>

&nbsp;
                                                                <?php } ?>  <?php }?>
                                                              
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
                                                        <h5><b>Selected School Management :</b><?=implode(",",$manage);?> <b>Selected Categoty :</b>  <?=$cate!=''?implode(",",$cate):'';?></h5>
                                                        
                                                    </div>
                                                </div>
                                              <?php  }
$total1 = [];
                                               ?>
                                            </div>

       
                                                
                                           <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                             <i class="fa fa-globe"></i>School WASH Details - Verification Report</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">

                                                       <?php $c1_tot=0;$c2_tot=0;$c3_tot=0;$c4_tot=0;$c5_tot=0;$c6_tot=0;$c7_tot=0;$c8_tot=0;$c9_tot=0;$c10_tot=0;$c11_tot=0;$c12_tot=0; ?>
                                                    
                                                           <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th >S.No</th>
                                                                  <th>Block Name</th>
                                                                    <th>UDISE<br/>Code</th>
                                                                    <th>School Name</th>
                                                                    <th>Total<br/>Boys</th>
                                                                    <th>Boys<br/>Toilets<br/>in Use</th>
                                                                    <th>Boys<br/>Toilets<br/>Not in Use</th>
                                                                    <th>Total<br/>Girls</th>
                                                                    <th>Girls<br/>Toilets<br/>in Use</th>
                                                                    <th>Girls<br/>Toilets<br/>Not in Use</th>
                                                                    <th>Handwash<br/>Stations<br/>in Use</th>
                                                                    <th>Handwash<br/>Stations<br/>Not in Use</th>
                                                                    <th>Drinking<br/>Water<br/>available</th>
                                                                     <th>Water<br/>Source</th>
                                                                     <th>Incinerator</th>
                                                                     <th>Incinerator<br/>Auto-<br/>Available<br/>Count</th>
                                                                     <th>Incinerator<br/>manual-<br/>Available<br/>Count</th>
                                                                      <th>Incinerator<br/>Auto-<br/>functional<br/>Count</th>
                                                                     <th>Incinerator<br/>manual-<br/>functional<br/>Count</th>
                                                                    <!--<th>Verified</th>-->

                                                                </tr>
                                                                </thead>
                                                               
                                                                 
                                                            <?php $i=1; $total1 = []; if(!empty($school_land_verification)){
                                                            $tot=[];  foreach($school_land_verification as $det){ 
                                                              
                                                             ?>

                                                                <tr>
                                                                    <td><?php echo $i;?></td>
                                                                  <td style="text-align: center;"><?=$det->block_name;?></td>
                                                                   <!---->
                                                                   <td style="text-align: center;"><?=$det->udise_code;?></td>
                                                                   <td style="text-align: left;"><?=$det->school_name;?></td>
                                                                   <td style="text-align: left;"><?=$det->total_b?></td>
                                                                   <td style="text-align: center;"> <?=$det->toil_bys_inuse;?></td>
                                                                   <td style="text-align: center;"> 
                                                                  <?php  echo $det->toil_notuse_bys?>
                                                                  </td>
                                                                  <td style="text-align: center;"> <?=$det->total_g;?></td>
                                                                   <td style="text-align: center;"> <?=$det->toil_inuse_grls;?></td>
                                                                   <td style="text-align: center;"> <?=$det->toil_notuse_grls;?></td>
                                                                   <td  style="text-align: center;"> <?php 
                                                                 echo $det->tot_handwash_bys;?></td>
                                                                   <td style="text-align: center;"> <?=$det->tot_handwash_grls;?></td>
                                                                   <td style="text-align: center;"> <?php 
                                                                   if($det->drnkwater_avail==0)
                                                                    {
                                                                        echo "NO";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "YES";
                                                                    }
                                                                  ?> </td>
                                                                   <td style="text-align: center;"> <?php
                                                                    if($det->drnkwater_source==-1)
                                                                    {
                                                                        echo "Others";
                                                                    }
                                                                    else if($det->drnkwater_source==1)
                                                                    {
                                                                        echo "Hand Pumps";
                                                                    }
                                                                    else if($det->drnkwater_source==2)
                                                                    {
                                                                        echo "Well";
                                                                    }
                                                                    else if($det->drnkwater_source==3)
                                                                    {
                                                                        echo "Tap Water";
                                                                    }
                                                                    else if($det->drnkwater_source==4)
                                                                    {
                                                                        echo "RO Purifier";
                                                                    }
                                                                    ?></td>
                                                                  <!--  <td style="text-align: center;"><input type="checkbox" name=""></td>-->
                                                                    <td style="text-align: center;"> <?php
                                                                    if($det->incinerator==0)
                                                                      {
                                                                        echo "NO";
                                                                      }
                                                                      else
                                                                      {
                                                                        echo "Yes";
                                                                      }
                                                                      ?></td>
                                                                   <td style="text-align: center;"> <?=$det->inci_auto_avail_no;?></td>
                                                                   <td style="text-align: center;"> <?=$det->inci_man_avail_no;?></td>
                                                                   <td style="text-align: center;"> <?=$det->inci_auto_func_no;?></td>
                                                                   <td style="text-align: center;"> <?=$det->inci_man_func_no;?></td>
                                                                    
                                                                </tr>
                                                                <?php $i++;?>
                                                                  <?php 
                                                           
                                                        }?>
                                                             
                                                       
                                                            </tbody>
                                                            <tfoot>
                                                               
                                                               
                                                            </tfoot> 
                                                              <?php } ?>
                                            </table>
                           
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar">
                                        <!-- BEGIN THEME PANEL -->
                           
                                        <!-- END THEME PANEL -->
                                    </div>
                                    <!-- END PAGE TOOLBAR -->
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
               function savestudentid1(value){
                var baseurl='<?php echo base_url(); ?>';
                $.ajax({
                type: "POST",
                url:baseurl+'Home/savestudentidsession',
                data:"&studid="+value,
                success: function(resp){ 
                if(resp==true){    
                window.open(baseurl+'Home/emis_student_profile1','_blank');
                 }
                 return true;  
                         
                 },
                error: function(e){ 
                return false;  

                }
                });
               }
              </script>
    </body>
<script type="text/javascript">
  var cls_id = 0;
    $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    }
})

$(document).ready(function(){
  cls_id = $('#cls_id').val();
  var section_id  =0;
 section_id = <?php echo json_encode($section_id,JSON_PRETTY_PRINT);?>;
  get_section(cls_id,section_id);

})
    $(document).on('change','#cls_id',function()
{
    cls_id = $(this).val();
    get_section(cls_id,section_id);
    // var school_id = $("#school_code").val();
    

})
    function get_section(cls_id,section_id)
    {
  // alert(section_id);

      if(cls_id !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'Home/get_school_section_details',
        data:{'cls_id':cls_id},
        success: function(resp){
        // alert(resp);  
       
        var section = JSON.parse(resp);
        console.log(section);
        var section_drop = '<select name="section_id" class="form-control" id="section_id">';
        section_drop += '<option value=0>All</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $("#section").empty('');            
            $("#section").html(section_drop); 
            // alert(section_id);
            if(section_id !=0){
            $("#section_id").val(section_id).attr('selected','selected');   
            }      
         },
          
    })
    }
    }
    function cls_validation()
{
    // alert();
    var cls_id = $("#cls_id").val();
    // console.log(cls_id);
    // var section = $("#section_id").val();
    // console.log(section);
    if(cls_id =='0')
    {
        var msg = '<span style="color:red;">You must select your Class!</span><br /><br />';
                    document.getElementById('msg').innerHTML = msg;
                    return false;
    }else
    {
        return true;
    }
}

</script>
</html>