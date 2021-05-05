
<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        
   <!--      <link href="<?php echo base_url().'asset/global/plugins/languages/css/pramukhindic.css';?>" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url().'asset/global/plugins/languages/css/pramukhtypepad.css';?>" rel="stylesheet" type="text/css" /> -->

         
        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php
          $user_type_id=$this->session->userdata('emis_user_type_id');

          if($user_type_id==1){
            $this->load->view('header.php');
          } else if($user_type_id==2){
             $this->load->view('block/header.php');
          } else if($user_type_id==3){
             $this->load->view('district/header.php');
          }else if($user_type_id==5){
             $this->load->view('state/header.php');
          }
         ?>
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
                                        <h1>Student Profile
                                            <small>Photo Upload</small>
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


          <div class="col-lg-12">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: #000;">Upload Photography</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <form id="studentphoto_upload" name="studentphoto_upload">
                     <div class="col-md-6">
                            <label class="control-label">Category</label>
                            <div class="form-group">
                               
                                    <select class="form-control" data-placeholder="Choose a Category" id="std_cate" name="std_cate" required>
                                      <option value="0" >Select Category</option>
                                        <option value="1">Electricity</option>
                                        <option value="2">Plumbing & Drainage</option>
                                        <option value="3">Compound Wall</option>
                                        <option value="4">Painting</option>
                                        <option value="5">Classrooms and Labs</option>
                                        <option value="6">Furniture</option>
                                        <option value="7">Other Civil</option>
                                    </select>
                                </div>
                            
                        </div>                      
                            
                             <div class="col-md-6" style="margin-top: 24px;">
                                <!-- <label class="control-label">Choose Photo</label> -->
                                <div class="form-group">
                                    <div class="">
                                        <input type="file" class="form-control" id="pro_image" name="pro_image" maxlength="6" placeholder="" accept="image/png, image/jpeg" required style="border: none;">           

                                    </div>
                                    <div ></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                              <div class="col-md-6">
                                <label class="control-label">Remarks</label>
                                <div class="form-group">
                                    <div class="">
                                        <textarea class="form-control" id="std_remarks" name="std_remarks" maxlength="200" placeholder="Enter text here..." required></textarea>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top: 32px;text-align:right;padding-right: 208px;">
                             <!-- <button type="submit" class="btn btn-primary" id="submit">Save</button>-->
                              <input type="button" class="btn btn-primary submit" value="Save">
                          </div>
                      </div>

                      <div class="col-lg-12"> 
                    <table class="table table-bordered" id="Photo_upload">
                        <thead>
                            <th>Select</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Remarks</th>
                        </thead>
                         <tbody>
                    
        </tbody>
                    </table>
                     <button type="button" class="delete-row">Delete Row</button>
                </form>
        </div>  
                </div>
            </div>
            
        </div>
      </div>
    </div>
  </div>
</div>

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>

      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
     <script type="text/javascript">
      function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#p_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
$("#pro_image").change(function() {
  readURL(this);
});
    $(document).ready(function(){
      var newArray = [];
        $(".submit").click(function(){
            var std_cate = $("#std_cate").val();
            var pro_image = $("#pro_image").val();
            var std_remarks = $("#std_remarks").val();
               newArray.push(std_cate,pro_image,std_remarks);
         
            var pho_upload = "<tr><td><input type='checkbox' name='record'></td><td>"+std_cate+"</td><td>  <img id='p_img' src='#' />"+pro_image+"</td><td>" + std_remarks + "</td></tr>";
            
             $("table tbody").append(pho_upload);
       
        });
        
        
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
              if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
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
    
<script type="text/javascript">



</script>
    </body>

</html>