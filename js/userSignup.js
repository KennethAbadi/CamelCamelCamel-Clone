document.addEventListener("DOMContentLoaded", function() {
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");
    const createUserForm = document.getElementById("createUserForm");
    const createButton = document.getElementById("createButton");

    email.value = "";

    function isFormFilled() {
        return !isEmailEmpty(email) || !isPasswordEmpty(password) || !isConfirmPasswordEmpty(confirmPassword);
    }

    window.addEventListener('beforeunload', function (e) {
        if (isFormFilled()) {
            e.preventDefault();
            e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
        }
    });

    function isEmailEmpty(email) {
        return email.value.trim() === "";
    }

    function isPasswordEmpty(password) {
        return password.value.trim() === "";
    }

    function isConfirmPasswordEmpty(confirmPassword) {
        return confirmPassword.value.trim() === "";
    }

    function doPasswordsMatch(password, confirmPassword) {
        return password.value === confirmPassword.value;
    }

    function isEmailValid(email) {
        const emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailFormat.test(email.value);
    }

    function isPasswordStrong() {
        const passValue = password.value;
        // greater than or equal to 8 characters
        if (passValue.length < 8) {
            return false;
        }
        // has at least one number
        if (!/\d/.test(passValue)) {
            return false;
        }
        // has one uppercase letter
        if (!/[A-Z]/.test(passValue)) {
            return false;
        }
        // has one symbol
        if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(passValue)) {
            return false;
        }
        return true;
    }

    function submitForm(event) {
        event.preventDefault();
        if (isEmailEmpty(email) || isPasswordEmpty(password) || isConfirmPasswordEmpty(confirmPassword)) {
            alert("Please fill in all fields.");
            return;
        }

        if (!isEmailValid(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        if (!doPasswordsMatch(password, confirmPassword)) {
            alert("Passwords do not match.");
            return;
        }

        if (!isPasswordStrong()) {
            alert("Password must be at least 8 characters long, contain at least one number, one uppercase letter, and one symbol.");
            return;
        }

        createUserForm.submit();
    }

    createButton.addEventListener("click", submitForm);
});
