var username = document.querySelector('.form-username');
var Password = document.querySelector('.form-pass');
var form = document.querySelector('.form');
var btn = document.querySelector('.form-btn');

form.addEventListener('submit', (e) => {
    if (!validateform()) {
        e.preventDefault();
    }
});

function validateform() {
    var usernameval = username.value.trim();
    var passval = Password.value.trim();
    var isvalid = true;

    if (usernameval === '') {
        setError(username, 'Username cannot be empty');
        isvalid = false;
    } else if (!isValidusername(usernameval)) {
        setError(username, "Only lowercase letters and numbers allowed");
        isvalid = false;
    } else {
        setSuccess(username);
    }

    if (passval === '') {
        setError(Password, 'Password cannot be empty');
        isvalid = false;
    } else if (!isvalidpass(passval)) {
        setError(Password, "Password must be at least 6 characters long & contain a lowercase letter");
        isvalid = false;
    } else {
        setSuccess(Password);
    }
    return isvalid;
}

const isValidusername = (username) => {
    return /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/.test(username);
}

const isvalidpass = (pass) => {
    return /^(?=.*[a-z]).{6,}$/.test(pass);
}

let setError = (input, message) => {
    let formControl = input.parentElement;
    let errorDisplay = formControl.querySelector('.error');
    errorDisplay.textContent = message;
    formControl.classList.add('error');
    formControl.classList.remove('success');
}