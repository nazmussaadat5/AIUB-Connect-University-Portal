var form = document.querySelector('form');

form.addEventListener('submit', function(event) {
    var username = document.getElementById('username');
    var password = document.getElementById('password');

    
    if (!validateForm(username, password)) {
        event.preventDefault();
    }
});

function validateForm(username, password) {
    var isValid = true;

    
    if (username.value.trim() === '') {
        setError(username, 'Username is required');
        isValid = false;
    } else {
        setSuccess(username);
    }

    
    if (password.value.trim() === '') {
        setError(password, 'Password is required');
        isValid = false;
    } else {
        setSuccess(password);
    }

    return isValid;
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
    parent.classList.remove('error');
    parent.classList.add('success');
}
