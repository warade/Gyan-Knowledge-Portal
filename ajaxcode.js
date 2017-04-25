xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function(){
	
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		document.getElementById("content").innerHTML=xmlhttp.responseText;			}
	}
		xmlhttp.open("POST","trial.php",true);
		xmlhttp.send();
};