
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// Password Toggle
// ----------------------------------------------------------------
//----------------------------------------------------------------

function togglePasswordVisibility(passwordId) {
    const passwordInput = document.getElementById(passwordId);
    const eyeIcon = document.querySelector(`[data-password-id="${passwordId}"]`);


    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.innerHTML = '<img src="../../images/see.svg" alt="" style="width: auto; height: 20px;">';

    } else {
        passwordInput.type = "password";
        eyeIcon.innerHTML = '<img src="../../images/unsee.svg" alt="" style="width: auto; height: 20px;">';

    }
  }

document.querySelectorAll('.toggle-password').forEach(function(icon) {
    const passwordId = icon.previousElementSibling.id;
    icon.setAttribute('data-password-id', passwordId);
});
