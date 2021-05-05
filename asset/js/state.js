
   $(document).ready(function(){  // function call for validate company name 
    $("#emis_state_user_oldpass").blur(function(){ 
 return validateoldpassword1(); 
  });    });

function validateoldpassword1()// function to validate oldpassword
  {

       var oldpassword = $("#emis_state_user_oldpass").val();    
       var tempdata ="";  
     $.ajax({
            type: "POST",
            url:baseurl+'State/emis_state_oldpasswordck',
            dataType: 'json',
        cache: false,
        async: false,
            data:"&oldpassword="+oldpassword,
            success: function(resp){
              tempdata = resp;
            if(resp == 0)
            {
            
            $("#emis_state_user_oldpass_alert").html("old password is Incorrect.");
            tempdata = 0;
          
            }
            else
            {
              $("#emis_state_user_oldpass_alert").html("");
             
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
    $("#emis_state_reset_pass").click(function(){ 
 
     var cnfpass        = validatetext('emis_state_user_cnfpass','emis_state_user_cnfpass_alert');  
     var newpass    = validatetext('emis_state_user_newpass','emis_state_user_newpass_alert');  

       if(newpass == 0 ||   cnfpass == 0 ) {
        return false;
      }

    var validateoldpwd1 = validateoldpassword1();   

    if(validateoldpwd1 == 0)
    {

      return false;
    }

     var newpassword = $("#emis_state_user_newpass").val(); 
    var cnfpassword = $("#emis_state_user_cnfpass").val(); 

    if(newpassword != cnfpassword)
    {
      $("#emis_state_user_newpass_alert").html("New Password and Confirm password are not same...");
      return false;
    }

          $.ajax({
              type: "POST",
              url:baseurl+'State/emis_state_passwordreset',
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
               window.location.href = baseurl+'State/emis_state_home';
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

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_state_distid").change(function(){
      return validatetext('emis_state_distid','emis_state_distid_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_state_school_name").keyup(function(){
      return validatetext('emis_state_school_name','emis_state_school_name_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_sch_searchstate_sub").click(function(){ 
 
     var schname        = validatetext('emis_state_school_name','emis_state_school_name_alert');   
     var distid    = validatetext('emis_state_distid','emis_state_distid_alert');   
     var emailid        = validatetext('email_id','email_id_alert'); 
     var udise        = validatetext('emis_state_udise_code','emis_state_udise_code_alert'); 
     var emailid_udise        = validatetext('email_id_udise','email_id_udise_alert'); 
       if(schname == 0 ||   distid == 0 || emailid == 0 || udise == 0 || emailid_udise == 0) {
        return false;
      }

});    });

////transfer history filers 
 $(document).ready(function(){  // function call for validate company name 
    $("#emis_state_trans_filter1").change(function(){
      return validatetext('emis_state_trans_filter1','emis_state_trans_filter1_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_state_trans_filter1_sub").click(function(){ 
     var filter1        = validatetext('emis_state_trans_filter1','emis_state_trans_filter1_alert')    
    if(filter1 == 0 ) { return false; }
});    });

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_state_trans_filter2").change(function(){
      return validatetext('emis_state_trans_filter2','emis_state_trans_filter2_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_state_trans_filter2_sub").click(function(){ 
     var filter2        = validatetext('emis_state_trans_filter2','emis_state_trans_filter2_alert');    
    if(filter2 == 0 ) { return false; }
});    });