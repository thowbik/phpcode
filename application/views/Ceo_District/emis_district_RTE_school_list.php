

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


.font-resize
{
  font-size: 20px !important;
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
                                      <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i><span>RTE Seat Allocation </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">
                                          <div class="row">
                                            <div class="col-md-12">
                                                
                                             <table class="table table-striped table-bordered table-hover district" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Block Name </th> 
                                                                    <th class="center">School Type</th>
                                                                    <th class="center">UDISE Code</th>
                                                                    <th class="">School Name</th>
                                                                    <th class="center">Entry Class</th>
                                                                    <th class="center">Number of Sections in Entry Class</th>
                                                                    <th>Total Seats in Entry Class</th>
                                                                    <th class="center">Allotted for RTE(25%)</th>
                                                                    <th>Edit</th>
                                                                    
                                                                    
                                                                </tr>
                                                                </thead>
                                                                <tbody class="">
                                                                    <?php if(!empty($school_RTE_list)){
                                                                      foreach($school_RTE_list as $index=> $list){
                                                                      ?>  
                                                                      <tr>
                                                                        <td><?=$index+1;?></td>
                                                                        <td><?=$list->block_name;?></td>
                                                                        <td><?=$list->school_type;?></td>
                                                                        <td><?=$list->udise_code;?>
                                                                          <input type="hidden" value="<?=$list->school_id;?>" id="school_id<?=$index+1;?>">
                                                                        </td>
                                                                        <td><?=$list->school_name;?>
                                                                          <input type="hidden"value="<?=$list->id;?>">
                                                                        </td>
                                                                        <td class=""><?php if ($list->entry_class==1){
                                                                          echo "1st Std";
                                                                        }else if($list->entry_class==13){
                                                                          echo "LKG";
                                                                        }else{}?></td>
                                                                        <td class="center"><?=$list->section_nos;?></td>
                                                                        <td class="center"><?=$list->total_seats;?></td>
                                                                        <td class="center"><?=$list->rte_seats;?>
                                                                          
                                                                        </td>
                                                                         
                                                                        <td class="font-resize center"style="cursor: pointer;">
                                                                         
                                                                          <span class="editdata"><i class="fa fa-pencil-square-o"></i></span></td>
                                                                        
                                                                      </tr>
                                                                    <?php } }?>
                                                                </tbody>
                                                                
                                                            </table>
                                                           
                                        </div>
                                </div>
                              </div>
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
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="title"></h4>
        </div>
        <div class="modal-body">
          <p class="content"></p>
        </div>
        <div class="modal-footer">
          <p id="create"></p>
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
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
             

<script type="text/javascript">
  var table = '';
    $(document).ready(function()
{
    table = sum_dataTable('#sample_3');
    // sum_dataTable('#sample_4');
});
function sum_dataTable(dataId){
    var table = $(dataId).DataTable({
      dom: 'Blfrtip',
      order: [[0, "asc"]],
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            pageLength: 10,
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
    return table;
    // table.column(0).visible(false);
    }
    var tempIndx = -1;
    var rowIdx = -1;
    var RTE_lists = <?=json_encode($school_RTE_list);?>;
    var rte_list = '';
    // var old_data_flag = 0;
     $("#sample_3").on('click','.editdata',function()
    {
      // alert();
        //     var rowIdx = table
        // .cell( this )
        // .index().row;
        // // console.log(rowIdx);
        rowIdx = $(this).closest('tr').index();


         
          
        // if(rowIdx != tempIndx){
        // if(colIndx==8)
        // {
          // console.log(rowIdx);
          // old_data_flag = 0;
          if(tempIndx!='-1')
          {
            var class_st = '';
            if(rte_list.entry_class==13)
            {
                class_st='LKG';
            }else if(rte_list.entry_class==1)
            {
                class_st='1st Std';
            }else
            {
              class_st='';
            }
          $("#sample_3").find('tbody tr:eq('+tempIndx+')').find('td:gt(4),td:gt(5),td:gt(6)').attr('contenteditable','false');
          var save_data = '<span class="editdata"><i class="fa fa-pencil-square-o"></span>';
          $("#sample_3").find('tbody tr:eq('+tempIndx+')').find('td:eq(9)').html(save_data);
          $("#sample_3").find('tbody tr:eq('+tempIndx+')').find('td:eq(5)').text(class_st);

          $("#sample_3").find('tbody tr:eq('+tempIndx+')').find('td:eq(6)').text(rte_list.section_nos);
          $("#sample_3").find('tbody tr:eq('+tempIndx+')').find('td:eq(7)').text(rte_list.total_seats);
          $("#sample_3").find('tbody tr:eq('+tempIndx+')').find('td:eq(8)').text(rte_list.rte_seats);

          }
         
          var save_data = '<span onclick="update_data(rowIdx);"><i class="fa fa-save" style="color:green;"></span>';
          $("#sample_3").find('tbody tr:eq('+rowIdx+')').find('td:eq(9)').html(save_data);

          var entry_class = "<input type='radio' name='entry_class' value=13>LKG<br/><input type='radio' name='entry_class' value=1>1st Std";
          $("#sample_3").find('tbody tr:eq('+rowIdx+')').find('td:eq(5)').html(entry_class);
          var num_section = '<div class="form-group">                                                        <div class=""><input type="text" class="form-control" id="num_section" name="num_section" placeholder="Number of Section"maxlength=1></div></div>';
          $("#sample_3").find('tbody tr:eq('+rowIdx+')').find('td:eq(6)').html(num_section);
          var total_seat = '<div class="form-group">                                                        <div class=""><input type="text" class="form-control" id="total_seat" name="total_seat" placeholder="Total Seats in Entry Class" maxlength=3 ></div></div>';
          $("#sample_3").find('tbody tr:eq('+rowIdx+')').find('td:eq(7)').html(total_seat);

          var udise_code = $("#sample_3").find('tbody tr:eq('+rowIdx+')').find('td:eq(3)').text().trim();

          rte_list = RTE_lists.filter(rte=>rte.udise_code==udise_code)[0];
          console.log(rte_list);

          var num_section = $("input[name='num_section']").val(rte_list.section_nos);
          var total_seats = $("input[name='total_seat']").val(rte_list.total_seats);
          var entry_class = $('input:radio[name="entry_class"]').filter('[value="'+rte_list.entry_class+'"]').attr('checked', true);

        // }
       
      // {
      //     update_data(tempIndx);
      // }
        tempIndx = rowIdx;

      // alert($(this).index());
    })
     $(document).on('change','#total_seat',function()
     {
       var total_seat = $(this).val();

        var total_seats = total_seat*.25;
        total_seats = Math.round(total_seats);
          $("#sample_3").find('tbody tr:eq('+rowIdx+')').find('td:eq(8)').html(total_seats);

     })
</script>
<script type="text/javascript">
    function update_data(i)
    {
          // console.log($('input:type="text"'))
          var num_section = $("input[name='num_section']").val();
          var total_seats = $("input[name='total_seat']").val();
          var entry_class = $("input[name='entry_class']:checked").val();
          // console.log(num_section,total_seats,entry_class);
          var total_seat_per = $("#sample_3").find('tbody tr:eq('+rowIdx+')').find('td:eq(8)').text().trim();
          var id = $("#sample_3").find('tbody tr:eq('+rowIdx+')').find('td:eq(4)').find('input').val();
          // console.log(id);return false;
          // $("input[name='num_section']").val(num_section);
      // alert(i);
      if(num_section !='' && total_seats !=undefined && entry_class !=''){
              swal({
          title: "Do You Want Save!",
          text: "",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-primary",
          confirmButtonText: "Yes",
          closeOnConfirm: false,
          showLoaderOnConfirm: true,
        },
        function(){
          // var seats_per = total_seats*.25;
          var school_id = $("#sample_3").find('tbody tr:eq('+i+')').find('td:eq(3)').find('input').attr('id');
          school_id = $("#"+school_id).val();
          var datas = {'id':id,'section_nos':num_section,'total_seats':total_seats,'entry_class':entry_class,'rte_seats':total_seat_per,'school_key_id':school_id};
          $.ajax(
          {
            method:'POST',
            dataType:'JSON',
            url:'<?=base_url().$link.'/save_RTE_school_list'?>',
            data:datas,
            success:function(res)
            {
              console.log(res);
              if(res)
              {
                swal({
    title: "Success", 
    
    type:'success',
    text: "Successfully Saved RTE Seat Allocation",  
    confirmButtonText: "ok", 
    allowOutsideClick: "true" 
},
  function()
  {
      window.location.reload();
  }
);
                  // swal('success','successfully Saved RTE School List','success');

              }
            }
          })
        });
      }else
      {
       
        swal({
    title: "Required", 
    html:true,
    type:'error',
    text: "<b>The Entry Class,Number of Section,Total Seats</b>",  
    confirmButtonText: "ok", 
    allowOutsideClick: "true" 
});
      }
    }
</script>






    </body>

</html>