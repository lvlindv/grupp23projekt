function validateloggin()
{
    var x = document.forms["logginform"]["epost"].value;
    var y = document.forms["logginform"]["psw"].value;

    if (x == "")
      {
        alert("Fyll i E-post");
        return false;
      }
    else if (y == "")
      {
        alert("Fyll i Lösenord");
        return false;
      }
}

function validateregistration()
{
  var a = document.forms["registrationform"]["namn"].value;
  var b = document.forms["registrationform"]["email"].value;
  var c = document.forms["registrationform"]["mnr"].value;
  var d = document.forms["registrationform"]["psw"].value;
  var e = document.forms["registrationform"]["psw-repeat"].value;

  if ((a == "") || (b == "") || (c == "") || (d == "") ||(e == ""))
    {
      alert("Fyll i alla fälten i formuläret");
      return false;
    }
}

function
