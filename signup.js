function process(){
  if(window.XMLHttpRequest){
    xmlHttp= new XMLHttpRequest();
  }else {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  $username=encodeURIComponent(document.getElementById('username').value());
  $emailid=encodeURIComponent(document.getElementById('emailid').value());
  xmlHttp.open("GET","sign.php?username="+$username+"&emailid="+$emailid,true);
  xmlHttp.onreadystatechange=response;
  xmlHttp.send();
}
function response(){
  if (xmlHttp.status==200 && xmlHttp.readyState==4) {
    responsearray=xmlHttp.responseText.split("{{}}");
    document.getElementById("user").innerHtml=responsearray[0];
    document.getElementById("email").innerHtml=responsearray[1];
  }
}
