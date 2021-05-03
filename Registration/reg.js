function formValidation()
{
    var uname = document.ownerform.name;
    //var ucontact = document.ownerform.contact;
    var pass = document.ownerform.password;
    var cpass = document.ownerform.cpassword;
    //var ugender = document.ownerform.gender;
    var usname = document.ownerform.username;
    //var uemail = document.ownerform.email;
    
    if(allLetter(uname))
    {
        if(repeat_pass(pass,cpass))
        {
            if (alphanumeric(usname))
            {
                return true;
            }
        }
    }
    return false;
}

function allLetter(uname)
{ 
    var letters = /^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$/;
    if(uname.value.trim().match(letters))
    {
        return true;
    }
    else
    {
        alert("Invalid Name");
        uname.focus();
        return false;
    }
}

function alphanumeric(usname)
{ 
    var letters = /^[0-9a-zA-Z]+$/;
    if(usname.value.trim().match(letters))
    {
        return true;
    }
    else
    {
        alert("Username must have alphanumeric characters only!");
        usname.focus();
        return false;
    }
}
//Check error
function repeat_pass(passid,rpassid)
{
    if(passid.value.trim().localeCompare(rpassid.value) == 0)
    {
        return true;
    }
    else
    {
        alert("Password do not match");
        rpassid.focus();
        return false;
    }
}

