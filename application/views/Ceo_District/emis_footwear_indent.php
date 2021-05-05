

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
            

    <?php $this->load->view('Ceo_District/header.php'); ?>

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
        <div class="col-md-12">
            <!-- Nav tabs category -->
            <ul class="nav nav-tabs nav-tabs-success faq-cat-tabs " id="myTab">
                <li class="active"><a href="#faq-cat-1" data-toggle="tab">Boys</a></li>
                <li><a href="#faq-cat-2" data-toggle="tab">Girls</a></li>
                

            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content faq-cat-content">
                <div class="tab-pane active in fade" id="faq-cat-1">
                    <div class="panel-group" id="accordion-cat-1">
                        <div class="panel panel-default panel-faq" >
                         

							  <?php 
														if(!empty($footwearboy))
														{
														foreach($footwearboy as $uf)
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
                                        <i class="fa fa-globe"></i> Footwear Indent Summary 
															
                                      
                                        
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
							  <?php }else {?>
								  <th style="text-align: center;">School</th>
								  <?php } ?>
							
                              <th style="text-align: center;">Cat-I:Size 9</th>
						      <th style="text-align: center;">Cat-I:Size 10</th>
							  <th style="text-align: center;">Cat-I:Size 11</th>
							   <th style="text-align: center;">Cat-I:Size 12</th>
							 <th style="text-align: center;">Cat-I:Size 13</th>
						      <th style="text-align: center;">Cat-II:Size 1</th>
							  <th style="text-align: center;">Cat-II:Size 2</th>
							   <th style="text-align: center;">Cat-II:Size 3</th>
							  <th style="text-align: center;">Cat-II:Size 4</th>
							   <th style="text-align: center;">Cat-II:Size 5</th>
							   <th style="text-align: center;">Cat-III:Size 6</th>
							  <th style="text-align: center;">Cat-III:Size 7</th>
							   <th style="text-align: center;">Cat-III:Size 8</th>
							  <th style="text-align: center;">Cat-III:Size 9</th>
							   <th style="text-align: center;">Cat-III:Size 10</th>
							   
                       
                              </tr>
                              </thead>
                                <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($footwearboy)){
								  $i=1;
								  
								  $bset1_count= [];
								  $bset2_count= [];
								  $bset3_count= [];
								  $bset4_count= [];
								  $bset5_count= [];
								  $bset6_count= [];
								  $bset7_count= [];
								  $bset8_count= [];
								  $bset9_count= [];
								  $bset10_count=[];
								  $bset11_count= [];
								  $bset12_count= [];
								  $bset13_count= [];
								  $bset14_count= [];
								  $bset15_count=[];
								
								  
								
								  foreach($footwearboy as $uf){ 
                                                              
                                ?>
								
        
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
							  
							  <?php if(!empty($uf->block_name)) {?>
							  <td style="text-align:left;"><a href="<?php echo base_url().'Ceo_District/emis_footwear_indent/?block_id='.$uf->scheme_id.$uf->block_id?>">
                              <?php echo $uf->block_name;?></a></td>
							  <?php } else {?>
							  <td style="text-align: left;">
                              <?php echo $uf->school_name;?></td><?php } ?>
							  
                              <td style="text-align: center;"><?php echo number_format($uf->bset1_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->bset2_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->bset3_count); ?></a></td> 
							   <td style="text-align: center;"><?php echo number_format($uf->bset4_count ); ?></a></td>
							    <td style="text-align: center;"><?php echo number_format($uf->bset5_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->bset6_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->bset7_count); ?></a></td> 
							   <td style="text-align: center;"><?php echo number_format($uf->bset8_count ); ?></a></td>
							    <td style="text-align: center;"><?php echo number_format($uf->bset9_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->bset10_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->bset11_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->bset12_count); ?></a></td> 
							   <td style="text-align: center;"><?php echo number_format($uf->bset13_count ); ?></a></td>
							    <td style="text-align: center;"><?php echo number_format($uf->bset14_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->bset15_count); ?></a></td>
							 
							 
							   
                              
                              
                              
                            
                              </tr>
                              <?php $i++;?>
    <?php
                             array_push($bset1_count,$uf->bset1_count);
							 array_push($bset2_count,$uf->bset2_count);
							 array_push($bset3_count,$uf->bset3_count);
							 array_push($bset4_count,$uf->bset4_count);
							 array_push($bset5_count,$uf->bset5_count);
							 array_push($bset6_count,$uf->bset6_count);
							  array_push($bset7_count,$uf->bset7_count);
							 array_push($bset8_count,$uf->bset8_count);
							 array_push($bset9_count,$uf->bset9_count);
							 array_push($bset10_count,$uf->bset10_count);
							 array_push($bset11_count,$uf->bset11_count);
							  array_push($bset12_count,$uf->bset12_count);
							 array_push($bset13_count,$uf->bset13_count);
							 array_push($bset14_count,$uf->bset14_count);
							 array_push($bset15_count,$uf->bset15_count);
							
							                      ?> 
                                        <?php  } ?>         
                                                      
                            </tbody>
							<tfoot>
                                                          <tr>
                                                            <th>Total</th>
                                                            <th></th> 
                                                            <th style="text-align: center;" ><?php 
                                                            $bset1_count = array_sum($bset1_count);
                                                            array_push($total1,$bset1_count);
                                                            echo number_format($bset1_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $bset2_count = array_sum($bset2_count);
                                                            array_push($total1,$bset2_count);
                                                            echo number_format($bset2_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $bset3_count = array_sum($bset3_count);
                                                            array_push($total1,$bset3_count);
                                                            echo number_format($bset3_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $bset4_count = array_sum($bset4_count);
                                                            array_push($total1,$bset4_count);
                                                            echo number_format($bset4_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $bset5_count = array_sum($bset5_count);
                                                            array_push($total1,$bset5_count);
                                                            echo number_format($bset5_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $bset6_count = array_sum($bset6_count);
                                                            array_push($total1,$bset6_count);
                                                            echo number_format($bset6_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $bset7_count = array_sum($bset7_count);
                                                            array_push($total1,$bset7_count);
                                                            echo number_format($bset7_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $bset8_count = array_sum($bset8_count);
                                                            array_push($total1,$bset8_count);
                                                            echo number_format($bset8_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $bset9_count = array_sum($bset9_count);
                                                            array_push($total1,$bset9_count);
                                                            echo number_format($bset9_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $bset10_count = array_sum($bset10_count);
                                                            array_push($total1,$bset10_count);
                                                            echo number_format($bset10_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $bset11_count = array_sum($bset11_count);
                                                            array_push($total1,$bset11_count);
                                                            echo number_format($bset11_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $bset12_count = array_sum($bset12_count);
                                                            array_push($total1,$bset12_count);
                                                            echo number_format($bset12_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $bset13_count = array_sum($bset13_count);
                                                            array_push($total1,$bset13_count);
                                                            echo number_format($bset13_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $bset14_count = array_sum($bset14_count);
                                                            array_push($total1,$bset14_count);
                                                            echo number_format($bset14_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $bset15_count = array_sum($bset15_count);
                                                            array_push($total1,$bset15_count);
                                                            echo number_format($bset15_count);?></th>
															
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

            <div class="tab-pane fade" id="faq-cat-2">
                    <div class="panel-group" id="accordion-cat-2">
                        <div class="panel panel-default panel-faq">
                            
                           
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-2" href="#" class="" aria-expanded="true">
                                    <h4 class="panel-title">
                                        
                                                           <i class="fa fa-globe"></i> Footwear Indent Summary 
                                        <span class="pull-right"><i class="glyphicon glyphicon"></i></span>
                                    </h4>
                                </a>



                            </div>
                            <div id="faq-cat-2-sub-2" class="panel-collapse collapse in" aria-expanded="true" style="">
                                <div class="panel-body" style="overflow:auto">
                                    <br/>
                                 <!-----Table 1st Start------>
                                    <table class="table table-striped table-bordered table-hover district" id="sample_4" >
 
								 
                                  <thead>
                                 <tr>
                                <th style="text-align: center;">S.No</th>
							
							  <?php if(!empty($uf->block_name)) {?>
							  <th style="text-align: center;">Block</th>
							  	  <?php } else {?>
								  <th style="text-align: center;">School</th>
								  <?php } ?>
                               <th style="text-align: center;">Cat-I:Size 9</th>
						      <th style="text-align: center;">Cat-I:Size 10</th>
							  <th style="text-align: center;">Cat-I:Size 11</th>
							   <th style="text-align: center;">Cat-I:Size 12</th>
							 <th style="text-align: center;">Cat-I:Size 13</th>
						      <th style="text-align: center;">Cat-II:Size 1</th>
							  <th style="text-align: center;">Cat-II:Size 2</th>
							   <th style="text-align: center;">Cat-II:Size 3</th>
							  <th style="text-align: center;">Cat-II:Size 4</th>
							   <th style="text-align: center;">Cat-II:Size 5</th>
							   <th style="text-align: center;">Cat-III:Size 6</th>
							  <th style="text-align: center;">Cat-III:Size 7</th>
							   <th style="text-align: center;">Cat-III:Size 8</th>
							  <th style="text-align: center;">Cat-III:Size 9</th>
							   <th style="text-align: center;">Cat-III:Size 10</th>
							 
                           
                              


                            

                              </tr>
                              </thead>
                            <tbody>
                              <?php $total1=[];?>
                              <?php if(!empty($footweargirl)){
								  $i=1;
								 
								  $gset1_count= [];
								  $gset2_count= [];
								  $gset3_count= [];
								  $gset4_count= [];
								  $gset5_count= [];
								  $gset6_count= [];
								  $gset7_count= [];
								  $gset8_count= [];
								  $gset9_count= [];
								  $gset10_count= [];
								   $gset11_count= [];
								  $gset12_count= [];
								  $gset13_count= [];
								  $gset14_count= [];
								  $gset15_count= [];
								  
								// print_r($footweargirl);
								  foreach($footweargirl as $uf){ 
                                                              
                                ?>
								
        
                              <tr>
                              <td style="text-align: center;"><?php echo $i;?></td>
							  
							
							  <?php  if(!empty($uf->block_name)) {?>
							  <td style="text-align:left;"><a href="<?php echo base_url().'Ceo_District/emis_footwear_indent/?block_id='.$uf->scheme_id.$uf->block_id?>">
                              <?php echo $uf->block_name;?></a></td>
							  <?php } else {?>
							  <td style="text-align: left;">
                              <?php echo $uf->school_name;?></td><?php } ?>
							  
                             
							 
							  <td style="text-align: center;"><?php echo number_format($uf->gset1_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->gset2_count); ?></a></td>
							   <td style="text-align: center;"><?php echo number_format( $uf->gset3_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->gset4_count); ?></a></td>
							   <td style="text-align: center;"><?php echo number_format($uf->gset5_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->gset6_count); ?></a></td>
							   <td style="text-align: center;"><?php echo number_format( $uf->gset7_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->gset8_count); ?></a></td>
							   <td style="text-align: center;"><?php echo number_format($uf->gset9_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->gset10_count); ?></a></td>
							   <td style="text-align: center;"><?php echo number_format($uf->gset11_count); ?></a></td>
							   <td style="text-align: center;"><?php echo number_format( $uf->gset12_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->gset13_count); ?></a></td>
							   <td style="text-align: center;"><?php echo number_format($uf->gset14_count); ?></a></td>
							  <td style="text-align: center;"><?php echo number_format($uf->gset15_count); ?></a></td>
							   
							   <!-- <td style="text-align: center;"><?php echo number_format($uf->trans_count); ?></a></td>-->
							   
                              
                              
                              
                            
                              </tr>
                              <?php $i++;?>
    <?php
                             
							 
							 array_push($gset1_count,$uf->gset1_count);
							 array_push($gset2_count,$uf->gset2_count);
							 array_push($gset3_count,$uf->gset3_count);
							 array_push($gset4_count,$uf->gset4_count);
							 array_push($gset5_count,$uf->gset5_count);
							 array_push($gset6_count,$uf->gset6_count);
							 array_push($gset7_count,$uf->gset7_count);
							 array_push($gset8_count,$uf->gset8_count);
							 array_push($gset9_count,$uf->gset9_count);
							 array_push($gset10_count,$uf->gset10_count);
							 array_push($gset11_count,$uf->gset11_count);
							 array_push($gset12_count,$uf->gset12_count);
							 array_push($gset13_count,$uf->gset13_count);
							 array_push($gset14_count,$uf->gset14_count);
							 array_push($gset15_count,$uf->gset15_count);
							                     ?> 
                                        <?php  } ?>         
                                                      
                            </tbody>
							<tfoot>
                                                         <tr>
                                                            <th>Total</th>
                                                            <th></th> 
                                                            
															
															<th style="text-align: center;" ><?php 
                                                            $gset1_count = array_sum($gset1_count);
                                                            array_push($total1,$gset1_count);
                                                            echo number_format($gset1_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $gset2_count = array_sum($gset2_count);
                                                            array_push($total1,$gset2_count);
                                                            echo number_format($gset2_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $gset3_count = array_sum($gset3_count);
                                                            array_push($total1,$gset3_count);
                                                            echo number_format($gset3_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $gset4_count = array_sum($gset4_count);
                                                            array_push($total1,$gset4_count);
                                                            echo number_format($gset4_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $gset5_count = array_sum($gset5_count);
                                                            array_push($total1,$gset5_count);
                                                            echo number_format($gset5_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $gset6_count = array_sum($gset6_count);
                                                            array_push($total1,$gset6_count);
                                                            echo number_format($gset6_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $gset7_count = array_sum($gset7_count);
                                                            array_push($total1,$gset7_count);
                                                            echo number_format($gset7_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $gset8_count = array_sum($gset8_count);
                                                            array_push($total1,$gset8_count);
                                                            echo number_format($gset8_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $gset9_count = array_sum($gset9_count);
                                                            array_push($total1,$gset9_count);
                                                            echo number_format($gset9_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $gset10_count = array_sum($gset10_count);
                                                            array_push($total1,$gset10_count);
                                                            echo number_format($gset10_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $gset11_count = array_sum($gset11_count);
                                                            array_push($total1,$gset11_count);
                                                            echo number_format($gset11_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $gset12_count = array_sum($gset12_count);
                                                            array_push($total1,$gset12_count);
                                                            echo number_format($gset12_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $gset13_count = array_sum($gset13_count);
                                                            array_push($total1,$gset13_count);
                                                            echo number_format($gset13_count);?></th>
															 <th style="text-align: center;" ><?php 
                                                            $gset14_count = array_sum($gset14_count);
                                                            array_push($total1,$gset14_count);
                                                            echo number_format($gset14_count);?></th>
															
															 <th style="text-align: center;" ><?php 
                                                            $gset15_count = array_sum($gset15_count);
                                                            array_push($total1,$gset15_count);
                                                            echo number_format($gset15_count);?></th>
															</tr>
															</tfoot>
                                                        
                                                              <?php } ?>
                             
                            </table>
                                             

                                <!---------Table End----->
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