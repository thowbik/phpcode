<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

<?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else{ ?>
<?php $this->load->view('header.php'); }?>


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
                                        <h1>Approoved Candidate list
                                            
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
                                     <center>   
                                    <?php $this->load->view('emis_school_profile_header.php'); ?>
                                        </center>
           
                                        <!-- BEGIN CARDS -->
                                       <?php   $emis_username=$this->session->userdata('emis_username');  ?>
                                         <span style="font-size: 22px;">Student List Section wise data </span>
                                                                         
 
                                          <span style="font-size: 22px;" class="pull-right">Level 3 - Section student data</span>
                                                 <hr>
                                                   <?php $section_id=$this->uri->segment(4,0); ?>      
                                                  <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Student Data - Class  <?php if($class!=""){ echo $class; } ?> - Section <?php echo $section_id; ?> </span>
                                                </div>
                                                 <div class="pull-right">
                                                  <?php if(!empty($idcarddetails)){ ?> 
                                              <button type="button" class="btn green pull-right" onclick="generateoverallidcard()">Print All Idcards</button><?php }else{ ?>
                                              <button type="button" class="btn green pull-right" onclick="generateoverallidcard()" disabled>Print All Idcards</button>
                                              <?php } ?>
                                            </div>
                                            </div>
                                           
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Student Data List </div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    <?php if(!empty($idcarddetails)){  ?>
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th> sno </th>                        
                                                                    <th> Unique id</th>
                                                                    <th> Name </th>
                                                                    
                                                                    <th> DOB </th>
                                                                    <th> Class</th>
                                                                    <th> Section </th>
                                                                    <th> Blood group </th>
                                                                    <th> Action </th>
                                                                </tr>
                                                                </thead>
                                                                <?php $i=1; foreach($idcarddetails as $id){ ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                   <!--  <td><a onclick="savestudentid1('<?php echo $all->unique_id_no; ?>')"><?php echo $all->unique_id_no; ?></a></td> -->
                                                                    <td><a href="<?php echo base_url().'Home/emis_student_profile/'.$id->unique_id_no;?>" target="_blank"><?php echo $id->unique_id_no; ?></a></td>
                                                                    <td><?php echo $id->name; ?></td>
                                                                    
                                                                    <td><?php echo $id->dob; ?></td>
                                                                    <td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_class_studying');
                                                                   $this->db->where('id', $id->class_studying_id);  
                                                                   $query =  $this->db->get();
                                                                   $classs=$query->row('class_studying'); echo $classs;  ?></td>
                                                                    <td><?php echo $id->class_section; ?></td>
                                                                     <td><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_bloodgroup');
                                                                   $this->db->where('id', $id->bloodgroup);
                                                                   $query =  $this->db->get();
                                                                   $commm=$query->row('group');
                                                                   echo $commm; ?></td>
                                                                   <td><button type="button" data-target="#long" data-toggle="modal" class="btn red" onclick="loadgenerateidcard('<?php echo $id->unique_id_no; ?>')">Print</button></td>
                                                                </tr>
                                                                <?php $i++; } ?>
                                                            <tbody>
                                                      
                                                            </tbody>
                                                        </table>
                                                         <?php } else { ?><center>Students id cards not apporved till now!. please approove and try again!</center><?php } ?>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        


                                               <br>





                                        <!-- END CARDS -->

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

             <?php if(!empty($idcarddetails)){ 

                                      $namearray = array();
                                      $idarray = array();
                                      $photoarray = array();
                                      $classarray = array();
                                      $bloodarray =array();

                                      foreach($idcarddetails as $idcard){ 
                                      array_push($namearray,$idcard->name);
                                      array_push($idarray,$idcard->unique_id_no);

                                      $this->db->select('*'); 
                                     $this->db->from('students_child_idcard ');
                                     $this->db->where('unique_id_no', $idcard->unique_id_no);  
                                     $query =  $this->db->get();
                                     $photo=$query->row('photo');


                                      array_push($photoarray,base64_encode($photo));

                                     $this->db->select('*'); 
                                     $this->db->from('baseapp_class_studying');
                                     $this->db->where('id', $idcard->class_studying_id);  
                                     $query =  $this->db->get();
                                     $classs=$query->row('class_studying');
                                     $classsec = $classs.' - '.$idcard->class_section;
                                      array_push($classarray,$classsec);

                                     $this->db->select('*'); 
                                     $this->db->from('baseapp_bloodgroup');
                                     $this->db->where('id', $idcard->bloodgroup);
                                     $query =  $this->db->get();
                                     $commm=$query->row('group');
                                     $blodgrp="Blood Group - ".$commm;
                                    
                                      array_push($bloodarray,$blodgrp);
                                      }

                                    }

                                      ?>

                  <?php $this->load->view('footer.php'); ?>

                  

                   <div id="long" class="modal fade bs-modal" tabindex="-1" data-replace="true" >
                                            <div class="modal-dialog">
                                                <div class="modal-content" id="pdfload">
                                 <?php  $school_id=$this->session->userdata('emis_school_id');
                                        $student_id=  $this->session->userdata('emis_idcard_generate_stuid');

                                 $studsdetails = $this->Homemodel->getidcardstudentlist1($student_id,$school_id); ?>

                                                    <!-- <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">A Fairly Long Modal</h4>
                                                    </div> -->
                                                    <div class="modal-body">

                                                        <?php if(!empty($studsdetails)){ ?> 
                                                       <div class="col-md-12" >
                                                        <?php foreach($studsdetails as $stu){ ?>
                                                         <div class="col-md-12 thumbnail" >

                                                          <?php  $this->db->select('*'); 
                                                           $this->db->from('students_child_idcard ');
                                                           $this->db->where('unique_id_no', $stu->unique_id_no);  
                                                           $query =  $this->db->get();
                                                           $photo=$query->row('photo'); ?>
 
                                                        <center>
                                                            <h1> <?php echo $stu->unique_id_no; ?></h1>
                                                        <img width="38%" class="thumbnail" src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $photo ); ?>";  alt="" />
                                                       </center>
                                                       <div class="col-md-12">
                                                         <center>
                                                       <h1><?php echo $stu->name; ?></h1>
                                                      <p class="title"><h2><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_class_studying');
                                                                   $this->db->where('id', $stu->class_studying_id);  
                                                                   $query =  $this->db->get();
                                                                   $classs=$query->row('class_studying');
                                                                   $classsec = $classs.' - '.$stu->class_section; echo $classsec; ?></h2></p>
                                                                  
                                                      <p><?php $this->db->select('*'); 
                                                                   $this->db->from('baseapp_bloodgroup');
                                                                   $this->db->where('id', $stu->bloodgroup);
                                                                   $query =  $this->db->get();
                                                                   $commm=$query->row('group');
                                                                   $blodgrp="Blood Group - ".$commm;
                                                                   echo $blodgrp; ?></p>
                                                         </center>
                                                        </div>
                                                    </div>
                                                        <center>
                                                        <a class="btn green btn-md dropdown-toggle" href="<?php echo base_url().'Home/emis_school_stulist_idcard_edit/'.$stu->unique_id_no;?>">Edit </a>
                                                        <button type="button" id="create_pdf"  class="btn green" onclick="createpdf22('<?php echo $stu->unique_id_no; ?>','<?php echo base64_encode( $photo ); ?>','<?php echo $stu->name; ?>','<?php echo $classsec; ?>','<?php echo $blodgrp; ?>')" >Print</button>
                                                         <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                        
                                                          
                                                          
                                                    </center>
                                                        <?php } ?>
                                                       </div>
                                                       <?php } ?>
                                                 

                                                         </div>
                                                    <div class="modal-footer">
                                                         
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        </div>

        <?php $this->load->view('scripts.php'); ?>


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


         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
         <script type="text/javascript" src="//cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js">
    </script>
    <script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"> </script>
              <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>

              <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

              <script type="text/javascript">

                 (function(API){
    API.myText = function(txt, options, x, y) {
        options = options ||{};
        /* Use the options align property to specify desired text alignment
         * Param x will be ignored if desired text alignment is 'center'.
         * Usage of options can easily extend the function to apply different text 
         * styles and sizes 
        */
        if( options.align == "center" ){
            // Get current font size
            var fontSize = this.internal.getFontSize();

            // Get page width
            var pageWidth = this.internal.pageSize.width;

            // Get the actual text's width
            /* You multiply the unit width of your string by your font size and divide
             * by the internal scale factor. The division is necessary
             * for the case where you use units other than 'pt' in the constructor
             * of jsPDF.
            */
            txtWidth = this.getStringUnitWidth(txt)*fontSize/this.internal.scaleFactor;

            // Calculate text's x coordinate
            x = ( pageWidth - txtWidth ) / 2;
        }

        // Draw text at x,y
        this.text(txt,x,y);
    }
})(jsPDF.API);

      function createpdf22(value,value1,value2,value3,value4){

                var imgData = 'data:image/jpeg;base64,'+value1;

                var doc = new jsPDF()
                doc.setFontSize(40)
                doc.text(40, 25, value)
                doc.addImage(imgData, 'JPEG', 43, 40, 128, 164);
                doc.setFontSize(38)
                doc.myText(value2,{align: "center"},0,220);
                // doc.text(50, 220, value2);
                doc.myText(value3,{align: "center"},0,240);
                // doc.text(70, 240, value3);
                doc.setFontSize(30)
                doc.myText(value4,{align: "center"},0,260);
                // doc.text(50, 260, value4);
                doc.save(value+'.pdf');

        }


      function loadgenerateidcard(value){

      $.ajax({
        type: "POST",
        url:baseurl+'Home/emis_savegenerateidcardsession',
        data:"&studid="+value,
        success: function(resp){  
        // alert(resp);   
         $("#pdfload").load(location.href + " #pdfload");

        },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

        }

      function generateoverallidcard(){

        var pdfname = "<?php echo $emis_username.' - '.$class.' - '.$section_id; ?>";

          var namearr = [<?php echo '"'.implode('","', $namearray).'"' ?>];
          var idarr = [<?php echo '"'.implode('","', $idarray).'"' ?>];
          var photoarr = [<?php echo '"'.implode('","', $photoarray).'"' ?>];
          var classarr = [<?php echo '"'.implode('","', $classarray).'"' ?>];
          var bloodarr = [<?php echo '"'.implode('","', $bloodarray).'"' ?>];

          // alert(namearr+bloodarr+idarr+classarr+bloodarr);

           var imgData="";

           var total = namearr.length;

          var doc = new jsPDF()
          for(i=0;i<total;i++){

          imgData = 'data:image/jpeg;base64,'+photoarr[i];
          doc.setFontSize(40)
          doc.text(40, 25, idarr[i])
          doc.addImage(imgData, 'JPEG', 43, 40, 128, 164);
          doc.setFontSize(38)
          doc.myText(namearr[i],{align: "center"},0,220);
          // doc.text(50, 220, value2);
          doc.myText(classarr[i],{align: "center"},0,240);
          // doc.text(70, 240, value3);
          doc.setFontSize(30)
          doc.myText(bloodarr[i],{align: "center"},0,260);
          // doc.text(50, 260, value4);
          if(i!=total-1){
          doc.addPage();  
          }

          }
          doc.save(pdfname+'.pdf');
        }


              </script>

               
    </body>

</html>