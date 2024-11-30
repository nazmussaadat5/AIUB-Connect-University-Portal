var name = document.getElementById('name');
var username = document.getElementById('username');
var email = document.getElementById('email');
var password = document.getElementById('password');
var dob = document.getElementById('dob');
var gender = document.querySelectorAll('input[name="gender"]');
var form = document.querySelector('form');

form.addEventListener('submit', function (event) {
    if (!validateForm()) {
        event.preventDefault();
    }
});

function validateForm() {
    var isValid = true;

    
    if (name.value.trim() === '') {
        setError(name, 'Name is required');
        isValid = false;
    } else {
        setSuccess(name);
    }

    
    if (username.value.trim() === '') {
        setError(username, 'Username is required');
        isValid = false;
    } else {
        setSuccess(username);
    }

    
    if (email.value.trim() === '') {
        setError(email, 'Email is required');
        isValid = false;
    } else if (!isValidEmail(email.value.trim())) {
        setError(email, 'Invalid email format');
        isValid = false;
    } else {
        setSuccess(email);
    }

    
    if (password.value.trim() === '') {
        setError(password, 'Password is required');
        isValid = false;
    } else {
        setSuccess(password);
    }

    
    if (dob.value.trim() === '') {
        setError(dob, 'Date of Birth is required');
        isValid = false;
    } else {
        setSuccess(dob);
    }

    
    var selectedGender = false;
    gender.forEach(function (input) {
        if (input.checked) {
            selectedGender = true;
        }
    });

    if (!selectedGender) {
        setError(document.getElementById('gender'), 'Please select a gender');
        isValid = false;
    } else {
        setSuccess(document.getElementById('gender'));
    }

    return isValid;
}

function isValidEmail(email) {
    
    return /\S+@\S+\.\S+/.test(email);
}

function setError(input, message) {
    var parent = input.parentElement;
    var errorMessage = parent.querySelector('.error');
    errorMessage.textContent = message;
    parent.classList.add('error');
    parent.classList.remove('success');
}

function setSuccess(input) {
    var parent = input.parentElement;
    parent.classList.add('success');
    parent.classList.remove('error');
    var errorMessage = parent.querySelector('.error');
    errorMessage.textContent = '';
}