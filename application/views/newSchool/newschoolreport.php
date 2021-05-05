
<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
   
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
            

  <?php if($this->session->userdata('user_type')==5){ 
            $this->load->view('state/header.php');
        }elseif($this->session->userdata('user_type')==9){
            $this->load->view('Ceo_District/header.php');
        }elseif($this->session->userdata('user_type')==10){
            $this->load->view('Deo_District/header.php');
        }elseif($this->session->userdata('user_type')==6){
            $this->load->view('beo_Block/header.php');
        }elseif($this->session->userdata('user_type')==2){
            //print_r($this->session->userdata('user_type'));
            //die();
            $this->load->view('block/header.php');
        }  ?>

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
                                        <h1><?php echo $title;?>
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
                                        <!-- BEGIN CARDS -->
                                        <div class="row">
                                             <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <ul class="nav nav-tabs" style="text-align: center;">
                                                      <li class="active"><a href="<?php echo base_url().'Newschool/newschoolreport/1'; ?>">All</a></li>
                                                      <li class="active"><a href="<?php echo base_url().'Newschool/newschoolreport/2'; ?>">Directorate of Elementry Education</a></li>
                                                      <li class="active"><a  href="<?php echo base_url().'Newschool/newschoolreport/4'; ?>">Directorate of Matriculation School</a></li>
                                                  </ul>
                                                  
                                                              
                                                    
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i><?php echo $subtitle; ?></span>
                                                        </div>
                                                        <div class="tools"> </div>
                                                        
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div> 
                                                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center">S.No</th>
                                                                        <th>Name</th>
                                                                        <?php echo(($this->uri->segment(5,0)=='SCH' && $this->uri->segment(5,0)!='') ?'<th>Mangement</th><th>Category</th><th>Applied Date</th>':'');?>
                                                                        <th><?php echo(($this->uri->segment(5,0)=='SCH' && $this->uri->segment(5,0)!='')?'PENDING':'Total');?></th>
                                                                    </tr>
                                                                </thead>
                                                                <?php $group; ?>
                                                                <tbody>
                                                                    <?php $i=1; foreach($list as $li){ ?> 
                                                                    <tr>
                                                                        <td><?php echo $i; ?></td>
                                                                        <td><a href="<?php echo (base_url().'Newschool/newschoolreport/'.$this->uri->segment(3,0).'/'.$li[$group['group']].'/'.$group['next']); ?>"><?php echo $li[$group['groupname']];?></a></td>
                                                                        <?php echo(($this->uri->segment(5,0)=='SCH' && $this->uri->segment(5,0)!='')?'<td>'.$li['management'].'</td><td>'.$li['cate_type'].'</td><td>'.$li['date'].'</td>':'');?>
                                                                        <td><?php echo(($this->uri->segment(5,0)=='SCH' && $this->uri->segment(5,0)!='')?$li['pending']:$li['Total']);?></td>
                                                                        
                                                                    </tr>
                                                                    <?php } $i++;?>
                                                                    
                                                                </tbody>
                                                             </table>
                                                        </div>
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


    
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <script>
           function radio(frmid) {
             var jsArray={};
             for(var i=0;i<frmid.elements.length;i++) {
                if(frmid.elements[i].type=='radio') {
                    if(frmid.elements[i].checked) {
                        jsArray[frmid.elements[i].name]=frmid.elements[i].value;
                    }
                 }
             }
                var js =JSON.stringify(jsArray);
                
                
                  $.ajax({
                      type: "POST",
                      url:baseurl+'Deo_District/deosubmit',
                      data:"&js="+js,
                      success: function(resp){ 
                        
                        swal("OK", "Assign to BEO Successfully", "success");
                       }
                       
                       });
                       
                       
            //var x = document.querySelectorAll('input[type="radio"]');
          
           
           }
        
           
        </script>

    </body>

</html>