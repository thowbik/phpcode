<!DOCTYPE html>
<html>
<!-- BEGIN HEAD -->
<head>
    <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
    <?php $this->load->view('head.php'); ?>      
</head>
         <!-- END HEAD -->

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
               <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
               <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
               <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 9) { ?>
               <?php $this->load->view('Ceo_District/header.php'); }else if($this->session->userdata('emis_user_type_id') == 6) { ?>
               <?php $this->load->view('beo_Block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 10) { ?>
               <?php $this->load->view('Deo_District/header.php'); }else{ ?>
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
                                                                    <i class="fa fa-globe"></i><?php echo $title; ?></span>
                                                                </div>
                                                                <div class="tools"> </div>
                                                                
                                                            </div>
                                                            <div class="portlet-body">
                                                                <form id="udisesubmit" name="udisesubmit" method="post" action="<?php echo base_url().'Newschool/saveUdise'; ?>">
                                                                       <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>SNo</th>
                                                                                    <th>Udise</th>
                                                                                    <th>School Name</th>
                                                                                    <th>Directorate</th>
                                                                                    <th>Order Copy</th>
                                                                                   
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            <tbody>
                                                                       
                                                                            <?php $i=1;foreach($list as $li){ ?>
                                                                                <tr>
                                                                                    <td><?php echo $i++; ?></td>
                                                                                    <td>
                                                                                        <?php echo $li['udise_code']; ?>
                                                                                    </td>
                                                                                    <td><?php echo $li['school_name']; ?></td>
                                                                                    <td><?php echo $li['department']; ?></td>
                                                                                    <td><?php if($li['exp']){?><span class="badge" style="cursor: pointer;" onclick="popuppdf('<?php echo(base_url().'Basic/pdf/'.$li['school_key_id'].'/98/'.$this->uri->segment(3,0));?>',1)">ORDER COPY</span><?php }else{ echo "EXPIRED";}?></td>
                                                                                </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                       </table>
                                                                       <?php echo($this->session->flashdata('udise_code')); ?>
                                                                       <?php if($check==4){ ?>
                                                                       <div class="text-center">
                                                                            <button id="saveudise" name="saveudise" class="btn btn-success">UDISE UPDATE</button>
                                                                       </div>
                                                                       <?php } ?>
                                                                 </form>
                                                            </div>
                                                            <div id="myModal" class="modal">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body bg-primary" id="modalbody" style="width:100%;">
                                                                            <span style="font-size: 28px;font-weight: bold;cursor: pointer; float:right;" onclick="popuppdf('',0);">&times;</span>
                                                                            <div>
                                                                                <object id="viewpdf" style="width:100%;min-height:525px;" ></object>
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
                        </div>
                    </div>
                    </div>
                    </div>
                                                    
                     <?php $this->load->view('footer.php'); ?>
                     <?php $this->load->view('scripts.php'); ?>

 <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>

</body>
<script>
    function saveUdise(udiseid){
        var udisecode = udiseid.value;
        alert(udisecode);
        $.ajax({
           type:"POST",
           url:baseurl+'Newschool/saveUdise',
           data:"&js="+js,
           success: function(resp){
                swal("OK","Udisecode Save successfully","sucess")
           } 
        });
    }
    function popuppdf(url,disp) {
            if(disp==1){
                document.getElementById('viewpdf').setAttribute('data',url);
                document.getElementById('myModal').style.display='block';
            }
            else{
               document.getElementById('viewpdf').removeAttribute('data');
               document.getElementById('myModal').style.display='none'; 
            }
    }
    function closefile(ids){
            document.getElementById(ids).style.display='none';
    }
</script> 


</html>
