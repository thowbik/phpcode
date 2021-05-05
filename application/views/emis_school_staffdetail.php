<!DOCTYPE html>

      <html lang="en">
         <!-- BEGIN HEAD -->
         <head>
            <?php $this->load->view('head.php'); ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-table/bootstrap-table.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
            
            
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
                                    <h1>Staff Information
                                       <small>Staff profile edit and update</small>
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
                              <div class="container">
                                 <div class="col-md-12">
                                    <div class="row">
                                          <div class="col-md-2">
                                            <div class="circular--portrait">
                                                           
                                                                 <img  src="http://159.89.13.200/asset/images/avat.jpg";  alt="" /> 
                                                                    </div>
                                                                  </div>
                                       <div class="col-md-9" style="margin-left: -6%">
                                          <div class="pull-left">
                                             <span class="testimonials-name">
                                                <h3 style="margin-top:0px;"> <a style="text-decoration: none; color:red;"> Sample - 6602501897623</a></h3>
                                               <ul class="list-inline">
                                               <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-calendar"></i></font>  DOB :  1989-01-01 </li>
                                                <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-male"></i></font> Gender : Male </li>
                                            <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-credit-card"></i></font>  Aadhaar number :  XXXX-XXXX-6224 </li>
                                            </ul>
                                            <ul class="list-inline">
                                            <li>
                                            <font style="color:#2AABB5;"><i class="fa fa-rebel"></i> </font> Religion - Community - Subcaste : Hindu - OC - General </li>
                                            </ul>
                                            
                                             </span>
                                             <br/>
                                            
                                          </div>
                                          
                                       </div>
                                       <div class="col-md-1" style="margin-left: 6%;">
                                                <a href="" class="pull-right"  > <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> 
                                           
                                            <input type="hidden" id="emis_stu_transfer0_id" name="emis_stu_transfer0_id" value="66025018976231720031">
                                            
                                                
                                          </div>
                                    </div>
                                   
                                    
                                    <div class="row">
                                       <div class="carousel-info container">
                                     <div class="col-md-12 thumbnail">
                                           <a href="" class="pull-right" style="margin-top: 2%; margin-right: 25px;">
                                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> 
                                              <center>
                                                   <h3 class="testimonials-name-in">Staff info</h3>
                                                </center>
                                      <span class="col-md-6">
                                                <table class="table table-striped">
                                                   <tbody>
                                                      <tr>
                                                         <td><b>Teacher id</b></td>
                                                         <td>6602501897623</td>
                                                      </tr>
                                                      
                                                      <tr>
                                                         <td><b>Name</b></td>
                                                         <td>Sample</td>
                                                      </tr>
                                                    
                                                      <tr>
                                                         <td><b>Aadhar Number</b></td>
                                                         <td>XXXX-XXXX-6224</td>
                                                      </tr>
                                                     
                                                      <tr>
                                                         <td><b>Gender</b></td>
                                                         <td>Male</td>
                                                      </tr>
                                                       
                                                      <tr>
                                                         <td><b>Date of Birth</b></td>
                                                         <td>1989-01-01</td>
                                                      </tr>           
                                                      
                                                      <tr>
                                                      	<td><b>Classes Taught</b></td>
                                                      	<td>Primary only</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>No.of working days spent on non-teaching assignments</b></td>
                                                      	<td>100</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>English/Language(as per schedule VIII studied up to)</b></td>
                                                      	<td>Ph.D.</td>
                                                      </tr>
                                                      
                                                      <tr>
                                                      	<td><b>Appointed for Subject</b></td>
                                                      	<td></td>
                                                      </tr>

                                                      <tr>
                                                      	<td><b>Working in present school since(Year)</b></td>
                                                      	<td>Vidhya Vikas(2007)</td>
                                                      </tr>
                                                      <tr>
                                                      	<td style="color: red;" colspan="2"><b>Total days of inservice training received in last academic year</b></td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Others</b></td>
                                                      	<td>15</td>
                                                      </tr>
                                                      <tr>
                                                      	<td style="color: orange;" colspan="2">Only for teachers teaching in elementary</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>BRC</b></td>
                                                      	<td>3</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>CRC</b></td>
                                                      	<td>2</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>DIET</b></td>
                                                      	<td>7</td>
                                                      </tr>
                                                      <tr>
                                                      	<td style="color: red;" colspan="2"><b>Main Subjects taught</b></td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Subject 1</b></td>
                                                      	<td>Mathematics</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Subject 2</b></td>
                                                      	<td>Computer Science</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Trained for teaching CWSN</b></td>
                                                      	<td>Yes</td>
                                                      </tr>
                                                    </tbody>
                                                </table>
                                             </span>

                                             <span class="col-md-6">
                                                <table class="table table-striped">
                                                   <tbody>
                                                      <tr>
                                                         <td><b>Social Category</b></td>
                                                         <td>General</td>
                                                      </tr>
                                                        <tr>
                                                         <td><b>Type of Teacher</b></td>
                                                         <td>Head Teacher</td>
                                                      </tr>
                                                       <tr>
                                                         <td><b>Nature of Appointment</b></td>
                                                         <td>Regular</td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>Date of joining in service</b></td>
                                                         <td>2017-01-02</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Maths/Science Studied up to</b></td>
                                                      	<td>M.Phil</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Social studies studied up to</b></td>
                                                      	<td>Post Graduate</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Training Need</b></td>
                                                      	<td>Pedagogical Issues</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Type of Disability if any</b></td>
                                                      	<td>Loco motor</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Trained in use of computer and teaching through computer</b></td>
                                                      	<td>Yes</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Mobile Number</b></td>
                                                      	<td>9876543210</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>E-Mail I'd</b></td>
                                                      	<td>sample@gmail.com</td>
                                                      </tr>
                                                      <tr>
                                                      	<td colspan="2" style="color: red;"><b>Highest qualification</b></td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Academic</b></td>
                                                      	<td>Secondary</td>
                                                      </tr>
                                                      <tr>
                                                      	<td><b>Professional</b></td>
                                                      	<td>Diploma or certificate in basic teacher's training of a duration not less than two years</td>
                                                      </tr>
                                                                                                                                                                 
                                                   </tbody>
                                                </table>
                                             </span>
										</div>
	       							</div>
    						    </div>                           
                              </div>
                            </div>
                          </div>
                          <!-- END PAGE CONTENT BODY -->
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
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas -->
            <script src="<?php echo base_url().'asset/global/plugins/emis2.js';?>" type="text/javascript"></script>
            <!-- Js for hide and show the tables and datas ending-->
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <!-- END PAGE LEVEL SCRIPTS -->
            <script>
               var yesno = [];
               $.each({
                   "1": "Yes",
                   "2": "No"        
               }, function(k, v) {
                   yesno.push({
                       id: k,
                       text: v
                   });
               });
               
   	           
               
                   
               
               
            </script>

         </body>


      </html>