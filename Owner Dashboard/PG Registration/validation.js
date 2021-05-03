function formValidation()
{
    var pname = document.pgform.prop_name;
    var price = document.pgform.room_price;
    var lm = document.pgform.landmark;
    
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
    var letters = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
    if(uname.value.trim().match(letters))
    {
        return true;
    }
    else
    {
        alert("Invalid Property Name");
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
        alert('Price must have numbers only');
        ucontact.focus();
        return false;
    }
}
