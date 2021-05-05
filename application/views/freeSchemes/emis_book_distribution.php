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
                                                <div class="row">
                                                  <form action="<?=base_url().'Home/emis_school_book_distribution' ?>" method="post">
                                                    <div class="col-md-3">
                                                     
                                                        <!-- <?php print_r($class_roma);?> -->
                                                      <select name="class_id" id="class_id" class="form-control">
                                                          
                                                        <option value="0">Select Class</option>
                                                        <?php if(!empty($school_classwise)){
                                                            // print_r($school_classwise);
                                                            foreach($school_classwise as $class_wise)
                                                            {

                                                              $class_roman_names = array_search($class_wise->class_id,$class_roma);
                                                              // echo $class_wise->class_id; 
                                                          ?>
                                                           <option value="<?=$class_wise->class_id?>" <?php echo ($class_wise->class_id == $class_id) ? 'selected' : ''; ?>><?=$class_roman_names;?></option>
                                                         <?php } }?>
                                                      </select>
                                                     
                                                    </div>
                                                    <div class="col-md-3">
                                                     
                                                        <!-- <?php print_r($class_roma);?> -->
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
                                                     
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div id="section">
                                                            <select class="form-control" id="section_id">
                                                                <option value="0">Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" onclick="return class_validation();">Search</button>
                                                    <div id="msg"></div>
                                                  </form>
                                                </div>

                                            </div>
                                        </div>
           
                                        <!-- BEGIN CARDS -->
                                        
                                       
                                              
                                                  <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class <?=$class_roman_name?></span>
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
                                                                    <th class="detail"> Section </th>
                                                                    <!-- <th class="detail">Pass/Fail</th> -->
																	 <!-- <?php 
                                                    if($class_id == 11 || $class_id == 12){ ?>
                                  <th> Group Name </th><?php }?> -->
                                                                    
                                                                    
                                                                    <th class="detail">Medium</th>
                                                                   
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i=1; 

                                                                // print_r($students_list);
                                                                foreach($students_list as $all){ ?>
                                                                <tr> 
                                                                    <td><?=$i?></td>
                                                                    <td style="text-align: center !important;"><input type="checkbox" class="checkbox students_list" id="students_details" name="students_deatils[]" value="<?=$all->students_id;?>"></td>
                                                                   <!--  <td><a onclick="savestudentid1('<?php echo $all->unique_id_no; ?>')"><?php echo $all->unique_id_no; ?></a></td> -->
                                                                    <td><a href="javascript:void(0);" 
                                                                        onclick="opentab(<?=$all->students_id;?>)"><?php echo $all->unique_id_no; ?></a></td>
                                                                     <td><?=$all->name;?></td>
                                                                    <td><?php echo $all->class_section; ?></td>
																	
                                                                <!-- <td><?=$all->group_name;?></td> -->
                                                                
                                                                <td><?=$all->MEDINSTR_DESC?></td>
                                                                 
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
                                                </div>
                                            </div>
                                             <?php if(!empty($books_details)){?>
                                                <div class="row">
                            <div class="col-md-offset-1 col-md-6">
                                <input type="checkbox" id="select_all" >Select All
                                <label class="control-label">Text Books *</label>
                                   <select multiple id="book_select" class="block" style="width:300px" name="block[]">
                                    
                        <?php foreach($books_details as $books)
                        {


                ?>
                        
                                    <option value="<?=$books->book_id;?>"><?=$books->book_name;?></option>
                        
                    

            <?php }?>
        </select>
                    
            </div>
            <div class="col-md-1">
                                <label class="control-label">Distribution Date *</label>
                
            </div>
            <div class="col-md-3">

                                                    
                                                    <div class="form-group">
                                                        <input type="text" name="emis_book_date"  class="form-control date" id="dat" value="" autocomplete="off"  placeholder="DD-MM-YYYY" onkeypress="return event.charCode >= 48"required />
                                                    </div>
                                                </div>
            <div class="col-md-offset-3 col-md-4 ">
                <input type="radio" value="1" name="distrbution" id="distrbution" checked="checked">Distributed&nbsp;
                <input type="radio" value="0" name="distrbution" id="not_distrbutiondistrbution">Not Distributed&nbsp;
            </div>
            <div class="col-md-offset-8 col-md-4">
             <br/><button class="btn btn-primary" onclick="save(1);" id="confirm">Submit</button>
                    <font style="color:red;"><span id="err_msg"></span></font>
                </div>
                    </div>


            <?php  }?>
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

            <?php if(!empty($books_details)){?>
                                                <div class="row">
                            <div class="col-md-12">
                                    <input type="checkbox" name="" id="select_all_modal">Select ALL<br/>
                        <?php foreach($books_details as $books)
                        {


                ?>
                        
                        <input type="checkbox" id="book_selected" class="book_selected"name="books_name[]" value="<?=$books->book_id;?>"><?=$books->book_name;?>&nbsp;&nbsp;&nbsp;
                    

            <?php }?>
            </div>

                    </div>


            <?php  }?>

            <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" onclick="save(2);"class="btn btn-primary">Save</button>
          <div id="err_msg"></div>
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
// var first = new Date(curr.getFullYear());
var end = new Date(curr.getFullYear(),curr.getMonth(), curr.getDate()+1);

$('.date').datepicker({
    // daysOfWeekDisabled: [0,6]
        
    

});
$(".date1").datepicker({
   
});
// console.log(first,end);
 // $('.date').datepicker("setStartDate",first);

$('.date').datepicker("setEndDate",end);
var doj_month = curr.getMonth()+1;

var doj = (curr.getDate() < 10 ? '0'+curr.getDate():curr.getDate())+'-'+(doj_month < 10 ? '0'+doj_month:doj_month)+'-'+curr.getFullYear();
console.log(doj);
$('#dat').val(doj);
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
  get_section(class_id,section_id);

})
    $(document).on('change','#class_id',function()
{
    class_id = $(this).val();
    section_id = null;


    get_section(class_id,section_id);



    // var school_id = $("#school_code").val();
    

})
    function get_section(class_id,section_id)
    {
  // alert(section_id);

        if(class_id !=0)
        {
            $("#section").empty('');            

            if(class_id <=8)
            {
                
                     var section_drop ='<select name="section_id" class="form-control" id="section_id"><option value=0>Select Term</option><option value=1>Term1</option> <option value=2>Term2</option> <option value=3>Term3</option></select>';
                            $("#section").append(section_drop); 
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
                            $("#section").append(section_drop); 

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

                        var section_drop = '<select name="section_id" class="form-control" id="section_id">';

                        section_drop += '<option value=0>Select</option>';
                        $.each(section,function(id,val)
                        {
                            section_drop +='<option value='+ val.group_code +'>'+val.group_name+'</option>';
                        })
                            section_drop +='</select>';
                            $("#section").append(section_drop); 
                            
                            if(section_id !=0 && section_id !=null){
                            // alert(section_id);
                            $("#section_id").val(section_id).attr('selected','selected');   
                            }else
                            {
                                // console.log('else');
                                $("#section_id").val(0).attr('selected','selected');
                            }      
                         },

                          
                    }) 
                         // console.log(section_drop);
            }


    
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


</script>
<script type="text/javascript">
    var class_id = $("#class_id").val();
    var medium_id = $("#medium_id").val();
    var term = <?php echo json_encode($section_id);?>;
    var student_name = new Array();
    var student_list = new Array();
    var book_list =  new Array();
    var book_details = <?=json_encode($books_details);?>;
    var students_deatils = <?=json_encode($students_list);?>;
    var students_detail = '';
    // var book_id = '';
    $("#select_all").click(function(){
    if($("#select_all").is(':checked') ){
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
    function opentab(id)
    {
            students_detail = students_deatils.filter(stu=>stu.students_id==id)[0];
            // console.log(students_detail);
            
            $.ajax({
                method:"POST",
                data:{'stu_id':id,'class_id':class_id,'medium_id':medium_id,'section_id':term},
                url:"<?=base_url().'Home/emis_distribution_book_edit'?>",
                dataType:'JSON',
                success:function(res)
                {
                    if(res.length !=0)
                    {

                        $.each(res,function(i,val)
                        {
                            // console.log(val.book_id);
                            if(val.isactive==1){
                            $("input[name='books_name[]'][value="+val.book_id+"]").prop('checked',true);
                            }
                        })
                        $("#myModal").modal('show');
                    }
                }
            })
    }

    // $("input[name='books[]']").click(function(){
    // // $(".date").attr('disabled',false);
    //         student_list = new Array();
    //         studnet_name = new Array();
    //         book_list = new Array();
    //         $.each($("input[name='books[]']:checked"),function(){
    //             var books = $(this).val();
    //             book_list.push(books);
    //             $.each($("input[name='students_deatils[]']:checked"), function() {
    //                 var student_id = $(this).val();
    //                 var d_date = get_date();
    //                 student_name.push(student_id);

    //                 student_list.push({'id':'','scheme_id':'9','scheme_category':'Books','school_id':'','class':class_id,'medium':medium_id,'group_code':term,'student_id':student_id,'book_id':books,'distribution_date':d_date,'isactive':1,'created_date':d_date});
    //             })
    //         })
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


    function save(flag)
    {
                    // console.log(book_list);return false;
        $("#err_msg").html('');
        student_name = new Array();
        student_list = new Array();
        var books_names = new Array();
                    var d_date = get_date();
                   var dist_status=   $("input[name=distrbution]:checked").val();
                // $("input[name=transition]:checked").val();

        switch(flag){
            case 1:
            var student_count  = $("input[name='students_deatils[]']:checked").length;
            // console.log(book_details);
            book_details = book_details;
                $.each(book_list,function(i,val){
                // console.log($(this).val());
                // console.log(val);
                var book_detail = book_details.filter(books=>books.book_id==val)[0];
                // console.log(book_detail);
                var books = val;
                var dist_date =$("#dat").val();
                // book_list.push(books);
                $.each($("input[name='students_deatils[]']:checked"), function() {
                    var student_id = $(this).val();
                    student_name.push(student_id);

                    student_list.push({'id':'','scheme_id':'9','scheme_category':'Books','school_id':'','class':class_id,'medium':medium_id,'group_code':term,'student_id':student_id,'book_id':books,'distribution_date':dist_date,'isactive':dist_status,'created_date':d_date});
                })
                books_names.push(book_detail.book_name);
            })
            var books_count = (dist_status==1?'Distributed ':'Not Distributed ')+books_names.join(',')+' To '+student_count+' Students'
            if(book_list.length ==0)
            {
                $("#err_msg").html('<p>Please Select Book List</p>');
                // console.log(student_name);
            }else if(student_name.length==0)
            {
                $("#err_msg").html('<p>Please Select Student List</p>');

            }else
            {
                // console.log('else');
               
                // console.log(student_list);return false;
                var data = {'records':student_list};
                swal({
                title: "Are you sure?",
                text: books_count,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Confirm",
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
                        url:"<?=base_url().'Home/emis_distribution_books_save'?>",
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
            break;
            case 2:
            $.each($("input[name='books_name[]']"),function(){
                // console.log($(this).val());
                var books = $(this).val();
                    if($(this).is(":checked")){
                    student_list.push({'id':'','scheme_id':'9','scheme_category':'Books','school_id':'','class':class_id,'medium':medium_id,'group_code':term,'student_id':students_detail.students_id,'book_id':books,'distribution_date':'','isactive':1,'created_date':d_date});
                    }else
                    {
                        student_list.push({'id':'','scheme_id':'9','scheme_category':'Books','school_id':'','class':class_id,'medium':medium_id,'group_code':term,'student_id':students_detail.students_id,'book_id':books,'distribution_date':'','isactive':0,'created_date':d_date});
                    }
                });
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
                            url:"<?=base_url().'Home/emis_distribution_books_save'?>",
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
            break;
        }
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