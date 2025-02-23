document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const loginPasswordInput = document.getElementById("loginpassword");
    const togglePasswordButtons = document.querySelectorAll(".toggle-password");

    togglePasswordButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();

            if (button === togglePasswordButtons[0]) {
                togglePasswordVisibility(passwordInput, button);
            } else if (button === togglePasswordButtons[1]) {
                togglePasswordVisibility(confirmPasswordInput, button);
            } else {
                togglePasswordVisibility(loginPasswordInput, button);
            }
        });
    });

    function togglePasswordVisibility(inputField, button) {
        if (inputField.type === "password") {
            inputField.type = "text";
            button.querySelector("i").classList.remove("fa-eye");
            button.querySelector("i").classList.add("fa-eye-slash");
        } else {
            inputField.type = "password";
            button.querySelector("i").classList.remove("fa-eye-slash");
            button.querySelector("i").classList.add("fa-eye");
        }
    }
});
