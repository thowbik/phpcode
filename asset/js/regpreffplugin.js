
function enableradio(ckvalue)
{

  var loccheckedcount = $("#loccheckedcount").val(); 
   var locradiocount1 = $("#locradiocount1").val(); 
    var locradiocount2 = $("#locradiocount2").val(); 
     var locradiocount3 = $("#locradiocount3").val(); 
  var locationvalue = $('#ck'+ckvalue).val();
     var loccheckedvalue1 = $("#loccheckedvalue1").val(); 
       var loccheckedvalue2 = $("#loccheckedvalue2").val(); 
        var loccheckedvalue3 = $("#loccheckedvalue3").val(); 

    if ($('#ck'+ckvalue).attr('checked'))
      {
        $("#rd1"+ckvalue).removeAttr("disabled");
        $("#rd2"+ckvalue).removeAttr("disabled");
        $("#rd3"+ckvalue).removeAttr("disabled");
        loccheckedcount = +loccheckedcount+1;
        document.getElementById('loccheckedcount').value = loccheckedcount;
      }
      else
      {
         if($("#rd1"+ckvalue).attr('checked')){
            document.getElementById('locradiovalue1').value = "";
            document.getElementById('locradiocount1').value = "";
          } else if($("#rd2"+ckvalue).attr('checked')) {
            document.getElementById('locradiovalue2').value = "";
            document.getElementById('locradiocount2').value = "";
          } else if($("#rd3"+ckvalue).attr('checked')) {
            document.getElementById('locradiovalue3').value = "";
            document.getElementById('locradiocount3').value = "";   }
         
          $("#rd1"+ckvalue).prop('checked', false);
          $("#rd2"+ckvalue).prop('checked', false);
          $("#rd3"+ckvalue).prop('checked', false);

          document.getElementById("rd1"+ckvalue).disabled=true;
          document.getElementById("rd2"+ckvalue).disabled=true;
          document.getElementById("rd3"+ckvalue).disabled=true;
          loccheckedcount = loccheckedcount-1;

        document.getElementById('loccheckedcount').value = loccheckedcount;     
        if((loccheckedvalue1.substr(3)) ==  locationvalue)
        { document.getElementById('loccheckedvalue1').value = "";   }
        else if((loccheckedvalue2.substr(3)) ==  locationvalue)
        { document.getElementById('loccheckedvalue2').value = "";   }
        else if((loccheckedvalue3.substr(3)) ==  locationvalue)
        { document.getElementById('loccheckedvalue3').value = "";   }
      }

      if(loccheckedcount > 3)
      {
        $("#ck"+ckvalue).prop('checked', false);
        $("#rd1"+ckvalue).prop('checked', false);
        $("#rd2"+ckvalue).prop('checked', false);
        $("#rd3"+ckvalue).prop('checked', false);      

        document.getElementById("rd1"+ckvalue).disabled=true;
        document.getElementById("rd2"+ckvalue).disabled=true;
        document.getElementById("rd3"+ckvalue).disabled=true;
        loccheckedcount = loccheckedcount-1;
        document.getElementById('loccheckedcount').value = loccheckedcount;

        $("#ca_reg_prefloc_alert").html("Select Maximum 3 Locations only...");
      }     
      else  {  $("#ca_reg_prefloc_alert").html("");  }
}

    function radioclick(ckvalue,rdname)
    {
        var locationvalue = $('#ck'+ckvalue).val();
        var loccheckedvalue1 = $("#loccheckedvalue1").val(); 
        var loccheckedvalue2 = $("#loccheckedvalue2").val(); 
        var loccheckedvalue3 = $("#loccheckedvalue3").val(); 

        var locradiocount1 = $("#locradiocount1").val(); 
        var locradiovalue1 = $("#locradiovalue1").val(); 
        var locradiocount2 = $("#locradiocount2").val(); 
        var locradiovalue2 = $("#locradiovalue2").val(); 
        var locradiocount3 = $("#locradiocount3").val(); 
        var locradiovalue3 = $("#locradiovalue3").val(); 
       if(rdname == 'rd1') 
       {
          if($("#rd1"+ckvalue).attr('checked') && locradiovalue1 != ('rd1'+ckvalue))
              {
                  locradiocount1 = +locradiocount1+1;
                  document.getElementById('locradiocount1').value = locradiocount1;

                  if(locradiovalue1 == "") {
                  document.getElementById('locradiovalue1').value = "rd1"+ckvalue;
                  document.getElementById('loccheckedvalue1').value = "rd1"+locationvalue;
                   }
              }
          else if(!$("#rd1"+ckvalue).attr('checked') && locradiovalue1 != ('rd1'+ckvalue) ){
                 locradiocount1 = locradiocount1-1;
                 document.getElementById('locradiocount1').value = locradiocount1;
                 document.getElementById('locradiovalue1').value = "";
                 document.getElementById('loccheckedvalue1').value = "";
              }

          if(locradiocount1 > 1 && locradiovalue1 != ('rd1'+ckvalue)  )
              {
                $("#rd1"+ckvalue).prop('checked', false);
                $("#ca_reg_prefloc_alert").html("Already choice 1 Selected");

                locradiocount1 = locradiocount1-1;
                document.getElementById('locradiocount1').value = locradiocount1;            
              }
          else  { $("#ca_reg_prefloc_alert").html("");  }

          if(locradiovalue2 == ('rd2'+ckvalue) )   { 
                document.getElementById('loccheckedvalue2').value = "";
                document.getElementById('locradiovalue2').value = "";
                document.getElementById('locradiocount2').value = "";    } 
             else if(locradiovalue3 == ('rd3'+ckvalue))  {
              document.getElementById('loccheckedvalue3').value = "";
               document.getElementById('locradiovalue3').value = "";
                document.getElementById('locradiocount3').value = "";     }
        }
        else if(rdname == 'rd2')
        {
          if ($("#rd2"+ckvalue).attr('checked') && locradiovalue2 != ('rd2'+ckvalue))
          {
              locradiocount2 = +locradiocount2+1;
              document.getElementById('locradiocount2').value = locradiocount2;
              if(locradiovalue2 == "") {
              document.getElementById('locradiovalue2').value = "rd2"+ckvalue;
              document.getElementById('loccheckedvalue2').value = "rd2"+locationvalue; }
          }
         else if(!$("#rd2"+ckvalue).attr('checked') && locradiovalue2 != ('rd2'+ckvalue) ){
             locradiocount2 = locradiocount2-1;
             document.getElementById('locradiocount2').value = locradiocount2;
             document.getElementById('locradiovalue2').value = "";
             document.getElementById('loccheckedvalue2').value = "";
          }

         if(locradiocount2 > 1 && locradiovalue2 != ('rd2'+ckvalue)  )
          {
            $("#rd2"+ckvalue).prop('checked', false);
             $("#ca_reg_prefloc_alert").html("Already choice 2 Selected");

             locradiocount2 = locradiocount2-1;
             document.getElementById('locradiocount2').value = locradiocount2;            
          }
         else
          {
              $("#ca_reg_prefloc_alert").html("");
          }

           if(locradiovalue1 == ('rd1'+ckvalue) )
         { 
          document.getElementById('loccheckedvalue1').value = "";
            document.getElementById('locradiovalue1').value = "";
            document.getElementById('locradiocount1').value = "";
         } 
         else if(locradiovalue3 == ('rd3'+ckvalue)){

           document.getElementById('loccheckedvalue3').value = "";
           document.getElementById('locradiovalue3').value = "";
           document.getElementById('locradiocount3').value = "";
         }

        }
         else if(rdname == 'rd3')
        {
                  if ($("#rd3"+ckvalue).attr('checked') && locradiovalue3 != ('rd3'+ckvalue))
                  {
                      locradiocount3 = +locradiocount3+1;
                      document.getElementById('locradiocount3').value = locradiocount3;
                      if(locradiovalue3 == "") {
                      document.getElementById('locradiovalue3').value = "rd3"+ckvalue;
                      document.getElementById('loccheckedvalue3').value = "rd3"+locationvalue; }
                  }
              else if(!$("#rd3"+ckvalue).attr('checked') && locradiovalue3 != ('rd3'+ckvalue) ){
                     locradiocount3 = locradiocount3-1;
                     document.getElementById('locradiocount3').value = locradiocount3;
                     document.getElementById('locradiovalue3').value = "";
                     document.getElementById('loccheckedvalue3').value = "";
                  }

              if(locradiocount3 > 1 && locradiovalue3 != ('rd3'+ckvalue)  )
                  {
                    $("#rd3"+ckvalue).prop('checked', false);
                     $("#ca_reg_prefloc_alert").html("Already choice 3 Selected");

                     locradiocount3 = locradiocount3-1;
                     document.getElementById('locradiocount3').value = locradiocount3;            
                  }
              else
                  {
                      $("#ca_reg_prefloc_alert").html("");
                  }

                   if(locradiovalue1 == ('rd1'+ckvalue) )
                 { 
                    document.getElementById('locradiovalue1').value = "";
                    document.getElementById('locradiocount1').value = "";
                    document.getElementById('loccheckedvalue1').value = "";
                 } 
                 else if(locradiovalue2 == ('rd2'+ckvalue)){

                   document.getElementById('locradiovalue2').value = "";
                   document.getElementById('locradiocount2').value = "";
                   document.getElementById('loccheckedvalue2').value = "";
                 }

        }
    }

    function jobenableradio(ckvalue)
{
      var jobcheckedcount = $("#jobcheckedcount").val(); 
      var jobradiocount1  = $("#jobradiocount1").val(); 
      var jobradiocount2  = $("#jobradiocount2").val(); 
      var jobradiocount3  = $("#jobradiocount3").val(); 
      
      var jobationvalue    = $('#jobck'+ckvalue).val();
      var jobcheckedvalue1 = $("#jobcheckedvalue1").val(); 
      var jobcheckedvalue2 = $("#jobcheckedvalue2").val(); 
      var jobcheckedvalue3 = $("#jobcheckedvalue3").val(); 

    if ($('#jobck'+ckvalue).attr('checked'))
      {
        $("#jobrd1"+ckvalue).removeAttr("disabled");
        $("#jobrd2"+ckvalue).removeAttr("disabled");
        $("#jobrd3"+ckvalue).removeAttr("disabled");
        jobcheckedcount = +jobcheckedcount+1;
        document.getElementById('jobcheckedcount').value = jobcheckedcount;
      }
      else
      {
         if($("#jobrd1"+ckvalue).attr('checked')){
            document.getElementById('jobradiovalue1').value = "";
            document.getElementById('jobradiocount1').value = "";
          } else if($("#jobrd2"+ckvalue).attr('checked')) {
            document.getElementById('jobradiovalue2').value = "";
            document.getElementById('jobradiocount2').value = "";
          } else if($("#jobrd3"+ckvalue).attr('checked')) {
            document.getElementById('jobradiovalue3').value = "";
            document.getElementById('jobradiocount3').value = "";   }
         
          $("#jobrd1"+ckvalue).prop('checked', false);
          $("#jobrd2"+ckvalue).prop('checked', false);
          $("#jobrd3"+ckvalue).prop('checked', false);

          document.getElementById("jobrd1"+ckvalue).disabled=true;
          document.getElementById("jobrd2"+ckvalue).disabled=true;
          document.getElementById("jobrd3"+ckvalue).disabled=true;
          jobcheckedcount = jobcheckedcount-1;

        document.getElementById('jobcheckedcount').value = jobcheckedcount;     
        if((jobcheckedvalue1.substr(6)) ==  jobationvalue)
        { document.getElementById('jobcheckedvalue1').value = "";   }
        else if((jobcheckedvalue2.substr(6)) ==  jobationvalue)
        { document.getElementById('jobcheckedvalue2').value = "";   }
        else if((jobcheckedvalue3.substr(6)) ==  jobationvalue)
        { document.getElementById('jobcheckedvalue3').value = "";   }
      }

      if(jobcheckedcount > 3)
      {
        $("#jobck"+ckvalue).prop('checked', false);
        $("#jobrd1"+ckvalue).prop('checked', false);
        $("#jobrd2"+ckvalue).prop('checked', false);
        $("#jobrd3"+ckvalue).prop('checked', false);      

        document.getElementById("jobrd1"+ckvalue).disabled=true;
        document.getElementById("jobrd2"+ckvalue).disabled=true;
        document.getElementById("jobrd3"+ckvalue).disabled=true;
        jobcheckedcount = jobcheckedcount-1;
        document.getElementById('jobcheckedcount').value = jobcheckedcount;

        $("#ca_reg_prefjob_alert").html("Select Maximum 3 Jobs");
      }     
      else  {  $("#ca_reg_prefjob_alert").html("");  }
}

  function jobradioclick(ckvalue,rdname)
    {
        var jobvalue = $('#jobck'+ckvalue).val();
        var jobcheckedvalue1 = $("#jobcheckedvalue1").val(); 
        var jobcheckedvalue2 = $("#jobcheckedvalue2").val(); 
        var jobcheckedvalue3 = $("#jobcheckedvalue3").val(); 

        var jobradiocount1 = $("#jobradiocount1").val(); 
        var jobradiovalue1 = $("#jobradiovalue1").val(); 
        var jobradiocount2 = $("#jobradiocount2").val(); 
        var jobradiovalue2 = $("#jobradiovalue2").val(); 
        var jobradiocount3 = $("#jobradiocount3").val(); 
        var jobradiovalue3 = $("#jobradiovalue3").val(); 
       if(rdname == 'jobrd1') 
       {
          if($("#jobrd1"+ckvalue).attr('checked') && jobradiovalue1 != ('jobrd1'+ckvalue))
              {
                  jobradiocount1 = +jobradiocount1+1;
                  document.getElementById('jobradiocount1').value = jobradiocount1;

                  if(jobradiovalue1 == "") {
                  document.getElementById('jobradiovalue1').value = "jobrd1"+ckvalue;
                  document.getElementById('jobcheckedvalue1').value = "jobrd1"+jobvalue;
                   }
              }
          else if(!$("#jobrd1"+ckvalue).attr('checked') && jobradiovalue1 != ('jobrd1'+ckvalue) ){
                 jobradiocount1 = jobradiocount1-1;
                 document.getElementById('jobradiocount1').value = jobradiocount1;
                 document.getElementById('jobradiovalue1').value = "";
                 document.getElementById('jobcheckedvalue1').value = "";
              }

          if(jobradiocount1 > 1 && jobradiovalue1 != ('jobrd1'+ckvalue)  )
              {
                $("#jobrd1"+ckvalue).prop('checked', false);
                $("#ca_reg_prefjob_alert").html("Already choice 1 Selected");

                jobradiocount1 = jobradiocount1-1;
                document.getElementById('jobradiocount1').value = jobradiocount1;            
              }
          else  { $("#ca_reg_prefjob_alert").html("");  }

          if(jobradiovalue2 == ('jobrd2'+ckvalue) )   { 
                document.getElementById('jobcheckedvalue2').value = "";
                document.getElementById('jobradiovalue2').value = "";
                document.getElementById('jobradiocount2').value = "";    } 
             else if(jobradiovalue3 == ('jobrd3'+ckvalue))  {
              document.getElementById('jobcheckedvalue3').value = "";
              document.getElementById('jobradiovalue3').value = "";
              document.getElementById('jobradiocount3').value = "";     }
        }
        else if(rdname == 'jobrd2')
        {
          if ($("#jobrd2"+ckvalue).attr('checked') && jobradiovalue2 != ('jobrd2'+ckvalue))
          {
              jobradiocount2 = +jobradiocount2+1;
              document.getElementById('jobradiocount2').value = jobradiocount2;
              if(jobradiovalue2 == "") {
              document.getElementById('jobradiovalue2').value = "jobrd2"+ckvalue;
              document.getElementById('jobcheckedvalue2').value = "jobrd2"+jobvalue; }
          }
         else if(!$("#jobrd2"+ckvalue).attr('checked') && jobradiovalue2 != ('jobrd2'+ckvalue) ){
             jobradiocount2 = jobradiocount2-1;
             document.getElementById('jobradiocount2').value = jobradiocount2;
             document.getElementById('jobradiovalue2').value = "";
             document.getElementById('jobcheckedvalue2').value = "";
          }

         if(jobradiocount2 > 1 && jobradiovalue2 != ('jobrd2'+ckvalue)  )
          {
            $("#jobrd2"+ckvalue).prop('checked', false);
             $("#ca_reg_prefjob_alert").html("Already choice 2 Selected");

             jobradiocount2 = jobradiocount2-1;
             document.getElementById('jobradiocount2').value = jobradiocount2;            
          }
         else
          {
              $("#ca_reg_prefjob_alert").html("");
          }

           if(jobradiovalue1 == ('jobrd1'+ckvalue) )
         { 
          document.getElementById('jobcheckedvalue1').value = "";
            document.getElementById('jobradiovalue1').value = "";
            document.getElementById('jobradiocount1').value = "";
         } 
         else if(jobradiovalue3 == ('jobrd3'+ckvalue)){

           document.getElementById('jobcheckedvalue3').value = "";
           document.getElementById('jobradiovalue3').value = "";
           document.getElementById('jobradiocount3').value = "";
         }

        }
         else if(rdname == 'jobrd3')
        {
                  if ($("#jobrd3"+ckvalue).attr('checked') && jobradiovalue3 != ('jobrd3'+ckvalue))
                  {
                      jobradiocount3 = +jobradiocount3+1;
                      document.getElementById('jobradiocount3').value = jobradiocount3;
                      if(jobradiovalue3 == "") {
                      document.getElementById('jobradiovalue3').value = "jobrd3"+ckvalue;
                      document.getElementById('jobcheckedvalue3').value = "jobrd3"+jobvalue; }
                  }
              else if(!$("#jobrd3"+ckvalue).attr('checked') && jobradiovalue3 != ('jobrd3'+ckvalue) ){
                     jobradiocount3 = jobradiocount3-1;
                     document.getElementById('jobradiocount3').value = jobradiocount3;
                     document.getElementById('jobradiovalue3').value = "";
                     document.getElementById('jobcheckedvalue3').value = "";
                  }

              if(jobradiocount3 > 1 && jobradiovalue3 != ('jobrd3'+ckvalue)  )
                  {
                    $("#jobrd3"+ckvalue).prop('checked', false);
                     $("#ca_reg_prefjob_alert").html("Already choice 3 Selected");

                     jobradiocount3 = jobradiocount3-1;
                     document.getElementById('jobradiocount3').value = jobradiocount3;            
                  }
              else
                  {
                      $("#ca_reg_prefjob_alert").html("");
                  }

                   if(jobradiovalue1 == ('jobrd1'+ckvalue) )
                 { 
                    document.getElementById('jobradiovalue1').value = "";
                    document.getElementById('jobradiocount1').value = "";
                    document.getElementById('jobcheckedvalue1').value = "";
                 } 
                 else if(jobradiovalue2 == ('jobrd2'+ckvalue)){

                   document.getElementById('jobradiovalue2').value = "";
                   document.getElementById('jobradiocount2').value = "";
                   document.getElementById('jobcheckedvalue2').value = "";
                 }

        }
    }
    