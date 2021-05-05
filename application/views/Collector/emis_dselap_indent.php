

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
text-align: center;
}

.color-box-green
{
    
    cursor: pointer;
    width: 29px;
    height: 11px;
    border-radius: 3px;


}
div.dt-button-collection>a.dt-button>span
{
    color: red!important;
}
div.dt-button-collection>a.dt-button.active>span {
    color: green!important;
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
            

  <?php $this->load->view('Collector/header.php'); ?>

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
                                     <div class="row">
                                                    
                                       <form action="<?=base_url().'Collector/deslap_indent'?>" method="post">
                                                
                                                    <div class=" col-md-3">
                                                					 <label class="control-label bold">Class</label>
																 <select style="width: 90%;" class="form-control"   tabindex="1" id="lap" name="lap"   required="" >
                                                               	
                                                                <option value="0">Select Class</option>
                                                                <option value="011">CurrentYear 11std </option>
																<option value="012">CurrentYear 12std </option>
																<option value="112">PerviousYear 12 std</option>
																
									                           
                                                               </select>
</div> 
             
<div class="col-md-3">
<h2></h2>
        <button type="sumbit" class="btn green btn-md" >Submit</button>
                             </div>                           
                                            
                                              </form>

                                              
                                                </div> 
                                            </div>
                                      
                                        <div class="portlet light">
                                            <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs category -->
            <!--<ul class="nav nav-tabs nav-tabs-success faq-cat-tabs " id="myTab">
                <li class="active"><a href="#faq-cat-1" data-toggle="tab">Boys</a></li>
                <li><a href="#faq-cat-2" data-toggle="tab">Girls</a></li>
                

            </ul> -->
    
            <!-- Tab panes -->
            <div class="tab-content faq-cat-content">
                <div class="tab-pane active in fade" id="faq-cat-1">
                    <div class="panel-group" id="accordion-cat-1">
                        <div class="panel panel-default panel-faq" >
                         

							  <?php 
														if(!empty($lap_indent))
														{
														foreach($lap_indent as $uf)
														{
															
														}
														}
														?>
                            <div id="faq-cat-1-sub-1" class="panel-collapse panel-collapse collapse in" aria-expanded="true" style>
                             
                        </div>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading active-faq">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#" aria-expanded="true" class>
                                    <h4 class="panel-title">
									<input type ="hidden" value =<?php echo $uf->scheme_category  ;?> >
                                        <i class="fa fa-globe"></i> Laptop Indent Summary 
														
                                        
                                        <span class="pull-right"><i class="glyphicon glyphicon"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-2" class="panel-collapse panel-collapse collapse in" aria-expanded="true" style>
                                 <div class="panel-body" style="overflow:auto">
                                    <br/>
                                 
                                   <table class="table table-striped table-bordered table-hover district" id="sample_3" style="text-align: center;">
								   
								   
                                 
                                  <thead>
                                <tr>
                                <th style="text-align: center;">S.No</th>
							
							  <?php  if(!empty($uf->block_name)) {?>
							  <th style="text-align: center;">Block</th>
							  	  <?php } else {?>
								  <th style="text-align: center;">School</th>
								  <?php } ?>
								  
							 <?php if($uf->transfer_flag ==0 and $uf->c11 !=0){?>
                              <th style="text-align: center;"> CurrentYear 11std</th>
							 <?php }else if($uf->transfer_flag != 1) {?>
								 <th style="text-align: center;"> CurrentYear 12std</th> 
							 <?php } else {?>
							   <th style="text-align: center;">PerviousYear 12 std </th>
						     <?php } ?>
							  
                              </tr>
                              </thead>
                                <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($lap_indent)){
								  $i=1;
								
								  $c11= [];
								  $c12= [];
								 foreach($lap_indent as $uf){ 
                                                              
                                ?>
								
        
                              <tr>
							  <?php if($tflag == 0 and $cls !=0) {
								  $flg = $tflag;
								  $clas = 11;
							      }else if($tflag == 0 and $clss !=0){
								  $flg = $tflag;
								  $clas = 12;
								  }else{
								  $flg = 1;
								  $clas = 12;
								  }
								  ?>
							  
							  
                              <td style="text-align: center;"><?php echo $i;?></td>
							  
							
							  <?php  if(!empty($uf->block_name)) {?>
							           <?php if(!empty($flg )){?>
							           <td style="text-align:left;"><a href="<?php echo base_url().'Collector/deslap_indent/?block_id='.$flg.$clas.$uf->scheme_id.$uf->block_id?>"><?php } else {?>
									   <td style="text-align:left;"><a href="<?php echo base_url().'Collector/deslap_indent/?block_id='.'0'.$uf->scheme_id.$uf->block_id?>"><?php }?>
									   
                              <?php echo $uf->block_name;?></a></td>
							  <?php } else {?>
							          
							          <td style="text-align: left;">
                                      <?php echo $uf->school_name;?></td><?php } ?>
							  
							  <?php if($uf->transfer_flag ==0 and $uf->c11 !=0){?>
                              <td style="text-align: center;"><?php echo number_format($uf->c11); ?></td>
							  <?php } else {?>
							  <td style="text-align: center;"><?php echo number_format($uf->c12); ?></td> <?php }?>
							
							
							   
                              
                              
                              
                            
                              </tr>
                              <?php $i++;?>
    <?php                
                             array_push($c11,$uf->c11);
							 array_push($c12,$uf->c12);
							
							 
							
							
							                      ?> 
                                        <?php  } ?>         
                                                      
                            </tbody>
							<tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th> 
															 <?php if($uf->transfer_flag==0 and $uf->c11 !=0){?>
                                                            <th style="text-align: center;" ><?php 
                                                            $c11 = array_sum($c11);
                                                            array_push($total1,$c11);
                                                            echo number_format($c11);?></th>
															 <?php } else {?>
															 <th style="text-align: center;" ><?php 
                                                            $c12 = array_sum($c12);
                                                            array_push($total1,$c12);
                                                            echo number_format($c12);?></th>
															    <?php  } ?>   
															</tr>
															</tfoot>
                                                        
                                                              <?php } ?>
                             
                            </table>
                                          
										   
                                                
                                              
                                </div>
                            </div>
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

var manage1=$("#emis_state_report_schmanage").val();
var cate1 = $("#emis_state_report_schcate").val();

if(manage == 0 ){
    return false;
}

  $.ajax({
        type: "POST",
        url:baseurl+'State/savereport_schoolcatemanage',
        data:"&cate="+cate1+"&manage="+manage1,
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
            // console.log($(column).find('a').html());
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