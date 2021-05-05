
<?php 
// print_r($blockwise_schoolinfo);
?>
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->    
<head>
    <meta name="viewport" content="user-scalable=1.0,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
 



  <style> 
  .input-w label, .input-w input {
    /* if you had floats before? otherwise inline-block will behave differently */
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


     
.content_update {
        box-sizing: border-box;
        margin: 0 auto;
        max-width: 1000px;
        
        text-align: left;
        color:#003366;
        border-color: #003366;
        border:1px solid black;

      }

      #html-output {
        white-space: pre-wrap;
      } 
       #html-output_update {
        white-space: pre-wrap;
      } 

      /*for social links*/

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


<link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/pell.css';?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url().'asset/css/social_share_btn.css';?>">
<script src="<?php echo base_url().'asset/js/pell.js';?>"></script> 


 
<!--- for end -->


<?php $this->load->view('head.php'); ?>
</head>
    <!-- END HEAD -->
<body class="page-container-bg-solid page-md">

   

<div class="page-wrapper">
            
  <?php $this->load->view('csr_admin/csr_admin_header.php'); ?>
 
      <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">

        
      
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
                                                        <span> <i class="fa fa-envelope" aria-hidden="true"></i> UPDATE MAIL</span>
                                                          </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">
                                                       <?php foreach ($get_values as $get_key => $get_value) {?>
                                                        <form  name="form_data" id="form_data" method="post" action="<?php echo base_url().'Csr_admin_controller/window_update_content';?>">

 
 
    
 <input type="hidden" name="hidden" id ="id" value="<?php echo $get_value['id'];?>">
                                                          
                                     
                                  
   <div class="col-md-3" style="float:left">
     <div class="form-group">
    
     <input type="text" class="form-control"  value="<?php echo $get_value['mail_code'];?>" id="mail_code" name="mail_code"  placeholder="LABEL"  pattern="^[A-Z_]*$" onkeyup="this.value = this.value.toUpperCase();" title="only Captial Letters and No Spaces Allowed" readonly="">
  </div></div>

 <div class="col-md-3" style="display:inline">
  <div class="form-group">
    
    <input type="text" class="form-control" id="subject"  value="<?php echo $get_value['subject'];?>" name="subject" placeholder="SUBJECT" required>
  </div>
</div>

    <div class="col-md-5" style="display:inline">
    <textarea class="form-control" id="mail_comment" placeholder="DESCRIPTION" name="mail_comment" rows="3" maxlength="140"   required><?php echo $get_value['mail_comment'];?></textarea>
    </div>
   
    
     <div class="col-md-3" style="float:left">
   
     <input type="text" class="form-control" id="from_mail" name="from_mail" value="<?php echo $get_value['from_mail'];?>" placeholder="FROM MAIL" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" title="Invalid Mail" required>
   </div>
 <br><br><br><br>
 
     <div class="col-md-3" style="display: inline-block">
    <input type="text" class="form-control" id="display_name" name="display_name" value="<?php echo $get_value['display_name'];?>" placeholder="DISPLAY NAME" pattern="^[a-zA-Z ]*$" title="Allow Letters Only" required>
  </div>
  <br><br><br><br>
 <div class="form-group">
   
    <textarea type="text" class="form-control" id="content" name="content" cols='50' rows='10'maxlength="500" ></textarea>
    <small id="msg"></small>
  </div>
                      
    <center><input type="submit" class="btn btn-info" name="submit" value="update"></center>
</form> <?php }?>
 <script>
       var editor_update = window.pell.init({
        element: document.getElementById('editor_update'),
      
       
        defaultParagraphSeparator: 'p',
  
        onChange: function (html) 
        {
             document.getElementById('editor_update').value =html;
         // document.getElementById('text-output').innerHTML = html
        //  document.getElementById('html-output').textContent = html
          var mysave_update = $('#html-hidden_input_hidden').textContent = html
          $('#hidden_input_hidden').val(mysave_update);
          
 

        }
        



      })
    
     editor_update.content.innerHTML ='<?php echo $get_value['content']?>'+'<?php echo file_get_contents("http://localhost/emis-code/application/views/social_icons.html")?>';

    </script>

                                                         
                                                        
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
       
      <!-- <script type="text/javascript" src="<?php echo base_url().'asset/js/jquery.richtext.js';?>"></script>
 -- -->
              
<script src="<?php echo base_url().'asset/js/pell.js';?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 
 


 <script>
       var editor_update = window.pell.init({
        element: document.getElementById('editor_update'),
      
       
        defaultParagraphSeparator: 'p',
  
        onChange: function (html) 
        {
             document.getElementById('editor_update').value =html;
         // document.getElementById('text-output').innerHTML = html
        //  document.getElementById('html-output').textContent = html
          var mysave_update = $('#html-hidden_input_hidden').textContent = html
          $('#hidden_input_hidden').val(mysave_update);
          
 

        }
        



      })
    
     editor_update.content.innerHTML ='<?php echo file_get_contents("http://localhost/emis-code/application/views/social_icons.html")?>'+'<?php echo $get_value['content']?>';

             
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

    </script>


    <script>
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
        <script src="<?php echo base_url().'asset/global/plugins/ckeditor/ckeditor.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/ckeditor/adapters/jquery.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>

       

         <script type="text/javascript">

    var block_array = new Array();
var block_details = new Array();

var link = '<?php echo $link?>';




                var base_url = '<?=base_url()?>';
              $(document).ready(function(){ 


                editor =    CKEDITOR.replace( 'content', {
  height: 300,
  maxLength:10,
  extraPlugins:'wordcount',
  countSpacesAsChars: false,
countHTML: false,
clipboard_defaultContentType:'text',
  wordcount: {
               
                    showCharCount: true,
              
              // maxCharCount: 1000,
              paragraphsCountGreaterThanMaxLengthEvent: function (currentLength, maxLength) {
                  $("#informationparagraphs").css("background-color", "crimson").css("color", "white").text(currentLength + "/" + maxLength + " - paragraphs").show();
              },
            },
  uiColor :'#4fbaa5',
  toolbarCanCollapse:true,
  
  toolbar: [
    { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
  { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', '-', 'Undo', 'Redo' ] },
  { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
  //{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
  '/',
  { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
  { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
  { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
  { name: 'insert', items: [ 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] }, //'Image', 'Flash', 
  '/',
  // { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
  // { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
  // { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
  // { name: 'others', items: [ '-' ] },
  // { name: 'about', items: [ 'About' ] }
  ],
 });


                $("#block_group").hide();
                $("#manage_group").hide();
                $(".stu_common").hide();
                
                $("#district").select2({closeOnSelect:false});
                $("#block").select2({closeOnSelect:false});

$("#dist_checkbox").click(function(){
    if($("#dist_checkbox").is(':checked') ){
        $("#district > option").prop("selected","selected");
        $("#district").trigger("change");
        var dist_id = $("#district").val();
        console.log(dist_id);
        $.ajax({
            
            method:'POST',
            dataType:'JSON',
            url:base_url+'/'+link+'/get_all_block_name',
            data:{'dist':dist_id},
            success:function(res)
            {
                    block_details = res;
            }

        });
        // $("#district").attr('disabled',true);
        $("#block_group").hide();
        $("#block> option").removeAttr("selected");

    }else{
        $("#district > option").removeAttr("selected");
        $("#district").trigger("change");
        $("#district").prop('disabled',false);

     }
});

$("#block_checkbox").click(function(){
    if($("#block_checkbox").is(':checked') ){
        $("#block > option").prop("selected","selected");
        $("#block").trigger("change");
        block_array = new Array();
    
        
        var block_name = $("#block").val();

        $.each(block_name,function(bi,bval){
        block_name = block_details.filter(block=>block.block_code == bval)[0];
        block_array.push(block_name);
        });
        // console.log(block_array);
    
        // $("#block").attr('disabled',true);


    }else{
        $("#block > option").removeAttr("selected");
         $("#block").trigger("change");
        $("#block").prop('disabled',false);
        block_array = new Array();

     }
});


  
 





    
                // console.log(title);

$('.date').datepicker("setEndDate",end);

 // $(".datepicker").val(new Date());
    $("#emis_state_report_schcate").change(function(){
      return validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 
});   });

// $(document).ready(function(){  // function call for validate company name 
//     $("#emis_state_report_schmanage").change(function(){
//       return validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert'); 
// });   });


function checkmanagecate(){

var baseurl='<?php echo base_url(); ?>';

var manage = validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert');
var cate = validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 

var managdistrict=$("#emis_state_report_schmanage").val();
var catdistrict = $("#emis_state_report_schcate").val();

if(manage == 0 ){
    return false;
}

  $.ajax({
        type: "POST",
        url:baseurl+'State/savereport_schoolcatemanage',
        data:"&cate="+catdistrict+"&manage="+managdistrict,
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
        
     $(".school_manage").prop('checked', this.checked);
    $(".emis_state_report_schcate").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status

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
<script>
    $(document).ready(function() {
        
//     $('.collapse').on('show.bs.collapse', function() {
//         var id = $(this).attr('id');
//         $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
//         $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-minus"></i>');
//     });
//     $('.collapse').on('hide.bs.collapse', function() {
//         var id = $(this).attr('id');
//         $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
//         $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-plus"></i>');
//     });
 });
var baseurl='<?php echo base_url(); ?>';

function marked_school(dist_id)
{
    // alert(dist_id);
    
    var att_date = $("#att_date").val();
    $.ajax(
    {
        type: "POST",
        url:baseurl+'State/get_marked_school',
        dataType:"json",
        data:{'dist_id':dist_id,'date':att_date},
        success: function(resp){
        // alert(resp);  
        $("#school_district_data").hide();
        $("div #school_district_data").remove();
        // console.log($(".district").find('id').removeAttr('id',''));
        console.log(resp);
        var school_data = resp.data;
    

        if(school_data.length !=0)
        {
            var school_table = '';
                // school_table +='';
            $.each(school_data,function(id,val)
            {

                school_table +='<tr><td>'+id+1+'</td><td>'+val.school_name+'</td><td>'+val.udise_code+'</td><td>'+val.management+'</td><td>'+val.cluster_id+'</td></tr>';
            });
            // school_table += "</tbody></table>";
            $("#school_info").empty('');
            // $("#sample_3").dataTable();
            $("#school_info").html(school_table);
        }
        // location.reload(true);
        // return true;              
         },error:function(e)
         {
            alert(JSON.stringify(e));
         }
        
        
    })
}
</script>

<script type="text/javascript">
    $(document).ready(function()
{
    sum_dataTable('#sample_3');
    sum_dataTable('#sample_4');
});

function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Blfrtip',
      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: -1,
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
        buttons: [
            'colvis'
        ],
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' },
    //             {
    //     extend: 'colvis',
       
    //     className: 'btn default',
    //     columnText: function ( dt, idx, title ) {

    //         return (idx+1)+': '+title;
    //     }
    // }
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
    // table.column(0).visible(false);
    }
</script>

<script>
    $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        console.log(activeTab);
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
    </script>

<script type="text/javascript">
    function loginData()
    {   
        var url = 'jwt_decode';

        $.ajax(
        {
            method:'post',
            data:{'udise_code':'ceochn','password':'password'},
            url:url,
            headers:
            {
                'Authorization':'EMIS@2019_api'
            },
            success:function(res)
            {
                console.log(res);
                var tokenDecode = jwtDecode(res.records.token);
                
            }
        })

    }     

             
    </body>
   
</html>