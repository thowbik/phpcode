<?php 

    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Homemodel');
    $school_id=$this->session->userdata('emis_school_id');
    $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id);
    $schoolname  = $schoolprofile[0]->school_name;
    $udise_code  = $schoolprofile[0]->udise_code;
    $blockname  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $schoolcate  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
    $schmanage  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $schdirector  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
     $section_details = [];
     array_push($section_details,array('sections'=>1,'section_ids'=>'A'),array('sections'=>2,'section_ids'=>'B'),array('sections'=>3,'section_ids'=>'C'),array('sections'=>4,'section_ids'=>'D'),array('sections'=>'5','section_ids'=>'E'),array('sections'=>6,'section_ids'=>'F'),array('sections'=>7,'section_ids'=>'G'));
      

    //   print_r($this->session->userdata());
     // print_r($section_details);die;
     ?>     
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
      <style type="text/css">
      .clickable{
    cursor: pointer;   
}
  .panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.center
{
    text-align: center;
}
.tablecolor
{
    background-color: #32c5d2; 
}
body.modal-open {
    overflow-y: hidden !important;
    position: fixed;
}

.table {
  border-collapse: collapse;
}

.table, th, td {
  border: 1px solid black;
}
.dt-button-collection a.buttons-columnVisibility:before,
.dt-button-collection a.buttons-columnVisibility.active span:before {
    display:block;
    position:absolute;
    top:1.2em;
    left:0;
    width:12px;
    height:12px;
    box-sizing:border-box;
}


.dt-button-collection a.buttons-columnVisibility:before {
    content:' ';
    margin-top:-6px;
    margin-left:10px;
    border:1px solid black;
    border-radius:3px;
}

.dt-button-collection a.buttons-columnVisibility.active span:before {
    content:'\2714';
    margin-top:-11px;
    margin-left:12px;
    text-align:center;
    text-shadow:1px 1px #DDD, -1px -1px #DDD, 1px -1px #DDD, -1px 1px #DDD;
}

.dt-button-collection a.buttons-columnVisibility span {
    margin-left:20px;    
}
.sweet-alert {
    background-color: #ffffff;
    width: 478px;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-left: -256px;
    margin-top: -200px;
    overflow: hidden;
    display: none;
    z-index: 10000000 !important;
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
</style>
    <style type="text/css" media="print">
  @page { size: landscape; }
</style>
 <style type="text/css" media="file">
  @page { size: landscape; }
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
                                        <h1>All Student list
                                            
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
                                     <div class="row margin-bottom-20">
                                    <div class="">
<!-- <div class="col-lg-12">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;"><i class="fa fa-university"></i> <?php if($schoolname!=""){ echo $schoolname; } ?> ( <?php if($udise_code!=""){ echo $udise_code; } ?> )</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-9 ">
					
                                                <div class="col-lg-12 col-md-6 ">
                                                     <h3>Block : <?php if($blockname!=""){ echo $blockname; } ?> <br/></h3>
                                                    <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management :</font>  <?php if($schmanage!=""){ echo $schmanage; } ?> 
                                                    
                                                    <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category :</font> 
                                                 <?php if($schoolcate!=""){ echo $schoolcate; } ?>
                                                    <br/>
                                                  <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate :</font>  <?php if($schdirector!=""){ echo $schdirector; } ?> 
                                                
                                                   
                                                </div>
                                            </div>

                                                
                </div>
        </div>
    
    </div> -->
                                       
                                           

                                        </div>
                                       

                                </div>

                                    <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class 
                
                                                        <?php
                                                      // echo $class_id;
                                                      $class_roma = array
                                                            ('I'=>1,'II'=>'2','III'=>'3','IV'=>'4','V'=>'5','VI'=>'6','VII'=>'7','VIII'=>'8','IX'=>'9','X'=>'10','XI'=>'11','XII'=>'12','LKG'=>'13','UKG'=>'14','PreKG'=>'15');
                                                            $class_roman_name = array_search($class_id,$class_roma);
                                                            echo $class_roman_name;
                                                    ?></span> 
                                                </div>
                                                <div class="col-md-offset-5 col-md-4"><?php if(isset($success)){?>
                            <div class="alert alert-success"><button class="close" data-close="alert"></button>
                                <?=$success;?></div>
                            <?php } ?></div>  
                            <div class="col-md-offset-5 col-md-4"><?php if(isset($error)){ ?>
                            <div class="alert alert-danger"><button class="close" data-close="alert"></button>
                            <?php  echo $error; ?> </div><?php } ?></div> 
                            <div class="col-md-offset-5 col-md-4"><?php if(!empty(validation_errors())){?>
                            <div class="alert alert-danger"><button class="close" data-close="alert"></button>
                            <?php echo validation_errors(); ?> </div> <?php } ?></div>   
                                                                           
                                            </div>
                                            <div class="portlet-body">
                                                  <form action="<?=base_url().'Home/emis_distribution_note_book' ?>" method="post">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                     
                                                        <!-- <?php print_r($class_roma);?> -->
                                                      <select name="class_id" id="class_id" class="form-control">
                                                          
                                                        <option value="0">Select Class</option>
                                                        <?php if(!empty($school_classwise)){
                                                            // print_r($school_classwise);
                                                            foreach($school_classwise as $class_wise)
                                                            {

                                                              $class_roman_names = array_search($class_wise->class,$class_roma);
                                                              // echo $class_wise->class_id; 
                                                          ?>
                                                           <option value="<?=$class_wise->class?>" <?php echo ($class_wise->class == $class_id) ? 'selected' : ''; ?>><?=$class_roman_names;?></option>
                                                         <?php } }?>
                                                      </select>
                                                     
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div id="section">
                                                            <select class="form-control" id="section_id">
                                                                <option value="<?=$section_id?>"><?=(!empty($section_id))?$section_id:'All'?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-3">
                                                     
                                                        <!-- <?php print_r($class_roma);?> --
                                                      <select name="medium_id" id="medium_id" class="form-control">
                                                          
                                                        <option value="0">Select Medium</option>
                                                        <?php if(!empty($school_medium)){
                                                            // print_r($school_classwise);
                                                            foreach($school_medium as $medium)
                                                            {

                                                              
                                                              // echo $class_wise->class_id; 
                                                          ?>
                                                           <option value="<?=$medium->MEDINSTR_ID?>" <?php echo ($medium->MEDINSTR_ID == $medium_id) ? 'selected' : ''; ?>><?=$medium->MEDINSTR_DESC;?></option>
                                                         <?php } }?>
                                                      </select>
                                                     
                                                    </div> -->
                                                    <div class="col-md-3">
                                                      <div id="term">
                                                            <select class="form-control" id="section_id">
                                                                <option value="0">Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div id="note_book">
                                                            <select class="form-control" id="section_id">
                                                                <option value="0">Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                               
                                                    
                                                    <div class="col-md-3">
                                                    <button class="btn btn-primary" onclick="return class_validation();">Search</button>
                                                    <div id="msg"></div>
                                                </div>
                                                </div>
                                                  </form>

                                            </div>
                                        </div>
           
                                        <!-- BEGIN CARDS -->
                                        
                                       
                                              
                                                  <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class <?=$class_roman_name?></span> - <span class="caption-subject font-dark sbold" id="note_books_det"> </span>
                                                    <input type="hidden" id="hid_ava_count">
                                                </div>

                                            </div>

                                                
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Data List </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    <?php if(!empty($students_list)){  
                                                       // echo"<pre>";print_r($allstuds);echo"</pre>";?>
                                                        <table class="table table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th> sno </th>         
                                                                    <th> <input type="checkbox" id="select_all_student"> Select All</th>

                                                                    <th class=""> Unique id</th>
                                                                    <th class=""> Student Name</th>
                                                                   
                                                                    <th>No. of notebooks given</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i=1; 

                                                                // print_r($students_list);
                                                                foreach($students_list as $all){ ?>
                                                                <tr> 
                                                                    <td><?=$i?></td>
                                                                    <td style="text-align: center !important;"><input type="checkbox" class="checkbox students_list" id="students_details" name="students_deatils[]" value="<?=$i;?>" <?=$all->sch_dist_id!=''?'checked':''?>></td>
                                                                   <!--  <td><a onclick="savestudentid1('<?php echo $all->unique_id_no; ?>')"><?php echo $all->unique_id_no; ?></a></td> -->
                                                                    <td><a href="javascript:void(0);" 
                                                                        onclick="get_note_details(<?=$all->students_id;?>)"><?php echo $all->unique_id_no; ?></a>
                                                                        <input type="hidden" id="stu_id<?=$i;?>" value="<?=$all->students_id;?>">
                                                                    </td>
                                                                     <td><?=$all->name;?></td>
                                                                    
                                                                <td><input type="text" value="<?=$all->count;?>" id="entry_count<?=$i;?>" class="form-control" onchange="check_note_book_quantity(this.value,<?=$i;?>)" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td>
                                                                 
                                                                 <!-- <td><a href="javascript:void(0)" onclick="transfertab(<?=$all->id;?>)"><i class="fa fa-exchange"></i></a>
                                                                 </td>  -->
                                                                 
                                                                </tr>
                                                                <?php $i++; } ?>
                                                            
                                                      
                                                            </tbody>
                                                        </table>
                                                         <?php } else { ?><center>No Data Available!</center><?php } ?>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                    <div class="col-md-offset-8 col-md-4">
             <br/><button class="btn btn-primary" onclick="save();" id="confirm">Submit</button>
                    <font style="color:red;"><span id="err_msg"></span></font>
                </div>
                                                </div>

                                            </div>
                                             
            
                                               <br/>
                                        </div>     









                                        <!-- END CARDS -->

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

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span id="stu_id"></span></h4>
        </div>
        <div class="modal-body">

            
                                                <div class="row">
                            <div class="col-md-12" id="note_grp">
                              
                    

            
            </div>

                    </div>


            

            <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" onclick="save(2);"class="btn btn-primary">Save</button>
          <div id="err_msg_note"></div>
        </div>
        </div>
      </div>
     </div>
    </div>
  


        <?php $this->load->view('scripts.php'); ?>


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
    <script>
            $(document).ready(function(){
                $('#emis_reg_stu_idname').on('keydown',function(event){
                    if(event.which==121){
                        // alert();
                        $(this).toggleClass('tamil');
                        return false;
                    }
                    if($(this).hasClass('tamil')){
                        toggleKBMode(event);
                    }else{
                        return true;
                    }
                });
                $('#emis_reg_stu_idname').on('keypress',function(event){
                    if($(this).hasClass('tamil')){
                        convertThis(event);
                    }
                });
            });
			function getdropdown()
	{
	  var drop= $('#emis_reg_stu_rte').val();
      if(drop == 'Yes'){
		$("#rtetype").show();
		}
		else
		{
		$("#rtetype").hide();	
		}
	}
        </script>
    <script type="text/javascript">
        $(document).ready(function(){
    // $('.display').dataTable();
    
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           
 var curr = new Date();

// console.log(curr.getFullYear()-19); 
var first = new Date(curr.getFullYear() -19,'01','01');
var end = new Date(curr.getFullYear() -3,curr.getMonth(), curr.getDate());

$('.date').datepicker({
    // daysOfWeekDisabled: [0,6]
        
    

});
$(".date1").datepicker({
   
});
// console.log(first,end);
 $('.date').datepicker("setStartDate",first);

$('.date').datepicker("setEndDate",end);
 // $(".datepicker").val(new Date());

      });
        function textvalidate(id,alertid){
                
            var text = document.getElementById(id);
            var alt = document.getElementById(alertid);
            if(text.value==''){
                alt.innerHTML="Required Field";
            }else {
                alt.innerHTML="";
            }
        }
    </script>
<script type="text/javascript">
                $("#book_select").select2({closeOnSelect:false});

  var class_id = 0;
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
  class_id = $('#class_id').val();
  // var section_id  =0;
 section_id = <?php echo json_encode($section_id,JSON_PRETTY_PRINT);?>;
 term_id = <?php echo json_encode($term_id,JSON_PRETTY_PRINT);?>;
 note_book_id = <?php echo json_encode($note_book_id,JSON_PRETTY_PRINT);?>;

  get_section(class_id,section_id);
  get_term(class_id,term_id);
    var group_id = (class_id ==9 || class_id==10 ?0:term_id);
    get_available_notebook(class_id,group_id,note_book_id);
var note_books_arr  = new Array();

})
    $(document).on('change','#class_id',function()
{
    class_id = $(this).val();
    section_id = null;


    get_section(class_id,section_id);
    get_term(class_id,section_id);



    // var school_id = $("#school_code").val();
    

})
    function get_term(class_id,section_id)
    {
  // alert(section_id);

        if(class_id !=0)
        {
            $("#term").empty('');            

            if(class_id <=8)
            {
                
                     var section_drop ='<select name="term_id" class="form-control" id="term_id"><option value=0>Select Term</option><option value=1>Term1</option> <option value=2>Term2</option> <option value=3>Term3</option></select>';
                            $("#term").append(section_drop); 
                            if(section_id !=0 && section_id !=null){
                            // alert(section_id);
                            $("#section_id").val(section_id).attr('selected','selected');   
                            }else
                            {
                                // console.log('else');
                                $("#section_id").val(0).attr('selected','selected');
                            }  
            }else if(class_id ==9 || class_id==10)
            {
                // console.log('else if');
                var section_drop = '';
            get_available_notebook(class_id,0,'')

                            $("#term").append(section_drop); 

            }else if(class_id==11 || class_id ==12)
            {
                    var grp_id = (class_id==11?1:2);
                  $.ajax(
                    {
                        type: "POST",
                        url:baseurl+'Home/emis_school_group_get',
                        data:{'group_id':grp_id,'table':'baseapp_group_code'},
                        dataType:'json',
                        success: function(resp){
                        // alert(resp);  
                       
                        var section = resp;
                        // console.log(section);

                        var section_drop = '<select name="term_id" class="form-control" id="term_id">';

                        section_drop += '<option value=0>Select</option>';
                        $.each(section,function(id,val)
                        {
                            section_drop +='<option value='+ val.group_code +'>'+val.group_name+'</option>';
                        })
                            section_drop +='</select>';
                            $("#term").append(section_drop); 
                            
                                
                         },

                          
                    }) 
                         // console.log(section_drop);
            }
            if(section_id !=0 && section_id !=null){
                            // alert(section_id);
                            $("#term_id").val(section_id).attr('selected','selected');   
                            }else
                            {
                                // console.log('else');
                                $("#term_id").val(0).attr('selected','selected');
                            }  

    
        }
    }

    function get_section(class_id,section_id)
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
            $("#section").empty('');            

        var section_drop = '<select name="section_id" class="form-control" id="section_id">';

        section_drop += '<option value=0>All</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
        })
            section_drop +='</select>';
            
            $("#section").append(section_drop); 
            // alert(section_id);
            if(section_id !=0 && section_id !=null){
            $("#section_id").val(section_id).attr('selected','selected');   
            }else
            {
                console.log('else');
                $("#section_id").val(0).attr('selected','selected');
            }      
         },
          
    })
    }
    }

    $(document).on('change',"#term_id",function()
    {
            var class_id = $("#class_id").val();
            var group_id = $(this).val();
            get_available_notebook(class_id,group_id,'')
    })

    function get_available_notebook(class_id,group_id,notebook_id)
    {
        if(class_id !=0)
        {
            note_books_arr = [];
            $.ajax(
            {
                type: "POST",
                url:baseurl+'Home/get_note_books_count',
                data:{'class_id':class_id,'group_id':group_id},
                dataType:'JSON',
                success: function(res){
                // alert(resp);  
               note_books_arr = res;
                
                // console.log(resp);

                    $("#note_book").empty('');            

                var section_drop = '<select name="note_books" class="form-control" id="note_book_id">';

                section_drop += '<option value=0>Select</option>';
                $.each(note_books_arr,function(i,val)
                {
                    section_drop +='<option value='+ val.sch_id +'>'+val.scheme_category+'</option>';
                    // note_books_arr.push(val);
                })
                    section_drop +='</select>';
                    
                    $("#note_book").append(section_drop); 
                    // alert(section_id);
                    if(notebook_id !=0 && notebook_id !=null){
                    $("#note_book_id").val(notebook_id).attr('selected','selected');   
                    }else
                    {
                        console.log('else');
                        $("#note_book_id").val(0).attr('selected','selected');
                    }   
    ava_count(note_book_id);

                 },
                  
            })
        }
    }

   function ava_count(note_id){
    console.log(note_id);
            // var note_id = $(t/his).val();l
            $("#note_books_det").html('');
            console.log(note_books_arr);
            if(note_id !=null)
            {
                note_arr = note_books_arr.filter(note=>note.sch_id == note_id)[0];
                console.log(note_arr);
                $("#note_books_det").html("( "+note_arr.scheme_category+" Note Book Maximum "+note_arr.count+" Per Student )");
                $("#hid_ava_count").val(note_arr.count);
            }
    }

    
    function class_validation()
{
    // alert();
    var class_id = $("#class_id").val();
    // console.log(class_id);
    // var section = $("#section_id").val();
    // console.log(section);
    if(class_id =='0')
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

<script type="text/javascript">
    

//".checkbox" change 
// $('#book_select').change(function(){ 
//     //uncheck "select all", if one of the listed checkbox item is unchecked
//     if(false == $(this).prop("checked")){ //if this item is unchecked
//         $("#book_select").prop('checked', false); //change "select all" checked status to false
//     }
//     console.log($(".book_select:checked").length);
//     //check "select all" if all checkbox items are checked
//     if ($('#select_all:checked').length == $('.book_select:checked').length ){
//         $("#select_all").prop('checked', true);
//     }
// });


$("#select_all_student").change(function()
{
    $(".students_list").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status

})

$(document).on('change',"#select_all_books",function()
{
    alert();
    $(".books_list").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status

})


</script>
<script type="text/javascript">
    var class_id = $("#class_id").val();
    var medium_id = $("#medium_id").val();
    var term = <?php echo json_encode($section_id);?>;
    var student_note_count = new Array();
    var student_list = new Array();
    var book_list =  new Array();
    var note_book_list = '';
    var students_deatils = <?=json_encode($students_list);?>;
    var students_detail = '';
    // var book_id = '';
    $("#select_all").click(function(){
        if($("#select_all").is(':checked') )
        {
            $("#book_select > option").prop("selected","selected");
            $("#book_select").trigger("change");
                book_list = $("#book_select").val();
        }else
        {
                 $("#book_select > option").removeAttr("selected");
            $("#book_select").trigger("change");
            $("#book_select").prop('disabled',false);
                book_list = '';
        }
    });
    

    function get_note_details(stu_id='')
    {
        // alert();
        student_name = new Array();
        stu_id!=''?student_name.push(stu_id):'';
        $("#err_msg").html('');
        
        students_detail = students_deatils.filter(stu=>stu.students_id==stu_id)[0];
        
        $.each($("input[name='students_deatils[]']:checked"), function() {
                    var student_id = $(this).val();
                    var d_date = get_date();
                    student_name.push(student_id);

                    // student_list.push({'id':'','scheme_id':'9','scheme_category':'Books','school_id':'','class':class_id,'medium':medium_id,'group_code':term,'student_id':student_id,'book_id':books,'distribution_date':d_date,'isactive':1,'created_date':d_date});
                })
        if(student_name.length ==0)
        {
                $("#err_msg").html('<p>Please Select Students List</p>');
        }else{

        $.ajax({
                method:"POST",
                data:{'stu_id':stu_id,'class_id':class_id,'medium_id':medium_id,'section_id':term},
                url:"<?=base_url().'Home/emis_distribution_notebook_edit'?>",
                dataType:'JSON',
                success:function(res)
                {
                    $("#note_grp").html();
                    var table_grp = '<table class="table" id="note_books"><thead><tr><th>S.No</th><th>Category Name</th><th>Avabile Count</th><th>Entry Count</th><th>Count (Count Given know)</th></tr></th>';
                    if(res.length !=0)
                    {
                        note_book_list = res;
                        table_grp += '<tbody>';
                        $.each(res,function(i,val)
                        {
                            var j = i+1;
                            var entry_count = (val.entry_count!==undefined?val.entry_count:0);
                            table_grp +='<tr>';
                            table_grp +='<td>'+j+'</td>';
                            var count = val.count - entry_count;
                            
                            table_grp +='<td>'+val.cate+'<input type="hidden" value='+val.scheme_category+' id="cate'+j+'"></td>';
                            table_grp +='<td>'+val.count+'</td>';
                            table_grp +='<td>'+entry_count+'</td>';
                            

                            table_grp +='<td><input type="text" class="form-control" name="note_count'+val.scheme_category+'" id="note_count'+val.scheme_category+'" value='+count+' onchange="check_note_book_quantity(this.value,'+val.id+')"></td>';
                            table_grp +='</tr>';
                            

                        })
                        table_grp +="<tbody></table>";

                        $("#note_grp").html(table_grp);

                        $("#myModal").modal('show');
                    }
                }
            })
        }
    }

    // $("input[name='books[]']").click(function(){
    // // $(".date").attr('disabled',false);
    //         student_list = new Array();
    //         studnet_name = new Array();
    //         book_list = new Array();
    //         $.each($("input[name='books[]']:checked"),function(){
    //             var books = $(this).val();
    //             book_list.push(books);
                
            
    //         // console.log(book_list);
    //     });

    // $("#select_all").change(function(){
    // // $(".date").attr('disabled',false);
    //         student_list = new Array();
    //         studnet_name = new Array();
    //         book_list = new Array();
    //         // alert();
    //         $.each($("input[name='books[]']:checked"),function(){
    //             // console.log($(this).val());
    //             var books = $(this).val();
    //             book_list.push(books);
                
    //         })
    //         // console.log(book_list);
    //     });

    function get_date()
    {
        var date_join = new Date();
        // console.log(date_join);
        var doj_month = date_join.getMonth()+1;
        var doj = date_join.getFullYear()+'-'+(doj_month < 10 ? '0'+doj_month:doj_month)+'-'+(date_join.getDate() < 10 ? '0'+date_join.getDate():date_join.getDate());
        return doj;
    }

    $("#book_select").change(function()

    {
        book_list = $(this).val();
    })

    var status = false;
    function check_note_book_quantity(note_val,i)
    {
        $("#err_msg").html('');
       var ava_count =  $("#hid_ava_count").val();
        // var note_list = note_book_list.filter(note=>note.id==id)[0];
                            ava_count = (ava_count!=''?ava_count:0);
        console.log(note_val,ava_count);

                            
        if(parseInt(ava_count) < parseInt(note_val))
        {
                $("#err_msg").html('<p style="color:red">Please Enter The Less then value</p>');

                                
                                // $("#entry_count"+i).focus();
                                // $("#entry_count"+i).css('background-color','red');
                                // setTimeout(function(){
                                // $("#entry_count"+i).css('background-color','');
                                // },500);
                status= true;
        }else
        {
            status = false;
        }
    }

    function save()
    {
        // alert();
                    console.log(status);
        $("#err_msg").html('');
        student_note_count = new Array();
        student_list = new Array();
                    var d_date = get_date();
                // console.log(students_detail);return false;

               
                    
                            $.each($("input[name='students_deatils[]']:checked"), function() {
                                var i = $(this).val();
                                var student_id = $("#stu_id"+i).val();
                                var count = $("#entry_count"+i).val();
                                var d_date = get_date();
                                // console.log(count);
                                var sch_cate = $("#note_book_id").val();
                                if(count =='')
                                {
                                student_note_count.push(i);
                                    $("#err_msg").html('<p style="color:red">Please Enter The Note Details</p>');
                                    $("#entry_count"+i).focus();
                                $("#entry_count"+i).css('background-color','red');
                                setTimeout(function(){
                                $("#entry_count"+i).css('background-color','');
                                },500);
                                return false;
                                }else
                                {
                                    student_list.push({'scheme_id':'3','scheme_category':sch_cate,'school_id':'','class':class_id,'group_code':term,'student_id':student_id,'count':count,'distribution_date':d_date,'isactive':1,'created_date':d_date});
                                    // console.log('else');
                            
                                }
                            })
                        
                    
                
                // console.log(student_list);
        // switch(flag){
        //     case 1:

                // console.log(typeof(status));
         
            if(student_list.length ==0)
            {
                $("#err_msg").html('<p style="color:red">Please Select Note Book List</p>');
                // console.log(student_name);
            }else if(student_note_count.length !=0)
            {
                $("#err_msg").html('<p style="color:red">Please Enter The Value</p>');

            }
            else if(status=='true')
            {
                $("#err_msg").html('<p style="color:red">Please Enter The Less then value</p>');

            }
            else
            {
                // console.log('else');
               
                // console.log(student_list);return false;
                var data = {'records':student_list};
                swal({
                title: "Are you sure?",
                text: "Are You Sure?Book Distribution",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Yes",
                cancelButtonText:'Cancel',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(isConfirm){
                if (isConfirm)
                {
                    $("#confirm").html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:16px"></i>');
                    $.ajax(
                    {
                        method:"POST",
                        url:"<?=base_url().'Home/emis_distribution_notebooks_save'?>",
                        dataType:'JSON',
                        data:data,
                        success:function(res)
                        {
                            // console.log(res);
                            swal({
                                title:"successfully Saved Book Distribution",
                                type:'success',
                                confirmButtonText: "Ok",
                            },function(isConfirm)
                            {
                                window.location.reload();
                            })
                        }
                    })
                }
              });
            }
            // break;
            // case 2:
            // $.each($("input[name='books_name[]']"),function(){
            //     // console.log($(this).val());
            //     var books = $(this).val();
            //         if($(this).is(":checked")){
            //         student_list.push({'id':'','scheme_id':'9','scheme_category':'Books','school_id':'','class':class_id,'medium':medium_id,'group_code':term,'student_id':students_detail.students_id,'book_id':books,'distribution_date':d_date,'isactive':1,'created_date':d_date});
            //         }else
            //         {
            //             student_list.push({'id':'','scheme_id':'9','scheme_category':'Books','school_id':'','class':class_id,'medium':medium_id,'group_code':term,'student_id':students_detail.students_id,'book_id':books,'distribution_date':d_date,'isactive':0,'created_date':d_date});
            //         }
            //     });
            // // console.log(student_list);return false;
            //     var data = {'records':student_list};
            //         swal({
            //         title: "Are you sure?",
            //         text: "Are You Sure?Book Distribution",
            //         type: "warning",
            //         showCancelButton: true,
            //         confirmButtonColor: "#ff0000",
            //         confirmButtonText: "Yes",
            //         cancelButtonText:'Cancel',
            //         closeOnConfirm: false,
            //         showLoaderOnConfirm: true
            //     }, function(isConfirm){
            //         if (isConfirm)
            //         {
            //             $("#confirm").html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:16px"></i>');
            //             $.ajax(
            //             {
            //                 method:"POST",
            //                 url:"<?=base_url().'Home/emis_distribution_books_save'?>",
            //                 dataType:'JSON',
            //                 data:data,
            //                 success:function(res)
            //                 {
            //                     // console.log(res);
            //                     swal({
            //                         title:"successfully Saved Book Distribution",
            //                         type:'success',
            //                         confirmButtonText: "Ok",
            //                     },function(isConfirm)
            //                     {
            //                         window.location.reload();
            //                     })
            //                 }
            //             })
            //         }
            //       });
            // break;
        
    }


</script>
 <script>
            $(document).ready(function()
{
    sum_dataTable('#sample_3');
});

function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Blfrtip',
      
        buttons: [
                { extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
            ],
            columnDefs: [ {
"targets": 1,
"orderable": false
} ],
            order: [[0, "asc"]],
            lengthMenu: [[20], [20]],
            pageLength: 20,
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
                console.log(a);
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
               
            
            $(column.footer()).html(sum);
                        });
            }
        });
    }
        </script>
</html>