        function createRow(node,cre,cls){
            if(onScriptAddRowValidation(node)){
                var nodeInner=node.innerHTML;
                var tr=document.createElement(cre);
                tr.setAttribute("class",cls);
                tr.innerHTML=nodeInner;
                changeIdandName(node.parentNode);
                node.parentNode.appendChild(tr);
                return changeIdandName(node.parentNode);
            }
            else{
                alert('All Values Are Required!'+node.id);
            }
        }
        
        function deleteRow(node){
            var par=node.parentNode;
            //alert(par.children.length);
            //resetAllChildValues(node);
            if(par.children[0].children[0].hasAttribute('colspan') && !checkInstanceof(par.children[1].children[0].children[0])){
                if(par.children.length > 3)
                    par.removeChild(node);
                else
                    alert('Atlease 1 Should Be Entered');
            }else{
                //alert(par.children.length);
                if(par.children.length >= 2){
                    if(checkInstanceof(par.children[1].children[0].children[0]) && !(par instanceof HTMLDivElement)){
                        if(par.children.length > 2)
                            par.removeChild(node);
                        else
                            alert('Atlease 1 Should Be Entered');
                    }
                    else{
                        if(par.children.length > 1)
                            par.removeChild(node);
                        else
                            alert('Atlease 1 Should Be Entered');
                    }
                }
                else{
                    if(par.children.length > 1)
                        par.removeChild(node);
                    else
                        alert('Atlease 1 Should Be Entered!!!!!!!!!!!!');
                }
                
            }
            return changeIdandName(par);
        }
        
        function changeIdandName(node){
            //alert(node);
            var tRowCount=0,z=0,checkbit=0;
            for(var tr=0;tr<node.children.length;tr++){
                var trChild=node.children[tr];
                for(var th=0;th<trChild.children.length;th++){
                    var inputElement=trChild.children[th];
                    inputElement.hasAttribute('id')?(inputElement.id=inputElement.id.split('_')[0]+'_'+tRowCount):'';
                    for(var input=0;input<inputElement.children.length;input++){
                        if(checkInstanceof(inputElement.children[input])){
                            var inputid=inputElement.children[input].id;
                            var id=inputid.split('_');
                            if(inputElement.children[input].getAttribute('type')=='radio'){
                                if(z==0){
                                    inputElement.children[input].id=id[0]+'_'+(tRowCount);
                                    inputElement.children[input].name=id[0]+'_'+(tRowCount);
                                    z=tRowCount;
                                }
                                else{
                                    inputElement.children[input].id=id[0]+'_'+(z+1);
                                    inputElement.children[input].name=id[0]+'_'+(tRowCount);
                                    z=0;
                                }
                                //alert(inputElement.children[input].checked);
                            }
                            else{
                                inputElement.children[input].id=id[0]+'_'+(tRowCount);
                                inputElement.children[input].name=id[0]+'_'+(tRowCount); 
                                if(inputElement.children[input] instanceof HTMLDataListElement){
                                    inputElement.children[input].previousElementSibling.removeAttribute("list");
                                    inputElement.children[input].previousElementSibling.setAttribute("list",inputElement.children[input].id);
                                }
                                //alert(inputElement.children[input].id);  
                            }
                            checkbit=1;
                        }
                        else if(inputElement.children[input] instanceof HTMLDivElement){
                            nodeDeepChildren(inputElement.children[input],tRowCount);
                        }
                    }
                }
                tRowCount=checkbit!=0?(tRowCount=tRowCount+1):tRowCount;
                checkbit=0;
            }
            return true;
        }
        function showOthersText(node,sel=1,val=0){
            //alert(node.children[sel].id);
            if(node.children[sel].hasAttribute('id')){
                var id=node.children[sel].id.split('_');//alert(id[0]+'_'+id[1]);
                if(node.children[val].children[0].value==-1 || node.children[val].children[0].value==15){
                    if(node.children[val].children[0].options[node.children[val].children[0].selectedIndex].innerHTML=='NGO' && node.children[val].children[0].value==15)
                        document.getElementById(id[0]+'_'+id[1]).style.visibility='';
                    else if(node.children[val].children[0].value==-1)
                        document.getElementById(id[0]+'_'+id[1]).style.visibility='';
                }
                else{
                    document.getElementById(id[0]+'_'+id[1]).style.visibility='hidden';
                }
            }
			/*else{
				alert('hi');
				}*/
        }
        
        
        function low_highClass(node){
            var LowHighValue=node.options[node.selectedIndex].text.split(/[()]+/);
            LowHighValue=((typeof LowHighValue[1])=='undefined'?"":LowHighValue[1]);
            //alert('LLLL ='+LowHighValue);
            if(LowHighValue!='' && LowHighValue!='undefined'){
                var allvalue=numberlowerclass(LowHighValue).split('_');
                document.getElementById('lowerclass').value=allvalue[0];
                document.getElementById('higherclass').value=allvalue[1]; 
            }
            else{
                document.getElementById('lowerclass').value='';
                document.getElementById('higherclass').value=''; 
            }
        }
        
        function selectionValidation(node,prNode,sel=0,fnd=0){
            //alert('Validation'+node.value+' '+prNode);
            var selectedValue=node.value;
            var prNnode=prNode.parentNode;
            for(var i=fnd;i<prNnode.children.length;i++){
				if(checkInstanceof(prNnode.children[i].children[sel].children[0])){
					if(selectedValue==prNnode.children[i].children[sel].children[0].value){
						if(node.id!=prNnode.children[i].children[sel].children[0].id){
							alert('Already Selected');
							deleteRow(prNode);
						}
					}
				}
			}
        }
        function callTwoFunctions(node,check,cre='tr',cls=''){
            if(check==1){
                if(createRow(node,cre,cls))
                    showOthersText(node);
            }
            else{
                if(deleteRow(node))
                    showOthersText(node);
            }
        }
       
       function addressChainDetails(currentElement,targetElement,checkbit,para,url){
            //alert('AddressChain = '+url+checkbit+'Current Element ='+currentElement.value+' Target Element='+targetElement+' checkbit='+checkbit+' para='+para+' url='+url);
            var curId=currentElement.id;
            //var curId=currentElement.name;
            $.ajax({
                type: "POST",
                url:url+checkbit,
                data:"&"+curId+'='+currentElement.value+"&"+para,
                success: function(resp){  
                        if($("#"+targetElement).attr('type')=='text'){
                            //alert(resp.length);
                            $("#"+targetElement).val(resp.substr(9));
                        }
                        else{
                            $("#"+targetElement).html(resp);
                        }  
                        return true;              
                },
                error: function(e){ 
                    //alert('Error: ' + e.responseText);
                    return false;  
                }
            });
        } 
        
        function numberlowerclass(allvalue){
           //alert(allvalue); 
           if(allvalue!="undefined" || allvalue!=""){
                var alval=allvalue.split('-');
                var roman={PrkG:'Pre-KG',LKG:'LKG',UKG:'UKG',I:1,II:2,III:3,IV:4,V:5,VI:6,VII:7,VIII:8,IX:9,X:10,XI:11,XII:12};
                if(alval[0]=='Pre'){
                    alval[0]='PrkG';
                    alval[1]=alval[2]; 
                }
           }
           return (roman[alval[0]]+'_'+roman[alval[1]]);
         }  
         
         function checkInstanceof(element){
            if(element instanceof HTMLSelectElement)
                return true;
            else if(element instanceof HTMLInputElement)
                return true;
            else if(element instanceof HTMLButtonElement)
                return true;
            else if(element instanceof HTMLFormElement)
                return true;
            else if(element instanceof HTMLTextAreaElement)
                return true;
            else if(element instanceof HTMLDataListElement)
                return true;
            else
                return false;
         }
         
         
        function sbcshow1(sbc,sbcclass) {
            //alert(sbc.value);
            var x =document.getElementsByClassName(sbcclass);
            if(sbc.value==0||sbc.value==''){
                for(var i=0;i<x.length;i++) {
                    //alert(x[i]);
                    x[i].style.display='none';
                    x[i].innerHTML=x[i].innerHTML;
                }			
			}else{
                for(var i=0;i<x.length;i++) {
                    //alert(x[i]);
                    x[i].style.display='';
                }
            }
            
        } 
		
		function sbcshow2(sbc,sbcclass) {
          //alert(sbc.value);
            var x =document.getElementsByClassName(sbcclass);
            if(sbc.value==0||sbc.value==''){
                for(var i=0;i<x.length;i++) {
                    //alert(x[i]);
                    x[i].style.visibility='hidden';
                    x[i].innerHTML=x[i].innerHTML;
                }
     
				
			}else{
                
                for(var i=0;i<x.length;i++) {
                    //alert(x[i]);
                    x[i].style.visibility='';
                }
                
            }
            
        } 
		
		
		
		 function selectshow(sbc,sbcclass,showfor="15") {
          //alert(sbc.value);
            var x =document.getElementsByClassName(sbcclass);
            var sh=showfor.split(",");
            if(sh.includes(sbc.value)){
                for(var i=0;i<x.length;i++) {                   
                    x[i].style.display='';
                    x[i].innerHTML=x[i].innerHTML;
                }
            }
            else{
                for(var i=0;i<x.length;i++) {
                    x[i].style.display='none';
                    x[i].innerHTML=x[i].innerHTML;
                } 
            }
        } 
		
		
		
        
		
		
		function textvalidate(id,alertid){
			//alert(alertid);	
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
            if(alt!=null){
			if(text.value==''){
				alt.innerHTML="This field is required";
			}else {
				alt.innerHTML="";
			}
            }
		}
				
		function mobilevalidate(id,alertid){
			var mobpattern = /^[6789]\d{9}$/;
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
			/*if(text.value==''){
				alt.innerHTML="This field is required";
				return false;
			}else*/ 
			if(!text.value.match(mobpattern)){
				alt.innerHTML="Enter valid mobile number";
                text.value='';
				return false;
			}else {
				alt.innerHTML="";
			}
		}
			
		function mobilevalidate1(id,alertid){
			var mobpattern = /^[6789]\d{9}$/;
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
			if(text.value==''){
				alt.innerHTML="This field is required";
				return false;
			}else if(!text.value.match(mobpattern)){
				alt.innerHTML="Enter valid mobile number";
                text.value='';
				return false;
			}else {
				alt.innerHTML="";
			}
		}
			
		
		
		function pinvalidate(id,alertid){
			var pinpattern = /^[6]\d{5}$/;
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
			if(text.value==''){
				alt.innerHTML="This field is required";
				return false;
			}else if(!text.value.match(pinpattern)){
				alt.innerHTML="Enter valid Pincode. Starting with 6";
				return false;
			}else {
				alt.innerHTML="";
			}
		}
				
		function emailvalidate(id,alertid){
			var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
			if(text.value==''){
				alt.innerHTML="This field is required";
				return false;
			}else if(!text.value.match(emailreg)){
				alt.innerHTML="Enter valid Email";
				return false;
			}else {
				alt.innerHTML="";
			}
		}
		
		function websitevalidate(id,alertid){
            var webreg=/^[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/;
            var webreg1 = /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/;
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
			if(!text.value.match(webreg) && !text.value.match(webreg1) && text.value!=''){
				alt.innerHTML="Enter valid Website";
				return false;
			}else{
			     webreg = /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/;
			     if(!text.value.match(webreg) && text.value!=''){
			         text.value='http://'+text.value;
			     }
				alt.innerHTML="";
                return true;
			}
		}
		
		
		
		function restlength(node) {
		      //alert(node.id);
            if(node.value.length==node.getAttribute('maxlength') && event.keyCode!=8) {
                if(parseInt(node.value) < parseInt(node.getAttribute('min')) && node.hasAttribute('min')) {
                    node.value=node.getAttribute('min');
                }
                else if(parseInt(node.value) > parseInt(node.getAttribute('max')) && node.hasAttribute('max')) {
                    node.value=node.getAttribute('max');
                }  
                return false;
            }
            if(!(document.activeElement.id==node.id)){
                //alert('asdf');
                if(parseInt(node.value) < parseInt(node.getAttribute('min')) && node.hasAttribute('min')) {
                    node.value=node.getAttribute('min');
                }
                else if(parseInt(node.value) > parseInt(node.getAttribute('max')) && node.hasAttribute('max')) {
                    node.value=node.getAttribute('max');
                }  
                return false;
            }
            return true;
        }
        
        //Function Included By Vivek Rao Ramco Cements

function checkRequired(frmid,checkbit=0,modal='myModal',callback=popup,para=''){
    var frm=document.getElementById(frmid);
    var pt='';var wht;var alttext='';
    for(var i=0;i<frm.elements.length;i++){
        //alert(frm.elements[i].id);
		if((frm.elements[i].hasAttribute("required")) && (frm.elements[i].value=='' || frm.elements[i].value==null)){
		      //pr=frm.elements[i].parentNode.parentNode;
              wht=checkPreviousLabelNode(frm.elements[i]);
              if(wht instanceof HTMLLabelElement)
                 alttext='Check Field :'+wht.innerHTML;
              else{
                alttext='All Values Required ';
              }
              if(!isHidden(frm.elements[i]) && frm.elements[i].disabled==false){
                if(confirm(alttext))
                    frm.elements[i].focus(); 
                return false;
              }
              
		}
        if(document.getElementById(modal))
            modalTDID(frm.elements[i].id+'_td',frm.elements[i]);
    }
    //alert('Checkbit ='+checkbit);
    if(document.getElementById(modal))
        $('#'+modal).modal({show: 'true'});
    else{
        if(para==''){
            callback(frmid,para);
        }   
        else{
            callback(frm,para);
        }
    }
        //popup(frmid);
    /*if(checkbit==0)
        $('#myModal').modal({show: 'true'});
    else if(checkbit==1)
        popup(frmid);*/
}

function modalTDID(tdid,node){
    //alert('ModTDID :'+node.id+'-----'+node.value);
    var dt,checkValue='';
    if(node.type=='text' || node.type=='email' || node.type=='number' || node.type=='tel' || node.type=='url'){
        checkValue=node.value;
    }else if(node.type=='date'){
        dt=node.value.split('-');
        checkValue=dt[2]+'-'+dt[1]+'-'+dt[0];   
    }
    else if(node.type=='select-one'){
        checkValue=node.options[node.selectedIndex].text;
    }
    else if(node.type=='radio'){
        if(node.checked){
            var lb=checkPreviousLabelNode(node);
            //alert(node.name+'_td');
            if(lb instanceof HTMLLabelElement)
                checkValue=lb.innerHTML;
            tdid=node.name+'_td';
        }
    }
    else{
        checkValue=node.type;
        //alert(node.id+' '+checkValue);
    }
    if(!document.getElementById(tdid))
        return false;
    else
        document.getElementById(tdid).innerHTML=checkValue;
    //alert(checkValue);    
}

function setmindoj(currentnode,setnode,year) {
    var dob = new Date(currentnode.value);
    var dobsp = currentnode.value.split('-');
    var doj = (dob.getFullYear()+ year)+'-'+dobsp[1]+'-'+dobsp[2];
    document.getElementById(setnode).disabled=false;
    document.getElementById(setnode).setAttribute('min',doj);
}
function popup(frmid,rtn=true){
    //alert(frmid.id);
    swal({
        title: "Are you sure?",
        text: "You Have Validated The Form",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Save!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function(isConfirm){
    if (isConfirm){ 
        //if(rtn)
            document.getElementById(frmid).submit();
        //else
            //return true;
    }
    else
        swal("Cancelled", "Your cancelled the teacher profile", "error");
        return false;
    });	
}

function setRequiredField(baseValue,enableids,whichValue){
    //alert('Set Required'+'==='+baseValue+'  '+enableids+'  '+whichValue);
    var wValue=whichValue.split(",");
    var ids=enableids.split(",");
    var i,id,checkbit=0;
    for(i in wValue){
        //alert(wValue[i]);
        if(baseValue==wValue[i]){
            //alert(Array.isArray(ids));
            for(id in ids){
                if(document.getElementById(ids[id])!=null)
                    document.getElementById(ids[id]).setAttribute('required','required');
            }
            checkbit=1;
        }
    }
    
    if(checkbit==0){
        for(id in ids){
            if(document.getElementById(ids[id])){
                document.getElementById(ids[id]).removeAttribute('required');
                document.getElementById(ids[id]).value='';
            }
        }
    }
}
function checkPreviousLabelNode(node){
    //alert('Label :'+node.id+'-----'+node.value);
    var labelElement=node;
    if((labelElement instanceof HTMLLabelElement)){
        //console.log(labelElement);
        return labelElement;
    }
    else{
        //console.log(labelElement);
        if(labelElement.previousSibling!=null)
            return checkPreviousLabelNode(labelElement.previousSibling);
    }
}

function onScriptAddRowValidation(node){
    var ret=true,opt='';
    if(node.nextElementSibling!=null)
        return false;
    for(var i=0;i<node.children.length-1;i++){
        if(node.children[i].children[0] instanceof HTMLDivElement)
            opt=NodeDeepChildren(node.children[i].children[0]);
        else{
            opt=NodeDeepChildren(node.children[i]);
        }
        if(!opt)
            ret=opt;
    }
    return ret;
}
function NodeDeepChildren(node){
    var ret=true;
    for(var i=0;i<node.children.length;i++){
        //alert(node.children[i].id+'===='+checkInstanceof(node.children[i]) +' && '+ node.children[i].hasAttribute("required"));
        if(checkInstanceof(node.children[i]) && node.children[i].hasAttribute("required")){
            var st=window.getComputedStyle(node.children[i]);
            if(st.visibility!='hidden'){
                if(node.children[i].value=='' || node.children[i].value=='00:00'){
                    alert(node.children[i].name);
                    ret=false;
                }
            }
        }
    }
    //alert(ret);
    return ret;
}

function progressTransfer(id){
    var node=document.getElementById(id);
    var hyperRef=node.getAttribute('href');
    window.location.href=hyperRef;
}

function closeInnerIDs(baseVal,allids,whichVal){
    var ids=allids.split(',');
    var wVal=whichVal.split(',');
    var dis='';
    for(w in wVal){
        if(wVal[w]==baseVal){
            dis='none';
        }
    }
    for(id in ids){
        //alert(ids[id]);
        document.getElementById(ids[id]).style.display=dis;
    }
}

function updateDiv(update)
{ 
    var tr=update.nextElementSibling;
    var uptr=update;
    update=update.children[update.children.length-2];
    for(var i=0;i<update.children.length;i++){
        update.children[i].innerHTML=update.children[i].innerHTML;
    }
    if(tr==null)
        return;
    var rdios=tr.querySelectorAll('input[type="radio"]');
    for(var i=0;i<rdios.length;i++){
        if(rdios[i].value==0){
            rdios[i].setAttribute('checked','checked');
        }
        else{
            rdios[i].removeAttribute('checked');
        }
    }
    updateRadioCheck(rdios[1],rdios[1].parentNode.nextElementSibling);
}

function updateRadioCheck(node,viewNode){
    if(node.checked && node.value==1){
        node.setAttribute('checked','checked');
        node.parentNode.children[4].removeAttribute('checked');
        if(viewNode!=null)
            viewNode.style.display='';
    }
    else if(node.checked && node.value==0){
        node.setAttribute('checked','checked');
        node.parentNode.children[2].removeAttribute('checked');
        if(viewNode!=null)
            viewNode.style.display='none';
    }
}

function nodeDeepChildren(inputElement,tRowCount){
    var z=0,checkbit=0;
    //alert(inputElement);
    inputElement.hasAttribute('id')?(inputElement.id=inputElement.id.split('_')[0]+'_'+tRowCount):'';
    for(var input=0;input<inputElement.children.length;input++){
        if(checkInstanceof(inputElement.children[input])){
            var inputid=inputElement.children[input].id;
            var id=inputid.split('_');
            if(inputElement.children[input].getAttribute('type')=='radio'){
                if(z==0){
                    inputElement.children[input].id=id[0]+'_'+(tRowCount);
                    inputElement.children[input].name=id[0]+'_'+(tRowCount);
                    z=tRowCount;
                }
                else{
                    inputElement.children[input].id=id[0]+'_'+(z+1);
                    inputElement.children[input].name=id[0]+'_'+(tRowCount);
                    z=0;
                }
                //alert(inputElement.children[input].checked);
            }
            else{
                inputElement.children[input].id=id[0]+'_'+(tRowCount);
                inputElement.children[input].name=id[0]+'_'+(tRowCount);   
            }
            checkbit=1;
        }
        else if(inputElement.children[input] instanceof HTMLDivElement){
            nodeDeepChildren(inputElement.children[input],tRowCount);
        }
    }
}

function blockgenerate(node){
    //alert(node);
    var ddd=document.getElementById('blockcreate');
    while (ddd.firstChild) {
        ddd.removeChild(ddd.firstChild);
    }
    for(var i=1;i<=parseInt(node.value);i++){
        var div=document.createElement('div');
        div.setAttribute('class','form-group col-md-12');
        div.setAttribute('id','block_'+(i+2));
        div.innerHTML=document.getElementById('block_1').innerHTML;
        ddd.appendChild(div);
    }
    BlockIDNameChange();
}

function BlockIDNameChange(){
    var div=document.getElementById('blockcreate');
    //Inner Div Selection
    //alert(div.children.length);
    for(var inDiv=0;inDiv<div.children.length;inDiv++){
        var table=div.children[inDiv].children[0];
        for(var tb=0;tb<table.children.length;tb++){
            var tbody=table.children[tb];
            for(var tr=0;tr<tbody.children.length;tr++){
                var row=tbody.children[tr];
                for(var th=0;th<row.children.length;th++){
                    var thele=row.children[th];
                    if(thele.hasAttribute('class')){
                        thele.children[0].innerHTML='BLOCK - '+(inDiv+1);
                        continue;
                    }
                    for(var ele=0;ele<thele.children.length;ele++){
                        var element=thele.children[ele];
                        //if(checkInstanceof(element)){
                            element.id=element.id.split('_')[0]+'_'+inDiv;
                            element.name=element.id.split('_')[0]+'_'+inDiv;
                       // }
                    }
                }
            }
        }
    } 
}

function setMinandMax(node,nodeID,base=1947,majcond='min'){
    //alert(nodeID);
    var setNode=document.getElementById(nodeID);
    if(setNode!=null){
        var setvalue=node.value;
        if(node.value < setNode.getAttribute('min')){
            if(node.value < base){
                setvalue=base
            }
        }
        setNode.setAttribute(majcond,setvalue); 
        setNode.value=''; 
    }  
    return true;
}


function setMax(node,nodeID,base=25,majcond='max') {
    
    var setNode=document.getElementById(nodeID);
    var setvalue=node.value;
    if(node.value < setNode.getAttribute('max')){
        if(node.value < base){
            setvalue=base
        }
    }
    setNode.setAttribute(majcond,setvalue); 
    setNode.value='';   
    return true;
}

function makereadonly(node){
    
    var rd=node.nextElementSibling;
     
    if(node.children[0].value==3){
       //alert(node.children[0].value);
        rd.children[0].value=0;
        rd.children[0].setAttribute('readonly','readonly');
    }
    else{
        rd.children[0].value='';
        rd.children[0].removeAttribute('readonly');
    }
}




function sqfttoacre(node){
    var id=node.id.split("_");
    if(id[1]==undefined){
        document.getElementById(id[0]+'_1').value=(parseFloat(node.value)/43560).toFixed(3);
    }
    else{
        document.getElementById(id[0]).value= parseFloat(node.value) * 43560;
    }
}

function sumofall(node,sel=1){
    var sum=0,val=0;
    for(var i=sel;i<node.children.length-1;i++){
        for(var j=0;j<node.children[i].children.length;j++){
            if(checkInstanceof(node.children[i].children[j])){
                val=0;
                if(node.children[i].children[j].value!=''){
                    val=parseInt(node.children[i].children[j].value);    
                }
            }
        }
        sum+=val;
    }
	//alert(node);
    node.lastElementChild.children[0].value=sum;
}

function resetItems(ids){
    document.getElementById(ids).innerHTML=document.getElementById(ids).innerHTML;
}
function isHidden(el) {
    return (el.offsetParent === null)
}