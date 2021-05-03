function formValidation1()
{
    var uname = document.tenantform.name1;
    //var ucontact = document.tenantform.contact1;
    var uage = document.tenantform.age1;
    var gname = document.tenantform.guardian_name1;
    //var gcontact = document.tenantform.guardian_contact1;
    var pass = document.tenantform.password1;
    var cpass = document.tenantform.cpassword1;
    var city = document.tenantform.city1;
    var state = document.tenantform.state1;
    //var ugender = document.tenantform.gender;
    var usname = document.tenantform.username1;
    //var uemail = document.tenantform.email1;
    
    if(allLetter(uname))
    {
        if(repeat_pass(pass,cpass))
        {
            if (alphanumeric(usname))
            {
                if(allnumerics1(uage))
                {
                    if(allLetter1(gname))
                    {
                        if(allLetter2(city))
                        {
                            if(allLetter3(state))
                            {
                                return true;
                            }
                        }
                    }
                }
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

function allLetter1(gname)
{ 
    var letters = /^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$/;
    if(gname.value.trim().match(letters))
    {
        return true;
    }
    else
    {
        alert("Invalid Guardian Name");
        gname.focus();
        return false;
    }
}

function allLetter2(city)
{ 
    var letters = /^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$/;
    if(city.value.trim().match(letters))
    {
        return true;
    }
    else
    {
        alert("Invalid City");
        city.focus();
        return false;
    }
}

function allLetter3(state)
{ 
    var letters = /^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$/;
    if(state.value.trim().match(letters))
    {
        return true;
    }
    else
    {
        alert("Invalid State");
        state.focus();
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

function allnumerics1(uage)
{ 
    var numbers = /^[0-9]+$/;
    if(uage.value.trim().match(numbers))
    {
        return true;
    }
    else
    {
        alert("Invalid Age");
        uage.focus();
        return false;
    }
}

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
