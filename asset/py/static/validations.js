var d=[
    [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
    [1, 2, 3, 4, 0, 6, 7, 8, 9, 5], 
    [2, 3, 4, 0, 1, 7, 8, 9, 5, 6], 
    [3, 4, 0, 1, 2, 8, 9, 5, 6, 7], 
    [4, 0, 1, 2, 3, 9, 5, 6, 7, 8], 
    [5, 9, 8, 7, 6, 0, 4, 3, 2, 1], 
    [6, 5, 9, 8, 7, 1, 0, 4, 3, 2], 
    [7, 6, 5, 9, 8, 2, 1, 0, 4, 3], 
    [8, 7, 6, 5, 9, 3, 2, 1, 0, 4], 
    [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
];

// permutation table p
var p=[
    [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], 
    [1, 5, 7, 6, 2, 8, 3, 0, 9, 4], 
    [5, 8, 0, 3, 7, 9, 6, 1, 4, 2], 
    [8, 9, 1, 6, 0, 4, 3, 5, 2, 7], 
    [9, 4, 5, 3, 1, 2, 6, 8, 7, 0], 
    [4, 2, 8, 6, 5, 7, 3, 9, 0, 1], 
    [2, 7, 9, 3, 8, 0, 6, 4, 1, 5], 
    [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
];

// inverse table inv
var inv = [0, 4, 3, 2, 1, 5, 6, 7, 8, 9];

// converts string or number to an array and inverts it
function invArray(array){
    
    if (Object.prototype.toString.call(array) == "[object Number]"){
        array = String(array);
    }
    
    if (Object.prototype.toString.call(array) == "[object String]"){
        array = array.split("").map(Number);
    }
    
  return array.reverse();
  
}

// generates checksum
function generate(array){
      
  var c = 0;
  var invertedArray = invArray(array);
  
  for (var i = 0; i < invertedArray.length; i++){
    c = d[c][p[((i + 1) % 8)][invertedArray[i]]];
  }
  
  return inv[c];
}

// validates checksum
function validate(array) {
    
    var c = 0;
    var invertedArray = invArray(array);
    
    for (var i = 0; i < invertedArray.length; i++){
      c=d[c][p[(i % 8)][invertedArray[i]]];
    }

    return (c === 0);
}

//////adhaaaar functions ended

function validatetext(value,alertarea)// function to validate for text box
  {
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else { $("#"+alertarea).html(""); }
  }

    function validatetextfocus(value,alertarea,focus)// function to validate for text box
  {
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {     $("#"+focus).focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else { $("#"+alertarea).html(""); }
  }

  function validatenumber(value,alertarea)// function to validate for text box
  {
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();          
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else if(isNaN(contentid.val()))
          {
            $("#"+alertarea).html("Enter a valid number");
            return false;
          }
         else { $("#"+alertarea).html(""); }
  }

    function validatenumberspl(value,alertarea)// function to validate for text box
  {
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();          
            $("#"+alertarea).html("Required field");

            return 0; 
         }
         else if(isNaN(contentid.val()))
          {
            $("#"+alertarea).html("Enter a valid number");
            document.getElementById(value).value = "";
            return false;
          }
         else { $("#"+alertarea).html(""); }
  }
function validate_fileupload(fileName,alertarea)
{ 
   
    var contentid = document.getElementById(fileName);
    var forext = contentid.value;
      var ext = forext.substring(forext.lastIndexOf('.') + 1);

        if(contentid.value == "" || contentid.value == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
        else 
          {
            $("#"+alertarea).html("");
            if(ext == "jpg" || ext == "png" || ext == "gif" || ext == "JPG" || ext == "PNG" || ext == "GIF")
        {
            return true; // valid file extension
        }  
        else
        {       
            $("#"+alertarea).html("Please Upload jpg, png or gif files only");
            return false;
        }
          }
}

  function validdob(date,month,year,alert)// function to validate dateofbirth in student registration
  {    
       var ca_reg_dob_date  = $("#"+date);
       var ca_reg_dob_month = $("#"+month);
       var ca_reg_dob_year  = $("#"+year);
         if(ca_reg_dob_date.val()=="" || ca_reg_dob_date.val()==null)
         {    ca_reg_dob_date.focus();
            $("#"+alert).html("Required field");
            return false; 
         }
         else if(ca_reg_dob_month.val()=="" || ca_reg_dob_month.val()==null)
         {
            ca_reg_dob_month.focus();
           $("#"+alert).html("Required field");
            return false;
         }
         else if(ca_reg_dob_year.val()=="" || ca_reg_dob_year.val()==null)
         {
            ca_reg_dob_year.focus();
            $("#"+alert).html("Required field");
            return false;
         }
         else { $("#"+alert).html(""); }
  }

function validate_fileuploaddoc(fileName,alertarea)
{ 
   
    var contentid = document.getElementById(fileName);
    var forext = contentid.value;
      var ext = forext.substring(forext.lastIndexOf('.') + 1);

        if(contentid.value == "" || contentid.value == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
        else 
          {
            $("#"+alertarea).html("");
     if(ext == "pdf" || ext == "docx" || ext=="doc" || ext == "jpg" || ext == "png" || ext == "gif" || ext == "rtf"
              || ext == "JPG" || ext == "PNG" || ext == "GIF")
        {
            return true; // valid file extension
        }  
        else
        {       
            $("#"+alertarea).html("Please Upload .jpg, .png, .gif, .rtf, .pdf, .docx or .doc file formats only");
            return false;
        }
          }
}

function validate_fileuploadexcel(fileName,alertarea)
{ 
   
    var contentid = document.getElementById(fileName);
    var forext = contentid.value;
      var ext = forext.substring(forext.lastIndexOf('.') + 1);

        if(contentid.value == "" || contentid.value == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
        else 
          {
            $("#"+alertarea).html("");
            if(ext == "xlsx")
        {
            return true; // valid file extension
        }  
        else
        {       
            $("#"+alertarea).html("Please Upload .xlsx file format only");
            return false;
        }
          }
}



function validmobile(fileName,alertarea)// function to validate mobile 1 in student registration
  {
   var mobpattern = /^[789]\d{9}$/; 
   var contentid = $("#"+fileName);
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
         else if(!mobpattern.test(contentid.val()))
       {    contentid.focus();
            $("#"+alertarea).html("Enter valid number");
            return false; 
       }  
         else { $("#"+alertarea).html(""); }
  }
function validphone(fileName,alertarea)// function to validate father name in candidate registration
  {
   var contentid = $("#"+fileName);   
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
         else if(isNaN(contentid.val()))
          {
            $("#"+alertarea).html("Enter a valid number");
            return false;
          }
         else { $("#"+alertarea).html(""); }
  }  
function validemailid(fileName,alertarea)// function to validate emailid in student registration
  {
   var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  
   var contentid = $("#"+fileName);   
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
         else if(!emailreg.test(contentid.val()))
       {    contentid.focus();
            $("#"+alertarea).html("Enter valid Email id");
            return false; 
       }  
         else { $("#"+alertarea).html(""); }
  }   

function mailidduplicatecheck(value1,value2,alertarea)// function to validate for text box
  {
    var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
    var alertarea  = alertarea;
    var contentid1 = $("#"+value1);
    var contentid2 = $("#"+value2); 
      if(contentid1.val() == "" || contentid1.val() == null)
         { 
            contentid1.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
      else if(!emailreg.test(contentid1.val()))
       {    contentid1.focus();
            $("#"+alertarea).html("Enter valid Email id");
            return false; 
       } 
       else if(contentid1.val() == contentid2.val())
         {   
          contentid1.focus();
            $("#"+alertarea).html("Please enter a different mail Id. ID already provided.");
            return 0; 
         }
         else {  $("#"+alertarea).html(""); }
  }  

  function mobileduplicatecheck(value1,value2,alertarea)// function to validate for text box
  {
      var mobpattern = /^[789]\d{9}$/; 
      var alertarea  = alertarea;
      var contentid1 = $("#"+value1);
      var contentid2 = $("#"+value2);

       if(contentid1.val() == "" || contentid1.val() == null)
         {    contentid1.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
         else if(!mobpattern.test(contentid1.val()))
       {    contentid1.focus();
            $("#"+alertarea).html("Enter valid Mobile Number");
            return false; 
       }  
        else if(contentid1.val() == contentid2.val())
         {   
          contentid1.focus();
            $("#"+alertarea).html("Please enter a different Number.Number already provided.");
            return 0; 
         }
         else { $("#"+alertarea).html(""); }
    }

      function phoneduplicatecheck(value1,value2,alertarea)// function to validate for text box
  {
      var alertarea  = alertarea;
      var contentid1 = $("#"+value1);
      var contentid2 = $("#"+value2);

       if(contentid1.val() == "" || contentid1.val() == null)
         {    contentid1.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
        else if(isNaN(contentid1.val()))
          {
            $("#"+alertarea).html("Enter a valid number");
            return false;
          } 
        else if(contentid1.val() == contentid2.val())
         {   
          contentid1.focus();
            $("#"+alertarea).html("Please enter a different Number.Number already provided.");
            return 0; 
         }
         else { $("#"+alertarea).html(""); }
    }

       function validncomparetext(value1,value2,value3,alertarea)// function to validate for text box
  {
      var alertarea  = alertarea;
      var contentid1 = $("#"+value1);
      var contentid2 = $("#"+value2);
      var contentid3 = $("#"+value3);

       if(contentid1.val() == "" || contentid1.val() == null)
         {    contentid1.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
        else if((contentid1.val() == contentid2.val()) || (contentid1.val() == contentid3.val()) )
         {   
          contentid1.focus();
            $("#"+alertarea).html("Already Selected...");
            return 0; 
         }
         else { $("#"+alertarea).html(""); }
    }

         function validncomparetext5(value1,value2,value3,value4,value5,alertarea)// function to validate for text box
  {
      var alertarea  = alertarea;
      var contentid1 = $("#"+value1);
      var contentid2 = $("#"+value2);
      var contentid3 = $("#"+value3);
      var contentid4 = $("#"+value4);
      var contentid5 = $("#"+value5);

       if(contentid1.val() == "" || contentid1.val() == null)
         {    contentid1.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
        else if((contentid1.val() == contentid2.val()) || (contentid1.val() == contentid3.val()) ||
         (contentid1.val() == contentid4.val()) ||  (contentid1.val() == contentid5.val())  )
         {    
          contentid1.focus();
            $("#"+alertarea).html("Already Selected...");
            return 0; 
         }
         else { $("#"+alertarea).html(""); }
    }

      function validateaadhaar(value,alertarea)// function to validate for text box
  {
     var adhaarpattern = /^\d{12}$/; 
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();          
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else if(isNaN(contentid.val()) || !validate(contentid.val()) || !adhaarpattern.test(contentid.val())  )
          {
            contentid.focus();  
            $("#"+alertarea).html("Enter a valid adhaar number");
            return false;
          }
         else { $("#"+alertarea).html(""); }
  }
   function validatetextonly(value,alertarea)// function to validate for text box
  {
     var textpatteren = /[^ a-zA-Z]/; 
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else if(textpatteren.test(contentid.val())){
           $("#"+alertarea).html("Enter a valid text");
           return false;
         }else { $("#"+alertarea).html(""); }
  }

  function validateaddress(value,alertarea)// function to validate for text box
  {
     var addrpatteren = /[^-/,. 0-9a-zA-Z]/; 
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else if(addrpatteren.test(contentid.val())){
           $("#"+alertarea).html("Enter a valid text");
           return false;
         }else { $("#"+alertarea).html(""); }
  }

function validpincode(fileName,alertarea)// function to validate mobile 1 in student registration
  {
   var pinpatterm = /^[65]\d{5}$/; 
   var contentid = $("#"+fileName);
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
         else if(!pinpatterm.test(contentid.val()))
       {    contentid.focus();
            $("#"+alertarea).html("Enter valid pincode");
            return false; 
       }  
         else { $("#"+alertarea).html(""); }
  }


    
