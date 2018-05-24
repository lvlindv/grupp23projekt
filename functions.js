//Funktion som säkerställer att båda inloggningsfält är ifyllda
function validateLogin()
{
    // skapar variabler från formet loginForm av nuvarande inskrivet email och lösenord
    var email = document.forms["loginForm"]["email"].value;
    var psw = document.forms["loginForm"]["psw"].value;
    // Kollar om fälten är ifyllda
    if (email == "")
      {
        alert("Fyll i E-post");
        return false;
      }
    else if (psw == "")
      {
        alert("Fyll i Lösenord");
        return false;
      }
}

//Funktion som säkerställer att alla registreringsfälten är ifyllda
function validateReg()
{
  // skapar variabler från regForm(formulär)
  var name = document.forms["regForm"]["namn"].value;
  var email = document.forms["regForm"]["email"].value;
  var mnr = document.forms["regForm"]["mnr"].value;
  var psw = document.forms["regForm"]["psw"].value;
  // Kollar så alla fält är ifyllda
  if ((name == "") || (email == "") || (mnr == "") || (psw == ""))
    {
      alert("Fyll i alla fälten i formuläret!");
      return false;
    }
}

//Funktion som säkerställer att alla registreringsfälten är ifyllda
function validateStudyCoach()
{
  // skapar variabler från regHelper
  var name = document.forms["regHelper"]["name"].value;
  var email = document.forms["regHelper"]["email"].value;
  var psw = document.forms["regHelper"]["password"].value;
  var des = document.forms["regHelper"]["description"].value;
  var pNr = document.forms["regHelper"]["phoneNr"].value;
  // Kollar om alla fält är ifyllda
  if ((name == "") || (email == "") || (psw == "") || (des == "") ||(pNr == ""))
    {
      alert("Fyll i alla fälten i formuläret");
      return false;
    }
}
