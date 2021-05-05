   $(document).ready(function(){  // function call for validate company name 
    $("#emis_blk_user_oldpass").blur(function(){ 
 return validateoldpassword1(); 
  });    });

function validateoldpassword1()// function to validate oldpassword
  {

       var oldpassword = $("#emis_blk_user_oldpass").val();    
       var tempdata ="";  
     $.ajax({
            type: "POST",
            url:baseurl+'Block/emis_block_oldpasswordck',
            dataType: 'json',
        cache: false,
        async: false,
            data:"&oldpassword="+oldpassword,
            success: function(resp){
              tempdata = resp;
            if(resp == 0)
            {
            
            $("#emis_blk_user_oldpass_alert").html("old password is Incorrect.");
            tempdata = 0;
          
            }
            else
            {
              $("#emis_blk_user_oldpass_alert").html("");
             
               tempdata = 1;
            }
            
            },
            error: function(e){  
            alert('Error: ' + e.responseText);
            return false;            
            }
            }); 
     return tempdata;
  }

$(document).ready(function(){  // function call for validate company name 
    $("#emis_blk_reset_pass").click(function(){ 
 
     var cnfpass        = validatetext('emis_blk_user_cnfpass','emis_blk_user_cnfpass_alert');  
     var newpass    = validatetext('emis_blk_user_newpass','emis_blk_user_newpass_alert');  

       if(newpass == 0 ||   cnfpass == 0 ) {
        return false;
      }

    var validateoldpwd1 = validateoldpassword1();   

    if(validateoldpwd1 == 0)
    {

      return false;
    }

     var newpassword = $("#emis_blk_user_newpass").val(); 
    var cnfpassword = $("#emis_blk_user_cnfpass").val(); 

    if(newpassword != cnfpassword)
    {
      $("#emis_blk_user_newpass_alert").html("New Password and Confirm password are not same...");
      return false;
    }

          $.ajax({
              type: "POST",
              url:baseurl+'Block/emis_block_passwordreset',
              data:"&newpassword="+newpassword,
              success: function(resp){

              //$("#ca_reg_taluk").html('gopal');
             swal({
              title: "Password changed!",
              type: "success",
              confirmButtonClass: "btn-success",
              confirmButtonText: "OK",
              cancelButtonText: "No, cancel!",
              closeOnConfirm: false,
              },
              function(isConfirm) {
              if (isConfirm) {
               window.location.href = baseurl+'Block/emis_block_home';
               return true;
              } else {
               
              }
              });
             
               },
              error: function(e){ 
              alert('Error: ' + e.responseText);
              return false;  
              
              }
              });

});    });


 $(document).ready(function(){ 
  $("#emis_block_report_schcate").change(function(){ 

    var emis_block_report_schcate = $("#emis_block_report_schcate").val();

      $.ajax({
        type: "POST",
        url:baseurl+'Block/get_school_management_data',
        data:"&emis_block_report_schcate="+emis_block_report_schcate,
        success: function(resp){
        // alert(resp);  
        $("#emis_block_report_schmanage").html(resp);  
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

  });  }); 

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_block_report_schcate").change(function(){
      return validatetext('emis_block_report_schcate','emis_block_report_schcate_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_block_report_schmanage").change(function(){
      return validatetext('emis_block_report_schmanage','emis_block_report_schmanage_alert'); 
});   });


function checkmanagecate_block(){

var manage = validatetext('emis_block_report_schmanage','emis_block_report_schmanage_alert');
var cate = validatetext('emis_block_report_schcate','emis_block_report_schcate_alert'); 

var manage1=$("#emis_block_report_schcate").val();
var cate1 = $("#emis_block_report_schcate").val();

if(manage == 0 || cate == 0){
    return false;
}
// alert('fg');
  $.ajax({
        type: "POST",
        url:baseurl+'Block/savereport_schoolcatemanage',
        data:"&cate="+cate1+"&manage="+manage1,
        success: function(resp){
        // alert(resp);  
        location.reload(true);
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
       
}

function remove_catefilter(){

  $.ajax({
        type: "POST",
        url:baseurl+'Block/deletereport_schoolcatemanage',
        data:"&test=1",
        success: function(resp){
        // alert(resp);  
        location.reload(true);
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
}
