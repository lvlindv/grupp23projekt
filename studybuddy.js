//Funktion som säkerställer att båda inloggningsfält är ifyllda
function validateloggin()
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
function validateregistration()
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

function
