<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/support/brdcum-magesh.css';?>"></link>
</head>

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
        <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header" style="height: 80px;">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo" style="min-width:50%;font-size: 18px;">
                                    <a href="<php echo base_url(); ?>">
                                        <img src="<?php echo base_url().'asset/pages/img/emis_logo.png';?>"  style="height: 100%;margin:0px;"  alt="logo" class="logo-default">
                                    </a>
                                </div>
                                 <div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">
                                        
                                            <li><a onclick="location.href='<?php echo base_url().'';?>'">Logout</a></li>
                                            
                                            <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                              <span class="square"><font style="color:#dd4b39;">*</font> Note: Fill the Details carefully.</span>
                                            </a>
                                            </li>
                                            </ul>
                                            </div>
                                            
                                            
                                
                                
                                
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
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
                                        <!-- BEGIN CARDS -->
                                        <div class="row">
                                           
                                        
                                             <div class="portlet-body">
                                             
                                              
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                              
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i>New School Registration Form</span>
                                                        </div>
                                                        <div class="tools"> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">
                                                    <?php $this->load->view('newSchool/supportHeader'); ?>
                                                    <!-- BEGIN FORM-->
                                                        <div class="portlet-title">
                                                            <div class="caption col-md-12">
                                                                 <i class="fa fa-building font-dark"></i>
                                                                    <span class="caption-subject font-dark sbold uppercase">School Renewal Details - IV</span>
                                                            </div>
                                                               
                                                        </div>
                                                        <form class="form-horizontal" method="post" onsubmit="return check(document.getElementById('checkbox'),document.getElementById('catalert'),this);" action="<?php echo base_url().'Newschool/finalsubmit/'.$this->uri->segment(3,0);?>">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    
                                                                    <h5><b>
                                                                        <input type="checkbox" id="checkbox" name="checkbox" value="1"/>
                                                                    I here by declaration that i have read and understand the content and will adhere to it.
                                                                    </b></h5>
                                                                    <font style="color:#dd4b39;" id="catalert"></font>
                                                                    <h5 style="text-align: center;color:red;">*Note carefully once submit will not editable by this form.</h5>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-actions text-center" >
                                                                <button type="button" onclick="location.href='<?php echo base_url().'Newschool/new_school/5';?>'" class="btn btn-success">Previous</button>
												                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                            
                                                        </form>
                                                            
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
        <?php $this->load->view('scripts.php'); ?>
</body>
<script>
    function check(node,alertid,frm) {
        if(!node.checked){
            alertid.innerHTML="This check box is required";
            alert("This is not checked");
            return false;
        }else{
            swal({
                title: "Are you sure?",
                text: "You Have Validated The Form",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Save!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            },function(isConfirm){
                if(isConfirm){
                    //swal("OK","Data Saved Successfully","success");
                    frm.submit();   
                }
            
            });
        }
        return false;
    }
</script>
</html>