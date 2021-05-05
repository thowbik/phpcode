

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

.row {
     margin-left: 0 !important; 
     margin-right: 0 !important;
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
            
 <?php if($this->session->userdata('emis_user_type_id')==5)
 { ?>
  <?php $this->load->view('Ceo_District/header.php'); ?>
  
  <?php }
  else { ?>
  <?php $this->load->view('csr_admin/csr_admin_header.php'); ?>
   <?php } ?>
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
                                                    
                                        <form action="<?=base_url().'Ceo_District/staff_list'?>" method="post">
										
                                                    <!--<div class=" col-md-3">
                                                		<label class="control-label bold">Item</label>
														<select style="width: 90%;" class="form-control"   tabindex="1" id="schol" name="schol"   required="" >
                                                         <option value="0">Select Item</option>
														<option value="5">All</option> --
                                                         <option value="1">View by Category</option>
														 <option value="2">View by SubCategory</option>
														 <option value="3">View by Material</option>
                                                         </select>
                                                    </div> -->
                                                    <div class="row ">													
                                                  <!--  <div class="col-md-3" id="cat">
                                                           <label>District</label>
                                                           <select class="form-control" id="dist" name="dist" >
                                                           <option value="" >Choose</option>
                                                            <?php foreach($dist as $c){ ?>
                                                           <option value="<?php echo($c->id);?>"><?php echo($c->district_name); ?></option>  
                                                            <?php } ?>
                                                           </select>
                                                    </div>-->
										            <div class="col-md-3" id="scat">
                                                        <label>Block</label>
                                                        <select class="form-control" id="block" name="block" >
                                                        <option value="">Choose</option>
                                                        <?php foreach($block as $s){ ?>
                                                        <option value="<?php echo($s->id);?>"><?php echo($s->block_name); ?></option>  
                                                        <?php } ?>
                                                         </select>
                                                    </div>
													<!--<div class="col-md-3">
                                                            <label class="control-label">School ID</label>
															<br>
                                                           <input class="form-control" type="text" value ="" id="school" name="school">
                                                    </div>-->
													<div class="col-md-3">
                                                            <label class="control-label">School Name</label>
															<br>
                                                           <input class="form-control" type="text" value ="" id="schoolname" name="schoolname">
                                                    </div> 
													<div class="col-md-3">
                                                            <label class="control-label">UDISE CODE</label>
															<br>
                                                           <input class="form-control" type="text" value ="" id="udise" name="udise">
                                                    </div> 
													<div class="col-md-3 ">
                                                            <label class="control-label">Teacher Name</label>
															<br>
                                                           <input class="form-control" type="text" value ="" id="teachname" name="teachname">
                                                    </div> 
													</div>
													  <div class="row ">
													 
													
													<div class="col-md-3 ">
                                                            <label class="control-label">Designation</label>
															<br>
                                                           <select class="form-control" id="design" name="design" >
                                                        <option value="">Choose</option>
                                                        <?php foreach($design as $s){ ?>
                                                        <option value="<?php echo($s->id);?>"><?php echo($s->type_teacher); ?></option>  
                                                        <?php } ?>
                                                         </select>
                                                    </div>
													<div  class="col-md-7"><p><font color="red">SEARCH BY ANY ONE</font></p></div>
												
												    <div class="col-md-2">
													<h2></h2>
													<button type="sumbit" class="btn green btn-md" name="btn_submit" value="View Report">Submit</button>
													</div> 
													</div>                        
                                            
                                        </form>
                                   </div>
                                   </div>
                                        <div class="portlet light">
                                            <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs category -->
            
    
            <!-- Tab panes -->
            <div class="tab-content faq-cat-content">
                <div class="tab-pane active in fade" id="faq-cat-1">
                    <div class="panel-group" id="accordion-cat-1">
                        <div class="panel panel-default panel-faq" >
                         

							  <?php 
														if(!empty($staff_list))
														{
														
														foreach($staff_list as $uf)
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
                                        <i class="fa fa-globe"></i> Staff list
															
                                      
                                        
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
								 <th style="text-align: center;">District</th>
								 <th style="text-align: center;">Block</th>
							     <th style="text-align: center;">School</th>
								 <th style="text-align: center;">Udise Code</th>
								 <th style="text-align: center;">Teacher ID</th>
								 <th style="text-align: center;">Teacher</th>
							     <th style="text-align: center;">Designation</th>
							
                              </tr>
                              </thead>
                                <tbody>
                              <?php $total1=[];?>
							  
                              <?php if(!empty($staff_list)){
								  $i=1;
								
								
								  foreach($staff_list as $uf){ 
                                                              
                                ?>
								
       
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
							  <td style="text-align: left;"><?php echo $uf->district_name;?></td>
							  <td style="text-align: center;"><?php echo $uf->block_name; ?></td>
							  <td style="text-align: center;"><?php echo $uf->school_name; ?></td>
							  <td style="text-align: center;"><?php echo $uf->udise_code; ?></td>
                              <td style="text-align: center;"><?php echo $uf->teacher_code ?></td>							  
							  <td style="text-align: center;"><?php echo $uf->teacher_name ?></td> 
							 <td style="text-align: center;"><?php echo $uf->type_teacher ?></td>
                              </tr>
                              <?php $i++;?>
   
                                        <?php  } ?>         
                                                      
                            </tbody>
							
                                                        
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
          var intVal = function ( i ) 
		  {
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




    </body>

</html>