
$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_search_dist").change(function(){
     
  
     var distid = $("#emis_stu_search_dist").val();
// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Home/getblocksbydistid',
        data:"&distid="+distid,
        success: function(resp){     

        document.getElementById("emis_stu_search_block").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_search_block").change(function(){
     
  
     var blockid = $("#emis_stu_search_block").val();
// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Home/getschoolbyblockid',
        data:"&blockid="+blockid,
        success: function(resp){     

        document.getElementById("emis_stu_search_school").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_search_school").change(function(){
     
  
     var schoolid = $("#emis_stu_search_school").val();
// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Home/getclassbyschoolid',
        data:"&schoolid="+schoolid,
        success: function(resp){     

        document.getElementById("emis_stu_search_class").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_search_class").change(function(){
     
  
     var classid = $("#emis_stu_search_class").val();
     var schoolid = $("#emis_stu_search_school").val();
// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Home/getsectionbyclassid',
        data:"&schoolid="+schoolid+"&classid="+classid,
        success: function(resp){     

        document.getElementById("emis_stu_search_section").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_search_dist").change(function(){
      return validatetext('emis_stu_search_dist','emis_stu_search_dist_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_search_block").change(function(){
      return validatetext('emis_stu_search_block','emis_stu_search_block_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_search_school").change(function(){
      return validatetext('emis_stu_search_school','emis_stu_search_school_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_search_class").change(function(){
      return validatetext('emis_stu_search_class','emis_stu_search_class_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_search_section").change(function(){
      return validatetext('emis_stu_search_section','emis_stu_search_section_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_search_sub").click(function(){     
   
  // var stuadmis      = validatetext('emis_reg_stu_admission','emis_reg_stu_admission_alert'); 
  // var stupass       = validatetext('emis_reg_stu_passfail','emis_reg_stu_passfail_alert');
  // var stuprev       = validatetext('emis_prev_class','emis_prev_class_alert'); 
  // var stusect       = validatetext('emis_reg_stu_section','emis_reg_stu_section_alert'); 
  // var stuclass      = validatetext('emis_class_studying','emis_class_studying_alert'); 

  // if(cbscsub1 == 0 ||   cbscsub2 == 0 || cbscsub3==0 || cbscsub4 == 0 || cbscsub5 == 0 ){
  //   return false;
  //  }

   });    }); 




//edit function js for acadamiv
        var des123 = 0;
          $(document).ready(function(){  // function call for validate personalinfo   
          $(".edit1122").click(function(){
           if(des123==0){
             $('.acedit').css('display','block');
             document.getElementById("Academic_update_edit").disabled = false;
             des123++; 
            }else{
             $('.acedit').css('display','none');
              document.getElementById("Academic_update_edit").disabled = true;
            des123 = 0;
           }

               });    });

     var des12 = 0;
          $(document).ready(function(){  // function call for validate personalinfo   
          $("#enable").click(function(){
          
            if(des12==0){
              $('.pro_edit').css('display','block');
             document.getElementById("emis_prof1_update").disabled = false;
             des12++;
           }else{
            $('.pro_edit').css('display','none');
            document.getElementById("emis_prof1_update").disabled = true;
            des12=0;
           }

               });    });


          
          // $('#classstudyingedit').css('display','block');
          // $('#classstudying1').css('display','none');
          
          // $('#classsectionedit').css('display','block');
          // $('#classsection1').css('display','none');
          
          // $('#preclassedit').css('display','block');
          // $('#preclass1').css('display','none');
          
          // $('#passfailedit').css('display','block');
          // $('#passfail1').css('display','none');
          
          // $('#schooladmissionnoedit').css('display','block');
          // $('#schooladmissionno1').css('display','none');
          
          // $('#dojedit').css('display','block');
          // $('#doj1').css('display','none');
          
          // $('#edumediumedit').css('display','block');
          // $('#edumedium1').css('display','none');
          
          // $('#groupcodeedit').css('display','block');
          // $('#groupcode1').css('display','none');
          
          // $('#cbsc1edit').css('display','block');
          // $('#cbsc11').css('display','none');
          
          // $('#cbsc2edit').css('display','block');
          // $('#cbsc21').css('display','none');
          
          // $('#cbsc3edit').css('display','block');
          // $('#cbsc31').css('display','none');
          
          // $('#cbsc4edit').css('display','block');
          // $('#cbsc41').css('display','none');
          
          // $('#cbscoptionaledit').css('display','block');
          // $('#cbscoptional1').css('display','none');
          
          // $('#camrteedit').css('display','block');
          // $('#camerteedit1').css('display','none');
          
          // $('#aidunaidedit').css('display','block');
          // $('#aidunaidedit1').css('display','none');
       




$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub1_edit").change(function(){ 

     return validncomparetext5('emis_reg_cbsc_sub1_edit','emis_reg_cbsc_sub2_edit','emis_reg_cbsc_sub3_edit','emis_reg_cbsc_sub4_edit',
      'emis_reg_cbsc_sub5_edit','emis_reg_cbsc_sub1_edit_alert');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub2_edit").change(function(){ 

     return validncomparetext5('emis_reg_cbsc_sub2_edit','emis_reg_cbsc_sub1_edit','emis_reg_cbsc_sub3_edit','emis_reg_cbsc_sub4_edit',
      'emis_reg_cbsc_sub5_edit','emis_reg_cbsc_sub2_edit_alert');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub3_edit").change(function(){ 

     return validncomparetext5('emis_reg_cbsc_sub3_edit','emis_reg_cbsc_sub2_edit','emis_reg_cbsc_sub1_edit','emis_reg_cbsc_sub4_edit',
      'emis_reg_cbsc_sub5_edit','emis_reg_cbsc_sub3_edit_alert');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub4_edit").change(function(){ 

     return validncomparetext5('emis_reg_cbsc_sub4_edit','emis_reg_cbsc_sub2_edit','emis_reg_cbsc_sub3_edit','emis_reg_cbsc_sub1_edit',
      'emis_reg_cbsc_sub5_edit','emis_reg_cbsc_sub4_edit_alert');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub5_edit").change(function(){ 

     return   ('emis_reg_cbsc_sub5_edit','emis_reg_cbsc_sub2_edit','emis_reg_cbsc_sub3_edit','emis_reg_cbsc_sub4_edit',
      'emis_reg_cbsc_sub1_edit','emis_reg_cbsc_sub5_edit_alert');

});   });

 $(document).ready(function(){  // function call for validate company name 
    $("#emis_class_studying_edit").change(function(){
      return validatetext('emis_class_studying_edit','emis_class_studying_edit_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_section_edit").change(function(){
      return validatetext('emis_reg_stu_section_edit','emis_reg_stu_section_edit_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_prev_class_edit").change(function(){
      return validatetext('emis_prev_class_edit','emis_prev_class_edit_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_passfail_edit").change(function(){
      return validatetext('emis_reg_stu_passfail_edit','emis_reg_stu_passfail_edit_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_mediofinst_edit").change(function(){
      return validatetext('emis_reg_mediofinst_edit','emis_reg_mediofinst_edit_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_grup_code_edit").change(function(){
      return validatetext('emis_reg_grup_code_edit','emis_reg_grup_code_edit_alert'); 
});   });


$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_rte_edit").change(function(){
      return validatetext('emis_reg_stu_rte_edit','emis_reg_stu_rte_edit_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_aidunaid_edit").change(function(){
      return validatetext('emis_reg_stu_aidunaid_edit','emis_reg_stu_aidunaid_edit_alert'); 
});   });


$(document).ready(function(){  // function call for validate company name 
    $("#Academic_update_edit").click(function(){ 


      var stumoind_edit   = validatetext('emis_reg_mediofinst_edit','emis_reg_mediofinst_edit_alert');   
      var stuprevedit     = validatetext('emis_prev_class_edit','emis_prev_class_edit_alert'); 
      var stusectedit     = validatetext('emis_reg_stu_section_edit','emis_reg_stu_section_edit_alert'); 
      var stuclassedit    = validatetext('emis_class_studying_edit','emis_class_studying_edit_alert'); 

      
 
      var cbscsub5     = 2; 
      var cbscsub4    = 2; 
      var cbscsub3     = 2;   
      var cbscsub2     =2;  
      var cbscsub1     = 2; 

      var stugroucodeedit   = 2;
      var sturte = 2;
      var aidedunaided = 2;

      var classnew = $("#emis_class_studying_edit").val();
      var classstudying1 = $("#classstudying1").val();
      var created_at1 = $("#created_at1").val();


      var createddate = created_at1.slice(0,10);
      var today = new Date();
      var currentdate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      // var difference = currentdate - createddate;


      var date1 = new Date(createddate);
      var date2 = new Date(currentdate);
      var timeDiff = Math.abs(date2.getTime() - date1.getTime());
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 

      if(classstudying1 == "I" && diffDays <= 90 && classnew!=1)
      {
        alert('Alert : Newly created students in class 1 cannot be transferred to Higher classes !');
         return false;
      }

      // alert(difference);


     

       var selectclass1 = $("#emis_class_studying").val();

       if(selectclass1==11 || selectclass1==12){

      var groupcateid_edit = $("#groupcateid_edit").val();

       if(groupcateid_edit=='CBSE'){
           cbscsub5     = validncomparetext5('emis_reg_cbsc_sub5_edit','emis_reg_cbsc_sub2_edit','emis_reg_cbsc_sub3_edit','emis_reg_cbsc_sub4_edit',
      'emis_reg_cbsc_sub1_edit','emis_reg_cbsc_sub5_edit_alert'); 
           cbscsub4     = validncomparetext5('emis_reg_cbsc_sub4_edit','emis_reg_cbsc_sub2_edit','emis_reg_cbsc_sub3_edit','emis_reg_cbsc_sub1_edit',
      'emis_reg_cbsc_sub5_edit','emis_reg_cbsc_sub4_edit_alert');
           cbscsub3     = validncomparetext5('emis_reg_cbsc_sub3_edit','emis_reg_cbsc_sub2_edit','emis_reg_cbsc_sub1_edit','emis_reg_cbsc_sub4_edit',
      'emis_reg_cbsc_sub5_edit','emis_reg_cbsc_sub3_edit_alert');
           cbscsub2     = validncomparetext5('emis_reg_cbsc_sub2_edit','emis_reg_cbsc_sub1_edit','emis_reg_cbsc_sub3_edit','emis_reg_cbsc_sub4_edit',
      'emis_reg_cbsc_sub5_edit','emis_reg_cbsc_sub2_edit_alert');
           cbscsub1     = validncomparetext5('emis_reg_cbsc_sub1_edit','emis_reg_cbsc_sub2_edit','emis_reg_cbsc_sub3_edit','emis_reg_cbsc_sub4_edit',
      'emis_reg_cbsc_sub5_edit','emis_reg_cbsc_sub1_edit_alert');

       }else if(groupcateid_edit!='CBSE'){
         stugroucodeedit      = validatetext('emis_reg_grup_code_edit','emis_reg_grup_code_edit_alert');
       }

       }

       var dissunaided_edit = $("#emis_reg_stu_rte_hidden_edit").val();



       if(dissunaided_edit=="Un-aided"){
        sturte  = validatetext('emis_reg_stu_rte_edit','emis_reg_stu_rte_edit_alert');
       }else if(dissunaided_edit=='Aided'){
        aidedunaided  = validatetext('emis_reg_stu_aidunaid_edit','emis_reg_stu_aidunaid_edit_alert');

       } 

      

       if(stuclassedit == 0  || stusectedit==0 || stuprevedit==0 ||  stumoind_edit==0 || cbscsub1 == 0 ||
        cbscsub2 == 0 || cbscsub3==0 || cbscsub4 == 0 || cbscsub5 == 0 || stugroucodeedit==0 || sturte==0 || 
        aidedunaided == 0  )
      {
        return false;
      }

    

     });    });


/* Student Admit Function started there */
// $(document).ready(function(){  // function call for validate company name 
//     $("#emis_stu_admit").click(function(){ 

 // if(!confirm('Are you sure want to admit this Student?')){
 //            e.preventDefault();
 //            return false;
 //        }

        // $.ajax({
        //       type: "POST",
        //       url:baseurl+'Home/emis_school_admission',
        //       data:"&stud_id=1",
        //       success: function(resp){
        //       if(resp==true){
        //          window.location.href = baseurl+'Home/emis_student_profile1';  
        //       } else {
        //         // alert('This Student Already in common Area. Please Try some one.');
        //         return false;
        //       }       
              
        //        },
        //       error: function(e){ 
        //       return false;  
              
        //       }
        //       });

// });    }); 

// function validation for addmission 

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_class_studying_admiss").change(function(){   

     var classstd = $("#emis_class_studying_admiss").val();

     if(classstd==11 || classstd==12 ){
       $('.groupcode11').css('display','block');
       }else{
       $('.groupcode11').css('display','none');
      }

      $.ajax({
        type: "POST",
        url:baseurl+'Home/getallsectionsbyclass1',
        data:"&classid="+classstd,
        success: function(resp){     
       // alert(resp);
        document.getElementById("emis_reg_stu_section_admiss").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});   });



$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub1_admiss").change(function(){  

     return validncomparetext5('emis_reg_cbsc_sub1_admiss','emis_reg_cbsc_sub2_admiss','emis_reg_cbsc_sub3_admiss','emis_reg_cbsc_sub4_admiss',
      'emis_reg_cbsc_sub5_admiss','emis_reg_cbsc_sub1_alert_admiss');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub2_admiss").change(function(){ 

     return validncomparetext5('emis_reg_cbsc_sub2_admiss','emis_reg_cbsc_sub1_admiss','emis_reg_cbsc_sub3_admiss','emis_reg_cbsc_sub4_admiss',
      'emis_reg_cbsc_sub5_admiss','emis_reg_cbsc_sub2_alert_admiss');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub3_admiss").change(function(){ 

     return validncomparetext5('emis_reg_cbsc_sub3_admiss','emis_reg_cbsc_sub2_admiss','emis_reg_cbsc_sub1_admiss','emis_reg_cbsc_sub4_admiss',
      'emis_reg_cbsc_sub5_admiss','emis_reg_cbsc_sub3_alert_admiss');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub4_admiss").change(function(){ 

     return validncomparetext5('emis_reg_cbsc_sub4_admiss','emis_reg_cbsc_sub2_admiss','emis_reg_cbsc_sub3_admiss','emis_reg_cbsc_sub1_admiss',
      'emis_reg_cbsc_sub5_admiss','emis_reg_cbsc_sub4_alert_admiss');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub5_admiss").change(function(){

     return validncomparetext5('emis_reg_cbsc_sub5_admiss','emis_reg_cbsc_sub2_admiss','emis_reg_cbsc_sub3_admiss','emis_reg_cbsc_sub4_admiss',
      'emis_reg_cbsc_sub1_admiss','emis_reg_cbsc_sub5_alert_admiss');

});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_admiss_date").change(function(){
      return  validdob('emis_admiss_date', 'emis_admiss_month','emis_admiss_year', 'emis_admiss_date_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_admiss_month").change(function(){
      return  validdob('emis_admiss_date', 'emis_admiss_month','emis_admiss_year', 'emis_admiss_date_alert');
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_admiss_year").change(function(){
      return  validdob('emis_admiss_date', 'emis_admiss_month','emis_admiss_year', 'emis_admiss_date_alert');
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_class_studying_admiss").change(function(){
      return validatetext('emis_class_studying_admiss','emis_class_studying_alert_admiss'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_section_admiss").change(function(){
      return validatetext('emis_reg_stu_section_admiss','emis_reg_stu_section_alert_admiss'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_admission_admiss").keyup(function(){
      return validatenumber('emis_reg_stu_admission_admiss','emis_reg_stu_admission_alert_admiss'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_mediofinst_admiss").change(function(){
      return validatetext('emis_reg_mediofinst_admiss','emis_reg_mediofinst_alert_admiss'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_grup_code_admiss").change(function(){
      return validatetext('emis_reg_grup_code_admiss','emis_reg_grup_code_alert_admiss'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_rte_admiss").change(function(){
      return validatetext('emis_reg_stu_rte_admiss','emis_reg_stu_rte_alert_admiss'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_aidunaid_admiss").change(function(){
      return validatetext('emis_reg_stu_aidunaid_admiss','emis_reg_stu_aidunaid_alert_admiss'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_sub_admiss").click(function(){ 


          var cbscsub5_admiss1     = 2; 
          var cbscsub4_admiss1    = 2; 
          var cbscsub3_admiss1     = 2;   
          var cbscsub2_admiss1     =2;  
          var cbscsub1_admiss1     = 2; 
          var stugroucode1_admiss   = 2;
          var sturte1_admiss     = 2;
          var aidedunaided1_admiss   = 2;

        var dissunaided1_admiss = $("#emis_reg_stu_rte_hidden_admiss").val();

       if(dissunaided1_admiss=="Un-aided"){
        sturte1_admiss = validatetext('emis_reg_stu_rte_admiss','emis_reg_stu_rte_alert_admiss');

       }else if(dissunaided1_admiss=='Aided'){
        aidedunaided1_admiss = validatetext('emis_reg_stu_aidunaid_admiss','emis_reg_stu_aidunaid_alert_admiss');
       }


      


     var selectclass1 = $("#emis_class_studying_admiss").val();

      if(selectclass1==11 || selectclass1==12){
         var groupcateid_admiss1 = $("#groupcateid_admiss").val();
       if(groupcateid_admiss1=='29'){
           cbscsub5_admiss1     = validncomparetext5('emis_reg_cbsc_sub5_admiss','emis_reg_cbsc_sub2_admiss','emis_reg_cbsc_sub3_admiss','emis_reg_cbsc_sub4_admiss',
      'emis_reg_cbsc_sub1_admiss','emis_reg_cbsc_sub5_alert_admiss'); 
           cbscsub4_admiss1     = validncomparetext5('emis_reg_cbsc_sub4_admiss','emis_reg_cbsc_sub2_admiss','emis_reg_cbsc_sub3_admiss','emis_reg_cbsc_sub1_admiss',
      'emis_reg_cbsc_sub5_admiss','emis_reg_cbsc_sub4_alert_admiss');
           cbscsub3_admiss1     = validncomparetext5('emis_reg_cbsc_sub3_admiss','emis_reg_cbsc_sub2_admiss','emis_reg_cbsc_sub1_admiss','emis_reg_cbsc_sub4_admiss',
      'emis_reg_cbsc_sub5_admiss','emis_reg_cbsc_sub3_alert_admiss');  
           cbscsub2_admiss1     = validncomparetext5('emis_reg_cbsc_sub2_admiss','emis_reg_cbsc_sub1_admiss','emis_reg_cbsc_sub3_admiss','emis_reg_cbsc_sub4_admiss',
      'emis_reg_cbsc_sub5_admiss','emis_reg_cbsc_sub2_alert_admiss'); 
           cbscsub1_admiss1     = validncomparetext5('emis_reg_cbsc_sub1_admiss','emis_reg_cbsc_sub2_admiss','emis_reg_cbsc_sub3_admiss','emis_reg_cbsc_sub4_admiss',
      'emis_reg_cbsc_sub5_admiss','emis_reg_cbsc_sub1_alert_admiss');

       }else if(groupcateid_admiss1!='29') {
            stugroucode1_admiss      = validatetext('emis_reg_grup_code_admiss','emis_reg_grup_code_alert_admiss'); 
       }


       }

       // var dissunaided1_admiss = $("#emis_reg_stu_rte_hidden_admiss").val();

       // if(dissunaided1_admiss=="Un-aided"){
       // var sturte1_admiss = validatetext('emis_reg_stu_rte_admiss','emis_reg_stu_rte_alert_admiss');

       // }else if(dissunaided1_admiss=='Aided'){
       // var aidedunaided1_admiss = validatetext('emis_reg_stu_aidunaid_admiss','emis_reg_stu_aidunaid_alert_admiss');
       // }

      var stumoind1_admiss      = validatetext('emis_reg_mediofinst_admiss','emis_reg_mediofinst_alert_admiss'); 
     
      var stuadmis1_admiss      = validatenumber('emis_reg_stu_admission_admiss','emis_reg_stu_admission_alert_admiss'); 
      var stusect1_admiss      = validatetext('emis_reg_stu_section_admiss','emis_reg_stu_section_alert_admiss'); 
      var stuclass1_admiss      = validatetext('emis_class_studying_admiss','emis_class_studying_alert_admiss'); 
       var admiss_date1          = validdob('emis_admiss_date', 'emis_admiss_month','emis_admiss_year', 'emis_admiss_date_alert'); 


      if(admiss_date1== 0 || stuclass1_admiss == 0 || stusect1_admiss==0   || stuadmis1_admiss==0  || stumoind1_admiss==0 || stugroucode1_admiss==0  
        || cbscsub1_admiss1 == 0 ||   cbscsub2_admiss1 == 0 || cbscsub3_admiss1==0 || cbscsub4_admiss1 == 0 || cbscsub5_admiss1 == 0 ||
        aidedunaided1_admiss==0 || sturte1_admiss== 0 )
      {
        return false;
      }

     // alert('success');
           

     });    }); 




$(document).ready(function(){  // function call for validate company name 
    $("#emis_prof1_update").click(function(){ 

     var subcaste    = validatetext('emis_reg_subcaste','emis_reg_subcaste_alert');  
     var community        = validatetext('emis_reg_community','emis_reg_community_alert');  
     var religion   = validatetext('emis_reg_religion','emis_reg_religion_alert');

       if(religion == 0 ||   community == 0 || subcaste==0 ) {
        return false;
      }

});    }); 

$(document).ready(function(){  // function call for validate company name 
    $("#emis_prof1_update1").click(function(){ 

       
            var isCheckedaadhaar = $("#emis_stu_idcard_adharadio").is(":checked");
            var isCheckedenroll = $("#emis_stu_idcard_enrolradio").is(":checked");
            var isCheckednoapplied = $("#emis_stu_idcard_noappliedradio").is(":checked");
            adhar = 2;
            enroll = 2;

                if(isCheckedaadhaar){
                     adhar    = validateaadhaar('emis_reg_stu_aadhaar','emis_reg_stu_aadhaar_alert');
                     $("#emis_stu_idcard_enroll_alert").html("");

                  }else if(isCheckedenroll){

                    enroll   = validatenumber('emis_stu_idcard_enroll','emis_stu_idcard_enroll_alert');
                    $("#emis_reg_stu_aadhaar_alert").html("");

                  }else if(isCheckednoapplied){

                    notappiled = validatetext('emis_stu_idcard_notapplied','emis_stu_idcard_notapplied_alert');
                    $("#emis_reg_stu_aadhaar_alert").html("");
                    $("#emis_stu_idcard_enroll_alert").html("");

                  }else{
                  // alert('Select any one of Aadhaar or Enroll or Not applied!');
                   $("#emis_stu_idcard_adharadio").focus();
               
                  $("#emis_reg_stu_aadhaar_alert").html("Select any one of Aadhaar or Enroll or Not applied!");
                  return false;  
                  }


       if(adhar == 0 ||  enroll == 0 ) {
        return false;
      }

});    }); 


$(document).ready(function(){  // function call for validate company name 
    $("#emis_rest_user_oldpass").blur(function(){ 
 return validateoldpassword(); 
  });    });

function validateoldpassword()// function to validate oldpassword
  {

       var oldpassword = $("#emis_rest_user_oldpass").val();    
       var tempdata ="";  
     $.ajax({
            type: "POST",
            url:baseurl+'Home/emis_school_oldpasswordck',
            dataType: 'json',
        cache: false,
        async: false,
            data:"&oldpassword="+oldpassword,
            success: function(resp){
              tempdata = resp;
            if(resp == 0)
            {
            
            $("#emis_rest_user_oldpass_alert").html("old password is Incorrect.");
            tempdata = 0;
          
            }
            else
            {
              $("#emis_rest_user_oldpass_alert").html("");
             
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
    $("#emis_school_reset_pass").click(function(){ 
 
     var cnfpass        = validatetext('emis_rest_user_cnfpass','emis_rest_user_cnfpass_alert');  
     var newpass    = validatetext('emis_rest_user_newpass','emis_rest_user_newpass_alert');  

       if(newpass == 0 ||   cnfpass == 0 ) {
        return false;
      }

    var validateoldpwd = validateoldpassword();   

    if(validateoldpwd == 0)
    {

      return false;
    }

     var newpassword = $("#emis_rest_user_newpass").val(); 
    var cnfpassword = $("#emis_rest_user_cnfpass").val(); 

    if(newpassword != cnfpassword)
    {
      $("#emis_rest_user_newpass_alert").html("New Password and Confirm password are not same...");
      return false;
    }

          $.ajax({
              type: "POST",
              url:baseurl+'Home/emis_school_passwordreset',
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
               window.location.href = baseurl+'Home/emis_school_home';
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
/********************* Transfer reject option for district user **********************************/
$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_rejectspl").click(function(){ 

swal({
  title: "Are you sure?",
  text: "You want to reject this Transfer request!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Reject!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    rejectstudent();
  } else {
    swal("Cancelled", "You calcelled reject process", "error");
  }
});

function rejectstudent(){

  var studid=$("#emis_stu_transferspl_id").val();

      $.ajax({
      type: "POST",
      url:baseurl+'Home/emis_student_reject',
      data:"&stud_id="+studid,
      success: function(resp){  
         // alert(resp);
            if(resp==true){
              swal({
                title: "Rejected!",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "OK",
                closeOnConfirm: true,
                },
                function(isConfirm) {
                if (isConfirm) {
                  window.location.href = baseurl+'Home/emis_student_profile/'+studid; 
                } else {
                  
                }
                });
            } else {
              swal("Cancelled", "You have not privilages to reject this request! Please Try some one.", "error");
              // alert('You have not privilages to transfer this student! Please Try some one.');
              return false;
            }        
       },
      error: function(e){ 
      alert('Error: ' + e.responseText);
      return false;  

      }
      });
}



/********************* Transfer reject option for district user **********************************/


});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_transferspl").click(function(){ 

swal({
  title: "Are you sure?",
  text: "You want to transfer this student!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Transfer!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    transferstudent();
  } else {
    swal("Cancelled", "Your calcelled transfer", "error");
  }
});


});   });

function transferstudent(){

  var studid=$("#emis_stu_transfer0_id").val();

      $.ajax({
      type: "POST",
      url:baseurl+'Home/emis_student_transfer',
      data:"&stud_id="+studid,
      success: function(resp){  
         // alert(resp);
            if(resp==true){
              swal({
                title: "Transferred!",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "OK",
                closeOnConfirm: true,
                },
                function(isConfirm) {
                if (isConfirm) {
                  window.location.href = baseurl+'Home/emis_student_profile/'+studid; 
                } else {
                  
                }
                });
            } else {
              swal("Cancelled", "You have not privilages to transfer this student! Please Try some one.", "error");
              // alert('You have not privilages to transfer this student! Please Try some one.');
              return false;
            }        
       },
      error: function(e){ 
      alert('Error: ' + e.responseText);
      return false;  

      }
      });
}


/******************************start Transfer request alert **********************************************************/
$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_raiserequest").click(function(){ 

swal({
  title: "Are you sure want to RAISE A REQUEST for this Student?",
  text: "Note : if the student is not belongs to your schools, please don't make request.",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Raise Request!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    raisearequest();
  } else {
    swal("Cancelled", "Your calcelled transfer", "error");
  }
});


});   });


function raisearequest(){

  var studid=$("#emis_stu_transfer0_id").val();

      $.ajax({
      type: "POST",
      url:baseurl+'Home/emis_student_raiserequest',
      data:"&stud_id="+studid,
      success: function(resp){  
         // alert(resp);
            if(resp==true){
              swal({
                title: "Request Raised!",
                text: "Message, If this student is not transferred within 3 days, then contact district user to transfer this student",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "OK",
                closeOnConfirm: true,
                },
                function(isConfirm) {
                if (isConfirm) {
                  window.location.href = baseurl+'Home/emis_student_profile/'+studid; 
                } else {
                  
                }
                });
            } else {
              swal("Cancelled", "You have not privilages to make a request to this student! Please Try some one.", "error");
              // alert('You have not privilages to transfer this student! Please Try some one.');
              return false;
            }        
       },
      error: function(e){ 
      alert('Error: ' + e.responseText);
      return false;  

      }
      });
}

/****************************** Transfer request alert End **********************************************************/

/*********************************Start District user abstract transfer ***********************************************/

function distrrictusertransfer(studentid,schooludise)
{
  

  swal({
  title: "Are you sure?",
  text: "You want to transfer this student!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Transfer!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    transferstudentdist(studentid,schooludise);
  } else {
    swal("Cancelled", "Your calcelled transfer", "error");
  }
});
}

function transferstudentdist(studentid,schooludise){

  var studid=studentid;
  var schooludise=schooludise;

      $.ajax({
      type: "POST",
      url:baseurl+'Home/emis_student_transfer',
      data:"&stud_id="+studid,
      success: function(resp){  
         // alert(resp);
            if(resp==true){
              swal({
                title: "Transferred!",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "OK",
                closeOnConfirm: true,
                },
                function(isConfirm) {
                if (isConfirm) {
                  window.location.href = baseurl+'District/emis_district_request_studentlist/'+schooludise; 
                } else {
                  
                }
                });
            } else {
              swal("Cancelled", "You have not privilages to transfer this student! Please Try some one.", "error");
              // alert('You have not privilages to transfer this student! Please Try some one.');
              return false;
            }        
       },
      error: function(e){ 
      alert('Error: ' + e.responseText);
      return false;  

      }
      });
}

/*********************************End District user abstract transfer ***********************************************/

/*********************************Start District user reject ***********************************************/

function districtuserreject(studentid,schooludise)
{
  

  swal({
  title: "Are you sure?",
  text: "You want to reject this request",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Reject!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    rejectstudentdist(studentid,schooludise);
  } else {
    swal("Cancelled", "Your calcelled the reject process", "error");
  }
});
}

function rejectstudentdist(studentid,schooludise){

  var studid=studentid;
  var schooludise=schooludise;

      $.ajax({
      type: "POST",
      url:baseurl+'Home/emis_student_reject',
      data:"&stud_id="+studid,
      success: function(resp){  
         // alert(resp);
            if(resp==true){
              swal({
                title: "Rejected!",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "OK",
                closeOnConfirm: true,
                },
                function(isConfirm) {
                if (isConfirm) {
                  window.location.href = baseurl+'District/emis_district_request_studentlist/'+schooludise; 
                } else {
                  
                }
                });
            } else {
              swal("Cancelled", "You have not privilages to reject this request! Please Try some one.", "error");
              // alert('You have not privilages to transfer this student! Please Try some one.');
              return false;
            }        
       },
      error: function(e){ 
      alert('Error: ' + e.responseText);
      return false;  

      }
      });
}

/*********************************End District user reject ***********************************************/




$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_admit").click(function(){ 

swal({
  title: "Are you sure?",
  text: "You want to Admit this student!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Admit!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    window.location.href = baseurl+'Home/emis_school_admission'; 
  } else {
    swal("Cancelled", "Your calcelled Admit", "error");
  }
});

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_transfer1").click(function(){ 

      var studid=$("#emis_stu_transfer1_id").val();

       swal({
        title: "Are you sure?",
        text: "You want to transfer this student!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, Transfer!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          transferstudent1();
        } else {
          swal("Cancelled", "Your calcelled transfer", "error");
        }
      });

});   });

function transferstudent1(){

  var studid=$("#emis_stu_transfer1_id").val();

            $.ajax({
            type: "POST",
            url:baseurl+'Home/emis_student_transfer',
            data:"&stud_id="+studid,
            success: function(resp){  

                  if(resp==true){
                   swal({
                      title: "Transferred!",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "OK",
                      closeOnConfirm: true,
                      },
                      function(isConfirm) {
                      if (isConfirm) {
                        window.location.href = baseurl+'Home/emis_student_profile1/'+studid; 
                      } else {
                        
                      }
                      });
                  } else {
                    swal("Cancelled", "You have not privilages to transfer this student! Please Try some one.", "error");
                    // alert('You have not privilages to transfer this student! Please Try some one.');
                    return false;
                  }        
             },
            error: function(e){ 
            alert('Error: ' + e.responseText);
            return false;  

            }
            });
}

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_transfer2").click(function(){ 

   swal({
  title: "Are you sure?",
  text: "You want to transfer this student!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Transfer!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    transferstudent2();
  } else {
    swal("Cancelled", "Your calcelled transfer", "error");
  }
});

});   });

function transferstudent2(){

  var studid=$("#emis_stu_transfer2_id").val();

            $.ajax({
            type: "POST",
            url:baseurl+'Home/emis_student_transfer',
            data:"&stud_id="+studid,
            success: function(resp){  

                  if(resp==true){
                   swal({
                      title: "Transferred!",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "OK",
                      closeOnConfirm: true,
                      },
                      function(isConfirm) {
                      if (isConfirm) {
                        window.location.href = baseurl+'Home/emis_student_profile2/'+studid; 
                      } else {
                        
                      }
                      }); 
                  } else {
                    swal("Cancelled", "You have not privilages to transfer this student! Please Try some one.", "error");
                    // alert('You have not privilages to transfer this student! Please Try some one.');
                    return false;
                  }        
             },
            error: function(e){ 
            alert('Error: ' + e.responseText);
            return false;  

            }
            });
}

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_transfer3").click(function(){ 

 swal({
  title: "Are you sure?",
  text: "You want to transfer this student!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Transfer!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    transferstudent3();
  } else {
    swal("Cancelled", "Your calcelled transfer", "error");
  }
});

});   });

function transferstudent3(){

  var studid=$("#emis_stu_transfer3_id").val();

            $.ajax({
            type: "POST",
            url:baseurl+'Home/emis_student_transfer',
            data:"&stud_id="+studid,
            success: function(resp){  

                  if(resp==true){
                   swal({
                      title: "Transferred!",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "OK",
                      closeOnConfirm: true,
                      },
                      function(isConfirm) {
                      if (isConfirm) {
                        window.location.href = baseurl+'Home/emis_student_profile3/'+studid; 
                      } else {
                        
                      }
                      }); 
                  } else {
                    swal("Cancelled", "You have not privilages to transfer this student! Please Try some one.", "error");
                    // alert('You have not privilages to transfer this student! Please Try some one.');
                    return false;
                  }        
             },
            error: function(e){ 
            alert('Error: ' + e.responseText);
            return false;  

            }
            });
}

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_transfer4").click(function(){ 

swal({
  title: "Are you sure?",
  text: "You want to transfer this student!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Transfer!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    transferstudent4();
  } else {
    swal("Cancelled", "Your calcelled transfer", "error");
  }
});

});   });

function transferstudent4(){

  var studid=$("#emis_stu_transfer4_id").val();

    

        $.ajax({
        type: "POST",
        url:baseurl+'Home/emis_student_transfer',
        data:"&stud_id="+studid,
        success: function(resp){  

              if(resp==true){
               swal({
                      title: "Transferred!",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "OK",
                      closeOnConfirm: true,
                      },
                      function(isConfirm) {
                      if (isConfirm) {
                        window.location.href = baseurl+'Home/emis_student_profile4/'+studid; 
                      } else {
                        
                      }
                      }); 
              } else {
                swal("Cancelled", "You have not privilages to transfer this student! Please Try some one.", "error");
                // alert('You have not privilages to transfer this student! Please Try some one.');
                return false;
              }        
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  

        }
        });
}

$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_search_unique").keyup(function(){
      return validatenumber('emis_stu_search_unique','emis_stu_search_unique_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_search_adhaar").keyup(function(){
      return validatenumber('emis_stu_search_adhaar','emis_stu_search_adhaar_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_search_mobile").keyup(function(){
      return validatenumber('emis_stu_search_mobile','emis_stu_search_mobile_alert'); 
});   });



$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_search_udise").keyup(function(){
      return validatenumber('emis_stu_search_udise','emis_stu_search_udise_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_search_pincode1").keyup(function(){
      return validatenumber('emis_stu_search_pincode1','emis_stu_search_pincode1_alert'); 
});   });



/////id card edit page

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_stu_idcard_class").change(function(){  

      var classstd = $("#emis_stu_idcard_class").val(); 

 $.ajax({
        type: "POST",
        url:baseurl+'Registration/getallsectionsbyclass',
        data:"&classid="+classstd,
        success: function(resp){     
       // alert(resp);

        document.getElementById("emis_stu_idcard_section").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});   });


$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_name").keyup(function(){
      return validatetext('emis_stu_idcard_name','emis_stu_idcard_name_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_gender").change(function(){
      return validatetext('emis_stu_idcard_gender','emis_stu_idcard_gender_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_father").keyup(function(){
      return validatetext('emis_stu_idcard_father','emis_stu_idcard_father_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_mother").keyup(function(){
      return validatetext('emis_stu_idcard_mother','emis_stu_idcard_mother_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_guardian").keyup(function(){
      return validatetext('emis_stu_idcard_guardian','emis_stu_idcard_guardian_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_adhaar").keyup(function(){
      return validateaadhaar('emis_stu_idcard_adhaar','emis_stu_idcard_adhaar_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_enroll").keyup(function(){
      return validatenumber('emis_stu_idcard_enroll','emis_stu_idcard_enroll_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_notapplied").keyup(function(){
      return validatenumber('emis_stu_idcard_notapplied','emis_stu_idcard_notapplied_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_date").change(function(){
      return validdob('emis_stu_idcard_date','emis_stu_idcard_date_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_month").change(function(){
      return validdob('emis_stu_idcard_month','emis_stu_idcard_date_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_year").change(function(){
      return validdob('emis_stu_idcard_year','emis_stu_idcard_date_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_blood").change(function(){
      return validatetext('emis_stu_idcard_blood','emis_stu_idcard_blood_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_class").change(function(){
      return validatetext('emis_stu_idcard_class','emis_stu_idcard_class_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_section").change(function(){
      return validatetext('emis_stu_idcard_section','emis_stu_idcard_section_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_door").keyup(function(){
      return validatetext('emis_stu_idcard_door','emis_stu_idcard_door_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_area").keyup(function(){
      return validatetext('emis_stu_idcard_area','emis_stu_idcard_area_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_city").keyup(function(){
      return validatetext('emis_stu_idcard_city','emis_stu_idcard_city_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_district").change(function(){
      return validatetext('emis_stu_idcard_district','emis_stu_idcard_district_alert'); 
});   });
$(document).ready(function(){  // function call for validate company name 
    $("#emis_stu_idcard_pincode").keyup(function(){
      return validatenumber('emis_stu_idcard_pincode','emis_stu_idcard_pincode_alert'); 
});   });


$(document).ready(function(){  // function call for validate company name 
    $("#emis_idcard_edit_sub").click(function(){ 

      var adhar = 2; var enroll = 2; var notappiled = 2;  var guardianname1=2;
        var mothername1=2;
        var fathername1=2;

      var pincode    = validatenumber('emis_stu_idcard_pincode','emis_stu_idcard_pincode_alert');   
      var district   = validatetext('emis_stu_idcard_district','emis_stu_idcard_district_alert');
      var city    = validatetext('emis_stu_idcard_city','emis_stu_idcard_city_alert');   
      var area   = validatetext('emis_stu_idcard_area','emis_stu_idcard_area_alert');
      var door    = validatetext('emis_stu_idcard_door','emis_stu_idcard_door_alert');   
      var section   = validatetext('emis_stu_idcard_section','emis_stu_idcard_section_alert');
      var classname    = validatetext('emis_stu_idcard_class','emis_stu_idcard_class_alert');   
      var blood   = validatetext('emis_stu_idcard_blood','emis_stu_idcard_blood_alert');
      var dobdate    = validdob('emis_stu_idcard_date','emis_stu_idcard_month','emis_stu_idcard_year','emis_stu_idcard_date_alert');

      if( pincode==0 || district==0 || city==0 || area==0 || door==0 || section==0
      || classname==0 || blood==0 || dobdate==0){
         return false;
      }
      var isCheckedaadhaar = $("#emis_stu_idcard_adharadio").is(":checked");
      var isCheckedenroll = $("#emis_stu_idcard_enrolradio").is(":checked");
      var isCheckednoapplied = $("#emis_stu_idcard_noappliedradio").is(":checked");

      if(isCheckedaadhaar){
           adhar    = validateaadhaar('emis_stu_idcard_adhaar','emis_stu_idcard_adhaar_alert');
           $("#emis_stu_idcard_enroll_alert").html("");
        }else if(isCheckedenroll){
          enroll   = validatenumber('emis_stu_idcard_enroll','emis_stu_idcard_enroll_alert');
          $("#emis_stu_idcard_adhaar_alert").html("");
        }else if(isCheckednoapplied){
          notappiled = validatetext('emis_stu_idcard_notapplied','emis_stu_idcard_notapplied_alert');
          $("#emis_stu_idcard_adhaar_alert").html("");
          $("#emis_stu_idcard_enroll_alert").html("");
        }else{
        alert('Select any one of Aadhaar or Enroll or Not applied!');
        $("#emis_stu_idcard_adhaar_alert").html("Select any one of Aadhaar or Enroll or Not applied!");
       adhar=0;
        enroll=0;
        }


        var fathername = $("#emis_stu_idcard_father").val();
        var mothername = $("#emis_stu_idcard_mother").val();
        var guardianname = $("#emis_stu_idcard_guardian").val();

       if(fathername!=""){
       fathername1  =validatetext('emis_stu_idcard_father','emis_stu_idcard_father_alert');
       } else if(mothername!=""){
         mothername1    = validatetext('emis_stu_idcard_mother','emis_stu_idcard_mother_alert');
       } else if(guardianname!=""){
        guardianname1  = validatetext('emis_stu_idcard_guardian','emis_stu_idcard_guardian_alert');
      } else{
         $("#emis_stu_idcard_father_alert").html("Note: Father name or Mother name or Guardian name Either one is mandatory!");
         $("#emis_stu_idcard_mother_alert").html("");
          $("#emis_stu_idcard_guardian_alert").html("");
         guardianname1=0;
         mothername1=0;
         fathername1=0;
      }

      var gender   = validatetext('emis_stu_idcard_gender','emis_stu_idcard_gender_alert');
      var name   =  validatetext('emis_stu_idcard_name','emis_stu_idcard_name_alert');

      var imageval=  $("#emis_stu_idcard_image").val();
      var image = 2;
      if(imageval!=""){
         image   =  validatetext('emis_stu_idcard_image','emis_stu_idcard_image_alert');
      }else{
         image = validate_fileupload('idcardimage','emis_stu_idcard_image_alert');
      }

      if( enroll==0 || adhar==0 || guardianname1==0 || 
        mothername1==0 || fathername1==0 || gender==0 || name==0 || image== 0  )
      {
        return false;
      } 

      // alert('success');

      

});    });








