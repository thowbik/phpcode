///////////////////mobile numbe rchack validation ////////////////////

$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_mobile").keyup(function(){

      return validmobile('tn_ca_mobile','tn_ca_mobile_alert'); 
});   });


$(document).ready(function(){  // function call for validate company name 
    $("#tn_ca_forgetpass_sub").click(function(){ 

     var tncafor = validmobile('tn_ca_mobile','tn_ca_mobile_alert');

      if(tncafor == 0){
        return false;
      }
    var tn_ca_for_mobile = $("#tn_ca_mobile").val();

    // $('#modelloaderstart').click();  

    $.ajax({
          type: "POST",
          url:baseurl+'Authentication/tn_ca_forgetpass',
          async: false,
          data:"&mobile1="+encodeURIComponent(tn_ca_for_mobile),
          success: function(resp){
             
               if(resp == true)
               {
                alert('Your Password Successfully Sent to your mobile number..');
                window.location.href = baseurl+'Authentication/tn_ca_login';
                return true;         
                }else if(resp==false){
                 $("#tn_ca_mobile_alert").html("Mobile number doesn't exist.. Please enter valid registered mobile number..");
                  alert('hi');
                return false; 
                }else{
                   alert('hi');
                  $("#tn_ca_mobile_alert").html(resp);
                }
        

           },
          error: function(e){
         
          alert('Error: ' + e.responseText);
          
          return false;  
          
          }
          });
});    });

///////////////// candidate registraition //////////////////
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_adhaar").keyup(function(){

      return validatenumber('tn_ca_adhaar','tn_ca_adhaar_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_ration").keyup(function(){

      return validatetext('tn_ca_ration','tn_ca_ration_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_name").keyup(function(){

      return validatetext('tn_ca_name','tn_ca_name_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_fathername").keyup(function(){

      return validatetext('tn_ca_fathername','tn_ca_fathername_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_mothername").keyup(function(){

      return validatetext('tn_ca_mothername','tn_ca_mothername_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_gender").change(function(){

      return validatetext('tn_ca_gender','tn_ca_gender_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_date").change(function(){

      return validdob('tn_ca_date','tn_ca_month','tn_ca_year','tn_ca_date_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_month").change(function(){

      return validdob('tn_ca_date','tn_ca_month','tn_ca_year','tn_ca_date_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_year").change(function(){

      return validdob('tn_ca_date','tn_ca_month','tn_ca_year','tn_ca_date_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_parentocu").keyup(function(){

      return validatetext('tn_ca_parentocu','tn_ca_parentocu_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_parentincome").keyup(function(){

      return validatetext('tn_ca_parentincome','tn_ca_parentincome_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_caste").keyup(function(){

      return validatetext('tn_ca_caste','tn_ca_caste_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_subcaste").keyup(function(){

      return validatetext('tn_ca_subcaste','tn_ca_subcaste_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_mobile1").keyup(function(){

      return validmobile('tn_ca_mobile1','tn_ca_mobile1_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_mobile2").keyup(function(){

      return validmobile('tn_ca_mobile2','tn_ca_mobile2_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_email").keyup(function(){

      return validemailid('tn_ca_email','tn_ca_email_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_district").change(function(){

      return validatetext('tn_ca_district','tn_ca_district_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_city").keyup(function(){

      return validatetext('tn_ca_city','tn_ca_city_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_address").keyup(function(){

      return validatetext('tn_ca_address','tn_ca_address_alert'); 
});   });
$(document).ready(function(){  // function call for validate job title 
    $("#tn_ca_curloc").keyup(function(){

      return validatetext('tn_ca_curloc','tn_ca_curloc_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#tn_ca_register_sub").click(function(){

     var tncacurloc = validatetext('tn_ca_curloc','tn_ca_curloc_alert');  
     var tncaaddress = validatetext('tn_ca_address','tn_ca_address_alert'); 
     var tncacity = validatetext('tn_ca_city','tn_ca_city_alert'); 
     var tncadistrict = validatetext('tn_ca_district','tn_ca_district_alert');  
     var tncaemail  = validemailid('tn_ca_email','tn_ca_email_alert'); 
     var tncamobile2 = validmobile('tn_ca_mobile2','tn_ca_mobile2_alert'); 
     var tncamobile1 = validmobile('tn_ca_mobile1','tn_ca_mobile1_alert'); 
     var tncasubcaste = validatetext('tn_ca_subcaste','tn_ca_subcaste_alert'); 
     var tncacaste = validatetext('tn_ca_caste','tn_ca_caste_alert'); 
 
     var tncapaincome = validatetext('tn_ca_parentincome','tn_ca_parentincome_alert'); 
     var tncapaocu = validatetext('tn_ca_parentocu','tn_ca_parentocu_alert'); 
     var tncadateofbirth  = validdob('tn_ca_date','tn_ca_month','tn_ca_year','tn_ca_date_alert'); 
     var tncagender = validatetext('tn_ca_gender','tn_ca_gender_alert');
     var tncamname = validatetext('tn_ca_mothername','tn_ca_mothername_alert');   
     var tncafname = validatetext('tn_ca_fathername','tn_ca_fathername_alert'); 
     var tncaname  = validatetext('tn_ca_name','tn_ca_name_alert'); 
     var tncaration = validatetext('tn_ca_ration','tn_ca_ration_alert');
     var tncaadhaar = validatenumber('tn_ca_adhaar','tn_ca_adhaar_alert'); 


      if(tncaadhaar == 0 || tncaration == 0 || tncaname == 0 || tncafname == 0 || tncamname == 0 || tncapaocu == 0
       || tncapaincome == 0 || tncacaste == 0 || tncasubcaste == 0 || tncamobile1 == 0 || tncamobile2 == 0 || 
       tncaemail == 0 || tncadistrict == 0 || tncacity == 0 || tncaaddress == 0 || tncacurloc == 0 || tncadateofbirth==0
       || tncagender==0 ){
        return false;
      }
      
      var data1 = new FormData($('#tn_ca_register_form')[0]);
      alert('hi');
      $.ajax({
          type: "POST",
          url:baseurl+'Registration/tn_ca_register',
          async: false,
          contentType: false,
          cache: false,
          processData: false,
          data:data1, 
          success: function(resp){
               if(resp == true)
               {
                alert('Your Account Created Succesfully!');
                window.location.href = baseurl+'Authentication/tn_ca_login';
                return true;         
                }else if(resp==false) {
               
                  alert('Somethin Went Wrong Please Try Again Later!');
                 window.location.href = baseurl+'Authentication/tn_ca_login';
                return false; 
                }else{
                  alert('hi2');
                  $("#alert1").html(resp);
                   return false; 
                }
         alert('hi2');
           },
          error: function(e){
         
          alert('Error: ' + e.responseText);
          
          return false;  
          
          }
          });
});    });

/////////forgetpasswrd
$(document).ready(function(){  // function call for validate job title 
    $("#emis_forget_email").keyup(function(){

      return validemailid('emis_forget_email','emis_forget_email'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_school_forgetsub").click(function(){

   var tncacurloc = validemailid('tn_ca_curloc','tn_ca_curloc_alert');  

    if( tncacurloc==0 ){
        return false;
      }

   });    });
