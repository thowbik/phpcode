
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
  <div class="modal fade" id="test" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:140%">
        <div class="modal-header">
          <button type="button" class="close" onclick="refresh();" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Class And Sections</h4>
        </div>
		<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial,align:center; sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;
}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-phtq{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-hmp3{text-align:left;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-ydyv{border-color:inherit;text-align:right;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-dvpl{border-color:inherit;text-align:right;vertical-align:top}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

</style>
<center>

       <table class="tg" id="myTable">
  <tbody>
    <tr>
     
    </tr>
	
  </tbody>
  
  
</table>
	   </center>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="refresh();" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

 
<?php $this->load->view('Ceo_District/header.php');  ?>

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
                                                    <div class="col-md-6">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption" style="text-align:center;">
														                List of Teachers   
                                                           </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body" style="padding: 0px !important;max-height: 280px;overflow-x: auto;">
                                                       <div style="overflow-y:auto;">
                                                      <table>
                                                        <tr>
                                                          <th>Teacher</th>
                                                          <th>ID</th>  
                                                          <th></th>
                                                        </tr>
                                                        <tr>
                                                          <td>Jill</td>
                                                          <td>5652</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>      
                                                        </tr>
                                                        <tr>
                                                          <td>Eve</td>
                                                          <td>5652</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>    
                                                        </tr>
                                                        <tr>
                                                          <td>Adam</td>
                                                          <td>5652</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>   
                                                        </tr>
                                                        <tr>
                                                          <td>Adam</td>
                                                          <td>5652</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>   
                                                        </tr>
                                                        <tr>
                                                          <td>Adam</td>
                                                          <td>5652</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>   
                                                        </tr>
                                                        <tr>
                                                          <td>Adam</td>
                                                          <td>5652</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>   
                                                        </tr>
                                                        <tr>
                                                          <td>Adam</td>
                                                          <td>5652</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>   
                                                        </tr>
                                                        <tr>
                                                          <td>Adam</td>
                                                          <td>5652</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>   
                                                        </tr>
                                                        <tr>
                                                          <td>Adam</td>
                                                          <td>5622</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>   
                                                        </tr>
                                                        <tr>
                                                          <td>Adam</td>
                                                          <td>5652</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>   
                                                        </tr>
                                                        <tr>
                                                          <td>Adam</td>
                                                          <td>5622</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>   
                                                        </tr>
                                                        <tr>
                                                          <td>Adam</td>
                                                          <td>5622</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>   
                                                        </tr>
                                                        <tr>
                                                          <td>Adam</td>
                                                          <td>5622</td>
                                                          <td><button type="button" class="btn btn-primary">Select</button></td>   
                                                        </tr>
                                                      </table>
                                                    </div>
 
                                                    </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption" style="text-align:center;">
                                                           Vacancies
                                                           </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body" style="padding: 0px !important;max-height: 280px;overflow-x: auto;">
                                                    <table>
                                                        <tr>
                                                          <th>School</th>
                                                          <th>SG</th>  
                                                          <th>Tamil</th>
                                                          <th>English</th>
                                                          <th>Maths</th>
                                                          <th>Social</th>
                                                          <th>Science</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Mcc</td> 
                                                            <td>5</td>  
                                                            <td>6</td>
                                                            <td>2</td>
                                                            <td>1</td>
                                                            <td>9</td>
                                                            <td>7</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Mcc</td> 
                                                            <td>5</td>  
                                                            <td>6</td>
                                                            <td>2</td>
                                                            <td>1</td>
                                                            <td>9</td>
                                                            <td>7</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Mcc</td> 
                                                            <td>5</td>  
                                                            <td>6</td>
                                                            <td>2</td>
                                                            <td>1</td>
                                                            <td>9</td>
                                                            <td>7</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Mcc</td> 
                                                            <td>5</td>  
                                                            <td>6</td>
                                                            <td>2</td>
                                                            <td>1</td>
                                                            <td>9</td>
                                                            <td>7</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Mcc</td> 
                                                            <td>5</td>  
                                                            <td>6</td>
                                                            <td>2</td>
                                                            <td>1</td>
                                                            <td>9</td>
                                                            <td>7</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Mcc</td> 
                                                            <td>5</td>  
                                                            <td>6</td>
                                                            <td>2</td>
                                                            <td>1</td>
                                                            <td>9</td>
                                                            <td>7</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Mcc</td> 
                                                            <td>5</td>  
                                                            <td>6</td>
                                                            <td>2</td>
                                                            <td>1</td>
                                                            <td>9</td>
                                                            <td>7</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Mcc</td> 
                                                            <td>5</td>  
                                                            <td>6</td>
                                                            <td>2</td>
                                                            <td>1</td>
                                                            <td>9</td>
                                                            <td>7</td>

                                                        </tr>
                                                        
                                                        
                                                      </table>
                                                    </div> 
                                                    </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->


                                                    </div>
                                                     <div class="row">
                                                    <div class="col-md-6">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption" style="text-align:center;">
                                                            Processing
                                                           </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body" style="height: 280px;overflow-x: auto;">
                                                         <div class="row">
                                                         <div class="col-md-12" style="margin-bottom:10px;"> 
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Teacher</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="Adam" class="form-control" id="" name="" placeholder="" readonly="true">        
                                                                </div>
                                                            </div>
                                                            </div> 
                                                         <div class="col-md-12" style="margin-bottom:10px;">
                                                         <div class="form-group">
                                                                <label class="control-label col-md-3">School</label>
                                                                <div class="col-md-9">
                                                                <select class="form-control" id="" name=""  required>
                                                                    <option value="" selected="selected">Select School</option>
                                                                    <option value="1">Mcc</option>
                                                                    <option value="2">Mcc</option>
                                                                    <option value="3">Mcc</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-offset-9 col-md-2" style="margin-bottom:10px;">
                                                         <button type="submit" class="btn btn-primary">Submit</button>
                                                         </div>
                                                         </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption" style="text-align:center;">
                                                              Results
                                                           </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body" style="padding: 0px !important;max-height: 280px;overflow-x: auto;">
                                                      <div class="portlet-body" style="padding: 0px !important;max-height: 280px;overflow-x: auto;">
                                                    <table>
                                                        <tr>
                                                          <th>Name </th>
                                                          <th>School</th>  
                                                         
                                                        </tr>
                                                        <tr>
                                                            <td>Adam</td> 
                                                            <td>Mcc</td>  
                                                        </tr>
                                                        <tr>
                                                            <td>Adam</td> 
                                                            <td>Mcc</td>  
                                                        </tr>
                                                        <tr>
                                                            <td>Adam</td> 
                                                            <td>Mcc</td>  
                                                        </tr>
                                                        <tr>
                                                            <td>Adam</td> 
                                                            <td>Mcc</td>  
                                                        </tr>
                                                        <tr>
                                                            <td>Adam</td> 
                                                            <td>Mcc</td>  
                                                        </tr>
                                                        <tr>
                                                            <td>Adam</td> 
                                                            <td>Mcc</td>  
                                                        </tr>
                                                        <tr>
                                                            <td>Adam</td> 
                                                            <td>Mcc</td>  
                                                        </tr>
                                                        <tr>
                                                            <td>Adam</td> 
                                                            <td>Mcc</td>  
                                                        </tr>
                                                      </table>
                                                    </div>
             
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
              <script>
		  
 
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
    sum_dataTable('#sample_3');
});

function sum_dataTable(dataId){
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
    </body>

</html>