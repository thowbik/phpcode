

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
                                                    
                                        <form action="<?=base_url().'Collector/emis_notebook_indent'?>" method="post">
                                                
                                                    <div class=" col-md-3">
                                                					 <label class="control-label bold">Notes</label>
															 <select style="width: 90%;" class="form-control"   tabindex="1" id="note" name="note"   required="" >
                                                               	
                                                                <option value="0">Select Notes</option>
																<!--<option value="5">All</option> --->
																<?php foreach($notes as $n){ ?>
                                                                <option value="<?php echo $n->id; ?>"><?php echo $n->scheme_category; ?></option>
																
																<?php } ?>
                                                               </select>
													
                                                    </div> 
													 <div class=" col-md-3">
                                                					 <label class="control-label bold">Terms</label>
																 <select style="width: 90%;" class="form-control"   tabindex="1" id="term" name="term"   required="" >
                                                               	
                                                                <option value="0">Select Term</option>
																<!--<option value="5">All</option> --->
                                                                <option value="1">Term 1</option>
																<option value="2">Term 2</option>
																<option value="3">Term 3</option>
									                           
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
         <!--   <ul class="nav nav-tabs nav-tabs-success faq-cat-tabs " id="myTab">
                <li class="active"><a href="#faq-cat-1" data-toggle="tab">Boys</a></li>
                <li><a href="#faq-cat-2" data-toggle="tab">Girls</a></li>
                

            </ul>-->
    
            <!-- Tab panes -->
            <div class="tab-content faq-cat-content">
                <div class="tab-pane active in fade" id="faq-cat-1">
                    <div class="panel-group" id="accordion-cat-1">
                        <div class="panel panel-default panel-faq" >
                          
 <?php 
														if(!empty($note))
														{
														foreach($note as $uf)
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
                                        
														
													
                                                            <i class="fa fa-globe"></i> NoteBook Indent Summary
															
															<!-- <?php // if($uf->sets == 0){
															
															//echo 'Sets:ALL'; } else { echo 'Sets:'.$sets;} ?>  -->
															
                                      
                                        
                                        <span class="pull-right"><i class="glyphicon glyphicon"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-2" class="panel-collapse panel-collapse collapse in" aria-expanded="true" style>
                                <div class="panel-body">
                                    <br/>
                                 
                                   <table class="table table-striped table-bordered table-hover district" id="sample_3" style="text-align: center;">
								   
								   
                                 
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
							 
							  <?php if(!empty($uf->block_name)) {?>
							  <th style="text-align: center;">Block</th>
							  	  <?php } else {?>
								  <th style="text-align: center;">School</th>
								  <?php } ?>
                              <th style="text-align: center;">I</th>
						      <th style="text-align: center;">II</th>
							  <th style="text-align: center;">III</th>
							  <th style="text-align: center;"> IV</th>
							  <th style="text-align: center;">V</th>
							  <th style="text-align: center;">VI</th>
							  <th style="text-align: center;">VII</th>
							  <th style="text-align: center;">VIII</th>
							 
                           
                              


                            

                              </tr>
                              </thead>
                              <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($note)){
								  $i=1;
								  
								  $bset1_count= [];
								  $bset2_count= [];
								  $bset3_count= [];
								  $bset4_count= [];
								  $bset5_count= [];
								  $bset6_count= [];
								  $bset7_count= [];
								  $bset8_count= [];
								 
								
								  
								
								  foreach($note as $uf){ 
                                                              
                                ?>
								
        
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?>
							  <input type ="hidden" value="<?php echo $uf->sets ;?>">
							  </td>
							  <?php if(!empty($uf->block_name)) {?>
							           
							           <td style="text-align:left;"><a href="<?php echo base_url().'Collector/emis_notebook_indent/?block_id='.$uf->term.$uf->scheme_category.$uf->block_id ?>">
									   
                              <?php echo $uf->block_name;?></a></td>
							  <?php } else {?>
							          
							          <td style="text-align: left;">
                                      <?php echo $uf->school_name;?></td><?php } ?>
							  
                              <td style="text-align: center;"><?php echo number_format($uf->C1); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->C2); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->C3); ?></a></td> 
							  <td style="text-align: center;"><?php echo number_format($uf->C4); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->C5); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->C6); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->C7); ?></a></td> 
							  <td style="text-align: center;"><?php echo number_format($uf->C8); ?></a></td>
							   
							 
                              </tr>
                              <?php $i++;?>
    <?php
                             array_push($C1,$uf->C1);
							 array_push($C2,$uf->C2 );
							 array_push($C3,$uf->C3);
							 array_push($C4,$uf->C4);
							 array_push($C5,$uf->C5);
							 array_push($C6,$uf->C6);
							 array_push($C7,$uf->C7);
							 array_push($C8,$uf->C8);
							 
							 
							
							                      ?> 
                                        <?php  } ?>         
                                                      
                            </tbody>
							<tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th> 
                                                            <th style="text-align: center;" ><?php 
                                                            $C1 = array_sum($C1);
                                                            array_push($total1,$C1);
                                                            echo number_format($C1);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $C2 = array_sum($C2);
                                                            array_push($total1,$C2);
                                                            echo number_format($C2);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $C3 = array_sum($C3);
                                                            array_push($total1,$C3);
                                                            echo number_format($C3);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $C4 = array_sum($C4);
                                                            array_push($total1,$C4);
                                                            echo number_format($C4);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $C5 = array_sum($C5);
                                                            array_push($total1,$C5);
                                                            echo number_format($C5);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $C6 = array_sum($C6);
                                                            array_push($total1,$C6);
                                                            echo number_format($C6);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $C7 = array_sum($C7);
                                                            array_push($total1,$C7);
                                                            echo number_format($C7);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $C8 = array_sum($C8);
                                                            array_push($total1,$C8);
                                                            echo number_format($C8);?></th>
															 
															
															
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



    </body>

</html>