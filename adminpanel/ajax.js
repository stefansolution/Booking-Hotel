function verify()
{
var name = document.getElementById('username').value;
		if( name=='')
		{
		document.getElementById("spanMessage").innerHTML="<font color = 'red'>Enter your name</font>"
		return false;
		}
		var email = document.getElementById('email').value;
		if( email=='')
		{
		document.getElementById("spanMessage").innerHTML="<font color = 'red'>Enter your email address</font>"
		return false;
		}

var password = document.getElementById('password').value;
		if( password=='' || password < 4)
		{
		document.getElementById("spanMessage").innerHTML="<font color = 'red'>Password mus contain at least four character</font>"
		return false;
		}
var cnf_password = document.getElementById('cnf_password').value;
		if( password=='')
		{
		document.getElementById("spanMessage").innerHTML="<font color = 'red'>Please retype your password</font>"
		return false;
		}
		if( password!=cnf_password)
		{
		document.getElementById("spanMessage").innerHTML="<font color = 'red'>Please retype your password Correctly</font>"
		return false;
		}
		}
function GenericAjaxFunction(  queryString, outputDiv, recallInterval )
  {
  var xmlHttp;

  ////////////////////////////////
 try
    {
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
  ///////////////////////////////

    xmlHttp.onreadystatechange=function()
      {
      if(xmlHttp.readyState==4) //Page download complete
        {
		 document.getElementById(outputDiv).innerHTML=xmlHttp.responseText;
		
		if(recallInterval>0)
			 setTimeout("GenericAjaxFunction(  '"+queryString+"', '"+outputDiv+"' ,"+recallInterval+" )", recallInterval);
		}
     }

	xmlHttp.open("POST", queryString ,true); //Async.
	xmlHttp.send(null); 
  }
