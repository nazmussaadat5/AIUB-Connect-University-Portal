var name = document.getElementsByClassName('form-name');
var username = document.getElementsByClassName('form-username');
var email = document.getElementsByClassName('form-email');
var pass = document.getElementsByClassName('form-pass');
var dob = document.getElementsByClassName('form-dob');
var gender = document.getElementsByClassName('form-gender');
var form = document.querySelector('.form');
var submitbtn = document.getElementsByClassName('form-btn');
var successMessage = document.querySelector('.success-message');
var genderInputs = document.querySelectorAll('input[name="form-gender"]');

form.addEventListener('submit', (e) => {
    if (!validateform()) {
        e.preventDefault();
    }
});

function validateform() {
    var nameval = name.value.trim();
    var usernameval = username.value.trim();
    var emailval = email.value.trim();
    var passval = pass.value.trim();
    var dobval = dob.value.trim();
    var genderval = "";

    var isvalid = true;

    if (nameval === '') {
        setError(name, 'Name must be given');
        isvalid = false;
    } else if (!isvalidname(nameval)) {
        setError(name, "Only letters and white space");
        isvalid = false;
    } else {
        setSuccess(name);
    }

    if (usernameval === '') {
        setError(username, 'Username cannot be empty');
        isvalid = false;
    } else if (!isValidusername(usernameval)) {
        setError(username, "Only lowercase letters and numbers allowed");
        isvalid = false;
    } else {
        setSuccess(username);
    }

    if (emailval === '') {
        setError(email, 'Email cannot be empty');
        isvalid = false;
    } else if (!isvalidemail(emailval)) {
        setError(email, "Wrong Email");
        isvalid = false;
    } else {
        setSuccess(email);
    }

    if (passval === '') {
        setError(pass, 'Password cannot be empty');
        isvalid = false;
    } else if (!isvalidpass(passval)) {
        setError(pass, "Password must be at least 6 characters long and contain at least 1 lowercase letter");
        isvalid = false;
    } else {
        setSuccess(pass);
    }

    if (dobval === '') {
        setError(dob, 'Date of Birth cannot be empty');
        isvalid = false;
    } else {
        setSuccess(dob);
    }

    genderInputs.forEach((input) => {
        if (input.checked) {
            genderval = input.value;
        }
    });

    if (!genderval) {
        setError(gender, "Please select a gender");
        isvalid = false;
    } else {
        setSuccess(gender);
    }

    return isvalid;
}

const isvalidname = (name) => {
    return /^[a-zA-Z\s]+$/.test(name);
}

const isValidusername = (username) => {
    return /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/.test(username);
}

const isvalidemail = (email) => {
    return /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i.test(email);
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

let setSuccess = (input) => {
    let formControl = input.parentElement;
    let errorDisplay = formControl.querySelector('.error');
    errorDisplay.textContent = '';
    formControl.classList.add('success');
    formControl.classList.remove('error');
}
