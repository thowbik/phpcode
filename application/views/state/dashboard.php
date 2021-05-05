<?php $next='';
                                                                
                                                                switch(1){
                                                                    case $this->session->userdata('emis_state_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='District';$index='district_name';$next='EDU';$idval='district_id';
                                                                                break;
                                                                            }
                                                                            case 'EDU':{
                                                                                $title='Educational District';$index='edn_dist_name';$next='Block';$idval='edudistrict_id';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='Block';$index='block_name';$next='School';$idval='blk_id';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_district_id')!=null:{
                                                                         switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='Educational District';$index='edn_dist_name';$next='Block';$idval='edudistrict_id';
                                                                                break;
                                                                            }
                                                                            case 'EDU':{
                                                                                $title='Educational District';$index='edn_dist_name';$next='Block';$idval='edudistrict_id';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='Block';$index='block_name';$next='School';$idval='blk_id';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_deo_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='Block';$index='block_name';$next='School';$idval='blk_id';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='Block';$index='block_name';$next='School';$idval='blk_id';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_block_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case '0':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                            case 'Block':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                    case $this->session->userdata('emis_school_id')!=null:{
                                                                        switch($this->uri->segment(3,0)){
                                                                            case 0:{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                            case 'School':{
                                                                                $title='School';$index='school_name';$idval='school_id';
                                                                                break;
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                }
                                                                
                                                                 ?>

<!DOCTYPE html>

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
    </style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

   <?php 
            if($this->session->userdata('emis_state_id')!=null){
                $this->load->view('state/header.php');
            }
            elseif($this->session->userdata('emis_district_id')!=null){
                $this->load->view('Ceo_District/header.php');
            }
            elseif($this->session->userdata('emis_deo_id')!=null){
                $this->load->view('Deo_District/header.php');
            }
            elseif($this->session->userdata('emis_block_id')!=null){
                $this->load->view('block/header.php');
            }
            elseif($this->session->userdata('emis_school_id')!=null){
                $this->load->view('header.php');
            }
        
        ?>

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
                                        <h1>Dashboard
                                           <small>State Dashboard</small>
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

                                     <div class="portlet-body">

                                          <div class="portlet light">
                                           
                                             
                                   
                                                <div class="portlet box green">
                                                    <div class="portlet-title col-md-12">
                                                        <div class="caption col-md-4">
                                                            <i class="fa fa-globe"></i> Student Class wise - All District</div>
                                                            <div class="col-md-5" style="margin-top: -1%;"><h3>Enrollment in current year - 2019</h3></div>
                                                        <div class="col-md-3 tools">  </div>
                                                        
                                                    </div>

                                                    <div class="portlet-body">
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th><?php echo($title); ?></th>           
                                                                    <th>Pre-kg</th>
                                                                    <th>LKG</th>
                                                                    <th>UKG</th>
                                                                    <th>I</th>
                                                                    <th>II</th>
                                                                    <th>III</th>
                                                                    <th>IV</th>
                                                                    <th>V</th>
                                                                    <th>VI</th>
                                                                    <th>VII</th>
                                                                    <th>VIII</th>
                                                                    <th>IX</th>
                                                                    <th>X</th>
                                                                    <th>XI</th>
                                                                    <th>XII</th>
                                                                   
                                                                </tr>
                                                                </thead>
                                                            <tbody>
                                                                <?php $total1=[];?>
                                                               <?php if(!empty($dashboard)){ 
                           $prekg_tot= [];$lkg_tot= [];$ukg_tot= [];$c1_tot= [];$c2_tot= [];$c3_tot= [];$c4_tot= [];$c5_tot=[];$c6_tot= [];$c7_tot= [];$c8_tot= [];$c9_tot= [];$c10_tot= [];$c11_tot= [];$c12_tot= []; $i=1;

                                                                foreach($dashboard as $det){
                                                                // print_r($dashboard);  
                                                                ?>
                                                                <tr>

                                                                    <td style="text-align: center;"><?php echo $i;?></td>
                                                                    <td><?php echo $det[$index]; ?></td>
                                                                   <td style="text-align: center;"><?=number_format($det[$index]->Prkg);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->LKG);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->UKG);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->class_1);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->class_2);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->class_3);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->class_4);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->class_5);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->class_6);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->class_7);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->class_8);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->class_9);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->class_10);?></td>
                                                                    <td style="text-align: center;"><?=number_format($det->class_11);?></td>
                                                                  <td style="text-align: center;"><?=number_format($det->class_12);?></td>
                                                                </tr>
                                                                <?php $i++;?>

                                                            <?php 

                                                            array_push($prekg_tot,$det->Prkg);
                                                            array_push($lkg_tot,$det->LKG);
                                                            array_push($ukg_tot,$det->UKG);
                                                            array_push($c1_tot,$det->class_1);
                                                            array_push($c2_tot,$det->class_2);
                                                            array_push($c3_tot,$det->class_3);
                                                            array_push($c4_tot,$det->class_4);
                                                            array_push($c5_tot,$det->class_5);
                                                            array_push($c6_tot,$det->class_6);
                                                            array_push($c7_tot,$det->class_7);
                                                            array_push($c8_tot,$det->class_8);
                                                            array_push($c9_tot,$det->class_9);
                                                            array_push($c10_tot,$det->class_10);
                                                            array_push($c11_tot,$det->class_11);

                                                            array_push($c12_tot,$det->class_12);


                                                        }?>
                                                        
                                                 
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th style="text-align: center;"><?php 
                                                            $prekg_tot = array_sum($prekg_tot);
                                                            array_push($total1,$prekg_tot);
                                                            echo number_format($prekg_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                                $lkg_tot = array_sum($lkg_tot);
                                                                array_push($total1,$lkg_tot);
                                                            echo number_format($lkg_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $ukg_tot = array_sum($ukg_tot);
                                                                array_push($total1,$ukg_tot);
                                                                echo number_format($ukg_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $c1_tot = array_sum($c1_tot);
                                                                array_push($total1,$c1_tot);
                                                           echo number_format($c1_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c2_tot = array_sum($c2_tot);
                                                                array_push($total1,$c2_tot);
                                                                echo number_format($c2_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c3_tot = array_sum($c3_tot);
                                                                array_push($total1,$c3_tot);
                                                                echo number_format($c3_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c4_tot = array_sum($c4_tot);
                                                                array_push($total1,$c4_tot);
                                                                echo number_format($c4_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $c5_tot = array_sum($c5_tot);
                                                                array_push($total1,$c5_tot);
                                                                echo number_format($c5_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c6_tot = array_sum($c6_tot);
                                                                array_push($total1,$c6_tot);
                                                            echo number_format($c6_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c7_tot = array_sum($c7_tot);
                                                                array_push($total1,$c7_tot);
                                                            echo number_format($c7_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c8_tot = array_sum($c8_tot);
                                                                array_push($total1,$c8_tot);
                                                            echo number_format($c8_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c9_tot = array_sum($c9_tot);
                                                                array_push($total1,$c9_tot);
                                                            echo number_format($c9_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                            $c10_tot = array_sum($c10_tot);
                                                                array_push($total1,$c10_tot);
                                                            echo number_format($c10_tot);?></th>
                                                            <th style="text-align: center;"><?php 
                                                             $c11_tot = array_sum($c11_tot);
                                                                array_push($total1,$c11_tot);
                                                            echo number_format($c11_tot);?></th>
                                                            <th style="text-align: center;"><?php 

                                                             $c12_tot = array_sum($c12_tot);
                                                                array_push($total1,$c12_tot);
                                                                echo number_format($c12_tot);

                                                                ?></th>

                                                        </tr>
                                                            </tfoot> 
                                                              <?php } ?>
                                            </table>
                                                        
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
            </div>


                  <?php $this->load->view('footer.php'); ?>
                   <?php $this->load->view('scripts.php'); ?>
        </body>
<script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
       
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>

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


    </body>

</html>