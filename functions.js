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
function validateReg()
{
  var name = document.forms["regForm"]["namn"].value;
  var email = document.forms["regForm"]["email"].value;
  var mnr = document.forms["regForm"]["mnr"].value;
  var psw = document.forms["regForm"]["psw"].value;

  if ((name == "") || (email == "") || (mnr == "") || (psw == ""))
    {
      alert("Fyll i alla fälten i formuläret!");
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
