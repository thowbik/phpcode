<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            


  <?php if($this->session->userdata('emis_user_type_id') == 3) { $this->load->view('DC/header.php'); } else if($this->session->userdata('emis_user_type_id') == 5) { $this->load->view('state/header.php');  } ?>

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
                                            <small>District Dashboard</small>
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

                                        <div class="portlet light portlet-fit row">

                          <div class="col-md-12">
                           <div class="portlet-body" id="notefile">
                
               <div class="col-md-12 ">
                  <h3 class="text-center"><u><b>????????????????????? ????????????????????? ??????????????????</b></u></h3><br/>

                    <h4 class="text-center">?????????????????? ??????????????????????????? ??????????????? ??????????????????????????? ????????????????????????????????????
????????????????????????
</h4>
<h5>???.???.?????????. <span class="pull-right">/       / 2018</span></h5>
<div class="col-md-12">
<div class="col-md-3 text-center"><span class="pull-right">??????????????????:-</span></div>
<div class="col-md-9"><span class="pull-left">??????????????????????????? ????????????????????? ??????????????? ??????????????????????????????????????? - ???????????? ????????????-
            ?????????????????????????????? ?????????????????????????????? ????????????????????????????????? ???????????????????????? ????????????????????????????????? / 
             2018-19?????? ????????????????????????????????? - ???????????? ????????????????????? ?????????????????????????????? 
            ????????????????????? ?????????????????? ?????????????????????????????? - ??????????????????.</span>
</div></div>
<div class="col-md-12">
<div class="col-md-3 text-center"><span class="pull-right">??????????????????:-</span></div>
<div class="col-md-9"><span class="pull-left">1)?????????????????? ?????????.1 (??????)403 ????????????????????? ??????????????? (??????5(1)  ????????????  ????????????.29.05.2018</span></br>
<span class="pull-left">2)??????????????????-6 ????????????????????? ??????????????? ????????????????????????????????? ????????????????????????????????????  ???.???.?????????.20223/???1/???2/18 ????????????.31.05.2018</span></br>
<span class="pull-left">3) ????????????????????? ??????????????????????????? ????????????????????? ?????????????????????????????? </span></br>
</div></div>
  <div class="col-md-12" style="margin-top: 10px;text-indent: 70px" >
   
    ?????????????????? 1?????? ?????????????????? ??????????????????????????????????????? 2017-18?????? ??????????????? ??????????????????????????? ???????????? ????????????????????? ??????????????????????????? ???????????????????????? ???????????????????????????????????? ???????????????????????????????????? ??????????????????-3?????? ?????????????????? ??????????????????????????? ??????????????????????????????????????????????????? ???????????? ??????????????????????????? ??????????????? ????????????????????????????????????????????? ??????????????????????????? ????????????????????? ????????????????????? ????????? ?????????????????????????????????????????????.
   
    
   </div>

  
   <div class="col-md-12">

      <table id="example" class="table table-striped table-bordered newtable" style="width:100%;margin-top: 30px">
                                 <center>
                                    <thead>
                                      
                                       <tr>
                                          <td align="center">
                                             <b>???????????????????????? ???????????????, ???????????? ????????????????????? ????????????????????? ????????????????????????????????? ???????????????</b>
                                          </td>
                                          <td align="center">
                                             <b>???????????????</b>
                                          </td>
                                          <td align="center">
                                             <b>????????????????????? ???????????????????????????????????? ??????????????????????????? ??????????????? ????????????????????? ????????????????????????</b>
                                          </td>
                                         
                                       </tr>
                                    </thead>
                                    <tbody>
                       <?php if(!empty($details)){  foreach($details as $trans){ ?>             

                                       

                                       <tr style="height: 35px;">
                                          <td  style="font-size: 12px;">
<?php echo $trans->teacher_name; ?> - 
<?php $from= $this->Districtmodel->get_teacherid($trans->udise_code); ?>
<?php echo $this->Districtmodel->get_techerschoolname($from); ?>
- <?php echo $this->Districtmodel->get_teachertype($trans->teacher_type); ?> 
</td>
                                          <td>
                                          <?php echo $this->Districtmodel->get_subject_id($trans->subject1); ?> 
                                          </td>
                                          <td >
                                         <?php $toid= $this->Districtmodel->get_transferschool($trans->udise_code); ?>
                                         <?php echo $this->Districtmodel->get_techerschoolname($toid); ?>
                                          </td>
                                          
                                       </tr>
                                     <?php }}?>
                                         <tr style="height: 35px;">
                                          <td>
                                           ???????????????????????????????????? ??????????????? ?????????????????????????????? :
                                          </td>
                                           <td colspan="2">
                                         <?php echo $trans->trans_category; ?>
                                          </td>
                                         
                                          
                                       </tr>
                                  
                                    </tbody>
                                 </center>
                              </table>
                        </div>

                        <div class="col-md-12" style="text-indent: 60px;margin-top: 10px">
                           ??????????????????????????????????????? ???????????????????????? ???????????? ??????????????? ???????????????????????????????????? ????????????????????? ?????????????????? ????????????????????? ?????????????????????????????????????????? ??????????????????????????????????????? ????????????????????? ??????????????? ???????????????????????? ???????????????????????? ????????????????????????????????????????????????
                         </div>
                       
                         <div class="col-md-12" style="text-indent: 60px;margin-top: 15px">
                           ??????????????????????????? ????????????????????? ?????????????????????, ?????????????????? ????????????????????? ?????????????????? ?????????????????????????????? ????????????????????? ???????????????????????????????????????????????????.
                         </div>
                          <div class="col-md-12" style="text-indent: 60px;margin-top: 15px">
                           ?????????????????????????????? ??????????????????????????????????????? ????????????????????? ??????????????????????????? ??????????????????????????? ????????????????????????????????? ??????????????????????????????????????????????????? ????????????????????????????????? ??????????????????????????????????????? ????????????????????? ??????????????? ???????????????????????? ???????????????????????? ????????????????????????????????????????????????
                         </div>
                          <div class="col-md-12" style="text-indent: 60px;margin-top: 15px">
                           ????????????????????? ??????????????????????????? ????????????????????? ??????????????? ????????????????????????????????????????????????????????? ????????????????????????????????????????????? ????????????????????? ???????????????????????? ???????????????????????? ????????????????????? ???????????????????????? ??????????????? ??????????????????????????????????????????????????????.
                         </div>
                          <div class="col-md-12" style="text-indent: 60px;margin-top: 15px">
                           ??????????????????-1?????? ???????????? ?????????????????????????????? ??????????????? 8(ii)?????? ??????????????????????????????????????????????????? ???????????? ???????????????????????????????????? ?????????????????? ?????????????????? ????????????????????? ?????????????????? ????????????????????????????????? ??????????????????????????? ?????????????????? ???????????????????????? ????????? ??????????????????????????? ????????????????????????????????????????????????.
                         </div>
                          <div class="col-md-12" style="text-indent: 60px;margin-top: 15px">
                           ???????????????????????? ????????????????????? ?????????????????? ?????????????????????????????? ?????????????????????????????? ?????????????????????????????? ??????????????????????????? ???????????? ?????? ????????????????????? ?????????????????????????????????????????? ????????????????????? ????????? ?????????????????? ???????????????????????????????????????????????? ?????????????????? ???????????? ???????????? ????????????????????? ??????????????????????????? ???????????????????????????????????????????????? ?????????????????? ???????????????????????????????????? ?????????????????????????????????????????????????????????.
                         </div>

                         <div class="pull-right" style="margin-top: 80px">??????????????????????????? ??????????????? ?????????????????????</div>

                         <div class="pull-left" style="margin-top: 100px">
                           <span>?????????????????????</span><br/>
                           <span>????????????/?????????????????????</span><br/>
                           <span>????????????: ??????????????????????????????????????? ????????????????????? ??????????????? ????????????????????????</span><br/>
                         </div>



 </div>
            
        </div>

      <div class="col-xs-12 " style="margin-top: 80px;margin-bottom: 20px">
        <center><!-- <button class='btn btn-lg red-haze hidden-print uppercase print-btn' onclick='Exportnote()'>Download</button> -->
        <button class='btn btn-lg red-haze hidden-print uppercase print-btn' onclick="printDiv('notefile')">Print</button></center>
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
        </div>

        <?php $this->load->view('scripts.php'); ?>


 




   <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>

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

  

    </body>

</html>