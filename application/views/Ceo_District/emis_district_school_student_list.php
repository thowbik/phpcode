
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
.panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
body.modal-open {
    overflow-y: hidden !important;
    position: fixed;
}
   .clickable{
    cursor: pointer;   
}
.sweet-alert {
    background-color: #ffffff;
    width: 478px;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
   
    left: 50%;
    top: 10%;
    margin-left: -256px;
    margin-top: -250px!important;
    
    display: none;
    z-index: 100000!important;
    overflow-y: hidden !important;
    position: fixed!important;
}
.tab1
{
  color:red !important;
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" style="width:1015px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="sch_id"></h4>
          <label style="color:red">For Partially Aided Schools, Enter the Number of Government Aided Teachers only       <!--<h4 class="modal-title" id="hid" value=""></h4>-->
        </div>
        <div class="modal-body">
           <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs category -->
            <ul class="nav nav-tabs nav-tabs-success faq-cat-tabs " id="myTab">
                <li class="active"><a href="#faq-cat-1" data-toggle="tab">Staff Fixation Primary</a></li>
                <li id="cat-2"><a href="#faq-cat-2" data-toggle="tab">Staff Fixation Higher Secondary</a></li>
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content faq-cat-content">
                <div class="tab-pane active in fade" id="faq-cat-1">
                    <div class="panel-group" id="accordion-cat-1">
                        <div class="" >
                            <div id="faq-cat-1-sub-1" class="" aria-expanded="true" style>
                              <table class="table table-striped table-bordered table-hover" id="sample_3">
                  <thead>
                    <tr>
            <th>Medium</th> <th class="">Class 1</th> <th class="">Class 2</th> <th class="">Class 3</th> <th class="">Class 4</th> <th class="">Class 5</th> <th class="">Class 6</th> <th class="">Class 7</th> <th class="">Class 8</th> <th class="">Class 9</th> <th class="">Class 10</th>
                  </tr>
                  </thead>
                <tbody>
                  
                </tbody> 
                <!-- <tfoot>
                  <tr>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>

                  </tr>
                </tfoot> -->
            </table>
            <!--------- Form start --------------->
            <form id="primary_form">
           <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Eligible Post Gradewise</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                 <div class="panel-body">
                  <div id="elig_group"></div>
                     
                     </div>
                </div>
                
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Eligible  Post SubjectWise</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                
                 <div class="panel-body">
                  <input type="hidden" name="id" id="id">
                     <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">SGT</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_sg" name="elig_sg" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Science</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_sci" name="elig_sci" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Maths</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_mat" name="elig_mat" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">English</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_eng" name="elig_eng" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Tamil</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_tam" name="elig_tam" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Social</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_soc" name="elig_soc" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Primary HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_phm" name="elig_phm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Middle HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_mhm" name="elig_mhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">High HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_hhm" name="elig_hhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Telugu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_telu" name="elig_telu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Kannada</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_kann" name="elig_kann" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Urdu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_urdu" name="elig_urdu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Malayalam</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control elig_type" id="elig_mala" name="elig_mala" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('elig_sub_tot',this.value,2)">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Total</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="elig_sub_tot" name="elig_tot" placeholder="" readonly="true">                      
                       </div> 
                       </div>
                     </div>
                </div>
                 <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Post Sanctioned as on Date</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                
                 <div class="panel-body">
                     <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">SGT</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_sg" name="sanc_sg" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Science</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_sci" name="sanc_sci" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);add_sum('sanc_sci','avail_sci','sci');">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Maths</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_mat" name="sanc_mat" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);add_sum('sanc_mat','avail_mat','mat');">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">English</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_eng" name="sanc_eng" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);add_sum('sanc_eng','avail_eng','eng');">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Tamil</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_tam" name="sanc_tam" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);add_sum('sanc_tam','avail_tam','tamil');">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Social</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_soc" name="sanc_soc" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);add_sum('sanc_soc','avail_soc','soc');">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Primary HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_phm" name="sanc_phm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Middle HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_mhm" name="sanc_mhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">High HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_hhm" name="sanc_hhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Telugu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_telu" name="sanc_telu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Kannada</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_kann" name="sanc_kann" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Urdu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_urdu" name="sanc_urdu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Malayalam</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control sanc_class" id="sanc_mala" name="sanc_mala" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('sanc_tot',this.value,3);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Total</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="sanc_tot" name="sanc_tot" placeholder="" readonly="true">                      
                       </div> 
                       </div>
                     </div>
                </div>
                <div class="panel panel-success">
                   <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Available as on Date</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                
               
                 <div class="panel-body">
                     <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">SGT</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_sg" name="avail_sg" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Science</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_sci" name="avail_sci" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);add_sum('sanc_sci','avail_sci','sci');">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Maths</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_mat" name="avail_mat" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);add_sum('sanc_mat','avail_mat','mat');">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">English</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_eng" name="avail_eng" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);add_sum('sanc_eng','avail_eng','eng');">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Tamil</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_tam" name="avail_tam" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);add_sum('sanc_tam','avail_tam','tamil');">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Social</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_soc" name="avail_soc" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);add_sum('sanc_soc','avail_soc','soc');">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Primary HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_phm" name="avail_phm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Middle HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_mhm" name="avail_mhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">High HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_hhm" name="avail_hhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Telugu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_telu" name="avail_telu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Kannada</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_kann" name="avail_kann" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Urdu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_urdu" name="avail_urdu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Malayalam</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control avai_class" id="avail_mala" name="avail_mala" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('avail_tot',this.value,4);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Total</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="avail_tot" name="avail_tot" placeholder="" readonly="true">                      
                       </div> 
                       </div>
                     </div>
                </div>
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Vacancy</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                
                 <div class="panel-body">
                     <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">SGT</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_sg" name="vac_sg" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Science</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_sci" name="vac_sci" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Maths</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_mat" name="vac_mat" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">English</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_eng" name="vac_eng" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Tamil</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_tam" name="vac_tam" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Social</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_soc" name="vac_soc" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Primary HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_phm" name="vac_phm" placeholder="" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Middle HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_mhm" name="vac_mhm" placeholder="" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">High HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_hhm" name="vac_hhm" placeholder="" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Telugu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_telu" name="vac_telu" placeholder="" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Kannada</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_kann" name="vac_kann" placeholder="" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Urdu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_urdu" name="vac_urdu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Malayalam</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control vaca_class" id="vac_mala" name="vac_mala" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('vac_tot',this.value,1);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Total</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="vac_tot" name="vac_tot" placeholder="" readonly="true">                      
                       </div> 
                       </div>
                     </div>
                </div>
                <div class="panel panel-success">
                   <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Needed Post</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
               
                 <div class="panel-body">
                     <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">SGT</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_sg" name="need_sg" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Science</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_sci" name="need_sci" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Maths</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_mat" name="need_mat" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">English</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_eng" name="need_eng" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Tamil</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_tam" name="need_tam" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Social</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_soc" name="need_soc" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Primary HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_phm" name="need_phm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Middle HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_mhm" name="need_mhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">High HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_hhm" name="need_hhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Telugu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_telu" name="need_telu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Kannada</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_kann" name="need_kann" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Urdu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_urdu" name="need_urdu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Malayalam</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control need_class" id="need_mala" name="need_mala" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('need_tot',this.value,5);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Total</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="need_tot" name="need_tot" placeholder="" readonly="true">                      
                       </div> 
                       </div>
                     </div>
                </div>
                <div class="panel panel-success">
                   <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Surplus Post With Person</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
               
                 <div class="panel-body">
                     <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">SGT</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_sg" name="surp_w_sg" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Science</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_sci" name="surp_w_sci" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Maths</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_mat" name="surp_w_mat" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">English</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_eng" name="surp_w_eng" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Tamil</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_tam" name="surp_w_tam" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Social</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_soc" name="surp_w_soc" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Primary HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_phm" name="surp_w_phm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Middle HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_mhm" name="surp_w_mhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">High HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_hhm" name="surp_w_hhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Telugu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_telu" name=" surp_w_telu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Kannada</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_kann" name="surp_w_kann" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Urdu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_urdu" name="surp_w_urdu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Malayalam</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_w_class" id="surp_w_mala" name="surp_w_mala" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_w_tot',this.value,6);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Total</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="surp_w_tot" name="surp_w_tot" placeholder="" readonly="true">                      
                       </div> 
                       </div>
                     </div>
                </div>
                <div class="panel panel-success">
                   <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Surplus Post Without Person</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
               
                 <div class="panel-body">
                     <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">SGT</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_sg" name="surp_wo_sg" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Science</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_sci" name="surp_wo_sci" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Maths</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_mat" name="surp_wo_mat" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">English</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_eng" name="surp_wo_eng" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Tamil</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_tam" name="surp_wo_tam" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Social</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_soc" name="surp_wo_soc" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Primary HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_phm" name="surp_wo_phm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Middle HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_mhm" name="surp_wo_mhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">High HM</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_hhm" name="surp_wo_hhm" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Telugu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_telu" name="surp_wo_telu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Kannada</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_kann" name="surp_wo_kann" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Urdu</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_urdu" name="surp_wo_urdu" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                       <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Malayalam</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control surp_wo_class" id="surp_wo_mala" name="surp_wo_mala" placeholder="" required onkeydown="return number_format()" maxlength="3" onchange="grand_total('surp_wo_tot',this.value,7);">                      
                       </div> 
                       </div>
                        <div class="col-md-2" style="width: 13.66667% !important;">
                       <label class="control-label">Total</label>
                       <div class="form-group">                     
                           <input type="text" class="form-control" id="surp_wo_tot" name="surp_wo_tot" placeholder="" readonly="true">                      
                       </div> 
                       </div>
                     </div>
                </div>
        <div class="modal-footer" id="primary_save_grp">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save">Save</button>
          <div id="err_msg"></div>
        </div>
      </form>
      <!--------- End --------->
            
                            </div>
                          </div>
                        </div>
                      </div><!-- tab 1 End -->
                      <div class="tab-pane fade" id="faq-cat-2">
                    <div class="panel-group" id="accordion-cat-2">
                        <div class="">
                            
                            <div id="faq-cat-2-sub-1" class="panel-collapse collapse in" aria-expanded="true" style="">
                            </div>
                             <table class="table table-striped table-bordered table-hover" id="sample_4">
                  <thead>
                    <tr>
            <th>Medium</th> <th class="">Class 11</th> <th class="">Class 12</th> 
                  </tr>
                  </thead>
                <tbody>
                  
                </tbody> 
                <!-- <tfoot>
                  <tr>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>

                  </tr>
                </tfoot> -->
            </table>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Eligible  Post SubjectWise</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                 <div class="panel-body">
                  <form id="high_class">
                  <div class="row" id="elig_high_group">
                  
                     </div>
                </div>
                
        </div>
        <div class="modal-footer" id="higher_save_grp">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="high_save">Save</button>
        </div>
      </form>
                          </div>
                        </div>
                      </div><!-- tab 2 End -->
                    </div><!-- Tab End -->
                  </div><!-- col End -->
                </div><!-- Row End -->


                 

            <!-- <input type="hidden" id="panel2_id"> -->
            
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
  
</div>

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
                                     
                                      <div class="portlet light">
                                            <!-- form action="<?php echo base_url().'Ceo_District/emis_district_schools_student_list'?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2" style="width:6%;padding-top:5%;">

                                                            All <input type="checkbox" id="emis_state_report_schmanage"  value="all" name="school_manage">
                                                        </div>
                                                        <div class="col-md-8" >
                                                            
                                                              <div class="form-group" style="padding: 10px;padding-left: 8%">
                                                                <label class="control-label bold">
                                                                School Management</label><br/>
                                                               
                                                                <?php  
                                                                $getmanagecate = array('Government','Fully Aided','Partially Aided');
                                                                foreach($getmanagecate as $det){ 
                                                                  // echo  $det;
                                                                  ?>
                                                                 
            <input type="checkbox" name="school_manage[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off" <?php echo ($det== 'Government' && count($manage) == '0'? 'checked' : '');?> value="<?=$det;?>"/><span class="label-text" ><?=$det;?></span>&nbsp;
            
                                                                  <?php }  ?>
                                                                  
            <!-- <input type="checkbox" name="school_manage[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off"  value="Government"/><span class="label-text" <?php echo (count($manage) == '0'? 'checked' : '');?>>Government</span>&nbsp;
            <input type="checkbox" name="school_manage[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off"  value="Fully Aided"/><span class="label-text" >Fully Aided</span>&nbsp;
            <input type="checkbox" name="school_manage[]" class="school_manage" id="emis_state_report_schmanage" autocomplete="off"  value="Partially Aided"/><span class="label-text" >Partially Aided</span>&nbsp; --
            
                                                                  

                                                               
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>
                                                              
                                                              <div style="padding: 4px;padding-left: 8%;margin-top: -2%;" class="form-group" style="padding: 10px;">
                                                                <label class="control-label bold">
                                                                 School Category </label>&nbsp;&nbsp;<input type="checkbox" id="select_all"/>Category All<br/>
                                                                <?php if(!empty($getsctype))
                                                                {
                                                                    foreach($getsctype as $school_type)
                                                                    {?>
                                                                
<input type="checkbox"  class="emis_state_report_schcate" name="school_cate[]" id="emis_state_report_schcate" autocomplete="off" value="<?=$school_type->category_name;?>" <?php echo (count($cate) == '0'? 'checked' : '');?>/><span class="label-text"><?=$school_type->category_name;?></span>

&nbsp;
                                                                <?php } ?>  <?php }?>
                                                              
                                                                <font style="color:#dd4b39;"><div id="emis_state_report_schcate_alert"></div></font>
                                                              </div>
                                                              </div>
                                                               <div class="col-md-1" >
                                                              <div class="form-group" style="padding: 10px;margin-top: 15px">
                                                                
                                                                <button type="submit" class="btn green btn-lg">Submit</button>
                                                              </div>
                                                              </div>
                                                      
                                                    </div>
                                                </div>
                                            </form-->
                                              <?php if($manage!=""){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5><b>Selected School Management :</b><?=implode(",",$manage);?> <b>Selected Categoty :</b>  <?=$cate!=''?implode(",",$cate):'';?></h5>
                                                        
                                                    </div>
                                                </div>
                                              <?php  }
$total1 = [];
                                               ?>
                                            </div>
                                       
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                          
                                                            <i class="fa fa-globe"></i>Staff Fixation  - <?=$dist_id; ?><span> </span></div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">

                                                       
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                   <th class=" center">block_name</th>
                                                                     <th class=" center">Udise Code</th>
                                                                     <th class=" ">School Name</th>
                                   <th class=" center">Enr<br> 1st</th>
                                     <th class=" center">Enr <br>2nd</th>
                                     <th class=" center">Enr<br> 3rd</th>
                                     <th class=" center">Enr<br> 4th</th>
                                                                      <th class=" center">Enr <br>5th</th>
                                     <th class=" center">Enr <br>6th</th>
                                     <th class=" center">Enr <br>7th</th>
                                     <th class=" center">Enr <br>8th</th>
                                      <th class=" center">Enr <br>9th</th>
                                    <th class=" center">Enr <br>10th</th>
                                    <th class=" center">Enr <br>11th</th>
                                    <th class=" center">Enr <br>12th</th>

                                                                    
                                                                </tr>
                                                                </thead>
                                                               <tbody>
                                                            <?php if(!empty($school_student_count_details)){ 
                              foreach($school_student_count_details as $index=> $sd){   
                                // echo $sd->teach_status;
                                ?>

                                                                <tr>
                                                                   <td class="center"><?=$index+1;?></td>
                                   <td class="center"><?=$sd->block_name;?></td>
                                                                   <td class="center">
                                                                    
                                                                    <a href="javascript:void(0);"onclick="openmodel(<?=$sd->school_id?>)"><?=$sd->udise_code;?></a>
                                                                   
                                                                     
                                                                  
                                                                  </td>
                                                                   <td><?=$sd->school_name;?></td>
                                                                    
                                   <td class="center"><?=$sd->first?></td>
                                                                   <td class="center"><?=$sd->second?></td>
                                   <td class="center"><?=$sd->third?></td>
                                   <td class="center"><?=$sd->fourth?></td>
                                                                   <td class="center"><?=$sd->fifth?></td>
                                                                   <td class="center"><?=$sd->sixth?></td>
                                   <td class="center"><?=$sd->seventh?></td>
                                   <td class="center"><?=$sd->eighth?></td>
                                   <td class="center"><?=$sd->ninth?></td>
                                   <td class="center" ><?=$sd->tenth?></td>
                                   <td class="center" ><?=$sd->class11?></td>
                                   <td class="center" ><?=$sd->class12?></td>

                                   
                                  
                                                                </tr>
                                                                <?php  }  ?>
                                                                
                                                      
                                                            </tbody>
                                                           <!-- <tfoot>
                                                                <th colspan="2" class="center">Total</th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>
                                                                <th class="center"></th>

                                                            </tfoot>-->
                                                            <?php } ?>
                                                        </table>

                                                        
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
              <script type="text/javascript">
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
        </script>
             
<script type="text/javascript">
  $(document).ready(function(){ 
  $("#emis_state_report_schcate").change(function(){ 

    var emis_state_report_schcate = $("#emis_state_report_schcate").val();

      $.ajax({
        type: "POST",
        url:baseurl+'State/get_school_management_data',
        data:"&emis_state_report_schcate="+emis_state_report_schcate,
        success: function(resp){
        // alert(resp);  
        $("#emis_state_report_schmanage").html(resp);  
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

  });  }); 

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_state_report_schcate").change(function(){
      return validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_state_report_schmanage").change(function(){
      return validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert'); 
});   });


function checkmanagecate(){

var baseurl='<?php echo base_url(); ?>';

var manage = validatetext('emis_state_report_schmanage','emis_state_report_schmanage_alert');
var cate = validatetext('emis_state_report_schcate','emis_state_report_schcate_alert'); 

var manage1=$("#emis_state_report_schmanage").val();
var cate1 = $("#emis_state_report_schcate").val();

if(manage == 0 || cate == 0){
    return false;
}

  
       
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

$(document).ready(function()
{
    // _dataTable('#sample_3');
});

function _dataTable(dataId){
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
            // console.log(column.data());
            var  sum = column
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
               
            
            $(column.footer()).html();
                        });
            }
        });
    }
        </script>

         <script>
           $("#myModal").on("hidden.bs.modal", function(){
    window.location.reload();
});
          $(document).ready(function(){
          $(".modal-lg").css('width','1051px');
      $('#myTab a[href="#faq-cat-1"]').tab('show');

         $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        var tabs = $(e.target).attr('href');
        if(tabs =='#faq-cat-2')
        {
          $(".modal-lg").css('width','1200px');
        }else
        {
          $(".modal-lg").css('width','1051px');
        }
          });
       });

                var students_info_details = <?php echo json_encode($school_student_count_details);?>;
                var class_1_5 = [];
                var class_6 = [];
                var class_7 = [];
                var class_8 = [];
                var class_9 = [];
                var class_10 = [];
                var class_6_8 =0;
                var class_9_10 =0; 
                var sch_id = '';
                var stu_count = [];
function openmodel(school_id)
{

    var stu_info_detail = students_info_details.filter(stu=>stu.school_id==school_id)[0];
    console.log(stu_info_detail);
    get_tamil_engilsh_stu_count(school_id);
    if(stu_info_detail.cate_type =='Higher Secondary School')
    {
      $("#cat-2").show();
      get_tamil_engilsh_high_stu_count(school_id);
    }else
    {
      $("#cat-2").hide();
      $('#myTab a[href="#faq-cat-1"]').tab('show');
    }
    if(stu_info_detail.id !=null){
    text_val('id',stu_info_detail.id);

    //Vacance Subjectwise
    text_val('vac_sg',stu_info_detail.vac_sg);
    text_val('vac_sci',stu_info_detail.vac_sci);
    text_val('vac_mat',stu_info_detail.vac_mat);
    text_val('vac_eng',stu_info_detail.vac_eng);
    text_val('vac_tam',stu_info_detail.vac_tam);
    text_val('vac_soc',stu_info_detail.vac_soc);
    text_val('vac_phm',stu_info_detail.vac_phm);
    text_val('vac_mhm',stu_info_detail.vac_mhm);
    text_val('vac_hhm',stu_info_detail.vac_hhm);
    text_val('vac_telu',stu_info_detail.vac_telu);
    text_val('vac_kann',stu_info_detail.vac_kann);
    text_val('vac_urdu',stu_info_detail.vac_urdu);
    text_val('vac_mala',stu_info_detail.vac_mala);
    text_val('vac_tot',stu_info_detail.vac_tot);

    //Post Subjectwise
    text_val('elig_sg',stu_info_detail.elig_sg);
    text_val('elig_sci',stu_info_detail.elig_sci);
    text_val('elig_mat',stu_info_detail.elig_mat);
    text_val('elig_eng',stu_info_detail.elig_eng);
    text_val('elig_tam',stu_info_detail.elig_tam);
    text_val('elig_soc',stu_info_detail.elig_soc);
    text_val('elig_phm',stu_info_detail.elig_phm);
    text_val('elig_mhm',stu_info_detail.elig_mhm);
    text_val('elig_hhm',stu_info_detail.elig_hhm);
    text_val('elig_telu',stu_info_detail.elig_telu);
    text_val('elig_kann',stu_info_detail.elig_kann);
    text_val('elig_urdu',stu_info_detail.elig_urdu);
    text_val('elig_mala',stu_info_detail.elig_mala);
    text_val('elig_sub_tot',stu_info_detail.elig_tot);

    //sanc
    text_val('sanc_sg',stu_info_detail.sanc_sg);
    text_val('sanc_sci',stu_info_detail.sanc_sci);
    text_val('sanc_mat',stu_info_detail.sanc_mat);
    text_val('sanc_eng',stu_info_detail.sanc_eng);
    text_val('sanc_tam',stu_info_detail.sanc_tam);
    text_val('sanc_soc',stu_info_detail.sanc_soc);
    text_val('sanc_phm',stu_info_detail.sanc_phm);
    text_val('sanc_mhm',stu_info_detail.sanc_mhm);
    text_val('sanc_hhm',stu_info_detail.sanc_hhm);
    text_val('sanc_telu',stu_info_detail.sanc_telu);
    text_val('sanc_kann',stu_info_detail.sanc_kann);
    text_val('sanc_urdu',stu_info_detail.sanc_urdu);
    text_val('sanc_mala',stu_info_detail.sanc_mala);
    text_val('sanc_tot',stu_info_detail.sanc_tot);

    //avail Data
    text_val('avail_sg',stu_info_detail.avail_sg);
    text_val('avail_sci',stu_info_detail.avail_sci);
    text_val('avail_mat',stu_info_detail.avail_mat);
    text_val('avail_eng',stu_info_detail.avail_eng);
    text_val('avail_tam',stu_info_detail.avail_tam);
    text_val('avail_soc',stu_info_detail.avail_soc);
    text_val('avail_phm',stu_info_detail.avail_phm);
    text_val('avail_mhm',stu_info_detail.avail_mhm);
    text_val('avail_hhm',stu_info_detail.avail_hhm);
    text_val('avail_telu',stu_info_detail.avail_telu);
    text_val('avail_kann',stu_info_detail.avail_kann);
    text_val('avail_urdu',stu_info_detail.avail_urdu);
    text_val('avail_mala',stu_info_detail.avail_mala);
    text_val('avail_tot',stu_info_detail.avail_tot);

    //need post
    text_val('need_sg',stu_info_detail.need_sg);
    text_val('need_sci',stu_info_detail.need_sci);
    text_val('need_mat',stu_info_detail.need_mat);
    text_val('need_eng',stu_info_detail.need_eng);
    text_val('need_tam',stu_info_detail.need_tam);
    text_val('need_soc',stu_info_detail.need_soc);
    text_val('need_phm',stu_info_detail.need_phm);
    text_val('need_mhm',stu_info_detail.need_mhm);
    text_val('need_hhm',stu_info_detail.need_hhm);
    text_val('need_telu',stu_info_detail.need_telu);
    text_val('need_kann',stu_info_detail.need_kann);
    text_val('need_urdu',stu_info_detail.need_urdu);
    text_val('need_mala',stu_info_detail.need_mala);
    text_val('need_tot',stu_info_detail.need_tot);

    //surpuls wp
    text_val('surp_w_sg',stu_info_detail.surp_w_sg);
    text_val('surp_w_sci',stu_info_detail.surp_w_sci);
    text_val('surp_w_mat',stu_info_detail.surp_w_mat);
    text_val('surp_w_eng',stu_info_detail.surp_w_eng);
    text_val('surp_w_tam',stu_info_detail.surp_w_tam);
    text_val('surp_w_soc',stu_info_detail.surp_w_soc);
    text_val('surp_w_phm',stu_info_detail.surp_w_phm);
    text_val('surp_w_mhm',stu_info_detail.surp_w_mhm);
    text_val('surp_w_hhm',stu_info_detail.surp_w_hhm);
    text_val('surp_w_telu',stu_info_detail.surp_w_telu);
    text_val('surp_w_kann',stu_info_detail.surp_w_kann);
    text_val('surp_w_urdu',stu_info_detail.surp_w_urdu);
    text_val('surp_w_mala',stu_info_detail.surp_w_mala);
    text_val('surp_w_tot',stu_info_detail.surp_w_tot);

    // surpuls wop
    text_val('surp_wo_sg',stu_info_detail.surp_wo_sg);
    text_val('surp_wo_sci',stu_info_detail.surp_wo_sci);
    text_val('surp_wo_mat',stu_info_detail.surp_wo_mat);
    text_val('surp_wo_eng',stu_info_detail.surp_wo_eng);
    text_val('surp_wo_tam',stu_info_detail.surp_wo_tam);
    text_val('surp_wo_soc',stu_info_detail.surp_wo_soc);
    text_val('surp_wo_phm',stu_info_detail.surp_wo_phm);
    text_val('surp_wo_mhm',stu_info_detail.surp_wo_mhm);
    text_val('surp_wo_hhm',stu_info_detail.surp_wo_hhm);
    text_val('surp_wo_telu',stu_info_detail.surp_wo_telu);
    text_val('surp_wo_kann',stu_info_detail.surp_wo_kann);
    text_val('surp_wo_urdu',stu_info_detail.surp_wo_urdu);
    text_val('surp_wo_mala',stu_info_detail.surp_wo_mala);
    text_val('surp_wo_tot',stu_info_detail.surp_wo_tot);
    if(stu_info_detail.teach_status ==2){
    $("#primary_save_grp").hide();

    }
    }else
    {
      $(":text").val(0);
    }
    //edit data 
    // if(stu_info_detail.length !=0){
    //             elig_text +=generate_text_box('','hidden','id'+i,i,true,(res.teacher_panel1.length !=0?res.teacher_panel1[i].id:''))
    //           }
    $("#sch_id").text(stu_info_detail.school_name+'-'+stu_info_detail.udise_code);
    sch_id = school_id;


$('#myModal').modal('show');
}         


function get_tamil_engilsh_stu_count(school_id)
{
    var data = {'sch_id':school_id};
    

                   stu_count =[];
    $.ajax({

        method:"POST",
        url:"<?=base_url().'Ceo_District/get_student_schoolwise_count'?>",
        data:data,
        dataType:'json',
        success:function(res)
        {
            var stu_list = res.result;
            console.log(res.teacher_panel1);
            student_table = '';
            class_1_5 = [];
            class_6 = [];
            class_7 = [];
            class_8 = [];
            class_9 = [];
            class_10 = [];
            class_6_8 =0;
            class_9_10 =0; 
            medium_id = [];
            stu_count = res;
            var elig_text = '';
            $("#sample_3 tbody").empty();
            var j = 0;
            stu_list.map(function(val,i)
            {
              // console.log(val);
              if(val.Medium != 'None'){
                i = j;
              student_table +='<tr>';
              student_table +='<td>'+val.Medium+'</td><td>'+val.Class1+'</td><td>'+val.Class2+'</td><td>'+val.Class3+'</td><td>'+val.Class4+'</td><td>'+val.Class5+'</td><td>'+val.Class6+'</td><td>'+val.Class7+'</td><td>'+val.Class8+'</td><td>'+val.Class9+'</td><td>'+val.Class10+'</td>';
              student_table +='</tr>';

              class_1_5.push((parseInt(val.Class1) + parseInt(val.Class2) + parseInt(val.Class3)  + parseInt(val.Class4) + parseInt(val.Class5)));
              class_6.push(val.Class6);
              class_7.push(val.Class7);
              class_8.push(val.Class8);
              class_9.push(val.Class9);
              class_10.push(val.Class10);
              medium_id.push(val.education_medium_id);
              //text box 

              elig_text += generate_text_box('Eligible Post (1-5)','text','elig_1_5'+i,i,false,(res.teacher_panel1.length !=0?res.teacher_panel1[i].elig_1_5:0));
              elig_text += generate_text_box('Eligible post as per RTE (6-8)','text','elig_6_8'+i,i,false,(res.teacher_panel1.length !=0?res.teacher_panel1[i].elig_6_8:0));
              elig_text += generate_text_box('Eligible Post as per 525 GO (9-10)','text','elig_9_10'+i,i,false,(res.teacher_panel1.length !=0?res.teacher_panel1[i].elig_9_10:0));
              elig_text += generate_text_box('HM','text','hm'+i,i,false,(res.teacher_panel1.length !=0 && res.teacher_panel1[i].hm !=null?res.teacher_panel1[i].hm:0));
              elig_text += generate_text_box(val.Medium+' Medium Total Eligible Post ','text','elig_tot'+i,i,true,(res.teacher_panel1.length !=0?res.teacher_panel1[i].elig_tot:0));

              if(res.teacher_panel1.length !=0){
                elig_text +=generate_text_box('','hidden','id'+i,i,true,(res.teacher_panel1.length !=0?res.teacher_panel1[i].id:0))
              }
              j++;
              }


            })
            // console.log(class_6);
            $("#sample_3 tbody").html(student_table);
            $("#elig_group").html(elig_text);
            // var table = _dataTable("#sample_3");
        }
    })
}

function generate_text_box(label,type,id,field_no,read,value)
  {
      var text_val  = ''
      // console.log(read);
      if(type=='hidden')
          {
            text_val = '<input type='+type+' class="form-control" id="'+id+'" name="'+id+'" placeholder="" value='+value+'>'
          }
        else if(read==false){
      // text_val += '
      text_val = '<div class="col-md-2" style="width:19%"><label class="control-label">'+label+'</label><div class="form-group"><input type="text" class="form-control elig_class'+field_no+'" id="'+id+'" name="'+id+'" placeholder="" onkeydown="return number_format()" maxlength="3" onchange="dynamic_grand_sum('+"'elig_tot'"+',this.value,'+field_no+');" value='+value+'></div></div>';
          
        // text_val +='</div>'; 
      }else
      {
        text_val = '<div class="col-md-2" style="width:20.666667%"><label class="control-label">'+label+'</label><div class="form-group"><input type='+type+' class="form-control" id="'+id+'" name="'+id+'" placeholder="" readonly value='+value+'></div></div>';                  
      }
      return text_val;
  }


  var grand_sum =0;
  
function grand_total(id,val,flag)
{
  // console.log(flag);
  var tot = '';
  grand_sum = 0;

      switch(parseInt(flag))
      {
        case 1:
          $('.vaca_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
          // console.log(grand_sum);
            text_val(id,grand_sum);
        break;
        case 2:
          $('.elig_type').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
          // console.log(grand_sum);
         text_val(id,grand_sum);

        break;
        case 3:
          $('.sanc_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val(id,grand_sum);

        break;
        case 4:
          $('.avai_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val(id,grand_sum);

        break;
        case 5:
          $('.need_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val(id,grand_sum);

        break;
        case 6:
          $('.surp_w_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val(id,grand_sum);

        break;
        case 7:
          $('.surp_wo_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val(id,grand_sum);

        break;
      }
      // $("#elig_tot1").val(2);
      // console.log(tot);
}

function dynamic_grand_sum(id,val,flag)
{
  // alert();
    grand_sum = 0;
      

    console.log(stu_count);
    for(var i=0;i<stu_count.result.length;i++){
      // console.log(i);
      switch(parseInt(flag)){
        case i:
          $('.elig_class'+flag).map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
          console.log(grand_sum);
            text_val(id+flag,grand_sum);
          
        break;
          }


    }
    // total_grand_sum += get_text_value(id+flag);

    // console.log(total_grand_sum);

}

function text_val(id,value)
{
  // console.log(id);
    $("#"+id).val(value);

}

function number_format()
{
                return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )
}

function add_sum(sanc_id,avai_id,surplus_id){
  // alert();


  var sanc_val = get_text_value(sanc_id);
  var avai_val = get_text_value(avai_id);
  var total = '';
    if(sanc_val !='' && avai_val !='')
    {
      total = +sanc_val - +avai_val;
      // console.log(total);
    }else
    {
      text_val(surplus_id,'');
    }
  
  // sup_need_value(surplus_id,total);
}

function sup_need_value(id,value)
{
    var color = '';
    grand_sum = 0;
    if(value >0)
    {
      color = 'green';
    }else
    {
      color = 'red';
    }

      $("#"+id).val(value).attr('style','color:'+color);

      $('.surp_class').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val('tot',grand_sum);
}


function get_text_value(id)
{
   return  $("#"+id).val();
}
var status = false;
var total_grand_sum = 0;
$("#save").click(function()
{
    // alert();
    total_grand_sum = 0;
    // console.log(medium_id);
      for(var i=0;i<medium_id.length;i++)
       {
          // if(stu_count.result[i].Medium !="None"){
        // console.log(stu_count.result[i].Medium);
        // console.log(i);
          total_grand_sum += +get_text_value('elig_tot'+i);
          // }
       } 

       var elig_sub_tot = +get_text_value('elig_sub_tot');
        // console.log(total_grand_sum);return false;
        console.log(elig_sub_tot,total_grand_sum);
    $("#err_msg").html('');
    status = false;

    
    var save_val = $("form").serializeArray();
$(save_val).each(function( index, element ) {
    if(element.value =='')
    {
       // var name = element.name.replace(/[_-]/g, " ");
       // name = name.toUpperCase();
       // console.log(element);
       if(element.name!='id'){
        $("#err_msg").html('<h5 style="color:red">Please Enter All Filed </h5>');
        status = false;
        return false;
        }
    }
    /*else if(total_grand_sum != elig_sub_tot)
    {
        $("#err_msg").html('<h5 style="color:red">Eligible Post SubjectWise Total should be Equal to Gradewise Total</h5>');

        status =false;
        return false;
    }*/
        // alert();
        status = true;
     

});
// console.log(status);
    if(status=='true')
    {
      // console.log($("form").serializeArray());

      // console.log(stu_count);return false;
      swal({
                title: "Are you sure?",
                text: "Staff Details Cannot be Edited after Final Sumbit.Are You Sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                //confirmButtonText: "Yes, Final Submit!",
                cancelButtonText:'Save',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(isConfirm){
                if (isConfirm)
                {
       var data = {'records':$("#primary_form").serialize(),'sch_id':sch_id,'stu_1':class_1_5,'class_6':class_6,'class_7':class_7,'class_8':class_8,'class_9':class_9,'class_10':class_10,'count':medium_id.length,'medium':medium_id,'status':2};

      $.ajax({
        method:"POST",
        url:"<?=base_url().'Ceo_District/save_staff_schoollist_count'?>",
        data:data,
        dataType:'JSON',
        success:function(res)
        {
          // console.log(res);
          if(res)
          {
            swal({
                title: "Successfully Added Staff Details!",
                type: "success",
                showCancelButton: false,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "ok!",


            }, function(isConfirm){
                if (isConfirm)
                {
                  window.location.reload();
                }
              })
          }
        }
      })

      }else
      {
        // alert();
          var data = {'records':$("#primary_form").serialize(),'sch_id':sch_id,'stu_1':class_1_5,'class_6':class_6,'class_7':class_7,'class_8':class_8,'class_9':class_9,'class_10':class_10,'count':medium_id.length,'medium':medium_id,'status':1};

      $.ajax({
        method:"POST",
        url:"<?=base_url().'Ceo_District/save_staff_schoollist_count'?>",
        data:data,
        dataType:'JSON',
        success:function(res)
        {
          // console.log(res);
          if(parseInt(res))
          {
            swal({
                title: "Successfully Added Staff Details!",
                type: "success",
                showCancelButton: false,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "ok!",


            }, function(isConfirm){
                if (isConfirm)
                {
                  window.location.reload();
                }
              })
          }
        }
      })
      }
    })
  }

})

/*************************** Staff High Class ***********************/
var stu_high_count = [];
var school_high_id = '';
var panel3 = [];
function get_tamil_engilsh_high_stu_count(school_id)
{
    var data = {'sch_id':school_id};
    school_high_id = school_id;
    /*if($.fn.dataTable.isDataTable('#sample_3')){
           $('#sample_3').DataTable().clear().destroy();


                   }*/

                   stu_high_count =[];
    $.ajax({

        method:"POST",
        url:"<?=base_url().'Ceo_District/get_mediumwise_school_students_count'?>",
        data:data,
        dataType:'json',
        success:function(res)
        {
            var stu_list = res.stu_count;
            var student_table = '';
            var sub_count = res.sub_count;
            var elig_text = '';
            $("#sample_4 tbody").empty();
            var j = 0;
            stu_high_count = stu_list;
            stu_list.map(function(val,i)
            {
              // console.log(val);
              if(val.Medium != 'None'){
                i = j;
              student_table +='<tr>';
              student_table +='<td>'+val.Medium+'</td><td>'+val.Class11+'</td><td>'+val.Class12+'</td></tr>';

                // console.log(res.panel4.elig_1);
                
              j++;
              }


            });
            var panel4 = res.panel4;
            var panel3 = res.panel3;
            console.log(panel4);
            var elig = null;
            var sanc = null;
            var avail = null;
            var need = null;
            var swp = null;
            var swop = null;
            var vac = null;
            sub_count.map(function(val,i)
            {
                i = i+1;
                // var elig = 'elig_+i
                if(val.visible==1){
                if(panel4 !=null){
                elig = panel4['elig_'+i];
                sanc = panel4['sanc_'+i];
                avail = panel4['avail_'+i];
                need = panel4['need_'+i];
                swp = panel4['swp_'+i];
                swop = panel4['swop_'+i];
                vac = panel4['vac_'+i];
                }
                elig_text += generate_lang_text_box(val.subject,'None');
                elig_text += generate_lang_text_box('Vacancy','text','vac_'+i,1,false,(vac !=null?vac:0),'vac_high_grp');
                elig_text += generate_lang_text_box('Eligible','text','elig_'+i,2,false,(elig !=null?elig:0),'elig_high_grp');
                elig_text += generate_lang_text_box('Sanctioned','text','sanc_'+i,3,false,(sanc !=null?sanc:0),'sanc_high_grp');
                elig_text += generate_lang_text_box('Available','text','avail_'+i,4,false,(avail !=null?avail:0),'avil_high_grp');
                elig_text += generate_lang_text_box('Need','text','need_'+i,5,false,(need !=null?need:0),'need_high_grp');
                elig_text += generate_lang_text_box('Surplus W/P','text','swp_'+i,6,false,(swp !=null?swp:0),'surp_high_grp');
                elig_text += generate_lang_text_box('Surplus WO/P','text','swop_'+i,7,false,(swop !=null?swop:0),'surp_wo_high_grp');
                
              }
                
            })
            elig_text += generate_lang_text_box('Total','None');
            var sanc_high_tot = null;
            var avail_high_tot = null;
            var need_high_tot = null;
            var swp_high_tot = null;
            var swop_high_tot = null;
            var elig_high_tot = null; 
            var vac_high_tot = null;
            if(panel4 !=null)
            {
             sanc_high_tot = panel4.sanc_high_tot
             avail_high_tot  = panel4.avail_high_tot
             need_high_tot = panel4.need_high_tot
             swp_high_tot = panel4.swp_high_tot
             swop_high_tot = panel4.swop_high_tot
             elig_high_tot = panel4.elig_high_tot
             vac_high_tot = panel4.vac_high_tot;
             elig_text +=generate_lang_text_box('','hidden','id','','',panel4.id);
             
             if(panel4.status==2)
             {
                $("#higher_save_grp").hide();
             }
            }
            elig_text += generate_lang_text_box('vacancy','text','vac_high_tot','',true,(vac_high_tot!=null?vac_high_tot:0));
                elig_text += generate_lang_text_box('Eligible','text','elig_high_tot','',true,(elig_high_tot!=null?elig_high_tot:0));
                elig_text += generate_lang_text_box('Sanctioned','text','sanc_high_tot','',true,(sanc_high_tot!=null?sanc_high_tot:0));
                elig_text += generate_lang_text_box('Available','text','avail_high_tot','',true,(avail_high_tot!=null?avail_high_tot:0));
                elig_text += generate_lang_text_box('Need','text','need_high_tot','',true,(need_high_tot!=null?need_high_tot:0));
                elig_text += generate_lang_text_box('Surplus W/P','text','swp_high_tot','',true,(swp_high_tot!=null?swp_high_tot:0));
                elig_text += generate_lang_text_box('Surplus WO/P','text','swop_high_tot','',true,(swop_high_tot!=null?swop_high_tot:0));

            // console.log(class_6);
            $("#sample_4 tbody").html(student_table);
            $("#elig_high_group").html(elig_text);
            // var table = _dataTable("#sample_3");
        }
    })
}

function generate_lang_text_box(label,type,id,field_no,read,value,class_name)
  {
      var text_val  = ''
      // console.log(read);
      if(type=='hidden')
          {
            text_val = '<input type='+type+' class="form-control" id="'+id+'" name="'+id+'" placeholder="" value='+value+'>'
          }
        else if(read==false){
      // text_val += '';

            // console.log(total_id);
      text_val = '<div class="col-md-2" style="width:9.666667%"><label class="control-label">'+label+'</label><div class="form-group"><input type="text" class="form-control '+class_name+'" id="'+id+'" name="'+id+'" placeholder="" onkeydown="return number_format()" maxlength="3" onchange="dynamic_high_grand_sum(this.value,'+field_no+');" value='+value+'></div></div>';
          
        // text_val +='</div>'; 
      }else if(type=='None')
      {
        text_val = '<div class="col-md-3" style="width:30.666667%"><label class="control-label" style="margin-top:35px;">'+label+'</label></div>'
      }
      else
      {
        text_val = '<div class="col-md-2" style="width:9.666667%"><label class="control-label">'+label+'</label><div class="form-group"><input type='+type+' class="form-control" id="'+id+'" name="'+id+'" placeholder="" readonly value='+value+'></div></div>';                  
      }
      return text_val;
  }

  // var grand_high_sum = 
  function dynamic_high_grand_sum(val,flag)
{
  // alert();
    grand_sum = 0;
    console.log(val,flag);
      switch(parseInt(flag))
      {

        
        case 1:
          $('.vac_high_grp').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
          // console.log(grand_sum);
            text_val('vac_high_tot',grand_sum);
        break;
        case 2:
          $('.elig_high_grp').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
          // console.log(grand_sum);
            text_val('elig_high_tot',grand_sum);
        break;
        case 3:
          $('.sanc_high_grp').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
          // console.log(grand_sum);
         text_val('sanc_high_tot',grand_sum);

        break;
        case 4:
          $('.avil_high_grp').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val('avail_high_tot',grand_sum);

        break;
        case 5:
          $('.need_high_grp').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val('need_high_tot',grand_sum);

        break;
        case 6:
          $('.surp_high_grp').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val('swp_high_tot',grand_sum);

        break;
        case 7:
          $('.surp_wo_high_grp').map(function()
          {
              if($(this).val() !=''){
              grand_sum += parseInt($(this).val());
              }
          })  
         text_val('swop_high_tot',grand_sum);

        break;
        
      }
    // total_grand_sum += get_text_value(id+flag);

    // console.log(total_grand_sum);

}

$("#high_save").click(function()
{
console.log(school_high_id);
    swal({
                title: "Are you sure?",
                text: "Staff Details Cannot be Edited after Final Sumbit.Are You Sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Yes, Final Submit!",
                cancelButtonText:'Save',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(isConfirm){
                if (isConfirm)
                {
       var data = {'records':$("#high_class").serialize(),'panel3':stu_high_count,'status':2,'school_id':school_high_id,'panel3_with_data':panel3};

      $.ajax({
        method:"POST",
        url:"<?=base_url().'Ceo_District/save_staff_higher_details'?>",
        data:data,
        dataType:'JSON',
        success:function(res)
        {
          // console.log(res);
          if(res)
          {
            swal({
                title: "Successfully Added Staff Details!",
                type: "success",
                showCancelButton: false,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "ok!",


            }, function(isConfirm){
                if (isConfirm)
                {
                  window.location.reload();
                }
              })
          }
        }
      })

      }else
      {
        // alert();
          var data = {'records':$("#high_class").serialize(),'panel3':stu_high_count,'status':1,'school_id':school_high_id,'panel3_with_data':panel3};

      $.ajax({
        method:"POST",
        url:"<?=base_url().'Ceo_District/save_staff_higher_details'?>",
        data:data,
        dataType:'JSON',
        success:function(res)
        {
          // console.log(res);
          if(parseInt(res))
          {
            swal({
                title: "Successfully Added Staff Details!",
                type: "success",
                showCancelButton: false,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "ok!",


            }, function(isConfirm){
                if (isConfirm)
                {
                  window.location.reload();
                }
              })
          }
        }
      })
      }
    })
})

</script>

    </body>

</html>