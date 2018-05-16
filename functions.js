//Funktion som säkerställer att båda inloggningsfält är ifyllda
function validateLogin()
{
    var email = document.forms["logginform"]["epost"].value;
    var psw = document.forms["logginform"]["psw"].value;

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
function validateRegistration()
{
  var name = document.forms["registrationform"]["namn"].value;
  var email = document.forms["registrationform"]["email"].value;
  var mnr = document.forms["registrationform"]["mnr"].value;
  var psw = document.forms["registrationform"]["psw"].value;
  var psw-repeat = document.forms["registrationform"]["psw-repeat"].value;

  if ((name == "") || (email == "") || (mnr == "") || (psw == "") ||(psw-repeat == ""))
    {
      alert("Fyll i alla fälten i formuläret");
      return false;
    }
}

//Funktion som säkerställer att alla registreringsfälten är ifyllda
function validateStudycoach()
{
  var name = document.forms["regHelper"]["name"].value;
  var email = document.forms["regHelper"]["email"].value;
  var psw = document.forms["regHelper"]["password"].value;
  var des = document.forms["regHelper"]["description"].value;
  var pNr = document.forms["regHelper"]["phoneNr"].value;

  if ((name == "") || (email == "") || (psw == "") || (des == "") ||(pNr == ""))
    {
      alert("Fyll i alla fälten i formuläret");
      return false;
    }
}

function
