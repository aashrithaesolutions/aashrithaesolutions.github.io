  alert("xxxx");
const dbparam=JSON.stringify({table:"purchase",limit:20});
const xmlhttp=new XMLHttpRequest();
xmlhttp.onload=function(){
  const myobj=JSON.parse(this.responseText);
  let text="";
  for(let x in myobj)
  {
    text+=myobj[x].name;
  }

document.getElementById("review").innerHTML=text;

}
xmlhttp.open("POST","insert.php");
xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
xmlhttp.send("x="+dbparam);
