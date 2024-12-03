const form = document.getElementById('registerForm');
const username = document.getElementById('username');
const email = document.getElementById('email');
const phonenumber = document.getElementById('phonenumber');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirm-password');

// Add Event Listener
form.addEventListener('submit', function(e) {
    e.preventDefault();
    validateInputs();
});

// Validation Functions
function validateInputs() {
    // Get values from inputs
    const usernameValue = username.value;
    const emailValue = email.value;
    const phonenumberValue = phonenumber.value;
    const passwordValue = password.value;
    const confirmPasswordValue = confirmPassword.value;

    // Username validation
    if (isEmptyOrSpaces(usernameValue)) {
        setErrorFor(username, 'Username cannot be blank');
    } else {
        setSuccessFor(username);
    }

    // Email validation
    if (isEmptyOrSpaces(emailValue)) {
        setErrorFor(email, 'Email cannot be blank');
    } else if (!isValidEmail(emailValue)) {
        setErrorFor(email, 'Not a valid email');
    } else {
        setSuccessFor(email);
    }

    // Phone number validation
    if (isEmptyOrSpaces(phonenumberValue)) {
        setErrorFor(phonenumber, 'Phone number cannot be blank');
    } else {
        setSuccessFor(phonenumber);
    }

    // Password validation
    if (isEmptyOrSpaces(passwordValue)) {
        setErrorFor(password, 'Password cannot be blank');
    } else {
        setSuccessFor(password);
    }

    // Confirm password validation
    if (isEmptyOrSpaces(confirmPasswordValue)) {
        setErrorFor(confirmPassword, 'Confirm Password cannot be blank');
    } else if (passwordValue !== confirmPasswordValue) {
        setErrorFor(confirmPassword, 'Passwords do not match');
    } else {
        setSuccessFor(confirmPassword);
    }
}

// Helper Functions
function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

function isValidEmail(email) {
    return /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email);
}

function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}
