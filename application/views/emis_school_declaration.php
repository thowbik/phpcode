<!DOCTYPE html>

<html lang="en">

    <!-- BEGIN HEAD -->

    <head>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
        <title> தலைமை ஆசிரியர் உறுதிமொழி படிவம் </title>
        <?php $this->load->view('head.php'); ?>

    <style type="text/css">
        
        .dt-buttons {
    visibility: hidden;
}
    </style>

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('header.php'); ?>


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
                                        <h1>Head Master Declaration Form
                                            
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
                                <div class="container" style="width: 100%">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                    <div class="page-content-inner">
 
                                      <?php  
                                        $btotal =0;
                                        $gtotal =0;
                                        $ttotal =0;
                                         for($i=1;$i<=8;$i++) {  

                                       $btotal += $boystotal["boystotalc".$i];
                                       $gtotal += $girlstotalc["girlstotalc".$i];
                                       $ttotal += $tgtotalc["tgtotalc".$i];


                                        }
                                        $overalltotal = $btotal + $gtotal + $ttotal;


                                         if($getdeclarationdata)
                                            {
                                                $totalcount = 0;
                                                  foreach ($getdeclarationdata as $key) {
                                                    $totalcount += $key->total_b;
                                                    $totalcount += $key->total_g;
                                                    $totalcount += $key->total_t;

                                                  }

                                                $decdate =  substr($getdeclarationdata[1]->created_at, 0,10);
                                                

                                                $date1 =date_create($decdate);
                                                $decdatefinal = date_format($date1,"d/m/Y");
                                            }

                                         ?>
                                       

                                        
                                    <div class="portlet-body" id="notefile">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                            <center><head><h3>தலைமை ஆசிரியர் சான்று </h3></head></center>

                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                    <?php  if(!$getdeclarationdata)  {   ?>
                                                  <div class="portlet box green" >
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                           பதிவு செய்யப்பட்டுள்ள மாணவர்களின் எண்ணிக்கை  - <?php echo $overalltotal; ?> </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                              
                                                    <div class="portlet-body">
                                                    
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2" name="sample_2" >
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">Community Class </th>  
                                                                    <?php    for($j=$lowestclass;$j<=$highclass;$j++) {   ?>                      
                                                                    <th colspan="3"><?php  echo $j; ?></th>
                                                                    <?php  } ?>
                                                                    <th colspan="3">Total</th>

                                                                </tr>
                                                                <tr>
                                                                 <?php    for($j=$lowestclass;$j<=$highclass;$j++) {   ?>     
                                                                <th>B</th>
                                                                <th>G</th>
                                                                <th>TG</th>

                                                                <?php  } ?>
                                                                <th>B</th>
                                                                <th>G</th>
                                                                <th>TG</th>
                                                                

                                                                </tr>
                                                                </thead>
                                                           <!--  <?php if(!empty($communities)){ foreach($communities as $det){ ?> -->

                                                                <!-- <?php } } ?> -->
                                                            <tbody>
                                                            <?php  for($i=1;$i<=8;$i++) {   ?>
                                                                <tr>

                                                            <td><?php echo $community[$i-1]->community_name  ?></td>

                                                         <?php    for($j=$lowestclass;$j<=$highclass;$j++) {   ?>
                                                            
                                                            <td><?php print_r($boysdata['bcl'.$j.'com'.$i]);  ?></td>
                                                            <td><?php print_r($girlsdata['gcl'.$j.'com'.$i]);  ?></td>
                                                            <td><?php print_r($transdata['tgl'.$j.'com'.$i]);  ?></td>
                                                            
                                                          <?php }  ?>
                                                            
                                                            <td><?php print_r($boystotal["boystotalc".$i]);  ?></td>
                                                            <td><?php print_r($girlstotalc["girlstotalc".$i]);  ?></td>
                                                            <td><?php print_r($tgtotalc["tgtotalc".$i]);  ?></td>
                                                            </tr>
                                                            
                                                           <?php }  ?>
                                                           <tr>
                                                                <td>Total</td>
                                                                <?php 
                                                             
                                                                         
                                                                   for($j=$lowestclass;$j<=$highclass;$j++) { ?>
                                                            <td><?php print_r($boystotal1["boystotalc1".$j]);  ?></td>
                                                            <td><?php print_r($girlstotal1["girlstotalc1".$j]);  ?></td>
                                                            <td><?php print_r($tgtotal1["tgtotalc1".$j]);  ?></td>
                                                              <?php  }
                                                               
                                                               ?>
                                                               <td><?php echo $btotal; ?></td>
                                                               <td><?php echo $gtotal; ?></td>
                                                               <td><?php echo $ttotal; ?></td>

                                                            </tr>

                                                            </tbody>

                                                        </table>



                                                                
                                                    </div>
                                                  
                                                </div>
                                                  <?php  }   ?>
                                                  

                                                <!-- END EXAMPLE TABLE PORTLET-->    
                                                

                                                <div class="m-heading-1 border-green m-bordered">
                                          <?php  if(!$getdeclarationdata)  {   ?> <h3>தலைமை ஆசிரியர் சான்று</h3>  <?php } ?>
                                            <p>EMIS இணைய தளத்தில், <?php  if($schoolname) { echo '<font style="color:red;"><b>'.$schoolname.'</b></font>'; echo ' பள்ளியில்'; } ?> பதிவு செய்யப்பட்டுள்ள அனைத்து மாணவர்களின்  விவரங்கள் பள்ளி வருகைப் பதிவேடுகள், சேர்க்கைப் பதிவேடுகள் மற்றும் பிற பதிவேடுகளுடன் ஒப்பிட்டு என்னால் சரிபார்க்கப்பட்டன எனவும் <?php if($getdeclarationdata)  { echo $decdatefinal; } else { echo $date; } ?>-ன் படி எங்கள் பள்ளியில் பயிலும் 1 முதல் 12-ம் வகுப்பு வரையுள்ள மாணவர்களின் எண்ணிக்கை ­<?php if($getdeclarationdata)  { echo '<font style="color:red;"><b>'.$totalcount.'</b></font>'; } else { echo '<font style="color:red;"><b>'.$overalltotal.'</b></font>'; }; ?> ஆகும்.  மேலும், மாணவர்களின் வகுப்பு, இனம் மற்றும் பிற விவரங்கள் அனைத்தும் சரியாக உள்ளன என இதன் மூலம் சான்றளிக்கிறேன். 
                                              <?php  if($getdeclarationdata)  {   ?>  <br/><br/> <br/><br/> <br/><br/> <span>தலைமை  ஆசிரியரின் கையொப்பம்</span>  <?php  } ?>
                                            </p>

                                        </div>


                                            

                                                    </div>
                                                </div>
                                            </div>
                                            <?php  if($this->session->userdata('emis_user_type_id') == 1) {
                                                if(!$getdeclarationdata)  {
                                             ?>
                                           <center>
                                                <div style="width: 70%;" >
                                                   <a type="submit" class="btn btn-success btn-lg" href="<?php echo base_url().'Home/declarationsubmit';?>">Accept & Submit </a>
                                                </div>
                                            </center>
                                            <?php } 

                                            else {
                                            echo "<center><h2><b>Declaration Completed Sccessfully.. Thank you..</b></h2></center>";
                                            }
                                        }  ?>

                                        <?php  if($getdeclarationdata)  {   ?> 
                                        <center> <button class='btn btn-lg red-haze hidden-print uppercase print-btn' onclick="printDiv('notefile')">Print</button></center>
                                        <?php }  ?>

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
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>
         <script type="text/javascript">
               function savedistrictcomunity(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'State/savedistrictcommunity',
                data:"&dist_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'State/emis_state_community_blocks'; 
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
               function savecommuntiyonly(value){
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'State/savecommunityonly',
                data:"&comm="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'State/emis_state_community_analytics'; 
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

 <script type="text/javascript" src="//cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js">
    </script>
 <script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js">
    </script>

 <script src="https://kendo.cdn.telerik.com/2017.2.621/js/jszip.min.js"></script>
 <script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>

              <script type="text/javascript">
 
     function Exportnote(){ 
kendo.drawing
    .drawDOM("#notefile", 
    { 
        paperSize: "A4",
        margin: { top: "1cm",left: "1cm", right: "1cm"},
        scale: 0.5,
        height: 1000
    })
        .then(function(group){
        kendo.drawing.pdf.saveAs(group, "tnschools.pdf")
    });
        kendo.pdf.defineFont({
            "DejaVu Sans": baseurl+"asset/fonts/Nirmala.ttf",
            "DejaVu Sans|Bold": baseurl+ "asset/fonts/tau1_bar.ttf",
            "DejaVu Sans|Bold|Italic":  baseurl+"asset/fonts/NirmalaS.ttf",
            "DejaVu Sans|Bold":  baseurl+"asset/fonts/NirmalaB.ttf",
            
        });
}
</script>

<script>
function printDiv(divName) {

 var curURL = window.location.href;
 history.replaceState(history.state, '', '/');
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    history.replaceState(history.state, '', curURL);
}
</script>


        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
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


    </body>

</html>