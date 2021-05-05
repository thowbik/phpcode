
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->    
<head>
    <meta name="viewport" content="user-scalable=1.0,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
  <!-- <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url().'asset/css/froala_editor.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'asset/css/froala_style.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'asset/css/code_view.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'asset/css/image_manager.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'asset/css/image.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'asset/css/table.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'asset/css/video.css';?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css"> -->

  
  <style> 
  .input-w label, .input-w input {
    /* if you had floats before? otherwise inline-block will behave differently */
    display: inline-block;
    padding-right: 35px;
}
/*for validation text color*/
.errors
{
color:red;
}
/*div#editor {
      width:95%;
      margin: auto;
      text-align: left;

    }*/

.center 
{
text-align: center;
} 


      .content {
        box-sizing: border-box;
        margin: 0 auto;
        max-width: 800px;
        
        text-align: left;

      }

.content_update {
        box-sizing: border-box;
        margin: 0 auto;
        max-width: 800px;
        
        text-align: left;

      }

      #html-output {
        white-space: pre-wrap;
      } 
       #html-output_update {
        white-space: pre-wrap;
      } 

      /*for social links*/
      .fa {
  padding: 20px;
  font-size: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.4;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-whatsapp {
  background: #32CD32;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: #d4af37;
}
.fa {
    border-radius: 12px;
    padding:7px;

}

 </style>
 
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


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

<!-- for text editor !-->

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="<?php echo base_url().'asset/css/site.css';?>">
<link rel="stylesheet" href="<?php echo base_url().'asset/js/richtext.min.css';?>"> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/pell.css';?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url().'asset/css/social_share_btn.css';?>">


<?php $this->load->view('head.php'); ?>
</head>
    <!-- END HEAD -->
<body class="page-container-bg-solid page-md">


   <!--  <div id="editor">
    <form>
      <textarea id='edit' style="margin-top: 30px;" placeholder="Type some text">
       
      </textarea>

      <input type="submit">
    </form>
  </div> -->
   

<div class="page-wrapper">
            
  <?php $this->load->view('csr_admin/csr_admin_header.php'); ?>
 
      <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">

         <div class="modal fade" id="myModal" role="dialog">

           <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
             <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="reload();">&times;</button>
                      <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                                    
                    <form  method="post" class="form_update" id="form_update_content">
                        <div class="col-md-12 thumbnail" >
                          <center>
                              <div class="form-group panel-heading" style="background-color: #32c5d2;color: #fff;">
                                <label class="control-label"><b>MAIL CONTENT UPDATE</b></label>
                              </div>
                                
                                     <input type="hidden" name="hidden" id ="id">
                                                          
                                     
         <div id="get_id"></div>                              
   <div class="col-md-3">
     <input type="text" class="form-control" id="mail_code" name="mail_code"  placeholder="LABEL"  pattern="^[A-Z_]*$" onkeyup="this.value = this.value.toUpperCase();" title="only Captial Letters and No Spaces Allowed" readonly="">
  </div>

 <div class="col-md-3">
  <div class="form-group">
    
    <input type="text" class="form-control" id="subject" name="subject" placeholder="SUBJECT" required>
  </div>
</div>

    <div class="col-md-5">
    <textarea class="form-control" id="mail_comment" placeholder="DESCRIPTION" name="mail_comment" rows="3" maxlength="140"   required></textarea>
    </div>
    <br><br><br><br>
    
     <div class="col-md-3" style="float:left;padding-top: 10px">
   
     <input type="text" class="form-control" id="from_mail" name="from_mail" placeholder="FROM MAIL" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" title="Invalid Mail" required>
   </div>
 
 
     <div class="col-md-3" style="display: inline-block;padding-top: 10px">
    <input type="text" class="form-control" id="display_name" name="display_name" placeholder="DISPLAY NAME" pattern="^[a-zA-Z ]*$" title="Allow Letters Only" required>
  </div>
  <br><br><br><br>
  
   <div class="content_update">
    
      <div id="editor_update" class="pell">
      
      </div>
      <textarea style="display:none" id="hidden_input_hidden" name="content"></textarea>
     
     
     
    </div>

   <!-- <div id="editor">
    
      <textarea id="mail_content_update" name="content" placeholder="MAIL CONTENT">
        
       
       
      </textarea> 

       
  </div> -->

<br></br></br>
                                         
                                        
                                           
                                  <br>
                                  
                                         
                                          <br><br><br><br>
                                           
  
                                          
                                            
                                                
                                            
                                            
                                                    <br><br> 
                                                         <button  onclick="update_content();" id="update_1"  class="btn green">update<i class="fa fa-arrow-circle-right"></i></button>
                                                        
                                                    </center>
                                                  
                                        </div>
                </form>
        </div>

                      <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" onClick="reload();">Close</button>
                     </div>

              </div>
             
         </div>
  </div>

      

       <div class="modal fade" id="myModal2" role="dialog">

     <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
            <div class="modal-content">
                      <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" onClick="reload();">&times;</button>
                                  <h4 class="modal-title"></h4>
                      </div>
                <div class="modal-body">
                                    
                    
                                      <div class="col-md-12 thumbnail" >
                                            <center>
                                                <div class="form-group panel-heading" style="background-color: #32c5d2;color: #fff;">
                                                <label class="control-label"><b>MAIL CONTENT</b></label>
                                                </div>
 <div class="form-group">
                                      
      
                                                         
    
   
   

 

<div id="hodm_table">
  

     <form  method="post" action="" name="form_content" id="form_content">
       
 
   <div class="col-md-3">
     <input type="text" class="form-control" id="mail_code" name="mail_code"  placeholder="LABEL"  pattern="^[A-Z_]*$" onkeyup="this.value = this.value.toUpperCase();"  required>
  </div>

 <div class="col-md-3">
  <div class="form-group">
    
    <input type="text" class="form-control" id="subject" name="subject" placeholder="SUBJECT"required>
  </div>
</div>

    <div class="col-md-5">
    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="DESCRIPTION" name="mail_comment" rows="3" maxlength="140" required></textarea>
    </div>
    <br><br><br><br>
    
     <div class="col-md-3" style="float:left;padding-top: 10px">
   
     <input type="email" class="form-control" id="from_mail" name="from_mail" placeholder="FROM MAIL" required>
   </div>
 
 
     <div class="col-md-3" style="display: inline-block;padding-top: 10px">
    <input type="text" class="form-control" id="exampleFormControlInput1" name="display_name" placeholder="DISPLAY NAME" required>
  </div>
  <br><br><br><br>
  
   <div class="page-container">


    <div class="content">
    
      <div id="editor" name="edits"  class="pell">
          
      </div>
      <textarea id="hiddeninput" style="display:none;" name="content"></textarea>
     
     
     
    </div>

   <!-- <div id="editor">
    
      <textarea id='edit' style="margin-top: 30px;" name="content" placeholder="MAIL CONTENT">
       
      </textarea required> 

       
  </div> -->

<br></br></br>
   <button  type="submit" name="submit" id="submit_ins" onclick="mail_content();" class="btn green">Save<i class="fa fa-arrow-circle-right"></i></button>
 </form>
</div><br><br> 
                                            
</center>
</div>
  
        </div>

                      <div class="modal-footer">
                        <!--  <button  onclick="update_click();"  class="btn green">update<i class="fa fa-arrow-circle-right"></i></button> -->
                      
                                <button type="button" class="btn btn-default" data-dismiss="modal" onClick="reload();">Close</button>
                     </div>
                    
              </div>
             
         </div>
  </div>
                    <!-- BEGIN CONTAINER -->
                   

                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container">

                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                         <h1>
                                      
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
                                    <!-- BEGIN PAGE CO
                                        NTENT INNER -->
                      
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                               
                                              <div class="page-wrapper box-content">

           

        </div>
                                             <br>
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">

                                                        <div class="caption">
                                                           <button onclick="update_child_click();" id="add_new_btn" type="button" data-toggle="modal" data-todo ='{"id":"<?php echo $csr_value["id"]?>"}' data-target="#myModal2" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-plus"></span>ADD NEW</button>
                                                          </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">
<form name="form" id="form">
                                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                              <thead>
                              <tr>                          <th style="text-align:center">Mail Code</th>
                                                            <th style="text-align:center">Mail Comment</th>
                                                            <th style="text-align:center">Sender</th>        
                                                          
                                                            <th>Action</th>
                                                           
                                                          
                              <!--<th>Total</th>-->
                                                                   
                              </tr>
                              </thead>
                              <tbody>
                              
                                     
                                     <?php  foreach ($csr_content as $content_key => $content_value) {?>

                                  
                                   
                                                                   
                              <tr>
                                      
                              <td style="text-align:left"><?php echo $content_value['mail_code'];?></td>
                              <td style="text-align:center"><?php echo $content_value['mail_comment'];?></td>
                              <td style="text-align:center"><?php echo $content_value['display_name'];?></td>
                             
                          
                               <td><!-- <button id="get_btn" type="button" data-toggle="modal" data-todo ='{"id":"<?php echo $content_value["id"]?>","mail_code":"<?php echo $content_value["mail_code"]?>","mail_comment":"<?php echo $content_value["mail_comment"]?>","display_name":"<?php echo $content_value["display_name"]?>","from_mail":"<?php echo $content_value["from_mail"]?>","subject":"<?php echo $content_value["subject"]?>","content":"<?php echo $content_value["content"]?>"}' data-target="#myModal" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span></button> -->
                                
                                <a type="button" href="<?php echo base_url()?>csr_admin_controller/load_mail_contents/<?php echo $content_value["id"]?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span></a>   
                               </td>


                                     <!-- <td><button  type="button" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span></button>
                                     </td>
                              -->
                                  <?php } ?>

                              </tr>
                      
                            
                               

                                                                                 
                           
                            </tbody>
                              <tfoot>
                                                                
                                                            </tfoot> 
                               
                            </table>
                        </form>
                                                         
                                                        
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

//  $('#sample_2').DataTable({
//     order: [[0, 'desc']],
// });
  
        // $(document).ready(function() {

        //     $('.content').richText();
        //        //$('.content').richtext().style('width', '10%');
        // });
        
      

  $('#cat_name').attr("disabled", true); 
// document.getElementById('delivery_dates').valueAsDate = new Date();
//for payment type dropdown hide.show


 
 
$(function () {
        $("#ddlPassport").change(function () {
            if ($(this).val() == "Y") {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });


function update_child_click()
{ 
   $('#myModal2').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
           var todoId = button.data('todo');
           //getting values
       //console.log(todoId.id);
  //      document.getElementById('cont_id').value = todoId.id;
       
           
  //        var Id = todoId.id;
  //          // console.log(Id);
  //          $.ajax({

  //               url: '<?php echo base_url();?>Csr_admin_controller/update_child',  // define here controller then function 
  //              method: 'POST',
  //              data:{Id:Id},
  //              dataType: 'JSON',
              
  //              success:function (data) {
                           
  //           //console.log(data);
  // //           var a = 0;
              


  //  var id = 0;
  //             data.forEach(function(element) {
  //                var status_id='#'+'status'+(id + 1);
  //                var status_id_ignore_hash = 'status'+(id + 1);
  //                var split = status_id.slice(7);
  //                console.log(split);
  //             console.log(status_id);
  //             console.log(status_id+" "+"option");
  //             console.log(status_id_ignore_hash);
               

  //           $('#table_id').append('<tr><td>'+ element.timestamp +'</td><td>'+ element.amount +'</td><td>'+ element.district_name +'</td><td>'+ element.school_name +'</td><td>'+ element.req_id +'</td><td>'+ element.qty +'</td><td><select id ="'+ status_id_ignore_hash +'" name="'+ status_id_ignore_hash +'"><option value="MAT_RECEIVED">MATERIAL RECEIVED</option><option value="FUNDS_RECEIVED">FUNDS RECEIVED</option><option value="INITIATED">INITIATED</option></select></td><td><button type="button" onclick="update_child_list('+element.id+','+split+')" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit" id="update"></span></button></td></tr>');

  //             // console.log(element.status);
  //              if(element.status  == "MAT_RECEIVED")
  //               {
  //                  $(status_id+" "+"option[value='MAT_RECEIVED']").attr('selected','selected');
  //             // $(status_id +' '+"option:selected").attr("MAT_RECEIVED");
  //              //$(status_id +' '+"option:selected").val("MAT_RECEIVED");
  //               // console.log('MATERIAL');
  //               }
  //               else if(element.status  == "FUNDS_RECEIVED")
  //               {
  //                 // var sample = $("select"+status_id+' '+"> option:selected").val();
  //                 // console.log(sample);
  //                 // $(status_id).val('FUNDS_RECEIVED');
  //                 $(status_id+" "+"option[value='FUNDS_RECEIVED']").attr('selected','selected');

  //                //// $(status_id).val($(status_id+" "+"option").eq("FUNDS_RECEIVED").val());
  //       }


  //               //var sample =  $(status_id+':selected').val();
  //                 //console.log($(status_id+"option:selected" ).attr("value"));
  //                 //var $option = $(status_id).find('option:selected');

  //   // //Added with the EDIT
  //   // var value = $option.val();
  //   //  console.log(value);
  //   // var conceptName = $(status_id).find(":selected").attr('value');
  //   // //              // $(status_id +' '+"option[value='FUNDS_RECEIVED']").prop('selected',true);
  //   //                  console.log(conceptName);
  //                  // $(status_id +' '+'option[value="FUNDS_RECEIVED"]').attr("selected","selected");
  //                  // $(status_id +' ').find('option[value="FUNDS_RECEIVED"]').attr('selected','selected')
                   
                
  //                else if(element.status  == "INITIATED")
  //               {
  //                   $(status_id+" "+"option[value='INITIATED']").attr('selected','selected');
  //                 //$(status_id +' '+"option:selected").attr("INITIATED");
  //                  // console.log('INTITATED');
  //               }
               
       
             


  //      id++;
  //         // document.getElementById('table_id').innerHTML = data;
  //        });
           
  //     }
  //  });
 })
} 

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


 function reload(){
    setTimeout(function(){location.reload()}, 0);
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


        <script>(function($) {

  'use strict';

  $(document).on('show.bs.tab', '.nav-tabs-responsive [data-toggle="tab"]', function(e) {
    var $target = $(e.target);
    var $tabs = $target.closest('.nav-tabs-responsive');
    var $current = $target.closest('li');
    var $parent = $current.closest('li.dropdown');
        $current = $parent.length > 0 ? $parent : $current;
    var $next = $current.next();
    var $prev = $current.prev();
    var updateDropdownMenu = function($el, position){
      $el
        .find('.dropdown-menu')
        .removeClass('pull-xs-left pull-xs-center pull-xs-right')
        .addClass( 'pull-xs-' + position );
    };

    $tabs.find('>li').removeClass('next prev');
    $prev.addClass('prev');
    $next.addClass('next');
    
    updateDropdownMenu( $prev, 'left' );
    updateDropdownMenu( $current, 'center' );
    updateDropdownMenu( $next, 'right' );
  });

})(jQuery);

</script>
 <!-- Import jQuery -->

<!-- <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/froala_editor.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/align.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/code_beautifier.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/code_view.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/draggable.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/image.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset//js/image_manager.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/link.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/lists.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/paragraph_format.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/paragraph_style.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/table.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/video.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/url.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/entities.min.js';?>"></script> -->
<script src="<?php echo base_url().'asset/js/pell.js';?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 
  <script>

   
  //new FroalaEditor('#mail_content_update');

    // (function () {
    //   const editorInstance = new FroalaEditor('#mail_content_update', {
    //     enter: FroalaEditor.ENTER_P,
    //     placeholderText: null,
    //     events: {
    //       initialized: function () {
    //         const editor = new FroalaEditor('#mail_content_update')
    //         document.querySelector('#ids').addEventListener('click',function (e) {
    //           // this.$("gwmw").hide();
    //           //$( ".ginger-module-highlighter-mistake-type-1" ).remove();
    //           alert('YYY');
    //           alert(editor.$oel.val())
    //          e.preventDefault()
    //         })
    //       }
    //     }
    //   })
    // })()
   

$('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
           var todoId = button.data('todo');
           //getting values



          console.log(todoId);
          //console.log(todoId.content);
          //console.log(JSON.parse(todoId));
          // document.getElementById('get_id').innerHTML = todoId.content;
          // (function () 
          // {
          //        const editorInstance = new FroalaEditor('#mail_content_update', 
          //        {
          //           enter: FroalaEditor.ENTER_P,
          //           placeholderText: 'CLEAR',
          //           events: {
          //                   initialized: function (editor) 
          //                   {
                             

          //                       //$('.selector').editable('text');$("#mail_content_update").val("welcome");
          //                      // e.preventDefault()
          //                   }
          //           }
          //       })
          //   }) ()
             // var pk_id = document.getElementById('id').value;
             //   pk_id = todoId.id;
           

         // $.ajax({
         //        url: '<?php echo base_url();?>Csr_admin_controller/csr_update_pk_id_mail_content',  // define here controller then function 
         //        method: 'POST',
         //         data: {pk_id :pk_id},
         //        dataType:'text',
         //        crossDomain : true,
         //          success:function(success) {
         //                     alert(success);
         //                            }
         //        });


         var editor_update = window.pell.init({
        element: document.getElementById('editor_update'),
      
       
        defaultParagraphSeparator: 'p',
  
        onChange: function (html) 
        {
             document.getElementById('editor_update').value = html;
         // document.getElementById('text-output').innerHTML = html
        //  document.getElementById('html-output').textContent = html
          var mysave_update = $('#html-hidden_input_hidden').textContent = html
          $('#hidden_input_hidden').val(mysave_update);
          
 

        }


      })
     editor_update.content.innerHTML = todoId.content;
//$(document).ready(function(data){
//   console.log('Loaded');
//      document.getElementById('editor_update').value = data;
//          // document.getElementById('text-output').innerHTML = html
//         //  document.getElementById('html-output').textContent = html
//           var mysave_update_data = $('#html-hidden_input_hidden').textContent = data
//           $('#hidden_input_hidden').val(mysave_update_data);
//           editor_update.content.innerHTML = "hi";


 //});






           document.getElementById('mail_code').value = todoId.mail_code;
            document.getElementById('id').value = todoId.id;
           //  // console.log('VVVVALS');
           //  // console.log(document.getElementById('name').value = todoId.name);
           document.getElementById('mail_comment').value = todoId.mail_comment;
             //document.getElementById('mail_comment').value = todoId.content;
           // document.getElementById('mail_content_update').value = todoId.content;
           //$("#mail_content_update").val(todoId.content);
          
            //$('#edit').val(todoId.content);
             //console.log(todoId.content); 
             document.getElementById('from_mail').value = todoId.from_mail;
             document.getElementById('subject').value = todoId.subject;
             document.getElementById('display_name').value = todoId.display_name;
             //document.getElementById('editor_update').value = todoId.content;
             $('div#editor_update').val('hh');
             console.log(todoId.content);
             
               
         })

  


function update_content(){
    
         var content_form = $('#form_update_content').serialize();
        console.log(content_form);
        
          $.ajax({
                url: '<?php echo base_url();?>Csr_admin_controller/csr_update_mail_content',  // define here controller then function 
                method: 'POST',
                 data: {form :content_form},
                dataType:'text',
                crossDomain : true,
                  success:function(success) {
                             alert(success);
                                    }
                });
                        }     

             
function validation()
{
    

    jQuery.validator.addMethod("lettersonly", function(value, element) {
return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "numbers not allowed");

    jQuery.validator.addMethod("nospacelettersonly", function(value_s, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value_s);
}, "invalid Label"); 

  $("#form_content").validate({
     errorClass: 'errors',// initialize the plugin
        rules:
         {
            mail_code:{
                required:true,
                nospacelettersonly:true
            },
          
            from_mail: {
                required: true,
                email: true      
               
            },
            subject: {   
                required :true,
                lettersonly:true
                
            },
            display_name:{
                  required:true,
                  lettersonly:true
            },
            mail_comment:
            {
                required:true,
                lettersonly:true
            }
           
        }


        // submitHandler: function (form) { // for demo
        //     alert('valid form submitted'); // for demo
        //     return false; // for demo
        // }
      
    });  

if($("#form_content").valid())
{

 return true;
}
else
{
    return false;
}
} 



    function mail_content(){
      
    var condition_true = (validation());
     console.log(condition_true);
  if(condition_true == true){



  
         var formValues = $('#form_content').serialize();
        console.log(formValues);
        
          $.ajax({
                url: '<?php echo base_url();?>Csr_admin_controller/csr_save_mail_content',  // define here controller then function 
                method: 'POST',
                 data: {form :formValues},
                dataType:'text',
                crossDomain : true,
                  success:function(success) {
                             //alert(success);
                                    }
                });
                    }
           }


             

 
      var editor = window.pell.init({
        element: document.getElementById('editor'),
        defaultParagraphSeparator: 'p',
        onChange: function (html) 
        {
         // document.getElementById('text-output').innerHTML = html
        //  document.getElementById('html-output').textContent = html
          var mysave = $('#hiddeninput').textContent = html
         $('#hiddeninput').val(mysave);


        }
      })
      $(document).ready(function(){ 
       // function call for validate company name 
      $( '#add_new_btn').attr("disabled", 'disabled');
      $('#get_btn').attr("disabled", 'disabled');


   
      });

  
    
    </script>

             
    </body>
   
</html>