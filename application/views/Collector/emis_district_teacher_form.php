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
                  <h3 class="text-center"><u><b>நிர்வாக மாறுதல் படிவம்</b></u></h3><br/>

                    <h4 class="text-center">மாவட்ட முதன்மைக் கல்வி அலுவலரின் செயல்முறைகள்
முன்னிலை
</h4>
<h5>ந.க.எண். <span class="pull-right">/       / 2018</span></h5>
<div class="col-md-12">
<div class="col-md-3 text-center"><span class="pull-right">பொருள்:-</span></div>
<div class="col-md-9"><span class="pull-left">தமிழ்நாடு பள்ளிக் கல்வி சார்நிலைப்பணி - அரசு உயர்-
            மேல்நிலைப் பள்ளிகளில் பணிபுரியும் பட்டதாரி ஆசிரியர்கள் / 
             2018-19ம் கல்வியாண்டு - பொது மாறுதல் கலந்தாய்வு 
            மாறுதல் வழங்கி ஆணையிடுதல் - சார்பு.</span>
</div></div>
<div class="col-md-12">
<div class="col-md-3 text-center"><span class="pull-right">பார்வை:-</span></div>
<div class="col-md-9"><span class="pull-left">1)அரசாணை எண்.1 (டி)403 பள்ளிக் கல்வி (பக5(1)  துறை  நாள்.29.05.2018</span></br>
<span class="pull-left">2)சென்னை-6 பள்ளிக் கல்வி இயக்குநரின் செயல்முறைகள்  ந.க.எண்.20223/அ1/இ2/18 நாள்.31.05.2018</span></br>
<span class="pull-left">3) சார்ந்த ஆசிரியரது விருப்ப விண்ணப்பம் </span></br>
</div></div>
  <div class="col-md-12" style="margin-top: 10px;text-indent: 70px" >
   
    பார்வை 1ல் காணும் அரசாணையின்படி 2017-18ம் கல்வி ஆண்டிற்கு பொது மாறுதல் வழங்குதல் சார்ந்து கீழ்க்காணும் ஆசிரியருக்கு பார்வை-3ல் காணும் அன்னாரின் விண்ணப்பத்தின்படி அவர் பெயருக்கு எதிரே குறிப்பிட்டுள்ள பள்ளிக்கு விருப்ப மாறுதல் ஆணை வழங்கப்படுகிறது.
   
    
   </div>

  
   <div class="col-md-12">

      <table id="example" class="table table-striped table-bordered newtable" style="width:100%;margin-top: 30px">
                                 <center>
                                    <thead>
                                      
                                       <tr>
                                          <td align="center">
                                             <b>ஆசிரியர் பெயர், பதவி மற்றும் தற்போது பணிபுரியும் பள்ளி</b>
                                          </td>
                                          <td align="center">
                                             <b>பாடம்</b>
                                          </td>
                                          <td align="center">
                                             <b>மாறுதல் செய்யப்படும் பள்ளியின் பெயர் மற்றும் மாவட்டம்</b>
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
                                           கலந்தாய்வில் பெற்ற முன்னுரிமை :
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
                           சம்பந்தப்பட்ட ஆசிரியரை உடன் புதிய பணியிடத்தில் பணியில் சேரும் வகையில் விடுவிக்குமாறு சம்பந்தப்பட்ட பள்ளித் தலைமை ஆசிரியர் கேட்டுக் கொள்ளப்படுகிறார்
                         </div>
                       
                         <div class="col-md-12" style="text-indent: 60px;margin-top: 15px">
                           இவ்வாணையை மாற்றம் செய்யவோ, இரத்து செய்யவோ கோரும் விண்ணப்பம் ஏற்றுக் கொள்ளப்படமாட்டாது.
                         </div>
                          <div class="col-md-12" style="text-indent: 60px;margin-top: 15px">
                           ஆசிரியரின் பணிவிடுவிப்பு மற்றும் பணியேற்பு அறிக்கையை உடனுக்குடன் இவ்வலுவலகத்திற்கு பணிந்தனுப்ப சம்பந்தப்பட்ட பள்ளித் தலைமை ஆசிரியர் கேட்டுக் கொள்ளப்படுகிறார்
                         </div>
                          <div class="col-md-12" style="text-indent: 60px;margin-top: 15px">
                           மேற்படி ஆசிரியரது மாறுதல் அவரது விருப்பத்தின்பேரில் வழங்கப்படுவதால் சார்ந்த ஆசிரியர் தினப்படி மற்றும் பயணப்படி பெறத் தகுதியற்றவராகிறார்.
                         </div>
                          <div class="col-md-12" style="text-indent: 60px;margin-top: 15px">
                           பார்வை-1ல் காண் அரசாணையின் பத்தி 8(ii)ல் தெரிவித்துள்ளவாறு இந்த கலந்தாய்வில் கலந்து கொண்டு மாறுதல் பெறும் ஆசிரியர்கள் குறைந்தது மூன்று ஆண்டுகள் அதே பள்ளியில் பணியாற்றவேண்டும்.
                         </div>
                          <div class="col-md-12" style="text-indent: 60px;margin-top: 15px">
                           ஆசிரியர் மாறுதல் கோரும் விண்ணப்பப் படிவத்தில் அளித்துள்ள விவரங்கள் தவறு என பின்னர் கண்டறியப்படின் மாறுதல் ஆணை இரத்து செய்யப்படுவதுடன் தனியர் மீது துறை ரீதியான நடவடிக்கை மேற்கொள்ளப்படும் எனவும் கண்டிப்பாகத் தெரிவிக்கப்படுகிறது.
                         </div>

                         <div class="pull-right" style="margin-top: 80px">முதன்மைக் கல்வி அலுவலர்</div>

                         <div class="pull-left" style="margin-top: 100px">
                           <span>பெறுநர்</span><br/>
                           <span>திரு/திருமதி</span><br/>
                           <span>நகல்: சம்பந்தப்பட்ட பள்ளித் தலைமை ஆசிரியர்</span><br/>
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