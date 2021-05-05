

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
    text-indent:0px !important;
    margin-bottom:0px!important;

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
    </style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('DC/header.php'); ?>

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
                                           <form action="<?php echo base_url().'DC/get_attendance_blockwise_details'?>" method="post">
                                                <div class="row">
                                                    <div class="col-md-offset-5 col-md-3">
                                                    <!-- <h2><?=$date;?></h2> -->
                                                    <div class="input-group date">
   <input type="text" name="date" class="form-control date" id="dat" value="<?=$date;?>"/>
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div> 
</div>
</div> 
<div class="col-md-3">
        <button type="sumbit" class="btn green btn-md" >Submit</button>
                             </div>                           
                                                </div>
                                            
                                              </form>
                                            </div>
                                        <div class="portlet light">
                                            <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs category -->
            <ul class="nav nav-tabs nav-tabs-success faq-cat-tabs " id="myTab">
                <li class="active"><a href="#faq-cat-1" data-toggle="tab">Student Attendance</a></li>
                <li><a href="#faq-cat-2" data-toggle="tab">Staff Attendance</a></li>
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content faq-cat-content">
                <div class="tab-pane active in fade" id="faq-cat-1">
                    <div class="panel-group" id="accordion-cat-1">
                        <div class="panel panel-default panel-faq" >
                            <div class="panel-heading active-faq">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#" aria-expanded="true" class>
                                    <h4 class="panel-title">
                                        Category-wise School Count
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-1" class="panel-collapse panel-collapse collapse in" aria-expanded="true" style>
                                <div class="panel-body">
                                   <div class="row">
                                            <div class="col-md-12">
                                                
                                             <table class="table table-striped table-bordered table-hover district" id="sample_5" style="text-align: center;">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Category </th> 
                                                                    <th class="center">Total Schools</th>
                                                                    <th class="center">Fully Marked</th>
                                                                    <th class="center">Partially Marked</th>
                                                                    <th class="center">Not Marked</th>

                                                                    <th class="center">Not Marked Percentage</th>
                                                                    
                                                                    
                                                                </tr>
                                                                </thead>
                                                                <tbody class="center">
                                                                    <?php 

                                                                    $over_total_fully_marked = [];
                                                                    $over_total_part_marked = [];
                                                                    
                                                                    if(!empty($school_type)){
                                                                        $total_school = [];
                                                                        foreach($school_type as $index=> $type){
                                                                            array_push($total_school, $type->total_school);
                                                                            array_push($over_total_fully_marked,$type->Fully_Marked);

                                                                            array_push($over_total_part_marked,$type->Partially_Marked);

                                                                            
                                                                        
                                                                        ?>
                                                                        <td><?=$index+1;?></td>
                                                                        <td><?=$type->school_type;?></td>
                                                                        <td><?=number_format($type->total_school);?></td>
                                                                        <td><a href="<?=base_url().'DC/get_attendance_search?cate='.$type->school_type.'&col_name=1&date='.$date?>"><?=number_format($type->Fully_Marked);?></a></td>
                                                                        <td><a href="<?=base_url().'DC/get_attendance_search?cate='.$type->school_type.'&col_name=2&date='.$date?>"><?=number_format($type->Partially_Marked);?></a></td>
                                                                        <td><a href="<?=base_url().'DC/get_attendance_search?cate='.$type->school_type.'&col_name=3&date='.$date?>"><?php 
                                                                            $not_marked = $type->total_school-
                                                                            ($type->Fully_Marked + $type->Partially_Marked);
                                                                            echo $not_marked;?>
                                                                        </a></td>
                                                                        <td>
                                                                        <?php 

                                                                            $total_fully_marked = round(($type->Fully_Marked/$type->total_school)*100);
                                                                            $total_paritial_marked = 
                                                                            round(($type->Partially_Marked/$type->total_school)*100);
                                                                            $total_not_marked_cate = $total_fully_marked+$total_paritial_marked;
                                                                            // echo $total_not_marked_cate;
                                                                        ?> 
                                                                        <div class="progress">
    <div class="progress-bar progress-bar-success" data-order="<?=$total_fully_marked?>"role="progressbar" style="width:<?=$total_fully_marked.'%'?>">
      <?=$total_fully_marked.'%';?>
    </div>
    <div class="progress-bar progress-bar-primary" data-order="<?=$total_paritial_marked?>" role="progressbar" style="width:<?=$total_paritial_marked.'%'?>">
      <?=$total_paritial_marked.'%';?>
    </div>
    <div class="progress-bar progress-bar-danger" data-order="<?=(100-$total_not_marked_cate)?>"role="progressbar" style="width:<?=(100-$total_not_marked_cate).'%'?>">
      <?=(100-$total_not_marked_cate).'%'?>
    </div>
    
  </div>
                                                                   </td>

                                                                </tbody>
                                                                <?php } 
                                                                    $total_school = array_sum($total_school);
                                                                   $over_total_fully_marked =  array_sum($over_total_fully_marked);
                                                                  $over_total_part_marked =  array_sum($over_total_part_marked);
                                                                    $over_total_not_marked = 
                                                                    ($total_school - ($over_total_fully_marked+$over_total_part_marked));

                                                                    $over_total_full_mark_pert = 
                                                                    round(($over_total_fully_marked /$total_school)*100);
                                                                    $over_total_part_mark_pert = 
                                                                    round(($over_total_part_marked /$total_school)*100);
                                                                    $over_total_not_marked_cate = 
                                                                    $over_total_full_mark_pert+
                                                                    $over_total_part_mark_pert;
                                                                ?>
                                                                <tr>
                                                                    <th colspan="2" class="center">Total</th>
                                                                    <td><b><?=number_format($total_school);?></b></td>
                                                                    <td><b><?=number_format($over_total_fully_marked);?></b></td>
                                                                    <td><b><?=number_format($over_total_part_marked);?></b></td>
                                                                    <td><b><?=number_format($over_total_not_marked);?></b></td>
                                                                    <td>
                                                                        
                                                                        <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?=$over_total_full_mark_pert.'%'?>">
      <?=$over_total_full_mark_pert.'%';?>
    </div>
    <div class="progress-bar progress-bar-primary" role="progressbar" style="width:<?=$over_total_part_mark_pert.'%'?>">
      <?=$over_total_part_mark_pert.'%';?>
    </div>
    <div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?=(100-$over_total_not_marked_cate).'%'?>">
      <?=(100-$over_total_not_marked_cate).'%'?>
    </div>
    
  </div>

                                                                    </td>
                                                                    
                                                                </tr>
                                                            <?php }?>
                                                            </table>
                                                             <div class="row">
                                                                <div class="col-md-offset-4 col-md-2">
                                                            <div class="color-box-green" style="background-color:#5cb85c;" data-hex="#CD5C5C" data-rgb="205, 92, 92" data-hsl="0, 53%, 58%"></div> Fully Marked
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="color-box-green" style="background-color:#337ab7;" data-hex="#CD5C5C" data-rgb="205, 92, 92" data-hsl="0, 53%, 58%"></div> Partially Marked
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="color-box-green" style="background-color:#ed6b75;" data-hex="#CD5C5C" data-rgb="205, 92, 92" data-hsl="0, 53%, 58%"></div> Not Marked
                                                        </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading active-faq">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#" aria-expanded="true" class>
                                    <h4 class="panel-title">
                                        Block-wise School Count
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-2" class="panel-collapse panel-collapse collapse in" aria-expanded="true" style>
                                <div class="panel-body">
                                    <br/>
                                    <div id="school_district_data">
                                   <table class="table table-striped table-bordered table-hover district" id="sample_3">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Block </th> 
                                                                    <th class="center">Total Schools</th>
                                                                    <th class="center">Fully Marked</th>
                                                                    <th class="center">Partially Marked</th>
                                                                    <th class="center">Not Marked</th>

                                                                    <th class="center">Not Marked Percentage</th>
                                                                    
                                                                    
                                                                </tr>
                                                                </thead>
                                                                <tbody class="center">
                                                                    <?php 
                                                                        // print_r($school_details_districtwise);
 $total_school= [];$over_total_fully_marked = [];$over_total_part_marked = [];
                                                               if(!empty($school_details_blockwise)){ 

                                                               
                                                                foreach($school_details_blockwise as $index=> $det){ 
                                                                       

                                                                        // $total_marked_section =  $over_all_school_districwise[$dist_name]->total_section;

                                                                ?>
                                                                <tr>
                                                                    <td><?=$index+1;?></td>
                                                                    <td style="text-align: left;"><a href="<?=base_url().'DC/get_attendance_schoolwise_details?block='.$det->block_name.'&date='.$date?>"><?=$det->block_name?></a>

                                                                    </td>
                                                                    <td><?=number_format($det->total_school);?>
                                                                    </td>
                                                                    <td><a href="<?=base_url().'DC/get_attendance_search?block='.$det->block_name.'&col_name=1&date='.$date?>"><?=number_format($det->Fully_Marked_school);?></a></td>
                                                                    <td><a href="<?=base_url().'DC/get_attendance_search?block='.$det->block_name.'&col_name=2&date='.$date?>"><?=number_format($det->Partially_Marked_school);?></a></td>
                                                                    <td><a href="<?=base_url().'DC/get_attendance_search?block='.$det->block_name.'&col_name=3&date='.$date?>"><?=number_format($det->total_school - ($det->Fully_Marked_school+$det->Partially_Marked_school));?></a>
                                                                        </td>
                                                                    <td>
                                                                        <?php 

                                                                            $total_fully_marked = round(($det->Fully_Marked_school/$det->total_school)*100);
                                                                            $total_paritial_marked = 
                                                                            round(($det->Partially_Marked_school/$det->total_school)*100);
                                                                            $total_not_marked_cate = $total_fully_marked+$total_paritial_marked;
                                                                            // echo $total_paritial_marked;
                                                                        ?> 
                                                                        <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" data-order="<?=$total_fully_marked?>" style="width:<?=$total_fully_marked.'%'?>">
      <?=$total_fully_marked.'%';?>
    </div>
    <div class="progress-bar progress-bar-primary" data-order="<?=$total_paritial_marked?>"role="progressbar" style="width:<?=$total_paritial_marked.'%'?>">
      <?=$total_paritial_marked.'%';?>
    </div>
    <div class="progress-bar progress-bar-danger" data-order="<?=(100-$total_not_marked_cate)?>" role="progressbar" style="width:<?=(100-$total_not_marked_cate).'%'?>">
      <?=(100-$total_not_marked_cate).'%'?>
    </div>
    
  </div>
                                                                   </td>

                                                                </tr>
                                                                <?php 

                                                            array_push($total_school, $det->total_school);
                                                                            array_push($over_total_fully_marked,$det->Fully_Marked_school);

                                                                            array_push($over_total_part_marked,$det->Partially_Marked_school);
                                                            
                                                        }  

                                                        $total_school = array_sum($total_school);
                                                                   $over_total_fully_marked =  array_sum($over_total_fully_marked);
                                                                  $over_total_part_marked =  array_sum($over_total_part_marked);
                                                                    $over_total_not_marked = 
                                                                    ($total_school - ($over_total_fully_marked+$over_total_part_marked));

                                                                    $over_total_full_mark_pert = 
                                                                    round(($over_total_fully_marked /$total_school)*100);
                                                                    $over_total_part_mark_pert = 
                                                                    round(($over_total_part_marked /$total_school)*100);
                                                                    $over_total_not_marked_cate = 
                                                                    $over_total_full_mark_pert+
                                                                    $over_total_part_mark_pert;
                                                        ?>

                                                        
                                                   
                                                            </tbody>

                                                            <tfoot>
                                                               <tr>
                                                                    <th colspan="2" class="center">Total</th>
                                                                    <td class="center"><b><?=number_format($total_school);?></b></td>
                                                                    <td class="center"><a href="<?=base_url().'DC/get_attendance_search?&col_name=1&date='.$date?>"><b><?=number_format($over_total_fully_marked);?></b></a></td>
                                                                    <td class="center"><a href="<?=base_url().'DC/get_attendance_search?&col_name=2&date='.$date?>"><b><?=number_format($over_total_part_marked);?></b></a></td>
                                                                    <td class="center"><a href="<?=base_url().'DC/get_attendance_search?&col_name=3&date='.$date?>"><b><?=number_format($over_total_not_marked);?></b></a></td>
                                                                    <td style="padding: 10px 8px !important;">
                                                                        
                                                                        <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?=$over_total_full_mark_pert.'%'?>">
      <?=$over_total_full_mark_pert.'%';?>
    </div>
    <div class="progress-bar progress-bar-primary" role="progressbar" style="width:<?=$over_total_part_mark_pert.'%'?>">
      <?=$over_total_part_mark_pert.'%';?>
    </div>
    <div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?=(100-$over_total_not_marked_cate).'%'?>">
      <?=(100-$over_total_not_marked_cate).'%'?>
    </div>
    
  </div>

                                                                    </td>
                                                                    
                                                                </tr>
                                                            </tfoot> 
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                                <!-- <div id="">
                                                    <table class="table table-striped table-bordered table-hover" id="sample_4">
                                                            <thead>
                                                                <tr> 
                                                                    <th>S.no</th>
                                                                    <th>School Name</th>
                                                                    <th>School Code</th>
                                                                    <th>Management</th>
                                                                    <th>Cluster</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="school_info">
                                                                </tbody>
                                                            </table>
                                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="tab-pane fade" id="faq-cat-2">
                    <div class="panel-group" id="accordion-cat-2">
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-2" href="#" class="collapsed" aria-expanded="false">
                                    <h4 class="panel-title">
                                        Category-wise School Count
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>



                                
                            </div>
                            <div id="faq-cat-2-sub-1" class="panel-collapse collapse in" aria-expanded="true" style="">
                                <div class="panel-body">
                                    <br/>
                                <!-----Table 1st Start------>
                                    <table class="table table-striped table-bordered table-hover district" id="sample_3">

                                        <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th class="">Category </th> 
                                                                    <th class="sum center">Total Schools</th>
                                                                    <th class="sum center">Marked Schools</th>
                                                                    <th class="sum center">Not Marked Schools</th>

                                                                    
                                                                    <th class="center">Percentage</th>
                                                                    
                                                                     
                                                                    
                                                                    
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if(!empty($teacher_school_type_blockwise)){
                                                                        $total_schools =0;
                                                                        $total_marked_schools =0;
                                                                        $total_not_marked_school =0;
                                                                        foreach ($teacher_school_type_blockwise as $key => $det) {
                                                                            $total_schools  +=$det->total_school;
                                                                            $total_marked_schools +=$det->marked_school;
                                                                            
                                                                        ?>
                                                                        <tr>
                                                                            <td class="center"><?=$key+1;?></td>
                                                                            <td>
                                                                                <?=$det->school_type;?></td>
                                                                            <td class="center"><?=number_format($det->total_school);?></td>
                                                                            <td class="center">
                                                                                <?=number_format($det->marked_school);?>
                                                                            </td>
                                                                            
                                                                            <td class="center">
                                                                                <?php $not_marked = ($det->total_school-$det->marked_school); echo number_format($not_marked);
                                                                                $total_not_marked_school +=$not_marked;
                                                                                ?>
                                                                            </td>
                                                                            <td class="center">
                                                                                <?php 

                                                                                    $marked_school = round(($det->marked_school/$det->total_school)*100);

                                                                                     
                                                                                ?>
                                                                                <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?=$marked_school.'%'?>">
      <?=$marked_school.'%';?>
    </div>
    <div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?=(100-$marked_school).'%'?>">
      <?=(100-$marked_school).'%'?>
    </div>
    
  </div>
                                                                            </td>
                                                                            

                                                                        </tr>
                                                                    <?php }
                                                                    
                                                                    $total_present_school = round(($total_marked_schools/$total_schools)*100);

                                                       
                                                                    // echo $total_present_school;

                                                                    ?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th colspan="2" class="center">Total</th>
                                                                        <th class="center"><?=$total_schools;?></th>
                                                                        <th class="center"><?=$total_marked_schools;?></th>
                                                                        <th class="center"><?=$total_not_marked_school;?></th>
                                                                        
                                                                        <td class="center" style="padding: 10px 8px !important;">
                                                                            
                                                                            <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?=$total_present_school.'%'?>">
      <?=$total_present_school.'%';?>
    </div>
    
    <div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?=(100-$total_present_school).'%'?>">
      <?=(100-$total_present_school).'%'?>
    </div>
    
  </div>
                                                                        </td>
                                                                        

                                                                    </tr>
                                                                </tfoot>
                                                            <?php }?>
                                    </table>
                                    <div class="row">
                                                                <div class="col-md-offset-4 col-md-2">
                                                            <div class="color-box-green" style="background-color:#5cb85c;" data-hex="#CD5C5C" data-rgb="205, 92, 92" data-hsl="0, 53%, 58%"></div> Marked Schools
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                            <div class="color-box-green" style="background-color:#ed6b75;" data-hex="#CD5C5C" data-rgb="205, 92, 92" data-hsl="0, 53%, 58%"></div>  Not Marked Schools
                                                        </div>

                                <!---------Table End----->
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-2" href="#" class="" aria-expanded="true">
                                    <h4 class="panel-title">
                                        Block-wise School Count
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>



                            </div>
                            <div id="faq-cat-2-sub-2" class="panel-collapse collapse in" aria-expanded="true" style="">
                                <div class="panel-body">
                                    <br/>
                                 <!-----Table 1st Start------>
                                    <table class="table table-striped table-bordered table-hover district" id="sample_4" >

                                       <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th class="">Block Name </th> 
                                                                    <th class="sum center">Total Schools</th>
                                                                    <th class="center">Marked Schools</th>
                                                                    <th class="center">Not Marked Schools</th>

                                                                    
                                                                    <th class="center"> Percentage</th>
                                                                    
                                                                     
                                                                    
                                                                    
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if(!empty($teacher_blockwise)){
                                                                        $total_schools =0;
                                                                        $total_marked_schools =0;
                                                                        
                                                                        foreach ($teacher_blockwise as $key => $det) {
                                                                            $total_schools  +=$det->total_school;
                                                                            $total_marked_schools +=$det->marked_school;
                                                                            
                                                                        ?>
                                                                        <tr>
                                                                            <td class="center"><?=$key+1;?></td>
                                                                            <td><a method="post"href="<?=base_url().'DC/get_attendance_teacher_schoolwise?block='.$det->block_name.'&date='.$date?>"><?=$det->block_name;?></a></td>
                                                                            <td class="center"><?=number_format($det->total_school);?></td>
                                                                            <td class="center">
                                                                                <a href="<?=base_url().'DC/get_attendance_teacher_search?block='.$det->block_name.'&col_name=1&date='.$date?>"><?=number_format($det->marked_school);?></a>
                                                                            </td>
                                                                            
                                                                            <td class="center">
                                                                                <a href="<?=base_url().'DC/get_attendance_teacher_search?block='.$det->block_name.'&col_name=2&date='.$date?>"><?php $not_marked = ($det->total_school-$det->marked_school); echo number_format($not_marked);?></a>
                                                                            </td>
                                                                            <td class="center">
                                                                                <?php 

                                                                                    $marked_school = round(($det->marked_school/$det->total_school)*100);

                                                                                     
                                                                                ?>
                                                                                <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?=$marked_school.'%'?>">
      <?=$marked_school.'%';?>
    </div>
    <div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?=(100-$marked_school).'%'?>">
      <?=(100-$marked_school).'%'?>
    </div>
    
  </div>
                                                                            </td>
                                                                            

                                                                        </tr>
                                                                    <?php }
                                                                    
                                                                    $total_present_school = round(($total_marked_schools/$total_schools)*100);

                                                       
                                                                    // echo $total_present_school;

                                                                    ?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th colspan="2" class="center">Total</th>
                                                                        <th class="center"></th>
                                                                        <th class="center"><a href="<?php echo base_url().'DC/get_attendance_teacher_search?col_name=1&date='.$date?>"><?=number_format($total_marked_schools);?></a></th>
                                                                        <th class="center">
                                                                            <a href="<?php echo base_url().'DC/get_attendance_teacher_search?col_name=2&date='.$date?>"><?php $total_not_marked = $total_schools - $total_marked_schools;
                                                                            echo $total_not_marked;?></a>
                                                                        </th>
                                                                        
                                                                        <td class="center" style="padding: 10px 8px !important;">
                                                                            
                                                                            <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?=$total_present_school.'%'?>">
      <?=$total_present_school.'%';?>
    </div>
    
    <div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?=(100-$total_present_school).'%'?>">
      <?=(100-$total_present_school).'%'?>
    </div>
    
  </div>
                                                                        </td>
                                                                        

                                                                    </tr>
                                                                </tfoot>
                                                            <?php }?>
                                    </table>

                                <!---------Table End----->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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
    
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           
 var curr = new Date();

// console.log(firstday,lastday); 
var end = new Date(curr.getFullYear(), curr.getMonth(), curr.getDate());

$('.date').datepicker({
    // daysOfWeekDisabled: [0,6]
        
    

});
 // $('.date').datepicker("setStartDate",firstday);

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
//     $(document).ready(function() {
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
// });
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
    console.log(activeTab);
    if(activeTab){
        console.log(activeTab);
        $('#myTab a[href="' + activeTab + '"]').tab('show');
        localStorage.clear();
    }

});
    </script>

    </body>

</html>