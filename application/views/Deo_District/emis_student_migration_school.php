
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
            

  <?php $this->load->view('Deo_District/header.php'); ?>

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
                                <!--    <div class="page-title">
                                        <h1>Students-Common Pool Report
                                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist" style="width:max-content">
                                             <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/get_block_migration'?>">
                                              <span class="text">School Type</span><br/>
                                            </a>
                                          </li>
                                           <li role="presentation">
                                            <a href="<?php echo base_url().'Ceo_District/get_block_migration_reason'?>">
                                              <span class="text">Transfer Reason</span>
                                            </a>
                                          </li>
                                          
                                                </ul>
                                            </div>
                                        </h1>
                                    </div>-->
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
                          
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>Students in Common Pool-School wise | Block :<?php echo $student_migration_details[0]->block_name;?> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                          <?php $Government=0;$fullyaid=0;$unaidteachtot=0;$PartiallyAided=0;$CentralGovt=0; ?>
                              <table class="table table-striped table-bordered table-hover" id="sample_2">
                              <thead>
                              <tr>
                              <th style="text-align: center;">S.No</th>
                              
                              <th style="text-align: center;">Unique ID</th> 
                              <th>Name</th> 
                             
                              <th style="text-align: center;">Class</th>
                                <th style="text-align: center;">Gender</th>
                              <th style="text-align: center;">Father Name</th>
                              <th style="text-align: center;">Phone Number</th>
                              <th style="text-align: center;">UDISE Code</th>

                              <th style="text-align: center;">School Name</th>

                            <!--  <th style="text-align: center;">School Types</th>-->
                              <th style="text-align: center;">Transfer Reason</th>
                              <th style="text-align: center;">Remarks</th>

                                <th style="text-align: center;">Action</th>
                             
                              <!--<th>Total</th>-->
                                                                   
                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($student_migration_details)){ $Gov_tot= [];$FA_tot= [];$UA_tot= [];$PA_tot= []; $CG_tot= []; $i=1;foreach($student_migration_details as $key){ ?>
                              <tr>
                               <td style="text-align: center;"><?php echo $i;?></td>
                              
                               <td> <?php echo  $key->unique_id_no; ?></td>
                               <td> <?php echo  $key->NAME;?>
                                  <input type="hidden"value="<?=$key->id;?>">
                               </td>
                             
                               <td  style="text-align: center;" > <?php echo  $key->class_studying_id;?></td>
                                <td  style="text-align: center;" > <?php echo $key->gender==1?'Male':'Female'; ?></td>
                               <td  style="text-align: center;" > <?php echo  $key->father_name;?></td>
                               <td  style="text-align: center;" > <?php echo  $key->phone_number;?></td>
                               <td  style="text-align: center;" > <?php echo  $key->udise_code;?></td>
                               <td > <?php echo  $key->school_name; ?></td>
                              <!-- <td > <?php echo  $key->school_type; ?></td>-->
                               <td > <?php echo  $key->Reason; ?></td>
                               <td > <?php echo  $key->remarks; ?></td>
                              <td>
                             <button class="btn green" id="editdata">EDIT</button>
                             <!-- <span class="editdata"><i class="fa fa-pencil-square-o"></i></span>-->
                            </td>
                            
                              <!--<td> <?php echo number_format($det->total); ?></td>-->
                              </tr>
                              <?php $i++;?>

                                                        <?php
                                                           
                                                       } ?>
                                                        
                                                 
                                                        <?php } ?>
                            </tbody>
                                                         <tfoot>
                                                          
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
 

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
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
   
  
    var tempIndx = -1;
    var rowIdx = -1;
    var RTE_lists = <?=json_encode($student_migration_details);?>;
    var rte_list = '';

     $("#sample_2").on('click','#editdata',function()
    {

        rowIdx = $(this).closest('tr').index();

          if(tempIndx!='-1')
          {
          // $('#sample_2').find('tbody').find('tr').eq(local_i).find('td').eq(11).text(remarks);
      
          var save_data = '<button type="submit" class="btn green" id="editdata">SUBMIT</button>';
          $("#sample_2").find('tbody tr:eq('+tempIndx+')').find('td:eq(11)').html(save_data);
          $("#sample_2").find('tbody tr:eq('+tempIndx+')').find('td:eq(10)').text(remarks);
        //  $("#sample_2").find('tbody tr:eq('+tempIndx+')').find('td:eq(9)').text(Reason);

          }
   
          var save_data = '<button class="btn green" onclick="update_data(rowIdx);">Save</button><br/><button class="btn red" onclick="Cancel(rowIdx);">Cancel</button>';
          
          $("#sample_2").find('tbody tr:eq('+rowIdx+')').find('td:eq(11)').html(save_data);

          var remarks = "<select name='remarks' id='remarks' class='form-control'>";
     remarks +="<option value=''>Select group</option> <option value='Admitted To Another School'>Admitted To Another School</option><option value='Moved out of state'>Moved out of Town / state</option><option value='Joined ITI/Polytechneic/College/Madrasa'>Joined ITI/Polytechnic/College</option><option value='Dropped Out'>Dropped Out</option><option value='Duplicate Entry'>Duplicate Entry</option><option value='Tutorial After 10th'>Tutorial After 10th</option></option><option value='Student Died'>Student Died</option><option value='IED Home based'>IED Home based</option>";
       remarks +="</select>";
          $("#sample_2").find('tbody tr:eq('+rowIdx+')').find('td:eq(10)').html(remarks);
         // var Reason = "<select name='Reason' id='Reason' class='form-control'>";
      //Reason +="<option value=''>Select group</option> <option value=1>Long Absent</option><option value=2>Transfer Request by Parents</option><option value=3>Terminal Class</option><option value=4>Dropped Out</option><option value=5>Student Died</option><option value=6>Duplicate EMIS Entry</option>";
      
    
    //  Reason +="</select>";
         // $("#sample_2").find('tbody tr:eq('+rowIdx+')').find('td:eq(9)').html(Reason);

           

         // var remarks = $('input:text[name="remarks"]').filter('[value="'+rte_list.remarks+'"]').attr('checked', true);

        tempIndx = rowIdx;

    })
    
</script>
<script type="text/javascript">
  function Cancel(i)
  {
    window.location.reload();
  }
    function update_data(i)
    {
         var remarks =$("#remarks").val();
         var Reason =$("#Reason").val();
        
         var unique_id_no = $("#sample_2").find('tbody tr:eq('+rowIdx+')').find('td:eq(1)').find('input').val();
          var id = $("#sample_2").find('tbody tr:eq('+rowIdx+')').find('td:eq(2)').find('input').val();
            
      if(remarks !='' && Reason !=''){
              swal({
          title: "Do You Want Save!",
          text: "",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-primary",
          confirmButtonText: "Yes",
          closeOnConfirm: false,
          showLoaderOnConfirm: true,
        },
        function(){
          var unique_id_no = $("#sample_2").find('tbody tr:eq('+i+')').find('td:eq(1)').find('input').attr('id');
          unique_id_no = $("#"+unique_id_no).val();
          var datas = {'id':id,'remarks':remarks,'unique_id_no':unique_id_no};
          $.ajax(
          {
            method:'POST',
            dataType:'JSON',
            url:'<?=base_url().'Home/save_common_student_list'?>',
            data:datas,
            success:function(res)
            {
              console.log(res);
              if(res)
              {
                swal({  
                        title: "Success", 
                        type:'success',
                        text: "Successfully Saved",  
                        confirmButtonText: "ok", 
                        allowOutsideClick: "true" 
                    },
                      function()
                      {
                          window.location.reload();
                      }
                    );
                  swal('success','successfully Saved  student transfer history','success');
                  window.location.reload();
              }
             // else{
               //   window.location.reload();
              //}
            }
          })
        });
      }else
      {
       
        swal({
    title: "Required", 
    html:true,
    type:'error',
    text: "<b>Field Required</b>",  
    confirmButtonText: "ok", 
    allowOutsideClick: "true" 
});
      }
    }
</script>
             
    </body>

</html>