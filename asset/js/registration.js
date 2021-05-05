
$(document).ready(function(){  // function call for auto pop community
    $("#emis_reg_religion").change(function(){
     

     var emis_religion = $("#emis_reg_religion").val();

 $.ajax({
        type: "POST",
        url:baseurl+'Registration/getcommunitybyreligion',
        data:"&religion="+emis_religion,
        success: function(resp){     

        document.getElementById("emis_reg_community").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});   });


$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_community").change(function(){
     

     var subcaste = $("#emis_reg_community").val();

 $.ajax({
        type: "POST",
        url:baseurl+'Registration/getsubcastebycomm',
        data:"&subcaste="+subcaste,
        success: function(resp){     

        document.getElementById("emis_reg_subcaste").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});   });

$(document).ready(function(){
	// function call for auto pop subcaste
    $("#emis_class_studying").change(function(){   
    
     var classstd = $("#emis_class_studying").val();
     console.log(classstd);
      var prevclass=Number(classstd)-Number(1);
      var prevclasstd=getclassstd(prevclass);

      var valuess="";
      var indexval=0;
      prevclasstd.forEach(function(entry) {
         indexval=prevclasstd.indexOf(entry)+1;
         valuess= valuess+"<option value='"+indexval+"'>"+entry+"</option>" 
      });

       //$comms="<select  class='form-control' tabindex='1' id='emis_prev_class' name='emis_prev_class'>"+valuess+"<option value='0'>N/A</option></select>";

      //document.getElementById("emis_prev_class").innerHTML=$comms;

      if(classstd==11 || classstd==12 ){
       $('.groupcode11').css('display','block');
       }else{
       $('.groupcode11').css('display','none');
      }

       // if(classstd == 13 || classstd == 14 || classstd == 15) 
       // {
        // document.getElementById("emis_reg_stu_section").innerHTML="<select  class='form-control' tabindex='1' id='emis_reg_stu_section_edit' name='emis_reg_stu_section_edit'><option value='' style='color:#bfbfbf;'>பிரிவு *</option><option value='A'>N/A</option>  </select>";
       // }
       // else{
        $.ajax({
        type: "POST",
        url:baseurl+'Registration/getallsectionsbyclass',
        data:"&classid="+classstd,
        success: function(resp){     
       // alert(resp);
        document.getElementById("emis_reg_stu_section").innerHTML=resp;
         return true;  
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        }
        });
      // }



});   });

function getclassstd(std){
  var temp=[];
  if(std==0){
    temp=['I'];
  }else if(std==1){
    temp=['I','II'];
  }else if(std==2){
    temp=['I','II','III'];
  }else if(std==3){
    temp=['I','II','III','IV'];
  }else if(std==4){
    temp=['I','II','III','IV','V'];
  }else if(std==5){
    temp=['I','II','III','IV','V','VI'];
  }else if(std==6){
    temp=['I','II','III','IV','V','VI','VII'];
  }else if(std==7){
    temp=['I','II','III','IV','V','VI','VII','VIII'];
  }else if(std==8){
    temp=['I','II','III','IV','V','VI','VII','VIII','IX'];
  }else if(std==9){
    temp=['I','II','III','IV','V','VI','VII','VIII','IX','X'];
  }else if(std==10){
    temp=['I','II','III','IV','V','VI','VII','VIII','IX','X','XI'];
  }else if(std==11){
    temp=['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
  }
 
  return temp;
}

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub1").change(function(){  

     return validncomparetext5('emis_reg_cbsc_sub1','emis_reg_cbsc_sub2','emis_reg_cbsc_sub3','emis_reg_cbsc_sub4',
      'emis_reg_cbsc_sub5','emis_reg_cbsc_sub1_alert');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub2").change(function(){  

     return validncomparetext5('emis_reg_cbsc_sub2','emis_reg_cbsc_sub1','emis_reg_cbsc_sub3','emis_reg_cbsc_sub4',
      'emis_reg_cbsc_sub5','emis_reg_cbsc_sub2_alert');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub3").change(function(){ 

     return validncomparetext5('emis_reg_cbsc_sub3','emis_reg_cbsc_sub2','emis_reg_cbsc_sub1','emis_reg_cbsc_sub4',
      'emis_reg_cbsc_sub5','emis_reg_cbsc_sub3_alert');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub4").change(function(){ 

     return validncomparetext5('emis_reg_cbsc_sub4','emis_reg_cbsc_sub2','emis_reg_cbsc_sub3','emis_reg_cbsc_sub1',
      'emis_reg_cbsc_sub5','emis_reg_cbsc_sub4_alert');

});   });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_reg_cbsc_sub5").change(function(){ 

     return validncomparetext5('emis_reg_cbsc_sub5','emis_reg_cbsc_sub2','emis_reg_cbsc_sub3','emis_reg_cbsc_sub4',
      'emis_reg_cbsc_sub1','emis_reg_cbsc_sub5_alert');

});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_name").keyup(function(){
      return validatetextonly('emis_reg_stu_name','emis_reg_stu_name_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_tamilname").keyup(function(){
      return validatetext('emis_reg_stu_tamilname','emis_reg_stu_nametamil_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_idname").keyup(function(){
      return validatetextonly('emis_reg_stu_idname','emis_reg_stu_idname_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_idnametamil").keyup(function(){
      return validatetext('emis_reg_stu_idnametamil','emis_reg_stu_idnametamil_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_aadhaar").keyup(function(){
      return validateaadhaar('emis_reg_stu_aadhaar','emis_reg_stu_aadhaar_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_date").change(function(){
      return  validdob('emis_reg_stu_date', 'emis_reg_stu_month','emis_reg_stu_year', 'emis_reg_stu_date_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_month").change(function(){
      return  validdob('emis_reg_stu_date', 'emis_reg_stu_month','emis_reg_stu_year', 'emis_reg_stu_date_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_year").change(function(){
      return  validdob('emis_reg_stu_date', 'emis_reg_stu_month','emis_reg_stu_year', 'emis_reg_stu_date_alert');
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_gender").change(function(){
      return validatetext('emis_reg_stu_gender','emis_reg_stu_gender_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_religion").change(function(){
      return validatetext('emis_reg_religion','emis_reg_religion_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_community").change(function(){
      return validatetext('emis_reg_community','emis_reg_community_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_subcaste").change(function(){
      return validatetext('emis_reg_subcaste','emis_reg_subcaste_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_lang").change(function(){
      return validatetext('emis_reg_stu_lang','emis_reg_stu_lang_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_disad_group").change(function(){
      return validatetext('emis_disad_group','emis_disad_group_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_disad_group_name").change(function(){
      return validatetext('emis_disad_group_name','emis_disad_group_name_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_disability_type").change(function(){
      return validatetext('emis_disability_type','emis_disability_type_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_disability_type_name").change(function(){
      return validatetext('emis_disability_type_name','emis_disability_type_name_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_mothername").keyup(function(){
      return validatetextonly('emis_reg_mothername','emis_reg_mothername_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_fathername").keyup(function(){
      return validatetextonly('emis_reg_fathername','emis_reg_fathername_alert');
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_guardianname").keyup(function(){
      return validatetextonly('emis_reg_guardianname','emis_reg_guardianname_alert');
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_fatheroccu").change(function(){
      return validatetext('emis_reg_fatheroccu','emis_reg_fatheroccu_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_motheroccu").change(function(){
      return validatetext('emis_reg_motheroccu','emis_reg_motheroccu_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_parents_income").change(function(){
      return validatetext('emis_reg_parents_income','emis_reg_parents_income_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_mobile").keyup(function(){
      return validmobile('emis_reg_mobile','emis_reg_mobile_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_email").keyup(function(){
      return validemailid('emis_reg_email','emis_reg_email_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_door").keyup(function(){
      return validateaddress('emis_reg_stu_door','emis_reg_stu_door_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_street").keyup(function(){
      return validateaddress('emis_reg_stu_street','emis_reg_stu_street_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_city").keyup(function(){
      return validateaddress('emis_reg_stu_city','emis_reg_stu_city_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_district").change(function(){
      return validatetext('emis_reg_stu_district','emis_reg_stu_district_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_pincode").keyup(function(){
      return validpincode('emis_reg_stu_pincode','emis_reg_stu_pincode_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_class_studying").change(function(){
      return validatetext('emis_class_studying','emis_class_studying_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_section").change(function(){
      return validatetext('emis_reg_stu_section','emis_reg_stu_section_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_prev_class").change(function(){
      return validatetext('emis_prev_class','emis_prev_class_alert'); 
});   });

// $(document).ready(function(){  // function call for validate company name 
//     $("#emis_reg_stu_passfail").change(function(){
//       return validatetext('emis_reg_stu_passfail','emis_reg_stu_passfail_alert'); 
// });   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_admission").keyup(function(){
      return validatenumber('emis_reg_stu_admission','emis_reg_stu_admission_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_doj_date").change(function(){
      return validdob('emis_reg_doj_date', 'emis_reg_doj_month','emis_reg_doj_year', 'emis_reg_doj_date_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_doj_month").change(function(){
      return validdob('emis_reg_doj_date', 'emis_reg_doj_month','emis_reg_doj_year', 'emis_reg_doj_date_alert');  
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_doj_year").change(function(){
      return validdob('emis_reg_doj_date', 'emis_reg_doj_month','emis_reg_doj_year', 'emis_reg_doj_date_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_mediofinst").change(function(){
      return validatetext('emis_reg_mediofinst','emis_reg_mediofinst_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_grup_code").change(function(){
      return validatetext('emis_reg_grup_code','emis_reg_grup_code_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_rte").change(function(){
      return validatetext('emis_reg_stu_rte','emis_reg_stu_rte_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_aidunaid").change(function(){
      return validatetext('emis_reg_stu_aidunaid','emis_reg_stu_aidunaid_alert'); 
});   });

  function aadhaarverification(){
     var aadhaar  = $("#emis_reg_stu_aadhaar").val();
     if(aadhaar != "" && aadhaar!=0){
     var tempvar = "";
      $.ajax({
        type: "POST",
        url:baseurl+'Registration/aadhaarverification',
        data:"&aadhaar="+aadhaar,
        success: function(resp){ 
        if(resp == 1) {
        alert("Aadhaar Number is already exist, Please use Student search to find this student.");
        $("#emis_stu_idcard_adharadio").focus();
        tempvar = 0; 
        }
        else
        {
        tempvar = 1; 
        }

   
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
    if(tempvar == 0)
      {return false; }
    else { return true; }
  }
  }

$(document).ready(function(){  // function call for validate company name 
    $("#emis_reg_stu_sub").click(function(){ 

        var aadhaar          = $("#emis_reg_stu_aadhaar").val();
        var classstudying    = $("#emis_class_studying").val();
      
              // if((classstudying !=1 && classstudying != "") && aadhaar == "")
              // {
              //   alert("Note: Aadhaar Number is mandatory for the students who are all studying in 2nd standard to 12th standard")
              //   return false;
              // }       

        var stuadhaar=2;
        var stuemail=2;
        var guardianname1=2;
        var mothername1=2;
        var fathername1=2;
        var distypename=2;
        var disabgriuname=2;
        var cbscsub5     = 2;
        var cbscsub4    = 2;
        var cbscsub3   = 2; 
        var cbscsub2   = 2;
        var cbscsub1    = 2;
        var sturte   = 2;
        var aidedunaided  = 2;
        var stugroucode = 2;


        var dissunaided = $("#emis_reg_stu_rte_hidden").val();
           if(dissunaided=="Un-aided"){
            sturte  = validatetext('emis_reg_stu_rte','emis_reg_stu_rte_alert');

           }
           if(dissunaided=='Aided'){
            aidedunaided  = validatetext('emis_reg_stu_aidunaid','emis_reg_stu_aidunaid_alert');
           }


        var selectclass1 = $("#emis_class_studying").val();

          if(selectclass1==11 || selectclass1==12){
             var groupcateid = $("#groupcateid").val();

               if(groupcateid=="11" || groupcateid=="12" || groupcateid=="28" || groupcateid=="29" ||groupcateid=="33" || groupcateid=="34"){

                  cbscsub5     = validncomparetext5('emis_reg_cbsc_sub5','emis_reg_cbsc_sub2','emis_reg_cbsc_sub3','emis_reg_cbsc_sub4',
              'emis_reg_cbsc_sub1','emis_reg_cbsc_sub5_alert'); 
                   cbscsub4     = validncomparetext5('emis_reg_cbsc_sub4','emis_reg_cbsc_sub2','emis_reg_cbsc_sub3','emis_reg_cbsc_sub1',
              'emis_reg_cbsc_sub5','emis_reg_cbsc_sub4_alert');
                   cbscsub3     = validncomparetext5('emis_reg_cbsc_sub3','emis_reg_cbsc_sub2','emis_reg_cbsc_sub1','emis_reg_cbsc_sub4',
              'emis_reg_cbsc_sub5','emis_reg_cbsc_sub3_alert');
                   cbscsub2     = validncomparetext5('emis_reg_cbsc_sub2','emis_reg_cbsc_sub1','emis_reg_cbsc_sub3','emis_reg_cbsc_sub4',
              'emis_reg_cbsc_sub5','emis_reg_cbsc_sub2_alert');
                   cbscsub1     = validncomparetext5('emis_reg_cbsc_sub1','emis_reg_cbsc_sub2','emis_reg_cbsc_sub3','emis_reg_cbsc_sub4',
              'emis_reg_cbsc_sub5','emis_reg_cbsc_sub1_alert');

              if(  cbscsub5 == 0 || cbscsub4 == 0 || cbscsub3==0 ||  cbscsub2==0 || cbscsub1 == 0)  {  return false;  }
               }else{
                stugroucode      = validatetext('emis_reg_grup_code','emis_reg_grup_code_alert'); 
                if(  stugroucode == 0 )  {  return false;  }
               }
            }

            var stumoind       = validatetext('emis_reg_mediofinst','emis_reg_mediofinst_alert'); 
            var date          = validdob('emis_reg_doj_date', 'emis_reg_doj_month','emis_reg_doj_year', 'emis_reg_doj_date_alert');  
            var stuadmis      = validatenumber('emis_reg_stu_admission','emis_reg_stu_admission_alert');       
            var stuprev      = validatetext('emis_prev_class','emis_prev_class_alert'); 
            var stusect      = validatetext('emis_reg_stu_section','emis_reg_stu_section_alert'); 
            var stuclass      = validatetext('emis_class_studying','emis_class_studying_alert'); 

            var stupin       = validatetext('emis_reg_stu_pincode','emis_reg_stu_pincode_alert'); 
            var studistrict      = validatetext('emis_reg_stu_district','emis_reg_stu_district_alert'); 
            var stucity       = validateaddress('emis_reg_stu_city','emis_reg_stu_city_alert');  
            var stustreet       = validateaddress('emis_reg_stu_street','emis_reg_stu_street_alert'); 
            var studoor      = validateaddress('emis_reg_stu_door','emis_reg_stu_door_alert'); 
            // var stuemail       = validemailid('emis_reg_email','emis_reg_email_alert');
            var stumobile      = validmobile('emis_reg_mobile','emis_reg_mobile_alert'); 

            // var parentincome       = validatetext('emis_reg_parents_income','emis_reg_parents_income_alert'); 
            // var motheroccu      = validatetext('emis_reg_motheroccu','emis_reg_motheroccu_alert');  
            // var fathoccu       = validatetext('emis_reg_fatheroccu','emis_reg_fatheroccu_alert');
            // var guardianname      = validatetextonly('emis_reg_guardianname','emis_reg_guardianname_alert');  
            // var fathername  = validatetextonly('emis_reg_fathername','emis_reg_fathername_alert'); 
            // var mothername    = validatetextonly('emis_reg_mothername','emis_reg_mothername_alert'); 

            var fathername = $("#emis_reg_fathername").val();
            var mothername = $("#emis_reg_mothername").val();
            var guardianname = $("#emis_reg_guardianname").val();

               if(fathername!=""){
               fathername1  = validatetextonly('emis_reg_fathername','emis_reg_fathername_alert');
               } else if(mothername!="") {
                 mothername1    = validatetextonly('emis_reg_mothername','emis_reg_mothername_alert');
               } else if(guardianname!="") {
                guardianname1  = validatetextonly('emis_reg_guardianname','emis_reg_guardianname_alert');
               } else {
                 $("#emis_reg_mothername_alert").html("Note: Father name or Mother name or Guardian name Either one is mandatory!");
                 guardianname1=0;
                 mothername1=0;
                 fathername1=0;
               }

            var laungauge      = validatetext('emis_reg_stu_lang','emis_reg_stu_lang_alert'); 
            var subcaste    = validatetext('emis_reg_subcaste','emis_reg_subcaste_alert');  
            var community        = validatetext('emis_reg_community','emis_reg_community_alert');  
            var religion   = validatetext('emis_reg_religion','emis_reg_religion_alert');
            var gender        = validatetext('emis_reg_stu_gender','emis_reg_stu_gender_alert'); 


            var dob    = validdob('emis_reg_stu_date', 'emis_reg_stu_month','emis_reg_stu_year', 'emis_reg_stu_date_alert'); 

            // var stuname_id_tamil  = validatetext('emis_reg_stu_idnametamil','emis_reg_stu_idnametamil_alert');    
            // var stuname_tamil     = validatetext('emis_reg_stu_tamilname','emis_reg_stu_nametamil_alert'); 
            var stuname_id        = validatetextonly('emis_reg_stu_idname','emis_reg_stu_idname_alert'); 
            var stuname           = validatetextonly('emis_reg_stu_name','emis_reg_stu_name_alert'); 

            var isCheckedaadhaar = $("#emis_stu_idcard_adharadio").is(":checked");
            var isCheckedenroll = $("#emis_stu_idcard_enrolradio").is(":checked");
            var isCheckednoapplied = $("#emis_stu_idcard_noappliedradio").is(":checked");

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



                if(aadhaar != ""){
                  var stuadhaar        = validateaadhaar('emis_reg_stu_aadhaar','emis_reg_stu_aadhaar_alert');
                  // if(stuadhaar !=0)
                  // {
                  //  aadhaarveri =    aadhaarverification();
                  //  if(aadhaarveri == 0)
                  //  {
                  //   return false;
                  //  }
                  // }
                }
        

      // var stutaminame   = validatetext('emis_reg_stu_tamilname','emis_reg_stu_tamilname_alert'); 
     


                    if(  stuadhaar == 0 || stuname == 0 || stuname_id==0 ||  dob==0 || gender == 0 || religion == 0 || community == 0 || subcaste == 0 || 
                    laungauge == 0 || stumobile == 0  || stuemail == 0 || studoor==0 || stustreet == 0  || studistrict==0 || stucity==0 ||
                    stupin == 0  || stuclass == 0 || stusect==0 || stuprev == 0  || stuadmis==0 || date == 0  || stumoind==0 || 
                    stugroucode==0 || cbscsub1 == 0 ||   cbscsub2 == 0 || cbscsub3==0 || cbscsub4 == 0 || cbscsub5 == 0 || guardianname1==0 || 
                    mothername1==0 || fathername1==0 || fathername1==0 || distypename==0 || disabgriuname==0  ||
                    aidedunaided == 0 || sturte ==0)
                       {
                             return false;
                       }

                  $('#emis_reg_stu_sub').css('display','none');


      // alert('success');


      // var data1 = new FormData($('#emis_stu_reg_form')[0]); 

      // $.ajax({
      // type: "POST",
      // url:baseurl+'Registration/emis_student_data_register',
      // data:data1,
      // success: function(resp){
      // // if(resp==true){
      //    window.location.href = baseurl+'Registration/emis_student_reg_msg';  
      // // } else {
      // //   alert('This Student Already in common Area. Please Try some one.');
      // //   return false;
      // // }       
      
      //  },
      // error: function(e){ 
      // return false;  
      
      // }
      // });

     

     });    }); 














