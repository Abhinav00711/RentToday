function formValidation()
{
    var pname = document.flatform.prop_name;
    var price = document.flatform.room_price;
    var lm = document.flatform.landmark;
    
    if(allLetter(pname))
    {
        if (allnumerics(price))
        {
            if (allLetter(lm))
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

function allnumerics(ucontact)
{ 
    var numbers = /^[0-9]+$/;
    if(ucontact.value.trim().match(numbers))
    {
        return true;
    }
    else
    {
        alert('Contact must have numbers only');
        ucontact.focus();
        return false;
    }
}
