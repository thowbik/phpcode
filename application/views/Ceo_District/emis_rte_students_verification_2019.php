
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
.panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}

.myImg:hover {opacity: 0.7;}
body.modal-open {
    overflow-y: hidden !important;
    position: fixed;
}
   .clickable{
    cursor: pointer;   
}
.sweet-alert {
    background-color: #ffffff;
    width: 478px;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
   
    left: 50%;
    top: 10%;
    margin-left: -256px;
    margin-top: -250px!important;
    
    display: none;
    z-index: 100000!important;
    overflow-y: hidden !important;
    position: fixed!important;
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
	   <div class="container">
   
 

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md" style="width:1015px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="sch_id"></h4>
       <!--<h4 class="modal-title" id="hid" value=""></h4>-->
        </div>
        <div class="modal-body">
          <div class="row">
            <center>
            <div id="stu_img"></div>
          </center>
          </div>
          <br/>
          <div class="row">
            <div class="col-md-3">
              <label> DOB Proof</label>
              <div id="dob_proof"></div>
            </div>
            <div class="col-md-3">
              <label> Parent ID Proof</label>
              <div id="parent_proof"></div>
            </div>
            <div class="col-md-3">
              <label>Address Proof</label>
              <div id="address_proof"></div>
            </div>
            <div class="col-md-3">
              <label>Other Certificate Proof</label>
              <div id="other_proof"></div>
            </div>
          </div>
          <div class="row">
                                <div class="col-md-6">
                                                   <label class="control-label">Students Verification *</label>
                                                    <div class="form-group">
                                                   
                                                        <div class="">
                                                            <select class="form-control" data-placeholder="Choose a Category"  id="verifie" name="verifie" required>
                                                          <option value="" style="color:#bfbfbf;">Select</option>
                                                          <option value="1">Eligible</option>
                                                          <option value="2">Not-Eligible</option>
                                                          <option value="3">Missing Document</option>
                                                          
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_gender_alert"></div></font>
                                                        </div>
                                                      
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 verifi_grp" id="2">
                                                   <label class="control-label">Students Verification *</label>
                                                    <div class="form-group">
                                                   
                                                        <div class="">
                                                            <select class="form-control " data-placeholder="Choose a Category"  id="reason" name="reason" required>
                                                          <option value="" style="color:#bfbfbf;">Select</option>
                                                          <option value="1">Invalid Document</option>
                                                          <option value="2">Incorrect Residence</option>
                                                          <option value="3">Others</option>
                                                          
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_gender_alert"></div></font>
                                                        </div>
                                                      
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                      <div class="col-md-6" >
                                                  <label class="control-label">Remarks *</label>
                                                    <div class="form-group ">
                                                    
                                                        <div class="">
                                                            <input type="text" class="form-control" id="remarks" name="remarks">
                                                            <!--<p>Name followed by Initial Eg. Ganesh R</p>-->
                                                             <font style="color:#dd4b39;"><div id="emis_reg_stu_name_alert"></div></font>
                                                             <!--மாணவர் பெயர் ஆங்கிலம்-->
                                                        </div>
                                                    </div> 
                                        </div>
                                      </div>
                                      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" onclick="return save();"class="btn btn-primary">Save</button>
          <div id="err_msg"></div>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
  
</div>

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('Ceo_District/header.php'); ?>

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
                                     

                                       
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
														                                <i class="fa fa-globe"></i>RTE Students List  - <?=$dist_id;?><span> </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                       
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
																	 <th class=" center">Student Name</th>
                                   <th class=" center">Address</th>
                                   <th class=" center">Category</th>

                                                                     
                                     <th class=" center">Verifi Status</th>
                                     <th class=" center">Reason</th>
                                     <th class=" center">Remarks</th>
																	   
                                                                    
                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php if(!empty($rte_stu_list)){ 
                                                              // print_r($rte_stu_list);
															foreach($rte_stu_list as $index=> $sd){   
                                // echo $sd->teach_status;
                                // echo $sd->address;
                                ?>

                                  <tr>
                                    <td class="center"><?=$index+1;?></td>
																    <td class="center"><a href="javascript:void(0);" onclick="openmodel('<?=$sd->id?>','<?=$sd->Student_Name;?>');"><?=$sd->Student_Name;?></a></td>
                                    <td><?=$sd->address;?></td>
                                    <td><?=$sd->category;?></td>
                                    
                                    <td class="center">
                                      
                                      <?php 

                                        switch ($sd->verify_status) {
                                          case 1:
                                            echo 'Eligible';
                                            break;
                                          case 2:
                                            echo 'Not-Eligible';
                                            break;
                                            case 3:
                                            echo "Missing Document";
                                            break;
                                          default:
                                            
                                            break;
                                        }
                                      ?>
                                    </td>
																    <td class="center">
                                      <?php 

                                        switch ($sd->reason) {
                                          case 1:
                                            echo 'Invalid Document';
                                            break;
                                          case 2:
                                            echo 'Incorrect Residence';
                                            break;
                                            case 3:
                                            echo "Others";
                                            break;
                                          default:
                                            
                                            break;
                                        }
                                      ?>                
                                    </td>
                                    <td class="center"><?=$sd->remarks?></td>
                                  </tr>
                                                                <?php  }  ?>
                                                                
                                                      
                                                            </tbody>
                                                           <!-- <tfoot>
                                                                <th colspan="2" class="center">Total</th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>

                                                            </tfoot>-->
                                                            <?php } ?>
                                                        </table>

                                                        
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
        <div id="imageModal" class="modal" style="text-align: center;">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01" width="66%">
  <div id="caption"></div>
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
        </script>
             
<script type="text/javascript">
  $(document).ready(function(){ 
  $("#emis_state_report_schcate").change(function(){ 

    var emis_state_report_schcate = $("#emis_state_report_schcate").val();

      $.ajax({
        type: "POST",
        url:baseurl+'State/get_school_management_data',
        data:"&emis_state_report_schcate="+emis_state_report_schcate,
        success: function(resp){
        // alert(resp);  
        $("#emis_state_report_schmanage").html(resp);  
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

  });  }); 

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_state_report_schcate").change(function(){
      return validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_state_report_schmanage").change(function(){
      return validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert'); 
});   });


function checkmanagecate(){

var baseurl='<?php echo base_url(); ?>';

var manage = validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert');
var cate = validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 

var manage1=$("#emis_state_report_schmanage").val();
var cate1 = $("#emis_state_report_schcate").val();

if(manage == 0 || cate == 0){
    return false;
}

  
       
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

$(document).ready(function()
{
    _dataTable('#sample_3');
});

function _dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Bfrtip',
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
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
            // console.log(column.data());
            var  sum = column
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
               
            
            $(column.footer()).html();
                        });
            }
        });
    }
        </script>

        <script>
          var rte_lists = <?=json_encode($rte_stu_list);?>;
          $(".verifi_grp").hide();
          $(".verifi_grp1").hide();
          var verifie = '';
          var reason = '';
          var rte_id = '';
          function openmodel(id,name)
          {
            // console.log(id);
              $("#sch_id").text(name);
              rte_id=id;
              rte_list = rte_lists.filter(rte=>rte.id==id)[0];
              console.log(rte_list);
              $("#verifie").val(rte_list.verify_status).attr('selected','selected');
              if(rte_list.verify_status ==2){
                $(".verifi_grp").show();
                console.log(rte_list.reason);
              $("#reason").val(rte_list.reason).attr('selected','selected');
              }
              $("#stu_img").html('<img src='+rte_list.photo+' width="150px" height="175px" alt="no-image" onerror=this.onerror=null;this.src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" class="myImg" onclick="image_zoom('+"rte_list.photo"+');">');
              $("#dob_proof").html('<img src='+rte_list.proof_of_birth+' width="150px" height="175px" alt="no-image" onerror=this.onerror=null;this.src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg"  class="myImg"  onclick="image_zoom('+"rte_list.proof_of_birth"+');"> ');
              $("#parent_proof").html('<img src='+rte_list.parent_id+' width="150px" height="175px" alt="no-image" onerror=this.onerror=null;this.src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg"  class="myImg" onclick="image_zoom('+"rte_list.parent_id"+');">');
               $("#address_proof").html('<img src='+rte_list.address_proof+' width="150px" height="175px" alt="no-image" onerror=this.onerror=null;this.src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg"  class="myImg" onclick="image_zoom('+"rte_list.address_proof"+');">');
                $("#other_proof").html('<img src='+rte_list.other_certifi+' width="150px" height="175px" alt="no-image" onerror=this.onerror=null;this.src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg"  class="myImg" onclick="image_zoom('+"rte_list.other_certifi"+');">');
              $("#remarks").val(rte_list.remarks);

              $("#myModal").modal('show');
          }

          function image_zoom(image)
          {
            console.log(image); 
            $("#img01").attr('src',image);
            $("#imageModal").modal('show');
          }

          $("#verifie").change(function()
          {
              $('.verifi_grp').hide();
              $('.verifi_grp1').hide();

              verifie = $(this).val();
              if(verifie==2)
              {
                  $("#"+verifie).show();
              }else
              {
                // $("#reason").val('');
                reason = '';
                $("#remarks").val('');
              }
          })

          $("#reason").change(function()
          {
              $(".verifi_grp1").hide();
              reason = $(this).val();
              $("#"+reason).show();
          })

          function save()
          {
            var remarks = $("#remarks").val();
            $("#err_msg").html('');
            console.log(verifie,reason,remarks,rte_id);
            if(verifie=='')
            {
              $("#err_msg").html('<p style="color:red">Please Select The Verification</p>');

            }else if(verifie==2 && reason=='')
            {
              $("#err_msg").html('<p style="color:red">Please Select The Reason</p>');

            }else if(remarks=='')
            {
              $("#err_msg").html('<p style="color:red">Please Enter The Remarks</p>');

            }else
            {
              swal({
                title: "Are you sure?",
                text: "Students RTE Verification",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Yes, Submit!",
                cancelButtonText:'Save',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(isConfirm){
                if (isConfirm)
                {
                  var data = {'records':{'id':rte_id,'verify_status':verifie,'reason':reason,'remarks':remarks}};

                  $.ajax({
                    method:"POST",
                    dataType:"JSON",
                    url:"<?=base_url().'Ceo_District/save_rte_verification'?>",
                    data:data,
                    success:function(res)
                    {
                        if(res)
                        {
                          swal({
                title: "Successfully Updated RTE Verification!",
                type: "success",
                showCancelButton: false,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "ok!",


            }, function(isConfirm){
                if (isConfirm)
                {
                  window.location.reload();
                }
              })
                        }
                    }
                  })
                }
              })
            }
          }


        </script>
        <!-- <script>

var modal = document.getElementById("imageModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script> -->


    </body>

</html>