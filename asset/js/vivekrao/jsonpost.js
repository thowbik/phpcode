function createJSON(frmid){
    var frmstr=frmid;
    var jsArray={};
    for(var i=0;i<frmstr.elements.length;i++){
        if(frmstr.elements[i].type!='fieldset'){
            //alert(frmstr.elements[i].value);
            if(frmstr.elements[i].type=='checkbox'){
                if(frmstr.elements[i].checked){
                    jsArray[frmstr.elements[i].name]=frmstr.elements[i].value;
                }
                else{
                    jsArray[frmstr.elements[i].name]=0;
                }
            }
            else{
                jsArray[frmstr.elements[i].name]=frmstr.elements[i].value;    
            }
            
        }
    }
    if(document.getElementById('controlload')==null){
        var ctrl=document.createElement('div');
        ctrl.setAttribute('id','controlload');
        ctrl.style.position="fixed";
        ctrl.style.left="0px";ctrl.style.top="0px";
        ctrl.style.backgroundColor="rgba(0,0,0,0.5)";
        ctrl.style.width=screen.width+'px';
        ctrl.style.height=screen.height+'px';
        ctrl.innerHTML='Loading Edit Mode';
        document.body.appendChild(ctrl);
        disableScroll();
    }
    //alert(JSON.stringify(jsArray));
    return JSON.stringify(jsArray);
}
function postRequest(postdata,url,fid) {
    //querystring=querystring+"&"+token;
    //alert(postdata+" "+url+" "+querystring);
    var httpRequest;
    httpRequest = new XMLHttpRequest();
    if (!httpRequest) {
        alert('Giving up :( Cannot create an XMLHTTP instance');
        return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('POST', url,true);
    httpRequest.send(postdata);
    function alertContents() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                afterResponseText(httpRequest.responseText,fid);
                checkfornullvalues(httpRequest.responseText,fid);
            } 
            else {
                alert('There was a problem with the request.');
            }
        }
    }
}
function checkfornullvalues(rsText,fid,hid='chaingaddress'){
    var frmstr=fid;
    var jsArr=JSON.parse(rsText);
    var hideele=null;
    var chainelement=null;
    if(document.getElementById(hid)!=null){
        hideele=document.getElementById(hid);
        chainelement=hideele.value.split(','); 
    }
    var checkbit=0;
    if(chainelement==null){
        checkbit=0;
    }
    for(ch in chainelement){
        for(js in jsArr){
            if(chainelement[ch]==js){
                idele=document.getElementById(js);
                if(idele==null){
                    celement=document.getElementsByName(js);
                    if(celement[0].type=='radio'){
                        if(celement[0].value==jsArr[js]){
                            if(!celement[0].checked){
                                celement[0].checked=true;
                                celement[0].onchange();
                                checkbit=1;
                            }
                        }
                        else{
                            if(!celement[1].checked){
                                celement[1].checked=true;
                                celement[1].onchange();
                                checkbit=1;
                            }
                        }
                    }
                    /*else if(celement[0] instanceof HTMLSelectElement){
                        if(celement[0].value!=null || celement[0].value!=''){
                            if(celement[0].options.length>0){
                                for(var i=0;i<celement[0].options.length;i++){
                                    if(celement[0].options[i].value==jsArr[js]){
                                        celement[0].options[i].selected=true;
                                        celement[0].onchange();
                                        checkbit=1;
                                    }
                                }
                            }
                            else{
                                checkbit=1;
                            }
                        }
                    }*/
                }
                else{
                    if((idele.value!=null && idele.value!='')){
                        //alert(idele.value);
                        continue;    
                    }
                    else if(idele instanceof HTMLSelectElement){
                        if(idele.options.length>0 && (jsArr[js]!=null && jsArr[js]!='')){
                            for(var i=0;i<idele.options.length;i++){
                                if(idele.options[i].value==jsArr[js]){
                                    if(jsArr[js]!=null && jsArr[js]!=''){
                                        idele.options[i].selected=true;
                                        idele.onchange();
                                    }
                                    //alert('Option');
                                    checkbit=1;
                                }
                            }
                        }
                        else if(jsArr[js]!=null && jsArr[js]!=''){
                            //alert('Else');
                            checkbit=1;
                        }
                    }
                }
            }
        }
    }
    if(checkbit==1){
        if(document.getElementById('btnedit')){
            document.getElementById('btnedit').onclick();
            checkbit=0;
        }
    }
    else{
        var r=document.getElementById('controlload');
        var pr=r.parentNode;
        pr.removeChild(r);
        enableScroll();
    }
}

function afterResponseText(rsText,fid,hid='chaingaddress'){
    var frmstr=fid;
    var jsArr=JSON.parse(rsText);
    var elements=null;
    var btnid=hideele=chainelement=null;
    if(document.getElementById(hid)!=null){
        hideele=document.getElementById(hid);
        chainelement=hideele.value.split(',');   
    }
    //alert(hideele.value);
    var chelement=0;
    for(js in jsArr){
        elements=document.getElementsByName(js);
        if(elements[0]!=undefined){
            for(el in elements){
                if(hideele!=null){
                    for(ch in chainelement){
                        if(chainelement[ch]==elements[el].id || chainelement[ch]==elements[el].name){
                            chelement=1;
                            //alert(ch+'----'+chainelement[ch]+'---------'+elements[el].id+'------------'+elements[el].name);
                        }
                        
                    }
                    if(chelement==1){
                        chelement=0;
                        continue;
                    }
                }
                if(elements[el].type=='radio'){
                    if(elements[el].value==jsArr[js]){
                        if(!elements[el].checked){
                            elements[el].checked=true;
                            if(elements[el].hasAttribute("onchange"))
                                elements[el].onchange();   
                        }
                    }
                }
                else{
                    //alert(elements[el]);
                    if(elements[el].value!=null || elements[el].value!=''){
                        elements[el].value=jsArr[js];
                        if(checkInstanceof(elements[el]) && elements[el].hasAttribute("onchange"))
                                elements[el].onchange(); 
                    }
                }
            }
        }
        else {
            var nd=document.getElementById(js);
            if(nd==null){
                sp=js.split("_");
                btnid='btn'+sp[0]+'_'+(sp[1]-1);
                btn=document.getElementById(btnid);
                //alert(btn);
                if(btn!=null && btn.type=='button'){
                    btn.click();
                    afterResponseText(rsText,fid);
                }
                if(checkInstanceof(nd)){
                    if(nd.hasAttribute("onchange")){
                        nd.onchange();
                    }
                }
            }
        }  
    }
    
    for(js in jsArr){
        elements=document.getElementsByName(js);
        if(elements[0]!=undefined){
            for(el in elements){
                if((elements[el].value=='' && elements[el].value==null) && (jsArr[js]!=null && jsArr[js]!='')){
                    if(chainelement!=null){
                        if(chainelement.constructor===Array && chainelement.indexOf(js)!=-1){
                            continue;
                        }
                    }
                    afterResponseText(rsText,fid,hid);
                }
            }
        }
    }
}
var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault)
  {
    if(!e instanceof TouchEvent )
        e.preventDefault();
  }
  e.returnValue = false;  
}

function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}

function disableScroll() {
  if (window.addEventListener) // older FF
      window.addEventListener('DOMMouseScroll', preventDefault, false);
  window.onwheel = preventDefault; // modern standard
  window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
  window.ontouchmove  = preventDefault; // mobile
  document.onkeydown  = preventDefaultForScrollKeys;
}

function enableScroll() {
    if (window.removeEventListener)
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
    window.onmousewheel = document.onmousewheel = null; 
    window.onwheel = null; 
    window.ontouchmove = null;  
    document.onkeydown = null;  
    
    
    //Pdf Conversion
    var baseurl=window.location.origin;
    var loc=window.location.href;
    var sp=loc.split('/');
    if(sp[sp.length-1] > 8){		
        window.print();
    }
    
}