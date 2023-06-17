// js/validation.js

window.onload = function () {
  var userForm = document.getElementById('userForm');
  userForm.addEventListener('submit', validateForm);
};

function validateForm(event) {
  var firstNameInput = document.getElementById('firstName');
  var dobInput = document.getElementById('dob');
  var genderSelect = document.getElementById('gender');
  var telephoneInput = document.getElementById('telephone');
  var emailInput = document.getElementById('email');
  var recaptchaResponse = grecaptcha.getResponse();

  var errorMessage = document.getElementsByClassName('error-message')[0];
  errorMessage.innerHTML = '';

  if (!firstNameInput.value.trim()) {
    errorMessage.innerHTML = 'First Name is required.';
    event.preventDefault();
    return false;
  }

  if (!dobInput.value.trim()) {
    errorMessage.innerHTML = 'Date of Birth is required.';
    event.preventDefault();
    return false;
  }

  if (!genderSelect.value) {
    errorMessage.innerHTML = 'Gender is required.';
    event.preventDefault();
    return false;
  }

  if (!telephoneInput.value.trim()) {
    errorMessage.innerHTML = 'Telephone Number is required.';
    event.preventDefault();
    return false;
  }

  if (!emailInput.value.trim()) {
    errorMessage.innerHTML = 'Email is required.';
    event.preventDefault();
    return false;
  }

  if (!recaptchaResponse) {
    errorMessage.innerHTML = 'Please complete the reCAPTCHA verification.';
    event.preventDefault();
    return false;
  }

  return true;
}
