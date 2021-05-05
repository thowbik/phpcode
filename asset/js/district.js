$(document).ready(function(){  // function call for validate company name 
    $("#emis_school_id").keyup(function(){
      return validatenumber('emis_school_id','emis_school_id_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_school_udise").keyup(function(){
      return validatenumber('emis_school_udise','emis_school_udise_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_district_blockid").change(function(){
      return validatetext('emis_district_blockid','emis_district_blockid_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_district_schoolsid").change(function(){
      return validatetext('emis_district_schoolsid','emis_district_schoolsid_alert'); 
});   });

   $(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_district_blockid").change(function(){
     
  
     var bankid = $("#emis_district_blockid").val();
     
// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'District/getallschoolsformblock',
        data:"&blockid="+bankid,
        success: function(resp){     
        document.getElementById("emis_district_schoolsid").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
});   });

   
   $(document).ready(function(){  // function call for validate company name 
    $("#emis_dist_user_oldpass").blur(function(){ 
 return validateoldpassword1(); 
  });    });

function validateoldpassword1()// function to validate oldpassword
  {

       var oldpassword = $("#emis_dist_user_oldpass").val();    
       var tempdata ="";  
     $.ajax({
            type: "POST",
            url:baseurl+'District/emis_district_oldpasswordck',
            dataType: 'json',
        cache: false,
        async: false,
            data:"&oldpassword="+oldpassword,
            success: function(resp){
              tempdata = resp;
            if(resp == 0)
            {
            
            $("#emis_dist_user_oldpass_alert").html("old password is Incorrect.");
            tempdata = 0;
          
            }
            else
            {
              $("#emis_dist_user_oldpass_alert").html("");
             
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
    $("#emis_district_reset_pass").click(function(){ 
 
     var cnfpass        = validatetext('emis_dist_user_cnfpass','emis_dist_user_cnfpass_alert');  
     var newpass    = validatetext('emis_dist_user_newpass','emis_dist_user_newpass_alert');  

       if(newpass == 0 ||   cnfpass == 0 ) {
        return false;
      }

    var validateoldpwd1 = validateoldpassword1();   

    if(validateoldpwd1 == 0)
    {

      return false;
    }

     var newpassword = $("#emis_dist_user_newpass").val(); 
    var cnfpassword = $("#emis_dist_user_cnfpass").val(); 

    if(newpassword != cnfpassword)
    {
      $("#emis_dist_user_newpass_alert").html("New Password and Confirm password are not same...");
      return false;
    }

          $.ajax({
              type: "POST",
              url:baseurl+'District/emis_district_passwordreset',
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
               window.location.href = baseurl+'District/emis_district_home';
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
  $("#emis_dist_report_schcate").change(function(){ 

    var emis_dist_report_schcate = $("#emis_dist_report_schcate").val();

      $.ajax({
        type: "POST",
        url:baseurl+'District/get_school_management_data',
        data:"&emis_district_report_schcate="+emis_dist_report_schcate,
        success: function(resp){
        // alert(resp);  
        $("#emis_dist_report_schmanage").html(resp);  
        return true;              
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

  });  }); 

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_dist_report_schcate").change(function(){
      return validatetext('emis_dist_report_schcate','emis_dist_report_schcate_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_dist_report_schmanage").change(function(){
      return validatetext('emis_dist_report_schmanage','emis_dist_report_schmanage_alert'); 
});   });


function checkmanagecate_dist(){

var manage = validatetext('emis_dist_report_schmanage','emis_dist_report_schmanage_alert');
var cate = validatetext('emis_dist_report_schcate','emis_dist_report_schcate_alert'); 

var manage1=$("#emis_dist_report_schmanage").val();
var cate1 = $("#emis_dist_report_schcate").val();

if(manage == 0 || cate == 0){
    return false;
}
// alert('fg');
  $.ajax({
        type: "POST",
        url:baseurl+'District/savereport_schoolcatemanage',
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
        url:baseurl+'District/deletereport_schoolcatemanage',
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
