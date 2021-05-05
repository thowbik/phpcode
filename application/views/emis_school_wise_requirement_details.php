<!DOCTYPE html>
<html lang="en">
        <!-- BEGIN HEAD -->
    <head>
          <style type="text/css">
            
            .center
            {
                text-align: center;
            }
            .scrollable {
        height: 400px;
        overflow-y: scroll;

      }
            body.modal-open {
                overflow-y: hidden !important;
                position: fixed;
            }

.days { position: relative; }

.days::after { position: absolute;
                top: 7px;
                right: 3px;
                content: 'days';
}

.days:hover::after {
  right: 3px;
}

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
            
</style>

        <style type="text/css" media="print">
            @page { size: landscape; }
        </style>
        <style type="text/css" media="file">
            @page { size: landscape; }
        </style>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/js/croppie-VIT/croppie.css'?>" rel="stylesheet" type="text/css"/>

     <?php $this->load->view('head.php'); ?>        
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
              <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
               <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
               <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 9) { ?>
               <?php $this->load->view('Ceo_District/header.php'); }else if($this->session->userdata('emis_user_type_id') == 6) { ?>
               <?php $this->load->view('beo_Block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 10) { ?>
               <?php $this->load->view('Deo_District/header.php'); }else{ ?>
               <?php $this->load->view('header.php'); }?>
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


    <?php if($error = $this->session->flashdata('msg')){?>
      <p style="color:green;"><strong>Success</strong><?php echo $error;?><?php }?></p>
                                    <h1>School Needs
                                       <small>School Needs</small>
                                    </h1>
                                 </div>

                                 <!-- END PAGE TITLE -->
                                 <!-- BEGIN PAGE TOOLBAR -->
                                 <div class="page-toolbar">
                                   
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
                                    <br>
                                    
                                    <div class="tabcontent portlet-body" id="schoolstaff">
                                           
                                            <div class="row">
                                            
                                                <div class="col-md-12">
                                                    <div class="portlet box green">
                                                        <div class="portlet-title">
                                                                <!--<div class="caption">
                                                                <i class="fa fa-globe"></i>Teacher Details - List</div>-->
                           <div class="caption"> <i class="fa fa-globe"></i> School Needs  List </div>
                                                                <span class="pull-right" style="padding: 4px 2px;">
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#traineeModal" data-id=""><i class="glyphicon glyphicon-plus"></i> Add Needs CSR Details </button> </span>
                                                        <div class="tools"> </div>
                                                    </div>

                                                    <div class="portlet-body">
                                                            <br/><br/><br/>
                                                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                                    <thead>
                                                  <tr>
                                           <th style="text-align: center !important;">S.NO</th>
                                                <th style="text-align: center !important;">Items</th>
                                                                                 <th style="text-align: center !important;">Description</th>
      <th style="text-align: center !important;">Quantity</th>
                                                                            <th style="text-align: center !important;">Amount</th>
                                                                         <th>Contributers</th>
                                                                           <th style="text-align: center !important;">Updated On</th>
                                                                           <th>Status</th>
                                                                         
                                                                           
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i=1; foreach($school_details as  $ts) { 
                                                                            ?>
                                                                          <!--  <input type="text" value="<?php echo $ts->school_req_id;?>">  -->
                                                                        <tr>
                                                                            <td style="text-align: center !important;"><?php echo $i++; ?></td>
                                                                            <td><?php echo $ts->material_name; ?></td>
                                                                            <td style="text-align: left"><?php echo $ts->cat_name; ?></td> 
                                                                            <td style="text-align: center"><?php echo $ts->qty; ?></td> 
                                                                            <td style="text-align: right"> <?php $need = number_format($ts->req_amount)."<br>";?>
                                                                   <?php echo $need; ?></td>
                 <td><?php echo $ts->received_qty;?></td>
                                                          <td><?php echo date('d-m-Y', strtotime($ts->time));?></td> 
                                                             <!--  <input type="text" value="<?php echo $ts->req_id;?>"> -->
          <!--  <input type="text"  value="<?php echo $ts->req_id;?>" id="<?php echo 'fk_id'.$i;?>">    -->   
         <!--  <input type="text" value="<?php echo $ts->req_id;?>">    --> 
                                           <td> <button value="hello"  type="button" class="sample" id="<?php echo $ts->req_id;?>" data-toggle="modal" data-target="#file_modal"  data-todo ='{"req_id":"<?php echo $ts->req_id;?>"}'><i class="glyphicon glyphicon-edit" ></i> Edit </button></td>
                                                                        </tr>
                                                                      
                                                                       <?php } ?>
                                                                     
                                                                    
                                                              </tbody>
                                                                      <?php foreach($school_total_requirements as  $ts) { 
                                                                            ?>
                                                                       <tr><td><b></b></td><td></td><td></td><td></td><td><b>Total :  <?php $need = number_format($ts->req_amount)."<br>";?>
                                                                   <?php echo 'Rs.'.$need; ?></b></td><td></td><td></td></tr>
                                                                     <?php }?>

                                                            </table>                     
                                                    </div>
                                                </div>
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
      
         <!-- Modal -->
            <!------------------------Starts add Modal-------------------------->  
            <div class="modal fade" id="traineeModal"  role="dialog" aria-labelledby="traineeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form id="traineeModalForm" action="<?php echo base_url().'Home/save_school_needs/' ?>" method="post">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-md-11">
                                    <h3 class="modal-title" id="traineeModalLabel"></h3>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modalreset();">
                                            <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-body">
                            
                            <?php// Print_r($csr_material_master); ?>
                                   <div class="form-group col-md-12" >
                                   <div class="row" >
                                        <div class="col-md-12">
                                            <label class="control-label">Items Name </label>
                                                <select class="form-control" id="itemnames" name="itemname"  required="required">
                                                <option value="" >Choose</option>
                                                            <?php foreach($csr_material_master as $t){ ?>
                                                              <option value="<?php echo($t->id);?>"><?php echo($t->material_name); ?></option>  
                                                             <?php } ?>
                                                </select>
                                        </div>     
                                    </div>
                 
                                    <div class="row"  id="item">
                                    <div class="col-md-12">
                                                    <label>Items</label>
                                                    <input type="text" id="itemname1" name ="itemname1" class="form-control"  />
                                        </div>
                                    </div>
                                    <div class="row" > 
                                        <div class="col-md-4">
                                                    <label>Quantity</label>
                                                    <input type="text" id="Quantity" name ="Quantity" class="form-control" maxlength ="1"  />
                                        </div>
                                         <div class="col-md-4" id="cat">
                                                    <label>Category</label>
                                                    <select class="form-control" id="cate" name="cate" >
                                                <option value="" >Choose</option>
                                                            <?php foreach($cate as $c){ ?>
                                                              <option value="<?php echo($c->id);?>"><?php echo($c->cat_name); ?></option>  
                                                             <?php } ?>
                                                </select>
                                        </div>
                                         <div class="col-md-4" id="scat">
                                                    <label>Sub Category</label>
                                                        <select class="form-control" id="sub_cate" name="sub_cate" >
                                                <option value="" >Choose</option>
                                                            <?php foreach($sub_cate as $s){ ?>
                                                              <option value="<?php echo($s->id);?>"><?php echo($s->sub_cat_name); ?></option>  
                                                             <?php } ?>
                                                </select>
                                        </div>
                                         <div class="col-md-4" id="cate1">
                                                    <label>Category</label>
                                                     <input type="text" id="cate2" name ="cate2" class="form-control" readonly />
                                                     <input type="hidden" id="cate3" name ="cate3" class="form-control"  />
                                        </div>
                                         <div class="col-md-4" id="sub_cate1">
                                                    <label>Sub Category</label>
                                                        <input type="text" id="sub_cate2" name ="sub_cate2" class="form-control" readonly />
                                                        <input type="hidden" id="sub_cate3" name ="sub_cate3" class="form-control"  />
                                        </div>
                                         
                                    
                                   </div>
                                   </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="hide_id" name="hdid"  value="0" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="modalreset();">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!------------------------End add Modal-------------------------->  

   <!-- Modal -->
            <!------------------------upload File Modal-------------------------->  
      <div class="modal fade" id="file_modal"  role="dialog" aria-labelledby="traineeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <form id="form_status" name="form_status" enctype="multipart/form-data" method="post">

                        <div class="modal-header">
                         <input type="hidden" id="hidden_id" name="hidden_value">
                            <div class="row">
                                <div class="col-md-11">
                                    <h3 class="modal-title" id="traineeModalLabel">Update Progress</h3>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close" onclick="modalreset();">
                                            <spaHome/get_school_contribution_detailsn aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-body">
                          <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
   <label style="color:red"> * Allow 500 Characters Only</label><br>
  <b><label for="comment">Status:</label></b>
  <textarea class="form-control" maxlength="500" title="allow Only 500 Characters" name="textarea" id="area" rows="5" id="comment"></textarea>
</div>      
 
  <div class="form-group">
                                <input type="file" name="file_data[]" multiple="multiple" class="form-control" id="files" accept="image/x-png,image/gif,image/jpeg"></div>
                

          
                          </div>
                          <input type="hidden" id="status_comment">
                           
                          <div class="col-md-6">  
          <div class="scrollable">
         <div class="alert alert-info" id="alert">
   <br>
   <table id="table_id" style="color:black;">
   </table>
  
  </div>  </div>
            
</div>
                <!-- 
                            <div class="input-group input-file" name="userfile[]">
           
            <input type="text" class="form-control" placeholder='Choose a file...' />
            <span class="input-group-btn">
                <button class="btn btn-default btn-choose" type="button">Choose</button>
            </span>

        </div> -->
      
         
 
      
      </div>
      <div class="row">
       
      </div>
       


      </div>
                      <!--       <?php// Print_r($csr_material_master); ?> -->
                                  
                        </div>
                        <div class="modal-footer">
                           <!--  <input type="hidden" id="hide_id" name="hdid"  value="0" /> -->
                            <button type="button" class="btn btn-secondary" onclick="javascript:window.location.reload()" data-dismiss="modal" onclick="modalreset();">Close</button>

                            <a type="button" id="submit_id" onclick="click_modal_req_id();" id="file_modal_status" class="btn btn-primary">Update Status</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!------------------------End add Modal-------------------------->  
            <?php $this->load->view('scripts.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
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
                <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/utf.js'?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/tamil.js'?>" type="text/javascript"></script>
                <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>
                

                <!-- Js for hide and show the tables and datas ending-->
                <!-- END PAGE LEVEL PLUGINS -->
                <!-- BEGIN PAGE LEVEL SCRIPTS -->
                <script>
                
                
                $("#cate").change(function () 
                {  
                    var category = $(this).val();
                    
                     console.log(category);
                                 
                    var sub_category_arr = <?php echo json_encode($sub_cate); ?>;
                    var sub_category_array = sub_category_arr.filter(function (e) {
                                    return e.cat_id == category;
                                });
                                    
                     $('#sub_cate').empty().append('<option value="">Select Sub Category</option>');
                                          
                     $.each(sub_category_array,function(id,val)
                             {
                               $('#sub_cate').append($('<option></option>').text(val.sub_cat_name).attr('value', val.sub_cat_id));
                             })
                    
                });
                
                
                             $("#cat").hide();
                             $("#scat").hide();
                             $("#item").hide();
                             $("#cate1").hide();
                             $("#sub_cate1").hide();
                             
                $("#itemnames").change(function () 
                {  
                
                        var type = $(this).val();
                    console.log(type);
                        $("#scat").show();
                        $("#cate1").val(0);
                        if(type == 500)
                        {
                            
                            console.log(type);
                            $("#item").show();
                            $("#cat").show();
                            $("#scat").show(); 
                            
                            $("#cate1").hide();
                            $("#sub_cate1").hide(); 
                            
                            var arr = <?php echo json_encode($csr_material_master); ?>;
                                    var material_array = arr.filter(function (el) {
                                    return el.id == type ;
                                     });
                            console.log(material_array);         
                            $("#cate1").val(material_array[0].cat_id);
                            $("#sub_cate1").val((material_array[0].sub_cat_id));
                        }
                        else
                        {
                            $("#item").hide();
                            $("#cat").hide();
                            $("#scat").hide();
                            
                            $("#cate1").show();
                            $("#sub_cate1").show();
                            
                            var arr = <?php echo json_encode($csr_material_master); ?>;
                            
                            
                            var material_array = arr.filter(function (e) {                                  
                                      return e.id == type;
                            });
                                 
                            if(material_array[0].cat_id != null && material_array[0].cat_id != "0"){
                                var category_arr = <?php echo json_encode($cate); ?>;
                                var category_array = category_arr.filter(function (e) {
                                         return e.id == material_array[0].cat_id;
                                    });
                                $("#cate2").val(category_array[0].cat_name);
                                $("#cate3").val(material_array[0].cat_id);
                                
                            }else{
                                $("#cate2").val('');
                                $("#cate3").val('');
                            }
                            
                            if(material_array[0].sub_cat_id != null){                           
                                var sub_category_arr = <?php echo json_encode($sub_cate); ?>;
                                var sub_category_array = sub_category_arr.filter(function (e) {
                                    return e.id == material_array[0].sub_cat_id;
                                });
                                
                                $("#sub_cate2").val(sub_category_array[0].sub_cat_name);
                                $("#sub_cate3").val(material_array[0].sub_cat_id);
                            }
                            else{
                                $("#sub_cate2").val('');    
                                $("#sub_cate3").val('');
                            }
                                     
                            // console.log(material_array);
                            
                        }
                        
                });
                
                 
                
                
                function modalreset() {
                       $('#traineeModalForm').trigger("reset");
                }
                
                function trash(id)
                {
                
                     $.ajax({
                         type: "POST",
                         url:baseurl+'Home/trash_needscsr_details',
                         data:{id:id}
                         })
                }
//                 $('input:button').click(function() {
//     alert($(this).val());
// });​
                $('#file_modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
           var todoId = button.data('todo');
           //getting values

          //console.log(todoId.req_id);
          
        req_id = todoId.req_id;

        // for (var index = 2; index < 5; index++) {
        //   var fk = '#fk_id'+index;
        //   console.log(fk);
        //   var bla = $('#fk_id'+index).val();
        //            console.log(bla);
        //          }
       // console.log(req_id);
     //alert($('#fk_id').val(todoId.req_id));
     
      
        document.getElementById('hidden_id').value = todoId.req_id;
        
   var id = req_id;


              
              
              // alert(id);
        


 $.ajax({
      
       url: '<?=base_url()."Home/get_school_contribution_details_by_ajax_req_id"?>',
       dataType: "application/json",
       type: 'POST',
       data:{id:id},
       dataType: 'json',
      
      success: function (data) {
       // alert(json.parse(data);
        //console.log(data);
     // var returnedData = JSON.parse(data);
     // console.log(returnedData.[0]);
  // var i =0;    
  // data.forEach(function(element) 
  //   {
  //      var ss = data[i]["update_status"];
  //      console.log(ss);
  //      

  //   });
  console.log(data);
     for(var indexs=0;indexs<data.length;indexs++)
     { 

    var status = data[indexs]["update_status"];
    var school = data[indexs]["school_name"];
    var updated_on = data[indexs]["updated_on"];
    var image1 = data[indexs]["img_url_1"];
    var image2 = data[indexs]["img_url_2"];
     var image3 = data[indexs]["img_url_3"];
    var req_id = data[indexs]["fk_req_id"];
    var update_id = data[indexs]["id"];

   console.log(image2);
   if(image2 == null)
        { 
          str2= "";
         

        } 
       else
         {
             str2 =  '<a target="_blank" href="http://tnschoolsawsphoto.s3.amazonaws.com/csr_photos/req_'+req_id+'/update_'+update_id+'/'+image2+'"><img target="_blank" src="http://tnschoolsawsphoto.s3.amazonaws.com/csr_photos/req_'+req_id+'/update_'+update_id+'/'+image2+'" width="35" height="35"><br>'+ image2 +'</a>';
         }
         if(image3 == null)
        { 
          str3= "";
         

        } 
       else
         {
             str3 =  '<a  target="_blank" href="http://tnschoolsawsphoto.s3.amazonaws.com/csr_photos/req_'+req_id+'/update_'+update_id+'/'+image3+'"><img target="_blank" src="http://tnschoolsawsphoto.s3.amazonaws.com/csr_photos/req_'+req_id+'/update_'+update_id+'/'+image3+'" width="35" height="35"><br>'+ image3 +'</a>';
         }

         if(image1 == null)
        { 
          str1= "";
         

        } 
       else
         {
             str1 =  '<a target="_blank" href="http://tnschoolsawsphoto.s3.amazonaws.com/csr_photos/req_'+req_id+'/update_'+update_id+'/'+image1+'"><img target="_blank" src="http://tnschoolsawsphoto.s3.amazonaws.com/csr_photos/req_'+req_id+'/update_'+update_id+'/'+image1+'" width="35" height="35"><br>'+ image1 +'</a>';
         }
   



   
    $('#table_id').append(
      '<br><tr><td><b><nobr><span class="glyphicon glyphicon-user"></span> '+ school +', <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;' +updated_on +'</td></nobr></b></tr><tr><br><td style="border-spacing: 5px;">'+ status +'</td><br> </tr><tr><td>'+str1+'<br>'+str2+'<br>'+str3+'</td></tr></br>');

     
   // $('#status_comment').text(data.[0]);
     // $('#employee_address').text(data.address);
     // $('#employee_gender').text(data.gender);
     // $('#employee_designation').text(data.designation);
     // $('#employee_age').text(data.age);
     
      }
      

 }
});
});


                // $.ajax({

                //         method:"POST",
                      
                //         dataType:'JSON',  // what to expect back from the PHP 
                //         data:{id:id}, 

                //           success:function(data)
                //           {
                     
                //            // $('#employee_address').text(data.address);
                //            // $('#employee_gender').text(data.gender);
                //            // $('#employee_designation').text(data.designation);
                //            // $('#employee_age').text(data.age);
                            
                //          }

                //          })
              


               //  $("button").click(function() {
               // var fk_req_id = this.id;
               // alert(fk_req_id);

                // $.ajax({

                        
                //          url:baseurl+'Home/get_school_contribution_details/',
                //           dataType: 'text',  // what to expect back from the PHP 
                //           data: fk_req_id,                         
                //           type: 'post',

                //           success: function(success){
                //            alert(success);
                            
                //           }

                //          })

               
                  // $.ajax({

                        
                  //        url:baseurl+'Home/get_school_contribution_details/',
                  //         dataType: 'text',  // what to expect back from the PHP script,   
                         
                  //         data: {req_id:req_id},                         
                  //         type: 'post',

                  //         success: function(success){
                  //           console.log(success);
                            
                  //         }

                  //        })

                

                function click_modal_req_id()
                {
                   
                  //console.log(req_id);
                 var $fileUpload = $("input[type='file']");
               if (parseInt($fileUpload.get(0).files.length) > 3)
               {
                  alert("You are only allowed to upload a maximum of 3 files");
               }
               else
               {
         
                 var formValues = $('#form_status').serializeArray();
                 //var samplee = $('#file_data').serializeArray();
                 //console.log(formValues);
               // var ss = $('#hidden_id').prop('text');
               // console.log(ss);
               var hidden_data = $('#hidden_id').val();
               var remark_data = $('#area').val();
               //console.log(hidden_data);   
              // var file_data = $('#file_datas').prop('files')[0];   
               var form_data = new FormData();                  
              // form_data.append('file',file_data);
               var totalfiles = document.getElementById('files').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('files').files[index]);
   }
               form_data.append('req_id',hidden_data);
               form_data.append('remarks',remark_data);
              
               //form_data.append('id',file_data);
                             
                //alert(form_data);                     
                 //var file=$('#file_datas').val();
               // console.log(file);
                
               
             
                     $.ajax({

                        
                         url:baseurl+'Home/get_upload_status/',
                          dataType: 'text',  // what to expect back from the PHP script,   
                          cache: false,
                          contentType: false,
                          processData: false,
                          data: form_data,                         
                          type: 'post',

                          success: function(success){
                            console.log(success);
                            alert("Status Uploaded SuccessFully");
                            // location.reload();
                          }

                         })
                   
                }
              }



                 
               
                
                $(document).ready(function() {
                    $('#traineeModal').on('show.bs.modal', function(e) {
                            var id = $(e.relatedTarget).data('id');
                            if(id != ''){
                                $.ajax({
                                        type: "POST",
                                        url:baseurl+'Home/get_needscsr_details',
                                        data:{'id':id},
                                        success: function(resp){
                                            $('#traineeModalLabel').text("Edit Needs CSR Details");
                                            var records = JSON.parse(resp);
                                            
                                           //console.log(records);
                                           
                                            if(records.length>0){
                                                $("#scat").show();
                                                $("#cate1").val(0);
                                                
                                                for(var i=0;i<records.length;i++){
                                                    console.log(records);
                                                    $("#itemnames").val(records[i].mat_id);                           
                                                    // var arr = <?php echo json_encode($csr_material_master); ?>;
                                                            // var material_array = arr.filter(function (el) {
                                                            // return el.id == records[i].mat_id ;
                                                    // });
                        
                                                        if(records[i].mat_id == 500)
                                                        {
                                                            $("#cat").show();
                                                            $("#scat").show(); 
                                                            $("#item").show();
                                                            $("#itemname1").val(records[i].created_by)
                                                            $("#cate1").hide();
                                                            $("#sub_cate1").hide(); 
                                                            $("#cate").val(records[i].cat_id);
                                                            $("#sub_cate").val((records[i].sub_cat_id));
                                                        }
                                                        else
                                                        {
                                                           
                                                            $("#item").hide();
                                                            $("#cate2").val(records[i].cat_name);
                                                            $("#sub_cate2").val((records[i].sub_cat_name));
                                                            $("#cate3").val(records[i].cat_id);
                                                            $("#sub_cate3").val((records[i].sub_cat_id));
                                                            $("#cat").hide();
                                                            $("#scat").hide();
                                                            $("#cate1").show();
                                                            $("#sub_cate1").show();
                                                        }
                                                    
                                                   
                                                    $('#Quantity').val(records[i].qty);
                                                    
                                                    
                                                }
                                            }  

                                            
                                        }
                                        
                                    })
                            }
                            else{
                                $('#traineeModalForm').trigger("reset");
                                $('#traineeModalLabel').text("Add Needs CSR Details");
                                
                            }
                            
                    });
                });



// function bs_input_file() {
//     $(".input-file").before(
//         function() {
//             if ( ! $(this).prev().hasClass('input-ghost') ) {
//                 var element = $("<input type='file' name='userfile' multiple='multiple' class='input-ghost' style='visibility:hidden; height:0'>");
//                 element.attr("name",$(this).attr("name"));
//                 element.change(function(){
//                     element.next(element).find('input').val((element.val()).split('\\').pop());
//                 });
//                 $(this).find("button.btn-choose").click(function(){
//                     element.click();
//                 });
//                 $(this).find("button.btn-reset").click(function(){
//                     element.val(null);
//                     $(this).parents(".input-file").find('input').val('');
//                 });
//                 $(this).find('input').css("cursor","pointer");
//                 $(this).find('input').mousedown(function() {
//                     $(this).parents('.input-file').prev().click();
//                     return false;
//                 });
//                 return element;
//             }
//         }
//     );
// }
// $(function() {
//     bs_input_file();
// }); $(function(){
           
      

                </script>
                <!-- END PAGE LEVEL SCRIPTS -->

        
    </body>

</html>
      
      