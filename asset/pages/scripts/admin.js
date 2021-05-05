// admin page5 js validations
$("#emis_admin5_form1").validate({

    
    rules: {
        noofgirlsprimarystudent:{
            required:true,
            customvalidation:true,
            maxlength:3
        },
        noofboysprimarystudent:{
            required:true,
            customvalidation:true,
            maxlength:3
        },
        noofboysupperprimarystudent:{
            required:true,
            customvalidation:true,
            maxlength:3
        },
        noofgirlsupperprimarystudent:{
            required:true,
            customvalidation:true,
            maxlength:3
        },
        noofgirlssecondarystudent:{
            required:true,
            customvalidation:true,
            maxlength:3
        },
        noofboyssecondarystudent:{
            required:true,
            customvalidation:true,
            maxlength:3
        },
        noofgirlshighersecondarystudent:{
            required:true,
            customvalidation:true,
            maxlength:3
        },
        noofboyshighersecondarystudent:{
            required:true,
            customvalidation:true,
            maxlength:3
        },
        isthisresidentialschool: {
            required: true,
            customvalidationselectfield:true
            },
        typeofresidentialschool:{
            required:true,
            customvalidationselectfield:true
        },
        brdngfacavlflngpristud:{
              required:true,
              customvalidationselectfield:true
        },
        brdngfacavlflnguppristud:{
              required:true,
              customvalidationselectfield:true
        },
        brdngfacavlflngsecstud:{
              required:true,
              customvalidationselectfield:true
        },
        brdngfacavlflnghscstud:{
              required:true,
              customvalidationselectfield:true
        },
        brdngfacavlflwngstglvl:{
            required:true,
            customvalidationselectfield:true
        }

       },
        
             onfocusout: function(element) {
            this.element(element);
        }

   });
// form1 validation ending

    $("#emis_admin5_form2").validate({

    
    rules: {
        isthisaminoritymanagedschool:{
            required:true,
            customvalidationselectfield:true
        },
        
        preprisecattcdschl:{
            required:true,
            customvalidationselectfield:true
        },
        anganwadicentrinschlcampus:{
            required:true,
            customvalidationselectfield:true
        },
         ccebeingimplmentedinschlelemntry:{
            required:true,
            customvalidationselectfield:true
        },
         ccebeingimplmentedinschlhighersecondary:{
            required:true,
            customvalidationselectfield:true
        },
        typeofaminoritymanagedschool:{
            required:true,
            customvalidationselectfield:true
        },
        totstudpreprigrd1precd:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        preprimarytotteachers:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        totchildrensinanganwadi:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        totteachersoranganwadiworkers:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        ccebeingimplementedschool:{
            required:true,
            customvalidationselectfield:true
        },
        ccebeingimplmentedinschlsecondary:{
              required:true,
              customvalidationselectfield:true
        },
        cumltvercrdspuplmntnd:{
              required:true,
              customvalidationselectfield:true
        },
        cumrcrdpuplshrdwithprnts:{
              required:true,
              customvalidationselectfield:true
        },
    },
        
             onfocusout: function(element) {
            this.element(element);
        }

   });
// form2 Ending
  
    $("#emis_admin5_form3").validate({

      rules: {

         smchasbeenconstituted:{
            required:true,
            customvalidationselectfield:true
        },
        smctotnumbermale:{
              required:true,
              customvalidation:true,
              maxlength:4
        },
        smctotnumberfemale:{
              required:true,
              customvalidation:true,
              maxlength:4
        },

        smcmembrofparentsorguardiansmale:{
              required:true,
              customvalidation:true,
              maxlength:4
        },
        smcmembrofparentsorguardiansfemale:{
              required:true,
              customvalidation:true,
              maxlength:4
        },

        smcrepresentativesmale:{
              required:true,
              customvalidation:true,
              maxlength:4
        },
        smcrepresentativesfemale:{
              required:true,
              customvalidation:true,
              maxlength:4
        }
    },
        
             onfocusout: function(element) {
            this.element(element);
        }

   });
  // form 3 Ending

  // form4 start
   $("#emis_admin5_form4").validate({
      
    rules: {

        sepbnksmcmantnd:{
            required:true,
            customvalidationselectfield:true
        },
        smcaccountbranch:{
              required:true,
              textvalidation:true
        },

        smcaccountbankname:{
              required:true,
              textvalidation:true
        },

        smcaccountno:{
              required:true,
              customvalidation:true,
              maxlength:25
        },

        smcaccountifsc:{
              required:true,
              alphanumericvalidation:true
        },

        smcaccountname:{
              required:true,
              textvalidation:true
        }
    },
        
             onfocusout: function(element) {
            this.element(element);
        }

   });
   // form4 Ending

   // form5 start
   $("#emis_admin5_form5").validate({
      
    rules: {
        anychildenrldschlatndspcltrng:{
            required:true,
            customvalidationselectfield:true
        },
        
       
        no_chldrs_spectrng_utsep30_b:{
              required:true,
              customvalidation:true,
              maxlength:4
        },

        no_chldrs_spectrng_utsep30_g:{
              required:true,
              customvalidation:true,
              maxlength:4
        },


        no_chldrs_spectrng_enrld_acadyr_b:{
              required:true,
              customvalidation:true,
              maxlength:4
        },


        no_chldrs_spectrng_enrld_acadyr_g:{
              required:true,
              customvalidation:true,
              maxlength:4
        },

        no_chldrs_spectrng_cmpltd_prevacdyr_b:{
              required:true,
              customvalidation:true,
              maxlength:4
        },

        no_chldrs_spectrng_cmpltd_prevacdyr_g:{
              required:true,
              customvalidation:true,
              maxlength:4
        },

        whoconductsspcltaining:{
              required:true,
              customvalidationselectfield:true
        },

        spcltraingconductedin:{
              required:true,
              customvalidationselectfield:true
        },        
        spcltraingconductedin:{
              required:true,
              customvalidationselectfield:true
        },
        typeoftrainingbeingconducted:{
              required:true,
              customvalidationselectfield:true
        }
      },
        
             onfocusout: function(element) {
            this.element(element);
        }

   });

$.validator.addMethod("customvalidationselectfield",
               function(){
               return $('').val()!="none";
            }
    );

$.validator.addMethod("customvalidation",
               function(value,element){
                     return /^[0-9]+$/.test(value);
               },
               "Allowed number value only"
      );

$.validator.addMethod("textvalidation",
               function(value,element){
                     return /^[a-zA-Z ]+$/.test(value);
               },
               "Allowed Text value only"
      );

$.validator.addMethod("alphanumericvalidation",
               function(value,element){
                     return /^[a-zA-Z0-9]+$/.test(value);
               },
               "Allowed Alphanumeric only"
      );
            


            // residentialschool partjs
            $("#isthisresidentialschool").change(function () {
            if ($(this).val() == "1") {
                $("#typeofresidential,#typeofresidential1").show();
            } else {
                $("#typeofresidential,#typeofresidential1,#typeofresidential1boardingfacilitiesareavailforthefollowingstageorlvl,#boadingfacilityavail1,#boadingfacilityavail2,#boadingfacilityavail3,#boadingfacilityavail4,#admin5primarygirls,#admin5primaryboys,#admin5upperprimarygirls,#admin5upperprimaryboys,#admin5secondarygirls,#admin5secondaryboys,#admin5highersecondarygirls,#admin5highersecondaryboys").hide();
            }

            $('#typeofresidentialschool,#boardingfacilitiesareavailforthefollowingstageorlvl').val(function () {
                return $(this).find('option').filter(function () {
                return $(this).prop('defaultSelected');
                }).val();
            });
            });



            // residentialschool partjs
            $("#boardingfacilitiesareavailforthefollowingstageorlvl").change(function () {
            if ($(this).val() == "1") {
                $("#boadingfacilityavail1,#boadingfacilityavail2,#boadingfacilityavail3,#boadingfacilityavail4").show();
            } else {
                $("#boadingfacilityavail1,#boadingfacilityavail2,#boadingfacilityavail3,#boadingfacilityavail4,#admin5primarygirls,#admin5primaryboys,#admin5upperprimarygirls,#admin5upperprimaryboys,#admin5secondarygirls,#admin5secondaryboys,#admin5highersecondarygirls,#admin5highersecondaryboys").hide();
            }

            $('#boardingfacilitiesareavailforthefollowingprimarystudent,#boardingfacilitiesareavailforthefollowingupperprimarystudent,#boardingfacilitiesareavailforthefollowingsecondarystudent,#boardingfacilitiesareavailforthefollowinghighersecondarystudent').val(function () {
                return $(this).find('option').filter(function () {
                return $(this).prop('defaultSelected');
                }).val();
            });

            });

            
        
        

             $('#boardingfacilitiesareavailforthefollowingprimarystudent').change(function()
                              {
                                  if ($(this).val()=="1") {
                                      $('#admin5primarygirls,#admin5primaryboys').show();
                                    }
                                  else{
                                  $("#admin5primarygirls,#admin5primaryboys").hide();
                                      return false;
                              }

                        $("#noofgirlsprimarystudent,#noofboysprimarystudent").val('');
            });


             $('#boardingfacilitiesareavailforthefollowingupperprimarystudent').change(function()
                              {
                                  if ($(this).val()=="1") {
                                      $('#admin5upperprimarygirls,#admin5upperprimaryboys').show();
                                    }
                                  else{
                                  $("#admin5upperprimarygirls,#admin5upperprimaryboys").hide();
                                      return false;
                              }

                              $("#noofgirlsupperprimarystudent,#noofboysupperprimarystudent").val('');
                      });


             $('#boardingfacilitiesareavailforthefollowingsecondarystudent').change(function()
                              {
                                  if ($(this).val()=="1") {
                                      $('#admin5secondarygirls,#admin5secondaryboys').show();
                                    }
                                  else{
                                  $("#admin5secondarygirls,#admin5secondaryboys").hide();
                                      return false;
                              }

                              $("#noofgirlssecondarystudent,#noofboyssecondarystudent").val('');
                      });

             $('#boardingfacilitiesareavailforthefollowinghighersecondarystudent').change(function()
                              {
                                  if ($(this).val()=="1") {
                                      $('#admin5highersecondarygirls,#admin5highersecondaryboys').show();
                                    }
                                  else{
                                  $("#admin5highersecondarygirls,#admin5highersecondaryboys").hide();
                                      return false;
                              }
                              $("#noofgirlshighersecondarystudent,#noofboyshighersecondarystudent").val('');
                      });




             $('#preprimarysectionattachedtoschool').change(function()
                              {
                                  if ($(this).val()=="1") {
                                      $('#anganwadioption1,#anganwadioption2').show();
                                    }
                                  else{
                                  $("#anganwadioption1,#anganwadioption2").hide();
                                      return false;
                              }
                      });


             $('#anganwadicentrinschlcampus').change(function()
                              {
                                  if ($(this).val()=="1") {
                                      $('#anganwaditotchildren,#anganwaditotteacher').show();
                                    }
                                  else{
                                  $("#anganwaditotchildren,#anganwaditotteacher").hide();
                                      return false;
                              }
                      });

              $('#ccebeingimplementedschool').change(function()
                              {
                                  if ($(this).val()=="1") {
                                      $('#elementryset,#secondaryset,#highersecondaryset').show();

                                    }
                                  else{
                                  $("#elementryset,#secondaryset,#highersecondaryset,#cceelementrymaintained,#cceelementrycumulative").hide();
                                      return false;
                              }


                              $('#ccebeingimplmentedinschlelemntry,#ccebeingimplmentedinschlsecondary,#ccebeingimplmentedinschlhighersecondary,#cumulativerecordsofpupilbeingmaintained,#cumulativerecordsofpupilsharewithparents').val(function () {
                                            return $(this).find('option').filter(function () {
                                            return $(this).prop('defaultSelected');
                                            }).val();
                                    });
                      });


              $('#ccebeingimplmentedinschlelemntry,#ccebeingimplmentedinschlsecondary,#ccebeingimplmentedinschlhighersecondary').change(function()
                              {
                                  if ($('#ccebeingimplmentedinschlelemntry').val()=="1" || $('#ccebeingimplmentedinschlsecondary').val()=="1" || $('#ccebeingimplmentedinschlhighersecondary').val()=="1" )  {
                                      $('#cceelementrymaintained,#cceelementrycumulative').show();

                                    }
                                  else{
                                  $("#cceelementrymaintained,#cceelementrycumulative").hide();
                                      
                                      return false;
                              }

                              // if ($(this).val()=="1") {
                              //                   $("#ccebeingimplmentedinschlsecondary,#ccebeingimplmentedinschlhighersecondary").val(2);      
                              //           }
                                  
                        $('#cumulativerecordsofpupilbeingmaintained,#cumulativerecordsofpupilsharewithparents').val(function () {
                                            return $(this).find('option').filter(function () {
                                            return $(this).prop('defaultSelected');
                                            }).val();
                                    });                                      

                              
                      });


                      // $('#ccebeingimplmentedinschlsecondary').change(function()
                      //         {
                      //             if ($('#ccebeingimplmentedinschlsecondary').val()=="1") {
                      //                 $('#cceelementrymaintained,#cceelementrycumulative').show();
                        
                                      
                                           
                      //               }
                      //             else{
                      //               // $('#ccebeingimplmentedinschlelemntry,#ccebeingimplmentedinschlhighersecondary').val(function () {
                      //               //         return $(this).find('option').filter(function () {
                      //               //     return $(this).prop('defaultSelected');
                      //               //     }).val();
                      //               // });
                      //             $("#cceelementrymaintained,#cceelementrycumulative").hide();
                      //                 return false;
                      //         }

                      //         // if ($(this).val()=="1") {
                      //         //                   $("#ccebeingimplmentedinschlelemntry,#ccebeingimplmentedinschlhighersecondary").val(2);      
                      //         //           }


                      //       // $('#cumulativerecordsofpupilbeingmaintained,#cumulativerecordsofpupilsharewithparents').val(function () {
                      //       //                 return $(this).find('option').filter(function () {
                      //       //                 return $(this).prop('defaultSelected');
                      //       //                 }).val();
                      //       //         });            

                      // });

                      // $('#ccebeingimplmentedinschlhighersecondary').change(function()
                      //         {
                      //             if ($('#ccebeingimplmentedinschlhighersecondary').val()=="1") {
                      //                 $('#cceelementrymaintained,#cceelementrycumulative').show();
                      //               }
                      //             else{
                      //             $("#cceelementrymaintained,#cceelementrycumulative").hide();
                      //                 return false;
                      //         }

                      //          // if ($(this).val()=="1") {
                      //          //                  $("#ccebeingimplmentedinschlelemntry,#ccebeingimplmentedinschlsecondary").val(2);      
                      //          //          }
                      // });             





             $('#smchasbeenconstituted').change(function()
                              {
                                  if ($(this).val()=="1") {
                                      $('#totnoofmembrsinsmc,#membrsofparentsorguardian,#represenativesfromloclauthorities').show();
                                    }
                                  else{
                                  $("#totnoofmembrsinsmc,#membrsofparentsorguardian,#represenativesfromloclauthorities").hide();
                                      return false;
                              }

                              $("#smctotnumbermale,#smctotnumberfemale,#smcmembrofparentsorguardiansmale,#smcmembrofparentsorguardiansfemale,#smcrepresentativesmale,#smcrepresentativesfemale").val('');
                      });


             $('#sepbankacountforsmcisbeingmaintained').change(function()
                              {
                                  if ($(this).val()=="1") {
                                      $('#smcdtlsbranchbank,#smcaccountnorow,#smcifsccoderow').show();
                                    }
                                  else{
                                  $("#smcdtlsbranchbank,#smcaccountnorow,#smcifsccoderow").hide();
                                      return false;
                              }

                              //$("#smcaccountbranch,#smcaccountbankname,#smcaccountno,#smcaccountifsc,#smcaccountname").val('');

                      });


             $('#anychildenrolledintheschlattendingspecialtraining').change(function()
                              {
                                  if ($(this).val()=="1") {
                                      $('#noofschildrnsupto30thsep,#noofchildrnsinpreviousacdmicyr,#noofchildrnsinduringpreviousacademicyr,#whoconductsspcltainingrow,#specialtraingisconductedinrow,#typeoftrainingbeingconductedrow').show();
                                    }
                                  else{
                                  $("#noofschildrnsupto30thsep,#noofchildrnsinpreviousacdmicyr,#noofchildrnsinduringpreviousacademicyr,#whoconductsspcltainingrow,#specialtraingisconductedinrow,#typeoftrainingbeingconductedrow").hide();
                                      return false;
                              }

                              $("#noofchildrensprovidedspltrainingupto30thsepboys,#noofchildrensprovidedspltrainingupto30thsepgirls,#noofchildrensenroledforspcltringinprevyearboys,#noofchildrensenroledforspcltringinprevyeargirls,#noofchildrenscompletdspcltraingduringpreviousacadmicyearboys,#noofchildrenscompletdspcltraingduringpreviousacadmicyeargirls").val('');

                              $('#whoconductsspcltaining,#spcltraingconductedin,#typeoftrainingbeingconducted').val(function () {
                                            return $(this).find('option').filter(function () {
                                            return $(this).prop('defaultSelected');
                                            }).val();
                                    });

                      });


            
            
             

            //minority managed sections
            $("#isthisaminoritymanagedschool").change(function () {
            if ($(this).val() == "1") {
                $("#minoritymanagedschooloptiona").show();
            } else {
                $("#minoritymanagedschooloptiona").hide();
            }

            $('#typeofaminoritymanagedschool').val(function () {
                return $(this).find('option').filter(function () {
                return $(this).prop('defaultSelected');
                }).val();
            });



            });


// admin page6 js validations


                        $("#emis_admin6_form1").validate({
    
                                     rules: {
                                       fulsettxtbckrcvdcrntacadyr:{
                                           required:true,
                                           customvalidationselectfield:true
                                       },
                                       fulsettxtbckrcvdcrntacad_mnth:{
                                           required:true,
                                           customvalidation:true,
                                           maxlength:2
                                       },
                                       fulsettxtbckrcvdcrntacad_yr:{
                                           required:true,
                                           customvalidation:true,
                                           maxlength:4
                                       },
                               
                                       },
        
                                            onfocusout: function(element) {
                                           this.element(element);
                                        }
                                       
                                  });


                        $("#emis_admin6_form2").validate({
    
    rules: {
        cmpltfretxtbokrcvd_pri:{
            required:true,
            customvalidationselectfield:true
        },
        cmpltfretxtbokrcvd_uppri:{
            required:true,
            customvalidationselectfield:true
        },
        tle_avl_grd_pri:{
            required:true,
            customvalidationselectfield:true
        },
        tle_avl_grd_uppri:{
            required:true,
            customvalidationselectfield:true
        },
        ply_matrl_pri:{
            required:true,
            customvalidationselectfield:true
        },
        ply_matrl_uppri:{
            required:true,
            customvalidationselectfield:true
        },
        ply_matrl_sec:{
            required:true,
            customvalidationselectfield:true
        }

        },
        
             onfocusout: function(element) {
            this.element(element);
        }
        
   });





        $("#emis_admin6_form3").validate({
    
    rules: {
        smdc:{
            required:true,
            customvalidationselectfield:true
        },
        smdcconstituted:{
            required:true,
            customvalidationselectfield:true
        },
        smdcbankaccntdtls:{
            required:true,
            customvalidationselectfield:true
        },
        pta:{
            required:true,
            customvalidationselectfield:true
        },
        smdcconstdtot_m:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdtot_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdccondnofrepprnts_m:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdccondnofrepprnts_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdrepnmneloc_m:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdrepnmneloc_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdbckwdcom_m:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdbckwdcom_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstd_wmngrp_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdscst_m:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdscst_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstddeo_m:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstddeo_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdaad_m:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdaad_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdrmsa_m:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdrmsa_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdmaths_m:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdmaths_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdprncyhm_m:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdprncyhm_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdcharper_m:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcconstdcharper_f:{
            required:true,
            customvalidation:true,
            maxlength:4
        },
        smdcaccountbranch:{
            required:true,
            textvalidation:true
        },
        smdcaccountbankname:{
            required:true,
            textvalidation:true
        },

        smdcaccountno:{
            required:true,
            customvalidation:true,
            maxlength:40
        },

        smdcaccountifsc:{
            required:true,
            alphanumericvalidation:true
        },

        smdcaccountname:{
            required:true,
            textvalidation:true
        },
        ptameetingsheld:{
            required:true,
            customvalidation:true,
            maxlength:4
        }

        },
        
             onfocusout: function(element) {
            this.element(element);
        }
        
   });



$.validator.addMethod("customvalidationselectfield",
               function(){
               return $().val()!="none";
            }
    );

$.validator.addMethod("customvalidation",
               function(value,element){
                     return /^[0-9]+$/.test(value);
               },
               "Allowed number value only"
      );

$.validator.addMethod("textvalidation",
               function(value,element){
                     return /^[a-zA-Z]+$/.test(value);
               },
               "Allowed Text value only"
      );

$.validator.addMethod("alphanumericvalidation",
               function(value,element){
                     return /^[a-zA-Z0-9]+$/.test(value);
               },
               "Allowed Alphanumeric only"
      );


            // 1st onchange partjs
            $("#fullsetoftextbooksreceivedincurrentacademic").change(function () {
            if ($(this).val() == "1") {
                $("#fullsetoftextbooksreceivedincurrentacademicmonthandyear").show();
               }else {
                $("#fullsetoftextbooksreceivedincurrentacademicmonthandyear").hide();
                }

                $('#fullsetoftextbooksreceivedincurrentacademicmonth,#fullsetoftextbooksreceivedincurrentacademicyear').val('');
            });



             // 1st onchange partjs
            $("#smdc").change(function () {
            if ($(this).val() == "2") {
                $("#smdcnextoption,#smdcnextoption1").show();
               }else {
                $("#smdcnextoption,#smdcnextoption1,#myviewdata,#smdcbankrow1,#smdcbankrow2,#smdcbankrow3,#ptarow").hide();
                }

                $('#smdcconstituted,#smdcbankaccntdtls,#pta').val(function () {
                                            return $(this).find('option').filter(function () {
                                            return $(this).prop('defaultSelected');
                                            }).val();
                });

            });


              // 1st onchange partjs
            $("#smdcconstituted").change(function () {
            if ($(this).val() == "1") {
                $("#myviewdata").show();
               }else {
                $("#myviewdata").hide();
                }

                $('#smdcconstitutedtotmembrmale,#smdcconstitutedtotmembrfemale,#smdcconstitutednoofrepofparntsorguardorptamale,#smdcconstitutednoofrepofparntsorguardorptafemale,#smdcconstitutednoofrepornominesforlocgovmale,#smdcconstitutednoofrepornominesforlocgovfemale,#smdcconstitutenoofmembrfromebmcmale,#smdcconstitutenoofmembrfromebmcfemale,#smdcconstitutenoofmembrfromanywomengroupfemale,#smdcconstitutenoofmembrfromscorstmale,#smdcconstitutenoofmembrfromscorstfemale,#smdcconstitutenoofnomineesdeomale,#smdcconstitutenoofnomineesdeofemale,#smdcconstitutenoofmembrsaadmale,#smdcconstitutenoofmembrsaadfemale,#smdcconstitutenoofsubjectsrmsamale,#smdcconstitutenoofsubjectsrmsafemale,#smdcconstitutenoofteachrsofschlmale,#smdcconstitutenoofteachrsofschlfemale,#smdcconstitutepricipalorhmaschairpersonmale,#smdcconstitutepricipalorhmaschairpersonfemale,#smdcconstitutechairpersonisnotpricipalorhmmale,#smdcconstitutechairpersonisnotpricipalorhmfemale').val('');
            });



            // 1st onchange partjs
            $("#smdcbankaccntdtls").change(function () {
            if ($(this).val() == "1") {
                $("#smdcbankrow1,#smdcbankrow2,#smdcbankrow3").show();
               }else {
                $("#smdcbankrow1,#smdcbankrow2,#smdcbankrow3").hide();
                }

                //$('#smdcaccountbranch,#smdcaccountbankname,#smdcaccountno,#smdcaccountifsc,#smdcaccountname').val('');

            });




            // 1st onchange partjs
            $("#pta").change(function () {
            if ($(this).val() == "1") {
                $("#ptarow").show();
               }else {
                $("#ptarow").hide();
                }

                    $('#ptameetingsheld').val(function () {
                                            return $(this).find('option').filter(function () {
                                            return $(this).prop('defaultSelected');
                                            }).val();
                });

            });
