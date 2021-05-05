
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
<style> 
.center 
{
text-align: center;
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
                                         <h1>Dashboard
                                         <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Block/emis_teaching_schoolwise_block';?>">
                                              <span class="text">Teaching Staff</span>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Block/emis_nonteaching_schoolwise_block';?>">
                                              <span class="text">Non-Teaching Staff</span>
                                            </a>
                                          </li>
                                          <li role="presentation" class="next">
                                                                              <a href="<?php echo base_url().'Block/emis_teacher_classwise_block';?>">
                                              <span class="text" >Government Teaching Staff By Grade</a></span>
                                          </a>
                                          </li>
                                                </ul>
                                            </div>
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
                             <div class="page-content">
                                <div></div> 
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                           <div class="page-content-inner">

                                     <div class="portlet-body">
                                     
                                          <div class="portlet light">
                                            <form action="<?php echo base_url().'Block/emis_teacher_classwise_block/?block_id='.$block_id?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                       
                                                        <div class="col-md-8" >
                                                         
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
                                              <?php if($cate!=""){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5> <b>Selected Category :</b>  <?=$cate!=''?implode(",",$cate):'';?></h5>
                                                        
                                                    </div>
                                                </div>
                                              <?php  }
$total1 = [];
                                               ?>
                                            </div>
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Teaching Staff Details By Grade-Schoolwise | <span>Block : 
                                                         <?php echo $details[0]->block_name; ?></span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">
<?php $Govteacher=0;$BTteacher=0;$SGteacher=0;$PGteacher=0; ?>
                                                 
                                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;">S.No</th>
                                                            <th>School</th>    
                                                            <th style="text-align: center;">HM</th>     
                                                            <th style="text-align: center;">PG - Teacher</th>
                                                            <th style="text-align: center;">BT - Teacher</th>               
                                                            <th style="text-align: center;">SG- Teacher</th>
                                                          
                                                            <th style="text-align: center;">Others</th>
                                                            <th style="text-align: center;">Total</th>
                                                            <!--<th>Total</th>-->
                                                            <!--<th>Total</th>-->
                                                            <!--<th>Total</th>-->
                                                                   
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(!empty($details)){ $total1 = []; $Govteacher_tot= [];$BTteacher_tot= [];$SGteacher_tot= [];$PGteacher_tot= [];$others_tot=[]; $HM_tot=[]; $i=1; foreach($details as $det){ 
                                                         ?>
                                                        <tr>
                                                            <td style="text-align: center;"><?php echo $i;?></td>
                                                           <td><a onclick="#"><!--savedistrictid('<?php echo $det->block_id; ?>')-->
                                                            <?php echo $det->school_name; ?></td></a>
                                                            <td style="text-align: center;"><?php echo number_format($det->HM);?></td>
                                                            <td style="text-align: center;"> <?php echo number_format($det->PGteacher); ?></td>

                                                            <td style="text-align: center;"> <?php echo number_format($det->BTteacher); ?></td>
                                                            <td style="text-align: center;"> <?php echo number_format($det->SGteacher); ?></td>
                                                           
                                                            <td style="text-align: center;"> <?php echo number_format($det->Others); ?></td>
                                                             <td style="text-align: center;"> <?php echo number_format($det->Govteacher); ?></td>
                                                            <!--<td> <?php echo number_format($det->total); ?></td>-->
                                                        </tr>
                                                        <?php $i++ ?>
                                                         <?php  

                                                            array_push($Govteacher_tot,$det->Govteacher);
                                                            array_push($BTteacher_tot,$det->BTteacher);
                                                            array_push($SGteacher_tot,$det->SGteacher);
                                                            array_push($PGteacher_tot,$det->PGteacher);
                                                            array_push($HM_tot,$det->HM);
                                                            array_push($others_tot,$det->Others);
                                                           
                                                       } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                      <tfoot>
                                                                <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                             <th style="text-align: center;"><?php 
                                                            $HM_tot = array_sum($HM_tot);
                                                                array_push($total1,$HM_tot);
                                                                echo number_format($HM_tot);?></th>

                                                                 <th style="text-align: center;"><?php 
                                                             $PGteacher_tot = array_sum($PGteacher_tot);
                                                                array_push($total1,$PGteacher_tot);
                                                           echo number_format($PGteacher_tot);?></th>

                                                            <th style="text-align: center;"><?php 
                                                                $BTteacher_tot = array_sum($BTteacher_tot);
                                                                array_push($total1,$BTteacher_tot);
                                                            echo number_format($BTteacher_tot);?></th>  

                                                            <th style="text-align: center;"><?php 
                                                            $SGteacher_tot = array_sum($SGteacher_tot);
                                                                array_push($total1,$SGteacher_tot);
                                                                echo number_format($SGteacher_tot);?></th>
                                                           
                                                           
                                                           
                                                           <th style="text-align: center;"><?php 
                                                            $others_tot = array_sum($others_tot);
                                                                array_push($total1,$others_tot);
                                                           echo number_format($others_tot);?></th>
                                                             <th style="text-align: center;"><?php 
                                                            $Govteacher_tot = array_sum($Govteacher_tot);
                                                            array_push($total1,$Govteacher_tot);
                                                            echo number_format($Govteacher_tot);?></th>
                                                          
                                                        </tr>
                                                            </tfoot> 
                                                </table>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

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
 

    <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
             <script type="text/javascript">
              $(document).ready(function(){ 
              $("#emis_state_report_schcate").change(function(){ 

               var emis_state_report_schcate = $("#emis_state_report_schcate").val();

      // $.ajax({
      //   type: "POST",
      //   url:baseurl+'State/get_school_management_data',
      //   data:"&emis_state_report_schcate="+emis_state_report_schcate,
      //   success: function(resp){
      //   // alert(resp);  
      //   $("#emis_state_report_schmanage").html(resp);  
      //   return true;              
      //    },
      //   error: function(e){ 
      //   alert('Error: ' + e.responseText);
      //   return false;  
        
      //   }
      //   });

  });  }); 

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_state_report_schcate").change(function(){
      return validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 
});   });

// $(document).ready(function(){  // function call for validate company name 
//     $("#emis_state_report_schmanage").change(function(){
//       return validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert'); 
// });   });


function checkmanagecate(){

var baseurl='<?php echo base_url(); ?>';

//var manage = validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert');
var cate = validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 

//var manage1=$("#emis_state_report_schmanage").val();
var cate1 = $("#emis_state_report_schcate").val();

if(cate == 0 ){
    return false;
}

  $.ajax({
        type: "POST",
        url:baseurl+'State/savereport_schoolcatemanage',
        data:"&cate="+cate1,
        success: function(resp){
        // alert(resp);  
        // location.reload(true);
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
       
}

function remove_catefilter(){

  $.ajax({
        type: "POST",
        url:baseurl+'State/deletereport_schoolcatemanage',
        data:"&test=1",
        success: function(resp){
        // alert(resp);  
        location.reload(true);
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
}

$('#emis_state_report_schmanage').click(function () {    
        console.log(this.checked,$('input:checkbox').find(".school_manage").find());
     $('input:checkbox').prop('checked', this.checked);
     if(this.checked){    
     console.log($(this).val());
     }
 });

$("#select_all").change(function(){ 
 //"select all" change 
    $(".emis_state_report_schcate").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});

//".checkbox" change 
$('.emis_state_report_schcate').change(function(){ 
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(false == $(this).prop("checked")){ //if this item is unchecked
        $("#select_all").prop('checked', false); //change "select all" checked status to false
    }
    //check "select all" if all checkbox items are checked
    if ($('.emis_state_report_schcate:checked').length == $('.checkbox').length ){
        $("#select_all").prop('checked', true);
    }
});


 </script>  


    </body>

</html>