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
            

  <?php $this->load->view('state/header.php'); ?>

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
                                        <h1>Dashbaord
                                            <small>School Dashboard</small>
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
                                   <?php $this->load->view('state/emis_state_profile_header.php'); ?>
                                        </center>

                                             <!-- BEGIN BLOCK BUTTONS PORTLET-->
                                                                    <div class="portlet light">
                                                                        <div class="portlet-title">
                                                                            <div class="caption">
                                                                                <i class="icon-settings font-green-sharp"></i>
                                                                                <span class="caption-subject font-green-sharp bold uppercase">Customized Multi level analysis</span>
                                                                            </div>
                                                                            <div class="actions">
                                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                    <i class="icon-cloud-upload"></i>
                                                                                </a>
                                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                    <i class="icon-wrench"></i>
                                                                                </a>
                                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                    <i class="icon-trash"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="portlet-body col-md-12">
                                                                        <div class="thumbnail col-md-6">
                                                                        <div class="card-title">
                                                                                <span class=""> Directrate wise Selection </span>
                                                                        </div><br/>
                                                                        <center>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-star fa-spin"></i>
                                                                                <div> DMS</div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-star fa-spin"></i>
                                                                                <div> DSC </div>
                                                                                <span class=""> <input type="checkbox" name=""> </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-star fa-spin"></i>
                                                                                <div> DEE </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            </center>
                                                                        </div>
                                                                        <div class="thumbnail col-md-6">
                                                                        <div class="card-title">
                                                                                <span class=""> Gender wise Selection </span>
                                                                        </div><br/>
                                                                        <center>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-mars"></i>
                                                                                <div> Male</div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-venus"></i>
                                                                                <div> Female </div>
                                                                                <span class=""> <input type="checkbox" name=""> </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-transgender"></i>
                                                                                <div> Transgender </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            </center>
                                                                        </div>
                                                                        </div>

                                                                        <div class="portlet-body">
                                                                        <div class="card-title">
                                                                                <span class=""> Class wise Selection </span>
                                                                        </div><br/>
                                                                        <center>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 1 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 2 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 3 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 4 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 5 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 6 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 7 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 8 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                 <div> Class 9 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 10 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 11 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-group"></i>
                                                                                <div> Class 12 </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            </center>
                                                                        </div>

                                                                        <div class="portlet-body">
                                                                        <div class="card-title">
                                                                                <span class=""> Social Category wise Selection </span>
                                                                        </div><br/>
                                                                        <center>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div>BC-Others</div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> BC-Muslim </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> MBC </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> ST </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> SC-Others </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> SC-Arunthathiyar </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> OC </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            <a href="javascript:;" class="icon-btn">
                                                                                <i class="fa fa-street-view"></i>
                                                                                <div> DNC </div>
                                                                                <span class=""> <input type="checkbox" name="">  </span>
                                                                            </a>
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                                    <!-- BEGIN BLOCK BUTTONS PORTLET-->
           
                                        <!-- BEGIN CARDS -->
                                        <div class="row margin-bottom-20">
                                              <a href="<?php echo base_url().'State/emis_state_analytics';?>" target="blank" class="">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="portlet light">
                                                    <div class="card-icon">
                                                        <i class="icon-user-follow font-red-sunglo" ></i>
                                                    </div>
                                                    <div class="card-title">
                                                        <span> Student Analytics </span>
                                                    </div>
                                                  <!--   <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                            <a href="<?php echo base_url().'State/emis_student_classwise';?>" target="blank" class="">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="portlet light">
                                                    <div class="card-icon">
                                                        <i class="icon-book-open font-green-haze"></i>
                                                    </div>
                                                    <div class="card-title">
                                                        <span> Student Class wise</span>
                                                    </div>
                                                  <!--   <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                            <a href="<?php echo base_url().'State/emis_state_gender_analytics';?>" target="blank" class="">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="portlet light">
                                                    <div class="card-icon">
                                                        <i class="icon-bar-chart  font-purple-wisteria"></i>
                                                    </div>
                                                    <div class="card-title">
                                                        <span>  Student Gender wise</span>
                                                    </div>
                                                  <!--   <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                            <a href="<?php echo base_url().'State/emis_state_community_analytics';?>" target="blank" class="">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="portlet light">
                                                    <div class="card-icon">
                                                        <i class="icon-envelope font-gray"></i>
                                                    </div>
                                                    <div class="card-title">
                                                        <span>  Student Community wise </span>
                                                    </div>
                                                  <!--   <div class="card-desc">
                                                        <span> The best way to find yourself is
                                                            <br> to lose yourself in the service of others </span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            </a>
                                        </div>
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

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>


    </body>

</html>