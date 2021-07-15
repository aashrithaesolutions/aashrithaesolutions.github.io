function showCustomer(str){
     
    if(str=="")
    {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    
    document.getElementById("txtHint").innerHTML = this.responseText;
  }
  xhttp.open("GET","getcustomer.php?q="+str);
  xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
   xhttp.send();
}
