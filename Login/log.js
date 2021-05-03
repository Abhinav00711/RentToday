function loginValidation()
{
    var usname = document.ownerlogin.username;
    //var pass = document.ownerlogin.password;

    return alphanumeric(usname);
}

function loginValidation1()
{
    var usname = document.tenantlogin.username1;
    //var pass = document.ownerlogin.password;

    return alphanumeric(usname);
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