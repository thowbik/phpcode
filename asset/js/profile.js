    $(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_bank_district").change(function(){
     
    var distcode = $("#emis_prof_bank_district").val();
      $('#emis_prof_bank_name').empty();
     $('#emis_prof_branch_name').empty();
// alert(distcode);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getbankbydistcode',
        data:"&distcode="+distcode,
        success: function(resp){     
        document.getElementById("emis_prof_bank_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
});   });
$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_bank_name").change(function(){
     
  
     var bankid = $("#emis_prof_bank_name").val();
     $('#emis_prof_branch_name').empty();
// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getbranchbybankid',
        data:"&bankid="+bankid,
        success: function(resp){     
        document.getElementById("emis_prof_branch_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
});   });





$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_mangement_maj_cat").change(function(){
     
  
     var id = $("#emis_mangement_maj_cat").val();
     $('#emis_mangement_sub_cat').empty();
     $('#emis_mangement_directorate').empty();
     $('#emis_school_cat').empty();


// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getsubbymajorcategory',
        data:"&mana_cate_id="+id,
        success: function(resp){     

        document.getElementById("emis_mangement_sub_cat").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });



$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_mangement_sub_cat").change(function(){
     
  
     var id = $("#emis_mangement_sub_cat").val();
     $('#emis_mangement_directorate').empty();
     $('#emis_school_cat').empty();

// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getdirectoratebysub',
        data:"&school_mana_id="+id,
        success: function(resp){     

        document.getElementById("emis_mangement_directorate").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });

 

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_mangement_directorate").change(function(){
     
  
     var id = $("#emis_mangement_directorate").val();
     $('#emis_school_cat').empty();

// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getschoolcategorybydirectorate',
        data:"&school_dept_id="+id,
        success: function(resp){     

        document.getElementById("emis_school_cat").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });

//1 Revenue District

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_revenue_district").change(function(){
     
     alert("Once the District changes are saved , You will not able able to edit this school again");
     var id = $("#emis_prof_revenue_district").val();

     $('#emis_prof_block_name').empty();
     $('#emis_prof_cluster_name').empty();
     $('#emis_prof_edu_district_name').empty();
     $('#emis_prof_local_body_admin_name').empty();
     $('#emis_prof_village_panchayat_name').empty();
     $('#emis_prof_village_habitation_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();

      $('#emis_prof_corporation_name').empty();
     $('#emis_prof_corporation_zone_name').empty();
     $('#emis_prof_corporation_ward_name').empty();
     $('#emis_municipality_name').empty();
     $('#emis_municipality_ward_name').empty();
     $('#emis_prof_town_panchayat_name').empty();
     $('#emis_prof_town_panchayat_ward_name').empty();
     $('#emis_prof_cantonement_name').empty();
     $('#emis_prof_cantonement_ward_name').empty();
     $('#emis_prof_township_name').empty();
     $('#emis_prof_township_ward_name').empty();
     



// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getblocksbydistrict',
        data:"&district_id="+id,
        success: function(resp){     

        document.getElementById("emis_prof_block_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });

//2

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_block_name").change(function(){
     
  
     var id = $("#emis_prof_block_name").val();

  //   alert("block_id"+id);
     $('#emis_prof_cluster_name').empty();
     $('#emis_prof_edu_district_name').empty();
     $('#emis_prof_local_body_admin_name').empty();
     $('#emis_prof_village_panchayat_name').empty();
     $('#emis_prof_village_habitation_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();

      $('#emis_prof_corporation_name').empty();
     $('#emis_prof_corporation_zone_name').empty();
     $('#emis_prof_corporation_ward_name').empty();
     $('#emis_municipality_name').empty();
     $('#emis_municipality_ward_name').empty();
     $('#emis_prof_town_panchayat_name').empty();
     $('#emis_prof_town_panchayat_ward_name').empty();
     $('#emis_prof_cantonement_name').empty();
     $('#emis_prof_cantonement_ward_name').empty();
     $('#emis_prof_township_name').empty();
     $('#emis_prof_township_ward_name').empty();


// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getclusterwithblock',
        data:"&blk_code_id="+id,
        success: function(resp){     

        document.getElementById("emis_prof_cluster_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });


//3

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_cluster_name").change(function(){
     
  
     var id = $("#emis_prof_block_name").val();

     $('#emis_prof_edu_district_name').empty();
     $('#emis_prof_local_body_admin_name').empty();
     $('#emis_prof_village_panchayat_name').empty();
     $('#emis_prof_village_habitation_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();

      $('#emis_prof_corporation_name').empty();
     $('#emis_prof_corporation_zone_name').empty();
     $('#emis_prof_corporation_ward_name').empty();
     $('#emis_municipality_name').empty();
     $('#emis_municipality_ward_name').empty();
     $('#emis_prof_town_panchayat_name').empty();
     $('#emis_prof_town_panchayat_ward_name').empty();
     $('#emis_prof_cantonement_name').empty();
     $('#emis_prof_cantonement_ward_name').empty();
     $('#emis_prof_township_name').empty();
     $('#emis_prof_township_ward_name').empty();

  //  alert("block_id"+id);

// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/get_edu_district_with_block',
        data:"&block_id="+id,
        success: function(resp){     

        document.getElementById("emis_prof_edu_district_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });

//4

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_edu_district_name").change(function(){
     
  
     var id = $("#emis_prof_revenue_district").val();

     $('#emis_prof_local_body_admin_name').empty();
     $('#emis_prof_village_panchayat_name').empty();
     $('#emis_prof_village_habitation_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();

      $('#emis_prof_corporation_name').empty();
     $('#emis_prof_corporation_zone_name').empty();
     $('#emis_prof_corporation_ward_name').empty();
     $('#emis_municipality_name').empty();
     $('#emis_municipality_ward_name').empty();
     $('#emis_prof_town_panchayat_name').empty();
     $('#emis_prof_town_panchayat_ward_name').empty();
     $('#emis_prof_cantonement_name').empty();
     $('#emis_prof_cantonement_ward_name').empty();
     $('#emis_prof_township_name').empty();
     $('#emis_prof_township_ward_name').empty();


// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getlocalbodyadminbydistrct',
        data:"&district_id="+id,
        success: function(resp){     

        document.getElementById("emis_prof_local_body_admin_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });

//5

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_local_body_admin_name").change(function(){
     
  
     var vilid = $("#emis_prof_block_name").val();
     var id = $("#emis_prof_revenue_district").val();
//empty all dependents

     $('#emis_prof_village_panchayat_name').empty();
     $('#emis_prof_village_habitation_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();

     $('#emis_prof_corporation_name').empty();
     $('#emis_prof_corporation_zone_name').empty();
     $('#emis_prof_corporation_ward_name').empty();
     $('#emis_municipality_name').empty();
     $('#emis_municipality_ward_name').empty();
     $('#emis_prof_town_panchayat_name').empty();
     $('#emis_prof_town_panchayat_ward_name').empty();
     $('#emis_prof_cantonement_name').empty();
     $('#emis_prof_cantonement_ward_name').empty();
     $('#emis_prof_township_name').empty();
     $('#emis_prof_township_ward_name').empty();

//clear all required field entries

     document.getElementById("emis_prof_village_panchayat_name").required = false;
     document.getElementById("emis_prof_village_habitation_name").required = false;
     document.getElementById("emis_prof_corporation_name").required = false;
     document.getElementById("emis_prof_corporation_zone_name").required = false;
     document.getElementById("emis_prof_corporation_ward_name").required = false;
     document.getElementById("emis_municipality_name").required = false;
     document.getElementById("emis_municipality_ward_name").required = false;
     document.getElementById("emis_prof_town_panchayat_name").required = false;
     document.getElementById("emis_prof_town_panchayat_ward_name").required = false;
     document.getElementById("emis_prof_cantonement_name").required = false;
     document.getElementById("emis_prof_cantonement_ward_name").required = false;
     document.getElementById("emis_prof_township_name").required = false;
     document.getElementById("emis_prof_township_ward_name").required = false;
     
    // hide all the divs
    $(".villagediv").hide();
    $(".municipality").hide();
    $(".townpanchayat").hide();
    $(".cantonment").hide();
    $(".corporation").hide();
    $(".township").hide();

    //start if else to check the localbodyadmin values

     var val = $("#emis_prof_local_body_admin_name option:selected").text();
     if(val == "Village Panchayat")
     {
        $(".villagediv").show();
        document.getElementById("emis_prof_village_panchayat_name").required = true;
        document.getElementById("emis_prof_village_habitation_name").required = true;
        // alert(bankid);
         $.ajax({
                type: "POST",
                url:baseurl+'Basic/getvillagebyblock',
                data:"&block_id="+vilid,
                success: function(resp){     

                document.getElementById("emis_prof_village_panchayat_name").innerHTML=resp;
                 return true;  
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  
                
                }
                }); 
    }
    else if(val == "Municipality")
    {
        $(".municipality").show();
        document.getElementById("emis_municipality_name").required = true;
        document.getElementById("emis_municipality_ward_name").required = true;
         $.ajax({
                type: "POST",
                url:baseurl+'Basic/getmunicipalitybydistrict',
                data:"&district_id="+id,
                success: function(resp){     

                document.getElementById("emis_municipality_name").innerHTML=resp;
                 return true;  
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  
                
                }
                }); 

    }
    else if(val == "Town Panchayat")
    {
        $(".townpanchayat").show();
        document.getElementById("emis_prof_town_panchayat_name").required = true;
        document.getElementById("emis_prof_town_panchayat_ward_name").required = true;
         $.ajax({
                type: "POST",
                url:baseurl+'Basic/gettownpanchayatbydistrict',
                data:"&district_id="+id,
                success: function(resp){     

                document.getElementById("emis_prof_town_panchayat_name").innerHTML=resp;
                 return true;  
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  
                
                }
                }); 

    }
    else if(val == "Cantonment")
    {
        $(".cantonment").show();
        document.getElementById("emis_prof_cantonement_name").required = true;
        document.getElementById("emis_prof_cantonement_ward_name").required = true;
         $.ajax({
                type: "POST",
                url:baseurl+'Basic/getcantonementbydistrict',
                data:"&district_id="+id,
                success: function(resp){     

                document.getElementById("emis_prof_cantonement_name").innerHTML=resp;
                 return true;  
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  
                
                }
                }); 


    }
    else if(val == "Extended Chennai Corporation" || val == "Corporation" )
    {
        $(".corporation").show();
        document.getElementById("emis_prof_corporation_name").required = true;
        document.getElementById("emis_prof_corporation_zone_name").required = true;
        document.getElementById("emis_prof_corporation_ward_name").required = true;
         $.ajax({
                type: "POST",
                url:baseurl+'Basic/getcorporationbydistrict',
                data:"&district_id="+id,
                success: function(resp){     

                document.getElementById("emis_prof_corporation_name").innerHTML=resp;
                 return true;  
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  
                
                }
                }); 
                
    }
    else if(val == "Township")
    {
        $(".township").show();
        document.getElementById("emis_prof_township_name").required = true;
        document.getElementById("emis_prof_township_ward_name").required = true;
         $.ajax({
                type: "POST",
                url:baseurl+'Basic/gettownshipbydistrict',
                data:"&district_id="+id,
                success: function(resp){     

                document.getElementById("emis_prof_township_name").innerHTML=resp;
                 return true;  
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  
                
                }
                }); 
    }    

})  


 });

//6

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_village_panchayat_name").change(function(){
     
  
     var id = $("#emis_prof_village_panchayat_name").val();

     $('#emis_prof_village_habitation_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();


// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getvilhabbyvilpan',
        data:"&village_panchayat_id="+id,
        success: function(resp){     

        document.getElementById("emis_prof_village_habitation_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_municipality_name").change(function(){
     
  
     var id = $("#emis_municipality_name").val();

     $('#emis_municipality_ward_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();


// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getmunicipalwardbyid',
        data:"&municipality_id="+id,
        success: function(resp){     

        document.getElementById("emis_municipality_ward_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_town_panchayat_name").change(function(){
     
  
     var id = $("#emis_prof_town_panchayat_name").val();

     $('#emis_prof_town_panchayat_ward_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();


// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/gettownpanchayatwardbyid',
        data:"&townpanchayat_id="+id,
        success: function(resp){     

        document.getElementById("emis_prof_town_panchayat_ward_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_cantonement_name").change(function(){
     
  
     var id = $("#emis_prof_cantonement_name").val();

     $('#emis_prof_cantonement_ward_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();


// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getcontonmentwardbyid',
        data:"&contonment_id="+id,
        success: function(resp){     

        document.getElementById("emis_prof_cantonement_ward_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_township_name").change(function(){
     
  
     var id = $("#emis_prof_township_name").val();

     $('#emis_prof_township_ward_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();


// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/gettownshipbyid',
        data:"&township_id="+id,
        success: function(resp){     

        document.getElementById("emis_prof_township_ward_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });
$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_corporation_name").change(function(){
     
  
     var id = $("#emis_prof_corporation_name").val();

     $('#emis_prof_corporation_ward_name').empty();
      $('#emis_prof_corporation_zone_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();


// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getcorporationzonenamebyid',
        data:"&corporation_id="+id,
        success: function(resp){     

        document.getElementById("emis_prof_corporation_zone_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_corporation_zone_name").change(function(){
     
  
     var id = $("#emis_prof_corporation_zone_name").val();

     $('#emis_prof_corporation_ward_name').empty();
     $('#emis_prof_assembly_name').empty();
     $('#emis_prof_parliment_constituency_name').empty();


// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getcoporationwardbyzone',
        data:"&corporation_zone="+id,
        success: function(resp){     

        document.getElementById("emis_prof_corporation_ward_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });
//7
$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_village_habitation_name").change(function(){
     
  
     var id = $("#emis_prof_revenue_district").val();

     if( document.getElementById("emis_prof_assembly_name") != null)
    {

             $('#emis_prof_assembly_name').empty();
             $('#emis_prof_parliment_constituency_name').empty();


        // alert(bankid);
         $.ajax({
                type: "POST",
                url:baseurl+'Basic/getassemblybydistrict',
                data:"&district_id="+id,
                success: function(resp){     

                document.getElementById("emis_prof_assembly_name").innerHTML=resp;
                 return true;  
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  
                
                }
                });
    }

});  



 });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_municipality_ward_name").change(function(){
     
  
     var id = $("#emis_prof_revenue_district").val();
     if( document.getElementById("emis_prof_assembly_name") != null)
    { 
             $('#emis_prof_assembly_name').empty();
             $('#emis_prof_parliment_constituency_name').empty();


        // alert(bankid);
         $.ajax({
                type: "POST",
                url:baseurl+'Basic/getassemblybydistrict',
                data:"&district_id="+id,
                success: function(resp){     

                document.getElementById("emis_prof_assembly_name").innerHTML=resp;
                 return true;  
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  
                
                }
                });
    }

});  



 });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_town_panchayat_ward_name").change(function(){
     
  
     var id = $("#emis_prof_revenue_district").val();

    if( document.getElementById("emis_prof_assembly_name") != null)
    {

         $('#emis_prof_assembly_name').empty();
         $('#emis_prof_parliment_constituency_name').empty();


    // alert(bankid);
     $.ajax({
            type: "POST",
            url:baseurl+'Basic/getassemblybydistrict',
            data:"&district_id="+id,
            success: function(resp){     

            document.getElementById("emis_prof_assembly_name").innerHTML=resp;
             return true;  
                     
             },
            error: function(e){ 
            alert('Error: ' + e.responseText);
            return false;  
            
            }
            });
    }

});  




 });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_cantonement_ward_name").change(function(){
     
  
     var id = $("#emis_prof_revenue_district").val();

     if( document.getElementById("emis_prof_assembly_name") != null)
    {
             $('#emis_prof_assembly_name').empty();
             $('#emis_prof_parliment_constituency_name').empty();


        // alert(bankid);
         $.ajax({
                type: "POST",
                url:baseurl+'Basic/getassemblybydistrict',
                data:"&district_id="+id,
                success: function(resp){     

                document.getElementById("emis_prof_assembly_name").innerHTML=resp;
                 return true;  
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  
                
                }
                });
    }

});  



 });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_township_ward_name").change(function(){
     
  
     var id = $("#emis_prof_revenue_district").val();
    if( document.getElementById("emis_prof_assembly_name") != null)
    {
         $('#emis_prof_assembly_name').empty();
         $('#emis_prof_parliment_constituency_name').empty();


    // alert(bankid);
     $.ajax({
            type: "POST",
            url:baseurl+'Basic/getassemblybydistrict',
            data:"&district_id="+id,
            success: function(resp){     

            document.getElementById("emis_prof_assembly_name").innerHTML=resp;
             return true;  
                     
             },
            error: function(e){ 
            alert('Error: ' + e.responseText);
            return false;  
            
            }
            });
    }
});  



 });

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_corporation_ward_name").change(function(){
     
  
     var id = $("#emis_prof_revenue_district").val();

    if( document.getElementById("emis_prof_assembly_name") != null)
    {
             $('#emis_prof_assembly_name').empty();
             $('#emis_prof_parliment_constituency_name').empty();


        // alert(bankid);
         $.ajax({
                type: "POST",
                url:baseurl+'Basic/getassemblybydistrict',
                data:"&district_id="+id,
                success: function(resp){     

                document.getElementById("emis_prof_assembly_name").innerHTML=resp;
                 return true;  
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  
                
                }
                });
    }

});  



 });
//8

$(document).ready(function(){  // function call for auto pop subcaste
    $("#emis_prof_assembly_name").change(function(){
     
  
 
     var id = $("#emis_prof_assembly_name").val();

     $('#emis_prof_parliment_constituency_name').empty();



// alert(bankid);
 $.ajax({
        type: "POST",
        url:baseurl+'Basic/getparliamentnamebyassembly',
        data:"&assembly_id="+id,
        success: function(resp){     

        document.getElementById("emis_prof_parliment_constituency_name").innerHTML=resp;
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });

});  


 });


//New set
/*$(document).ready(function(){  // function call for auto pop subcaste
    
    $("#emis_school_class_standard").change(function(){
     
     
     //alert("hello");
         
     var id = $("#emis_school_class_standard").val();



 $.ajax({
        type: "POST",
        url:baseurl+'section/getclassdetails',
        data:"&class_id="+id,
        success: function(resp){     

         
         var result = $.parseJSON(resp);
         
         if(result != null && result.length != 0){
            $.each(result, function(a, b){
            $('#emis_no_sections').val(b.sections); 
            $("#emis_section_id").val(b.section_ids);
            $("#emis_un_aided_section_id").val(b.un_aided_section_ids) ;                 
                                     });
            $("#emis_class_section_is_new").val("0"); 
        }
        else
        {
            $('#emis_no_sections').val(""); 
            $("#emis_section_id").val("");
            $("#emis_un_aided_section_id").val("") ;
            $("#emis_class_section_is_new").val("1");                 
                                     
           
        }
              
         return true;  
                 
         },
        error: function(e){ 
        alert('Error: ' + e.responseText);
        return false;  
        
        }
        });
});   


 }); */
