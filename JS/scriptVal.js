function validateFormRegCenter()
{
  var cenname =document.RegFormCen.cenname.value;
  var name =document.RegFormCen.name.value;
  var username =document.RegFormCen.username.value;
  var email =document.RegFormCen.email.value;
  var address =document.RegFormCen.address.value;
  var password =document.RegFormCen.password.value;
  var confirmPass=document.RegFormCen.confirmPass.value;
  //var cenname =document.RegFormCen.cenname.value;
  var error=0;
  document.getElementById('cenname_error').innerHTML = "";
  document.getElementById('name_error').innerHTML = "";
  document.getElementById('username_error').innerHTML = "";
  document.getElementById('email_error').innerHTML = "";
  document.getElementById('address_error').innerHTML = "";
  document.getElementById('password_error').innerHTML = "";
  if(cenname==null || cenname=="")
  {
    //alert("Name can't be blank!");
    error++;
    document.getElementById('cenname_error').innerHTML ="Centername can't be blank!";
    //return false;
  }
  if(name==null || name=="")
  {
    error++;
    document.getElementById('name_error').innerHTML ="Name can't be blank!";
  }
  if(username==null || username=="")
  {
    error++;
    document.getElementById('username_error').innerHTML ="Username can't be blank!";
  }
  if(email==null || email=="")
  {
    error++;
    document.getElementById('username_error').innerHTML ="Email can't be blank!";
  }
  if(address==null || address=="")
  {
    error++;
    document.getElementById('address_error').innerHTML ="Address can't be blank!";
  }
  if(password.length<6)
  {
    //alert("Password must be at least 6 characters long.");
    error++;
    document.getElementById('password_error').innerHTML ="Password must be at least 6 character long!";

  }
  if(password !=confirmPass)
  {
    error++;
    document.getElementById('password_error').innerHTML ="Password doesn't match to the previous one!";
  }
  if(error>0)
  {
    return false;
  }
  return true;


}
