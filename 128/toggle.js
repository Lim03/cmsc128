// toggles password visibility
function toggle() {

    // the information entered in the password field
    var password = document.querySelector('[name=password]');
    
    // if the information's type is password
    if(password.getAttribute('type') === 'password') {

        // set the password into readable text; since password is not in string form when entered
        password.setAttribute('type', 'text');
        // change the eye icon's color to indicate the password visibility is on; grey to blue
        document.getElementById("font").style.color="#0B3B7B";
    }

    // if the information's type is not password (i.e., it's in readable text)
    else {

        // set the password back into its unreadable form
        password.setAttribute('type', 'password');
        // change the eye icon's color back to default to indicate the password visibility is off
        document.getElementById("font").style.color="#e7e7e7";
    }
}

// toggles password visibility on the confirm password field
// works the same with toggle(), just written separately
function toggle2() {
    var password = document.querySelector('[name=cpassword]');
    
    if(password.getAttribute('type') === 'password') {
        password.setAttribute('type', 'text');
        document.getElementById("font2").style.color="#0B3B7B";
    }

    else {
        password.setAttribute('type', 'password');
        document.getElementById("font2").style.color="#e7e7e7";
    }
}