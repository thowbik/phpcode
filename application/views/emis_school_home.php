<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <link href="<?php echo base_url().'asset/js/croppie-VIT/croppie.css'?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        
        </head>
    <!-- END HEAD -->
<style>

</style>

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

 <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>

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
                                <?php $this->load->view('emis_school_profile_header.php'); ?>
                                        </center>
           
                                        <!-- BEGIN CARDS -->
                                      
                                        <div class="row margin-bottom-20">
                                 <div class="main">
<h1></h1><br/>
<hr>
      <?php if($this->session->userdata('emis_user_type_id') == 1 )  {?>

      <?php 
    $keyname1 = 'School_Profile/'.$this->session->userdata('emis_school_id').'_1.jpg';
    $keyname2 = 'School_Profile/'.$this->session->userdata('emis_school_id').'_2.jpg';
    $keyname3 = 'School_Profile/'.$this->session->userdata('emis_school_id').'_3.jpg';
    $keyname4 = 'School_Profile/'.$this->session->userdata('emis_school_id').'_4.jpg';
    $keyname5 = 'School_Profile/'.$this->session->userdata('emis_school_id').'_5.jpg';
         
   // print_r($img_path);
    $image1 = Common::get_url(TEACHER_BUCKET_NAME,$keyname1,'+5 minutes');
    $image2 = Common::get_url(TEACHER_BUCKET_NAME,$keyname2,'+5 minutes');
    $image3 = Common::get_url(TEACHER_BUCKET_NAME,$keyname3,'+5 minutes');
    $image4 = Common::get_url(TEACHER_BUCKET_NAME,$keyname4,'+5 minutes');
    $image5 = Common::get_url(TEACHER_BUCKET_NAME,$keyname5,'+5 minutes');
   

    ?>
  
<div id="image_preview" style="text-align: -webkit-center;"><img id="previewing"  width="1000" height="600" src="<?=$image1;?>" /></div>
<!-- <div id="image_preview" style="text-align: -webkit-center;"><img id="previewing" src="<?=$image1;?>" /></div>
<hr id="line">
<div id="selectImage"> 
</div> -->
<div class="row upload_image">
  <div class="col-md-12 text-center">
     <div id="image_demo" style="width:350px; margin-top:30px"></div>
  </div>
</div>
<!--<div class="row">
<div class="col-md-offset-3 col-md-4">
<input type="file" name="file" id="file" multiple required /><br/>
</div>
<div class="col-md-1" style="margin-left: -142px;">

<input type="submit" class="btn btn-primary" value="Upload" class="submit" />

</div>
</div>
 <div id="preview"></div>
</form>
  <?php } ?>-->
    
 <div align="center">
  <label></label>
 </div>
 <div style="text-align: -webkit-center;">
  <input type="file" class="btn btn-primary" name="files" id="files"  />
  <div class="upload_image">
  <button type="button"class="btn btn-success crop_image">Crop & Upload Image</button>
  </div>
 </div>
 <div style="clear:both"></div>
 <br />
 <br /> 

<!--  
 <input type="hidden" id="emis_images_data" name="emis_image_data"/>
                        <input type="hidden" id="emis_image_name" name="emis_image_name"/>
                        <span id="students_profile"></span><input type="file" id="students_images" style="display: none;" accept="image/*"> -->
                          


<div class="row">
<span id="uploaded_images"> </span>
</div>
<div class="row">
  
     <img id="img1"   width="200" height="150" src="<?=$image1;?>" onclick="image_zoom('<?=$image1;?>');" onerror=this.onerror=null;this.src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" />
    <img id="img2"  width="200" height="150" src="<?=$image2;?>" onclick="image_zoom('<?=$image2;?>');" onerror=this.onerror=null;this.src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" />
    <img id="img3"  width="200" height="150" src="<?=$image3;?>" onclick="image_zoom('<?=$image3;?>');" onerror=this.onerror=null;this.src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" />
    <img id="img4" width="200" height="150" src="<?=$image4;?>" onclick="image_zoom('<?=$image4;?>');" onerror=this.onerror=null;this.src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" />
    <img id="img5"  width="200" height="150" src="<?=$image5;?>" onclick="image_zoom('<?=$image5;?>');" onerror=this.onerror=null;this.src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" />
  </div>
</div>
 <!-- <span id="uploaded_images"></span> -->
</div>

</div>
<div class="row">
<div class="col-md-12" align="right">
<button class="btn btn-primary" onclick="save();"> Save</button>
</div>
</div>
<div id="message"></div>
                                      
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
          <div id="imageModal" class="modal" style="text-align: center;">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01" width="66%">
  <div id="caption"></div>

  
</div>
  
                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>


    </body>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
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
                            <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script>
                            <!-- <script src="<?php echo base_url().'asset/js/croppie-VIT/croppie.js'?>" type="text/javascript"></script> -->
                            <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/utf.js'?>" type="text/javascript"></script>
                            <script src="<?php echo base_url().'asset/js/tamil-keyboard-VIT/js/tamil.js'?>" type="text/javascript"></script>

    <script>
       function image_zoom(image)
          {
            console.log(image); 
            $("#img01").attr('src',image);
            $("#imageModal").modal('show');
          }
     
// $(document).ready(function(){
//  $('#files').change(function(){
//   var files = $('#files')[0].files;
//   var error = '';
//   var form_data = new FormData();
//   for(var count = 0; count<files.length; count++)
//   {
//    var name = files[count].name;
//    var extension = name.split('.').pop().toLowerCase();
//    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
//    {
//     error += "Invalid " + count + " Image File"
//    }
//    else
//    {
//     form_data.append("files[]", files[count]);

//    }
//   }
//   if(error == '')
//   {
//     form_data.append('file_length',files.length);
//    $.ajax({
//     url:"<?php echo base_url().'Home/upload'?>", //base_url() return http://localhost/tutorial/codeigniter/
//     method:"POST",
//     data:form_data,
//     contentType:false,
//     cache:false,
//     processData:false,
//     beforeSend:function()
//     {
//      $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
//     },
//     success:function(data)
//     {
//      $('#uploaded_images').html(data);
//      $('#files').val('');
//       window.location.reload();
//     }
//    })
//   }
//   else
//   {
//    alert(error);
//   }
//  });
// });
</script>

    <script type="text/javascript">

     /*    function previewImages() {

  var preview = document.querySelector('#preview');
  
  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
    
    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 100;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    });
    
    reader.readAsDataURL(file);
    
  }

} */

// document.querySelector('#file').addEventListener("change", previewImages);

    // $(document).ready(function (e) {
// $("#uploadimage").on('submit',(function(e) {

// e.preventDefault();
// $("#message").empty();
// $('#loading').show();
// $.ajax({
// url: "<?php echo base_url().'Home/ajax_php_file'?>", 
// type: "POST",             
// data: new FormData(this),
// contentType: false,     
// cache: false,            
// processData:false,       
// success: function(data)   
// {
// alert('Image successfully updated');
//     window.location.reload();

// }
// });
// }));

// Function to preview image after validation
// $(function() {
// $("#file").change(function() {
// $("#message").empty(); // To remove the previous error message
// var file = this.files[0];
// var imagefile = file.type;
// var match= ["image/jpeg","image/png","image/jpg"];
// if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
// {
// $('#previewing').attr('src','noimage.png');
// $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
// return false;
// }
// else
// {
// var reader = new FileReader();
// reader.onload = imageIsLoaded;
// reader.readAsDataURL(this.files[0]);
// }
// });
// });
// function imageIsLoaded(e) {
// $("#file").css("color","green");
// $('#image_preview').css("display", "block");
// $('#previewing').attr('src', e.target.result);
// $('#previewing').attr('width', '800px');
// $('#previewing').attr('height', '480px');
// };
// });
    </script>

    <script type="text/javascript">
    var image_arr = new Array();
        function get_s3_images(students_data)
    {
        var emis = 'Teachers/photo_all';
            students_data = emis+'/117516.jpgx';
            if(students_data!=null)
            {
                $.ajax(
                {
                    type: "POST",
                    url:baseurl+'Home/get_aws_s3_image',
                    data:{'records':students_data},
                    dataType:"JSON",
                    success: function(image_data)
                    {
                            // console.log(resp);

                        // var images = '<img  src="'+image_data+'" class="img-responsive image" alt="Select Image" id="image"  width="150" height="175" onerror=this.onerror=null;this.src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg">';
                        // $("#students_profile").html(images);


                    }

                })
            }
    }
      $(document).ready(function(){
        $(".upload_image").hide();
          croppie_init();
          // console.log(croppie());
    })

      function croppie_init()
      {
        // console.log(croppie());
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
              width:800,
              height:600,
              type:'square' //circle
            },
            boundary:{
              width:1040,
              height:720
            }
        });
        console.log($image_crop);
      }


       

   


    
var _URL = window.URL || window.webkitURL;

$("#files").change(function(e) {
    // alert();
    
    // return false;
    var file, img;

    console.log(this.files);
    file = '';
    if ((file = this.files[0])) {
        // alert('if')
        var width = '';
        var height = '';
        
        var size = this.files[0].size/1024;
            // alert(Math.round(size));
            // alert(img.width);
        if(size <=1000){
        $(".upload_image").show();
        $("#students_profile").hide();
        croppie(this);
      // $('.upload_image').html(img);
      // $("#")
    }else
    {
    //     // $(this).empty();
        alert('Maximum File Size should be 1mb,Width:800px,Height:600px');
    }

    }
});

function croppie(file)
{
    
    var reader = new FileReader();
    console.log($image_crop);
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(file.files[0]);
    // $('#uploadimageModal').modal('show');
}

$('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
        console.log(response);
        img = new Image();
             
        img.onload = function() {
            }
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };
        $('.upload_image').hide();
        image_arr.push(response);
        var image = '';
        $.each(image_arr,function(i,val){
        image += '<div class="col-md-2"><img  src="'+val+'" class="img-responsive image" width="200" height="150" alt="No Image" id="image"></div>';
        });
        $("#emis_images_data").val(response);
        $("#students_profile").show();

                        $("#uploaded_images").html(image);
    })
  });

  function save()
  {
      $.ajax(
        {
          method:'POST',
          data:{'emis_image_data':image_arr},
          url:'<?=base_url()."Home/ajax_php_file"?>',
          dataType:'JSON',
          success:function(res)
          {
            location.reload();
            
          }
        })
  }
    </script>

</html>