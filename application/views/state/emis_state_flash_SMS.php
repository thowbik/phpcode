

<html>

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
.portlet.light .dataTables_wrapper .dt-buttons {
    margin-top: -32px!important;
}

.progress-bar {
    float: left;
    width: 0;
    height: 100%;
    font-size: 12px;
    line-height: 15px!important;
    color: #fff;
    text-align: center;
    background-color: #337ab7;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
    box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
    -webkit-transition: width .6s ease;
    -o-transition: width .6s ease;
    transition: width .6s ease;
}
.progress
{
    height: 14px!important;
    margin-bottom:0px!important;

    text-indent:0px !important;
}
.progress-bar-success
{
    background-color:#5cb85c!important;
}
.center 
{
text-align: center!important;
}

.color-box-green
{
    
    cursor: pointer;
    width: 29px;
    height: 11px;
    border-radius: 3px;


}
.select2-container--bootstrap .select2-results__option[aria-selected=true] {
    background-color: #f6f681 !important;
    color: #262626;
}

.select2-container--bootstrap {
    display: block;
    width: auto !important;
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
                                        <form  id="myform" class="myform" method="post" name="myform">
                                        <div class="row">


                                            <div class="col-md-6">
                                                <div class="form-group">
    <label for="title" class="center">To:</label>
        <select class="form-control" name="to_msg" id="to_msg">
            <option value="-1">Select</option>
            <?php if(!empty($authority)){
            foreach($authority as $auth){

        ?>
        <option value="<?=$auth->id?>"><?=$auth->user_type;?></option>
    <?php } }?>
        </select>
    
  </div>
  <div class="form-group stu_common">
    <label for="content" class="center">Send Message To Student Absent for More Than</label>&nbsp;<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-file"></i></a>
   <input type="number" class="form-control" id="title" name="title" maxlength="50">
    <small id="msg"></small>
  </div>
                                            
                                                                                 
        
<div class="form-group">
    <label for="content" class="center">Message</label>
    <textarea type="text" class="form-control" id="content" name="content" cols='50' rows='10'maxlength="500" ></textarea>
    <small id="msg"></small>
  </div>
                                            
                                                    </div><!-- column-->
                                                

                                                    <div class="col-md-6">
                                                <div class="form-group">
<input type="checkbox" id="dist_checkbox" >Select All
    <label for="title" class="center">District</label>
    <select multiple id="district" style="width:300px" name="district[]">
       <?php if(!empty($districts)){
            foreach($districts as $district){

        ?>
        <option value="<?=$district->district_name?>"><?=$district->district_name;?></option>
    <?php } }?>
    </select>
  </div>
  
                                            </div>
                                                    <div class="col-md-6">
                                                <div class="form-group" id="block_group">
<input type="checkbox" id="block_checkbox" >Select All
    <label for="title" class="center">Block</label>
    <select multiple id="block" style="width:300px" name="block[]">
       
    </select>
  </div>
  <div class="col-md-12" style="margin-left: -10%!important;" id="manage_group">
                                                            
                                                              <div class="form-group" style="padding: 10px;padding-left: 8%">
                                                                <label class="control-label bold">
                                                                School Management</label> <input type="checkbox" id="emis_state_report_schmanage"  value="all"> All <br/>
                                                               
                                                                 <?php  foreach($getmanagecate as $det){ ?>
                                                                 
            <input type="checkbox" name="school_manage[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off" <?php echo ($det->manage_name== 'Government' && count($manage) == '0'? 'checked' : '');?> value="<?=$det->manage_name;?>"/><span class="label-text" ><?=$det->manage_name;?></span>&nbsp;
            
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
                                            </div>
                                           
                                            </div> 
                                            
                                               <div class="row">
                                                    <div class="col-md-offset-8 col-md-2">
                                                        
                                                        
                                                               <div class="col-md-1" >
                                                              <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                                
                                                                <button type="button" onclick="save();" class="btn green btn-lg" id="btn">Send</button>
                                                              </div>
                                                              </div>
                                                      
                                                    </div>
                                                              <div id="errmsg"></div>

                                                </div>
                                            </form>
                                            </div>  
                        
                    </div>
                    <!-- END CONTAINER -->

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Student Absent Districtwise</h4>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                        
                                                        
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                
                                                                    <th>District</th>
                                                                    <th class=" center">Absent Count</th>
                                                                    <!-- <th class=" ">Marked</th>
                                                                      <th class=" ">Pending</th>-->
            
                                                 </tr>
                                                                </thead>
                                                               <tbody>
                                                                <tr >
                                                                    <td class=" center">1</td>
                                                                    <td>ARIYALUR</td>
                                                                    <td class=" center"> 150</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class=" center">2</td>
                                                                    <td>CHENNAI
</td>
                                                                    <td class=" center">160</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class=" center">3</td>
                                                                    <td>COIMBATORE
</td>
                                                                    <td class=" center">110</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class=" center">4</td>
                                                                    <td>CUDDALORE
</td>
                                                                    <td class=" center">180</td>
                                                                </tr>
                                                               </tbody>
                                                               <tfoot>
                                                                   <tr>

                                                                    <th colspan="2">Total
                                                                        </th>
                                                                    <th class=" center">600
                                                                    </th>
                                                                   </tr>
                                                               </tfoot>
                                                           </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

                  <?php $this->load->view('footer.php'); ?>
           


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

            function saveclassid(value){
                var baseurl='<?php echo base_url(); ?>';
                
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'State/savedash_classidsession',
                data:"&class_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'State/emis_dash_district_count'; 
                return true;  
                 }else{
                    return false;
                 }
                 
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  

                }
                });
               }
        </script>

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


  
  $('#district').on('select2:select', function(e) {
    // alert();
    if($("#dist_checkbox").not(':checked'))
    {
            // alert();
    var dist_id = $("#district").val();
    
        $.ajax({
            
            method:'POST',
            dataType:'JSON',
            url:base_url+link+'/get_all_block_name',
            data:{'dist':dist_id},
            success:function(res)
            {
                block_details = res;
                if(block_details.length !=0)
                {
                    
                $("#block_group").show();

                    blockht = '';
                    $("#block").html('');
                    $.each(block_details,function(i,val){
                        // console.log(val);
                        blockht +='<option value='+val.block_code+'>'+val.block_name+'</option>';
                    });

                    $("#block").append(blockht);
                }else
                {
                    $("#block_group").hide();

                }
            }
        })
    }
});

$('#district').on('select2:unselect', function(e) {
    if($("#dist_checkbox").not(':checked'))
    {
        var dist_id = $("#district").val();
    
        $.ajax({
            url:base_url+'/'+link+'/get_all_block_name',
            data:{'dist':dist_id},
            method:'POST',
            dataType:'JSON',
            success:function(res)
            {
                block_details = res;
                // console.log(block_details.length);
                if(block_details.length !=0)
                {
                $("#block_group").show();

                    blockht = '';
                    $("#block").html('');


                    $.each(block_details,function(i,val){
                        blockht +='<option value='+val.block_code+'>'+val.block_name+'</option>';
                    });

                    $("#block").append(blockht);
                }else
                {
                    $("#block_group").hide();
                }
            }
        })      
    }
});


  $('#block').on('select2:select', function(e) {
    block_array = new Array();
    if($("#block_checkbox").not(':checked'))
    {
        
        var block_name = $("#block").val();
        console.log(block_name);
        $.each(block_name,function(bi,bval){
            console.log(bval);
        block_name = block_details.filter(block=>block.block_code == bval)[0];
        block_array.push(block_name);
        });

    }


 });

  $('#block').on('select2:unselect', function(e) {
    block_array = new Array();
    if($("#block_checkbox").not(':checked'))
    {
        var block_name = $("#block").val();

        $.each(block_name,function(bi,bval){
        block_name = block_details.filter(block=>block.block_code == bval)[0];
        block_array.push(block_name);
        });
    }
    console.log(block_array);

    });


    $(document).on('change','#to_msg',function()
    {
        var type = $(this).val();
        $(".stu_common").hide();

        if(type==1 || type==14)
        {
            $("#manage_group").show();
        }else if(type==17)
        {
            CKEDITOR.instances['content'].setData('தங்கள் பிள்ளை கடந்த 5 நாட்களாக தொடர்ந்து பள்ளிக்கு வரவில்லை. தலைமை ஆசிரியரை சந்திக்கவும்.');
            $("#manage_group").show();

            $(".stu_common").show();
        }else
        {
            $("#manage_group").hide();
        }
    })



 });


    function save()
    {
            var form = document.myform;
        var title = $("#title").val();
        var content = $("#content").val();
        var school_manage = $("input[name='school_manage[]']:checked")
              .map(function(){return $(this).val();}).get();
        // console.log(school_manage);
        var school_cate = $("input[name='school_cate[]']:checked").map(function(){return $(this).val();}).get();
    var district = $("#district").map(function(){return $(this).val();}).get();
    var to_msg = $("#to_msg").val();
    var block = '';
    if(block_array.length !=0)
    {
        $.each(block_array,function(bi,bval)
        {
            block_array[bi] = {'district_name':bval.district_name,'block_name':bval.block_name};
        });
        block = block_array;
    }else
    {
        // console.log(block_details);
        $.each(block_details,function(bi,bval){
            // console.log(dval);
            $.each(district,function(di,dval)
            {
                if(dval == bval.district_name){  
            // console.log(block);
            block_array.push({'district_name':bval.district_name,'block_name':bval.block_name});
            }
            })

        });
        block = block_array;

    }

    
                // console.log(title);
        var data = '';
                if(to_msg ==1){
         data = {'title':title,'school_cate':school_cate,'school_manage':school_manage,'content':content,'block':block,'to_msg':to_msg};
        }else
        {
         data = {'title':title,'content':content,'block':block,'to_msg':to_msg};

        }
        // console.log(data);return false;
        if(to_msg =='-1' || title =='' || title == null || title == undefined || district =='' || district == null || district == undefined ){
            // console.log('kif');
            $("#errmsg").html("<span style='color:red'>Please Enter The To Message,Title and Select atleast one District</span>");
        }else if(to_msg == 8 && school_manage.length ==0 || school_cate.length ==0)
        {
            $("#errmsg").html("<span style='color:red'>Please Select The atleast one Mangement and Category</span>");
            return false;
        }
        else
        {

            $("#btn").hide();
            $("#errmsg").html('');
            console.log(data);
        $.ajax({
            method:"POST",
            url:base_url+'/'+link+'/save_flash_news',
            dataType:'JSON',
            data:data,
            success:function(res)
            {
                if(res !='')
                {
                    swal('Successfully','Flash News Created','success');
                    window.location.reload();
                }
            }

        })
            
        }

    }

 $('textarea').on("input", function(){
    var maxlength = $(this).attr("maxlength");
    var currentLength = $(this).val().length;

    if( currentLength <= maxlength ){
        $("#msg").html(maxlength - currentLength + " chars left");
    }
}); 

 $(document).ready(function(){
    // $('.display').dataTable();

    var date = new Date();

// switch(date.getDay()){
//     case 0: alert("sunday!"); break;
//     case 6: alert("saturday!"); break;
//     default: alert("any other week day");
// }

            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            
//  $(document).on('click','.datepicker',function(){
//     // startDate: '-3d',
//      $(this).bootstrapDP({
//               container: '#mydatepicker-custom-position',
//                 viewMode:'week'
//             }).bootstrapDP( "show");

    
// });

var curr = new Date;
var firstday = new Date(curr.setDate(curr.getDate() - curr.getDay()));
var lastday = new Date(curr.setDate(curr.getDate() - curr.getDay()+6));

// console.log(firstday,lastday); 
var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

$('.date').datepicker({
    // daysOfWeekDisabled: [0,6]
        
    

});
//  $('.date').datepicker("setStartDate",firstday);

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
</script>


    </body>

</html>