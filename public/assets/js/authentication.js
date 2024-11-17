const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


function validateLoginForm() {
    let isValid = true;

    const username = document.getElementById('login_username');
    const password = document.getElementById('login_password');
    const usernameError = document.getElementById('username_error_message');
    const passwordError = document.getElementById('password_error_message');

    usernameError.textContent = '';
    passwordError.textContent = '';

    if (username.value.trim() === '') {
        usernameError.textContent = 'Username is required';
        isValid = false;
    }

    if (password.value.trim() === '') {
        passwordError.textContent = 'Password is required';
        isValid = false;
    }

    return isValid;
}

function validateRegisterForm() {
    let isValid = true;

    const username = document.getElementById('register_username');
    const email = document.getElementById('email');
    const password = document.getElementById('register_password');
    const confirmPassword = document.getElementById('confirm-password');
    const usernameError = document.getElementById('register_username_error_message');
    const emailError = document.getElementById('email_error_message');
    const passwordError = document.getElementById('register_password_error_message');
    const confirmPasswordError = document.getElementById('confirm_password_error_message');

    usernameError.textContent = '';
    emailError.textContent = '';
    passwordError.textContent = '';
    confirmPasswordError.textContent = '';

    if (username.value.trim() === '') {
        usernameError.textContent = 'Username is required';
        isValid = false;
    }else if (username.value.trim().length < 4) {
        usernameError.textContent = 'Enter 4 characters and above';
        isValid = false;
    }

    if (email.value.trim() === '') {
        emailError.textContent = 'Email is required';
        isValid = false;
    } else {
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!emailPattern.test(email.value.trim())) {
            emailError.textContent = 'Email is invalid';
            isValid = false;
        }
    }

if (password.value.trim() === '') {
    passwordError.textContent = 'Password is required';
    isValid = false;
} else if (password.value.trim().length < 8) {
    passwordError.textContent = 'Enter 8 characters and above';
    isValid = false;
}

if (confirmPassword.value.trim() === '') {
    confirmPasswordError.textContent = 'Confirm your password';
    isValid = false;
} else if (confirmPassword.value.trim() !== password.value.trim()) {
    confirmPasswordError.textContent = 'Passwords do not match';
    isValid = false;
}

return isValid;
}

// Attaching the validation to the login form
document.getElementById('login-form').addEventListener('submit', function(event) {
    if (!validateLoginForm()) {
        event.preventDefault();
    }
});

// Attaching the validation to the register form
document.getElementById('sign-up-form').addEventListener('submit', function(event) {
    if (!validateRegisterForm()) {
        event.preventDefault();
    }
});


